<?php


namespace Model;


class TypeSujet extends Model
{
    protected $table = "type_sujet";
    protected $primaryKeyStr = "id_typ_sujet";
    protected $foreignTableKeys = ['sujet' => 'id_sujet'];
    protected $foreignkeys = ['sujet' => 'typ_sujet'];

    public function recup_sujet()
    {
        return $this->setCurrentForeignTable('sujet')->hasMany(Sujet::class);
    }


}