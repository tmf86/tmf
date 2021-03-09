<!doctype html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="icon" type="image/png" href="<?= buildpath("images/logo.png") ?>"/>
    <!-- Stylesheet   -->
    <link rel="stylesheet" href='<?= buildpath("public/css/bootstrap&mdb.css") ?>'>
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Lato:ital,wght@0,300;0,400;0,700;0,900;1,100;1,300;1,400;1,700&display=swap"
          rel="stylesheet">
    <link rel="stylesheet" href='<?= buildpath("public/css/style.css") ?>'>
    <?= suppl_tags($links ?? [], LINK) ?>
    <title><?= $title ?? "Title" ?></title>
    <!-- Stylesheet   -->
    <!-- Script-->
    <script src="https://kit.fontawesome.com/bb2a11cf5b.js" defer crossorigin="anonymous"></script>
    <!-- Script-->
    <style type="text/css">
        .card.card-cascade .view.gradient-card-header {
            padding: 1.1rem 1rem;
        }

        .card.card-cascade .view {
            box-shadow: 0 5px 12px 0 rgba(0, 0, 0, 0.2), 0 2px 8px 0 rgba(0, 0, 0, 0.19);
        }

    </style>
    <style type="text/css">
        @-webkit-keyframes chartjs-render-animation {
            from {
                opacity: 0.99
            }
            to {
                opacity: 1
            }
        }

        @keyframes chartjs-render-animation {
            from {
                opacity: 0.99
            }
            to {
                opacity: 1
            }
        }

        .chartjs-render-monitor {
            -webkit-animation: chartjs-render-animation 0.001s;
            animation: chartjs-render-animation 0.001s;
        }

    </style>
</head>
<body class="fixed-sn white-skin">
<!--Navbar -->
<!--nav class="mb-1 navbar navbar-expand-lg navbar-light grey darken-2 mb-0">
    <a class="navbar-brand" href="#">  <img src="../public/images/cpy.jpeg" class="img-responsive rounded-circle" width="50px"  alt="logo"><span class="ml-2 font-weight-bold">CIPY</span>
    </a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#cipy"
            aria-controls="cipy" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="cipy">
        <ul class="navbar-nav ml-auto mb-0" >
            <li class="nav-item  ">
                <a class="nav-link" href="acceuil.html"><i class="fa fa-home"></i>Acceuil
                    <span class="sr-only">(current)</span>
                </a>
            </li>
        </ul>

    </div>
