<?php


namespace Model;


class TypeSujet extends Model
{
    protected $table="type_sujet";
    protected $primaryKeyStr="id_typ_sujet";
    protected $foreignTable="sujet";
    protected $foreignTableKey="id_sujet";
    //protected $self=self::class;
    protected $foreignkey="typ_sujet";

    public function recup_sujet(){
        return $this->hasMany(Sujet::class);
    }


}