<?php

namespace Model;


use Model\Shema\RelationalShema;
use PDO;

class Model
{
    use RelationalShema;

    /**
     * @var PDO
     */
    private $pdo;
    /**
     * @var array
     */
    private $config;
    /**
     * @var string
     */
    protected $table = "Model";
    /**
     * @var string
     */
    private $self = self::class;
    /**
     * @var string
     */
    protected $primaryKeyStr = "id";

    public function __construct()
    {
        try {
            $pdo = new PDO(sprintf("mysql:host=%s;dbname=%s;charset=utf8",
                getenv('DB_HOST'), getenv('DB_NAME')), getenv('DB_USER'), getenv('DB_PASSWORD'));
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (\PDOException $e) {
            die("Erreur de connexion a la base de donnée =>" . $e->getMessage());
        }
        $this->pdo = $pdo;
        $this->self = get_called_class();
    }

    /**
     * @param $stament
     * @param bool $all
     * @return array|mixed
     */
    public function query($stament, $all = false)
    {
        $queryExec = $this->pdo->query($stament);
        $queryExec->setFetchMode(PDO::FETCH_CLASS, $this->self);
        if ($all) {
            return $queryExec->fetchAll();
        }
        return $queryExec->fetch();
    }

    public function all($precision = "")
    {
        $queryExec = $this->pdo->query("select * from $this->table $precision");
        $queryExec->setFetchMode(PDO::FETCH_CLASS, $this->self);
        return $queryExec->fetchAll();
    }

    public function find($id)
    {
        $queryExec = $this->pdo->query(sprintf("select * from $this->table where $this->primaryKeyStr=%d limit 1", $id));
        $queryExec->setFetchMode(PDO::FETCH_CLASS, $this->self);
        return $queryExec->fetch();
    }

    public function find_many($id)
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