<?php
namespace App;
use Illuminate\Database\Eloquent\Model;
use DB;


class Slider_model extends Model
{
    protected $table = 'category';


    public function get_slider_details($sliderId=0)
    {
        $query=DB::table('slider');
        if($sliderId !=0)
        {
            $query->where('slider_id', $sliderId);
        }
        $objQuery = $query->get();
        //print_r($catstan);
        return $objQuery;
    }


}


?>