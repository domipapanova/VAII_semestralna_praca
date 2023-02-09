<?php

namespace App\Controllers;

use App\Auth\DBAuthenticator;
use App\Core\AControllerBase;
use App\Core\IAuthenticator;
use App\Core\Responses\JsonResponse;
use App\Core\Responses\Response;
use App\Models\Product;
use App\Models\Review;
use App\Models\User;

class ReviewController extends AControllerBase
{

    /**
     * @return \App\Core\Responses\Response|\App\Core\Responses\ViewResponse
     * @throws \Exception
     */
    public function index(): Response
    {
        $authors = User::getAll();
        $reviews = Review::getAll();
        return  $this->html(['reviews' =>$reviews, 'authors' => $authors]);
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
        $review = Review::getOne($id = $_GET['id']);
        if($review!=null) {
            $review->delete();
        }

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
     * @throws \Exception
     */
    public function store() : JsonResponse
    {
        $data = $this->request()->getPost();

        $id = $this->request()->getValue('id');
        $review = ($id ? Review::getOne($id) : new Review());
       if(isset($data['text'])) {
          /* $review->setMeno($this->request()->getValue('meno'));*/
           $review->setIdAuthor($this->request()->getValue('id-author'));
           $review->setText($this->request()->getValue('text'));
           $review->save();
       }
        //return $this->redirect("?c=review");

        return $this->json(Review::getAll());
    }

    /*public function newReview() {
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
*/
    /**
     * @throws \Exception
     */
    public function getReviews() : JsonResponse {
        return $this->json(Review::getAll());
    }

}