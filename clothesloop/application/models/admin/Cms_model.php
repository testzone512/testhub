<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Cms_model extends CI_Model
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
    function get_cms_details_for_listing() {


        $this->db->select("*");
        $this->db->from("cms");
        $this->db->order_by("cms_id", "desc");
        $objQuery = $this->db->get();

        //$this->db->last_query();

        return $objQuery->result_array();
    }


    /**
     * save_cms
     *
     * This is used to save_cms
     *
     * @author	Nilesh Dabhi
     * @access	public
     * @param   array-$arrData
     * @return void
     */
    function save_cms($arrData) {

        if ($this->db->insert('cms', $arrData)) {
            return true;
        } else {
            return false;
        }
    }

    /**
     * get_cms_details_for_edit
     *
     * This is used to get product details
     *
     * @author	Nilesh Dabhi
     * @access	public
     * @param   integer-$iproductid
     * @return void
     */
    function get_cms_details_for_edit($cmsId = 0){

        $arrData = array();

        if($cmsId != 0 ){
            $this->db->where('cms_id', $cmsId);
        }

        $this->db->select();

        $objQuery = $this->db->get('cms');

        //$this->db->last_query();

        return $objQuery->result_array();

    }


    /**
     * update_cms
     *
     * This is used to update Product details
     *
     * @author	Nilesh Dabhi
     * @access	public
     * @param   array-$UpdateData, integer-$iclientid
     * @return void
     */
    function update_cms($cmsId, $UpdateData) {

        $this->db->where('cms_id', $cmsId);

        if ($this->db->update('cms', $UpdateData)) {
            return true;
        } else {
            return false;
        }
    }
	
	 /**
     * get_cms_details_for_view
     *
     * This is used to get Cms details
     *
     * @author	Nilesh Dabhi
     * @access	public
	 * @param   array-, integer-$cmsId
     * @return void
     */
    function get_cms_details_for_view($cmsId) 
	{
        $this->db->select("*");
        $this->db->from("cms");
        if($cmsId != 0 ){
            $this->db->where('cms_id', $cmsId);
        }
        $objQuery = $this->db->get();

        //$this->db->last_query();

        return $objQuery->result_array();
    }


    /**
     * delete_cms
     *
     * This is used to delete cms details
     *
     * @author	Nilesh Dabhi
     * @access	public
     * @param   integer-$cmsId
     * @return void
     */
    function delete_cms($cmsId)
	{

        if($this->db->delete('cms', array('cms_id' => $cmsId)))
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