<div class="container">
    <h2 class="text-center text-uppercase" id="title">créer un compte</h2>
    <hr>
    <div class="row">
        <!-- colonnes vides -->
        <div class="col-md-3">
        </div>
        <!-- formulaire connection -->
        <div class="col-md-6">
            <form role="form" method="post" action="">
                <fieldset class="fond">
                    <p class="text-uppercase">compte</p>

                    <div class="row">
                        <div class="col-md-7">
                            <!-- champ nom -->
                            <div class='form-group '>
                                <input class='form-control form-control-md' name="ins_nom" type="text" id="ins_nom" placeholder="nom" value="">
                                <span id="alertNom" class="alert">&nbsp<?= form_error('ins_nom', '<span>', '</span>') ?></span>
                            </div>
                        </div>
                        <div class="col-md-5">
                            <!-- champ prenom -->
                            <div class='form-group '>
                                <input class='form-control form-control-md' name="ins_prenom" type="text" id="ins_prenom" placeholder="prenom" value="">
                                <span id="alertPrenom" class="alert">&nbsp<?= form_error('ins_prenom', '<span>', '</span>') ?></span>
                            </div>
                        </div>
                    </div>
                    <!-- champ adresse -->
                    <div class='form-group '>
                        <input class='form-control form-control-md' name="ins_adresse" type="text" id="ins_adresse" placeholder="adresse" value="">
                        <span id="alertAdresse" class="alert">&nbsp<?= form_error('ins_adresse', '<span>', '</span>') ?></span>
                    </div>
                    <div class="row">
                        <!-- code postal -->
                        <div class="col-md-4">
                            <div class='form-group'>
                                <input class='form-control form-control-md' name="ins_cp" type="text" id="ins_cp" placeholder="code postal" value="">
                                <span id="alertCp" class="alert">&nbsp<?= form_error('ins_cp', '<span>', '</span>') ?></span>
                            </div>
                        </div>
                        <!-- ville-->
                        <div class="col-md-8">
                            <div class='form-group'>
                                <input class='form-control form-control-md' name="ins_ville" type="text" id="ins_ville" placeholder="ville" value="">
                                <span id="alertCp" class="alert">&nbsp<?= form_error('ins_ville', '<span>', '</span>') ?></span>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <!-- tel portable -->
                        <div class="col-md-6">
                            <div class='form-group'>
                                <input class='form-control form-control-md' name="ins_portable" type="text" id="ins_portable" placeholder="téléphone portable" value="">
                                <span id="alertPortable" class="alert">&nbsp<?= form_error('ins_portable', '<span>', '</span>') ?></span>
                            </div>
                        </div>
                        <!-- tel fixe-->
                        <div class="col-md-6">
                            <div class='form-group'>
                                <input class='form-control form-control-md' name="ins_fixe" type="text" id="ins_fixe" placeholder="téléphone fixe" value="">
                                <span id="alertFixe" class="alert">&nbsp<?= form_error('ins_fixe', '<span>', '</span>') ?></span>
                            </div>
                        </div>
                    </div>
                    <!-- champ email -->
                    <div class='form-group'>
                        <input class='form-control form-control-md' name="ins_login" type="text" id="ins_login" placeholder="adresse mail" value="">
                        <span id="alertEmail" class="alert">&nbsp<?= form_error('ins_login', '<span>', '</span>') ?></span>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <!-- champ mot de passe -->
                            <div class='form-group'>
                                <input class='form-control form-control-md' name="ins_mdp" type="password" id="ins_mdp" placeholder="mot de passe" value="">
                                <span id="alertMdp" class="alert">&nbsp<?= form_error('ins_mdp', '<span>', '</span>') ?></span>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <!-- champ vérification mot de passe -->
                            <div class='form-group'>
                                <input class='form-control form-control-md' name="" type="password" id="mdpVerif" placeholder="vérification du mot de passe" value="">
                                <span id="alertmdpVerif" class="alert">&nbsp</span>
                            </div>
                        </div>
                    </div>
                    <div>
                        <button type="submit" class="btn btn-md btn-primary" name="" value="">enregistrer</button>
                    </div>
                    <div>
                        <p class="alert">&nbsp </p>
                    </div>
                </fieldset>
            </form>
        </div>
        <!-- colonnes vides -->
        <div class="col-md-3">
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
    <!--<script src="assets/CTRL_JS/ctrl.js"></script>-->
    </body>

    </html>