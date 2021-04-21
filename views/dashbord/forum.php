<div class="container-fluid">
    <div class="row">
        <div class="col-lg-12 p-0">
            <div class="card-body">
                <h4>Liste des forums</h4>
                <div>
                    <i class="fa fa-exclamation-triangle" style="color: red"></i>
                    Veuillez cliquer sur l'icone ou le nom du forum pour acceder au forum en question.
                </div>
            </div>
            <div class="table-responsive">
                <table class="table v-middle">
                    <thead>
                    <tr class="bg-light">
                        <th class="border-top-0 text-start">Nom</th>
                        <th class="border-top-0 text-center">Description</th>
                        <th class="border-top-0 text-end">Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php use Service\DateTime\DateTimeCommentStyle;

                    foreach ($forums as $forum): ?>
                        <tr>
                            <td>
                                <div class="d-flex align-items-center">
                                    <div class="m-r-10">
                                        <a href="<?= makeRootOrFileUrl(sprintf('forum/categorie/%s', $forum->categorie->slug)) ?>">
                                            <img src="<?= makeRootOrFileUrl($forum->icon) ?>" alt="user" width="50"
                                                 height="50"
                                                 class="rounded-circle img-cover">
                                        </a>
                                    </div>
                                    <div class="forum-name">
                                        <a href="<?= makeRootOrFileUrl(sprintf('forum/categorie/%s', $forum->categorie->slug)) ?>">
                                            <h4 class="m-b-0 font-16"><?= strtoupper($forum->name) ?></h4>
                                        </a>
                                    </div>
                                </div>
                            </td>
                            <td class="text-justify">
                                <?= makeStrong($forum->description) ?>
                            </td>
                            <td class="text-end">
                                <label class="label label-danger">Quitter</label>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <?php if ($forumRecentSubjects): ?>
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Sujets recents</h4>
                    </div>
                    <div class="comment-widgets scrollable p-0">
                        <?php foreach ($forumRecentSubjects as $forumRecentSubject) : ?>
                            <a href="<?= makeRootOrFileUrl(sprintf('forum/subject/%s', $forumRecentSubject->slug)) ?>"
                               class="suject-link">
                                <div class="d-flex flex-row comment-row">
                                    <div class="p-2"><img
                                                src="<?= makeRootOrFileUrl($forumRecentSubject->user->image) ?>"
                                                alt="user" width="50" height="50"
                                                class="rounded-circle"></div>
                                    <div class="comment-text w-100">
                                        <h6 class="font-medium"><?= $forumRecentSubject->user->username ?? $forumRecentSubject->user->prenom ?></h6>
                                        <span class="m-b-15 d-block"><?= $forumRecentSubject->message ?></span>
                                        <div class="comment-footer">
                                            <span class="text-muted float-end"><?= DateTimeCommentStyle::setTimestamp($forumRecentSubject->created_at)::getDateCommentStyle() ?></span>
                                            <span class="label label-rounded label-primary float-left">En cours...</span>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        <?php endforeach; ?>
                    </div>
                </div>
            </div>
        </div>
    <?php endif; ?>
</div>