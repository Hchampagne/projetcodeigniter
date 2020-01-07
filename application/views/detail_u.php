


<body>
	<div class="container">
		<p>
			<h3>Formulaire détail</h3>
		</p>

		<form>

			<div class="row">
				<div class="col-md-1">
					<div class=" form-group">
						<label for='pro_id'>ID</label>
						<input class=form-control type="txt" name="pro_id" value="<?= $produit->pro_id; ?>" disabled>
						<input type="hidden" name='pro_id' value='<?php echo $produit->pro_id; ?>'>
					</div>
				</div>

				<div class="col-md-4">
					<div class="form-group">
						<label for='pro_cat_id'>Catégorie</label>
						<input class=form-control type="txt" name="pro_cat_id" value="<?= $categorie->cat_id . " - " . $categorie->cat_nom ?>" disabled>
					</div>
				</div>

				<div class="col-md-3">
					<div class="form-group">
						<label for='pro_ref'>Référence</label>
						<input class=form-control type="txt" name="pro_ref" value="<?= $produit->pro_ref; ?>" disabled>
					</div>
				</div>

				<div class="col-md-4">
					<div class="form-group">
						<label for='pro_libelle'>Libellé</label>
						<input class=form-control type="txt" name="pro_libelle" value="<?= $produit->pro_libelle; ?>" disabled>
					</div>
				</div>
			</div>

			<div class="row">
				<div class="col-md-3">
					<div class="form-group">
						<label for='pro_prix'>Prix</label>
						<input class=form-control type="txt" name="pro_prix" value="<?= $produit->pro_prix; ?>" disabled>
					</div>
				</div>

				<div class="col-md-3">
					<div class="form-group">
						<label for='pro_stock'>Stock</label>
						<input class=form-control type="txt" name="pro_stock" value="<?= $produit->pro_stock; ?>" disabled>
					</div>
				</div>



				<div class="col-md-3">
					<div class="form-group">
						<label for='pro_couleur'>Couleur</label>
						<input class=form-control type="txt" name="pro_couleur" value="<?= $produit->pro_couleur; ?>" disabled>
					</div>
				</div>

				<div class="col-md-3">
					<div class="form-group">
						<label for='pro_bloque'>Produit bloqué</label>
						<input class=form-control type="txt" name="pro_bloque" value="<?= $produit->pro_bloque == 1 ? 'oui' : 'non' ?>" disabled>
					</div>
				</div>
			</div>

			<div class="row">
				<div class="col-md-6">
					<div class="form-group">
						<label for='pro_d_ajout'>Date d'ajout</label>
						<input class=form-control type="txt" name="pro_d_ajout" value="<?php echo date("d/m/Y", strtotime($produit->pro_d_ajout)); ?>" disabled>
					</div>
				</div>

				<div class="col-md-6">
					<div class="form-group">
						<label for='pro_d_modif'>Date de modification</label>
						<input class=form-control type="txt" name="pro_d_modif" value="<?=$produit->pro_d_modif != 0 ? date("d/m/Y H:i:s", strtotime($produit->pro_d_modif)) : ""; ?>" disabled>
					</div>
				</div>

			</div>

			<div class="row">
				<div class="col-md-5">
					<label>Photo</label>
					<div class="container-fluid">
						<img src="<?= base_url("assets/images/") . $produit->pro_id . "." . $produit->pro_photo ?>" class="img-responsive" height="230" width="230">
					</div>
				</div>

				<div class="col-md-7">
					<div class="form-group">
						<label for='pro_description'>Description</label>
						<textarea class=form-control type="input" name="pro_description" rows="10" cols="25" value="" disabled><?php echo $produit->pro_description; ?></textarea>
					</div>
				</div>
			</div>

		</form>
		<!--<nav class="nav">
			<a class="navbar-brand" href="<?= site_url("produits/liste/") ?>">RETOUR</a>
		</nav> -->

		<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
		<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>

		<script type="text/javascript"> </script>
</body>

</html>