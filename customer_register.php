<?php 


    include("includes/header.php");

?>


<section id="login-form">
<form id="signup" action="customer_register.php" method="post" enctype="multipart/form-data">
  <span class="form-title">Sign Up to IndiaTrendss</span>
  <input type="text" name="c_name" required placeholder="Your Name">
  <input type="email" name="c_email" placeholder="Enter your email" required="">
  <input type="number" name="c_contact" placeholder="Enter your mobile number" required="">
  <input type="password" name="c_pass" placeholder="Enter your password" required="">
  <input type="password" name="confirm-password" placeholder="Confirm your password" required="">
  <input type="submit" name="register" class="submit-btn" value="Register">
  <div class="text-container">
    <span>Already have an account?<a href="checkout.php">&nbsp&nbsp&nbspLogin!</a></span>
  </div>
</form>
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


<?php 

if(isset($_POST['register'])){
    
    $c_name = $_POST['c_name'];
    
    $c_email = $_POST['c_email'];
    
    $c_pass = $_POST['c_pass']; 
    
    $c_contact = $_POST['c_contact'];
    
    $c_address = $_POST['c_address'];

    $c_ip = getRealIpUser();
  
    
    $insert_customer ="insert into customers (customer_name,customer_email,customer_pass,customer_contact,customer_ip) values ('$c_name','$c_email','$c_pass','$c_contact','$c_ip')";
    
    $run_customer = mysqli_query($con,$insert_customer);
  
        
        /// If register without items in cart ///
        
        $_SESSION['customer_email']=$c_email;
        
        echo "<script>alert('You have been Registered Sucessfully')</script>";
        
        echo "<script>window.open('index.php','_self')</script>";

    
}

?>