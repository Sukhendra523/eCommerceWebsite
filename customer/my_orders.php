<div class="account-section" id="myorder">
        <ul>
             <?php 
            
            $customer_session = $_SESSION['customer_email'];
            
            $get_customer = "select * from customers where customer_email='$customer_session'";
            
            $run_customer = mysqli_query($con,$get_customer);
            
            $row_customer = mysqli_fetch_array($run_customer);
            
            $customer_id = $row_customer['customer_id'];
            
            $get_orders = "select * from customer_orders where customer_id='$customer_id' ";
            
            $run_orders = mysqli_query($con,$get_orders);
            
            $i = 0;
            if (mysqli_num_rows($run_orders)) {
                 while($row_orders = mysqli_fetch_array($run_orders)){
                
                $order_id = $row_orders['order_id'];
                $invoice_no = $row_orders['invoice_no'];

                $product_id = $row_orders['product_id'];
                $get_products = "select * from products where product_id='$product_id'";
                $run_products = mysqli_query($con, $get_products);
                $row_products = mysqli_fetch_array($run_products);
                $product_title = $row_products['product_title'];
                $product_img = $row_products['product_img1'];
                
                $due_amount = $row_orders['due_amount'];
                
                $qty = $row_orders['qty'];
                
                $size = $row_orders['size'];
                
                $order_date = substr($row_orders['order_date'],0,11);

                $payment_type = $row_orders['payment_type'];

                $payment_status = $row_orders['payment_status'];

                $order_status_id = $row_orders['order_status'];

                $get_status = "select * from order_status where id='$order_status_id'";

                $run_status = mysqli_query($con, $get_status);

                $row_status = mysqli_fetch_array($run_status);
                $order_status = $row_status['name'];
                
                $i++;
               
           
            
            ?>
            
            <li>
                <div class="order-heading">
                    <p>Order ID: <a href=""><?php echo $order_id; ?></a> </p>
                    <p>Order Date: <?php echo $order_date; ?> </p>
                </div>
                <img src="../admin_area/product_images/<?php echo $product_img ?>">
                <div class="order-detail">
                    <h3><a href="#"><?php echo $product_title; ?></a></h3><br>
                    <span>Total Amount: <b>Rs <?php echo $due_amount; ?></b></span><br>
                    <span>QTY: <b><?php echo $qty; ?> </b></span><br>
                    <span>Payment Mode:<b> <?php echo $payment_type; ?> </b></span><br>
                    <span>Payment Status:<b> <?php echo $payment_status ?></b></span><br>
                    <span>Order Status: <b><?php echo $order_status; ?> </b></span><br>

                </div>
            </li>
            
            <?php } }

            else{
                echo "<div class='noOrder'><h1>no order found</h1></div>";
            }
             ?>
        </ul>
    </div>


