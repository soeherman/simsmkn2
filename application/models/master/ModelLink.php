<?php
defined('BASEPATH') OR exit('No direct script access allowed');
    class ModelLink extends CI_Model{
        private $tabel = "link";

        public function ambil_data(){
            return $this->db->get($this->tabel);
        }

        public function getById($id){
            return $this->db->get_where($this->_table, ["id_link" => $id])->row();
        }

        public function simpanData($data,$table){
            $this->db->insert($table,$data);    
        }
        

        public function delete($id){
            return $this->db->delete($this->tabel, array("id_link" => $id));
        }
    }
    
?>