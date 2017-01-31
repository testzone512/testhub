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
	 * get_sub_category_details
	 *
	 * This is used to get category details
	 *
	 * @author	Chintan Bhimani
	 * @access	public
	 * @param   integer-$icategoryId 
	 * @return void
	 */
	function get_sub_category_details(){
		
		$arrData = array();

		$this->db->select('*');
		$this->db->from('category');

		$this->db->where_not_in('category_parent_id',0);

		
		$objQuery = $this->db->get();
		
		//echo $this->db->last_query(); die;
		
		return $objQuery->result_array();

	}

}

?>