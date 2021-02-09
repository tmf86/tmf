$(function () {
    $("#form-register").submit(function (e) {
        e.preventDefault()
        $.ajax({
            url: "http://localhost/Cpy-Mvc/registerStore",
            type: "post",
            data: $(this).serialize(),
            dataType: "json",
            success: function (data) {
                console.log(data)
            },
            error: function (xhr) {
                const errors = xhr.responseJSON;
                if (errors.code === 0) {
                    for (const property in errors) {
                        $(`label[for='${property}'] small`).html(errors[property])
                        $(`input[name="${property}"]`).addClass("error")
                        $(`input[name="${property}"] ~ span.icon `).addClass("error")
                        console.log(`${property}: ${errors[property]}`);
                    }
                }
            }
        })
    })
})