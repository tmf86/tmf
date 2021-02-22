<?php


namespace Model;


class Correction extends Model
{
    protected $table = "correction";
    protected $foreignTable = "sujet";
    protected $primaryKeyStr = "id_correct";
    protected $foreignTableKey = "id_sujet";

    public function find_correction($id)
    {
        $r = "SELECT * FROM $this->table,$this->foreignTable WHERE $this->table.$this->foreignTableKey
        =$this->foreignTable.$this->foreignTableKey AND $this->table.$this->foreignTableKey=$id";
        return $this->query($r, false);
    }
}