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
use App\Cms_model;



class CmsController extends Controller
{
    public function __construct()
    {
        $this->middleware('admin');
    }
    public  function index()
    {
        $cms_model = new Cms_model();
        $arrData['cmsDetails']	= $cms_model->get_cms_details_for_listing();
        return view('admin.template')->with(['middle' => 'admin/cms/list','cmsDetails' =>   $arrData['cmsDetails']]);

    }
    public function add()
    {
        if(Input::get('btnAddCms'))
        {

            $arrCmsData["cms_title"]        = Input::get('txtCmsTitle');
            $arrCmsData["cms_description"]  = Input::get('txtCmsDes');
            $arrCmsData["cms_created_on"]   = date('Y-m-d H:i:s');

            $result = DB::table('cms')->insert($arrCmsData);

            if($result)
            {
                Session::flash('success', 'Cms Added Successfully !!');
                return Redirect::to('admin/cms');
            }
            else
            {
                Session::flash('error', 'Failed to Add Cms !!');
                return Redirect::to('admin/cms/add');
            }

        }

        return view('admin.template')->with(['middle' => 'admin/cms/add']);

        // echo "<pre>"; print_r($stateKeyValueArr);
    }

    public function edit($cmsId)
    {
        $cms_model = new Cms_model();
        $arrData['cmsDetail'] = $cms_model->get_cms_details_for_edit($cmsId);
        if (Input::get('btnEditCms'))
        {
                $upCmsData["cms_title"]        = Input::get('txtCmsTitle');
                $upCmsData["cms_description"]  = Input::get('txtCmsDes');
                $upCmsData["cms_updated_on"]   = date('Y-m-d H:i:s');
                //print_r($upProductData); die;
            $result = DB::table('cms')->where('cms_id', $cmsId)->update($upCmsData);
            if($result)
            {
                Session::flash('success', 'Cms Updated Successfully !!');
                return Redirect::to('admin/cms');
            }
            else
            {
                Session::flash('error', 'Failed to Updated Cms !!');
                return Redirect::to('admin/cms/edit/'.$cmsId);
            }
        }
        return view('admin.template')->with(['middle' => 'admin/cms/edit','cmsDetail' =>   $arrData['cmsDetail']]);
    }
    public function view($cmsId)
    {
        $cms_model = new Cms_model();
        $arrData['cmsDetails'] = $cms_model->get_cms_details_for_edit($cmsId);
        return view('admin.template')->with(['middle' => 'admin/cms/view','cmsDetails' =>   $arrData['cmsDetails']]);
    }
    public function delete($cmsId)
    {

        $delete = DB::table('cms')->where('cms_id', $cmsId)->delete();

        if ($delete)
            Session::flash('success', 'Data deleted Successfully !!');
        else
            Session::flash('error', 'Failed to delete Data !!');
        return Redirect::to('admin/cms');
    }


}