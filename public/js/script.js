$(function () {
    //alert("ok");
    /*$('#acces_sujet').click(function (e){
         e.preventDefault();
         $('#dialog').css('display','block');
     });
     $('.close_dialog').click(function (){
         $('#dialog').css('display','none');
     });
     $(window).click(function (event){
         if (event.target ===$('#dialog')){
             $('#dialog').css('display','none');
         }
     });*/
    $(".annonce_click").click(function () {
        //alert("ok");
        if ($(".annonce_content").css("display") === "block") {
            $(".annonce_content").hide(1500);
            $(this).html("EN SAVOIR PLUS");
        } else {
            $(".annonce_content").show(1500);
            $(this).html("MOINS");
        }
    });
    /* lecteur();
     function lecteur(){
         $("#current_moovie").src = $("#moovie_list iframe")[2];
         $("#current_moovie").play();
         $("#moovie_list iframe").click(function (e){
             e.preventDefault();
             $("current_moovie").src = this;
             $("#current_moovie").play();
         });
     }*/
    //Annimation des fa icon a coté des inputs
    const input = $("input")
    input.focus(function () {
        $(`input[name="${this.name}"] ~ span.icon `).toggleClass("active")
        if ($(`input[name="${this.name}"]`).hasClass("error")) {
            $(`label[for='${this.name}'] small`).html('*')
            $(`input[name="${this.name}"] ~ span.icon `).removeClass("error")
            $(`input[name="${this.name}"]`).removeClass("error")
        }
    })
    input.focusout(function () {
        $(`input[name="${this.name}"] ~ span.icon `).toggleClass("active")
    })
    //Getion dynamique des select de la date de naissance
    const [day, month, year] = [$("#jour"), $("#mois"), $("#annee")]
    const Leap = function () {
        // const yearVal = $(year).val();
        // const $(month).val() = $(month).val()
        // const $(day).val() = $(day).val()
        let isLeapYear = false;
        if ($(year).val() % 4 === 0 && $(year).val() % 100 !== 0) {
            isLeapYear = true;
        } else if ($(year).val() % 400 === 0) {
            isLeapYear = true;
        }
        // console.log($(month).val())
        // console.log(isLeapYear)
        // console.log($(day).val())
        if (isLeapYear) {
            if ($(month).val() === '02') {
                $("option[value=29]").css("display", "block")
                $("option[value=30]").css("display", "none")
                $("option[value=31]").css("display", "none")
                if ($(day).val() > 29) {
                    day[0].selected = 29
                    $(day).val(29)
                }
            } else {
                $("option[value=29]").css("display", "block")
                $("option[value=30]").css("display", "block")
                $("option[value=31]").css("display", "block")
            }
        } else {
            if ($(month).val() === '02') {
                $("option[value=29]").css("display", "none")
                $("option[value=30]").css("display", "none")
                $("option[value=31]").css("display", "none")
                if ($(day).val() > 28) {
                    day[0].selected = 28
                    $(day).val(28)
                    console.log($(day).val())
                }
            } else {
                $("option[value=29]").css("display", "block")
                $("option[value=30]").css("display", "block")
                $("option[value=31]").css("display", "block")
            }
        }
    }
    year.change(function () {
        Leap()
    })
    month.change(function () {
        Leap()
    })
    day.change(function () {
        Leap()
    })
//  Annimation des inputs de type password
    $(".password-eye").click(function () {
        let class_name = '';
        const input_neighbour = $(`${class_name} ~ input`)
        for (let i = 0; i < $(this)[0].classList.length; i++) {
            class_name += `.` + $(this)[0].classList[i]
        }
        if ($(this).hasClass(`eye-hide`)) {
            $(this).removeClass('eye-hide')
            $(this).addClass($(this).addClass(`eye-open`))
            $(this).html(`<i class="fas fa-eye-slash"></i>`)
        } else if ($(this).hasClass(`eye-open`)) {
            $(this).removeClass('eye-open')
            $(this).addClass($(this).addClass(`eye-hide`))
            $(this).html(`<i class="fas fa-eye">`)
        }
    })

})