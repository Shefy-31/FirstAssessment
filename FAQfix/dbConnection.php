<?php
class Database {
    private $host = "localhost";
    private $username = "root";
    private $password = "ceymox123";
    private $database = "DB1";

    protected $connection;

    public function __construct() {
        $this->connection = new mysqli($this->host, $this->username, $this->password, $this->database);
        if ($this->connection->connect_error) {
            die("Connection failed: " . $this->connection->connect_error);
        }
    }
}
?>
