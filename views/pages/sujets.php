<?php

use Model\Correction;

$i = 0;
$j = 0;
$k = 0;
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
    <style>
        .btn-customized {
            letter-spacing: 0.1em;
            cursor: pointer;
            font-size: 14px;
            font-weight: 400;
            position: relative;
            text-decoration: none;
            text-transform: uppercase;
            padding: .5rem;
            width: 100%;
        }

        .btn-customized:focus {
            outline: 0;
        }

        /*btn_background*/
        .effect01 {
            color: #FFF;
            border: 1px solid #414755;
            box-shadow: 0 0 0 1px #414755 inset;
            background-color: #414755;
            overflow: hidden;
            position: relative;
            transition: all 0.3s ease-in-out;
        }

        .effect01:hover {
            /*border: 1px solid #666;*/
            color: #fff;
            /*background-color: #FFF;*/
            /*box-shadow: 0 0 0 4px #EEE inset;*/
        }

        /*btn_text*/
        .effect01 span {
            transition: all 0.2s ease-out;
            z-index: 2;
        }

        .effect01:hover span {
            letter-spacing: 0.13em;
            color: #333;
        }

        /*highlight*/
        .effect01:after {
            background: #FFF;
            border: 0 solid #414755;
            content: "";
            height: 155px;
            left: -75px;
            opacity: .8;
            position: absolute;
            top: -50px;
            -webkit-transform: rotate(35deg);
            transform: rotate(35deg);
            width: 50px;
            transition: all 1s cubic-bezier(0.075, 0.82, 0.165, 1); /*easeOutCirc*/
            z-index: 1;
        }

        .effect01:hover:after {
            background: #FFF;
            /*border: 20px solid #414755;*/
            opacity: 0;
            left: 120%;
            -webkit-transform: rotate(40deg);
            transform: rotate(40deg);
        }
    </style>
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
            <h1><a href="index.html" class="logo">Vos Sujets</a></h1>
            <ul class="list-unstyled components  nav nav-tabs mb-5" id='subjects' role="tablist"
                style="display: block !important;border-bottom: none">
                <li class="active" data-container="bts">
                    <a class="tab-item" id="home-tab" data-toggle="tab" href="#bts" role="tab"
                       aria-controls="bts"
                       aria-selected="true"><i class="fa fa-graduation-cap mr-3"></i>BTS</a>
                </li>
                <li data-container="#taskandexam">
                    <a class="tab-item" id="profile-tab" data-toggle="tab" href="#taskandexam" role="tab"
                       aria-controls="taskandexam"
                       aria-selected="false"><i class="fa fa-book-open  mr-3"></i> Devoirs&Examens</a>
                </li>
                <li data-container="#projects">
                    <a class="tab-item" id="contact-tab" data-toggle="tab" href="#projects" role="tab"
                       aria-controls="projects"
                       aria-selected="false"><i class="fas fa-project-diagram mr-3"></i>Projets</a>
                </li>
                <li>
                    <a href="<?= makeRootOrFileUrl('home') ?>"><i class="fas fa-undo mr-3"></i>Retourner a l'Acceuil</a>
                </li>
            </ul>
            <div class="mb-5">
                <div class="h6 mb-3 text-start">Rechercher des sujets a partir de l'année.</div>
                <form action="#" class="subscribe-form">
                    <div class="d-flex">
                        <div class="w-25">
                            <button type="submit" class="btn-customized effect01">
                                <i class="fa fa-search" aria-hidden="true"></i></button>
                        </div>
                        <div class="w-100">
                            <span class="custom-dropdown">
                            <select class="select" name="jour" id="jour">
                               <option selected>Choisir une date</option>
                                <?php
                                foreach ($all_date as $dt) :
                                    $d = new DateTime($dt->date_ajout);
                                    ?>
                                    <option value="<?= $d->format('Y') ?>">
                                        <?= $d->format('Y') ?>
                                    </option>
                                <?php endforeach; ?>
                            </select>
                        </span>
                        </div>
                    </div>
                </form>
            </div>

            <div class="footer">
                <p><!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                    Copyright &copy;<script>document.write(new Date().getFullYear());</script> : Club Imformatique Pigier Yamoussoukro
            </div>
        </div>
    </nav>
    <!-- Page Content  -->
    <div class="tab-content" id="content">
        <div class="tab-pane fade show active" id="bts" role="tabpanel" aria-labelledby="bts-tab">
            <div class="responsive-padd">
                <div class="table-container" role="table" aria-label="Destinations">
                    <h2 class="mb-4 text-uppercase"><i class="fa fa-graduation-cap"></i>BTS</h2>
                    <div class="flex-table row theader" role="rowgroup">
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
                                <?= $sujet->nom_sujet ?>(<?= $sujet->matiere_sujet ?>)
                                <a download="<?= $sujet->lien_sujet ?>">
                                    <i class="fa fa-download" aria-hidden="true"></i>
                                </a>
                            </div>
                            <div class="flex-row" role="cell">
                                <?php $btsCorrection = $correct->find_correction($sujet->id_sujet);
                                if (!$btsCorrection): ?>
                                    <span>Aucune Correction</span>
                                <?php else : ?>
                                    <?= $btsCorrection->nom_correct ?>
                                    <a download='<?= $btsCorrection->lien_correct ?>'>
                                        <i class="fa fa-download" aria-hidden="true"></i>
                                    </a>
                                <?php endif; ?>
                            </div>
                            <div class="flex-row" role="cell">
                                <?= $sujet->date_ajout ?>
                            </div>
                        </div>
                        <?php $i++;endforeach; ?>
                </div>
            </div>
        </div>
        <div class="tab-pane fade" id="taskandexam" role="tabpanel" aria-labelledby="taskandexam-tab">
            <div class="responsive-padd">
                <div class="table-container" role="table" aria-label="Destinations">
                    <h2 class="mb-4 text-uppercase"><i class="fa fa-book-open"></i> Devoirs&Examens</h2>
                    <div class="flex-table row theader" role="rowgroup">
                        <div class="flex-row first" role="columnheader">#</div>
                        <div class="flex-row" role="columnheader">Sujets</div>
                        <div class="flex-row" role="columnheader">Corrections</div>
                        <div class="flex-row" role="columnheader">Date d'Ajout</div>
                    </div>
                    <?php foreach ($sujet_autre as $sujet) : ?>
                        <div class="flex-table row" role="rowgroup">
                            <div class="flex-row first" role="cell">
                                <?= $k + 1 ?>
                            </div>
                            <div class="flex-row" role="cell">
                                <?= $sujet->nom_sujet ?>(<?= $sujet->matiere_sujet ?>)
                                <a download="<?= $sujet->lien_sujet ?>">
                                    <i class="fa fa-download" aria-hidden="true"></i>
                                </a>
                            </div>
                            <div class="flex-row" role="cell">
                                <?php $sujet_autre_correction = $correct->find_correction($sujet->id_sujet);
                                if (!$sujet_autre_correction): ?>
                                    <span>Aucune Correction</span>
                                <?php else : ?>
                                    <?= $sujet_autre_correction->nom_correct ?>
                                    <a download='<?= $sujet_autre_correction->lien_correct ?>'>
                                        <i class="fa fa-download" aria-hidden="true"></i>
                                    </a>
                                <?php endif; ?>
                            </div>
                            <div class="flex-row" role="cell">
                                <?= $sujet->date_ajout ?>
                            </div>
                        </div>
                        <?php $k++;endforeach; ?>
                </div>
            </div>
        </div>
        <div class="tab-pane fade" id="projects" role="tabpanel" aria-labelledby="projects-tab">
            <div class="responsive-padd">
                <div class="table-container" role="table" aria-label="Destinations">
                    <h2 class="mb-4 text-uppercase"><i class="fas fa-project-diagram"></i> Projets</h2>
                    <div class="flex-table row theader" role="rowgroup">
                        <div class="flex-row first" role="columnheader">#</div>
                        <div class="flex-row" role="columnheader">Sujets</div>
                        <div class="flex-row" role="columnheader">Corrections</div>
                        <div class="flex-row" role="columnheader">Date d'Ajout</div>
                    </div>
                    <?php foreach ($sujet_projet as $sujet) : ?>
                        <div class="flex-table row" role="rowgroup">
                            <div class="flex-row first" role="cell">
                                <?= $j + 1 ?>
                            </div>
                            <div class="flex-row" role="cell">
                                <?= $sujet->nom_sujet ?>(<?= $sujet->matiere_sujet ?>)
                                <a download="<?= $sujet->lien_sujet ?>">
                                    <i class="fa fa-download" aria-hidden="true"></i>
                                </a>
                            </div>
                            <div class="flex-row" role="cell">
                                <?php $projectsCorrection = $correct->find_correction($sujet->id_sujet);
                                if (!$projectsCorrection): ?>
                                    <span>Aucune Correction</span>
                                <?php else : ?>
                                    <?= $projectsCorrection->nom_correct ?>
                                    <a download='<?= $projectsCorrection->lien_correct ?>'>
                                        <i class="fa fa-download" aria-hidden="true"></i>
                                    </a>
                                <?php endif; ?>
                            </div>
                            <div class="flex-row" role="cell">
                                <?= $sujet->date_ajout ?>
                            </div>
                        </div>
                        <?php $j++;endforeach; ?>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="<?= makeRootOrFileUrl('public/js/import/jquery/jquery.js') ?>"></script>
<script src="<?= makeRootOrFileUrl('public/js/import/boostrap/bootstrap.js') ?>"></script>
<script src="<?= makeRootOrFileUrl('public/js/import/boostrap/popper.js') ?>"></script>
<script src="<?= makeRootOrFileUrl('public/js/script.js') ?>"></script>
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