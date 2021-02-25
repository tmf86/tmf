<div class="form-container mt-3 mb-5">
    <form class="border border-light p-5 form-box" action="#" id="form-register">
        <p class="text-center mb-4">
            <span class="title-custum text-uppercase">Inscription</span>
        </p>
        <div class="fm-inline">
            <div class="fm-item">
                <label for="nom">Nom<small class="small">*</small></label>
                <input type="text" name="nom" id="nom" class="form-control mb-2 mb-2 input-custum-pd"
                       placeholder="Nom">
                <span class="icon icon-float-1"><i class="fas fa-user-edit"></i></span>
            </div>
            <div class="fm-item space">
                <label for="prenom">Prenom<small class="small">*</small></label>
                <input type="text" name="prenom" id="prenom" class="form-control mb-2 input-custum-pd"
                       placeholder="Prenom">
                <span class="icon icon-float-2"><i class="fas fa-user-edit"></i></span>
            </div>
        </div>
        <div class="fm-inline">
            <div class="fm-item">
                <label for="email">Email<small class="small">*</small></label>
                <input type="email" id="email" name="email" class="form-control mb-2 input-custum-pd"
                       placeholder="email">
                <span class="icon icon-float-1"><i class="fas fa-envelope"></i></span>
            </div>
            <div class="fm-item space">
                <label for="contact">Contact<small class="small">*</small></label>
                <input type="text" id="contact" name="contact" class="form-control mb-2 input-custum-pd"
                       placeholder="contact">
                <span class="icon icon-float-2"><i class="fas fa-phone-square-alt"></i></span>
            </div>
        </div>
        <div class="fm-inline">
            <div class="fm-item mt-2">
                <label for="ville">Ville <span class="icon"><i class="fas fa-building"></i></span></label>
                <select class="select" name="ville" id="ville">
                    <option value="Abidjan">Abidjan</option>
                    <option value="Yamoussoukro">Yamoussoukro</option>
                </select>
            </div>
            <div class="fm-item space mt-2">
                <label for="jour">Date de Naissance <span class="icon"><i
                                class="fas fa-birthday-cake"></i></span></label>
                <div class="date">
                    <div class="date-item">
                        <select class="select" name="jour" id="jour"><?= selectBirthDay(31) ?>
                        </select>
                    </div>
                    <div class="date-item space">
                        <select class="select" name="mois" id="mois"><?= selectBirthDay(12) ?>
                        </select>
                    </div>
                    <div class="date-item space">
                        <select class="select" name="annee" id="annee"><?= selectBirthDay(1921, true) ?>
                        </select>
                    </div>
                </div>
            </div>
        </div>
        <div class="fm-inline mt-3">
            <div class="fm-item">
                <label for='filiere'>Niveau <span class="icon"><i class="fa fa-level-up"
                                                                  aria-hidden="true"></i></span></label>
                <select name="filiere" class="select" id="filiere">
                    <option value="RGL1A">Reseaux Genie Logiciel 1ère Année</option>
                    <option value="RGL2A">Reseaux Genie Logiciel 2ème Année</option>
                    <option value="CF1A">Comptabilité Financière 1ère Année</option>
                    <option value="CF2A">Comptabilité Financière 2ème Année</option>
                </select>
            </div>
        </div>
        <div class="fm-inline mt-2">
            <div class="fm-item radio ps">
                <label>Genre <span class="icon"> <i class="fas fa-venus-mars"></i></span></label>
                <div class="custom-control custom-checkbox">
                    <input type="radio" class="custom-control-input" id="h" name="genre" value="homme" checked>
                    <label class="custom-control-label" for="h">Homme</label>
                </div>
                <div class="custom-control custom-checkbox">
                    <input type="radio" class="custom-control-input" name="genre" id="f" value="femme">
                    <label class="custom-control-label" for="f">Femme</label>
                </div>
            </div>
            <div class="fm-item space mt-2">
                <label for="status">Status <span class="icon"><i class="fas fa-people-carry"></i></span></label>
                <select name="status" class="select" id="status">
                    <option value="filleul">Filleul(le)</option>
                    <option value="parrain">Parrain(ne)</option>
                </select>
            </div>
        </div>
        <div class="fm-btn-container ">
            <button class="btn btn-info btn-block my-4 fm-btn" id="register" type="submit">S'Inscrire</button>
        </div>
    </form>
</div>
<!--Error Modal-->
<div class="modal fade" id="alerterror" tabindex="-1" role="dialog" aria-labelledby="alertModal"
     aria-hidden="true">
    <div class="modal-dialog modal-sm" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title w-100" id="alertModal">Oops !</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body text-center">
                <span style="font-size: 3rem">😢</span>
                <div>Desolé quelques erreurs ce sont produites veuillez revoire les données fournies !</div>
            </div>
        </div>
    </div>
</div>
<!--Error Modal-->
<!--Sucess Modal-->
<div class="modal fade" id="alertsucces" tabindex="-1" role="dialog" aria-labelledby="alertModal"
     aria-hidden="true">
    <div class="modal-dialog modal-sm" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title w-100" id="alertModal">Bravo !</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body text-center">
                <span style="font-size: 3rem">✅</span>
                <div>Un mail vous a été envoyé pour la finalisation de la creation de votre compte !</div>
            </div>
        </div>
    </div>
</div>
<!--Success Modal-->
<div id="debug"></div>
<div class="cloud"></div>
<div class="loader-conatiner">
    <!--    <div class="spinner-grow" role="status">-->
    <!--        <span class="sr-only">Loading...</span>-->
    <!--    </div>-->
    <div class="spinner-border text-primary rezise" role="status">
        <span class="sr-only">Loading...</span>
    </div>
    <div class="loader-label">
        Patientez<span id="point-loader" style="font-size:1.7rem">.</span>
    </div>
</div>