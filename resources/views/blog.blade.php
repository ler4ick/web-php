<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
    <meta charset="utf-8">
    @vite(['resources/css/main.css', 'resources/css/test.css', 'resources/css/contact.css' ,'resources/js/handlers.js', 'resources/js/cookies.js', 'resources/js/currentDate.js'])

    <title>Мой блог</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>

@php
    use \Illuminate\Support\Facades\Auth;

    $user = Auth::user();
    $isUserAdmin = (Auth::check() and $user->isAdmin());
    $isUserRedactor = (Auth::check() and $user->isRedactor());
@endphp

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
</form>
<div style="display: flex; justify-content: center; align-items: center; flex-direction: column;">
    <table class="blog-table">
        <thead>
        <tr>
            <th>Дата</th>
            <th>Заголовок</th>
            <th>Сообщение</th>
            <th>Изображение</th>
            @if($isUserAdmin)
                <th></th>
            @endif
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
                @if($isUserAdmin or $isUserRedactor)
                    <td>
                        <form method="POST" action="{{ route('blog.delete', ['id' => $posts->id]) }}">
                            @method('delete')
                            @csrf
                            <button>Удалить</button>
                        </form>
                        <a href="{{ route('blog.edit', ['id' => $posts->id]) }}">
                            <button>Редактировать</button>
                        </a>
                    </td>
                @endif
            </tr>
        @endforeach
        </tbody>
    </table>

    <div class="pagination">
        {{ $blogPosts->links() }}
    </div>
</div>
</body>

</html>
