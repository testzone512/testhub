<?php

/**
 * Ecommerce
 *
 * @Description  This class is used to interact with the Category table using Codeignitor db core class. All the Data Insert,Retrival and Update operations related to Category are performed here.
 *
 * @package		Shipping
 * @subpackage  Model
 * @author		Chintan Bhimani
 * @copyright	Copyright (c) 2012 - 2013
 * @since		Version 1.0
 */
// ------------------------------------------------------------------------

/**
 *
 * This is Shipping Model
 *
 * @author		Chintan Bhimani
 * @package		Codeigniter
 * @subpackage	Model
 */
class Shipping_model extends CI_Model {
    // --------------------------------------------------------------------

    /**
     * __construct
     *
     * Calls parent constructor
     * @author	Chintan Bhimani
     * @access	public
     * @return	void
     */
    function __construct() {
        // Initialization of class
        parent::__construct();
    }

    /**
     * save_shipping
     *
     * This is used to save shipping details
     *
     * @author	Chintan Bhimani
     * @access	public
     * @param   array-$arrData
     * @return void
     */
    function save_shipping($arrData) {

        if ($this->db->insert('shipping', $arrData)) {
            return true;
        } else {
            return false;
        }
    }

    /**
     * get_shipping_details
     *
     * This is used to get shipping details
     *
     * @author	Chintan Bhimani
     * @access	public
     * @param   integer-$shippingId 
     * @return void
     */
    function get_shipping_details($shippingId = 0) {

        $arrData = array();

        if ($shippingId != 0) {
            $this->db->where('shipping_id', $shippingId);
        }


        $this->db->select('*');

        $objQuery = $this->db->get('shipping');

        //echo $this->db->last_query(); die;

        return $objQuery->result_array();
    }

    /**
     * update_shipping
     *
     * This is used to update shipping details
     *
     * @author	Chintan Bhimani
     * @access	public
     * @param   array-$arrData, integer-$shippingId
     * @return void
     */
    function update_shipping($shippingId, $arrData) {

        $this->db->where('shipping_id', $shippingId);

        if ($this->db->update('shipping', $arrData)) {
            return true;
        } else {
            return false;
        }
    }

    /**
     * delete_shipping
     *
     * This is used to delete shipping details
     *
     * @author	Chintan Bhimani
     * @access	public
     * @param   integer-$shippingId
     * @return void
     */
    function delete_shipping($shippingId) {

        if ($this->db->delete('shipping', array('shipping_id' => $shippingId))) {
            return true;
        } else {
            return false;
        }
    }


}

?>