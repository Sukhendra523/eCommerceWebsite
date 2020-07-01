<?php 
    
    if(!isset($_SESSION['admin_email'])){
        
        echo "<script>window.open('login.php','_self')</script>";
        
    }else{

?>

<?php  

        if(isset($_GET['edit_manufacturer'])){

            $edit_manufacturer = $_GET['edit_manufacturer'];
            $get_manufacturer = "select * from manufacturers where manufacturer_id='$edit_manufacturer'";
            $run_manufacturer = mysqli_query($con,$get_manufacturer);
            $row_manufacturer = mysqli_fetch_array($run_manufacturer);

            $m_id = $row_manufacturer['manufacturer_id'];
            $m_title = $row_manufacturer['manufacturer_title'];
            $m_top = $row_manufacturer['manufacturer_top'];
            $m_image = $row_manufacturer['manufacturer_image'];

        }

?>

<div class="row"><!-- row 1 begin -->
    <div class="col-lg-12"><!-- col-lg-12 begin -->
        <ol class="breadcrumb"><!-- breadcrumb begin -->
            <li>
                
                <i class="fa fa-dashboard"></i> Dashboard / Update Manufacturer
                
            </li>
        </ol><!-- breadcrumb finish -->
    </div><!-- col-lg-12 finish -->
</div><!-- row 1 finish -->

<div class="row"><!-- row 2 begin -->
    <div class="col-lg-12"><!-- col-lg-12 begin -->
        <div class="panel panel-default"><!-- panel panel-default begin -->
            <div class="panel-heading"><!-- panel-heading begin -->
                <h3 class="panel-title"><!-- panel-title begin -->
                
                    <i class="fa fa-money fa-fw"></i> Update Manufacturer
                
                </h3><!-- panel-title finish -->
            </div><!-- panel-heading finish -->
            
            <div class="panel-body"><!-- panel-body begin -->
                <form action="" class="form-horizontal" method="post" enctype="multipart/form-data"><!-- form-horizontal begin -->
                    <div class="form-group"><!-- form-group 1 begin -->
                    
                        <label for="" class="control-label col-md-3"><!-- control-label col-md-3 begin --> 
                        
                        Manufacturer Name 
                        
                        </label><!-- control-label col-md-3 finish --> 
                        
                        <div class="col-md-6"><!-- col-md-6 begin -->
                        
                            <input name="manufacturer_name" type="text" class="form-control" value="<?php echo $m_title; ?>">
                        
                        </div><!-- col-md-6 finish -->
                    
                    </div><!-- form-group 1 finish -->
                    <div class="form-group"><!-- form-group 2 begin -->
                    
                        <label for="" class="control-label col-md-3"><!-- control-label col-md-3 begin --> 
                        
                            Choose As Top Manufacturer
                        
                        </label><!-- control-label col-md-3 finish --> 
                        
                        <div class="col-md-6"><!-- col-md-6 begin -->
                        
                            <input name="manufacturer_top" type="radio" value="yes"

                                <?php 
                                
                                    if($m_top=='no'){}else{echo "checked='checked'";}
                                
                                ?>
                            
                            >
                            <label>Yes</label>
                        
                            <input name="manufacturer_top" type="radio" value="no"
                            
                                <?php 
                                
                                    if($m_top=='no'){echo "checked='checked'";}
                                
                                ?>
                            
                            >
                            <label>No</label>
                        
                        </div><!-- col-md-6 finish -->
                    
                    </div><!-- form-group 2 finish -->
                    <div class="form-group"><!-- form-group 3 begin -->
                    
                        <label for="" class="control-label col-md-3"><!-- control-label col-md-3 begin --> 
                        
                        Manufacturer Image
                        
                        </label><!-- control-label col-md-3 finish --> 
                        
                        <div class="col-md-6"><!-- col-md-6 begin -->
                        
                            <input type="file" name="manufacturer_image" class="form-control">
                          
                          <br>
                          
                          <img width="70" height="70" src="other_images/<?php echo $m_image; ?>" alt="<?php echo $m_image; ?>">
                        
                        </div><!-- col-md-6 finish -->
                    
                    </div><!-- form-group 3 finish -->
                    <div class="form-group"><!-- form-group 4 begin -->
                    
                        <label for="" class="control-label col-md-3"><!-- control-label col-md-3 begin --></label><!-- control-label col-md-3 finish --> 
                        
                        <div class="col-md-6"><!-- col-md-6 begin -->
                        
                            <input type="submit" name="update" value="Update Manufacturer" class="btn btn-primary form-control">
                        
                        </div><!-- col-md-6 finish -->
                    
                    </div><!-- form-group 4 finish -->
                </form><!-- form-horizontal finish -->
            </div><!-- panel-body finish -->
            
        </div><!-- panel panel-default finish -->
    </div><!-- col-lg-12 finish -->
</div><!-- row 2 finish -->

<?php  

    if(isset($_POST['update'])){
        
        $manufacturer_name = $_POST['manufacturer_name'];
        
        $manufacturer_top = $_POST['manufacturer_top'];

        if(is_uploaded_file($_FILES['manufacturer_image']['tmp_name'])){
        
            $manufacturer_image = $_FILES['manufacturer_image']['name'];
            
            $temp_name = $_FILES['manufacturer_image']['tmp_name'];
                
            move_uploaded_file($temp_name,"other_images/$manufacturer_image");
            
            $update_manufacturer = "update manufacturers set manufacturer_title='$manufacturer_name',manufacturer_top='$manufacturer_top',manufacturer_image='$manufacturer_image'where manufacturer_id='$m_id'" ;
            
            $run_manufacturer = mysqli_query($con,$update_manufacturer);

            if($run_manufacturer){
            
                echo "<script>alert('Your manufacturer has been updated')</script>";
                
                echo "<script>window.open('index.php?view_manufacturers','_self')</script>";

            }

        }else{
            
            $update_manufacturer = "update manufacturers set manufacturer_title='$manufacturer_name',manufacturer_top='$manufacturer_top' where manufacturer_id='$m_id'" ;
            
            $run_manufacturer = mysqli_query($con,$update_manufacturer);

            if($run_manufacturer){
            
                echo "<script>alert('Your manufacturer has been updated')</script>";
                
                echo "<script>window.open('index.php?view_manufacturers','_self')</script>";

            }

        }
        
    }

?>

<?php } ?>