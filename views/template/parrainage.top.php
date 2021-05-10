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
            border: 20px solid transparent; /* Light grey */
            border-left: 20px solid  #d1f2eb;/* transparent;/* Blue #3498db*/
            border-top: 20px solid #3498db;/* transparent; */
            border-right: 20px solid  transparent;/*#1abc9c;*/
            border-bottom: 20px solid  #808b96;
            border-radius: 50%;
            width: 150px;
            height: 150px;
            align-items: center;
            justify-content: center;
            /*bottom: 0;
            right: 0;*/
            margin: 20px auto;
            animation: spin 2s linear infinite;
            position: relative;
            right: 6.15%;
            bottom:-32.1% ;
            z-index: 50;
        }

        @keyframes spin {
            0% { transform: rotate(0deg); }
            100% { transform: rotate(360deg); }
        }
        .bouton_active{
            width: 125px;
            height: 125px;
            padding: 0px;
            border-radius: 100px;
            position: relative;
            align-items: center;
            justify-content: center;
            right: 13%;
            bottom: -51.12%;
            box-shadow: 5px 4px 5px #2d2d2d;
            font-family: -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, "Helvetica Neue", Arial, "Noto Sans", sans-serif, "Apple Color Emoji", "Segoe UI Emoji", "Segoe UI Symbol", "Noto Color Emoji";
            font-size: 14px;
            color: #2a2e33;
            font-weight: bolder;
            z-index: 6000;
        }
    </style>
</head>
<body>
<nav class="mb-1 navbar navbar-expand-lg  mb-0 ">
    <!--a class="navbar-brand" href="#">  <img src="../public/images/cpy.jpeg" class="img-responsive rounded-circle" width="50px" alt="logo"><span class="ml-2 font-weight-bold">CIPY</span>
    </a-->
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#cipy"
            aria-controls="cipy" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="cipy">
        <ul class="navbar-nav  mb-0" id="info_demand" >
        </ul>

    </div>
</nav>
