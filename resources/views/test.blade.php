<!DOCTYPE html>
<html>

<head>
    <meta http-equiv="charset" content="windws-1251">
    <title>Тест по дисциплине. Скороходова</title>
    <script src="script/checkName.js"></script>
    <script src="script/3.js"></script>
    <script src="script/variant.js"></script>
    <link rel="stylesheet" href="./css/main.css">
    <link rel="stylesheet" href="./css/test.css">
    <link rel="stylesheet" href="./css/contact.css">
    <script src="script/currentDate.js"></script>
    <script src="https://kit.fontawesome.com/91955f65d7.js" crossorigin="anonymous"></script>
    <script src="script/handlers.js"></script>
    <script src="script/cookies.js"></script>

    @vite(['resources/css/main.css', 'resources/css/test.css', 'resources/css/contact.css' ,'resources/js/handlers.js', 'resources/js/cookies.js', 'resources/js/currentDate.js'])

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
            var key = localStorage.getItem("Task");

            if (key != NaN) {
                localStorage.setItem("Task", Number(key) + 1);
            } else {
                localStorage.setItem("Task", 1);
            }

            var value = getCookie("Task");
            var expDays = 7;

            if (value != NaN) {
                setCookie("Task", value - 0 + 1, expDays);
            } else {
                setCookie("Task", 1, expDays);
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
                        <script>
                            clockTick()
                        </script>
                    </div>
                </li>
            </ul>
        </nav>
    </div>
    <div class="header1">
        <h2>Тест по дисциплине: Высшая математика</h2>
    </div>
    <form method="post" action="{{ action('App\Http\Controllers\TestController@checkAction') }}" method="post" novalidate onsubmit="return checktest()" novalidate onsubmit="return amountWords()">
        @csrf
        <div class="forma1">
            <label for="name">Имя пользователя:</label>
            <input type="text" placeholder="Введите ФИО" id="name" required>
        </div>


        @if(isset($result))
        <h2 style="margin-bottom: 3em">
            Правильных ответов - {{$result}}
        </h2>
    @endif

        <div class="forma2">
            <p>Выберите вашу группу</p>
            <select name="Group_1[]" multiple="multiple" size="9">
                <optgroup label="1 курс">
                    <option value="1">ИС/б-20-1-о </option>
                    <option value="2">ИС/б-20-2-о </option>
                    <option value="1">ИС/б-20-3-о </option>
                    <option value="2">ПИ/б-20-1-о </option>
                </optgroup>
                <optgroup label="2 курс">
                    <option value="3">ИС/б-19-1-о</option>
                    <option value="4">ИС/б-19-2-о</option>
                    <option value="5">ИС/б-19-3-о</option>
                    <option value="6">ПИ/б-19-1-о</option>
                </optgroup>
                <optgroup label="3 курс">
                    <option value="7">ИС/б-18-1-о</option>
                    <option value="8">ИС/б-18-2-о</option>
                    <option value="9">ПИ/б-18-1-о</option>
                </optgroup>
                <optgroup label="4 курс">
                    <option value="10">ИС/б-17-1-о</option>
                    <option value="11">ПИ/б-17-1-о</option>
                </optgroup>
            </select>
        </div>


        <div class="text1">Вопрос 1. Что называется единичной матрицей?</div>

        <div class="forma2">
            <div>
                <input type="radio" name="answer1" value="matrix1" id="q1">
                <label for="right">Матрица, у которой главная диагональ заполнена единицами, а остальные элементы равны 0.</label>
            </div>

            <div>
                <input type="radio" name="answer1" id="wrong" value="matrix2">
                <label for="wrong">Матрица, каждый элемент которой равен 1.</label>
            </div>

        </div>
        <HR align="center" width="95%" size=3 color="#786d5f">
        <div class="forma3">
            <label for="answer">Вопрос 2. Вычислите 2+2.</label>
            <select name="answer2" id="q2">
                <option value="wrong">...</option>
                <option value="четыре">четыре</option>
                <option value="22">22</option>
                <option value="4">4</option>
            </select>
        </div>
        <HR align="center" width="95%" size=3 color="#786d5f">

        <div class="forma5">
            <label for="answer">Вопрос 3. Напишите, как называется квадратная матрица, у которой все элементы, стоящие ниже (или выше) главной диагонали, равны нулю.</label>
            <textarea name="answer3" placeholder="Текст сообщения" id="q3" cols="40" rows="1"></textarea>

        </div>

        <div class="buttons">
            <input type="submit">
            <input type="reset" value="Очистить форму">
        </div>

    </form>
</body>

<html>
