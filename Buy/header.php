<?php session_start(); $log_status = false;  $logged_user_email; $logged_user_first_name; ?>
<link href="../asset/fontawesome-free-6.5.1-web/css/all.min.css" rel="stylesheet">
<style>
    .categories {
        padding-top: 8px;
    }
</style>
<?php
// create a connection string
$connection = mysqli_connect('localhost','root','','id22297382_selldot',3306);


  // if all is well --> proceed to fetch the useer data from session
  if(count($_SESSION)>0){

    $log_status = $_SESSION['log_status'];
    $logged_user_first_name = $_SESSION['first_name']; 
    $logged_user_last_name = $_SESSION['last_name']; 
    $logged_user_id = $_SESSION['users_id']; 
    $logged_user_type = $_SESSION['user_type']; 
 
 }
?>
<nav>
        <div>
            <h1 class="logo">SellDot</h1>
        </div>
        <div class="menu1">
            <ul>
                <li>
                    <a href=" <?php 
                    if ($log_status == true) {
                      echo 'Buy_home_veiw.php';
                    }else{
                      echo '../index.php';
                    }
                    ?>" class="active" >HOME</a>
                </li>
                <li><a href="#" >About</a></li>
                <li><a href="#">Contact</a></li>
                <li><a href="login.php">
                    <?php 
                      if ($log_status) {
                        echo '
                          <button class="btn btn-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                          <i class="fa-solid fa-cart-shopping"></i> '.$logged_user_first_name.'
                          </button>';
                    }else{
                        echo 'Login';
                    }
                    ?></a></li>
                <li  class="margin-r">
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

            <form  role="search" method="get" action="search_results.php">
                <input type="text" placeholder="Search.." name="search_key"  aria-label="Search">
                <button type="submit" class="btn-search btn-dark"><img class="img" src="asset/images/OIP__2_-removebg-preview.png" alt="search"></button>
            </form>
           
        </div>
</nav>