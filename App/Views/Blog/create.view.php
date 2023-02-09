<?php
/** @var Array $data */

use App\Models\Article;

/** @var Article $article */
$article = $data['article'];
?>
<link rel="stylesheet" href="public/css/blogStyle.css">

<div class="article-form">
<form name="newArticle" method="post" action="?c=blog&a=store" enctype="multipart/form-data">
    <input type="hidden" value="<?= $article->getIdArticle() ?>" name="id" >

    <div class="form-group">
        <label for="exampleFormControlInput1">Titulok</label>
        <p id="title_input" hidden></p>
        <input type="text" class="form-control" id="exampleFormControlInput1" name="title" value="<?=$article->getTitle();?>" required>
    </div>

    <div class="form-group">
        <label for="exampleFormControlTextarea1">Popis článku</label>
        <p id="text_input" hidden></p>
        <input  type="text" class="form-control" id="exampleFormControlTextarea1" rows="3" name="text" value="<?=$article->getText();?>" required></input>
    </div>

    <div class="form-group">
        <label for="exampleFormControlInput1">Odkaz na článok</label>
        <p id="link_input" hidden></p>
        <input type="url" class="form-control" id="exampleFormControlInput1" name="link" value="<?=$article->getLinks();?>">
    </div>

    <div class="form-group">
        <label for="exampleFormControlFile1">Vyber obrázok</label>
        <input type="file" class="form-control-file" id="exampleFormControlFile1" name="picture" value="<?=$article->getPictureName();?>">
    </div>

    <div class="form-group">
        <button type="submit" class="btn btn-primary btn-sm" > Pridať </button>
    </div>
</form>
</div>