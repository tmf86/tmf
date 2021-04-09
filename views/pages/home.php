<!--Start Carousel-->
<!--Carousel Wrapper-->
<div class="container-fluid ">
    <div id="carousel-example-2" class="carousel slide carousel-fade" data-ride="carousel">
        <!--Indicators-->
        <ol class="carousel-indicators">
            <li data-target="#carousel-example-2" data-slide-to="0" class="active"></li>
            <?php for ($s = 1; $s < $i; $s++) { ?>
                <li data-target="#carousel-example-2" data-slide-to="<?= $s; ?>"></li>
            <?php } ?>
            <!--li data-target="#carousel-example-2" data-slide-to="2"></li-->
        </ol>
        <!--/.Indicators-->
        <!--Slides-->
        <div class="carousel-inner" role="listbox">
            <?php $css_class = ""; ?>
            <?php foreach ($annonce as $Annonce) { ?>
                <?php if ($Annonce->id_ann == 1) {
                    $css_class = "active";
                } ?>
                <div class="carousel-item <?= $css_class ?>">
                    <div class="view">
                        <a href="#"><img class="d-block w-100" height="400px" src="<?= $Annonce->image_ann; ?>"
                                         alt="First slide"></a>
                        <div class="mask rgba-black-light"></div>
                    </div>
                    <div class="carousel-caption">
                        <h3 class="h3-responsive annonce_title">
                            <?= $Annonce->title_ann; ?>
                        </h3>
                        <p style="overflow: auto;display: none;"
                           class="annonce_content"><?= $Annonce->content_ann; ?></p>
                        <p>
                            <button class="btn btn-warning annonce_click">EN SAVOIR PLUS</button>
                        </p>
                    </div>
                </div>
            <?php } ?>

        </div>


        <!--/.Slides-->
        <!--Controls-->
        <a class="carousel-control-prev" href="#carousel-example-2" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#carousel-example-2" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
        </a>
        <!--/.Controls-->
    </div>
</div>
<!--End Carousel-->
<!--content body---->

<div class="container-fluid mt-5">
    <div class="row row-cols-1 row-cols-lg-4 row-cols-sm-2 ">
        <div class="col mb-4">
            <!-- Card -->
            <div class="card">
                <img src="images/img-forum1.png" alt="" height="300" class="card-img-top">
                <div class="card-body">
                    <h5 class="card-title">Forum</h5>
                    <p class="card-text">
                        Partager vos experiences , rencontrer vos mentors .
                    </p>
                    <div class="d-flex justify-content-center">
                        <a href="<?= makeRootOrFileUrl('forum') ?>" class="btn btn-warning">Acceder au forum</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="col mb-4">
            <!-- Card -->
            <div class="card">
                <img src="images/img-card2.png" alt="" height="320" class="card-img-top">
                <div class="card-body">
                    <h5 class="card-title">Sujet</h5>
                    <p class="card-text">
                        Collection de Sujets de 2010-2020 .
                    </p>
                    <div class="text-center">
                        <a href="sujets" class="btn btn-warning" id="acces_sujet">Acceder aux sujets</a>
                    </div>
                </div>
            </div>
            <!-- Card -->
        </div>
        <div class="col mb-4">
            <!-- Card -->
            <div class="card">
                <img src="images/img-algo1.png" alt="" height="320" class="card-img-top">
                <div class="card-body">
                    <h5 class="card-title">Cours </h5>
                    <p class="card-text">
                        Debuter en programmation .
                    </p>
                    <div class="text-center">
                        <a href="cours" class="btn btn-warning">Acceder aux cours </a>
                    </div>
                </div>
            </div>
            <!-- Card -->
        </div>
        <div class="col mb-4">
            <!-- Card -->
            <div class="card">
                <img src="images/img-bino2.png" alt="" height="320" class="card-img-top">
                <div class="card-body">
                    <h5 class="card-title">Parrainnage</h5>
                    <p class="card-text">
                        Organiser vos parrainnage en un clique .
                    </p>
                    <div class="text-center">
                        <a href="parrainage" class="btn btn-warning">Acceder au parrainnage</a>
                    </div>
                </div>
            </div>
            <!-- Card -->
        </div>
    </div>
</div>
<!--end of content body-->
