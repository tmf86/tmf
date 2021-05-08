<?php

namespace Validator;

use Contoller\Http\Request;
use Rakit\Validation\Validator;
use Rakit\Validation\Rules;
use Validator\Rules\EmailOrIDRuleCustumer;
use Validator\Rules\EmailRuleCustumer;
use Validator\Rules\LogParRuleCustumer;
use Validator\Rules\NameRuleCustumer;
use Validator\Rules\PasswordParRule;
use Validator\Rules\PasswordRuleCustumer;
use Validator\Rules\PhoneNumberRuleCustumer;
use Validator\Rules\UniqueRuleCustumer;

abstract class ValidatorCustumer extends Validator
{
    /**
     * @var string[]
     */
    protected $errorsMessages = [];
    /**
     * @var array
     */
    protected $rules = [];

    public function __construct(array $messages = [])
    {
        parent::__construct($this->errorsMessages);
    }

    /**
     * @param $errors
     * @return  void
     */
    public function custumErrorMessages(&$errors)
    {
        foreach ($errors as $key => $v):
            $errors[$key] = strtolower($errors[$key]);
        endforeach;
    }

    /**
     * @param array $rules
     * @return ValidatorCustumer
     */
    public function setRules(array $rules): ValidatorCustumer
    {
        $this->rules = $rules;
        return $this;
    }

    /**
     * @param array $inputs
     * @return \Rakit\Validation\Validation
     */
    public function validateCustermer(array $inputs)
    {
        return parent::validate($inputs, $this->rules, $this->messages);
    }

    /**
     * @return array|Request|false|mixed|string
     */
    public function makeValidate()
    {
        Request::sleep(1);
        $request = new Request();
        $inputs = $request->inputs();
        if (!empty($request->inputs())) {
            $validate = $this->validateCustermer($inputs);
            if ($validate->fails()) {
                $errors = $validate->errors()->firstOfAll();
                $errors['inputs'] = true;
                return (Request::isAjax()) ? Request::ajax($errors, 400) : Request::setErrors($errors);
            }
        }
        return true;
    }

    protected function registerBaseValidators()
    {
        $baseValidator = [
            'required' => new Rules\Required,
            'required_if' => new Rules\RequiredIf,
            'required_unless' => new Rules\RequiredUnless,
            'required_with' => new Rules\RequiredWith,
            'required_without' => new Rules\RequiredWithout,
            'required_with_all' => new Rules\RequiredWithAll,
            'required_without_all' => new Rules\RequiredWithoutAll,
            'email' => new Rules\Email,
            'alpha' => new Rules\Alpha,
            'numeric' => new Rules\Numeric,
            'alpha_num' => new Rules\AlphaNum,
            'alpha_dash' => new Rules\AlphaDash,
            'alpha_spaces' => new Rules\AlphaSpaces,
            'in' => new Rules\In,
            'not_in' => new Rules\NotIn,
            'min' => new Rules\Min,
            'max' => new Rules\Max,
            'between' => new Rules\Between,
            'url' => new Rules\Url,
            'integer' => new Rules\Integer,
            'boolean' => new Rules\Boolean,
            'ip' => new Rules\Ip,
            'ipv4' => new Rules\Ipv4,
            'ipv6' => new Rules\Ipv6,
            'extension' => new Rules\Extension,
            'array' => new Rules\TypeArray,
            'same' => new Rules\Same,
            'regex' => new Rules\Regex,
            'date' => new Rules\Date,
            'accepted' => new Rules\Accepted,
            'present' => new Rules\Present,
            'different' => new Rules\Different,
            'uploaded_file' => new Rules\UploadedFile,
            'mimes' => new Rules\Mimes,
            'callback' => new Rules\Callback,
            'before' => new Rules\Before,
            'after' => new Rules\After,
            'lowercase' => new Rules\Lowercase,
            'uppercase' => new Rules\Uppercase,
            'json' => new Rules\Json,
            'digits' => new Rules\Digits,
            'digits_between' => new Rules\DigitsBetween,
            'defaults' => new Rules\Defaults,
            'default' => new Rules\Defaults, // alias of defaults
            'nullable' => new Rules\Nullable,
            'phone' => new PhoneNumberRuleCustumer(),
            'name' => new NameRuleCustumer(),
            'unique' => new UniqueRuleCustumer(),
            "emailApi" => new EmailRuleCustumer(),
            'emailOrId' => new EmailOrIDRuleCustumer(),
            'emailPar' => new LogParRuleCustumer(),
            'PasswordPar' => new PasswordParRule(),
            'password' => new PasswordRuleCustumer()
        ];

        foreach ($baseValidator as $key => $validator) {
            $this->setValidator($key, $validator);
        }
    }
}