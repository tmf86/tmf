<div class="container-fluid">
    <div class="row">
        <div class="col-md-6">
            <div class="card">
                <div class="card-body">
                    <center class="m-t-30"><img src="<?= buildpath($user->image) ?>"
                                                class="rounded-circle" width="150" height="150" alt="user-profile-img"/>
                        <h4 class="card-title m-t-10"><?= $user->nom . ' ' . $user->prenom ?></h4>
                        <h6 class="card-subtitle">Donnez aux autres une bref decription de qui vous êtes ...</h6>
                        <div class="row text-center justify-content-md-center text-center">
                            <div class="col-4"><a href="javascript:void(0)" class="link freinds"><i
                                            class="icon-people"></i>
                                    <font class="font-medium"><i class="fas fa-users"></i>Amis(0)</font>
                                </a></div>
                            <div class="col-4"><a href="javascript:void(0)" class="link subject"><i
                                            class="icon-people"></i>
                                    <font class="font-medium"><i class="fas fa-pen-square"></i> Sujets(0)</font>
                                </a></div>
                            <div class="col-4"><a href="javascript:void(0)" class="link stars"><i
                                            class="icon-picture"></i>
                                    <font class="font-medium"><i class="fa fa-star"
                                                                 aria-hidden="true"></i>Etoiles(0)</font>
                                </a></div>
                        </div>
                    </center>
                </div>
                <div>
                    <hr>
                </div>
                <div class="card-body"><small class="text-muted">Address Email</small>
                    <h6><?= $user->email ?></h6> <small class="text-muted p-t-30 db">Telephone</small>
                    <h6>(+225) <?= $user->contact ?></h6>
                    <small class="text-muted p-t-30 db">Status</small>
                    <h6><?= ucfirst($user->status) ?></h6>
                    <small class="text-muted p-t-30 db">Filière</small>
                    <h6><?= strtoupper($user->filiere) ?></h6>
                    <small class="text-muted p-t-30 db">Filière</small>
                    <h6><?= $user->ville ?></h6>
                    <div class="map-box">
                    </div>
                </div>
                <div style="padding: 1.2rem">

                </div>
            </div>
        </div>
        <!-- Column -->
        <!-- Column -->
        <div class="col-md-6">
            <div class="card">
                <div class="card-body">
                    <form class="form-horizontal form-material mx-2">
                        <div class="form-group">
                            <label for="file" class="col-md-12">Image de profile <small class="small"></small></label>
                            <div class="col-md-12 d-flex justfy-content-space-between">
                                <div>
                                    <label for="file" class="cursor-pointer">
                                        <img src="<?= buildpath($user->image) ?>"
                                             class="rounded-circle" width="90" height="90"
                                             alt="user-profile-img"
                                             id="img-container"
                                        />
                                    </label>
                                    <input type="file" id="file" class="d-none" name="file">
                                </div>
                                <div class="pt-5">
                                    <label for="file">
                                        <span class="btn btn-success text-white">choisir</span>
                                    </label>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="email" class="col-md-12">Email <small class="small"></small></label>
                            <div class="col-md-12">
                                <input type="email" placeholder=""
                                       class="form-control form-control-line" name="email"
                                       id="email">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="password" class="col-md-12">Mot de passe</label>
                            <div class="col-md-12">
                                <input type="password" name="password" id="password"
                                       class="form-control form-control-line">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-12" for="contact">Numero de Telephone</label>
                            <div class="col-md-12">
                                <input type="text" placeholder="" id="contact"
                                       class="form-control form-control-line">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-12" for="about">A propos de vous</label>
                            <div class="col-md-12">
                                <textarea rows="5" name="about" id="about" class="form-control form-control-line"></textarea>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-12">
                                <button class="btn btn-success text-white">Mettre a jour</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>