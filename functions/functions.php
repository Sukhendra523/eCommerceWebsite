<?php 

$db = mysqli_connect("localhost","username","password","database");

function get_safe_value($con,$str){
	if($str!=''){
		$str=trim($str);
		return mysqli_real_escape_string($con,$str);
	}
}

/// begin getRealIpUser functions ///
 
function getRealIpUser(){
    
    switch(true){
            
            case(!empty($_SERVER['HTTP_X_REAL_IP'])) : return $_SERVER['HTTP_X_REAL_IP'];
            case(!empty($_SERVER['HTTP_CLIENT_IP'])) : return $_SERVER['HTTP_CLIENT_IP'];
            case(!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) : return $_SERVER['HTTP_X_FORWARDED_FOR'];
            
            default : return $_SERVER['REMOTE_ADDR'];
            
    }
    
}
 
/// finish getRealIpUser functions ///

// search function //

function search($search_str=''){
    global $db;
    $sql="select * from products where product_status = '1'";
    if($search_str!=''){
		$sql.=" and (product_title like '%$search_str%' or 	product_desc like '%$search_str%' or product_keywords like '%$search_str%') ";
    }
    $run_search=mysqli_query($db,$sql);
    $count=mysqli_num_rows($run_search);
    if ($count==0) {
        echo "<h3>No Data Found</h3>";
    }
    else{
        echo "
        <div class='link-breadcrumb'>
            <ul>
                <li><a href='index.php'>Home</a></li>
                <li>Search</li>
                <li> $search_str</li>
            </ul>
        </div>
        <p style='font-size: 18px;color: black;text-align: center;display: block;width: 100%;'> 
            <span style='color:red; font-size:22px;'>$count </span> Items Found in Result
        </p>";
        while ($row_products=mysqli_fetch_array($run_search)) {
            $pro_id = $row_products['product_id'];
            
            $pro_title = $row_products['product_title'];
            
            $pro_price = $row_products['product_price'];
            
            $pro_img1 = $row_products['product_img1'];
            echo "
            <div class='shop-col'>
                <a href='details.php?pro_id=$pro_id'>
                    <img src='admin_area/product_images/$pro_img1'>
                    <span>$pro_title<br>&nbsp;&#8377;$pro_price</span>
                </a>
            </div>
            ";
        }
    }
}



// finish search function //


/// begin add_cart functions ///

function add_cart(){
    
    global $db;
    
    if(isset($_GET['add_cart'])){
        
        
        $ip_add = getRealIpUser();
        
        $p_id = $_GET['add_cart'];
        
        $product_qty = $_POST['product_qty'];
        
        
        if(isset($_POST['product_size'])){
            $product_size = $_POST['product_size'];
        }else{
            $product_size = "Black";
        }
        
        if(isset($_POST['product_color'])){
            $product_color = $_POST['product_color'];
        }else{
            $product_color = "L";
        }
        
        $check_product = "select * from cart where ip_add='$ip_add' AND p_id='$p_id'";
        
        $run_check = mysqli_query($db,$check_product);


        
        if(mysqli_num_rows($run_check)>0){
            
            echo "<script>alert('This product has already added in cart')</script>";
            echo "<script>window.open('details.php?pro_id=$p_id','_self')</script>";
            
        }else{

            
            
            $get_price ="select * from products where product_id='$p_id'";

            $run_price = mysqli_query($db,$get_price);

            $row_price = mysqli_fetch_array($run_price);

            $pro_price = $row_price['product_price'];

            $pro_sale = $row_price['product_sale'];

            $pro_label = $row_price['product_label'];

            if($pro_label == "sale"){

                $product_price = $pro_sale;

            }else{

                $product_price = $pro_price;

            }
            
            $query = "insert into cart (p_id,ip_add,qty,p_price,size,color) values ('$p_id','$ip_add','$product_qty','$product_price','$product_size','$product_color')";
            
            $run_query = mysqli_query($db,$query);
            
            echo "<script>window.open('details.php?pro_id=$p_id','_self')</script>";
            
        }
        
    }
    
}
 


