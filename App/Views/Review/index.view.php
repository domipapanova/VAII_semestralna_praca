<?php /* @var \App\Models\Review[] $data */
/** @var \App\Auth\DBAuthenticator $auth */

?>

<link rel="stylesheet" href="public/css/reviewStyle.css">
<script src="public/js/review_script.js"></script>
<?php if ($auth->isLogged()) { ?>


    <div class="mgb-40 padb-30 auto-invert line-b-4 align-center">
        <h4 class="font-cond-l fg-accent lts-md mgb-10" contenteditable="false">Ešte si nás neohodnotil? </h4>
             <button id="reviewButton" type="button" class="btn btn-outline-success" onclick="addReview()">Ohodnoť nás</button>
        <div class="review-class">
        <div class="place-for-review" id="place-for-review" hidden>
            <form name="review" method="post" action="?c=review&a=store">
                <input type="hidden"  name="id-author" value="<?=$auth->getLoggedUserId()?>">

                <!--<div class="form-group">
                    <label id="name-title-review" for="exampleFormControlInput1">Meno</label>
                    <input type="text" id="exampleFormControlInput1" class="form-control" name="meno" placeholder="Vaše meno" required>
                </div>-->

                <div class="form-group">
                    <label id="review-title" for="exampleFormControlTextarea1">Recenzia</label>
                    <textarea class="form-control" id="exampleFormControlTextarea1" name="text" rows="3" placeholder="Napíšte nám čo máte na mysli ..." required></textarea>
                </div>
                <button type="submit" id="reviewButton" class="btn btn-outline-success">Pridaj recenziu</button>
            </form>

        </div>
        </div>
        <?php } ?>
        <h1 class="font-cond-b fg-text-d lts-md fs-300 fs-300-xs no-mg" id="reviews-main-title" contenteditable="false">Prečítaj si hodnotenia naších zákazníkov</h1>
    </div>
    <ul class="hash-list cols-3 cols-1-xs pad-30-all align-center text-sm" id="body-reviews">
        <?php foreach (array_reverse($data['reviews']) as $row) { ?>
            <div class="row d-flex justify-content-center">
                <div class="col-md-10">
                    <div class="card">
                        <div class="card-body m-3">
                            <div class="row">
                                <div class="col-lg-4 d-flex justify-content-center align-items-center mb-4 mb-lg-0">
                                    <img src="./public/images/review_img.jpg"
                                         class="rounded-circle img-fluid shadow-1" alt="woman avatar" width="200" height="200" />
                                </div>
                                <div class="col-lg-8">
                                    <p class="text-muted fw-light mb-4">
                                      <?=$row->getText()?>
                                    </p>
                                    <p class="fw-bold lead mb-2"><strong><?= \App\Models\User::getOne($row->getIdAuthor())->getFirstName() . " " .  \App\Models\User::getOne($row->getIdAuthor())->getLastName()?></strong></p>
                                </div>
                            </div>
                            <?php if ($auth->isLogged() && $row->getIdAuthor() == $auth->getLoggedUserId()) { ?>

                            <a href="?c=review&a=edit&id_review=<?= $row->getIdReview() ?>"> <button type="submit" class="btn btn-outline-primary">Upraviť</button> </a>
                            <a href="?c=review&a=delete&id_review=<?= $row->getIdReview() ?>"> <button type="submit" class="btn btn-outline-danger">Odstraniť</button> </a>
                            <?php } ?>
                        </div>
                    </div>
                </div>
            </div>
        <?php } ?>
    </ul>
