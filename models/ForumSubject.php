<?php


namespace Model;


class ForumSubject extends Model
{
    protected $table = 'forum_subject';
    protected $primaryKeyStr = 'id';
    protected $foreignkeys = ['forum' => 'forum_id', 'membre' => 'user_id', 'answers_from_subjects' => 'subject_id'];
    protected $foreignTableKeys = ['forum' => 'id', 'membre' => 'mat_membre', 'forum_subject' => 'id', 'answers_from_subjects' => 'id'];

    public function forum()
    {
        return $this->setCurrentForeignTable('forum')->belongTo(Forum::class);
    }

    public function user()
    {
        return $this->setCurrentForeignTable('membre')->belongTo(User::class);
    }

    public function answers()
    {
        return $this->setCurrentForeignTable('answers_from_subjects')->hasMany(AnswerFromSubject::class);
    }
}