<?php

// Import the necessary classes
require_once('classes/Database.php');
require_once('controllers/LoginController.php');
require_once('controllers/LogoutController.php');

require_once('controllers/IndexController.php');
require_once('controllers/SignupController.php');
require_once('controllers/DashboardController.php');

// Create a new database connection instance
$db = new Database();

// Create a new instance of the User model and pass in the database connection
$userModel = new User($db->getConnection());


// Create new instances of the Controllers and IndexController


// Login - Logout Controller
$loginController = new LoginController();
$LogoutController = new LogoutController();

// Content Controllers 
$indexController = new IndexController();
$SignupController = new SignupController($userModel);
$DashboardController = new DashboardController();


// Define the routes
$routes = array(
  '/' => function() use ($indexController) {
    // call the index method of the IndexController to display the index view
    $indexController->index();
  },
  '/login' => function() use ($loginController) {
    // call the index method of the LoginController to display the login view
    $loginController->index();
  },
  '/logout' => function() use ($LogoutController) {
    // call the index method of the LogoutController to display the login view
    $LogoutController->index();
  },
  '/register' => function() use ($SignupController) {
    // call the index method of the SignupController to display the login view

    $SignupController->index();
    },
    '/register/create' => function() use ($SignupController) {
      $SignupController->create();
    },
    '/dashboard' => function() use ($DashboardController) {
      // call the index method of the DashboardController to display the dashboard view if the user is logged in

        $DashboardController->index();

          // if the user is not logged in, redirect to the login page

  },
);

// Get the current URL path and call the corresponding route function
$path = $_SERVER['REQUEST_URI'];
if (isset($routes[$path])) {
  $routes[$path]();
} else {
  // display a 404 error if the route is not found
  http_response_code(404);
  echo "404 Not Found";
}
?>
