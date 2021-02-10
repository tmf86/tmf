<?php


namespace Models;

class User extends Model
{
    protected $table = "membre";
    protected $primaryKeyStr = "mat_membre";
    protected $foreignkey = "cible";
    protected $foreignTable = "commentaire";
    protected $self = self::class;


    public function commentaires()
    {
        $this->self = Comment::class;
        return $this->hasMany();
    }
}