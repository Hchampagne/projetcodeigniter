<h1>Mon panier</h1>		
<?php 	
if ($this->session->panier!=null) 	
{ 	
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
        // ici le code pour récupérer les produits et les incrémenter ...	
        ?>	
        </tbody>	
    </table>	
    </div>	
    <div>	
            <div>	
            <h3>Récapitulatif</h3>	
            <div>	
                <h5>TOTAL : <?= str_replace('.',',',$total); ?> <sup>€</sup></h5>	
                <a href="<?= site_url("produits/efface"); ?>" >Supprimer le panier</a> - 	
                <a href="<?= site_url("produits/catalogue"); ?>">Retour boutique</a>	
            </div>	
        </div>	
    </div>	
    </div>	
    <?php 	
    } 	
    else 	
    { 	
    ?>	
    <div class="alert alert-danger">Votre panier est vide. Pour le remplir, vous pouvez visiter notre <a href="<?= site_url("produits/catalogue"); ?>">boutique</a>.</div>	
<?php 	
} 	
?>   