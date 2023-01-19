<?php
/** @var Array $data */

use App\Models\Review;

/** @var Review $review */
$review = $data['review'];
/** @var \App\Auth\DBAuthenticator $auth */

?>
<link rel="stylesheet" href="public/css/reviewStyle.css">


<div class="bg-white rounded shadow-sm p-4 mb-5 rating-review-select-page">
    <h5 class="mb-4">Pridaj hodnotenie našej predajne </h5>

    <form name="review" method="post" action="?c=review&a=store" onsubmit=" return validateReview()" >
        <input type="hidden" value="<?= $review->getIdReview() ?>" name="id" >
        <input type="hidden"  name="id-author" value="<?=$auth->getLoggedUserId()?>">

        <!--<div class="form-group">
            <label>Meno</label>
            <p id="title_input" hidden></p>
            <input type="text" class="form-control form-control-lg" name="meno" value="<?=$review->getMeno();?>" />
        </div>-->
        <div class="form-group">
            <p id="review_input" hidden></p>
            <label for="text">Váš komentár</label>
            <textarea class="form-control" id="text" name="text"  ><?=$review->getText();?></textarea>
        </div>
        <div class="form-group">
            <button type="submit" class="btn btn-primary btn-sm" > Pridať </button>
        </div>
    </form>
</div>