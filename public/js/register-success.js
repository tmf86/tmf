$(function () {
    // Register sucess an Account created succesfull Animated
    let timer = 6;
    setTimeout(function () {
        gsap.from("#img", {duration: 3, x: -1, opacity: 0, scale: -0.5});
        setTimeout(function () {
            $('#img').css('display', 'none')
        }, 500)
        const timer_id = setInterval(function () {
            timer--
            console.log(timer)
            if (timer >= 0) {
                ($('.main-success').hasClass('account-created-successful')) ? $('.success-msg').html(`Vous serrez redirigé vers 
                votre page de profile dans <strong>${timer}s</strong>`) : $('#timer').html(`${timer}s`)
            } else {
                ($('.main-success').hasClass('account-created-successful')) ? document.location.assign
                ('http://localhost/Cpy-Mvc/profile') : $('.not-yet-received').toggleClass('active')
                clearInterval(timer_id)
            }
        }, 1000)
    }, 5000)
    gsap.from("#img", {duration: 3, x: -1, opacity: 0, scale: 0.5});
})