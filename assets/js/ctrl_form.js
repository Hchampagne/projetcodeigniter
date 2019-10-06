
$(document).ready(function () {                       // initialise JQUERY au chargement du document


  // CRUD  
    //REGEX
   var regLibelle = /^[\ \/_ \-A-Za-z0-9êéèçàäëï]*$/
   var regRef = /^[\ \/_ \-A-Za-z0-9êéèçàäëï]*$/
   var regPrix = /^[0-9]{1,6}(.[0-9]{2})$/
   var regStock = /^[0-9]{1,11}$/
   var regCouleur = /^[\ \/_ \-A-Za-z0-9êéèçàäëï]*$/
   var regDescrip = /^[^<>\/]+[\w\W]{1,999}$/

    // champ pro_ref  
    $('#pro_ref').blur(function () {
        if ($('#pro_ref').val() == '') {
            $('#alertRef').text("Le champs n'est pas rempli");          
        } else if (regRef.test($('#pro_ref').val()) == false) {
            $('#alertRef').text("saisie incorrecte");                     
        } else if($('#pro_ref').val().length > 10){
            $('#alertRef').text("trop long")
       }
        else {               
            $('#alertRef').html('&nbsp');   
            }
     });

    // champ pro_libelle 
    $('#pro_libelle').blur(function () {
        if ($('#pro_libelle').val() == '') {
            $('#alertLibelle').text("Le champs n'est pas rempli");
        } else if (regLibelle.test($('#pro_libelle').val()) == false) {
            $('#alertLibelle').text("saisie incorrecte");
        } else if ($('#pro_libelle').val().length > 200) {
            $('#alertLibelle').text("trop long")
        } else {
            $('#alertLibelle').html('&nbsp');
        }
    });

     // champ pro_prix 
     $('#pro_prix').blur(function () {
         if ($('#pro_prix').val() == '') {
             $('#alertPrix').text("Le champs n'est pas rempli");
         } else if (regPrix.test($('#pro_prix').val()) == false) {
             $('#alertPrix').text("saisie incorrecte");
         } else if ($('#pro_prix').val().length > 9) {
             $('#alertPrix').text("trop long")
         } else {
             $('#alertPrix').html('&nbsp');
         }
     });

      // champ pro_stock
      $('#pro_stock').blur(function () {
          if ($('#pro_stock').val() == '') {
              $('#alertStock').text("Le champs n'est pas rempli");
          } else if (regStock.test($('#pro_stock').val()) == false) {
              $('#alertStock').text("saisie incorrecte");
          } else if ($('#pro_stock').val().length > 11) {
              $('#alertStock').text("trop long")
          } else {
              $('#alertStock').html('&nbsp');
          }
      });

     // champ pro_couleur
     $('#pro_couleur').blur(function () {
         if ($('#pro_couleur').val() == '') {
             $('#alertCouleur').text("Le champs n'est pas rempli");
         } else if (regCouleur.test($('#pro_couleur').val()) == false) {
             $('#alertCouleur').text("saisie incorrecte");
         } else if ($('#pro_couleur').val().length > 30) {
             $('#alertCouleur').text("trop long")
         } else {
             $('#alertCouleur').html('&nbsp');
         }
     });

      // champ pro_description
      $('#pro_descrip').blur(function () {
          if ($('#pro_descrip').val() == '') {
              $('#alertDescrip').text("Le champs n'est pas rempli");
          } else if (regDescrip.test($('#pro_descrip').val()) == false) {
              $('#alertDescrip').text("saisie incorrecte");
          } else if ($('#pro_descrip').val().length > 999) {
              $('#alertDescrip').text("trop long")
          } else {
              $('#alertDescrip').html('&nbsp');
          }
      });

//CONNEXION / ENREGITREMENT

//REGEX
var regNom = /^[A-Z][a-zéèçàäëï]+([\s-][A-Z][a-zéèçàäëï]+)*$/;
var regPrenom = /^[A-Z][a-zéèçàäëï]+([\s-][A-Z][a-zéèçàäëï]+)*$/;
var regAdresse = /^([1-9]|([1-9][0-9])|([1-9][0-9][0-9]))*\s[A-Za-zéèçàäëï]+(\s[A-Za-zéèçàäëï]+)*(\s[A-Za-zéèçàäëï]+)*$/;
var regCp = /^(([0][1-9])|([1-9][0-9]))[0-9]{3}$/;
var regVille = /^[A-Z][a-zéèçàäëï]+([\s-][A-Za-zéèçàäëï]+)*([\s-][A-Za-zéèçàäëï]+)*([\s-A-Za-zéèçàäëï]+)*$/;
var regTel = /^(\+\d+(\s|-))?0\d(\s|-)?(\d{2}(\s|-)?){4}$/;
var regMail = /^[^\W][a-zA-Z0-9_]+(\.[a-zA-Z0-9_]+)*\@[a-zA-Z0-9_]+(\.[a-zA-Z0-9_]+)*\.[a-zA-Z]{2,4}$/;
var regMdp = /^(?=.{8,}$)(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])(?=.*\W).*$/;

//FORMULAIRE CONNEXION
// champ email  
$('#email').blur(function () {
    if ($('#email').val() == '') {
        $('#alertEmail').text("Le champs n'est pas rempli");
    } else if (regMail.test($('#email').val()) == false) {
        $('#alertEmail').text("La saisie est incorrecte");
    } else {
        $('#alertEmail').html('&nbsp');
    }
});

// champ mot de passe
$('#mdp').blur(function () {
    if ($('#mdp').val() == '') {
        $('#alertMdp').text("Le champs n'est pas rempli");
    } else if (regMdp.test($('#mdp').val()) == false) {
        $('#alertMdp').text("La saisie est incorrecte");
    } else {
        $('#alertMdp').html('&nbsp');
    }
});


//FORMULAIRE ENREGISTREMENT
//champ nom                                                                                                                         
$('#ins_nom').blur(function () {
    if ($('#ins_nom').val() == '') {
        $('#alertNom').text("Le champs est vide");
    } else if (regNom.test($('#ins_nom').val()) == false) {
        $('#alertNom').text("La saisie est incorrecte");
    } else {
        $('#alertNom').text("");
    }
});

//champ prenom   
$('#ins_prenom').blur(function () {
    if ($('#ins_prenom').val() == '') {
        $('#alertPrenom').text("Le champs est vide");
    } else if (regPrenom.test($('#ins_prenom').val()) == false) {
        $('#alertPrenom').text("La sasie est incorrecte");
    } else {
        $('#alertPrenom').text("");
    }
});

//champ adresse  
$('#ins_adresse').blur(function () {
    if ($('#ins_adresse').val() == '') {
        $('#alertAdresse').text("Le champs est vide");
    } else if (regAdresse.test($('#ins_adresse').val()) == false) {
        $('#alertAdresse').text("La sasie est incorrecte");
    } else {
        $('#alertAdresse').text("");
    }
});

//champ code postal 
$('#ins_cp').blur(function () {
    if ($('#ins_cp').val() == '') {
        $('#alertCp').text("Le champs est vide");
    } else if (regCp.test($('#ins_cp').val()) == false) {
        $('#alertCp').text("La sasie est incorrecte");
    } else {
        $('#alertCp').text("");
    }
});

//champ ville 
$('#ins_ville').blur(function () {
    if ($('#ins_ville').val() == '') {
        $('#alertVille').text("Le champs est vide");
    } else if (regVille.test($('#ins_ville').val()) == false) {
        $('#alertVille').text("La sasie est incorrecte");
    } else {
        $('#alertVille').text("");
    }
});

//champ tel mobile
$('#ins_portable').blur(function () {
    if ($('#ins_portable').val() == '') {
        $('#alertPortable').text("Le champs est vide");
    } else if (regTel.test($('#ins_portable').val()) == false) {
        $('#alertPortable').text("La sasie est incorrecte");
    } else {
        $('#alertPortable').text("");
    }
}); 


//champ tel fixe
$('#ins_Fixe').blur(function () {
     if (regTel.test($('#ins_Fixe').val()) == false) {
        $('#alertFixe').text("La sasie est incorrecte");
    } else {
        $('#alertFixe').text("");
    }
});

// champ email  
$('#ins_login').blur(function () {
    if ($('#ins_login').val() == '') {
        $('#alertLogin').text("Le champs est vide");
    } else if (regMail.test($('#ins_login').val()) == false) {
        $('#alertLogin').text("La saisie est incorrecte");
    } else {
        $('#alertLogin').text("");

    }
});

 //controle doublons email (ajax)
 $('#ins_login').change(function () {
     $.post({
         url: base_site("Produits/doublons"),
         data: {
             verifRef: $("#ins_login").val()
         },
         success: function (data) {
             if (data == 1) {
                 $("#alertLogin").text("dèjà utilisée");
             } else {
                 $("#alertLogin").text("");
             }
         }
     });
 });

// champ mot de passe 
$('#ins_mdp').blur(function () {
    if ($('#ins_mdp').val() == '') {
        $('#alertMdp').text("Le champs n'est pas rempli");
    } else if (regMdp.test($('#ins_mdp').val()) == false) {
        $('#alertMdp').text("La saisie est incorrecte");
    }     
    else {
        $('#alertMdp').text("");
    }
});

// champ verif mot de passe 
$('#mdpVerif').blur(function () {
    if ($('#ins_mdp').val() != $('#mdpVerif').val()) {
        $('#alertmdpVerif').text("Vérification du mot de passe incorrecte")
    } else {
        $('#alertmdpVerif').text("");

    }
});
});


