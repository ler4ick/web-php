<div style="display: flex">
    @php
        $user = Illuminate\Support\Facades\Auth::user()
    @endphp
    @if($user and $user->isAdmin())
        Вы администратор
    @endif
    <ul style="width: 300px; margin: 0 auto; list-style: none">
        @if(Illuminate\Support\Facades\Auth::guest())
            <li><a href="{{ route('register') }}">Зарегистрироваться</a></li>
            <li><a href="{{ route('login') }}">Вход</a></li>
        @endif
        @if(Illuminate\Support\Facades\Auth::check())
            <li>
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <a href="{{ route('logout') }}"
                       onclick="event.preventDefault(); this.closest('form').submit();">Выйти</a>
                </form>
            </li>
        @endif
    </ul>
    @if($user)
        <div>
            <span>
                Пользователь: {{$user->name}}
            </span>
        </div>
    @endif
</div>

<div class="header-menu">
    <nav>
        <ul>
            <li id="Main">
                <a href="{{ route('main.index') }}">
                    <i id="MainI" class=""></i>Главная</a>
            </li>
            <li id="AboutMe">
                <a href="{{ route('aboutMe.index') }}">
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
                <a href="{{ route('album.index') }}">
                    <i id="PhotoalbumI"></i>Фотоальбом</a>
            </li>
            <li id="Contacts">
                <a href="{{ route('contact.index') }}">
                    <i id="ContactsI"></i>Контакты</a>
            </li>
            <li id="Task">
                <a href="{{ route('test.index') }}">
                    <i id="TaskI"></i>Тест по дисциплине</a>
            </li>
            {{-- <li id="History">
                <a href="history">
                    <i id="HistoryI"></i>История</a>
            </li> --}}
            <li id="GuestBook">
                <a href="{{ route('guestBook.index') }}">
                    <i id="BookI"></i>Гостевая книга</a>
            </li>
            <li id="GuestBook">
                <a href="{{ route('blog.index') }}">
                    <i id="BookI"></i>Блог</a>
            </li>
            @if($user and $user->isAdmin())
                <li id="GuestBook">
                    <a href="{{ route('guestBookUpload.index') }}">
                        <i id="BookI"></i>Загрузка гостевой книги</a>
                </li>
                <li id="GuestBook">
                    <a href="{{ route('blogUpload.index') }}">
                        <i id="BookI"></i>Загрузка блога</a>
                </li>
                <li id="GuestBook">
                    <a href="{{ route('statistics.index') }}">
                        <i id="BookI"></i>Статистика посещений</a>
                </li>
            @endif
            {{-- <li>
                <div id="date">
                    <script>
                        clockTick()
                    </script>
                </div>
            </li> --}}
        </ul>
    </nav>
</div>
