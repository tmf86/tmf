<!doctype html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="icon" type="image/png" href="<?= buildpath("images/logo.png") ?>"/>
    <link rel="stylesheet" href="example-assets/style.css" type="text/css">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Lato:ital,wght@0,300;0,400;0,700;0,900;1,100;1,300;1,400;1,700&display=swap"
          rel="stylesheet">
    <link rel="stylesheet" href="<?= sprintf("%spublic/css/style.css", rootUrl()) ?>">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.6.0/gsap.min.js" defer></script>
    <title>Felicitation</title>
</head>
<body>
<div class="main-success account-created-successful">
    <div class="success-container">
        <div>
            <img id="img" src="<?= sprintf("%simages/success.png", rootUrl()) ?>" class="success-img" alt="succes-icon">
        </div>
    </div>
    <div class="success-msg">
        <div>
            Felicitaion <strong><?= ucfirst($request->session('name')) ?? '' ?></strong>,<br>
            Votre compte a été crée avec succes , vous recevrez un mail contenant votre identifiant !
        </div>
    </div>
</div>
<script src="<?= buildpath('public/js/import/jquery/jquery.js') ?>"></script>
<script src="<?= buildpath('public/js/functions.js') ?>"></script>
<script src="<?= sprintf("%spublic/js/register-success.js", rootUrl()) ?>"></script>
</body>
</html>
