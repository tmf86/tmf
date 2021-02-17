
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-8 px-1">
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
                <?php //var_dump($videos);?>
                <?php foreach ($videos as $video){?>
                    <iframe width="560" height="315" src="<?= $video->lien_video;?>"
                            frameborder="0" allow="accelerometer; autoplay;
                    clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen>
                    </iframe>

                <?php }?>
            </div>
            <script>

            </script>
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

