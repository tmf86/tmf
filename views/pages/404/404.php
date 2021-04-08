<!DOCTYPE html>
<html dir="ltr" lang="fr">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="robots" content="noindex,nofollow">
    <title>Not Found</title>
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" href="<?= makeRootOrFileUrl("images/logo.png") ?>"/>
    <!-- Custom CSS -->
    <link href="<?= makeRootOrFileUrl("public/css/import/user-dashbord/style.min.css") ?>" rel="stylesheet">
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
    <style>
        @media (max-width: 767px) {
            .error-box .error-title {
                font-size: 12rem;
            }
        }
    </style>
</head>

<body>
<div class="main-wrapper">
    <div class="error-box">
        <div class="error-body text-center">
            <h1 class="error-title">404</h1>
            <h3 class="text-uppercase error-subtitle">PAGE NON TROUVÉE !</h3>
            <p class="text-muted m-t-30 m-b-30">VOUS SEMBLEZ ESSAYER DE TROUVER VOTRE CHEMIN</p>
            <a href="<?= makeRootOrFileUrl('home') ?>" style="background: #37474f"
               class="btn btn-rounded waves-effect waves-light m-b-40 text-white">Retourner à la page
                d'acceuil</a>
        </div>
    </div>
</div>
</body>

</html>