<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Gallery extends CI_Controller
{

    public function __construct() {
        @parent::__construct();
        if ($this->session->userdata('logged_user_in') == 0) {
            redirect('admin/login');
            break;
        }
        $this->load->model('admin/gallery_model');
       // $this->load->model('admin/product_model');
    }

    /**
     * index
     *
     * This help to Display all Category Details
     *
     * @author	Nilesh Dabhi
     * @access	public
     * @return	void
     */

    public function index()
    {

    }


    /**
     * list
     *
     * This help to list all the gallery
     *
     * @author	Nilesh Dabhi
     * @access	public
     * @return	void
     */

    public function list_gallery($productId)
    {
        if($productId != '')
        {
            $arrData['galleryDetails']	= $this->gallery_model->get_gallery_details_using_productId($productId);
            $arrData['product_id']=$productId;

            $arrData['middle'] = 'admin/gallery/list';
            $this->load->view('admin/template', $arrData);
        }
        else
        {
            $this->session->set_flashdata('error', 'Failed to Add Gallery !!');
            redirect('admin/product');
        }
    }

    /**
     * ajax_gallery_active_inactive
     *
     * This help to active or inactive category using ajax
     *
     * @author	Nilesh Dabhi
     * @access	public
     * @return	void
     */
    public function ajax_gallery_active_inactive()
    {
        //print_r($this->session->userdata()); die;
        $Action = $this->input->post('Action');
        $GalleryId = $this->input->post('GalleryId');

        //update category active or inactive
        $upDataflag = $this->gallery_model->update_active_inactive_gallery($Action,$GalleryId);
        if ($upDataflag == TRUE) 
		{
            echo $Action;
        } else 
		{
            echo $Action;
        }
    }


    /**
     * add
     *
     * This help to Gallery
     *
     * @author	Chintan Bhimani
     * @access	public
     * @return	void
     */
    public function add($product_id)
    {
        $arrData['product_id']	= $product_id;
        //echo "<pre>";print_r($arrData['productGalleryDetails']);die;

        //echo "<pre>";print_r($_POST);die;
        if ($this->input->post('btnAddGallery'))
        {
            //$config['upload_path'] = $_SERVER['DOCUMENT_ROOT'].'codeigniter_login/public/upload/gallery/';
			$config['upload_path'] 		= './public/upload/gallery/';
            $config['allowed_types']    = 'gif|jpg|jpeg|png';
            $config['max_size']    		= '26200';
            $config['overwrite']     	= FALSE;
            //$config['file_name']	= $arrData['galleryDetails']['gallery_name'].$arrData['galleryDetails']['gallery_id'];

            // retrieve the number of images uploaded;
            $number_of_files = sizeof($_FILES['galleryImage']['tmp_name']);


            $files = $_FILES['galleryImage'];
            $errors = array();
            $image  = array();

            // first make sure that there is no error in uploading the files
            for($i=0;$i<$number_of_files;$i++)
            {
                if($_FILES['galleryImage']['error'][$i] != 0) $errors[$i][] = 'Couldn\'t upload file '.$_FILES['galleryImage']['name'][$i];
            }

            if(sizeof($errors)==0)
            {
                // now, taking into account that there can be more than one file, for each file we will have to do the upload

                // we first load the upload library
                // need to load this only once.
                $this->load->library('upload',$config);

                ///foreach($_FILES as $k=>$v)
                $arrAddData["gallery_product_id"]	  	= $product_id;
                $arrAddData["gallery_status"]	  		= 1;

                //print_r($arrAddData); die;

                for ($i = 0; $i < $number_of_files; $i++)
                {
                    //$nama = $v["name"][$i];
                    $_FILES['galleryImage']['name'] = $files['name'][$i];
                    $_FILES['galleryImage']['type'] = $files['type'][$i];
                    $_FILES['galleryImage']['tmp_name'] = $files['tmp_name'][$i];
                    $_FILES['galleryImage']['error'] = $files['error'][$i];
                    $_FILES['galleryImage']['size'] = $files['size'][$i];

                    ///$this->upload->initialize($config);

                    // we retrieve the number of files that were uploaded
                    if ($this->upload->do_upload('galleryImage'))
                    {
                        $arrAddData["gallery_image"] = $this->upload->file_name;
                        $data = $this->upload->data();

                        // thumb
                        $config = array(
                            'source_image'     => $data['full_path'], //get original image
                            'new_image'        => $data['file_path'].'thumb', //save as new image //need to create thumbs first
                            'maintain_ratio'   => false,
                            'width'            => 500,
							'height'           => 500
                        );

                        $this->load->library('image_lib',$config);
                        $this->image_lib->resize(); //do whatever specified in config
                        $this->image_lib->clear();
                        // thumb ends
						
						
						 /* Second size (orignal image)*/   
						 $configSize2['image_library']   = 'gd2';
						 $configSize2['source_image']    = $data['full_path'];
						 $configSize2['maintain_ratio']  = false;
						 $configSize2['width']           = 328;
						 $configSize2['height']          = 420;
						 $configSize2['new_image']       = $data['file_path'];
						
						 $this->image_lib->initialize($configSize2);
						 $this->image_lib->resize();
						 $this->image_lib->clear();

                        //echo "<pre>"; print_r($arrAddData); die;
                        $insertedFlag	= $this->gallery_model->save_gallery($arrAddData);

                    }
                    else
                    {
                        $data['upload_errors'][$i] = $this->upload->display_errors();
                    }
                }

                //print_r($image); die;



                if ($insertedFlag)
				{
                    $this->session->set_flashdata('success', 'Product Gallery Added Successfully !!');
                    redirect('admin/gallery/list_gallery/'.$product_id);

                }else
				{
                    $this->session->set_flashdata('error', 'Failed to Add Gallery !!');
                    redirect('admin/gallery/add');
                }
            }
        }
        $arrData['middle'] = 'admin/gallery/add';
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

    public function edit($galleryId)
    {
        $arrData['GalleryDetails']	= $this->gallery_model->get_gallery_details_using_galleryId($galleryId);

        //$arrData['projectDetails']	= $this->gallery_model->get_admin_gallery_details($iGalleryId);

        //echo"<pre>"; print_r($arrData['projectDetails']); die;
        $product_id = $arrData['GalleryDetails'][0]['gallery_product_id'];

        if ($this->input->post('btnEditGallery'))
        {
            // Testimonial Image UPpload START

            if ($_FILES['galleryImage']['name'] != '')
            {
                //$config['upload_path'] = $_SERVER['DOCUMENT_ROOT'].'codeigniter_login/public/upload/gallery/';
				$config['upload_path'] = './public/upload/gallery/';
                $config['allowed_types'] = 'gif|jpg|jpeg|png|pdf';
                $config['max_size']    = '10240';

                //load upload class library
                //$this->upload->initialize($config);
                $this->load->library('upload',$config);

                if (!$this->upload->do_upload('galleryImage'))
                {
                    // case - failure
                    $upload_error = array('error' => $this->upload->display_errors());
                    //print_r($upload_error);
                }
                else
                {
                    // case - success
                    //$arrAddData["photo"]	= $this->upload->data();
                    $UpdateData["gallery_image"] = $this->upload->file_name;

                    // Deleting previous image.
                    $prev_file = $arrData['GalleryDetails'][0]['gallery_image'];

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
                            'width'            => 500,
							'height'           => 500
                        );

                        $this->load->library('image_lib',$config);
                        $this->image_lib->resize(); //do whatever specified in config
                        $this->image_lib->clear();
                        // thumb ends
						
						
						 /* Second size (orignal image)*/   
						 $configSize2['image_library']   = 'gd2';
						 $configSize2['source_image']    = $data['full_path'];
						 $configSize2['maintain_ratio']  = false;
						 $configSize2['width']           = 328;
						 $configSize2['height']          = 420;
						 $configSize2['new_image']       = $data['file_path'];
						
						 $this->image_lib->initialize($configSize2);
						 $this->image_lib->resize();
						 $this->image_lib->clear();
                }
            }

            // Testimonial Image Upload END
            $UpdateData["gallery_product_id"]	  	= $product_id;
            $UpdateData["gallery_status"]	  		= 1;

            //echo "<pre>"; print_r($UpdateData); die;
            $updateFlag	= $this->gallery_model->update_gallery($galleryId,$UpdateData);

            if ($updateFlag)
			{
                $this->session->set_flashdata('success', 'Product Gallery updated Successfully !!');
                redirect('admin/gallery/list_gallery/'.$product_id);

            }
			else
			{
                $this->session->set_flashdata('error', 'Failed to updated Product Gallery !!');
                redirect('admin/gallery/edit/'.$galleryId);
            }
        }
        $arrData['middle'] = 'admin/gallery/edit';
        $this->load->view('admin/template',$arrData);
    }
    /**
     * delete_gallery
     *
     * This help to delete Product detail
     *
     * @author	Nilesh Dabhi
     * @access	public
     * @return	void
     */

    public function delete_gallery($galleryId)
    {
        if($galleryId!='') {
            $gallery = $this->gallery_model->get_gallery_details_using_galleryId($galleryId);

            $image = $gallery[0]['gallery_image'];

           // $imgPath =  $_SERVER['DOCUMENT_ROOT'] . '/clothesloop/public/upload/gallery/';
			$imgPath = './public/upload/gallery/';
           // $thumbPath = $_SERVER['DOCUMENT_ROOT'] . '/clothesloop/public/upload/gallery/thumb/';
			$thumbPath = './public/upload/gallery/thumb/';

            if ($image != '' && file_exists($imgPath . $image))
                unlink($imgPath . $image);

            if ($image != '' && file_exists($thumbPath . $image))
                unlink($thumbPath . $image);
            $delete = $this->gallery_model->delete_gallery($galleryId);

            if ($delete)
                $this->session->set_flashdata('success', 'Data deleted Successfully !!');
            else
                $this->session->set_flashdata('error', 'Failed to delete Data !!');
        }

        redirect('admin/gallery/list_gallery/'.$gallery[0]['gallery_product_id']);
    }


}

?>