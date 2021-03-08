<?php


namespace Model;


class Comment extends Model
{
    protected $table = "commentaire";
    protected $primaryKeyStr = "id_comentaire";
    protected $foreignkeys = ['membre' => 'cible'];
    protected $foreignTableKeys = ['membre' => 'mat_membre'];

    public function user()
    {
        return $this->setCurrentForeignTable('membre')->belongTo(User::class);
    }
}