<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Size_model extends CI_Model
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
    function get_size_details_for_listing() 
	{
        $this->db->select("*");
        $this->db->from("size");
        $this->db->order_by("size_id", "desc");
        $objQuery = $this->db->get();

        //$this->db->last_query();

        return $objQuery->result_array();
    }
	
   /**
     * save_size
     *
     * This is used to save_cms
     *
     * @author	Nilesh Dabhi
     * @access	public
     * @param   array-$arrData
     * @return void
     */
    function save_size($arrData) {

        if ($this->db->insert('size', $arrData)) {
            return true;
        } else {
            return false;
        }
    }



    /**
     * get_size_details_for_edit
     *
     * This is used to get size details
     *
     * @author	Nilesh Dabhi
     * @access	public
     * @param   integer-$sizeId
     * @return void
     */
    function get_size_details_for_edit($sizeId = 0){

        $arrData = array();

        if($sizeId != 0 ){
            $this->db->where('size_id', $sizeId);
        }
        $this->db->select();
        $objQuery = $this->db->get('size');
        //$this->db->last_query();

        return $objQuery->result_array();

    }
	
	
	/**
     * update_size
     *
     * This is used to update Size details
     *
     * @author	Nilesh Dabhi
     * @access	public
     * @param   array-$UpdateData, integer-$sizeId
     * @return void
     */
    function update_size($sizeId, $UpdateData) 
	{

        $this->db->where('size_id', $sizeId);

        if ($this->db->update('size', $UpdateData))
		 {
            return true;
		 } 
		 else 
		 {
			return false;
		 }
    }

	
    /**
     * delete_size
     *
     * This is used to delete Size details
     *
     * @author	Nilesh Dabhi
     * @access	public
     * @param   integer-$sizeId
     * @return void
     */
    function delete_size($sizeId)
	{

        if($this->db->delete('size', array('size_id' => $sizeId)))
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