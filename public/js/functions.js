const sprintf = (str, format, ...args) => {
    return !(args.length) ? str : sprintf(str.replace(format, args.shift()), format, ...args)
}
const buildUrl = (value) => {
    const slashPos = window.location.href.lastIndexOf('/');
    const bashPath = window.location.href.substr(0, slashPos)
    return sprintf("%/%", '%', bashPath, value)
}
const btnTransform = (id, text, toggle = true) => {
    (toggle) ? $(id).html(text).toggleClass("disabled") : $(id).html(text)

}