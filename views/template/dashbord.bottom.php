<footer class="footer text-center p-5" style="background: #414755;color: #fff;font-size: 1rem;margin-top: 4.2rem;">
    ©2020 Copyright: Club Informatique Pigier Yamoussoukro
</footer>
</div>
</div>
<script src="<?= makeRootOrFileUrl('public/js/import/jquery/jquery.js') ?>"></script>
<script src="<?= makeRootOrFileUrl('public/js/import/boostrap/bootstrap.js') ?>"></script>
<script src="<?= makeRootOrFileUrl('public/js/import/boostrap/popper.js') ?>"></script>
<script src="<?= makeRootOrFileUrl('public/js/import/boostrap/bootstrap.bundle.min.js') ?>"></script>
<script src="<?= makeRootOrFileUrl('public/js/import/user-dashbord/app-style-switcher.js') ?>"></script>
<script src="<?= makeRootOrFileUrl('public/js/import/user-dashbord/waves.js') ?>"></script>
<script src="<?= makeRootOrFileUrl('public/js/import/user-dashbord/sidebarmenu.js') ?>"></script>
<script src="<?= makeRootOrFileUrl('public/js/import/user-dashbord/custom.js') ?>"></script>
<?= suppl_tags($scripts ?? [], SCRIPT) ?>
<script>

    $(document).ready(()=>{
        let chemin = buildUrl('suggestion');
        let chemin1 = buildUrl('validation');
        let testarea= $("#content_suggestion");
        let testarea1= $("#content_vld");
        //console.log();
        let form ={};
        let form1={}
        let msg_ok = document.getElementById("msg_retour_ok");//$("#msg_retour_ok");
        let  msg_bad = document.getElementById("msg_retour_bad");//$("#msg_retour_bad");
        //["content"=>$("#content_suggestion").val(),"id_mb"=>$("#id_membre").val()];
        $("#btn_suggerer").click(function (e) {
            e.preventDefault();
            form["content"]=testarea.val();
            form["id_mb"]=$("#id_membre").val();
            if (testarea.val() !== ""){
                $.ajax({
                    url : chemin,
                    type:"POST",
                    data:form,
                    dataType : 'text',
                    success : function(code_html, statut){
                        if (code_html === "ok"){
                            msg_bad.style.display="none";
                        msg_ok.innerHTML = "Votre suggestion a ete envoyer avec succes";
                        msg_ok.style.display="inline-block";
                        testarea.val("");
                        //testarea.html("");
                        }

                    }
                });
            }else {
                msg_ok.style.display="none";
                msg_bad.innerHTML="veillez faire une suggestion !";
                msg_bad.style.display="inline-block";
            }

        });
        $("#btn_valider").click(function (e) {
            e.preventDefault();
            form1["content_vld"]=testarea1.val();
            //form1["id_mb"]=$("#id_membre").val();
            if (testarea1.val() !== ""){
                $.ajax({
                    url : chemin1,
                    type:"POST",
                    data:form1,
                    dataType : 'text',
                    success : function(code_html, statut){
                        if (code_html === "maj_ok"){
                            msg_bad.style.display="none";
                            msg_ok.innerHTML = "Votre participation a ce parrainage a bien ete valider";
                            msg_ok.style.display="inline-block";
                            testarea1.val("");
                            //testarea.html("");
                        }else if(code_html ==="maj_done"){
                            msg_bad.style.display="none";
                            testarea1.val("");
                            msg_ok.innerHTML = "Votre etre deja sur la liste";
                            msg_ok.style.display="inline-block";

                        }else {
                            msg_ok.style.display="none";
                            testarea1.val("");
                            msg_bad.innerHTML="le code saisir est invalide !";
                            msg_bad.style.display="inline-block";
                        }

                    }
                });
            }else {
                msg_ok.style.display="none";
                msg_bad.innerHTML="veillez saisir un code !";
                msg_bad.style.display="inline-block";
            }

        });


    });
    // alert("ok");
    let chemin2 = buildUrl("all_notifs");
    var tb_g=[];
    var tb_p=[];
    let inbox;
    let glob;
    $.ajax({
        url : chemin2,
        type:"GET",
        dataType : 'json',
        success : function(code_html, statut){
            //alert(statut);
            //console.log(code_html);
            tb_g=code_html["global"];
            tb_p=code_html["perso"];
            document.getElementById("nbr_notif").innerHTML=""+(tb_g.length+tb_p.length)+"";
            for (let i=0;i<tb_g.length;i++){
                document.getElementById("titre_notif").innerHTML +="<h4 class='jumbotron' onclick='display_cont("+i+")' style='height: 3.5rem;padding: 7px;'>"+tb_g[i]["titre_notif_glob"]+"<sup><small>"+tb_g[i]["date_notif_glob"]+"</small></sup></h4>";
            }
            for (let j=0;j<tb_p.length;j++){
                document.getElementById("titre_notif").innerHTML +="<h4 class='jumbotron' onclick='display_cont1("+j+")' style='height: 3.5rem;padding: 7px;'>"+tb_p[j]["titre_notif"]+"<sup><small>"+tb_p[j]["date_notif"]+"</small></sup></h4>";
            }
        }
    });
    function display_cont(index) {
        // alert(tb_g[index]["content_notif_glob"]);
        document.querySelector("#corps_notif p").innerHTML= tb_g[index]["content_notif_glob"];
    }
    function display_cont1(index) {
        // alert(tb_g[index]["content_notif_glob"]);
        document.querySelector("#corps_notif p").innerHTML= tb_p[index]["content_notif"];
    }
   // console.log(inbox,glob);
</script>
</body>
</html>