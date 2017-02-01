<?php
namespace App\Http\Controllers\admin;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Redirect;
use Session;
use Illuminate\Http\Request;
use View;
use DB;
use Hash;
use Image;
use Helpers;
use App\User_model;



class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('admin');
    }
    public  function index()
    {
        $user_model = new User_model();
        $arrData['userDetails']	= $user_model->get_user_details_for_listing();
        return view('admin.template')->with(['middle' => 'admin/user/list','userDetails' =>   $arrData['userDetails']]);

    }
    public function view($userId)
    {
        $user_model = new User_model();
        $arrData['userDetails']	= $user_model->get_user_details_for_view($userId);

        return view('admin.template')->with(['middle' => 'admin/user/view','userDetails' =>   $arrData['userDetails']]);

    }

    public function edit($userId)
    {
         //print_r($this->session->userdata()); die;
        //echo "hi"; die;
        $user_model = new User_model();

        $arrData['userDetails']	= $user_model->get_user_details_for_view($userId);

        $countryDataArr = Helpers::GetAllCommon("country","country_name");
        $countryKeyValueArr	= Helpers::GetKeyValueArrayCommon($countryDataArr, "country_id", "country_name", "Select Country");

        $stateDataArr = UserController::get_state_based_on_country($arrData['userDetails'][0]['country_id']);
        $stateKeyValueArr	= Helpers::GetKeyValueArrayCommon($stateDataArr, "state_id", "state_name", "Select State");

        $cityDataArr = UserController::get_city_based_on_state($arrData['userDetails'][0]['state_id']);
        $cityKeyValueArr	= Helpers::GetKeyValueArrayCommon($cityDataArr, "city_id", "city_name", "Select City");


        if(Input::get('btnUpdate'))
        {
                $file = Input::file('userImage');
                //$imagename = time().'.'.$file->getClientOriginalExtension();
                $name = time()."-".$file->getClientOriginalName();

                $destinationPath = public_path('\upload\profile\thumb');
                $thumb_img = Image::make($file->getRealPath())->resize(150, 150);
                $thumb_img->save($destinationPath.'/'.$name,80);



                $destinationPath = public_path().'\upload\profile';
                $file->move($destinationPath,$name);
                $prev_file = $arrData['userDetails'][0]['profile_pic'];

                if($prev_file !='' &&  file_exists(public_path('upload/profile/').$prev_file)){
                    unlink(public_path('upload/profile/'.$prev_file));
                }
                if($prev_file !='' &&  file_exists(public_path('upload/profile/thumb/').$prev_file)){
                    unlink(public_path('upload/profile/thumb/'.$prev_file));
                }

                $updateData["profile_pic"]      = $name;
                $updateData['name']	            = Input::get('txtFirstName').' '.Input::get('txtLastName');
                $updateData['introduction']		= Input::get('txtAboutMe');
                $updateData['address1']			= Input::get('txtAddress');
                $updateData['email']			= Input::get('txtEmail');
                $updateData['mobile']			= Input::get('txtMobile');
                $updateData['country_id']		= Input::get('cmbCountry');
                $updateData['state_id']			= Input::get('cmbState');
                $updateData['city_id']			= Input::get('cmbCity');
                if(Session::get('sess_user_is_admin')==1)
                {
                    $updateData['is_admin']			= Input::get('cmbIsAdmin');
                }
                //echo "<pre>"; print_r($updateData); die;
                $result = DB::table('users')->where('id', $userId)->update($updateData);
                if($result)
                {
                    Session::flash('success', 'User Detail Updated Successfully');
                    return Redirect::to('admin/user');
                }
                else
                {
                    Session::flash('error', 'Failed to Updated User Detail');
                    return Redirect::to('admin/user/edit/'.$userId);
                }

        }

        return view('admin.template')->with(['middle' => 'admin/user/edit','userDetails' =>$arrData['userDetails'],'countryKeyValueArr'=>$countryKeyValueArr,'stateKeyValueArr'=>$stateKeyValueArr,'cityKeyValueArr'=>$cityKeyValueArr]);

    }

    public function get_state_based_on_country($country_id)
    {
        $query = DB::table('state')->where('state_country_id',$country_id)->get();
        //echo "<pre>"; print_r($query); die;
        return $query;
    }

    public function get_city_based_on_state($state_id)
    {
        $query = DB::table('city')->where('city_state_id',$state_id)->get();
        //echo "<pre>"; print_r($query); die;
        return $query;
    }

    public function ajax_user_active_inactive()
    {
        $Action = Input::get('Action');
        $UserId = Input::get('UserId');

        if ($Action == 'Active')
        {
            $updata["activation_pending"]	= '0';
            $result = DB::table('users')->where('id', $UserId)->update($updata);
            if($result)
            {
                echo $Action;
            }
        }
        else
        {
            $updata["activation_pending"]	= '1';
            $result = DB::table('users')->where('id', $UserId)->update($updata);
            if($result)
            {
                echo $Action;
            }
        }
    }
    public function delete($userId)
    {
        $user_model = new User_model();
        $delete = DB::table('users')->where('id', $userId)->delete();
        $arrData['userDetails']	= $user_model->get_user_details_for_view($userId);
        if ($delete)
        {
            $prev_file = $arrData['userDetails'][0]['profile_pic'];

            if($prev_file !='' &&  file_exists(public_path('upload/profile/').$prev_file))
            {
                unlink(public_path('upload/profile/'.$prev_file));
            }
            if($prev_file !='' &&  file_exists(public_path('upload/profile/thumb/').$prev_file)){
                unlink(public_path('upload/profile/thumb/'.$prev_file));
            }

            Session::flash('success', 'Data deleted Successfully !!');
        }

        else
        {
            Session::flash('error', 'Failed to delete Data !!');
        }

        return Redirect::to('admin/user');
    }
}