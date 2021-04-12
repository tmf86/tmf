<?php


namespace Model;


class ForumSubject extends Model
{
    protected $table = 'forum_subject';
    protected $primaryKeyStr = 'id';
    protected $foreignkeys = ['forum' => 'forum_id', 'membre' => 'user_id'];
    protected $foreignTableKeys = ['forum' => 'id', 'membre' => 'mat_membre'];

    public function forum()
    {
        return $this->setCurrentForeignTable('forum')->belongTo(Forum::class);
    }

    public function user()
    {
        return $this->setCurrentForeignTable('membre')->belongTo(User::class);
    }
}