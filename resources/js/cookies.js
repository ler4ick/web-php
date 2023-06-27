/* function setCookie(cname, cvalue, exdays) {
    const d = new Date();
    d.setTime(d.getTime() + (exdays * 24 * 60 * 60 * 1000));
    let expires = "expires=" + d.toUTCString();
    document.cookie = cname + "=" + cvalue + ";" + expires;
}

function getCookie(cname) {
    let name = cname + "=";
    let ca = document.cookie.split(';');
    for (let i = 0; i < ca.length; i++) {
        let c = ca[i];
        while (c.charAt(0) == ' ') {
            c = c.substring(1);
        }
        if (c.indexOf(name) == 0) {
            return c.substring(name.length, c.length);
        }
    }
    return "";
}
 */

function setCookie(name) {
    var date = new Date(new Date().getTime() + 1800 * 1000);
    var expires = "; expires=" + date.toUTCString();
    var value = getValue(name);
    if (value == "") {
        document.cookie = name + "=1" + expires + "; path=/";
    } else {
        value++;
        document.cookie = name + "=" + value + expires + "; path=/";
    }
}

function getCookie(name) {
    var ca = document.cookie.split("; ");
    var c;
    for (var i = 0; i < ca.length; i++) {
        c = ca[i].split("=");
        if (c[0] == name) {
            document.write(c[1]);
        }
    }
}

function getValue(name) {
    var ca = document.cookie.split("; ");
    var c;
    for (var i = 0; i < ca.length; i++) {
        c = ca[i].split("=");
        if (c[0] == name) {
            return c[1];
        }
    }
    return "";
}

//--------local storage-------

function setLS(name) {
    var value = sessionStorage.getItem(name);
    if (value == null) {
        sessionStorage.setItem(name, 1);
    } else {
        value++;
        sessionStorage.setItem(name, value);
    }
}

function getLS(name) {
    var col = sessionStorage.getItem(name);
    if (col == null) col = 0;
    document.write(col);
}

function setLL(name) {
    var value = localStorage.getItem(name);
    if (value == null) {
        localStorage.setItem(name, 1);
    } else {
        value++;
        localStorage.setItem(name, value);
    }
}

function getLL(name) {
    var col = localStorage.getItem(name);
    if (col == null) col = 0;
    document.write(col);
}
