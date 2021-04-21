<div class="container-fluid">
    <div class="row">
        <div class="col-md-6">
            <div class="card">
                <div class="card-body">
                    <center class="m-t-30"><img src="<?= makeRootOrFileUrl($user->image) ?>"
                                                class="rounded-circle" width="150" height="150" alt="user-profile-img"/>
                        <h4 class="card-title m-t-10"><?= $user->nom . ' ' . $user->prenom ?><?= ($user->username) ? sprintf('(%s)', $user->username) : '' ?></h4>
                        <h6 class="card-subtitle"><?= ($user->about_me) ? substr($user->about_me, 0, 39) : 'Donnez aux autres une bref decription de qui vous êtes ..' ?>
                            ...
                            <label for="about">&nbsp;<i class="fas fa-pencil-alt cursor-pointer"></i></label>&nbsp;<a
                                    href="#" data-toggle="modal" data-target="#about_me"><br><span class="see-more">Voir plus</span>
                            </a>
                        </h6>
                        <div class="row text-center justify-content-md-center text-center">
                            <div class="col-4"><a href="" class="link freinds"><i
                                            class="icon-people"></i>
                                    <font class="font-medium"><i class="fas fa-users"></i>&nbsp;Amis(0)</font>
                                </a></div>
                            <div class="col-4"><a href="" class="link subject"><i
                                            class="icon-people"></i>
                                    <font class="font-medium"><i
                                                class="fas fa-pen-square"></i>&nbsp;Sujets(<?= $userNumbersOfsubjects ?? '0' ?>
                                        )</font>
                                </a></div>
                            <div class="col-4"><a href="" class="link stars"><i
                                            class="icon-picture"></i>
                                    <font class="font-medium"><i class="fa fa-star"
                                                                 aria-hidden="true"></i>&nbsp;Etoiles(0)</font>
                                </a></div>
                        </div>
                    </center>
                </div>
                <div>
                    <hr>
                </div>
                <div class="card-body"><span class="text-muted"><label for="email">Email Address Email <i
                                    class="fas fa-pencil-alt cursor-pointer"></i></label></span>
                    <h6><?= $user->email ?></h6> <span class="text-muted p-t-30 db"><label for="contact">Telephone <i
                                    class="fas fa-pencil-alt cursor-pointer"></i></label></span>
                    <h6>(+225) <?= $user->contact ?></h6>
                    <span class="text-muted p-t-30 db">Status</span>
                    <h6><?= ucfirst($user->status) ?></h6>
                    <span class="text-muted p-t-30 db">Filière</span>
                    <h6><?= strtoupper($user->filiere) ?></h6>
                    <span class="text-muted p-t-30 db">Filière</span>
                    <h6><?= $user->ville ?></h6>
                    <div class="map-box">
                    </div>
                </div>
            </div>
        </div>
        <!-- Column -->
        <!-- Column -->
        <div class="col-md-6">
            <div class="jumbotron card">
                <div class="card-body">
                    <form class="form-horizontal form-material mx-2" id="form-update-profile">
                        <div class="form-group">
                            <label for="user-pic" class="col-md-12">Image de profile <small
                                        class="small"></small></label>
                            <div class="col-md-12 d-flex justfy-content-space-between">
                                <div>
                                    <label for="user-pic" class="cursor-pointer">
                                        <img src="<?= makeRootOrFileUrl($user->image) ?>"
                                             class="rounded-circle" width="90" height="90"
                                             alt="user-profile-img"
                                             id="img-container"
                                        />
                                    </label>
                                    <input type="file" id="user-pic" class="d-none" name="user-pic">
                                </div>
                                <div class="pt-5">
                                    <label for="user-pic">
                                        <span class="btn text-white see-more">choisir</span>
                                    </label>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="email" class="col-md-12">Email <small
                                        class="small not-required"></small></label>
                            <div class="col-md-12">
                                <input type="email" placeholder=""
                                       class="form-control form-control-line" name="email"
                                       id="email">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="username" class="col-md-12">Nom d'utilisateur <small
                                        class="small not-required"></small></label>
                            <div class="col-md-12">
                                <input type="text" placeholder=""
                                       class="form-control form-control-line" name="username"
                                       id="username">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="password" class="col-md-12">Mot de passe <small
                                        class="small not-required"></small></label>
                            <div class="col-md-12">
                                <input type="password" name="password" id="password"
                                       class="form-control form-control-line">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-12" for="contact">Numero de Telephone <small
                                        class="small not-required"></small></label>
                            <div class="col-md-12">
                                <input type="text" placeholder="" id="contact" name="contact"
                                       class="form-control form-control-line">
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="d-flex justify-content-between">
                                <div>
                                    <label class="col-md-12" for="about">A propos de vous<small
                                                class="small not-required"></small></label>
                                </div>
                                <div>
                                    <i class="fas fa-keyboard cursor-pointer" id="emojiKeyboard"></i>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <textarea rows="5" name="about" id="about"
                                          class="form-control form-control-line"></textarea>
                            </div>
                        </div>
                        <div class="form-group w-100">
                            <button class="btn btn-success text-white" id="update-btn" style="width: 10rem">Mettre a
                                jour
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<!--Modal de notification de l'utilisateur en cas de non remplissage de champs-->
<div class="modal fade" id="notif" tabindex="-1" role="dialog" aria-labelledby="Notify"
     aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header" style="border-bottom: none !important;">
                <p style="font-size: .9rem;padding: 0.1rem" class="modal-title">
                    <i class="fa fa-exclamation-triangle" style="color: red"></i>
                    Veuillez au moins saisir un champs pour une eventuelle mise a jour</p>
                <span type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true" class="ti-close close" style="cursor: pointer">
                    </span>
                </span>
            </div>
        </div>
    </div>
