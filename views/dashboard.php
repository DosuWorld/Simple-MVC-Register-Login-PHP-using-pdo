<html>
  <head>
    <title>My Web App</title>
    <link rel="stylesheet" href="/static/common/styles.css">
  </head>
  <body>
    <h1>Welcome, <span id="username"></span>!</h1>
    <p>Your user type is: <span id="usertype"></span></p>
    <p>CSRF TOKEN : <span id="csrf"> </span></p>
    <a href="/logout">Logout</a>

    <script src="/static/common/thememanager.js"></script>  <!-- Get the js manager  to include content -->
  </body>
</html>
