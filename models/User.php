<?php


namespace Model;

class User extends Model
{
    protected $table = "membre";
    protected $primaryKeyStr = "mat_membre";
    protected $foreignkeys = ['commentaire' => 'cible', 'compte' => 'mat_membre', 'forum_subject' => 'user_id'];
    protected $foreignTableKeys = ['compte' => 'id_compte', 'forum_subject' => 'id'];

    /*** @return ModelInterface[]|ModelInterface */
    public function commentaires()
    {
        return $this->setCurrentForeignTable('commentaire')->hasMany(Comment::class);
    }

    /*** @return ModelInterface[]|ModelInterface */
    public function account()
    {
        return $this->setCurrentForeignTable('compte')->one(Account::class, false);
    }

    public function subjects()
    {
        return $this->setCurrentForeignTable('forum_subject')->hasMany(ForumSubject::class);
    }

}