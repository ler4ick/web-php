<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
    <meta charset="utf-8">
    @vite(['resources/css/main.css', 'resources/css/test.css', 'resources/css/contact.css' ,'resources/js/handlers.js', 'resources/js/cookies.js', 'resources/js/currentDate.js'])

    <title>Загрузка блога</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
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
                <li id="GuestBook">
                    <a href="blogUpload">
                        <i id="BookI"></i>Загрузка блога</a>
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

<div class="HeaderTest" align=center>
    <h2>Редактор блога</h2>
</div>

<form id="form" class="blog-form" enctype="multipart/form-data" method="post" action="{{ route('blogUpload.upload') }}">
    @csrf
    <div class="blogInputForm">
        <br><br>
        <label for="file">Выберите файл</label>
        <br><br>
        <input type="file" id="file" name="file">

        <br><br>
        <input type="submit" value="Отправить">

        <br><br><br><br>
    </div>
</form>
</body>

</html>
