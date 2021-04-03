<?php


namespace Validator;


class FinalizeAccountValidator extends ValidatorCustumer
{
    /**
     * @var string[]
     */
    protected $errorsMessages = [
        'required' => 'Le mot de passe est obligatoire.',
        'regex' => 'Le mot de passe est invalide votre mot de passe doit contenir  
                    au moins  8 ,au moins une lettre minuscule,
                    au moins une lettre majuscule,
                    au moins un chiffre,
                    au moins un de ces caractères spéciaux : (  $ @ % * + - _ ! )',
        'same' => 'Le mot de passe ne correspond pas .'
    ];
    /**
     * @var string[]
     */
    protected $rules = [
        'mot_pass' => 'required|regex:#^(?=.*[A-Z])(?=.*[a-z])(?=.*\d)(?=.*[-+!*$@%_])([-+!*$@%_\w]{8,})$#',
        'password_verify' => 'required|same:mot_pass'
    ];
}