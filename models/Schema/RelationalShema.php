<?php


namespace Model\Shema;

abstract class RelationalShema
{
    /*** @var string[] */
    protected $foreignkeys = [];
    /*** @var string[] */
    protected $foreignTableKeys = [];
    /*** @var string */
    private $relationQuery = '';
    /*** @var string */
    private $currentForeignTable = '';

    /**
     * @return string
     */
    public function getCurrentForeignTable(): string
    {
        return $this->currentForeignTable;
    }

    /*** @var string */
    protected $primaryKeyStr = "id";

    /**
     * @param string $currentForeignTable
     * @return $this
     */
    public function setCurrentForeignTable(string $currentForeignTable): RelationalShema
    {
        $this->currentForeignTable = $currentForeignTable;
        return $this;
    }

    /**
     * @param int $id
     * @param int $cardinality
     * @return $this
     */
    private function relationShipOneToMany(int $id, int $cardinality)
    {
        $foreignkey = $this->foreignkeys[$this->currentForeignTable];
        if ($cardinality == I) {
            $foreignTableKey = $this->foreignTableKeys[$this->currentForeignTable];
            $relationship = "select * from $this->table inner join $this->currentForeignTable on $this->table.$foreignkey = $this->currentForeignTable.$foreignTableKey where $this->table.$this->primaryKeyStr = $id  limit 1";
            $this->relationQuery = $relationship;
        } else if ($cardinality == N) {
            $relationship = "select * from $this->table inner join $this->currentForeignTable on $this->table.$this->primaryKeyStr = $this->currentForeignTable.{$foreignkey} where $this->table.$this->primaryKeyStr = $id ";
            $this->relationQuery = $relationship;
        }
        return $this;
    }

    /**
     * @param int $id
     * @return $this
     */
    private function relationShipOneToOne(int $id)
    {
        $foreignkey = $this->foreignkeys[$this->currentForeignTable];
//        $foreignTableKey = $this->foreignTableKeys[$this->currentForeignTable];
        $relationship = "select * from $this->table inner join $this->currentForeignTable on $this->table.{$this->primaryKeyStr} = $this->currentForeignTable.$foreignkey where $this->table.$this->primaryKeyStr = $id  limit 1";
//        debug($relationship);
        $this->relationQuery = $relationship;
        return $this;
    }

    /**
     * @param $table
     * @return mixed
     */
    protected function hasMany($table)
    {
        $this->self = $table;
        return $this->relationShipOneToMany((int)$this->{$this->primaryKeyStr}, N)->query($this->relationQuery, true);
    }

    /**
     * @param $table
     * @return mixed
     */
    protected function belongTo($table)
    {
        $this->self = $table;
        return $this->relationShipOneToMany((int)$this->{$this->primaryKeyStr}, I)->query($this->relationQuery);
    }

    /**
     * @param $table
     * @return array|mixed
     */
    protected function one($table)
    {
        $this->self = $table;
        return $this->relationShipOneToOne((int)$this->{$this->primaryKeyStr})->query($this->relationQuery);
    }

}