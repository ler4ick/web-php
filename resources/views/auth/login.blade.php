<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
    <meta charset="utf-8">
    @vite(['resources/css/main.css', 'resources/js/app.js'])
    {{--    <script src="public/scripts/check.js"></script>--}}
    {{--    <script src="public/scripts/clock.js"></script>--}}
    {{--    <script src="public/scripts/cookie.js"></script>--}}
    {{--    <script src="public/scripts/submenu.js"></script>--}}
    {{--    <script src="public/scripts/menu.js"></script>--}}
    {{--    <script src="script/jquery-2.2.3.js"></script>--}}
    {{--    <script src="script/JQcontacts.js"></script>--}}
    {{--    <script src="script/JQModalWindow.js"></script>--}}
    {{--    <script src="script/bootstrap/js/bootstrap.js"></script>--}}
    <title>Мой блог</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>

<body>

@include('layouts/header')

<div class="HeaderTest" align=center>
    <h2>Вход</h2>
</div>

<form method="POST" class="namingIsMyMiddleNameForm" action="{{ route('login') }}" style="margin: 0 auto; width: 200px;background-color: rgba(255, 255, 255, 0.8); padding: 20px; border-radius: 5px">
    @csrf

    <div style="margin-bottom: 20px">
        <label for="email">
            Почта
        </label>
        <input id="email" type="email" name="email" required autofocus />
    </div>

    <div style="margin-bottom: 20px">
        <label for="password">
            Пароль
        </label>
        <input id="email" type="password" name="password" required />
    </div>

    <div style="margin-bottom: 30px">
        <a href="{{ route('register') }}">
            Регистрация
        </a>
    </div>

    <div>
        <button>
            Войти
        </button>
    </div>
</form>
</body>

</html>
