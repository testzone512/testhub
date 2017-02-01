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

class AccountController extends Controller 
{
	  public function login()
	  {
			// Getting all post data
			$data = Input::all();
			// Applying validation rules.
			$rules = array(
				'txtEmail' => 'required|email',
				'txtPassword' => 'required|min:6',
				 );
			$validator = Validator::make($data, $rules);
			if ($validator->fails())
			{
			  // If validation falis redirect back to login.
			  return Redirect::to('admin')->withInput(Input::except('txtPassword'))->withErrors($validator);
			}
			else
			{
					$userdata = array(
					'email' => Input::get('txtEmail'),
					'password' => Input::get('txtPassword')
				  );
			  	// doing login.
				  if (Auth::validate($userdata))
				  {
						if (Auth::attempt($userdata))
						{
							 $pass = Hash::make(Input::get('txtPassword'));
							 $result=DB::table('users')->where('email',Input::get('txtEmail'))->get();
							 //echo"<pre>";		   print_r($result); die;
							if($result[0]['activation_pending'] == 0)
							{
								Session::put('sess_user_id', '');
								Session::put('sess_user_email', '');
								Session::put('sess_user_logged_user_in', 0);
								return Redirect::to('/admin')->withInput()->with('error', 'Your Account is not activated.');
							}
							else
							{
								Session::put('sess_user_id', $result[0]['id']);
								Session::put('sess_user_logged_user_in', 1);
								Session::put('sess_user_firstname', $result[0]['firstname']);
								Session::put('sess_user_lastname', $result[0]['lastname']);
								Session::put('sess_user_introduction', $result[0]['introduction']);
								Session::put('sess_user_profile_pic', $result[0]['profile_pic']);
								Session::put('sess_user_mobile', $result[0]['mobile']);
								Session::put('sess_user_address1', $result[0]['address1']);
								Session::put('sess_user_username', $result[0]['username']);
								Session::put('sess_user_email', $result[0]['email']);
								Session::put('sess_user_is_admin', $result[0]['is_admin']);
								Session::put('sess_user_activation_pending', $result[0]['activation_pending']);
								return view('admin.template')->with(['middle' => 'admin/dashboard']);
							}
						}
				  }
				  else
				  {
					// if any error send back with message.
				   return Redirect::to('admin')->withInput()->with('error', 'Something went wrong.');

				  }
			}
	  }

	public function logout()
	{
		//Auth::logout(); // log the user out of our application
		//return Redirect::to('/admin'); // redirect the user to the login screen.
		Auth::logout();
		Session::flush();
		return redirect('admin');
	}
}