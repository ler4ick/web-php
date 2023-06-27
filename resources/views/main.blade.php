<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta http-equiv="charset" content="windws-1251">
    <title>Главная. Скороходова</title>

    <script src="https://kit.fontawesome.com/91955f65d7.js" crossorigin="anonymous"></script>

    @vite(['resources/css/main.css', 'resources/js/handlers.js', 'resources/js/cookies.js', 'resources/js/currentDate.js'])

    <style>
        .round {
            border-radius: 30px;
            border: 3px #483c32;
            box-shadow: 0 0 7px #666;
        }
    </style>
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
            var keyMain = localStorage.getItem("Main");

            if (keyMain != NaN) {
                localStorage.setItem("Main", Number(keyMain) + 1);
            } else {
                localStorage.setItem("Main", 1);
            }

            var value = getCookie("Main");
            var expDays = 7;

            if (value != NaN) {
                setCookie("Main", value - 0 + 1, expDays);
            } else {
                setCookie("Main", 1, expDays);
            }
            graphics();
        }
    </script>

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

    <div class="header1">
        <h1>Скороходова Валерия Александровна</h1>
    </div>

    <div class="image_text">
        <img src="/photos/16.JPG" alt="Лера" title="Лера" width="500px" height="500px" class="round" />
    </div>

    <div class="header2">
        <p>ИС/б-20-1-о</p>
    </div>
    <div class="header3">
        <P align=center>Лабораторная работа №1

        </P>

    </div>
    <HR align="center" width="95%" size=3 color="#786d5f">
</body>

</html>
