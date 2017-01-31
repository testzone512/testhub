<?php 
/**
* Ecommerce
*
* @package		Codeigniter
* @subpackage   controller
* @author		Chintan Bhimani
* @copyright	Copyright (c) 2012 - 2013 
* @since		Version 1.0
*/
 

class Product extends CI_Controller {

	/**
	* __construct
	*
	* Calls parent constructor
	* @author	Chintan Bhimani
	* @access	public
	* @return	void
	*/
	function __construct()
	{
		parent::__construct();
		if($this->session->userdata('logged_user_in')!=1)
		 {								
			redirect('admin/login','refresh');							
		 }
		$this->load->library('session');
		$this->load->model('admin/product_model'); 
		$this->load->model('admin/gallery_model'); 
		$this->load->model('admin/colour_model');
		$this->load->model('admin/size_model');
	}

	
	/**
	* index
	*
	* This is used to verify user credential for login
	* 
	* @author	Chintan Bhimani
	* @access	public
	* @return	void
	*/
	
	public function index()
	{
		$arrData['productDetails'] = $this->product_model->get_product_details_for_listing();
		$arrData['middle']='admin/product/list';
		$this->load->view('admin/template',$arrData);
	}
	
	 /**
     * add_select_type_product
     *
     * This help to add category
     *
     * @author	Nilesh Dabhi
     * @access	public
     * @return	void
     */

