<aside>
    <div class="sidebar-heading">
        <?php 
        
        $customer_session = $_SESSION['customer_email'];
        
        $get_customer = "select * from customers where customer_email='$customer_session'";
        
        $run_customer = mysqli_query($con,$get_customer);
        
        $row_customer = mysqli_fetch_array($run_customer);
        
        $customer_image = $row_customer['customer_image'];
        
        $customer_name = $row_customer['customer_name'];
        
        if(!isset($_SESSION['customer_email'])){
            
        }else{
            
            if ($customer_image) {
                echo "<img src='customer_images/$customer_image'>";
            }else{
                echo "<img src='img/user.svg'>";
            }

            echo "
            <span>Hello,&nbsp;$customer_name</span>
            ";
            
        }
        
        ?>
        

        <div class="sidebar-toggle"><i class="fa fa-bars"></i></div>    
    </div>
    <ul>
        <li class="<?php if(isset($_GET['my_orders'])){ echo "active"; } ?>">
            <a href="my_account.php?my_orders"><i class="fas fa-clipboard-list"></i><span>My Orders</span></a>
        </li>
        <li class="<?php if(isset($_GET['edit_account'])){ echo "active"; } ?>">
            <a href="my_account.php?edit_account"><i class="fas fa-user"></i><span>My Profile</span></a>
        </li>
    <!--<li><a href="#mywishlist"><i class="fas fa-heart"></i><span>My Wishlist</span></a></li>-->
        <li class="<?php if(isset($_GET['change_pass'])){ echo "active"; } ?>">
            <a href="my_account.php?change_pass"><i class="fas fa-exchange-alt"></i><span>Change Password</span></a>
        </li>
        <li class="<?php if(isset($_GET['delete_account'])){ echo "active"; } ?>">
            <a href="my_account.php?delete_account"><i class="fas fa-trash-alt"></i><span>Delate Account</span></a>
        </li>
        <li >
            <a href="logout.php"><i class="fas fa-sign-out-alt"></i><span>Log Out</span></a>
        </li>
    </ul>
</aside>