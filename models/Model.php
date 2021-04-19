<?php

namespace Model;


use Model\QueriesBulder\QuerieBulder;

class Model extends QuerieBulder implements ModelInterface
{
    /**
     * @param $name
     * @return bool
     */
    public function __get($name)
    {
        // TODO: Implement __get() method.
        if (method_exists($this, $name)) {
            return $this->$name();
        }
        return true;
    }
}