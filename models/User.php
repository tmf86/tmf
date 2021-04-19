<?php


namespace Model;

class User extends Model
{
    protected $table = "membre";
    protected $primaryKeyStr = "mat_membre";
    protected $foreignkeys = ['commentaire' => 'cible', 'compte' => 'mat_membre'];
    protected $foreignTableKeys = ['compte' => 'id_compte'];

    /**
     * @return mixed
     */
    public function commentaires()
    {
        return $this->setCurrentForeignTable('commentaire')->hasMany(Comment::class);
    }

    /**
     * @return array|mixed
     */
    public function account()
    {
        return $this->setCurrentForeignTable('compte')->one(Account::class, false);
    }
}