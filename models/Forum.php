<?php


namespace Model;


class Forum extends Model
{
    protected $table = 'forum';
    protected $primaryKeyStr = 'id';
    protected $foreignkeys = ['forum_category' => 'forum_category_id', 'forum_subject' => 'forum_id'];
    protected $foreignTableKeys = ['forum_category' => 'id', 'forum_subject' => 'id'];

    public function categorie()
    {
        return $this->setCurrentForeignTable('forum_category')->belongTo(ForumCategory::class);
    }

    public function subjects()
    {
        return $this->setCurrentForeignTable('forum_subject')->hasMany(ForumSubject::class);
    }
}