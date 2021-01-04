<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Unit extends CI_Controller {

	function __construct(){
		parent::__construct();		
		$this->load->model('master/ModelUnit');
	}

	public function index()
	{
		$data['unit'] = $this->ModelUnit->ambil_data()->result();
		$this->load->view('master/unit', $data);
    }
	
	public function tambah(){
		$this->load->view('master/tambahunit');
	}

    public function simpanunit(){
        $nama = $this->input->post('namaunit');

		$data = array('nama_unit'=>$nama);
		$this->ModelUnit->simpanData($data,'unit');
		redirect('master/unit');
	}
	
	public function hapus($id=null){
		if (!isset($id)) show_404();
			
		if ($this->ModelUnit->delete($id)) {
			redirect(site_url('master/unit'));
		}
	}
}