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
        'min' => 'message trop court.'
    ];
    /**
     * @var string[]
     */
    protected $rules = [
        'title' => 'required|name|max:50',
        'subtitle' => 'required|name|max:50',
        'message' => 'required|min:20'
    ];
}