    public function add_select_type_product()
    {
        if (isset($_POST['btnAddProductType']))
        {
            $this->form_validation->set_rules('sltProductCategory', 'Product Category Name', 'trim|required');
            if ($this->form_validation->run() == TRUE)
            {
                $getcategory = $this->product_model->get_parent_category();
                $arrData['categorydata']	   = $getcategory;
                $arrData['sltProductCategory'] = $this->input->post('sltProductCategory');
				$arrData['colourDetail'] 	   = $this->colour_model->get_colour_details();
				$arrData['sizeDetail'] 		   = $this->size_model->get_size_details_for_listing();
				//echo "<pre>"; print_r($arrData['colourDetail']); die;
                $arrData['middle'] = 'admin/product/add';
                $this->load->view('admin/template', $arrData);
            }
        }
        else 
		{
            // select Product if simple product or variant product.
            $arrData['middle'] = 'admin/product/select_type';
            $this->load->view('admin/template', $arrData);
        }

    }
	
	
   /**
     * add
     *
     * This help to add Product
     *
     * @author	Nilesh Dabhi
     * @access	public
     * @return	void
     */

	
	public function add()
    {
        if (isset($_POST['btnAddProduct']))
        {
            $this->form_validation->set_rules('txtProductName', 'ProductName', 'trim|required');
            $this->form_validation->set_rules('sltProductCategory', 'Product Category', 'trim|required');
            $this->form_validation->set_rules('txtProductQty', 'Qty', 'trim|required|integer');
            $this->form_validation->set_rules('txtProductPrice', 'Price', 'trim|required|integer');

            if ($this->form_validation->run() == TRUE)
            {
                if ($_FILES['productImage']['name'] != '')
                {
                   //$config['upload_path'] = $_SERVER['DOCUMENT_ROOT'] . '/clothesloop/public/upload/product/';
					$config['upload_path'] = './public/upload/product/';
				 // $config['upload_path'] = base_url('public/upload/product/');
                    $config['allowed_types'] = 'gif|jpg|png|jpeg';
                    $config['max_size'] = '10240';
                    //if no folder in directory then create new folder
                    if (!is_dir($config['upload_path']))
                    {
                        mkdir($config['upload_path'], 0777);
                        chmod($config['upload_path'], 0777);
                    }
                    $this->load->library('upload', $config);
                    if (!$this->upload->do_upload('productImage'))
                    {
                        // case - failure
                        $upload_error = array('error' => $this->upload->display_errors());
                        //print_r($upload_error);
                    }
                    else
                    {
                        // case - success
                        //$arrAddData["photo"]    = $this->upload->data();
                        $arrProductData["product_image"] = $this->upload->file_name;
                        $data = $this->upload->data();
                        $upload_data = $this->upload->data();

                       $config = array(
                            'source_image'     => $data['full_path'], //get original image
                            'new_image'        => $data['file_path'].'thumb', //save as new image //need to create thumbs first
                            'maintain_ratio'   => false,
                            'width'            => 500,
							'height'           => 500
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
						 $configSize2['width']           = 328;
						 $configSize2['height']          = 420;
						 $configSize2['new_image']       = $data['file_path'];
						
						 $this->image_lib->initialize($configSize2);
						 $this->image_lib->resize();
						 $this->image_lib->clear();
						 
						

                    }//end do-upload condition
                }//end productImage empty condition
                $arrProductData["product_name"]        = $this->input->post('txtProductName');
                $arrProductData["product_category_id"] = $this->input->post('sltProductCategory');
                $arrProductData["product_type"]        = $this->input->post('hdnsltProductCategory');
                $arrProductData["product_qty"]         = $this->input->post('txtProductQty');
                $arrProductData["product_price"]       = $this->input->post('txtProductPrice');
                $arrProductData["product_status"]      = 1;
				$arrProductData["product_created_on"]  = date('Y-m-d H:i:s');

                $insertedFlag = $this->product_model->save_product($arrProductData);
                $lastInsertedId = $this->db->insert_id();
                if($this->input->post('hdnsltProductCategory')=='Multiple')
                {
                    $addAttribute['pd_product_id'] = $lastInsertedId;

                    foreach ($_POST['sltMulsize'] as $key => $value)
					 {
                        ///echo "key  = ".$key."<br/>";
                        $addAttribute['pd_product_color'] 	= implode(',', $_POST['sltMulcolour'][$key]);
                        $addAttribute['pd_product_weight']  = $_POST['txtMulweight'][$key];
                        $addAttribute['pd_product_size']    = $_POST['sltMulsize'][$key];
                        $addAttribute['pd_product_price']   = $_POST['txtMulprice'][$key];
                       // echo "<pre>"; print_r($addAttribute); 
                       $this->product_model->save_productdetail($addAttribute);
                    }
					//die;
                }
                    if ($insertedFlag)
                    {
                        $this->session->set_flashdata('success', 'Product Added Successfully !!');
                        redirect('admin/product');
                    }
                    else
                    {
                        $this->session->set_flashdata('error', 'Failed to Add Product !!');
                        redirect('admin/product/add');
                    }
            }//end validation condition
        }
        $arrData['middle'] = 'admin/product/add';
        $this->load->view('admin/template', $arrData);
    }
	
	/**
     * edit
     *
     * This help to edit Product
     *
     * @author	Nilesh Dabhi
     * @access	public
     * @return	void
     */

	public function edit($productId)
    {
        $arrData['product'] 	 = $this->product_model->get_product_for_edit($productId);
		$arrData['colourDetail'] = $this->colour_model->get_colour_details();
		//echo "<pre>"; print_r($arrData['colourDetail']); die;
		$arrData['sizeDetail'] 	 = $this->size_model->get_size_details_for_listing();
				
        $getcategory = $this->product_model->get_parent_category();
        $arrData['categorydata'] = $getcategory;
        if ($arrData['product'][0]['product_type'] == 'Multiple')
        {
            $arrProdDetails = $this->product_model->get_product_details_for_edit($arrData['product'][0]['product_id']);
            $arrData['ProdctDetails'] = $arrProdDetails;
        }

        if (isset($_POST['btnEditProduct']))
        {
            $this->form_validation->set_rules('txtProductName', 'ProductName', 'trim|required');
            $this->form_validation->set_rules('sltProductCategory', 'Product Category', 'trim|required');
            $this->form_validation->set_rules('txtProductQty', 'Qty', 'trim|required|integer');
            $this->form_validation->set_rules('txtProductPrice', 'Price', 'trim|required|integer');

            if ($this->form_validation->run() == TRUE)
            {
                if ($_FILES['productImage']['name'] != '')
                {
                    //$config['upload_path'] = $_SERVER['DOCUMENT_ROOT'] . '/clothesloop/public/upload/product/';
					$config['upload_path'] = './public/upload/product/';
                    $config['allowed_types'] = 'gif|jpg|png|jpeg';
                    $config['max_size'] = '10240';
                    //if no folder in directory then create new folder
                    if (!is_dir($config['upload_path']))
                    {
                        mkdir($config['upload_path'], 0777);
                        chmod($config['upload_path'], 0777);
                    }
                    $this->load->library('upload', $config);
                    if (!$this->upload->do_upload('productImage'))
                    {
                        // case - failure
                        $upload_error = array('error' => $this->upload->display_errors());
                        //print_r($upload_error);
                    }
                    else
                    {
                        // Deleting previous image.
                        $prev_file = $arrData['product'][0]['product_image'];

                        // Unlink the image from project and thumb folder
                        if ($prev_file != '' && file_exists($config['upload_path'] . $prev_file)) 
						{
                            unlink($config['upload_path'] . $prev_file);
                            unlink($config['upload_path'] . "thumb/" . $prev_file);
                        }
                        // case - success
                        //$arrAddData["photo"]    = $this->upload->data();
                        $upProductData["product_image"] = $this->upload->file_name;
                        $data = $this->upload->data();
                        $upload_data = $this->upload->data();

                        $config = array(
                            'source_image'     => $data['full_path'], //get original image
                            'new_image'        => $data['file_path'].'thumb', //save as new image //need to create thumbs first
                            'maintain_ratio'   => false,
                            'width'            => 500,
							'height'           => 500
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
						 $configSize2['width']           = 328;
						 $configSize2['height']          = 420;
						 $configSize2['new_image']       = $data['file_path'];
						
						 $this->image_lib->initialize($configSize2);
						 $this->image_lib->resize();
						 $this->image_lib->clear();
						 
						
						 
						 
						

                    }//end do-upload condition
                }//end productImage empty condition
                $upProductData["product_name"]        = $this->input->post('txtProductName');
                $upProductData["product_category_id"] = $this->input->post('sltProductCategory');
                $upProductData["product_qty"]         = $this->input->post('txtProductQty');
                $upProductData["product_price"]       = $this->input->post('txtProductPrice');
                $upProductData["product_status"]      = 1;
				$upProductData["product_updated_on"]  = date('Y-m-d H:i:s');
				//print_r($upProductData); die;
                $updateFlag = $this->product_model->update_product($productId,$upProductData);

                if($arrData['product'][0]['product_type'] == 'Multiple')
                {
                   // $this->product_model->delete_product_detail($productId);

                    $upAttribute['pd_product_id'] = $productId;
                    foreach ($_POST['txtMulsize'] as $key => $value) {
                        ///echo "key  = ".$key."<br/>";
                        $upAttribute['pd_product_color'] 	= implode(',', $_POST['sltMulcolour'][$key]);
                        $upAttribute['pd_product_weight'] 	= $_POST['txtMulweight'][$key];
                        $upAttribute['pd_product_size'] 	= $_POST['txtMulsize'][$key];
                        $upAttribute['pd_product_price'] 	= $_POST['txtMulprice'][$key];
                       // print_r($upAttribute); 
                        $this->product_model->save_productdetail($upAttribute);
                    }//die;
                }
                if ($updateFlag)
                {
                    $this->session->set_flashdata('success', 'Product Updated Successfully !!');
                    redirect('admin/product');
                }
                else
                {
                    $this->session->set_flashdata('error', 'Failed to Updated Product !!');
                    redirect('admin/product/edit_product');
                }
            }//end validation condition
        }
        $arrData['middle'] = 'admin/product/edit';
        $this->load->view('admin/template', $arrData);
    }
	
	/**
     * view
     *
     * This help to view Product detail
     *
     * @author	Nilesh Dabhi
     * @access	public
     * @return	void
     */
	 
	 public function view($productId)
	 {
		$arrData['productDetails'] = $this->product_model->get_product_details_for_view($productId);
		//get the gallery details
		$arrData['galleryDetails'] = $this->gallery_model->get_gallery_details_using_productId($productId);
		$arrData['productDetails'] = $this->product_model->get_product_details_for_view($productId);
		//echo "<pre>"; print_r($arrData['galleryDetails']);die;
		$arrData['productAttributeDetails'] = $this->product_model->get_product_details_for_edit($productId);
		$arrData['middle']='admin/product/view';
		$this->load->view('admin/template',$arrData);
	 }
	
	/**
     * delete_product
     *
     * This help to delete Product detail
     *
     * @author	Nilesh Dabhi
     * @access	public
     * @return	void
     */

    public function delete_product($productId)
    {
        if($productId!='') {
            $product = $this->product_model->get_product_for_edit($productId);

            $image = $product[0]['product_image'];

            //$imgPath =  $_SERVER['DOCUMENT_ROOT'] . '/clothesloop/public/upload/product/';
			$imgPath  = './public/upload/product/';
            //$thumbPath = $_SERVER['DOCUMENT_ROOT'] . '/clothesloop/public/upload/product/thumb/';
			$thumbPath  = './public/upload/product/thumb/';

            if ($image != '' && file_exists($imgPath . $image))
                unlink($imgPath . $image);

            if ($image != '' && file_exists($thumbPath . $image))
                unlink($thumbPath . $image);
            $delete = $this->product_model->delete_product($productId);

            if ($delete)
                $this->session->set_flashdata('success', 'Data deleted Successfully !!');
            else
                $this->session->set_flashdata('error', 'Failed to delete Data !!');
        }

        redirect('admin/product');
    }
	
	
	/**
     * ajax_product_active_inactive
     *
     * This help to active or deactive Product using ajax
     *
     * @author	Nilesh Dabhi
     * @access	public
     * @return	void
     */
    public function ajax_product_active_inactive()
    {
        //print_r($this->session->userdata()); die;
        $Action = $this->input->post('Action');
        $ProductId = $this->input->post('ProductId');

        //update category active or inactive
        $upDataflag = $this->product_model->update_active_inactive_product($Action,$ProductId);
        if ($upDataflag == TRUE) 
		{
            echo $Action;
        } 
		else 
		{
            echo $Action;
        }
    }

	
}