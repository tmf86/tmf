$(function () {
    $("#form-register").submit(function (e) {
        e.preventDefault()
        $(".cloud").toggleClass("active")
        $(".loader-conatiner").toggleClass("active")
        btnTransform("#register", `
        s'inscrir &nbsp<span class="spinner-border" role="status">
            <span class="sr-only">Loading...</span>
         </span>`)
        $.ajax({
            url: buildUrl("registerStore"),
            type: "post",
            data: $(this).serialize(),
            dataType: "json",
            success: function (data) {
                $("#debug").html(data)
                $(".cloud").toggleClass("active")
                $(".loader-conatiner").toggleClass("active")
                btnTransform("#register", `Patientez &nbsp<span class="spinner-border" role="status">
            <span class="sr-only">Loading...</span>
         </span>`)
                if (data.success === true) {
                    // $("#form-register").trigger("reset")
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
                    $("#alerterror").modal("show")
                    for (const property in errors) {
                        $(`label[for='${property}'] small`).html(errors[property])
                        $(`input[name="${property}"]`).addClass("error")
                        $(`input[name="${property}"] ~ span.icon `).addClass("error")
                        console.log(`${property}: ${errors[property]}`);
                    }
                } else if (xhr.status === 500) {
                    alert("Oops ...\nVeuillez Réessayer !")
                } else if (xhr.status === 401) {
                    alert("Oops...\nVeuillez verifier l'etat de votre connexion internet et Réesayer !")
                }
            }
        })
    })
})