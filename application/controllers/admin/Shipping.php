<?php

/**
 * Ecommerce
 *
 * @package		Shipping
 * @subpackage           controller
 * @author		Chintan Bhimani
 * @copyright            Copyright (c) 2012 - 2013 
 * @since		Version 1.0
 */
class Shipping extends CI_Controller {

    /**
     * __construct
     *
     * Calls parent constructor
     * @author	Chintan Bhimani
     * @access	public
     * @return	void
     */
    function __construct() {
        parent::__construct();

        if ($this->session->userdata('logged_user_in') == 0) {
            redirect('admin/login');
            break;
        }

        $this->load->model('admin/shipping_model');
    }

    /**
     * index
     *
     * This help to list all the shipping
     * 
     * @author	Chintan Bhimani
     * @access	public
     * @return	void
     */
    public function index() {
        $arrData['shippingDetails'] = $this->shipping_model->get_shipping_details();

        $arrData['middle'] = 'admin/shipping/list';
        $this->load->view('admin/template', $arrData);
    }

    /**
     * add
     *
     * This help to add shipping
     * 
     * @author	Chintan Bhimani
     * @access	public
     * @return	void
     */
    public function add() {
        $ab = date_default_timezone_set("Asia/Kolkata");
        date_default_timezone_get($ab);

        if ($this->input->post('btnAdd')) {

            $this->form_validation->set_rules('txtShippingFrom', 'Shipping From', 'trim|required');
            $this->form_validation->set_rules('txtShippingTo', 'Shipping To', 'trim|required');

            if ($this->form_validation->run() == TRUE) {

                $arrData["shipping_from"]           = $this->input->post('txtShippingFrom');
                $arrData["shipping_to"]             = $this->input->post('txtShippingTo');
                $arrData["shipping_amount"]         = $this->input->post('txtShippingAmount');
                $arrData["shipping_created_on"]     = date('Y-m-d H:i:s');

                //echo"<pre>";print_r($arrData); die;		
                $insertedFlag = $this->shipping_model->save_shipping($arrData);

                if ($insertedFlag) {

                    $this->session->set_flashdata('success', 'Shipping Added Successfully !!');
                    redirect('admin/shipping');
                } else {

                    $this->session->set_flashdata('error', 'Failed to Add Shipping !!');
                    redirect('admin/shipping/add');
                }
            } // validation error
        }

        $arrData['middle'] = 'admin/shipping/add';
        $this->load->view('admin/template', $arrData);
    }

    /**
     * edit
     *
     * This help to edit Colour
     * 
     * @author	Chintan Bhimani
     * @access	public
     * @param	$shippingId
     * @return	void
     */
    public function edit($shippingId) {
        $ab = date_default_timezone_set("Asia/Kolkata");
        date_default_timezone_get($ab);
        
        $arrData['shippingDetails'] = $this->shipping_model->get_shipping_details($shippingId);

        if ($this->input->post('btnUpdate')) {

             $this->form_validation->set_rules('txtShippingFrom', 'Shipping From', 'trim|required');
             $this->form_validation->set_rules('txtShippingTo', 'Shipping To', 'trim|required');

            if ($this->form_validation->run() == TRUE) {
                
                $UpdateData["shipping_from"]           = $this->input->post('txtShippingFrom');
                $UpdateData["shipping_to"]             = $this->input->post('txtShippingTo');
                $UpdateData["shipping_amount"]         = $this->input->post('txtShippingAmount');
                $UpdateData["shipping_updated_on"]     = date('Y-m-d H:i:s');

                $updateFlag = $this->shipping_model->update_shipping($shippingId, $UpdateData);

                if ($updateFlag) {

                    $this->session->set_flashdata('success', 'Shipping updated Successfully !!');
                    redirect('admin/shipping');
                } else {

                    $this->session->set_flashdata('error', 'Failed to updated Shipping !!');
                    redirect('admin/shipping/edit/' . $shippingId);
                }
            }
        }

        $arrData['middle'] = 'admin/shipping/edit';
        $this->load->view('admin/template', $arrData);
    }

    /**
     * deleteShipping
     *
     * This help to delete Colour detail
     * 
     * @author	Chintan Bhimani
     * @access	public
     * @return	void
     */
    public function deleteShipping($shippingId) {
       
            $delete = $this->shipping_model->delete_shipping($shippingId);

            if ($delete)
                $this->session->set_flashdata('success', 'Data deleted Successfully !!');
            else
                $this->session->set_flashdata('error', 'Failed to delete Data !!');
        
        redirect('admin/shipping');
    }

}

?>