/// finish add_cart functions ///




////////////////////////////////////
/////get tshirt////

function getTshirt(){
    
    global $db;
    
    $get_products = "SELECT * FROM `products` WHERE p_sub_cat_id=1 ORDER BY product_id DESC";
    
    $run = mysqli_query($db,$get_products);
    
    while($row=mysqli_fetch_array($run)){
        
        $id = $row['product_id'];
        
        $title = $row['product_title'];
        
        $price = $row['product_price'];

        $sale_price = $row['product_sale'];
        
        $img1 = $row['product_img1'];
        
        $label = $row['product_label'];
        
        $manufacturer_id = $row['manufacturer_id'];

        $get_manufacturer = "select * from manufacturers where manufacturer_id='$manufacturer_id'";

        $run_manufacturer = mysqli_query($db,$get_manufacturer);

        $row_manufacturer = mysqli_fetch_array($run_manufacturer);

        $manufacturer_title = $row_manufacturer['manufacturer_title'];

        if($label == "sale"){

            $product_price = "$price  ";

            $product_sale_price = "/  $sale_price ";

        }else{

            $product_price = "$price  ";

            $product_sale_price = "";

        }

        if($label == ""){

        }else{

            $product_label = "
            
                <a href='#' class='label $label'>
                
                    <div class='theLabel'> $label </div>
                    <div class='labelBackground'>  </div>
                
                </a>
            
            ";

        }
        
        echo "
        <a href='details.php?pro_id=$id'>
            <div>
                <img src='admin_area/product_images/$img1'>
                <p>$title<br>&#8377; $product_price</p>
            </div>
        </a>
       ";
        
    }
    
}

//// ends get tshirt ////

/////////////////////////////////////////





/// begin getPro functions ///

function getPro(){
    
    global $db;
    
    $get_products = "select * from products order by 1 DESC LIMIT 0,12";
    
    $run_products = mysqli_query($db,$get_products);
    
    while($row_products=mysqli_fetch_array($run_products)){
        
        $pro_id = $row_products['product_id'];
        
        $pro_title = $row_products['product_title'];
        
        $pro_price = $row_products['product_price'];

        $pro_sale_price = $row_products['product_sale'];
        
        $pro_img1 = $row_products['product_img1'];
        
        $pro_label = $row_products['product_label'];
        
        $manufacturer_id = $row_products['manufacturer_id'];

        $get_manufacturer = "select * from manufacturers where manufacturer_id='$manufacturer_id'";

        $run_manufacturer = mysqli_query($db,$get_manufacturer);

        $row_manufacturer = mysqli_fetch_array($run_manufacturer);

        $manufacturer_title = $row_manufacturer['manufacturer_title'];

        if($pro_label == "sale"){

            $product_price = "$pro_price  ";

            $product_sale_price = "/  $pro_sale_price ";

        }else{

            $product_price = "$pro_price  ";

            $product_sale_price = "";

        }

        if($pro_label == ""){

        }else{

            $product_label = "
            
                <a href='#' class='label $pro_label'>
                
                    <div class='theLabel'> $pro_label </div>
                    <div class='labelBackground'>  </div>
                
                </a>
            
            ";

        }
        
        echo "
        
        <a href='details.php?pro_id=$pro_id'>
            <div>
                <img src='admin_area/product_images/$pro_img1'>
                <p>$pro_title<br>&#8377; $product_price </p>
            </div>
        </a>";
        
    }
    
}


/// finish getPro functions ///

/// begin getPCats functions ///

