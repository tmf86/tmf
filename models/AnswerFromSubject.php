<?php


namespace Model;


class AnswerFromSubject extends Model
{
    protected $table = 'answers_from_subjects';
    protected $foreignkeys = ['forum_subject' => 'subject_id', 'membre' => 'user_id'];
    protected $foreignTableKeys = ['forum_subject' => 'id', 'membre' => 'mat_membre'];

    public function subject()
    {
        return $this->setCurrentForeignTable('forum_subject')->belongTo(ForumSubject::class);
    }

    public function user()
    {
        return $this->setCurrentForeignTable('membre')->belongTo(User::class);
    }
}