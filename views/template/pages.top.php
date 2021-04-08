<!doctype html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="icon" type="image/png" href="<?= makeRootOrFileUrl("images/logo.png") ?>"/>
    <!-- Stylesheet   -->
    <link rel="stylesheet" href='<?= makeRootOrFileUrl("public/css/import/bootstrap/bootstrap-mdb.css") ?>'>
<!--    <link rel="preconnect" href="https://fonts.gstatic.com">-->
<!--    <link href="https://fonts.googleapis.com/css2?family=Lato:ital,wght@0,300;0,400;0,700;0,900;1,100;1,300;1,400;1,700&display=swap"-->
<!--          rel="stylesheet">-->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Ubuntu:ital,wght@0,300;0,400;0,500;0,700;1,300&display=swap" rel="stylesheet">
    <link rel="stylesheet" href='<?= makeRootOrFileUrl("public/css/style.css") ?>'>
    <?= suppl_tags($links ?? [], LINK) ?>
    <!-- Stylesheet   -->
    <title><?= $title ?? "Title" ?></title>
</head>
<body>
<!--<div class="waiting">-->
<!--    <div class="loader">-->
<!--        <div class="spinner-grow rezise" role="status">-->
<!--            <span class="sr-only">Loading...</span>-->
<!--        </div>-->
<!--    </div>-->
<!--</div>-->
<header class="header">
    <nav class="mb-1 navbar navbar-expand-lg navbar-light grey darken-2 lighten-1">
        <a href="#" class="navbar-brand"><img src="<?= makeRootOrFileUrl('images/cpy.jpeg') ?>" alt=""
                                              class="img-responsive rounded-circle" width="40px"><span class="ml-2 ">CIPY</span></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#cpy"
                aria-controls="navbarSupportedContent-555" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="cpy">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item <?php if (current_route() == makeRootOrFileUrl('home')): ?>active<?php endif; ?>">
                    <a class="nav-link" href="<?= makeRootOrFileUrl('home') ?>"><i class="fa fa-home"></i>Acceuil
                        <span class="sr-only">(current)</span>
                    </a>
                </li>
                <li class="nav-item <?php if (current_route() == makeRootOrFileUrl('login')): ?>active<?php endif; ?>">
                    <a class="nav-link" href="<?= makeRootOrFileUrl('login') ?>"><i class="fas fa-user"></i>Connexion</a>
                </li>
                <li class="nav-item <?php if (current_route() == makeRootOrFileUrl('register')): ?>active<?php endif; ?>">
                    <a class="nav-link" href="<?= makeRootOrFileUrl('register') ?>"><i class="fas fa-sign-in-alt"></i>Inscriprtion</a>
                </li>
            </ul>
            <ul class="navbar-nav ml-auto nav-flex-icons">
                <li class="nav-item avatar">
                    <i class="nav-link p-0">
                        <img src="<?= makeRootOrFileUrl($user_image ?? 'images/user-default.jpg') ?>"
                             class="rounded-circle z-depth-0"
                             alt="avatar image" height="35px">
                    </i>
                </li>
            </ul>
        </div>
    </nav>
</header>
