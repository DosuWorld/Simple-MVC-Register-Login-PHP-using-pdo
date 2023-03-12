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

      }


      // Pass the data to the view
      include('views/dashboard.php');
  }


}
?>
