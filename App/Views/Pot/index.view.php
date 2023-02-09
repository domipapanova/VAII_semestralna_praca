<?php /* @var \App\Models\Pot[] $data */
/** @var \App\Core\IAuthenticator $auth */
?>
<script src="public/js/pot_script.js"></script>
<link rel="stylesheet" href="public/css/galeryStyle.css">

<div class="gallery-top"  id="pots" >
    <div class=product-titles" id="pots-title">
        <h1> Kvetináče</h1>
    </div>

    <?php if ($auth->isLogged() && $auth->getLoggedUserId() == \App\Config\Configuration::ADMIN) { ?>
        <a class="createProduct" href="?c=pot&a=create"><button type="button" class="btn btn-outline-success"> Nový príspevok</button> </a>
    <?php } ?>
</div>

<div class="infoProducts">
    <p> Keramické a plastové jednofarebné kvetináče vhodné na izbové rastliny. Kovové a terakotové kvetináče so stojanom sú štýlovým interiérovým doplnkom. Skvelo oživia moderný interiér. Keramické a terakotové kvetináče s podmiskou s jednoduchými aj rôznymi výnimočnými dizajnami. Vhodné na izbové rastliny.</p>
</div>

<div class="album py-5 bg-light" >
    <div class="container">
        <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3" id="gallery-body">

    <?php foreach ($data as $pot) { ?>
        <div class="col">
            <div class="card shadow-sm">
                <img src="./public/images/<?=$pot->getPictureName()?>" alt="product image">

    <div class="card-body">
        <h5 class="card-title"><?=$pot->getName()?></h5>
        <ul class="pot-info">
            <li><?=$pot->getColor()?></li>
            <li><?=$pot->getMaterial()?></li>
            <li><?=$pot->getSize()?> cm</li>
        </ul>

        <button type="button" id="buttonInfo" class="btn btn-outline-success" onclick="buttonClick()">Viac info</button>
        <p class="card-infoProduct" id="infoProduct" ><?=$pot->getDescription()?></p>
        <div class="d-flex justify-content-between align-items-center">
            <small class="text-muted"><?=$pot->getPrice()?>€</small>
        </div>

        <?php if ($auth->isLogged()&& $auth->getLoggedUserId() == \App\Config\Configuration::ADMIN) { ?>
            <a href="?c=pot&a=edit&id_pot=<?= $pot->getIdPot() ?>">
                <button type="submit" class="btn btn-outline-primary"  >Upraviť</button>
            </a>
            <button  class="btn btn-outline-danger"  onclick="deleteConfrimation(<?=$pot->getIdPot()?>)" >Odstraniť</button>
        <?php } ?>
    </div>
    </div>
    </div>

<?php } ?>

            <div id="delete-confrim" class="modal">
                <form class="modal-content"  method="post" >
                    <div class="container">
                        <h1>Vymazať produkt</h1>
                        <p>Vážne si prajete odstrániť tento produkt?</p>

                        <div class="clearfix">
                            <button type="button" onclick="document.getElementById('delete-confrim').style.display='none'"  class="btn btn-secondary">Zrušiť</button>
                            <button type="submit"  onclick="document.getElementById('delete-confrim').style.display='none'" class="btn btn-danger">Odstraniť</button>
                        </div>
                    </div>
                </form>
            </div>