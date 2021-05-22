<!doctype html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="icon" type="image/png" href="<?= makeRootOrFileUrl("images/logo.png"); ?>"/>
    <!-- Stylesheet   -->
    <link rel="stylesheet" href='<?= makeRootOrFileUrl("public/css/import/bootstrap/bootstrap-mdb.css"); ?>'>
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Ubuntu:ital,wght@0,300;0,400;0,500;0,700;1,300&display=swap"
          rel="stylesheet">
    <link rel="stylesheet" href='<?= makeRootOrFileUrl("public/css/style.css"); ?>'>
    <?= suppl_tags($links ?? [], LINK); ?>
    <!-- Stylesheet   -->
    <script src="<?= makeRootOrFileUrl('public/js/import/jquery/jquery.js') ?>"></script>
    <title><?= $title ?? "Title" ?></title>
    <style>
        header{
            border-radius:5rem;
            margin-bottom: 6%;
        }
        .navbar{
            height: 2.7rem;
            width: 98%;
            padding: 2px 12px;
            border: 1px solid #2c3136;
            box-sizing: content-box;
            border-radius: 5rem;
           margin-top: 0;
            margin-bottom: 3%;
            box-shadow: 3px 2px 3px #2c3136;
            /*position: fixed;*/
        }
        .navbar-brand img,.nav-link{
            border: 1px solid #2c3136;
            box-shadow: 3px 2px 3px #2c3136;
        }
        .non_cipy{
            font-family: -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, "Helvetica Neue", Arial, "Noto Sans", sans-serif, "Apple Color Emoji", "Segoe UI Emoji", "Segoe UI Symbol", "Noto Color Emoji";
            font-weight: bolder;
            opacity: 0.4;
            letter-spacing: 2px;
            text-shadow: 4px 2px #2c3136;
        }
        .nav-item .nav-link{
            border-radius: 3rem;
            margin-left: 4px;
        }
         .acceuil:hover .etiquete{
               /*background-color: ghostwhite;*/
             display: inline-block;
        }
        .carousel-inner{
            border-radius: 2rem;
            border: 2px solid darkgray;
            box-shadow: 2px 1px darkgray;
        }
        .card{
            border: 2px solid ghostwhite;
            border-radius: 8px;
            /*box-shadow: -1px  2px 5px  rgba(0,0,0,0.7);*/
            box-shadow: 5px 3px 0 4px rgba(0,0,0,0.3);
            margin-bottom: 18%;
            margin-top: -2%;
            height: 29rem;
            /*box-shadow: -1px 2px 10px 3px rgba(0,0,0,0.3);*/
            /*box-shadow:-1px  2px 5px  rgba(0,0,0,0.7),-1px  2px 10px  rgba(0,0,0,0.6) inset ;*/
            /*box-shadow: 0 0 0 16px #fff inset, 0  0 0 17px #dad4d4;*/
        }
        .card  img{
            height: 50%;
        }
        .card-body .card-title{
            font-family: -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, "Helvetica Neue", Arial, "Noto Sans", sans-serif, "Apple Color Emoji", "Segoe UI Emoji", "Segoe UI Symbol", "Noto Color Emoji";
            font-weight: bolder;
            color:slategray;
        }
        .card-body .card-text{
            font-family:'Lato', 'Product Sans Thin Regular', sans-serif;
        }
        .btn_aceder{
            border-radius: 5rem;
            background:rgba(255,255,255,0.7);
            border: 1px solid rgba(0,0,0,0.4);
            box-shadow: 3px 2px 1px rgba(0,0,0,0.3);
            font-family: -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, "Helvetica Neue", Arial, "Noto Sans", sans-serif, "Apple Color Emoji", "Segoe UI Emoji", "Segoe UI Symbol", "Noto Color Emoji";
            color: slategray;
            font-weight: bolder;
            margin-top: 0.5%;
            margin-bottom: 4%;
        }
        footer{
            background: #414755;
            height: 3.3rem;
            box-shadow: 3px 7px 3px rgba(0.0.0.0.4);
            width: 100%;
            border: 1px solid rgba(0,0,0,0.3);
            border-radius: 2rem;
            position: fixed;
            z-index: 2000;
            /*margin-top: 15%;*/

        }
        footer .sigle{
            font-family: -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, "Helvetica Neue", Arial, "Noto Sans", sans-serif, "Apple Color Emoji", "Segoe UI Emoji", "Segoe UI Symbol", "Noto Color Emoji";
            font-size: small;
            padding: 1.5%;
            /*box-sizing: content-box;*/
        }
        @media (max-width: 764px)  {
            footer .fa-info-circle{
                top: -90%;
                left: 65%;
                display: flex;

            }
        }
        }

        .card-image{

            width: 10rem;
            height: 15rem;
            display: flex;
            /*border-radius: 7px;*/
            /*background-color: grey;*/
        }
        .card-image div{
            /*background-color: grey;*/
            font-family: -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, "Helvetica Neue", Arial, "Noto Sans", sans-serif, "Apple Color Emoji", "Segoe UI Emoji", "Segoe UI Symbol", "Noto Color Emoji";
            color: slategray;
            background:rgba(255,255,255,1);
            /*border: 1px solid rgba(0,0,0,0.4);*/
            /*box-shadow: 3px 2px 1px rgba(0,0,0,0.3);*/
        }
        .titre_cour{
            font-family: -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, "Helvetica Neue", Arial, "Noto Sans", sans-serif, "Apple Color Emoji", "Segoe UI Emoji", "Segoe UI Symbol", "Noto Color Emoji";
            font-weight: bolder;
            color: #4e555b;
        }
        .etiq{
            display:none;
        }
        @media all and (min-width: 320px) and (max-width: 949px){
            .nav-link{
                border: 1px solid #2c3136;
                box-shadow: 3px 2px 3px #2c3136;
                background-color: #4e555b;
                width: 30%;
                height: 3rem;
                left:68%;
            }
            .nav-item.avatar{
                position: relative;
                /*top: -15%;*/
                /*background-color: #4e555b;*/
                width: 95%;
                left: 68%;

            }
            .nav-item.avatar img{
                position: absolute;
                /*top: -15%;*/
                /*background-color: #4e555b;*/
                /*width: 95%;*/
                margin-left:2%;
                margin-top: 0.5%;

            }
            .nav-item.avatar .etiq{
                position: relative;
                left: 25%;
                margin-top: 1%;
                color: ghostwhite;
                font-weight: 500;
            }
            .etiq{
                font-size: 20px;
                display: inline-block;
            }
        }
        .annonce_content{
            overflow: auto;
            display: none;
        }
    </style>
