<!DOCTYPE html>
<html lang="fr">

<head>
	<meta charset="utf-8">
	<title>header.inc</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
	<link rel="stylesheet" href="<?= base_url("/assets/CSS/style.css") ?>">
</head>

<body>
	<nav class="navbar container-fluid sticky-top navbar-expand-lg navbar-dark bg-dark">
		<a class="navbar-brand" href="#">
			<img alt="logo jarditou" title="logo jarditou" src="<?= base_url("/assets/images/img_site/") . "88.png" ?>" width="" height="100" alt="">
		</a>
		<a class="navbar-brand" href="<?= site_url("/produits/liste_user/") ?>">Accueil</a>
		<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#menuprincipal" aria-controls="menuprincipal" aria-expanded="false" aria-label="Toggle navigation">
			<span class="navbar-toggler-icon"></span>
		</button>

		<div class="collapse navbar-collapse" id="menuprincipal">
			<ul class="navbar-nav mr-auto">
				<li class="nav-item active">
					<a class="nav-link"href="#"></a>
				</li>
				<li class=" nav-item active">
					<a class="nav-link" href="<?= site_url("/produits/form_mdp/") ?>">Connexion</a>
				</li>
				</li>
				<li class="nav-item active">
					<a class="nav-link disabled" href="#"></a>
				</li>
			</ul>

			<form class="form-inline my-2 my-lg-0">
				<input class="form-control mr-sm" type="search" placeholder="Rechercher" aria-label="Rechercher">
				<button class="btn btn-outline-success my-2 my-sm-0" type="submit">Rechercher</button>

			</form>
			
		</div>
	</nav>