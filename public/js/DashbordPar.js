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
    //alert(chemin);
    setTimeout(function (){

            $.ajax({
                url : chemin,
                type : 'GET',
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
                    //  alert(statut);
                }
            });

    },200);
    function affich_mb(tb,tp_mb){
        var ul = document.createElement("ul");
        var div_bloc = document.createElement("div");
        div_bloc.classList.add("d-flex bd-highlight");
        var div_photo = document.createElement("div");
        div_photo.classList.add("img_cont");
        var photo = document.createElement("img");
        photo.classList.add("rounded-circle user_img");
        photo.src =tb["image"];
        div_photo.appendChild(photo);
        div_bloc_usr1 = document.createElement("div");
        div_bloc_usr1.classList.add("user_info");
        var span_nom = document.createElement("span");
        span_nom.innerHTML = tb["nom"]+" "+tb["prenom"];
        span_nom.style.float = "left";
        div_bloc_usr1.appendChild(span_nom);
        var div_bull = document.createElement("div");
        


    }

});

