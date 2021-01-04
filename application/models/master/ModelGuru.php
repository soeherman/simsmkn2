<?php
defined('BASEPATH') OR exit('No direct script access allowed');
    class ModelGuru extends CI_Model{
        private $tabel = "pegawai";

        function ambil_data(){
            $this->db->from($this->tabel);
            $this->db->where("statuspegawai", "Guru");
            $query = $this->db->get(); 
            return $query;
        }

        function ambilById($id){
            $this->db->from($this->tabel);
            $this->db->where("id_pegawai", $id);
            $query = $this->db->get(); 
            return $query;
        }

        function simpanData($data){
            return $this->db->insert($this->tabel, $data);
        }

        function ubahData($data){
            return $this->db->update($this->tabel, $data, array('id_pegawai' => $this->input->post('idpegawai')));
        }

        public function delete($id){
            return $this->db->delete($this->tabel, array("id_pegawai" => $id));
        }
    }
?>