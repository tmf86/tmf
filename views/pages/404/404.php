<!doctype html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="icon" type="image/png" href="<?= buildpath("images/logo.png") ?>"/>
    <link href='<?= buildpath('public/css/404.css') ?>' rel='stylesheet'>
    <script src="https://kit.fontawesome.com/bb2a11cf5b.js" defer crossorigin="anonymous"></script>
    <title>Not Found</title>
</head>
<body>
<div class="main-container">
    <div class="mainbox">
        <div class="err">4</div>
        <div><i class="far fa-question-circle fa-spin"></i></div>
        <div class="err">4</div>
    </div>
    <div class="msg">
        Peut-être que cette page a été déplacée ? Ou a été supprimée !
        Retournez a l' <a href="<?= buildpath('acceuil') ?>">acceuil</a> et essayez à partir de là.
    </div>
</div>
</body>
</html>