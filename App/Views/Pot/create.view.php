<?php
/** @var Array $data */


use App\Models\Pot;

/** @var Pot $pot */
$pot = $data['pot'];
?>
<script src="public/js/pot_script.js"></script>

<form name="newPot" method="post" action="?c=pot&a=store" enctype="multipart/form-data" onsubmit="return validatePot()">
    <h8>* povinné položky</h8>
    <input type="hidden" value="<?= $pot->getIdPot() ?>" id="id" name="id" >

    <div class="form-group">
        <label for="exampleFormControlInput1">* Názov</label>
        <p id="name_input" hidden></p>
        <input type="text" maxlength="255" class="form-control" id="name" name="name" value="<?=$pot->getName();?>" required>
    </div>

    <div class="form-group">
        <label for="exampleFormControlInput1">* Cena</label>
        <p id="price_input" hidden></p>
        <input type="text" pattern="^\d+(\.\d{1,2})?$" class="form-control" id="price" name="price" value="<?=$pot->getPrice();?>" required>
    </div>

    <div class="form-group">
        <label for="exampleFormControlTextarea1">Popis produktu</label>
        <p id="describtion_input" hidden></p>
        <input type="text" class="form-control" maxlength="1000" id="describtion" rows="3" name="describtion" value="<?=$pot->getDescription();?>"></input>
    </div>

    <div class="form-group">
        <label for="exampleFormControlTextarea1">Farba</label>
        <p id="color_input" hidden></p>
        <input type="text" class="form-control" maxlength="30" id="color" rows="3" name="color" value="<?=$pot->getColor();?>"></input>
    </div>

    <div class="form-group">
        <label for="exampleFormControlTextarea1">Materiál</label>
        <p id="material_input" hidden></p>
        <input type="text" class="form-control" maxlength="50" id="material" rows="3" name="material" value="<?=$pot->getMaterial();?>"></input>
    </div>

    <div class="form-group">
        <label for="exampleFormControlTextarea1">Veľkosť</label>
        <p id="size_input" hidden></p>
        <input type="text" pattern="^\d+(\.\d{1,2})?$" class="form-control" id="size" rows="3" name="size" value="<?=$pot->getSize();?>"></input>
    </div>

    <div class="form-group">
        <p id="picture_input" hidden></p>
        <label for="exampleFormControlFile1">Vyber obrázok</label>
        <input type="file"  class="form-control-file" id="pot_picture" name="pot_picture" value="<?=$pot->getPictureName();?>" onchange="validatePot()">
    </div>

    <div class="form-group">
        <button type="submit" class="btn btn-primary btn-sm" > Pridať </button>
    </div>
</form>