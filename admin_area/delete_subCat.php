<?php 
    
    if(!isset($_SESSION['admin_email'])){
        
        echo "<script>window.open('login.php','_self')</script>";
        
    }else{

?>

<?php 

    if(isset($_GET['delete_subCat'])){
        
        $delete_subCat_id = $_GET['delete_subCat'];
        
        $delete_subCat = "delete from product_sub_categories where id='$delete_subCat_id'";
        
        $run_delete = mysqli_query($con,$delete_subCat);
        
        if($run_delete){
            
            echo "<script>alert('One of Your sub Category Has Been Deleted')</script>";
            
            echo "<script>window.open('index.php?view_subCat','_self')</script>";
            
        }
        
    }

?>




<?php } ?>