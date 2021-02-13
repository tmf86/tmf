<?php


namespace Repository;


class RegiserRepositoryValidator extends ValidatorCustumer
{
    protected $errorsMessages = [
        'required' => ':attribute obligatoire.',
        'numeric' => ':attribute invalide.',
        'min' => ':attribute invalide',
        'phone' => ':attribute invalide.',
        "name" => ":attribute invalide.",
        "unique" => ":attribute deja utilisé."
    ];
    /**
     * @var string[]
     */
    protected $rules = [
        'nom' => 'required|min:2|name',
        'prenom' => 'required|min:2|name',
        'contact' => 'required|numeric|phone|unique:membre,contact',
        "email" => "required|unique:membre,email"
    ];

}