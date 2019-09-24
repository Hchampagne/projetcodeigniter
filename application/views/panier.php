<h1>Mon panier</h1>
<?php
if ($this->session->panier != null) {
    ?>
    <div class="row">
        <div class="col">
            <table>
                <thead>
                    <tr>
                        <th>Produit</th>
                        <th>Prix</th>
                        <th>Quantité</th>
                        <th>Prix total</th>
                        <th>&nbsp;</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        $total = 0;
                        foreach ($this->session->panier as $produit) {
                            ?>
                        <tr>
                            <td><?= $produit['pro_libelle']; ?></td>
                            <td><?= str_replace('.', ',', $produit['pro_prix']); ?> <sup>€</sup></td>
                            <td>
                                <div class="panier_qte">
                                    <div class="panier_qte_valeur">
                                        <a href="<?= site_url('produits/qtemoins/' . $produit['pro_id']); ?>" type="button" role="button"> - </a>
                                        <?= $produit['pro_qte'] ?>
                                        <a href="<?= site_url('produits/qteplus/' . $produit['pro_id']); ?>" type="button" role="button">+</a>
                                    </div>
                                </div>
                            </td>
                            <td><?= str_replace('.', ',', ($produit['pro_qte'] * $produit['pro_prix'])); ?> <sup>€</sup></td>
                            <td>
                                   <?php
                                        $total += $produit['pro_qte'] * $produit['pro_prix']; ?>
                                <a href="<?= site_url('produits/effaceProduit/' . $produit['pro_id']); ?>">Suppimer</a>
                            </td>
                        </tr>
                    <?php
                        }
                        ?>
                </tbody>
            </table>
        </div>
        <div>
            <div>
                <h3>Récapitulatif</h3>
                <div>
                    <h5>TOTAL : <?= str_replace('.', ',', $total); ?> <sup>€</sup></h5>
                    <a href="<?= site_url("/produits/efface/"); ?>">Supprimer le panier</a> -
                    <a href="<?= site_url("/produits/liste_user/"); ?>">Retour boutique</a>
                </div>
            </div>
        </div>
    </div>
<?php
} else {
    ?>
    <div class="alert alert-danger">Votre panier est vide. Pour le remplir, vous pouvez visiter notre <a href="<?= site_url("produits/liste_user"); ?>">boutique</a>.</div>
<?php
}
?>

<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
</body>

</html>