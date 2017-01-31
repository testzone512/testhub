<?php
defined('BASEPATH') OR exit('No direct script access allowed');


class Home extends CI_Controller {

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
		$this->load->model('front/product_model');
		$this->load->model('front/size_model');
		$this->load->model('admin/slider_model');

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
		$arrData['productRandDetails'] = $this->product_model->get_random_product();
		$arrData['productRecentDetails'] = $this->product_model->get_recent_product();
		//echo "<pre>"; print_r($arrData['productRecentDetails']); die;
		$arrData['sliderDetails']   = $this->slider_model->get_slider_details();
		$this->load->view('home',$arrData);
	}




}