</div>
<!--Modal d'affche des message d'erreur ou succès après une mise a jour-->
<div class="modal fade" id="updated" tabindex="-1" role="dialog" aria-labelledby="UpdatedModal"
     aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header" style="border-bottom: none !important;">
                <h5 class="modal-title"></h5>
                <span type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true" class="ti-close close" style="cursor: pointer">
                    </span>
                </span>
            </div>
            <div class="card-body text-center">
                <img src="" width="150" id="updated-icon" alt="icon-success">
                <div id="updated-msg" class="mt-2"></div>
            </div>
        </div>
    </div>
</div>
<!--Modal Pour montrer en integralité le texte qui decris l'utilisateur -->
<div class="modal fade" id="about_me" tabindex="-1" role="dialog" aria-labelledby="about_meModal"
     aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header" style="border-bottom: none !important;">
                <h5 class="modal-title" id="exampleModalLabel">Qui êtes vous ?</h5>
                <span type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true" class="ti-close close" style="cursor: pointer">
                    </span>
                </span>
            </div>
            <div class="card-body">
                <div class="text-center"><i class="fas fa-book-open twinkle"></i></div>
                <div class="text-center">
                    <?= ($user->about_me) ?? 'Donnez aux autres une bref decription de qui vous êtes ...' ?>
                </div>
            </div>
        </div>
    </div>
</div>
<!--Modal Du clavier a emoticone-->
<div class="emoji-fixed">
    <div class="emoticon-container" style="width: 18rem">
        <div class="modal-dialog" role="document">
            <div class="modal-content slow-opacity" style="text-align: center !important;">
                <div class="modal-header p-2" style="border-bottom: none !important;">
                    <h5></h5>
                    <span type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true" id='close-emoji-modal' class="ti-close close" style="cursor: pointer">
                    </span>
                </span>
                </div>
                <div class="p-2" style="padding-bottom: 1rem" id="emoticons">
                </div>
            </div>
        </div>
    </div>
</div>
<div id="debug"></div>