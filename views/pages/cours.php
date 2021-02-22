<div class="container-fluid">
    <div class="row">
        <?php $i = 0;
        foreach ($videos as $video) {
            $i++; ?>
            <div class="col-md">
                <div class="card mt-4" style="width: 16rem">
                    <img src="images/img-algo2.png" height="270" alt="" class="card-img-top">
                    <div class="card-body">
                        <h5 class="card-title">Chapitre<?= $i; ?> </h5>

                        <a class="venobox_custom " data-vbtype="iframe" href="<?= $video->lien_video; ?>">
                            <div class="card-footer">
                                Regarder
                            </div>
                        </a>

                    </div>
                </div>
            </div>
        <?php } ?>
        <a class="venobox" data-vbtype="video" href="https://youtu.be/d85gkOXeXG4">YouYbe</a>
        <!--div class="col-md-8 px-1">
            <div class="embed-responsive embed-responsive-16by9" >
                <iframe class="embed-responsive-item" src='videos/testvid2.mp4'  allowfullscreen id="current_moovie">
                </iframe>
            </div>
            <div class="jumbotron">
                Cour d'algorithmique :<br>
                Chapitre 02<br>
                Auteur : Mcc<br>
                Date de Publication 12/01/20
            </div>
        </div>
        <div class="col-md-4 mb-0 p-0" id="moovie_list">

                    <iframe src="" height="300" width="300">

                    </iframe>
               <iframe width="560" height="315" src=""
                        frameborder="0" allow="accelerometer;
                clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen>
                </iframe>
        </div-->

    </div>
</div>
<!--end of content body-->
<!-- Footer -->
<br>
<br>
<br>
<br>
<br>
<br>

