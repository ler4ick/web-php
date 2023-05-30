function checkPhone() {
var t = document.getElementById('mobile');
t.parentNode.style.backgroundColor = null;
var flag = false;
if (t.value.length === 10 || t.value.length === 12)
    if (t.value.indexOf("+", 0) === 0 && (t.value.indexOf("7", 0) === 1 || t.value.indexOf("3", 0) === 1)) flag = true;
    if (!flag) {
        alert("Некорректный номер телефона");
        t.parentNode.style.backgroundColor = 'red';
        return false;
    }
    return true;
}