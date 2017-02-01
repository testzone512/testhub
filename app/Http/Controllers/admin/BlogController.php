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
use Image;
use Hash;
use Helpers;
use App\Blog_model;



class BlogController extends Controller
{
    public function __construct()
    {
        $this->middleware('admin');
    }
    public  function index()
    {

        $blog_model = new Blog_model();
        $arrData['blogDetails']	= $blog_model->get_blog_details();
        return view('admin.template')->with(['middle' => 'admin/blog/list','blogDetails' =>   $arrData['blogDetails']]);

    }
    public function add()
    {
        if(Input::get('btnAdd'))
        {
            $file = Input::file('BlogImage');
            //$imagename = time().'.'.$file->getClientOriginalExtension();
            $name = time()."-".$file->getClientOriginalName();

            $destinationPath = public_path('\upload\blog\thumb');
            $thumb_img = Image::make($file->getRealPath())->resize(200, 200);
            $thumb_img->save($destinationPath.'/'.$name,80);

            $destinationPath = public_path().'\upload\blog';
            $thumb_img = Image::make($file->getRealPath())->resize(600, 600);
            $thumb_img->save($destinationPath.'/'.$name,80);


            $arrAddData["blog_image"]               = $name;
            $arrAddData['blog_title']				= Input::get('txtBlogTitle');
            $arrAddData['blog_description']			= Input::get('editor1');
            $arrAddData['blog_created_on']			= date('Y-m-d H:i:s');

            $result = DB::table('blog')->insert($arrAddData);

            if($result)
            {
                Session::flash('success', 'Blog Added Successfully !!');
                return Redirect::to('admin/blog');
            }
            else
            {
                Session::flash('error', 'Failed to Add Blog !!');
                return Redirect::to('admin/blog/add');
            }

        }

        return view('admin.template')->with(['middle' => 'admin/blog/add']);

        // echo "<pre>"; print_r($stateKeyValueArr);
    }
    public function view($blogId)
    {
        $blog_model = new Blog_model();
        $arrData['blogDetails']	= $blog_model->get_blog_details($blogId);

        return view('admin.template')->with(['middle' => 'admin/blog/view','blogDetails' =>   $arrData['blogDetails']]);
    }

    public function edit($blogId)
    {
        $blog_model = new Blog_model();
        $arrData['blogDetails']	= $blog_model->get_blog_details($blogId);

        if(Input::get('btnUpdate'))
        {
            $file = Input::file('BlogImage');
            //$imagename = time().'.'.$file->getClientOriginalExtension();
            $name = time()."-".$file->getClientOriginalName();

            $destinationPath = public_path('\upload\blog\thumb');
            $thumb_img = Image::make($file->getRealPath())->resize(200, 200);
            $thumb_img->save($destinationPath.'/'.$name,80);



            $destinationPath = public_path().'\upload\blog';
            $thumb_img = Image::make($file->getRealPath())->resize(600, 600);
            $thumb_img->save($destinationPath.'/'.$name,80);
            $prev_file =  $arrData['blogDetails'][0]['blog_image'];

            if($prev_file !='' &&  file_exists(public_path('upload/blog/').$prev_file)){
                unlink(public_path('upload/blog/'.$prev_file));
            }
            if($prev_file !='' &&  file_exists(public_path('upload/blog/thumb/').$prev_file)){
                unlink(public_path('upload/blog/thumb/'.$prev_file));
            }
                $updateData["blog_image"]               = $name;
                $updateData['blog_title']				= Input::get('txtBlogTitle');
                $updateData['blog_description']			= Input::get('editor1');
                $updateData['blog_updated_on']			= date('Y-m-d H:i:s');

                //echo "<pre>"; print_r($updateData); die;

                $result = DB::table('blog')->where('blog_id', $blogId)->update($updateData);
                if($result)
                {
                    Session::flash('success', 'Blog Updated Successfully !!');
                    return Redirect::to('admin/blog');
                }
                else
                {
                    Session::flash('error', 'Failed to Updated Blog !!');
                    return Redirect::to('admin/blog/edit/'.$blogId);
                }

        }
        return view('admin.template')->with(['middle' => 'admin/blog/edit','blogDetails' =>   $arrData['blogDetails']]);

    }

    public function delete($blogId)
    {
        $blog_model = new Blog_model();
        $arrData['blogDetails']	= $blog_model->get_blog_details($blogId);
        $delete = DB::table('blog')->where('blog_id', $blogId)->delete();

        if ($delete)
        {
            $prev_file = $arrData['blogDetails'][0]['blog_image'];

            if($prev_file !='' &&  file_exists(public_path('upload/blog/').$prev_file)){
                unlink(public_path('upload/blog/'.$prev_file));
            }
            if($prev_file !='' &&  file_exists(public_path('upload/blog/thumb/').$prev_file)){
                unlink(public_path('upload/blog/thumb/'.$prev_file));
            }
            Session::flash('success', 'Data deleted Successfully !!');
        }
        else
        {
            Session::flash('error', 'Failed to delete Data !!');
        }
        return Redirect::to('admin/blog');
    }


}