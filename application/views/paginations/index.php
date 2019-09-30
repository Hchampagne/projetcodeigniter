<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="utf-8">
    <title>Pagination</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link rel="stylesheet" href="#">
</head>

<body>
    <nav class="navbar container-fluid sticky-top navbar-expand-lg navbar-dark bg-dark">
        <a class="navbar-brand" href="#">
            <img alt="logo jarditou" title="logo jarditou" src="<?= base_url("/assets/images/img_site/") . "88.png" ?>" width="" height="100" alt="">
        </a>
        <a class="navbar-brand" href="#">Accueil</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#menuprincipal" aria-controls="menuprincipal" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="menuprincipal">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item active">
                    <a class="nav-link" href="#">Ajout produits</a>
                </li>
                <li class=" nav-item active">
                    <a class="nav-link" href="#"></a>
                </li>
                </li>
                <li class="nav-item active">
                    <a class="nav-link disabled" href="#">Déconnexion</a>
                </li>
            </ul>

            <form class="form-inline my-2 my-lg-0">
                <input class="form-control mr-sm" type="search" placeholder="Rechercher" aria-label="Rechercher">
                <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Rechercher</button>
            </form>

        </div>
    </nav>
    <div class="container">
        <h3 class="title is-3">CodeIgniter Database Pagination</h3>
        <div class="column">
            <p> <?= $links ?></P>
            <table class="table is-bordered is-striped is-narrow is-hoverable is-fullwidth">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Référence</th>
                        <th>Libellé</th>
                        <th>Description</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($pagination as $key) : ?>
                        <tr>
                            <td><?= $key->pro_id ?></td>
                            <td><?= $key->pro_ref ?></td>
                            <td><?= $key->pro_libelle ?></td>
                            <td><?= $key->pro_description ?></td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>          
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
    <script src="#"></script>
</body>

</html>