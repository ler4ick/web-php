<!DOCTYPE html>
<html>

<head>
    <meta http-equiv="charset" content="windws-1251">
    <title>Учеба. Скороходова</title>

    <script src="https://kit.fontawesome.com/91955f65d7.js" crossorigin="anonymous"></script>

    @vite(['resources/css/main.css', 'resources/css/education.css', 'resources/js/jsHobbies.js', 'resources/js/handlers.js', 'resources/js/cookies.js', 'resources/js/currentDate.js'])


    <style>
        table {
            width: 600px;
            border: 1px solid black;
            margin-left: 8cm;
        }

        td {
            text-align: center;

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
            var key = localStorage.getItem("Study");

            if (key != NaN) {
                localStorage.setItem("Study", Number(key) + 1);
            } else {
                localStorage.setItem("Study", 1);
            }

            var value = getCookie("Study");
            var expDays = 7;

            if (value != NaN) {
                setCookie("Study", value - 0 + 1, expDays);
            } else {
                setCookie("Study", 1, expDays);
            }
            graphics();
        }
    </script>

</head>

<body>
    <div class="header-menu">
        <nav>
            <ul>
                <li id="Main">
                    <a href="main">
                        <i id="MainI" class=""></i>Главная</a>
                </li>
                <li id="AboutMe">
                    <a href="about_me">
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
                    <a href="album">
                        <i id="PhotoalbumI"></i>Фотоальбом</a>
                </li>
                <li id="Contacts">
                    <a href="contact">
                        <i id="ContactsI"></i>Контакты</a>
                </li>
                <li id="Task">
                    <a href="test">
                        <i id="TaskI"></i>Тест по дисциплине</a>
                </li>
                <li id="History">
                    <a href="history">
                        <i id="HistoryI"></i>История</a>
                </li>
                <li>
                    <div id="date">
                        <script>
                            clockTick()
                        </script>
                    </div>
                </li>
            </ul>
        </nav>
    </div>

    <div class="header1">
        <h2>Учеба</h2>
    </div>

    <div class="header" align=center>
        <h1> ��������������� ��������������� �����������</h1>
        <h2> ������� �������������� ������</h2>
        <h3>�������� ��������� ��������� � 1-�� �� 4-�� �������</h3>
    </div>

    <div class="table">
        <table border="1" width=600>

            <thead>
                <tr>
                    <!-- table data cell -->
                    <th rowspan="3">�</th>
                    <th rowspan="3">����������</th>
                    <th colspan="12">����� � ������ <br> (������, ���.���, �����.���)</th>
                </tr>
                <tr>
                    <!-- table data cell -->
                    <td colspan="6"> 1 ����</td>
                    <td colspan="6"> 2 ����</td>

                </tr>
                <tr>
                    <!-- table data cell -->
                    <td colspan="3"> 1 ���</td>
                    <td colspan="3"> 2 ���</td>
                    <td colspan="3"> 3 ���</td>
                    <td colspan="3"> 4 ���</td>
                </tr>
            </thead>

            <tfoot></tfoot>

            <tbody>
                <!-- table row -->

                <tr>
                    <td>1</td>
                    <td>��������</td>

                    <td></td>
                    <td></td>
                    <td></td>

                    <td></td>
                    <td></td>
                    <td></td>

                    <td>1</td>
                    <td>0</td>
                    <td>1</td>

                    <td></td>
                    <td></td>
                    <td></td>
                </tr>

                <tr>
                    <td>2</td>
                    <td>������ ����������</td>

                    <td>3</td>
                    <td>0</td>
                    <td>3</td>

                    <td>3</td>
                    <td>0</td>
                    <td>3</td>

                    <td>2</td>
                    <td>0</td>
                    <td>2</td>

                    <td></td>
                    <td></td>
                    <td></td>
                </tr>

                <tr>
                    <td>3</td>
                    <td>������� ���� � �������� ����</td>

                    <td>1</td>
                    <td>0</td>
                    <td>2</td>

                    <td></td>
                    <td></td>
                    <td></td>

                    <td></td>
                    <td></td>
                    <td></td>

                    <td></td>
                    <td></td>
                    <td></td>

                    <tr>
                        <td>4</td>
                        <td>������ ���������� ����������</td>

                        <td>2</td>
                        <td>0</td>
                        <td>1</td>

                        <td>3</td>
                        <td>0</td>
                        <td>2</td>

                        <td></td>
                        <td></td>
                        <td></td>

                        <td></td>
                        <td></td>
                        <td></td>
                    </tr>
                </tr>

                <tr>
                    <td>5</td>
                    <td>������ ���������������� � ��������������� �����</td>

                    <td>3</td>
                    <td>2</td>
                    <td>0</td>

                    <td>3</td>
                    <td>3</td>
                    <td>0</td>

                    <td>0</td>
                    <td>0</td>
                    <td>1</td>

                    <td></td>
                    <td></td>
                    <td></td>
                </tr>

                <tr>
                    <td>6</td>
                    <td>������ ��������</td>

                    <td></td>
                    <td></td>
                    <td></td>

                    <td></td>
                    <td></td>
                    <td></td>

                    <td>1</td>
                    <td>0</td>
                    <td>0</td>

                    <td></td>
                    <td></td>
                    <td></td>
                </tr>

                <tr>
                    <td>7</td>
                    <td>������ ������������ � �������������� ����������</td>

                    <td></td>
                    <td></td>
                    <td></td>

                    <td></td>
                    <td></td>
                    <td></td>

                    <td>3</td>
                    <td>1</td>
                    <td>0</td>

                    <td></td>
                    <td></td>
                    <td></td>
                </tr>

                <tr>
                    <td>8</td>
                    <td>������</td>

                    <td>2</td>
                    <td>2</td>
                    <td>0</td>

                    <td>2</td>
                    <td>2</td>
                    <td>0</td>

                    <td>2</td>
                    <td>1</td>
                    <td>0</td>

                    <td></td>
                    <td></td>
                    <td></td>
                </tr>

                <tr>
                    <td>9</td>
                    <td>������ �������������� � �����������</td>

                    <td></td>
                    <td></td>
                    <td></td>

                    <td></td>
                    <td></td>
                    <td></td>

                    <td>2</td>
                    <td>1</td>
                    <td>1</td>

                    <td></td>
                    <td></td>
                    <td></td>
                </tr>

                <tr>
                    <td>10</td>
                    <td>��������� ������ � �����������</td>

                    <td></td>
                    <td></td>
                    <td></td>

                    <td></td>
                    <td></td>
                    <td></td>

                    <td>2</td>
                    <td>2</td>
                    <td>0</td>

                    <td>0</td>
                    <td>0</td>
                    <td>1</td>
                </tr>

                <tr>
                    <td>11</td>
                    <td>������ ����������� ��������</td>

                    <td></td>
                    <td></td>
                    <td></td>

                    <td></td>
                    <td></td>
                    <td></td>

                    <td>1</td>
                    <td>1</td>
                    <td>0</td>

                    <td>2</td>
                    <td>1</td>
                    <td>1</td>
                </tr>

            </tbody>

        </table>
    </div>


</body>

</html>
