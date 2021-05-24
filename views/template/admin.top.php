<?php
    ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Cipiy | Dashboard</title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="<?= makeRootOrFileUrl("public/plugins/fontawesome-free/css/all.min.css"); ?>">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- Tempusdominus Bootstrap 4 -->
    <link rel="stylesheet" href="<?= makeRootOrFileUrl("public/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css"); ?>">
    <!-- Select2 -->
    <link rel="stylesheet" href="<?= makeRootOrFileUrl("public/plugins/select2/css/select2.min.css"); ?>">
    <link rel="stylesheet" href="<?= makeRootOrFileUrl("public/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css"); ?>">

    <!-- iCheck -->
    <link rel="stylesheet" href="<?= makeRootOrFileUrl("public/plugins/icheck-bootstrap/icheck-bootstrap.min.css"); ?>">
    <!-- JQVMap -->
    <link rel="stylesheet" href="<?= makeRootOrFileUrl("public/plugins/jqvmap/jqvmap.min.css"); ?>">
    <!-- Theme style -->
    <link rel="stylesheet" href="<?= makeRootOrFileUrl("public/dist/css/adminlte.min.css"); ?>">
    <!-- overlayScrollbars -->
    <link rel="stylesheet" href="<?= makeRootOrFileUrl("public/plugins/overlayScrollbars/css/OverlayScrollbars.min.css"); ?>">
    <!-- Daterange picker -->
    <link rel="stylesheet" href="<?= makeRootOrFileUrl("public/plugins/daterangepicker/daterangepicker.css"); ?>">
    <!-- summernote -->
    <link rel="stylesheet" href="<?= makeRootOrFileUrl("public/plugins/summernote/summernote-bs4.min.css"); ?>">
    <!-- SweetAlert2 -->
    <link rel="stylesheet" href="<?= makeRootOrFileUrl("public/plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css"); ?>">
    <!-- Toastr -->
    <link rel="stylesheet" href="<?= makeRootOrFileUrl("public/plugins/toastr/toastr.min.css"); ?>">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="<?= makeRootOrFileUrl("public//plugins/fontawesome-free/css/all.min.css"); ?>">
