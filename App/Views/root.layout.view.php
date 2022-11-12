<?php
/** @var string $contentHTML */
/** @var \App\Core\IAuthenticator $auth */
?>
<!DOCTYPE html>
<html lang="sk">
<head>
    <title><?= \App\Config\Configuration::APP_NAME ?></title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3"
            crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
            integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj"
            crossorigin="anonymous"></script>
    <link rel="stylesheet" href="public/css/styl.css">
    <script src="public/js/script.js"></script>
    <meta name="viewport"
          content="width=device-width, initial-scale=1">
    <!-- LINK NA FONT-->
    <link href="https://fonts.googleapis.com/css2?family=Titillium+Web:wght@300&display=swap" rel="stylesheet">
    <!-- LINK NA IKONY-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <title>PlantPlace</title>
</head>
<div onresize="screen_resize()"> <!-- onresize , pre javascript-->
<!--<div class="container"> -->
    <section id="top">
        <nav id="navbar">
            <a href="domov.html" class="Plant">
                <img src="./public/images/plant_head.png" alt="icon">
            </a>
            <div id="myLinks" class="navbar-nav-items">
                <a href="?c=home">Domov</a>
                <a href="?c=gallery">Rastliny</a>
                <a href="?c=gallery">Kvetinace</a>
                <a href="?c=blog">FAQ</a>
                <a href="#section-contact">Kontakt</a>
                <a href="?c=login">Prihlásenie</a>


            </div>

            <!--HAMBURGER , onclick - javascript -->
            <a href="javascript:void(0);" class="Icon" onclick="myFunction()">
                <i class="fa fa-bars"></i>
            </a>
        </nav>
    </section>

<div class="container-fluid mt-3">
    <div class="web-content">
        <?= $contentHTML ?>
    </div>
</div>

    <footer>
        <div class="content">
            <p> design by PlantLover</p>
            <ul class="menu nav-footer">
                <li><a href="?c=home">Domov</a></li>
                <li><a href="?c=gallery">Rastlinky</a></li>
                <li><a href="?c=gallery">Kvetinace</a></li>
                <li><a href="?c=blog">FAQ</a></li>
                <li><a href="#section-contact">Kontakt</a></li>
            </ul>
        </div>
    </footer>
</div>
<script>
    function screen_resize() {
        var w = parseInt(window.innerWidth);
        var x = document.getElementById("myLinks");
        if(w > 576) {
            x.style.display = "flex"; /* vedla seba linky*/
        }  else {
            x.style.display = "none"; /* schovaju sa linky*/
        }

    }
    /* block  zjavia sa pod sebou linky*/
    function myFunction() {
        var x = document.getElementById("myLinks"); /* ziskam podla id  MyLinks*/
        if (x.style.display === "block") {  /*schovas ponuku*/
            x.style.display = "none";

        } else {
            x.style.display = "block"; /*zobrazit ponuku*/
        }
    }
</script>
</body>
</html>
