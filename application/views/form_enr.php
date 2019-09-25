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

                    <!-- champ nom -->
                    <div class='form-group '>
                        <input class='form-control form-control-md' name="nom" type="text" id="nom" placeholder="nom" value="">
                        <span id="alertNom">&nbsp</span>
                    </div>

                    <!-- champ prenom -->
                    <div class='form-group '>
                        <input class='form-control form-control-md' name="prenom" type="text" id="prenom" placeholder="prenom" value="">
                        <span id="alertPrenom">&nbsp</span>
                    </div>
                    <!-- champ adresse -->
                    <div class='form-group '>
                        <input class='form-control form-control-md' name="adresse" type="text" id="adresse" placeholder="adresse" value="">
                        <span id="alertAdresse">&nbsp</span>
                    </div>

                    <div class="row">
                        <!-- code postal -->
                        <div class="col-md-4">
                            <input class='form-control form-control-md' name="cp" type="text" id="cp" placeholder="code postal" value="">
                            <span id="alertCp">&nbsp</span>
                        </div>
                        <!-- ville-->
                        <div class="col-md-8">
                            <input class='form-control form-control-md' name="ville" type="text" id="ville" placeholder="ville" value="">
                            <span id="alertCp">&nbsp</span>
                        </div>
                    </div>

                    <div class="row">
                        <!-- tel portable -->
                        <div class="col-md-6">
                            <input class='form-control form-control-md' name="portable" type="text" id="portable" placeholder="téléphone portable" value="">
                            <span id="alertPortable">&nbsp</span>
                        </div>
                        <!-- tel fixe-->
                        <div class="col-md-6">
                            <input class='form-control form-control-md' name="fixe" type="text" id="fixe" placeholder="téléphone fixe" value="">
                            <span id="alertFixe">&nbsp</span>
                        </div>
                    </div>


                    <!-- champ email -->
                    <div class='form-group'>
                        <input class='form-control form-control-md' name="email" type="text" id="email" placeholder="adresse mail" value="">
                        <span id="alertEmail">&nbsp</span>
                    </div>

                    <!-- champ mot de passe -->
                    <div class='form-group'>
                        <input class='form-control form-control-md' name="mdp" type="password" id="mdp" placeholder="mot de passe" value="">
                        <span id="alertMdp">&nbsp</span>
                    </div>

                    <!-- champ vérification mot de passe -->
                    <div class='form-group'>
                        <input class='form-control form-control-md' name="mdpVerif" type="password" id="mdpVerif" placeholder="vérification du mot de passe" value="">
                        <span id="alertmdpVerif">&nbsp</span>
                    </div>

                    <div>
                        <button type="submit" class="btn btn-md btn-primary" name="enregistrer" value="enregistrer">enregistrer</button>
                    </div>

                    <div>
                        <p>&nbsp *</p>
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