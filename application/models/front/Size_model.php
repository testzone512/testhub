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


    /*
     * get_shop_size_detail
     *
     * This is used to get size detail for shop page
     *
	 * @author	Nilesh Dabhi
	 * @access	public
	 * @return	void
     *
     */

    public function get_shop_size_detail()
    {
        $this->db->select('*');
        $this->db->from('size');
        //$this->db->join('category cat','pro.product_category_id = cat.category_id','left');
        $objQuery = $this->db->get();

        //echo $this->db->last_query(); die;
        return $objQuery->result_array();
    }




}
?>