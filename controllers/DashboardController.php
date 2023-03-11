<?php

require_once './models/User.php';

class DashboardController {

  public function index() {
    // Check if the user is authenticated
    session_start();
    if (!isset($_SESSION['username'])) {
      // Redirect to the login page
      header('Location: /login');
      exit();

    } else {

      $username = $_SESSION['username'];
      $usertype = $_SESSION['usertype'];

      // User is authenticated, pass the data to the view
      $userinfo = [
        'username' => $username,
        'usertype' => $usertype
      ];
      include('views/dashboard.php');
    }


  }
}
?>
