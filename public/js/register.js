$(function () {
    $("#form-register").submit(function (e) {
        e.preventDefault()
        $.ajax({
            url: "http://localhost/Cpy-Mvc/registerStore",
            type: "post",
            data: $(this).serialize(),
            dataType: "json",
            success: function (data) {
                alert("ok")
                console.log(data)
            },
            error: function (xhr) {
                // alert(xhr.responseText)
                // console.log(xhr)
                // const errors = JSON.parse(xhr.responseText);
                // console.log(errors)
                // if (errors.code === 0) {
                //     for (const property in errors) {
                //         $(`label[for='${property}'] small`).html(errors[property])
                //         $(`input[name="${property}"]`).addClass("error")
                //         $(`input[name="${property}"] ~ span.icon `).addClass("error")
                //         console.log(`${property}: ${errors[property]}`);
                //     }
                // }
            }
        })
    })
})