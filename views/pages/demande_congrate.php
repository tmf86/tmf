<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href='<?= makeRootOrFileUrl("public/css/import/bootstrap/bootstrap-mdb.css") ?>'>
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Ubuntu:ital,wght@0,300;0,400;0,500;0,700;1,300&display=swap"
          rel="stylesheet">
    <link rel="stylesheet" href='<?= makeRootOrFileUrl("public/css/style.css") ?>'>
    <?= suppl_tags($links ?? [], LINK) ?>
    <style>
        @import url(http://fonts.googleapis.com/css?family=Calibri:400,300,700);

        body {
            /*background-color:  #99a3a4 ;*/
            background-image: url("images/congrate1.jpeg");
            background-repeat: no-repeat;
            background-position-x: center;
            background-position-y: center;
            background-attachment: fixed;
            -webkit-background-size: cover;
            -moz-background-size: cover;
            -o-background-size: cover;
            background-size: cover;
            height: 100%;
            font-family: 'Calibri', sans-serif !important
        }

        .mt-100 {
            margin-top: 100px
        }

        .container {
            margin-top: 200px
        }

        .card {
            position: relative;
            display: flex;
            width: 85%;
            flex-direction: column;
            min-width: 0;
            word-wrap: break-word;
            background-color: #fff;
            background-clip: border-box;
            border: 1px solid #d2d2dc;
            border-radius: 4px;
            -webkit-box-shadow: 0px 0px 5px 0px rgb(249, 249, 250);
            -moz-box-shadow: 0px 0px 5px 0px rgba(212, 182, 212, 1);
            box-shadow: 0px 0px 5px 0px rgb(161, 163, 164)
        }

        .card .card-body {
            padding: 1rem 1rem
        }

        .card-body {
            flex: 1 1 auto;
            padding: 1.25rem
        }

        p {
            font-size: 14px
        }

        h4 {
            margin-top: 18px
        }

        .cross {
            padding: 10px;
            color: #5dade2;
            /*cursor: pointer*/
        }

        .continue:focus {
            outline: none
        }

        .continue {
            border-radius: 5px;
            text-transform: capitalize;
            font-size: 13px;
            padding: 8px 19px;
            /*cursor: pointer;*/
            color: #fff;
            background-color: #5dade2
        }

        .continue:hover {
            background-color: #2471a3 !important
            /* background-color:  #2471a3  !important*/
        }
    </style>
    <title><?= $title ?? 'Title' ?></title>
</head>
<body>
<div class="container d-flex justify-content-center">
    <div class="row">
        <div class="col-md-6">
            <button type="button" class="btn btn-lg btn-warning" data-toggle="modal" data-target="#myModal"
                    id="btn_simul">*
            </button>
        </div>
        <a href="parrainage" id="redit"></a>
    </div>
</div>
<div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">
        <div class="card">
            <div class="text-right cross"><i class="fa fa-times"></i></div>
            <div class="card-body text-center"><img src="https://img.icons8.com/bubbles/200/000000/trophy.png">
                <h4>FELECITATION!</h4>
                <h2 id="time_d"></h2>
                <p>Votre de <strong>parrainage</strong> a &eacute;t&eacute; bien pris en compte <br>
                    les <strong>information concernant votre authentification &aacute; &eacute;t&eacute; evonyer
                        au mail : </strong></p> <a class="btn btn-out btn-square continue" href="parrainage"><?=$usr->email;?></a>
            </div>
        </div>
    </div>
</div>

<script src="<?= makeRootOrFileUrl('public/js/import/jquery/jquery.js') ?>"></script>
<script src="<?= makeRootOrFileUrl('public/js/import/boostrap/bootstrap.js') ?>"></script>
<script src="<?= makeRootOrFileUrl('public/js/import/boostrap/popper.js') ?>"></script>
<script src="<?= makeRootOrFileUrl('public/js/import/mdb/mdb.js') ?>"></script>
<?= suppl_tags($scripts ?? [], SCRIPT) ?>
<script>
    var bouton_simul = document.getElementById("btn_simul");
    var bouton_suivant = document.getElementById("redit");
    const temp = document.getElementById("time_d");
    let temps = 15;
    setTimeout(function () {
        bouton_simul.click();
        setInterval(function () {
            temps--;
            temp.innerHTML = "vous serez  rediriger vers la page d'authenfication dans: " + temps + "seconde";
        }, 1000);
    }, 200);

    setTimeout(function () {
        bouton_suivant.click();
    }, 15000);
</script>
</body>
</html>

