<?php


namespace Model;

class User extends Model
{
    protected $table = "membre";
    protected $primaryKeyStr = "mat_membre";
    protected $foreignkey = "cible";
    protected $foreignTable = "commentaire";


    public function commentaires()
    {
        return $this->hasMany(Comment::class);
    }
}