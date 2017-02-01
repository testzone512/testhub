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
use Image;
use DB;
use Hash;
use Helpers;


class ProfileController extends Controller
{
	public function __construct()
	{
		$this->middleware('admin');
	}
	public  function index()
	{
		$userId = Session::get('admin_sess_id');
		$result =  DB::table('users')->select()->leftJoin('country','country.country_id','=','users.country_id')->leftJoin('state','state.state_id','=','users.state_id')->leftJoin('city','city.city_id','=','users.city_id')->where('id',$userId)->get();
		//print_r($result); die;
		return view('admin.template')->with(['middle' => 'admin/profile/viewprofile','view_profile' => $result]);

	}
  public function editProfile()
  {
	  $userId = Session::get('admin_sess_id');
	  $result=DB::table('users')->where('id',$userId)->get();
	  $countryDataArr = Helpers::GetAllCommon("country","country_name");
	  $countryKeyValueArr	= Helpers::GetKeyValueArrayCommon($countryDataArr, "country_id", "country_name", "Select Country");
	  
	  $stateDataArr = ProfileController::get_state_based_on_country($result[0]['country_id']);
	  $stateKeyValueArr	= Helpers::GetKeyValueArrayCommon($stateDataArr, "state_id", "state_name", "Select State");
	  
	  $cityDataArr = ProfileController::get_city_based_on_state($result[0]['state_id']);
	  $cityKeyValueArr	= Helpers::GetKeyValueArrayCommon($cityDataArr, "city_id", "city_name", "Select City");

	  
	  if(Input::get('btnUpdate'))
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
			  $prev_file =  $result[0]['profile_pic'];

			  if($prev_file !='' &&  file_exists(public_path('upload/profile/').$prev_file)){
				  unlink(public_path('upload/profile/'.$prev_file));
			  }
			  if($prev_file !='' &&  file_exists(public_path('upload/profile/thumb/').$prev_file)){
				  unlink(public_path('upload/profile/thumb/'.$prev_file));
			  }
			  $updata['profile_pic']    = $name;

		  }
		  $updata['name']		=Input::get('txtFirstName').' '.Input::get('txtLastName');
 		  $updata['introduction']	=Input::get('txtAboutMe');
 		  $updata['address1']		=Input::get('txtAddress');
 		  $updata['mobile']			=Input::get('txtMobile');
 		  $updata['email']			=Input::get('txtEmail');
 		  $updata['country_id']		=Input::get('cmbCountry');
 		  $updata['state_id']		=Input::get('cmbState');
 		  $updata['city_id']		=Input::get('cmbCity');
 		  $updata['is_admin']		=Input::get('cmbIsAdmin');
		  $result = DB::table('users')->where('id', $userId)->update($updata);
			if($result)
			{
				Session::flash('success', 'Profile Detail Updated Successfully');
				return Redirect::to('/admin/profile/editProfile/');
			}
		  else
		  {
			  Session::flash('error', 'Failed to Updated Profile Detail');
			  return Redirect::to('/admin/profile/editProfile/');
		  }

	  }
	  return view('admin.template')->with(['middle' => 'admin/profile/editprofile','profile_data' => $result,'countryKeyValueArr'=> $countryKeyValueArr,'stateKeyValueArr'=>$stateKeyValueArr,'cityKeyValueArr'=>$cityKeyValueArr]);


	  // echo "<pre>"; print_r($stateKeyValueArr);
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

	public function ajaxGetStateOnCountry()
	{
		$countryId = $_POST['countryId'];
		$arrResult =  ProfileController::get_state_based_on_country($countryId);

		echo json_encode($arrResult);

	}

	public function ajaxGetCityOnState()
	{
		$stateId = $_POST['stateId'];
		$arrResult =  ProfileController::get_city_based_on_state($stateId);

		echo json_encode($arrResult);

	}
}