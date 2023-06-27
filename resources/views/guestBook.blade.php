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
        <div class="header1">
            <h2>Гостевая книга</h2>
        </div>
        <div class="namingIsMyMiddleNameForm">
            <form id="form" method="post" action="{{ route('guestBook.store') }}">
                @csrf
            <div class = "guestBookInputForm">
                <div class="guestBook">
                    <label><p>Фамилия</p></label>
                    <input type="text" name="surname" required>
                </div>
                <div class="guestBook">
                    <label><p>Имя</p></label>
                    <input type="text" name="name" required>
                </div>
                <div class="guestBook">
                    <label><p>Отчество</p></label>
                    <input type="text" name="patronymic" required>
                </div>
                <div class="guestBook">
                    <label><p>E-mail</p></label>
                    <input type="email" name="email" required>
                </div>
                <div class="guestBook">
                    <label><p>Текст отзыва</p></label>
                    <textarea name="message" rows="5" required></textarea>
                </div>
                <div class="guestBookButton" style="height: 30px">
                    <input type="submit" value="Отправить">
                </div>
            </div>
            </form>

            <table class="messageTable">
                <thead>
                <tr>
                    <th>Дата</th>
                    <th>ФИО</th>
                    <th>E-mail</th>
                    <th>Текст отзыва</th>
                </tr>
                </thead>
                <tbody>
                @foreach($messages as $message)
                    <tr>
                        <td>{{ $message['date'] }}</td>
                        <td>{{ $message['name'] }}</td>
                        <td>{{ $message['email'] }}</td>
                        <td>{{ $message['message'] }}</td>
                    </tr>
                @endforeach
                </tbody>
            </table>
            <div class="namingIsMyMiddleNamePagination">
                {{ $messages->links() }}
            </div>
        </div>
    </div>
</body>

</html>
