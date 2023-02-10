<?php
use App\Models\Product;

/** @var Array $data */
/** @var Review $product */

$product = $data['product'];
?>
<script src="public/js/gallery_script.js"></script>
<link rel="stylesheet" href="public/css/galeryStyle.css">

<h8>* povinné položky</h8>

<form name="newProduct" method="post" action="?c=gallery&a=store" enctype="multipart/form-data" onsubmit="return validateProduct()">
    <input type="hidden" value="<?= $product->getIdProduct() ?>" name="id" >

    <div class="form-group">
        <label for="exampleFormControlInput1">*Názov</label>
        <p id="nazov_input" hidden></p>
        <input type="text" class="form-control" id="nazov" name="nazov" value="<?=$product->getProductName();?>" onblur="validateProduct()">
    </div>
    <div class="form-group">
        <label for="exampleFormControlInput1">*Cena</label>
        <p id="cena_input" hidden></p>
        <input type="text" class="form-control" id="cena" name="cena" value="<?=$product->getPrice();?>" onblur="validateProduct()">
    </div>

    <div class="form-group">
        <label for="exampleFormControlTextarea1">Popis produktu</label>
        <p id="popis_input" hidden></p>
        <input class="form-control" id="popis" rows="3" name="popis" value="<?=$product->getDescription();?>" onblur="validateProduct()"></input>
    </div>

    <div class="form-group">
        <p id="picture_input" hidden></p>
        <label for="exampleFormControlFile1">Vyber obrázok</label>
        <input type="file" class="form-control-file" id="picture" name="picture" value="<?=$product->getPictureName();?>" onchange="validateProduct()">
    </div>
    <div class="form-group">
        <button type="submit" class="btn btn-primary btn-sm" > Pridať </button>
    </div>
</form>