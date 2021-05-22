<div class="form-container mt-5 p-2">
    <div class="col-md-6 card-custumer p-5 fm-login">
        <form id="form-login" class="p-3 w-100" action="#" method="post">
            <p class="text-center mb-4">
                <span class="title-custum text-uppercase">connexion</span>
            </p>
            <div id="alert" class="mt-5"></div>
            <div class="sm-p lg-m">
                <div class="md-form mt-3">
                    <i class="fa fa-envelope prefix grey-text" data-name="email_ou_identifiant"></i>
                    <input type="text" id="email_ou_identifiant" name="email_ou_identifiant" class="form-control">
                    <label for="email_ou_identifiant" class="font-weight-light">Identifiant ou
                        Email</label>
                </div>
                <div class="md-form mb-2">
                    <i class="fa fa-lock prefix grey-text" data-name="mot_de_passe"></i>
                    <input type="password" id="mot_de_passe" name="mot_de_passe" class="form-control">
                    <label for="mot_de_passe" class="font-weight-light">Mot de
                        passe</label>
                </div>
            </div>
            <button class="btn btn_aceder btn-block my-4 fm-btn" id="login" type="submit"
                    style="font-weight: 300">se connecter
            </button>
        </form>
    </div>
</div>
<div class="cipy-loader-container">
    <div class="loader-center">
        <div class="loader-d-flex">
            <div>
                <span class="cipy-loader"></span>
            </div>
            <div>
                <div class="round nb"></div>
                <div class="round nb-1"></div>
                <div class="round nb-2"></div>
            </div>
        </div>
    </div>
</div>
<div class="debug"></div>