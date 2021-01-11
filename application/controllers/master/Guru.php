<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Guru extends CI_Controller {
	private $filename = "dataguru"; 

	function __construct(){
		parent::__construct();		
		$this->load->model('master/ModelGuru');
		$this->load->model('master/ModelStatuspegawai');
		$this->load->model('ModelLogin');
		if($this->ModelLogin->isNotLogin()) redirect(site_url('login'));
	}

	public function index()
	{
		$data['guru'] = $this->ModelGuru->ambil_data()->result();
		$this->load->view('master/guru', $data);
    }
	
	public function tambah(){
		$data['status'] = $this->ModelStatuspegawai->ambil_data()->result();
		$this->load->view('master/tambahguru', $data);
	}

	public function ubah($id){
		$data['status'] = $this->ModelStatuspegawai->ambil_data()->result();
		$data['guru'] = $this->ModelGuru->ambilById($id)->row();
		$this->load->view('master/tambahguru', $data);
	}

	public function simpan(){
		$nip = $this->input->post('nip');
		$nik = $this->input->post('nik');
		$nama = $this->input->post('nama');
		$jk = $this->input->post('kelamin');
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
		$status = "Guru";
		$idpeg = $this->input->post('idpegawai');

		$data = array('nik'=>$nik, 'nip'=>$nip, 'nama'=>$nama, 'nuptk'=>$nuptk, 'npwp'=>$npwp, 'jenis_kelamin'=>$jk, 'tempat_lahir'=>$tempat,'tanggal_lahir'=>$tanggal,'agama'=>$agama,'id_status_pegawai'=>$statuspegawai,'status'=>$statusaktif,'alamat'=>$alamat,'no_hp'=>$tlp,'email'=>$email,'tmt'=>$tmt,'id_user'=>'1', 'statuspegawai' => $status);
		if(empty($idpeg)){
			$this->ModelGuru->simpanData($data);
		}else{
			$this->ModelGuru->ubahData($data);
		}
		
		redirect('master/guru');
	}

	public function hapus($id=null){
		if (!isset($id)) show_404();
			
		if ($this->ModelGuru->delete($id)) {
			redirect(site_url('master/guru'));
		}
	}

	public function form(){
		$this->load->view('master/importguru');
	}

	public function prevdata(){
		$data = array(); // Buat variabel $data sebagai array
    
		if(isset($_POST['preview'])){ // Jika user menekan tombol Preview pada form
			// lakukan upload file dengan memanggil function upload yang ada di SiswaModel.php
			$upload = $this->ModelGuru->upload_file($this->filename);
			
			if($upload['result'] == "success"){ // Jika proses upload sukses
				// Load plugin PHPExcel nya
				include APPPATH.'third_party/PHPExcel/PHPExcel.php';
				
				$excelreader = new PHPExcel_Reader_Excel2007();
				$loadexcel = $excelreader->load('fileupload/'.$this->filename.'.xlsx'); // Load file yang tadi diupload ke folder excel
				$sheet = $loadexcel->getActiveSheet()->toArray(null, true, true ,true);
				
				// Masukan variabel $sheet ke dalam array data yang nantinya akan di kirim ke file form.php
				// Variabel $sheet tersebut berisi data-data yang sudah diinput di dalam excel yang sudha di upload sebelumnya
				$data['sheet'] = $sheet; 
			}else{ // Jika proses upload gagal
				$data['upload_error'] = $upload['error']; // Ambil pesan error uploadnya untuk dikirim ke file form dan ditampilkan
			}
		}
		$this->load->view('previewdata/importguru',$data);
	}

	public function import(){
		include APPPATH.'third_party/PHPExcel/PHPExcel.php';
		
		$excelreader = new PHPExcel_Reader_Excel2007();
		$loadexcel = $excelreader->load('fileupload/'.$this->filename.'.xlsx'); // Load file yang telah diupload ke folder excel
		$sheet = $loadexcel->getActiveSheet()->toArray(null, true, true ,true);
				
		$numrow = 1;
		foreach($sheet as $row){
		  if($numrow > 1){
			$nip = $row['A'];
			$nik = $row['B'];
			$nama = $row['C'];
			$jk = $row['D'];
			$agama = $row['E'];
			$tempat = $row['F'];
			$tanggal = $row['G'];
			$tlp = $row['H'];
			$email = $row['I'];
			$alamat = $row['J'];
			$nuptk = $row['K'];
			$npwp = $row['L'];
			$statusaktif = $row['M'];
			$statuspegawai = $row['N'];
			$tmt = $row['O'];
			$status = "Guru";

			$datauser = array('username'=> $nik, 'password'=> '123', 'level'=>'Guru');
			$this->db->insert('user',$datauser);
			$insert_id = $this->db->insert_id();

			$data = array('nik'=>$nik, 'nip'=>$nip, 'nama'=>$nama, 'nuptk'=>$nuptk, 'npwp'=>$npwp, 'jenis_kelamin'=>$jk, 'tempat_lahir'=>$tempat,'tanggal_lahir'=>$tanggal,'agama'=>$agama,'id_status_pegawai'=>$statuspegawai,'status'=>$statusaktif,'alamat'=>$alamat,'no_hp'=>$tlp,'email'=>$email,'tmt'=>$tmt,'id_user'=>$insert_id, 'statuspegawai' => $status);
			$this->db->insert('pegawai', $data);
		  }
		  
		  $numrow++; // Tambah 1 setiap kali looping
		}
		
		redirect("master/siswa"); // Redirect ke halaman awal (ke controller siswa fungsi index)
	}
}