<?php defined('BASEPATH') or exit('No direct script access allowed');

class Ajax extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
    }

    //controle doublons

    public function doublon(){ //doublons login 
        //recup post ajax   
        $verif = $this->input->post('verifRef'); 
        $champs = $this->input->post('verifChamps');
        $table = $this->input->post('verifTable');
        //appel du model pour traitement base de donnée
        $data = $this->ajax_model->doublon($verif, $champs, $table);  
        //retour resultat de la requete vers controleur ajax         
        echo $data;        
    }   
    
}