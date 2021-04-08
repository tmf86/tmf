<div class="container-fluid">
    <div class="row">
        <div class="col-lg-12">
            <div class="mt-2">
                <div class="p-2">
                    <div class="feed-widget">
                        <h4 class="page-title">Informatique</h4>
                        <div class="col-sm-12 d-flex mb-4 justfy-content-space-between">
                            <div class="forum-msg w-75">
                                Les sujets les plus recents de la categorie <?= $category ?>
                            </div>
                            <div>
                                <button class="btn btn-success text-white" data-toggle="modal"
                                        data-target="#forum-add">creer
                                </button>
                            </div>
                        </div>
                        <ul class="list-style-none feed-body m-0 p-b-20">
                            <li class="feed-item p-3">
                                <div class="feed-icon">
                                    <img src="<?= makeRootOrFileUrl('images/users/1.jpg') ?>" alt="user" width="40"
                                         class="rounded-circle">
                                </div>
                                <div class="p-2">
                                    Comment afficher du text a la console en python ... <br>
                                    <span style="opacity: 0.8; font-size: 13px; font-weight: 700 ; fp"> Par JulienFeraux1 27 mars 2021 à 22:58:16</span>
                                </div>
                                <div class="p-2">
                                    <span class="">20 messages</span>
                                </div>
                                <div class="px-2">
                                     <span class="">Dernier message  <br> par <strong>NadfriJS</strong>
                                    Il y a environ 5 heures</span>
                                </div>
                            </li>
                            <li class="feed-item p-3">
                                <div class="feed-icon">
                                    <img src="<?= makeRootOrFileUrl('images/users/1.jpg') ?>" alt="user" width="40"
                                         class="rounded-circle">
                                </div>
                                <div class="p-2">
                                    Comment afficher du text a la console en python ... <br>
                                    <span style="opacity: 0.8; font-size: 13px; font-weight: 700 ; fp"> Par JulienFeraux1 27 mars 2021 à 22:58:16</span>
                                </div>
                                <div class="p-2">
                                    <span class="">20 messages</span>
                                </div>
                                <div class="px-2">
                                     <span class="">Dernier message  <br> par <strong>NadfriJS</strong>
                                    Il y a environ 5 heures</span>
                                </div>
                            </li>
                            <li class="feed-item p-3">
                                <div class="feed-icon">
                                    <img src="<?= makeRootOrFileUrl('images/users/1.jpg') ?>" alt="user" width="40"
                                         class="rounded-circle">
                                </div>
                                <div class="p-2">
                                    Comment afficher du text a la console en python ... <br>
                                    <span style="opacity: 0.8; font-size: 13px; font-weight: 700 ; fp"> Par JulienFeraux1 27 mars 2021 à 22:58:16</span>
                                </div>
                                <div class="p-2">
                                    <span class="">20 messages</span>
                                </div>
                                <div class="px-2">
                                     <span class="">Dernier message  <br> par <strong>NadfriJS</strong>
                                    Il y a environ 5 heures</span>
                                </div>
                            </li>
                            <li class="feed-item p-3">
                                <div class="feed-icon">
                                    <img src="<?= makeRootOrFileUrl('images/users/1.jpg') ?>" alt="user" width="40"
                                         class="rounded-circle">
                                </div>
                                <div class="p-2">
                                    Comment afficher du text a la console en python ... <br>
                                    <span style="opacity: 0.8; font-size: 13px; font-weight: 700 ; fp"> Par JulienFeraux1 27 mars 2021 à 22:58:16</span>
                                </div>
                                <div class="p-2">
                                    <span class="">20 messages</span>
                                </div>
                                <div class="px-2">
                                     <span class="">Dernier message  <br> par <strong>NadfriJS</strong>
                                    Il y a environ 5 heures</span>
                                </div>
                            </li>
                        </ul>
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
                    <form class="form-horizontal form-material mx-2">
                        <div class="form-group">
                            <label for="example-email" class="col-md-12">Titre du sujet</label>
                            <div class="col-md-12">
                                <input type="email" placeholder=""
                                       class="form-control form-control-line" name="example-email"
                                       id="example-email">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="example-email" class="col-md-12">Sous-titre</label>
                            <div class="col-md-12">
                                <input type="email" placeholder=""
                                       class="form-control form-control-line" name="example-email"
                                       id="example-email">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-12">Votre message</label>
                            <div class="col-md-12">
                                <textarea rows="5" class="form-control form-control-line"></textarea>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-12">
                                <button class="btn btn-success text-white px-5">soumettre</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
