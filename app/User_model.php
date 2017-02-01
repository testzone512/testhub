<?php
namespace App;
use Illuminate\Database\Eloquent\Model;
use DB;
use Session;


class User_model extends Model
{
    protected $table = 'category';


    public function get_user_details_for_listing()
    {
        $query=DB::table('users');
        if(Session::get('admin_sess_is_admin')==0)
        {
            $query->where('id', Session::get('admin_sess_id'));
        }
        $query->orderBy('id','desc');
        $objQuery = $query->get();
        return $objQuery;

    }


    public function get_user_details_for_view($userId)
    {
        $query=DB::table('users');
        $query->leftjoin('country','country.country_id','=','users.country_id');
        $query->leftjoin('state','state.state_id','=','users.state_id');
        $query->leftjoin('city','city.city_id','=','users.city_id');
        if($userId != 0)
        {
            $query->where('id', $userId);
        }
        $objQuery = $query->get();
        //print_r($objQuery); die;
        return $objQuery;
    }




}


?>