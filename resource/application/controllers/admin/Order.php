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
		$this->load->model('admin/order_model'); 
		
	}
    
    /**
	* index
	*
	* This help to list all the Orders
	* 
	* @author	Chintan Bhimani
	* @access	public
	* @return	void
	*/
/*	public function index()
	{
        $arrData['orderDetails']    = $this->order_model->get_order_details();

        $arrData['middle']  = 'admin/order/list';
		$this->load->view('admin/template',$arrData);
	}

  */

	public function index()
	{
        //echo"<pre>"; print_r($this->session->userdata()); die;
		$arrData['orderDetails']    = $this->order_model->get_order_details();

		$arrData['middle']  = 'admin/order/list';
		$this->load->view('admin/template',$arrData);
	}
    
    /**
	* view
	*
	* This help to list all the details of Order
	* 
	* @author	Chintan Bhimani
	* @access	public
	* @return	void
	*/
	/*public function view($orderId)
	{
        $arrData['viewOrder']    = $this->order_model->get_order_details($orderId);
        
        $arrData['middle']  = 'admin/order/view';
		$this->load->view('admin/template',$arrData);
	}*/

	public function view($orderId)
	{
		$arrData['viewOrder']    = $this->order_model->get_order_details($orderId);
		//echo "<pre>"; print_r($arrData); die;
		$arrData['middle']  = 'admin/order/view';
		$this->load->view('admin/template',$arrData);
	}
    
    /**
	* delete
	*
	* This help to delete Order detail
	* 
	* @author	Chintan Bhimani
	* @access	public
	* @return	void
	*/

	public function delete($orderId)
	{
        $delete = $this->order_model->delete_order($orderId);

        if ($delete)
            $this->session->set_flashdata('success', 'Data deleted Successfully !!');
        else
            $this->session->set_flashdata('error', 'Failed to delete Data !!');
		redirect('admin/order');
	}


    
}