</head>
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">

    <!-- Preloader -->
    <div class="preloader flex-column justify-content-center align-items-center">
        <img class="animation__shake" src="<?= makeRootOrFileUrl("public/dist/img/AdminLTELogo.png"); ?>" alt="Cipy" height="60" width="60">
    </div>

    <!-- Navbar -->
    <nav class="main-header navbar navbar-expand navbar-white navbar-light">
        <!-- Left navbar links -->
        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
            </li>
            <li class="nav-item d-none d-sm-inline-block">
                <a href="home_admin" class="nav-link">Acceuil</a>
            </li>
            <li class="nav-item d-none d-sm-inline-block">
                <a href="#" class="nav-link">Contact</a>
            </li>
        </ul>

        <!-- Right navbar links -->
        <ul class="navbar-nav ml-auto">
            <!-- Navbar Search -->
            <li class="nav-item">
                <a class="nav-link" data-widget="navbar-search" href="#" role="button">
                    <i class="fas fa-search"></i>
                </a>
                <div class="navbar-search-block">
                    <form class="form-inline">
                        <div class="input-group input-group-sm">
                            <input class="form-control form-control-navbar" type="search" placeholder="Recherche" aria-label="Search">
                            <div class="input-group-append">
                                <button class="btn btn-navbar" type="submit">
                                    <i class="fas fa-search"></i>
                                </button>
                                <button class="btn btn-navbar" type="button" data-widget="navbar-search">
                                    <i class="fas fa-times"></i>
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </li>

            <!-- Messages Dropdown Menu -->
            <li class="nav-item dropdown">
                <a class="nav-link" data-toggle="dropdown" href="#">
                    <i class="far fa-comments"></i>
                    <span class="badge badge-danger navbar-badge">3</span>
                </a>
                <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                    <a href="#" class="dropdown-item">
                        <!-- Message Start -->
                        <div class="media">
                            <img src="dist/img/user1-128x128.jpg" alt="User Avatar" class="img-size-50 mr-3 img-circle">
                            <div class="media-body">
                                <h3 class="dropdown-item-title">
                                    Brad Diesel
                                    <span class="float-right text-sm text-danger"><i class="fas fa-star"></i></span>
                                </h3>
                                <p class="text-sm">Call me whenever you can...</p>
                                <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> 4 Hours Ago</p>
                            </div>
                        </div>
                        <!-- Message End -->
                    </a>
                    <div class="dropdown-divider"></div>
                    <a href="#" class="dropdown-item">
                        <!-- Message Start -->
                        <div class="media">
                            <img src="dist/img/user8-128x128.jpg" alt="User Avatar" class="img-size-50 img-circle mr-3">
                            <div class="media-body">
                                <h3 class="dropdown-item-title">
                                    John Pierce
                                    <span class="float-right text-sm text-muted"><i class="fas fa-star"></i></span>
                                </h3>
                                <p class="text-sm">I got your message bro</p>
                                <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> 4 Hours Ago</p>
                            </div>
                        </div>
                        <!-- Message End -->
                    </a>
                    <div class="dropdown-divider"></div>
                    <a href="#" class="dropdown-item">
                        <!-- Message Start -->
                        <div class="media">
                            <img src="dist/img/user3-128x128.jpg" alt="User Avatar" class="img-size-50 img-circle mr-3">
                            <div class="media-body">
                                <h3 class="dropdown-item-title">
                                    Nora Silvester
                                    <span class="float-right text-sm text-warning"><i class="fas fa-star"></i></span>
                                </h3>
                                <p class="text-sm">The subject goes here</p>
                                <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> 4 Hours Ago</p>
                            </div>
                        </div>
                        <!-- Message End -->
                    </a>
                    <div class="dropdown-divider"></div>
                    <a href="#" class="dropdown-item dropdown-footer">See All Messages</a>
                </div>
            </li>
            <!-- Notifications Dropdown Menu -->
            <li class="nav-item dropdown">
                <a class="nav-link" data-toggle="dropdown" href="#">
                    <i class="far fa-bell"></i>
                    <span class="badge badge-warning navbar-badge">15</span>
                </a>
                <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                    <span class="dropdown-item dropdown-header">15 Notifications</span>
                    <div class="dropdown-divider"></div>
                    <a href="#" class="dropdown-item">
                        <i class="fas fa-envelope mr-2"></i> 4 new messages
                        <span class="float-right text-muted text-sm">3 mins</span>
                    </a>
                    <div class="dropdown-divider"></div>
                    <a href="#" class="dropdown-item">
                        <i class="fas fa-users mr-2"></i> 8 friend requests
                        <span class="float-right text-muted text-sm">12 hours</span>
                    </a>
                    <div class="dropdown-divider"></div>
                    <a href="#" class="dropdown-item">
                        <i class="fas fa-file mr-2"></i> 3 new reports
                        <span class="float-right text-muted text-sm">2 days</span>
                    </a>
                    <div class="dropdown-divider"></div>
                    <a href="#" class="dropdown-item dropdown-footer">See All Notifications</a>
                </div>
            </li>
            <li class="nav-item">
                <a class="nav-link" data-widget="fullscreen" href="#" role="button">
                    <i class="fas fa-expand-arrows-alt"></i>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" data-widget="control-sidebar" data-slide="true" href="#" role="button">
                    <i class="fas fa-th-large"></i>
                </a>
            </li>
        </ul>
    </nav>
    <!-- /.navbar -->

    <!-- Main Sidebar Container -->
    <aside class="main-sidebar sidebar-dark-primary elevation-4">
        <!-- Brand Logo -->
        <a href="home_admin" class="brand-link">
            <img src="<?= makeRootOrFileUrl("images/cpy.jpeg"); ?>" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
            <span class="brand-text font-weight-light">CIPY Admin</span>
        </a>

        <!-- Sidebar -->
        <div class="sidebar">
            <!-- Sidebar user panel (optional) -->
            <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                <div class="image">
                    <img src="<?= makeRootOrFileUrl("images/cpy.jpeg"); ?>" class="img-circle elevation-2" alt="User Image">
                </div>
                <div class="info">
                    <a href="#" class="d-block">Samy & Tmf</a>
                </div>
            </div>

            <!-- SidebarSearch Form -->
            <div class="form-inline">
                <div class="input-group" data-widget="sidebar-search">
                    <input class="form-control form-control-sidebar" type="search" placeholder="Recherche" aria-label="Search">
                    <div class="input-group-append">
                        <button class="btn btn-sidebar">
                            <i class="fas fa-search fa-fw"></i>
                        </button>
                    </div>
                </div>
            </div>

            <!-- Sidebar Menu -->
            <nav class="mt-2">
                <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                    <!-- Add icons to the links using the .nav-icon class
                         with font-awesome or any other icon font library -->
                    <li class="nav-item menu-open">
                        <a href="#" class="nav-link active">
                            <i class="nav-icon  fas fa-newspaper"></i>
                            <p>
                                Annonce
