<?php


namespace Model;


class ForumSubject extends Model
{
    protected $table = 'forum_subject';
    protected $primaryKeyStr = 'id';
    protected $foreignkeys = ['forum' => 'forum_id'];
    protected $foreignTableKeys = ['forum' => 'id'];

    public function forum()
    {
        return $this->setCurrentForeignTable('forum')->belongTo(Forum::class);
    }
}