function getW_PCats(){
    
    global $db;
    
    $get_p_cats = "select * from product_categories";
    
    $run_p_cats = mysqli_query($db,$get_p_cats);
    
    while($row_p_cats=mysqli_fetch_array($run_p_cats)){
        
        $p_cat_id = $row_p_cats['p_cat_id'];
        
        $p_cat_title = $row_p_cats['p_cat_title'];
        
        echo "
        
            <li>
            
                <a href='products.php?w_p_cat=$p_cat_id'>$p_cat_title </a>
            
            </li>
        
        ";
        
    }
    
}

function getM_PCats(){
    
    global $db;
    
    $get_p_cats = "select * from product_categories";
    
    $run_p_cats = mysqli_query($db,$get_p_cats);
    
    while($row_p_cats=mysqli_fetch_array($run_p_cats)){
        
        $p_cat_id = $row_p_cats['p_cat_id'];
        
        $p_cat_title = $row_p_cats['p_cat_title'];
        
        echo "
        
            <li>
            
                <a href='/products.php?m_p_cat=$p_cat_id'>$p_cat_title </a>
            
            </li>
        
        ";
        
    }
    
}





//////////////////////////////////////////
/// start getM_proCat functions ///

function getM_proCat(){
    
    global $db;
    
    $get_proCat= "SELECT * FROM `product_categories` WHERE cat_id=1 ORDER BY `p_cat_id` ASC";
    
    $run_proCat = mysqli_query($db,$get_proCat);
    
    while($row_proCat=mysqli_fetch_array($run_proCat)){
        
        $p_cat_id = $row_proCat['p_cat_id'];
        
        $p_cat_title = $row_proCat['p_cat_title'];
        $pCatTitle=urlencode($p_cat_title);

        echo "

            <li><a href='shop.php?cat=Men&proCat=$pCatTitle'>$p_cat_title </a>
                <ul>
        ";
        $get_subCat="SELECT * FROM `product_sub_categories` WHERE cat_id=1 and pro_cat_id=$p_cat_id ORDER BY `id` ASC";
        $run_subCat = mysqli_query($db,$get_subCat);
        while($row_subCat=mysqli_fetch_array($run_subCat)){

            $id = $row_subCat['id'];
            $title = $row_subCat['title'];
            $urlTitle=urlencode($title);
            echo "

                    <li><a href='shop.php?cat=Men&subCat=$urlTitle'>$title</a></li>
            ";
        }
        echo "
                </ul>
            </li>
        ";

    }
    
}
    
/// finish getM_proCat functions ///


/// start getW_proCat functions ///

function getW_proCat(){
    
    global $db;
    
    $get_proCat= "SELECT * FROM `product_categories` WHERE cat_id=2 ORDER BY `p_cat_id` ASC";
    
    $run_proCat = mysqli_query($db,$get_proCat);
    
    while($row_proCat=mysqli_fetch_array($run_proCat)){
        
        $p_cat_id = $row_proCat['p_cat_id'];
        
        $p_cat_title = $row_proCat['p_cat_title'];
        $pCatTitle=urlencode($p_cat_title);
        
        echo "

            <li><a href='shop.php?cat=Women&proCat=$pCatTitle'>$p_cat_title </a>
                <ul>
        ";
        $get_subCat="SELECT * FROM `product_sub_categories` WHERE cat_id=2 and pro_cat_id=$p_cat_id ORDER BY `id` ASC";
        $run_subCat = mysqli_query($db,$get_subCat);
        while($row_subCat=mysqli_fetch_array($run_subCat)){

            $id = $row_subCat['id'];
            $title = $row_subCat['title'];
            $urlTitle=urlencode($title);
            echo "

                    <li><a href='shop.php?cat=Women&subCat=$urlTitle'>$title</a></li>
            ";
        }
        echo "
                </ul>
            </li>
        ";

    }
    
}

/// finish getW_proCat functions ///


///man///
function getManCat(){
    
    global $db;
    $getMan="SELECT * FROM `categories` WHERE cat_id=1";
    $row=mysqli_fetch_array(mysqli_query($db,$getMan));
    $title=$row['cat_title'];
    $image=$row['cat_image'];
    echo "
        <li>
            <img src='admin_area/cat_images/$image' width='300px' height='350px'>
        </li>
    ";

}


