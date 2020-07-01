<?php 
    
    if(!isset($_SESSION['admin_email'])){
        
        echo "<script>window.open('login.php','_self')</script>";
        
    }else{

?>

<?php 

    if(isset($_GET['edit_slide'])){
        
        $edit_slide_id = $_GET['edit_slide'];
        
        $edit_slide = "select * from slider where slide_id='$edit_slide_id'";
        
        $run_edit_slide = mysqli_query($con,$edit_slide);
        
        $row_edit_slide = mysqli_fetch_array($run_edit_slide);
        
        $slide_id = $row_edit_slide['slide_id'];
        
        $slide_name = $row_edit_slide['slide_name'];
        
        $slide_url = $row_edit_slide['slide_url'];
        
        $slide_image = $row_edit_slide['slide_image'];

        $slide_position = $row_edit_slide['position'];
    }

?>

<div class="row"><!-- row 1 begin -->
    <div class="col-lg-12"><!-- col-lg-12 begin -->
        <ol class="breadcrumb"><!-- breadcrumb begin -->
            <li>
                
                <i class="fa fa-dashboard"></i> Dashboard / Edit Slide
                
            </li>
        </ol><!-- breadcrumb finish -->
    </div><!-- col-lg-12 finish -->
</div><!-- row 1 finish -->

<div class="row"><!-- row 2 begin -->
    <div class="col-lg-12"><!-- col-lg-12 begin -->
        <div class="panel panel-default"><!-- panel panel-default begin -->
            <div class="panel-heading"><!-- panel-heading begin -->
                <h3 class="panel-title"><!-- panel-title begin -->
                
                    <i class="fa fa-money fa-fw"></i> Edit Slide
                
                </h3><!-- panel-title finish -->
            </div><!-- panel-heading finish -->
            
            <div class="panel-body"><!-- panel-body begin -->
                <form action="" class="form-horizontal" method="post" enctype="multipart/form-data"><!-- form-horizontal begin -->
                    <div class="form-group"><!-- form-group begin -->
                    
                        <label for="" class="control-label col-md-3"><!-- control-label col-md-3 begin --> 
                        
                            Slide Name 
                        
                        </label><!-- control-label col-md-3 finish --> 
                        
                        <div class="col-md-6"><!-- col-md-6 begin -->
                        
                            <input name="slide_name" type="text" class="form-control" value="<?php echo $slide_name; ?>">
                        
                        </div><!-- col-md-6 finish -->
                    
                    </div><!-- form-group finish -->
                    <div class="form-group"><!-- form-group begin -->
                    
                        <label for="" class="control-label col-md-3"><!-- control-label col-md-3 begin --> 
                        
                            Slide Url 
                        
                        </label><!-- control-label col-md-3 finish --> 
                        
                        <div class="col-md-6"><!-- col-md-6 begin -->
                        
                            <input name="slide_url" type="text" class="form-control" value="<?php echo $slide_url; ?>">
                        
                        </div><!-- col-md-6 finish -->
                    
                    </div><!-- form-group finish -->
                    <div class="form-group"><!-- form-group begin -->
                    
                        <label for="" class="control-label col-md-3"><!-- control-label col-md-3 begin --> 
                        
                            Slide Image
                        
                        </label><!-- control-label col-md-3 finish --> 
                        
                        <div class="col-md-6"><!-- col-md-6 begin -->
                        
                            <input type="file" name="slide_image" class="form-control">
                            
                            <br/>
                            
                            <img src="slides_images/<?php echo $slide_image; ?>" class="img-responsive">
                        
                        </div><!-- col-md-6 finish -->
                    
                    </div><!-- form-group finish -->

                    <!-- Postion -->
                    <div class="form-group"><!-- form-group Begin -->
                       <label class="col-md-3 control-label"> Postion </label>
                       <div class="col-md-6"><!-- col-md-6 Begin -->
                           <select name="position" class="form-control"><!-- form-control Begin -->
                           <?php 
                               
                               $pos = "select DISTINCT(position) from slider";
                               $run_pos = mysqli_query($con,$pos);
                               
                               while ($row_pos=mysqli_fetch_array($run_pos)){
                                   $silde_pos=$row_pos['position'];
                                   $selected=$silde_pos==$slide_position?"selected":"";
                                   echo "
                                   
                                   <option value='$silde_pos' $selected> $silde_pos </option>
                                   
                                   ";
                               }
                               
                               ?>
                           </select><!-- form-control Finish -->
                       </div><!-- col-md-6 Finish -->
                    </div><!-- form-group Finish -->

                    <div class="form-group"><!-- form-group begin -->
                    
                        <label for="" class="control-label col-md-3"><!-- control-label col-md-3 begin --></label><!-- control-label col-md-3 finish --> 
                        
                        <div class="col-md-6"><!-- col-md-6 begin -->
                        
                            <input type="submit" name="update" value="Update Now" class="btn btn-primary form-control">
                        
                        </div><!-- col-md-6 finish -->
                    
                    </div><!-- form-group finish -->
                </form><!-- form-horizontal finish -->
            </div><!-- panel-body finish -->
            
        </div><!-- panel panel-default finish -->
    </div><!-- col-lg-12 finish -->
</div><!-- row 2 finish -->

<?php  

    if(isset($_POST['update'])){
        
        $slide_name = $_POST['slide_name'];
        $slide_url = $_POST['slide_url'];
        $slide_position = $_POST['position'];

        $slide_image = $_FILES['slide_image']['name'];
        $temp_name = $_FILES['slide_image']['tmp_name'];
        move_uploaded_file($temp_name,"slides_images/$slide_image");
        
        $update_slide = "update slider set slide_name='$slide_name',slide_url='$slide_url',
        slide_image='$slide_image',position='$slide_position' where slide_id='$slide_id'";
        
        $run_update_slide = mysqli_query($con,$update_slide);
        
        if($run_update_slide){
            
            echo "<script>alert('Your Slide has been updated Successfully')</script>"; 
        
            echo "<script>window.open('index.php?view_slides','_self')</script>";
            
        }
        
    }

?>

<?php } ?>