<?php
/** @var Array $data */


use App\Models\Pot;

/** @var Pot $pot */
$pot = $data['pot'];
?>
<form name="newProduct" method="post" action="?c=pot&a=store" enctype="multipart/form-data">
    <input type="hidden" value="<?= $pot->getIdPot() ?>" name="id" >

    <div class="form-group">
        <label for="exampleFormControlInput1">Názov</label>
        <p id="name_input" hidden></p>
        <input type="text" class="form-control" id="exampleFormControlInput1" name="name" value="<?=$pot->getName();?>" required>
    </div>

    <div class="form-group">
        <label for="exampleFormControlInput1">Cena</label>
        <p id="price_input" hidden></p>
        <input type="text" pattern="^\d+(\.\d{1,2})?$" class="form-control" id="exampleFormControlInput1" name="price" value="<?=$pot->getPrice();?>" required>
    </div>

    <div class="form-group">
        <label for="exampleFormControlTextarea1">Popis produktu</label>
        <p id="describtion_input" hidden></p>
        <input class="form-control" id="exampleFormControlTextarea1" rows="3" name="describtion" value="<?=$pot->getDescription();?>"></input>
    </div>

    <div class="form-group">
        <label for="exampleFormControlTextarea1">Farba</label>
        <p id="color_input" hidden></p>
        <input class="form-control" id="exampleFormControlTextarea1" rows="3" name="color" value="<?=$pot->getColor();?>"></input>
    </div>

    <div class="form-group">
        <label for="exampleFormControlTextarea1">Materiál</label>
        <p id="material_input" hidden></p>
        <input class="form-control" id="exampleFormControlTextarea1" rows="3" name="material" value="<?=$pot->getMaterial();?>"></input>
    </div>

    <div class="form-group">
        <label for="exampleFormControlTextarea1">Veľkosť</label>
        <p id="size_input" hidden></p>
        <input type="text" pattern="^\d+(\.\d{1,2})?$" class="form-control" id="exampleFormControlTextarea1" rows="3" name="size" value="<?=$pot->getSize();?>"></input>
    </div>

    <div class="form-group">
        <label for="exampleFormControlFile1">Vyber obrázok</label>
        <input type="file" class="form-control-file" id="exampleFormControlFile1" name="picture" value="<?=$pot->getPictureName();?>">
    </div>

    <div class="form-group">
        <button type="submit" class="btn btn-primary btn-sm" > Pridať </button>
    </div>
</form>