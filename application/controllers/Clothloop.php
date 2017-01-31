<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Clothloop extends CI_Controller {

	public function index()
	{
		$this->load->view('why-the-clothes-loop');
	}
}
