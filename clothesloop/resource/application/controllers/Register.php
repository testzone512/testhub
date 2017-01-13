<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Register extends CI_Controller {
    
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
		$this->load->model('front/register_model'); 
		
	}
    
    /**
	* index
	*
	* This help to list all the Users
	* 
	* @author	Chintan Bhimani
	* @access	public
	* @return	void
	*/
	public function index()
	{
        $countryDataArr		= GetAllCommon("country", "", "country_name");
		$countryKeyValueArr	= GetKeyValueArrayCommon($countryDataArr, "country_id", "country_name", "Select Country");
		
		$arrData["countryKeyValueArr"]	= $countryKeyValueArr;
        
		$this->load->view('register',$arrData);
	}
    
    /**
	* add
	*
	* This help to add user details
	* 
	* @author	Chintan Bhimani
	* @access	public
	* @return	void
	*/
    public function add()
    {   
        $countryDataArr		= GetAllCommon("country", "", "country_name");
		$countryKeyValueArr	= GetKeyValueArrayCommon($countryDataArr, "country_id", "country_name", "Select Country");
		
		$Data["countryKeyValueArr"]	= $countryKeyValueArr;
        //print_r($countryKeyValueArry); die;
        
        $ab = date_default_timezone_set("Asia/Kolkata");
		date_default_timezone_get($ab);
        
        if ($this->input->post('btnRegister'))
        { 
            $arrData['user_firstname']             = $this->input->post('txtFirstName');
            $arrData['user_lastname']              = $this->input->post('txtLastName');
            $arrData['user_email']                 = $this->input->post('txtEmail');
            $arrData['user_address']               = $this->input->post('txtAddressLine1');
            $arrData['user_address2']              = $this->input->post('txtAddressLine2');
            $arrData['user_postcode']              = $this->input->post('txtPostCode');
            $arrData['user_password']              = base64_encode($this->input->post('txtPassword'));
            $arrData['user_country_id']            = $this->input->post('cmbCountry');
            $arrData['user_garment_id']            = implode(',',$this->input->post('boxes'));
            if(isset($_POST['chkLaunch'])){
                $arrData['is_launch']   = '1';
            }
            else{
                $arrData['is_launch']   = '0';
            }
            if(isset($_POST['chkSubscribe'])){
                $arrData['is_subscribe']   = '1';
            }
            else{
                $arrData['is_subscribe']   = '0';
            }
            $arrData['user_created_on']            = date('Y-m-d h:i:s');

            $insertedFlag = $this->register_model->save_register($arrData);
            
            $insert_id = $this->db->insert_id();
            
            if($arrData)
            {
                $arrQuestion['question_user_id']        = $insert_id;
                $arrQuestion['question_distance']       = $this->input->post('cmbKilometer');
                $arrQuestion['question_location']       = $this->input->post('txtLocation');
                $arrQuestion['question_learn_about']    = $this->input->post('cmbKnowAbout');
                
                $insertedFlag = $this->register_model->save_question($arrQuestion);
                //$lastinsretid = $this->db->insert_id();
                
            }

            if ($insertedFlag)
            {
				                //echo $lastinsretid; die;
                /* Mail Sending */
                    $link = site_url('login/activation_user/'.$insert_id);
					
					
					/* Sending Mail*/
					$this->load->library('email');
					
					$config['protocol']     = 'smtp';
        			$config['smtp_host']    = 'ssl://smtp.gmail.com';
        			$config['smtp_port']    = '465';
        			$config['smtp_user']    = 'testzone512@gmail.com';
        			$config['smtp_pass']    = 'test@zone';
        			$config['newline']      = "\r\n";
					$config['mailtype']     = 'html';
					
					$this->email->initialize($config);
					
					$this->email->from($this->config->item('CLOTHESLOOP_HELPDESK_EMAIL'));
					$this->email->to($this->input->post('txtEmail'));
					
					$this->email->subject('Account Activation');
					
					$emailData  = "Dear ".$this->input->post('txtFirstName').br(3);
					$emailData .= "<p>Please Click The Following Link To Activate Your Account.</p>".br(2);
					$emailData .= "<a href='$link'>Click here</a>".br(4);
					$emailData .= "<p>Thanks</p>";
					echo $emailData; die;						
					$this->email->message($emailData);
					if($this->email->send())
					{
						$this->session->set_flashdata('success', 'Please Check Your Mail Id and Activation Your Account..');
                   		redirect('login');
					}
					else
					{
						echo $this->email->print_debugger();
						echo "mail sending failed";
					}
            }
			else
            {
                $this->session->set_flashdata('error', 'Failed to Add Register !!');
                redirect('register/add');
            }
        }
        $this->load->view('register',$Data);
    }
    
    /**
	* edit
	*
	* This help to update user details
	* 
	* @author	Chintan Bhimani
	* @access	public
	* @return	void
	*/
    public function edit($userId)
    {
        $countryDataArr		= GetAllCommon("country", "", "country_name");
		$countryKeyValueArr	= GetKeyValueArrayCommon($countryDataArr, "country_id", "country_name", "Select Country");
		
		$arrData["countryKeyValueArr"]	= $countryKeyValueArr;
        $ab = date_default_timezone_set("Asia/Kolkata");
		date_default_timezone_get($ab);
        
        $arrData['userDetails'] = $this->register_model->get_user_details_for_edit($userId);
        //echo"<pre>"; print_r($arrData); die;
        
        if ($this->input->post('btnUpdate'))
        { 
            // User Profile Image Upload START
                if ($_FILES['txtProfileImage']['name'] != '')
                {
                    ///$config['upload_path'] = $_SERVER['DOCUMENT_ROOT'].'/'.$this->config->item('CLOTHESLOOP_ROOT_FOLDER').'public/upload/profile/';
					$config['upload_path'] = './public/upload/profile/';
                    $config['allowed_types'] = 'gif|jpg|jpeg|png';
                    $config['max_size']    = '10240';
                    //print_r($config); die;

                    //load upload class library
                     //$this->upload->initialize($config);
                    $this->load->library('upload',$config);

                    if (!$this->upload->do_upload('txtProfileImage'))
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
                        $prev_file = $this->input->post('hdnProfileImage');
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

			// User Profile Image Upload END
                     
            $updateData['user_firstname']             = $this->input->post('txtFirstName');
            $updateData['user_lastname']              = $this->input->post('txtLastName');
            $updateData['user_email']                 = $this->input->post('txtEmail');
            $updateData['user_address']               = $this->input->post('txtAddressLine1');
            $updateData['user_address2']              = $this->input->post('txtAddressLine2');
            $updateData['user_postcode']              = $this->input->post('txtPostCode');
            $updateData['user_country_id']            = $this->input->post('cmbCountry');
            $updateData['user_updated_on']            = date('Y-m-d h:i:s');

            $updateFlag = $this->register_model->update_register($userId,$updateData);

            if ($updateFlag)
            {
                $this->session->set_flashdata('success', 'Personal Information Updated Successfully !!');
                redirect('register/edit/'.$userId);

            }
            else
            {
                $this->session->set_flashdata('error', 'Failed to Update Personal Information !!');
                redirect('register/edit/'.$userId);
            }
        }
        $this->load->view('user/editprofile',$arrData);
    }
    
    /**
	* change_password
	*
	* This help to change user password
	* @author	Chintan Bhimani
	* @access	public
	* @return	void
	*/
	
	public function changePassword()
	{	
		if ($this->input->post('btnChangePassword')){
			$date	= date("Y-m-d");
            
            $old_password = base64_encode($this->input->post('txtOldPassword'));
			
            $res_match = $this->register_model->check_old_password($old_password);
            
            if($res_match)
            {
                $updateUserData["user_password"]		= base64_encode($this->input->post('txtNewPassword'));
            }
			
			$userUpdateFlag = $this->register_model->update_user_details_on_email($this->session->userdata('front_user_email'), $updateUserData);
			
			if ($userUpdateFlag){
				$this->session->set_flashdata('success', 'Password Updated Successfully !!');
				redirect('register/changePassword');
			}else{
				$this->session->set_flashdata('error', 'Failed to Update Password !!');
				redirect('register/changePassword');				
			}
		}
		
		$this->load->view('user/changepassword');
	}
    
    /**
     * isOldPasswordMatch
     *
     * This help to check old password
     *
     * @author	Chintan Bhimani
     * @access	public
     * @return	void
     */

    public function isOldPasswordMatch($userId='')
    {
        ///echo $programDrillId;die;
        $password	= trim(base64_encode($_REQUEST['txtOldPassword']));

        if($password !=''){
            $result = $this->register_model->PasswordMatch($password, $userId);
            if($result == 'true'){
                return true;
            } else {
                return false;
            }
        }
        else{
            //echo "adsD";
            echo "true";  // purposely we are returning true
        }
    }
    
    /**
     * isOldAndNewPasswordDiffrent
     *
     * This help to check if old and new password diffrent or not
     *
     * @author	Chintan Bhimani
     * @access	public
     * @return	void
     */
    public function isOldAndNewPasswordDiffrent($userId='')
    {
        $oldPassword	= trim(base64_encode($_REQUEST['oldpassword']));
        $newPassword	= trim(base64_encode($_REQUEST['newpassword']));
        //$player	= trim($_REQUEST['player']);

        if($oldPassword !='' && $newPassword!=''){
            $result = $this->register_model->OldPasswordAndNewPasswordDiffrent($oldPassword, $newPassword, $userId);
            if($result == 'true'){
                return true;
            } else {
                return false;
            }
        }
        else{
            //echo "adsD";
            echo "true";  // purposely we are returning true
        }
    }
    
    /**
	* updateEmail
	*
	* This help to change user Email
	* @author	Chintan Bhimani
	* @access	public
	* @return	void
	*/
	
	public function updateEmail()
	{	
		if ($this->input->post('btnUpdateEmail')){
			$date	= date("Y-m-d");
			
			$updateUserData["user_email"]		= $this->input->post('txtEmail');
            
            //print_r($updateUserData); die;
			
			$userUpdateFlag = $this->register_model->update_user_details_on_email($this->session->userdata('front_user_email'), $updateUserData);
			
			if ($userUpdateFlag){
				$this->session->set_flashdata('success', 'Email Updated Successfully !!');
				redirect('register/updateEmail');
			}else{
				$this->session->set_flashdata('error', 'Failed to Update Email !!');
				redirect('register/updateEmail');				
			}
		}
		
		$this->load->view('user/updateemail');
	}
    
    /**
	* deactivateAccount
	*
	* This help to deactivate Account
	* @author	Chintan Bhimani
	* @access	public
	* @return	void
	*/
	
	public function deactivateAccount()
	{	
		if ($this->input->post('btnDeactivate')){
			$date	= date("Y-m-d");
			
            $old_password = base64_encode($this->input->post('txtPassword'));
			
            $res_match = $this->register_model->check_old_password($old_password);
            
            if($res_match)
            {
                $updateUserData["user_activation_pending"]		= 0;
            }
			
			$userUpdateFlag = $this->register_model->deactivated_account($this->session->userdata('front_user_email'),$updateUserData);
			
			if ($userUpdateFlag){
				$this->session->set_flashdata('success', 'Account Deactivated Successfully !!');
				redirect('register/deactivateAccount');
			}else{
				$this->session->set_flashdata('error', 'Failed to Account Deactivated !!');
				redirect('register/deactivateAccount');				
			}
		}
		
		$this->load->view('user/deactivateaccount');
	}
    
    /**
     * isAccountDeactivatePasswordMatch
     *
     * This help to check old password
     *
     * @author	Chintan Bhimani
     * @access	public
     * @return	void
     */

    public function isAccountDeactivatePasswordMatch($userId='')
    {
        ///echo $programDrillId;die;
        $password	= trim(base64_encode($_REQUEST['txtPassword']));

        if($password !=''){
            $result = $this->register_model->PasswordMatch($password, $userId);
            if($result == 'true'){
                return true;
            } else {
                return false;
            }
        }
        else{
            //echo "adsD";
            echo "true";  // purposely we are returning true
        }
    }
}
