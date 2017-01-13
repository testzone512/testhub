<?php 
/**
* Ecommerce
*
* @package		Category
* @subpackage   controller
* @author		Chintan Bhimani
* @copyright	Copyright (c) 2012 - 2013 
* @since		Version 1.0
*/
 

class Category extends CI_Controller {

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
		
		if($this->session->userdata('logged_user_in') == 0) {
			redirect('admin/login');
			break;
		}

		$this->load->model('admin/category_model');
	
	}

	
	/**
	* index
	*
	* This help to list all the categories
	* 
	* @author	Chintan Bhimani
	* @access	public
	* @return	void
	*/
	
	public function index()
	{
		$arrParentCat		= array();
		$arrParentCat['0']	= '---';

		$arrData['categoryDetails']	= $this->category_model->get_category_details();
		
		foreach($arrData['categoryDetails'] as $catDetails){
			$arrParentCat[$catDetails['category_id']]	= $catDetails['category_name'];
		}
		$arrData['arrParentCat']	= $arrParentCat;
		$arrData['middle']			= 'admin/category/listcategory';
		$this->load->view('admin/template',$arrData);		
	}


	/**
	* add
	*
	* This help to add category
	* 
	* @author	Chintan Bhimani
	* @access	public
	* @return	void
	*/
	
	public function add()
	{
		$ab = date_default_timezone_set("Asia/Kolkata");
		date_default_timezone_get($ab);
		
		$catDetails = array();
		
		if ($this->input->post('cmbSubmit')){

			$this->form_validation->set_rules('txtCategoryName', 'Category Name','trim|required');
			
			if ($this->form_validation->run() == TRUE){

				$arrData["category_parent_id"]		= $this->input->post('cmbMainCat');
				$arrData["category_name"]			  = $this->input->post('txtCategoryName');
				$arrData["category_created_on"]		= date('Y-m-d H:i:s');
				
				//echo"<pre>";print_r($arrData); die;		
				$insertedFlag	= $this->category_model->save_category($arrData);
				
				if ($insertedFlag){
					
					$this->session->set_flashdata('success', 'Category Added Successfully !!');
					redirect('admin/category');

				}else{
					
					$this->session->set_flashdata('error', 'Failed to Add Category !!');
					redirect('admin/category/add');				
				}
			} // validation error
		}

		// Main Category Details START
		$categoryDetails	= $this->category_model->get_sub_category_details('0');
		
		$catDetails[0] = "--- Select Main Category ---";
		
		foreach($categoryDetails as $category){
			$catDetails[$category['category_id']] = $category['category_name'];
		}
		 
		$arrData['catDetails'] = $catDetails ;

		$arrData['middle'] = 'admin/category/add';
		$this->load->view('admin/template',$arrData);
	}


	/**
	* edit
	*
	* This help to edit category
	* 
	* @author	Chintan Bhimani
	* @access	public
	* @param	iCategoryId
	* @return	void
	*/
	
	public function edit($iCategoryId)
	{
		$catDetails = array();

		$arrData['categoryDetails']	= $this->category_model->get_category_details($iCategoryId);
		
		$categoryDetails	= $this->category_model->get_sub_category_details('0');
		
		$catDetails[0] = "---";
		
		foreach($categoryDetails as $category){
			$catDetails[$category['category_id']] = $category['category_name'];
		}
		
		$arrData['catDetails'] = $catDetails ;

		if ($this->input->post('cmbSubmit')){
			
			$this->form_validation->set_rules('txtCategoryName', 'Category Name','trim|required');
			
			if ($this->form_validation->run() == TRUE){
			
				$UpdateData['category_parent_id']		= $this->input->post('cmbMainCat');
				$UpdateData["category_name"]			 = $this->input->post('txtCategoryName');
				$UpdateData["category_updated_on"]	   = date('Y-m-d H:i:s');
							
				$updateFlag	= $this->category_model->update_category($iCategoryId,$UpdateData);
				
				if ($updateFlag){
					
					$this->session->set_flashdata('success', 'category updated Successfully !!');
					redirect('admin/category');

				}else{
					
					$this->session->set_flashdata('error', 'Failed to updated category !!');
					redirect('admin/category/edit/'.$iCategoryId);				
				}
			}

		}
		
		$arrData['middle'] = 'admin/category/edit';
		$this->load->view('admin/template',$arrData);
	}
	
	/**
	* delete
	*
	* This help to delete Category detail
	* 
	* @author	Chintan Bhimani
	* @access	public
	* @return	void
	*/

	public function delete($iCategoryId)
	{
		$dependency = $this->category_model->checkcategoryDependencies($iCategoryId);
		if($dependency=='')
		{
			$delete = $this->category_model->delete_catgory($iCategoryId);

			if ($delete)
				$this->session->set_flashdata('success', 'Data deleted Successfully !!');
			else
				$this->session->set_flashdata('error', 'Failed to delete Data !!');
		}
		else
		{
			$this->session->set_flashdata('error', "This category cannot be deleted. It has dependiences in following tables : <br/>".$dependency);
		}

		redirect('admin/category');
	}

}

?>