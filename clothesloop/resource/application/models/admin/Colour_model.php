<?php

/**
 * radhe creation
 *
 * @Description  This class is used to interact with the Category table using Codeignitor db core class. All the Data Insert,Retrival and Update operations related to Category are performed here.
 *
 * @package		Colour
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
class Colour_model extends CI_Model {
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
     * save_colour
     *
     * This is used to save colour details
     *
     * @author	Chintan Bhimani
     * @access	public
     * @param   array-$arrData
     * @return void
     */
    function save_colour($arrData) {

        if ($this->db->insert('colour', $arrData)) {
            return true;
        } else {
            return false;
        }
    }

    /**
     * get_colour_details
     *
     * This is used to get colour details
     *
     * @author	Chintan Bhimani
     * @access	public
     * @param   integer-$colourId 
     * @return void
     */
    function get_colour_details($colourId = 0) {

        $arrData = array();

        if ($colourId != 0) {
            $this->db->where('colour_id', $colourId);
        }


        $this->db->select('*');

        $objQuery = $this->db->get('colour');

        //echo $this->db->last_query(); die;

        return $objQuery->result_array();
    }

    /**
     * update_colour
     *
     * This is used to update Colour details
     *
     * @author	Chintan Bhimani
     * @access	public
     * @param   array-$arrData, integer-$colourId
     * @return void
     */
    function update_colour($colourId, $arrData) {

        $this->db->where('colour_id', $colourId);

        if ($this->db->update('colour', $arrData)) {
            return true;
        } else {
            return false;
        }
    }

    /**
     * delete_colour
     *
     * This is used to delete colour details
     *
     * @author	Chintan Bhimani
     * @access	public
     * @param   integer-$colourId
     * @return void
     */
    function delete_colour($colourId) {

        if ($this->db->delete('colour', array('colour_id' => $colourId))) {
            return true;
        } else {
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
    function checkcategoryDependencies($iCategoryId) {

        $message = '';
        $this->db->select("category_parent_id");
        $this->db->from('category');
        $this->db->where('category_parent_id', $iCategoryId);
        //echo $this->db->last_query(); die;
        $objQuery = $this->db->get();

        $arrAccount = $objQuery->result_array();
        //print_r($arrAccount); die;
        if (count($arrAccount) > 0)
            $message .= "Category Module<br>";

        return $message;
    }

}

?>