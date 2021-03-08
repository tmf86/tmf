<?php


namespace Validator\Rules;


use Model\Model;
use Rakit\Validation\Rule;

class UniqueRuleCustumer extends Rule
{
    /** @var string */
    protected $message = ":attribute :value has been used";
    /*** @var string[] */
    protected $fillableParams = ['table', 'column'];

    /**
     * @param $value
     * @return bool
     */
    public function check($value): bool
    {
        $table = $this->parameter('table');
        $column = $this->parameter('column');
        $model = new Model();
//        $result = $model->query("select * from $table where $column='$value'");
        $result = $model->select($table)->whereEqual($column, $value)->run();
        return ($result) ? false : true;
    }
}
