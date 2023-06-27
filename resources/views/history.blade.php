<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>История посещений</title>
    @vite(['resources/css/main.css', 'resources/js/app.js'])
    @vite(['resources/js/submenu.js'])
    @vite(['resources/js/menu.js'])
    @vite(['resources/js/clock.js'])
    @vite(['resources/js/cookie.js'])
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
<br />
<div class="text">
    <h1>Статистика посещений</h1>
</div>
<br />
<table class="namingIsMyMiddleNameTable">
    <thead>
    <tr>
        <th>Дата и время посещения</th>
        <th>Web-страница посещения</th>
        <th>IP-адрес компьютера посетителя</th>
        <th>Имя хоста компьютера посетителя</th>
        <th>Название браузера, который использовал посетитель</th>
    </tr>
    </thead>
    <tbody>

    @foreach($statistics as $statistic)
        <tr>
            <td>{{ $statistic->created_at->format('d.m.Y H:i') }}</td>
            <td>{{ $statistic->page }}</td>
            <td>{{ $statistic->ip }}</td>
            <td>{{ $statistic->host_name }}</td>
            <td>{{ $statistic->browser_name }}</td>
        </tr>
    @endforeach
    </tbody>
</table>

<div class="namingIsMyMiddleNamePagination">
    {{ $statistics->links() }}
</div>
</body>

</html>
