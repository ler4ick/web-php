<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta http-equiv="charset" content="windws-1251">
    <title>Главная. Скороходова</title>

    <script src="https://kit.fontawesome.com/91955f65d7.js" crossorigin="anonymous"></script>

    @vite(['resources/css/main.css', 'resources/js/handlers.js', 'resources/js/cookies.js', 'resources/js/currentDate.js'])

    <style>
        .round {
            border-radius: 30px;
            border: 3px #483c32;
            box-shadow: 0 0 7px #666;
        }
    </style>
    <script>
        /* When the user clicks on the button,
                                                                                toggle between hiding and showing the dropdown content */
        function myFunction() {
            document.getElementById("myDropdown").classList.toggle("show");
        }

        // Close the dropdown if the user clicks outside of it
        window.onclick = function(e) {
            if (!e.target.matches('.dropbtn')) {
                var myDropdown = document.getElementById("myDropdown");
                if (myDropdown.classList.contains('show')) {
                    myDropdown.classList.remove('show');
                }
            }
        }
        window.onload = () => {
            var keyMain = localStorage.getItem("Main");

            if (keyMain != NaN) {
                localStorage.setItem("Main", Number(keyMain) + 1);
            } else {
                localStorage.setItem("Main", 1);
            }

            var value = getCookie("Main");
            var expDays = 7;

            if (value != NaN) {
                setCookie("Main", value - 0 + 1, expDays);
            } else {
                setCookie("Main", 1, expDays);
            }
            graphics();
        }
    </script>

</head>

<body>
    <div class="header-menu">
        <nav>
            <ul>
                <li id="Main">
                    <a href="/">
                        <i id="MainI" class=""></i>Главная</a>
                </li>
                <li id="AboutMe">
                    <a href="about_me">
                        <i id="AboutMeI"></i>Обо мне</a>
                </li>
                <li>
                    <div class="dropdown">
                        <button class="dropbtn" onclick="myFunction()">Мои интересы
                            <i class="fa fa-caret-down"></i>
                        </button>
                        <div class="dropdown-content" id="myDropdown">
                            <a href="hobby#MyHobby">Моё хобби</a>
                            <a href="hobby#FavMovies">Любимые фильмы</a>
                            <a href="hobby#FavBands">Любимые группы</a>
                            <a href="hobby#FavBooks">Любимые книги</a>
                        </div>
                    </div>
                </li>
                <li id="Study">
                    <a href="education">
                        <i id="StudyI"></i>Учеба</a>
                </li>
                <li id="Photoalbum">
                    <a href="album">
                        <i id="PhotoalbumI"></i>Фотоальбом</a>
                </li>
                <li id="Contacts">
                    <a href="contact">
                        <i id="ContactsI"></i>Контакты</a>
                </li>
                <li id="Task">
                    <a href="test">
                        <i id="TaskI"></i>Тест по дисциплине</a>
                </li>
                <li id="History">
                    <a href="history">
                        <i id="HistoryI"></i>История</a>
                </li>
                <li>
                    <div id="date">
                    </div>
                </li>
            </ul>
        </nav>
    </div>

    <div class="header1">
        <h1>Скороходова Валерия Александровна</h1>
    </div>

    <div class="image_text">
        <img src="/photos/16.JPG" alt="Лера" title="Лера" width="500px" height="500px" class="round" />
    </div>

    <div class="header2">
        <p>ИС/б-20-1-о</p>
    </div>
    <div class="header3">
        <P align=center>Лабораторная работа №1

        </P>

    </div>
    <HR align="center" width="95%" size=3 color="#786d5f">
</body>

</html>
