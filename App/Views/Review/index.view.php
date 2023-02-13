<?php /* @var \App\Models\Review[] $data */
/** @var \App\Auth\DBAuthenticator $auth */
?>
<link rel="stylesheet" href="public/css/reviewStyle.css">
<script src="public/js/review_script.js"></script>

<?php if ($auth->isLogged()) {?>
    <div class="mgb-40 padb-30 auto-invert line-b-4 align-center">
        <h4 class="font-cond-l fg-accent lts-md mgb-10" contenteditable="false">Ešte si nás neohodnotil? </h4>
             <button id="reviewButton" type="button" class="btn btn-outline-success" onclick="addReview()">Ohodnoť nás</button>

        <div class="review-class">
           <div class="place-for-review" id="place-for-review" hidden>
               <form  name="reviewForm" id="reviewForm">
                   <input type="hidden"  name="id-author" value="<?=$auth->getLoggedUserId()?>">
                   <div class="form-group">
                       <label id="review-title" for="exampleFormControlTextarea1">Recenzia</label>
                       <textarea maxlength="2000" class="form-control" id="exampleFormControlTextarea1" name="text" rows="3" placeholder="Napíšte nám čo máte na mysli ..." required></textarea>
                   </div>
                   <button type="submit"  class="btn btn-outline-success">Pridaj recenziu</button>
              </form>
           </div>
        </div>
        <?php } ?>
        <h1 class="font-cond-b fg-text-d lts-md fs-300 fs-300-xs no-mg" id="reviews-main-title" contenteditable="false">Prečítaj si hodnotenia naších zákazníkov</h1>
    </div>

    <div class="hash-list cols-3 cols-1-xs pad-30-all align-center text-sm" id="body-reviews">
        <?php foreach (array_reverse($data['reviews']) as $row) { ?>
            <div class="row d-flex justify-content-center">
                <div class="col-md-10">
                    <div class="card">
                        <div class="card-body m-3">
                            <div class="row">
                                <div class="col-lg-4 d-flex justify-content-center align-items-center mb-4 mb-lg-0">
                                    <img src="./public/images/review_img.jpg"
                                         class="rounded-circle img-fluid shadow-1" alt="woman avatar" width="200" height="200" >
                                </div>
                                <div class="col-lg-8">
                                    <p class="text-muted fw-light mb-4">
                                      <?=$row->getText()?>
                                    </p>
                                    <p class="fw-bold lead mb-2"><strong><?= $row->getName() ?></strong></p>
                                </div>
                            </div>
                            <div class="edit-buttons">
                            <?php if ($auth->isLogged()) {
                                if($row->getIdAuthor() == $auth->getLoggedUserId()) {
                              ?>
                            <!--<a href="?c=review&a=edit&id_review=<?= $row->getIdReview() ?>"> <button type="submit" class="btn btn-outline-primary">Upraviť</button> </a>-->
                                    <form class="buttonFrom" action="?c=review&a=edit" method="post">
                                        <input type="hidden" name="id_review" value="<?= $row->getIdReview() ?>">
                                        <button  type="submit" class="btn btn-outline-primary">Upraviť</button>
                                    </form>

                                <?php }} ?>
                            <?php if ($auth->isLogged()) {
                            if($row->getIdAuthor() == $auth->getLoggedUserId() || $auth->getLoggedUserId() == \App\Config\Configuration::ADMIN) {
                            ?>
                            <button  class="btn btn-outline-danger"  onclick="deleteConfrimation(<?=$row->getIdReview()?>)" >Odstraniť</button>
                            <?php }} ?>
                              </div>
                        </div>
                    </div>
                </div>
            </div>
        <?php } ?>
    </div>

<div id="delete-confrim" class="modal">
    <form class="modal-content"  method="post" >
        <div class="container">
            <h1>Vymazať recenziu</h1>
            <p>Vážne si prajete odstrániť túto recezniu?</p>

            <div class="clearfix">
                <button type="button" onclick="document.getElementById('delete-confrim').style.display='none'"  class="btn btn-secondary">Zrušiť</button>
                <button type="submit"  onclick="document.getElementById('delete-confrim').style.display='none'" class="btn btn-danger">Odstraniť</button>
            </div>
        </div>
    </form>
</div>


