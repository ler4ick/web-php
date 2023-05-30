$(function() {
    var path = "photos/";
    /* fotos = new Array(
        for()
    ); */

    var titles = new Array(
        "1", "2", "3", "4", "5", "6", "7", "8", "9", "10", "11", "12", "13", "14", "15", "16");

    $('#parentTr').after(function() { //i-номер элемента, с которого начнется отображение; n-количество элементов для отображения
        var i = 0;
        for (var j = 0; j < 4; j++) {
            var tr = document.createElement('tr');
            /* document.write("<tr>"); */
            for (var k = 0; k < 4; k++) {
                var td = document.createElement('td');
                var img = document.createElement('img');
                img.src = path + titles[i] + ".jpg";
                img.alt = titles[i];
                img.title = titles[i];
                td.appendChild(img);
                tr.appendChild(td);
                i++;
            }
            /*  document.write("<td> <img src=" + path + titles[k] + ".jpg" + " alt=" + titles[i] + " title=" + titles[i] + "><figcaption>" + titles[i] + "</figcaption> </td>"); */
            /* document.write("</tr>"); */
            document.getElementById("parentTr").appendChild(tr);
        }
    })

    ///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
    var currentPhoto = null;
    var wndw = $('.gallery');
    wndw.hide();

    var square = $('#parentTr');
    square.on('mouseup', function(e) {
        if (e.target.src != undefined) {
            currentPhoto = e.target;
            wndw.css({
                'opacity': '1'
            });
            $('.big > img').attr('src', currentPhoto.src).attr('title', currentPhoto.title);
            $('p').text("Photo: " + getNumber(currentPhoto) + " out of " + titles.length);
            wndw.fadeIn(300);
        }
    })

    $('.gallery-button').on('click', function() {
        wndw.fadeOut(300);
    })

    $('.gallery-next').on('click', function() {
        wndw.slideUp(400, function() {
            if (getNumber(currentPhoto) != titles.length && getNumber(currentPhoto) % 4 != 0) {
                currentPhoto = currentPhoto.parentNode.nextSibling.childNodes[0];
            } else if (getNumber(currentPhoto) != titles.length && getNumber(currentPhoto) % 4 == 0) {
                currentPhoto = currentPhoto.parentNode.parentNode.nextSibling.childNodes[0].childNodes[0];
            } else {
                currentPhoto = currentPhoto.parentNode.parentNode.parentNode.children[0].childNodes[0].childNodes[0];
            }
            $('.big > img').attr('src', currentPhoto.src).attr('title', currentPhoto.title);
            $('p').text("Photo: " + getNumber(currentPhoto) + " out of " + titles.length);
        }).slideDown(400);
    });

    $('.gallery-prev').on('click', function() {
        wndw.slideUp(400, function() {
            if (getNumber(currentPhoto) != 1 && (getNumber(currentPhoto) - 1) % 4 != 0) {
                currentPhoto = currentPhoto.parentNode.previousSibling.childNodes[0];
            } else if (getNumber(currentPhoto) != 1 && (getNumber(currentPhoto) - 1) % 4 == 0) {
                currentPhoto = currentPhoto.parentNode.parentNode.previousSibling.lastChild.childNodes[0];
            } else {
                currentPhoto = currentPhoto.parentNode.parentNode.parentNode.lastChild.lastChild.childNodes[0];
            }
            $('.big > img').attr('src', currentPhoto.src).attr('title', currentPhoto.title);
            $('p').text("Photo: " + getNumber(currentPhoto) + " out of " + titles.length);
        }).slideDown(400);
    });

    function getNumber(e) {
        for (i = 0; i < titles.length; i++) {
            if (e.title == titles[i]) {
                return (i + 1);
            }
        }
    }

    //////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

    $('#name').on('mouseenter', function() {
        var div = $('<div>').css({
            'position': 'absolute',
            'top': '0%',
            'left': '50%',
            'display': 'flex',
            'justify-content': 'center',
            'align-items': 'center',
            'flex-wrap': 'wrap',
            'width': '10%',
            'height': '20px',
            'color': '#000',
            'fontSize': '14px',
            'fontWeight': '700',
            'opacity': '0',
            'borderRadius': '5px',
            'border': '2px solid #000',
            'backgroundColor': '#fff',
        }).text("3 слова через 1 пробел").addClass("popup");
        div.appendTo($('.forma1')).animate({
            'opacity': '1',
            'top': '00%',
            'left': '20%',
        }, 500);
    })

    $('#name').on('mouseleave', function() {
        $('.popup').delay(3000).fadeOut(1000);
    })

    $('#userEmail').on('mouseenter', function() {
        var div = $('<div>').css({
            'position': 'absolute',
            'top': '0%',
            'left': '50%',
            'display': 'flex',
            'justify-content': 'center',
            'align-items': 'center',
            'flex-wrap': 'wrap',
            'width': '10%',
            'height': '20px',
            'color': '#000',
            'fontSize': '14px',
            'fontWeight': '700',
            'opacity': '0',
            'borderRadius': '5px',
            'border': '2px solid #000',
            'backgroundColor': '#fff',
        }).text("example@gmail.com").addClass("popup");
        div.appendTo($('.forma4')).animate({
            'opacity': '1',
            'top': '00%',
            'left': '20%',
        }, 500);
    })

    $('#userEmail').on('mouseleave', function() {
        $('.popup').delay(3000).fadeOut(1000);
    })

    $('#mobile').on('mouseenter', function() {
        var div = $('<div>').css({
            'position': 'absolute',
            'top': '50%',
            'left': '50%',
            'display': 'flex',
            'justify-content': 'center',
            'align-items': 'center',
            'flex-wrap': 'wrap',
            'width': '15%',
            'height': '20px',
            'color': '#000',
            'fontSize': '14px',
            'fontWeight': '700',
            'opacity': '0',
            'borderRadius': '5px',
            'border': '2px solid #000',
            'backgroundColor': '#fff',
        }).text("Например, +79780133319").addClass("popup");
        div.appendTo($('.forma6')).animate({
            'opacity': '1',
            'top': '55%',
            'left': '20%',
        }, 500);
    })

    $('#mobile').on('mouseleave', function() {
        $('.popup').delay(3000).fadeOut(1000);
    })

    //////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

    $('#resett').on('click', function() {
        $('.container').addClass('disactive');
        $('.gallery').css({
            'color': '#fff',
            'opacity': '1',
        }).slideDown(300);
    })

    $('.gallery-yes').on("click", function() {
        $('.gallery').slideUp(300, function() {
            $('.container').removeClass('disactive');
        });
        $('#form').trigger('reset');

    })

    $('.gallery-no').on("click", function() {
        $('.gallery').slideUp(300, function() {
            $('.container').removeClass('disactive');
        });
    })
});