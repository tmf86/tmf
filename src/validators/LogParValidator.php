<?php


namespace Validator\Rules;


class LogParValidator extends \Validator\ValidatorCustumer
{
    protected $errorsMessages = [
        'required' => ':attribute obligatoire.',
        'emailPar' => ':attribute invalide.',
        'PasswordPar' => ':attribute invalide.'
    ];
    protected $rules = [
        'identifiant' => 'required|emailPar',
        'password' => 'required|Password|PasswordPar'
    ];
}