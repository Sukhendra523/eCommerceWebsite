<?php 
    
    if(!isset($_SESSION['admin_email'])){
        
        echo "<script>window.open('login.php','_self')</script>";
        
    }else{

?>

<?php 

    if(isset($_GET['delete_user'])){
        
        $delete_user_id = $_GET['delete_user'];
        
        $delete_user = "delete from admins where admin_id='$delete_user_id'";
        
        $run_delete = mysqli_query($con,$delete_user);
        
        if($run_delete){
            
            echo "<script>alert('One of your Admins User has been Deleted')</script>";
            
            echo "<script>window.open('index.php?view_users','_self')</script>";
            
        }
        
    }

?>

<?php } ?>