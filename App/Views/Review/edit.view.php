<?php
use App\Models\Review;

/** @var Array $data */
/** @var Review $review */
/** @var \App\Auth\DBAuthenticator $auth */

$review = $data['review'];
?>
<link rel="stylesheet" href="public/css/reviewStyle.css">

<div class="article-form">
    <form name="newReview" method="post" action="?c=review&a=saveEdit">
        <input type="hidden" value="<?= $review->getIdReview() ?>" name="id_review" >

        <div class="form-group">
            <label id="review-title" for="exampleFormControlTextarea1">Recenzia</label>
            <input maxlength="2000" class="form-control" id="exampleFormControlTextarea1" name="text" rows="3" value="<?=$review->getText() ?>" required></input>
        </div>

        <div class="form-group">
            <button type="submit" class="btn btn-primary btn-sm" > Pridať </button>
        </div>
    </form>
</div>