///women///

function getWomenCat(){
    
    global $db;
    $getWomen="SELECT * FROM `categories` WHERE cat_id=2";
    $row=mysqli_fetch_array(mysqli_query($db,$getWomen));
    $title=$row['cat_title'];
    $image=$row['cat_image'];
    echo "
        <li>
            <img src='admin_area/cat_images/$image' width='300px' height='350px'>
        </li>
    ";

}

////////////////////////////////////////////



/// begin getCats functions ///

function getCats(){
    
    global $db;
    
    $get_cats = "select * from categories";
    
    $run_cats = mysqli_query($db,$get_cats);
    
    while($row_cats=mysqli_fetch_array($run_cats)){
        
        $cat_id = $row_cats['cat_id'];
        
        $cat_title = $row_cats['cat_title'];

        $cat_img = $row_cats['cat_image'];
        
        echo "
        
            <li>
            
                <a href='products.php?cat=$cat_id'>$cat_title </a>
            
            </li>
        
        ";
        
    }
    
}
    
/// finish getCats functions ///


/// begin getpcatpro functions ///


function getpcatpro(){
    
    global $db;
    
    if(isset($_GET['proCat'])){
        
        $p_cat_id = $_GET['proCat'];
        
        $get_p_cat ="select * from product_categories where p_cat_id='$p_cat_id'";
        
        $run_p_cat = mysqli_query($db,$get_p_cat);
        
        $row_p_cat = mysqli_fetch_array($run_p_cat);
        
        $p_cat_title = $row_p_cat['p_cat_title'];
        
        $p_cat_desc = $row_p_cat['p_cat_desc'];
        
        $get_products ="select * from products where p_cat_id='$p_cat_id'";
        
        $run_products = mysqli_query($db,$get_products);
        
        $count = mysqli_num_rows($run_products);
        
        if($count==0){
            
            echo "
            
                <div class='box' style='text-align:center;'>
                
                    <h1> No Product Found In This Product Categories </h1>
                
                </div>
            
            ";
            
        }else{
            
            echo "
            
                <div class='box' style='text-align:center;'>
                
                    <h1 > $p_cat_title </h1>
                    
                    <p> $p_cat_desc </p>
                
                </div>
            
            ";
            
        }
        
        while($row_products=mysqli_fetch_array($run_products)){
            
            $pro_id = $row_products['product_id'];
        
            $pro_title = $row_products['product_title'];

            $pro_price = $row_products['product_price'];

            $pro_img1 = $row_products['product_img1'];
            
            echo "<div class='shop-col'>
            <a href='details.php?pro_id=$pro_id'>
                <img src='admin_area/product_images/$pro_img1'>
                <span>$pro_title<br>&nbsp;&#8377;$pro_price</span>
            </a>
        <a href='details.php?pro_id=$pro_id' class='cart-btn'><i class='fas fa-cart-arrow-down'></i></a>
        </div>
            ";
            
        }
        
    }
    
}

