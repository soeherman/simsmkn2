<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Karyawan extends CI_Controller {

	function __construct(){
		parent::__construct();		
		$this->load->model('master/ModelKaryawan');
		$this->load->model('master/ModelStatuspegawai');
	}

	public function index()
	{
		$data['karyawan'] = $this->ModelKaryawan->ambil_data()->result();
		$this->load->view('master/karyawan',$data);
	}
	
	public function tambah(){
		$data['status'] = $this->ModelStatuspegawai->ambil_data()->result();
		$this->load->view('master/tambahkaryawan', $data);
	}

	public function ubah($id){
		$data['status'] = $this->ModelStatuspegawai->ambil_data()->result();
		$data['karyawan'] = $this->ModelKaryawan->ambilById($id)->row();
		$this->load->view('master/tambahkaryawan', $data);
	}

	public function simpan(){
		$nip = $this->input->post('nip');
		$nik = $this->input->post('nik');
		$nama = $this->input->post('nama');
		$jk = $this->input->post('kelamin');
		$agama = $this->input->post('agama');
		$tempat = $this->input->post('tempat');
		$agama = $this->input->post('agama');
		$tempat = $this->input->post('tempat');
		$tanggal = $this->input->post('tanggal');
		$tlp = $this->input->post('tlp');
		$email = $this->input->post('email');
		$alamat = $this->input->post('alamat');
		$nuptk = $this->input->post('nuptk');
		$npwp = $this->input->post('npwp');
		$statusaktif = $this->input->post('statusaktif');
		$statuspegawai = $this->input->post('statuspegawai');
		$tmt = $this->input->post('tmt');
		$status = "Karyawan";
		$idpeg = $this->input->post('idpegawai');
		

		$data = array('nik'=>$nik, 'nip'=>$nip, 'nama'=>$nama, 'nuptk'=>$nuptk, 'npwp'=>$npwp, 'jenis_kelamin'=>$jk, 'tempat_lahir'=>$tempat,'tanggal_lahir'=>$tanggal,'agama'=>$agama,'id_status_pegawai'=>$statuspegawai,'status'=>$statusaktif,'alamat'=>$alamat,'no_hp'=>$tlp,'email'=>$email,'tmt'=>$tmt,'id_user'=>'1', 'statuspegawai' => $status);
		if(empty($idpeg)){
			$this->ModelKaryawan->simpanData($data);
		}else{
			$this->ModelKaryawan->ubahData($data);
		}
		redirect('master/karyawan');
	}

	public function hapus($id=null){
		if (!isset($id)) show_404();
			
		if ($this->ModelKaryawan->delete($id)) {
			redirect(site_url('master/karyawan'));
		}
	}

	public function import(){
		$this->load->view('master/importkaryawan');
	}
    
}