$(document).ready(function () {
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
    //let tb_par= [];
    setTimeout(function (){

            $.ajax({
                url : chemin,
                type : 'POST',
                dataType : 'json', // On désire recevoir du HTML
                success : function(code_html, statut){ // code_html contient le HTML renvoyé
                    const allInfo = code_html;
                    const tentive = allInfo[0]["nb_tentative"];
                    const tb_alea_f = allInfo[0]["tab_aleatoir_f"];
                    const tb_alea_p = allInfo[0]["tab_aleatoir_p"];
                    const demande = allInfo[1];
                     const tb_par = allInfo["parrain"];
                    const tb_fil = allInfo["filleul"];

                    //alert(tb_par[0]["nom"]);
                      alert(statut);
                    for (let p=0;p<tb_par.length;p++){
                         document.getElementById("parrain_liste").innerHTML +=affich_mb(tb_par[p],"parrain");
                        //alert(tb_par[p]);
                    }
                }
            });

    },200);

    function affich_mb(tb,tp_mb){
        return ' <li class="active" >\n' +
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

});

