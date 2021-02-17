<?php


namespace Model;


class Formation extends Model
{
    protected $table="formation";
   // protected $self=self::class;
    public function show_all(){
        return $this->all();
    }
    public function forma_url(){
        return "cours.php?id=$this->id_forma";
    }

}