<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Siswa extends CI_Controller {

	function __construct(){
		parent::__construct();		
		$this->load->model('master/ModelSiswa');
	}

	public function index()
	{
		$data['siswa'] = $this->ModelSiswa->ambil_data()->result();
		$this->load->view('master/siswa', $data);
    }
	
	public function tambah(){
		$this->load->view('master/tambahsiswa');
	}

	public function ubah($id){
		$data['siswa'] = $this->ModelSiswa->ambilById($id)->row();
		$this->load->view('master/tambahsiswa', $data);
	}

	public function simpan(){
		$nik = $this->input->post('nik');
		$nis = $this->input->post('nis');
		$nisn = $this->input->post('nisn');
		$nama = $this->input->post('nama');
		$jk = $this->input->post('jk');
		$agama = $this->input->post('agama');
		$tempat = $this->input->post('tempat');
		$tgl = $this->input->post('tgl');
		$tlp = $this->input->post('tlp');
		$email = $this->input->post('email');
		$asal = $this->input->post('asal');
		$alamat = $this->input->post('alamat');
		$idsiswa = $this->input->post('idsiswa');
		$data = array('nis'=>$nis, 'nisn'=>$nisn,'nik'=>$nik,'nama'=>$nama,'jenis_kelamin'=>$jk,'tempat_lahir'=>$tempat,'tanggal_lahir'=>$tgl,'agama'=>$agama,'no_hp'=>$tlp,'email'=>$email,'nis'=>$nis,'asal_sekolah'=>$asal,'alamat'=>$alamat);


		if(empty($idsiswa)){
			$this->ModelSiswa->simpanData($data);
		}else{
			$this->ModelSiswa->ubahData($data);
		}
		
		redirect('master/siswa');

	}

	public function hapus($id=null){
		if (!isset($id)) show_404();
			
		if ($this->ModelSiswa->delete($id)) {
			redirect(site_url('master/siswa'));
		}
	}

	public function import(){
		$this->load->view('master/importsiswa');
	}
	
}