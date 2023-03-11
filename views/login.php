<!DOCTYPE html>
<html>
  <head>
    <title>Login</title>
  </head>
  <body>
    <h1>Login</h1>
    <?php if (isset($error)): ?>
      <p style="color: red;"><?php echo $error; ?></p>
    <?php endif; ?>
    <form method="post" action="/login">
      <div>
        <label for="username">Username:</label>
        <input type="text" name="username" id="username" required>
      </div>
      <div>
        <label for="password">Password:</label>
        <input type="password" name="password" id="password" required>
      </div>
      <button type="submit">Log in</button>
    </form>
  </body>
</html>
