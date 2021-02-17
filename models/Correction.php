<?php


namespace Model;


class Correction extends  Model
{
    protected $table="correction";
    protected $primaryKeyStr="id_sujet";
    public function find_correction($id){
        return $this->find($id);
    }
}