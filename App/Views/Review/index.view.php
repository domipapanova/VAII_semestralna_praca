<?php /* @var \App\Models\Review[] $data */
/** @var \App\Core\IAuthenticator $auth */

?>

<link rel="stylesheet" href="public/css/reviewStyle">

    <div class="mgb-40 padb-30 auto-invert line-b-4 align-center">
        <h4 class="font-cond-l fg-accent lts-md mgb-10" contenteditable="false">Ešte si nás neohodnotil? </h4>
         <a href="?c=review&a=create"><button type="button" class="btn btn-outline-success">Ohodnoť nás</button> </a>
        <h1 class="font-cond-b fg-text-d lts-md fs-300 fs-300-xs no-mg" contenteditable="false">Prečítaj si hodnotenia naších zákazníkov</h1>
    </div>
    <ul class="hash-list cols-3 cols-1-xs pad-30-all align-center text-sm">
        <?php foreach ($data as $row) { ?>
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
                                    <p class="fw-bold lead mb-2"><strong><?=$row->getMeno()?></strong></p>
                                </div>
                            </div>
                            <?php if ($auth->isLogged()) { ?>

                            <a href="?c=review&a=edit&id_review=<?= $row->getIdReview() ?>"> <button type="submit" class="btn btn-outline-primary">Upraviť</button> </a>
                            <a href="?c=review&a=delete&id_review=<?= $row->getIdReview() ?>"> <button type="submit" class="btn btn-outline-danger">Odstraniť</button> </a>
                            <?php } ?>
                        </div>
                    </div>
                </div>
            </div>
        <?php } ?>
    </ul>
