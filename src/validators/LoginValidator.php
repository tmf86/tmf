<?php


namespace Validator;


class LoginValidator extends ValidatorCustumer
{
    /**
     * @var string[]
     */
    protected $errorsMessages = [
        'required' => ':attribute obligatoire.',
        'emailOrId' => 'Email ou Identifiant incorrect',
        'password' => 'Mot de passe incorrect'
    ];
    /**
     * @var string[]
     */
    protected $rules = [
        'id' => 'required|emailOrId',
        'password' => 'required|password'
    ];
}