<!DOCTYPE html>
<html>

<head>
    <meta http-equiv="charset" content="windws-1251">
    <title>Интересы. Скороходова</title>

    @vite(['resources/css/main.css', 'resources/css/hobby.css', 'resources/js/jsHobbies.js', 'resources/js/handlers.js', 'resources/js/cookies.js', 'resources/js/currentDate.js'])

    <script src="https://kit.fontawesome.com/91955f65d7.js" crossorigin="anonymous"></script>

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
            var key = localStorage.getItem("Hobbies");

            if (key != NaN) {
                localStorage.setItem("Hobbies", Number(key) + 1);
            } else {
                localStorage.setItem("Hobbies", 1);
            }

            var value = getCookie("Hobbies");
            var expDays = 7;

            if (value != NaN) {
                setCookie("Hobbies", value - 0 + 1, expDays);
            } else {
                setCookie("Hobbies", 1, expDays);
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
        <h2>Интересы</h2>
    </div>


    <div align=center>
        <h3>Ссылки</h3>
    </div>


    <HR align="center" width="95%" size=3 color="#786d5f">

    <div align="center">
        <script>
            anchors("u", "first", "Хобби", "second", "Любимая музыка", "third", "Любимые произведения")
        </script>
    </div>

    <div class="image_text">
        <img src="photos/cat.jpg" alt="Мася" title="Моя кошка" width="300" class="round" ; />
    </div>

        <?php foreach ($names as $val): ?>
            <h3 id="<?= $val['id'] ?>" align=center><?= $val['name'] ?> </h3>
            <HR align="center" width="95%" size=3 color="#786d5f">
                <ol>
                <?php foreach ($val['description'] as $val): ?>
                    <li> <?= $val ?> </li>
                <?php endforeach; ?>
            </ol>
        <?php endforeach; ?>
    {{-- <p>
        <ol>
            <li> <a>Писательство/чтение</a> </li>
            <li> <a>Вязание на спицах</a> </li>
            <li> <a>Плавание</a> </li>
            <li> <a>Компьютерные игры</a> </li>
        </ol>
    </p>
    <h3 id="second" align=center> Любимая музыка </h3>
    <HR align="center" width="95%" size=3 color="#786d5f">

        <p>
            <ol>
                <li> <a>My Chemical Romance</a> </li>
                <li> <a>Silverstein</a> </li>
                <li> <a>Imagine Dragons</a> </li>
                <li> <a>The Rasmus</a> </li>
                <li> <a>Skillet</a> </li>
                <li> <a>Breaking Benjamin</a> </li>
            </ol>
        </p>


    <h3 id="third" align=center> Любимые произведения </h3>
    <HR align="center" width="95%" size=3 color="#786d5f">

        <p>
            <ol>
                <li> <a>"Опиумная война" Р. Куанг</a> </li>
                <li> <a>"Франкенштейн" М. Шелли</a> </li>
            </ol>
        </p> --}}


</body>

</html>
