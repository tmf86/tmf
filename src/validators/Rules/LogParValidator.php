<?php


namespace Validator\Rules;


use Validator\ValidatorCustumer;

class LogParValidator extends ValidatorCustumer
{
    protected $errorsMessages = [
        'required' => ':attribute obligatoire.',
        'emailPar' => ':attribute invalide.',
        'PasswordPar' => ':attribute invalide.'
    ];
    protected $rules = [
        'identifiant' => 'required|emailPar',
        'password' => 'required|password|PasswordPar'
    ];
}