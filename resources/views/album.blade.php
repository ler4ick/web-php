<!DOCTYPE html>
<html>

<head>
{{--     <script src="script/jquery-3.6.1.min.js"></script>
    <script src="script/jquery-main.js"></script> --}}

    <meta http-equiv="charset" content="windws-1251">
    <title>Главная. Скороходова</title>

    <script src="https://kit.fontawesome.com/91955f65d7.js" crossorigin="anonymous"></script>
    @vite(['resources/css/main.css', 'resources/css/album.css', 'resources/js/handlers.js', 'resources/js/cookies.js', 'resources/js/currentDate.js'])

    <style>
        .round {
            border-radius: 30px;
            border: 3px #483c32;
            box-shadow: 0 0 7px #666;
        }

        .thumb img {
            border: 2px solid #55c5e9;
            padding: 15px;
            background: #666;
            margin-right: 10px;
            margin-bottom: 10px;
        }
    </style>
    <script>
        /* When the user clicks on the button,
                                                                                                                                                                                                                                                                toggle between hiding and showing the dropdown content */
        function myFunction() {
            document.getElementById("myDropdown").classList.toggle("show");
        }

        // Close the dropdown if the user clicks outside of it
        window.onclick = function (e) {
            if (!e.target.matches('.dropbtn')) {
                var myDropdown = document.getElementById("myDropdown");
                if (myDropdown.classList.contains('show')) {
                    myDropdown.classList.remove('show');
                }
            }
        }

        window.onload = () => {
            var key = localStorage.getItem("Photoalbum");

            if (key != NaN) {
                localStorage.setItem("Photoalbum", Number(key) + 1);
            } else {
                localStorage.setItem("Photoalbum", 1);
            }

            var value = getCookie("Photoalbum");
            var expDays = 7;

            if (value != NaN) {
                setCookie("Photoalbum", value - 0 + 1, expDays);
            } else {
                setCookie("Photoalbum", 1, expDays);
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
                    <a href="main">
                        <i id="MainI" class=""></i>Главная</a>
                </li>
                <li id="AboutMe">
                    <a href="about_me.html">
                        <i id="AboutMeI"></i>Обо мне</a>
                </li>
                <li>
                    <div class="dropdown">
                        <button class="dropbtn" onclick="myFunction()">Мои интересы
                            <i class="fa fa-caret-down"></i>
                        </button>
                        <div class="dropdown-content" id="myDropdown">
                            <a href="hobby#MyHobby">Интересы</a>
                            <a href="hobby#FavMovies">Мои хобби</a>
                            <a href="hobby#FavBands">Любимая музыка</a>
                            <a href="hobby#FavBooks">Любимые произведения</a>
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
        <h1>Фотоальбом</h1>
        <!-- <table id="table">
            <tr id="parentTr">
            </tr>
        </table> -->
        {{-- <div id="app">
            <div class="square">
                <album-item v-for="(photo,i) in photos" :key="i" :package="photo" @click="index = i"></album-item>
            </div>
            <img-popup v-if="index !== -1" :photos="photos" :index="index" @close="index=-1">
            </img-popup>
        </div> --}}
        <table id="table">
            <?php
            $i=0;
            foreach ($args as $val) {
                $id = $val['id'];
                $src = $val['src'];
                $alt = $val['alt'];
                echo $src;
                $titles = $val['titles'];
                $figcaption = $val['figcaption'];
                echo "<td><img id=\"$id\"class=\"inTable\"
                src=\"$src\" alt=\"$alt\" titles=\"$titles\"
                onclick=\"bigFotoDiv(this)\">
                <figcaption>$figcaption</figcaption></td>";
                if (++$i % 5 == 0) {
                    echo "</tr><tr>";
                }
            }
            ?>
        </table>
    </div>

    <!-- <div class="gallery">
        <div class="big">
            <img src="../Images/2.jpg" alt="Старт" width="100%" height="100%" />
            <p></p>
        </div>
        <div class="small ">
            <div class="gallery-prev">
                Prev
            </div>
            <div class="gallery-button">
                Close it
            </div>
            <div class="gallery-next">
                Next
            </div>
        </div>
    </div> -->


    <!--подключение вьюхи-->
    <script src="https://unpkg.com/vue@next"></script>
    <script src='../app.js'></script>

</body>

</html>
