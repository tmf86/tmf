<div class="container-fluid">
    <div class="row">
        <div class="col-lg-12">
            <div class="mt-2">
                <div class="p-2">
                    <div class="feed-widget">
                        <div class="page-title d-flex  justfy-content-space-between">
                            <h4 class="underline"><i class="fa fa-tasks"></i>&nbsp;<?= strtoupper($forumName) ?></h4>
                            <div>
                                <button class="btn btn-success text-white" id="showAddSubjectForm">
                                    creer
                                </button>
                            </div>
                        </div>
                        <div class="col-sm-12 d-flex mb-4 justfy-content-space-between">
                            <div class="forum-msg w-75">
                                <?php if ($subjects): ?>
                                    Les sujets les plus recents du forum <i><strong><?= $forumName ?></strong></i>
                                <?php endif; ?>
                            </div>
                        </div>
                        <?php if ($subjects):foreach ($subjects as $subject): ?>
                            <ul class="list-style-none feed-body m-0 p-b-20">
                                <li class="feed-item p-3">
                                    <div class="feed-icon">
                                        <img src="<?= makeRootOrFileUrl($subject->user->image) ?>" alt="user"
                                             width="40" height="40"
                                             class="rounded-circle">
                                    </div>
                                    <div class="p-2">
                                        <!--                                        Comment afficher du text a la console en python ... <br>-->
                                        <!--                                        <span style="opacity: 0.8; font-size: 13px; font-weight: 700 ; fp"> Par JulienFeraux1 27 mars 2021 à 22:58:16</span>-->
                                        <?= $subject->message ?><br>
                                    </div>
                                    <div class="p-2">
                                        <span class="">0 messages</span>
                                    </div>
                                    <div class="px-2">
                                     <span class="">Dernier message  <br> par <strong>NadfriJS</strong>
                                    Il y a environ 5 heures</span>
                                    </div>
                                </li>
                            </ul>
                        <?php endforeach; else: ?>
                            <div class="text-center">
                                <img src="<?= makeRootOrFileUrl('images/not.png') ?>" alt="not-subject">
                                <div class="not-subject">
                                    Oops ... pas de sujet dans cette categorie pour le moment . <br>
                                    Vous pouvez en creer un en cliquant sur le bouton créer ci-dessus .🙄
                                </div>
                            </div>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Modal -->
<div class="modal fade" id="forum-add" tabindex="-1" role="dialog" aria-labelledby="Forum Add"
     aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header" style="border-bottom: none !important;">
                <h5 class="modal-title" id="exampleModalLongTitle">Ajoutez un nouveau sujet de discussion</h5>
                <span aria-hidden="true" class="ti-close close" data-dismiss="modal" aria-label="Close"
                      style="cursor: pointer"></span>
            </div>
            <div class="modal-body">
                <div class="card-body">
                    <form class="form-horizontal form-material mx-2" method="post" id="subject-form">
                        <div class="form-group">
                            <label for="title" class="col-md-12">Titre<small
                                        class="small">*</small></label>
                            <div class="col-md-12">
                                <input type="text" placeholder=""
                                       class="form-control form-control-line" name="title"
                                       id="title">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="subtitle" class="col-md-12">Sous-titre <small
                                        class="small">*</small></label>
                            <div class="col-md-12">
                                <input type="text" placeholder=""
                                       class="form-control form-control-line" name="subtitle"
                                       id="subtitle">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for='message' class="col-md-12">Votre message <small
                                        class="small">*</small></label>
                            <div class="col-md-12">
                                <textarea rows="5" id='message' class="form-control form-control-line"
                                          name="message"></textarea>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-12">
                                <button class="btn btn-success text-white px-5" id="subject-btn" style="width: 10rem">
                                    soumettre
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="session-alert" tabindex="-1" role="dialog" aria-labelledby="Forum Alert"
     aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header" style="border-bottom: none !important;">
                <h5 class="modal-title text-uppercase text-danger" id="exampleModalLongTitle">
                    <i class="fa fa-exclamation-triangle" style="color: red">
                    </i>&nbsp;Droit insuffisant</h5>
                <span aria-hidden="true" class="ti-close close" data-dismiss="modal" aria-label="Close"
                      style="cursor: pointer"></span>
            </div>
            <div class="modal-body">
                Vous devez être authentifié pour pouvoir ajouter un nouveau sujet .
                Votre sujet a été sauvegardé mais ne sera pris en compte qu'une fois authentifié.
                Veuillez alors vous authentifié <a href="<?= makeRootOrFileUrl('login') ?>">ici</a>
                ou si vous n'avez pas encore de compte veuillez en créer un <a
                        href="<?= makeRootOrFileUrl('register') ?>">ici</a>.
            </div>
        </div>
    </div>
</div>
<div id="debug"></div>
