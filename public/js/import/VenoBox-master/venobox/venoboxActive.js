$(document).ready(function(){
    $('.venobox').venobox();
    $('.venobox_custom').venobox({
        framewidth : '950px',                            // default: ''
        frameheight: '670px',                            // default: ''
        border     : '10px',                             // default: '0'
        bgcolor    : '#5dff5e',                          // default: '#fff'
        titleattr  : 'data-title',                       // default: 'title'
        numeratio  : true,                               // default: false
        infinigall : true,                               // default: false
        share      : ['facebook', 'twitter', 'download'] // default: []
    });
});
