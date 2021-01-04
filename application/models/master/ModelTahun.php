<?php
defined('BASEPATH') OR exit('No direct script access allowed');
    class ModelTahun extends CI_Model{
        private $tabel = "tahun_pelajaran";
        function ambil_data(){
            $this->db->from($this->tabel);
            $this->db->order_by("tahun", "asc");
            $query = $this->db->get(); 
            return $query;
        }

        function simpanData($data,$table){
            $this->db->insert($table,$data);    
        }

        public function delete($id){
            return $this->db->delete($this->tabel, array("id_tahun" => $id));
        }
    }
    
?>