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
use App\Shipping_model;



class ShippingController extends Controller
{
    public function __construct()
    {
        $this->middleware('admin');
    }
    public  function index()
    {
        $shipping_model = new Shipping_model();
        $arrData['shippingDetails'] = $shipping_model->get_shipping_details();
        return view('admin.template')->with(['middle' => 'admin/shipping/list','shippingDetails' =>   $arrData['shippingDetails']]);

    }
    public function add()
    {
        if(Input::get('btnAddShipping'))
        {
            $arrShippingData["shipping_from"]           = Input::get('txtShippingFrom');
            $arrShippingData["shipping_to"]             = Input::get('txtShippingTo');
            $arrShippingData["shipping_amount"]         = Input::get('txtShippingAmount');
            $arrShippingData["shipping_created_on"]     = date('Y-m-d H:i:s');


            $result = DB::table('shipping')->insert($arrShippingData);

            if($result)
            {
                Session::flash('success', 'Shipping Added Successfully !!');
                return Redirect::to('admin/shipping');
            }
            else
            {
                Session::flash('error', 'Failed to Add Shipping !!');
                return Redirect::to('admin/shipping/add');
            }

        }
        return view('admin.template')->with(['middle' => 'admin/shipping/add']);
    }


    public function edit($shippingId)
    {
        $shipping_model = new Shipping_model();
        $arrData['shippingDetails'] = $shipping_model->get_shipping_details($shippingId);
        if(Input::get('btnShippingUpdate'))
        {
            $UpdateData["shipping_from"]           = Input::get('txtShippingFrom');
            $UpdateData["shipping_to"]             = Input::get('txtShippingTo');
            $UpdateData["shipping_amount"]         = Input::get('txtShippingAmount');
            $UpdateData["shipping_updated_on"]     = date('Y-m-d H:i:s');
            //print_r($upProductData); die;
            //echo "<pre>"; print_r($updateData); die;

            $result = DB::table('shipping')->where('shipping_id',$shippingId)->update($UpdateData);
            if($result)
            {
                Session::flash('success', 'Shipping Updated Successfully !!');
                return Redirect::to('admin/shipping');
            }
            else
            {
                Session::flash('error', 'Failed to Updated Shipping !!');
                return Redirect::to('admin/shipping/edit/'.$shippingId);
            }

        }
        return view('admin.template')->with(['middle' => 'admin/shipping/edit','shippingDetails' =>   $arrData['shippingDetails']]);
    }

    public function delete($shippingId)
    {
        $delete = DB::table('shipping')->where('shipping_id', $shippingId)->delete();

        if ($delete)
            Session::flash('success', 'Data deleted Successfully !!');
        else
            Session::flash('error', 'Failed to delete Data !!');
        return Redirect::to('admin/shipping');
    }


}