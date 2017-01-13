<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Cart_model extends CI_Model
{

    public function __construct()
    {
        $this->load->database('default');
        $this->load->library('session');

        // Call the Model constructor
        parent::__construct();
    }
    /**
     * save_temp_cart
     *
     * This is used to save temp_cart
     *
     * @author	Nilesh Dabhi
     * @access	public
     * @param   array-$arrData
     * @return void
     */
    function save_temp_cart($arrToCartData)
    {

        if ($this->db->insert('temp_cart', $arrToCartData))
        {
            return true;
        } else
        {
            return false;
        }
    }

    /**
     * update_temp_cart
     *
     * This is used to update temp cart qty(duplicate product add then update only qty)
     *
     * @author	Nilesh Dabhi
     * @access	public
     * @param   array-$upToCartData, integer-$cart_id
     * @return void
     */
    function update_temp_cart($upToCartData,$user_id,$productId,$size) {

        $this->db->where('tc_user_id', $user_id);
        $this->db->where('tc_product_id', $productId);
        $this->db->where('tc_product_size', $size);

        if ($this->db->update('temp_cart', $upToCartData)) {
            return true;
        } else {
            return false;
        }
    }


    /**
     * temp_update_qty_cart
     *
     * This is used to update qty equal to cart_id in temp_cart(table)(when shopping_cart page on qty dropdown then this method call)
     *
     * @author	Nilesh Dabhi
     * @access	public
     * @param   array-$upToCartData, integer-$cart_id
     * @return void
     */
    function temp_update_qty_cart($upToCartData,$cart_id) {

        $this->db->where('tc_id', $cart_id);

        if ($this->db->update('temp_cart', $upToCartData)) {
            return true;
        } else {
            return false;
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

        if($this->db->delete('temp_cart', array('tc_id' => $tc_id)))
        {
            return true;
        }
        else
        {
            return false;
        }
    }


    /*
     * get_shopping_details_useing_productId
     *
     * This is used to get shopping detail data equal to user_id from temp_cart(table)
     *
     * @author	Nilesh Dabhi
     * @access	public
     * @param   array-$arrData
     * @return void
     */


    function get_shopping_details_useing_productId($productId)
    {

        $this->db->select('*');
        $this->db->where('tc_product_id', $productId);
        $objQuery = $this->db->get('temp_cart');

        //$this->db->last_query();

        return $objQuery->result_array();

    }



    /*
     * get_shopping_details
     *
     * This is used to get shopping detail data equal to user_id from temp_cart(table)
     *
     * @author	Nilesh Dabhi
     * @access	public
     * @param   array-$arrData
     * @return void
     */


    function get_shopping_details($user_id)
    {

        $this->db->select('*');
        $this->db->where('tc_user_id', $user_id);
        $objQuery = $this->db->get('temp_cart');

        //$this->db->last_query();

        return $objQuery->result_array();

    }

     /**
     * get_address_for_delivery_details
     *
     * This is used to get user address equal to user_id from users(table)
     *
     * @author	Nilesh Dabhi
     * @access	public
     * @param   integer-$user_id
     * @return void
     */
    function get_address_for_delivery_details($user_id)
    {
        $this->db->select('*');
        $this->db->where('user_id', $user_id);
        $objQuery = $this->db->get('users');
        return $objQuery->result_array();
    }

    /**
     * delivery_deatil_update_user_address
     *
     * This is used to update user address detail in users(table)
     *
     * @author	Nilesh Dabhi
     * @access	public
     * @param   array-$upToData, integer-$user_id
     * @return void
     */
    function delivery_deatil_update_user_address($user_id,$upToData) {

        $this->db->where('user_id', $user_id);

        if ($this->db->update('users', $upToData)) {
            return true;
        } else {
            return false;
        }
    }

    /*
     * save_confirm_order
     *
     * this is used to add confirm order in cart(table)
     *
     * @author	Nilesh Dabhi
     * @access	public
     * @param   array-$arrAddData
     * @return void
     */
    function save_confirm_order($arrAddData)
    {

        if ($this->db->insert('cart', $arrAddData))
        {
            return true;
        } else
        {
            return false;
        }
    }


    /*
     * save_shipping_cost
     *
     * this is used to add shipping cost data in shipping_cost(table)
     *
     * @author	Nilesh Dabhi
     * @access	public
     * @param   array-$arrShippingAddData
     * @return void
     */
    function save_shipping_cost($arrShippingAddData)
    {

        if ($this->db->insert('shipping_cost', $arrShippingAddData))
        {
            return true;
        } else
        {
            return false;
        }
    }


    /**
     * delete_temp_cart
     *
     * This is used to delete temp cart detail data
     *
     * @author	Nilesh Dabhi
     * @access	public
     * @param   integer-$user_id
     * @return void
     */
    function delete_temp_cart($user_id)
    {

        if($this->db->delete('temp_cart', array('tc_user_id' => $user_id)))
        {
            return true;
        }
        else
        {
            return false;
        }
    }


   /*
    * get_order_pending_details
    *
    * This is used to get pending order equal to product_id from cart(table)
    *
    * @author	Nilesh Dabhi
    * @access	public
    * @param   integer-$product_id
    * @return void
    */
    function get_order_pending_details($product_id)
    {
        $this->db->select('*');
        $this->db->where_in('cart_product_id', $product_id);
        $this->db->where('cart_order_status','pending');
        $objQuery = $this->db->get('cart');
        return $objQuery->result_array();
    }

    /*
    * get_shipping_cost_details
    *
    * This is used to get cost shopping detail data
    *
    * @author	Nilesh Dabhi
    * @access	public
    * @param   array-$arrData
    * @return void
    */
    function get_shipping_cost_details($user_id,$last_add_cart_product_id)
    {
        $this->db->select('*');
        $this->db->where('sc_user_id', $user_id);
        $this->db->where('sc_product_id', $last_add_cart_product_id);
        $objQuery = $this->db->get('shipping_cost');
        return $objQuery->result_array();
    }

  /*
   * update_cart_order_status
   *
   * This is used to update oreder status in cart(table)
   *
   * @author	Nilesh Dabhi
   * @access	public
   * @param   array-$upToData,integer-$user_id,$last_add_cart_product_id,$newDate
   * @return void
   */
    function update_cart_order_status($user_id,$last_add_cart_product_id,$newDate,$upToData)
    {
        $this->db->where('cart_user_id', $user_id);
        $this->db->where_in('cart_product_id', $last_add_cart_product_id);
        $this->db->like('cart_created_on', $newDate);

        if ($this->db->update('cart', $upToData))
        {
            return true;
        }
        else
        {
            return false;
        }
    }
	
	
  /*
   * update_payment_failed_order_status
   *
   * This is used to if payment fail then this function call
   *
   * @author	Nilesh Dabhi
   * @access	public
   * @param   array-$upToData,integer-$user_id,$last_add_cart_product_id,
   * @return void
   */
    function update_payment_failed_order_status($user_id,$last_add_cart_product_id,$upToData)
    {
        $this->db->where('cart_user_id', $user_id);
        $this->db->where_in('cart_product_id', $last_add_cart_product_id);

        if ($this->db->update('cart', $upToData))
        {
            return true;
        }
        else
        {
            return false;
        }
    }

  /*
   * update_qty_minus_product
   *
   * This is used to update qty minus product(table)
   *
   * @author	Nilesh Dabhi
   * @access	public
   * @param   array-$arrAddProductData,integer-$product_id
   * @return void
   */
    function update_qty_minus_product($product_id,$arrAddProductData)
    {
      //  print_r($arrAddProductData);
       // echo $dataArr;
      //  die;
        $this->db->where('product_id', $product_id);

        if ($this->db->update('product', $arrAddProductData)) {
            return true;
        } else {
            return false;
        }
    }



    /*
   * get_shipping_cost_details
   *
   * This is used to get cost shopping detail data
   *
   * @author	Nilesh Dabhi
   * @access	public
   * @param   array-$arrData
   * @return void
   */
    function size_found_in_tempcart($user_id,$product_id,$sltsize)
    {
        $this->db->select('*');
        $this->db->where('tc_user_id', $user_id);
        $this->db->where('tc_product_id', $product_id);
        $this->db->where('tc_product_size', $sltsize);
        $objQuery = $this->db->get('temp_cart');
        return $objQuery->result_array();
    }






    /*
   * get_cart_temp_detail_using_tcId
   *
   * This is used to get cart_temp detail data
   *
   * @author	Nilesh Dabhi
   * @access	public
   * @param   array-$arrData
   * @return void
   */
    function get_cart_temp_detail_using_tcId($tc_id)
    {
        $this->db->select('*');
        $this->db->where('tc_id', $tc_id);
        $objQuery = $this->db->get('temp_cart');
        return $objQuery->result_array();
    }





}
?>