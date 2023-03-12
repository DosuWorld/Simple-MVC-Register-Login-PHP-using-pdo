<?php

// Define your database connection details as constants
define('DB_HOST', 'localhost');
define('DB_NAME', 'aishop');
define('DB_USER', 'root');
define('DB_PASSWORD', '');

class Database {
  private $pdo;

  public function __construct() {
    try {
      $dsn = "mysql:host=".DB_HOST.";dbname=".DB_NAME;
      $this->pdo = new PDO($dsn, DB_USER, DB_PASSWORD);
      $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    } catch (PDOException $e) {
      die("Error connecting to database: " . $e->getMessage());
    }
  }

  public function getConnection() {
    return $this->pdo;
  }
}
?>
