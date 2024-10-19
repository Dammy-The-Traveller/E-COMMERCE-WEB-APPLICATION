<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<link rel="shortcut icon" href="imgs/logo.png" type="image/x-icon">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="asset/bootstrap-5.3.2-dist/css/bootstrap.min.css">
    <script src="asset/bootstrap-5.3.2-dist/js/bootstrap.bundle.min.js"></script>
    <link rel="shortcut icon" href="asset/images/logo.png" type="image/x-icon">
    <link rel="stylesheet" href="jiji_home.veiw.css">
    <title></title>

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

<?php require 'header.php' ?>

<div class="text-white border p-4 text-center" style="background-color:#002f4c;">  
        <p class="display-6">Search result for <ins style="font-style: italic;"><b><q><?=$_GET['search_key']?></q></b></ins></p> 
</div>



<div class="row p-2" style="margin-right: 0px; margin-left: 0px;">
<?php

   // create a connection string
   $connection = mysqli_connect('localhost','root','','id22297382_selldot',3306);
   $searchKey = '%'.$_GET['search_key'].'%';
   

   
 $sql = "SELECT * FROM ad_table WHERE name LIKE ?";
$stmt = mysqli_prepare($connection, $sql);
mysqli_stmt_bind_param($stmt, 's', $searchKey);
mysqli_stmt_execute($stmt);  
$rs = mysqli_stmt_get_result($stmt);
$n_row = mysqli_num_rows($rs);  

if ($n_row>0) {


    while ($row=mysqli_fetch_assoc($rs)) {
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
                 </p>
                 
                   <div class=" hidden-content text-center ">
                                     <button class="btn btn-primary add-to-cart-btn ">Add to Cart</button>
                                     </div>
                                 
                             </div>
                          
                           </div>
                    </div>';
   }
} else {
    echo '<p class="h6 text-center">No record found...</p>';
}


?> 
</div>

</body>
</html>