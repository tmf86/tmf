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
let chemin = buildUrl('exit_Par');
$(document).ready(function () {

    $("#card_exit").hide();

    $("#exit_par").click((e)=>{
        e.preventDefault();
        $("#card_exit").css("opacity","1");
        $("#card_exit").show();
        //alert("exit");
    });
    $("#no_exit").click(()=>{
        $("#card_exit").hide();
    });
    $("#yes_exit").click(()=>{
        $.ajax(
            {
                url : chemin,
                type : 'POST',
               // data:,
                dataType : 'json', // On désire recevoir du HTML
                success : function(code_html, statut){
                    alert(statut);
                    $("#card_exit").hide();
                     }
            }
        );
    });
});