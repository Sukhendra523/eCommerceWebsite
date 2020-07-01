    <div class="account-section" id="delete-account">
        <span class="form-title">Do You Realy Want To Delete Your Account ?</span>
        <button type="submit" class="update-btn yes" name="Yes">Yes, I Want To Delete</button>   
        <button type="submit" class="update-btn no" name="No">No, I Dont want To Delete</button>
    </div>


<?php 

$c_email = $_SESSION['customer_email'];

if(isset($_POST['Yes'])){
    
    $delete_customer = "delete from customers where customer_email='$c_email'";
    
    $run_delete_customer = mysqli_query($con,$delete_customer);
    
    if($run_delete_customer){
        
        session_destroy();
        
        echo "<script>alert('Successfully delete your account, feel sorry about this. Good Bye')</script>";
        
        echo "<script>window.open('../index.php','_self')</script>";
        
    }
    
}

if(isset($_POST['No'])){
    
    echo "<script>window.open('my_account.php?my_orders','_self')</script>";
    
}

?>