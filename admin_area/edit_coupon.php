<?php 

    if(!isset($_SESSION['admin_email'])){
        
        echo "<script>window.open('login.php','_self')</script>";
        
    }else{

?>

<?php 

if(isset($_GET['edit_coupon'])){

    $edit_id = $_GET['edit_coupon'];
    $edit_coupon = "select * from coupons where coupon_id='$edit_id'";
    $run_edit_coupon = mysqli_query($con,$edit_coupon);
    $row_edit_coupon = mysqli_fetch_array($run_edit_coupon);

    $coup_id = $row_edit_coupon['coupon_id'];
    $coup_title = $row_edit_coupon['coupon_title'];
    $coup_price = $row_edit_coupon['coupon_price'];
    $coup_code = $row_edit_coupon['coupon_code'];
    $coup_limit = $row_edit_coupon['coupon_limit'];
    $coup_used = $row_edit_coupon['coupon_used'];
    $prod_id = $row_edit_coupon['product_id'];

    $get_products = "select * from products where product_id='$prod_id'";
    $run_products = mysqli_query($con,$get_products);
    $row_products = mysqli_fetch_array($run_products);

    $product_id = $row_products['product_id'];
    $product_title = $row_products['product_title'];

}

?>
    
<div class="row"><!-- row Begin -->
    
    <div class="col-lg-12"><!-- col-lg-12 Begin -->
        
        <ol class="breadcrumb"><!-- breadcrumb Begin -->
            
            <li class="active"><!-- active Begin -->
                
                <i class="fa fa-dashboard"></i> Dashboard / Edit Coupons
                
            </li><!-- active Finish -->
            
        </ol><!-- breadcrumb Finish -->
        
    </div><!-- col-lg-12 Finish -->
    
</div><!-- row Finish -->
       
<div class="row"><!-- row Begin -->
    
    <div class="col-lg-12"><!-- col-lg-12 Begin -->
        
        <div class="panel panel-default"><!-- panel panel-default Begin -->
            
           <div class="panel-heading"><!-- panel-heading Begin -->
               
               <h3 class="panel-title"><!-- panel-title Begin -->
                   
                   <i class="fa fa-money fa-fw"></i> Edit Coupons 
                   
               </h3><!-- panel-title Finish -->
               
           </div> <!-- panel-heading Finish -->
           
           <div class="panel-body"><!-- panel-body Begin -->
               
               <form method="post" class="form-horizontal"><!-- form-horizontal Begin -->
                   
                   <div class="form-group"><!-- form-group Begin -->
                       
                      <label class="col-md-3 control-label"> Coupon Title </label> 
                      
                      <div class="col-md-6"><!-- col-md-6 Begin -->
                          
                          <input value="<?php echo $coup_title; ?>" name="coupon_title" type="text" class="form-control" required>
                          
                      </div><!-- col-md-6 Finish -->
                       
                   </div><!-- form-group Finish -->
                   
                   <div class="form-group"><!-- form-group Begin -->
                       
                      <label class="col-md-3 control-label"> Coupon Price </label> 
                      
                      <div class="col-md-6"><!-- col-md-6 Begin -->
                          
                          <input value="<?php echo $coup_price; ?>" name="coupon_price" type="text" class="form-control" required>
                          
                      </div><!-- col-md-6 Finish -->
                       
                   </div><!-- form-group Finish -->
                   
                   <div class="form-group"><!-- form-group Begin -->
                       
                      <label class="col-md-3 control-label"> Coupon Limit </label> 
                      
                      <div class="col-md-6"><!-- col-md-6 Begin -->
                          
                          <input name="coupon_limit" type="number" class="form-control" value="<?php echo $coup_limit; ?>">
                          
                      </div><!-- col-md-6 Finish -->
                       
                   </div><!-- form-group Finish -->
                   
                   <div class="form-group"><!-- form-group Begin -->
                       
                      <label class="col-md-3 control-label"> Select Product </label> 
                      
                      <div class="col-md-6"><!-- col-md-6 Begin -->
                          
                          <select name="product_id" class="form-control" required>
                          
                            <option value="<?php echo $product_id; ?>"><?php echo $product_title; ?></option>

                            <?php 
                            
                                $get_p = "select * from products";
                                $run_p = mysqli_query($con,$get_p);

                                while($row_p = mysqli_fetch_array($run_p)){

                                    $p_id = $row_p['product_id'];
                                    $p_title = $row_p['product_title'];

                                    echo "<option value='$p_id'>$p_title</option>";

                                }
                            
                            ?>
                          
                          </select>
                          
                      </div><!-- col-md-6 Finish -->
                       
                   </div><!-- form-group Finish -->
                   
                   <div class="form-group"><!-- form-group Begin -->
                       
                      <label class="col-md-3 control-label"> Coupon Code </label> 
                      
                      <div class="col-md-6"><!-- col-md-6 Begin -->
                          
                          <input value="<?php echo $coup_code; ?>" name="coupon_code" type="text" class="form-control" required>
                          
                      </div><!-- col-md-6 Finish -->
                       
                   </div><!-- form-group Finish -->
                   
                   <div class="form-group"><!-- form-group Begin -->
                       
                      <label class="col-md-3 control-label"></label> 
                      
                      <div class="col-md-6"><!-- col-md-6 Begin -->
                          
                          <input name="update" value="Edit Coupon" type="submit" class="btn btn-primary form-control">
                          
                      </div><!-- col-md-6 Finish -->
                       
                   </div><!-- form-group Finish -->
                   
               </form><!-- form-horizontal Finish -->
               
           </div><!-- panel-body Finish -->
            
        </div><!-- canel panel-default Finish -->
        
    </div><!-- col-lg-12 Finish -->
    
</div><!-- row Finish -->

<?php 

if(isset($_POST['update'])){

    $coupon_title = $_POST['coupon_title'];
    $coupon_price = $_POST['coupon_price'];
    $coupon_code = $_POST['coupon_code'];
    $coupon_limit = $_POST['coupon_limit'];
    $coupon_pro_id = $_POST['product_id'];

    $update_coupon = "update coupons set product_id='$coupon_pro_id',coupon_title='$coupon_title',coupon_price='$coupon_price',coupon_code='$coupon_code',coupon_limit='$coupon_limit',coupon_used='$coup_used' where coupon_id='$coup_id'";
    $run_update_coupon = mysqli_query($con,$update_coupon);

    if($run_update_coupon){

        echo "<script>alert('Your Coupon Has Been Updated')</script>";
        echo "<script>window.open('index.php?view_coupons','_self')</script>";

    }


}

?>

<?php } ?>