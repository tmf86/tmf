<?php


namespace Validator\Rules;


use Contoller\Http\Request;
use Rakit\Validation\Rule;

class EmailRuleCustumer extends Rule
{
    /** @var string */
    protected $message = "The :attribute is not valid email";

    /**
     * @param $val
     * @param Request $request
     * @return bool|Request
     */
    private function curl($val, Request $request)
    {
        $curl = curl_init("https://apilayer.net/api/check?access_key=d3b984711681e7fe785d67d8a41fdc46&email=$val&smtp=1&format=1");
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        $data = curl_exec($curl);
        if ($data === false) {
            return $request->ajax([], 401);
            die();
        } else {
            $data = json_decode($data, true);
            foreach ($data as &$val):if (is_null($val)) $val = 0;endforeach;
//            isset($data["mx_found"])) &&($data["mx_found"] === true) && ($data["mx_found"] === true) &&
            if ((isset($data["smtp_check"])) && (isset($data["format_valid"]))) {
                if (($data["smtp_check"] === true) && (($data["format_valid"]) === true)) {
                    return true;
                } else {
                    return false;
                }
            } else {
                return $request->ajax([], 401);
                die();
            }
        }
        curl_close($curl);
        return false;
    }

    public function check($value): bool
    {
        // TODO: Implement check() method.
        return $this->curl($value, new Request());
    }
}