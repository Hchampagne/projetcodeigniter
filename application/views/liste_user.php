<div class="container">

    <div class="row text-center">
        <div class="col table-responsive">
            <table class="table ">

                <thead class="thead-light">
                    <tr>
                        <!--    <th class="align-middle tab">Panier</th>
                        <th class="align-middle">Photo</th>
                        <th class="align-middle">Référence</th>
                        <th class="align-middle">Libellé</th>
                        <th class="align-middle">Prix</th>
                        <th class="align-middle">Stock</th>
                        <th class="align-middle">Couleur</th>
                        <th class="align-middle">Action</th> -->
                    </tr>
                </thead>
                <tbody>
                    <?php
                    foreach ($pagination as $row) {
                        ?>
                        <tr>
                            <td class="align-middle" style="width: 120px; height: 80px;">
                                <?= form_open('produits/ajoutePanier/', 'name="formulaire" id="formulaire"'); ?>

                                <input type="hidden" name="pro_prix" value="<?= $row->pro_prix ?>">
                                <input type="hidden" name="pro_id" value="<?= $row->pro_id ?>">
                                <input type="hidden" name="pro_libelle" value="<?= $row->pro_libelle ?>">
                                <div class="form-group input-group input-group-sm">
                                    <input class="form-control" name="pro_qte" id="pro_qte" aria-describedby="addon" value="1">
                                    <div class="input-group-append">
                                        <button class="btn btn-outline-success btn-sm" type="submit" id="addon" value="Ajouter">Ajout</button>
                                    </div>
                                </div>
                                </form>
                            </td>
                            <td class="align-middle" style="width: 80px; height: 80px;">
                                <img class="img-responsive" style="width: 80px; height: 80px;" src="<?= base_url("assets/images/") . $row->pro_id . '.' . $row->pro_photo ?>" alt="" title="<?= $row->pro_libelle ?>">
                            </td>
                            <td class="align-middle"><?= $row->pro_ref ?></td>
                            <td class="align-middle"><?= $row->pro_libelle ?></td>
                            <td class="align-middle"><?= $row->pro_prix ?></td>
                            <td class="align-middle"><?= $row->pro_stock ?></td>
                            <td class="align-middle"><?= $row->pro_couleur ?></td>
                            <td class="align-middle">
                                <a class="btn btn-outline-primary btn-sm" role="button" href="<?= site_url("produits/vue/") . $row->pro_id; ?>" title="">Détail</a>
                            </td>
                        </tr>
                    <?php
                    }
                    ?>
                </tbody>
            </table>
            <p><?= $links ?></p>
        </div>
    </div>
</div>


