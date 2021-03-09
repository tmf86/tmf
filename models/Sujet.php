<?php


namespace Model;


class Sujet extends Model
{
    protected $table = "sujet";
    protected $primaryKeyStr = "id_sujet";
    protected $foreignkeys = ['type_sujet' => 'typ_sujet'];
    protected $foreignTableKeys = ['type_sujet' => 'id_typ_sujet'];

    public function one_type()
    {
        return $this->setCurrentForeignTable('type_sujet')->belongTo(TypeSujet::class);
    }

    public function show_all()
    {
        return $this->all();

    }

    public function show_all_bts()
    {
        //return $this->all('WHERE  nom_typ_sujet="bts"');
        $tp = new TypeSujet();
//        $tp = $tp->query("SELECT * FROM type_sujet WHERE nom_typ_sujet='bts'");
        $tp = $tp->select('type_sujet')->whereEqual('nom_typ_sujet', 'bts')->run();
        return $tp->recup_sujet();
    }

    public function show_all_other()
    {
        $other = new TypeSujet();
//        $other = $other->query("SELECT * FROM type_sujet WHERE nom_typ_sujet='examen' OR nom_typ_sujet='devoir'");
        $other = $other
            ->select('type_sujet')
            ->whereEqual('nom_typ_sujet', 'examen')
            ->OrEqual('nom_typ_sujet', 'devoir')
            ->run();
        return $other->recup_sujet();

    }

    public function show_all_projet()
    {
        $other = new TypeSujet();
        $other = $other->select('type_sujet')->whereEqual('nom_typ_sujet', 'bts')->run();
        return $other->recup_sujet();

    }
}