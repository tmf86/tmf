
<!doctype html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="icon" type="image/png" href="<?= makeRootOrFileUrl("images/logo.png"); ?>"/>
    <link rel="stylesheet" href='<?= makeRootOrFileUrl("public/css/import/bootstrap/bootstrap-mdb.css"); ?>'>
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Ubuntu:ital,wght@0,300;0,400;0,500;0,700;1,300&display=swap"
          rel="stylesheet">
    <link rel="stylesheet" href='<?= makeRootOrFileUrl("public/css/style.css"); ?>'>
    <title><?= $title ?? "Title" ?></title>
    <style>
        .card-image{

            width: 100%;
            height: 93%;
            display: flex;
            justify-content: space-between;
            margin-left: 3%;
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
        .btn-customized {
            letter-spacing: 0.1em;
            cursor: pointer;
            font-size: 14px;
            font-weight: 400;
            position: relative;
            text-decoration: none;
            text-transform: uppercase;
            padding: .5rem;
            width: 100%;
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
        .btn-customized:focus {
            outline: 0;
        }
        .card{
            border: 2px solid ghostwhite;
            border-radius: 8px;
            /*box-shadow: -1px  2px 5px  rgba(0,0,0,0.7);*/
            box-shadow: 5px 3px 0 4px rgba(0,0,0,0.3);
            margin: -2% 3% 18%;
            /*height: 29rem;*/
            /*box-shadow: -1px 2px 10px 3px rgba(0,0,0,0.3);*/
            /*box-shadow:-1px  2px 5px  rgba(0,0,0,0.7),-1px  2px 10px  rgba(0,0,0,0.6) inset ;*/
            /*box-shadow: 0 0 0 16px #fff inset, 0  0 0 17px #dad4d4;*/
        }
        /*btn_background*/
        .effect01 {
            color: #FFF;
            border: 1px solid #414755;
            box-shadow: 0 0 0 1px #414755 inset;
            background-color: #414755;
            overflow: hidden;
            position: relative;
            transition: all 0.3s ease-in-out;
        }

        .effect01:hover {
            /*border: 1px solid #666;*/
            color: #fff;
            /*background-color: #FFF;*/
            /*box-shadow: 0 0 0 4px #EEE inset;*/
        }

        /*btn_text*/
        .effect01 span {
            transition: all 0.2s ease-out;
            z-index: 2;
        }

        .effect01:hover span {
            letter-spacing: 0.13em;
            color: #333;
        }

        /*highlight*/
        .effect01:after {
            background: #FFF;
            border: 0 solid #414755;
            content: "";
            height: 155px;
            left: -75px;
            opacity: .8;
            position: absolute;
            top: -50px;
            -webkit-transform: rotate(35deg);
            transform: rotate(35deg);
            width: 50px;
            transition: all 1s cubic-bezier(0.075, 0.82, 0.165, 1); /*easeOutCirc*/
            z-index: 1;
        }

        .effect01:hover:after {
            background: #FFF;
            /*border: 20px solid #414755;*/
            opacity: 0;
            left: 120%;
            -webkit-transform: rotate(40deg);
            transform: rotate(40deg);
        }
    </style>
</head>
<body>
<div class="wrapper d-flex align-items-stretch">
    <nav id="sidebar">
        <div class="custom-menu">
            <button type="button" id="sidebarCollapse" class="custum-btn">
                <i class="fa fa-bars"></i>
                <span class="sr-only">Toggle Menu</span>
            </button>
        </div>
        <div class="p-4">
            <h1><a href="index.html" class="logo">Vos Cours</a></h1>
            <ul class="list-unstyled components  nav nav-tabs mb-5" id='subjects' role="tablist"
                style="display: block !important;border-bottom: none">
                <li class="active" data-container="bts">
                    <a class="tab-item" id="home-tab" data-toggle="tab" href="#bts" role="tab"
                       aria-controls="bts"
                       aria-selected="true"><i class="fa fa-graduation-cap mr-3"></i>Tous</a>
                </li>
                <li data-container="#taskandexam">
                    <a class="tab-item" id="profile-tab" data-toggle="tab" href="#taskandexam" role="tab"
                       aria-controls="taskandexam"
                       aria-selected="false"><i class="fa fa-book-open  mr-3"></i> Design&Bureautique</a>
                </li>
                <li data-container="#projects">
                    <a class="tab-item" id="contact-tab" data-toggle="tab" href="#projects" role="tab"
                       aria-controls="projects"
                       aria-selected="false"><i class="fas fa-project-diagram mr-3"></i>Programmation</a>
                </li>
                <li>
                    <a href="<?= makeRootOrFileUrl('home') ?>"><i class="fas fa-undo mr-3"></i>Retourner a l'Acceuil</a>
                </li>
            </ul>
            <div class="footer">
                <p><!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                    Copyright &copy;<script>document.write(new Date().getFullYear());</script> : Club Informatique Pigier Yamoussoukro
            </div>
        </div>
    </nav>
    <!-- Page Content  -->
    <div class="tab-content" id="content">
        <div class="tab-pane fade show active" id="bts" role="tabpanel" aria-labelledby="bts-tab">
            <div class="responsive-padd">
                <div class="table-container" role="table" aria-label="Destinations">
                    <h2 class="mb-4 text-uppercase"><i class="fa fa-graduation-cap"></i>Tous</h2>
                    <!--Begin content-->
                    <div class="container  mb-3 mt-3">
                        <div class="row justfy-content-space-between">
                        <?php foreach ($formations as $formation) { ?>
                            <div class="col-md  mb-sm-4">
                                <!-- Card -->
                                <div class="card card-image" >

                                    <!-- Content -->

                                    <div class="text-white text-center d-flex align-items-center rgba-black-strong py-5 px-4">
                                        <div>
                                            <h5 class="titre_cour"><i class="fas fa-copy"></i><?= $formation->cour_forma; ?></h5>
                                            <h3 class="card-title pt-2"><strong><?= $formation->titre_forma; ?></strong></h3>
                                            <p><?= substr($formation->extrait, 0, 110) . "..."; ?></p>
                                            <p class="info_cour">
                                                <span>Date d'ajout: </span><span><?= $formation->date_ajout; ?></span><br>
                                                <span>Date de modification: </span><span><?= $formation->date_modif; ?></span><br>
                                                <span>Auteur: </span><span><?= $formation->auteur_forma; ?></span></p>
                                            <a class="btn btn_aceder" href="videos_formation?id=<?= $formation->id_forma; ?>"><i
                                                        class="fas fa-clone left"></i> Suivre</a>
                                        </div>
                                    </div>

                                </div>
                                <!-- Card -->
                            </div>
                        <?php } ?>
                        </div>
                    </div>
                    <!--End of  content-->
                </div>
            </div>
        </div>
        <div class="tab-pane fade" id="taskandexam" role="tabpanel" aria-labelledby="taskandexam-tab">
            <div class="responsive-padd">
                <div class="table-container" role="table" aria-label="Destinations">
                    <h2 class="mb-4 text-uppercase"><i class="fa fa-book-open"></i> Design&Bureautique</h2>
                   <h1>Indisponble</h1>
                </div>
            </div>
        </div>
        <div class="tab-pane fade" id="projects" role="tabpanel" aria-labelledby="projects-tab">
            <div class="responsive-padd">
                <div class="table-container" role="table" aria-label="Destinations">
                    <h2 class="mb-4 text-uppercase"><i class="fas fa-project-diagram"></i> Programmation</h2>
                    <!--Begin content-->
                    <div class="container  mb-3 mt-3">
                        <div class="row justfy-content-space-between">
                            <?php foreach ($formations as $formation) { ?>
                                <div class="col-md  mb-sm-4">
                                    <!-- Card -->
                                    <div class="card card-image" >

                                        <!-- Content -->

                                        <div class="text-white text-center d-flex align-items-center rgba-black-strong py-5 px-4">
                                            <div>
                                                <h5 class="titre_cour"><i class="fas fa-copy"></i><?= $formation->cour_forma; ?></h5>
                                                <h3 class="card-title pt-2"><strong><?= $formation->titre_forma; ?></strong></h3>
                                                <p><?= substr($formation->extrait, 0, 110) . "..."; ?></p>
                                                <p class="info_cour">
                                                    <span>Date d'ajout: </span><span><?= $formation->date_ajout; ?></span><br>
                                                    <span>Date de modification: </span><span><?= $formation->date_modif; ?></span><br>
                                                    <span>Auteur: </span><span><?= $formation->auteur_forma; ?></span></p>
                                                <a class="btn btn_aceder" href="videos_formation?id=<?= $formation->id_forma; ?>"><i
                                                            class="fas fa-clone left"></i> Suivre</a>
                                            </div>
                                        </div>

                                    </div>
                                    <!-- Card -->
                                </div>
                            <?php } ?>
                        </div>
                    </div>
                    <!--End of  content-->
                </div>
            </div>
        </div>
    </div>
</div>

<script src="<?= makeRootOrFileUrl('public/js/import/jquery/jquery.js') ?>"></script>
<script src="<?= makeRootOrFileUrl('public/js/import/boostrap/bootstrap.js') ?>"></script>
<script src="<?= makeRootOrFileUrl('public/js/import/boostrap/popper.js') ?>"></script>
<script src="<?= makeRootOrFileUrl('public/js/script.js') ?>"></script>
<script>
    var fullHeight = function () {

        $('.js-fullheight').css('height', $(window).height());
        $(window).resize(function () {
            $('.js-fullheight').css('height', $(window).height());
        });

    };
    fullHeight();
    $('#sidebarCollapse').on('click', function () {
        $('#sidebar').toggleClass('active');
    });
</script>
<footer class="page-footer font-small  ">
    <div class="container-fluid text-center text-md-left">
        <div class="row">
            <div class="col-md-4 mt-md-0 mt-1">
                <p class="mt-2">
                    <a class="fb-ic">
                        <i class="fab fa-facebook-f fa-lg white-text mr-md-5 mr-3 fa-1x"> </i>
                    </a>
                    <a class="gplus-ic">
                        <i class="fab fa-google-plus-g fa-lg white-text mr-md-5 mr-3 fa-1x"> </i>
                    </a>
                    <a class="li-ic">
                        <i class="fab fa-linkedin-in fa-lg white-text mr-md-5 mr-3 fa-1x"> </i>
                    </a>
                    <a class="ins-ic">
                        <i class="fab fa-instagram fa-lg white-text mr-md-5 mr-3 fa-1x"> </i>
                    </a>
                </p>
            </div>
            <!--            <hr class="clearfix w-100 d-md-none pb-3">-->
            <div class="col-md-4 mb-md-0 mb-3">
                <a href="about-us"  style="color: aliceblue"><i class="fas fa-info-circle fa-3x" style="justify-content: center; position: relative;left: 50%; margin-top: 3px;"></i></a>
            </div>
            <div class="col-md-4 mt-md-0  sigle "><i class="fa fa-copyright"></i>
                <a href="#">Club Informatique Pigier Yamoussoukro</a>
            </div>
        </div>
    </div>

</footer>
</body>
</html>