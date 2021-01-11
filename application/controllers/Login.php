<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Login extends CI_Controller {

	function __construct(){
		parent::__construct();		
		$this->load->model('ModelLogin');
	}

	public function index()
	{
		if($this->input->post()){
            if($this->ModelLogin->doLogin()) redirect(site_url('.'));
        }
		$this->load->view('login');
	}

	public function logout()
    {
        $this->session->sess_destroy();
        redirect(site_url('login'));
    }
    
}