var path = "photos/";
/* fotos = new Array(
    for()
); */

titles = new Array(
    "1", "2", "3", "4", "5", "6", "7", "8", "9", "10", "11", "12", "13", "14", "15", "16");

function fotoTable(n, m) { //i-номер элемента, с которого начнется отображение; n-количество элементов для отображения
    i = 0;
    for (j = 0; j < n; j++) {
        var tr = document.createElement('tr');
        /* document.write("<tr>"); */
        for (k = 0; k < m; k++, i++) {
            var td = document.createElement('td');
            var img = document.createElement('img');
            img.src = path + titles[k] + ".jpg";
            img.alt = titles[k];
            img.title = titles[k];
            td.appendChild(img);
            tr.appendChild(td);
        }
        /*  document.write("<td> <img src=" + path + titles[k] + ".jpg" + " alt=" + titles[i] + " title=" + titles[i] + "><figcaption>" + titles[i] + "</figcaption> </td>"); */
        /* document.write("</tr>"); */
        document.getElementById("parentTr").appendChild(tr);
    }

    document.getElementById("table").addEventListener("click", openWin);
}

function openWin(e) {

    if (e.target.src != undefined) {
        var myWin = open("", "displayWindow",
            "top=" + ((screen.height - 800) / 2) + ",left=" + ((screen.width - 800) / 2) + ",width=800,height=800,status=no,toolbar=no,menubar=no");
        myWin.document.open();

        myWin.document.write("<!DOCTYPE HTML><html><head> <meta charset='utf-8'><style> div {display:flex; justify-content: center; align-items: center;} </style> <title>Photo</title> </head> <body> <div id='container'></div> </body> </html> ");
        var iimage = myWin.document.createElement('img');
        iimage.src = e.target.src;
        iimage.width = 600;
        iimage.height = 600;
        var div = myWin.document.getElementById("container");
        div.appendChild(iimage);
        myWin.document.close();

        var form = myWin.document.createElement('form');
        var input = myWin.document.createElement('input');
        form.style.display = "flex";
        form.style.justifyContent = "center";
        form.style.alignItems = "center";
        form.style.marginTop = "1%";
        input.type = "button";
        input.value = "Close it";
        input.addEventListener("click", () => {
            myWin.close();
        });
        form.appendChild(input);
        myWin.document.getElementById("container").parentElement.appendChild(form);
    }
}