<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Mapel extends CI_Controller {

	function __construct(){
		parent::__construct();		
		$this->load->model('master/ModelMapel');
	}

	public function index()
	{
		$data['mapel'] = $this->ModelMapel->ambil_data()->result();
		$this->load->view('master/mapel', $data);
    }
	
	public function tambah(){
		$this->load->view('master/tambahmapel');
	}

    public function simpanmapel(){
        $nama = $this->input->post('namamapel');

		$data = array('nama_mapel'=>$nama);
		$this->ModelMapel->simpanData($data,'mapel');
		redirect('master/mapel');
    }

    public function hapus($id=null){
        if (!isset($id)) show_404();
			
		if ($this->ModelMapel->delete($id)) {
			redirect(site_url('master/mapel'));
		}
    }
}