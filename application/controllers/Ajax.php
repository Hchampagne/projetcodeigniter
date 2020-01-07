<?php defined('BASEPATH') or exit('No direct script access allowed');

class Ajax extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
    }

    //controle doublons

    public function doublons(){ //doublons login    
        $verif = $this->input->post('verifRef');
        $this->db->where('ins_login', $verif);
        $data = $this->db->count_all_results('inscription');
        echo $data;        
    }

    public function doubPortable(){  //doublons tel portable
        $verif = $this->input->post('verifRef');
        $this->db->where('ins_portable',$verif);
        $data = $this->db->count_all_results('inscription');
        echo $data;
    }
    
}