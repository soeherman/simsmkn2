<?php
defined('BASEPATH') OR exit('No direct script access allowed');
    class ModelSiswa extends CI_Model{
        private $tabel = "siswa";
        
        function ambil_data(){
            return $this->db->get($this->tabel);
        }

        function simpanData($data){
            return $this->db->insert($this->tabel, $data);
        }

        function ambilById($id){
            $this->db->from($this->tabel);
            $this->db->where("id_siswa", $id);
            $query = $this->db->get(); 
            return $query;
        }

        function ubahData($data){
            return $this->db->update($this->tabel, $data, array('id_siswa' => $this->input->post('idsiswa')));
        }

        public function upload_file($filename){
            $this->load->library('upload'); // Load librari upload
            
            $config['upload_path'] = './fileupload/';
            $config['allowed_types'] = 'xlsx';
            $config['max_size']  = '2048';
            $config['overwrite'] = true;
            $config['file_name'] = $filename;
        
            $this->upload->initialize($config); // Load konfigurasi uploadnya
            if($this->upload->do_upload('file')){ // Lakukan upload dan Cek jika proses upload berhasil
                // Jika berhasil :
                $return = array('result' => 'success', 'file' => $this->upload->data(), 'error' => '');
                return $return;
            }else{
                // Jika gagal :
                $return = array('result' => 'failed', 'file' => '', 'error' => $this->upload->display_errors());
                return $return;
            }
        }

        public function delete($id){
            return $this->db->delete($this->tabel, array("id_siswa" => $id));
        }
    }
?>