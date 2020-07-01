<?php 
    
    if(!isset($_SESSION['admin_email'])){
        
        echo "<script>window.open('login.php','_self')</script>";
        
    }else{

?>

<div class="row"><!-- row 1 begin -->
    <div class="col-lg-12"><!-- col-lg-12 begin -->
        <ol class="breadcrumb"><!-- breadcrumb begin -->
            <li>
                
                <i class="fa fa-dashboard"></i> Dashboard / Insert Product Category
                
            </li>
        </ol><!-- breadcrumb finish -->
    </div><!-- col-lg-12 finish -->
</div><!-- row 1 finish -->

<div class="row"><!-- row 2 begin -->
    <div class="col-lg-12"><!-- col-lg-12 begin -->
        <div class="panel panel-default"><!-- panel panel-default begin -->
            <div class="panel-heading"><!-- panel-heading begin -->
                <h3 class="panel-title"><!-- panel-title begin -->
                
                    <i class="fa fa-money fa-fw"></i> Insert Product Category
                
                </h3><!-- panel-title finish -->
            </div><!-- panel-heading finish -->
            
            <div class="panel-body"><!-- panel-body begin -->
                <form action="" class="form-horizontal" method="post" enctype="multipart/form-data"><!-- form-horizontal begin -->
                    <div class="form-group"><!-- form-group begin -->
                    
                        <label for="" class="control-label col-md-3"><!-- control-label col-md-3 begin --> 
                        
                            Product Category Title 
                        
                        </label><!-- control-label col-md-3 finish --> 
                        
                        <div class="col-md-6"><!-- col-md-6 begin -->
                        
                            <input name="p_cat_title" type="text" class="form-control">
                        
                        </div><!-- col-md-6 finish -->
                    
                    </div><!-- form-group finish -->

                    <!-- categories -->
                    <div class="form-group"><!-- form-group Begin -->
                       
                       <label class="col-md-3 control-label"> Category </label> 
                       
                       <div class="col-md-6"><!-- col-md-6 Begin -->
                           
                           <select name="cat" class="form-control"><!-- form-control Begin -->
                               
                               <option selected disabled> Select a Category </option>
                               
                               <?php 
                               
                               $get_cat = "select * from categories";
                               $run_cat = mysqli_query($con,$get_cat);
                               
                               while ($row_cat=mysqli_fetch_array($run_cat)){
                                   
                                   $cat_id = $row_cat['cat_id'];
                                   $cat_title = $row_cat['cat_title'];
                                   
                                   echo "
                                   
                                   <option value='$cat_id'> $cat_title </option>
                                   
                                   ";
                                   
                               }
                               
                               ?>
                               
                           </select><!-- form-control Finish -->
                           
                       </div><!-- col-md-6 Finish -->
                        
                    </div><!-- form-group Finish -->
                    
                    <div class="form-group"><!-- form-group 2 begin -->
                    
                        <label for="" class="control-label col-md-3"><!-- control-label col-md-3 begin --> 
                        
                            Choose As Top Manufacturer
                        
                        </label><!-- control-label col-md-3 finish --> 
                        
                        <div class="col-md-6"><!-- col-md-6 begin -->
                        
                            <input name="p_cat_top" type="radio" value="yes">
                            <label>Yes</label>
                        
                            <input name="p_cat_top" type="radio" value="no">
                            <label>No</label>
                        
                        </div><!-- col-md-6 finish -->
                    
                    </div><!-- form-group 2 finish -->
                    
                    <div class="form-group"><!-- form-group 3 begin -->
                    
                        <label for="" class="control-label col-md-3"><!-- control-label col-md-3 begin --> 
                        
                        Product Category Image
                        
                        </label><!-- control-label col-md-3 finish --> 
                        
                        <div class="col-md-6"><!-- col-md-6 begin -->
                        
                            <input type="file" name="p_cat_image" class="form-control">
                        
                        </div><!-- col-md-6 finish -->
                    
                    </div><!-- form-group 3 finish -->
                    
                    <div class="form-group"><!-- form-group begin -->
                    
                        <label for="" class="control-label col-md-3"><!-- control-label col-md-3 begin --> 
                        
                        </label><!-- control-label col-md-3 finish --> 
                        
                        <div class="col-md-6"><!-- col-md-6 begin -->
                        
                            <input value="Submit Product Category" name="submit" type="submit" class="form-control btn btn-primary">
                        
                        </div><!-- col-md-6 finish -->
                    
                    </div><!-- form-group finish -->
                </form><!-- form-horizontal finish -->
            </div><!-- panel-body finish -->
            
        </div><!-- panel panel-default finish -->
    </div><!-- col-lg-12 finish -->
</div><!-- row 2 finish -->

<?php  

          if(isset($_POST['submit'])){
              
              $p_cat_title = $_POST['p_cat_title'];

              $cat=$_POST['cat'];
              
              $p_cat_top = $_POST['p_cat_top'];
              
              $p_cat_image = $_FILES['p_cat_image']['name'];
              
              $temp_name = $_FILES['p_cat_image']['tmp_name'];

              move_uploaded_file($temp_name,"other_images/$p_cat_image");
              
              $insert_p_cat = "insert into product_categories (cat_id,p_cat_title,p_cat_top,p_cat_image) values ('$cat','$p_cat_title','$p_cat_top','$p_cat_image')";
              
              $run_p_cat = mysqli_query($con,$insert_p_cat);
              
              if($run_p_cat){
                  
                  echo "<script>alert('Your New Product Category Has Been Inserted')</script>";
                  
                  echo "<script>window.open('index.php?view_p_cats','_self')</script>";
                  
              }
              
          }

?>



<?php } ?> 