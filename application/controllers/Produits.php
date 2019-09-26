	
<?php

// application/controllers/Produits.php	
defined('BASEPATH') or exit('No direct script access allowed');
class Produits extends CI_Controller
{
//LISTE ADMINISTRATEUR CRUD
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

//LISTE UTILISATEUR BOUTIQUE
    public function liste_user()
    {
        //appel model
        $this->load->model('produits_model');
        $aListe = $this->produits_model->liste();

        $aView["liste_produits"] = $aListe;
        // Appel de la vue avec transmission du tableau 
        $compteur['compteur'] = $this->session->compteur;  
        $this->load->view('header_user',$compteur);
        $this->load->view('liste_user', $aView);
    }

//DETAIL CRUD
    public function detail($id)
    {
       
        $model = $this->produits_model->detail_produits($id);
        $catId = $model['produit']->pro_cat_id;
        $detailCat = $this->produits_model->detail_categories($catId);

       
        if($this->session->role != 'admin'){
            $compteur['compteur'] = $this->session->compteur;  
            $this->load->view('header_user',$compteur);
            $this->load->view('detail', $model + $detailCat);
        }else{

            $this->load->view('header.php');
            $this->load->view('detail', $model + $detailCat);
        }              
    }

//AJOUT CRUD
    public function ajout()
    {
        // controle session acces admin
        
        if ($this->session->role != 'admin') {
            redirect('produits/liste_user');           
        }
        
        $this->load->database();

        if ($this->input->post()) {

            // validation des champs formulaires requis/regex/longueur et unique pour référence set message erreurs
            $this->form_validation->set_rules('pro_ref', 'Référence', 'required|html_escape|regex_match[/^[\ \/_ \-A-Za-z0-9êéèçàäëï]*$/]|max_length[10]|is_unique[produits.pro_ref]', 
                array('required' => 'Champs vide', 'regex_match' => 'Saisie incorrecte', 'max_length' => 'Trop long', 'is_unique' => 'Déjà utilisé'));
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
                $id = $this->produits_model->ajout_insert($data,$extention);               
                             
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


//MODIFICATION CRUD
    public function modif($id)
    {
        // controle session acces admin
        
        if($this->session->role != 'admin'){
            redirect('produits/liste_user');
        }

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
                // ré affiche le header et la liste admin
                redirect("produits/liste");
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

//SUPPRESSION CRUD
    public function suppr($id)
    {
        
        $this->produits_model->suppression($id);

        redirect("produits/liste");
    }

// LOGIN ET SESSION ADMIN/USER
    public function form_mdp(){

        $this->load->database();

        if($this->input->post()){  // si post
             
        // regles de validation des champs      
        $this->form_validation->set_rules('email','Login','required|html_escape|regex_match[/[^\W][a-zA-Z0-9_]+(\.[a-zA-Z0-9_]+)*\@[a-zA-Z0-9_]+(\.[a-zA-Z0-9_]+)*\.[a-zA-Z]{2,4}/]',
            array('required'=>'Champs vide', 'regex_match'=>'Saisie incorrecte'));
        $this->form_validation->set_rules('mdp','mot de passe','required|html_escape|regex_match[/(?=.{8,}$)(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])(?=.*\W).*/]', 
            array('required'=>'Champs vide','regex_match'=>'Saisie incorrecte'));
        
            if($this->form_validation->run() != false){ //si pas d'erreur dans les champs email et mdp
    
                $email = $this->input->post('email');  //valeur champs  email
                $ident = $this->produits_model->mdp($email);    // envoie $email au model mdp
                //recup le mot de passe hash de produits_model de l'enregistrement / function mdp retourne null si login pas présent
                
                if($ident['ident'] != null){ // si le login existe

                    if (password_verify($this->input->post('mdp'),$ident['ident']->ins_mdp)){ //mot de passe verfifé
                        // ouvre une session et set les valeurs pour session
                        $this->session->set_userdata('role', $ident['ident']->ins_role);
                        $this->session->set_userdata('nom', $ident['ident']->ins_nom);
                        $this->session->set_userdata('prenom', $ident['ident']->ins_prenom);
                        $this->session->set_userdata('email', $ident['ident']->ins_login);
                                                      
                        if($ident['ident']->ins_role  == 'admin') {  //load header et liste admin                      
                            redirect("produits/liste"); // redirection liste  

                        }else{ //load header et liste user                                         
                           redirect('produits/liste_user');
                        }
                    
                    }else{ // erreur mot de passe
                        $mess['mess'] = 'problème connexion mdp';
                        $compteur['compteur'] = $this->session->compteur;                       
                        $this->load->view('header_user',$compteur);
                        $this->load->view('form_mdp',$mess);                     
                    }
                }else{ //message erreur le login n'existe pas
                    $mess['mess'] = 'problème connexion login';
                    $compteur['compteur'] = $this->session->compteur;  
                    $this->load->view('header_user',$compteur);
                    $this->load->view('form_mdp',$mess);
                }

            }else{ // form_validation fals
                $compteur['compteur'] = $this->session->compteur;  
                $this->load->view('header_user',$compteur);
                $this->load->view('form_mdp'); 
            }          
       
        }else{ //pas de post 1er affichage de la vue
            $compteur['compteur'] = $this->session->compteur;  
            $this->load->view('header_user',$compteur);
            $this->load->view('form_mdp');  
        }
         
    }

//ENREGISTREMENT
    PUBLIc FUNCTION form_enr(){
        $this ->load->database();

        

        if($this->input->post()){
            //traitement des données
            $this->form_validation->set_rules('ins_nom', 'nom', 'required|html_escape|regex_match[/[A-Z][a-zéèçàäëï]+([\s-][A-Z][a-zéèçàäëï]+)*/]',
                 array('required' => 'Champs vide', 'regex_match' => 'Saisie incorrecte'));
                
            $this->form_validation->set_rules('ins_prenom', 'prenom', 'required|html_escape|regex_match[/[A-Z][a-zéèçàäëï]+([\s-][A-Z][a-zéèçàäëï]+)*/]', 
                array('required' => 'champs vide','regex_match'=>'Saisie incorrecte'));
                
            $this->form_validation->set_rules('ins_adresse', 'adresse', 'required|html_escape',
                 array('required' => 'Champs vide','regex_match'=>'Saisie incorrecte'));
                
            $this->form_validation->set_rules('ins_cp', 'code postal', 'required|html_escape', 
            array('required' => 'Champs vide', 'regex_match' => 'Saisie incorrecte'));
               
            $this->form_validation->set_rules('ins_ville', 'ville', 'required|html_escape', 
                array('required' => 'Champs vide', 'regex_match' => 'Saisie incorrecte'));
               
            $this->form_validation->set_rules('ins_portable', 'Tel mobile', 'required|html_escape|regex_match[/(\+\d+(\s|-))?0\d(\s|-)?(\d{2}(\s|-)?){4}/]', 
                array('required' => 'Champs vide', 'regex_match' => 'Saisie incorrecte'));
                
            $this->form_validation->set_rules('ins_fixe', 'Tel fixe ', 'html_escape|regex_match[/(\+\d+(\s|-))?0\d(\s|-)?(\d{2}(\s|-)?){4}/]', 
            array('regex_match' => 'Saisie incorrecte'));
               
            $this->form_validation->set_rules('ins_login', 'email', 'required|html_escape|is_unique[inscription.ins_login]|regex_match[/[^\W][a-zA-Z0-9_]+(\.[a-zA-Z0-9_]+)*\@[a-zA-Z0-9_]+(\.[a-zA-Z0-9_]+)*\.[a-zA-Z]{2,4}/]',
                 array('required' => 'Champs vide','is_unique'=>'Déjà utilisée','regex_match'=>'saisie incorrecte'));
                
            $this->form_validation->set_rules('ins_mdp', 'nom de passe', 'required|html_escape|regex_match[/(?=.{8,}$)(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])(?=.*\W).*/]', 
                array('required' => 'Champs vide', 'regex_match' => 'saisie incorrecte'));

          

            if ($this->form_validation->run() != false){ //si pas d'erreur dans les champs
                
                $data = $this->input->post(NULL,TRUE);

                $mdp = password_hash($this->input->post('ins_mdp'), PASSWORD_DEFAULT);
                
                $this->produits_model->inscription($data,$mdp);
            
            }else{
                //erreur dans champ form_enr re charge le formulaire
                $compteur['compteur'] = $this->session->compteur;
                $this->load->view('header_user', $compteur);
                $this->load->view('form_enr');
            }

        }else{
            //premier chargement
            $compteur['compteur'] = $this->session->compteur;
            $this->load->view('header_user',$compteur);
            $this->load->view('form_enr');
        }


    }

//DECONNEXION
    public function deconnexion(){
      //  $this->output->enable_profiler(TRUE);
        $this->session->unset_userdata('role');
        $this->session->unset_userdata('nom');
        $this->session->unset_userdata('prenom');
        $this->session->unset_userdata('email');

        if (ini_get("session.use_cookies")) {
            setcookie(session_name(), '', time() - 42000);
        }  

        //$this->session->sess_destroy();
        redirect('produits/liste_user');
    }

// AJOUT PRODUIT AU PANIER   
    public function ajoutePanier() //ajoute un produit au panier
    {
        //appel model données pour tableau/liste_user
        $this->load->model('produits_model');
        $aListe = $this->produits_model->liste();
        $aView["liste_produits"] = $aListe;


        $data = $this->input->post();
        if ($this->input->post('pro_qte') < 0){$data['pro_qte'] = 0;}

        if ($this->session->panier == null){
            // création du panier s'il n'existe pas
            $this->session->panier = array();
            $tab = $this->session->panier;
            //creation ducompteur
            $this->session ->compteur = 0;
            $nb = $this ->session->compteur;
            
            //On ajoute le produit
            array_push($tab, $data); // Empile un ou plusieurs éléments à la fin d'un tableau
            $this->session->panier = $tab; //stock $tab ds la variable session panier premier passage
           
            $nb = 1;                            // premier passage compteur à 1
            $this->session->compteur = $nb  ;   // stock valeur compteur ds variable session compteur à un premier passage
            //prepare pour compteur dans header_user
            $compteur['compteur'] = $this->session->compteur;

            $this->load->view('header_user',$compteur);
            $this->load->view('liste_user', $aView);
        } else //si le panier existe
        {
            $tab = $this->session->panier;      
            $idProduit = $this->input->post('pro_id');
            $sortie = false;
            foreach ($tab as $produit) //on cherche si le produit existe déjà dans le panier
            {
                if ($produit['pro_id'] == $idProduit) {
                    $sortie = true;
                }
            }
            if ($sortie) //si le produit existe déjà, l'utilisateur est averti
            {
                $mess= "*Ce produit est déjà dans le panier*";
                $message['mess'] = $mess;

                $compteur['compteur'] = $this->session->compteur; 

                $this->load->view('header_user',$compteur+$message);
                $this->load->view('liste_user', $aView);
            } else { //sinon le produit est ajouté dans le panier
                array_push($tab, $data);
                //incremente le compteur
                $nb = $this->session->compteur;
                $nb = count($tab);
                $this->session->compteur = $nb;
                $compteur['compteur'] = $this->session->compteur;        //prpare pour compteur dans header_user

                $this->session->panier = $tab;
                $this->load->view('header_user',$compteur);
                $this->load->view('liste_user', $aView);
            }
        }
    }

// QUANTITE PLUS
    public function qteplus($id)
    {
        $tab = $this->session->panier;
        $temp = array();
        for ($i = 0; $i < count($tab); $i++)    //on parcourt le tableau produit après produit
        {
            if ($tab[$i]['pro_id'] !== $id) {   //lie le id trnsmit au id du tableau balayé
                array_push($temp, $tab[$i]);    //met le produit ds un tableau temporaire
            } else {
                $tab[$i]['pro_qte']++;          // incremente la quantité et recharge la vue panier
                array_push($temp, $tab[$i]);    ////met le produit ds un tableau temporaire
            }
        }
        $tab = $temp;                           //associe le tableau avec le tableau temporaire
        unset($temp);                           //supprime le tableau temporaiare
        $this->session->panier = $tab;          //associe la variable session avec le tableau $tab
        $this->affiche();                       //affiche le panier
    }

// QUANTITE MOINS 
    public function qtemoins($id)
    {
        $tab = $this->session->panier;
        $temp = array();
        for ($i = 0; $i < count($tab); $i++)    //on parcourt le tableau produit après produit
        {
            if ($tab[$i]['pro_id'] !== $id) {   //lie le id trnsmit au id du tableau balayé
                array_push($temp, $tab[$i]);    //met le produit ds un tableau temporaire
            } else {
                $tab[$i]['pro_qte']--;         // décrémente la quantité et recharge la vue panier
                if($tab[$i]['pro_qte'] <= 0){   //bloque quantité à zéro si décrémente inférieur ou égal à zéro
                    $tab[$i]['pro_qte'] = 0;
                }
                array_push($temp, $tab[$i]);    //met le produit ds un tableau temporaire
            }
        }
        $tab = $temp;                           //associe le tableau avec le tableau temporaire
        unset($temp);                           //supprime le tableau temporaiare
        $this->session->panier = $tab;          //associe la variable session avec le tableau $tab
        $this->affiche();                       //affiche le panier
    }


// EFFACE PRODUIT
    public function effaceProduit($id)
    {
        $tab = $this->session->panier;
        $temp = array(); //création d'un tableau temporaire vide
        for ($i = 0; $i < count($tab); $i++) //on cherche dans le panier les produits à ne pas supprimer
        {
            if ($tab[$i]['pro_id'] !== $id) {
                array_push($temp, $tab[$i]); // ces produits sont ajoutés dans le tableau temporaire
            }
        }
        $tab = $temp;
        unset($temp);
        $this->session->panier = $tab; // le panier prend la valeur du tableau temporaire et ne contient donc plus le produit à supprimer
        $nb = count($tab);
        $this->session->compteur = $nb;
        $this->affiche();
    }

//AFFICHE PANIER
    public function affiche(){       
        $compteur['compteur'] = $this->session->compteur;  
        $this->load->view('header_user',$compteur);
        $this->load->view('panier');
    }

//EFFACE PANIER
    public function efface(){
        $this->session->compteur = 0;
        $this->session->panier = array();
        $this->affiche();

    }
}    