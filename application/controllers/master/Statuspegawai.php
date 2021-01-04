<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Statuspegawai extends CI_Controller {

	function __construct(){
		parent::__construct();		
		$this->load->model('master/ModelStatuspegawai');
	}

	public function index()
	{
		$data['status'] = $this->ModelStatuspegawai->ambil_data()->result();
		$this->load->view('master/statuspegawai', $data);
    }
	
	public function tambah(){
		$this->load->view('master/tambahstatuspegawai');
	}

    public function simpanstatus(){
        $nama = $this->input->post('status');

		$data = array('nama_status'=>$nama);
		$this->ModelStatuspegawai->simpanData($data,'status_pegawai');
		redirect('master/statuspegawai');
    }

    public function hapus($id=null){
        if (!isset($id)) show_404();
			
		if ($this->ModelStatuspegawai->delete($id)) {
			redirect(site_url('master/statuspegawai'));
		}
    }
}