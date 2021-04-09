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
        $recentRecording = [];
        if (!empty($data)) {
            foreach ($data as $key => $value):
                $fields[] = replaceQuotion($key);
                $values[] = "'$value'";
            endforeach;
            $fields = implode(",", $fields);
            $values = implode(',', $values);
            $action = sprintf('insert into %s (%s) values (%s)', secureData($this->table), secureData($fields), secureData($values));
            if ($this->pdo->exec($action)) {
                $recentRecording = $this->select($this->table)->OrderByDesc($this->primaryKeyStr)->limit(1)->run();
            }
        }
        return $recentRecording;
    }


    /**
     * @param string $field
     * @param string $clause
     * @param string|int|float $value
     * @throws \Exception
     */
    private function useStringIntAndFloatForComparison(string $symbol, string $clause, string $field, $value)
    {
        if (is_int($value)) {
            $this->queryBuilded .= sprintf(" %s %s%s%d", $clause, $field, $symbol, $value);
        } elseif (is_string($value)) {
            $this->queryBuilded .= sprintf(" %s %s%s'%s'", $clause, $field, $symbol, $value);
        } elseif (is_float($value)) {
            $this->queryBuilded .= sprintf(" %s %s%s%f", $clause, $field, $symbol, $value);
        } else {
            throw new \Exception('The value type must be a string , int or float');
        }
    }

    /**
     * @param string $field
     * @param string $clause
     * @param int|float $value
     * @throws \Exception
     */
    private function useIntAndFloatForComparison(string $symbol, string $clause, string $field, $value)
    {
        if (is_int($value)) {
            $this->queryBuilded .= sprintf(" %s %s%s%d", $clause, $field, $symbol, $value);
        } elseif (is_float($value)) {
            $this->queryBuilded .= sprintf(" %s %s%s%f", $clause, $field, $symbol, $value);
        } else {
            throw new \Exception('The value type must be a  int or float');
        }
    }

    /**
     * @param string $symbol
     * @param string $clause
     * @param  $field
     * @param string|int|float $value
     * @return $this
     * @throws \Exception
     */
    private function useOfComparison(string $symbol, string $clause, string $field, $value)
    {
        switch ($symbol) {
            case '=':
                $this->useStringIntAndFloatForComparison('=', $clause, $field, $value);
                break;
            case '>':
                $this->useIntAndFloatForComparison('=', $clause, $field, $value);
                break;
            case '>=':
                $this->useIntAndFloatForComparison('>=', $clause, $field, $value);
                break;
            case '<':
                $this->useIntAndFloatForComparison('<', $clause, $field, $value);
                break;
            case '<=' :
                $this->useIntAndFloatForComparison('<=', $clause, $field, $value);
                break;
        }
        return $this;
    }

    /**
     * @param string $clause
     * @param $field
     * @param string|int|float $value
     * @return $this
     * @throws \Exception
     */
    private function useBetween(string $clause, string $field, $first, $second)
    {
        $first_is_int = is_int($first);
        $second_is_int = is_int($second);
        $first_is_float = is_float($first);
        $second_is_float = is_float($second);
        if ($first_is_int && $second_is_int) {
            $this->queryBuilded .= sprintf(" %s %s between %d and %d", $clause, $field, $first, $second);
        } elseif ($first_is_int && $second_is_float) {
            $this->queryBuilded .= sprintf(" %s %s between %d and %f", $clause, $field, $first, $second);
        } elseif ($second_is_int && $first_is_float) {
            $this->queryBuilded .= sprintf(" %s %s between %d and %f", $clause, $field, $second, $first);
        } elseif (is_float($first) && is_float($second)) {
            $this->queryBuilded .= sprintf(" %s %s between %f and %f", $clause, $field, $first, $second);
        } elseif (is_string($first) && is_string($second)) {
            $this->queryBuilded .= sprintf(" %s %s between '%s' and '%s'", $clause, $field, $first, $second);
        } else {
            throw new \Exception('The value type must be a string , int or float');
        }
        return $this;
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
     * @return $this
     * @throws \Exception
     */
    public function whereEqual(string $field, $value)
    {
        return $this->useOfComparison('=', 'where', $field, $value);
    }

    /**
     * @param string $field
     * @param int|float $value
     * @return $this
     * @throws \Exception
     */
    public function whereBiggerThan(string $field, $value)
    {
        return $this->useOfComparison('>', 'where', $field, $value);
    }

    /**
     * @param string $field
     * @param int|float $value
     * @return $this
     * @throws \Exception
     */
    public function whereGreaterOrEqual(string $field, $value)
    {
        return $this->useOfComparison('>=', 'where', $field, $value);
    }

    /**
     * @param string $field
     * @param int|float $value
     * @throws \Exception
     */
    public function whereSmallerThan(string $field, $value)
    {
        return $this->useOfComparison('<', 'where', $field, $value);
    }

    /**
     * @param string $field
     * @param int|float $value
     * @return $this
     * @throws \Exception
     */
    public function whereSmallerOrequal(string $field, $value)
    {
        return $this->useOfComparison('<=', 'where', $field, $value);
    }

    /**
     * @param string $field
     * @param int|float|string $first
     * @param int|float $second
     * @return $this
     * @throws \Exception
     */
    public function whereBetween(string $field, $first, $second)
    {
        return $this->useBetween('where', $field, $first, $second);
    }

//    /**
//     * @return $this
//     */
//    public function And()
//    {
//        $this->queryBuilded .= ' and ';
//        return $this;
//    }

    /**
     * @param string $field
     * @return $this
     * @throws \Exception
     */
    public function andEqual(string $field, $value)
    {
        return $this->useOfComparison('=', 'and', $field, $value);
    }

    /**
     * @param string $field
     * @param string|int|float $value
     * @return $this
     * @throws \Exception
     */
    public function andBiggerThan(string $field, $value)
    {
        return $this->useOfComparison('>', 'and', $field, $value);
    }

    /**
     * @param string $field
     * @param string|int|float $value
     * @return $this
     * @throws \Exception
     */
    public function andGreaterOrEqual(string $field, $value)
    {
        return $this->useOfComparison('>=', 'and', $field, $value);
    }

    /**
     * @param string $field
     * @param string|int|float $value
     * @return $this
     * @throws \Exception
     */
    public function andSmallerThan(string $field, $value)
    {
        return $this->useOfComparison('<', 'and', $field, $value);
    }

    /**
     * @param string $field
     * @param string|int|float $value
     * @return $this
     * @throws \Exception
     */
    public function andSmallerOrequal(string $field, $value)
    {
        return $this->useOfComparison('<=', 'and', $field, $value);
    }

    /**
     * @param string $field
     * @param int|float|string $first
     * @param int|float $second
     * @return $this
     * @throws \Exception
     */
    public function andBetween(string $field, $first, $second)
    {
        return $this->useBetween('and', $field, $first, $second);
    }

//    /**
//     * @return $this
//     */
//    public function Or()
//    {
//        $this->queryBuilded .= ' or ';
//        return $this;
//    }

    /**
     * @param string $field
     * @param int|string|float $value
     * @return $this
     * @throws \Exception
     */
    public function OrBiggerThan(string $field, $value)
    {
        return $this->useOfComparison('>', 'or', $field, $value);
    }

    /**
     * @param string $field
     * @param string|int|float $value
     * @return $this
     * @throws \Exception
     */
    public function OrGreaterOrEqual(string $field, $value)
    {
        return $this->useOfComparison('>=', 'or', $field, $value);
    }

    /**
     * @param string $field
     * @param int|string|float $value
     * @return $this
     * @throws \Exception
     */
    public function OrEqual(string $field, $value)
    {
        return $this->useOfComparison('=', 'or', $field, $value);
    }

    /**
     * @param string $field
     * @param string|int|float $value
     * @return $this
     * @throws \Exception
     */
    public function OrSmallerOrequal(string $field, $value)
    {
        return $this->useOfComparison('<=', 'or', $field, $value);
    }

    /**
     * @param string $field
     * @param string|int|float $value
     * @return $this
     * @throws \Exception
     */
    public function OrSmallerThan(string $field, $value)
    {
        return $this->useOfComparison('<', 'or', $field, $value);
    }

    /**
     * @param string $field
     * @param int|float|string $first
     * @param int|float $second
     * @return $this
     * @throws \Exception
     */
    public function OrBetween(string $field, $first, $second)
    {
        return $this->useBetween('or', $field, $first, $second);
    }

    /**
     * @param string $field
     * @return $this
     */
    public function OrderBy(string $field)
    {
        $this->queryBuilded .= sprintf(' order by %s', $field);
        return $this;
    }

    /**
     * @param string $field
     * @return $this
     */
    public function OrderByAsc(string $field)
    {
        $this->queryBuilded .= sprintf(' order by %s asc', $field);
        return $this;
    }

    /**
     * @param string $field
     * @return $this
     */
    public function OrderByDesc(string $field)
    {
        $this->queryBuilded .= sprintf(' order by %s desc', $field);
        return $this;
    }

    /**
     * @param string $field
     * @return $this
     */
    public function groupBy(string $field)
    {
        $this->queryBuilded .= sprintf(' group by %s', $field);
        return $this;
    }

    /**
     * @param string $table
     * @param string $avgfield
     * @param string|array $field
     * @param string $as
     * @return $this
     */
    public function avg(string $table, string $avgfield, $field = '', $as = '')
    {
        if (is_array($field)) {
            $field = implode(',', $field,);
        }
        (!empty($as)) ? $this->queryBuilded = sprintf('select %s avg(%s) as %s from %s', $field, $avgfield, $as, $table) :
            $this->queryBuilded = sprintf('select %s avg(%s) from %s', $field, $avgfield, $table);
        return $this;
    }

    /**
     * @param string $table
     * @param string|array $field
     * @param string $as
     * @return $this
     */
    public function count(string $table, string $countfield, $as = '')
    {
        (!empty($as)) ? $this->queryBuilded = sprintf('select count(%s) as %s from %s', $countfield, $as, $table) :
            $this->queryBuilded = sprintf('select count(%s) from %s', $countfield, $table);
        return $this;
    }

    /**
     * @param string $table
     * @param string $maxfield
     * @param string|array $field
     * @param string $as
     * @return $this
     */
    public function max(string $table, string $maxfield, $field = '', $as = '')
    {
        if (is_array($field)) {
            $field = implode(',', $field,);
        }
        (!empty($as)) ? $this->queryBuilded = sprintf('select %s max(%s) as %s from %s', $field, $maxfield, $as, $table) :
            $this->queryBuilded = sprintf('select %s max(%s) from %s', $field, $maxfield, $table);
        return $this;
    }

    /**
     * @param string $table
     * @param string $minfield
     * @param string $field
     * @param string $as
     * @return $this
     */
    public function min(string $table, string $minfield, $field = '', $as = '')
    {
        if (is_array($field)) {
            $field = implode(',', $field,);
        }
        (!empty($as)) ? $this->queryBuilded = sprintf('select %s min(%s) as %s from %s', $field, $minfield, $as, $table) :
            $this->queryBuilded = sprintf('select %s avg(%s) from %s', $field, $minfield, $table);
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

    /**
     * @param int $value
     * @return $this
     */
    public function limit(int $value)
    {
        $this->queryBuilded .= sprintf(' limit %d', $value);
        return $this;
    }

    /**
     * @param array $data
     * @param int $id
     * @return false|int
     */
    public function update(array $data, int $id)
    {
        $fieldsAndValues = [];
        if (!empty($data)) {
            foreach ($data as $key => $value):
                if (!empty($value)) {
                    $fieldsAndValues[] = sprintf('%s=%s', replaceQuotion($key), "'$value'");
                }
            endforeach;
            $fieldsAndValues = implode(',', $fieldsAndValues);
            if ($fieldsAndValues !== '') {
                $statement = sprintf('update %s set %s where %s=%d', $this->table, $fieldsAndValues, $this->primaryKeyStr, $id);
                $result = $this->pdo->exec($statement);
                if ($result) {
                    return $this->find($id);
                }
                return false;
            }
            return false;
        }
        return false;
    }

    /**
     * @return string
     */
    public function getQueryBuilded(): string
    {
        return $this->queryBuilded;
    }
}