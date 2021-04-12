<?php


namespace Validator;


class ForumAddSubjectValidator extends ValidatorCustumer
{
    /**
     * @var string[]
     */
    protected $errorsMessages = [
        'required' => 'obligatoire.',
        'name' => 'inavlide(pas de caractères speciaux ni d\'espace a la fin).',
        'min' => 'message trop court.',
        'unique' => ':value deja utilisé.'
    ];
    /**
     * @var string[]
     */
    protected $rules = [
        'title' => 'required|unique:forum_subject,title|name|max:50',
        'subtitle' => 'required|unique:forum_subject,subtitle|name|max:50',
        'message' => 'required|min:20'
    ];
}