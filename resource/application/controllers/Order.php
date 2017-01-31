<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Order extends CI_Controller {
    
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
		parent::__construct();
		$this->load->library('session');
		$this->load->model('front/order_model'); 
        if($this->session->userdata('front_logged_user_in') != 1)
        {
            redirect('login');
            break;
        }
		
	}
    
    /**
	* index
	*
	* This help to list all the Pending Orders
	* 
	* @author	Chintan Bhimani
	* @access	public
	* @return	void
	*/
	public function index()
	{
        $arrData['orderDetails']    = $this->order_model->get_pending_order_details($this->session->userdata('front_user_id'));
        
		$this->load->view('order/listPending',$arrData);
	}
    
    /**
	* pastOrder
	*
	* This help to list all the Past Orders
	* 
	* @author	Chintan Bhimani
	* @access	public
	* @return	void
	*/
	public function pastOrder()
	{
        $arrData['pastOrderDetails']    = $this->order_model->get_past_order_details($this->session->userdata('front_user_id'));
        
		$this->load->view('order/listPast',$arrData);
	}
    
    /**
	* pendingView
	*
	* This help to list all the details of pending Orders
	* 
	* @author	Chintan Bhimani
	* @access	public
	* @return	void
	*/
	public function pendingView($orderId)
	{
        $arrData['viewPastOrder']    = $this->order_model->view_pending_order_details($orderId);
        
		$this->load->view('order/viewPending',$arrData);
	}
    
    /**
	* pastView
	*
	* This help to list all the details of Past Orders
	* 
	* @author	Chintan Bhimani
	* @access	public
	* @return	void
	*/
	public function pastView($orderId)
	{
        $arrData['viewPastOrder']    = $this->order_model->view_pending_order_details($orderId);
        
		$this->load->view('order/viewPast',$arrData);
	}
    
}
