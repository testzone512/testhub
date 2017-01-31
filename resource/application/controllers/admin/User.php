<?php 
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class User extends CI_Controller {
	
	public function __construct()
	{
		parent::__construct();
		$this->load->library('session');
		 if ($this->session->userdata('logged_user_in') == 0) {
            redirect('login');
            break;
        }
		$this->load->model('admin/user_model'); 
		$this->load->model('admin/profile_model'); 
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
		$arrData['userDetails']	= $this->user_model->get_user_details_for_listing();	
		//echo $_POST['txtUname']; die;
		$arrData['middle'] = 'admin/user/list';	
		$this->load->view('admin/template',$arrData);
	}
	
	
	/**
     * view
     *
     * This help to view User detail
     *
     * @author	Nilesh Dabhi
     * @access	public
     * @return	void
     */
	 
	 public function view($userId)
	 {
		$arrData['userDetails']	= $this->user_model->get_user_details_for_view($userId);	
		$arrData['middle']	= 'admin/user/view';
		$this->load->view('admin/template',$arrData);
	 }
	 
	 
	 
	/**
	* editProfile
	*
	* This help to edit Profile
	* 
	* @author	Chintan Bhimani
	* @access	public
	* @param	userId
	* @return	void
	*/
	
	public function edit($userId)
	{
		//print_r($this->session->userdata()); die;
		//echo "hi"; die;	
		$arrData['userDetails']	= $this->user_model->get_user_details_for_view($userId);

		$countryDataArr		= GetAllCommon("country", "", "country_name");
		$countryKeyValueArr	= GetKeyValueArrayCommon($countryDataArr, "country_id", "country_name", "Select Country");
		
		$arrData["countryKeyValueArr"]	= $countryKeyValueArr;

		$stateDataArr = $this->profile_model->get_state_based_on_country($arrData['userDetails'][0]['user_country_id']);
		$stateKeyValueArr	= GetKeyValueArrayCommon($stateDataArr, "state_id", "state_name", "Select State");
		
		$arrData["stateKeyValueArr"]	= $stateKeyValueArr;

		$cityDataArr = $this->profile_model->get_city_based_on_state($arrData['userDetails'][0]['user_state_id']);
		$cityKeyValueArr	= GetKeyValueArrayCommon($cityDataArr, "city_id", "city_name", "Select City");
		
		$arrData["cityKeyValueArr"]	= $cityKeyValueArr;
		if($this->input->post('txtFirstName'))
		{
			
			$this->form_validation->set_rules('txtFirstName', 'First Name','trim|required');
			$this->form_validation->set_rules('txtLastName', 'Last Name','trim|required');
			$this->form_validation->set_rules('txtEmail', 'Email Address','trim|required');
			//$this->form_validation->set_rules('cmbCountry', 'Country','trim|required');
			//$this->form_validation->set_rules('cmbState', 'State','trim|required');
			//$this->form_validation->set_rules('cmbCity', 'City','trim|required');
			
			if ($this->form_validation->run() == TRUE)
			{

				// Staff Profile Image Upload START
					if ($_FILES['userImage']['name'] != '')
					{
						$config['upload_path'] = $_SERVER['DOCUMENT_ROOT'].'/'.$this->config->item('ECOMMERCE_ROOT_FOLDER').'public/upload/profile/';
				        $config['allowed_types'] = 'gif|jpg|jpeg|png';
				        $config['max_size']    = '10240';
				        //print_r($config); die;

				        //load upload class library
				         //$this->upload->initialize($config);
				        $this->load->library('upload',$config);

				        if (!$this->upload->do_upload('userImage'))
				        {
							// case - failure
				            $upload_error = array('error' => $this->upload->display_errors());
							//print_r($upload_error); die;
				        } 
				        else
				        {
							// case - success
				        	//$arrAddData["photo"]	= $this->upload->data();
				        	$updateData["user_profile_pic"] = $this->upload->file_name;
				        	//echo "<pre>"; print_r($updateData);
				        	$prev_file = $this->input->post('userEditImage');
							//print_r($prev_file); die;
							// Unlink the image from project and thumb folder
							if( $prev_file !='' && file_exists($config['upload_path'].$prev_file)){

								unlink($config['upload_path'].$prev_file);	
								unlink($config['upload_path']."thumb/".$prev_file);	
							}

				        	$data = $this->upload->data();
				        	$upload_data = $this->upload->data();
				            
				            $config = array(
								'source_image'		=> $data['full_path'], //get original image
								'new_image'			=> $data['file_path'].'thumb', //save as new image //need to create thumbs first
								'maintain_ratio'	=> true,
								'width'				=> 150
							);
							//print_r($config); die;
				           
				            $this->load->library('image_lib',$config); //load library
							$this->image_lib->resize(); //do whatever specified in config
				           
				        }	
				     }

				    // Staff Profile Image Upload END	

				$updateData['user_firstname']			= $this->input->post('txtFirstName');
				$updateData['user_lastname']			= $this->input->post('txtLastName');
				$updateData['user_introduction']		= $this->input->post('txtAboutMe');
				$updateData['user_address']				= $this->input->post('txtAddress');
				$updateData['user_email']				= $this->input->post('txtEmail');
				$updateData['user_mobile']				= $this->input->post('txtMobile');
				$updateData['user_country_id']			= $this->input->post('cmbCountry');
				$updateData['user_state_id']			= $this->input->post('cmbState');
				$updateData['user_city_id']				= $this->input->post('cmbCity');
				if($this->session->userdata('user_is_admin')==1)
				{
					$updateData['user_is_admin']			= $this->input->post('cmbIsAdmin');
				}
				//echo "<pre>"; print_r($updateData); die;

				$updateFlag = $this->profile_model->update_profile($userId,$updateData);
				if($updateFlag)
				{
					$this->session->set_flashdata('success','User Detail Updated Successfully');
					redirect('admin/user/');
				}
				else
				{
					$this->session->set_flashdata('error','Failed to Updated User Detail');
					redirect('admin/user/edit/'.$userId);
				}
			}
		}
		$arrData['middle']	= 'admin/user/edit';
		$this->load->view('admin/template',$arrData);
	}

	
	/**
     * ajax_user_active_inactive
     *
     * This help to active or deactive User using ajax
     *
     * @author	Nilesh Dabhi
     * @access	public
     * @return	void
     */
    public function ajax_user_active_inactive()
    {
        //print_r($this->session->userdata()); die;
        $Action = $this->input->post('Action');
        $UserId = $this->input->post('UserId');
		if($this->session->userdata('user_is_admin')==1)
		{
        	//update user active or inactive
        	$upDataflag = $this->user_model->update_active_inactive_user($Action,$UserId);
		}
        if ($upDataflag == TRUE) 
		{
            echo $Action;
        } 
		else 
		{
            echo $Action;
        }
    }
	
   /**
     * delete_user
     *
     * This help to delete User detail
     *
     * @author	Nilesh Dabhi
     * @access	public
     * @return	void
     */

    public function delete_user($userId)
    {
		$delete = $this->user_model->delete_user($userId);
		if ($delete)
			$this->session->set_flashdata('success', 'Data deleted Successfully !!');
		else
			$this->session->set_flashdata('error', 'Failed to delete Data !!');

	  redirect('admin/user');
    }



    
			
}
?>