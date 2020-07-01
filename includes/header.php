<?php 

$block=0;
if ($block==1) { 
  echo "<script>alert('Website blocked')</script>";
  echo "<script>window.open('block.php','_self')</script>";
}
    
session_start();

include("includes/db.php");
include("functions/functions.php");

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <title>KuberCart</title>
  <meta charset="utf-8">

  <!-- mobile responsive meta -->
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

  <!-- ** css Needed for the Project ** -->
  <!-- Bootstrap -->
    <link rel="stylesheet" href="css/bootstrap/bootstrap.css">
  <!-- FontAwesome -->
    
    <!--Slick slider-->
  <link rel="stylesheet" type="text/css" href="css/slick/slick.css"/>
  <!--Add the new slick-theme.css if you want the default styling-->
  <link rel="stylesheet" type="text/css" href="css/slick/slick-theme.css"/>
  <link href = "css/jquery-ui.css" rel = "stylesheet">



    <!-- Main Stylesheet -->
    <link href="css/style.css" rel="stylesheet">

  <!-- Start Slider HEAD section -->
  <link rel="stylesheet" type="text/css" href="engine1/style.css" />
  <script type="text/javascript" src="engine1/jquery.js"></script>
  <!-- End Slider HEAD section --> 
  <script src="js/jquery-ui.js"></script>
  <script src="https://kit.fontawesome.com/da2c9f7a94.js" crossorigin="anonymous"></script>


  <!-- <link rel="icon" href="img/favicon/favicon-32x32.png" type="image/x-icon" />
  <link rel="apple-touch-icon-precomposed" sizes="144x144" href="img/favicon/favicon-144x144.png">
  <link rel="apple-touch-icon-precomposed" sizes="72x72" href="img/favicon/favicon-72x72.png">
  <link rel="apple-touch-icon-precomposed" href="img/favicon/favicon-54x54.png"> -->


</head>
<body>
  <nav>
    <div class="menu-toggle"><i class="fa fa-bars"></i></div>
    <div class="logo">
      <a href="/kubercart">
        LOGO<!-- <img src="img/logo.png" style="width: 100px;height: 50px;vertical-align: top;"> -->
      </a>
    </div>
    <div class="Navbar">
      <ul>
        <li><a href="#">Men</a>
          <ul>
              <?php getM_proCat(); ?>
              <?php getManCat(); ?>
          </ul>
        </li>
        <li><a href="#">Women</a>
          <ul>
            <?php getW_proCat(); ?>
            <?php getWomenCat(); ?>
          </ul>         
        </li>
        <li>
          <a href="shop.php">Shop</a>
        </li>
      </ul>
    </div>

    <div class="action-bar-div">
      <ul class="action-bar">
        <li>
                  <?php 
                   
                   if(!isset($_SESSION['customer_email'])){
                       
                       echo "<a href='checkout.php'><i class='fa fa-user'></i><span>Login</span></a>";
                       
                   }else{
                    $customer_session = $_SESSION['customer_email'];
        
                    $get_customer = "select * from customers where customer_email='$customer_session'";
                    
                    $run_customer = mysqli_query($con,$get_customer);
                    
                    $row_customer = mysqli_fetch_array($run_customer);
                    
                    $customer_image = $row_customer['customer_image'];
                    
                    $customer_name = $row_customer['customer_name'];
                    if($customer_image){
                      echo " <a href='customer/my_account.php?my_orders'><img src='customer/customer_images/$customer_image'></a>
                              <ul>
                                <li><a href='customer/my_account.php?my_orders'>My Order</a></li>
                                <li><a href='customer/my_account.php?edit_account'>My Profile</a></li>
                            <!--<li><a href='customer/my_account.php?wishlist'>My Wishlist</a></li>-->
                                <li><a href='logout.php'>Logout</a></li>
                              </ul>";
                            }else{
                              echo " <a href='customer/my_account.php?my_orders'><img src='img/user.svg'></a>
                              <ul>
                                <li><a href='customer/my_account.php?my_orders'>My Order</a></li>
                                <li><a href='customer/my_account.php?edit_account'>My Profile</a></li>
                            <!--<li><a href='customer/my_account.php?wishlist'>My Wishlist</a></li>-->
                                <li><a href='logout.php'>Logout</a></li>
                              </ul>";
                            }
                       
                       
                       
                   }
                   
                   ?>
          

          
        </li>
        <li><p><?php items(); ?></p><a href="cart.php"><i class="fa fa-shopping-bag"></i><span>Cart</span></a></li>
        <!--<li><a href="my_account.php?wishlist"><i class="fa fa-heart"></i><span>Wishlist</span></a></li>-->
      </ul>
    </div>
    <div class="search-bar-div">
      <form method="get" action="search.php" class="search-bar">
        <input type="search" name="str" class="search-intput" placeholder="T-shirt,jackets,Bottomwear,Sunglasses">
        <button type="submit" class="search-btn"><i class="fa fa-search"></i> Search</button>
      </form>
    </div>
  </nav>
