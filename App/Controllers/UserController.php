<?php

namespace App\Controllers;

use App\Core\AControllerBase;
use App\Core\Responses\Response;

class UserController extends AControllerBase
{

    public function index(): Response
    {
        /*$login = $this->request()->getValue("login");
        $email = $this->request()->getValue("email");
        $password = $this->request()->getValue("password");*/

        return $this->html();
    }
}