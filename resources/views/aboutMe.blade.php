<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta http-equiv="content-type" content="text/html; charset=UTF-8" />
    <title>Обо мне. Скороходова</title>

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
            var keyAboutMe = localStorage.getItem("AboutMe");

            if (keyAboutMe != NaN) {
                localStorage.setItem("AboutMe", Number(keyAboutMe) + 1);
            } else {
                localStorage.setItem("AboutMe", 1);
            }

            var value = getCookie("AboutMe");
            var expDays = 7;

            if (value != NaN) {
                setCookie("AboutMe", value - 0 + 1, expDays);
            } else {
                setCookie("AboutMe", 1, expDays);
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
        <h2>About me</h2>
    </div>

    <div>
        <p>
            a)
            <I>Advertisements want to persuade us to buy particular products How do they do it?

                Let's imagine ...You're watching TV. It's a hot evening: You feel thirsty. You see an advert for a refreshing drink. You see people looking cool and relaxed. You notice the name of the refreshing drink because you think it could be useful for you to satisfy your thirst.

                Advertisers study how people learn so that they can 'teach' them to respond to their advertising. They want us to be interested, to try something, and then to do it again. These are the elements of learning: interest, experience and repetition. If an advert can achieve this, it is successful. If an advert works well, the same technique can be used to advertise different things. So, for example, in winter if the weather is cold and you see a family having a warming cup of tea and feeling cosy, you may be interested and note the name of the tea ... Here the same technique is being used as with the cool, refreshing drink.

                If advertisements are to he learned, there is a need for lots of repetition. But advertisers have to be careful because too much repetition can result in consumer tiredness and the message may fall on'deal ears'.


            <P align="center">
                <img src="/photos/cat.jpg" class="round" width=500>

                <P align="center">Dinosaurs </p>


                <I>Consumers learn to generalize from what they have learned. So advertisers sometimes copy a highly successful idea that has been well learned by consumers. For example, the highly successful 'Weston Tea Country' advertising for different tea has led to 'DAEWOO Country' for automobile dealers and 'Cadbury Country' for chocolate bars.
                <BR>


    </div>
</body>

</html>
