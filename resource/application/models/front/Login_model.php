<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
	
class Login_model extends CI_Model
{
	
	public function __construct()
		{
			$this->load->database('default');
			$this->load->library('session');
			// Call the Model constructor
			parent::__construct();
		}
	
	
	/////////////////////////////////		
	//   Admin Login
	////////////////////////////////
	
	public function login($email,$pass)
	{

		$this->db->select('*');
		$this->db->where('user_email',$email);
		$this->db->where('user_password',$pass);
		$this->db->limit(1);

		$Q = $this->db->get('users');
		$arrData =  $Q->result_array();
      //  print_r($arrData); die;
		if ($Q->num_rows() > 0)
		{
           // print_r($arrData); die;
			if($arrData[0]['user_activation_pending']	== 0)
			{
				$ses_user['front_user_id'] = "";
				$ses_user['front_user_email'] = "";
				$ses_user['front_logged_user_in'] = 0;
				$this->session->set_userdata($ses_user);
				$this->session->set_flashdata('error', 'Your Account is not activated');

			}
			else
			{
				// Return the result in the form of an array
				$row = $Q->row_array();

				$ses_user['front_user_id'] 		           = $row['user_id'];
				$ses_user['front_user_firstname']          = $row['user_firstname'];
				$ses_user['front_user_lastname']           = $row['user_lastname'];
				$ses_user['front_user_mobile']    		 = $row['user_mobile'];
				$ses_user['front_user_address']			 = $row['user_address'];
				$ses_user['front_user_email']     		 = $row['user_email'];
				$ses_user['front_user_profile_pic']        = $row['user_profile_pic'];
				$ses_user['front_user_is_admin']  		 = $row['user_is_admin'];
				$ses_user['front_user_activation_pending'] = $row['user_activation_pending'];
				$ses_user['front_logged_user_in']			 = 1;

				$this->session->set_userdata($ses_user);

				// unsetting login_attempts if any
				$this->session->unset_userdata(array("login_attempt_email", "login_attempt"));
			}
			//return $row;
		}
		else
		{
			$ses_user['front_user_id'] = "";
			$ses_user['front_user_email'] = "";
			$ses_user['front_logged_user_in'] = 0;
			$this->session->set_userdata($ses_user);

			$this->session->set_flashdata('error', 'Sorry, your username or password is incorrect!');

			//return FALSE;
		}
		
	}
	
	
	/**
     * update_activation_user
     *
     * This is used to user activation 
     *
     * @author	Nilesh dabhi
     * @access	public
     * @param   integer-$arrData
     * @return void
     */
	public function update_activation_user($upData,$lastinsretid)
	{
		 $this->db->where('user_id',$lastinsretid);

        if($this->db->update('users', $upData))
        {
            return true;
        }
        else
        {
            return false;
        }
	}

}
?>