      <?php

        $session_email = $_SESSION['customer_email'];

        $select_customer = "select * from customers where customer_email='$session_email'";

        $run_customer = mysqli_query($con, $select_customer);

        $row_customer = mysqli_fetch_array($run_customer);

        $customer_id = $row_customer['customer_id'];

        $customer_name = $row_customer['customer_name'];

        $customer_last_name = $row_customer['customer_last_name'];

        $customer_gender = $row_customer['customer_gender'];

        $customer_email = $row_customer['customer_email'];

        $customer_country = $row_customer['customer_country'];

        $customer_city = $row_customer['customer_city'];

        $customer_pin = $row_customer['customer_pin_code'];

        $customer_house = $row_customer['customer_house_num'];

        $customer_state = $row_customer['customer_state'];

        $customer_contact = $row_customer['customer_contact'];

        $customer_address = $row_customer['customer_address'];

        $address = $row_customer['address'];

        $customer_image = $row_customer['customer_image'];

        ?>

      <section id="checkout-page">
          <form action="payment_mode.php" method="post">
              <div class="checkout-address checkout-col">
                  <span class="summary-title">Delivery Address</span>
                  <div class="address-row">
                      <label>First Name
                          <input type="text" name="c_name" value="<?php echo $customer_name; ?>" required="" placeholder="First Name">
                      </label>
                      <label>Last Name
                          <input type="text" name="c_lname" value="<?php echo $customer_last_name; ?>" required="" placeholder="Last Name">
                      </label>
                  </div>
                  <div class="address-row">
                      <label>Phone Number
                          <input type="tel" name="c_contact" value="<?php echo $customer_contact; ?>" pattern="[0-9]{10}" required="" placeholder="Phone Number">
                      </label>
                      <label>Email
                          <input type="email" name="c_email" value="<?php echo $customer_email; ?>" required="" placeholder="Email">
                      </label>
                  </div>
                  <div class="address-row">
                      <label>Street Address
                          <input type="text" name="c_address" value="<?php echo $customer_address; ?>" required="" placeholder="Street/Locality/Area">
                      </label>
                      <label>House Number
                          <input type="text" name="c_house" value="<?php echo $customer_house; ?>" required="" placeholder="House Number">
                      </label>
                  </div>
                  <div class="address-row">
                      <label>City
                          <input type="text" name="c_city" value="<?php echo $customer_city; ?>" required="" placeholder="City">
                      </label>
                      <label>Pin Code
                          <input type="number" name="c_pin" value="<?php echo $customer_pin; ?>" required="" placeholder="Pin Code">
                      </label>
                  </div>
                  <div class="address-row">
                      <label>Country
                          <input type="text" name="c_country" value="<?php echo $customer_country; ?>" required="" placeholder="Country">
                      </label>
                      <label>State
                          <input type="text" name="c_state" value="<?php echo $customer_state; ?>" required="" placeholder="State">
                      </label>
                  </div>
                  <!-- <div class="address-row">
                    
                </div>
                <div class="address-row">
                    
                </div>
                <div class="address-row">
                    
                </div> -->
              </div>
              <div class="order-summary checkout-col">
                  <?php

                    $ip_add = getRealIpUser();

                    $select_cart = "select * from cart where ip_add='$ip_add'";

                    $run_cart = mysqli_query($con, $select_cart);

                    $count = mysqli_num_rows($run_cart);

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
                          <div class="summary-row">
                              <img src="admin_area/product_images/<?php echo $product_img1; ?>">
                              <ul>

                                  <li><?php echo $product_title; ?></li>
                                  <li>Color : <?php echo $pro_color; ?></li>
                                  <li>Size : <?php echo $pro_size; ?></li>
                                  <?php
                                    if ($pro_cname) {
                                        echo "<li> $pro_cname</li>";
                                    }

                                    if ($pro_csticker) {
                                        echo "<li> $pro_csticker</li>";
                                    }

                                    if ($pro_cquote) {
                                        echo "<li> $pro_cquote</li>";
                                    }

                                    if ($pro_cimage) {
                                        echo "<li> <img src='images/$pro_cimage' width='50px' height='50px'></li>";
                                    }

                                    if ($pro_cinst) {
                                        echo "<li> $pro_cinst</li>";
                                    }
                                    ?>
                              </ul>
                              <span class="Summary-subtoatal">&#8377; <?php echo $pro_sale; ?> * <?php echo $_SESSION['pro_qty']; ?> = <?php echo $sub_total; ?></span>
                          </div>
                  <?php }
                    }
                    ?>
                  <?php
                    $final_price = $total;
                    $dd = 0;
                    if (isset($_POST['apply_coupon'])) {

                        if (!$_POST['code']) {
                        } else {
                            $coupon_str = get_safe_value($con, $_POST['code']);
                            $res = mysqli_query($con, "select * from coupon_master where coupon_code='$coupon_str' and status='1'");
                            $count = mysqli_num_rows($res);

                            if ($count > 0) {
                                $coupon_details = mysqli_fetch_assoc($res);
                                $coupon_value = $coupon_details['coupon_value'];
                                $id = $coupon_details['id'];
                                $coupon_type = $coupon_details['coupon_type'];
                                $cart_min_value = $coupon_details['cart_min_value'];

                                if ($cart_min_value > $total) {
                                    $final_price = $total;
                                    $dd = 'Cart total value must be equal to or greater than ' . $cart_min_value;
                                    // $jsonArr=array('is_error'=>'yes','result'=>$total,'dd'=>'Cart total value must be '.$cart_min_value);
                                } else {
                                    if ($coupon_type == 'Rupee') {
                                        $final_price = $total - $coupon_value;
                                    } else {
                                        $final_price = $total - (($total * $coupon_value) / 100);
                                    }
                                    $dd = $total - $final_price;
                                }
                            } else {
                                $final_price = $total;
                                $dd = 'Coupon code not found';
                                // $jsonArr=array('is_error'=>'yes','result'=>$total,'dd'=>'Coupon code not found');
                            }

                            // if ($check_coupons == "1") {

                            //   $row_coupons = mysqli_fetch_array($run_coupons);

                            //   $coupon_pro_id = $row_coupons['product_id'];
                            //   $coupon_price = $row_coupons['coupon_price'];
                            //   $coupon_limit = $row_coupons['coupon_limit'];
                            //   $coupon_used = $row_coupons['coupon_used'];

                            //   if ($coupon_limit == $coupon_used) {

                            //     echo "<script>alert('Your Coupon Already Expired')</script>";
                            //   } else {

                            //     $get_cart = "select * from cart where p_id='$coupon_pro_id' AND ip_add='$ip_add'";
                            //     $run_cart = mysqli_query($con, $get_cart);
                            //     $check_cart = mysqli_num_rows($run_cart);

                            //     if ($check_cart == "1") {

                            //       $add_used = "update coupons set coupon_used=coupon_used+1 where coupon_code='$code'";
                            //       $run_used = mysqli_query($con, $add_used);
                            //       $update_cart = "update cart set p_price='$coupon_price' where p_id='$coupon_pro_id' AND ip_add='$ip_add'";
                            //       $run_update_cart = mysqli_query($con, $update_cart);

                            //       echo "<script>alert('Your Coupon Has Been Applied')</script>";
                            //       echo "<script>window.open('cart.php','_self')</script>";
                            //     } else {

                            //       echo "<script>alert('Your Coupon Didnt Match With Your Product On Your Cart')</script>";
                            //     }
                            //   }
                            // } else {

                            //   echo "<script>alert('You Coupon Is Not Valid')</script>";
                            // }
                        }
                    }

                    ?>

              </div>
              <div class="proceed-to-payment">
                  <div class="summary-row">
                      <span class="subtotal-fee">Original Price</span>
                      <span class="summary-subtoatal">&#8377; <?php echo $total; ?></span>
                  </div>
                  <div class="summary-row coupon">
                          <input type="text" name="code" placeholder="Coupon Code" form="coupon">
                          <button type="submit" class="apply-coupon" name="apply_coupon" form="coupon">Apply Coupon</button>
                      </div>
                  <div class="summary-row">
                      <div class="ordre-details__total" id="coupon_box">
                          <span class="subtotal-fee">Coupon Discount</span>
                          <span class="summary-subtoatal">-&#8377; <?php echo $dd; ?></span>
                      </div>
                  </div>

                  <div class="summary-row">
                      <span class="subtotal-fee">Shipping Charges</span>
                      <span class="summary-subtoatal">+&#8377; 30</span>
                  </div>
                  <div class="summary-row">
                      <span class="subtotal-fee">Order Total</span>
                      <span class="summary-subtoatal">&#8377; <?php echo $final_price + 30; ?></span>
                  </div>
                  <label class="payment-method">
                      <input type="radio" name="payment_method" class="payment-method" value="online">
                      <img src="img/paytm-logo.gif">
                  </label>
                  <label class="payment-method">
                      <input type="radio" name="payment_method" value="COD">Cash on Delivery
                  </label>

                  <label class="terms">
                      <input type="checkbox" name="terms" required="">I have read and agree to the website terms and conditions *
                  </label>

                  <table border="1" style="display: none;">
                      <tbody>
                          <tr>
                              <th>S.No</th>
                              <th>Label</th>
                              <th>Value</th>
                          </tr>
                          <tr>
                              <td>1</td>
                              <td><label>ORDER_ID::*</label></td>
                              <td><input id="ORDER_ID" tabindex="1" maxlength="20" size="20" name="ORDER_ID" autocomplete="off" value="<?php echo  "ORDS" . rand(10000, 99999999) ?>">
                              </td>
                          </tr>
                          <tr>
                              <td>2</td>
                              <td><label>CUSTID ::*</label></td>
                              <td><input id="CUST_ID" tabindex="2" maxlength="12" size="12" name="CUST_ID" autocomplete="off" value="<?php echo $customer_id; ?>"></td>
                          </tr>
                          <tr>
                              <td>3</td>
                              <td><label>INDUSTRY_TYPE_ID ::*</label></td>
                              <td><input id="INDUSTRY_TYPE_ID" tabindex="4" maxlength="12" size="12" name="INDUSTRY_TYPE_ID" autocomplete="off" value="Retail"></td>
                          </tr>
                          <tr>
                              <td>4</td>
                              <td><label>Channel ::*</label></td>
                              <td><input id="CHANNEL_ID" tabindex="4" maxlength="12" size="12" name="CHANNEL_ID" autocomplete="off" value="WEB">
                              </td>
                          </tr>
                          <tr>
                              <td>5</td>
                              <td><label>txnAmount*</label></td>
                              <td><input title="TXN_AMOUNT" tabindex="10" type="text" name="TXN_AMOUNT" value="<?php echo $final_price + 30; ?>">
                              </td>
                          </tr>
                      </tbody>
                  </table>
                  <label class="place-order-btn">
                      <input type="submit" name="submit" value="Proceed to Payment">
                  </label>
              </div>
          </form>
          <form id="coupon" action="" method="post"></form>

      </section>