<?php /* @var \App\Models\Product[] $data */
/** @var \App\Core\IAuthenticator $auth */
?>
<script src="public/js/gallery_script.js"></script>
<link rel="stylesheet" href="public/css/galeryStyle.css">

<div class="search-bar">
    <form>
        <div class="input-group">
            <input type="search" id="serachBar" class="form-control rounded" placeholder="Najdite rastlinu, kvetináč..." aria-label="Search" aria-describedby="search-addon"  onkeyup="showResult(this.value)"/>
        </div>
    </form>
</div>
<div class="gallery-top">
    <div class=product-titles"><h1> Rastlinky</h1></div>

    <?php if ($auth->isLogged()) { ?>
        <a class="createProduct" href="?c=gallery&a=create"><button type="button" class="btn btn-outline-success"> Nový príspevok</button> </a>
    <?php } ?>


</div>


<div class="album py-5 bg-light" >

        <div class="container">
            <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3" id="gallery-body">
           <!--     <div class="col position-static">
                    <div class="card shadow-sm"  >
                        <img src="./public/images/svokryne.webp" alt="product image">
                        <div class="card-body">
                            <h5 clas="card-title">Sansevieria trifasciata ‘Laurentii’</h5>
                            <button type="button" id="buttonInfo" class="btn btn-outline-success">Viac info</button>
                            <p class="card-infoProduct">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
                            <div class="d-flex justify-content-between align-items-center">

                                <small class="text-muted">13.99€</small>
                            </div>
                        </div>

                    </div>
                </div>
!-->
                <?php foreach ($data as $row) { ?>
                <div class="col">
                    <div class="card shadow-sm">
                        <img src="./public/images/<?=$row->getPictureName()?>" alt="product image">

                        <div class="card-body">
                            <h5 clas="card-title"><?=$row->getProductName()?></h5>
                            <button type="button" id="buttonInfo" class="btn btn-outline-success" onclick="buttonClick()">Viac info</button>
                            <p class="card-infoProduct" id="infoProduct" ><?=$row->getDescription()?></p>
                            <div class="d-flex justify-content-between align-items-center">

                                <small class="text-muted"><?=$row->getPrice()?>€</small>
                            </div>
                            <?php if ($auth->isLogged()) { ?>

                                <a href="?c=gallery&a=edit&id_product=<?= $row->getIdProduct() ?>"> <button type="submit" class="btn btn-outline-primary"  >Upraviť</button> </a>

                                    <button  class="btn btn-outline-danger"  onclick="document.getElementById('delete-confrim').style.display='block'">Odstraniť</button>
                            <?php } ?>
                        </div>
                    </div>
                </div>
                <?php } ?>
            </div>
        </div>
    </div>

<div id="delete-confrim" class="modal">
    <form class="modal-content"  method="post" action="?c=gallery&a=delete&id_product=<?= $row->getIdProduct() ?>">
        <div class="container">
            <h1>Vymazať produkt</h1>
            <p>Vážne si prajete odstrániť tento proukt?</p>

            <div class="clearfix">
                <button type="button" onclick="document.getElementById('delete-confrim').style.display='none'"  class="btn btn-secondary">Zrušiť</button>
                <button type="submit"  onclick="document.getElementById('delete-confrim').style.display='none'" class="btn btn-danger"">Odstraniť</button>
            </div>
        </div>
    </form>
</div>

