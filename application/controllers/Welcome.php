<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

	function __construct(){
		parent::__construct();		
		$this->load->model('ModelLogin');
		if($this->ModelLogin->isNotLogin()) redirect(site_url('login'));
	}
	public function index()
	{
		$this->load->view('index');
	}
}
