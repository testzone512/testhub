<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use View;
use Session;
use DB;
use App\Cart_model;
use App\Front_product_model;
use Helpers;

class CartController extends Controller
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

    public  function temp_add_cart()
    {
        $user = Auth::user();
        if (empty($user))
        {
            //$this->session->set_userdata('login_back_product_id',$this->input->post('hdn_product_id'));
           // redirect('login');
           // break;
            return Redirect::to('login');

            //$sess_data['login_back_colour'] = base_url().'/shop/view/'.$this->input->post('hdn_product_id');
        }
        $productId = Input::get('hdn_product_id');
        $user_id = $user['id'];
        $cart_model = new Cart_model();
        $product_model = new Front_product_model();
        $shoppingDetails  = $cart_model->get_shopping_details($user_id);
        $colourDetails   = $product_model->get_product_colour_details($productId);
        $sizeDetails     = $product_model->get_product_size_details($productId);


        //print_r($_POST); die;
        if (isset($_POST['btnAddToCart']))
        {

               if(!empty($colourDetails[0]['pd_product_color'])) {//available and empty then this call
                    $sltcolour = Input::get('sltcolour');
                }
                else{
                    $sltcolour = 0;
                }

                if(!empty($sizeDetails))
                { //available and empty then this call
                    $sltsize = Input::get('sltsize');
                }
                else{
                    $sltsize = 0;
                }

                if(!empty($shoppingDetails))
                {
                    foreach($shoppingDetails as $shopdata)
                    {
                        //same userid,productid and size then update qty
                        if ($shopdata['tc_product_size'] == $sltsize && $shopdata['tc_user_id'] == $user_id && trim($shopdata['tc_product_id']) == trim($productId))
                        {
                            $upToCartData["tc_product_qty"] = Input::get('sltqty') + $shopdata['tc_product_qty'];
                            $upToCartData["tc_product_total"] = (Input::get('sltqty') + $shopdata['tc_product_qty']) * $shopdata['tc_product_price'];
                            //  print_r($upToCartData);die;
                            $result = DB::table('temp_cart')->where('tc_user_id',$user_id)->where('tc_product_id', $productId)->where('tc_product_size', $sltsize)->update($upToCartData);
                            $productDetail= $product_model->get_product_details(Input::get('hdn_product_id'));
                            $arrAddProductData['product_qty']           = $productDetail[0]['product_qty']-Input::get('sltqty');
                            $arrAddProductData['product_updated_on']    = date('Y-m-d H:i:s');
                            //print_r($arrAddProductData); die;
                            $update_qty_minus_flag = DB::table('product')->where('product_id',Input::get('hdn_product_id'))->update($arrAddProductData);

                            if($result)
                            {
                                //Session::flash('success', 'Product Updated Successfully !!');
                                return Redirect::to('cart/shopping_cart');
                            }
                            else
                            {
                               // Session::flash('error', 'Failed to Updated Product !!');
                                return Redirect::to('cart/temp_add_cart');
                            }
                        }
                    } //die;
                }

                //not same then after add new record
                $arrToCartData["tc_user_id"]         = $user_id;
                $arrToCartData["tc_product_id"]      = Input::get('hdn_product_id');
                $arrToCartData["tc_product_name"]    = Input::get('hdn_product_name');
                $arrToCartData["tc_product_price"]   = Input::get('hdn_product_price');
                $arrToCartData["tc_product_qty"]     = Input::get('sltqty');
                $arrToCartData["tc_product_img"]     = Input::get('hdn_product_image');
                $arrToCartData["tc_product_colour"]  = $sltcolour;
                $arrToCartData["tc_product_size"]    = $sltsize;
                $arrToCartData["tc_product_total"]   = Input::get('sltqty')*Input::get('hdn_product_price');

                $insertedFlag = DB::table('temp_cart')->insert($arrToCartData);

                //product insert after product tabel in minus qty
                $productDetail= $product_model->get_product_details(Input::get('hdn_product_id'));
                //echo "<pre>"; print_r($productDetail);

                $arrAddProductData['product_qty']           = $productDetail[0]['product_qty']-Input::get('sltqty');
                $arrAddProductData['product_updated_on']    = date('Y-m-d H:i:s');
                //print_r($arrAddProductData); die;
                $update_qty_minus_flag = DB::table('product')->where('product_id',Input::get('hdn_product_id'))->update($arrAddProductData);
                if ($insertedFlag && $update_qty_minus_flag)
                {

                    //Session::flash('success', 'Product Updated Successfully !!');
                    return Redirect::to('cart/shopping_cart');
                }
                else
                {
                    // Session::flash('error', 'Failed to Updated Product !!');
                    return Redirect::to('cart/temp_add_cart');
                }


        }

        $arrData['productDetails']  = $product_model->get_product_details($productId);
        $arrData['galleryDetails']  = $product_model->get_product_gallery_details($productId);
        $arrData['colourDetails']   = $product_model->get_product_colour_details($productId);
        $arrData['sizeDetails']     = $product_model->get_product_size_details($productId);
        //echo"<pre>"; print_r($arrData['sizeDetails']); die;
        return view('add_to_cart_detail')->with(['productDetails'=>$arrData['productDetails'],'galleryDetails'=>$arrData['galleryDetails'],'colourDetails'=>$arrData['colourDetails'],'sizeDetails'=>$arrData['sizeDetails']]);

    }

    public function ajax_size_found_in_tempcart()
    {
        $user = Auth::user();
        $user_id = $user['id'];
        if($user_id != "")
        {
            $product_id = Input::get('product_id');
            $sltsize = Input::get('sltsize');
            if($product_id !="" && $sltsize !="")
            {
                $cart_model = new Cart_model();
                $found_in_tempcartDetails = $cart_model->size_found_in_tempcart($user_id,$product_id,$sltsize);
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


    public function shopping_cart()
    {
        //echo "<pre>"; print_r($this->session->userdata()); die;
        $user = Auth::user();
        $user_id = $user['id'];
        $cart_model = new Cart_model();
        $arrData['shoppingDetails']  = $cart_model->get_shopping_details($user_id);
        return view('shopping_cart')->with(['shoppingDetails'=>$arrData['shoppingDetails']]);

    }

    public  function ajax_temp_update_qty_cart()
    {
        $product_model = new Front_product_model();
        $cart_model = new Cart_model();

        $cart_id = Input::get('cart_id'); //die;
        $qty = Input::get('qty');
        $price = Input::get('price');
        if($cart_id != "" && $qty != "" && $price !="")
        {

            $cart_tempDetail = $cart_model->get_cart_temp_detail_using_tcId($cart_id);
            if($qty >$cart_tempDetail[0]['tc_product_qty'])
            {

                $productDetail= $product_model->get_product_details($cart_tempDetail[0]['tc_product_id']);
                //echo "<pre>"; print_r($productDetail);
                $arrAddProductData['product_qty']           = ($productDetail[0]['product_qty']+$cart_tempDetail[0]['tc_product_qty'])-$qty;
                $arrAddProductData['product_updated_on']    = date('Y-m-d H:i:s');
                //print_r($arrAddProductData); die;
                $update_qty_minus_flag =  DB::table('product')->where('product_id',$cart_tempDetail[0]['tc_product_id'])->update($arrAddProductData);

            }
            else
            {
                //echo "minus"; die;
                $productDetail= $product_model->get_product_details($cart_tempDetail[0]['tc_product_id']);
                //echo "<pre>"; print_r($productDetail);
                $arrAddProductData['product_qty']           = ($productDetail[0]['product_qty']+$cart_tempDetail[0]['tc_product_qty'])-$qty;
                $arrAddProductData['product_updated_on']    = date('Y-m-d H:i:s');
                //print_r($arrAddProductData); die;
                $update_qty_minus_flag = DB::table('product')->where('product_id',$cart_tempDetail[0]['tc_product_id'])->update($arrAddProductData);
            }

            //die;

            $upToCartData["tc_product_qty"]     = $qty;
            $upToCartData["tc_product_total"]   = $qty*$price;
            //print_r($upToCartData); die;
            $updatedFlag =  DB::table('temp_cart')->where('tc_id',$cart_id)->update($upToCartData);
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
     * This is used to delete shop detail data equal to tc_id from temp_cart(table)
     *
     * @author	Nilesh Dabhi
     * @access	public
     * @param   integer-$tc_id
     * @return void
     */
    function delete_shop_product($tc_id)
    {
        $cart_model = new Cart_model();
        $cart_tempDetail = $cart_model->get_cart_temp_detail_using_tcId($tc_id);
        $qty= $cart_tempDetail[0]['tc_product_qty'];

        $product_model = new Front_product_model();
        $productDetail= $product_model->get_product_details($cart_tempDetail[0]['tc_product_id']);
        //echo "<pre>"; print_r($productDetail);
        $arrAddProductData['product_qty']           = $productDetail[0]['product_qty']+$qty;
        $arrAddProductData['product_updated_on']    = date('Y-m-d H:i:s');
        //print_r($arrAddProductData); die;
        $update_qty_minus_flag = DB::table('product')->where('product_id',$cart_tempDetail[0]['tc_product_id'])->update($arrAddProductData);


        if($update_qty_minus_flag)
        {
            $delete = DB::table('temp_cart')->where('tc_id', $tc_id)->delete();

            if ($delete)
                Session::flash('success', 'Product Successfully Deleted !!');
            else
                Session::flash('error', 'Failed to Delete Product !!');
        }
        return Redirect::to('cart/shopping_cart');
    }


    public function delivery_deatil()
    {
        $user = Auth::user();
        $user_id = $user['id'];
        $cart_model = new Cart_model();
        $arrData['deliveryDetails']  = $cart_model->get_address_for_delivery_details($user_id);
        return view('delivery_deatil')->with(['deliveryDetails'=>$arrData['deliveryDetails']]);
    }


    public function ajax_delivery_deatil_update_user_address()
    {
        $user = Auth::user();
        $user_id = $user['id'];

        $txtAddress = Input::get('txtAddress');
        if($txtAddress !="" && $user_id !="")
        {
            $upToData["address1"]     = $txtAddress;
            $upToData["updated_at"]   = date('Y-m-d H:i:s');
        }
        $updatedFlag =  DB::table('users')->where('id',$user_id)->update($upToData);
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
        $user = Auth::user();
        $user_id = $user['id'];
        $cart_model = new Cart_model();
        $arrData['shoppingDetails']  = $cart_model->get_shopping_details($user_id);
        $arrData['deliveryDetails']  = $cart_model->get_address_for_delivery_details($user_id);
        return view('payment')->with(['shoppingDetails'=>$arrData['shoppingDetails'],'deliveryDetails'=>$arrData['deliveryDetails']]);

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
        $user = Auth::user();
        $user_id = $user['id'];
        $cart_model = new Cart_model();
        $shoppingDetails = $cart_model->get_shopping_details($user_id);
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

                $insertedFlag = DB::table('cart')->insert($arrAddData);

            }

            //die;
            $arrShippingAddData['sc_user_id']         = $user_id;
            $arrShippingAddData['sc_product_id']      = implode(',',$dataArray);
            $arrShippingAddData['sc_sub_total']       = Helpers::sub_total($user_id);
            $arrShippingAddData['sc_shipping_charge'] = Helpers::shipping_calculate(Helpers::sub_total($user_id));
            $arrShippingAddData['sc_total']           = Helpers::sub_total($user_id)+Helpers::shipping_calculate(Helpers::sub_total($user_id));
            $arrShippingAddData['sc_created_on']      = date('Y-m-d H:i:s');
            //  print_r($arrShippingAddData);
            $insertedShippingFlag = DB::table('shipping_cost')->insert($arrShippingAddData);

            // die;
            if ($insertedShippingFlag)
            {
                //delete temp_cart
                $delete = DB::table('temp_cart')->where('tc_user_id', $user_id)->delete();
                //$this->session->set_userdata('last_add_cart_product_id',);
                Session::set('last_add_cart_product_id', implode(',',$dataArray));
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
        $user = Auth::user();
        $user_id = $user['id'];
        $cart_model = new Cart_model();
        //echo "<pre>"; print_r(Session::get('last_add_cart_product_id')); die;
        //update cart_order_status
        $last_add_cart_product_id = Session::get('last_add_cart_product_id');
        $last_add_cart_product_id = explode(',',$last_add_cart_product_id);
        // print_r($last_add_cart_product_id);
        $shippingcostDetails = $cart_model->get_shipping_cost_details($user_id,Session::get('last_add_cart_product_id'));
        $orderDetails = $cart_model->get_order_pending_details($last_add_cart_product_id);
        //echo "<pre>";  print_r($shippingcostDetails); die;
       // echo "<pre>";  print_r($orderDetails); die;

        //echo   $orderDetails[0]['cart_created_on']; die;

        if(!empty($orderDetails)&& !empty($shippingcostDetails))
        {
            $upToData['cart_order_status']= 'success';
            foreach($shippingcostDetails as $val)
            {
                //echo $val['sc_created_on'].'<br>';
                $newDate = date("Y-m-d H", strtotime($val['sc_created_on']));
                //echo date("Y-m-d H");

                $updatedFlag =  DB::table('cart')->where('cart_user_id',$user_id)->whereIn('cart_product_id',$last_add_cart_product_id)->where('cart_created_on', 'LIKE', "%$newDate%")->update($upToData);

            }
        }
        else
        {
            $upToData['cart_order_status']= 'payment failed';
            $updatedFlag =  DB::table('cart')->where('cart_user_id',$user_id)->whereIn('cart_product_id',$last_add_cart_product_id)->update($upToData);

        }
        return view('success');

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
        $user = Auth::user();
        $user_id = $user['id'];
        $cart_model = new Cart_model();

        //update cart_order_status
        $last_add_cart_product_id =  Session::get('last_add_cart_product_id');
        $last_add_cart_product_id = explode(',',$last_add_cart_product_id);

        $upToData['cart_order_status']= 'payment failed';
        $updatedFlag =  DB::table('cart')->where('cart_user_id',$user_id)->whereIn('cart_product_id',$last_add_cart_product_id)->update($upToData);
        return view('cancellation');
    }



}
