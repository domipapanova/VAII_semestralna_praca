<?php

namespace App\Controllers;

use App\Core\AControllerBase;
use App\Core\Responses\JsonResponse;
use App\Core\Responses\Response;
use App\Models\Product;
use App\Models\Review;

class ReviewController extends AControllerBase
{

    /**
     * @return \App\Core\Responses\Response|\App\Core\Responses\ViewResponse
     * @throws \Exception
     */
    public function index(): Response
    {
        $reviews = Review::getAll();
        return  $this->html($reviews);
    }

    public function create()
    {
        return  $this->html([
            'review' => new Review()
        ], 'create');
    }

    /**
     * @throws \Exception
     */
    public function delete()
    {
        $review = Review::getOne($this->request()->getValue('id_review'));
        $review->delete();

        return $this->redirect("?c=review");
    }

    public function edit()
    {
        return $this->html([
            'review' => Review::getOne($this->request()->getValue('id_review'))
        ],
            'create'
        );
    }
    /**
     * @return  \App\Core\Responses\RedirectResponse
     * @throws \Exception
     */
    public function store()
    {
        $data = $this->request()->getPost();

        $id = $this->request()->getValue('id');
        $review = ($id ? Review::getOne($id) : new Review());
       if(isset($data['meno'])&& isset($data['text'])) {
           $review->setMeno($this->request()->getValue('meno'));
           $review->setText($this->request()->getValue('text'));
           $review->save();
       }
        return $this->redirect("?c=review");

    }

    public function newReview() {
        $data = $this->request()->getPost();

        $id = $this->request()->getValue('id');
        $review = ($id ? Review::getOne($id) : new Review());
        if(isset($data['meno'])&& isset($data['text'])) {
            $review->setMeno($this->request()->getValue('meno'));
            $review->setText($this->request()->getValue('text'));
            $review->save();
        }
        return $this->getReviews();
    }

    /**
     * @throws \Exception
     */
    public function getReviews() : JsonResponse {
        return $this->json(Review::getAll());
    }
}