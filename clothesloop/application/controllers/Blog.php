<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Blog extends CI_Controller {

	public function index()
	{
        $this->load->model('front/blog_model');
       
        $arrData['blogDetails']     = $this->blog_model->get_front_blog_details();
        $arrData['blog'] = 'active';
		$this->load->view('blog',$arrData);
	}
    
    public function blogView($blogId)
	{
        $this->load->model('front/blog_model');
       
        $arrData['blogDetails']     = $this->blog_model->get_front_blog_details($blogId);
        
		$this->load->view('blogdetails',$arrData);
	}
}
