$(function () {
    $("#form-register").submit(function (e) {
        e.preventDefault()
        $(".cloud").toggleClass("active")
        $(".loader-conatiner").toggleClass("active")
        btnTransform("#register", `
        s'inscrir &nbsp<span class="spinner-border reziseInter" role="status">
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
                btnTransform("#register", `s'inscrir`)
                if (data.success === true) {
                    $("#form-register").trigger("reset")
                    $("#alertsucces").modal("show")
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
    //Point loader
    setInterval(function () {
        if ($(".loader-conatiner").hasClass("active")) {
            if ($("#point-loader").html().length === 3) {
                $("#point-loader").html("")
            }
            $("#point-loader").html($("#point-loader").html() + ".")
        }
    }, 1000)
})