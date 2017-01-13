<?php 
/**
* Ecommerce
*
* @package		Category
* @subpackage   controller
* @author		Chintan Bhimani
* @copyright	Copyright (c) 2012 - 2013 
* @since		Version 1.0
*/
 

class Profile extends CI_Controller {

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
		
		if($this->session->userdata('logged_user_in') == 0) {
			redirect('admin/login');
			break;
		}

		$this->load->model('admin/profile_model');
		
	
	}

	
	/**
	* index
	*
	* This help to list all the categories
	* 
	* @author	Chintan Bhimani
	* @access	public
	* @return	void
	*/
	
	public function index()
	{
		$arrData['profileDetails']	= $this->profile_model->get_profile_details($this->session->userdata('user_id'));		
		$arrData['middle']	= 'admin/profile/viewprofile';
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
	
	public function editProfile()
	{
		//print_r($this->session->userdata()); die;
		//echo "hi"; die;	
		$userId = $this->session->userdata('user_id');
		
		$arrData['profileDetails']	= $this->profile_model->get_profile_details($userId);

		$countryDataArr		= GetAllCommon("country", "", "country_name");
		$countryKeyValueArr	= GetKeyValueArrayCommon($countryDataArr, "country_id", "country_name", "Select Country");
		
		$arrData["countryKeyValueArr"]	= $countryKeyValueArr;

		$stateDataArr = $this->profile_model->get_state_based_on_country($arrData['profileDetails'][0]['user_country_id']);
		$stateKeyValueArr	= GetKeyValueArrayCommon($stateDataArr, "state_id", "state_name", "Select State");
		
		$arrData["stateKeyValueArr"]	= $stateKeyValueArr;

		$cityDataArr = $this->profile_model->get_city_based_on_state($arrData['profileDetails'][0]['user_state_id']);
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
					if ($_FILES['profileImage']['name'] != '')
					{
						$config['upload_path'] = $_SERVER['DOCUMENT_ROOT'].'/'.$this->config->item('ECOMMERCE_ROOT_FOLDER').'public/upload/profile/';
				        $config['allowed_types'] = 'gif|jpg|jpeg|png';
				        $config['max_size']    = '10240';
				        //print_r($config); die;

				        //load upload class library
				         //$this->upload->initialize($config);
				        $this->load->library('upload',$config);

				        if (!$this->upload->do_upload('profileImage'))
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
					$this->session->set_flashdata('success','Profile Detail Updated Successfully');
					//redirect('admin/profile/editProfile');
					redirect('admin/login/logout');
				}
				else
				{
					$this->session->set_flashdata('error','Failed to Updated Profile Detail');
					redirect('admin/profile/editProfile/'.$userId);
				}
			}
			else
			{
				$arrData['middle']	= 'admin/profile/editprofile';
				$this->load->view('admin/template',$arrData);
			}
		}
		$arrData['middle']	= 'admin/profile/editprofile';
		$this->load->view('admin/template',$arrData);
	}
	
	/**
	* delete
	*
	* This help to delete Category detail
	* 
	* @author	Chintan Bhimani
	* @access	public
	* @return	void
	*/

	public function delete($iCategoryId)
	{
		$dependency = $this->category_model->checkcategoryDependencies($iCategoryId);
		if($dependency=='')
		{
			$delete = $this->category_model->delete_catgory($iCategoryId);

			if ($delete)
				$this->session->set_flashdata('success', 'Data deleted Successfully !!');
			else
				$this->session->set_flashdata('error', 'Failed to delete Data !!');
		}
		else
		{
			$this->session->set_flashdata('error', "This category cannot be deleted. It has dependiences in following tables : <br/>".$dependency);
		}

		redirect('admin/category');
	}
	
	/**
	* ajaxGetStateOnCountry
	*
	* This method used in Ajax call to fetch the State on basis of Country selected.
	* 
	* @author	Chintan Bhimani
	* @access	public
	* @return	void
	*/
	
	public function ajaxGetStateOnCountry()
	{
		$countryId = $_POST['countryId'];
		$arrResult = $this->profile_model->get_state_based_on_country($countryId);

		echo json_encode($arrResult); 
		
	}
	
	/**
	* ajaxGetCityOnState
	*
	* This method used in Ajax call to fetch the City on basis of State selected.
	* 
	* @author	Chintan Bhimani
	* @access	public
	* @return	void
	*/
	
	public function ajaxGetCityOnState()
	{
		$stateId = $_POST['stateId'];
		$arrResult = $this->profile_model->get_city_based_on_state($stateId);

		echo json_encode($arrResult); 
		
	}

}

?>