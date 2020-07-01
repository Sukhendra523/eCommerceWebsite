<?php 

    $active='Account';
    include("includes/header.php");

?>
           
                <?php 
                
                if(!isset($_SESSION['customer_email'])){
                    
                    include("customer/customer_login.php");
                    
                }else{
                    
                    include("payment_options.php");
                    
                }
                
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