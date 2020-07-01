<?php 

    if(!isset($_SESSION['admin_email'])){
        
        echo "<script>window.open('login.php','_self')</script>";
        
    }else{

?>

<?php 

if(isset($_GET['edit_term'])){

    $edit_id = $_GET['edit_term'];
    $get_term = "select * from terms where term_id='$edit_id'";
    $run_term = mysqli_query($con,$get_term);
    $row_term = mysqli_fetch_array($run_term);
    $term_id = $row_term['term_id'];
    $term_title = $row_term['term_title'];
    $term_desc = $row_term['term_desc'];
    $term_link = $row_term['term_link'];

}

?>
    
<div class="row"><!-- row Begin -->
    
    <div class="col-lg-12"><!-- col-lg-12 Begin -->
        
        <ol class="breadcrumb"><!-- breadcrumb Begin -->
            
            <li class="active"><!-- active Begin -->
                
                <i class="fa fa-dashboard"></i> Dashboard / Edit Term
                
            </li><!-- active Finish -->
            
        </ol><!-- breadcrumb Finish -->
        
    </div><!-- col-lg-12 Finish -->
    
</div><!-- row Finish -->
       
<div class="row"><!-- row Begin -->
    
    <div class="col-lg-12"><!-- col-lg-12 Begin -->
        
        <div class="panel panel-default"><!-- panel panel-default Begin -->
            
           <div class="panel-heading"><!-- panel-heading Begin -->
               
               <h3 class="panel-title"><!-- panel-title Begin -->
                   
                   <i class="fa fa-money fa-fw"></i> Edit Term 
                   
               </h3><!-- panel-title Finish -->
               
           </div> <!-- panel-heading Finish -->
           
           <div class="panel-body"><!-- panel-body Begin -->
               
               <form method="post" class="form-horizontal" enctype="multipart/form-data"><!-- form-horizontal Begin -->
                   
                   <div class="form-group"><!-- form-group Begin -->
                       
                      <label class="col-md-3 control-label"> Term Title </label> 
                      
                      <div class="col-md-6"><!-- col-md-6 Begin -->
                          
                          <input value="<?php echo $term_title; ?>" name="term_title" type="text" class="form-control" required>
                          
                      </div><!-- col-md-6 Finish -->
                       
                   </div><!-- form-group Finish -->
                   
                   <div class="form-group"><!-- form-group Begin -->
                       
                      <label class="col-md-3 control-label"> Term Link </label> 
                      
                      <div class="col-md-6"><!-- col-md-6 Begin -->
                          
                          <input value="<?php echo $term_link; ?>" name="term_link" type="text" class="form-control" required>
                          
                      </div><!-- col-md-6 Finish -->
                       
                   </div><!-- form-group Finish -->
                   
                   <div class="form-group"><!-- form-group Begin -->
                       
                      <label class="col-md-3 control-label"> Term Desc </label> 
                      
                      <div class="col-md-6"><!-- col-md-6 Begin -->
                          
                          <textarea name="term_desc" cols="19" rows="6" class="form-control">
                          
                          <?php echo $term_desc; ?>
                          
                          </textarea>
                          
                      </div><!-- col-md-6 Finish -->
                       
                   </div><!-- form-group Finish -->
                   
                   <div class="form-group"><!-- form-group Begin -->
                       
                      <label class="col-md-3 control-label"></label> 
                      
                      <div class="col-md-6"><!-- col-md-6 Begin -->
                          
                          <input name="update" value="Update Term" type="submit" class="btn btn-primary form-control">
                          
                      </div><!-- col-md-6 Finish -->
                       
                   </div><!-- form-group Finish -->
                   
               </form><!-- form-horizontal Finish -->
               
           </div><!-- panel-body Finish -->
            
        </div><!-- canel panel-default Finish -->
        
    </div><!-- col-lg-12 Finish -->
    
</div><!-- row Finish -->

<?php 

if(isset($_POST['update'])){

    $term_title = $_POST['term_title'];
    $term_link = $_POST['term_link'];
    $term_desc = $_POST['term_desc'];
    $update_term = "update terms set term_title='$term_title',term_link='$term_link',term_desc='$term_desc' where term_id='$term_id'";
    $run_term = mysqli_query($con,$update_term);

    if($run_term){

        echo "<script>alert('Your Term Has Been Updated')</script>";
        echo "<script>window.open('index.php?view_terms','_self')</script>";

    }
    
}

?>

    <?php } ?>
   
    <script src="js/tinymce/tinymce.min.js"></script>
    <script>tinymce.init({ selector:'textarea'});</script>