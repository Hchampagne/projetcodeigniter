

    <div class="container">
        <p>
            <h3>Formulaire de modification</h3>
        </p>
        <!--<form name="formulaire" action="#" method="post" id="formulaire" enctype="multipart/form-data"> -->
        <?= form_open('produits/modif/' . $produit->pro_id, 'name="formulaire" id="formulaire" enctype="multipart/form-data"'); ?>

        <div class="row">
            <div class="col-md-1">
                <div class=" form-group">
                    <label for='gpro_id'>Id</label>
                    <input class="form-control" type="txt" name="gpro_id" value="<?= $produit->pro_id ?>" disabled>
                    <input type="hidden" name="pro_id" value="<?= $produit->pro_id ?>">
                </div>
            </div>



            <div class="col-md-4">
                <Div class=form-group>
                    <label for=pro_cat_id>Catégorie</label>
                    <select class='form-control' name='pro_cat_id'>
                        <option selected="<?= $categorie->cat_id ?>" value="<?= $categorie->cat_id ?>"><?= $categorie->cat_nom ?></option>
                        <?php

                        foreach ($liste_categorie as $l_categorie) {              //balayage du tableau                       
                            ?>
                            <option value="<?= $l_categorie->cat_id ?>"><?= $l_categorie->cat_nom ?></option>
                        <?php
                        }
                        ?>


                    </select>
                    <span>&nbsp</span>
                </div>
            </div>

            <div class="col-md-4">
                <div class="form-group">
                    <label for=pro_ref>Référence produit</label>
                    <input class="form-control" type='text' name='pro_ref' id="pro_ref" value="<?= $produit->pro_ref; ?>">
                    <span id="alertRef">&nbsp<?= form_error('pro_ref', '<span>', '</span>') ?></span>
                </div>
            </div>
            <div class="col-md-3">

                <div class="form-group">
                    <label for=pro_libelle>Nom du produit</label>
                    <input class="form-control" type='text' name='pro_libelle' id="pro_libelle" value="<?= $produit->pro_libelle; ?>">
                    <span id="alertLibelle">&nbsp<?= form_error('pro_libelle', '<span>', '</span>') ?></span>
                </div>
            </div>
        </div>
        <div class="row center">
            <div class="col-md-4">
                <div class="form-group">
                    <label for=pro_prix>Prix</label>
                    <input class="form-control" type='text' name='pro_prix' id="pro_prix" value="<?= $produit->pro_prix; ?>">
                    <span id="alertPrix">&nbsp<?= form_error('pro_prix', '<span>', '</span>') ?></span>
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group">
                    <label for=pro_stock>Stock</label>
                    <input class="form-control" type='text' name='pro_stock' id="pro_stock" value="<?= $produit->pro_stock; ?>">
                    <span id="alertStock">&nbsp<?= form_error('pro_stock', '<span>', '</span>') ?></span>
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group">
                    <label for=pro_couleur>Couleur</label>
                    <input class="form-control" type='text' name='pro_couleur' id="pro_couleur" value="<?= $produit->pro_couleur; ?>">
                    <span id="alertCouleur">&nbsp<?= form_error('pro_couleur', '<span>', '</span>') ?></span>
                </div>
            </div>
        </div>

        <div class="form-group">
            <p>Produit bloqué :
                <label for="pro_bloque">oui</label>
                <input type="radio" name="pro_bloque" value='1' <?= $produit->pro_bloque == 1 ? 'checked="checked"' : ""; ?>>
                <label for="pro_bloque">non</label>
                <input type="radio" name="pro_bloque" value='0' <?= $produit->pro_bloque == 0 ? 'checked="checked"' : "";  ?>>

            </p>
            <span>&nbsp</span>
        </div>
        <div class="row">
            <div class="col-md-5">
                <div class="form-group">
                    <label class='control-label' for="file">Fichier photo</label>
                    <input class='file-style' type='file' name='fichier'>
                    <p class="span">&nbsp<?= isset($errors) ? $errors : '' ?></p>
                </div>
                <div>
                    <img src="<?= base_url("assets/images/") . $produit->pro_id . "." . $produit->pro_photo ?>" class="img-responsive" height="230" width="230">
                </div>
            </div>
            <div class="col-md-7">
                <div class="form-group">
                    <label for=pro_descrip>Description</label>
                    <textarea class="form-control" id="pro_descrip" name="pro_description" rows="10" cols="50" value=""><?= $produit->pro_description; ?></textarea>
                    <span id="alertDescrip">&nbsp<?= form_error('pro_description', '<span>', '</span>') ?></span>
                </div>
            </div>
        </div>


        <div clas="form-group">
            <button type="submit" name="" value="">Modifier</button>
            <!-- <button type="submit" name="effacer" value="effacer">Effacer</button> -->
            <button><a class="button" href="<?= site_url("produits/liste/") ?>" value="Retour">Retour</a></button>
        </div>

        </form>
    </div>

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
    <script src="<?= base_url("/assets/js/ctrl_form.js") ?>"></script>
</body>

</html