<!--                                <i class="right fas fa-newspaper"></i>-->
<!--                                <span class="badge badge-info right">6</span>-->
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="./index.php?p=Pages/annonces/annonce-add.php" class="nav-link active">
                                    <i class="fa fa-plus-circle nav-icon"></i>
                                    <p>Ajouter</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="index.php?p=Pages/annonces/annonce_liste.php" class="nav-link">
                                    <i class="fa fa-list nav-icon"></i>
                                    <p>Lister</p>
                                </a>
                            </li>

                            <li class="nav-item">
                                <a href="index.php?p=Pages/annonces/annonce_empty.php" class="nav-link">
                                    <i class="fa fa-trash-alt nav-icon"></i>
                                    <p>Vider</p>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li class="nav-item">
                        <a href="#" class="nav-link">
                            <i class="nav-icon fas fa-copy"></i>
                            <p>
                                Sujets
                                <i class="fas fa-angle-left right"></i>
                                <span class="badge badge-info right">6</span>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="index.php?p=Pages/sujets/sujet-add.php" class="nav-link">
                                    <i class="fa fa-plus-circle nav-icon"></i>
                                    <p>Ajouter</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="index.php?p=Pages/sujets/sujet_empty.php" class="nav-link">
                                    <i class="far fa-trash-alt nav-icon"></i>
                                    <p>vider</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="index.php?p=Pages/sujets/sujet_liste.php" class="nav-link">
                                    <i class=" fas fa-list nav-icon"></i>
                                    <p>Lister</p>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li class="nav-item">
                        <a href="#" class="nav-link">
                            <i class="nav-icon fas fa-copy"></i>
                            <p>
                                Correction
                                <i class="fas fa-angle-left right"></i>
                                <span class="badge badge-info right">6</span>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="index.php?p=Pages/correction/correction-add.php" class="nav-link">
                                    <i class="fa fa-plus-circle nav-icon"></i>
                                    <p>Ajouter</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="index.php?p=Pages/correction/correction_empty.php" class="nav-link">
                                    <i class="far fa-trash-alt nav-icon"></i>
                                    <p>vider</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="index.php?p=Pages/correction/correction_liste.php" class="nav-link">
                                    <i class=" fas fa-list nav-icon"></i>
                                    <p>Lister</p>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li class="nav-item">
                        <a href="#" class="nav-link">
                            <i class="nav-icon fas fa-chart-pie"></i>
                            <p>
                                Statistiques
                                <i class="right fas fa-angle-left"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="index.php?p=Pages/statistiques/graphique.php" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Graphiques</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="index.php?p=Pages/statistiques/disque.php" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Disque</p>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li class="nav-item">
                        <a href="#" class="nav-link">
                            <i class="nav-icon fas fa-user-alt"></i>
                            <p>
                                Membre
                                <i class="fas fa-angle-left right"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="index.php?p=Pages/membres/membres_liste.php" class="nav-link">
                                    <i class="fa fa-list-alt nav-icon"></i>
                                    <p>Liste</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="pages/UI/icons.html" class="nav-link">
                                    <i class="fa fa-check-circle nav-icon"></i>
                                    <p>Validation</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="pages/UI/icons.html" class="nav-link">
                                    <i class="fa fa-archive nav-icon"></i>
                                    <p>Gestion MDP</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="pages/UI/buttons.html" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Options Speciales</p>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li class="nav-item">
                        <a href="#" class="nav-link">
                            <i class="nav-icon fas fa-edit"></i>
                            <p>
                                Formation
                                <i class="fas fa-angle-left right"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="index.php?p=Pages/cours/cour_liste.php" class="nav-link">
                                    <i class="fa fa-list-alt nav-icon"></i>
                                    <p>Liste</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="index.php?p=Pages/cours/cour_add.php" class="nav-link">
                                    <i class="fa fa-plus-circle nav-icon"></i>
                                    <p>Ajouter</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="index.php?p=Pages/cours/cour_empty.php" class="nav-link">
                                    <i class="far fa-trash-alt nav-icon"></i>
                                    <p>Vider</p>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li class="nav-item">
                        <a href="#" class="nav-link">
                            <i class="nav-icon fas fa-table"></i>
                            <p>
                                Forum
                                <i class="fas fa-angle-left right"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="index.php?p=Pages/forum/forum_defi.php" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Defis</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="pages/tables/data.html" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Mini Projet</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="pages/tables/jsgrid.html" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Sujet Forum</p>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li class="nav-header">Autre</li>
                    <li class="nav-item">
                        <a href="pages/calendar.html" class="nav-link">
                            <i class="nav-icon far fa-calendar-alt"></i>
                            <p>
                                Calendrier
                                <span class="badge badge-info right">2</span>
                            </p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="pages/gallery.html" class="nav-link">
                            <i class="nav-icon far fa-image"></i>
                            <p>
                                Gallery
                            </p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="pages/kanban.html" class="nav-link">
                            <i class="nav-icon fas fa-columns"></i>
                            <p>
                                Infos Apropos
                            </p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="#" class="nav-link">
                            <i class="nav-icon far fa-envelope"></i>
                            <p>
                                Messagerie
                                <i class="fas fa-angle-left right"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="index.php?p=Pages/mailbox/mailbox.php" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Reception</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="index.php?p=Pages/mailbox/compose.php" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Envoie</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="index.php?p=Pages/mailbox/read-mail.php" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Lus</p>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li class="nav-item">
                        <a href="#" class="nav-link">
                            <i class="nav-icon fas fa-search"></i>
                            <p>
                                Recherche
                                <i class="fas fa-angle-left right"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="pages/search/simple.html" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Rapide</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="pages/search/enhanced.html" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Avancer</p>
                                </a>
                            </li>
                        </ul>
                    </li>
                </ul>
            </nav>
            <!-- /.sidebar-menu -->
        </div>
        <!-- /.sidebar -->
    </aside>
