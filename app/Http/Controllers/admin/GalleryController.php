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
use Image;
use DB;
use Hash;
use Helpers;
use App\Gallery_model;


class GalleryController extends Controller
{
    public function __construct()
    {
        $this->middleware('admin');
    }
    public  function index($productId)
    {
        if($productId != '')
        {
            $gallery_model = new Gallery_model();
            $arrData['galleryDetails']	= $gallery_model->get_gallery_details_using_productId($productId);
            $arrData['product_id']=$productId;

            return view('admin.template')->with(['middle' =>'admin/gallery/list','galleryDetails'=>$arrData['galleryDetails'],'product_id'=>$arrData['product_id']]);

        }
        else
        {
            Session::flash('error', 'Failed to Add Gallery !!');
            return Redirect::to('admin/product');
        }
    }

    public function add($product_id)
    {
        $arrData['product_id']	= $product_id;
        if (Input::get('btnAddGallery'))
        {
                $files = Input::file('galleryImage');
                foreach($files as $file)
                {
                    $name = time()."-".$file->getClientOriginalName();

                    $destinationPath = public_path('\upload\gallery\thumb');
                    $thumb_img = Image::make($file->getRealPath())->resize(500, 500);
                    $thumb_img->save($destinationPath.'/'.$name,80);

                    $destinationPath = public_path().'\upload\gallery';
                    $thumb_img = Image::make($file->getRealPath())->resize(328, 420);
                    $thumb_img->save($destinationPath.'/'.$name,80);

                    $arrAddData["gallery_image"]            = $name;
                    $arrAddData["gallery_product_id"]	  	= $product_id;
                    $arrAddData["gallery_status"]	  		= 1;
                    $result = DB::table('gallery')->insert($arrAddData);
                }
                if($result)
                {
                    Session::flash('success', 'Product Gallery Successfully !!');
                    return Redirect::to('admin/gallery/list/'.$product_id);
                }
                else
                {
                    Session::flash('error', 'Failed to Add Gallery !!');
                    return Redirect::to('admin/gallery/add');
                }

        }
        return view('admin.template')->with(['middle' =>'admin/gallery/add','product_id'=>$arrData['product_id']]);

    }

    public function edit($galleryId)
    {
        $gallery_model = new Gallery_model();
        $arrData['GalleryDetails']	= $gallery_model->get_gallery_details_using_galleryId($galleryId);
        $product_id = $arrData['GalleryDetails'][0]['gallery_product_id'];

        if (Input::get('btnEditGallery'))
        {
            $file = Input::file('galleryImage');
            $name = time()."-".$file->getClientOriginalName();

            $destinationPath = public_path('\upload\gallery\thumb');
            $thumb_img = Image::make($file->getRealPath())->resize(500, 500);
            $thumb_img->save($destinationPath.'/'.$name,80);



            $destinationPath = public_path().'\upload\gallery';
            $thumb_img = Image::make($file->getRealPath())->resize(328, 420);
            $thumb_img->save($destinationPath.'/'.$name,80);
            $prev_file =  $arrData['GalleryDetails'][0]['gallery_image'];

            if($prev_file !='' &&  file_exists(public_path('upload/gallery/').$prev_file)){
                unlink(public_path('upload/gallery/'.$prev_file));
            }
            if($prev_file !='' &&  file_exists(public_path('upload/gallery/thumb/').$prev_file)){
                unlink(public_path('upload/gallery/thumb/'.$prev_file));
            }

            $UpdateData["gallery_image"]            = $name;
            $UpdateData["gallery_product_id"]	  	= $product_id;
            $UpdateData["gallery_status"]	  		= 1;

            $result = DB::table('gallery')->where('gallery_id', $galleryId)->update($UpdateData);
            if($result)
            {
                Session::flash('success', 'Product Gallery updated Successfully !!');
                return Redirect::to('admin/gallery/list/'.$product_id);
            }
            else
            {
                Session::flash('error', 'Failed to updated Product Gallery !!');
                return Redirect::to('admin/gallery/edit/'.$galleryId);
            }
        }
        return view('admin.template')->with(['middle' =>'admin/gallery/edit','GalleryDetails'=>$arrData['GalleryDetails']]);
    }

    public function ajax_gallery_active_inactive()
    {
        $Action = Input::get('Action');
        $GalleryId = Input::get('GalleryId');

        if ($Action == 'Active')
        {
            $updata["gallery_status"]	= '0';
            $result = DB::table('gallery')->where('gallery_id', $GalleryId)->update($updata);
            if($result)
            {
                echo $Action;
            }
        }
        else
        {
            $updata["gallery_status"]	= '1';
            $result = DB::table('gallery')->where('gallery_id', $GalleryId)->update($updata);
            if($result)
            {
                echo $Action;
            }
        }
    }

    public function delete($galleryId)
    {
        $gallery_model = new Gallery_model();
        $gallery = $gallery_model->get_gallery_details_using_galleryId($galleryId);
            $delete = DB::table('gallery')->where('gallery_id', $galleryId)->delete();

            if ($delete)
            {
                $prev_file = $gallery[0]['gallery_image'];

                if($prev_file !='' &&  file_exists(public_path('upload/gallery/').$prev_file)){
                    unlink(public_path('upload/gallery/'.$prev_file));
                }
                if($prev_file !='' &&  file_exists(public_path('upload/gallery/thumb/').$prev_file)){
                    unlink(public_path('upload/gallery/thumb/'.$prev_file));
                }
                Session::flash('success', 'Data deleted Successfully !!');

            }
            else
            {
                Session::flash('error', 'Failed to delete Data !!');

            }

        return Redirect::to('admin/gallery/list/'.$gallery[0]['gallery_product_id']);
    }

}