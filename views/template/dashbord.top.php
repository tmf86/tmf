<?php

use Contoller\Http\Request;
use Contoller\Middleware\AuthMiddleware;

?>
<!DOCTYPE html>
<html dir="ltr" lang="fr">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="robots" content="noindex,nofollow">
    <title><?= $title ?? '' ?></title>
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="<?= makeRootOrFileUrl("images/logo.png") ?>">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Ubuntu:ital,wght@0,300;0,400;0,500;0,700;1,300&display=swap"
          rel="stylesheet">
    <link href="<?= makeRootOrFileUrl("public/css/import/user-dashbord/style.min.css") ?>" rel="stylesheet">
    <link rel="stylesheet" href='<?= makeRootOrFileUrl("public/css/dashbord.css") ?>'>
    <?= suppl_tags($links ?? [], LINK) ?>
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
    <script src="https://kit.fontawesome.com/37da887623.js" crossorigin="anonymous"></script>
</head>
<style>
    #msg_retour_bad,#msg_retour_ok{
        display: none;
    }
    #btn_suggerer,#btn_valider{
        margin-left: 5%;
    }
    .sup{
        border: 1px solid white;
        border-radius: 5rem;
        padding: 5px;
        width: 5%;
        height: 0.6rem;
        /*height: 100%;*/
        background-color:deepskyblue;
        color: white;
        overflow: hidden;
        box-sizing: content-box;
        position: relative;
        left: -15%;
        top: -1.1rem;
        text-align: center;
        justify-content: center;
        cursor: pointer;
    }
    .sup span{
        position: relative;
       top: 50%;
    }
