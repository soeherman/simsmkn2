<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Tahun extends CI_Controller {

	function __construct(){
		parent::__construct();		
		$this->load->model('master/ModelTahun');
	}

	public function index()
	{
		$data['tahun'] = $this->ModelTahun->ambil_data()->result();
		$this->load->view('master/tahunajaran', $data);
    }
	
	public function tambah(){
		$this->load->view('master/tambahtahunajaran');
	}

    public function simpantahun(){
        $tahun = $this->input->post('tahun');
		$status = $this->input->post('status');

		$data = array('status'=>$status, 'tahun'=>$tahun);
		$this->ModelTahun->simpanData($data,'tahun_pelajaran');
		redirect('master/tahun');
	}
	
	public function hapus($id=null){
		if (!isset($id)) show_404();
			
		if ($this->ModelTahun->delete($id)) {
			redirect(site_url('master/tahun'));
		}
	}
}