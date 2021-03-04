<?php


namespace Validator;


class LoginValidator extends ValidatorCustumer
{
    /**
     * @var string[]
     */
    protected $errorsMessages = [
        'required' => ':attribute obligatoire.',
        'numeric' => ':attribute invalide.',
        'min' => ':attribute invalide',
        'phone' => ':attribute invalide.',
        "name" => ":attribute invalide.",
        "unique" => ":attribute deja utilisé.",
        "emailApi" => "l :attribute est invalide."
    ];
    /**
     * @var string[]
     */
    protected $rules = [
        'nom' => 'required|min:2|name',
        'prenom' => 'required|min:2|name',
        'contact' => 'required|numeric|phone|unique:membre,contact',
        "email" => "required|emailApi|unique:membre,email"
    ];
}