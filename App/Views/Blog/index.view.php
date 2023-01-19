<?php /* @var \App\Models\Article[] $data */
/** @var \App\Core\IAuthenticator $auth */

?>
<link rel="stylesheet" href="public/css/blogStyle.css">


<section id="blog" >
    <div class="content">
        <h1>Najnovšie</h1>
        <?php foreach (array_reverse($data) as $row) { ?>
        <div class="clanok">
            <div class="article-body">
                <div class="text">
                    <h2> <a href="<?=$row->getLinks() ?>"><?=$row->getTitle() ?></a></h2>
                    <p><?=$row->getText() ?></p>
                </div>
                <div class="obr">
                    <p> <img src=".\public\images\<?=$row->getPictureName() ?>" alt="Generic placeholder image"></p>
                </div>
            </div>
        </div>
        <?php } ?>
    </div>
</section>

<section id="section-about" >
    <div class="content">
        <div class="clanok">
            <h1>O nás</h1>

        </div>
            <div class="text">
                <h2>Doprava domov</h2>
                <h3>Samozrejme!</h3>
                <p> Zasielky posielame pomocou Slovenskej Posty alebo Zasielkovne.</p>
            </div>

            <div class="text">
                <h2>Je vhodne posielat rastliny postou ?</h2>
                <h3>Bez obav</h3>
                <p> Rastlinky setrne zabalime a pribalime vyhrevne teleso.</p>
            </div>

            <div class="text">
                <h2>Prijmate reklamacie?</h2>
                <h3>Bez problemov</h3>
                <p>Zasielku mozte reklamovat do 2 tyzdnov</p>
            </div>

        </div>
    </div>
</section>


<section id="section-foundres">
    <div class="content ">
        <h1>Zakladatelia našej predajne</h1>
        <div class="text">

            <div class="box">
                <p><img src=".\public\images\f1.jpg" alt="Instant Image"></p>
                <div class="position-text">
                    <p class="name">Damián Kukurica</p>
                </div>
            </div>

            <div class="box">
                <p> <img src=".\public\images\f3.jpg" alt="Instant Image"></p>
                <div class="position-text">
                    <p class="name">Dominika Papánová</p>
                </div>
            </div>

            <div class="box">
                <p><img src=".\public\images\f2.jpg" alt="Instant Image"></p>
                <div class="position-text">
                    <p class="name">Hana Mrkvičková</p>
                </div>
            </div>
        </div>
    </div>
</section>

