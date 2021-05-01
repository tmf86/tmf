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
    let tb_alea_f=[];
    let tentative=[];
    let tb_alea_p = [];
    let demande = [];
    let tb_par = [];
    let tb_fil = [];
    setTimeout(function (){

            $.ajax({
                url : chemin,
                type : 'POST',
                dataType : 'json', // On désire recevoir du HTML
                success : function(code_html, statut){ // code_html contient le HTML renvoyé
                    const allInfo = code_html;
                     tentative = allInfo[0]["nb_tentative"];
                     tb_alea_f = allInfo[0]["tab_aleatoire_f"];
                     //alert(tb_alea_f);
                    tb_alea_p = allInfo[0]["tab_aleatoire_p"];
                     demande = allInfo[1];
                      tb_par = allInfo["parrain"];
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

                   // $("#parrain_liste li ")
                    //const liste = document.querySelectorAll("li");
                    //alert(liste[2].className);
                   /* for (let i = 0;i<liste.length;i++){
                        liste[i].addEventListener("mouse",function () {
                            liste[i].classList.add("active");
                        });
                        liste[i].addEventListener("mouseout",function () {
                            liste[i].classList.remove("active");
                        });
                    }*/
                }
            });

    },200);

    function affich_mb(tb,tp_mb){
        return ' <li  >\n' +
            '                            <div class="d-flex bd-highlight">\n' +
            '                                <div class="img_cont">\n' +
            '                                    <img src="../public/images/icone1.jpg" class="rounded-circle user_img">\n' +
            '                                </div>\n' +
            '                                <div class="user_info">\n' +
            '                                    <span style="float: left;">'+tb["nom"]+" &emsp;"+tb["prenom"]+'</span>\n' +
            '                                    <div style="display: none">\n' +
            '                                         \n' +
            '                                         <div class="user_info" >\n' +
            '                                            <img src="../../fast-rooter-test/public/images/icone2" class="rounded-circle" style="width:3em;height:3em;border:1.5px solid #f5f6fa; float: left; margin-left: 1rem;">\n' +
            '                                             <span>Samuel</span>\n' +
            '                                         <p>'+tp_mb+'</p>\n' +
            '                                         </div> \n' +
            '                                    </div>\n' +
            '                                   \n' +
            '                                    <p style="clear: left;">parrainer</p>\n' +
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
    document.getElementById("open-popup-btn").addEventListener("click",function(){
        document.getElementsByClassName("popup")[0].classList.add("active");
        document.querySelector(".description").innerHTML='' +
            '<div class="container-fluid"> \n' +
            '\t\t<div class="cardre">\n' +
            '\t\t\t<div class="cercle"></div>\n' +
            '\t\t\t<div class="contenue_cadre">\n' +
            '\t\t\t\t<h2>Toure Marc</h2>\n' +
            '\t\t\t\t<p>Etudiant , ghjksgxgyhdyghdvhdAnother Course : Build Complete Real World Responsive Websites from Scratch</p>\n' +
            '\t\t\t\t<a href="#">Parrain</a>\n' +
            '\t\t\t</div>\n' +
            '\t\t\t<img src="images/carousel1.jpg">\n' +
            '\t\t</div>\n' +
            '\t</div>';
        document.querySelector(".description").innerHTML+='' +
            '<div class="container-fluid"> \n' +
            '\t\t<div class="cardre">\n' +
            '\t\t\t<div class="cercle"></div>\n' +
            '\t\t\t<div class="contenue_cadre">\n' +
            '\t\t\t\t<h2>Toure Marc FABRICE</h2>\n' +
            '\t\t\t\t<p>Etudiant , ghjksgxgyhdyghdvhdAnother Course : Build Complete Real World Responsive Websites from Scratch</p>\n' +
            '\t\t\t\t<a href="#">Filleul</a>\n' +
            '\t\t\t</div>\n' +
            '\t\t\t<img src="images/carousel1.jpg">\n' +
            '\t\t</div>\n' +
            '\t</div>';
            //"filleul:"+JSON.stringify(tb_fil[tb_alea_f[1]], null, 4)+"<br/>"+"parrain:"+JSON.stringify(tb_par[tb_alea_p[1]], null, 4);

    });

    document.getElementById("dismiss-popup-btn").addEventListener("click",function(){
        document.getElementsByClassName("popup")[0].classList.remove("active");
    });

});

