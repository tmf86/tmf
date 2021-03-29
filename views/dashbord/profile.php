<div class="container-fluid">
    <div class="row">
        <div class="col-lg-4 col-xlg-3 col-md-5">
            <div class="card">
                <div class="card-body">
                    <center class="m-t-30"><img src="<?= buildpath($user->image) ?>"
                                                class="rounded-circle" width="150" height="150" alt="user-profile-img"/>
                        <h4 class="card-title m-t-10"><?= $user->nom . ' ' . $user->prenom ?></h4>
                        <h6 class="card-subtitle">Accoubts Manager Amix corp</h6>
                        <div class="row text-center justify-content-md-center">
                            <div class="col-4"><a href="javascript:void(0)" class="link"><i
                                            class="icon-people"></i>
                                    <font class="font-medium">254</font>
                                </a></div>
                            <div class="col-4"><a href="javascript:void(0)" class="link"><i
                                            class="icon-picture"></i>
                                    <font class="font-medium">54</font>
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
                    <h6><?= $user->status ?></h6>
                    <small class="text-muted p-t-30 db">Filière</small>
                    <h6><?= strtoupper($user->filiere) ?></h6>
                    <small class="text-muted p-t-30 db">Filière</small>
                    <h6><?= $user->ville ?></h6>
                    <div class="map-box">
                    </div>
                </div>
            </div>
        </div>
        <!-- Column -->
        <!-- Column -->
        <div class="col-lg-8 col-xlg-9 col-md-7">
            <div class="card">
                <div class="card-body">
                    <form class="form-horizontal form-material mx-2">
                        <div class="form-group">
                            <label for="example-email" class="col-md-12">Email</label>
                            <div class="col-md-12">
                                <input type="email" placeholder=""
                                       class="form-control form-control-line" name="example-email"
                                       id="example-email">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-12">Mot de passe</label>
                            <div class="col-md-12">
                                <input type="password" value=""
                                       class="form-control form-control-line">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-12">Numero de Telephone</label>
                            <div class="col-md-12">
                                <input type="text" placeholder=""
                                       class="form-control form-control-line">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-12">A propos de vous</label>
                            <div class="col-md-12">
                                <textarea rows="5" class="form-control form-control-line"></textarea>
                            </div>
                        </div>
                        <div class="map-box" style="padding: 3.3rem">
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