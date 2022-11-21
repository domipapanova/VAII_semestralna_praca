<?php /* @var \App\Models\Product[] $data */
/** @var \App\Core\IAuthenticator $auth */
?>


<?php if ($auth->isLogged()) { ?>
    <a href="?c=gallery&a=create"><button type="button" class="btn btn-outline-success"> Nový príspevok</button> </a>

<?php } ?>

<div class="album py-5 bg-light" >
        <div class="container">
            <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">
                <div class="col position-static">
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

                <?php foreach ($data as $row) { ?>
                <div class="col">
                    <div class="card shadow-sm">
                        <img src="./public/images/<?=$row->getPictureName()?>" alt="product image">

                        <div class="card-body">
                            <h5 clas="card-title"><?=$row->getProductName()?></h5>
                            <button type="button" id="buttonInfo" class="btn btn-outline-success">Viac info</button>
                            <p class="card-infoProduct" id="infoProduct" ><?=$row->getDescription()?></p>
                            <div class="d-flex justify-content-between align-items-center">

                                <small class="text-muted"><?=$row->getPrice()?>€</small>
                            </div>
                            <?php if ($auth->isLogged()) { ?>

                                <a href="?c=gallery&a=edit&id_product=<?= $row->getIdProduct() ?>"> <button type="submit" class="btn btn-outline-primary">Upraviť</button> </a>
                                <a href="?c=gallery&a=delete&id_product=<?= $row->getIdProduct() ?>"> <button type="submit" class="btn btn-outline-danger">Odstraniť</button> </a>
                            <?php } ?>
                        </div>
                    </div>
                </div>
                <?php } ?>
            </div>
        </div>
    </div>