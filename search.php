<?php
include("includes/header.php");
 
?>
<section  class="shop-section result">

<div class="shop-row">
<?php

$str=mysqli_real_escape_string($con,$_GET['str']);
if($str!=''){
	search($str);
}else{
	?>
	<script>
	window.location.href='index.php';
	</script>
	<?php
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