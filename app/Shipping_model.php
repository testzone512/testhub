<?php
namespace App;
use Illuminate\Database\Eloquent\Model;
use DB;


class Shipping_model extends Model
{
    protected $table = 'category';


    public function get_shipping_details($shippingId=0)
    {
        $query=DB::table('shipping');
        if($shippingId !=0)
        {
            $query->where('shipping_id', $shippingId);
        }
        $objQuery = $query->get();
        //print_r($catstan);
        return $objQuery;
    }

    public function get_size_details_for_edit($sizeId = 0)
    {
        $query=DB::table('size');
        if($sizeId !=0)
        {
            $query->where('size_id', $sizeId);
        }
        $objQuery = $query->get();
        //print_r($catstan);
        return $objQuery;
    }
}


?>