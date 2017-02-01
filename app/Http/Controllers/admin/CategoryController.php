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
use Helpers;


class CategoryController extends Controller
{
    public function __construct()
    {
        $this->middleware('admin');
    }
	public  function index()
    {
        $arrParentCat		= array();
        $arrParentCat['0']	= '---';

        //$arrData['categoryDetails']	= $this->category_model->get_category_details();
        $arrData['categoryDetails'] =DB::table('category')->get();

        foreach($arrData['categoryDetails'] as $catDetails){
            $arrParentCat[$catDetails['category_id']]	= $catDetails['category_name'];
        }
        $arrData['arrParentCat']	= $arrParentCat;
        $arrData['middle']			= 'admin/category/listcategory';
        return view('admin.template')->with(['middle' => 'admin/category/list','categoryDetails' =>   $arrData['categoryDetails'],'arrParentCat'=>$arrData['arrParentCat']]);

    }
    public function add()
    {
        if(Input::get('cmbSubmit'))
        {

            $indata['category_parent_id']   = Input::get('cmbMainCat');
            $indata['category_name']	    = Input::get('txtCategoryName');
            $indata["category_created_on"]	= date('Y-m-d H:i:s');
            $result = DB::table('category')->insert($indata);
            if($result)
            {
                Session::flash('success', 'Category Added Successfully !!');
                return Redirect::to('admin/category/add');
            }
            else
            {
                Session::flash('error', 'Failed to Add Category !!');
                return Redirect::to('admin/category/add');
            }

        }

        // Main Category Details START
        $categoryDetails =DB::table('category')->get();

        $catDetails[0] = "--- Select Main Category ---";

        foreach($categoryDetails as $category){
            $catDetails[$category['category_id']] = $category['category_name'];
        }

        $arrData['catDetails'] = $catDetails ;

        return view('admin.template')->with(['middle' => 'admin/category/add','catDetails' => $arrData['catDetails']]);


        // echo "<pre>"; print_r($stateKeyValueArr);
    }

    public function edit($id)
    {
        $catDetails = array();

        $arrData['categoryDetails'] =DB::table('category')->where('category_id',$id)->get();

        $categoryDetails =DB::table('category')->get();

        $catDetails[0] = "---";

        foreach($categoryDetails as $category){
            $catDetails[$category['category_id']] = $category['category_name'];
        }

        $arrData['catDetails'] = $catDetails ;

        if(Input::get('cmbSubmit'))
        {

            $updata['category_parent_id']   = Input::get('cmbMainCat');
            $updata['category_name']	    = Input::get('txtCategoryName');
            $updata["category_updated_on"]	= date('Y-m-d H:i:s');
            $result = DB::table('category')->where('category_id', $id)->update($updata);
            if($result)
            {
                Session::flash('success', 'category updated Successfully !!');
                return Redirect::to('admin/category/edit/'.$id);
            }
            else
            {
                Session::flash('error', 'Failed to updated category !!');
                return Redirect::to('admin/category/edit/'.$id);
            }

        }

        return view('admin.template')->with(['middle' => 'admin/category/edit','catDetails' => $arrData['catDetails'],'categoryDetails'=>$arrData['categoryDetails']]);


        // echo "<pre>"; print_r($stateKeyValueArr);
    }
    public function delete($iCategoryId)
    {
        $dependency =CategoryController::checkcategoryDependencies($iCategoryId);
        if($dependency=='')
        {
            $delete = DB::table('category')->where('category_id', $iCategoryId)->delete();

            if ($delete)
                Session::flash('success', 'Data deleted Successfully !!');
            else
                Session::flash('error', 'Failed to delete Data !!');
        }
        else
        {
            Session::flash('error', "This category cannot be deleted. It has dependiences in following tables : <br/>".$dependency);
        }

        return Redirect::to('admin/category');
    }


    function checkcategoryDependencies($iCategoryId)
    {
        $message = '';

        $arrAccount =DB::table('category')->where('category_parent_id',$iCategoryId)->get();
        //print_r($arrAccount); die;
        if(count($arrAccount) > 0)
            $message .= "Category Module<br>";

        return $message;
    }
}