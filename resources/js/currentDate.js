function clockTick() {
    let currentTime = new Date();
    let month = currentTime.getMonth();
    let day = currentTime.getDate();
    let year = currentTime.getFullYear();
    let dayOfWeek = currentTime.getDay();
    document.getElementById("date").innerHTML =
        day +
        "." +
        interpretMonth(month) +
        "." +
        year +
        " ^ " +
        interpretDay(dayOfWeek);
}

function interpretDay(day) {
    switch (day) {
        case 0:
            return "Воскресенье";
            break;
        case 1:
            return "Понедельник";
            break;
        case 2:
            return "Вторник";
            break;
        case 3:
            return "Среда";
            break;
        case 4:
            return "Четверг";
            break;
        case 5:
            return "Пятница";
            break;
        case 6:
            return "Суббота";
            break;
    }
}

function interpretMonth(month) {
    switch (month) {
        case 0:
            return "Январь";
            break;
        case 1:
            return "Февраль";
            break;
        case 2:
            return "Март";
            break;
        case 3:
            return "Апрель";
            break;
        case 4:
            return "Май";
            break;
        case 5:
            return "Июнь";
            break;
        case 6:
            return "Июль";
            break;
        case 7:
            return "Август";
            break;
        case 8:
            return "Сентябрь";
            break;
        case 9:
            return "Октябрь";
            break;
        case 10:
            return "Ноябрь";
            break;
        case 11:
            return "Декабрь";
            break;
    }
}
setInterval(clockTick, 1000);
