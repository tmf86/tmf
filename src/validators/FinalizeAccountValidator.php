<?php


namespace Validator;


class FinalizeAccountValidator extends ValidatorCustumer
{
    /**
     * @var string[]
     */
    protected $errorsMessages = [
        'required' => 'le mot de passe est obligatoire.',
        'regex' => 'le mot de passe est invalide votre mot de passe doit contenir : 
            - au moins  8 à 15 caractères
            - au moins une lettre minuscule
            - au moins une lettre majuscule
            - au moins un chiffre
            - au moins un de ces caractères spéciaux: $ @ % * + - _ !'
    ];
    /**
     * @var string[]
     */
    protected $rules = [
        'mot_pass' => 'required|regex:#^(?=.*[A-Z])(?=.*[a-z])(?=.*\d)(?=.*[-+!*$@%_])([-+!*$@%_\w]{8,15})$#',
        'password_verify' => 'same:mot_pass'
    ];
}