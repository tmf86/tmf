$(function () {
    //Toggle active class on fa icon
    const input = $("input")
    input.focus(function () {
        $(`input[name="${this.name}"] ~ span.icon `).toggleClass("active")
    })
    input.focusout(function () {
        $(`input[name="${this.name}"] ~ span.icon `).toggleClass("active")
    })
})