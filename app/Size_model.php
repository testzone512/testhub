<?php
namespace App;
use Illuminate\Database\Eloquent\Model;
use DB;


class Size_model extends Model
{
    protected $table = 'category';


    public function get_size_details_for_listing()
    {
        $objQuery = DB::table('size')->orderBy('size_id','desc')->get();
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


    public function get_shop_size_detail()
    {
        $query = DB::table('size');
        $objQuery =  $query->get();
        //echo "<pre>"; print_r($objQuery); die;
        return $objQuery;
    }

}





?>