<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Hiw extends CI_Controller {

	public function index()
	{
		$this->load->view('how-it-works');
	}
}
