<div class="container">
    <h2 class="text-center text-uppercase" id="title">connexion</h2>
    <hr>
    <div class="row">
        <!-- colonnes vides -->
        <div class="col-md-3">
        </div>
        <!-- formulaire connection -->
        <div class="col-md-6">
            <!--<form role="form" method="post" action="">-->
                <?= form_open('produits/form_mdp/','name="formulaire" id="formulaire" enctype="multipart/form-data"'); ?>
                <fieldset class="fond">
                    <p class=" pull-center"></p>
                    <!-- login -->
                    <div class="form-group">
                        <input type="text" name="email" id="email" class="form-control input-lg" placeholder="adresse mail" value="<?= set_value('email'); ?>">
                        <p id="alertEmail" class="alert">&nbsp<?= form_error('email', '<span>', '</span>') ?></p>
                    </div>
                    <!-- mot de passe -->
                    <div class="form-group">
                        <input type="password" name="mdp" id="mdp" class="form-control input-lg" placeholder="mot de passe" value="<?= set_value('mdp'); ?>">
                        <span id="alertMdp" class="alert">&nbsp<?= form_error('mdp', '<span>', '</span>') ?></span>
                    </div>
                    <div>
                        <button type="submit" class="btn btn-md btn-primary" value="connexion" name="connexion">connexion</button>
                    </div>
                    <div>
                        <p>&nbsp<?= isset($mess) ? $mess : ""; ?></p>
                    </div>
                    <div>
                        <a href="#">Mot de passe oublié ou verrouillez !?</a>
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
    <script src="<?= base_url("/assets/js/ctrl_form.js") ?>"></script>
    </body>

    </html>