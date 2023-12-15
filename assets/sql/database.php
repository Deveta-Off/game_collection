<?php
class Database {
    private static $instance;
    private $connection;
    private $db_host;
    private $db_name;
    private $db_user;
    private $db_password;

    public static function getInstance(){
        if (self::$instance === null){
            self::$instance = new Database();
        }
        return self::$instance;
    }

    private function __construct(){
        $this->db_host = $_ENV['DB_HOST'];
        $this->db_name = $_ENV['DB_NAME'];
        $this->db_user = $_ENV['DB_USER'];
        $this->db_password = $_ENV['DB_PASSWORD'];
        try {
            $this->connection = new PDO("mysql:host=$this->db_host;dbname=$this->db_name", $this->db_user, $this->db_password);
            $this->connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (Exception $e) {
            die('Erreur de connection à la base de données');
        }
    }

    public static function getConnection(){
        return self::getInstance()->connection;
    }
}