<?php
namespace App;
use Illuminate\Database\Eloquent\Model;
use DB;


class Gallery_model extends Model
{
    protected $table = 'category';


    public function get_gallery_details_using_productId($productId)
    {
        $query=DB::table('gallery');
        $query->join('product','product.product_id','=','gallery.gallery_product_id');
        if($productId)
        {
            $query->where('gallery_product_id', $productId);
        }
        $objQuery = $query->get();
        //print_r($catstan);
        return $objQuery;
    }


    public function get_gallery_details_using_galleryId($galleryId)
    {
        $query=DB::table('gallery');
        if($galleryId)
        {
            $query->where('gallery_id', $galleryId);
        }
        $objQuery = $query->get();
        //print_r($catstan);
        return $objQuery;
    }

}


?>