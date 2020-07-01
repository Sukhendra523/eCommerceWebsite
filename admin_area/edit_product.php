<?php 

    if(!isset($_SESSION['admin_email'])){
        
        echo "<script>window.open('login.php','_self')</script>";
        
    }else{

?>

<?php 

    if(isset($_GET['edit_product'])){
        
        $edit_id = $_GET['edit_product'];
        
        $get_p = "select * from products where product_id='$edit_id'";
        
        $run_edit = mysqli_query($con,$get_p);
        
        $row_edit = mysqli_fetch_array($run_edit);
        
        $p_id = $row_edit['product_id'];
        
        $p_title = $row_edit['product_title'];
        
        $p_cat = $row_edit['p_cat_id'];

        $p_subCat = $row_edit['p_sub_cat_id'];
        
        $cat = $row_edit['cat_id'];

        $m_id = $row_edit['manufacturer_id'];
        
        $p_image1 = $row_edit['product_img1'];
        
        $p_image2 = $row_edit['product_img2'];
        
        $p_image3 = $row_edit['product_img3'];

        $p_image4 = $row_edit['product_img4'];

        $stock = $row_edit['stock'];
        
        $p_price = $row_edit['product_price'];
        
        $p_sale = $row_edit['product_sale'];

        $p_color1 = $row_edit['product_color1'];
        
        $p_color2 = $row_edit['product_color2'];
        
        $p_color3 = $row_edit['product_color3'];

        $p_color4 = $row_edit['product_color4'];

        $p_size1 = $row_edit['product_size1'];
        
        $p_size2 = $row_edit['product_size2'];
        
        $p_size3 = $row_edit['product_size3'];

        $p_size4 = $row_edit['product_size4'];
        
        $p_keywords = $row_edit['product_keywords'];
        
        $p_desc = $row_edit['product_desc'];
        
        $p_label = $row_edit['product_label'];
        
    }
        
       

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title> Insert Products </title>
</head>
<body>
    
<div class="row"><!-- row Begin -->
    
    <div class="col-lg-12"><!-- col-lg-12 Begin -->
        
        <ol class="breadcrumb"><!-- breadcrumb Begin -->
            
            <li class="active"><!-- active Begin -->
                
                <i class="fa fa-dashboard"></i> Dashboard / Edit Products
                
            </li><!-- active Finish -->
            
        </ol><!-- breadcrumb Finish -->
        
    </div><!-- col-lg-12 Finish -->
    
</div><!-- row Finish -->
       
<div class="row"><!-- row Begin -->
    
    <div class="col-lg-12"><!-- col-lg-12 Begin -->
        
        <div class="panel panel-default"><!-- panel panel-default Begin -->
            
           <div class="panel-heading"><!-- panel-heading Begin -->
               
               <h3 class="panel-title"><!-- panel-title Begin -->
                   
                   <i class="fa fa-money fa-fw"></i> Insert Product 
                   
               </h3><!-- panel-title Finish -->
               
           </div> <!-- panel-heading Finish -->
           
           <div class="panel-body"><!-- panel-body Begin -->
               
               <form method="post" class="form-horizontal" enctype="multipart/form-data"><!-- form-horizontal Begin -->
                   
                   <div class="form-group"><!-- form-group Begin -->
                       
                      <label class="col-md-3 control-label"> Product Title </label> 
                      
                      <div class="col-md-6"><!-- col-md-6 Begin -->
                          
                          <input name="product_title" type="text" class="form-control" required value="<?php echo $p_title; ?>">
                          
                      </div><!-- col-md-6 Finish -->
                       
                   </div><!-- form-group Finish -->
                   
                   <div class="form-group"><!-- form-group Begin -->
                       
                      <label class="col-md-3 control-label"> Manufacturer </label> 
                      
                      <div class="col-md-6"><!-- col-md-6 Begin -->
                          
                          <select name="manufacturer" class="form-control"><!-- form-control Begin -->
                              
                              <?php 
                              
                              $get_manufacturer = "select * from manufacturers";
                              $run_manufacturer = mysqli_query($con,$get_manufacturer);
                              
                              while ($row_manufacturer=mysqli_fetch_array($run_manufacturer)){
                                  
                                  $manufacturer_id = $row_manufacturer['manufacturer_id'];
                                  $manufacturer_title = $row_manufacturer['manufacturer_title'];
                                  $selected=$manufacturer_id==$m_id?"selected":"";
                                  echo "
                                  
                                  <option value='$manufacturer_id' $selected> $manufacturer_title </option>
                                  
                                  ";
                                  
                              }
                              
                              ?>
                              
                          </select><!-- form-control Finish -->
                          
                      </div><!-- col-md-6 Finish -->
                       
                   </div><!-- form-group Finish -->

                    <div class="form-group"><!-- form-group Begin -->
                       
                      <label class="col-md-3 control-label"> Category </label> 
                      
                      <div class="col-md-6"><!-- col-md-6 Begin -->
                          
                          <select name="cat" class="form-control"><!-- form-control Begin -->
                              
                              <?php 
                              
                              $get_cat = "select * from categories";
                              $run_cat = mysqli_query($con,$get_cat);
                              
                              while ($row_cat=mysqli_fetch_array($run_cat)){
                                  
                                  $cat_id = $row_cat['cat_id'];
                                  $cat_title = $row_cat['cat_title'];
                                  $selected=$cat_id==$cat?"selected":"";
                                  echo "
                                  
                                  <option value='$cat_id' $selected> $cat_title </option>
                                  
                                  ";
                                  
                              }
                              
                              ?>
                              
                          </select><!-- form-control Finish -->
                          
                      </div><!-- col-md-6 Finish -->
                       
                   </div><!-- form-group Finish -->

                    <div class="form-group"><!-- form-group Begin -->  

                       <label class="col-md-3 control-label"> Product Category </label> 
                       
                       <div class="col-md-6"><!-- col-md-6 Begin -->
                           
                           <select name="product_cat" class="form-control"><!-- form-control Begin -->
                               
                               <option disabled style="background:black;color:white">Product Category for Men</option>
                               <?php 
                               
                               $get_p_cats = "select * from product_categories where cat_id=1";
                               $run_p_cats = mysqli_query($con,$get_p_cats);
                               
                               
                               while ($row_p_cats=mysqli_fetch_array($run_p_cats)){
                                   
                                   $p_cat_id = $row_p_cats['p_cat_id'];
                                   $p_cat_title = $row_p_cats['p_cat_title'];
                                   $selected=$p_cat_id==$p_cat?"selected":"";
                                   echo "
                                   
                                   <option value='$p_cat_id' $selected> $p_cat_title </option>
                                   
                                   ";
                                   
                               }
                               
                               ?>
                               <option disabled style="background:black;color:white">Product Category for Women</option>
                               <?php 
                               
                               $get_p_cats = "select * from product_categories where cat_id=2";
                               $run_p_cats = mysqli_query($con,$get_p_cats);
                               
                               while ($row_p_cats=mysqli_fetch_array($run_p_cats)){
                                   
                                   $p_cat_id = $row_p_cats['p_cat_id'];
                                   $p_cat_title = $row_p_cats['p_cat_title'];
                                   $selected=$p_cat_id==$p_cat?"selected":"";
                                   echo "
                                   
                                   <option value='$p_cat_id' $selected> $p_cat_title </option>
                                   
                                   ";
                                   
                               }
                               
                               ?>
                               
                           </select><!-- form-control Finish -->
                           
                       </div><!-- col-md-6 Finish -->
                        
                    </div><!-- form-group Finish -->

                    <div class="form-group"><!-- form-group Begin -->  

                       <label class="col-md-3 control-label"> Product Sub-Category </label> 
                       
                       <div class="col-md-6"><!-- col-md-6 Begin -->
                           
                           <select name="product_subCat" class="form-control"><!-- form-control Begin -->
                               
                               <option disabled style="background:black;color:white">Product Category for Men</option>
                               <?php 
                               
                               $get_subCat = "select * from product_sub_categories where cat_id=1";
                               $run_subCat = mysqli_query($con,$get_subCat);
                               
                               
                               while ($row_subCat=mysqli_fetch_array($run_subCat)){
                                   
                                   $p_subCat_id = $row_subCat['id'];
                                   $p_subCat_title = $row_subCat['title'];
                                   $selected=$p_subCat_id==$p_subCat?"selected":"";
                                   echo "
                                   
                                   <option value='$p_subCat_id' $selected> $p_subCat_title </option>
                                   
                                   ";
                                   
                               }
                               
                               ?>
                               <option disabled style="background:black;color:white">Product Category for Women</option>
                               <?php 
                               
                               $get_subCat = "select * from product_sub_categories where cat_id=2";
                               $run_subCat = mysqli_query($con,$get_subCat);
                               
                               
                               while ($row_subCat=mysqli_fetch_array($run_subCat)){
                                   
                                   $p_subCat_id = $row_subCat['id'];
                                   $p_subCat_title = $row_subCat['title'];
                                   $selected=$p_subCat_id==$p_subCat?"selected":"";
                                   echo "
                                   
                                   <option value='$p_subCat_id' $selected> $p_subCat_title </option>
                                   
                                   ";
                                   
                               }
                               
                               ?>
                               
                           </select><!-- form-control Finish -->
                           
                       </div><!-- col-md-6 Finish -->
                        
                    </div><!-- form-group Finish -->
                    
                    <!-- Images -->
                    <div class="form-group"><!-- form-group Begin -->
                       
                      <label class="col-md-3 control-label"> Product Image 1 </label> 
                      
                      <div class="col-md-6"><!-- col-md-6 Begin -->
                          
                          <input name="product_img1" type="file" class="form-control">
                          
                          <br>
                          
                          <img width="70" height="70" src="product_images/<?php echo $p_image1; ?>" alt="<?php echo $p_image1; ?>">
                          
                      </div><!-- col-md-6 Finish -->
                       
                   </div><!-- form-group Finish -->
                   
                   <div class="form-group"><!-- form-group Begin -->
                       
                      <label class="col-md-3 control-label"> Product Image 2 </label> 
                      
                      <div class="col-md-6"><!-- col-md-6 Begin -->
                          
                          <input name="product_img2" type="file" class="form-control">
                          
                          <br>
                          
                          <img width="70" height="70" src="product_images/<?php echo $p_image2; ?>" alt="<?php echo $p_image2; ?>">
                          
                      </div><!-- col-md-6 Finish -->
                       
                   </div><!-- form-group Finish -->
                   
                   <div class="form-group"><!-- form-group Begin -->
                       
                      <label class="col-md-3 control-label"> Product Image 3 </label> 
                      
                      <div class="col-md-6"><!-- col-md-6 Begin -->
                          
                          <input name="product_img3" type="file" class="form-control form-height-custom">
                          
                          <br>
                          
                          <img width="70" height="70" src="product_images/<?php echo $p_image3; ?>" alt="<?php echo $p_image3; ?>">
                          
                      </div><!-- col-md-6 Finish -->
                       
                   </div><!-- form-group Finish -->

                   <div class="form-group"><!-- form-group Begin -->
                       
                      <label class="col-md-3 control-label"> Product Image 3 </label> 
                      
                      <div class="col-md-6"><!-- col-md-6 Begin -->
                          
                          <input name="product_img4" type="file" class="form-control form-height-custom">
                          
                          <br>
                          
                          <img width="70" height="70" src="product_images/<?php echo $p_image4; ?>" alt="<?php echo $p_image4; ?>">
                          
                      </div><!-- col-md-6 Finish -->
                       
                   </div><!-- form-group Finish -->

                   <!-- Stock -->
                   <div class="form-group"><!-- form-group Begin -->
                       
                      <label class="col-md-3 control-label"> stock </label>
                      
                      <div class="col-md-6"><!-- col-md-6 Begin -->
                          
                          <input name="stock" type="text" class="form-control" required value="<?php echo $stock; ?>">
                          
                      </div><!-- col-md-6 Finish -->
                       
                   </div><!-- form-group Finish -->
                   
                   <div class="form-group"><!-- form-group Begin -->
                       
                      <label class="col-md-3 control-label"> Product Price </label> 
                      
                      <div class="col-md-6"><!-- col-md-6 Begin -->
                          
                          <input name="product_price" type="text" class="form-control" required value="<?php echo $p_price; ?>">
                          
                      </div><!-- col-md-6 Finish -->
                       
                   </div><!-- form-group Finish -->
                   
                   <div class="form-group"><!-- form-group Begin -->
                       
                      <label class="col-md-3 control-label"> Sale Price </label> 
                      
                      <div class="col-md-6"><!-- col-md-6 Begin -->
                          
                          <input name="product_sale" type="text" class="form-control" required value="<?php echo $p_sale; ?>">
                          
                      </div><!-- col-md-6 Finish -->
                       
                   </div><!-- form-group Finish -->

                   <!-- color -->
                   <div class="form-group"><!-- form-group Begin -->
                       
                      <label class="col-md-3 control-label"> Product Color 1 </label> 
                      
                      <div class="col-md-6"><!-- col-md-6 Begin -->
                          
                          <input name="product_color1" type="text" class="form-control" required value="<?php echo $p_color1; ?>">
                          
                      </div><!-- col-md-6 Finish -->
                       
                   </div><!-- form-group Finish -->

                   <div class="form-group"><!-- form-group Begin -->
                       
                      <label class="col-md-3 control-label"> Product Color 2 </label> 
                      
                      <div class="col-md-6"><!-- col-md-6 Begin -->
                          
                          <input name="product_color2" type="text" class="form-control" required value="<?php echo $p_color2; ?>">
                          
                      </div><!-- col-md-6 Finish -->
                       
                   </div><!-- form-group Finish -->

                   <div class="form-group"><!-- form-group Begin -->
                       
                      <label class="col-md-3 control-label"> Product Color 3 </label> 
                      
                      <div class="col-md-6"><!-- col-md-6 Begin -->
                          
                          <input name="product_color3" type="text" class="form-control" required value="<?php echo $p_color3; ?>">
                          
                      </div><!-- col-md-6 Finish -->
                       
                   </div><!-- form-group Finish -->

                   <div class="form-group"><!-- form-group Begin -->
                       
                      <label class="col-md-3 control-label"> Product Color 4 </label> 
                      
                      <div class="col-md-6"><!-- col-md-6 Begin -->
                          
                          <input name="product_color4" type="text" class="form-control" required value="<?php echo $p_color4; ?>">
                          
                      </div><!-- col-md-6 Finish -->
                       
                   </div><!-- form-group Finish -->

                    <!-- Size -->
                   <div class="form-group"><!-- form-group Begin -->
                       
                      <label class="col-md-3 control-label"> Product Size 1 </label> 
                      
                      <div class="col-md-6"><!-- col-md-6 Begin -->
                          
                          <input name="product_size1" type="text" class="form-control" required value="<?php echo $p_size1; ?>">
                          
                      </div><!-- col-md-6 Finish -->
                       
                   </div><!-- form-group Finish -->

                   <div class="form-group"><!-- form-group Begin -->
                       
                      <label class="col-md-3 control-label"> Product Size 2 </label> 
                      
                      <div class="col-md-6"><!-- col-md-6 Begin -->
                          
                          <input name="product_size2" type="text" class="form-control" required value="<?php echo $p_size2; ?>">
                          
                      </div><!-- col-md-6 Finish -->
                       
                   </div><!-- form-group Finish -->

                   <div class="form-group"><!-- form-group Begin -->
                       
                      <label class="col-md-3 control-label"> Product Size 3 </label> 
                      
                      <div class="col-md-6"><!-- col-md-6 Begin -->
                          
                          <input name="product_size3" type="text" class="form-control" required value="<?php echo $p_size3; ?>">
                          
                      </div><!-- col-md-6 Finish -->
                       
                   </div><!-- form-group Finish -->

                   <div class="form-group"><!-- form-group Begin -->
                       
                      <label class="col-md-3 control-label"> Product Size 4 </label> 
                      
                      <div class="col-md-6"><!-- col-md-6 Begin -->
                          
                          <input name="product_size4" type="text" class="form-control" required value="<?php echo $p_size4; ?>">
                          
                      </div><!-- col-md-6 Finish -->
                       
                   </div><!-- form-group Finish -->
                   
                   <!-- Kaeyword -->
                   <div class="form-group"><!-- form-group Begin -->
                       
                      <label class="col-md-3 control-label"> Product Keywords </label> 
                      
                      <div class="col-md-6"><!-- col-md-6 Begin -->
                          
                          <input name="product_keywords" type="text" class="form-control" required value="<?php echo $p_keywords; ?>">
                          
                      </div><!-- col-md-6 Finish -->
                       
                   </div><!-- form-group Finish -->
                   
                   <div class="form-group"><!-- form-group Begin -->
                       
                      <label class="col-md-3 control-label"> Product Desc </label> 
                      
                      <div class="col-md-6"><!-- col-md-6 Begin -->
                          
                          <textarea name="product_desc" cols="19" rows="6" class="form-control">
                              
                              <?php echo $p_desc; ?>
                              
                          </textarea>
                          
                      </div><!-- col-md-6 Finish -->
                       
                   </div><!-- form-group Finish -->
                   
                   <div class="form-group"><!-- form-group Begin -->
                       
                      <label class="col-md-3 control-label"> Product Label </label> 
                      
                      <div class="col-md-6"><!-- col-md-6 Begin -->
                          
                          <input name="product_label" type="text" class="form-control" required value="<?php echo $p_label; ?>">
                          
                      </div><!-- col-md-6 Finish -->
                       
                   </div><!-- form-group Finish -->
                   
                   <div class="form-group"><!-- form-group Begin -->
                       
                      <label class="col-md-3 control-label"></label> 
                      
                      <div class="col-md-6"><!-- col-md-6 Begin -->
                          
                          <input name="update" value="Update Product" type="submit" class="btn btn-primary form-control">
                          
                      </div><!-- col-md-6 Finish -->
                       
                   </div><!-- form-group Finish -->
                   
               </form><!-- form-horizontal Finish -->
               
           </div><!-- panel-body Finish -->
            
        </div><!-- canel panel-default Finish -->
        
    </div><!-- col-lg-12 Finish -->
    
</div><!-- row Finish -->
   
    <script src="js/tinymce/tinymce.min.js"></script>
    <script>tinymce.init({ selector:'textarea'});</script>
</body>
</html>


<?php 

if(isset($_POST['update'])){

    
    $product_title = $_POST['product_title'];
    $cat = $_POST['cat'];
    $manufacturer_id = $_POST['manufacturer'];
    $product_cat = $_POST['product_cat'];
    $product_subCat = $_POST['product_subCat'];
    $product_stock = $_pOST['stock'];
    $product_price = $_POST['product_price'];
    $product_sale = $_POST['product_sale'];
    $product_keywords = $_POST['product_keywords'];
    $product_desc = $_POST['product_desc'];
    $product_label = $_POST['product_label'];

    $product_color1 = $_POST['product_color1'];
    $product_color2 = $_POST['product_color2'];
    $product_color3 = $_POST['product_color3'];
    $product_color4 = $_POST['product_color4'];
    $product_size1 = $_POST['product_size1'];
    $product_size2 = $_POST['product_size2'];
    $product_size3 = $_POST['product_size3'];
    $product_size4 = $_POST['product_size4'];



    $get_cat = "select * from categories where cat_id='$cat' ";
    $run_cat = mysqli_query($con,$get_cat);
    $row_cat = mysqli_fetch_array($run_cat);
    $cat_title = $row_cat['cat_title'];

    $get_manufacturer = "select * from manufacturers where manufacturer_id='$manufacturer_id' ";
    $run_manufacturer = mysqli_query($con,$get_manufacturer);
    $row_manufacturer=mysqli_fetch_array($run_manufacturer);
    $product_brand = $row_manufacturer['manufacturer_title'];

    $get_p_cats = "select * from product_categories where p_cat_id='$product_cat' ";
    $run_p_cats = mysqli_query($con,$get_p_cats);
    $row_p_cats=mysqli_fetch_array($run_p_cats);
    $product_cat_title = $row_p_cats['p_cat_title'];

    $get_p_subcats = "select * from product_sub_categories where id='$product_subCat' ";
    $run_p_subcats = mysqli_query($con,$get_p_subcats);
    $row_p_subcats=mysqli_fetch_array($run_p_subcats);
    $product_subcat_title = $row_p_subcats['title'];

    if(is_uploaded_file($_FILES['file']['tmp_name'])){

            // work for upload / update image
        
        $product_img1 = $_FILES['product_img1']['name'];
        $product_img2 = $_FILES['product_img2']['name'];
        $product_img3 = $_FILES['product_img3']['name'];
        $product_img4 = $_FILES['product_img4']['name'];
        
        $temp_name1 = $_FILES['product_img1']['tmp_name'];
        $temp_name2 = $_FILES['product_img2']['tmp_name'];
        $temp_name3 = $_FILES['product_img3']['tmp_name'];
        $temp_name4 = $_FILES['product_img4']['tmp_name'];
        
        move_uploaded_file($temp_name1,"product_images/$product_img1");
        move_uploaded_file($temp_name2,"product_images/$product_img2");
        move_uploaded_file($temp_name3,"product_images/$product_img3");
        move_uploaded_file($temp_name4,"product_images/$product_img4");
        
        $update_product = "update products set p_cat_id='$product_cat',p_sub_cat_id='$product_subCat',cat_id='$cat',
        manufacturer_id='$manufacturer_id',cat='$cat_title',product_brand='$product_brand',product_cat='$product_cat_title',
        product_sub_cat='$product_subcat_title',product_color1='$product_color1',product_color2='$product_color2',
        product_color3='$product_color3',product_color4='$product_color4',product_size1='$product_size1',
        product_size2='$product_size2',product_size3='$product_size3',product_size4='$product_size4',
        date=NOW(),product_title='$product_title',product_img1='$product_img1',product_img2='$product_img2',
        product_img3='$product_img3',product_img4='$product_img4',stock='$product_stock',product_price='$product_price',
        product_keywords='$product_keywords',product_desc='$product_desc',product_label='$product_label',
        product_sale='$product_sale' where product_id='$p_id'";
        
        $run_product = mysqli_query($con,$update_product);
        
        if($run_product){
            
        echo "<script>alert('Your product has been updated Successfully')</script>"; 
            
        echo "<script>window.open('index.php?view_products','_self')</script>"; 
            
        }
        
    }else{

        // work when no update image
        
        $update_product = "update products set p_cat_id='$product_cat',p_sub_cat_id='$product_subCat',cat_id='$cat',
        manufacturer_id='$manufacturer_id',cat='$cat_title',product_brand='$product_brand',product_cat='$product_cat_title',
        product_sub_cat='$product_subcat_title',product_color1='$product_color1',product_color2='$product_color2',
        product_color3='$product_color3',product_color4='$product_color4',product_size1='$product_size1',
        product_size2='$product_size2',product_size3='$product_size3',product_size4='$product_size4',
        date=NOW(),product_title='$product_title',stock='$product_stock',product_price='$product_price',
        product_keywords='$product_keywords',product_desc='$product_desc',product_label='$product_label',
        product_sale='$product_sale' where product_id='$p_id'";
        
        $run_product = mysqli_query($con,$update_product);
        
        if($run_product){
            
        echo "<script>alert('Your product has been updated Successfully')</script>"; 
            
        echo "<script>window.open('index.php?view_products','_self')</script>"; 
            
        }
    }
    
}

?>


<?php } ?>