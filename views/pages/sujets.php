<?php

use Model\Correction;

$i = 0;
$correct = new Correction();
?>
<!doctype html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="icon" type="image/png" href="<?= makeRootOrFileUrl("images/logo.png"); ?>"/>
    <link rel="stylesheet" href='<?= makeRootOrFileUrl("public/css/import/bootstrap/bootstrap-mdb.css"); ?>'>
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Ubuntu:ital,wght@0,300;0,400;0,500;0,700;1,300&display=swap"
          rel="stylesheet">
    <link rel="stylesheet" href='<?= makeRootOrFileUrl("public/css/style.css"); ?>'>
    <title><?= $title ?? "Title" ?></title>
</head>
<body>
<div class="wrapper d-flex align-items-stretch">
    <nav id="sidebar">
        <div class="custom-menu">
            <button type="button" id="sidebarCollapse" class="custum-btn">
                <i class="fa fa-bars"></i>
                <span class="sr-only">Toggle Menu</span>
            </button>
        </div>
        <div class="p-4">
            <h1><a href="index.html" class="logo">Flash</a></h1>
            <ul class="nav nav-tabs mb-5" id=myTab" role="tablist">
                <li class="active">
                    <a id="home-tab" data-toggle="tab" href="#home" role="tab"
                       aria-controls="home"
                       aria-selected="true"><i class="fa fa-graduation-cap mr-3"></i>BTS</a>
                </li>
                <li>
                    <a id="profile-tab" data-toggle="tab" href="#profile" role="tab"
                       aria-controls="profile"
                       aria-selected="false"><i class="fa fa-book-open  mr-3"></i> Devoirs / Examens</a>
                </li>
                <li>
                    <a id="contact-tab" data-toggle="tab" href="#contact" role="tab"
                       aria-controls="contact"
                       aria-selected="false"><i class="fa fa-desktop mr-3"></i> Projets</a>
                </li>
            </ul>
        </div>
    </nav>

    <!-- Page Content  -->
    <div class="tab-content" id="content">
        <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
            <div class="table-container" role="table" aria-label="Destinations">
                <div class="flex-table header" role="rowgroup">
                    <div class="flex-row first" role="columnheader">#</div>
                    <div class="flex-row" role="columnheader">Sujets</div>
                    <div class="flex-row" role="columnheader">Corrections</div>
                    <div class="flex-row" role="columnheader">Date d'Ajout</div>
                </div>
                <?php foreach ($sujet_bts as $sujet) : ?>
                    <div class="flex-table row" role="rowgroup">
                        <div class="flex-row first" role="cell">
                            <?= $i + 1 ?>
                        </div>
                        <div class="flex-row" role="cell">
                            <a download="<?= $sujet->lien_sujet ?>">
                                <?= $sujet->nom_sujet ?>(<?= $sujet->matiere_sujet ?>)
                            </a>
                        </div>
                        <div class="flex-row" role="cell">
                            <?php
                            $correct = $correct->find_correction($sujet->id_sujet);
                            if (!$correct) {
                                echo "<span>Aucune Correction</span>";
                            } else {
                                echo '<a download="' . $correct->lien_correct . '">' . $correct->nom_correct . '</a>';
                            }
                            ?>
                        </div>
                        <div class="flex-row" role="cell">
                            <?= $sujet->date_ajout ?>
                        </div>
                    </div>
                    <?php $i++;endforeach; ?>
            </div>
        </div>
        <div class="tab-pane fade" id="contact" role="tabpanel" aria-labelledby="contact-tab">
            <div class="table-container" role="table" aria-label="Destinations">
                <div class="flex-table header" role="rowgroup">
                    <div class="flex-row first" role="columnheader">#</div>
                    <div class="flex-row" role="columnheader">Sujets</div>
                    <div class="flex-row" role="columnheader">Corrections</div>
                    <div class="flex-row" role="columnheader">Date d'Ajout</div>
                </div>
                <?php foreach ($sujet_bts as $sujet) : ?>
                    <div class="flex-table row" role="rowgroup">
                        <div class="flex-row first" role="cell">
                            <?= $i + 1 ?>
                        </div>
                        <div class="flex-row" role="cell">
                            <a download="<?= $sujet->lien_sujet ?>">
                                <?= $sujet->nom_sujet ?>(<?= $sujet->matiere_sujet ?>)
                            </a>
                        </div>
                        <div class="flex-row" role="cell">
                            <?php
                            $correct = $correct->find_correction($sujet->id_sujet);
                            if (!$correct) {
                                echo "<span>Aucune Correction</span>";
                            } else {
                                echo '<a download="' . $correct->lien_correct . '">' . $correct->nom_correct . '</a>';
                            }
                            ?>
                        </div>
                        <div class="flex-row" role="cell">
                            <?= $sujet->date_ajout ?>
                        </div>
                    </div>
                    <?php $i++;endforeach; ?>
            </div>
        </div>
        <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
            <div class="table-container" role="table" aria-label="Destinations">
                <div class="flex-table" role="rowgroup">
                    <div class="flex-row first" role="columnheader">#</div>
                    <div class="flex-row" role="columnheader">Sujets</div>
                    <div class="flex-row" role="columnheader">Corrections</div>
                    <div class="flex-row" role="columnheader">Date d'Ajout</div>
                </div>
                <?php foreach ($sujet_bts as $sujet) : ?>
                    <div class="flex-table row" role="rowgroup">
                        <div class="flex-row first" role="cell">
                            <?= $i + 1 ?>
                        </div>
                        <div class="flex-row" role="cell">
                            <a download="<?= $sujet->lien_sujet ?>">
                                <?= $sujet->nom_sujet ?>(<?= $sujet->matiere_sujet ?>)
                            </a>
                        </div>
                        <div class="flex-row" role="cell">
                            <?php
                            $correct = $correct->find_correction($sujet->id_sujet);
                            if (!$correct) {
                                echo "<span>Aucune Correction</span>";
                            } else {
                                echo '<a download="' . $correct->lien_correct . '">' . $correct->nom_correct . '</a>';
                            }
                            ?>
                        </div>
                        <div class="flex-row" role="cell">
                            <?= $sujet->date_ajout ?>
                        </div>
                    </div>
                    <?php $i++;endforeach; ?>
            </div>
        </div>
    </div>
</div>

<script src="<?= makeRootOrFileUrl('public/js/import/jquery/jquery.js') ?>"></script>
<script src="<?= makeRootOrFileUrl('public/js/import/boostrap/bootstrap.js') ?>"></script>
<script src="<?= makeRootOrFileUrl('public/js/import/boostrap/popper.js') ?>"></script>
<script>
    var fullHeight = function () {

        $('.js-fullheight').css('height', $(window).height());
        $(window).resize(function () {
            $('.js-fullheight').css('height', $(window).height());
        });

    };
    fullHeight();
    $('#sidebarCollapse').on('click', function () {
        $('#sidebar').toggleClass('active');
    });
</script>
</body>
</html>