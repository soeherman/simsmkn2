<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Link extends CI_Controller {

	function __construct(){
		parent::__construct();		
		$this->load->model('master/ModelLink');
	}

	public function index()
	{
		$data['link'] = $this->ModelLink->ambil_data()->result();
		$this->load->view('master/link', $data);
    }
	
	public function tambah(){
		$this->load->view('master/tambahlink');
	}

    public function simpanlink(){
        $nama = $this->input->post('namalink');
		$link = $this->input->post('link');

		$data = array('nama_link'=>$nama, 'link'=>$link);
		$this->ModelLink->simpanData($data,'link');
		redirect('master/link');
	}

	public function ubah($id){
		
	}
	
	public function hapus($id=null){
		if (!isset($id)) show_404();
			
		if ($this->ModelLink->delete($id)) {
			redirect(site_url('master/link'));
		}
	}
}