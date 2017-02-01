<?php
namespace App;
use Illuminate\Database\Eloquent\Model;
use DB;


class Front_product_model extends Model
{
    protected $table = 'category';


    public function get_random_product()
    {
        $query = DB::table('product');
        $query->orderByRaw('RAND()');
        $query->limit(4);
        $objQuery =  $query->get();
        //echo "<pre>"; print_r($objQuery); die;
        return $objQuery;
    }
    public function get_recent_product()
    {
        $query = DB::table('product');
        $query->orderByRaw('RAND()');
        $query->orderBy('product_id','desc');
        $query->limit(8);
        $objQuery =  $query->get();
        //echo "<pre>"; print_r($objQuery); die;
        return $objQuery;

    }

    public function get_shop_product_detail($start_from,$num_rec_per_page)
    {
        $objQuery = DB::select("SELECT * FROM product as pro left join category as cat ON pro.product_category_id = cat.category_id left JOIN product_detail as pd ON pro.product_id = pd.pd_product_id LEFT JOIN size as sz ON pd.pd_product_size = sz.size_id ORDER BY product_id asc LIMIT $start_from, $num_rec_per_page");
        //echo "<pre>"; print_r($cards); die;
        return $objQuery;
    }

    public function get_product_details($productId)
    {
        $query=DB::table('product');
        $query->leftjoin('category','category.category_id','=','product.product_category_id');
        $query->leftjoin('product_detail','product_detail.pd_product_id','=','product.product_id');
        $query->where('product_id', $productId);
        $query->groupBy('product_id');
        $objQuery = $query->get();
        //echo "<pre>"; print_r($objQuery); die;
        return $objQuery;
    }

    public function get_product_gallery_details($productId)
    {
        $query=DB::table('gallery');
        $query->where('gallery_product_id', $productId);
        $objQuery = $query->get();
        //print_r($catstan);
        return $objQuery;
    }

    public function get_product_colour_details($productId)
    {
        $query=DB::table('colour');
        $query->join('product_detail','colour.colour_id','=','product_detail.pd_product_color');
        $query->where('pd_product_id', $productId);
        $query->groupBy('pd_product_id');
        $objQuery = $query->get();
        //print_r($catstan);
        return $objQuery;
    }

    public function get_product_size_details($productId)
    {
        $query=DB::table('size');
        $query->join('product_detail','size.size_id','=','product_detail.pd_product_size');
        $query->where('pd_product_id', $productId);
        $objQuery = $query->get();
        //print_r($catstan);
        return $objQuery;
    }
}


?>