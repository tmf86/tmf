<?php


namespace Model\Shema;


trait RelationalShema
{
    protected $foreignkey;
    protected $foreignTable;
    protected $foreignTableKey;
    private $relationQuery = "";

    /**
     * @param int $id
     * @param int $cardinality
     * @return $this
     */
    private function relationShip(int $id, int $cardinality)
    {
        if ($cardinality == I) {
            $relationship = "select * from $this->table inner join $this->foreignTable on $this->table.$this->foreignkey = $this->foreignTable.$this->foreignTableKey where $this->primaryKeyStr = $id  limit 1";
            $this->relationQuery = $relationship;
        } else if ($cardinality == N) {
            $relationship = "select * from $this->table inner join $this->foreignTable on $this->table.$this->primaryKeyStr = $this->foreignTable.$this->foreignkey where $this->primaryKeyStr = $id ";
            $this->relationQuery = $relationship;
        }
        return $this;
    }

    /**
     * @param $table
     * @return mixed
     */
    protected function hasMany($table)
    {
        $this->self = $table;
        return $this->relationShip($this->{$this->primaryKeyStr}, N)->query($this->relationQuery, true);
    }

    /**
     * @param $table
     * @return mixed
     */
    protected function belongTo($table)
    {
        $this->self = $table;
        return $this->relationShip($this->{$this->primaryKeyStr}, I)->query($this->relationQuery);
    }
}