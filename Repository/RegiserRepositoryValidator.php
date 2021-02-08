<?php


namespace Repository;


class RegiserRepositoryValidator extends ValidatorCustumer
{
    protected $errorsMessages = [
        'required' => ':attribute obligatoire.',
        'numeric'=>':attribute invalide.',
        'min' => ':attribute invalide',
        "alpha" => ':attribute invalide.',
        'email' => ':attribute obligatoire.',
        'phone' => ':attribute invalide'
    ];
    /**
     * @var string[]
     */
    protected $rules = [
        'nom' => 'required|min:2|alpha',
        'prenom' => 'required|min:2|alpha',
        'contact' => 'required|numeric|phone',
        "email" => "required"
    ];

}