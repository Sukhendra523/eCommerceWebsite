<?php
    include("includes/header.php");

?>
   

<section id="banner-slider">
  <!-- Start Slider.com BODY section --> 
  <div id="wowslider-container1">
    <div class="ws_images">
      <ul>
        <?php
        $get_slides = "select * from slider WHERE position=1 LIMIT 0,5";
                          
        $run_slides = mysqli_query($con,$get_slides);

        while($row_slides=mysqli_fetch_array($run_slides)){
          $slide_name = $row_slides['slide_name'];
          $slide_image = $row_slides['slide_image'];
          $slide_url = $row_slides['slide_url'];
          echo "
            <li><a href='$slide_url'><img src='admin_area/slides_images/$slide_image' alt='$slide_name' title='$slide_name'/></a></li>

          ";

        }
        ?>
      </ul>
    </div>
    </div>
  </div>  
  <script type="text/javascript" src="engine1/wowslider.js"></script>
  <script type="text/javascript" src="engine1/script.js"></script>
  <!-- End Slider.com BODY section -->
</section>



<section id="categories">
	<div class="categories">

		<div class="categories-title">
			<h3>#Men's Top Categories</h3>
		</div>

		<div class="cat-list">
    <?php

    $get_topSubCat = "SELECT * FROM `product_sub_categories` WHERE cat_id=1 and top=1 ORDER BY `id` ASC LIMIT 0,6";
    
    $run = mysqli_query($con,$get_topSubCat);
    
    while($row=mysqli_fetch_array($run)){
        
        $id = $row['id'];
        $title = $row['title'];
        $img = $row['image'];
        $urlTitle=urlencode($title);
        echo "
            <a href='shop.php?cat=Men&subCat=$urlTitle'>
              <div class='cat-list-item'>
                <img src='admin_area/cat_images/$img'>
              </div>
            </a>
        ";
        
    }
    ?>    
		</div>

		<div class="categories-title">
			<h3>#Women's Top Categories</h3>
		</div>

		<div class="cat-list">
    <?php

    $get_topSubCat = "SELECT * FROM `product_sub_categories` WHERE cat_id=2 and top=1 ORDER BY `id` ASC LIMIT 0,6";
    
    $run = mysqli_query($con,$get_topSubCat);
    
    while($row=mysqli_fetch_array($run)){
        
        $id = $row['id'];
        $title = $row['title'];
        $img = $row['image'];
        $urlTitle=urlencode($title);
        echo "
            <a href='shop.php?cat=Women&subCat=$urlTitle'>
              <div class='cat-list-item'>
                <img src='admin_area/cat_images/$img'>
              </div>
            </a>
        ";
        
    }
    ?>
		</div>
	</div>
</section>


<section id="disccount">
	<ul>
		<li><a title="Min 80% Off" href=""><img src="img/disccount1.jpg"></a></li>
		<li><a title="Min 80% Off" href=""><img src="img/disccount2.jpg"></a></li>
		<li><a title="Min 80% Off"href=""><img src="img/disccount3.jpg"></a></li>
	</ul>
	<ul>
		<li><a title="Min 80% Off" href=""><img src="img/disccount4.jpg"></a></li>
		<li><a title="Min 80% Off" href=""><img src="img/disccount5.jpg"></a></li>
		<li><a title="Min 80% Off" href=""><img src="img/disccount6.jpg"></a></li>
	</ul>
</section>


<section class="shop-him-her">
	<div class="him-her">
		<div class="him">
    <?php
    $get_boxes = "select * from boxes_section where position=1";
    $run=mysqli_query($con,$get_boxes);
    $row_boxes=mysqli_fetch_array($run);
      $box_title = $row_boxes['box_title'];
      $box_image = $row_boxes['box_image'];
      echo "
        <a href='shop.php?cat=Men'>
          <img src='admin_area/box_images/$box_image' alt='$box_title' title='$box_title'/>
        </a>
      "; 
    ?>
		</div>
		<div class="her">
		<?php
    $get_boxes = "select * from boxes_section where position=2";
    $run=mysqli_query($con,$get_boxes);
    $row_boxes=mysqli_fetch_array($run);
      $box_title = $row_boxes['box_title'];
      $box_image = $row_boxes['box_image'];
      echo "
        <a href='shop.php?cat=Women'>
          <img src='admin_area/box_images/$box_image' alt='$box_title' title='$box_title'/>
        </a>
      "; 
    ?>
		</div>
	</div>

	<div class="him-her">
		<div class="him">
		<?php
    $get_boxes = "select * from boxes_section where position=3";
    $run=mysqli_query($con,$get_boxes);
    $row_boxes=mysqli_fetch_array($run);
      $box_title = $row_boxes['box_title'];
      $box_image = $row_boxes['box_image'];
      echo "
        <a href='shop.php?cat=Men'>
          <img src='admin_area/box_images/$box_image' alt='$box_title' title='$box_title'/>
        </a>
      "; 
    ?>
		</div>
		<div class="her">
		<?php
    $get_boxes = "select * from boxes_section where position=4";
    $run=mysqli_query($con,$get_boxes);
    $row_boxes=mysqli_fetch_array($run);
      $box_title = $row_boxes['box_title'];
      $box_image = $row_boxes['box_image'];
      echo "
        <a href='shop.php?cat=Women'>
          <img src='admin_area/box_images/$box_image' alt='$box_title' title='$box_title'/>
        </a>
      "; 
    ?>
		</div>
	</div>
