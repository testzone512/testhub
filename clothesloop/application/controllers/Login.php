<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {
    
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
		$this->load->model('front/login_model'); 
		
	}

	public function index()
	{
        $data['msg']	='';
			//echo $_POST['txtUname']; die;
        if(isset($_REQUEST['btnLogin']))
        {
            $email 	=	$this->input->post('txtUsername');
            $pass 	=	base64_encode($this->input->post('txtPassword'));
            $this->login_model->login($email,$pass);

                if($this->session->userdata('front_logged_user_in')==1)
                {
                    //echo $this->session->userdata('logged_user_in'); die;
                    //echo "<pre>";	print_r($arrData['galleryDetails'])	;die;
                    if($this->session->userdata('login_back_product_id'))
                    {
                       // $this->load->view($this->session->userdata('login_back_product_id'));
                        redirect('shop/view/'.$this->session->userdata("login_back_product_id"));
                    }
                    redirect('/','refresh');	
                }
                else
                {
                    redirect('login','refresh');
                }
        } 
        $this->load->view('login');
	}
    
    /**
     * logout
     *
     * This is used to logout user
     *
     * @author	Chintan Bhimani
     * @access	public
     * @param   
     * @return void
     */
	 
	public function logout()
	{
        $ses_user['front_user_id'] 		          = "";
        $ses_user['front_user_firstname']           = "";
        $ses_user['front_user_lastname']            = "";
        $ses_user['front_user_mobile']    		  = "";
        $ses_user['front_user_address']			 = "";
        $ses_user['front_user_email']     		   = "";
        $ses_user['front_user_profile_pic']         = "";
        $ses_user['front_user_is_admin']  		    = "";
        $ses_user['front_user_activation_pending']  = "";
        $ses_user['front_logged_user_in']		   = 0;
		$ses_user['login_back_product_id'] 		  = "";

        $this->session->set_userdata($ses_user);
		//$this->session->sess_destroy();
		redirect('/');
	}
    
    /**
     * activation_user
     *
     * This is used to activation user
     *
     * @author	Nilesh dabhi
     * @access	public
     * @param   $lastinsretid
     * @return void
     */
	public function activation_user($lastinsretid)
    {
		if($lastinsretid)
		{
			$upData['user_activation_pending']= 1;
			$upFlag = $this->login_model->update_activation_user($upData,$lastinsretid);
			if($upFlag)
			{
			     $this->session->set_flashdata('success', 'Your Account Activated Successfully and Now After You Can Login..');
                 redirect('login');
			}
			else
			{
				$this->session->set_flashdata('error', 'Failed to Activation !!');
				redirect('login');
			}

		}
	}
    
    
}
