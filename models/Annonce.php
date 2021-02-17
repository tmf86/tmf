<?php


namespace Model;



class Annonce extends Model
{
    protected $table="annonce";
    protected $self = self::class;
    public function index(){
        return $this->all('ORDER BY (date_ann) DESC');
    }
}