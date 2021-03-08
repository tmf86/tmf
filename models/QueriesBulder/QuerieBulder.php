<?php


namespace Model\QueriesBulder;


use Model\DataBaseManagement\DataBaseLink;
use Model\Shema\RelationalShema;
use PDO;

abstract class QuerieBulder extends RelationalShema
{
    use DataBaseLink;

    /*** @var string */
    protected $table = '';

    /**
     * @param string $stament
     * @param bool $all
     * @return array|mixed
     */
    public function query(string $stament, bool $all = false)
    {
        $queryExec = $this->pdo->query($stament);
        $queryExec->setFetchMode(PDO::FETCH_CLASS, $this->self);
        if ($all) {
            return $queryExec->fetchAll();
        }
        return $queryExec->fetch();
    }

    /**
     * @param string $precision
     * @return array
     */
    public function all(string $precision = "")
    {
        $queryExec = $this->pdo->query("select * from $this->table $precision");
        $queryExec->setFetchMode(PDO::FETCH_CLASS, $this->self);
        return $queryExec->fetchAll();
    }

    /**
     * @param int $id
     * @return mixed
     */
    public function find(int $id)
    {
        $queryExec = $this->pdo->query(sprintf("select * from $this->table where $this->primaryKeyStr=%d limit 1", $id));
        $queryExec->setFetchMode(PDO::FETCH_CLASS, $this->self);
        return $queryExec->fetch();
    }

    /**
     * @param int $id
     * @return array
     */
    public function find_many(int $id)
    {
        $queryExec = $this->pdo->query(sprintf("select * from $this->table where $this->primaryKeyStr=%d", $id));
        $queryExec->setFetchMode(PDO::FETCH_CLASS, $this->self);
        return $queryExec->fetchAll();
    }

    /**
     * @param array $data
     * @return array|mixed
     */
    public function create(array $data)
    {
        $rep = [];
        if (!empty($data)) {
            foreach ($data as $key => $value):
                $fields[] = replaceQuotion($key);
                $values[] = "'$value'";
            endforeach;
            $fields = implode(",", $fields);
            $values = implode(',', $values);
            $action = sprintf('insert into %s (%s) values (%s)', secureData($this->table), secureData($fields), secureData($values));
            if ($this->pdo->exec($action)) {
                $user = $this->query("select count(*) as id from $this->table", false);
                $rep = $this->query("select * from $this->table where $this->primaryKeyStr= $user->id");
            }
        }
        return $rep;
    }
}