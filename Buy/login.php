<?php session_start();
 require 'function.php';  $row = '';   $msg = '';

 //  require 'partials/header.php'; 


 if (isset($_POST['btn_submit'])) {  // if button is submitted

     $email  = $_POST['email'];
     $password  = $_POST['password'];

     if ( strlen($email)>0&& strlen($password)>0 ) {
          
       
               // create a connection string
               $connection = mysqli_connect('localhost','root','','jiji_logins',3306);
               // check for the prescence of same email in the DB
               $sql = "SELECT * FROM users_login WHERE email=? and password=?";
               $stmt = mysqli_prepare($connection, $sql);
               mysqli_stmt_bind_param($stmt, 'ss', $email,$password);
               mysqli_stmt_execute($stmt);  
               $rs = mysqli_stmt_get_result($stmt);
               $n_row = mysqli_num_rows($rs);  

               if ($n_row>0) {
                $row = mysqli_fetch_assoc($rs);
                // register user in session
                $_SESSION['log_status']= true;
                foreach($row as $key => $value){
                  $_SESSION[$key] = $value;
                 
                }
                header('location:user/user_profile.php');
               } else {
                 $alert_type = 'alert-danger';
                 $msg = 'Login credentials invalid!';
               }
          
     } else {
        $alert_type = 'alert-danger';
        $msg     = 'Please fill all the required fields';
     }
      

 }


?>




<?php require 'login_nav.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="asset/bootstrap-5.3.2-dist/css/bootstrap.min.css">
    <link rel="shortcut icon" href="asset/images/logo.png" type="image/x-icon">
    <script src="asset/bootstrap-5.3.2-dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="login.css">
    <link rel="shortcut icon" href="asset/images/logo.png" type="image/x-icon">
    <title></title>
</head>
<body>



<div class="body" style="display:flex; align-items:center; justify-content:center;" >
      <div  >
      <?php
            // if there is a message available 
            if(strlen($msg)>0){
              echo '<div class ="alert '.$alert_type.' mb-2"> '.$msg.' </div>';
            }
            ?>
<div class="login-page">
    <div class="form">
      <form class="login-form" action="" method="post">
        <h2></i> Login</h2>
        <input type="email"  name="email" placeholder="Email" required />
        <input type="password" name="password" placeholder="Password" required/>
        <button class="btn" name="btn_submit">
          <span></span>
          <span></span>
          <span></span>
          <span></span>
          Sign in
          </button>
        <p class="message">Not registered? <a href="register.php">Create an account</a></p>
      </form>
    </div>
  </div>
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script src="login.js"></script>




</body>
</html>