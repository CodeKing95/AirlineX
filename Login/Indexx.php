<?php
include 'connectlogin.php';

if($_SERVER["REQUEST_METHOD"] == "POST"){

  $username = mysqli_real_escape_string($conn,$_POST['username']);
  $password = $_POST['password'];

  $query = mysqli_query($conn, "SELECT * FROM users WHERE username='$username'");

  if(mysqli_num_rows($query) == 1){
    $user = mysqli_fetch_assoc($query);

    if(password_verify($password, $user['password'])) {
      $_SESSION['user_id'] = $user['id'];
      $_SESSION['username'] = $user['username'];

      header("Location: index.php");
      exit;
    }
  }
  echo"<script>alert('Invalid username or password'); windo.location='index.php';</script>";
}
?>



<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Login and Registration</title>
    <link href="https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="styles.css" />
  </head>

  <body>
    <div class="container">

      <!-- LOGIN FORM -->
      <div class="form-box login">
        <form action="login.php" method="POST">
          <h1>Login</h1>

          <div class="input-box">
            <input type="text" name="username" placeholder="Username" required />
            <i class="bx bxs-user"></i>
          </div>

          <div class="input-box">
            <input type="password" name="password" placeholder="Password" required />
            <i class="bx bxs-lock-alt"></i>
          </div>

          <button type="submit" class="btn">Login</button>
        </form>
      </div>

      <!-- REGISTRATION FORM -->
      <div class="form-box register">
        <form action="register.php" method="POST">
          <h1>Registration</h1>

          <div class="input-box">
            <input type="text" name="fullname" placeholder="Full Name" required />
            <i class="bx bxs-user"></i>
          </div>

          <div class="input-box">
            <input type="text" name="username" placeholder="Create a username" required />
            <i class="bx bxs-user"></i>
          </div>

          <div class="input-box">
            <input type="email" name="email" placeholder="Email" required />
            <i class="bx bxs-envelope"></i>
          </div>

          <div class="input-box">
            <input type="password" name="password" placeholder="Password" required />
            <i class="bx bxs-lock-alt"></i>
          </div>

          <button type="submit" class="btn">Register</button>
        </form>
      </div>

      <!-- SWITCH PANELS -->
      <div class="toggle-box">
        <div class="toggle-panel toggle-left">
          <h1>AirStar Login</h1>
          <p>Don't have an account?</p>
          <button class="btn register-btn">Register</button>
        </div>

        <div class="toggle-panel toggle-right">
          <h1>AirStar Login</h1>
          <p>Already have an account?</p>
          <button class="btn login-btn">Login</button>
        </div>
      </div>

    </div>

    <script src="script.js"></script>
  </body>
</html>
