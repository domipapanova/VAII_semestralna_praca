<?php /* @var \App\Models\Product[] $data */
/** @var \App\Core\IAuthenticator $auth */

?>
<script src="public/js/gallery_script.js"></script>
<link rel="stylesheet" href="public/css/galeryStyle.css">

<div class="search-bar">
    <form>
        <div class="input-group">
            <input type="search" id="serachBar" class="form-control rounded" placeholder="Najdite rastlinu, kvetináč..." aria-label="Search"  onkeyup="showResult(this.value)">
        </div>
    </form>
</div>

<div class="gallery-top">
    <div class="product-titles">
        <h1> Rastlinky</h1>
    </div>

    <?php if ($auth->isLogged() && $auth->getLoggedUserId() == \App\Config\Configuration::ADMIN) { ?>
        <!--<a class="createProduct" href="?c=gallery&a=create">
            <button type="button" class="btn btn-outline-success"> Nový príspevok</button>
        </a>-->

        <form class="createProduct" action="??c=gallery&a=create" method="post">
            <button  type="submit" class="btn btn-outline-success">Nový príspevok</button>
        </form>

    <?php } ?>

</div>

<div class="infoProducts">
    <p>Izbové rastliny prinášajú radosť, zútulnia váš domov či zlepšia ovzdušie. V našej ponuke nájdete tie najkvalitnejšie izbové rastliny, ktoré vám budú robiť radosť. Okrem bežných druhov si na svoje prídu aj zberatelia vzácnych kúskov. Rastliny bezpečne zabalíme a doručíme až k vám domov.</p>
</div>

<div class="album py-5 bg-light" >
        <div class="container">
            <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3" id="gallery-body">

                <?php foreach ($data as $row) { ?>
                <div class="col">
                    <div class="card shadow-sm">
                        <img src="./public/images/<?=$row->getPictureName()?>" alt="product image">

                        <div class="card-body">
                            <h5><?=$row->getProductName()?></h5>
                            <!--<button type="button" id="buttonInfo" class="btn btn-outline-success" >Viac info</button>-->
                            <button type="button"  class="btn btn-outline-success" >Viac info</button>
                            <!--<p class="card-infoProduct" id="infoProduct" ><?=$row->getDescription()?></p>-->
                            <p class="card-infoProduct"  ><?=$row->getDescription()?></p>

                            <div class="d-flex justify-content-between align-items-center">

                                <small class="text-muted"><?=$row->getPrice()?>€</small>
                            </div>

                            <?php if ($auth->isLogged()&& $auth->getLoggedUserId() == \App\Config\Configuration::ADMIN) { ?>
                            <div class="edit-buttons">
                               <!-- <a href="?c=gallery&a=edit&id_product=<?= $row->getIdProduct() ?>">
                                    <button type="submit" class="btn btn-outline-primary"  >Upraviť</button>
                                </a>-->
                                <form class="buttonFrom" action="?c=gallery&a=edit" method="post">
                                    <input type="hidden" name="id_product" value="<?= $row->getIdProduct() ?>">
                                    <button  type="submit" class="btn btn-outline-primary">Upraviť</button>
                                </form>
                                <button  class="btn btn-outline-danger"  onclick="deleteConfrimation(<?=$row->getIdProduct()?>)" >Odstraniť</button>
                            </div>
                            <?php } ?>

                        </div>
                    </div>
                </div>
                <?php } ?>
            </div>

        </div>
</div>


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

