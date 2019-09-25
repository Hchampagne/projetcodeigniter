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
			<img alt="logo jarditou" title="logo jarditou" src="<?= base_url("/assets/images/img_site/") . "88.png" ?>" width="" height="100" alt="">
		</a>
		<a class="navbar-brand" href="">Accueil</a>
		<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#menuprincipal" aria-controls="menuprincipal" aria-expanded="false" aria-label="Toggle navigation">
			<span class="navbar-toggler-icon"></span>
		</button>
		<div class="collapse navbar-collapse" id="menuprincipal">
			<ul class="navbar-nav mr-auto">
				<li class="nav-item active">
					<a class="nav-link" href="<?= site_url("/produits/liste_user/") ?>">Boutique</a>
				</li>
				<li class=" nav-item active">
					<a class="nav-link" href="#"></a>
				</li>
				</li>
				<li class=" nav-item active">
					<a class="nav-link" href="<?= site_url("/produits/form_mdp/") ?>">Connexion</a>
				</li>
				<li class="nav-item active">
				<li class="nav-item active">
					<a class="nav-link disabled" href="#"></a>
				</li>
				<li>
					<a class="nav-link active " href="<?= site_url("/produits/form_enr/") ?>">S'enregistrer</a>
				</li>
				<li class="nav-item active">
				<a class="nav-link disabled" href="#"></a>
				</li>
				<li class="nav-item active">
				<a class="nav-link active panier" href="#"><?= isset($mess) ? $mess : "" ?></a>
				</li>
			</ul>



			<a class="navbar-brand" href="<?= site_url("/produits/affiche/") ?>">
				<div>
					<img class="postition-fixed" alt="" title="" src="<?= base_url("/assets/images/img_site/") . "panier.png" ?>" width="" height="50" alt="">
					<span class="panier">&nbsp<?= isset($compteur) ? $compteur . " article(s)" : "0 article" ?></span>
				</div>
			</a>
		</div>
	</nav>