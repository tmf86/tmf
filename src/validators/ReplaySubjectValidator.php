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
        'message' => 'required'
    ];
}