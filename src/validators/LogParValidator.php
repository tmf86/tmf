<?php


namespace Validator;


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
        'mot_de_passe' => 'required|PasswordPar|password'
    ];
}