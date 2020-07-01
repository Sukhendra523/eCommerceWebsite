<?php 
$block=0;
if ($block==1) { 
  echo "<script>alert('Website blocked')</script>";
  echo "<script>window.open('../block.php','_self')</script>";
}
session_start();

include("includes/db.php");
include("functions/functions.php");

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <title>Kubercart</title>
    <meta charset="utf-8">

     <!-- mobile responsive meta -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

    <!-- ** css Needed for the Project ** -->
   <!-- Bootstrap -->
    <link rel="stylesheet" href="css/bootstrap/bootstrap.css">
  <!-- FontAwesome -->





    <!-- Main Stylesheet -->
    <link href="css/style.css" rel="stylesheet">


  <script src="https://kit.fontawesome.com/da2c9f7a94.js" crossorigin="anonymous"></script>


   <!-- <link rel="icon" href="img/favicon/favicon-32x32.png" type="image/x-icon" />
  <link rel="apple-touch-icon-precomposed" sizes="144x144" href="img/favicon/favicon-144x144.png">
  <link rel="apple-touch-icon-precomposed" sizes="72x72" href="img/favicon/favicon-72x72.png">
  <link rel="apple-touch-icon-precomposed" href="img/favicon/favicon-54x54.png"> -->


</head>
<body>
  <nav>
    <div class="menu-toggle"><i class="fa fa-bars"></i></div>
    <div class="logo"><a href="https://kubercart.com/"><img src="../img/logo.png" style="width: 100px;height: 50px;vertical-align: top;"></a></div>
    <div class="Navbar">
      <ul>
        <li><a href="#">Men</a>
          <ul>
              <?php getPCats(); ?>
          </ul>
        </li>
        <li><a href="#">Women</a>
          <ul>
            <li><a href="../shop.php">Topwear</a></li>
            <li><a href="../shop.php">Bottomwear</a></li>
            <li><a href="../shop.php">Footwear</a></li>
            <li><a href="../shop.php">Festive Wear</a></li>
            <li><a href="../shop.php">Innerwear</a></li>
          </ul>         
        </li>
        <li><a href="#">Accessories</a>
          <ul>
            <li><a href="../shop.php">Wallets</a></li>
            <li><a href="../shop.php">Belts</a></li>
            <li><a href="../shop.php">Sunglasses</a></li>
            <li><a href="../shop.php">Wristwear</a></li>
            <li><a href="../shop.php">Cap & Hats</a></li>
          </ul>         
        </li>
        <li><a href="../custom_shop.php">Customized</a>
        </li>
        <li><a href="#">Categories</a>
          <ul>
            <?php getCats(); ?>
          </ul>
        </li>
      </ul>
    </div>

    <div class="action-bar-div">
      <ul class="action-bar">
        <li>
                  <?php 
                   
                   if(!isset($_SESSION['customer_email'])){
                       
                       echo "<a href='../checkout.php'><i class='fa fa-user'></i><span>Login</span></a>";
                       
                   }else{
                    $customer_session = $_SESSION['customer_email'];
        
                    $get_customer = "select * from customers where customer_email='$customer_session'";
                    
                    $run_customer = mysqli_query($con,$get_customer);
                    
                    $row_customer = mysqli_fetch_array($run_customer);
                    
                    $customer_image = $row_customer['customer_image'];
                    
                    $customer_name = $row_customer['customer_name'];
                    if($customer_image){
                      echo " <a href='my_account.php?my_orders'><img src='customer_images/$customer_image'></a>
                              <ul>
                                <li><a href='my_account.php?my_orders'>My Order</a></li>
                                <li><a href='my_account.php?edit_account'>My Profile</a></li>
                            <!--<li><a href='my_account.php?wishlist'>My Wishlist</a></li>-->
                                <li><a href='logout.php'>Logout</a></li>
                              </ul>";
                            }else{
                              echo " <a href='my_account.php?my_orders'><img src='img/user.svg'></a>
                              <ul>
                                <li><a href='my_account.php?my_orders'>My Order</a></li>
                                <li><a href='my_account.php?edit_account'>My Profile</a></li>
                            <!--<li><a href='my_account.php?wishlist'>My Wishlist</a></li>-->
                                <li><a href='logout.php'>Logout</a></li>
                              </ul>";
                            }
                       
                       
                       
                   }
                   
                   ?>
          

          
        </li>
        <li><p><?php items(); ?></p><a href="../cart.php"><i class="fa fa-shopping-bag"></i><span>Cart</span></a></li>
        <!--<li><a href="my_account.php?wishlist"><i class="fa fa-heart"></i><span>Wishlist</span></a></li>-->
      </ul>
    </div>
    <div class="search-bar-div">
      <form method="post" action="../result.php" class="search-bar">
        <input type="search" name="keywords" class="search-intput" placeholder="T-shirt,jackets,Bottomwear,Sunglasses">
        <button type="submit" name="search" class="search-btn"><i class="fa fa-search"></i> Search</button>
      </form>
    </div>
  </nav>
