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
        <link rel="icon" type="image/x-icon" href="./public/images/favicon.ico">
        <script src="public/js/script.js"></script>
        <meta name="viewport"
              content="width=device-width, initial-scale=1">
        <!-- LINK NA FONT-->
        <link href="https://fonts.googleapis.com/css2?family=Titillium+Web:wght@300&display=swap" rel="stylesheet">
        <!-- LINK NA IKONY-->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    </head>

    <body>
        <div onresize="screen_resize()"> <!-- onresize , pre javascript-->
        <!--<div class="container"> -->
            <div class="top">
                <nav id="navbar">
                    <a href="?c=home" class="Plant">
                        <img src="./public/images/plant_head.png" alt="icon">
                    </a>
                    <div id="myLinks" class="navbar-nav-items">
                        <a href="?c=home">Domov</a>
                        <a href="?c=gallery">Rastliny</a>
                        <a href="?c=pot">Kvetinace</a>
                        <a href="?c=blog">FAQ</a>
                        <a href="#section-contact">Kontakt</a>
                        <a href="?c=review">Recenzie</a>
                        <?php if ($auth->isLogged()) { ?>
                            <a href="?c=auth&a=logout">Odlhásenie</a>
                        <?php }else { ?>
                        <a href="?c=auth&a=login">Prihlásenie</a>
                        <?php } ?>
                    </div>

                    <!--HAMBURGER , onclick - javascript -->
                    <a href="javascript:void(0);" class="Icon" onclick="myFunction()">
                        <i class="fa fa-bars"></i>
                    </a>
                </nav>
            </div>

            <div class="container-fluid mt-3">
                <div class="web-content">
                    <?= $contentHTML ?>
                </div>
            </div>

            <div class="section-contact" id="section-contact">
                <div class="content">
                    <p>Kontaktuj nás:</p>

                    <div class="personal-info">
                        <ul class="menu personal">
                            <li><i class="fa fa-mobile-phone"></i><a href="tel:0944673050">0944 673 050</a></li>
                            <li><i class="fa fa fa-envelope"></i><a href="mailto:anonym@gmail.com">plantplace@gmail.com</a></li>
                        </ul>
                        <ul class="menu social">
                            <li><a href="https://www.skype.com/en/"  class="social-icon" target="_blank"><i class="fa fa-skype" ></i></a></li>
                            <li><a href="https://www.facebook.com" class="social-icon"  target="_blank"><i class="fa fa-facebook-f"></i></a></li>
                            <li><a href="https://twitter.com"  class="social-icon" target="_blank"><i class="fa fa-twitter"></i></a></li>
                            <li><a href="https://www.youtube.com/"  class="social-icon" target="_blank"><i class="fa fa-youtube"></i></a></li>
                            <li><a href="https://www.twitch.tv"  class="social-icon" target="_blank"><i class="fa fa-twitch"></i></a></li>
                            <li><a href="https://www.instagram.com/" class="social-icon" target="_blank" ><i class="fa fa-instagram"></i></a></li>
                        </ul>
                    </div>
                </div>
            </div>

            <footer>
                <div class="content">
                    <p> design by Domi Papánová</p>
                </div>
            </footer>
        </div>
    </body>
</html>