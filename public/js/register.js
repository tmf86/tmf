$(function () {
    $("#form-register").submit(function (e) {
        e.preventDefault()
        $.ajax({
            url: "http://localhost/Cpy-Mvc/registerStore",
            type: "post",
            data: $(this).serialize(),
            dataType: "html",
            success: function (data) {
                console.log($(this).serialize())
                console.log(data)
            },
            error: function (xhr) {
                console.log(xhr)
            }
        })
    })
})