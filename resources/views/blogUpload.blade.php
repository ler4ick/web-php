<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
    <meta charset="utf-8">
    @vite(['resources/css/main.css', 'resources/css/test.css', 'resources/css/contact.css' ,'resources/js/handlers.js', 'resources/js/cookies.js', 'resources/js/currentDate.js'])

    <title>Загрузка блога</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>

<body>
    @include('layouts/header')

    <script>
        setCookie("history")
    </script>
    <script>
        setLS("history")
    </script>
    <script>
        setLL("history")
    </script>

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
