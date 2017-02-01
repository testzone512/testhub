<?php
namespace App;
use Illuminate\Database\Eloquent\Model;
use DB;


class Blog_model extends Model
{
    protected $table = 'category';


    public function get_blog_details($blogId = 0)
    {
        $query=DB::table('blog');
        if($blogId !=0)
        {
            $query->where('blog_id', $blogId);
        }
        $objQuery = $query->get();
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



    /**
     * get_blog_details
     *
     * This is used to get blog details
     *
     * @author	Chintan Bhimani
     * @access	public
     * @param   integer-$blogId
     * @return void
     */
    function get_front_blog_details($blogId = 0){

        $query = DB::table('blog');
        if($blogId !=0)
        {
            $query->where('blog_id', $blogId);
        }
        $query->orderBy('blog_created_on','desc');
        $query->limit(6);
        $objQuery =  $query->get();
        //echo "<pre>"; print_r($objQuery); die;
        return $objQuery;

    }


}


?>