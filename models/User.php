<?php

require_once 'classes/Database.php';

class User extends Database {

    private $db;

    public function __construct() {
        parent::__construct();
        $this->db = $this->getConnection();
    }

    public function createUser($username, $password) {
        $hashed_password = password_hash($password, PASSWORD_DEFAULT);

        $sql = "INSERT INTO users (username, password, usertype) VALUES (:username, :password, 'user')";
        $stmt = $this->db->prepare($sql);
        $stmt->bindParam(':username', $username);
        $stmt->bindParam(':password', $hashed_password);
        $stmt->execute();

        return $stmt->rowCount();
    }
    public function getUserInfo($username) {
        // Check if the user is authenticated
        if (!isset($_SESSION['username'])) {
            return false;
        } else {
            $usertype = $_SESSION['usertype'];
            $csrf_token = $_SESSION['csrf_token'];

            $userinfo = [
                'username' => $username,
                'usertype' => $usertype,
                'csrf_token' => $csrf_token
            ];

            return $userinfo;
        }
    }
}

?>
