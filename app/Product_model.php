<?php
namespace App;
use Illuminate\Database\Eloquent\Model;
use DB;


class Product_model extends Model
{
    protected $table = 'category';


    public function get_product_for_edit($productId=0)
    {
        $query=DB::table('product');
        if($productId != 0)
        {
            $query->where('product_id', $productId);
        }
        $objQuery = $query->get();
        //print_r($catstan);
        return $objQuery;
    }

    public function get_product_details_for_edit($productId = 0)
    {
        $query=DB::table('product_detail');
        if($productId != 0)
        {
            $query->where('pd_product_id', $productId);
        }
        $objQuery = $query->get();
        //print_r($catstan);
        return $objQuery;
    }

    public function get_product_details_for_view($productId)
    {
        $query=DB::table('product');
        $query->join('category','category.category_id','=','product.product_category_id');
        if($productId != 0)
        {
            $query->where('product_id', $productId);
        }
        $objQuery = $query->get();
        //print_r($catstan);
        return $objQuery;
    }



}


?>