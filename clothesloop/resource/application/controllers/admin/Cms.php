<?php 
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Cms extends CI_Controller {
	
	public function __construct()
	{
		parent::__construct();
		$this->load->library('session');
		 if ($this->session->userdata('logged_user_in') == 0) {
            redirect('login');
            break;
        }
		$this->load->model('admin/cms_model'); 
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
		$arrData['cmsDetails']	= $this->cms_model->get_cms_details_for_listing();	
		//echo $_POST['txtUname']; die;
		$arrData['middle'] = 'admin/cms/list';	
		$this->load->view('admin/template',$arrData);
	}
	
	   /**
     * add
     *
     * This help to add Product
     *
     * @author	Nilesh Dabhi
     * @access	public
     * @return	void
     */

	
	public function add()
    {
        if (isset($_POST['btnAddCms']))
        {
            $this->form_validation->set_rules('txtCmsTitle', 'Cms Title', 'trim|required');

            if ($this->form_validation->run() == TRUE)
            {
               
                $arrCmsData["cms_title"]        = $this->input->post('txtCmsTitle');
                $arrCmsData["cms_description"]  = $this->input->post('txtCmsDes');
                $arrCmsData["cms_created_on"]   = date('Y-m-d H:i:s');

                $insertedFlag = $this->cms_model->save_cms($arrCmsData);
				if ($insertedFlag)
				{
					$this->session->set_flashdata('success', 'Cms Added Successfully !!');
				    redirect('admin/cms');
				}
				else
				{
					$this->session->set_flashdata('error', 'Failed to Add Cms !!');
					redirect('admin/cms/add');
				}
            }//end validation condition
        }
        $arrData['middle'] = 'admin/cms/add';
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

	public function edit($cmsId)
    {
        $arrData['cmsDetail'] = $this->cms_model->get_cms_details_for_edit($cmsId);
        if (isset($_POST['btnEditCms']))
        {
            $this->form_validation->set_rules('txtCmsTitle', 'Cms Title', 'trim|required');

            if ($this->form_validation->run() == TRUE)
            {
                $upCmsData["cms_title"]        = $this->input->post('txtCmsTitle');
                $upCmsData["cms_description"]  = $this->input->post('txtCmsDes');
                $upCmsData["cms_updated_on"]   = date('Y-m-d H:i:s');
				//print_r($upProductData); die;
                $updateFlag = $this->cms_model->update_cms($cmsId,$upCmsData);

                if ($updateFlag)
                {
                    $this->session->set_flashdata('success', 'Cms Updated Successfully !!');
                    redirect('admin/cms');
                }
                else
                {
                    $this->session->set_flashdata('error', 'Failed to Updated Cms !!');
                    redirect('admin/cms/edit');
                }
            }//end validation condition
        }
        $arrData['middle'] = 'admin/cms/edit';
        $this->load->view('admin/template', $arrData);
    }
	
   /**
     * view
     *
     * This help to view Cms detail
     *
     * @author	Nilesh Dabhi
     * @access	public
     * @return	void
     */
	 
	 public function view($cmsId)
	 {
		$arrData['cmsDetails'] = $this->cms_model->get_cms_details_for_view($cmsId);
		$arrData['middle']='admin/cms/view';
		$this->load->view('admin/template',$arrData);
	 }

	
   /**
     * delete_cms
     *
     * This help to delete Cms detail
     *
     * @author	Nilesh Dabhi
     * @access	public
     * @return	void
     */

    public function delete_cms($cmsId)
    {
            $delete = $this->cms_model->delete_cms($cmsId);

            if ($delete)
                $this->session->set_flashdata('success', 'Data deleted Successfully !!');
            else
                $this->session->set_flashdata('error', 'Failed to delete Data !!');
        

        redirect('admin/cms');
    }



    
			
}
?>