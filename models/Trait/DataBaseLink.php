<?php


namespace Model\DataBaseManagement;


use PDO;

/**
 * @property PDO pdo
 * @property false|string self
 */
trait DataBaseLink
{

    public function __construct()
    {
        try {
            $pdo = new PDO(sprintf("mysql:host=%s;dbname=%s;charset=utf8mb4",
                DB_HOST, DB_NAME), DB_USER, DB_PASSWORD);
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (\PDOException $e) {
            die("Erreur de connexion a la base de donnée =>" . $e->getMessage());
        }
        $this->pdo = $pdo;
        $this->self = get_called_class();
    }
}