<?php
defined('BASEPATH') OR exit('No direct script access allowed');
    class Modelstatuspegawai extends CI_Model{
        private $tabel = "status_pegawai";

        public $mapel;
        function ambil_data(){
            return $this->db->get($this->tabel);
        }

        function simpanData($data,$table){
            $this->db->insert($table,$data);    
        }

        function delete($id){
            return $this->db->delete($this->tabel, array("id_status_pegawai"=>$id));
        }
    }
    
?>