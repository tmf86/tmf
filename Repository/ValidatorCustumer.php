<?php

namespace Repository;

use Rakit\Validation\Validator;

class ValidatorCustumer extends Validator
{
    /**
     * @var string[]
     */
    protected $errorsMessages = [
        'required' => ':attribute est obligatoire',
        'email' => ':attribute est invalide'
    ];
    /**
     * @var array
     */
    protected $rules = [];

    public function __construct(array $messages = [])
    {
        $messages = $this->errorsMessages;
        parent::__construct($messages);
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