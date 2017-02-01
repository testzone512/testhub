<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use View;
use DB;
use Auth;
use App\Slider_model;
use App\Front_product_model;

class HomeController extends Controller
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
        $user = Auth::user();
        //Session::put('username', $user->username);
        //echo $user['id']; die;
        $product_model = new Front_product_model();
        $arrData['productRandDetails'] = $product_model->get_random_product();
        $arrData['productRecentDetails'] = $product_model->get_recent_product();

        $slider_model = new Slider_model();
        $arrData['sliderDetails']   = $slider_model->get_slider_details();

        return view('home')->with(['sliderDetails' =>   $arrData['sliderDetails'],'productRandDetails'=> $arrData['productRandDetails'],'productRecentDetails'=> $arrData['productRecentDetails']]);
    }
}
