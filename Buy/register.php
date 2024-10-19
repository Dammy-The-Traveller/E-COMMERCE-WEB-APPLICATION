<?php 
include('database.php');

 require 'login_nav.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="shortcut icon" href="asset/images/logo.png" type="image/x-icon">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="asset/bootstrap-5.3.2-dist/css/bootstrap.min.css">
    <script src="asset/bootstrap-5.3.2-dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="register.css">
    <link rel="shortcut icon" href="../asset/images/logo.png" type="image/x-icon">
    <title>SellDot</title>
  
</head>
<body>
 

 



<div class="body" style="display:flex; align-items:center; justify-content:center;">
      <div >
      <?php
            // if there is a message available 
            if(strlen($msg)>0){
              echo '<div class ="alert '.$alert_type.' mb-2"> '.$msg.' </div>';
            }
            ?>
        <div class="login-page">
    <div class="form">
      <form class="register-form" action="" method="post">
        <h2></i> Register</h2>
        <input name="first_name" type="text" placeholder="First Name *"  class="form-control" required>
        <input name="last_name" type="text" placeholder="Last name *"  class="form-control" required>
                    <select name="gender" class="select" id="">
                         <option value="male">Male</option>
                         <option value="female">Female</option>
                         <option value="I prefer not to say">I prefer not to say</option>
                    </select>
        <input type="email" class="form-control" placeholder="Email *" name="email" required>
        <input type="tel" class="form-control" placeholder="Telphone *" name="phone" required>
        <input type="password" class="form-control" name="password" placeholder="Password *" id="exampleInputPassword1" required>
        <input type="password" class="form-control" name="confirm_password" placeholder="Confirm Password *" id="exampleInputPassword1" required>
        <button class="btn" name="btn_submit">
          <span></span>
          <span></span>
          <span></span>
          <span></span>
          Create
        </button>
        <p class="message">Already registered? <a href="login.php">Sign In</a></p>
      </form>
    </div>
  </div>
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script src="login.js"></script>
      </div>
</div>
</body>
</html>