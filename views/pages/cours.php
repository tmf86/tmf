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

                        <a class="venobox_custom " data-vbtype="iframe"
                           href="https://www.youtube.com/watch?v=ebx-tGjaVoU">
                            <div class="card-footer">
                                Regarder
                            </div>
                        </a>

                    </div>
                </div>
            </div>
        <?php } ?>
        <a class="venobox" data-vbtype="" href="https://www.youtube.com/watch?v=NOqX94_3z-g">YouYbe</a>
    </div>
</div>


