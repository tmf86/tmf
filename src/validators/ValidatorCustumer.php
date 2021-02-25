<?php

namespace Validator;

use Rakit\Validation\Validator;

abstract class ValidatorCustumer extends Validator
{
    /**
     * @var string[]
     */
    protected $errorsMessages = [];
    /**
     * @var array
     */
    protected $rules = [];

    public function __construct(array $messages = [])
    {
        parent::__construct($this->errorsMessages);
    }

    /**
     * @param $errors
     * @return  void
     */
    public function custumErrorMessages(&$errors)
    {
        foreach ($errors as $key => $v):
            $errors[$key] = strtolower($errors[$key]);
        endforeach;
    }

    /**
     * @param array $rules
     * @return ValidatorCustumer
     */
    public function setRules(array $rules): ValidatorCustumer
    {
        $this->rules = $rules;
        return $this;
    }

    /**
     * @param array $inputs
     * @return \Rakit\Validation\Validation
     */
    public function validateCustermer(array $inputs)
    {
        return parent::validate($inputs, $this->rules, $this->messages);
    }
}