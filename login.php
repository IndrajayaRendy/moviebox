<?php
   session_start();
   
   require_once 'koneksi.php';
   
   if ($_SERVER["REQUEST_METHOD"] == "POST") {
       $username = $_POST['username'];
       $password = $_POST['password'];
   
       $stmt = $conn->prepare("SELECT id, username, password, role FROM users WHERE username = ?");
       $stmt->bind_param("s", $username);
       $stmt->execute();
       $stmt->store_result();
   
       if ($stmt->num_rows > 0) {
           $stmt->bind_result($user_id, $username, $hashed_password, $role);
           $stmt->fetch();
   
           if (password_verify($password, $hashed_password)) {
               $_SESSION['user_id'] = $user_id;
               $_SESSION['username'] = $username;
               $_SESSION['role'] = $role;
               header("Location: datatable.php");
               exit();
           } else {
               $login_error = "Invalid username or password";
           }
       } else {
           $login_error = "Invalid username or password";
       }
   
       $stmt->close();
   }
   ?>
<!DOCTYPE html>
<html lang="en">
   <head>
      <meta charset="UTF-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <title>Login</title>
      <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
   </head>
   <body>
      <body style="background-color: #ff6600;">
         <div class="container mt-5">
         <img src="22222.png" class="rounded mx-auto d-block" alt="logo">
         <div class="card-body">
         <div class="card mx-auto" style="max-width: 600px;">
         <div class="card-header">
            <h2 class="mb-0">Login</h2>
            <br>
            <?php
               if (isset($login_error)) {
                   echo "<div class='alert alert-danger'>$login_error</div>";
               }
               ?>
            <form action="login.php" method="POST">
               <div class="form-group">
                  <label>Username:</label>
                  <input type="text" class="form-control" name="username" required>
               </div>
               <div class="form-group">
                  <label>Password:</label>
                  <input type="password" class="form-control" name="password" required>
               </div>
               <button type="submit" class="btn btn-primary">Login</button>
               <a href="register.php" class="btn btn-secondary">Register</a>
            </form>
         </div>
   </body>
</html>