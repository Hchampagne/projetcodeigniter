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
                            <td style="width: 80px; height: 80px;">
                                <?= form_open('produits/ajoutePanier/', 'name="formulaire" id="formulaire"'); ?>
                                <input class="form-control" name="pro_qte" id="pro_qte" value="1">
                                <input type="hidden" name="pro_prix" value="<?= $row->pro_prix ?>">
                                <input type="hidden" name="pro_id" value="<?= $row->pro_id ?>">
                                <input type="hidden" name="pro_libelle" value="<?= $row->pro_libelle ?>">
                                <div class="form-group">
                                    <input class="btn btn-default btn-sm" type="submit" value="Ajouter">
                                </div>
                                </form>
                            </td>
                            <td class="align-middle">
                                <img class="img-responsive" style="width: 80px; height: 80px;" src="<?= base_url("assets/images/") . $row->pro_id . '.' . $row->pro_photo ?>" alt="" title="<?= $row->pro_libelle ?>">
                            </td>
                            <td class="align-middle"><?= $row->pro_ref ?></td>
                            <td class="align-middle"><?= $row->pro_libelle ?></td>
                            <td class="align-middle"><?= $row->pro_prix ?></td>
                            <td class="align-middle"><?= $row->pro_stock ?></td>
                            <td class="align-middle"><?= $row->pro_couleur ?></td>
                            <td class="align-middle">
                                <a class="btn btn-outline-primary btn-sm" role="button" href="<?= site_url("produits/vue/" . $row->pro_id); ?>" title="">Détail</a>
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


<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
</body>

</html>