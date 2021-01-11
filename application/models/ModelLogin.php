<?php
defined('BASEPATH') OR exit('No direct script access allowed');
    class ModelLogin extends CI_Model{
        private $tabel = "user";

        public function doLogin(){
            $post = $this->input->post();
    
            $this->db->where('username', $post["username"]);
            $user = $this->db->get($this->tabel)->row();
    
            if($user){    
                if($post['password'] == $user->password){ 
                    $id = $user->id_user;
                    $level = $user->level;
                    if($level == "Guru" || $level == "Karyawan"){
                        $t = "pegawai";
                    }else if($level == "Siswa"){
                        $t = "siswa";
                    }
                    $datasesi = $this->caridata($id,$t)->row();
                    $this->session->set_userdata(['user' => $datasesi]);
                    return true;
                }
            }
            
            return false;
        }

        public function caridata($id,$_tabel){
            $this->db->from($_tabel);
            $this->db->where("id_user", $id);
            $query = $this->db->get(); 
            return $query;
        }

        public function isNotLogin(){
            return $this->session->userdata('user') === null;
        }
        
    }
?>