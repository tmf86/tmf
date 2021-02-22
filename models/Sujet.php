<?php


namespace Model;


class Sujet extends Model
{
    protected $primaryKeyStr = "id_sujet";
    protected $foreignkey = "typ_sujet";
    protected $foreignTable = "type_sujet";
    protected $foreignTableKey = "id_typ_sujet";
    protected $table = "sujet";

    public function one_type()
    {
        return $this->belongTo(TypeSujet::class);
    }

    public function show_all()
    {
        return $this->all();

    }

    public function show_all_bts()
    {
        //return $this->all('WHERE  nom_typ_sujet="bts"');
        $tp = new TypeSujet();
        $tp = $tp->query("SELECT * FROM type_sujet WHERE nom_typ_sujet='bts'");
        return $tp->recup_sujet();
    }

    public function show_all_other()
    {
        $other = new TypeSujet();
        $other = $other->query("SELECT * FROM type_sujet WHERE nom_typ_sujet='examen' OR nom_typ_sujet='devoir'");
        return $other->recup_sujet();

    }

    public function show_all_projet()
    {
        $other = new TypeSujet();
        $other = $other->query("SELECT * FROM type_sujet WHERE nom_typ_sujet='projet' ");
        return $other->recup_sujet();

    }
}