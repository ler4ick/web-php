<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="charset" content="windws-1251">
    <title>Контакты. Скороходова</title>
    {{-- <script src="script/3.js"></script>
    <script src="script/checkPhone.js"></script>
    <script src="script/checkName.js"></script>
    <script src="script/currentDate.js"></script>
    <script src="https://kit.fontawesome.com/91955f65d7.js" crossorigin="anonymous"></script>
    <script src="script/handlers.js"></script>
    <script src="script/cookies.js"></script> --}}
    <script src="script/dynamicValidation.js"></script>
    {{-- <script src="script/jquery-3.6.1.min.js"></script>
    <script src="script/jquery-main.js"></script> --}}

    {{-- <link rel="stylesheet" href="./css/main.css">
    <link rel="stylesheet" href="./css/contact.css"> --}}

    @vite(['resources/css/main.css', 'resources/css/main.css', 'resources/js/jquery-3.6.1.min.js', 'resources/js/jquery-main.js', 'resources/js/handlers.js', 'resources/js/cookies.js', 'resources/js/currentDate.js', 'resources/js/checkName.js', 'resources/js/checkPhone.js', 'resources/js/dynamicValidation.js'])
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
                        <a href="main.html">
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
                                <a href="hobby.html#MyHobby">Моё хобби</a>
                                <a href="hobby.html#FavMovies">Хобби</a>
                                <a href="hobby.html#FavBands">Музыка</a>
                                <a href="hobby.html#FavBooks">Любимые книги</a>
                            </div>
                        </div>
                    </li>
                    <li id="Study">
                        <a href="education.html">
                            <i id="StudyI"></i>Учеба</a>
                    </li>
                    <li id="Photoalbum">
                        <a href="album.html">
                            <i id="PhotoalbumI"></i>Фотоальбом</a>
                    </li>
                    <li id="Contacts">
                        <a href="contact.html">
                            <i id="ContactsI"></i>Контакты</a>
                    </li>
                    <li id="Task">
                        <a href="test.html">
                            <i id="TaskI"></i>Тест по дисциплине</a>
                    </li>
                    <li id="History">
                        <a href="history.html">
                            <i id="HistoryI"></i>История</a>
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
        <div class="header1">
            <h2>Контакты</h2>
        </div>

        {{-- <div id="app">
            <form-item />
        </div> --}}

        @if(isset($errors) and is_array($errors))
        @foreach($errors as $error)
            <p style="color: red">
                {{ $error }}
            </p>
        @endforeach
    @endif

    <form onsubmit="return checkcontact();" id="contact" onchange="checkSubmit();" action="{{ action('App\Http\Controllers\ContactController@checkAction') }}" method="post">
        @csrf
            <div class="forma1">
                <label for="name">Имя пользователя:</label>
                <input type="text" name="name" placeholder="Фамилия Имя Отчество" id="name" {{-- required onblur="ValFIO()" --}}>
                <p id="errorFio"></p>
            </div>



            <div class="text1">Пол:</div>

            <div class="forma2">
                <div>
                    <input type="radio" name="gender" id="man">
                    <label for="man">Мужчина</label>
                </div>

                <div>
                    <input type="radio" name="gender" id="woman">
                    <label for="woman">Женщина</label>
                </div>

            </div>

            <div class="forma3">
                <label for="age">Возраст:</label>
                <select name="age" id="age">
                <option value="child">меньше 14</option>
                <option value="teen">14-18</option>
                <option value="young">18-30</option>
                <option value="adult">31-45</option>
                <option value="adult2">45-60</option>
                <option value="old">больше 60</option>
            </select>
            </div>


            <div class="forma4">
                <label for="userEmail">Email:</label>
                <input id="userEmail" type="text" name="email" placeholder="Введите вашу почту" {{-- onblur="ValEmail()" --}}>
                <p id="errorEmail"></p>
            </div>


            <div class="forma5">
                <textarea name="message" placeholder="Текст сообщения" id="mess" cols="50" rows="10"></textarea>
            </div>

            <div class="forma6">
                <p>Укажите номер телефона: </p>
                <input type="text" name="phone" placeholder="Напишите свой номер" id="mobile" {{-- onblur="ValTel()" --}}>
                <!-- <pre>Пример номера телефона: +79781234567</pre> -->
                <p id="errorPhone"></p>
            </div>

            <div class="forma5">
                <p>Укажите дату рождения: </p>
                <input type="date" name="birthdate" placeholder="Дата" id="bdate">
            </div>

            <div class="buttons">
                <input type="submit" id="submit" class="button">
                <input type="button" value="Очистить форму" id="resett" class="button">
            </div>

        </form>


    </div>
    <div class="gallery">
        <div class="big">
            <h1>ВЫ УВЕРЕНЫ?</h1>
        </div>
        <div class="small">
            <div class="gallery-yes">
                ДА
            </div>
            <div class="gallery-no">
                НЕТ
            </div>
        </div>
    </div>

    <!--подключение вьюхи-->
    <script src="https://unpkg.com/vue@next"></script>
    {{-- <script src="resources/js/contacts-app.js"></script> --}}
</body>

</html>
