	
<?php

// application/controllers/Produits.php	
defined('BASEPATH') or exit('No direct script access allowed');
class Produits extends CI_Controller
{
    //LISTE
    public function liste()
    {
        //appel model
        $this->load->model('produits_model');
        $aListe = $this->produits_model->liste();
        
        $aView["liste_produits"] = $aListe;
        // Appel de la vue avec transmission du tableau 
        $this->load->view('header.php');
        $this->load->view('liste', $aView);
    }

    //DETAIL
    public function detail($id)
    {

        $model = $this->produits_model->detail_produits($id);

        $catId = $model['produit']->pro_cat_id;

        $detailCat = $this->produits_model->detail_categories($catId);

        $this->load->view('header.php');
        $this->load->view('detail', $model + $detailCat);
    }

    //AJOUT
    public function ajout()
    {
        
        $this->load->database();

        if ($this->input->post()) {

            // validation des champs formulaires requis/regex/longueur et unique pour référence set message erreurs
            $this->form_validation->set_rules('pro_ref', 'Référence', 'required|html_escape|regex_match[/^[\ \/_ \-A-Za-z0-9êéèçàäëï]*$/]|max_length[10]|is_unique[produits.pro_ref]', array('required' => 'Champs vide', 'regex_match' => 'Saisie incorrecte', 'max_length' => 'Trop long', 'is_unique' => 'Déjà utilisé'));
            $this->form_validation->set_rules('pro_libelle', 'Nom', 'required|html_escape|regex_match[/^[\ \/_ \-A-Za-z0-9êéèçàäëï]*$/]|max_length[200]', array('required' => 'Champs vide', 'regex_match' => 'Saisie incorrecte', 'max_length' => 'Trop long'));
            $this->form_validation->set_rules('pro_prix', 'Prix', 'required|html_escape|regex_match[/^[0-9]{1,6}(.[0-9]{2})$/]|max_length[9]', array('required' => 'Champs vide', 'regex_match' => 'Saisie incorrecte', 'max_length' => 'Trop long'));
            $this->form_validation->set_rules('pro_stock', 'Stock', 'required|html_escape|regex_match[/^[0-9]{1,11}$/]|max_length[11]', array('required' => 'Champs vide', 'regex_match' => 'Saisie incorrecte', 'max_length' => 'Trop long'));
            $this->form_validation->set_rules('pro_couleur', 'Couleur', 'required|html_escape|regex_match[/^[\ \/_ \-A-Za-z0-9êéèçàäëï]*$/]|max_length[30]', array('required' => 'Champs vide', 'regex_match' => 'Saisie incorrecte', 'max_length' => 'Trop long'));
            $this->form_validation->set_rules('pro_description', 'Description', 'required|html_escape|regex_match[/^[^<>\/]+[\w\W]{1,999}$/]|max_length[1000]', array('required' => 'Champs vide', 'regex_match' => 'Saisie incorrecte', 'max_length' => 'Trop long'));

            //test photo valide
            $config['upload_path'] = './assets/images/';
            $config['allowed_types'] = 'gif|jpg|jpeg|pjpeg|png|x-png|tiff'; //types fichiers autorisés
            $this->upload->initialize($config);
            if(! $this->upload->do_upload('fichier')){
                $errors = $this->upload->display_errors('<span class="span">', '</span>');
                $aview['errors'] = $errors;  
            }
            else{
                $aview = array();
            }
                    
            if (($this->form_validation->run() == false) || (count($aview)!=0)){               
                //il au moins une erreur / recharge la vue formulaire ajout

                $cat=$this->produits_model->categories();  
                $this->load->view('header.php');
                $this->load->view('ajout', $cat+$aview);
            } 
            else {
                //si pas d'erreurs dans les champs ou la photo
                $data = $this->input->post(NULL,TRUE);  // récup les champs input après post

                //recup extention de la photo
                $extention = substr(strrchr($_FILES['fichier']['name'], '.'), 1);

                $this->load->model('produits_model');
                $id =$this->produits_model->ajout_insert($data,$extention);
                             
                //prarmètrage pour l'upload de la photo             
                $config['file_name'] = $id . '.' . $extention;    //rename photo             
                $config['overwrite'] = true;                    // permet ecrasé la photo pour enregitrement
                $this->upload->initialize($config);
                //ajout extention en base et de renome /deplace la photo
                $this->upload->do_upload('fichier');
                
                redirect("produits/liste"); // redirection liste             
            }
        } 
        else {  //il n'y a pas de valeurs postées premier affichage du formulaire ajout
            
            $cat = $this->produits_model->categories(); 
            $this->load->view('header.php');
            $this->load->view('ajout', $cat);
        }
    }


