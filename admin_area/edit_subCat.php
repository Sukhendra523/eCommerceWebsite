<?php 
    
    if(!isset($_SESSION['admin_email'])){
        
        echo "<script>window.open('login.php','_self')</script>";
        
    }else{

?>

<?php 

    if(isset($_GET['edit_subCat'])){
        
        $edit_subCat_id = $_GET['edit_subCat'];
        
        $edit_subCat_query = "select * from product_sub_categories where id='$edit_subCat_id'";
        
        $run_edit = mysqli_query($con,$edit_subCat_query);
        
        $row_edit = mysqli_fetch_array($run_edit);
        
        $id = $row_edit['id'];

        $cat_id = $row_edit['cat_id'];

        $pro_cat_id = $row_edit['pro_cat_id'];
        
        $title = $row_edit['title'];
        
        $top = $row_edit['top'];
        
        $image = $row_edit['image'];
        
    }

?>

<div class="row"><!-- row 1 begin -->
    <div class="col-lg-12"><!-- col-lg-12 begin -->
        <ol class="breadcrumb"><!-- breadcrumb begin -->
            <li>
                
                <i class="fa fa-dashboard"></i> Dashboard / Edit Product Sub-Categories
                
            </li>
        </ol><!-- breadcrumb finish -->
    </div><!-- col-lg-12 finish -->
</div><!-- row 1 finish -->

<div class="row"><!-- row 2 begin -->
    <div class="col-lg-12"><!-- col-lg-12 begin -->
        <div class="panel panel-default"><!-- panel panel-default begin -->
            <div class="panel-heading"><!-- panel-heading begin -->
                <h3 class="panel-title"><!-- panel-title begin -->
                
                    <i class="fa fa-pencil fa-fw"></i> Edit Product Sub-Categories
                
                </h3><!-- panel-title finish -->
            </div><!-- panel-heading finish -->
            
            <div class="panel-body"><!-- panel-body begin -->
                <form action="" class="form-horizontal" method="post" enctype="multipart/form-data"><!-- form-horizontal begin -->
                    <div class="form-group"><!-- form-group begin -->
                    
                        <label for="" class="control-label col-md-3"><!-- control-label col-md-3 begin --> 
                        
                            Product Category Title 
                        
                        </label><!-- control-label col-md-3 finish --> 
                        
                        <div class="col-md-6"><!-- col-md-6 begin -->
                        
                            <input value="<?php echo $title; ?>" name="p_cat_title" type="text" class="form-control">
                        
                        </div><!-- col-md-6 finish -->
                    
                    </div><!-- form-group finish -->

                    <!-- categories -->
                    <div class="form-group"><!-- form-group Begin -->
                       
                       <label class="col-md-3 control-label"> Category </label> 
                       
                       <div class="col-md-6"><!-- col-md-6 Begin -->
                           
                           <select name="cat" class="form-control"><!-- form-control Begin -->
                               
                               
                               
                               <?php 
                               
                               $get_cat = "select * from categories";
                               $run_cat = mysqli_query($con,$get_cat);
                               
                               while ($row_cat=mysqli_fetch_array($run_cat)){
                                   
                                   $cat = $row_cat['cat_id'];
                                   $cat_title = $row_cat['cat_title'];
                                   $selected=$cat==$cat_id?"selected":"";
                                   
                                   echo "
                                   
                                   <option value='$cat' $selected> $cat_title </option>
                                   
                                   ";
                                   
                               }
                               
                               ?>
                               
                           </select><!-- form-control Finish -->
                           
                       </div><!-- col-md-6 Finish -->
                        
                    </div><!-- form-group Finish -->


                    <!-- Pro-categories -->
                    <div class="form-group"><!-- form-group Begin -->
                       
                      <label class="col-md-3 control-label"> Product Category </label> 
                      
                      <div class="col-md-6"><!-- col-md-6 Begin -->
                          
                          <select name="proCat" class="form-control"><!-- form-control Begin -->
                              
                              <option  disabled style="background:black;color:white">Product Category for Men</option>
                              <?php 
                              
                              $get_p_cats = "select * from product_categories where cat_id=1";
                              $run_p_cats = mysqli_query($con,$get_p_cats);
                              
                              while ($row_p_cats=mysqli_fetch_array($run_p_cats)){
                                  
                                  $p_cat_id = $row_p_cats['p_cat_id'];
                                  $p_cat_title = $row_p_cats['p_cat_title'];
                                  $selected=$p_cat_id==$pro_cat_id?"selected":"";
                                  echo "
                                  
                                  <option value='$p_cat_id' $selected>$p_cat_title</option>
                                  
                                  ";
                                  
                              }
                              
                              ?>
                              <option  disabled style="background:black;color:white">Product Category for Women</option>
                              <?php 
                              
                              $get_p_cats = "select * from product_categories where cat_id=2";
                              $run_p_cats = mysqli_query($con,$get_p_cats);
                              
                              while ($row_p_cats=mysqli_fetch_array($run_p_cats)){
                                  
                                  $p_cat_id = $row_p_cats['p_cat_id'];
                                  $p_cat_title = $row_p_cats['p_cat_title'];
                                  $selected=$p_cat_id==$pro_cat_id?"selected":"";
                                  echo "
                                  
                                  <option value='$p_cat_id' $selected> $p_cat_title </option>
                                  
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
                        
                        <input name="p_cat_top" type="radio" value=1

                            <?php 
                            
                                if($top==1){echo "checked='checked'";}
                            
                            ?>
                        
                        >
                        <label>Yes</label>
                    
                        <input name="p_cat_top" type="radio" value=4
                        
                            <?php 
                            
                                if($top==4){echo "checked='checked'";}
                            
                            ?>
                        
                        >
                        <label>No</label>
                        
                        </div><!-- col-md-6 finish -->
                    
                    </div><!-- form-group 2 finish -->
                    
                    <div class="form-group"><!-- form-group 3 begin -->
                    
                        <label for="" class="control-label col-md-3"><!-- control-label col-md-3 begin --> 
                        
                        Category Image
                        
                        </label><!-- control-label col-md-3 finish --> 
                        
                        <div class="col-md-6"><!-- col-md-6 begin -->
                        
                            <input type="file" name="p_cat_image" class="form-control">
                          
                          <br>
                          
                          <img width="70" height="70" src="cat_images/<?php echo $image; ?>" alt="<?php echo $image; ?>">
                        
                        </div><!-- col-md-6 finish -->
                    
                    </div><!-- form-group 3 finish -->
                    
                    <div class="form-group"><!-- form-group begin -->
                    
                        <label for="" class="control-label col-md-3"><!-- control-label col-md-3 begin --> 
                        
                        </label><!-- control-label col-md-3 finish --> 
                        
                        <div class="col-md-6"><!-- col-md-6 begin -->
                        
                            <input value="Update Product Category" name="update" type="submit" class="form-control btn btn-primary">
                        
                        </div><!-- col-md-6 finish -->
                    
                    </div><!-- form-group finish -->
                </form><!-- form-horizontal finish -->
            </div><!-- panel-body finish -->
            
        </div><!-- panel panel-default finish -->
    </div><!-- col-lg-12 finish -->
</div><!-- row 2 finish -->

<?php  

          if(isset($_POST['update'])){
              
              $p_cat_title = $_POST['p_cat_title'];

              $cat_id = $_POST['cat'];

              $proCat = $_POST['proCat'];
              
              $p_cat_top = $_POST['p_cat_top'];

              if(is_uploaded_file($_FILES['p_cat_image']['tmp_name'])){
              
                $p_cat_image = $_FILES['p_cat_image']['name'];
                
                $temp_name = $_FILES['p_cat_image']['tmp_name'];

                move_uploaded_file($temp_name,"cat_images/$p_cat_image");

                $update_p_cat = "update product_sub_categories set cat_id='$cat_id',pro_cat_id='$proCat',
                title='$p_cat_title',image='$p_cat_image',top='$p_cat_top' where id='$id'";
                
                $run_p_cat = mysqli_query($con,$update_p_cat);
                
                if($run_p_cat){
                    
                    echo "<script>alert('Your Product Category Has Been Updated')</script>";
                    
                    echo "<script>window.open('index.php?view_subCat','_self')</script>";
                    
                }

              }else{
                
                $update_p_cat = "update product_sub_categories set cat_id='$cat_id',pro_cat_id='$proCat',
                title='$p_cat_title',top='$p_cat_top' where id='$id'";
                
                $run_p_cat = mysqli_query($con,$update_p_cat);
                
                if($run_p_cat){
                    
                    echo "<script>alert('Your Product Category Has Been Updated')</script>";
                    
                    echo "<script>window.open('index.php?view_subCat','_self')</script>";
                    
                }

              }
              
          }

?>



<?php } ?> 