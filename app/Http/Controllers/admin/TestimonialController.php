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
use App\Testimonial_model;



class TestimonialController extends Controller
{
    public function __construct()
    {
        $this->middleware('admin');
    }
    public  function index()
    {
        $testimonial_model = new Testimonial_model();
        $arrData['testimonialDetails']	= $testimonial_model->get_testimonial_details();
        return view('admin.template')->with(['middle' => 'admin/testimonial/list','testimonialDetails' =>   $arrData['testimonialDetails']]);

    }
    public function add()
    {
        if(Input::get('btnTestimonialAdd'))
        {
            $file = Input::file('testimonialImage');
            $name = time()."-".$file->getClientOriginalName();

            $destinationPath = public_path('\upload\testimonial\thumb');
            $thumb_img = Image::make($file->getRealPath())->resize(150, 150);
            $thumb_img->save($destinationPath.'/'.$name,80);

            $destinationPath = public_path().'\upload\testimonial';
            $file->move($destinationPath,$name);


            $arrAddData["testimonial_image"]            = $name;
            $arrAddData['testimonial_name']             = Input::get('txtName');
            $arrAddData['testimonial_description']      = Input::get('txtDescription');
            $arrAddData['testimonial_created_on']       = date('Y-m-d H:i:s');


            $result = DB::table('testimonial')->insert($arrAddData);

            if($result)
            {
                Session::flash('success', 'Testimonial Added Successfully !!');
                return Redirect::to('admin/testimonial');
            }
            else
            {
                Session::flash('error', 'Failed to Add Testimonial !!');
                return Redirect::to('admin/testimonial/add');
            }

        }
        return view('admin.template')->with(['middle' => 'admin/testimonial/add']);
    }


    public function edit($testimonialId)
    {
        $testimonial_model = new Testimonial_model();
        $arrData['testimonialDetails']	= $testimonial_model->get_testimonial_details($testimonialId);
        if(Input::get('btnTestimonialEdit'))
        {
            $file = Input::file('testimonialImage');
            //$imagename = time().'.'.$file->getClientOriginalExtension();
            $name = time()."-".$file->getClientOriginalName();

            $destinationPath = public_path('\upload\testimonial\thumb');
            $thumb_img = Image::make($file->getRealPath())->resize(150, 150);
            $thumb_img->save($destinationPath.'/'.$name,80);



            $destinationPath = public_path().'\upload\testimonial';
            $file->move($destinationPath,$name);
            $prev_file =   $arrData['testimonialDetails'][0]['testimonial_image'];

            if($prev_file !='' &&  file_exists(public_path('upload/testimonial/').$prev_file)){
                unlink(public_path('upload/testimonial/'.$prev_file));
            }
            if($prev_file !='' &&  file_exists(public_path('upload/testimonial/thumb/').$prev_file)){
                unlink(public_path('upload/testimonial/thumb/'.$prev_file));
            }

            $UpdateData["testimonial_image"]                 = $name;
            $UpdateData["testimonial_name"]                  = Input::get('txtName');
            $UpdateData["testimonial_description"]           = Input::get('txtDescription');
            $UpdateData['testimonial_updated_on']            = date('Y-m-d H:i:s');
            //print_r($upProductData); die;
            //echo "<pre>"; print_r($updateData); die;

            $result = DB::table('testimonial')->where('testimonial_id',$testimonialId)->update($UpdateData);
            if($result)
            {
                Session::flash('success', 'Testimonial Updated Successfully !!');
                return Redirect::to('admin/testimonial');
            }
            else
            {
                Session::flash('error', 'Failed to Updated Testimonial !!');
                return Redirect::to('admin/testimonial/edit/'.$testimonialId);
            }

        }
        return view('admin.template')->with(['middle' => 'admin/testimonial/edit','testimonialDetails' =>   $arrData['testimonialDetails']]);
    }

    public function delete($testimonialId)
    {
        $delete = DB::table('testimonial')->where('testimonial_id', $testimonialId)->delete();
        $testimonial_model = new Testimonial_model();
        $arrData['testimonialDetails']	= $testimonial_model->get_testimonial_details($testimonialId);

        if ($delete)
        {
            $prev_file =   $arrData['testimonialDetails'][0]['testimonial_image'];

            if($prev_file !='' &&  file_exists(public_path('upload/testimonial/').$prev_file)){
                unlink(public_path('upload/testimonial/'.$prev_file));
            }
            if($prev_file !='' &&  file_exists(public_path('upload/testimonial/thumb/').$prev_file)){
                unlink(public_path('upload/testimonial/thumb/'.$prev_file));
            }

            Session::flash('success', 'Data deleted Successfully !!');
        }
        else
        {
            Session::flash('error', 'Failed to delete Data !!');
        }
        return Redirect::to('admin/testimonial');
    }


}