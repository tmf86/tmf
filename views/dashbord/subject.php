<?php

use Contoller\Http\Request;
use Contoller\Middleware\AuthMiddleware;

?>
<div class="container">
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <div class="subject-title">
                        <?= $subject->title ?>
                    </div>
                </div>
                <div class="comment-widgets scrollable">
                    <div class="d-flex flex-row comment-row m-t-0">
                        <div class="p-2">
                            <img src="<?= makeRootOrFileUrl($subject->user->image) ?>" alt="user"
                                 width="50" class="rounded-circle img-cover cursor-pointer" height="50">
                        </div>
                        <div class="comment-text w-100">
                            <h6 class="font-medium"><?= $subject->user->username ?? $subject->user->prenom ?></h6>
                            <div class="m-b-15">
                                <?= $subject->message ?>
                            </div>
                            <div class="comment-footer">
                                <?php if ($subject->attachment) : ?>
                                    <div class="mb-2">
                                        <a href="<?= makeRootOrFileUrl($subject->attachment) ?>"
                                           data-lightbox="image-1">
                                            <img src="<?= makeRootOrFileUrl($subject->attachment) ?>" width="400"
                                                 alt="message attachment" class="attachment">
                                        </a>
                                    </div>
                                <?php endif; ?>
                                <span class="text-muted float-end">April 14, 2021</span>
                                <!--                                <span class="label label-rounded label-primary">Pending</span>-->
                                <span style="font-size: 1.2rem">
                                    <label for="message" class="cursor-pointer"><i class="ti-pencil-alt"></i></label>
                                </span>
                            </div>
                        </div>
                    </div>
                </div>
                <?php if ($answers): ?>
                    <?php foreach ($answers as $answer): ?>
                        <div class="comment-widgets scrollable">
                            <div class="d-flex flex-row comment-row m-t-0">
                                <div class="p-2">
                                    <img src="<?= makeRootOrFileUrl($answer->user->image) ?>" alt="user" width="50"
                                         class="rounded-circle img-cover cursor-pointer" height="50">
                                </div>
                                <div class="comment-text w-100">
                                    <h6 class="font-medium"><?= $answer->user->username ?? $answer->user->prenom ?></h6>
                                    <div class="m-b-15">
                                        <?= $answer->message ?>
                                    </div>
                                    <div class="comment-footer">
                                        <?php if ($answer->attachment) : ?>
                                            <div class="mb-2">
                                                <a href="<?= makeRootOrFileUrl($answer->attachment) ?>"
                                                   data-lightbox="image-1">
                                                    <img src="<?= makeRootOrFileUrl($answer->attachment) ?>" width="400"
                                                         alt="message attachment" class="attachment">
                                                </a>
                                            </div>
                                        <?php endif; ?>
                                        <span class="text-muted float-end">April 14, 2021</span>
                                        <!--                                <span class="label label-rounded label-primary">Pending</span>-->
                                        <span style="font-size: 1.2rem">
                                    <label for="message" class="cursor-pointer"><i class="ti-pencil-alt"></i></label>
                                </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>
                <?php endif; ?>
            </div>
        </div>
        <div class="col-md-12 p-0">
            <div class="card">
                <div class="card-body">
                    <form class="form-horizontal form-material mx-2" action="" method="post"
                          enctype="multipart/form-data">
                        <?php if (!AuthMiddleware::asUserAuthenticated()): ?>
                            <div class="alert alert-info alert-dismissible fade show" role="alert">
                                <div class="d-flex justify-content-between">
                                    <div>
                                        Après avoir cliqué sur "Répondre" vous serez invité à vous connecter pour
                                        que
                                        votre
                                        message soit publié.
                                    </div>
                                    <div class="p-1">
                                    <span aria-hidden="true" class="ti-close close" data-dismiss="alert"
                                          aria-label="Close"
                                          style="cursor: pointer;font-weight: 700">
                                    </span>
                                    </div>
                                </div>
                            </div>
                        <?php endif; ?>
                        <div class="form-group">
                            <div class="d-flex justfy-content-space-between">
                                <div>
                                    <label for="message" class="col-md-12">Votre message
                                        <small class="small">
                                            <?php if (Request::hasError('message')): ?>
                                                <?= Request::error('message') ?>
                                            <?php else: ?>
                                                *
                                            <?php endif; ?>
                                        </small>
                                    </label>
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
                            <div class="col-md-12 small mb-2" id="error-container">
                            </div>
                            <div class="col-md-12">
                                <textarea rows="5" id='message'
                                          class="form-control form-control-line <?php if (Request::hasError('message')): ?>error<?php endif; ?>"
                                          name="message"></textarea>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-12">
                                <button class="btn btn-success text-white px-5" id="subject-btn"
                                        style="width: 10rem">
                                    repondre
                                </button>
                            </div>
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
                    <i class="fa fa-exclamation-triangle" style="color: red">
                    </i>
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
                <i class="fas fa-book-open twinkle">
                </i>&nbsp;&nbsp;<?= ($user->about_me) ?? 'Donnez aux autres une bref decription de qui vous êtes ..' ?>
                .
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