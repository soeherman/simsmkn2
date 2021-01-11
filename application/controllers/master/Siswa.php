<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Siswa extends CI_Controller {
	private $filename = "datasiswa";
	function __construct(){
		parent::__construct();		
		$this->load->model('master/ModelSiswa');
		$this->load->model('ModelLogin');
		if($this->ModelLogin->isNotLogin()) redirect(site_url('login'));
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

	public function form(){
		$this->load->view('master/importsiswa');
	}

	public function prevdata(){
		$data = array(); // Buat variabel $data sebagai array
    
		if(isset($_POST['preview'])){ // Jika user menekan tombol Preview pada form
			// lakukan upload file dengan memanggil function upload yang ada di SiswaModel.php
			$upload = $this->ModelSiswa->upload_file($this->filename);
			
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
		$this->load->view('previewdata/importsiswa',$data);
	}

	public function import(){
		include APPPATH.'third_party/PHPExcel/PHPExcel.php';
		
		$excelreader = new PHPExcel_Reader_Excel2007();
		$loadexcel = $excelreader->load('fileupload/'.$this->filename.'.xlsx'); // Load file yang telah diupload ke folder excel
		$sheet = $loadexcel->getActiveSheet()->toArray(null, true, true ,true);
				
		$numrow = 1;
		foreach($sheet as $row){
		  if($numrow > 1){
			$nik = $row['A'];
			$nis = $row['B'];
			$nisn = $row['C'];
			$nama = $row['D'];
			$jk = $row['E'];
			$agama = $row['F'];
			$tempat = $row['G'];
			$tgl = $row['H'];
			$tlp = $row['I'];
			$email = $row['J'];
			$asal = $row['K'];
			$alamat = $row['L'];

			$datauser = array('username'=> $nisn, 'password'=> '123', 'level'=>'Siswa');
			$this->db->insert('user',$datauser);
			$insert_id = $this->db->insert_id();

			$data = array('nis'=>$nis, 'nisn'=>$nisn,'nik'=>$nik,'nama'=>$nama,'jenis_kelamin'=>$jk,'tempat_lahir'=>$tempat,'tanggal_lahir'=>$tgl,'agama'=>$agama,'no_hp'=>$tlp,'email'=>$email,'nis'=>$nis,'asal_sekolah'=>$asal,'alamat'=>$alamat,'id_user' => $insert_id);
			$this->db->insert('siswa', $data);
		  }
		  
		  $numrow++; // Tambah 1 setiap kali looping
		}
		
		redirect("master/siswa"); // Redirect ke halaman awal (ke controller siswa fungsi index)
	}
	
}