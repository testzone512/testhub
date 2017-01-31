<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Shop extends CI_Controller {

	/**
	 * __construct
	 *
	 * Calls parent constructor
	 * @author	Chintan Bhimani
	 * @access	public
	 * @return	void
	 */
	function __construct()
	{
		parent::__construct();

		$this->load->library('session');
		$this->load->model('front/category_model');
		$this->load->model('front/product_model');
		$this->load->model('front/cart_model');
		$this->load->model('front/size_model');
	}
	public function index()
	{
		$num_rec_per_page  = 3;

		if (isset($_GET["page"]))
		{
			$page  = $_GET["page"];
		}
		else
		{
			$page=1;
		}
		$start_from = ($page-1) * $num_rec_per_page;
		$arrData['active_pagination']  = $page;
		$arrData['num_rec_per_page']   = $num_rec_per_page;
		$arrData['categoryDetails']    = $this->category_model->get_sub_category_details();
		$arrData['shopProductDetails'] = $this->product_model->get_shop_product_detail($start_from,$num_rec_per_page);
		$arrData['sizeProductDetails'] = $this->size_model->get_shop_size_detail();

		//echo "<pre>"; print_r($arrData['shopProductDetails']); die;
		$arrData['shop'] = 'active';
		$this->load->view('shop',$arrData);
	}

	public function ajax_pagination()
	{
		if (isset($_POST["page"]))
		{
			$page  = $_POST["page"];
		}
		else
		{
			$page=1;
		}
		$num_rec_per_page  = 3;
		$start_from = ($page-1) * $num_rec_per_page;
		//$shopProductDetails = $this->product_model->get_shop_product_detail($start_from,$num_rec_per_page);
		if (isset($_POST["cat_id"]))
		{
			$cat_id  = $_POST["cat_id"];
			$shopProductDetails = $this->product_model->get_shop_product_detail_with_cateId($start_from,$num_rec_per_page,$cat_id);
		}
		else{
			$shopProductDetails = $this->product_model->get_shop_product_detail($start_from,$num_rec_per_page);
		}
		//echo "<pre>"; print_r($shopProductDetails); die;
		foreach($shopProductDetails as $shop)
		{

			if(!empty($shopProductDetails))
			{
				echo"<div class='col-sm-4 col-xs-4 product ".$shop['category_name']." ".$shop['size_name']."'>
					<div class='main-product-img' >
						<a href='".base_url()."shop/view/".$shop['product_id']."'><img src='".base_url()."public/upload/product/".$shop['product_image']."' class='img-responsive alt='No Image Available'></a>
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
										<h4 class='main-size-pro poppinsregular' >Available:".get_size($shop['product_id'])."</h4>
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
		$arrData['productDetails']  = $this->product_model->get_product_details($productId);
		$arrData['galleryDetails']  = $this->product_model->get_product_gallery_details($productId);
		$arrData['colourDetails']   = $this->product_model->get_product_colour_details($arrData['productDetails'][0]['product_id']);
		$arrData['sizeDetails']     = $this->product_model->get_product_size_details($arrData['productDetails'][0]['product_id']);
		$arrData['shoppingDetails']  = $this->cart_model->get_shopping_details_useing_productId($productId);
		//echo"<pre>"; print_r($arrData['sizeDetails']); die;

		$this->load->view('add_to_cart_detail',$arrData);
	}
}
