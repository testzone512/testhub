<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Testimonial extends CI_Controller
{

    public function __construct() {
        @parent::__construct();
        if ($this->session->userdata('logged_user_in') == 0) {
            redirect('admin/login');
            break;
        }
        $this->load->model('admin/testimonial_model');
    }

    /**
     * index
     *
     * This help to Display all Testimonial Details
     *
     * @author	Chintan Bhimani
     * @access	public
     * @return	void
     */

    public function index()
    {
        $arrData['testimonialDetails']	= $this->testimonial_model->get_testimonial_details();

        $arrData['middle'] = 'admin/testimonial/list';
        $this->load->view('admin/template', $arrData);
    }


    /**
     * add
     *
     * This help to Testimonial
     *
     * @author	Chintan Bhimani
     * @access	public
     * @return	void
     */
    public function add()
    {
        if ($this->input->post('btnAdd'))
        {
            // Staff Profile Image Upload START
					if ($_FILES['txtTestimonialImage']['name'] != '')
					{
						$config['upload_path'] = $_SERVER['DOCUMENT_ROOT'].'/'.$this->config->item('ECOMMERCE_ROOT_FOLDER').'public/upload/testimonial/';
				        $config['allowed_types'] = 'gif|jpg|jpeg|png';
				        $config['max_size']    = '10240';
				        //print_r($config); die;

				        //load upload class library
				         //$this->upload->initialize($config);
				        $this->load->library('upload',$config);

				        if (!$this->upload->do_upload('txtTestimonialImage'))
				        {
							// case - failure
				            $upload_error = array('error' => $this->upload->display_errors());
							//print_r($upload_error); die;
				        } 
				        else
				        {
							// case - success
				        	//$arrAddData["photo"]	= $this->upload->data();
				        	$arrAddData["testimonial_image"] = $this->upload->file_name;
				        	//echo "<pre>"; print_r($updateData); die;
				        	$data = $this->upload->data();
				        	$upload_data = $this->upload->data();
				            
				            $config = array(
								'source_image'		=> $data['full_path'], //get original image
								'new_image'			=> $data['file_path'].'thumb', //save as new image //need to create thumbs first
								'maintain_ratio'	=> true,
								'width'				=> 150
							);
							//print_r($config); die;
				           
				            $this->load->library('image_lib',$config); //load library
							$this->image_lib->resize(); //do whatever specified in config
				           
				        }	
				     }

				    // Staff Profile Image Upload END
                     
                    $arrAddData['testimonial_name']             = $this->input->post('txtName');
                    $arrAddData['testimonial_description']      = $this->input->post('txtDescription');
                    $arrAddData['testimonial_created_on']       = date('Y-m-d H:i:s');
                    
                    $insertedFlag = $this->testimonial_model->save_testimonial($arrAddData);



                if ($insertedFlag)
				{
                    $this->session->set_flashdata('success', 'Testimonial Added Successfully !!');
                    redirect('admin/testimonial/');

                }else
				{
                    $this->session->set_flashdata('error', 'Failed to Add Testimonial !!');
                    redirect('admin/testimonial/add');
                }
        }
        $arrData['middle'] = 'admin/testimonial/add';
        $this->load->view('admin/template',$arrData);

    }



    /**
     * edit
     *
     * This help to edit Testimonial
     *
     * @author	Chintan Bhimani
     * @access	public
     * @return	void
     */

    public function edit($testimonialId)
    {
        $arrData['testimonialDetails']	= $this->testimonial_model->get_testimonial_details($testimonialId);

        if ($this->input->post('btnEdit'))
        {
            // Testimonial Image UPpload START

            if ($_FILES['txtTestimonialImage']['name'] != '')
            {
                //$config['upload_path'] = $_SERVER['DOCUMENT_ROOT'].'codeigniter_login/public/upload/gallery/';
				$config['upload_path'] = './public/upload/testimonial/';
                $config['allowed_types'] = 'gif|jpg|jpeg|png|pdf';
                $config['max_size']    = '10240';

                //load upload class library
                //$this->upload->initialize($config);
                $this->load->library('upload',$config);

                if (!$this->upload->do_upload('txtTestimonialImage'))
                {
                    // case - failure
                    $upload_error = array('error' => $this->upload->display_errors());
                    //print_r($upload_error);
                }
                else
                {
                    // case - success
                    //$arrAddData["photo"]	= $this->upload->data();
                    $UpdateData["testimonial_image"] = $this->upload->file_name;

                    // Deleting previous image.
                    $prev_file = $arrData['testimonialDetails'][0]['testimonial_image'];

                    // Unlink the image from project and thumb folder
                    if( $prev_file !='' && file_exists($config['upload_path'].$prev_file)){

                        unlink($config['upload_path'].$prev_file);
                        unlink($config['upload_path']."thumb/".$prev_file);
                    }

                    $data = $this->upload->data();
                    $upload_data = $this->upload->data();

                    $config = array(
                        'source_image'		=> $data['full_path'], //get original image
                        'new_image'			=> $data['file_path'].'thumb', //save as new image //need to create thumbs first
                        'maintain_ratio'	=> true,
                        'width'				=> 150
                    );
                    //print_r($config); die;

                    $this->load->library('image_lib',$config); //load library
                    $this->image_lib->resize(); //do whatever specified in config
                }
            }

            // Testimonial Image Upload END
            $UpdateData["testimonial_name"]                  = $this->input->post('txtName');
            $UpdateData["testimonial_description"]           = $this->input->post('txtDescription');
            $UpdateData['testimonial_updated_on']            = date('Y-m-d H:i:s');

            $updateFlag	= $this->testimonial_model->update_testimonial($testimonialId,$UpdateData);

            if ($updateFlag)
			{
                $this->session->set_flashdata('success', 'Testimonial updated Successfully !!');
                redirect('admin/testimonial/');

            }
			else
			{
                $this->session->set_flashdata('error', 'Failed to updated Testimonial !!');
                redirect('admin/testimonial/edit/'.$testimonialId);
            }
        }
        $arrData['middle'] = 'admin/testimonial/edit';
        $this->load->view('admin/template',$arrData);
    }
    /**
     * deleteTestimonial
     *
     * This help to delete Testimonial detail
     *
     * @author	Chintan Bhimani
     * @access	public
     * @return	void
     */

    public function deleteTestimonial($testimonialId)
    {
        if($testimonialId!='') {
            $testimonial = $this->testimonial_model->get_testimonial_details($testimonialId);

            $image = $testimonial[0]['testimonial_image'];

            //$imgPath =  $_SERVER['DOCUMENT_ROOT'] . '/clothesloop/public/upload/testimonial/';
			$imgPath = './public/upload/testimonial/';
            //$thumbPath = $_SERVER['DOCUMENT_ROOT'] . '/clothesloop/public/upload/testimonial/thumb/';
			$thumbPath = './public/upload/testimonial/thumb/';

            if ($image != '' && file_exists($imgPath . $image))
                unlink($imgPath . $image);

            if ($image != '' && file_exists($thumbPath . $image))
                unlink($thumbPath . $image);
            $delete = $this->testimonial_model->delete_testimonial($testimonialId);

            if ($delete)
                $this->session->set_flashdata('success', 'Data deleted Successfully !!');
            else
                $this->session->set_flashdata('error', 'Failed to delete Data !!');
        }

        redirect('admin/testimonial/');
    }


}

?>