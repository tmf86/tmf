<?php
?>

<footer class="fixed-bottom">
    <nav class=" navbar navbar-expand-lg  mb-0">
        <div class="collapse navbar-collapse" >
            <ul class="navbar-nav  mb-0" >
                <li class="nav-item  ">
                    <a class="nav-link btn btn-light" href="tabl">
                        <i class=" fa fa-home fa-2x"></i>
                        <span class="sr-only">(current)</span>
                    </a>
                </li>
                <li class="nav-item  ">
                    <a class="nav-link btn btn-light" href="settimg_par"><i class=" fas fa-cogs fa-2x"></i>
                        <span class="sr-only">(current)</span>
                    </a>
                </li>
                <li class="nav-item  ">
                    <a class="nav-link btn btn-light" href="" id="exit_par"><i class="fas fa-power-off fa-2x"></i>
                        <span class="sr-only">(current)</span>
                    </a>
                </li>
            </ul>
        </div>
    </nav>
</footer>
<script src="<?= makeRootOrFileUrl('public/js/import/jquery/jquery.js') ?>"></script>
<script src="<?= makeRootOrFileUrl('public/js/import/boostrap/bootstrap.js') ?>"></script>
<script src="<?= makeRootOrFileUrl('public/js/import/boostrap/popper.js') ?>"></script>
<script src="<?= makeRootOrFileUrl('public/js/import/mdb/mdb.js') ?>"></script>
<script src="<?= makeRootOrFileUrl('public/js/sign_out_Par.js') ?>"></script>

<?= suppl_tags($scripts ?? [], SCRIPT) ?>
<script></script>
    <!-- Footer -->
    </body>
    </html>
