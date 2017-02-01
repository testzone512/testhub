<?php
namespace App;
use Illuminate\Database\Eloquent\Model;
use DB;


class Colour_model extends Model
{
    protected $table = 'category';


    public function get_colour_details($colourId = 0)
    {
        $query = DB::table('colour');
            if($colourId != 0)
            {
               $query->where('colour_id', $colourId);
            }
          $objQuery =  $query->get();
        return $objQuery;
    }
    public function get_chiled_category($child, $dot, $i)
    {
        $catstan = array();

        $objQuery=DB::table('category')->where('category_parent_id',$child)->orderBy('category_parent_id','asc')->get();
        foreach ($objQuery as $catdt)
        {
            $catstan[$i]['category_name'] = $dot . $catdt['category_name'];
            $catstan[$i]['category_id'] = $catdt['category_id'];
            $catstan[$i]['category_parent_id'] = $catdt['category_parent_id'];

            $data =Category_model::get_chiled_category($catdt['category_id'], '- ' . $dot, $i);
            //print_r($data);
            if (count($data) != 0) {
                $i = count($data);
            } else {

            }
            $i++;
            $finalaa = array_merge($catstan, $data);
            $catstan = array();
            $catstan = $finalaa;
        }
        return $catstan;
    }
}


?>