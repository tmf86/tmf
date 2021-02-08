$(function () {
    //Toggle active class on fa icon
    const input = $("input")
    input.focus(function () {
        $(`input[name="${this.name}"] ~ span.icon `).toggleClass("active")
    })
    input.focusout(function () {
        $(`input[name="${this.name}"] ~ span.icon `).toggleClass("active")
    })
    //Getion dynamique des select de la date de naissance
    const [day, month, year] = [$("#jour"), $("#mois"), $("#annee")]
    const Leap = function () {
        // const yearVal = $(year).val();
        // const $(month).val() = $(month).val()
        // const $(day).val() = $(day).val()
        let isLeapYear = false;
        if ($(year).val() % 4 === 0 && $(year).val() % 100 !== 0) {
            isLeapYear = true;
        } else if ($(year).val() % 400 === 0) {
            isLeapYear = true;
        }
        console.log($(month).val())
        console.log(isLeapYear)
        console.log($(day).val())
        if (isLeapYear) {
            if ($(month).val() === '02') {
                $("option[value=29]").css("display", "block")
                $("option[value=30]").css("display", "none")
                $("option[value=31]").css("display", "none")
                if ($(day).val() > 29) {
                    day[0].selected = 29
                    $(day).val(29)
                }
            } else {
                $("option[value=29]").css("display", "block")
                $("option[value=30]").css("display", "block")
                $("option[value=31]").css("display", "block")
            }
        } else {
            if ($(month).val() === '02') {
                $("option[value=29]").css("display", "none")
                $("option[value=30]").css("display", "none")
                $("option[value=31]").css("display", "none")
                if ($(day).val() > 28) {
                    day[0].selected = 28
                    $(day).val(28)
                    console.log($(day).val())
                }
            } else {
                $("option[value=29]").css("display", "block")
                $("option[value=30]").css("display", "block")
                $("option[value=31]").css("display", "block")
            }
        }
    }
    year.change(function () {
        Leap()
    })
    month.change(function () {
        Leap()
    })
    day.change(function () {
        Leap()
    })
})