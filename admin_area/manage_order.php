<?php

if (!isset($_SESSION['admin_email'])) {

    echo "<script>window.open('login.php','_self')</script>";
} else {

?>

    <?php

    if (isset($_GET['manage_order'])) {

        $edit_id = $_GET['manage_order'];

        $get_o = "select * from customer_orders where id='$edit_id'";

        $run_edit = mysqli_query($con, $get_o);

        $row_edit = mysqli_fetch_array($run_edit);
        $order_id = $row_edit['order_id'];
        $order_date = $row_edit['order_date'];


        $invoice_no = $row_edit['invoice_no'];

        $product_id = $row_edit['product_id'];
        $get_products = "select * from products where product_id='$product_id'";
        $run_products = mysqli_query($con, $get_products);
        $row_products = mysqli_fetch_array($run_products);
        $product_title = $row_products['product_title'];
        $product_img1 = $row_products['product_img1'];

        $qty = $row_edit['qty'];
        $size = $row_edit['size'];


        $c_id = $row_edit['customer_id'];
        $get_customer = "select * from customers where customer_id='$c_id'";
        $run_customer = mysqli_query($con, $get_customer);
        $row_customer = mysqli_fetch_array($run_customer);

        $customer_details = "Name: {$row_customer['customer_name']} \n 
        Email: {$row_customer['customer_email']} \n 
        Phone: {$row_customer['customer_contact']} \n";

        $address = "{$row_customer['customer_address']} \n 
        {$row_customer['customer_city']} \n 
        {$row_customer['customer_state']} \n 
        {$row_customer['customer_pin_code']}";


        $order_amount = $row_edit['due_amount'];

        $payment_type = $row_edit['payment_type'];

        $payment_status = $row_edit['payment_status'];

        $order_status_id = $row_edit['order_status'];
    }



    ?>





    <div class="row">
        <!-- row Begin -->

        <div class="col-lg-12">
            <!-- col-lg-12 Begin -->

            <ol class="breadcrumb">
                <!-- breadcrumb Begin -->

                <li class="active">
                    <!-- active Begin -->

                    <i class="fa fa-dashboard"></i> Dashboard / Manage Order

                </li><!-- active Finish -->

            </ol><!-- breadcrumb Finish -->

        </div><!-- col-lg-12 Finish -->

    </div><!-- row Finish -->

    <div class="row">
        <!-- row Begin -->

        <div class="col-lg-12">
            <!-- col-lg-12 Begin -->

            <div class="panel panel-default">
                <!-- panel panel-default Begin -->

                <div class="panel-heading">
                    <!-- panel-heading Begin -->

                    <h3 class="panel-title">
                        <!-- panel-title Begin -->

                        <i class="fa fa-money fa-fw"></i> Update Order

                    </h3><!-- panel-title Finish -->

                </div> <!-- panel-heading Finish -->

                <div class="panel-body">
                    <!-- panel-body Begin -->

                    <form method="post" class="form-horizontal" enctype="multipart/form-data">
                        <!-- form-horizontal Begin -->

                        <!-- Order Id -->
                        <div class="form-group">
                            <!-- form-group Begin -->

                            <label class="col-md-3 control-label"> Order Id </label>

                            <div class="col-md-6">
                                <!-- col-md-6 Begin -->

                                <input disabled type="text" class="form-control" value="<?php echo $order_id; ?>">

                            </div><!-- col-md-6 Finish -->

                        </div><!-- form-group Finish -->

                        <!-- Order Date -->
                        <div class="form-group">
                            <!-- form-group Begin -->

                            <label class="col-md-3 control-label"> Order Date </label>

                            <div class="col-md-6">
                                <!-- col-md-6 Begin -->

                                <input disabled type="text" class="form-control" value="<?php echo $order_date; ?>">

                            </div><!-- col-md-6 Finish -->

                        </div><!-- form-group Finish -->

                        <!-- Customer Details -->
                        <div class="form-group">
                            <!-- form-group Begin -->

                            <label class="col-md-3 control-label"> Customer Details </label>

                            <div class="col-md-6">
                                <!-- col-md-6 Begin -->

                                <input disabled type="text" class="form-control" value="<?php echo $customer_details; ?>">

                            </div><!-- col-md-6 Finish -->

                        </div><!-- form-group Finish -->

                        <!-- Address -->
                        <div class="form-group">
                            <!-- form-group Begin -->

                            <label class="col-md-3 control-label"> Customer Address </label>

                            <div class="col-md-6">
                                <!-- col-md-6 Begin -->

                                <input disabled type="text" class="form-control" value="<?php echo $address; ?>">

                            </div><!-- col-md-6 Finish -->

                        </div><!-- form-group Finish -->

                        <!-- Title -->
                        <div class="form-group">
                            <!-- form-group Begin -->

                            <label class="col-md-3 control-label"> Product Title </label>

                            <div class="col-md-6">
                                <!-- col-md-6 Begin -->

                                <input disabled type="text" class="form-control" value="<?php echo $product_title; ?>">

                            </div><!-- col-md-6 Finish -->

                        </div><!-- form-group Finish -->

                        <!-- Images -->
                        <div class="form-group">
                            <!-- form-group Begin -->

                            <label class="col-md-3 control-label"> Product Image 1 </label>

                            <div class="col-md-6">

                                <img width="70" height="70" src="product_images/<?php echo $product_img1; ?>" alt="<?php echo $product_img1; ?>">

                            </div><!-- col-md-6 Finish -->

                        </div><!-- form-group Finish -->

                        <!-- QTY -->
                        <div class="form-group">
                            <!-- form-group Begin -->

                            <label class="col-md-3 control-label"> QTY </label>

                            <div class="col-md-6">
                                <!-- col-md-6 Begin -->

                                <input disabled type="text" class="form-control" value="<?php echo $qty; ?>">

                            </div><!-- col-md-6 Finish -->

                        </div><!-- form-group Finish -->

                        <!-- Size -->
                        <div class="form-group">
                            <!-- form-group Begin -->

                            <label class="col-md-3 control-label"> Product Size </label>

                            <div class="col-md-6">
                                <!-- col-md-6 Begin -->

                                <input disabled type="text" class="form-control" value="<?php echo $size; ?>">

                            </div><!-- col-md-6 Finish -->

                        </div><!-- form-group Finish -->

                        <!-- price -->
                        <div class="form-group">
                            <!-- form-group Begin -->

                            <label class="col-md-3 control-label"> Amount </label>

                            <div class="col-md-6">
                                <!-- col-md-6 Begin -->

                                <input disabled type="text" class="form-control" value="<?php echo $order_amount; ?>">

                            </div><!-- col-md-6 Finish -->

                        </div><!-- form-group Finish-->

                        <!-- Payment Type -->
                        <div class="form-group">
                            <!-- form-group Begin -->

                            <label class="col-md-3 control-label"> Payment Type </label>

                            <div class="col-md-6">
                                <!-- col-md-6 Begin -->

                                <input disabled type="text" class="form-control" value="<?php echo $payment_type; ?>">

                            </div><!-- col-md-6 Finish -->

                        </div><!-- form-group Finish-->

                        <!-- Payment Status -->
                        <div class="form-group">
                            <!-- form-group Begin -->

                            <label class="col-md-3 control-label"> Payment Status </label>

                            <div class="col-md-6">
                                <!-- col-md-6 Begin -->

                                <input disabled type="text" class="form-control" value="<?php echo $payment_status; ?>">

                            </div><!-- col-md-6 Finish -->

                        </div><!-- form-group Finish-->

                        <!-- Status -->
                        <div class="form-group">
                            <!-- form-group Begin -->

                            <label class="col-md-3 control-label"> Order Status </label>

                            <div class="col-md-6">
                                <!-- col-md-6 Begin -->

                                <select name="status" class="form-control">
                                    <!-- form-control Begin -->

                                    <?php

                                    $get_status = "select * from order_status";

                                    $run_status = mysqli_query($con, $get_status);


                                    while ($row_status = mysqli_fetch_array($run_status)) {
                                        $status_id = $row_status['id'];
                                        $order_status = $row_status['name'];
                                        $selected = $status_id == $order_status_id ? "selected" : "";
                                        echo "
                                  
                                  <option value='$status_id' $selected> $order_status</option>
                                  
                                  ";
                                    }

                                    ?>

                                </select><!-- form-control Finish -->

                            </div><!-- col-md-6 Finish -->

                        </div><!-- form-group Finish -->

                        <!-- <div id="shipped_box" style="display:none">
                            <table>
                                <tr>
                                    <td><input type="text" class="form-control" name="length" placeholder="length" /></td>
                                    <td><input type="text" class="form-control" name="breadth" placeholder="Breadth" /></td>
                                    <td><input type="text" class="form-control" name="height" placeholder="height" /></td>
                                    <td><input type="text" class="form-control" name="weight" placeholder="weight" /></td>
                                </tr>
                            </table>
                        </div> -->

                        <div class="form-group">
                            <!-- form-group Begin -->

                            <label class="col-md-3 control-label"></label>

                            <div class="col-md-6">
                                <!-- col-md-6 Begin -->

                                <input name="update" value="Update Order" type="submit" class="btn btn-primary form-control">

                            </div><!-- col-md-6 Finish -->

                        </div><!-- form-group Finish -->

                    </form><!-- form-horizontal Finish -->

                </div><!-- panel-body Finish -->

            </div><!-- canel panel-default Finish -->

        </div><!-- col-lg-12 Finish -->

    </div><!-- row Finish -->

    <!-- <script>
        function select_status() {
            var update_order_status = jQuery('#update_order_status').val();
            if (update_order_status == 3) {
                jQuery('#shipped_box').show();
            }
        }
    </script> -->


    <?php

    if (isset($_POST['update'])) {

        $statusId = $_POST['status'];

        $update_status = "update customer_orders set order_status='$statusId' where id='$edit_id'";
                
        $run_status = mysqli_query($con,$update_status);
        
        if($run_status){
            
            echo "<script>alert('Your order status Has Been Updated')</script>";
            
            echo "<script>window.open('index.php?view_orders','_self')</script>";
            
        }
    }

    ?>



<?php } ?>