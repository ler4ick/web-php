<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="charset" content="windws-1251">
    <title>Гостевой блог</title>

    @vite(['resources/css/main.css', 'resources/css/guestBook.css', 'resources/js/jquery-3.6.1.min.js', 'resources/js/jquery-main.js', 'resources/js/handlers.js', 'resources/js/cookies.js', 'resources/js/currentDate.js', 'resources/js/checkName.js', 'resources/js/checkPhone.js', 'resources/js/dynamicValidation.js'])
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
            var keyContacts = localStorage.getItem("Contacts");

            if (keyContacts != NaN) {
                localStorage.setItem("Contacts", Number(keyContacts) + 1);
            } else {
                localStorage.setItem("Contacts", 1);
            }

            var value = getCookie("Contacts");
            var expDays = 100;

            if (value != NaN) {
                setCookie("Contacts", value - 0 + 1, expDays);
            } else {
                setCookie("Contacts", 1, expDays);
            }
            graphics();
        }
    </script>

</head>

<body>
    <div class="container">
        <div class="header-menu">
            <nav>
                <ul>
                    <li id="Main">
                        <a href="main">
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
                                <a href="hobby#FavMovies">Хобби</a>
                                <a href="hobby#FavBands">Музыка</a>
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
                    <li id="GuestBook">
                        <a href="guestBook">
                            <i id="BookI"></i>Гостевая книга</a>
                    </li>
                    <li id="GuestBook">
                        <a href="guestBookUpload">
                            <i id="BookI"></i>Загрузка гостевой книги</a>
                    </li>
                    <li id="GuestBook">
                        <a href="blog">
                            <i id="BookI"></i>Блог</a>
                    </li>
                    <li>
                        <div id="date">
                            <script>
                                clockTick()
                            </script>
                        </div>
                    </li>
                </ul>
            </nav>
        </div>
        <div class="text" align="center">
            <h1>Загрузка гостевой книги</h1>
        </div>

        <form id="form" class="namingIsMyMiddleNameForm" method="post" enctype="multipart/form-data" action="{{ route('guestBookUpload.upload') }}">
            @csrf
            <div class="upload">
                <br><label for="file">Выберите файл</label>
                <br><input type="file" id="file" name="file">
                <br><br>
                <input type="submit" value="Отправить">
            </div>
        </form>
    </div>
</body>

</html>
