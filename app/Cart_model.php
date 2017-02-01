<?php
namespace App;
use Illuminate\Database\Eloquent\Model;
use DB;


class Cart_model extends Model
{
    protected $table = 'category';

    public  function get_shopping_details_useing_productId($productId)
    {
        $query=DB::table('temp_cart');
        $query->where('tc_product_id', $productId);
        $objQuery = $query->get();
        //print_r($catstan);
        return $objQuery;

    }

    function size_found_in_tempcart($user_id,$product_id,$sltsize)
    {
        $query=DB::table('temp_cart');
        $query->where('tc_user_id', $user_id);
        $query->where('tc_product_id', $product_id);
        $query->where('tc_product_size', $sltsize);
        $objQuery = $query->get();
        //print_r($catstan);
        return $objQuery;
    }


    function get_shopping_details($user_id)
    {
        $query=DB::table('temp_cart');
        $query->where('tc_user_id', $user_id);
        $objQuery = $query->get();
        //print_r($catstan);
        return $objQuery;

    }


    function get_cart_temp_detail_using_tcId($tc_id)
    {
        $query=DB::table('temp_cart');
        $query->where('tc_id', $tc_id);
        $objQuery = $query->get();
        //print_r($catstan);
        return $objQuery;
    }

    function get_address_for_delivery_details($user_id)
    {
        $query=DB::table('users');
        $query->where('id', $user_id);
        $objQuery = $query->get();
        //print_r($catstan);
        return $objQuery;
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

        $query=DB::table('shipping_cost');
        $query->where('sc_user_id', $user_id);
        $query->where('sc_product_id', $last_add_cart_product_id);
        $objQuery = $query->get();

        //print_r($catstan);

        //$lastQuery = end($objQuery);
        return $objQuery;

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
        $query=DB::table('cart');
        $query->whereIn('cart_product_id', $product_id);
        $query->where('cart_order_status', 'pending');
        $objQuery = $query->get();
        //print_r($catstan);
        return $objQuery;
    }

}


?>