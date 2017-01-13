<?php
/**
 *Ecomeerce
 *
 * @Description  This class is used to interact with the Category table using Codeignitor db core class. All the Data Insert,Retrival and Update operations related to Category are performed here.
 *
 * @package		Profile
 * @subpackage  Model
 * @author		Chintan Bhimani
 * @copyright	Copyright (c) 2012 - 2013
 * @since		Version 1.0
 */
 
// ------------------------------------------------------------------------

/**
 *
 * This is Profile Model
 *
 * @author		Chintan Bhimani
 * @package		Codeigniter
 * @subpackage	Model
 */

class Profile_model extends CI_Model{
	
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
	 * get_profile_details
	 *
	 * This is used to get profile details
	 *
	 * @author	Chintan Bhimani
	 * @access	public
	 * @param   integer-$userId 
	 * @return void
	 */
	function get_profile_details($userId = ''){
		
		$arrData = array();
		
		if($userId != ''){
			$this->db->where('user_id', $userId); 
		}
		
		$this->db->select('*');
		$this->db->join('country cty','cty.country_id = u.user_country_id');
		$this->db->join('state s','s.state_id = u.user_state_id');
		$this->db->join('city ct','ct.city_id = u.user_city_id');
		
		$objQuery = $this->db->get('users u');
		
		//echo $this->db->last_query(); die;
		
		return $objQuery->result_array();

	}


	/**
	 * update_profile
	 *
	 * This is used to update profile details
	 *
	 * @author	Chintan Bhimani
	 * @access	public
	 * @param   array-$arrData, integer-$userId
	 * @return void
	 */
	function update_profile($userId,$arrData){
		
		$this->db->where('user_id',$userId);

		if($this->db->update('users', $arrData))
		{
				return true;
		}
		else
		{
				return false;
		}	

	}

	/**
	 * get_state_based_on_country
	 *
	 * This is used to get sport details
	 *
	 * @author	Chintan Bhiamani
	 * @access	public
	 * @param   integer-$countryId 
	 * @return void
	 */
	function get_state_based_on_country($countryId){
		
		$this->db->select("state_id, state_name");
		
		$this->db->from("state");
		$this->db->where('state_country_id',$countryId);
		$this->db->order_by('state_name');
		$query = $this->db->get();
		return $query->result_array();

	}

	/**
	 * get_city_based_on_state
	 *
	 * This is used to get sport details
	 *
	 * @author	Chintan Bhiamani
	 * @access	public
	 * @param   integer-$countryId 
	 * @return void
	 */
	function get_city_based_on_state($stateId){
		
		$this->db->select("city_id, city_name");
		
		$this->db->from("city");
		$this->db->where('city_state_id',$stateId);
		$this->db->order_by('city_name');
		$query = $this->db->get();
		return $query->result_array();

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

}

?>