<?php

namespace App\Controllers;

use App\Core\AControllerBase;
use App\Core\Responses\Response;
use App\Models\User;

class RegistrationController extends AControllerBase
{

    public function index(): Response
    {
        return  $this->html();
    }


    public function reg(): Response
    {
        return  $this->html();
    }

    public function error(): Response
    {
        return  $this->html();
    }

    public function store() : Response
    {

        $data = $this->request()->getPost();
        $firstName = $data['firstName'];
        $lastName = $data['lastName'];
        $email = $data['email'];
        $login = $data['login'];
        $phone = $data['phoneNumber'];

        if( (isset($data["email"])  == false && isset($data["password"]) == false ) && (isset($data["login"]) == false)) {
            return $this->redirect("?c=registration&a=error");
        } else if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            return $this->redirect("?c=registration&a=error");
        } else {
            $user = new User();
            $user->setFirstName($firstName);
            $user->setLastName($lastName);
            $user->setEmail($email);
            $user->setLogin($login);
            $password = password_hash($data["password"], PASSWORD_BCRYPT);
            $user->setPassword($password);

            if (isset($data['phoneNumber']) && preg_match("/^(\+421|0)\d{9}$/",$phone)) {
                $user->setPhoneNumber($phone);
            } else {
                $user->setPhoneNumber('');
            }
            $user->save();
        }

        return $this->redirect("?c=registration&a=reg");

    }

    public function authorize(string $action)
    {
        return true; //
    }

}