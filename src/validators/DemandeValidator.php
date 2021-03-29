<?php


namespace Validator;


class DemandeValidator extends ValidatorCustumer
{
    protected $errorsMessages = [
        'required' => ':attribute obligatoire.',
        'numeric' => ':attribute invalide.',
        'min' => ':attribute invalide',
        'phone' => ':attribute invalide.',
        "name" => ":attribute invalide.",
        "unique" => ":attribute est deja utilisé.",
        "emailApi" => "l' :attribute est invalide."
    ];
    protected $rules = [
        'lieu' => 'required|min:3|name',
        'date' => 'required'
    ];
}