<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
    <meta charset="utf-8">
    @vite(['resources/css/main.css', 'resources/js/app.js'])
    <title>Мой блог</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>

<body>

@include('layouts/header')

<div class="HeaderTest" align=center>
    <h2>Редактирование записи {{$blog->title}}</h2>
</div>
    <form id="form" class="namingIsMyMiddleNameForm" enctype="multipart/form-data" method="post" action="{{ route('blog.update', ['id' => $blog->id]) }}">
        @csrf
        @method('put')

        <div class="blogInputForm">
        <label for="title">Тема сообщения:</label>
            <p><input type="text" name="title" id="title" value="{{$blog->title}}"></p>

        <label for="image">Изображение:</label>
            <div style="margin-top: 10px">
                <img src="{{Storage::url('blog_images/' . $blog->image)}}" style="object-fit: cover; object-position: center" alt="" width="200" height="200">
            </div>
            <p> <input type="file" name="image" id="image"></p>

        <label for="content">Текст сообщения:</label>
            <p>
                <textarea name="message" id="message" rows="5">{{$blog->message}}</textarea>
            </p>
            <p><input type="submit" value="Отправить"></p>
        </div>
    </form>
</body>

</html>
