<?php
/** @var Array $data */

use App\Models\Article;

/** @var Article $article */
$article = $data['article'];
?>
<link rel="stylesheet" href="public/css/blogStyle.css">
<script src="public/js/blog_script.js"></script>


<div class="article-form">
<form name="newArticle" method="post" action="?c=blog&a=store" enctype="multipart/form-data" onsubmit="return validateArticle()">
    <input type="hidden" value="<?= $article->getIdArticle() ?>" name="id" >

    <div class="form-group">
        <label for="exampleFormControlInput1">Titulok</label>
        <p id="title_input" hidden></p>
        <input type="text"  maxlength="255" class="form-control" id="title" name="title" value="<?=$article->getTitle();?>" required>
    </div>

    <div class="form-group">
        <label for="exampleFormControlTextarea1">Popis článku</label>
        <p id="text_input" hidden></p>
        <input  type="text" maxlength="2000" class="form-control" id="text" rows="3" name="text" value="<?=$article->getText();?>" required></input>
    </div>

    <div class="form-group">
        <label for="exampleFormControlInput1">Odkaz na článok</label>
        <p id="link_input" hidden></p>
        <input type="url" maxlength="2048" class="form-control" id="link" name="link" value="<?=$article->getLinks();?>">
    </div>

    <div class="form-group">
        <label for="exampleFormControlFile1">Vyber obrázok</label>
        <p id="picture_input" hidden></p>
        <input type="file" class="form-control-file" id="article_picture" name="article_picture" value="<?=$article->getPictureName();?>" onchange="validateArticle()" required>
    </div>

    <div class="form-group">
        <button type="submit" class="btn btn-primary btn-sm" > Pridať </button>
    </div>
</form>
</div>