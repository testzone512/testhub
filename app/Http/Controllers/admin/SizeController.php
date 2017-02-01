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
use App\Size_model;



class SizeController extends Controller
{
    public function __construct()
    {
        $this->middleware('admin');
    }
    public  function index()
    {
        $size_model = new Size_model();
        $arrData['sizeDetails']	= $size_model->get_size_details_for_listing();
        return view('admin.template')->with(['middle' => 'admin/size/list','sizeDetails' =>   $arrData['sizeDetails']]);
    }
    public function add()
    {
        if(Input::get('btnAddSize'))
        {
            $arrSizeData["size_name"]        = Input::get('txtSizeName');
            $arrSizeData["size_created_on"]  = date('Y-m-d H:i:s');

            $result = DB::table('size')->insert($arrSizeData);

            if($result)
            {
                Session::flash('success', 'Size Added Successfully !!');
                return Redirect::to('admin/size');
            }
            else
            {
                Session::flash('error', 'Failed to Add Size !!');
                return Redirect::to('admin/size/add');
            }

        }
        return view('admin.template')->with(['middle' => 'admin/size/add']);
    }


    public function edit($sizeId)
    {
        $size_model = new Size_model();
        $arrData['sizeDetail'] = $size_model->get_size_details_for_edit($sizeId);

        if(Input::get('btnEditSize'))
        {
            $upSizeData["size_name"]        = Input::get('txtSizeName');
            $upSizeData["size_updated_on"]  = date('Y-m-d H:i:s');
            //print_r($upProductData); die;
            //echo "<pre>"; print_r($updateData); die;

            $result = DB::table('size')->where('size_id', $sizeId)->update($upSizeData);
            if($result)
            {
                Session::flash('success', 'Size Updated Successfully !!');
                return Redirect::to('admin/size');
            }
            else
            {
                Session::flash('error', 'Failed to Updated Size !!');
                return Redirect::to('admin/size/edit/'.$sizeId);
            }

        }
        return view('admin.template')->with(['middle' => 'admin/size/edit','sizeDetail' =>   $arrData['sizeDetail']]);
    }

    public function delete($sizeId)
    {
        $delete = DB::table('size')->where('size_id', $sizeId)->delete();

        if ($delete)
            Session::flash('success', 'Data deleted Successfully !!');
        else
            Session::flash('error', 'Failed to delete Data !!');
        return Redirect::to('admin/size');
    }


}