function getW_pcatpro(){
    
    global $db;
    
    if(isset($_GET['w_p_cat'])){
        
        $p_cat_id = $_GET['w_p_cat'];
        
        $get_p_cat ="select * from product_categories where p_cat_id='$p_cat_id'";
        
        $run_p_cat = mysqli_query($db,$get_p_cat);
        
        $row_p_cat = mysqli_fetch_array($run_p_cat);
        
        $p_cat_title = $row_p_cat['p_cat_title'];
        
        $p_cat_desc = $row_p_cat['p_cat_desc'];
        
        $get_products ="select * from products where p_cat_id='$p_cat_id' and cat_id='2'";
        
        $run_products = mysqli_query($db,$get_products);
        
        $count = mysqli_num_rows($run_products);
        
        if($count==0){
            
            echo "
            
                <div class='box' style='text-align:center;'>
                
                    <h1> No Product Found In This Product Categories </h1>
                
                </div>
            
            ";
            
        }else{
            
            echo "
            
                <div class='box' style='text-align:center;'>
                
                    <h1 > $p_cat_title </h1>
                    
                    <p> $p_cat_desc </p>
                
                </div>
            
            ";
            
        }
        
        while($row_products=mysqli_fetch_array($run_products)){
            
            $pro_id = $row_products['product_id'];
        
            $pro_title = $row_products['product_title'];

            $pro_price = $row_products['product_price'];

            $pro_img1 = $row_products['product_img1'];
            
            echo "<div class='shop-col'>
            <a href='details.php?pro_id=$pro_id'>
                <img src='admin_area/product_images/$pro_img1'>
                <span>$pro_title<br>&nbsp;&#8377;$pro_price</span>
            </a>
        <a href='details.php?pro_id=$pro_id' class='cart-btn'><i class='fas fa-cart-arrow-down'></i></a>
        </div>
            ";
            
        }
        
    }
    
}



function getM_pcatpro(){
    
    global $db;
    
    if(isset($_GET['m_p_cat'])){
        
        $p_cat_id = $_GET['m_p_cat'];
        
        $get_p_cat ="select * from product_categories where p_cat_id='$p_cat_id'";
        
        $run_p_cat = mysqli_query($db,$get_p_cat);
        
        $row_p_cat = mysqli_fetch_array($run_p_cat);
        
        $p_cat_title = $row_p_cat['p_cat_title'];
        
        $p_cat_desc = $row_p_cat['p_cat_desc'];
        
        $get_products ="select * from products where p_cat_id='$p_cat_id' and cat_id='1'";
        
        $run_products = mysqli_query($db,$get_products);
        
        $count = mysqli_num_rows($run_products);
        
        if($count==0){
            
            echo "
            
                <div class='box' style='text-align:center;'>
                
                    <h1> No Product Found In This Product Categories </h1>
                
                </div>
            
            ";
            
        }else{
            
            echo "
            
                <div class='box' style='text-align:center;'>
                
                    <h1 > $p_cat_title </h1>
                    
                    <p> $p_cat_desc </p>
                
                </div>
            
            ";
            
        }
        
        while($row_products=mysqli_fetch_array($run_products)){
            
            $pro_id = $row_products['product_id'];
        
            $pro_title = $row_products['product_title'];

            $pro_price = $row_products['product_price'];

            $pro_img1 = $row_products['product_img1'];
            
            echo "<div class='shop-col'>
            <a href='details.php?pro_id=$pro_id'>
                <img src='admin_area/product_images/$pro_img1'>
                <span>$pro_title<br>&nbsp;&#8377;$pro_price</span>
            </a>
        <a href='details.php?pro_id=$pro_id' class='cart-btn'><i class='fas fa-cart-arrow-down'></i></a>
        </div>
            ";
            
        }
        
    }
    
}

/// finish getpcatpro functions ///

/// begin getcatpro functions ///

