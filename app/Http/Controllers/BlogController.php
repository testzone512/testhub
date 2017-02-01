<?php
namespace App\Http\Controllers;
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
use App\Blog_model;



class BlogController extends Controller
{
    public function __construct()
    {
        //$this->middleware('auth');
    }
    public  function index()
    {

        $blog_model = new Blog_model();
        $arrData['blogDetails']     = $blog_model->get_front_blog_details();
        $arrData['blog'] = 'active';
        return view('blog')->with(['blogDetails' => $arrData['blogDetails'],'blog' =>   $arrData['blog']]);
    }
    public function blogView($blogId)
    {
        $blog_model = new Blog_model();
        $arrData['blogDetails']     = $blog_model->get_front_blog_details($blogId);
        $arrData['blog'] = 'active';
        return view('blogdetails')->with(['blogDetails' => $arrData['blogDetails'],'blog' =>   $arrData['blog']]);
    }



}