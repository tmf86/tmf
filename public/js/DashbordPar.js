$(document).ready(function (e) {
   // e.preventDefault();
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
    let chemin = buildUrl('initPar');
    //chemin = toString(chemin);
    var tb_alea_f= [];
    let tentative=0;
    let tb_alea_p = [];
    let demande = [];
    let tb_par = [];
    var tb_fil = [];
    setTimeout(function (){

            $.ajax({
                url : chemin,
                type : 'POST',
                dataType : 'json', // On désire recevoir du HTML
                success : function(code_html, statut){ // code_html contient le HTML renvoyé
                    const allInfo = code_html;
                    //console.log(allInfo);
                     tentative = allInfo[0]["nbr_tentative"];
                    // alert(tentative);
                     tb_alea_f = allInfo[0]["tab_aleatoire_f"];
                    tb_alea_p = allInfo[0]["tab_aleatoire_p"];
                     demande = allInfo[1];
                      tb_par =allInfo["parrain"];
                    tb_fil = allInfo["filleul"];
                    //console.log(demande);
                    //alert(tb_fil[0]["nom"]);
                      alert(statut);
                      document.getElementById("info_demand").innerHTML +=affich_info("Lieu",demande["lieu"]);
                    document.getElementById("info_demand").innerHTML +=affich_info("Filiere",demande["filiere"]);
                    document.getElementById("info_demand").innerHTML +=affich_info("Demandeur",demande["qualite"]);
                    document.getElementById("fil_total").innerHTML =tb_fil.length;
                    document.getElementById("fil_total_1").innerHTML =tb_fil.length;
                    document.getElementById("par_total_1").innerHTML =tb_par.length;
                    document.getElementById("par_total").innerHTML =tb_par.length;

                   //calcultemps(demande["date"]);
                    for (let p=0;p<tb_par.length;p++){
                         document.getElementById("parrain_liste").innerHTML +=affich_mb(tb_par[p],"parrain");
                        //alert(tb_par[p]);
                    }
                    for (let o=0;o<tb_fil.length;o++){
                        document.getElementById("filleul_liste").innerHTML +=affich_mb(tb_fil[o],"filleul");
                        //alert(tb_par[p]);
                    }
                }
            });

    },200);

    function affich_mb(tb,tp_mb){
        return ' <li  >\n' +
            '                            <div class="d-flex bd-highlight">\n' +
            '                                <div class="img_cont">\n' +
            '                                    <img src="'+tb['image']+'" class="rounded-circle user_img">\n' +
            '                                </div>\n' +
            '                                <div class="user_info">\n' +
            '                                    <span style="float: left;">'+tb["nom"]+" &emsp;"+tb["prenom"]+'</span>\n' +
            '                                    <div style="display: none" class="bule_par">\n' +
            '                                         \n' +
            '                                         <div class="user_info bule_info"  >\n' +
            '                                            <img src="../../fast-rooter-test/public/images/icone2" class="rounded-circle" style="width:3em;height:3em;border:1.5px solid #f5f6fa; float: left; margin-left: 1rem;">\n' +
            '                                             <span>Samuel</span>\n' +
            '                                         <p>'+tp_mb+'</p>\n' +
            '                                         </div> \n' +
            '                                    </div>\n' +
            '                                   \n' +
            '                                    <!--p style="clear: left;">parrainer</p-->\n' +
            '                                </div>\n' +
            '                            </div>\n' +
            '                        </li>';

    }
    function affich_info(element,valeur) {
        return '<li class="nav-item  ">\n' +
            '                <button class="btn btn-dark-light" style="font-family: '+"Roboto"+', sans-serif;font-size: large;">'+element+': '+valeur+'</button>\n' +
            '                    <span class="sr-only">(current)</span>\n' +
            '                \n' +
            '            </li>';
    }
    function calcultemps(date){
        let d= toTimestamp(date);
       // alert(d);
        setInterval(function () {
            d--;
            var newDate = new Date();
            newDate.setTime(d *1000);
            var dateString = newDate.toUTCString();
            document.getElementById("decompte").innerHTML ="dans: "+dateString;
        },1000);
    }
    function toTimestamp(strDate){
        var datum = Date.parse(strDate);
        return datum/1000;
    }
    /*$("#btn_begin").click(function () {
        alert("parrainage debuter");
    });*/
    /*document.getElementById("btn_begin").addEventListener("click",function (){
        alert("parrainage debuter");
        console.log(tb_fil[tb_alea_f[1]]);
        console.log(tb_par[tb_alea_p[1]]);
    });*/
    const root = document.querySelector(":root");
    let nbr_tentative=0;
    //alert("tentative: "+tentative);

    document.getElementById("open-popup-btn").addEventListener("click",function(){
        document.getElementsByClassName("popup")[0].classList.add("active");
       /*// document.getElementById("mb_name").innerHTML=tb_par[]*/
        console.log(tb_par);
        console.log(tb_fil);

        for (let h=1;h<=tentative;h++){
            console.log(tb_par[tb_alea_p[h]]+":index="+tb_alea_p[h]);
            console.log(tb_fil[tb_alea_f[h]]+":index="+tb_alea_f[h]);

        }
        console.log(tb_par[tb_par.length]);
        console.log(tb_fil[tb_fil.length]);
        console.log(tb_alea_p[nbr_tentative]);
        console.log(tb_alea_f[nbr_tentative]);
        affiche_mbre_par(tb_alea_p[nbr_tentative],nbr_tentative,tb_alea_f[nbr_tentative]);
       affiche_mbre_fil(tb_alea_f[nbr_tentative],nbr_tentative,tb_alea_p[nbr_tentative]);
       alert(nbr_tentative);
        if (nbr_tentative === tentative){
            alert("parrainage terminer");
            document.getElementById("dismiss-popup-btn").innerHTML = "Terminer";
            nbr_tentative=0;
        }else {
            setTimeout(function () {
                root.style.setProperty("--clip","circle(400px at center)");
                root.style.setProperty("--bg","linear-gradient(90deg, rgba(33,147,176,1) 0%, rgba(9,102,121,1) 35%, rgba(109,213,237,1) 100%)");
                root.style.setProperty("--lef","59%");
                root.style.setProperty("--haut","350px");
                root.style.setProperty("--lef_un","-3");
                root.style.setProperty("--opacite","1");
                root.style.setProperty("--cache","visible");
                root.style.setProperty("--marge_img","8.5%");
                root.style.setProperty("--bg_cadre","linear-gradient(90deg, rgba(54,209,220,1) 0%, rgba(9,9,121,1) 35%, rgba(91,134,229,1) 100%)");

            },2500);
            nbr_tentative++;
            /*var user_bule = document.querySelectorAll("#parrain_liste .user_info");
            console.log(user_bule[1]);*/
        }

       // console.log(tb_par[tb_alea_p[nbr_tentative]]['nom']);
        //console.log(tb_alea_p[nbr_tentative]);

    });

    document.getElementById("dismiss-popup-btn").addEventListener("click",function(){
        root.style.setProperty("--clip","circle(120px at center)");
        root.style.setProperty("--bg","linear-gradient(90deg, rgba(33,147,176,1) 0%, rgba(9,102,121,1) 35%, rgba(109,213,237,1) 100%)");
        root.style.setProperty("--lef","50%");
        root.style.setProperty("--haut","300px");
        root.style.setProperty("--lef_un","20%");
        root.style.setProperty("--opacite","0");
        root.style.setProperty("--cache","hidden");
        root.style.setProperty("--over_flo","hidden");
        root.style.setProperty("--bg_cadre","transparent");
        document.getElementsByClassName("popup")[0].classList.remove("active");

    });
    function affiche_mbre_par(index,n,n1){
        //console.log(index);
        document.getElementById("mb_name").innerHTML=tb_par[index]['nom']+tb_par[index]['prenom'];
        document.getElementById("mb_contact").innerHTML=tb_par[index]['contact'];
        document.getElementById("mb_mail").innerHTML=tb_par[index]['email'];
        document.getElementById("mb_fil").innerHTML=tb_par[index]['filiere'];
        document.getElementById("mb_genre").innerHTML=tb_par[index]['genre'];
        document.getElementById("mb_status").innerHTML=tb_par[index]['status'];
        document.getElementById("mb_photo").src=tb_par[index]['image'];
       // document.getElementById("bule_par").style.display="inline-block";
       // $("#parrain_liste .user_info")[1].css("display","inline-block");
        var  bule = document.querySelectorAll("#parrain_liste .bule_par");
        //console.log("nombre bulle fil:"+bule.length);
       // console.log(bule);
       // console.log(n1);

        bule[index].style.display="inline-block";
        var nom_fil = document.querySelectorAll("#filleul_liste .bule_info span");
        var img_fil = document.querySelectorAll("#filleul_liste .bule_info img");
        //console.log("nombre img fil:"+img_fil.length);
        // console.log("nombre nom fil:"+nom_fil.length);
        img_fil[index].src= tb_par[index]['image'];
        nom_fil[index].innerHTML=tb_par[n1]['nom']+tb_par[n1]['prenom'];

    }
    function affiche_mbre_fil(index,n,n1){
        document.getElementById("mb_name_1").innerHTML=tb_fil[index]['nom']+tb_fil[index]['prenom'];
        document.getElementById("mb_contact_1").innerHTML=tb_fil[index]['contact'];
        document.getElementById("mb_mail_1").innerHTML=tb_fil[index]['email'];
        document.getElementById("mb_fil_1").innerHTML=tb_fil[index]['filiere'];
        document.getElementById("mb_genre_1").innerHTML=tb_fil[index]['genre'];
        document.getElementById("mb_status_1").innerHTML=tb_fil[index]['status'];
        document.getElementById("mb_photo_1").src=tb_fil[index]['image'];
        //document.getElementById("bule_par").style.display="inline-block";
       // $("#filleul_liste .user_info")[1].display="inline-block";
       var  bule_f = document.querySelectorAll("#filleul_liste .bule_par");
       // console.log(bule_f);
        bule_f[index].style.display="inline-block";

        var nom_par = document.querySelectorAll("#parrain_liste .bule_info span");
        var img_par = document.querySelectorAll("#parrain_liste .bule_info img");
        img_par[index].src= tb_fil[n1]['image'];
        nom_par[index].innerHTML=tb_fil[n1]['nom']+tb_fil[n1]['prenom'];

    }
});

