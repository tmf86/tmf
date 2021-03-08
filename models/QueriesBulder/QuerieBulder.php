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
    /*** @var string */
    private $queryBuilded = '';

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

    /**
     * @param string $table
     * @param string|array $field
     * @return $this
     */
    public function select(string $table, $field = '*')
    {
        if (is_array($field)) {
            $field = implode(',', $field,);
        }
        $this->queryBuilded = sprintf('select %s from %s ', $field, $table);
        return $this;
    }

    /**
     * @param string $field
     * @param string|int|float $value
     */
    public function whereEqual(string $field, $value)
    {
        if (is_int($value)) {
            $this->queryBuilded .= sprintf(" where %s=%d", $field, $value);
        } elseif (is_string($value)) {
            $this->queryBuilded .= sprintf(" where %s='%s'", $field, $value);
        } elseif (is_float($value)) {
            $this->queryBuilded .= sprintf(" where %s=%f", $field, $value);
        } else {
            throw new \Exception('The value type must be a string , int or float');
        }
        return $this;
    }

    /**
     * @param string $field
     * @param int|float $value
     * @throws \Exception
     */
    public function whereBiggerThan(string $field, $value)
    {
        if (is_int($value)) {
            $this->queryBuilded .= sprintf(" where %s>%d", $field, $value);
        } elseif (is_float($value)) {
            $this->queryBuilded .= sprintf(" where %s>%f", $field, $value);
        } else {
            throw new \Exception('The value type must be a  int or float');
        }
        return $this;
    }

    /**
     * @param string $field
     * @param int|float $value
     * @throws \Exception
     */
    public function whereGreaterOrEqual(string $field, $value)
    {
        if (is_int($value)) {
            $this->queryBuilded .= sprintf(" where %s>=%d", $field, $value);
        } elseif (is_float($value)) {
            $this->queryBuilded .= sprintf(" where %s>=%f", $field, $value);
        } else {
            throw new \Exception('The value type must be a  int or float');
        }
        return $this;
    }

    /**
     * @param string $field
     * @param int|float $value
     * @throws \Exception
     */
    public function whereSmallerThan(string $field, $value)
    {
        if (is_int($value)) {
            $this->queryBuilded .= sprintf(" where %s<%d", $field, $value);
        } elseif (is_float($value)) {
            $this->queryBuilded .= sprintf(" where %s<%f", $field, $value);
        } else {
            throw new \Exception('The value type must be a  int or float');
        }
        return $this;
    }

    /**
     * @param string $field
     * @param int|float $value
     * @throws \Exception
     */
    public function whereSmallerOrequal(string $field, $value)
    {
        if (is_int($value)) {
            $this->queryBuilded .= sprintf(" where %s<=%d", $field, $value);
        } elseif (is_float($value)) {
            $this->queryBuilded .= sprintf(" where %s<=%f", $field, $value);
        } else {
            throw new \Exception('The value type must be a  int or float');
        }
        return $this;
    }

    /**
     * @param string $field
     * @param int|float|string $first
     * @param int|float $second
     * @throws \Exception
     */
    public function whereBetween(string $field, $first, $second)
    {
        $first_is_int = is_int($first);
        $second_is_int = is_int($second);
        $first_is_float = is_float($first);
        $second_is_float = is_float($second);
        if ($first_is_int && $second_is_int) {
            $this->queryBuilded .= sprintf(" where %s between %d and %d", $field, $first, $second);
        } elseif ($first_is_int && $second_is_float) {
            $this->queryBuilded .= sprintf(" where %s between %d and %f", $field, $first, $second);
        } elseif ($second_is_int && $first_is_float) {
            $this->queryBuilded .= sprintf(" where %s between %d and %f", $field, $second, $first);
        } elseif (is_float($first) && is_float($second)) {
            $this->queryBuilded .= sprintf(" where %s between %f and %f", $field, $first, $second);
        } elseif (is_string($first) && is_string($second)) {
            $this->queryBuilded .= sprintf(" where %s between '%s' and '%s'", $field, $first, $second);
        } else {
            throw new \Exception('The value type must be a string , int or float');
        }
        return $this;
    }

    /**
     * @param string $field
     * @param string|int|float $value
     */
    public function andEqual(string $field, $value)
    {
        if (is_int($value)) {
            $this->queryBuilded .= sprintf(" and %s=%d", $field, $value);
        } elseif (is_string($value)) {
            $this->queryBuilded .= sprintf(" and %s='%s'", $field, $value);
        } elseif (is_float($value)) {
            $this->queryBuilded .= sprintf(" and %s=%f", $field, $value);
        } else {
            throw new \Exception('The value type must be a string , int or float');
        }
        return $this;
    }

    /**
     * @param string $field
     * @param int|float $value
     * @throws \Exception
     */
    public function andBiggerThan(string $field, $value)
    {
        if (is_int($value)) {
            $this->queryBuilded .= sprintf(" and %s>%d", $field, $value);
        } elseif (is_float($value)) {
            $this->queryBuilded .= sprintf(" and %s>%f", $field, $value);
        } else {
            throw new \Exception('The value type must be a  int or float');
        }
        return $this;
    }

    /**
     * @param string $field
     * @param int|float $value
     * @throws \Exception
     */
    public function andGreaterOrEqual(string $field, $value)
    {
        if (is_int($value)) {
            $this->queryBuilded .= sprintf(" and %s>=%d", $field, $value);
        } elseif (is_float($value)) {
            $this->queryBuilded .= sprintf(" and %s>=%f", $field, $value);
        } else {
            throw new \Exception('The value type must be a  int or float');
        }
        return $this;
    }

    /**
     * @param string $field
     * @param int|float $value
     * @throws \Exception
     */
    public function andSmallerThan(string $field, $value)
    {
        if (is_int($value)) {
            $this->queryBuilded .= sprintf(" and %s<%d", $field, $value);
        } elseif (is_float($value)) {
            $this->queryBuilded .= sprintf(" and %s<%f", $field, $value);
        } else {
            throw new \Exception('The value type must be a  int or float');
        }
        return $this;
    }

    /**
     * @param string $field
     * @param int|float $value
     * @throws \Exception
     */
    public function andSmallerOrequal(string $field, $value)
    {
        if (is_int($value)) {
            $this->queryBuilded .= sprintf(" and %s<=%d", $field, $value);
        } elseif (is_float($value)) {
            $this->queryBuilded .= sprintf(" and %s<=%f", $field, $value);
        } else {
            throw new \Exception('The value type must be a  int or float');
        }
        return $this;
    }

    /**
     * @param string $field
     * @param int|float|string $first
     * @param int|float $second
     * @throws \Exception
     */
    public function andBetween(string $field, $first, $second)
    {
        $first_is_int = is_int($first);
        $second_is_int = is_int($second);
        $first_is_float = is_float($first);
        $second_is_float = is_float($second);
        if ($first_is_int && $second_is_int) {
            $this->queryBuilded .= sprintf(" and %s between %d and %d", $field, $first, $second);
        } elseif ($first_is_int && $second_is_float) {
            $this->queryBuilded .= sprintf(" and %s between %d and %f", $field, $first, $second);
        } elseif ($second_is_int && $first_is_float) {
            $this->queryBuilded .= sprintf(" and %s between %d and %f", $field, $second, $first);
        } elseif (is_float($first) && is_float($second)) {
            $this->queryBuilded .= sprintf(" and %s between %f and %f", $field, $first, $second);
        } elseif (is_string($first) && is_string($second)) {
            $this->queryBuilded .= sprintf(" and %s between '%s' and '%s'", $field, $first, $second);
        } else {
            throw new \Exception('The value type must be a string , int or float');
        }
        return $this;
    }

    /**
     * @param bool $all
     * @return array|mixed
     * @throws \Exception
     */
    public function run(bool $all = false)
    {
        if (!empty($this->queryBuilded)) {
            return ($all) ? $this->query($this->queryBuilded, true) : $this->query($this->queryBuilded, false);
        }
        throw  new \Exception('Query can\'t be executed because the statement is empty');
    }

    public function limit(int $value)
    {
        $this->queryBuilded .= sprintf(' limit %d', $value);
        return $this;
    }

    /**
     * @return string
     */
    public function getQueryBuilded(): string
    {
        return $this->queryBuilded;
    }
}