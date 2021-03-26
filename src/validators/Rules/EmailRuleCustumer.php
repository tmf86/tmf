<?php


namespace Validator\Rules;


use Contoller\Http\Request;
use Rakit\Validation\Rule;

class EmailRuleCustumer extends Rule
{
    /** @var string */
    protected $message = "The :attribute is not valid email";

    /**
     * @param string $val
     * @param Request $request
     * @return bool|Request
     */
    private function curl(string $val, Request $request)
    {
        $url = sprintf(API_CALL, API_KEY, $val);
        $curl = curl_init($url);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        $data = curl_exec($curl);
        if ($data === false) {
            return $request->ajax([], 409);
            exit();
        }

        $data = json_decode($data, true);
        foreach ($data as &$value):if (is_null($val)) $value = 0;endforeach;
        unset($value);
//            isset($data["mx_found"])) &&($data["mx_found"] === true) && ($data["mx_found"] === true) &&
        if ((isset($data["smtp_check"])) && (isset($data["format_valid"]))) {
            return ($data["smtp_check"] === true) && (($data["format_valid"]) === true);
        }

        curl_close($curl);
        return $request->ajax([], 409);
        exit();
    }

    public function check($value): bool
    {
        // TODO: Implement check() method.
        return $this->curl($value, new Request());
    }
}