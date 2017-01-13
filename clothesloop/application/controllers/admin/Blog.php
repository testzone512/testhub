<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Blog extends CI_Controller
{

    public function __construct() {
        @parent::__construct();
        if ($this->session->userdata('logged_user_in') == 0) {
            redirect('admin/login');
            break;
        }
        $this->load->model('admin/blog_model');
    }

    /**
     * index
     *
     * This help to Display all Blog Details
     *
     * @author	Chintan Bhimani
     * @access	public
     * @return	void
     */

    public function index()
    {
		 $arrData['blogDetails']	= $this->blog_model->get_blog_details();
            
		 $arrData['middle'] = 'admin/blog/list';
		 $this->load->view('admin/template', $arrData);
    }


    /**
     * add
     *
     * This help to Add Blog Details
     *
     * @author	Chintan Bhimani
     * @access	public
     * @return	void
     */
    public function add()
    {
        if($this->input->post('btnAdd'))
		{
			$this->form_validation->set_rules('txtBlogTitle', 'Blog Title','trim|required');
			
			if ($this->form_validation->run() == TRUE)
			{

				// Staff Profile Image Upload START
					if ($_FILES['txtBlogImage']['name'] != '')
					{
						//$config['upload_path'] = $_SERVER['DOCUMENT_ROOT'].'/'.$this->config->item('ECOMMERCE_ROOT_FOLDER').'public/upload/blog/';
						$config['upload_path'] = './public/upload/blog/';
				        $config['allowed_types'] = 'gif|jpg|jpeg|png';
				        $config['max_size']    = '10240';
				        //print_r($config); die;

				        //load upload class library
				         //$this->upload->initialize($config);
				        $this->load->library('upload',$config);

				        if (!$this->upload->do_upload('txtBlogImage'))
				        {
							// case - failure
				            $upload_error = array('error' => $this->upload->display_errors());
							//print_r($upload_error); die;
				        } 
				        else
				        {
							// case - success
				        	//$arrAddData["photo"]	= $this->upload->data();
				        	$arrAddData["blog_image"] = $this->upload->file_name;
				        	//echo "<pre>"; print_r($updateData); die;
				        	$data = $this->upload->data();
				        	$upload_data = $this->upload->data();
				            
						    // thumb
							$config = array(
								'source_image'     => $data['full_path'], //get original image
								'new_image'        => $data['file_path'].'thumb', //save as new image //need to create thumbs first
								'maintain_ratio'   => false,
								'width'            => 200,
								'height'           => 200
							);
	
							$this->load->library('image_lib',$config);
							$this->image_lib->resize(); //do whatever specified in config
							$this->image_lib->clear();
							// thumb ends
							
							
							 /* Second size (orignal image)*/   
							 $configSize2['image_library']   = 'gd2';
							 $configSize2['source_image']    = $data['full_path'];
							 $configSize2['maintain_ratio']  = false;
							 $configSize2['width']           = 600;
							 $configSize2['height']          = 600;
							 $configSize2['new_image']       = $data['file_path'];
							
							 $this->image_lib->initialize($configSize2);
							 $this->image_lib->resize();
							 $this->image_lib->clear();
				           
				        }	
				     }

				    // Staff Profile Image Upload END	

				$arrAddData['blog_title']				= $this->input->post('txtBlogTitle');
				$arrAddData['blog_description']			= $this->input->post('editor1');
				$arrAddData['blog_created_on']			= date('Y-m-d H:i:s');
				$arrAddData['blog_updated_on']			= date('Y-m-d H:i:s');


				$insertFlag = $this->blog_model->save_blog($arrAddData);
				if($insertFlag)
				{
					$this->session->set_flashdata('success','Blog Detail Added Successfully');
					redirect('admin/blog/');
				}
				else
				{
					$this->session->set_flashdata('error','Failed to Added Blog Detail');
					redirect('admin/blog/add');
				}
			}
			else
			{
				$arrData['middle']	= 'admin/blog/add';
				$this->load->view('admin/template',$arrData);
			}
		}
		$arrData['middle']	= 'admin/blog/add';
		$this->load->view('admin/template',$arrData);

    }



    /**
     * edit_gallery
     *
     * This help to edit gallery
     *
     * @author	Chintan Bhimani
     * @access	public
     * @return	void
     */

    public function edit($blogId)
    {
        $arrData['blogDetails']	= $this->blog_model->get_blog_details($blogId);

		if($this->input->post('btnUpdate'))
		{
			$this->form_validation->set_rules('txtBlogTitle', 'Blog Title','trim|required');
			if ($this->form_validation->run() == TRUE)
			{

				// Staff Profile Image Upload START
					if ($_FILES['txtBlogImage']['name'] != '')
					{
						//$config['upload_path'] = $_SERVER['DOCUMENT_ROOT'].'/'.$this->config->item('ECOMMERCE_ROOT_FOLDER').'public/upload/blog/';
						$config['upload_path'] = './public/upload/blog/';
				        $config['allowed_types'] = 'gif|jpg|jpeg|png';
				        $config['max_size']    = '10240';
				        //print_r($config); die;

				        //load upload class library
				         //$this->upload->initialize($config);
				        $this->load->library('upload',$config);

				        if (!$this->upload->do_upload('txtBlogImage'))
				        {
							// case - failure
				            $upload_error = array('error' => $this->upload->display_errors());
							//print_r($upload_error); die;
				        } 
				        else
				        {
							// case - success
				        	//$arrAddData["photo"]	= $this->upload->data();
				        	$updateData["blog_image"] = $this->upload->file_name;
				        	//echo "<pre>"; print_r($updateData);
				        	$prev_file = $this->input->post('blogEditImage');
							//print_r($prev_file); die;
							// Unlink the image from project and thumb folder
							if( $prev_file !='' && file_exists($config['upload_path'].$prev_file)){

								unlink($config['upload_path'].$prev_file);	
								unlink($config['upload_path']."thumb/".$prev_file);	
							}

				        	$data = $this->upload->data();
				        	$upload_data = $this->upload->data();
				            
						   // thumb
							$config = array(
								'source_image'     => $data['full_path'], //get original image
								'new_image'        => $data['file_path'].'thumb', //save as new image //need to create thumbs first
								'maintain_ratio'   => false,
								'width'            => 200,
								'height'           => 200
							);
	
							$this->load->library('image_lib',$config);
							$this->image_lib->resize(); //do whatever specified in config
							$this->image_lib->clear();
							// thumb ends
							
							
							 /* Second size (orignal image)*/   
							 $configSize2['image_library']   = 'gd2';
							 $configSize2['source_image']    = $data['full_path'];
							 $configSize2['maintain_ratio']  = false;
							 $configSize2['width']           = 600;
							 $configSize2['height']          = 600;
							 $configSize2['new_image']       = $data['file_path'];
							
							 $this->image_lib->initialize($configSize2);
							 $this->image_lib->resize();
							 $this->image_lib->clear();
				           
				        }	
				     }

				    // Staff Profile Image Upload END	

				$updateData['blog_title']				= $this->input->post('txtBlogTitle');
				$updateData['blog_description']			= $this->input->post('editor1');
				$updateData['blog_created_on']			= date('Y-m-d H:i:s');
				$updateData['blog_updated_on']			= date('Y-m-d H:i:s');
				
				//echo "<pre>"; print_r($updateData); die;

				$updateFlag = $this->blog_model->update_blog($blogId,$updateData);
				if($updateFlag)
				{
					$this->session->set_flashdata('success','Blog Detail Updated Successfully');
					redirect('admin/blog/');
				}
				else
				{
					$this->session->set_flashdata('error','Failed to Updated Blog Detail');
					redirect('admin/blog/edit/'.$blogId);
				}
			}
			else
			{
				$arrData['middle']	= 'admin/blog/edit';
				$this->load->view('admin/template',$arrData);
			}
		}
		$arrData['middle']	= 'admin/blog/edit';
		$this->load->view('admin/template',$arrData);
    }
    /**
     * deleteBlog
     *
     * This help to delete Product detail
     *
     * @author	Nilesh Dabhi
     * @access	public
     * @return	void
     */

    public function deleteBlog($blogId)
    {
        if($blogId!='') {
            $blogDetails =  $this->blog_model->get_blog_details($blogId);

            $image = $blogDetails[0]['blog_image'];

            //$imgPath =  $_SERVER['DOCUMENT_ROOT'] . '/clothesloop/public/upload/blog/';
			$imgPath = './public/upload/blog/';
            //$thumbPath = $_SERVER['DOCUMENT_ROOT'] . '/clothesloop/public/upload/blog/thumb/';
			$thumbPath = './public/upload/blog/thumb/';

            if ($image != '' && file_exists($imgPath . $image))
                unlink($imgPath . $image);

            if ($image != '' && file_exists($thumbPath . $image))
                unlink($thumbPath . $image);
            $delete = $this->blog_model->delete_blog($blogId);

            if ($delete)
                $this->session->set_flashdata('success', 'Data deleted Successfully !!');
            else
                $this->session->set_flashdata('error', 'Failed to delete Data !!');
        }

        redirect('admin/blog/');
    }
	
	/**
     * view
     *
     * This help to view Blog Details
     *
     * @author	Chintan Bhimani
     * @access	public
     * @return	void
     */

    public function view($blogId)
    {
		 $arrData['blogDetails']	= $this->blog_model->get_blog_details($blogId);
            
		 $arrData['middle'] = 'admin/blog/view';
		 $this->load->view('admin/template', $arrData);
    }


}

?>