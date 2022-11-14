<?php

namespace App\Controllers;

use App\Core\AControllerBase;
use App\Core\Responses\Response;
use App\Models\Review;

class ReviewController extends AControllerBase
{

    public function index(): Response
    {
        $reviews = Review::getAll();
        return  $this->html($reviews);
    }

    public function create(): Response
    {
        return  $this->html();
    }

    public function store()
    {
        $review = new Review();
        $review->setMeno($this->request()->getValue('meno'));
        $review->setText($this->request()->getValue('text'));
        $review->save();

        return $this->redirect("?c=review");
    }
}