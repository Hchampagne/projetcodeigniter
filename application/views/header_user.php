<!DOCTYPE html>
<html lang="fr">

<head>
	<meta charset="utf-8">
	<title>header.U</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
	<link rel="stylesheet" href="<?= base_url("/assets/CSS/style.css") ?>">
</head>

<body>
	<nav class="navbar container-fluid sticky-top navbar-expand-lg navbar-dark bg-dark">

		<a class="navbar-brand" href="#">
			<img alt="logo" title="logo" src="<?= base_url("/assets/images/img_site/") . "logo.png" ?>" width="" height="100" alt="">
		</a>
		<a class="navbar-brand" href="<?= site_url("/Produits/index/") ?>">Accueil</a>
		<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#menuprincipal" aria-controls="menuprincipal" aria-expanded="false" aria-label="Toggle navigation">
			<span class="navbar-toggler-icon"></span>
		</button>
		<div class="collapse navbar-collapse" id="menuprincipal">
			<ul class="navbar-nav mr-auto">
				<li class="nav-item active">
					<a class="nav-link" href="<?= site_url("/Produits/liste_user/") ?>">Boutique</a>
				</li>
				</li>
				<li class=" nav-item active">
					<a <?= isset($hide) ? $hide : ''; ?> class="nav-link active" href="<?= site_url("/Produits/form_mdp/") ?>">Connexion</a>
				</li>
				<li>
					<a <?= isset($hide) ? $hide : ''; ?> class="nav-link active " href="<?= site_url("/Produits/form_enr/") ?>">S'enregistrer</a>
				</li>
				<li class="nav-item active">
					<a <?= isset($hide) ? '' : 'hidden'; ?> class="nav-link active" href="<?= site_url("/Produits/deconnexion/") ?>">Déconnexion</a>
				</li>

			</ul>

		</div>
		<div>
			<span class="panier">&nbsp<?= isset($mess) ? $mess : "" ?></span>
			<div class="position -right">
				<a class="navbar-brand" href="<?= site_url("/Produits/affiche/") ?>">
					<img class="" alt="" title="" src="<?= base_url("/assets/images/img_site/") . "panier.png" ?>" width="" height="35" alt="">
				</a>
				<span class="panier">&nbsp<?= isset($compteur) ? $compteur . " article(s)" : "0 article(s)" ?></span>
			</div>
			<p class="white">&nbsp <?= isset($mess1) ? $mess1 : "" ?></p>
		</div>


	</nav>