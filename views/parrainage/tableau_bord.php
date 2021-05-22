<!--Navbar -->

<!--/.Navbar -->
<!--Begin content-->
<!--<div id="debug"></div>-->

    <div class="container-fluid h-100" id="cadre">
        <div class="row justify-content-center blue-gradient-rgba " style="background-color: ghostwhite;">
            <div class="col-md-5 col-xl-4 chat">
               <div class="card mb-sm-3 mb-md-0 contacts_card">
                   <div class="card-header">
                       <div class="user_info">
                           <span><span id="fil_total">15</span>  </span>
<!--                           <span id="fil_total_1">15</span>-->
                       </div>
                    </div>
                        <div class="card-body contacts_body">
                        <ul class="contacts" id="filleul_liste">
                        </ul>
                    </div>
                    <div class="card-footer"></div>
               </div>
            </div>
            <div class="col-md-2 col-xl-4" >
                <div class="center ">
                    <button class="btn  bouton_active bg-light " id="open-popup-btn">
                        PARRAINER
                    </button>
                </div>
                <div class="progression"></div>

            </div>
            <div class="col-md-5 col-xl-4 chat">
               <div class="card mb-sm-3 mb-md-0 contacts_card">
                   <div class="card-header">
                            <div class="user_info">
                                <span><span id="par_total">15</span> </span>
<!--                                <span id="par_total_1">15</span>-->
                            </div>
                    </div>
                        <div class="card-body contacts_body">
                        <ul class="contacts" id="parrain_liste">
                        </ul>
                    </div>
                    <div class="card-footer"></div>
               </div>
            </div>
    </div>
    </div>
<div class="popup center" style="background-image:url('images/back_par_2.jpg'); background-size: cover;
    height: 100%;">
    <section style="display: flex;" id="section" >
        <div class="loader" id="ld">
            <span style="--i:1;"></span><span style="--i:2;"></span><span style="--i:3;"></span><span style="--i:4;"></span><span style="--i:5;"></span><span style="--i:6;"></span><span style="--i:7;"></span><span style="--i:8;"></span><span style="--i:9;"></span><span style="--i:10;"></span><span style="--i:11;"></span><span style="--i:12;"></span><span style="--i:13;"></span><span style="--i:14;"></span><span style="--i:15;"></span><span style="--i:16;"></span><span style="--i:17;"></span><span style="--i:18;"></span><span style="--i:19;"></span>
            <span style="--i:20;"></span>
        </div>
        <span id="temps_s" style="font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, 'Helvetica Neue', Arial, 'Noto Sans', sans-serif, 'Apple Color Emoji', 'Segoe UI Emoji', 'Segoe UI Symbol', 'Noto Color Emoji'; font-weight: bold; font-size: 6rem; color: whitesmoke; position: absolute; top:38%;left:30%" >5s</span>
    </section>
        <div class="icon" id="icone" style="display: none;">
            <i class="fa fa-check"></i>
        </div>
        <div class="title" id="feli" style="display: none;">
            F&eacute;licitation!!
        </div>

    <div class="row">
        <div class="col-md" >
            <div class="description glob"  style="display:none;" id="desc">
                <div class="glob" >
                    <div class="cardre"style="margin-left: -2%; " >
                        <div class="cercle" ></div>
                        <div class="contenue_cadre" >
                            <h2 id="mb_name">Toure Marc</h2>
                            <p>Contact:<span id="mb_contact"></span><br>
                                Mail: <span id="mb_mail"></span><br>
                                Classe:<span id="mb_fil"></span><br>
                                Genre:<span id="mb_genre"></span>
                            </p>
                            <a href="#" id="mb_status">Parrain</a>
                        </div>
                        <img src="images/image-1.png" id="mb_photo" >
                    </div>
                </div>
                <div class="glob">
                    <div class="cardre" style="margin-left: 10%;">
                        <div class="cercle"></div>
                        <div class="contenue_cadre">
                            <h2 id="mb_name_1">Toure Marc</h2>
                            <p>
                            <p>Contact:<span id="mb_contact_1"></span><br>
                                Mail: <span id="mb_mail_1"></span><br>
                                Classe:<span id="mb_fil_1"></span><br>
                                Genre:<span id="mb_genre_1"></span>
                            </p>
                            <a href="#"id="mb_status_1">Filleul</a>
                        </div>
                        <img src="images/image-1.png" alt="imge" id="mb_photo_1">
                    </div>
                </div>
            </div>
            </div>
        </div>
    <div class="dismiss-btn" id="suiv" style="display: none;">
        <button id="dismiss-popup-btn">
            SUIVANT<i class="fa fa-arrow-right fa-1x"></i>
        </button>
    </div>
    </div>
</div>
<div id="card_exit" >
    <p>
        Voulez vous Quiter cette page ?
    </p>
    <button id="yes_exit" class="btn btn-light">Oui</button>
    <button id="no_exit"class="btn btn-light">Non</button>
</div>
<div class="animer " style="display: none;"></div>

        <!--end content-->