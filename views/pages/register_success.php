<!doctype html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="icon" type="image/png" href="<?= makeRootOrFileUrl("images/logo.png") ?>"/>
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Ubuntu:ital,wght@0,300;0,400;0,500;0,700;1,300&display=swap"
          rel="stylesheet">
    <link rel="stylesheet" href="<?= sprintf("%spublic/css/style.css", rootUrl()) ?>">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.6.0/gsap.min.js" defer></script>
    <title>Inscription Reussie</title>
</head>
<body>
<div class="main-success">
    <div class="success-container">
        <?php if (!$request->hasSession('resended')): ?>
            <img id="img" src="<?= sprintf("%simages/success.png", rootUrl()) ?>" class="success-img" alt="succes-icon">
            <span id="timer"></span>
        <?php else: ?>
            <div id="timer">
                <span class="email-resended"><i class="fas fa-envelope-open-text"></i> MAIL RENVOYE</span>
            </div>
        <?php endif; ?>

    </div>
    <div class="success-msg">
        <?php if (!$request->hasSession('resended')): ?>
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
        <a href="<?= makeRootOrFileUrl('registration-success?resend=true') ?>"
           class="not-yet-received" style="font-size:1em !important;">Je n'es pas encore reçu l'email de
            confirmation </a>
    </div>
</div>
<script src="<?= makeRootOrFileUrl('public/js/import/jquery/jquery.js') ?>"></script>
<script src="<?= sprintf("%spublic/js/register-success.js", rootUrl()) ?>"></script>
</body>
</html>
