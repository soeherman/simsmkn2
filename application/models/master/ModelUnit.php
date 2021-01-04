<?php
defined('BASEPATH') OR exit('No direct script access allowed');
    class ModelUnit extends CI_Model{
        private $tabel = "unit";
        function ambil_data(){
            return $this->db->get('unit');
        }

        function simpanData($data,$table){
            $this->db->insert($table,$data);    
        }

        public function delete($id){
            return $this->db->delete($this->tabel, array("id_unit" => $id));
        }
    }
    
?>