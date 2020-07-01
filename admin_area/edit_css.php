<?php 
    
    if(!isset($_SESSION['admin_email'])){
        
        echo "<script>window.open('login.php','_self')</script>";
        
    }else{

?>

<?php 

    $file = "../styles/style.css"; 

    if(file_exists($file)){

        $data = file_get_contents($file);
     
    }

?>

<div class="row"><!-- row 1 begin -->
    <div class="col-lg-12"><!-- col-lg-12 begin -->
        <ol class="breadcrumb"><!-- breadcrumb begin -->
            <li class="active"><!-- active begin -->
                
                <i class="fa fa-dashboard"></i> Dashboard / CSS Editor
                
            </li><!-- active finish -->
        </ol><!-- breadcrumb finish -->
    </div><!-- col-lg-12 finish -->
</div><!-- row 1 finish -->



<div class="row"><!-- row 2 begin -->
    <div class="col-lg-12"><!-- col-lg-12 begin -->
        <div class="panel panel-default"><!-- panel panel-default begin -->
            <div class="panel-heading"><!-- panel-heading begin -->
               <h3 class="panel-title"><!-- panel-title begin -->
               
                   <i class="fa fa-pencil"></i>  CSS Editor
                
               </h3><!-- panel-title finish --> 
            </div><!-- panel-heading finish -->
            
            <div class="panel-body"><!-- panel-body begin -->

                <form action="" class="form-horizontal" method="post"><!-- form-horizontal begin -->
                    <div class="form-group"><!-- form-group begin -->

                        <div class="col-lg-12"><!-- col-lg-12 begin -->
                            <textarea name="newdata" id="" rows="15" class="form-control">

                                <?php echo $data; ?>

                            </textarea>
                        </div>  <!-- col-lg-12 finish -->                  
                    
                    </div><!-- form-group finish -->

                    <div class="form-group"><!-- form-group begin -->
                    
                        <label  class="control-label col-md-3"></label>

                        <div class="col-md-6"><!-- col-md-6 begin -->
                        <input type="submit" name="update" value="Update CSS" class="form-control btn btn-primary">
                        </div><!-- col-md-6 finish -->
                    
                    </div><!-- form-group finish -->

                </form><!-- form-horizontal finish -->

            </div><!-- panel-body finish -->
            
        </div><!-- panel panel-default finish -->
    </div><!-- col-lg-12 finish -->
</div><!-- row 2 finish -->

<?php 

if(isset($_POST['update'])){

    $newdata = $_POST['newdata'];
    $handle = fopen($file, "w");
    fwrite($handle, $newdata);
    fclose($handle);

    echo "<script>alert('Your CSS Has Been Updated')</script>";
    echo "<script>window.open('index.php?edit_css','_self')</script>";

}

?>

<?php } ?>