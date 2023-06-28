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

    <script>
        const checkLoginUnique = () => {
            const button = document.getElementById('submit-button')
            const loginField = document.getElementById('login')
            button.disabled = false;

            const params = new URLSearchParams()

            params.set('login', loginField.value)

            fetch(`{{ route('api.auth.checkUniqueLogin') }}?${params.toString()}`).then(res => res.json())
            .then(res => {
               button.disabled = !res.data.is_unique
            })
        }
    </script>

@include('layouts/header')

<div class="HeaderTest" align=center>
    <h2>Регистрация</h2>
</div>

<form method="POST" class="namingIsMyMiddleNameForm" action="{{ route('register') }}" style="margin: 0 auto; width: 200px;background-color: rgba(255, 255, 255, 0.8); padding: 20px; border-radius: 5px">
    @csrf


    <div style="margin-bottom: 20px">
        <label for="name">
            ФИО
        </label>
        <input id="name" name="name" required />
        @if($errors->has('name'))
            <p style="color: red">{{ $errors->get('name')[0] }}</p>
        @endif
    </div>

    <div style="margin-bottom: 20px">
        <label for="email">
            Почта
        </label>
        <input id="email" type="email" name="email" required autofocus />
        @if($errors->has('email'))
            <p style="color: red">{{ $errors->get('email')[0] }}</p>
        @endif
    </div>

    <div style="margin-bottom: 20px">
        <label for="login">
            Логин
        </label>
        <input id="login" type="text" name="login" required onblur="checkLoginUnique(event)" />
        @if($errors->has('login'))
            <p style="color: red">{{ $errors->get('login')[0] }}</p>
        @endif
    </div>

    <div style="margin-bottom: 20px">
        <label for="password">
            Пароль
        </label>
        <input id="email" type="password" name="password" required />
        @if($errors->has('password'))
            <p style="color: red">{{ $errors->get('password')[0] }}</p>
        @endif
    </div>

    <div>
        <button type="submit" id="submit-button">
            Зарегистрироваться
        </button>
    </div>
</form>
</body>

</html>
