<?php
/** @var Array $data */


use App\Models\Pot;

/** @var Review $pot */
$pot = $data['pot'];
?>
<form name="newProduct" method="post" action="?c=pot&a=store" >
    <input type="hidden" value="<?= $pot->getIdPot() ?>" name="id" >

    <div class="form-group">
        <label for="exampleFormControlInput1">Názov</label>
        <p id="nazov_input" hidden></p>
        <input type="text" class="form-control" id="exampleFormControlInput1" name="nazov" value="<?=$pot->getProductName();?>" required>
    </div>
    <div class="form-group">
        <label for="exampleFormControlInput1">Cena</label>
        <p id="cena_input" hidden></p>
        <input type="text" class="form-control" id="exampleFormControlInput1" name="cena" value="<?=$pot->getPrice();?>" required>
    </div>

    <div class="form-group">
        <label for="exampleFormControlTextarea1">Popis produktu</label>
        <p id="popis_input" hidden></p>
        <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="popis" value="<?=$pot->getDescription();?>"></textarea>
    </div>

    <div class="form-group">
        <label for="exampleFormControlTextarea1">Popis produktu</label>
        <p id="popis_input" hidden></p>
        <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="popis" value="<?=$pot->getDescription();?>"></textarea>
    </div>

    <div class="form-group">
        <label for="exampleFormControlFile1">Vyber obrázok</label>
        <input type="file" class="form-control-file" id="exampleFormControlFile1" name="obrazok" value="<?=$pot->getPictureName();?>">
    </div>

    <div class="form-group">
        <button type="submit" class="btn btn-primary btn-sm" > Pridať </button>
    </div>
</form>