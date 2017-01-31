<?php 
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Size extends CI_Controller {
	
	public function __construct()
	{
		parent::__construct();
		$this->load->library('session');
		 if ($this->session->userdata('logged_user_in') == 0) {
            redirect('login');
            break;
        }
		$this->load->model('admin/size_model'); 
	} 	
	
	/*
	 * index
     *
     * This is used to  user login
	 *
     * @author	Nilesh dabhi
     * @access	public
     * @param   
     * @return void
     */	

	public function index()
	{			
		//echo "<pre>"; print_r($this->session->userdata());		 die;
		$arrData['sizeDetails']	= $this->size_model->get_size_details_for_listing();	
		//echo $_POST['txtUname']; die;
		$arrData['middle'] = 'admin/size/list';	
		$this->load->view('admin/template',$arrData);
	}
	
	
   /**
     * add
     *
     * This help to add Size
     *
     * @author	Nilesh Dabhi
     * @access	public
     * @return	void
     */

	
	public function add()
    {
        if (isset($_POST['btnAddSize']))
        {
            $this->form_validation->set_rules('txtSizeName', 'Size Name', 'trim|required');

            if ($this->form_validation->run() == TRUE)
            {
                $arrSizeData["size_name"]        = $this->input->post('txtSizeName');
                $arrSizeData["size_created_on"]  = date('Y-m-d H:i:s');

                $insertedFlag = $this->size_model->save_size($arrSizeData);
				if ($insertedFlag)
				{
					$this->session->set_flashdata('success', 'Size Added Successfully !!');
				    redirect('admin/size');
				}
				else
				{
					$this->session->set_flashdata('error', 'Failed to Add Size !!');
					redirect('admin/size/add');
				}
            }//end validation condition
        }
        $arrData['middle'] = 'admin/size/add';
        $this->load->view('admin/template', $arrData);
    }
	
   /**
     * edit
     *
     * This help to edit Cms
     *
     * @author	Nilesh Dabhi
     * @access	public
     * @return	void
     */

	public function edit($sizeId)
    {
        $arrData['sizeDetail'] = $this->size_model->get_size_details_for_edit($sizeId);
        if (isset($_POST['btnEditSize']))
        {
            $this->form_validation->set_rules('txtSizeName', 'Size Name', 'trim|required');

            if ($this->form_validation->run() == TRUE)
            {
				$upSizeData["size_name"]        = $this->input->post('txtSizeName');
                $upSizeData["size_updated_on"]  = date('Y-m-d H:i:s');
				//print_r($upProductData); die;
                $updateFlag = $this->size_model->update_size($sizeId,$upSizeData);

                if ($updateFlag)
                {
                    $this->session->set_flashdata('success', 'Size Updated Successfully !!');
                    redirect('admin/size');
                }
                else
                {
                    $this->session->set_flashdata('error', 'Failed to Updated Size !!');
                    redirect('admin/size/edit');
                }
            }//end validation condition
        }
        $arrData['middle'] = 'admin/size/edit';
        $this->load->view('admin/template', $arrData);
    }

	
   /**
     * delete_size
     *
     * This help to delete Size detail
     *
     * @author	Nilesh Dabhi
     * @access	public
     * @return	void
     */

    public function delete_size($sizeId)
    {
		$delete = $this->size_model->delete_size($sizeId);
		if ($delete)
			$this->session->set_flashdata('success', 'Data deleted Successfully !!');
		else
			$this->session->set_flashdata('error', 'Failed to delete Data !!');

	    redirect('admin/size');
    }



    
			
}
?>