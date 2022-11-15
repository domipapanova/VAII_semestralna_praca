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
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
            integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj"
            crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"
            integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3"
            crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.min.js"
            integrity="sha384-IDwe1+LCz02ROU9k972gdyvl+AESN10+x7tBKgc9I5HFtuNz0wWnPclzo6p9vxnk"
            crossorigin="anonymous"></script>
    <link rel="stylesheet" href="public/css/styl.css">
    <script src="public/js/script.js"></script>
</head>
<body>
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
                <a href="?c=review">Recenzie</a>
                <a href="?c=auth&a=logout">Odhlasenie</a>

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
</body>
</html>