</head>
<body>
<div class="preloader">
    <div class="lds-ripple">
        <div class="lds-pos"></div>
        <div class="lds-pos"></div>
    </div>
</div>
<header class="header">
    <nav class="navbar navbar-expand-lg navbar-light fixed-top our-background darken-2 lighten-1 shadow mb-1">
        <a href="#" class="navbar-brand"><img src="<?= makeRootOrFileUrl('images/cpy.jpeg') ?>" alt=""
                                              class="img-responsive rounded-circle" width="40px"><span class="ml-2 non_cipy ">CIPY</span></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#cpy"
                aria-controls="navbarSupportedContent-555" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon " style="color: #fff"></span>
        </button>
        <div class="collapse navbar-collapse" id="cpy">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item <?php if (current_route() == makeRootOrFileUrl('home')): ?>active<?php endif; ?>">
                    <a class="nav-link " href="<?= makeRootOrFileUrl('home') ?>" title="Accueil"><i class="fa fa-home acceuil"></i>
                        <span class="etiq">Accueil</span>
                        <span class="sr-only">(current)</span>
                    </a>
                </li>
                <li class="nav-item <?php if (current_route() == makeRootOrFileUrl('login')): ?>active<?php endif; ?>">
                    <a class="nav-link "  href="<?= makeRootOrFileUrl('login') ?>"title="Connexion" ><i
                                class="fas fa-user" ></i>
                        <span class="etiq">Connexion</span>
                    </a>
                </li>
                <li class="nav-item <?php if (current_route() == makeRootOrFileUrl('register')): ?>active<?php endif; ?>" >
                    <a class="nav-link " href="<?= makeRootOrFileUrl('register') ?>" title="Inscription"><i class="fas fa-sign-in-alt"></i>
                        <span class="etiq">Inscription</span>
                    </a>
                </li>
            </ul>
            <ul class="navbar-nav ml-auto nav-flex-icons">
                <li class="nav-item avatar">
                    <a href="login"> <i class="nav-link p-0">
                        <img src="<?= makeRootOrFileUrl($user_image ?? 'images/user-default.jpg') ?>"
                             class="rounded-circle z-depth-0"
                             alt="avatar image" height="35px" width="35px"><span class="etiq">Membre</span>
                    </i></a>
                </li>
            </ul>
        </div>
    </nav>
</header>
