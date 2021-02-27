<!doctype html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="example-assets/style.css" type="text/css">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Lato:ital,wght@0,300;0,400;0,700;0,900;1,100;1,300;1,400;1,700&display=swap"
          rel="stylesheet">
    <link rel="stylesheet" href="<?= sprintf("%spublic/css/style.css", rootUrl()) ?>">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.6.0/gsap.min.js" defer></script>
    <script src="https://kit.fontawesome.com/bb2a11cf5b.js" defer crossorigin="anonymous"></script>
    <title>Inscription Reussie</title>
</head>
<body>
<div class="main-success">
    <div class="success-container">
        <?php if (!$request->hasSession('resend')): ?>
            <img id="img" src="<?= sprintf("%simages/success.png", rootUrl()) ?>" class="success-img" alt="succes-icon">
            <span id="timer"></span>
        <?php else: ?>
            <div id="timer">
                <span class="email-resended"><i class="fas fa-envelope-open-text"></i> MAIL RENVOYE</span>
            </div>
        <?php endif; ?>

    </div>
    <div class="success-msg">
        <?php if (!$request->hasSession('resend')): ?>
            <div>
                Felicitaion <strong><?= ucfirst($request->session('name')) ?></strong> <br>
                Un mail vient de vous être envoyé pour finaliser la creation de votre compte utilisateur.<br>
            </div>
        <?php else: ?>
            <div>
                Felicitaion <strong><?= ucfirst($request->session('name')) ?></strong>,<br>
                le mail a bien été renvoyé !
            </div>
        <?php endif; ?>
        <a href="<?= buildpath('registration-success?resend=true') ?>"
           class="not-yet-received" style="font-size:1em !important;">Je n'es pas encore reçu l'email de
            confirmation </a>
    </div>
</div>
<script src="<?= buildpath('public/js/import/jquery.js') ?>"></script>
<script src="<?= sprintf("%spublic/js/script.js", rootUrl()) ?>"></script>
</body>
</html>
