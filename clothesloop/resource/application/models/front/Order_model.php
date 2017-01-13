<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Order_model extends CI_Model
{

    public function __construct()
    {
        $this->load->database('default');
        $this->load->library('session');

        // Call the Model constructor
        parent::__construct();
    }
    
    /**
	 * get_pending_order_details
	 *
	 * This is used to get Pending Orders
	 *
	 * @author	Chintan Bhimani
	 * @access	public
	 * @param   integer-$userId 
	 * @return void
	 */

    function get_pending_order_details($userId = 0)
    {
        $this->db->select('*');
        $this->db->from('cart c');
        $this->db->join('colour clr','c.cart_product_colour = clr.colour_id');
        $this->db->join('size s','c.cart_product_size = s.size_id');
        $this->db->join('users u','c.cart_user_id = u.user_id');
        if($userId != 0)
            $this->db->where('cart_user_id',$userId);
        $this->db->where('cart_order_status =','pending');
        $orderAll = $this->db->get();
        return $orderAll->result_array();
    }
    
    /**
	 * get_past_order_details
	 *
	 * This is used to get Past Orders
	 *
	 * @author	Chintan Bhimani
	 * @access	public
	 * @param   integer-$userId 
	 * @return void
	 */
    function get_past_order_details($userId = 0)
    {
        $this->db->select('*');
        $this->db->from('cart c');
        $this->db->join('colour clr','c.cart_product_colour = clr.colour_id');
        $this->db->join('size s','c.cart_product_size = s.size_id');
        $this->db->join('users u','c.cart_user_id = u.user_id');
        if($userId != 0)
            $this->db->where('cart_user_id',$userId);
        $this->db->where('cart_order_status =','success');
        $orderAll = $this->db->get();
        return $orderAll->result_array();
    }
    
    /**
	 * view_pending_order_details
	 *
	 * This is used to get Past and Pending Order Details
	 *
	 * @author	Chintan Bhimani
	 * @access	public
	 * @param   integer-$orderId 
	 * @return void
	 */
    function view_pending_order_details($orderId='')
    {
        $this->db->select('*');
        $this->db->from('cart c');
        $this->db->join('colour clr','c.cart_product_colour = clr.colour_id');
        $this->db->join('size s','c.cart_product_size = s.size_id');
        $this->db->join('users u','c.cart_user_id = u.user_id');
        if($orderId != '')
            $this->db->where('cart_id',$orderId);
        $orderAll = $this->db->get();
        return $orderAll->result_array();
    }
    

}
?>