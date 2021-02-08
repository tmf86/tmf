<?php


namespace Repository;


class RegiserRepositoryValidator extends ValidatorCustumer
{
    protected $messagesCustomized = [
        'Nom' => "nom ",
        "Email" => "email"
    ];
    protected $errorsMessages = [
        'required' => 'le :attribute est obligatoire.',
        'min' => 'désolé le :attribute doit contenir au moins 10 caractères.',
        "alpha" => 'seul les caractères aphabétique sont pris en compte.',
        'email' => 'l\':attribute est invalide.'
    ];
    /**
     * @var string[]
     */
    protected $rules = [
        'nom' => 'required|min:10|alpha',
        'email' => 'required|email',
    ];

}