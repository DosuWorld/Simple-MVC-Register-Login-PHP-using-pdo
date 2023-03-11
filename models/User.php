<?php

require_once 'classes/Database.php';

class User extends Database {

    private $db;

    public function __construct() {
        $this->db = parent::__construct();
    }

    public function createUser($username, $password) {
        $hashed_password = password_hash($password, PASSWORD_DEFAULT);

        $sql = "INSERT INTO users (username, password) VALUES (:username, :password)";
        $stmt = $this->db->prepare($sql);
        $stmt->bindParam(':username', $username);
        $stmt->bindParam(':password', $hashed_password);
        $stmt->execute();

        return $stmt->rowCount();
    }

}

?>
