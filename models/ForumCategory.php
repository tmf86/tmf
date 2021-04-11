<?php


namespace Model;


class ForumCategory extends Model
{
    protected $table = 'forum_category';
    protected $primaryKeyStr = 'id';
    protected $foreignkeys = ['forum' => 'forum_category_id'];
    protected $foreignTableKeys = ['forum' => 'id'];

    public function forums()
    {
        return $this->setCurrentForeignTable('forum')->hasMany(Forum::class);
    }
}