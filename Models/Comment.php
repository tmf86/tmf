<?php


namespace Models;


class Comment extends Model
{
    protected $table = "commentaire";
    protected $primaryKeyStr = "id_comentaire";
    protected $foreignkey = "cible";
    protected $foreignTable = "membre";
    protected $foreignTableKey = "mat_membre";
    protected $self = self::class;

    public function user()
    {
        $this->self = User::class;
        return $this->belongTo();
    }
}