    //MODIFICATION
    public function modif($id)
    {
       
        $this->load->database();

        if ($this->input->post()) {

        $this->form_validation->set_rules('pro_ref', 'Référence', 'required|html_escape|regex_match[/^[\ \/_ \-A-Za-z0-9êéèçàäëï]*$/]|max_length[10]',
             array('required' => 'Champs vide', 'regex_match' => 'Saisie incorrecte', 'max_length' => 'Trop long'));
        $this->form_validation->set_rules('pro_libelle', 'Nom', 'required|html_escape|regex_match[/^[\ \/_ \-A-Za-z0-9êéèçàäëï]*$/]|max_length[200]',
             array('required' => 'Champs vide', 'regex_match' => 'Saisie incorrecte', 'max_length' => 'Trop long'));
        $this->form_validation->set_rules('pro_prix', 'Prix', 'required|html_escape|regex_match[/^[0-9]{1,6}(.[0-9]{2})$/]|max_length[9]', 
            array('required' => 'Champs vide', 'regex_match' => 'Saisie incorrecte', 'max_length' => 'Trop long'));
        $this->form_validation->set_rules('pro_stock', 'Stock', 'required|html_escape|regex_match[/^[0-9]{1,11}$/]|max_length[11]',
             array('required' => 'Champs vide', 'regex_match' => 'Saisie incorrecte', 'max_length' => 'Trop long'));
        $this->form_validation->set_rules('pro_couleur', 'Couleur', 'required|html_escape|regex_match[/^[\ \/_ \-A-Za-z0-9êéèçàäëï]*$/]|max_length[30]',
             array('required' => 'Champs vide', 'regex_match' => 'Saisie incorrecte', 'max_length' => 'Trop long'));
        $this->form_validation->set_rules('pro_description', 'Description', 'required|html_escape|regex_match[/^[^<>\/]+[\w\W]{1,999}$/]|max_length[1000]',
             array('required' => 'Champs vide', 'regex_match' => 'Saisie incorrecte', 'max_length' => 'Trop long'));

            if(!empty($_FILES['fichier']['name'])){
                //test photo valide
                $config['upload_path'] = './assets/images/';
                $config['allowed_types'] = 'gif|jpg|jpeg|pjpeg|png|x-png|tiff'; //types fichiers autorisés
                $this->upload->initialize($config);
                if (!$this->upload->do_upload('fichier')) {
                    $errors = $this->upload->display_errors('<span class="span">', '</span>');
                    $aview['errors'] = $errors;
                } else {
                    $aview = array();
                    $extention = substr(strrchr($_FILES['fichier']['name'], '.'), 1); //recup extention de la photo
                }
            }
            else{
                $aview = array();
                $extention = '';
            }    

            if (($this->form_validation->run() == false) || count($aview) != 0){

                $model = $this->produits_model->detail_produits($id);

                $catId = $model['produit']->pro_cat_id;

                $cat = $this->produits_model->categories();

                $detailCat = $this->produits_model->detail_categories($catId);

                $this->load->view('modif', $model + $cat + $detailCat+$aview);
            }
            else{
                $data = $this->input->post(NULL,TRUE);
                $id = $this->input->post('pro_id');

                if(!empty($_FILES['fichier']['name'])){               
                //prarmètrage pour l'upload de la photo             
                $config['file_name'] = $id . '.' . $extention;    //rename photo             
                $config['overwrite'] = true;                    // permet ecrasé la photo pour enregitrement
                $this->upload->initialize($config);
                // renome /deplace la photo
                $this->upload->do_upload('fichier');               
                }
               
                $this->produits_model->modif_update($data,$id,$extention);

                redirect("produits/liste");//
            }              
        } 
        else {

           

            $model = $this->produits_model->detail_produits($id);
           
            $catId = $model['produit']->pro_cat_id;
            
            $cat = $this->produits_model->categories(); 

            $detailCat = $this->produits_model->detail_categories($catId);
            
            $this->load->view('header.php');
            $this->load->view('modif', $model + $cat + $detailCat);
        }
    }

    //suppr
    public function suppr($id)
    {
        
        $this->produits_model->suppression($id);

        redirect("produits/liste");
    }

    //mot de passe
    public function form_mdp(){

        $this->load->database();

        if($this->input->post()){
        // regles de validation des champs
        
        $this->form_validation->set_rules('email','Login','required|html_escape|regex_match[/[^\W][a-zA-Z0-9_]+(\.[a-zA-Z0-9_]+)*\@[a-zA-Z0-9_]+(\.[a-zA-Z0-9_]+)*\.[a-zA-Z]{2,4}/]',array('required'=>'Champs vide', 'regex_match'=>'Saisie incorrecte'));
        $this->form_validation->set_rules('mdp','mot de passe','required|html_escape|regex_match[/(?=.{8,}$)(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])(?=.*\W).*/]', array('required'=>'champs vide','regex_match'=>'Saisie incorrecte'));
        
            if($this->form_validation->run() != false){ //si pas d'erreur dans les champs email et mdp
    
            $email = $this->input->post('email');  //valeur champs  email
            $ident = $this->produits_model->mdp($email);    // envoie $email au model mdp

                //recup le mot de passe hash de produits_model de l'enregistrement / function mdp retourne null si login pas présent
                if($ident['ident'] != null){ // si le login existe

                    if (password_verify($this->input->post('mdp'),$ident['ident']->ins_mdp)){ //mot de passe verfifé
                    // ouvre une session et set les valeurs pour session
                    $this->session;
                    $this->session->set_userdata('role',$ident['ident']->ins_role);
                    $this->session->set_userdata('nom',$ident['ident']->ins_nom);
                    $this->session->set_userdata('prenom',$ident['ident']->ins_prenom);
                    $this->session->set_userdata('email',$ident['ident']->ins_login);
                    
                    //message connexion

                    //charge la liste et header pour admin
                    $this->load->view('header');
                    $this->load->view('liste');
                    
                    }else{ // erreur mot de passe
                        $mess['mess'] = 'problème connexion mdp';                     
                        $this->load->view('header');
                        $this->load->view('form_mdp',$mess);                     
                    }
                }else{ //message erreur le login n'existe pas
                    $mess['mess'] = 'problème connexion login';
                    $this->load->view('header');
                    $this->load->view('form_mdp',$mess);
                }

            }else{ // form_validation false
                $this->load->view('header');
                $this->load->view('form_mdp'); 
            }          
       
        }else{ //pas de post 1er affichage de la vue
            $this->load->view('header');
            $this->load->view('form_mdp');  
        }
         
    }
}
