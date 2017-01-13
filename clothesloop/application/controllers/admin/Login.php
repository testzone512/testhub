<?php 
/**
* Ecommerce
*
* @package		Codeigniter
* @subpackage   controller
* @author		Chintan Bhimani
* @copyright	Copyright (c) 2012 - 2013 
* @since		Version 1.0
*/
 

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
		$this->load->model('admin/login_model'); 
		
	}

	
	/**
	* index
	*
	* This is used to verify user credential for login
	* 
	* @author	Chintan Bhimani
	* @access	public
	* @return	void
	*/
	
	public function index()
	{
		//$localIP = getHostByName(getHostName());
		//echo $localIP;
		$data['msg']	='';
			//echo $_POST['txtUname']; die;
			if(isset($_REQUEST['btnLogin']))
			{
				$email 	=	$this->input->post('txtEmail');
				$pass 	=	base64_encode($this->input->post('txtPassword'));
				$this->login_model->login($email,$pass);
	 
					if($this->session->userdata('logged_user_in')==1)
					{
						//echo $this->session->userdata('logged_user_in'); die;
						redirect('admin/login/home','refresh');	
					}
					else
					{
						redirect('admin/login','refresh');
					}
			} 
			$this->load->view('admin/login');
	}
	
	
	/*
	 * home
     *
     * This is used to  if user login after user go to home page
	 *
     * @author	Nilesh dabhi
     * @access	public
     * @param   
     * @return void
     */	
	public function home()
	{
		//$user_email = $this->session->userdata['user_email'];
		if($this->session->userdata('logged_user_in')!=1)
		 {								
			redirect('admin/login','refresh');							
		 }
		else
		 {	 
		 	//$arrData['galleryDetails']	= $this->login_model->get_product_gallery_photo();	
			$arrData['middle']= 'admin/dashboard';
			//echo "<pre>";	print_r($arrData['galleryDetails'])	;die;

			$this->load->view('admin/template',$arrData);
		 }

	}

	
	
	/**
     * logout
     *
     * This is used to logout user
     *
     * @author	Nilesh dabhi
     * @access	public
     * @param   
     * @return void
     */
	 
	public function logout()
	{
		$this->session->sess_destroy();	
		//echo		$this->session->userdata('logged_user_in');die;
		redirect('admin/login');
	}
}