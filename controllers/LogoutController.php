<?php

class LogoutController {

  public function index() {
    // Destroy the session
    session_start();
    session_destroy();

    // Redirect to the login page
    header('Location: /login');
    exit();
  }
}
?>
