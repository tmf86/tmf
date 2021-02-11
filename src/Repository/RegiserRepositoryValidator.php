<?php


namespace Repository;


class RegiserRepositoryValidator extends ValidatorCustumer
{
    protected $errorsMessages = [
        'required' => ':attribute obligatoire.',
        'numeric' => ':attribute invalide.',
        'min' => ':attribute invalide',
        'email' => ':attribute obligatoire.',
        'phone' => ':attribute invalide.',
        "name" => ":attribute invalide."
    ];
    /**
     * @var string[]
     */
    protected $rules = [
        'nom' => 'required|min:2|name',
        'prenom' => 'required|min:2|name',
        'contact' => 'required|numeric|phone',
        "email" => "required|email"
    ];

}