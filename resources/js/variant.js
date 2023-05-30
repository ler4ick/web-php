function amountWords() {

var el = document.getElementById("q3");

el.parentNode.style.backgroundColor = null;

if (el.value.split(' ').length > 26) {
    alert("Ответ должен быть не более 25 слов.");
    el.parentNode.style.backgroundColor = 'yellow';
    return false;
}
return true;
}