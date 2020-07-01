<?php

$active = 'Cart';
include("includes/header.php");

?>

<form action="cart.php" method="post" enctype="multipart/form-data" class="cart-form">
  <?php

  $ip_add = getRealIpUser();

  $select_cart = "select * from cart where ip_add='$ip_add'";

  $run_cart = mysqli_query($con, $select_cart);

  $count = mysqli_num_rows($run_cart);


  	

  
  ?>

  
  <p><span>My Cart</span>You currently have <?php echo $count; ?> item(s) in your cart</p>
  <table>
    <thead>
      <tr>
        <th class="product-thumbnail">&nbsp</th>
        <th class="product-name">Product</th>
        <th class="product-price">Price</th>
        <th class="product-quantity">Quantity</th>
        <th class="product-remove">Remove</th>
        <th class="product-subtotal">Subtotal</th>
      </tr>
    </thead>
    <tbody>
      <?php

      $total = 0;
      

      while ($row_cart = mysqli_fetch_array($run_cart)) {

        $pro_id = $row_cart['p_id'];

        $pro_size = $row_cart['size'];

        $pro_color = $row_cart['color'];

        $pro_qty = $row_cart['qty'];

        $pro_sale = $row_cart['p_price'];

        $pro_cname = $row_cart['name'];

        $pro_csticker = $row_cart['sticker'];

        $pro_cquote = $row_cart['quote'];

        $pro_cimage = $row_cart['image'];

        $pro_cinst = $row_cart['instruction'];

        $get_products = "select * from products where product_id='$pro_id'";

        $run_products = mysqli_query($con, $get_products);

        while ($row_products = mysqli_fetch_array($run_products)) {

          $product_title = $row_products['product_title'];

          $product_img1 = $row_products['product_img1'];

          $only_price = $row_products['product_price'];

          $sub_total = $pro_sale * $pro_qty;

          $_SESSION['pro_qty'] = $pro_qty;

          $total += $sub_total;

      ?>
          <tr>
            <td class="product-thumbnail">
              <a href="details.php?pro_id=<?php echo $pro_id; ?>"><img src="admin_area/product_images/<?php echo $product_img1; ?>"></a>
            </td>
            <td class="product-name">
              <a href="details.php?pro_id=<?php echo $pro_id; ?>"> <?php echo $product_title; ?> </a>
              <ul>
                <li>Color: <?php echo $pro_color; ?></li>
                <li>Size: <?php echo $pro_size; ?></li>
                <?php
                if ($pro_cname) {
                  echo "<li>Name : $pro_cname</li>";
                }

                if ($pro_csticker) {
                  echo "<li>Sticker : $pro_csticker</li>";
                }

                if ($pro_cquote) {
                  echo "<li>Quote : $pro_cquote</li>";
                }

                if ($pro_cimage) {
                  echo "<li>Image : <img src='images/$pro_cimage' width='50px' height='50px'></li>";
                }

                if ($pro_cinst) {
                  echo "<li>instruction : $pro_cinst</li>";
                }
                ?>
              </ul>
            </td>
            <td class="product-price" data-title="Price :">
              &#8377 <?php echo $pro_sale; ?>
            </td>
            <td class="product-quantity" data-title="Quantity :">
              <input type="quantity" class="quantity" name="quantity" data-product_id="<?php echo $pro_id; ?>" value="<?php echo $_SESSION['pro_qty']; ?>">
            </td>
            <td class="product-remove" data-title="Remove ">
              <input type="checkbox" name="remove[]" value="<?php echo $pro_id; ?>">
            </td>
            <td class="product-subtotal" data-title="Subtotal :">&#8377 <?php echo $sub_total; ?></td>
          </tr>

      <?php }
      }
      ?>
    </tbody>
  </table>

  <div class="cart-action">
    <input type="text" name="code" placeholder="Coupon Code">
    <button type="submit" class="apply-coupon" name="apply_coupon">Apply Coupon</button>
    <button type="submit" class="update-cart" name="update"> Update Cart</button>
  </div>

  <div class="checkout">
    <span class="checkout-title">Cart Total</span>
    <p>Subtotal :<span class="checkout-price">&#8377;<?php echo $total; ?></span></p>
    <p>Delivery Fee :<span class="checkout-price">&#8377; 30</span></p>
    <p>Total :<span class="checkout-price">&#8377; <?php echo $total + 30; ?></span></p>
    <a href="checkout.php" class="checkout-btn">PROCEED TO CHECKOUT</a>
  </div>
</form>
<?php

if (isset($_POST['apply_coupon'])) {

  $code = $_POST['code'];

  if ($code == "") {
  } else {

    $get_coupons = "select * from coupons where coupon_code='$code'";
    $run_coupons = mysqli_query($con, $get_coupons);
    $check_coupons = mysqli_num_rows($run_coupons);

    if ($check_coupons == "1") {

      $row_coupons = mysqli_fetch_array($run_coupons);

      $coupon_pro_id = $row_coupons['product_id'];
      $coupon_price = $row_coupons['coupon_price'];
      $coupon_limit = $row_coupons['coupon_limit'];
      $coupon_used = $row_coupons['coupon_used'];

      if ($coupon_limit == $coupon_used) {

        echo "<script>alert('Your Coupon Already Expired')</script>";
      } else {

        $get_cart = "select * from cart where p_id='$coupon_pro_id' AND ip_add='$ip_add'";
        $run_cart = mysqli_query($con, $get_cart);
        $check_cart = mysqli_num_rows($run_cart);

        if ($check_cart == "1") {

          $add_used = "update coupons set coupon_used=coupon_used+1 where coupon_code='$code'";
          $run_used = mysqli_query($con, $add_used);
          $update_cart = "update cart set p_price='$coupon_price' where p_id='$coupon_pro_id' AND ip_add='$ip_add'";
          $run_update_cart = mysqli_query($con, $update_cart);

          echo "<script>alert('Your Coupon Has Been Applied')</script>";
          echo "<script>window.open('cart.php','_self')</script>";
        } else {

          echo "<script>alert('Your Coupon Didnt Match With Your Product On Your Cart')</script>";
        }
      }
    } else {

      echo "<script>alert('You Coupon Is Not Valid')</script>";
    }
  }
}

?>

<?php

function update_cart()
{

  global $con;

  if (isset($_POST['update'])) {

    foreach ($_POST['remove'] as $remove_id) {

      $delete_product = "delete from cart where p_id='$remove_id'";

      $run_delete = mysqli_query($con, $delete_product);

      if ($run_delete) {

        echo "<script>window.open('cart.php','_self')</script>";
      }
    }
  }
}

echo @$up_cart = update_cart();

?>

<!-- jQuery -->
<script src="css/jQuery/jquery.js"></script>

<script type="text/javascript" src="css/slick/slick.js"></script>
<!-- Bootstrap JS -->
<script src="css/bootstrap/bootstrap.js"></script>

<!-- Main Script -->
<script src="js/script.js"></script>

<script>
  $(document).ready(function(data) {

    $(document).on('keyup', '.quantity', function() {

      var id = $(this).data("product_id");
      var quantity = $(this).val();

      if (quantity != '') {

        $.ajax({

          url: "change.php",
          method: "POST",
          data: {
            id: id,
            quantity: quantity
          },

          success: function() {
            $("body").load("cart.php");
          }

        });

      }

    });

  });
</script>


</body>

</html>