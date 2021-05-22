<!-- Footer -->
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

<!-- Footer -->
<!--load js files -->
<script src="<?= makeRootOrFileUrl('public/js/import/boostrap/bootstrap.js') ?>"></script>
<script src="<?= makeRootOrFileUrl('public/js/import/boostrap/popper.js') ?>"></script>
<script src="<?= makeRootOrFileUrl('public/js/import/mdb/mdb.js') ?>"></script>
<?= suppl_tags($scripts ?? [], SCRIPT) ?>
<script>
    $(".preloader").fadeOut();
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
<script src="<?= makeRootOrFileUrl('public/js/script.js') ?>"></script>
<script>
    //Section Script Clobal
    function display_annonce(nb){
        //$(".annonce_click").click(function () {
       // alert("ok");$(".annonce_content")[nb].css("display")
       // console.log($(".annonce_content")[nb].css('display'));
      console.log(document.querySelectorAll('.annonce_content')[nb].style.display);
        if (document.querySelectorAll('.annonce_content')[nb].style.display === "none") {
            document.querySelectorAll('.annonce_content')[nb].style.display ="block";//show(1500);
           document.querySelectorAll(".annonce_click")[nb].innerHTML="MOINS";
        } else {
            document.querySelectorAll('.annonce_content')[nb].style.display ="none";//hide(1500);
            document.querySelectorAll(".annonce_click")[nb].innerHTML="EN SAVOIR PLUS";
        }
       // $(".annonce_content").toggleAttribute('display');
        // });
    }
</script>
<!--end of js files loading  -->
</body>
</html>