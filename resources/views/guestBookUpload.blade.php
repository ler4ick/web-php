<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="charset" content="windws-1251">
    <title>Гостевой блог</title>

    @vite(['resources/css/main.css', 'resources/css/guestBook.css', 'resources/js/jquery-3.6.1.min.js', 'resources/js/jquery-main.js', 'resources/js/handlers.js', 'resources/js/cookies.js', 'resources/js/currentDate.js', 'resources/js/checkName.js', 'resources/js/checkPhone.js', 'resources/js/dynamicValidation.js'])
    <script>
        /* When the user clicks on the button,
                                                                                                                                                                                                                                                                toggle between hiding and showing the dropdown content */
        function myFunction() {
            document.getElementById("myDropdown").classList.toggle("show");
        }

        // Close the dropdown if the user clicks outside of it
        window.onclick = function (e) {
            if (!e.target.matches('.dropbtn')) {
                var myDropdown = document.getElementById("myDropdown");
                if (myDropdown.classList.contains('show')) {
                    myDropdown.classList.remove('show');
                }
            }
        }
        window.onload = () => {
            var keyContacts = localStorage.getItem("Contacts");

            if (keyContacts != NaN) {
                localStorage.setItem("Contacts", Number(keyContacts) + 1);
            } else {
                localStorage.setItem("Contacts", 1);
            }

            var value = getCookie("Contacts");
            var expDays = 100;

            if (value != NaN) {
                setCookie("Contacts", value - 0 + 1, expDays);
            } else {
                setCookie("Contacts", 1, expDays);
            }
            graphics();
        }
    </script>

</head>

<body>
    <div class="container">
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
        <div class="text" align="center">
            <h1>Загрузка гостевой книги</h1>
        </div>

        <form id="form" class="namingIsMyMiddleNameForm" method="post" enctype="multipart/form-data" action="{{ route('guestBookUpload.upload') }}">
            @csrf
            <div class="upload">
                <br><label for="file">Выберите файл</label>
                <br><input type="file" id="file" name="file">
                <br><br>
                <input type="submit" value="Отправить">
            </div>
        </form>
    </div>
</body>

</html>
