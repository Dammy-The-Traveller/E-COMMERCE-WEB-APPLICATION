<?php session_start(); $log_status = false;  $logged_user_email; $logged_user_first_name;  error_reporting(0) ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="asset/bootstrap-5.3.2-dist/css/bootstrap.min.css">
  <script src="asset/bootstrap-5.3.2-dist/js/bootstrap.bundle.min.js"></script>
  <link rel="shortcut icon" href="asset/images/logo.png" type="image/x-icon">
  <link rel="stylesheet" href="login.css">
  <title></title>
  <?php
// create a connection string
$connection = mysqli_connect('localhost','root','','id22297382_selldot',3306);
if(count($_SESSION)>0){
    $log_status = $_SESSION['log_status'];
    $logged_user_first_name = $_SESSION['first_name']; 
    $logged_user_last_name = $_SESSION['last_name']; 
    $logged_user_id = $_SESSION['user_id']; 
    $logged_user_type = $_SESSION['user_type']; 
 } else {
    $log_status = false;
    $logged_user_first_name = ''; 
    $logged_user_last_name = ''; 
    $logged_user_id = ''; 
    $logged_user_type = ''; 
 }
?>
</head>
<body>
  <nav>
    <div>
      <h1 class="logo">SellDot</h1>
    </div>
    <div class="menu1">
      <ul>
        <li>
          <a href="<?php 
                    if ($log_status == true) {
                      echo 'Buy/Buy_home_veiw.php';
                    }else{
                      echo 'index.php';
                    }
                    ?>" class="active">HOME</a>
        </li>
        <li><a href="#">About</a></li>
        <li><a href="#">Contact</a></li>
        <li><a href="login.php">Login</a></li>
        <li class="margin-r">
          <div class="dropdown categories">
            <span class="dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">Categories</span>
            <ul class="dropdown-menu">
              <li><a class="dropdown-item" href="product_category.php?category=electronics">Electronics</a></li>
              <li><a class="dropdown-item" href="product_category.php?category=phones and accessories">Phones and acessories</a></li>
              <li><a class="dropdown-item" href="product_category.php?category=Food & Beverages">Food & Beverages</a></li>
              <li><a class="dropdown-item" href="product_category.php?category=Clothing">Clothing</a></li>
              <li><a class="dropdown-item" href="product_category.php?category=Furnitures">Furnitures</a></li>
              <li><a class="dropdown-item" href="product_category.php?category=Health and lifestyle">Health and lifestyle</a></li>
              <li><a class="dropdown-item" href="product_category.php?category=Cars & spare parts">Cars & spare parts</a></li>
              <li><a class="dropdown-item" href="product_category.php?category=Laptops & accessories">Laptops & accessories</a></li>
              <li><a class="dropdown-item" href="product_category.php?category=Property">Property</a></li>
              <li><a class="dropdown-item" href="product_category.php?category=Wristwatches">Wristwatches</a></li>
              <li><a class="dropdown-item" href="product_category.php?category=Toys">Toys</a></li>
              <li><a class="dropdown-item" href="product_category.php?category=Refrigerators">Refrigerators</a></li>
              <li><a class="dropdown-item" href="product_category.php?category=Generators">Generators</a></li>
            </ul>
          </div>
        </li>
      </ul>
    </div>
    <div class="search">
      <form id="search-form" role="search" method="get" action="search_results.php">
        <input type="text" placeholder="Search.." name="search_key" aria-label="Search">
        <button type="submit" class="btn-search btn-dark"><img class="img" src="asset/images/OIP__2_-removebg-preview.png" alt="search"></button>
      </form>
    </div>
  </nav>
</body>
</html>