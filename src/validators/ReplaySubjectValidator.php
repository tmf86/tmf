<?php


namespace Validator;


class ReplaySubjectValidator extends ValidatorCustumer
{
    /**
     * @var string[]
     */
    protected $errorsMessages = [
        'required' => 'obligatoire.'
    ];
    /**
     * @var string[]
     */
    protected $rules = [
        'message' => 'required|unique:answers_from_subjects,message'
    ];
}