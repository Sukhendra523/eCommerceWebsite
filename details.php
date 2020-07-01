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

<?php 
add_cart();
if(isset($_GET['pro_id'])){
    
    $product_id = $_GET['pro_id'];
    
    $get_product = "select * from products where product_id='$product_id'";
    
    $run_product = mysqli_query($con,$get_product);
    
    $row_products = mysqli_fetch_array($run_product);

    $cat_id = $row_products['cat_id'];
    
    $p_cat_id = $row_products['p_cat_id'];

    $p_sub_cat_id = $row_products['p_sub_cat_id'];
    
    $pro_title = $row_products['product_title'];
    
    $pro_price = $row_products['product_price'];

    $pro_sale_price = $row_products['product_sale'];
    
    $pro_desc = $row_products['product_desc'];
    
    $pro_img1 = $row_products['product_img1'];
    
    $pro_img2 = $row_products['product_img2'];
    
    $pro_img3 = $row_products['product_img3'];

    $pro_img4 = $row_products['product_img4'];
        
    $pro_label = $row_products['product_label'];

    $pro_color1 = $row_products['product_color1'];
    $pro_color2 = $row_products['product_color2'];
    $pro_color3 = $row_products['product_color3'];
    $pro_color4 = $row_products['product_color4'];

    $pro_size1 = $row_products['product_size1'];
    $pro_size2 = $row_products['product_size2'];
    $pro_size3 = $row_products['product_size3'];
    $pro_size4 = $row_products['product_size4'];

    if($pro_label == ""){

    }else{

        $product_label = "
        
            <a href='#' class='label $pro_label'>
            
                <div class='theLabel'> $pro_label </div>
                <div class='labelBackground'>  </div>
            
            </a>
        
        ";

    }
    $get_cat = "select * from categories where cat_id='$cat_id'";
    
    $run_cat = mysqli_query($con,$get_cat);
    
    $row_cat = mysqli_fetch_array($run_cat);
    
    $cat_title = $row_cat['cat_title'];

    $get_p_cat = "select * from product_categories where p_cat_id='$p_cat_id'";
    
    $run_p_cat = mysqli_query($con,$get_p_cat);
    
    $row_p_cat = mysqli_fetch_array($run_p_cat);
    
    $p_cat_title = $row_p_cat['p_cat_title'];

    $get_p_subcat = "select * from product_sub_categories where id='$p_sub_cat_id'";
    
    $run_p_subcat = mysqli_query($con,$get_p_subcat);
    
    $row_p_subcat = mysqli_fetch_array($run_p_subcat);
    
    $p_cat_subtitle = $row_p_subcat['title'];
    
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Detail Page</title>
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




    <!-- Main Stylesheet -->
    <link href="css/style.css" rel="stylesheet">

 
  <!-- Start WOWSlider.com HEAD section -->
  <link rel="stylesheet" type="text/css" href="detail/engine1/style.css" />
  <script type="text/javascript" src="detail/engine1/jquery.js"></script>
  <!-- End WOWSlider.com HEAD section -->

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
      <form method="post" action="result.php" class="search-bar">
        <input type="search" name="keywords" class="search-intput" placeholder="T-shirt,jackets,Bottomwear,Sunglasses">
        <button type="submit" name="search" class="search-btn"><i class="fa fa-search"></i> Search</button>
      </form>
    </div>
  </nav>

<section class="" id="detail">
  <div class="link-breadcrumb">
    <ul>
      <li><a href="index.php">Home</a></li>
      <li><a href="shop.php">Shop</a></li>
      <li><a href="shop.php?cat=<?php echo $cat_id; ?>"><?php echo $cat_title; ?></a></li>
      <li><a href="shop.php?p_cat=<?php echo $p_cat_id; ?>"><?php echo $p_cat_title; ?></a></li>
      <li><a href="shop.php?p_cat=<?php echo $p_sub_cat_id; ?>"><?php echo $p_cat_subtitle; ?></a></li>
      <li> <?php echo $pro_title; ?> </li>
    </ul>
  </div>

  <div class="detail-container">
    <div class="product-image-slider">
      <!-- Start Slider BODY section -->
      <div id="wowslider-container1">
      <div class="ws_images"><ul>
          <li><img src="admin_area/product_images/<?php echo $pro_img1; ?>" alt="" title="" id="wows1_0"/></li>
          <li><img src="admin_area/product_images/<?php echo $pro_img2; ?>" alt="" title="" id="wows1_1"/></li>
          <li><img src="admin_area/product_images/<?php echo $pro_img3; ?>" alt="" title="" id="wows1_2"/></li>
          <li><img src="admin_area/product_images/<?php echo $pro_img1; ?>" alt="" title="" id="wows1_3"/></li>
        </ul>
      </div>
      <div class="ws_thumbs">
      <div>
          <a href="#" title=""><img src="admin_area/product_images/<?php echo $pro_img1; ?>" alt="" /></a>
          <a href="#" title=""><img src="admin_area/product_images/<?php echo $pro_img2; ?>" alt="" /></a>
          <a href="#" title=""><img src="admin_area/product_images/<?php echo $pro_img3; ?>" alt="" /></a>
          <a href="#" title=""><img src="admin_area/product_images/<?php echo $pro_img1; ?>" alt="" /></a>
      </div>
      </div>

      <div class="ws_shadow"></div>
      </div>
      <script type="text/javascript" src="detail/engine1/wowslider.js"></script>
      <script type="text/javascript" src="detail/engine1/script.js"></script>
      <!-- End Slider BODY section -->
    </div>

    <div class="product-detail">
      <h3 class="product-title"><?php echo $pro_title; ?></h3>
      <span class="product-price">&#8377;<?php echo $pro_price; ?></span>
      <ul>
        <li>Suitable For Daily Wear</li>
        <li>Delivered In 7-10 Business Days.</li>
        <li>Previews Will Be Sent On Your Email ID</li>
        <li>Once Confirmed We Shall Print & Dispatch The Product.</li>
        <li>For Bulk Orders Please Mail Us At Corporate@rayatcart.com</li>
      </ul>
      
      <form action="details.php?add_cart=<?php echo $product_id; ?>" method="post">
        
        <div class="color">
        <span>Color</span>
          <label class="<?php echo $pro_color1; ?>" style="<?php if(!$pro_color1) echo 'display: none;'; ?>"><input  class="radio-inp" type="radio" name="product_color" value="<?php echo $pro_color1; ?>"><span></span></label>
          <label class="<?php echo $pro_color2; ?>" style="<?php if(!$pro_color2) echo 'display: none;'; ?>"><input  class="radio-inp" type="radio" name="product_color" value="<?php echo $pro_color2; ?>"><span></span></label>
          <label class="<?php echo $pro_color3; ?>" style="<?php if(!$pro_color3) echo 'display: none;'; ?>"><input class="radio-inp" type="radio" name="product_color" value="<?php echo $pro_color3; ?>"><span></span></label>
          <label class="<?php echo $pro_color4; ?>" style="<?php if(!$pro_color4) echo 'display: none;'; ?>"><input class="radio-inp" type="radio" name="product_color" value="<?php echo $pro_color4; ?>"><span></span></label>
        </div>
        <div class="size">
        <span>Size</span>
          <label style="<?php if(!$pro_size1) echo 'display: none;'; ?>"><input class="radio-inp" type="radio" name="product_size" value="<?php echo $pro_size1; ?>"><span><?php echo $pro_size1; ?></span></label>
          <label style="<?php if(!$pro_size2) echo 'display: none;'; ?>"><input class="radio-inp" type="radio" name="product_size" value="<?php echo $pro_size2; ?>"><span><?php echo $pro_size2; ?></span></label>
          <label style="<?php if(!$pro_size3) echo 'display: none;'; ?>"><input class="radio-inp" type="radio" name="product_size" value="<?php echo $pro_size3; ?>"><span><?php echo $pro_size3; ?></span></label>
          <label style="<?php if(!$pro_size4) echo 'display: none;'; ?>"><input class="radio-inp" type="radio" name="product_size" value="<?php echo $pro_size4; ?>"><span><?php echo $pro_size4; ?></span></label>
        </div>

        <div class="customfile">
          <label>Special Instructions For US</label>
          <textarea name="instruction" placeholder="Please Let Us Know If You Have Any Special Instructions For Us."></textarea>
        </div>
          <input type="number" name="product_qty" value="1">
          <input type="submit" name="submit" value="ADD TO CART">
      </form>
      <div class="product-description">
        <ul>
          <li>Wash Care Instructions:- Machine Wash Cold.</li>
          <li>In Case Of Manufacturing Defect We shall Replace The Product.</li>
          <li>Material :- 100% Cotton (Bio Washed), Preshrunk To Provide A Soft Texture.</li>
          <li><?php echo $pro_desc; ?></li>
        </ul>
      </div>
    </div>
</div>
</section>
         
          

<center>
  <div class="slider-title">
    <h3>Related Product You Might Like</h3>
  </div>
</center>

<section id="products">
  
  <div class="products-slider">
    <?php 
                   
                    $get_products = "select * from products order by rand() LIMIT 0,20";
                   
                    $run_products = mysqli_query($con,$get_products);
                   
                   while($row_products=mysqli_fetch_array($run_products)){
                       
                    $pro_id = $row_products['product_id'];
        
                    $pro_title = $row_products['product_title'];
                    
                    $pro_price = $row_products['product_price'];
            
                    $pro_sale_price = $row_products['product_sale'];
                    
                    $pro_img1 = $row_products['product_img1'];
                    
                    $pro_label = $row_products['product_label'];
                    
                    $manufacturer_id = $row_products['manufacturer_id'];
            
                    $get_manufacturer = "select * from manufacturers where manufacturer_id='$manufacturer_id'";
            
                    $run_manufacturer = mysqli_query($db,$get_manufacturer);
            
                    $row_manufacturer = mysqli_fetch_array($run_manufacturer);
            
                    $manufacturer_title = $row_manufacturer['manufacturer_title'];
            
                    if($pro_label == "sale"){
            
                        $product_price = "  $pro_price";
            
                        $product_sale_price = " $pro_sale_price ";
            
                    }else{
            
                        $product_price = " $pro_price  ";
            
                        $product_sale_price = "";
            
                    }
            
                    if($pro_label == ""){
            
                    }else{
            
                        $product_label = "
                        
                            <a href='#' class='label $pro_label'>
                            
                                <div class='theLabel'> $pro_label </div>
                                <div class='labelBackground'>  </div>
                            
                            </a>
                        
                        ";
            
                    }
                    
                    echo "
                    
                    <a href='details.php?pro_id=$pro_id'>
                    <div>
                        <img src='admin_area/product_images/$pro_img1'>
                        <p>$pro_title<br>&#8377; $product_price </p>
                    </div>
                    </a>";
                       
                   }
                   
                   ?>
    
  </div>
</section>

<section id="e-commerce-features">
  <ul>
    <li>
      <a href="">
      <i class="fa fa-truck"></i>
      <span>Speed Dilevry</span>
      </a>
    </li>
    <li>
      <a href="">
      <i class="fas fa-piggy-bank"></i>
      <span>Low Price</span>
      </a>
    </li>
    <li>
      <a href="">
      <i class="fas fa-rupee-sign"></i>
      <span>Cash On Dilevry</span>
      </a>
    </li>
    <li>
      </a>
      <a href="">
      <i class="fas fa-headset"></i>
      <span>24/7 Support</span>
      </a>
    </li>     
  </ul>
</section>
   
   <?php 
    
    include("includes/footer.php");
    
    ?>


<!-- jQuery -->
<script src="css/jQuery/jquery.js"></script>

<script type="text/javascript" src="css/slick/slick.js"></script>
<!-- Bootstrap JS -->
<script src="css/bootstrap/bootstrap.js"></script>

<!-- Main Script -->
<script src="js/script.js"></script>
</body>
</html>
