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
use App\Colour_model;



class ColourController extends Controller
{
    public function __construct()
    {
        $this->middleware('admin');
    }
    public  function index()
    {
        $colour_model = new Colour_model();
        $arrData['colourDetails']	= $colour_model->get_colour_details();
        return view('admin.template')->with(['middle' => 'admin/colour/list','colourDetails' =>   $arrData['colourDetails']]);

    }
    public function add()
    {
        if(Input::get('btnAddColour'))
        {
            $arrColourData["colour_name"] = Input::get('txtColourName');
            $arrColourData["colour_created_on"] = date('Y-m-d H:i:s');

            $result = DB::table('colour')->insert($arrColourData);

            if($result)
            {
                Session::flash('success', 'Colour Added Successfully !!');
                return Redirect::to('admin/colour');
            }
            else
            {
                Session::flash('error', 'Failed to Add Colour !!');
                return Redirect::to('admin/colour/add');
            }

        }
        return view('admin.template')->with(['middle' => 'admin/colour/add']);
    }


    public function edit($colourId)
    {
        $colour_model = new Colour_model();
        $arrData['colourDetails'] = $colour_model->get_colour_details($colourId);
        if(Input::get('btnColourUpdate'))
        {
            $UpdateData['colour_name']                  = Input::get('txtColourName');
            $UpdateData["colour_updated_on"]            = date('Y-m-d H:i:s');
            //print_r($upProductData); die;
            //echo "<pre>"; print_r($updateData); die;

            $result = DB::table('colour')->where('colour_id', $colourId)->update($UpdateData);
            if($result)
            {
                Session::flash('success', 'Colour Updated Successfully !!');
                return Redirect::to('admin/colour');
            }
            else
            {
                Session::flash('error', 'Failed to Updated Colour !!');
                return Redirect::to('admin/colour/edit/'.$colourId);
            }

        }
        return view('admin.template')->with(['middle' => 'admin/colour/edit','colourDetails' =>   $arrData['colourDetails']]);
    }

    public function delete($colourId)
    {
        $delete = DB::table('colour')->where('colour_id', $colourId)->delete();

        if ($delete)
            Session::flash('success', 'Data deleted Successfully !!');
        else
            Session::flash('error', 'Failed to delete Data !!');
        return Redirect::to('admin/colour');
    }


}