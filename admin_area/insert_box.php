<?php  
    
    if(!isset($_SESSION['admin_email'])){
        
        echo "<script>window.open('login.php','_self')</script>";
        
    }else{

?>

<div class="row"><!-- row 1 begin -->
    <div class="col-lg-12"><!-- col-lg-12 begin -->
        <ol class="breadcrumb"><!-- breadcrumb begin -->
            <li>
                
                <i class="fa fa-dashboard"></i> Dashboard / Insert New Box
                
            </li>
        </ol><!-- breadcrumb finish -->
    </div><!-- col-lg-12 finish -->
</div><!-- row 1 finish -->

<div class="row"><!-- row 2 begin -->
    <div class="col-lg-12"><!-- col-lg-12 begin -->
        <div class="panel panel-default"><!-- panel panel-default begin -->
            <div class="panel-heading"><!-- panel-heading begin -->
                <h3 class="panel-title"><!-- panel-title begin -->
                
                    <i class="fa fa-money fa-fw"></i> Insert Box
                
                </h3><!-- panel-title finish -->
            </div><!-- panel-heading finish -->
            
            <div class="panel-body"><!-- panel-body begin -->
                <form action="" class="form-horizontal" method="post" enctype="multipart/form-data"><!-- form-horizontal begin -->
                    <div class="form-group"><!-- form-group 1 begin -->
                    
                        <label for="" class="control-label col-md-3"><!-- control-label col-md-3 begin --> 
                        
                            Box Title
                        
                        </label><!-- control-label col-md-3 finish --> 
                        
                        <div class="col-md-6"><!-- col-md-6 begin -->
                        
                            <input name="box_title" type="text" class="form-control">
                        
                        </div><!-- col-md-6 finish -->
                    
                    </div><!-- form-group 1 finish -->

                    <div class="form-group"><!-- form-group 2 begin -->
                    
                        <label for="" class="control-label col-md-3"><!-- control-label col-md-3 begin --> 
                        
                            Box Image 
                        
                        </label><!-- control-label col-md-3 finish --> 
                        
                        <div class="col-md-6"><!-- col-md-6 begin -->
                        
                            <input type="file" name="box_image" class="form-control">
                        
                        </div><!-- col-md-6 finish -->
                    
                    </div><!-- form-group 2 finish -->

                    <div class="form-group"><!-- form-group 3 begin -->
                    
                        <label for="" class="control-label col-md-3"><!-- control-label col-md-3 begin --> 
                        
                            Box Description
                        
                        </label><!-- control-label col-md-3 finish --> 
                        
                        <div class="col-md-6"><!-- col-md-6 begin -->
                        
                            <textarea name="box_desc" type="text" class="form-control" rows="6" cols="18"></textarea>
                        
                        </div><!-- col-md-6 finish -->

                    
                    </div><!-- form-group 3 finish -->

                    <!-- Postion -->
                    <div class="form-group"><!-- form-group Begin -->
                       <label class="col-md-3 control-label"> Postion </label>
                       <div class="col-md-6"><!-- col-md-6 Begin -->
                           <select name="position" class="form-control"><!-- form-control Begin -->
                               <option selected hidden> Select Position Of box </option>
                               <?php 
                               
                               $pos = "select DISTINCT(position) from boxes_section";
                               $run_pos = mysqli_query($con,$pos);
                               while ($row_pos=mysqli_fetch_array($run_pos)){
                                   $box_pos=$row_pos['position'];
                                   echo "
                                   <option value='$box_pos'> $box_pos </option>
                                   ";
                               }
                               ?>
                           </select><!-- form-control Finish -->
                       </div><!-- col-md-6 Finish -->
                    </div><!-- form-group Finish -->


                    <div class="form-group"><!-- form-group 4 begin -->
                    
                        <label for="" class="control-label col-md-3"><!-- control-label col-md-3 begin --></label><!-- control-label col-md-3 finish --> 
                        
                        <div class="col-md-6"><!-- col-md-6 begin -->
                        
                            <input type="submit" name="submit" value="Insert Box" class="btn btn-primary form-control">
                        
                        </div><!-- col-md-6 finish -->
                    
                    </div><!-- form-group 4 finish -->
                </form><!-- form-horizontal finish -->
            </div><!-- panel-body finish -->
            
        </div><!-- panel panel-default finish -->
    </div><!-- col-lg-12 finish -->
</div><!-- row 2 finish -->

<?php   

    if(isset($_POST['submit'])){
        
        $box_title = $_POST['box_title'];
        $box_image = $_FILES['box_image']['name'];
        $temp_name = $_FILES['box_image']['tmp_name'];
        $box_desc = $_POST['box_desc'];
        $box_position = $_POST['position'];

        $get_boxes = "select * from boxes_section";
        
        $run_boxes = mysqli_query($con,$get_boxes);
        
        $count = mysqli_num_rows($run_boxes);
        if ($count<4) {
        move_uploaded_file($temp_name,"box_images/$box_image");
        $insert_box ="insert into boxes_section (box_title,box_image,box_desc,postion) values 
        ('$box_title','$box_image','$box_desc','$box_position')";
        $run_box = mysqli_query($con,$insert_box);

        echo "<script>alert('New Box Has Been Inserted')</script>";
        echo "<script>window.open('index.php?view_boxes','_self')</script>";
        }
        else{
            echo "<script>alert('You have already inserted 4 boxes')</script>";
        }
        
        
    }

?>

<?php } ?>