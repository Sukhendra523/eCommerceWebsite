<?php 

$success_msg="Subscribe now to get updates on promotions and coupons";
if (isset($_POST['subscribe'])) {
	$email= mysqli_real_escape_string($con,$_POST['email']);

	$sql="INSERT INTO newsletter(email) values('$email')";

	$result=mysqli_query($con,$sql);
	if (!$result) {
		die('Could not post Data'.mysqli_err());
	}
	else{
		$success_msg="Thank You subscribing Us!";
							$subject = "Welcome to my website";
                           $msg = "Thanks for subscribing us!. We will sends you only meaningful information";
                           $headers = "From: kubercart@gmail.com\n"; 
                           $headers .= "Reply-To: kubercart@gmail.com";	
                           mail($email,$subject,$msg,$headers);
	}

}


?>

<footer>
<ul class="footer-ul">
    <li class="footer-ul-li">
        <span>kubercart.com</span>
        <ul>
            <li><a href="">Help/ Support</a></li>
            <li><a href="">FAQ</a></li>
            <li><a href="">About Us</a></li>
            <li><a href="contact.php">Contact Us</a></li>
            <li><a href="../terms.php">Terms</a></li>
        </ul>
    </li>
    <li class="footer-ul-li leading-cat">
        <span>Quick Link</span>
        <ul>
                    <?php 
                    
                        $get_p_cats = "select * from product_categories";
                    
                        $run_p_cats = mysqli_query($con,$get_p_cats);
                    
                        while($row_p_cats=mysqli_fetch_array($run_p_cats)){
                            
                            $p_cat_id = $row_p_cats['p_cat_id'];
                            
                            $p_cat_title = $row_p_cats['p_cat_title'];
                            $pCatTitle=urlencode($p_cat_title);
                            
                            echo "
                            
                                <li>
                                
                                    <a href='../shop.php?subCat=$pCatTitle'>
                                    
                                        $p_cat_title
                                    
                                    </a>
                                
                                </li>
                            
                            ";
                            
                        }
                    
                    ?>
        </ul>
    </li>
    <li class="footer-ul-li leading-cat">
        <span>Leading Categories</span>
        <ul>
                    <?php 
                    
                        $get_cat= "SELECT * FROM `product_sub_categories` WHERE top=1 ORDER BY `id` ASC LIMIT 0,12";
                    
                        $run = mysqli_query($con,$get_cat);
                    
                        while($row=mysqli_fetch_array($run)){
                            
                            $id = $row['id'];
                            
                            $title = $row['title'];
                            $urlTitle=urlencode($title);
                            echo "
                            
                                <li>
                                
                                    <a href='../shop.php?p_cat=$title'>
                                    
                                        $title
                                    
                                    </a>
                                
                                </li>
                            
                            ";
                            
                        }
                    
                    ?>
        </ul>
    </li>
    <li class="footer-ul-li">
        <span>Subscribe to Newsletter</span>
        <form action="" method="post">
            <input type="email" name="email">
            <input type="submit" name="subscribe" value="Subscribe">
        </form>
        <p><?php echo $success_msg;?></p>
    </li>
</ul>
<ul class="footer-ul">
    <li class="footer-connect">
        <i class="fab fa-facebook-square"></i>
        <i class="fab fa-instagram"></i>
        <i class="fab fa-youtube-square"></i>
        <i class="fab fa-whatsapp-square"></i>
    </li>
    <li class="footer-connect">
        <i class="fab fa-cc-visa"></i>
        <i class="fab fa-cc-paypal"></i>
        <i class="fab fa-cc-visa"></i>
        <i class="fab fa-cc-paypal"></i>
        <i class="fab fa-cc-visa"></i>
        <i class="fab fa-cc-paypal"></i>
    </li>
</ul>
<ul class="footer-ul">
    <li class="footer-copyright">
        INDIATRENDS <i class="fa fa-copyright"></i> 2019 CREATED BY - <a href="http://teamimaginer.com">TeamImaginer.com</a> TRADING WEB DEVELOPMENT COMPANY. DELIVERING VALUE FOR YOUR SHOPPING.
    </li>
</ul>
</footer>