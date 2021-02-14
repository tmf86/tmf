<?php


namespace Repository;


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
        $curl = curl_init("https://apilayer.net/api/check?access_key=133f9f834871847dbcc55b9a06bccd50&email=$val&smtp=1&format=1");
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        $data = curl_exec($curl);
        if ($data === false) {
            $this->abortAjaxError();
        } else {
            $data = json_decode($data, true);
//            debug($data);
//            debug([$data["mx_found"], $data["smtp_check"], $data["format_valid"]]);
        }
        curl_close($curl);
        return (($data["mx_found"] === true) && ($data["smtp_check"] === true) && ($data["format_valid"] === true));
    }

    public function check($value): bool
    {
        // TODO: Implement check() method.
        return $this->curl($value);
    }
}