<?php


namespace Repository;


class RegiserRepositoryValidator extends ValidatorCustumer
{
    protected $messagesCustomized = [
        "Email" => "email",
        "Contact" => "contact",
        "Prenom" => "prenom"
    ];
    protected $errorsMessages = [
        'required' => ':attribute obligatoire.',
        'min' => ':attribute invalide',
        "max" => ":attribute doit contenir au plus 10 chiffres",
        "alpha" => ':attribute invalide.',
        'email' => ':attribute obligatoire.'
    ];
    /**
     * @var string[]
     */
    protected $rules = [
        'nom' => 'required|min:3|alpha',
        'prenom' => 'required|min:3|alpha',
        'contact' => 'required|numeric|regex:#^[0-9]([-. ]?[0-9]{2}){4}$#',
        "email" => "required"
    ];

}