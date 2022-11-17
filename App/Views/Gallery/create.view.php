<?php
/** @var Array $data */


use App\Models\Product;

/** @var Review $product */
$product = $data['product'];
?>
<form name="newProduct" method="post" action="?c=gallery&a=store" onsubmit="return validateProduct()">
    <input type="hidden" value="<?= $product->getIdProduct() ?>" name="id" >

    <div class="form-group">
        <label for="exampleFormControlInput1">Názov</label>
        <p id="nazov_input" hidden></p>
        <input type="text" class="form-control" id="exampleFormControlInput1" name="nazov" value="<?=$product->getProductName();?>">
    </div>
    <div class="form-group">
        <label for="exampleFormControlInput1">Cena</label>
        <p id="cena_input" hidden></p>
        <input type="text" class="form-control" id="exampleFormControlInput1" name="cena" value="<?=$product->getPrice();?>">
    </div>

   <!-- <div class="form-group">
        <label for="exampleFormControlSelect1">Vyber kategoriu</label>
        <select class="form-control" id="exampleFormControlSelect1" name="kategoria">
            <option>Rastlina</option>
            <option>Kvetinac</option>
        </select>
    </div> -->

    <div class="form-group">
        <label for="exampleFormControlTextarea1">Popis produktu</label>
        <p id="popis_input" hidden></p>

        <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="popis" value="<?=$product->getDescription();?>"></textarea>
    </div>

    <div class="form-group">
        <label for="exampleFormControlFile1">Vyber obrázok</label>
        <input type="file" class="form-control-file" id="exampleFormControlFile1" name="obrazok" value="<?=$product->getPictureName();?>>
    </div>
    <div class="form-group">
        <button type="submit" class="btn btn-primary btn-sm" > Pridať </button>
    </div>
</form>