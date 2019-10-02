<div class="container">
    <p>
        <h3>Formulaire d'ajout</h3>
    </p>
    <?= form_open('produits/ajout/', 'name="formulaire" id="formulaire" enctype="multipart/form-data"'); ?>

    <div class="row">
        <div class="col-md-4">
            <Div class=form-group>
                <label for="pro_cat_id">Catégorie</label>
                <select class="form-control" name="pro_cat_id">
                    <?php
                    foreach ($liste_categorie as $categorie) {              //balayage du tableau                              
                        ?>
                        <option value="<?= $categorie->cat_id ?>"><?= $categorie->cat_nom ?></option>
                    <?php
                    }
                    ?>
                </select>
                <span>&nbsp</span>
            </div>
        </div>
        <div class="col-md-4">

            <div class="form-group">
                <label for="pro_ref">Référence produit</label>
                <input class="form-control" type="text" name="pro_ref" id="pro_ref" class="pro_ref" value="<?= set_value('pro_ref'); ?>">
                <span id="alertRef" class="alert">&nbsp<?= form_error('pro_ref', '<span>', '</span>') ?></span>
            </div>
        </div>

        <div class="col-md-4">

            <div class="form-group">
                <label for="pro_libelle">Nom du produit</label>
                <input class="form-control" type="text" name="pro_libelle" id="pro_libelle" value="<?= set_value('pro_libelle'); ?>">
                <span id="alertLibelle" class="alert">&nbsp <?= form_error('pro_libelle', '<span>', '</span>') ?></span>
            </div>
        </div>
    </div>
    <div class="row center">
        <div class="col-md-4">
            <div class="form-group">
                <label for="pro_prix">Prix</label>
                <input class="form-control" type="text" name="pro_prix" id="pro_prix" value="<?= set_value('pro_prix'); ?>">
                <span id=alertPrix class="alert">&nbsp <?= form_error('pro_prix', '<span>', '</span>') ?></span>
            </div>
        </div>
        <div class="col-md-4">
            <div class="form-group">
                <label for="pro_stock">Stock</label>
                <input class="form-control" type="text" name="pro_stock" id="pro_stock" value="<?= set_value('pro_stock'); ?>">
                <span id="alertStock" class="alert">&nbsp<?= form_error('pro_stock', '<span>', '</span>') ?> </span>
            </div>
        </div>
        <div class="col-md-4">
            <div class="form-group">
                <label for="pro_couleur">Couleur</label>
                <input class="form-control" type="text" name="pro_couleur" id="pro_couleur" value="<?= set_value('pro_couleur'); ?>">
                <span id="alertCouleur" class="alert">&nbsp <?= form_error('pro_couleur', '<span>', '</span>') ?></span>
            </div>
        </div>
    </div>

    <div class="form-group">
        <p>Produit bloqué :
            <label for="pro_bloque">oui</label>
            <input type="radio" name="pro_bloque" value="1">
            <label for="pro_bloque">non</label>
            <input type="radio" name="pro_bloque" value="0" checked="checked">
        </p>
        <span>&nbsp</span>
    </div>

    <div class="row">
        <div class="col-md-5">
            <div class="form-group">
                <label class="control-label" for="file">Fichier photo</label>
                <input class="file-style" type="file" name="fichier" id="fichier">
                <p class="alert" id="alertFichier" class="alert">&nbsp<?= isset($errors) ? $errors : '' ?></p>

                <div>
                </div>
            </div>
        </div>
        <div class="col-md-7">
            <div class="form-group">
                <label for="pro_descrip">Description</label>
                <textarea class="form-control" name="pro_description" rows="10" cols="50" id="pro_descrip" value=""><?= set_value('pro_description') ?></textarea>
                <span id="alertDescrip" class="alert">&nbsp<?= form_error('pro_description', '<span>', '</span>') ?></span>
            </div>
        </div>
    </div>


    <div clas="form-group">
        <button type="submit" name="" value="">Ajouter</button>
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