</section>



<section id="product-sub-categories">
	<div class="section-title">
		<h3>Topwear | 50-80% Off</h3>
        <a href="shop.php?proCat=Topwear">View All</a>
	</div>
	<div class="pro-sub-cat">
    <?php

    $get_SubCat = "SELECT * FROM `product_sub_categories` WHERE top=2 ORDER BY `cat_id` ASC LIMIT 0,4";

    $run = mysqli_query($con,$get_SubCat);

    while($row=mysqli_fetch_array($run)){

        $id = $row['id'];
        $title = $row['title'];
        $img = $row['image'];
        $entitle=urlencode($title);
        if($row['cat_id']==1){
          $urlTitle="cat=Men&subCat=$entitle";
        }elseif($row['cat_id']==2){
          $urlTitle="cat=Women&subCat=$entitle";
        }else{
          $urlTitle="cat=Kids&subCat=$entitle";
        }

        echo "
            <a href='shop.php?$urlTitle' class='sub-cat'>
              <img src='admin_area/cat_images/$img'/>
            </a>
        ";  
    }
    ?>
	</div>
	<div class="section-title">
		<h3>Bottomwear | 50-80% Off</h3>
        <a href="shop.php?proCat=Bottomwear">View All</a>
	</div>
	<div class="pro-sub-cat">
  <?php

    $get_SubCat = "SELECT * FROM `product_sub_categories` WHERE top=3 ORDER BY `cat_id` ASC LIMIT 0,4";

    $run = mysqli_query($con,$get_SubCat);

    while($row=mysqli_fetch_array($run)){
        
        $id = $row['id'];
        $title = $row['title'];
        $img = $row['image'];
        $entitle=urlencode($title);
        if($row['cat_id']==1){
          $urlTitle="cat=Men&subCat=$entitle";
        }elseif($row['cat_id']==2){
          $urlTitle="cat=Women&subCat=$entitle";
        }else{
          $urlTitle="cat=Kids&subCat=$entitle";
        }
        echo "
            <a href='shop.php?$urlTitle' class='sub-cat'>
              <img src='admin_area/cat_images/$img'/>
            </a>
        ";  
    }
  ?>
	</div>	
</section>


<section id="Offer">
	<div class="container-fluid">
		<div class="row">
			<div class="col-lg-4">
      <?php
      $get_boxes = "select * from boxes_section where position=5";
      $run=mysqli_query($con,$get_boxes);
      $row_boxes=mysqli_fetch_array($run);
        $box_title = $row_boxes['box_title'];
        $box_image = $row_boxes['box_image'];
        echo "
          <a href='shop.php'>
            <img src='admin_area/box_images/$box_image' alt='$box_title' title='$box_title'/>
          </a>
        "; 
      ?>
			</div>
			<div class="col-lg-6">
				<div class="offer-slider">
          <?php 
            getTshirt();
          ?>
				</div>
			</div>		
		</div>
	</div>
</section>


<section id="deal">
	<div class="single-item">
      <?php
      $get_slides = "select * from slider WHERE position=2";  
      $run_slides = mysqli_query($con,$get_slides);
      while($row_slides=mysqli_fetch_array($run_slides)){
        $slide_name = $row_slides['slide_name'];
        $slide_image = $row_slides['slide_image'];
        $slide_url = $row_slides['slide_url'];
        echo "
          <a href='$slide_url'>
            <div>
              <img src='admin_area/slides_images/$slide_image' alt='$slide_name' title='$slide_name'>
            </div>
          </a>
        ";
      }
      ?>
	</div>
</section>



<section id="products">
	<div class="section-title">
		<h3>SWARAJYA T-SHIRT | 50-80% Off</h3>
        <a href="shop.php?cat=Men&subCat=T-Shirts">View All</a>
	</div>
	<div class="products-slider">
    <?php 
      getTshirt();
    ?>
	</div>
</section>

<section id="products">
	<div class="section-title">
		<h3>Marathi Tshirt | 50-80% Off</h3>
        <a href="shop.php?cat=Men&subCat=T-Shirts">View All</a>
	</div>
	<div class="products-slider">
    <?php 
      getTshirt();
    ?>
	</div>
</section>

<section id="e-commerce-features">
  <ul>
    <li>
      <a href="">
      <i class="fa fa-truck"></i>
      <span>Speed Dilevry</span>
      </a>
    </li>
    <li>
      <a href="">
      <i class="fas fa-piggy-bank"></i>
      <span>Low Price</span>
      </a>
    </li>
    <li>
      <a href="">
      <i class="fas fa-rupee-sign"></i>
      <span>Cash On Dilevry</span>
      </a>
    </li>
    <li>
      </a>
      <a href="">
      <i class="fas fa-headset"></i>
      <span>24/7 Support</span>
      </a>
    </li>     
  </ul>
</section>

   <?php 
    
    include("includes/footer.php");
    
    ?>

<!-- jQuery -->
<script src="css/jQuery/jquery.js"></script>

<script type="text/javascript" src="css/slick/slick.js"></script>
<!-- Bootstrap JS -->
<script src="css/bootstrap/bootstrap.js"></script>

<!-- Main Script -->
<script src="js/script.js"></script>
    
</body>
</html>