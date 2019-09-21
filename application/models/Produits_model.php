<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Produits_model extends CI_Model
{ 
public function liste(){
        // liste produits
        $this->load->database();
        $aListe = $this->db->get('produits')->result();
        return $aListe;
}

public function detail_produits($id){
        //article table produits 
        $this->load->database();
        $this->db->where('pro_id',$id);
        $model['produit'] = $this->db->get('produits')->row();
        return $model;
}

public function detail_categories($catId){
        //detail categorie une ligne
        $this->load->database();
        $this->db->where('cat_id',$catId);
        $detailCat['categorie'] = $this->db->get('categories')->row();
        return $detailCat;
}

public function categories(){
        // liste de categories
        $this->load->database();       
        $cat['liste_categorie'] = $this->db->get('categories')->result();
        return $cat;
}

public function ajout_insert($data,$extention){
        // ajout produit à la base
        $this->load->database();
        // date ajout généré par le système
        date_default_timezone_set('Europe/Paris');
        $date = new datetime();
        $ajout = $date->format('Y-m-d');
        
        //on fait l'INSERT ds la base de donnée on SET au préalable la date ds 'pro_d_ajout
        $this->db->set('pro_d_ajout', $ajout);
        $this->db->set('pro_photo', $extention);
        $this->db->insert('produits', $data);
        //recup pro_id pour renomer la photo
        $id = $this->db->insert_id(); 
        return $id;     
}

public function modif_update($data,$id,$extention){
        // modification d'un produit
        $this->load->database();
        // date ajout généré par le systèmes
        date_default_timezone_set('Europe/Paris');
        $date = new datetime();
        $modif = $date->format('Y-m-d H:i:s');
        //test et set l'extention si elle existe valeur != ""
        if(!$extention=='')
        {
                $this->db->set('pro_photo', $extention);
        }      
        $this->db->where('pro_id', $id);
        $this->db->set('pro_d_modif', $modif);
        $this->db->update('produits', $data);

        return;
}

public function suppression($id){
        //suppression d'un produit
        $this->load->database();
        $this->db->where('pro_id', $id);
        $this->db->delete('produits');  
        return;
}
}