function getcatpro(){
    
    global $db;
    
    if(isset($_GET['cat'])){
        
        $cat_id = $_GET['cat'];
        
        $get_cat = "select * from categories where cat_id='$cat_id'";
        
        $run_cat = mysqli_query($db,$get_cat);
        
        $row_cat = mysqli_fetch_array($run_cat);
        
        $cat_title = $row_cat['cat_title'];
        
        $cat_desc = $row_cat['cat_desc'];
        
        $get_cat = "select * from products where cat_id='$cat_id'";
        
        $run_products = mysqli_query($db,$get_cat);
        
        $count = mysqli_num_rows($run_products);
        
        if($count==0){
            
            
            echo "
            
                <div class='box'>
                
                    <h1> No Product Found In This Category </h1>
                
                </div>
            
            ";
            
        }else{
            
            echo "
            
                <div class='box' style='text-align:center;'>
                
                    <h1> $cat_title </h1>
                    
                    <p> $cat_desc </p>
                
                </div>
            
            ";
            
        }
        
        while($row_products=mysqli_fetch_array($run_products)){
            
            $pro_id = $row_products['product_id'];
            
            $pro_title = $row_products['product_title'];
            
            $pro_price = $row_products['product_price'];
            
            $pro_desc = $row_products['product_desc'];
            
            $pro_img1 = $row_products['product_img1'];
            
            echo "<div class='shop-col'>
            <a href='details.php?pro_id=$pro_id'>
                <img src='admin_area/product_images/$pro_img1'>
                <span>$pro_title<br>&nbsp;&#8377;$pro_price</span>
            </a>
        <a href='details.php?pro_id=$pro_id' class='cart-btn'><i class='fas fa-cart-arrow-down'></i></a>
        </div>
            ";
            
        }
        
    }
    
}

/// finish getcatpro functions ///

/// finish getRealIpUser functions ///

function items(){
    
    global $db;
    
    $ip_add = getRealIpUser();
    
    $get_items = "select * from cart where ip_add='$ip_add'";
    
    $run_items = mysqli_query($db,$get_items);
    
    $count_items = mysqli_num_rows($run_items);
    
    echo $count_items;
    
}

/// finish getRealIpUser functions ///

/// begin total_price functions ///

function total_price(){
    
    global $db;
    
    $ip_add = getRealIpUser();
    
    $total = 0;
    
    $select_cart = "select * from cart where ip_add='$ip_add'";
    
    $run_cart = mysqli_query($db,$select_cart);
    
    while($record=mysqli_fetch_array($run_cart)){
        
        $pro_id = $record['p_id'];
        
        $pro_qty = $record['qty'];
            
        $sub_total = $record['p_price']*$pro_qty;
            
        $total += $sub_total;
        
    }
    
    echo "$" . $total;
    
}

/// finish total_price functions ///

/// Begin getProducts(); functions ///

function getProducts(){

    global $db;
    $aWhere = array();

    /// Begin for Manufacturer ///
    
    if(isset($_REQUEST['man'])&&is_array($_REQUEST['man'])){

        foreach($_REQUEST['man'] as $sKey=>$sVal){

            if((int)$sVal!=0){

                $aWhere[] = 'manufacturer_id='.(int)$sVal;

            }

        }

    }

    /// Finish for Manufacturer ///  

    /// Begin for Product Categories /// 

    if(isset($_REQUEST['p_cat'])&&is_array($_REQUEST['p_cat'])){

        foreach($_REQUEST['p_cat'] as $sKey=>$sVal){

            if((int)$sVal!=0){

                $aWhere[] = 'p_cat_id='.(int)$sVal;

            }

        }

    }    

    /// Finish for Product Categories /// 

    /// Begin for Categories /// 

    if(isset($_REQUEST['cat'])&&is_array($_REQUEST['cat'])){

        foreach($_REQUEST['cat'] as $sKey=>$sVal){

            if((int)$sVal!=0){

                $aWhere[] = 'cat_id='.(int)$sVal;

            }

        }

    }    

    /// Finish for Categories /// 

    $per_page=12;

    if(isset($_GET['page'])){

        $page = $_GET['page'];

    }else{
        $page=1;
    }

    $start_from = ($page-1) * $per_page;
    $sLimit = " order by 1 DESC LIMIT $start_from,$per_page";
    $sWhere = (count($aWhere)>0?' WHERE '.implode(' or ',$aWhere):'').$sLimit;
    $get_products = "select * from products ".$sWhere;
    $run_products = mysqli_query($db,$get_products);
    while($row_products=mysqli_fetch_array($run_products)){
        
        $pro_id = $row_products['product_id'];
        
        $pro_title = $row_products['product_title'];
        
        $pro_price = $row_products['product_price'];

        $pro_sale_price = $row_products['product_sale'];
        
        $pro_img1 = $row_products['product_img1'];
        
        $pro_label = $row_products['product_label'];
        
        $manufacturer_id = $row_products['manufacturer_id'];

        $get_manufacturer = "select * from manufacturers where manufacturer_id='$manufacturer_id'";

        $run_manufacturer = mysqli_query($db,$get_manufacturer);

        $row_manufacturer = mysqli_fetch_array($run_manufacturer);

        $manufacturer_title = $row_manufacturer['manufacturer_title'];

        if($pro_label == "sale"){

            $product_price = " $pro_price </del> ";

            $product_sale_price = "/ $pro_sale_price ";

        }else{

            $product_price = "  $pro_price  ";

            $product_sale_price = "";

        }

        if($pro_label == ""){

        }else{

            $product_label = "
            
                <a href='#' class='label $pro_label'>
                
                    <div class='theLabel'> $pro_label </div>
                    <div class='labelBackground'>  </div>
                
                </a>
            
            ";

        }
        
        echo "
        
        <div class='shop-col'>
            <a href='details.php?pro_id=$pro_id'>
                <img src='admin_area/product_images/$pro_img1'>
                <span>$pro_title<br>&nbsp;&#8377; $product_price</span>
            </a>
        <button class='cart-btn'><i class='fas fa-cart-arrow-down'></i></button>
        </div>
        
        ";
        
    }

}


