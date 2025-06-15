<?php
define('DB_HOST', 'localhost');
define('DB_USER', 'root');
define('DB_PASS', '');
define('DB_NAME', 'yurt_bakim');

class Database {
    private $connection;

    public function __construct() {
        $this->connection = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);
        if ($this->connection->connect_error) {
            die("Bağlantı hatası: " . $this->connection->connect_error);
        }
        $this->connection->set_charset("utf8mb4");    //türkçe ve emoji desteği
    }

    public function getConnection() {
        return $this->connection;
    }
}
?>