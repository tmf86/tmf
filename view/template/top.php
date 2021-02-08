<!doctype html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <!-- Stylesheet   -->
    <link rel="stylesheet" href="public/css/b-and-mb.css">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Lato:ital,wght@0,300;0,400;0,700;0,900;1,100;1,300;1,400;1,700&display=swap"
          rel="stylesheet">
    <link rel="stylesheet" href="public/css/style.css">
    <title><?= $title ?? "Default" ?></title>
    <!-- Stylesheet   -->
    <!-- Script-->
    <script src="https://kit.fontawesome.com/bb2a11cf5b.js" defer crossorigin="anonymous"></script>
    <!-- Script-->
</head>
<body>
<header class="header">
    <nav class="mb-1 navbar navbar-expand-lg navbar-light grey darken-2 lighten-1">
        <a href="#" class="navbar-brand"><img src="images/cpy.jpeg" alt=""
                                              class="img-responsive rounded-circle" width="40px"><span class="ml-2 ">CIPY</span></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#cpy"
                aria-controls="navbarSupportedContent-555" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="cpy">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item active">
                    <a class="nav-link" href="acceuil/"><i class="fa fa-home"></i>Acceuil
                        <span class="sr-only">(current)</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="connexion/"><i class="fas fa-user"></i>Connexion</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="inscription/"><i class="fas fa-sign-in-alt"></i>Inscriprtion</a>
                </li>
            </ul>
            <ul class="navbar-nav ml-auto nav-flex-icons">
                <li class="nav-item avatar">
                    <i class="nav-link p-0">
                        <img src="images/user-default.jpg" class="rounded-circle z-depth-0"
                             alt="avatar image" height="35px">
                    </i>
                </li>
            </ul>
        </div>
    </nav>
</header>
