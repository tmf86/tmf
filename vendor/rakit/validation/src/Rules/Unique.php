<?php


namespace Rakit\Validation\Rules;


use Model\Model;
use Rakit\Validation\Rule;

class Unique extends Rule
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
        $result = $model->query("select * from $table where $column='$value'");
        return ($result) ? false : true;
    }
}
