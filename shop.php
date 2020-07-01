<?php 

    include("includes/header.php");
    include("includes/connect.php");

?>




<div class="shop-div" style="display:-webkit-flex;">
    <div class="shop-sidebar" style="-webkit-box-flex: 1; flex: 1 1 0%;">
        <div>
            <div class="vertical-filter" style="top: 0px; bottom: auto;">
                <span class="filter-ul sidebar-heading">
                    Filter
                    <div class="filter-toggle"><i class="fa fa-bars" aria-hidden="true"></i></div>
                </span>

               
                <ul class="filter-ul" style="display :<?php  if(isset($_GET['cat'])){ echo "none";} ?>">
                    <h3>Clothing</h3>
                    <?php

                    $query = "SELECT DISTINCT(cat) FROM products WHERE product_status = '1' ORDER BY product_cat DESC";
                    $statement = $connect->prepare($query);
                    $statement->execute();
                    $result = $statement->fetchAll();
                    foreach($result as $row)
                    {
                    ?>
                    <div class="list-group-item checkbox">
                        <label>
                            <input type="checkbox" class="common_selector cat" value="<?php echo $row['cat']; ?>" > <?php echo $row['cat']; ?>
                        </label>
                    </div>
                    <?php    
                    }

                    ?>

                    <div class="list-group-item checkbox" style="display: none;">
                        <label>
                            <input type="checkbox" <?php  if(isset($_GET['cat'])){ echo "checked";} ?> class="common_selector cat" value="<?php  if(isset($_GET['cat'])){ echo $_GET['cat'];} ?>"  > 
                        </label>
                    </div>
                </ul>

                <!-- <ul class="filter-ul">
                    <h3>Price</h3>
                    <input type="hidden" id="hidden_minimum_price" value="0" />
                    <input type="hidden" id="hidden_maximum_price" value="65000" />
                    <p id="price_show">0 - 65000</p>
                    <div id="price_range"></div>
                </ul>-->
                
                <ul class="filter-ul">
                    <h3>Brand</h3>
                    <?php

                    $query = "SELECT DISTINCT(product_brand) FROM products WHERE product_status = '1' ORDER BY product_id DESC";
                    $statement = $connect->prepare($query);
                    $statement->execute();
                    $result = $statement->fetchAll();
                    foreach($result as $row)
                    {
                    ?>
                    <div class="list-group-item checkbox">
                        <label><input type="checkbox" class="common_selector brand" value="<?php echo $row['product_brand']; ?>"  > <?php echo $row['product_brand']; ?></label>
                    </div>
                    <?php
                    }
                    ?>
                </ul>


                <ul class="filter-ul">
                    <h3>Categories</h3>
                    <?php

                    $query = "SELECT DISTINCT(product_cat) FROM products WHERE product_status = '1' ORDER BY product_cat DESC";
                    $statement = $connect->prepare($query);
                    $statement->execute();
                    $result = $statement->fetchAll();
                    foreach($result as $row)
                    {
                    ?>
                    <div class="list-group-item checkbox">
                        <label>
                            <input type="checkbox" class="common_selector proCat" value="<?php echo $row['product_cat']; ?>" > <?php echo $row['product_cat']; ?>
                        </label>
                    </div>
                    <?php    
                    }

                    ?>

                    <div class="list-group-item checkbox" style="display: none;">
                        <label>
                            <input type="checkbox" <?php  if(isset($_GET['proCat'])){ echo "checked";} ?> class="common_selector proCat" value="<?php  if(isset($_GET['proCat'])){ echo $_GET['proCat'];} ?>"  > 
                        </label>
                    </div>
                </ul>
                
                <ul class="filter-ul">
                    <h3>Sub Categories</h3>
                    <?php
                    $query = "
                    SELECT DISTINCT(product_sub_cat) FROM products WHERE product_status = '1' ORDER BY product_sub_cat DESC
                    ";
                    $statement = $connect->prepare($query);
                    $statement->execute();
                    $result = $statement->fetchAll();
                    foreach($result as $row)
                    {
                    ?>
                    <div class="list-group-item checkbox">
                        <label>
                            <input type="checkbox" class="common_selector sub_cat" value="<?php echo $row['product_sub_cat']; ?>"  > <?php echo $row['product_sub_cat']; ?>
                        </label>
                    </div>
                    <?php
                    }
                    ?>

                    <div class="list-group-item checkbox" style="display: none;">
                        <label>
                            <input type="checkbox" <?php  if(isset($_GET['subCat'])){ echo "checked";} ?> class="common_selector sub_cat" value="<?php  if(isset($_GET['subCat'])){ echo $_GET['subCat'];} ?>"  > 
                        </label>
                    </div>
                </ul>
            </div>    
        </div>    
    </div>
    <section  class="shop-section" style="-webkit-box-flex: 1; flex: 1 1 0%;">
        <div class="shop-row filter_data" style="display: -webkit-flex;">

        </div>

    </section>
</div>

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
 
 <style>
#loading
{
    text-align:center; 
    background: url('loader.gif') no-repeat center; 
    height: 150px;
}
</style>

<script>
$(document).ready(function(){

    filter_data();

    function filter_data()
    {
        $('.filter_data').html('<div id="loading" style="" ></div>');
        var action = 'fetch_data';
        var minimum_price = $('#hidden_minimum_price').val();
        var maximum_price = $('#hidden_maximum_price').val();
        var cat = get_filter('cat');
        var brand = get_filter('brand');
        var proCat = get_filter('proCat');
        var sub_cat = get_filter('sub_cat');
        $.ajax({
            url:"fetch_data.php",
            method:"POST",
            data:{action:action, minimum_price:minimum_price, maximum_price:maximum_price, cat:cat,  brand:brand, proCat:proCat, sub_cat:sub_cat},
            success:function(data){
                $('.filter_data').html(data);
            }
        });
    }

    function get_filter(class_name)
    {
        var filter = [];
        $('.'+class_name+':checked').each(function(){
            filter.push($(this).val());
        });
        return filter;
    }

    $('.common_selector').click(function(){
        filter_data();
    });

    $('#price_range').slider({
        range:true,
        min:1000,
        max:65000,
        values:[1000, 65000],
        step:500,
        stop:function(event, ui)
        {
            $('#price_show').html(ui.values[0] + ' - ' + ui.values[1]);
            $('#hidden_minimum_price').val(ui.values[0]);
            $('#hidden_maximum_price').val(ui.values[1]);
            filter_data();
        }
    });

});
</script>  
    
</body>
</html>