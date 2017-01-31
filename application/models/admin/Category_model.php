<?php
/**
 *radhe creation
 *
 * @Description  This class is used to interact with the Category table using Codeignitor db core class. All the Data Insert,Retrival and Update operations related to Category are performed here.
 *
 * @package		Category
 * @subpackage  Model
 * @author		Chintan Bhimani
 * @copyright	Copyright (c) 2012 - 2013
 * @since		Version 1.0
 */
 
// ------------------------------------------------------------------------

/**
 *
 * This is Category Model
 *
 * @author		Chintan Bhimani
 * @package		Codeigniter
 * @subpackage	Model
 */

class Category_model extends CI_Model{
	
	// --------------------------------------------------------------------

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
		// Initialization of class
		parent::__construct();
	}
	
	/**
	 * save_category
	 *
	 * This is used to save category details
	 *
	 * @author	Chintan Bhimani
	 * @access	public
	 * @param   array-$arrData
	 * @return void
	 */
	function save_category($arrData){
		
		if($this->db->insert('category', $arrData)){
			return true;
		}else{
			return false;
		}

	}


	/**
	 * get_category_details
	 *
	 * This is used to get category details
	 *
	 * @author	Chintan Bhimani
	 * @access	public
	 * @param   integer-$icategoryId 
	 * @return void
	 */
	function get_category_details($iCategoryId = 0,$iParentCatId = -1){
		
		$arrData = array();
		
		if($iCategoryId != 0 ){
			$this->db->where('category_id', $iCategoryId); 
		}
		
		if($iParentCatId != -1 ){
			$this->db->where('category_parent_id', $iParentCatId);
		}
		$this->db->select('category_id,category_name,category_parent_id');
		
		$objQuery = $this->db->get('category');
		
		//echo $this->db->last_query(); die;
		
		return $objQuery->result_array();

	}


	/**
	 * update_category
	 *
	 * This is used to update category details
	 *
	 * @author	Chintan Bhimani
	 * @access	public
	 * @param   array-$arrData, integer-$iCategoryId
	 * @return void
	 */
	function update_category($iCategoryId,$arrData){
		
		$this->db->where('category_id',$iCategoryId);

		if($this->db->update('category', $arrData))
		{
				return true;
		}
		else
		{
				return false;
		}	

	}

	/**
	 * delete_catgory
	 *
	 * This is used to delete category details
	 *
	 * @author	Chintan Bhimani
	 * @access	public
	 * @param   integer-$icategoryId
	 * @return void
	 */
	function delete_catgory($iCategoryId){
		
		if($this->db->delete('category', array('category_id' => $iCategoryId)))
		{
				return true;
		}
		else
		{
				return false;
		}	
	}

	

	/**
	 * checkcategoryDependencies
	 *
	 * This is used to delete category details
	 *
	 * @author	Chintan Bhimani
	 * @access	public
	 * @param   integer-$iCategoryId
	 * @return void
	 */
	function checkcategoryDependencies($iCategoryId)
	{

		$message = '';
		$this->db->select("category_parent_id");
		$this->db->from('category');
		$this->db->where('category_parent_id', $iCategoryId);
		//echo $this->db->last_query(); die;
		$objQuery = $this->db->get();

		$arrAccount =  $objQuery->result_array();
		//print_r($arrAccount); die;
		if(count($arrAccount) > 0)
			$message .= "Category Module<br>";

		return $message;
	}

	/**
	 * get_category_details
	 *
	 * This is used to get category details
	 *
	 * @author	Chintan Bhimani
	 * @access	public
	 * @param   integer-$icategoryId 
	 * @return void
	 */
	function get_sub_category_details($iCategoryId = 0){
		
		$arrData = array();

		$this->db->select('*');
		$this->db->from('category');
		if($iCategoryId != 0 ){
			$this->db->where('category_id', $iCategoryId); 
		}
		
		$objQuery = $this->db->get();
		
		//echo $this->db->last_query(); die;
		
		return $objQuery->result_array();

	}

}

?>