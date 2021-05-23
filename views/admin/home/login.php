<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Cipy | Log in</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?= makeRootOrFileUrl("public/plugins/fontawesome-free/css/all.min.css"); ?>">
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="<?= makeRootOrFileUrl("public/plugins/icheck-bootstrap/icheck-bootstrap.min.css"); ?>">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?= makeRootOrFileUrl("public/dist/css/adminlte.min.css"); ?>">
</head>
<body class="hold-transition login-page">
<div class="login-box">
  <!-- /.login-logo -->
  <div class="card card-outline card-primary">
    <div class="card-header text-center">
      <a href="" class="h1"><b>CIPY</b>Admin</a>
    </div>
    <div class="card-body">
      <p class="login-box-msg">Conestez vous pour accerder a votre session</p>

      <form action="" method="post" id="form_adm">
        <div class="input-group mb-3">
          <input type="text" class="form-control" name="login_admin" placeholder="Login" id="log_adm">
          <div class="input-group-append">
            <div class="input-group-text"  >
              <span class="fas fa-user"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input type="password" class="form-control" name="pwd_admin" placeholder="Password" id="pwd_adm">
          <div class="input-group-append"  >
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-8">
            <div class="icheck-primary">
              <input type="checkbox" id="remember" name="check_admin" >
              <label for="remember">
                Remember Me
              </label>
            </div>
          </div>
          <!-- /.col -->
          <div class="col-4">
            <button type="submit" class="btn btn-primary btn-block" id="admin_vld" >Sign In</button>
          </div>
          <!-- /.col -->
        </div>
      </form>

<!--      <div class="social-auth-links text-center mt-2 mb-3">-->
<!--        <a href="#" class="btn btn-block btn-primary">-->
<!--          <i class="fab fa-facebook mr-2"></i> Sign in using Facebook-->
<!--        </a>-->
<!--        <a href="#" class="btn btn-block btn-danger">-->
<!--          <i class="fab fa-google-plus mr-2"></i> Sign in using Google+-->
<!--        </a>-->
<!--      </div>-->
      <!-- /.social-auth-links -->

      <p class="mb-1">
        <a href="#">I forgot my password</a>
      </p>
      <p class="mb-0">
        <a href="home" class="text-center">Accueil</a>
      </p>
<!--    </div>-->
    <!-- /.card-body -->
  </div>
  <!-- /.card -->
</div>
<!-- /.login-box -->

<!-- jQuery -->
<script src="<?= makeRootOrFileUrl("public/plugins/jquery/jquery.min.js"); ?>"></script>
<!-- Bootstrap 4 -->
<script src="<?= makeRootOrFileUrl("public/plugins/bootstrap/js/bootstrap.bundle.min.js"); ?>"></script>
<!-- AdminLTE App -->
<script src="<?= makeRootOrFileUrl("public/dist/js/adminlte.min.js"); ?>"></script>
    <script src="<?= makeRootOrFileUrl("public/plugins/jquery-validation/jquery.validate.min.js"); ?>"></script>
    <script src="<?= makeRootOrFileUrl("public/plugins/jquery-validation/additional-methods.min.js"); ?>"></script>
    <script>
        $(document).ready(()=>{
            const sprintf = (str, format, ...args) => {
                return !(args.length) ? str : sprintf(str.replace(format, args.shift()), format, ...args)
            }
            const buildUrl = (value = 'defaut') => {
                if (value === 'defaut') {
                    return window.location.href
                }
                const slashPos = window.location.href.lastIndexOf('/');
                const bashPath = window.location.href.substr(0, slashPos)
                return sprintf("%/%", '%', bashPath, value)
            }
            // alert("ok");
            let chemin = buildUrl('c9831985d00cf');
            let formData={};
            $(function () {
                $.validator.setDefaults({
                    submitHandler: function () {
                       // alert( "Form successful submitted!" );
                        // e.preventDefault();
                        formData["login"]=$("#log_adm").val();
                        formData["pwd"]=$('#pwd_adm').val();
                        // console.dir(formData);
                        // console.log($("#log_adm").val());
                        $.ajax({
                            url:chemin,
                            type:'POST',
                            data:formData,
                            datatype: 'html',
                            success : function(code_html, statut){
                                console.dir(statut);
                                if (code_html==="denied"){
                                    $("#log_adm").addClass('is-invalid');
                                    $("#pwd_adm").addClass('is-invalid');
                                    $("#log_adm").focusin(()=>{
                                        $(this).removeClass('is-invalid');
                                    });
                                    $("#pwd_adm").focusin(()=>{
                                        $(this).removeClass('is-invalid');
                                    });
                                }else {
                                    window.location=buildUrl("home_admin");
                                }
                            }
                        });
                    }
                });
           // $("#form_adm").serializeArray();
           //  $("#form_adm").submit((e)=>{
           //
           //  });

                $('#form_adm').validate({
                    rules: {
                        login_admin: {
                            required: true,
                            alphanumeric:true
                        },
                        pwd_admin: {
                            required: true,
                            minlength: 5
                        },
                    },
                    messages: {
                        login_admin: {
                            required: "Entrez un login SVP !",
                            alphanumeric: "Le login doit etre Alphanumerique"
                        },
                        pwd_admin: {
                            required: "Veillez Saisir un mot de passe",
                            minlength: "le mote de passe doit contenir au mmoins 5 caractere"
                        }
                    },
                    errorElement: 'span',
                    errorPlacement: function (error, element) {
                        error.addClass('invalid-feedback');
                        element.closest('.form-group').append(error);
                    },
                    highlight: function (element, errorClass, validClass) {
                        $(element).addClass('is-invalid');
                    },
                    unhighlight: function (element, errorClass, validClass) {
                        $(element).removeClass('is-invalid');
                    }
                });
            });
        });
    </script>
    <script>

    </script>
</body>
</html>
