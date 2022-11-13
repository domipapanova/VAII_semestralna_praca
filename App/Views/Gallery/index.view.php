<?php /* @var \App\Models\Product[] $data */ ?>

<div class="album py-5 bg-light">
        <div class="container">
            <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">
                <div class="col position-static">
                    <div class="card shadow-sm"  >
                        <img src="./public/images/svokryne.webp" alt="product image">
                        <div class="card-body">
                            <h5 clas="card-title">Sansevieria trifasciata ‘Laurentii’</h5>
                            <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
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
                            <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
                            <div class="d-flex justify-content-between align-items-center">

                                <small class="text-muted"><?=$row->getPrice()?>€</small>
                            </div>
                        </div>
                    </div>
                </div>
                <?php } ?>
            </div>
        </div>
    </div>