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
        /*$login = $this->request()->getValue("login");
        $email = $this->request()->getValue("email");
        $password = $this->request()->getValue("password");*/

        return $this->html();
    }

    /**
     * @throws \Exception
     */
    public function getUsers() : JsonResponse {
        return $this->json(User::getAll());
    }
}