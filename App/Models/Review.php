<?php

namespace App\Models;

use App\Core\Model;

class Review extends Model
{
    protected $id_review;
    protected $text;
    protected  $meno;

    /**
     * @return mixed
     */
    public function getIdReview()
    {
        return $this->id_review;
    }

    /**
     * @param mixed $id_review
     */
    public function setIdReview($id_review): void
    {
        $this->id_review = $id_review;
    }

    /**
     * @return mixed
     */
    public function getText()
    {
        return $this->text;
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
    public function getMeno()
    {
        return $this->meno;
    }

    /**
     * @param mixed $meno
     */
    public function setMeno($meno): void
    {
        $this->meno = $meno;
    }


    static public function setTableName()
    {
        return 'reviews';
    }

    static public function setDbColumns()
    {
        return [ 'id_review' ,'text', 'meno'];
    }

    public static function getPkColumnName(): string
    {
        return 'id_review';
    }


}