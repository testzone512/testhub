<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use View;
use DB;
use Session;
use Illuminate\Support\Facades\Redirect;
use Auth;
use Hash;
use Image;
use Helpers;
use App\Slider_model;
use App\Register_model;

class RegisterController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $user = Auth::user();
        //Session::put('username', $user->username);
        //echo $user['id']; die;
        $product_model = new Front_product_model();
        $arrData['productRandDetails'] = $product_model->get_random_product();
        $arrData['productRecentDetails'] = $product_model->get_recent_product();

        $slider_model = new Slider_model();
        $arrData['sliderDetails']   = $slider_model->get_slider_details();

        return view('home')->with(['sliderDetails' =>   $arrData['sliderDetails'],'productRandDetails'=> $arrData['productRandDetails'],'productRecentDetails'=> $arrData['productRecentDetails']]);
    }

    public function edit($userId)
    {
        $countryDataArr = Helpers::GetAllCommon("country","country_name");
        $countryKeyValueArr	= Helpers::GetKeyValueArrayCommon($countryDataArr, "country_id", "country_name", "Select Country");
        $arrData["countryKeyValueArr"]	= $countryKeyValueArr;

        $register_model = new Register_model();
        $arrData['userDetails'] = $register_model->get_user_details_for_edit($userId);
        //echo"<pre>"; print_r($arrData); die;
        if (Input::get('btnUpdate'))
        {

            $file = Input::file('profileImage');
            if($file)
            {
                //$imagename = time().'.'.$file->getClientOriginalExtension();
                $name = time()."-".$file->getClientOriginalName();

                $destinationPath = public_path('\upload\profile\thumb');
                $thumb_img = Image::make($file->getRealPath())->resize(150, 150);
                $thumb_img->save($destinationPath.'/'.$name,80);



                $destinationPath = public_path().'\upload\profile';
                $file->move($destinationPath,$name);
                $prev_file =  $arrData['userDetails'][0]['profile_pic'];

                if($prev_file !='' &&  file_exists(public_path('upload/profile/').$prev_file)){
                    unlink(public_path('upload/profile/'.$prev_file));
                }
                if($prev_file !='' &&  file_exists(public_path('upload/profile/thumb/').$prev_file)){
                    unlink(public_path('upload/profile/thumb/'.$prev_file));
                }
                $updateData['profile_pic']           = $name;


            }



            $updateData['name']                  = Input::get('txtFirstName').' '.Input::get('txtLastName');
            $updateData['email']                 = Input::get('txtEmail');
            $updateData['address1']              = Input::get('txtAddressLine1');
            $updateData['address2']              = Input::get('txtAddressLine2');
            $updateData['postcode']              = Input::get('txtPostCode');
            $updateData['country_id']            = Input::get('cmbCountry');
            $updateData['updated_at']            = date('Y-m-d h:i:s');

            $result = DB::table('users')->where('id', $userId)->update($updateData);
            if($result)
            {
                Session::flash('success', 'Personal Information Updated Successfully !!');
                return Redirect::to('register/edit/'.$userId);
            }
            else
            {
                Session::flash('error', 'Failed to Update Personal Information !!');
                return Redirect::to('register/edit/'.$userId);
            }

        }

        return view('user.editprofile')->with(['countryKeyValueArr'=>$arrData['countryKeyValueArr'],'userDetails'=>$arrData['userDetails']]);

    }
    public function changePassword()
    {
        if (Input::get('btnChangePassword'))
        {
            $date	= date("Y-m-d");

            $user = Auth::user();
            $password = $user['password'];
            if(Hash::check(Input::get('txtOldPassword'),$password))
            {
                $updateUserData["password"] = Hash::make(Input::get('txtNewPassword'));
                $updateUserData["updated_at"]    = date('Y-m-d h:i:s');

                $result = DB::table('users')->where('id', $user['id'])->update($updateUserData);
                if ($result) {
                    Session::flash('success', 'Password Updated Successfully !!');
                    return Redirect::to('register/changePassword');
                } else {
                    Session::flash('error', 'Failed to Update Password !!');
                    return Redirect::to('register/changePassword');
                }
            }

        }
        return view('user.changepassword');

    }

    public function isOldPasswordMatch()
    {
        ///echo $programDrillId;die;
        $user = Auth::user();
        $password = $user['password'];
        if(Input::get('txtOldPassword') != "")
        {
            if(Hash::check(Input::get('txtOldPassword'),$password))
            {
                echo "true";
            }
            else
            {
                echo "false";
            }

        }
        else
        {
            echo "true";  // purposely we are returning true
        }


    }
    public function isOldAndNewPasswordDiffrent()
    {
        $oldPassword	= Hash::make(Input::get('oldpassword'));
        $newPassword	= Hash::make(Input::get('newpassword'));
        //$player	= trim($_REQUEST['player']);

        if($oldPassword !='' && $newPassword!='')
        {
            $user = Auth::user();
            $password = $user['password'];

            if(Hash::check(Input::get('newpassword'),$password)){
                echo "false";
            } else {
                echo "true";
            }
        }
        else{
            echo "true";  // purposely we are returning true
        }
    }

    public function updateEmail()
    {
        if (Input::get('btnUpdateEmail'))
        {

            $updateUserData["email"]		    = Input::get('txtEmail');
            $updateUserData["updated_at"]       = date('Y-m-d h:i:s');

            //print_r($updateUserData); die;
            $user = Auth::user();
            $result = DB::table('users')->where('id',$user['id'])->update($updateUserData);
            if($result)
            {
                Session::flash('success', 'Email Updated Successfully !!');
                return Redirect::to('register/updateEmail');
            }
            else
            {
                Session::flash('error', 'Failed to Update Email !!');
                return Redirect::to('register/updateEmail');
            }
        }

        return view('user.updateemail');

    }
    public  function deactivateAccount()
    {
        if (Input::get('btnDeactivate'))
        {
            $user = Auth::user();
            $password = $user['password'];
            if(Hash::check(Input::get('txtPassword'),$password))
            {
                $updateUserData["activation_pending"]		= 0;
                $updateUserData["updated_at"]       = date('Y-m-d h:i:s');
            }
            $result = DB::table('users')->where('id',$user['id'])->update($updateUserData);
            if($result)
            {
                Session::flash('success', 'Account Deactivated Successfully !!');
                return Redirect::to('register/deactivateAccount');
            }
            else
            {
                Session::flash('error', 'Failed to Account Deactivated !!');
                return Redirect::to('register/deactivateAccount');
            }
        }
        return view('user.deactivateaccount');
    }

    public function isAccountDeactivatePasswordMatch()
    {
        $user = Auth::user();
        $password = $user['password'];
        if(Hash::check(Input::get('txtPassword'),$password))
        {
            echo "true";
        }
        else{
            echo "false";
        }

    }
}
