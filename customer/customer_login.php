<section id="login-form">
  <form id="signin" action="checkout.php" method="post">
  <span class="form-title">Login to Kubercart</span>
  <input type="email" name="c_email" placeholder="Enter your email">
  <input type="password" name="c_pass" placeholder="Enter your password">
  <input type="submit" name="login" class="submit-btn" value="Login">
  <div class="text-container">
    <span><a href="">Forgot Password?</a></span>
    <span>Not a member?&nbsp&nbsp&nbsp<a href="customer_register.php">Create Account</a></span>
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

if(isset($_POST['login'])){
    
    $customer_email = $_POST['c_email'];
    
    $customer_pass = $_POST['c_pass'];
    
    $select_customer = "select * from customers where customer_email='$customer_email' AND customer_pass='$customer_pass'";
    
    $run_customer = mysqli_query($con,$select_customer);
    
    $get_ip = getRealIpUser();
    
    $check_customer = mysqli_num_rows($run_customer);
    
    $select_cart = "select * from cart where ip_add='$get_ip'";
    
    $run_cart = mysqli_query($con,$select_cart);
    
    $check_cart = mysqli_num_rows($run_cart);
    
    if($check_customer==0){
        
        echo "<script>alert('Your email or password is wrong')</script>";
        
        exit();
        
    }
    
    if($check_customer==1){
        
        $_SESSION['customer_email']=$customer_email;

       echo "<script>window.open('customer/my_account.php?edit_account','_self')</script>";
        
    }else{
        
        $_SESSION['customer_email']=$customer_email;
        
       echo "<script>alert('You are Logged in')</script>"; 
        
       echo "<script>window.open('checkout.php','_self')</script>";
        
    }
    
}

?>