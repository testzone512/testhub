<?php
namespace App;
use Illuminate\Database\Eloquent\Model;
use DB;


class Register_model extends Model
{
    protected $table = 'category';


    public function get_user_details_for_edit($userId)
    {
        $query=DB::table('users');
        if($userId != 0)
        {
            $query->where('id', $userId);
        }
        $objQuery = $query->get();
        //print_r($catstan);
        return $objQuery;

    }

}


?>