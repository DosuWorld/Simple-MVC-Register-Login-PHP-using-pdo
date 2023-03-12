<?php
class LoginController extends Database {

  public function index() {
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
      // process the login form submission
      $username = $_POST['username'];
      $password = $_POST['password'];


      // query the database to check if the user exists
      $stmt = $this->getConnection()->prepare('SELECT * FROM users WHERE username = :username');
      $stmt->execute(array(
        'username' => $username
      ));
      $user = $stmt->fetch(PDO::FETCH_ASSOC);

      if ($user && password_verify($password, $user['password'])) {
        // login successful, set session variables and redirect to home page
        session_start();
        $_SESSION['csrf_token'] = bin2hex(random_bytes(32));
        $_SESSION['username'] = $user['username'];
        $_SESSION['usertype'] = $user['usertype'];

        header('Location: /dashboard');
        exit();
      } else {
        // login failed, display error message
        $error = 'Invalid username or password.';
        include('views/login.php');
      }
    } else {
      // display the login form
      include('views/login.php');
    }
  }
}
?>
