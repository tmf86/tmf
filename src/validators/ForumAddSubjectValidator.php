<?php


namespace Validator;


class ForumAddSubjectValidator extends ValidatorCustumer
{
    /**
     * @var string[]
     */
    protected $errorsMessages = [
        'required' => 'obligatoire.',
        'unique' => ':value  déja dans ce forum.'
    ];
    /**
     * @var string[]
     */
    protected $rules = [
        'title' => 'required|unique:forum_subject,title|max:50',
        'subtitle' => 'unique:forum_subject,subtitle|max:50',
        'message' => 'required'
    ];
}