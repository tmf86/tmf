<!-- Footer -->
<footer class="page-footer font-small special-color pt-4">
    <div class="container-fluid text-center text-md-left">
        <div class="row">
            <div class="col-md-6 mt-md-0 mt-3">
                <h5 class="text-uppercase font-weight-bold">
                    <button class="btn btn-warning">Apropos</button>
                </h5>
                <p></p>
            </div>
            <hr class="clearfix w-100 d-md-none pb-3">
            <div class="col-md-6 mb-md-0 mb-3">
                <h5 class="text-uppercase font-weight-bold text-dark">Reseaux Social</h5>
                <p class="mt-4">
                    <a class="fb-ic">
                        <i class="fab fa-facebook-f fa-lg white-text mr-md-5 mr-3 fa-2x"> </i>
                    </a>
                    <a class="tw-ic">
                        <i class="fab fa-twitter fa-lg white-text mr-md-5 mr-3 fa-2x"> </i>
                    </a>
                    <a class="gplus-ic">
                        <i class="fab fa-google-plus-g fa-lg white-text mr-md-5 mr-3 fa-2x"> </i>
                    </a>
                    <a class="li-ic">
                        <i class="fab fa-linkedin-in fa-lg white-text mr-md-5 mr-3 fa-2x"> </i>
                    </a>
                    <a class="ins-ic">
                        <i class="fab fa-instagram fa-lg white-text mr-md-5 mr-3 fa-2x"> </i>
                    </a>
                    <a class="pin-ic">
                        <i class="fab fa-pinterest fa-lg white-text fa-2x"> </i>
                    </a>
                </p>
            </div>
        </div>
    </div>
    <div class="footer-copyright text-center py-4">©2020 Copyright:
        <a href="#">Club Imformatique Pigier Yamoussoukro</a>
    </div>
</footer>
<!-- Footer -->
<!--load js files -->
<script src="<?= buildpath('public/js/import/jquery.js') ?>"></script>
<script src="<?= buildpath('public/js/import/bootstrap.js') ?>"></script>
<script src="<?= buildpath('public/js/import/popper.js') ?>"></script>
<script src="<?= buildpath('public/js/import/mdb.js') ?>"></script>
<?= scripts($scripts ?? []) ?>
<script>
    setTimeout(function () {
        $(".waiting").toggleClass("hidden")
    }, 3000)
</script>
<!--end of js files loading  -->
</body>
</html>