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
    //Annimation des fa icon a coté des inputs et aussi des labels lorsqu'il y a une erreur
    const input = $("input")
    input.focus(function () {
        $(`input[name="${this.name}"] ~ span.icon `).toggleClass("active")
        if ($(`input[name="${this.name}"]`).hasClass("error")) {
            $(`label[for='${this.name}'] small`).html('*')
            $(`label[for='${this.name}']`).removeClass("error")
            $(`input[name="${this.name}"] ~ span.icon `).removeClass("error")
            $(`i[data-name='${this.name}']`).removeClass('error')
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
        for (let i = 0; i < $(this)[0].classList.length; i++) {
            class_name += `.` + $(this)[0].classList[i]
        }
        const input_neighbour = $(`${class_name} ~ input`)
        if ($(this).hasClass(`eye-hide`)) {
            $(this).removeClass('eye-hide')
            $(this).addClass($(this).addClass(`eye-open`))
            $(this).html(`<i class="fas fa-eye">`)
            input_neighbour.attr(`type`, 'text')
        } else if ($(this).hasClass(`eye-open`)) {
            $(this).removeClass('eye-open')
            $(this).addClass($(this).addClass(`eye-hide`))
            $(this).html(`<i class="fas fa-eye-slash"></i>`)
            input_neighbour.attr(`type`, 'password')
        }
    })
//Soumission du formulaire d'inscription en Ajax
    $("#form-register").submit(function (e) {
        e.preventDefault()
        $(".cloud").toggleClass("active")
        $(".loader-conatiner").toggleClass("active")
        btnTransform("#register", `
            <span class="spinner-border reziseInter" role="status">
                <span class="sr-only">Loading...</span>
            </span>`)
        $.ajax({
            url: buildUrl("registerstore"),
            type: "post",
            data: $(this).serialize(),
            dataType: "json",
            success: function (data) {
                $("#debug").html(data)
                $(".cloud").toggleClass("active")
                $(".loader-conatiner").toggleClass("active")
                btnTransform("#register", `
                         <span class="spinner-border reziseInter" role="status">
                            <span class="sr-only">Loading...</span>
                         </span>`, false)
                if (data.success === true) {
                    $("#form-register").trigger("reset")
                    setTimeout(function () {
                        document.location.assign(data.redirectTo);
                    }, 2000)
                }
            },
            error: function (xhr) {
                $(".cloud").toggleClass("active")
                $(".loader-conatiner").toggleClass("active")
                btnTransform("#register", `S'inscrir`)
                console.log(xhr)
                const errors = xhr.responseJSON;
                $("#debug").html(xhr.responseText)
                console.log(errors)
                if (xhr.status === 400) {
                    switch (errors.input_error) {
                        case true :
                            $("#alerterror").modal("show")
                            for (const property in errors) {
                                $(`label[for='${property}'] small`).html(errors[property])
                                $(`input[name="${property}"]`).addClass("error")
                                $(`input[name="${property}"] ~ span.icon `).addClass("error")
                                console.log(`${property}: ${errors[property]}`);
                            }
                            break;
                        case false :
                            alert("Oops ...\0Veuillez Réessayer !")
                            break;
                    }
                } else if (xhr.status === 500) {
                    alert("Oops ...\nVeuillez Réessayer !")
                } else if (xhr.status === 409) {
                    alert("Oops...\nVeuillez verifier l'etat de votre connexion internet et Réesayer !")
                }
            }
        })
    })
//Animation du loader pour faire patienter l'utilisateur durant la soumission du formulaire
    const id = setInterval(function () {
        if ($(".loader-conatiner").hasClass("active")) {
            if ($("#point-loader").html().length === 3) {
                $("#point-loader").html("")
            }
            $("#point-loader").html($("#point-loader").html() + ".")
        }
    }, 1000)

//Soumission du formulaire de connexion en Ajax
    $('#form-login').submit(function (e) {
        e.preventDefault()
        $('.cipy-loader-container').toggleClass('active')
        $.ajax({
            url: buildUrl('post-login'),
            type: 'post',
            dataType: 'json',
            data: $(this).serialize(),
            success: function (data) {
                $('.cipy-loader-container').toggleClass('active')
                if (data.success === true) {
                    $("#alert").html(`
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            Bienvenu <strong>${data.username}</strong>
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                 <span aria-hidden="true">&times;</span>
                            </button>
                        </div>`)
                    btnTransform("#register",
                        `<span class="spinner-border reziseInter" role="status">
                                <span class="sr-only">Loading...</span>
                               </span>`,)
                }
            },
            error: function (xhr) {
                $('.cipy-loader-container').toggleClass('active')
                $(`.debug`).html(xhr.responseText)
                const errors = xhr.responseJSON
                let message = ''
                for (const errorsKey in errors) {
                    message += '<strong>' + errors[errorsKey] + '<strong><br>';
                    $(`label[for='${errorsKey}']`).addClass('error')
                    $(`input[name="${errorsKey}"]`).addClass("error")
                    $(`i[data-name='${errorsKey}']`).addClass('error')
                }
                console.log(message)
                if (xhr.status === 400) {
                    $("#alert").html(`
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            ${message}
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                 <span aria-hidden="true">&times;</span>
                            </button>
                        </div>`)
                }
            }
        })
    })
})