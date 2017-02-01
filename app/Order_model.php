<?php
namespace App;
use Illuminate\Database\Eloquent\Model;
use DB;


class Order_model extends Model
{
    protected $table = 'category';


    public function get_order_details($orderId=0)
    {
        $query=DB::table('shipping_cost');
        $query->join('users','users.id','=','shipping_cost.sc_user_id');
        $query->join('cart','cart.cart_product_id','=','shipping_cost.sc_product_id');
        if($orderId !=0)
        {
            $query->where('sc_id', $orderId);
        }
        $query->groupBy('cart_product_id');
        $objQuery = $query->get();
        //print_r($catstan);
        return $objQuery;
    }



    public function get_pending_order_details($userId)
    {
        $query=DB::table('cart');
        $query->leftJoin('colour','cart.cart_product_colour','=','colour.colour_id');
        $query->leftJoin('size','size.size_id','=','cart.cart_product_size');
        $query->leftJoin('users','users.id','=','cart.cart_user_id');
        if($userId !=0)
        {
            $query->where('cart_user_id', $userId);
        }
        $query->where('cart_order_status','pending');
        $objQuery = $query->get();
        //print_r($catstan);
        return $objQuery;
    }


    function view_pending_order_details($orderId='')
    {
        $query=DB::table('cart');
        $query->leftJoin('colour','cart.cart_product_colour','=','colour.colour_id');
        $query->leftJoin('size','size.size_id','=','cart.cart_product_size');
        $query->leftJoin('users','users.id','=','cart.cart_user_id');
        if($orderId !='')
        {
            $query->where('cart_id', $orderId);
        }
        $objQuery = $query->get();
        //print_r($catstan);
        return $objQuery;
    }

    public function get_past_order_details($userId)
    {

        $query=DB::table('cart');
        $query->leftJoin('colour','cart.cart_product_colour','=','colour.colour_id');
        $query->leftJoin('size','size.size_id','=','cart.cart_product_size');
        $query->leftJoin('users','users.id','=','cart.cart_user_id');
        if($userId !="")
        {
            $query->where('cart_user_id', $userId);
        }
        $query->where('cart_order_status','success');
        $objQuery = $query->get();
        //print_r($catstan);
        return $objQuery;

    }


}


?>