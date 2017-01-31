<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class User_model extends CI_Model
{

    public function __construct()
    {
        $this->load->database('default');
        $this->load->library('session');

        // Call the Model constructor
        parent::__construct();
    }



    /**
     * get_cms_details_for_listing
     *
     * This is used to get Cms details
     *
     * @author	Nilesh Dabhi
     * @access	public
     * @return void
     */
    function get_user_details_for_listing() 
	{
        $this->db->select("*");
        $this->db->from("users");
		if($this->session->userdata('user_is_admin')==0)
		{
			 $this->db->where('user_id', $this->session->userdata('user_id'));
		}
        $this->db->order_by("user_id", "desc");
        $objQuery = $this->db->get();

        //$this->db->last_query();

        return $objQuery->result_array();
    }


	 /**
     * get_user_details_for_view
     *
     * This is used to get User details
     *
     * @author	Nilesh Dabhi
     * @access	public
	 * @param   array-, integer-$userId
     * @return void
     */
    function get_user_details_for_view($userId) 
	{
        $this->db->select("*");
        $this->db->from("users u");
		$this->db->join('country cty','cty.country_id = u.user_country_id','left');
		$this->db->join('state s','s.state_id = u.user_state_id','left');
		$this->db->join('city ct','ct.city_id = u.user_city_id','left');
        if($userId != 0 ){
            $this->db->where('user_id', $userId);
        }
        $objQuery = $this->db->get();

        //$this->db->last_query();

        return $objQuery->result_array();
    }

	/**
     * update_active_inactive_product
     *
     * This help to update active or inactive Product
     *
     * @author	Nilesh Dabhi
     * @access	public
     * @return	void
     */
    public function update_active_inactive_user($Action,$UserId) 
	{
        if ($Action == 'Active')
        {
            $result = $this->db->query("UPDATE users SET user_activation_pending ='0' WHERE user_id=$UserId");
        } else {
            $result = $this->db->query("UPDATE users SET user_activation_pending ='1' WHERE user_id=$UserId");
        }

        if ($result) 
		{
            return true;
        }
		 else
		{
            return false;
        }
    }
	
    /**
     * delete_user
     *
     * This is used to delete user details
     *
     * @author	Nilesh Dabhi
     * @access	public
     * @param   integer-$cmsId
     * @return void
     */
    function delete_user($userId)
	{

        if($this->db->delete('users', array('user_id' => $userId)))
        {
            return true;
        }
        else
        {
            return false;
        }
    }






}
?>