<?php


namespace Validator\Rules;


use Validator\ValidatorRuleCustumer;

class EmailRuleCustumer extends ValidatorRuleCustumer
{
    /** @var string */
    protected $message = "The :attribute is not valid email";

    /**
     * @param $val
     * @return bool
     */
    private function curl($val)
    {
        $curl = curl_init("https://apilayer.net/api/check?access_key=d3b984711681e7fe785d67d8a41fdc46&email=$val&smtp=1&format=1");
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        $data = curl_exec($curl);
        if ($data === false) {
            $this->abortAjaxError(401);
        } else {
            $data = json_decode($data, true);
            foreach ($data as &$val):
                if (is_null($val)) {
                    $val = 0;
                }
            endforeach;
//            isset($data["mx_found"])) &&($data["mx_found"] === true) && ($data["mx_found"] === true) &&
            if (($data["smtp_check"] === true) && (($data["format_valid"]) === true)) {
//                return (($data["smtp_check"] === true) && ($data["format_valid"] === true));
                return true;
            } else {
//                debug([$data, "Api"]);
//                $this->abortAjaxError(400);
                return false;
            }
        }
        curl_close($curl);
        return false;
    }

    public function check($value): bool
    {
        // TODO: Implement check() method.
        return $this->curl($value);
    }
}