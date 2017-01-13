<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Slider extends CI_Controller
{

    public function __construct() {
        @parent::__construct();
        if ($this->session->userdata('logged_user_in') == 0) {
            redirect('admin/login');
            break;
        }
        $this->load->model('admin/slider_model');
    }

    /**
     * index
     *
     * This help to Display all Slider Details
     *
     * @author	Chintan Bhimani
     * @access	public
     * @return	void
     */

    public function index()
    {
        $arrData['sliderDetails']	= $this->slider_model->get_slider_details();

        $arrData['middle'] = 'admin/slider/list';
        $this->load->view('admin/template', $arrData);
    }


    /**
     * add
     *
     * This help to Slider
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
					if ($_FILES['txtSliderImage']['name'] != '')
					{
						$config['upload_path'] = $_SERVER['DOCUMENT_ROOT'].'/'.$this->config->item('ECOMMERCE_ROOT_FOLDER').'public/upload/slider/';
				        $config['allowed_types'] = 'gif|jpg|jpeg|png';
				        $config['max_size']    = '10240';
				        //print_r($config); die;

				        //load upload class library
				         //$this->upload->initialize($config);
				        $this->load->library('upload',$config);

				        if (!$this->upload->do_upload('txtSliderImage'))
				        {
							// case - failure
				            $upload_error = array('error' => $this->upload->display_errors());
							//print_r($upload_error); die;
				        } 
				        else
				        {
							// case - success
				        	//$arrAddData["photo"]	= $this->upload->data();
				        	$arrAddData["slider_image"] = $this->upload->file_name;
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
                     
                    $arrAddData['slider_short_description']     = $this->input->post('txtShortDescription');
                    $arrAddData['slider_long_description']      = $this->input->post('txtLongDescription');
                    $arrAddData['slider_created_on']            = date('Y-m-d H:i:s');
                    
                    $insertedFlag = $this->slider_model->save_slider($arrAddData);



                if ($insertedFlag)
				{
                    $this->session->set_flashdata('success', 'Slider Added Successfully !!');
                    redirect('admin/slider/');

                }else
				{
                    $this->session->set_flashdata('error', 'Failed to Add Slider !!');
                    redirect('admin/slider/add');
                }
        }
        $arrData['middle'] = 'admin/slider/add';
        $this->load->view('admin/template',$arrData);

    }



    /**
     * edit
     *
     * This help to edit slider
     *
     * @author	Chintan Bhimani
     * @access	public
     * @return	void
     */

    public function edit($sliderId)
    {
        $arrData['sliderDetails']	= $this->slider_model->get_slider_details($sliderId);

        if ($this->input->post('btnEdit'))
        {
            // Testimonial Image UPpload START

            if ($_FILES['txtSliderImage']['name'] != '')
            {
                //$config['upload_path'] = $_SERVER['DOCUMENT_ROOT'].'codeigniter_login/public/upload/gallery/';
				$config['upload_path'] = './public/upload/slider/';
                $config['allowed_types'] = 'gif|jpg|jpeg|png|pdf';
                $config['max_size']    = '10240';

                //load upload class library
                //$this->upload->initialize($config);
                $this->load->library('upload',$config);

                if (!$this->upload->do_upload('txtSliderImage'))
                {
                    // case - failure
                    $upload_error = array('error' => $this->upload->display_errors());
                    //print_r($upload_error);
                }
                else
                {
                    // case - success
                    //$arrAddData["photo"]	= $this->upload->data();
                    $UpdateData["slider_image"] = $this->upload->file_name;

                    // Deleting previous image.
                    $prev_file = $arrData['sliderDetails'][0]['slider_image'];

                    // Unlink the image from project and thumb folder
                    if( $prev_file !='' && file_exists($config['upload_path'].$prev_file)){

                        unlink($config['upload_path'].$prev_file);
                        unlink($config['upload_path']."thumb/".$prev_file);
                    }

                    $data = $this->upload->data();
                    $upload_data = $this->upload->data();

                    $config = array(
                            'source_image'     => $data['full_path'], //get original image
                            'new_image'        => $data['file_path'].'thumb', //save as new image //need to create thumbs first
                            'maintain_ratio'   => false,
                             'width'           => 200,
							'height'           => 200
                        );
                        //print_r($config); die;
                        //if no folder in directory then create new folder
                        if (!is_dir($config['new_image'])) 
						{
                            mkdir($config['new_image'], 0777);
                            chmod($config['new_image'], 0777);
                        }

                        $this->load->library('image_lib',$config); //load library
                        $this->image_lib->resize(); //do whatever specified in config
						$this->image_lib->clear();
						
						
						
						 /* Second size (orignal image)*/   
						 $configSize2['image_library']   = 'gd2';
						 $configSize2['source_image']    = $data['full_path'];
						 $configSize2['maintain_ratio']  = false;
						 $configSize2['width']           = 1920;
						 $configSize2['height']          = 667;
						 $configSize2['new_image']       = $data['file_path'];
						
						 $this->image_lib->initialize($configSize2);
						 $this->image_lib->resize();
						 $this->image_lib->clear();
						 
						
                }
            }

            // Testimonial Image Upload END
            $UpdateData["slider_short_description"]	  	= $this->input->post('txtShortDescription');
            $UpdateData["slider_long_description"]	  	= $this->input->post('txtLongDescription');
            $UpdateData['slider_updated_on']            = date('Y-m-d H:i:s');

            $updateFlag	= $this->slider_model->update_slider($sliderId,$UpdateData);

            if ($updateFlag)
			{
                $this->session->set_flashdata('success', 'Slider updated Successfully !!');
                redirect('admin/slider/');

            }
			else
			{
                $this->session->set_flashdata('error', 'Failed to updated Slider !!');
                redirect('admin/slider/edit/'.$sliderId);
            }
        }
        $arrData['middle'] = 'admin/slider/edit';
        $this->load->view('admin/template',$arrData);
    }
    /**
     * deleteSlider
     *
     * This help to delete slider detail
     *
     * @author	Chintan Bhimani
     * @access	public
     * @return	void
     */

    public function deleteSlider($sliderId)
    {
        if($sliderId!='') {
            $slider = $this->slider_model->get_slider_details($sliderId);

            $image = $slider[0]['slider_image'];

            //$imgPath =  $_SERVER['DOCUMENT_ROOT'] . '/clothesloop/public/upload/slider/';
			$imgPath = './public/upload/slider/';
            //$thumbPath = $_SERVER['DOCUMENT_ROOT'] . '/clothesloop/public/upload/slider/thumb/';
			$thumbPath = './public/upload/slider/thumb/';

            if ($image != '' && file_exists($imgPath . $image))
                unlink($imgPath . $image);

            if ($image != '' && file_exists($thumbPath . $image))
                unlink($thumbPath . $image);
            $delete = $this->slider_model->delete_slider($sliderId);

            if ($delete)
                $this->session->set_flashdata('success', 'Data deleted Successfully !!');
            else
                $this->session->set_flashdata('error', 'Failed to delete Data !!');
        }

        redirect('admin/slider/');
    }


}

?>