</nav-->
<!--/.Navbar -->
<!--Begin content-->
<div class="container-fluid">
    <!-- Main Navigation -->
    <header>
        <!-- Sidebar navigation -->
        <div id="slide-out" class="side-nav sn-bg-4 fixed" style="transform: translateX(-100%);">
            <ul class="custom-scrollbar ps ps--theme_default" data-ps-id="20d6f490-533f-68db-b414-74ac23932b4e">

                <!-- Logo -->
                <li class="logo-sn waves-effect py-3">
                    <div class="text-center">
                        <a href="#" class="pl-0"><img src="../public/images/cpy.jpeg" class="w-25 rounded-circle"></a>
                    </div>
                </li>

                <!-- Search Form -->
                <li>
                    <form class="search-form" role="search">
                        <div class="md-form mt-0 waves-light waves-effect waves-light">
                            <input type="text" class="form-control py-2" placeholder="Search">
                        </div>
                    </form>
                </li>

                <!-- Side navigation links w-fa fas fa-tachometer-alt-->
                <li>
                    <ul class="collapsible collapsible-accordion">

                        <li>
                            <a class="collapsible-header waves-effect arrow-r">
                                <i class="fa fa-newspaper"></i>Activite<i class="fas fa-angle-down rotate-icon"></i>
                            </a>
                            <div class="collapsible-body">
                                <ul>
                                    <li>
                                        <a href="#" class="waves-effect">Club</a>
                                    </li>
                                    <li>
                                        <a href="#" class="waves-effect">Annonces</a>
                                    </li>
                                </ul>
                            </div>
                        </li>
                        <li>
                            <a class="collapsible-header waves-effect arrow-r">
                                <i class="w-fa fas fa-image"></i>Parrainage<i class="fas fa-angle-down rotate-icon"></i>
                            </a>
                            <div class="collapsible-body">
                                <ul>
                                    <li>
                                        <a href="#" class="waves-effect">S'inscrir</a>
                                    </li>
                                    <li>
                                        <a href="#" class="waves-effect">Historique</a>
                                    </li>
                                    <li>
                                        <a href="#" class="waves-effect">Status</a>
                                    </li>
                                </ul>
                            </div>
                        </li>
                        <li>
                            <a class="collapsible-header waves-effect arrow-r">
                                <i class="w-fa fas fa-user"></i>Profile<i class="fas fa-angle-down rotate-icon"></i>
                            </a>
                            <div class="collapsible-body">
                                <ul>
                                    <li>
                                        <a href="#" class="waves-effect">Parametre</a>
                                    </li>
                                    <li>
                                        <a href="#" class="waves-effect">Information</a>
                                    </li>
                                    <li>
                                        <a href="#" class="waves-effect">Modification</a>
                                    </li>
                                </ul>
                            </div>
                        </li>
                        <li><!---->
                            <a class="collapsible-header waves-effect arrow-r">
                                <i class="w-fa fab fa-forumbee"></i>Forum<i class="fas fa-angle-down rotate-icon"></i>
                            </a>
                            <div class="collapsible-body">
                                <ul>
                                    <li>
                                        <a href="#" class="waves-effect">Classe</a>
                                    </li>
                                    <li>
                                        <a href="#:/css/media.html" class="waves-effect">Global</a>
                                    </li>
                                    <li>
                                        <a href="#:/css/utilities.html" class="waves-effect">Projets</a>
                                    </li>
                                </ul>
                            </div>
                        </li>
                        <li>
                            <a class="collapsible-header waves-effect arrow-r">
                                <i class="w-fa fas fa-th"></i>Cours<i class="fas fa-angle-down rotate-icon"></i>
                            </a>
                            <div class="collapsible-body">
                                <ul>
                                    <li>
                                        <a href="#" class="waves-effect">Algorithmique</a>
                                    </li>
                                    <li>
                                        <a href="#" class="waves-effect">Web</a>
                                    </li>
                                    <li>
                                        <a href="#" class="waves-effect">Mobile</a>
                                    </li>
                                    <li>
                                        <a href="#" class="waves-effect">Dessktop</a>
                                    </li>
                                    <li>
                                        <a href="#" class="waves-effect">Montage projet informatique</a>
                                    </li>
                                    <li>
                                        <a href="#" class="waves-effect">Infographie</a>
                                    </li>

                                </ul>
                            </div>
                        </li>
                        <li>
                            <a class="collapsible-header waves-effect arrow-r">
                                <i class="fa fa-school"></i>Sujet<i class="fas fa-angle-down rotate-icon"></i>
                            </a>
                            <div class="collapsible-body">
                                <ul>
                                    <li>
                                        <a href="#" class="waves-effect">Excercice</a>
                                    </li>
                                    <li>
                                        <a href="#" class="waves-effect">Correction</a>
                                    </li>
                                </ul>
                            </div>
                        </li>
                        <li>
                            <a class="collapsible-header waves-effect arrow-r">
                                <i class="w-fa fas fa-table"></i>Crativite<i class="fas fa-angle-down rotate-icon"></i>
                            </a>
                            <div class="collapsible-body">
                                <ul>
                                    <li>
                                        <a href="#:/tables/basic.html" class="waves-effect">Proposition</a>
                                    </li>
                                </ul>
                            </div>
                        </li>
                    </ul>
                </li>

                <!-- Simple link -->
                <li>
                    <a href="#" class="collapsible-header waves-effect"><i class="w-fa far fa-bell"></i>Boite a
                        sugegestion</a>
                </li>

            </ul>
            </li>
            <!-- Side navigation links -->

            <div class="ps__scrollbar-x-rail" style="left: 0px; bottom: 0px;">
                <div class="ps__scrollbar-x" tabindex="0" style="left: 0px; width: 0px;"></div>
            </div>
            <div class="ps__scrollbar-y-rail" style="top: 0px; right: 0px;">
                <div class="ps__scrollbar-y" tabindex="0" style="top: 0px; height: 0px;"></div>
            </div>
            </ul>
            <div class="sidenav-bg mask-strong"></div>
        </div>
        <!-- Sidebar navigation -->
        <!-- Navbar -->
        <nav class="navbar fixed-top navbar-expand-lg scrolling-navbar double-nav top-nav-collapse gradient">
            <!-- SideNav slide-out button -->
            <div class="float-left">
                <a href="#" data-activates="slide-out" class="button-collapse"><i class="fas fa-bars"></i></a>
            </div>
            <!-- Breadcrumb -->
            <div class="breadcrumb-dn mr-auto">
                <p class="text-capitalize text-dark">Essis Christian</p>
            </div>
            <!-- Navbar links -->
            <ul class="nav navbar-nav nav-flex-icons ml-auto">
                <!-- Dropdown -->
                <li class="nav-item dropdown notifications-nav">
                    <a class="nav-link dropdown-toggle waves-effect" id="navbarDropdownMenuLink" data-toggle="dropdown"
                       aria-haspopup="true" aria-expanded="false">
                        <span class="badge red">3</span> <i class="fas fa-bell"></i>
                        <span class="d-none d-md-inline-block">Notifications</span>
                    </a>
                    <div class="dropdown-menu dropdown-primary" aria-labelledby="navbarDropdownMenuLink">
                        <a class="dropdown-item waves-effect waves-light" href="#">
                            <i class="far fa-money-bill-alt mr-2" aria-hidden="true"></i>
                            <span>New order received</span>
                            <span class="float-right"><i class="far fa-clock" aria-hidden="true"></i> 13 min</span>
                        </a>
                        <a class="dropdown-item waves-effect waves-light" href="#">
                            <i class="far fa-money-bill-alt mr-2" aria-hidden="true"></i>
                            <span>New order received</span>
                            <span class="float-right"><i class="far fa-clock" aria-hidden="true"></i> 33 min</span>
                        </a>
                        <a class="dropdown-item waves-effect waves-light" href="#">
                            <i class="fas fa-chart-line mr-2" aria-hidden="true"></i>
                            <span>Your campaign is about to end</span>
                            <span class="float-right"><i class="far fa-clock" aria-hidden="true"></i> 53 min</span>
                        </a>
                    </div>
                </li>
                <li class="nav-item">
                    <a class="nav-link waves-effect"><i class="fas fa-envelope"></i> <span
                                class="clearfix d-none d-sm-inline-block">Contact</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link waves-effect"><i class="far fa-comments"></i> <span
                                class="clearfix d-none d-sm-inline-block">Support</span></a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle waves-effect" href="#" id="userDropdown" data-toggle="dropdown"
                       aria-haspopup="true" aria-expanded="false">
                        <i class="fas fa-user"></i> <span class="clearfix d-none d-sm-inline-block">Profile</span>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="userDropdown">
                        <a class="dropdown-item waves-effect waves-light" href="#">Se Deconnecter</a>
                        <a class="dropdown-item waves-effect waves-light" href="#">Mon Compte</a>
                    </div>
                </li>
            </ul>
            <!-- Navbar links -->
        </nav>
        <!-- Navbar -->
    </header>
    <!-- Main Navigation -->
    <!-- Main layout -->
    <main>
        <div class="container-fluid">
            <!-- Section: Edit Account -->
            <section class="section">
                <!-- First row -->
                <div class="row">
                    <!-- First column -->
                    <div class="col-lg-4 mb-4">
                        <!-- Card -->
                        <div class="card card-cascade narrower">
                            <!-- Card image -->
                            <div class="view view-cascade gradient-card-header mdb-color lighten-3">
                                <h5 class="mb-0 font-weight-bold">Editer votre Photo</h5>
                            </div>
                            <!-- Card image -->
                            <!-- Card content -->
                            <div class="card-body card-body-cascade text-center">
                                <img src="../public/images/user-default.jpg" alt="User Photo"
                                     class="z-depth-1 mb-3 mx-auto w-50">
                                <p class="text-muted"><small>Profile photo will be changed automatically</small></p>
                                <div class="row flex-center">
                                    <button class="btn btn-info btn-rounded btn-sm waves-effect waves-light">Changer
                                    </button>
                                    <br>
                                    <button class="btn btn-danger btn-rounded btn-sm waves-effect waves-light">
                                        Supprimer
                                    </button>
                                </div>
                            </div>
                            <!-- Card content -->
                        </div>
                        <!-- Card -->
                    </div>
                    <!-- First column -->
                    <!-- Second column -->
                    <div class="col-lg-8 mb-4">
                        <!-- Card -->
                        <div class="card card-cascade narrower">
                            <!-- Card image -->
                            <div class="view view-cascade gradient-card-header mdb-color lighten-3">
                                <h5 class="mb-0 font-weight-bold">Modifier votre compte</h5>
                            </div>
                            <!-- Card image -->
                            <!-- Card content -->
                            <div class="card-body card-body-cascade text-center">
                                <!-- Edit Form -->
                                <form>
                                    <!-- First row -->
                                    <div class="row">
                                        <!-- First column -->
                                        <div class="col-md-6">
                                            <div class="md-form mb-0">
                                                <input type="text" id="form1" class="form-control validate" value="Cipy"
                                                       disabled="disabled">
                                                <label for="form1" data-error="wrong" data-success="right"
                                                       class="active">Menbre</label>
                                            </div>
                                        </div>
                                        <!-- Second column -->
                                        <div class="col-md-6">
                                            <div class="md-form mb-0">
                                                <input type="text" id="form2" class="form-control validate">
                                                <label for="form2" data-error="wrong"
                                                       data-success="right">Contact</label>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- First row -->
                                    <!-- First row -->
                                    <div class="row">
                                        <!-- First column -->
                                        <div class="col-md-6">
                                            <div class="md-form mb-0">
                                                <input type="text" id="form81" class="form-control validate">
                                                <label for="form81" data-error="wrong" data-success="right">Nom</label>
                                            </div>
                                        </div>
                                        <!-- Second column -->
                                        <div class="col-md-6">
                                            <div class="md-form mb-0">
                                                <input type="text" id="form82" class="form-control validate">
                                                <label for="form82" data-error="wrong"
                                                       data-success="right">Prenom</label>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- First row -->
                                    <!-- Second row -->
                                    <div class="row">
                                        <!-- First column -->
                                        <div class="col-md-6">
                                            <div class="md-form mb-0">
                                                <input type="email" id="form78" class="form-control validate">
                                                <label for="form78">E-Mail</label>
                                            </div>
                                        </div>
                                        <!-- Second column -->
                                        <div class="col-md-6">
                                            <div class="md-form mb-0">
                                                <input type="text" id="form11" class="form-control validate">
                                                <label for="form11" data-error="wrong"
                                                       data-success="right">Identifiant</label>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Second row -->
                                    <!-- Third row -->
                                    <div class="row">
                                        <!-- First column -->
                                        <div class="col-md-6">
                                            <div class="md-form mb-0">
                                                <input type="email" id="form76" class="form-control validate">
                                                <label for="form76">Classe</label>
                                            </div>
                                        </div>
                                        <!-- Second column -->
                                        <div class="col-md-6">
                                            <div class="md-form mb-0">
                                                <input type="date" id="form77" class="form-control validate">
                                                <label for="form77" data-error="wrong" data-success="right">Date de
                                                    Naissance</label>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Third row -->
                                    <!-- Fourth row -->
                                    <div class="row">
                                        <div class="col-md-12 text-center my-4">
                                            <span class="waves-input-wrapper waves-effect waves-light"><input
                                                        type="submit" value="Mettre a jour"
                                                        class="btn btn-info btn-rounded"></span>
                                        </div>
                                    </div>
                                    <!-- Fourth row -->
                                </form>
                                <!-- Edit Form -->
                            </div>
                            <!-- Card content -->
                        </div>
                        <!-- Card -->
                    </div>
                    <!-- Second column -->
                </div>
                <!-- First row -->
            </section>
            <!-- Section: Edit Account -->
        </div>
    </main>
    <!-- Main layout -->
</div>
<div class="drag-target" style="left: 0px;"></div>
<!--end content-->

<!--load js files -->
<script src="<?= buildpath('public/js/import/jquery.js') ?>"></script>
<script src="<?= buildpath('public/js/import/bootstrap.js') ?>"></script>
<script src="<?= buildpath('public/js/import/popper.js') ?>"></script>
<script src="<?= buildpath('public/js/import/mdb.js') ?>"></script>
<?= suppl_tags($scripts ?? [], SCRIPT) ?>
<script>
    setTimeout(function () {
        $(".waiting").toggleClass("hidden")
    }, 3000)
    // SideNav Initialization
    $(".button-collapse").sideNav();

    var container = document.querySelector('.custom-scrollbar');
    Ps.initialize(container, {
        wheelSpeed: 2,
        wheelPropagation: true,
        minScrollbarLength: 20
    });
</script>
<!--end of js files loading  -->
</body>
</html>
<!-- Footer -->