/// finish getProducts(); functions ///

/// begin getPaginator(); functions ///

function getPaginator(){

    global $db;

    $per_page=12;
    $aWhere = array();
    $aPath = '';

    /// Begin for Manufacturer ///
    
    if(isset($_REQUEST['man'])&&is_array($_REQUEST['man'])){

        foreach($_REQUEST['man'] as $sKey=>$sVal){

            if((int)$sVal!=0){

                $aWhere[] = 'manufacturer_id='.(int)$sVal;
                $aPath .= 'man[]='.(int)$sVal.'&';

            }

        }

    }

    /// Finish for Manufacturer ///  

    /// Begin for Product Categories /// 

    if(isset($_REQUEST['p_cat'])&&is_array($_REQUEST['p_cat'])){

        foreach($_REQUEST['p_cat'] as $sKey=>$sVal){

            if((int)$sVal!=0){

                $aWhere[] = 'p_cat_id='.(int)$sVal;
                $aPath .= 'p_cat[]='.(int)$sVal.'&';

            }

        }

    }    

    /// Finish for Product Categories /// 

    /// Begin for Categories /// 

    if(isset($_REQUEST['cat'])&&is_array($_REQUEST['cat'])){

        foreach($_REQUEST['cat'] as $sKey=>$sVal){

            if((int)$sVal!=0){

                $aWhere[] = 'cat_id='.(int)$sVal;
                $aPath .= 'cat[]='.(int)$sVal.'&';

            }

        }

    }    

    /// Finish for Categories ///   
    
    $sWhere = (count($aWhere)>0?' WHERE '.implode(' or ',$aWhere):'');
    $query = "select * from products".$sWhere;
    $result = mysqli_query($db,$query);
    $total_records = mysqli_num_rows($result);
    $total_pages = ceil($total_records / $per_page);

    echo "<li> <a href='shop.php?page=1";
    if(!empty($aPath)){

        echo "&".$aPath;

    }

    echo "'>".'First Page'."</a></li>";

    for($i=1; $i<=$total_pages; $i++){

        echo "<li> <a href='shop.php?page=".$i.(!empty($aPath)?'&'.$aPath:'')."'>".$i."</a></li>";

    };

    echo "<li> <a href='shop.php?page=$total_pages";

    if(!empty($aPath)){

        echo "&".$aPath;

    }

    echo "'>".'Last Page'."</a></li>";

}

/// finish getPaginator(); functions ///

?>