<?php /* @var \App\Models\Review $data */ ?>
<div class="bg-white rounded shadow-sm p-4 mb-5 rating-review-select-page">
    <h5 class="mb-4">Pridaj hodnotenie našej predajne </h5>

    <form method="post" action="?c=review&a=store">
        <div class="form-group">
            <label>Meno</label>
            <input type="text" class="form-control form-control-lg" name="meno" />
        </div>
        <div class="form-group">
            <label>Váš komentár</label>
            <textarea class="form-control" name="text"></textarea>
        </div>
        <div class="form-group">
            <button class="btn btn-primary btn-sm" type="button"> Pridať </button>
        </div>
    </form>
</div>