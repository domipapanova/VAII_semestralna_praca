<?php

namespace App\Models;

use App\Core\Model;

class Review extends Model
{
    protected $id_review;
    protected $text;
    protected $id_author;

    /**
     * @return mixed
     */
    public function getIdReview()
    {
        return $this->id_review;
    }

    /**
     * @return mixed
     */
    public function getText()
    {
        return $this->text;
    }

    public function getName()
    {
        return User::getOne($this->id_author)->getFirstName() . ' ' . User::getOne($this->id_author)->getLastName();
    }

    /**
     * @param mixed $text
     */
    public function setText($text): void
    {
        $this->text = $text;
    }




    /**
     * @return mixed
     */
    public function getIdAuthor()
    {
        return $this->id_author;
    }

    /**
     * @param mixed $id_author
     */
    public function setIdAuthor($id_author): void
    {
        $this->id_author = $id_author;
    }

    /**
     * @return mixed
     */


    static public function setTableName()
    {
        return 'reviews';
    }

    static public function setDbColumns()
    {
        return [ 'id_review' ,'text', 'meno', 'id_author'];
    }

    public static function getPkColumnName(): string
    {
        return 'id_review';
    }


}