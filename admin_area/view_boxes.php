<?php 
    
    if(!isset($_SESSION['admin_email'])){
        
        echo "<script>window.open('login.php','_self')</script>";
        
    }else{

?>

<div class="row"><!-- row 1 begin -->
    <div class="col-lg-12"><!-- col-lg-12 begin -->
        <ol class="breadcrumb"><!-- breadcrumb begin -->
            <li>
                
                <i class="fa fa-dashboard"></i> Dashboard / View Boxes
                
            </li>
        </ol><!-- breadcrumb finish -->
    </div><!-- col-lg-12 finish -->
</div><!-- row 1 finish -->

<div class="row"><!-- row 2 begin -->
    <div class="col-lg-12"><!-- col-lg-12 begin -->
        <div class="panel panel-default"><!-- panel panel-default begin -->
            <div class="panel-heading"><!-- panel-heading begin -->
                <h3 class="panel-title"><!-- panel-title begin -->
                
                    <i class="fa fa-tags fa-fw"></i> View Boxes
                
                </h3><!-- panel-title finish -->
            </div><!-- panel-heading finish -->
            
            <div class="panel-body"><!-- panel-body begin -->
            
                <?php 
                
                    $get_boxes = "select * from boxes_section";
        
                    $run_boxes = mysqli_query($con,$get_boxes);
        
                    while($run_boxes_section=mysqli_fetch_array($run_boxes)){
                        
                        $box_id = $run_boxes_section['box_id'];
                        
                        $box_title = $run_boxes_section['box_title'];

                        $box_image = $run_boxes_section['box_image'];

                        $box_desc = $run_boxes_section['box_desc'];
                
                ?>
                
                <div class="col-lg-4 col-md-4"><!-- col-lg-3 col-md-3 begin -->
                    <div class="panel panel-primary"><!-- panel panel-primary begin -->
                        <div class="panel-heading"><!-- panel-heading begin -->
                            <h3 class="panel-title" align="center"><!-- panel-title begin -->

                                <?php echo $box_title; ?>
                                
                            </h3><!-- panel-title finish -->
                        </div><!-- panel-heading finish -->
                        
                        <div class="panel-body"><!-- panel-body begin -->
                            
                        <img src="box_images/<?php echo $box_image; ?>" alt="<?php echo $box_title; ?>" class="img-responsive">
                        <?php echo $box_desc; ?>
                            
                        </div><!-- panel-body finish -->
                        
                        <div class="panel-footer"><!-- panel-footer begin -->
                            <center><!-- center begin -->
                                
                                <a href="index.php?delete_box=<?php echo $box_id; ?>" class="pull-right"><!-- pull-right begin -->
                                
                                 <i class="fa fa-trash"></i> Delete
                                
                                </a><!-- pull-right finish -->
                                
                                <a href="index.php?edit_box=<?php echo $box_id; ?>" class="pull-left"><!-- pull-left begin -->
                                
                                 <i class="fa fa-pencil"></i> Edit
                                
                                </a><!-- pull-left finish -->
                                
                                <div class="clearfix"></div>
                                
                            </center><!-- center finish -->
                        </div><!-- panel-footer finish -->
                        
                    </div><!-- panel panel-primary finish -->
                </div><!-- col-lg-4 col-md-4 finish -->
                
                <?php } ?>
            
            </div><!-- panel-body finish -->
            
        </div><!-- panel panel-default finish -->
    </div><!-- col-lg-12 finish -->
</div><!-- row 2 finish -->


<?php } ?>