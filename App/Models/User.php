<?php

namespace App\Models;

use App\Core\Model;

class User extends Model
{
    protected  int $id;
    protected  string $login;
    protected  string $email;
    protected  string $password;
    protected  string $first_name;
    protected  string $last_name;
    protected  string $phone_number;

    public function __construct(string $login = ' ' , string $password = ' ')
    {
        $this->login = $login;
        $this->password =$password;
    }


    /**
     * @return string
     */
    public function getLogin(): string
    {
        return $this->login;
    }

    /**
     * @param string $login
     */
    public function setLogin(string $login): void
    {
        $this->login = $login;
    }

    /**
     * @return string
     */
    public function getEmail(): string
    {
        return $this->email;
    }

    /**
     * @param string $email
     */
    public function setEmail(string $email): void
    {
        $this->email = $email;
    }

    /**
     * @return string
     */
    public function getPassword(): string
    {
        return $this->password;
    }

    /**
     * @param string $password
     */
    public function setPassword(string $password): void
    {
        $this->password = $password;
    }

    /**
     * @return string
     */
    public function getFirstName(): string
    {
        return $this->first_name;
    }

    /**
     * @param string $first_name
     */
    public function setFirstName(string $first_name): void
    {
        $this->first_name = $first_name;
    }

    /**
     * @return string
     */
    public function getLastName(): string
    {
        return $this->last_name;
    }

    /**
     * @param string $last_name
     */
    public function setLastName(string $last_name): void
    {
        $this->last_name = $last_name;
    }

    /**
     * @return string
     */
    public function getPhoneNumber(): string
    {
        return $this->phone_number;
    }

    /**
     * @param string $phone_number
     */
    public function setPhoneNumber(string $phone_number): void
    {
        $this->phone_number = $phone_number;
    }

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }



    static public function setDbColumns()
    {
        return [ 'id' ,'login', 'emal', 'password'];
    }


    static public function setTableName()
    {
        return "users";
    }
}