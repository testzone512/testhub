<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use View;
use DB;
use Auth;
use App\Order_model;

class OrderController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //$this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = Auth::user();
        $user_id = $user['id'];
        $order_model = new Order_model();
        $arrData['orderDetails']    = $order_model->get_pending_order_details($user_id);
        return view('order/listPending')->with(['orderDetails' =>   $arrData['orderDetails']]);
    }


    public function pendingView($orderId)
    {
        $order_model = new Order_model();
        $arrData['viewPendingOrder']    = $order_model->view_pending_order_details($orderId);
        return view('order/viewPending')->with(['viewPendingOrder' =>   $arrData['viewPendingOrder']]);

    }

    public function pastOrder()
    {
        $user = Auth::user();
        $user_id = $user['id'];
        $order_model = new Order_model();
        $arrData['pastOrderDetails']    = $order_model->get_past_order_details($user_id);
        //echo "<pre>"; print_r($arrData['pastOrderDetails']); die;
        return view('order/listPast')->with(['pastOrderDetails' =>   $arrData['pastOrderDetails']]);

    }

    public function pastView($orderId)
    {
        $order_model = new Order_model();
        $arrData['viewPastOrder']    = $order_model->view_pending_order_details($orderId);
        return view('order/viewPast')->with(['viewPastOrder' =>   $arrData['viewPastOrder']]);
    }
}
