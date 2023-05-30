function checkcontact() {
var fieldsc = [
    document.getElementById('name'),
    document.getElementById('man'),
    document.getElementById('woman'),
    document.getElementById('age'),
    document.getElementById('userEmail'),
    document.getElementById('mess'),
    document.getElementById('mobile')
    ];
fieldsc.forEach((x)  =>  x.parentNode.style.backgroundColor  = null);
var m1 = [];
for (var i = 0; i < fieldsc.length; i++) {
    if (i == 1) {
        i++;
        if (!fieldsc[1].checked && !fieldsc[2].checked) {
            if (!m1.length) fieldsc[1].focus();
            m1.push(fieldsc[1].name);
            fieldsc[1].parentNode.style.backgroundColor = 'yellow';
         }
     } else if (!fieldsc[i].value) {
            if (!m1.length) fieldsc[i].focus();
            m1.push(fieldsc[i].id);
            fieldsc[i].parentNode.style.backgroundColor = 'yellow';
       }
}
if (m1.length) {
    alert("Поля " + m1.join(', ') + " не заполнены.");
    return false;
}
return checkName() && checkPhone();
}

function checktest() {
    var fieldsc = [
        document.getElementById('name'),
        document.getElementById('q1'),
        document.getElementById('q2'),
        document.getElementById('q3'),
        ];
    fieldsc.forEach((x)  =>  x.parentNode.style.backgroundColor  = null);
    var m1 = [];
    for (var i = 0; i < fieldsc.length; i++) {
        if (i == 1) {
            i++;
            if (!fieldsc[1].checked && !fieldsc[2].checked) {
                if (!m1.length) fieldsc[1].focus();
                m1.push(fieldsc[1].name);
                fieldsc[1].parentNode.style.backgroundColor = 'yellow';
             }
         } else if (!fieldsc[i].value) {
                if (!m1.length) fieldsc[i].focus();
                m1.push(fieldsc[i].id);
                fieldsc[i].parentNode.style.backgroundColor = 'yellow';
           }
    }
    if (m1.length) {
        alert("Поля " + m1.join(', ') + " не заполнены.");
        return false;
    }
    return checkName() && amountWords();
    }

