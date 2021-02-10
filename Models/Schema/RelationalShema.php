<?php


namespace Models\Shema;


trait RelationalShema
{
    protected $foreignkey;
    protected $foreignTable;
    protected $foreignTableKey;
    private $relationQuery = "";

    /**
     * @param int $id
     * @return $this
     */
    private function relationShip(int $id = null)
    {
        if (!is_null($id)) {
            $relationship = "select * from $this->table inner join $this->foreignTable on $this->table.$this->foreignkey = $this->foreignTable.$this->foreignTableKey where $this->primaryKeyStr = $id ";
            $this->relationQuery = $relationship;
        } else {
            $relationship = "select * from $this->table inner join $this->foreignTable on $this->table.$this->primaryKeyStr = $this->foreignTable.$this->foreignkey";
            $this->relationQuery = $relationship;
            var_dump($relationship);
        }
        return $this;
    }

    /**
     * @return array|mixed
     */
    protected function hasMany()
    {
        return $this->relationShip()->query($this->relationQuery, true);
    }

    /**
     * @param null $id
     * @return array|mixed
     */
    protected function belongTo()
    {
        return $this->relationShip($this->{$this->primaryKeyStr})->query($this->relationQuery);
    }
}