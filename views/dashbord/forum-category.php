<?php

use Service\DateTime\DateTimeCommentStyle;

?>
<div class="container-fluid">
    <div class="row">
        <div class="col-lg-12">
            <div class="mt-2">
                <div class="p-2">
                    <div class="feed-widget">
                        <div class="col-sm-12 page-title d-flex justfy-content-space-between">
                            <h4>
                                <div class="feed-icon">
                                    <img src="<?= makeRootOrFileUrl($forum->icon) ?>" alt="user" width="30"
                                         height="30" class="rounded-circle img-cover"> <?= strtoupper($forumName) ?>
                                </div>
                            </h4>
                            <div>
                                <label for="title">
                                    <a class="btn btn-success text-white">
                                        creer
                                    </a>
                                </label>
                            </div>
                        </div>
                        <div class="col-sm-12 d-flex justfy-content-space-between">
                            <div class="forum-msg w-75">
                            </div>
                        </div>
                        <div class="container-fluid  card mt-1 p-4">
                            <?php if ($subjects):foreach ($subjects as $subject): ?>
                                <a href="<?= makeRootOrFileUrl(sprintf('forum/subject/%s', $subject->slug)) ?>"
                                   class="suject-link">
                                    <div class="row  bg-gradient p-3 mb-0 rounded cursor-pointer subject-list">
                                        <div class="col-md-6">
                                            <div class="row">
                                                <div class="col-3">
                                                    <img src="<?= makeRootOrFileUrl($subject->user->image) ?>"
                                                         alt="user"
                                                         width="50"
                                                         height="50"
                                                         class="rounded-circle img-cover">
                                                </div>
                                                <div class="col-9" style="text-overflow: ellipsis;">
                                                    <?= substr($subject->message, 0, 150) ?>...<br>
                                                    Par
                                                    <strong><?= $subject->user->username ?? $subject->user->prenom ?></strong>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-2">
                                            <?= count($subject->answers) ?> messages
                                        </div>
                                        <div class="col-md-2 p-r-5">
                                            Dernier message
                                            par
                                            <?php if (count($subject->answers)): ?>
                                                <strong><?= $subject->answers[count($subject->answers) - 1]->user->username ?? $subject->answers[count($subject->answers) - 1]->user->prenom ?></strong>
                                                <br>
                                                <?= DateTimeCommentStyle::setTimestamp($subject->answers[count($subject->answers) - 1]->created_at)::getDateCommentStyle() ?>
                                            <?php else: ?>
                                                <strong><?= $subject->user->username ?? $subject->user->prenom ?></strong>
                                                <br>
                                                <?= DateTimeCommentStyle::setTimestamp($subject->created_at)::getDateCommentStyle() ?>
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                </a>
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
    <div class="row">
        <h4 class="text-center">Ajoutez un nouveau sujet de discussion</h4>
        <div class="col-md-12">
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
                                class="small not-required"></small></label>
                    <div class="col-md-12">
                        <input type="text" placeholder=""
                               class="form-control form-control-line" name="subtitle"
                               id="subtitle">
                    </div>
                </div>
                <div class="form-group">
                    <div class="d-flex justfy-content-space-between">
                        <div>
                            <label for="message" class="col-md-12">Message <small
                                        class="small">*</small></label>
                        </div>
                        <div>
                            Joindre une image
                            <label for="attachment">
                                <img class="cursor-pointer"
                                     src="<?= makeRootOrFileUrl('images/icon-img.png') ?>"
                                     width="20" height="20"
                                     alt="icon-image">
                            </label>
                            <img src="<?= makeRootOrFileUrl('images/image-getted.png') ?>"
                                 width="20" height="20"
                                 alt="image getted" id="image-getted" style="display: none">
                            <input type="file" id="attachment" name="attachment" class="d-none">
                        </div>
                    </div>
                    <div class="col-md-12 small" id="error-container">
                    </div>
                    <div class="col-md-12">
                                <textarea rows="3" id='message' class="form-control form-control-line"
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
