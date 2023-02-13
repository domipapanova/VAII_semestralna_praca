<?php /* @var \App\Models\Article[] $data */
/** @var \App\Core\IAuthenticator $auth */

?>
<link rel="stylesheet" href="public/css/blogStyle.css">
<script src="public/js/blog_script.js"></script>

<section id="blog" >
    <div class="content">
        <!--blog header-->
        <div class="blog-header">
            <h2>Najnovšie</h2>
            <?php if ($auth->isLogged() && $auth->getLoggedUserId() == \App\Config\Configuration::ADMIN) { ?>
                <form class="createArticle" action="?c=blog&a=create" method="post">
                    <button  type="submit" class="btn btn-success">Nový príspevok</button>
                </form>
            <?php } ?>
        </div>
        <!-- articles -->
        <?php foreach (array_reverse($data) as $row) { ?>
        <div class="clanok">
            <div class="article-body">
                <div class="text">
                    <h2>
                        <a href="<?=$row->getLinks() ?>">
                            <?=$row->getTitle() ?>
                        </a>
                    </h2>
                    <p><?=$row->getText() ?></p>
                </div>
                <div class="obr">
                    <p> <img src="./public/images/<?=$row->getPictureName() ?>" alt="Generic placeholder image"></p>
                </div>
            </div>

            <?php if ($auth->isLogged()&& $auth->getLoggedUserId() == \App\Config\Configuration::ADMIN) { ?>
            <div class="edit-buttons">
                <form class="buttonFrom" action="?c=blog&a=edit" method="post">
                    <input type="hidden" name="id_article" value="<?=$row->getIdArticle() ?>">
                    <button  type="submit" class="btn btn-primary">Upraviť</button>
                </form>
                <button  class="btn btn-danger"  onclick="deleteConfrimation(<?=$row->getIdArticle()?>)" >Odstraniť</button>
            </div>
            <?php } ?>
        </div>
        <?php } ?>
    </div>
</section>

<!-- delete confrim modal-->
<div id="delete-confrim" class="modal">
    <form class="modal-content"  method="post" >
        <div class="container">
            <h1>Vymazať článok</h1>
            <p>Vážne si prajete odstrániť tento článok?</p>
            <div class="clearfix">
                <button type="button" onclick="document.getElementById('delete-confrim').style.display='none'"  class="btn btn-secondary">Zrušiť</button>
                <button type="submit"  onclick="document.getElementById('delete-confrim').style.display='none'" class="btn btn-danger">Odstraniť</button>
            </div>
        </div>
    </form>
</div>

<!-- FAQ part -->
<div class="container px-4 py-5" id="hanging-icons">
    <h1 class="pb-2 border-bottom">Časté otázky</h1>
    <div class="row g-4 py-5 row-cols-1 row-cols-lg-3">
        <div class="col d-flex align-items-start">
            <div class="icon-square text-bg-light d-inline-flex align-items-center justify-content-center fs-4 flex-shrink-0 me-3">
            </div>
            <div>
                <h3 class="fs-2">Doprava</h3>
                <p>Samozrejme! Zasielky posielame pomocou Slovenskej Pošty alebo Zasielkovne.</p>
            </div>
        </div>
        <div class="col d-flex align-items-start">
            <div class="icon-square text-bg-light d-inline-flex align-items-center justify-content-center fs-4 flex-shrink-0 me-3">
            </div>
            <div>
                <h3 class="fs-2">Je vhodne posielat rastliny postou ?</h3>
                <p>Bez obáv! Rastlinky šetrne zabalíme a pribalíme vyhrevné teleso.</p>
            </div>
        </div>
        <div class="col d-flex align-items-start">
            <div class="icon-square text-bg-light d-inline-flex align-items-center justify-content-center fs-4 flex-shrink-0 me-3">
            </div>
            <div>
                <h3 class="fs-2"> Príjmate reklámacie?</h3>
                <p>Bez problémov. Zásielku môžte reklamovať do 2 tyždňov</p>
            </div>
        </div>
    </div>
</div>

<!-- founders section-->
<section id="section-foundres">
    <div class="content">
        <h2>Zakladatelia našej predajne</h2>
        <div class="text">
            <div class="box">
                <p><img src="./public/images/f1.jpg" alt="Instant Image"></p>
                <div class="position-text">
                    <p class="name">Damián Kukurica</p>
                </div>
            </div>

            <div class="box">
                <p> <img src="./public/images/f3.jpg" alt="Instant Image"></p>
                <div class="position-text">
                    <p class="name">Dominika Papánová</p>
                </div>
            </div>

            <div class="box">
                <p><img src="./public/images/f2.jpg" alt="Instant Image"></p>
                <div class="position-text">
                    <p class="name">Hana Mrkvičková</p>
                </div>
            </div>
        </div>
    </div>
</section>

