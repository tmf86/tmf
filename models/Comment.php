<?php


namespace Model;


class Comment extends Model
{
    protected $table = "commentaire";
    protected $primaryKeyStr = "id_comentaire";
    protected $foreignkey = "cible";
    protected $foreignTable = "membre";
    protected $foreignTableKey = "mat_membre";

    public function user()
    {
        return $this->belongTo(User::class);
    }
}