<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
    <meta charset="utf-8">
    @vite(['resources/css/main.css', 'resources/css/test.css', 'resources/css/contact.css' ,'resources/js/handlers.js', 'resources/js/cookies.js', 'resources/js/currentDate.js'])

    <title>Мой блог</title>
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
    <h2>Блог</h2>
</div>

<form id="form" class="blog-form" enctype="multipart/form-data" method="post" action="{{ route('blog.store') }}">
    @csrf
    <div class="blogInputForm">
    <label for="title">Тема сообщения:</label>
        <p><input type="text" name="title" id="title" required></p>

    <label for="image">Изображение:</label>
        <p> <input type="file" name="image" id="image"></p>

    <label for="content">Текст сообщения:</label>
        <p><textarea name="message" id="message" rows="5" required></textarea></p>

        <p><input type="submit" value="Отправить"></p>
    </div>

    <table class="blog-table">
        <thead>
        <tr>
            <th>Дата</th>
            <th>Заголовок</th>
            <th>Сообщение</th>
            <th>Изображение</th>
        </tr>
        </thead>
        <tbody>

        @foreach($blogPosts as $posts)
            <tr>
                <td>{{ $posts->created_at->format('d.m.Y H:i') }}</td>
                <td>{{ $posts->title }}</td>
                <td>{{ $posts->message }}</td>
                <td style="width: 100px; height: 150px;">
                    @if ($posts->image)
                        <img src="{{ Storage::url('blog_images/' . $posts->image) }}" alt="{{ $posts->title }}" width="100px" height="150px">
                    @endif
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>

    <div class="pagination">
        {{ $blogPosts->links() }}
    </div>
</form>
</body>

</html>
