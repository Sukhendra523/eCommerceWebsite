<?php
 
//fetch_data.php

include("includes/connect.php");

if(isset($_POST["action"]))
{
    $query = "
        SELECT * FROM products WHERE product_status = '1'
    ";
    if(isset($_POST["cat"]))
    {
        $cat_filter = implode("','", $_POST["cat"]);
        $query .= "
         AND cat IN('".$cat_filter."')
        ";
    }
    if(isset($_POST["minimum_price"], $_POST["maximum_price"]) && !empty($_POST["minimum_price"]) && !empty($_POST["maximum_price"]))
    {
        $query .= "
         AND product_price BETWEEN '".$_POST["minimum_price"]."' AND '".$_POST["maximum_price"]."'
        ";
    }
    if(isset($_POST["brand"]))
    {
        $brand_filter = implode("','", $_POST["brand"]);
        $query .= "
         AND product_brand IN('".$brand_filter."')
        ";
    }
    if(isset($_POST["proCat"]))
    {
        $proCat_filter = implode("','", $_POST["proCat"]);
        $query .= "
         AND product_cat IN('".$proCat_filter."')
        ";
    }
    if(isset($_POST["sub_cat"]))
    {
        $sub_cat_filter = implode("','", $_POST["sub_cat"]);
        $query .= "
         AND product_sub_cat IN('".$sub_cat_filter."')
        ";
    }

    $query.="ORDER BY `product_id` DESC";
    $statement = $connect->prepare($query);
    $statement->execute();
    $result = $statement->fetchAll();
    $total_row = $statement->rowCount();
    $output = '';
    if($total_row > 0)
    {
        foreach($result as $row)
        {
            $output .= '
            <div class="shop-col">
            <a href="details.php?pro_id='. $row['product_id'] .'">
                <img src="admin_area/product_images/'. $row['product_img1'] .'">
                <span>'. $row['product_title'] .'<br>&nbsp;&#8377;'. $row['product_price'] .'</span>
            </a>
        </div>
            ';
        }
    }
    else
    {
        $output = '<div class="noOrder"><h1>:) Sorry No order found for this Category</h1></div>';
    }
    echo $output;
}

?>