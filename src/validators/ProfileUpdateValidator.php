<?php


namespace Validator;


class ProfileUpdateValidator extends ValidatorCustumer
{
    /**
     * @var string[]
     */
    protected $errorsMessages = [
        'emailApi' => 'email invalide.',
        'regex' => 'mot de passe invalide votre mot de passe doit contenir 
                    au moins  8 ,au moins une lettre minuscule,
                    au moins une lettre majuscule,
                    au moins un chiffre,
                    au moins un de ces caractères spéciaux : (  $ @ % * + - _ ! )',
        'phone' => 'contact invalide.'
    ];
    /**
     * @var string[]
     */
    protected $rules = [
        'email' => 'emailApi',
        'password' => 'regex:#^(?=.*[A-Z])(?=.*[a-z])(?=.*\d)(?=.*[-+!*$@%_])([-+!*$@%_\w]{8,})$#',
        'contact' => 'phone'
    ];

}