function checkName() {
var t = document.getElementById('name');
t.parentNode.style.backgroundColor = null;
var n = 0;
var position = 0;
while (true) {
    position = t.value.indexOf(" ", position);
    if (position < 0) {
        break;
    } else {
        ++position;
        n++;
      }
}
if (n !== 2) {
    alert("Некорректное ФИО.");
    t.parentNode.style.backgroundColor = 'red';
    return false;
}
return true;
}