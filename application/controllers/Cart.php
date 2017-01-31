<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Cart extends CI_Controller {

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
        $this->load->model('front/cart_model');
        $this->load->model('front/product_model');

    }
    public function index()
    {

    }


    /*
     * temp_add_cart
     *
     * This is used to insert data in temp cart
     *
	 * @author	Nilesh Dabhi
	 * @access	public
	 * @return	void
     *
     */

    public  function temp_add_cart()
    {
        if ($this->session->userdata('front_logged_user_in') == 0)
        {
            $this->session->set_userdata('login_back_product_id',$this->input->post('hdn_product_id'));
            redirect('login');
            break;

            //$sess_data['login_back_colour'] = base_url().'/shop/view/'.$this->input->post('hdn_product_id');
        }
        $productId = $this->input->post('hdn_product_id');
        $user_id = $this->session->userdata('front_user_id');
        $shoppingDetails  = $this->cart_model->get_shopping_details($user_id);
        $colourDetails   = $this->product_model->get_product_colour_details($this->input->post('hdn_product_id'));
        $sizeDetails     = $this->product_model->get_product_size_details($this->input->post('hdn_product_id'));


        //print_r($_POST); die;
        if (isset($_POST['btnAddToCart']))
        {
            if(!empty($colourDetails[0]['pd_product_color'])) {//available and empty then this call
                $this->form_validation->set_rules('sltcolour', 'Select Colour', 'trim|required', array('required' => 'Please Select Product Colour'));
            }
            if(!empty($sizeDetails)) { //available and empty then this call
                $this->form_validation->set_rules('sltsize', 'Select Size', 'trim|required', array('required' => 'Please Select Product Size'));
            }
            $this->form_validation->set_rules('sltqty', 'Select Qty', 'trim|required',array('required'=>'Please Select Product Qty'));

            if ($this->form_validation->run() == TRUE)
            {
                if(!empty($colourDetails[0]['pd_product_color'])) {//available and empty then this call
                   $sltcolour = $this->input->post('sltcolour');
                }
                else{
                    $sltcolour = 0;
                }

                if(!empty($sizeDetails))
                { //available and empty then this call
                    $sltsize = $this->input->post('sltsize');
                }
                else{
                    $sltsize = 0;
                }

                    if(!empty($shoppingDetails))
                    {
                        foreach($shoppingDetails as $shopdata)
                        {
                            //same userid,productid and size then update qty
                            if ($shopdata['tc_product_size'] == $sltsize && $shopdata['tc_user_id'] == $this->session->userdata('front_user_id') && trim($shopdata['tc_product_id']) == trim($productId))
                            {
                                $upToCartData["tc_product_qty"] = $this->input->post('sltqty') + $shopdata['tc_product_qty'];
                                $upToCartData["tc_product_total"] = ($this->input->post('sltqty') + $shopdata['tc_product_qty']) * $shopdata['tc_product_price'];
                                //  print_r($upToCartData);die;
                                $updateFlag = $this->cart_model->update_temp_cart($upToCartData, $user_id, $productId, $sltsize);
								
								//product insert after product tabel in minus qty
								$productDetail= $this->product_model->get_product_details($this->input->post('hdn_product_id'));
								//echo "<pre>"; print_r($productDetail);
								$arrAddProductData['product_qty']           = $productDetail[0]['product_qty']-$this->input->post('sltqty');
								$arrAddProductData['product_updated_on']    = date('Y-m-d H:i:s');
								//print_r($arrAddProductData); die;
								$update_qty_minus_flag = $this->cart_model->update_qty_minus_product($this->input->post('hdn_product_id'),$arrAddProductData);
					
                                if ($updateFlag)
                                {
                                    //$this->session->set_flashdata('success', 'Cms Added Successfully !!');
                                    redirect('cart/shopping_cart');
                                } else
                                {
                                    //$this->session->set_flashdata('error', 'Failed to Add To Cart !!');
                                    redirect('cart/temp_add_cart');
                                }
                            }
                        } //die;
                    }

                    //not same then after add new record
                    $arrToCartData["tc_user_id"]         = $this->session->userdata('front_user_id');
                    $arrToCartData["tc_product_id"]      = $this->input->post('hdn_product_id');
                    $arrToCartData["tc_product_name"]    = $this->input->post('hdn_product_name');
                    $arrToCartData["tc_product_price"]   = $this->input->post('hdn_product_price');
                    $arrToCartData["tc_product_qty"]     = $this->input->post('sltqty');
                    $arrToCartData["tc_product_img"]     = $this->input->post('hdn_product_image');
                    $arrToCartData["tc_product_colour"]  = $sltcolour;
                    $arrToCartData["tc_product_size"]    = $sltsize;
                    $arrToCartData["tc_product_total"]   = $this->input->post('sltqty')*$this->input->post('hdn_product_price');

                    $insertedFlag = $this->cart_model->save_temp_cart($arrToCartData);

                    //product insert after product tabel in minus qty
                    $productDetail= $this->product_model->get_product_details($this->input->post('hdn_product_id'));
                    //echo "<pre>"; print_r($productDetail);
                    $arrAddProductData['product_qty']           = $productDetail[0]['product_qty']-$this->input->post('sltqty');
                    $arrAddProductData['product_updated_on']    = date('Y-m-d H:i:s');
                    //print_r($arrAddProductData); die;
                    $update_qty_minus_flag = $this->cart_model->update_qty_minus_product($this->input->post('hdn_product_id'),$arrAddProductData);

                    if ($insertedFlag && $update_qty_minus_flag)
                    {

                       // $this->session->set_flashdata('success', 'Cms Added Successfully !!');
                        redirect('cart/shopping_cart');
                    }
                    else
                    {
                        //$this->session->set_flashdata('error', 'Failed to Add To Cart !!');
                        redirect('cart/temp_add_cart');
                    }

            }//end validation condition
        }

        $arrData['productDetails']  = $this->product_model->get_product_details($productId);
        $arrData['galleryDetails']  = $this->product_model->get_product_gallery_details($productId);
        $arrData['colourDetails']   = $this->product_model->get_product_colour_details($productId);
        $arrData['sizeDetails']     = $this->product_model->get_product_size_details($productId);
        //echo"<pre>"; print_r($arrData['sizeDetails']); die;
        $this->load->view('add_to_cart_detail',$arrData);
    }


    /*
     * ajax_temp_update_qty_cart
     *
     * This is used to update data in temp cart
     *
	 * @author	Nilesh Dabhi
	 * @access	public
	 * @return	void
     *
     */
    public  function ajax_temp_update_qty_cart()
    {
        $cart_id = $_POST['cart_id']; //die;
        $qty = $_POST['qty'];
        $price = $_POST['price'];
        if($cart_id != "" && $qty != "" && $price !="")
        {
            $cart_tempDetail = $this->cart_model->get_cart_temp_detail_using_tcId($cart_id);
            if($qty >$cart_tempDetail[0]['tc_product_qty'])
            {
                $productDetail= $this->product_model->get_product_details($cart_tempDetail[0]['tc_product_id']);
                //echo "<pre>"; print_r($productDetail);
                $arrAddProductData['product_qty']           = ($productDetail[0]['product_qty']+$cart_tempDetail[0]['tc_product_qty'])-$qty;
                $arrAddProductData['product_updated_on']    = date('Y-m-d H:i:s');
                //print_r($arrAddProductData); die;
                $update_qty_minus_flag = $this->cart_model->update_qty_minus_product($cart_tempDetail[0]['tc_product_id'],$arrAddProductData);
            }
            else
            {
                //echo "minus"; die;
                $productDetail= $this->product_model->get_product_details($cart_tempDetail[0]['tc_product_id']);
                //echo "<pre>"; print_r($productDetail);
                $arrAddProductData['product_qty']           = ($productDetail[0]['product_qty']+$cart_tempDetail[0]['tc_product_qty'])-$qty;
                $arrAddProductData['product_updated_on']    = date('Y-m-d H:i:s');
                //print_r($arrAddProductData); die;
                $update_qty_minus_flag = $this->cart_model->update_qty_minus_product($cart_tempDetail[0]['tc_product_id'],$arrAddProductData);
            }

             //die;

            $upToCartData["tc_product_qty"]     = $qty;
            $upToCartData["tc_product_total"]   = $qty*$price;
            //print_r($upToCartData); die;
            $updatedFlag = $this->cart_model->temp_update_qty_cart($upToCartData,$cart_id);

            if ($updatedFlag && $update_qty_minus_flag)
            {
                echo "true";
            }
            else
            {
               echo "false";
            }
        }
    }

    /**
     * delete_shop_product
     *
     * This help to delete item from cart_temp detail
     *
     * @author	Nilesh Dabhi
     * @access	public
     * @return	void
     */

    public function delete_shop_product($tc_id)
    {
        //temp_cart in product order delete at that time qty plus in product table
        $cart_tempDetail = $this->cart_model->get_cart_temp_detail_using_tcId($tc_id);
        $qty= $cart_tempDetail[0]['tc_product_qty'];


        $productDetail= $this->product_model->get_product_details($cart_tempDetail[0]['tc_product_id']);
        //echo "<pre>"; print_r($productDetail);
        $arrAddProductData['product_qty']           = $productDetail[0]['product_qty']+$qty;
        $arrAddProductData['product_updated_on']    = date('Y-m-d H:i:s');
        //print_r($arrAddProductData); die;
        $update_qty_minus_flag = $this->cart_model->update_qty_minus_product($cart_tempDetail[0]['tc_product_id'],$arrAddProductData);

        if($update_qty_minus_flag)
        {
            $delete = $this->cart_model->delete_shop_product($tc_id);

            if ($delete)
                $this->session->set_flashdata('success', 'Product Successfully Deleted  !!');
            else
                $this->session->set_flashdata('error', 'Failed to Delete Product !!');
        }
        redirect('cart/shopping_cart');
    }

  /*
   * shopping_cart
   *
   * This is used to get shopping detail
   *
   * @author	Nilesh Dabhi
   * @access	public
   * @return	void
   *
   */
    public function shopping_cart()
    {
        //echo "<pre>"; print_r($this->session->userdata()); die;
        $user_id = $this->session->userdata('front_user_id');
        $arrData['shoppingDetails']  = $this->cart_model->get_shopping_details($user_id);
        $this->load->view('shopping_cart',$arrData);
    }


     /*
     * delivery_deatil
     *
     * This is used to get user address
     *
     * @author	Nilesh Dabhi
     * @access	public
     * @return	void
     *
     */

    public function delivery_deatil()
    {
        $user_id = $this->session->userdata('front_user_id');
        $arrData['deliveryDetails']  = $this->cart_model->get_address_for_delivery_details($user_id);
        $this->load->view('delivery_deatil',$arrData);
    }

    /*
     * ajax_delivery_deatil_update_user_address
     *
     * This is used to update the user address
     *
     * @author	Nilesh Dabhi
     * @access	public
     * @return	void
     *
     */
    public function ajax_delivery_deatil_update_user_address()
    {
        $user_id = $this->session->userdata('front_user_id');
        $txtAddress = $_POST['txtAddress'];
        if($txtAddress !="" && $user_id !="")
        {
            $upToData["user_address"]     = $txtAddress;

        }
        $updatedFlag =  $this->cart_model->delivery_deatil_update_user_address($user_id,$upToData);
        if ($updatedFlag)
        {
            echo "true";
        }
        else
        {
            echo "false";
        }
    }

  /*
    * payment
    *
    * This is used to fetch detail
    *
    * @author	Nilesh Dabhi
    * @access	public
    * @return	void
    *
    */
    public function payment()
    {
        $user_id = $this->session->userdata('front_user_id');
        $arrData['shoppingDetails']  = $this->cart_model->get_shopping_details($user_id);
        $arrData['deliveryDetails']  = $this->cart_model->get_address_for_delivery_details($user_id);
        $this->load->view('payment',$arrData);
    }

    /*
    * ajax_confirm_order
    *
    * This is used to add data
    *
    * @author	Nilesh Dabhi
    * @access	public
    * @return	void
    *
    */
    public function ajax_confirm_order()
    {
        $user_id = $this->session->userdata('front_user_id');
        $shoppingDetails = $this->cart_model->get_shopping_details($user_id);
        //$deliveryDetails = $this->cart_model->get_address_for_delivery_details($user_id);
       // echo "<pre>"; print_r($shoppingDetails); die;
        if(!empty($shoppingDetails))
        {
           $dataArray = array();
            foreach($shoppingDetails as $shop)
            {
                $dataArray[] = $shop['tc_product_id'];
                $arrAddData['cart_user_id']         = $shop['tc_user_id'];
                $arrAddData['cart_product_id']      = $shop['tc_product_id'];
                $arrAddData['cart_product_name']    = $shop['tc_product_name'];
                $arrAddData['cart_product_price']   = $shop['tc_product_price'];
                $arrAddData['cart_product_qty']     = $shop['tc_product_qty'];
                $arrAddData['cart_product_img']     = $shop['tc_product_img'];
                $arrAddData['cart_product_colour']  = $shop['tc_product_colour'];
                $arrAddData['cart_product_size']    = $shop['tc_product_size'];
                $arrAddData['cart_product_total']   = $shop['tc_product_total'];
                $arrAddData['cart_order_status']    = 'pending';
                $arrAddData['cart_created_on']      = date('Y-m-d H:i:s');

                $insertedFlag = $this->cart_model->save_confirm_order($arrAddData);

            }

           //die;
            $arrShippingAddData['sc_user_id']         = $user_id;
            $arrShippingAddData['sc_product_id']      = implode(',',$dataArray);
            $arrShippingAddData['sc_sub_total']       = sub_total($this->session->userdata('front_user_id'));
            $arrShippingAddData['sc_shipping_charge'] = shipping_calculate(sub_total($this->session->userdata('front_user_id')));
            $arrShippingAddData['sc_total']           = sub_total($this->session->userdata('front_user_id'))+shipping_calculate(sub_total($this->session->userdata('front_user_id')));
            $arrShippingAddData['sc_created_on']      = date('Y-m-d H:i:s');
          //  print_r($arrShippingAddData);

            $insertedShippingFlag = $this->cart_model->save_shipping_cost($arrShippingAddData);

           // die;
            if ($insertedShippingFlag)
            {
                //delete temp_cart
                $this->cart_model->delete_temp_cart($user_id);

                $this->session->set_userdata('last_add_cart_product_id',implode(',',$dataArray));
                echo "true";
            }
            else
            {
                echo "false";
            }
        }
    }

   /*
   * success_payment
   *
   * This is used to if payment success then this method call
   *
   * @author	Nilesh Dabhi
   * @access	public
   * @return	void
   *
   */
    public function success_payment()
    {
        $user_id = $this->session->userdata('front_user_id');

        //update cart_order_status
        $last_add_cart_product_id =  $this->session->userdata('last_add_cart_product_id');
        $last_add_cart_product_id = explode(',',$last_add_cart_product_id);
       // print_r($last_add_cart_product_id);
        $shippingcostDetails = $this->cart_model->get_shipping_cost_details($user_id,$this->session->userdata('last_add_cart_product_id'));
        $orderDetails = $this->cart_model->get_order_pending_details($last_add_cart_product_id);
		 //echo "<pre>";  print_r($shippingcostDetails); die;
        //echo "<pre>";  print_r($orderDetails); die;

        //echo   $orderDetails[0]['cart_created_on']; die;

        if(!empty($orderDetails)&& !empty($shippingcostDetails))
        {
            $upToData['cart_order_status']= 'success';
            $newDate = date("Y-m-d H", strtotime($shippingcostDetails[0]['sc_created_on']));
            $this->cart_model->update_cart_order_status($user_id,$last_add_cart_product_id,$newDate,$upToData);
            //echo $last_add_cart_product_id; die;
        }
		else
		{
			$upToData['cart_order_status']= 'payment failed';
            $this->cart_model->update_payment_failed_order_status($user_id,$last_add_cart_product_id,$upToData);
		}

        $this->load->view('success');
    }

 /*
  * cancel_payment
  *
  * This is used to if payment success then this method call
  *
  * @author	Nilesh Dabhi
  * @access	public
  * @return	void
  *
  */
    public function cancel_payment()
    {
		 $user_id = $this->session->userdata('front_user_id');

        //update cart_order_status
        $last_add_cart_product_id =  $this->session->userdata('last_add_cart_product_id');
        $last_add_cart_product_id = explode(',',$last_add_cart_product_id);
		
		$upToData['cart_order_status']= 'payment failed';
        $this->cart_model->update_payment_failed_order_status($user_id,$last_add_cart_product_id,$upToData);
		
		
		
        $this->load->view('cancellation');
    }
 /*
  * ajax_size_found_in_tempcart
  *
  * This is used to if size found then this method return true
  *
  * @author	Nilesh Dabhi
  * @access	public
  * @return	void
  *
  */
    public function ajax_size_found_in_tempcart()
    {
        $user_id = $this->session->userdata('front_user_id');
        if($user_id != "")
        {
            $product_id = $_POST['product_id'];
            $sltsize = $_POST['sltsize'];
            if($product_id !="" && $sltsize !="")
            {
                $found_in_tempcartDetails = $this->cart_model->size_found_in_tempcart($user_id,$product_id,$sltsize);
              //  echo "<pre>"; print_r($found_in_tempcartDetails); die;
                if (!empty($found_in_tempcartDetails))
                {
                    echo "true";
                }
                else
                {
                    echo "false";
                }
            }
        }
        else
        {
            echo "user_not_login";
        }

    }


}
