<?php 

    $active='Shop';
    include("includes/header.php");

?>
   
   <div id="content" class="term"><!-- #content Begin -->
       <div class="container"><!-- container Begin -->
           <div class="col-md-12"><!-- col-md-12 Begin -->
               
               <ul class="breadcrumb"><!-- breadcrumb Begin -->
                   <li>
                       <a href="index.php">Home </a> >
                   </li>
                   <li>
                       Terms & Conditions | Refund
                   </li>
               </ul><!-- breadcrumb Finish -->
               
           </div><!-- col-md-12 Finish -->
           
            <div class="row">
                <div class="col-md-3"><!-- col-md-3 Begin -->
            
                    <div class="box"><!-- box Begin -->
                        <ul class="nav nav-pills nav-stacked"><!-- nav nav-pills nav-stacked Begin -->
                        
                            <?php 
                            
                            $get_terms = "select * from terms LIMIT 0,1";
                            $run_terms = mysqli_query($con,$get_terms);

                            while($row_terms=mysqli_fetch_array($run_terms)){

                                $term_title = $row_terms['term_title'];
                                $term_link = $row_terms['term_link'];
                            
                            ?>

                            <li class="active"><!-- li.active Begin -->

                                <a data-toggle="pill" href="#<?php echo $term_link; ?>">
                                
                                    <?php echo $term_title; ?>
                                
                                </a>

                            </li><!-- /li.active Begin -->

                            <?php } ?>

                            <?php 
                            
                                $count_terms = "select * from terms";
                                $run_count_terms = mysqli_query($con,$count_terms);
                                $count = mysqli_num_rows($run_count_terms);
                                $get_terms = "select * from terms LIMIT 1,$count";
                                $run_terms = mysqli_query($con,$get_terms);

                                while($row_terms=mysqli_fetch_array($run_terms)){

                                    $term_title = $row_terms['term_title'];
                                    $term_link = $row_terms['term_link'];
                            
                            ?>

                            <li><!-- li Begin -->

                                <a data-toggle="pill" href="#<?php echo $term_link; ?>">
                                
                                    <?php echo $term_title; ?>
                                
                                </a>

                            </li><!-- /li Begin -->

                            <?php } ?>
                        
                        </ul><!-- /nav nav-pills nav-stacked Begin -->
                    </div><!-- /box Begin -->
            
                </div><!-- /col-md-3 Finish -->

                <div class="col-md-9"><!-- col-md-9 Begin -->
                    <div class="box"><!-- box Begin -->
                        <div class="tab-content"><!-- tab-content Begin -->
                        
                        <?php 
                        
                            $get_terms = "select * from terms LIMIT 0,1";
                            $run_terms = mysqli_query($con,$get_terms);

                            while($row_terms=mysqli_fetch_array($run_terms)){

                                $term_title = $row_terms['term_title'];
                                $term_desc = $row_terms['term_desc'];
                                $term_link = $row_terms['term_link'];
                        
                        ?> 

                            <div id="<?php echo $term_link; ?>" class="tab-pane fade show active"><!-- tab-pane fade in active Begin -->
                            
                            <h1 class="tabTitle"><?php echo $term_title; ?></h1>
                            <div class="tabDesc"><?php echo $term_desc; ?></div>
                            
                            </div><!-- tab-pane fade in active Finish -->

                        <?php } ?>

                        <?php 

                            $count_terms = "select * from terms";
                            $run_count_terms = mysqli_query($con,$count_terms);
                            $count = mysqli_num_rows($run_count_terms);
                            $get_terms = "select * from terms LIMIT 1,$count";
                            $run_terms = mysqli_query($con,$get_terms);

                            while($row_terms=mysqli_fetch_array($run_terms)){

                                $term_title = $row_terms['term_title'];
                                $term_desc = $row_terms['term_desc'];
                                $term_link = $row_terms['term_link'];

                        ?>

                            <div id="<?php echo $term_link; ?>" class="tab-pane fade"><!-- tab-pane fade in active Begin -->
                            
                            <h1 class="tabTitle"><?php echo $term_title; ?></h1>
                            <div class="tabDesc"><?php echo $term_desc; ?></div>
                            
                            </div><!-- tab-pane fade in active Finish -->

                        <?php } ?>
                        
                        </div><!-- tab-content Finish -->
                    </div><!-- /box Finish -->
                </div><!-- /col-md-9 Finish -->
            </div>
           
       </div><!-- container Finish -->
   </div><!-- #content Finish -->
   
   <?php 
    
    include("includes/footer.php");
    
    ?>
<!-- jQuery -->
<script src="css/jQuery/jquery.js"></script>
<!-- Bootstrap JS -->
<script src="css/bootstrap/bootstrap.js"></script>
    
    
</body>
</html>