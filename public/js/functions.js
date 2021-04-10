const sprintf = (str, format, ...args) => {
    return !(args.length) ? str : sprintf(str.replace(format, args.shift()), format, ...args)
}
/**
 *
 * @param value
 * @return {*}
 */
const buildUrl = (value = 'defaut') => {
    if (value === 'defaut') {
        return window.location.href
    }
    const slashPos = window.location.href.lastIndexOf('/');
    const bashPath = window.location.href.substr(0, slashPos)
    return sprintf("%/%", '%', bashPath, value)
}
/**
 *
 * @param id
 * @param text
 * @param toggledisabled
 */
const btnTransform = (id, text, toggledisabled = true) => {
    (toggledisabled) ? $(id).html(text).toggleClass('disabled') : $(id).html(text)
}
/**
 *
 * @returns {boolean}
 * @constructor
 */
const KeyBoardEmojiModalShowTask = function () {
    $('.emoticon-container').addClass('active')
    $('.emoji-fixed').addClass('active')
    // $('input').attr('disabled', true)
    // $('textarea').attr('disabled', true)
    return false;
}
/**
 *
 * @returns {boolean}
 * @constructor
 */
const KeyBoardEmojiModalHideTask = function () {
    $('.emoticon-container').removeClass('active')
    $('.emoji-fixed').removeClass('active')
    // $('input').removeAttr('disabled')
    // $('textarea').removeAttr('disabled')
    return false;
}