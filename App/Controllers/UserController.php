<?php

namespace App\Controllers;

use App\Core\AControllerBase;
use App\Core\Responses\JsonResponse;
use App\Core\Responses\Response;
use App\Models\User;

class UserController extends AControllerBase
{

    public function index(): Response
    {
        return $this->html();
    }

    /**
     * @throws \Exception
     */
    public function getUsers() : JsonResponse {
        return $this->json(User::getAll());
    }
}