</style>
<body>
<!--<div class="preloader">-->
<!--    <div class="lds-ripple">-->
<!--        <div class="lds-pos"></div>-->
<!--        <div class="lds-pos"></div>-->
<!--    </div>-->
<!--</div>-->
<div id="main-wrapper" data-layout="vertical" data-navbarbg="skin5" data-sidebartype="full"
     data-sidebar-position="absolute" data-header-position="absolute" data-boxed-layout="full">
    <header class="topbar" data-navbarbg="skin5">
        <nav class="navbar top-navbar navbar-expand-md navbar-dark shadow">
            <div class="navbar-header" data-logobg="skin5">
                <a class="navbar-brand" href="<?= makeRootOrFileUrl('home') ?>">
                    <img src="<?= makeRootOrFileUrl('images/cpy.jpeg') ?>" width="45" alt="homepage"
                         class="img-responsive rounded-circle"/>
                    &nbsp;&nbsp;CIPY
                </a>
                <?php if (AuthMiddleware::asUserAuthenticated()): ?>
                    <a class="nav-toggler waves-effect waves-light d-block d-md-none" href="javascript:void(0)"><i
                                class="ti-menu ti-close"></i></a>
                <?php endif; ?>
            </div>
            <div class="navbar-collapse collapse" id="navbarSupportedContent" data-navbarbg="skin5">
                <ul class="navbar-nav float-start me-auto" style="visibility: hidden">
                    <li class="nav-item search-box"><a class="nav-link waves-effect waves-dark"
                                                       href="javascript:void(0)"><i class="ti-search"></i></a>
                        <form class="app-search position-absolute">
                            <input type="text" class="form-control" placeholder="Search &amp; enter"> <a
                                    class="srh-btn"><i class="ti-close"></i></a>
                        </form>
                    </li>
                </ul>
                <ul class="navbar-nav float-left">
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle text-muted waves-effect waves-dark pro-pic" href="#"
                           id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            <img src="<?= makeRootOrFileUrl($user->image ?? 'images/user-default.jpg') ?>"
                                 alt="user"
                                 class="rounded-circle" width="31" height="31">
                        </a>
                        <?php if (AuthMiddleware::asUserAuthenticated()): ?>
                            <ul class="dropdown-menu dropdown-menu-end user-dd animated p-0"
                                aria-labelledby="navbarDropdown">
                                <a class="dropdown-item <?php if (current_route() === makeRootOrFileUrl('profile')) : ?> active <?php endif; ?>"
                                   href="<?= makeRootOrFileUrl('profile') ?>"><i
                                            class="ti-user m-r-5 m-l-5"></i> Mon profile</a>
                                <a class="dropdown-item" href="javascript:void(0)"><i class="ti-email m-r-5 m-l-5"></i>
                                    Inbox</a>
                            </ul>
                        <?php endif; ?>
                    </li>
                </ul>
            </div>
        </nav>
    </header>
    <?php if (AuthMiddleware::asUserAuthenticated()): ?>
    <aside class="left-sidebar" data-sidebarbg="skin6">
        <div class="scroll-sidebar">
            <nav class="sidebar-nav">
                <ul id="sidebarnav">
                    <li>
                        <div class="user-profile d-flex no-block dropdown m-t-20">
                            <div class="user-pic"><img src="<?= makeRootOrFileUrl($user->image) ?>"
                                                       alt="users"
                                                       style="border-radius: 50%" width="40" height="40"/></div>
                            <div class="user-content hide-menu m-l-10">
                                <a href="#" class="" id="Userdd" role="button"
                                   data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <h5 class="m-b-0 user-name font-medium"><?= $user->nom . ' ' . $user->prenom ?>
                                        <i class="fa fa-angle-down"></i></h5>
                                    <span class="op-5 user-email"><?= $user->email ?></span>
                                </a>
                                <div class="dropdown-menu dropdown-menu-end p-0" aria-labelledby="Userdd">
                                    <a class="dropdown-item <?php if (current_route() === makeRootOrFileUrl('profile')) : ?> active <?php endif; ?>"
                                       href="<?= makeRootOrFileUrl('profile') ?>"><i
                                                class="ti-user m-r-5 m-l-5"></i> Mon profile</a>
                                    <a class="dropdown-item" href="javascript:void(0)"><i
                                                class="ti-email m-r-5 m-l-5"></i> Inbox</a>
                                    <a class="dropdown-item" href="<?= makeRootOrFileUrl('logout') ?>"><i
                                                class="fa fa-power-off m-r-5 m-l-5"></i>Se deconnecter</a>
                                </div>
                            </div>
                        </div>
                        <!-- End User Profile-->
                    </li>
                    <!-- User Profile-->
                    <li class="sidebar-item">
                        <a class="sidebar-link waves-effect waves-dark sidebar-link"
                           href="<?= makeRootOrFileUrl('profile') ?>" aria-expanded="false">
                            <i class="ti-user m-r-5 m-l-5"></i>
                            <span class="hide-menu">Profile</span></a>
                    </li>
                    <li class="sidebar-item">
                        <a class="sidebar-link waves-effect waves-dark sidebar-link <?php if (current_route() == makeRootOrFileUrl(sprintf('forum/categorie/%s', $slug ?? ''))): ?>active<?php endif; ?>"
                           href="<?= makeRootOrFileUrl('forum') ?>" aria-expanded="false">
                            <i class="ti-comments m-r-5 m-l-5"></i>
                            <span class="hide-menu">Forum</span></a>
                    </li>
                    <li class="sidebar-item">
                        <a class="sidebar-link waves-effect waves-dark sidebar-link <?php if (current_route() == makeRootOrFileUrl(sprintf('forum/categorie/%s', $slug ?? ''))): ?>active<?php endif; ?>"
                           href="<?= makeRootOrFileUrl('validation') ?>" aria-expanded="false">
                            <i class="ti-key m-r-5 m-l-5"></i>
                            <span class="hide-menu">Validation</span></a>
                    </li>
                    <li class="sidebar-item">
                        <a class="sidebar-link waves-effect waves-dark sidebar-link <?php if (current_route() == makeRootOrFileUrl(sprintf('forum/categorie/%s', $slug ?? ''))): ?>active<?php endif; ?>"
                           href="<?= makeRootOrFileUrl('suggestion') ?>" aria-expanded="false">
                            <i class="ti-comment-alt m-r-5 m-l-5"></i>
                            <span class="hide-menu">Suggestion</span></a>
                    </li>
                    <li class="sidebar-item">
                        <a class="sidebar-link waves-effect waves-dark sidebar-link <?php if (current_route() == makeRootOrFileUrl(sprintf('forum/categorie/%s', $slug ?? ''))): ?>active<?php endif; ?>"
                           href="<?= makeRootOrFileUrl('notifications') ?>" aria-expanded="false">
                            <i class="ti-bell m-r-5 m-l-5"></i><sup class="sup" ><span id="nbr_notif">0</span></sup>
                            <span class="hide-menu">Notifications </span></a>
                    </li>
                </ul>

            </nav>
        </div>
    </aside>
    <div class="page-wrapper">
        <?php endif; ?>
        <div class="page-breadcrumb">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-md-12">
                        <?php if (current_route() === makeRootOrFileUrl('profile')) : ?>
                            <h4 class="page-title text-center" style="font-size: 1.2rem !important;">
                                <img src="<?= makeRootOrFileUrl('images/profile-icon.png') ?>" alt="user"
                                     width="50"
                                     height="50" class="rounded-circle img-cover">
                                Profile
                            </h4>
                        <?php endif; ?>
                        <?php $current_route = current_route();
                        if ($current_route === makeRootOrFileUrl('forum') ||
                            $current_route === makeRootOrFileUrl(sprintf('forum/categorie/%s', $slug ?? '')) ||
                            current_route() === makeRootOrFileUrl(sprintf('forum/subject/%s', $subject->slug ?? ''))) :?>
                            <h4 class="page-title text-uppercase text-center" style="font-size: 1.2rem !important;">
                                <img src="<?= makeRootOrFileUrl('images/forum.png') ?>" alt="user"
                                     width="50"
                                     height="50" class="rounded-circle img-cover">
                                Forum</h4>
                        <?php endif; ?>
                        <nav class="navbar navbar-expand-lg navbar-light ">
                            <a class="navbar-brand" href="<?= makeRootOrFileUrl('home') ?>"
                               style="font-size: 14px !important;">
                                <img src="<?= makeRootOrFileUrl('images/home2.jpg') ?>" alt="user" width="45"
                                     height="45" class="rounded-circle img-cover">
                                Accueil
                            </a>
                            <span class="navbar-toggler ti-menu ti-close cursor-pointer" data-toggle="collapse"
                                  data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false"
                                  aria-label="Toggle navigation"></span>
                            <!--                        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav"-->
                            <!--                                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">-->
                            <!--                            <span class="navbar-toggler-icon"></span>-->
                            <!--                        </button>-->
                            <div class="collapse navbar-collapse" id="navbarNav">
                                <ul class="navbar-nav">
                                    <?php if (current_route() === makeRootOrFileUrl('forum')) : ?>
                                        <li class="nav-item active">
                                            <a class="nav-link" href="<?= makeRootOrFileUrl('forum') ?>">
                                                <img src="<?= makeRootOrFileUrl('images/forum.png') ?>" alt="user"
                                                     width="25"
                                                     height="25" class="rounded-circle img-cover">
                                                Forum
                                            </a>
                                        </li>
                                    <?php endif ?>
                                    <?php if (current_route() === makeRootOrFileUrl(sprintf('forum/categorie/%s', $slug ?? ''))): ?>
                                        <li class="nav-item">
                                            <a class="nav-link" href="<?= makeRootOrFileUrl('forum') ?>">
                                                <img src="<?= makeRootOrFileUrl('images/forum.png') ?>" alt="user"
                                                     width="25"
                                                     height="25" class="rounded-circle img-cover">
                                                Forum
                                            </a>
                                        </li>
                                        <li class="nav-item active">
                                            <a class="nav-link"
                                               href="<?= makeRootOrFileUrl(sprintf('forum/categorie/%s', $slug ?? '')) ?>">
                                                <img src="<?= makeRootOrFileUrl($forum->icon) ?>" alt="user" width="23"
                                                     height="23" class="rounded-circle img-cover">
                                                <?= ucwords($forumName) ?>
                                            </a>
                                        </li>
                                    <?php endif; ?>
                                    <?php if (current_route() === makeRootOrFileUrl(sprintf('forum/subject/%s', $subject->slug ?? ''))): ?>
                                        <li class="nav-item">
                                            <a class="nav-link" href="<?= makeRootOrFileUrl('forum') ?>">
                                                <img src="<?= makeRootOrFileUrl('images/forum.png') ?>" alt="user"
                                                     width="25"
                                                     height="25" class="rounded-circle img-cover">
                                                Forum
                                            </a>
                                        </li>
                                        <li class="nav-item active">
                                            <a class="nav-link"
                                               href="<?= makeRootOrFileUrl(sprintf('forum/categorie/%s', $forum->slug ?? '')) ?>">
                                                <img src="<?= makeRootOrFileUrl($forum->icon) ?>" alt="user" width="23"
                                                     height="23" class="rounded-circle img-cover">
                                                <?= ucwords($forum->name) ?>
                                            </a>
                                        </li>
                                    <?php endif; ?>
                                    <?php if (current_route() === makeRootOrFileUrl('profile')) : ?>
                                        <li class="nav-item active">
                                            <a class="nav-link" href="<?= makeRootOrFileUrl('profile') ?>">
                                                <img src="<?= makeRootOrFileUrl('images/paramettre.png') ?>" alt="user"
                                                     width="25"
                                                     height="25" class="rounded-circle img-cover">
                                                Paramètres</a>
                                        </li>
                                    <?php endif; ?>
                                </ul>
                            </div>
                        </nav>
                    </div>
                    <?php if (session('subject')): ?>
                        <div class="col-md-12 mt-1">
                            <div class="alert alert-success fade show text-justify" role="alert">
                                Le sujet a été ajouté avec succès , il sera maintenant visible par tous les
                                visiteurs et
                                membres du forum et avec une aussi grande communauté vous trouverai certainement
                                ceque
                                vous cherchiez.
                            </div>
                        </div>
                    <?php
                    endif;
                    Request::staticSessionUnset('subject');
                    ?>
                    <?php if (session('replay')): ?>
                        <div class="col-md-12 mt-1">
                            <div class="alert alert-success  fade show text-center" role="alert">
                                Réponse(s) ajoutée(s) !
                            </div>
                        </div>
                    <?php
                    endif;
                    Request::staticSessionUnset('replay');
                    ?>
                    <?php if (session('setreplaysession')): ?>
                        <div class="col-md-12 mt-1">
                            <div class="alert alert-warning fade show text-justify" role="alert">
                                <i class="fa fa-exclamation-triangle" style="color: red"></i>&ensp;
                                Votre message a été sauvegarder mais ne sera ajouté qu' a votre prochaine
                                connexion , veuillez vous connecter <a href="<?= makeRootOrFileUrl('login') ?>">ici</a>
                                ou si vous n'avez pas encore de compte veuillez en créer un <a
                                        href="<?= makeRootOrFileUrl('register') ?>">ici</a>
                            </div>
                        </div>
                    <?php
                    endif;
                    Request::staticSessionUnset('setreplaysession');
                    ?>
                </div>
            </div>
        </div>
