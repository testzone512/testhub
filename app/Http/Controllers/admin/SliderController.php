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
use App\Slider_model;



class SliderController extends Controller
{
    public function __construct()
    {
        $this->middleware('admin');
    }
    public  function index()
    {
        $slider_model = new Slider_model();
        $arrData['sliderDetails']	= $slider_model->get_slider_details();
        return view('admin.template')->with(['middle' => 'admin/slider/list','sliderDetails' =>   $arrData['sliderDetails']]);

    }
    public function add()
    {
        if(Input::get('btnSliderAdd'))
        {
            $file = Input::file('sliderImage');
            //$imagename = time().'.'.$file->getClientOriginalExtension();
            $name = time()."-".$file->getClientOriginalName();

            $destinationPath = public_path('\upload\slider\thumb');
            $thumb_img = Image::make($file->getRealPath())->resize(200, 200);
            $thumb_img->save($destinationPath.'/'.$name,80);

            $destinationPath = public_path().'\upload\slider';
            $thumb_img = Image::make($file->getRealPath())->resize(1920, 667);
            $thumb_img->save($destinationPath.'/'.$name,80);


            $arrSliderAddData["slider_image"]               = $name;
            $arrSliderAddData['slider_short_description']   = Input::get('txtShortDescription');
            $arrSliderAddData['slider_long_description']    = Input::get('txtLongDescription');
            $arrSliderAddData['slider_created_on']          = date('Y-m-d H:i:s');


            $result = DB::table('slider')->insert($arrSliderAddData);

            if($result)
            {
                Session::flash('success', 'Slider Added Successfully !!');
                return Redirect::to('admin/slider');
            }
            else
            {
                Session::flash('error', 'Failed to Add Slider !!');
                return Redirect::to('admin/slider/add');
            }

        }
        return view('admin.template')->with(['middle' => 'admin/slider/add']);
    }


    public function edit($sliderId)
    {
        $slider_model = new Slider_model();
        $arrData['sliderDetails']	= $slider_model->get_slider_details($sliderId);
        if(Input::get('btnSliderEdit'))
        {
            $file = Input::file('sliderImage');
            $name = time()."-".$file->getClientOriginalName();
            $destinationPath = public_path().'\upload\slider';
            $file->move($destinationPath,$name);


            $prev_file = $arrData['sliderDetails'][0]['slider_image'];

            if($prev_file !='' &&  file_exists(public_path('upload/slider/').$prev_file)){
                unlink(public_path('upload/slider/'.$prev_file));
            }




            $file = Input::file('sliderImage');
            //$imagename = time().'.'.$file->getClientOriginalExtension();
            $name = time()."-".$file->getClientOriginalName();

            $destinationPath = public_path('\upload\slider\thumb');
            $thumb_img = Image::make($file->getRealPath())->resize(200, 200);
            $thumb_img->save($destinationPath.'/'.$name,80);



            $destinationPath = public_path().'\upload\slider';
            $thumb_img = Image::make($file->getRealPath())->resize(1920, 667);
            $thumb_img->save($destinationPath.'/'.$name,80);
            $prev_file =  $arrData['sliderDetails'][0]['slider_image'];

            if($prev_file !='' &&  file_exists(public_path('upload/slider/').$prev_file)){
                unlink(public_path('upload/slider/'.$prev_file));
            }
            if($prev_file !='' &&  file_exists(public_path('upload/slider/thumb/').$prev_file)){
                unlink(public_path('upload/slider/thumb/'.$prev_file));
            }



            $UpdateData["slider_image"]                 = $name;
            $UpdateData["slider_short_description"]	  	= Input::get('txtShortDescription');
            $UpdateData["slider_long_description"]	  	= Input::get('txtLongDescription');
            $UpdateData['slider_updated_on']            = date('Y-m-d H:i:s');
            //print_r($upProductData); die;
            //echo "<pre>"; print_r($updateData); die;

            $result = DB::table('slider')->where('slider_id',$sliderId)->update($UpdateData);
            if($result)
            {
                Session::flash('success', 'Slider Updated Successfully !!');
                return Redirect::to('admin/slider');
            }
            else
            {
                Session::flash('error', 'Failed to Updated Slider !!');
                return Redirect::to('admin/slider/edit/'.$sliderId);
            }

        }
        return view('admin.template')->with(['middle' => 'admin/slider/edit','sliderDetails' =>   $arrData['sliderDetails']]);
    }

    public function delete($sliderId)
    {
        $slider_model = new Slider_model();
        $arrData['sliderDetails']	= $slider_model->get_slider_details($sliderId);
        $delete = DB::table('slider')->where('slider_id', $sliderId)->delete();

        if ($delete) {

            $prev_file = $arrData['sliderDetails'][0]['slider_image'];

            if($prev_file !='' &&  file_exists(public_path('upload/slider/').$prev_file)){
                unlink(public_path('upload/slider/'.$prev_file));
            }
            if($prev_file !='' &&  file_exists(public_path('upload/slider/thumb/').$prev_file)){
                unlink(public_path('upload/slider/thumb/'.$prev_file));
            }
            Session::flash('success', 'Data deleted Successfully !!');
        }
        else {
            Session::flash('error', 'Failed to delete Data !!');
        }
        return Redirect::to('admin/slider');
    }


}