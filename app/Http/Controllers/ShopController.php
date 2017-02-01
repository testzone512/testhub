<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use View;
use DB;
use App\Category_model;
use App\Front_product_model;
use App\Size_model;
use App\Cart_model;
use Helpers;

class ShopController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //$this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $num_rec_per_page  = 3;

        if(Input::get("page"))
        {
            $page  = Input::get("page");
        }
        else
        {
            $page=1;
        }
        $start_from = ($page-1) * $num_rec_per_page;
        $arrData['active_pagination']  = $page;
        $arrData['num_rec_per_page']   = $num_rec_per_page;
        $category_model = new Category_model();
        $arrData['categoryDetails']    = $category_model->get_sub_category_details();
        $product_model = new Front_product_model();
        $arrData['shopProductDetails'] = $product_model->get_shop_product_detail($start_from,$num_rec_per_page);
        $size_model = new Size_model();
        $arrData['sizeProductDetails'] = $size_model->get_shop_size_detail();

        //echo "<pre>"; print_r($arrData['shopProductDetails']); die;
        $arrData['shop'] = 'active';

        return view('shop')->with(['active_pagination' =>   $arrData['active_pagination'],'num_rec_per_page'=> $arrData['num_rec_per_page'],'categoryDetails'=> $arrData['categoryDetails'],'shopProductDetails'=>$arrData['shopProductDetails'],'sizeProductDetails'=>$arrData['sizeProductDetails'],'shop'=>$arrData['shop']]);
    }
    public function ajax_pagination()
    {
        if (Input::get("page"))
        {
            $page  = Input::get("page");
        }
        else
        {
            $page=1;
        }
        $num_rec_per_page  = 3;
        $start_from = ($page-1) * $num_rec_per_page;
        //$shopProductDetails = $this->product_model->get_shop_product_detail($start_from,$num_rec_per_page);
        if (Input::get("cat_id"))
        {
            $cat_id  = Input::get("cat_id");
            $shopProductDetails = $this->product_model->get_shop_product_detail_with_cateId($start_from,$num_rec_per_page,$cat_id);
        }
        else{
            $product_model = new Front_product_model();
            $shopProductDetails = $product_model->get_shop_product_detail($start_from,$num_rec_per_page);
        }
        //echo "<pre>"; print_r($shopProductDetails); die;
        foreach($shopProductDetails as $shop)
        {

            if(!empty($shopProductDetails))
            {
                echo"<div class='col-sm-4 col-xs-4 product ".$shop['category_name']." ".$shop['size_name']."'>
					<div class='main-product-img' >
						<a href='".url('shop/view')."/".$shop['product_id']."'><img src='".url('public/upload/product')."/".$shop['product_image']."' class='img-responsive alt='No Image Available'></a>
					</div>

					<div class='main-product-content >
						<div class='row'>
                    		<div class='col-sm-12>
								<h4 class='main-pro-name poppinsregular' >".$shop['product_name']."</h4>
							</div>
						</div>
						 <div class='row'>
                             	<div class='col-sm-12'>
									<div class='main-pro-details' >
										<h4 class='main-price-pro poppinsbold' >$".$shop['product_price']."</h4>
										<h4 class='main-size-pro poppinsregular' >Available:". Helpers::get_size($shop['product_id'])."</h4>
									</div>
								</div>
						 </div>
					</div>
				</div>";
            }
            else
            {
                echo "No Record Found";
            }
        }
    }


    public function view($productId)
    {
        $product_model = new Front_product_model();
        $cart_model = new Cart_model();
        $arrData['productDetails']  = $product_model->get_product_details($productId);
        $arrData['galleryDetails']  = $product_model->get_product_gallery_details($productId);
        $arrData['colourDetails']   = $product_model->get_product_colour_details($arrData['productDetails'][0]['product_id']);
        $arrData['sizeDetails']     = $product_model->get_product_size_details($arrData['productDetails'][0]['product_id']);
        $arrData['shoppingDetails'] = $cart_model->get_shopping_details_useing_productId($productId);
        //echo"<pre>"; print_r($arrData['sizeDetails']); die;

        return view('add_to_cart_detail')->with(['productDetails' =>   $arrData['productDetails'],'galleryDetails'=> $arrData['galleryDetails'],'colourDetails'=> $arrData['colourDetails'],'sizeDetails'=>$arrData['sizeDetails'],'shoppingDetails'=>$arrData['shoppingDetails']]);

    }



}
