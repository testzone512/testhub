<?php
namespace App\Http\Controllers\admin;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Redirect;
use Session;
use Illuminate\Http\Request;
use View;
use DB;
use Image;
use Hash;
use Helpers;
use App\Category_model;
use App\Product_model;
use App\Colour_model;
use App\Size_model;
use App\Gallery_model;



class ProductController extends Controller
{
    public function __construct()
    {
        $this->middleware('admin');
    }

    public  function index()
    {
        $result =  DB::table('product')->select()->join('category','category.category_id','=','product.product_category_id')->orderBy('product_id','desc')->get();
        return view('admin.template')->with(['middle' => 'admin/product/list','productDetails' => $result]);
    }

    public function ajax_product_active_inactive()
    {
        $Action = Input::get('Action');
        $ProductId = Input::get('ProductId');

        if ($Action == 'Active')
        {
            $updata["product_status"]	= '0';
            $result = DB::table('product')->where('product_id', $ProductId)->update($updata);
            if($result)
            {
               echo $Action;
            }
        }
        else
        {
            $updata["product_status"]	= '1';
            $result = DB::table('product')->where('product_id', $ProductId)->update($updata);
            if($result)
            {
                echo $Action;
            }
        }
    }


    public function add_select_type_product()
    {
        if (isset($_POST['btnAddProductType']))
        {
                $category_model = new Category_model();
                $colour_model = new Colour_model();
                $size_model = new Size_model();
                $getcategory = $category_model->get_parent_category();
                $arrData['categorydata']	   = $getcategory;
                $arrData['sltProductCategory'] = Input::get('sltProductCategory');

                $arrData['colourDetail'] 	   = $colour_model->get_colour_details();
                $arrData['sizeDetail'] 		   = $size_model->get_size_details_for_listing();
                //echo "<pre>"; print_r($arrData['colourDetail']); die;
                return view('admin.template')->with(['middle' =>'admin/product/add','categorydata'=>$arrData['categorydata'],'sltProductCategory'=>$arrData['sltProductCategory'],'colourDetail'=>$arrData['colourDetail'],'sizeDetail'=>$arrData['sizeDetail']]);

        }
        else
        {
            return view('admin.template')->with(['middle' => 'admin/product/select_type']);
        }
    }

