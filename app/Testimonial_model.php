<?php
namespace App;
use Illuminate\Database\Eloquent\Model;
use DB;


class Testimonial_model extends Model
{
    protected $table = 'category';


    public function get_testimonial_details($testimonialId=0)
    {
        $query=DB::table('testimonial');
        if($testimonialId !=0)
        {
            $query->where('testimonial_id', $testimonialId);
        }
        $objQuery = $query->get();
        //print_r($catstan);
        return $objQuery;
    }


}


?>