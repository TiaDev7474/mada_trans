<?php
namespace Application\Config\Database;

class DatabaseConnection
{
    public ?\PDO $database = null;
    public function getConnection(): \PDO
    {
        if ($this->database === null) {
            $this->database = new \PDO('mysql:host=localhost;dbname=mada_trans_strore;charset=utf8', 'root', '');

        }
        return $this->database;
    }
}
?>