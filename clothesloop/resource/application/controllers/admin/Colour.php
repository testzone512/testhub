<?php

/**
 * Ecommerce
 *
 * @package		Colour
 * @subpackage           controller
 * @author		Chintan Bhimani
 * @copyright            Copyright (c) 2012 - 2013 
 * @since		Version 1.0
 */
class Colour extends CI_Controller {

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

        $this->load->model('admin/colour_model');
    }

    /**
     * index
     *
     * This help to list all the colour
     * 
     * @author	Chintan Bhimani
     * @access	public
     * @return	void
     */
    public function index() {
        $arrData['colourDetails'] = $this->colour_model->get_colour_details();

        $arrData['middle'] = 'admin/colour/list';
        $this->load->view('admin/template', $arrData);
    }

    /**
     * add
     *
     * This help to add Colour
     * 
     * @author	Chintan Bhimani
     * @access	public
     * @return	void
     */
    public function add() {
        $ab = date_default_timezone_set("Asia/Kolkata");
        date_default_timezone_get($ab);

        if ($this->input->post('btnAdd')) {

            $this->form_validation->set_rules('txtColourName', 'Colour Name', 'trim|required');

            if ($this->form_validation->run() == TRUE) {

                $arrData["colour_name"] = $this->input->post('txtColourName');
                $arrData["colour_created_on"] = date('Y-m-d H:i:s');

                //echo"<pre>";print_r($arrData); die;		
                $insertedFlag = $this->colour_model->save_colour($arrData);

                if ($insertedFlag) {

                    $this->session->set_flashdata('success', 'Colour Added Successfully !!');
                    redirect('admin/colour');
                } else {

                    $this->session->set_flashdata('error', 'Failed to Add Colour !!');
                    redirect('admin/colour/add');
                }
            } // validation error
        }

        $arrData['middle'] = 'admin/colour/add';
        $this->load->view('admin/template', $arrData);
    }

    /**
     * edit
     *
     * This help to edit Colour
     * 
     * @author	Chintan Bhimani
     * @access	public
     * @param	$colourId
     * @return	void
     */
    public function edit($colourId) {
        $ab = date_default_timezone_set("Asia/Kolkata");
        date_default_timezone_get($ab);
        
        $arrData['colourDetails'] = $this->colour_model->get_colour_details($colourId);

        if ($this->input->post('btnUpdate')) {

            $this->form_validation->set_rules('txtColourName', 'Colour Name', 'trim|required');

            if ($this->form_validation->run() == TRUE) {

                $UpdateData['colour_name']                  = $this->input->post('txtColourName');
                $UpdateData["colour_updated_on"]            = date('Y-m-d H:i:s');

                $updateFlag = $this->colour_model->update_colour($colourId, $UpdateData);

                if ($updateFlag) {

                    $this->session->set_flashdata('success', 'Colour updated Successfully !!');
                    redirect('admin/Colour');
                } else {

                    $this->session->set_flashdata('error', 'Failed to updated Colour !!');
                    redirect('admin/Colour/edit/' . $colourId);
                }
            }
        }

        $arrData['middle'] = 'admin/Colour/edit';
        $this->load->view('admin/template', $arrData);
    }

    /**
     * deleteColour
     *
     * This help to delete Colour detail
     * 
     * @author	Chintan Bhimani
     * @access	public
     * @return	void
     */
    public function deleteColour($colourId) {
       
            $delete = $this->colour_model->delete_colour($colourId);

            if ($delete)
                $this->session->set_flashdata('success', 'Data deleted Successfully !!');
            else
                $this->session->set_flashdata('error', 'Failed to delete Data !!');
        
        redirect('admin/colour');
    }

}

?>