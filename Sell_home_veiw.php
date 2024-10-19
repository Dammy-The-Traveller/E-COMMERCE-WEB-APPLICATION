<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="asset/bootstrap-5.3.2-dist/css/bootstrap.min.css">
    <script src="./asset/bootstrap-5.3.2-dist/js/bootstrap.bundle.min.js"></script>
    <link rel="shortcut icon" href="asset/images/logo.png" type="image/x-icon">
    <link rel="stylesheet" href="Sell_home_veiw.css">
    <title>SellDot</title>
    <style>
         .card-img-top {
             height: 260px;
             border-radius: 30px;
         }
        .card{
          max-height: 600px;
 height: 500px;
        }
        .card:hover .hidden-content {
    display: block; 
}
    </style>
</head>
<body>
<?php
// create a connection string
$connection = mysqli_connect('localhost','root','','id22297382_selldot',3306);

?>
<div class="body">

<?php require 'Sell_home_Nav.php' ?>

<div class="card-1" >
       <div class="card-img-overlay">
       <h2 id="h2" class="display-1 pt-3">Sell With Us!</h2>
        <p class="lead" id="h4" >Welcome to SellDot, where selling meet seamlessly! Dive into our platform to discover a vibrant marketplace where you can effortlessly buy and sell a wide array of products. Whether you're on the hunt for unique treasures or looking to turn your items into cash. </p>
        
        <?php 
                      if ($log_status) {
                        echo '
                        <p class="mb-0 border-top w-75 mx-auto pt-5 " id="btn-p">
                        <a href="user/dashboard.php" class="btn btn-lg btn-outline-light w-25" style=" margin-top: 350px;margin-left: -4rem; margin-right: 90px;">Dashboard</a>
                      
                   </p>';
                    }else{
                        echo '  <p class="mb-0 border-top w-75 mx-auto pt-5 " id="btn-p">
                        <a href="login.php" class="btn btn-lg btn-outline-light w-25" style=" margin-top: 350px;margin-left: -4rem; margin-right: 90px;">Login</a>
                        <a href="register.php" class="btn btn-lg btn-light w-25" style=" margin-top: 350px;margin-left: -4rem; margin-right: 90px;">Register</a>
                   </p>';
                    }
          ?>          
       </div>
</div>
</div>

<div class="row p-2"  style="margin-right: 0px; margin-left: 0px;">


   <?php 

    
        

          if ($logged_user_type=='admin') {
            $sql = "SELECT * FROM ad_table  WHERE status='active'";
          } elseif ($logged_user_type=='') {
            $sql = "SELECT * FROM ad_table";
          }else{
            $sql = "SELECT * FROM ad_table WHERE user_id='$logged_user_id' and status='active'" ;
          }
           //  $sql = "SELECT * FROM ad_table WHERE status='active'";
           $result = mysqli_query($connection, $sql);
            $n_row  = mysqli_num_rows($result);  

           if ($n_row>0) {

         while ($row=mysqli_fetch_assoc($result)) {
              $name = $row['name'];
               $category = $row['category'];
               $brand = $row['brand'];
               $price = $row['price'];
               $status = $row['status'];
               $description = $row['description'];
               $timestamp = $row['timestamp'];
               $img_name = $row['img_name'];
               $imgUrl = 'ad_pictures/'.$img_name;
               
               if (strlen($name)>25) {
                $name = substr($name, 0,22).' ...';
             }       

                    if (strlen($description)>90) {
                     $description = substr($description, 0,90).' ...';
                  }       

         echo ' <div class="col-md-3 ad">
                    <div class="card">
                      <img src="user/ad_pictures/'.$img_name.'" alt="" class="card-img-top p-3">
                        <div class="card-body  d-flex flex-column justify-content-between">
                         <h4 class="name mb-1">'.$name.'</h4>
                            <p class="mb-0">
                                <small class="Price">
                                    Price: &#8358; <b>'.$price.'</b> <br> 
                                    
                                </small>
                                <p class="description">
                                '.$description.'
                                </p>
                            </p>';
          if ($_SESSION['log_status']!=true) {
                              echo ' <div class=" hidden-content text-center ">
                              <button class="btn btn-primary add-to-cart-btn ">Add to Cart</button>
                              </div>';
                }
                          
                      echo  '</div>
                   
                    </div>
             </div>';







              }
       
        }
       ?>


   </div>

</body>
</html>