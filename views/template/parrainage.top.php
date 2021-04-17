<?php
?>
<!DOCTYPE html>
<html>

<body >
<head>

    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="icon" type="image/png" href="<?= makeRootOrFileUrl("images/logo.png") ?>"/>
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Lato:ital,wght@0,300;0,400;0,700;0,900;1,100;1,300;1,400;1,700&display=swap"
          rel="stylesheet">
    <link rel="stylesheet" href='<?= makeRootOrFileUrl("public/css/import/bootstrap/bootstrap-mdb.css") ?>'>
    <link rel="stylesheet" href="<?= sprintf("%spublic/css/style.css", rootUrl()) ?>">
    <link rel="stylesheet" href="<?= sprintf("%spublic/css/dashbord_parrainage.css", rootUrl()) ?>">
    <link rel="stylesheet" href="<?= sprintf("%spublic/css/dashbord_par.css", rootUrl()) ?>">
    <title><?= $title ?? "Title" ?></title>
    <style type="text/css">

        .animer {
            border: 26px solid transparent; /* Light grey */
            border-left: 26px solid  #d1f2eb;/* transparent;/* Blue #3498db*/
            border-top: 26px solid #3498db;/* transparent; */
            border-right: 26px solid  transparent;/*#1abc9c;*/
            border-bottom: 26px solid  #808b96;
            border-radius: 50%;
            width: 240px;
            height: 240px;
            align-items: center;
            margin: 20px auto;
            animation: spin 2s linear infinite;
            position: relative;
            left: 1.52rem;
            top: 0.56rem;
        }

        @keyframes spin {
            0% { transform: rotate(0deg); }
            100% { transform: rotate(360deg); }
        }
        .bouton_active{
            width: 195px;
            height: 195px;
            padding: 0px;
            border-radius: 100px;
            position: relative;
            left: -1.998rem;
            top: -5.985rem;
        }
    </style>
</head>
<nav class="mb-1 navbar navbar-expand-lg  mb-0">
    <!--a class="navbar-brand" href="#">  <img src="../public/images/cpy.jpeg" class="img-responsive rounded-circle" width="50px" alt="logo"><span class="ml-2 font-weight-bold">CIPY</span>
    </a-->
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#cipy"
            aria-controls="cipy" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="cipy">
        <ul class="navbar-nav  mb-0" >
            <li class="nav-item  ">
                <a class="nav-link" href="acceuil.html"><button class="btn btn-dark-green"><i class="fa fa-home"></i>Acceuil</button>
                    <span class="sr-only">(current)</span>
                </a>
            </li>
            <li class="nav-item  ">
                <a class="nav-link" href="acceuil.html"><button class="btn btn-dark-green"><i class="fas fa-cogs"></i>Parametre</button>
                    <span class="sr-only">(current)</span>
                </a>
            </li>
        </ul>

    </div>
</nav>
