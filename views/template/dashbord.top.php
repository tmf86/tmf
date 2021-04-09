<?php

use Contoller\Middleware\Auth;

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
</head>

<body <?php if (!Auth::asUserAuthenticated()): ?> style="background: #eef5f9;" <?php endif; ?> >
<div class="preloader">
    <div class="lds-ripple">
        <div class="lds-pos"></div>
        <div class="lds-pos"></div>
    </div>
</div>
<div id="main-wrapper" data-layout="vertical" data-navbarbg="skin5" data-sidebartype="full"
     data-sidebar-position="absolute" data-header-position="absolute" data-boxed-layout="full">
    <header class="topbar" data-navbarbg="skin5">
        <nav class="navbar top-navbar navbar-expand-md navbar-dark">
            <div class="navbar-header" data-logobg="skin5">
                <a class="navbar-brand" href="index.html">
                    <b class="logo-icon">
                        <img src="<?= makeRootOrFileUrl('images/logo-icon.png') ?>" alt="homepage" class="dark-logo"/>
                        <img src="<?= makeRootOrFileUrl('images/logo-light-icon.png') ?>" alt="homepage"
                             class="light-logo"/>
                    </b>
                    <span class="logo-text">
                            <img src="<?= makeRootOrFileUrl('images/logo-text.png') ?>" alt="homepage"
                                 class="dark-logo"/>
                            <img src="<?= makeRootOrFileUrl('images/logo-light-text.png') ?>" class="light-logo"
                                 alt="homepage"/>
                        </span>
                </a>
                <?php if (Auth::asUserAuthenticated()): ?>
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
                        <?php if (Auth::asUserAuthenticated()): ?>
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
    <?php if (Auth::asUserAuthenticated()): ?>
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
                        <a class="sidebar-link waves-effect waves-dark sidebar-link <?php if (current_route() == makeRootOrFileUrl(sprintf('forum/category/%s', $category ?? ''))): ?>active<?php endif; ?>"
                           href="<?= makeRootOrFileUrl('forum') ?>" aria-expanded="false">
                            <i class="ti-comment-alt m-r-5 m-l-5"></i>
                            <span class="hide-menu">Forum</span></a>
                    </li>
                </ul>

            </nav>
        </div>
    </aside>
    <div class="page-wrapper">
        <?php endif; ?>
        <div class="page-breadcrumb">
            <div class="row align-items-center">
                <div class="col-5">
                    <?php if (current_route() === makeRootOrFileUrl('profile')) : ?>
                        <h4 class="page-title">Profile</h4>
                    <?php endif; ?>
                    <?php $current_route = current_route();
                    if ($current_route === makeRootOrFileUrl('forum') || $current_route === makeRootOrFileUrl(sprintf('forum/category/%s', $category ?? ''))) :?>
                        <h4 class="page-title">Forum</h4>
                    <?php endif; ?>
                    <div class="d-flex align-items-center mt-3">
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="<?= makeRootOrFileUrl('home') ?>">Acceuil</a></li>
                                <?php if (current_route() === makeRootOrFileUrl('forum')) : ?>
                                    <li class="breadcrumb-item active" aria-current="page"><a
                                                href="<?= makeRootOrFileUrl('forum') ?>">Forum</a></li>
                                <?php endif ?>
                                <?php if (current_route() === makeRootOrFileUrl(sprintf('forum/category/%s', $category ?? ''))): ?>
                                    <li class="breadcrumb-item" aria-current="page"><a
                                                href="<?= makeRootOrFileUrl('forum') ?>">Forum</a></li>
                                    <li class="breadcrumb-item active" aria-current="page"><a
                                                href="<?= makeRootOrFileUrl(sprintf('forum/category/%s', $category ?? '')) ?>"><?= $category ?></a>
                                    </li>
                                <?php endif; ?>
                                <?php if (current_route() === makeRootOrFileUrl('profile')) : ?>
                                    <li class="breadcrumb-item active" aria-current="page"><a
                                                href="<?= makeRootOrFileUrl('profile') ?>">Paramètres</a></li>
                                <?php endif; ?>

                            </ol>
                        </nav>
                    </div>
                </div>
                <div class="col-7">
                    <div class="text-end upgrade-btn">
                        <?php if (Auth::asUserAuthenticated() && current_route() === makeRootOrFileUrl('profile')): ?>
<!--                            <a href="" class="btn btn-danger text-white"-->
<!--                               target="">Supprimer le compte</a>-->
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
