<div class="app-content content">
        <div class="content-wrapper">
            <div class="content-header row">
            </div>
            <div class="content-body">
                <section class="row flexbox-container">
                    <div class="col-xl-8 col-11 d-flex justify-content-center">
                        <div class="card bg-authentication rounded-0 mb-0">
                            <div class="row m-0">
                                <div class="col-lg-6 d-lg-block d-none text-center align-self-center px-1 py-0">
                                    <img src="<?= ROOT_DIREC ?>/images/pages/login.png" alt="branding logo">
                                </div>
                                <div class="col-lg-6 col-12 p-0">
                                    <div class="card rounded-0 mb-0 px-2">
                                        <div class="card-header pb-1">
                                            <div class="card-title">
                                                <h4 class="mb-0">Authentification</h4>
                                            </div>
                                        </div>
                                        <p class="px-2">Bienvenue! Authentifiez-vous...</p>
                                        <div class="card-content">
                                            <div class="card-body pt-1" style="padding-bottom:15px">
                                            <?= $this->Form->create() ?>
<!--                                                 <form action="<?= ROOT_DIREC ?>/users/login" method="post" accept-charset="utf-8">
 -->                                                    <fieldset class="form-label-group form-group position-relative has-icon-left">
                                                        <input type="text" class="form-control" id="user-name" placeholder="Nom d'Utilisateur" required name="username">
                                                        <div class="form-control-position">
                                                            <i class="feather icon-user"></i>
                                                        </div>
                                                        <label for="user-name">Nom d'Utilisateur</label>
                                                    </fieldset>

                                                    <fieldset class="form-label-group position-relative has-icon-left">
                                                        <input type="password" class="form-control" id="user-password" placeholder="Mot de Passe" required name="password">
                                                        <div class="form-control-position">
                                                            <i class="feather icon-lock"></i>
                                                        </div>
                                                        <label for="user-password">Mot de Passe</label>
                                                    </fieldset>
                                                    <button type="submit" class="btn btn-primary float-right btn-inline" name="submit" style="margin-bottom:20px">Valider</button>
                                                <?= $this->Form->end() ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>

            </div>
        </div>
    </div>