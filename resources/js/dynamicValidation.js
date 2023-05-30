var vFio = false;
var vPhone = false;
var vEmail = false;

function ValFIO() {
    var fio = document.getElementById("name");
    var reg = /[A-Za-zА-ЯЁа-яё]+\s[A-Za-zА-ЯЁа-яё]+\s[A-Za-zА-ЯЁа-яё]+$/;

    if (!reg.test(fio.value) && fio.value != "") {
        var errorMessage = document.getElementById("errorFio");
        while (errorMessage.firstChild) {
            errorMessage.removeChild(errorMessage.lastChild);
        }
        var message = document.createTextNode("Invalid FIO format");
        errorMessage.appendChild(message);
        fio.classList.remove("valid");
        fio.classList.add("invalid");
        var submit = document.getElementById("submit");
        submit.classList.add("button:disabled");
        submit.disabled = true;

        vFio = false;
    } else if (!reg.test(fio.value) && fio.value == "") {
        var errorMessage = document.getElementById("errorFio");
        while (errorMessage.firstChild) {
            errorMessage.removeChild(errorMessage.lastChild);
        }
        fio.classList.remove("valid");
        fio.classList.remove("invalid");
        var submit = document.getElementById("submit");
        submit.classList.add("button:disabled");
        submit.disabled = true;

        vFio = false;
    } else {
        var errorMessage = document.getElementById("errorFio");
        while (errorMessage.firstChild) {
            errorMessage.removeChild(errorMessage.lastChild);
        }
        fio.classList.remove("invalid");
        fio.classList.add("valid");
        vFio = true;
        if (vPhone == true && vEmail == true) {
            var submit = document.getElementById("submit");
            submit.classList.remove("button:disabled");
            submit.disabled = false;
        }
    }
}

function ValTel() {
    var tel = document.getElementById("mobile");
    var reg = /^(?:\+7|\+3)[\d]{8,10}$/;
    if (!reg.test(tel.value) && tel.value != "") {
        var errorMessage = document.getElementById("errorPhone");
        while (errorMessage.firstChild) {
            errorMessage.removeChild(errorMessage.lastChild);
        }
        var message = document.createTextNode("Invalid Phone number format");
        errorMessage.appendChild(message);
        tel.classList.remove("valid");
        tel.classList.add("invalid");
        var submit = document.getElementById("submit");
        submit.classList.add("button:isabled");
        submit.disabled = true;
        vPhone = false;
    } else if (!reg.test(tel.value) && tel.value == "") {
        var errorMessage = document.getElementById("errorPhone");
        while (errorMessage.firstChild) {
            errorMessage.removeChild(errorMessage.lastChild);
        }
        tel.classList.remove("valid");
        tel.classList.remove("invalid");
        var submit = document.getElementById("submit");
        submit.classList.add("button:isabled");
        submit.disabled = true;
        vPhone = false;
    } else {
        var errorMessage = document.getElementById("errorPhone");
        while (errorMessage.firstChild) {
            errorMessage.removeChild(errorMessage.lastChild);
        }
        tel.classList.remove("invalid");
        tel.classList.add("valid");
        vPhone = true;
        if (vFio == true && vEmail == true) {
            var submit = document.getElementById("submit");
            submit.classList.remove("button:disabled");
            submit.disabled = false;
        }
    }
}

function ValEmail() {
    var email = document.getElementById("userEmail");
    var reg = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w\w+)+$/;
    if (!reg.test(email.value) && email.value != "") {
        var errorMessage = document.getElementById("errorEmail");
        while (errorMessage.firstChild) {
            errorMessage.removeChild(errorMessage.lastChild);
        }
        var message = document.createTextNode("Invalid E-mail format");
        errorMessage.appendChild(message);
        email.classList.remove("valid");
        email.classList.add("invalid");
        var submit = document.getElementById("submit");
        submit.classList.add("button:isabled");
        submit.disabled = true;
        vEmail = false;
    } else if (!reg.test(email.value) && email.value == "") {
        var errorMessage = document.getElementById("errorEmail");
        while (errorMessage.firstChild) {
            errorMessage.removeChild(errorMessage.lastChild);
        }
        email.classList.remove("valid");
        email.classList.remove("invalid");
        var submit = document.getElementById("submit");
        submit.classList.add("button:isabled");
        submit.disabled = true;
        vEmail = false;
    } else {
        var errorMessage = document.getElementById("errorEmail");
        while (errorMessage.firstChild) {
            errorMessage.removeChild(errorMessage.lastChild);
        }
        email.classList.remove("invalid");
        email.classList.add("valid");
        vEmail = true;
        if (vPhone == true && vFio == true) {
            var submit = document.getElementById("submit");
            submit.classList.remove("button:disabled");
            submit.disabled = false;
        }
    }
}