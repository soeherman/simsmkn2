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

        public function delete($id){
            return $this->db->delete($this->tabel, array("id_siswa" => $id));
        }
    }
?>