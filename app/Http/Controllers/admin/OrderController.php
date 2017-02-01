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
use App\Order_model;



class OrderController extends Controller
{
    public function __construct()
    {
        $this->middleware('admin');
    }
    public  function index()
    {
        $order_model = new Order_model();
        $arrData['orderDetails']    = $order_model->get_order_details();
        return view('admin.template')->with(['middle' => 'admin/order/list','orderDetails' =>   $arrData['orderDetails']]);

    }



    public function view($orderId)
    {
        $order_model = new Order_model();
        $arrData['viewOrder']    = $order_model->get_order_details($orderId);

        return view('admin.template')->with(['middle' => 'admin/order/view','viewOrder' =>   $arrData['viewOrder']]);
    }


    public function delete($testimonialId)
    {
        $delete = DB::table('testimonial')->where('testimonial_id', $testimonialId)->delete();

        if ($delete)
            Session::flash('success', 'Data deleted Successfully !!');
        else
            Session::flash('error', 'Failed to delete Data !!');
        return Redirect::to('admin/testimonial');
    }


}