    public function add()
    {
        if (Input::get('btnAddProduct'))
        {

            $file = Input::file('productImage');
            //$imagename = time().'.'.$file->getClientOriginalExtension();
            $name = time()."-".$file->getClientOriginalName();

            $destinationPath = public_path('\upload\product\thumb');
            $thumb_img = Image::make($file->getRealPath())->resize(500, 500);
            $thumb_img->save($destinationPath.'/'.$name,80);

            $destinationPath = public_path().'\upload\product';
            $thumb_img = Image::make($file->getRealPath())->resize(328, 420);
            $thumb_img->save($destinationPath.'/'.$name,80);


            $arrProductData["product_image"]       = $name;
            $arrProductData["product_name"]        = Input::get('txtProductName');
            $arrProductData["product_category_id"] = Input::get('sltProductCategory');
            $arrProductData["product_type"]        = Input::get('hdnsltProductCategory');
            $arrProductData["product_qty"]         = Input::get('txtProductQty');
            $arrProductData["product_price"]       = Input::get('txtProductPrice');
            $arrProductData["product_status"]      = 1;
            $arrProductData["product_created_on"]  = date('Y-m-d H:i:s');

            $result = DB::table('product')->insert($arrProductData);
            $lastInsertedId = DB::getPdo()->lastInsertId();

            if(Input::get('hdnsltProductCategory')=='Multiple')
            {
                $addAttribute['pd_product_id'] = $lastInsertedId;

                foreach (Input::get('sltMulsize') as $key => $value)
                {
                    ///echo "key  = ".$key."<br/>";
                    $addAttribute['pd_product_color'] 	= implode(',', Input::get('sltMulcolour')[$key]);
                    $addAttribute['pd_product_weight']  = Input::get('txtMulweight')[$key];
                    $addAttribute['pd_product_size']    = Input::get('sltMulsize')[$key];
                    $addAttribute['pd_product_price']   = Input::get('txtMulprice')[$key];
                    // echo "<pre>"; print_r($addAttribute);
                    DB::table('product_detail')->insert($addAttribute);
                }
                //die;
            }
            if($result)
            {
                Session::flash('success', 'Product Added Successfully !!');
                return Redirect::to('admin/product');
            }
            else
            {
                Session::flash('error', 'Failed to Add Product !!');
                return Redirect::to('admin/product/add');
            }
        }
    }
    public function edit($productId)
    {
        //echo "<pre>";print_r($_POST); die;
        $product_model = new Product_model();
        $colour_model = new Colour_model();
        $size_model = new Size_model();
        $category_model = new Category_model();
        $arrData['product'] 	 = $product_model->get_product_for_edit($productId);
        $arrData['colourDetail'] = $colour_model->get_colour_details();
        $arrData['sizeDetail'] 	 = $size_model->get_size_details_for_listing();
        $getcategory             = $category_model->get_parent_category();
       // echo "<pre>";print_r($getcategory); die;
        $arrData['categorydata'] = $getcategory;
        if ($arrData['product'][0]['product_type'] == 'Multiple')
        {
            $arrProdDetails = $product_model->get_product_details_for_edit($arrData['product'][0]['product_id']);
            $arrData['ProductDetails'] = $arrProdDetails;
        }
        if (Input::get('btnEditProduct'))
        {
            if (Input::has('image'))
            {
                $file = Input::file('productImage');
                $name = time()."-".$file->getClientOriginalName();

                $destinationPath = public_path('\upload\product\thumb');
                $thumb_img = Image::make($file->getRealPath())->resize(500, 500);
                $thumb_img->save($destinationPath.'/'.$name,80);



                $destinationPath = public_path().'\upload\product';
                $thumb_img = Image::make($file->getRealPath())->resize(328, 420);
                $thumb_img->save($destinationPath.'/'.$name,80);
                $prev_file =  $arrData['product'][0]['product_image'];

                if($prev_file !='' &&  file_exists(public_path('upload/product/').$prev_file)){
                    unlink(public_path('upload/product/'.$prev_file));
                }
                if($prev_file !='' &&  file_exists(public_path('upload/product/thumb/').$prev_file)){
                    unlink(public_path('upload/product/thumb/'.$prev_file));
                }
                $upProductData["product_image"]       = $name;
            }


            $upProductData["product_name"]        = Input::get('txtProductName');
            $upProductData["product_category_id"] = Input::get('sltProductCategory');
            $upProductData["product_qty"]         = Input::get('txtProductQty');
            $upProductData["product_price"]       = Input::get('txtProductPrice');
            $upProductData["product_status"]      = 1;
            $upProductData["product_updated_on"]  = date('Y-m-d H:i:s');
            $result = DB::table('product')->where('product_id', $productId)->update($upProductData);
            if($arrData['product'][0]['product_type'] == 'Multiple')
            {
                DB::table('product_detail')->where('pd_product_id', $productId)->delete();
                // $this->product_model->delete_product_detail($productId);
              // print_r($_POST['sltMulsize']); die;
                $upAttribute['pd_product_id'] = $productId;
                foreach ($_POST['sltMulsize'] as $key => $value)
                {

                    $upAttribute['pd_product_color'] 	= implode(',', $_POST['sltMulcolour'][$key]);
                    $upAttribute['pd_product_weight'] 	= $_POST['txtMulweight'][$key];
                    $upAttribute['pd_product_size'] 	= $_POST['sltMulsize'][$key];
                    $upAttribute['pd_product_price'] 	= $_POST['txtMulprice'][$key];
                    //print_r($upAttribute);
                   $insert = DB::table('product_detail')->insert($upAttribute);
                    /*if($insert)
                    {
                        DB::table('product_detail')->where('pd_product_id', $productId)->delete();
                    }*/
                }//die;
            }
            if($result)
            {
                Session::flash('success', 'Product Updated Successfully !!');
                return Redirect::to('admin/product');
            }
            else
            {
                Session::flash('error', 'Failed to Updated Product !!');
                return Redirect::to('admin/product/edit');
            }
        }
        return view('admin.template')->with(['middle' =>'admin/product/edit','product'=>$arrData['product'],'colourDetail'=>$arrData['colourDetail'],'sizeDetail'=>$arrData['sizeDetail'],'categorydata'=>$arrData['categorydata'],'ProductDetails'=> $arrData]);


    }

    public function view($productId)
    {
        $product_model = new Product_model();
        $gallery_model = new Gallery_model();
        //get the gallery details
        $arrData['galleryDetails'] = $gallery_model->get_gallery_details_using_productId($productId);
        $arrData['productDetails'] =  $product_model->get_product_details_for_view($productId);
        //echo "<pre>"; print_r($arrData['galleryDetails']);die;
        $arrData['productAttributeDetails'] =  $product_model->get_product_details_for_edit($productId);
        return view('admin.template')->with(['middle' =>'admin/product/view','galleryDetails'=>$arrData['galleryDetails'],'productDetails'=>$arrData['productDetails'],'productAttributeDetails'=>$arrData['productAttributeDetails']]);

    }


    public function delete($productId)
    {
        if($productId!='') {
            $product_model = new Product_model();
            $product = $product_model->get_product_for_edit($productId);
            $delete = DB::table('product')->where('product_id', $productId)->delete();

            if ($delete) {
                $prev_file = $product[0]['product_image'];

                if($prev_file !='' &&  file_exists(public_path('upload/product/').$prev_file)){
                    unlink(public_path('upload/product/'.$prev_file));
                }
                if($prev_file !='' &&  file_exists(public_path('upload/product/thumb/').$prev_file)){
                    unlink(public_path('upload/product/thumb/'.$prev_file));
                }
                Session::flash('success', 'Data deleted Successfully !!');
            }
            else {
                Session::flash('error', 'Failed to delete Data !!');
            }
        }

        return Redirect::to('admin/product');
    }





}