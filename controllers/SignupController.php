<?php

require_once './models/User.php';

class SignupController {
    private $userModel;

    public function __construct($userModel) {
        $this->userModel = $userModel;
    }

    public function index() {
        require 'views/register.php';
    }

    public function create() {
        $username = $_POST['username'];
        $password = $_POST['password'];

        $this->userModel->createUser($username, $password);

        header('Location: /register');
    }
}

?>
