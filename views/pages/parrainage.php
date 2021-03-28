<?php
?>
<!-- Main Content -->
<style>
    body{
        background-image: url("images/pigeryakro.jpeg") ;
        background-repeat: no-repeat ;
        background-position-x: center ;
        background-position-y:  center;
        background-attachment: fixed;
        -webkit-background-size: cover;
        -moz-background-size: cover;
        -o-background-size: cover;
        background-size: cover;
        height: 100%;
    }
    .main-content{
        width: 70%;
        border-radius: 20px;
        box-shadow: 0 5px 5px rgba(0,0,0,.4);
        margin: 5em auto;
        display: flex;
       /* height: 15rem;*/
    }
    .company__info{
        background-image:url("images/CIPY.png");
        background-repeat: no-repeat ;
        /*background-position-x: center ;
        background-position-y:  center;*/
        /*background-attachment: fixed;*/
        -webkit-background-size: cover;
        -moz-background-size: cover;
        -o-background-size: cover;
        background-size: cover;
       height: 30rem;
    border-top-left-radius: 20px;
        border-bottom-left-radius: 20px;
        display: flex;
        flex-direction: column;
        justify-content: center;
        color: #fff;
    }
    .fa-android{
        font-size:3em;
    }
    @media screen and (max-width: 640px) {
        .main-content{width: 90%;}
        .company__info{
            display: none;
        }
        .login_form{
            border-top-left-radius:20px;
            border-bottom-left-radius:20px;
        }
    }
    @media screen and (min-width: 642px) and (max-width:800px){
        .main-content{width: 70%;}
    }
    .row > h2{
        color:  #17202a;
        font-weight: 1000;
    }
    .login_form{
        /*background-color:  #515a5a;/*#fff;*/
        background-image:url("images/pigierparrain.png") ;
        -webkit-background-size: cover;
        -moz-background-size: cover;
        -o-background-size: cover;
        background-size: cover;
        border-top-right-radius:20px;
        border-bottom-right-radius:20px;
        border-top:1px solid #ccc;
        border-right:1px solid #ccc;
    }
    form{
        padding: 0 2em;
    }
    .form__input{
        width: 100%;
        border:0px solid transparent;
        border-radius: 5px;
        border-bottom: 1px solid #aaa;
        padding: 1em .5em .5em;
        padding-left: 2em;
        outline:none;
        margin:1.5em auto;
        transition: all .5s ease;
    }
    .form__input:focus{
        border-bottom-color: #008080;
        box-shadow: 0 0 5px rgba(0,80,80,.4);
        border-radius: 4px;
    }
    .btn{
        transition: all .5s ease;
        /*width: 5rem;*/
        height: 50%;

        border-radius: 30px;
        color:#008080;
        font-weight: 600;
        background-color: #fff;
        border: 1px solid  #515a5a;
        margin-top: 1.5em;
        margin-bottom: 1em;
    }
    .btn:hover, .btn:focus{
        background-color: #515a5a;/* #008080;*/
        color:#fff;
    }
    .bouton{
       height: 0.4rem;

       /* padding: 0.7rem;*/
    }
</style>
<div class="container-fluid">
    <div class="row main-content bg-success text-center">
        <div class="col-md-4 text-center company__info">
            <!--span class="company__logo"><h2><span class="fa fa-android"></span></h2></span>
            <h4 class="company_title">Your Company Logo</h4-->
        </div>
        <div class="col-md-8 col-xs-12 col-sm-12 login_form ">
            <div class="container-fluid">
                <div class="row">
                    <h2 style="font-family: 'Cairo';font-style: italic;">PARRAINAGE</h2>
                </div>
                <div class="row">
                    <form control="" class="form-group" method="post">
                        <div class="row">
                            <input type="text" name="identifiant" id="username" class="form__input" placeholder="Identifiant">
                        </div>
                        <div class="row">
                            <!-- <span class="fa fa-lock"></span> -->
                            <input type="password" name="password" id="password" class="form__input" placeholder="Mot de passe">
                        </div>
                        <div class="row px-4">
                            <input type="checkbox" name="remember_me" id="remember_me" class="">
                            <label for="remember_me">Se souvernir de moi!</label>
                        </div>
                        <div class="row">
                            <input type="submit" value="Connexion" class="btn">
                        </div>
                    </form>
                </div>
                <div class="row">
                    <p>Faire une demande <a href="demande"><button class="btn btn-sm" ><span style="text-align: center;padding-bottom: 4px;">ICI</span></button> </a></p>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Footer -->
<!--div class="container-fluid text-center footer">
    Coded with &hearts; by <a href="https://bit.ly/yinkaenoch">Yinka.</a></p>
</div-->
