<?php
namespace App;
use Illuminate\Database\Eloquent\Model;
use DB;


class Cms_model extends Model
{
    protected $table = 'category';


    public function get_cms_details_for_listing()
    {
        $objQuery=DB::table('cms')->orderBy('cms_id','desc')->get();
        return $objQuery;
    }


    public function get_cms_details_for_edit($cmsId = 0)
    {
        $query=DB::table('cms');
        if($cmsId !=0)
        {
            $query->where('cms_id', $cmsId);
        }
        $objQuery = $query->get();
        //print_r($catstan);
        return $objQuery;
    }




}


?>