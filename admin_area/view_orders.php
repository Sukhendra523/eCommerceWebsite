<?php 
    
    if(!isset($_SESSION['admin_email'])){
        
        echo "<script>window.open('login.php','_self')</script>";
        
    }else{

?>

<div class="row"><!-- row 1 begin -->
    <div class="col-lg-12"><!-- col-lg-12 begin -->
        <ol class="breadcrumb"><!-- breadcrumb begin -->
            <li class="active"><!-- active begin -->
                
                <i class="fa fa-dashboard"></i> Dashboard / View Orders
                
            </li><!-- active finish -->
        </ol><!-- breadcrumb finish -->
    </div><!-- col-lg-12 finish -->
</div><!-- row 1 finish -->

<div class="row"><!-- row 2 begin -->
    <div class="col-lg-12"><!-- col-lg-12 begin -->
        <div class="panel panel-default"><!-- panel panel-default begin -->
            <div class="panel-heading"><!-- panel-heading begin -->
               <h3 class="panel-title"><!-- panel-title begin -->
               
                   <i class="fa fa-tags"></i>  View Orders
                
               </h3><!-- panel-title finish --> 
            </div><!-- panel-heading finish -->
            
            <div class="panel-body"><!-- panel-body begin -->
                <div class="table-responsive"><!-- table-responsive begin -->
                    <table class="table table-striped table-bordered table-hover"><!-- table table-striped table-bordered table-hover begin -->
                        
                        <thead><!-- thead begin -->
                            <tr><!-- tr begin -->
                                <th> No: </th>
                                <th>Order Details: </th>
                                <th>Customer Details: </th>
                                <th>Customer Address: </th>
                                <th> Product Details: </th>
                                <th> Total Amount: </th>
                                <th>Payment Type: </th>
                                <th>Payment Status: </th>
                                <th> Order Status: </th>
                                <th>Manage Order: </th>
                                <th> Delete: </th>
                            </tr><!-- tr finish -->
                        </thead><!-- thead finish -->
                        
                        <tbody><!-- tbody begin -->
                            
                            <?php 
          
                                $i=0;
                            
                                $get_orders = "select * from customer_orders";
                                
                                $run_orders = mysqli_query($con,$get_orders);
          
                                while($row_order=mysqli_fetch_array($run_orders)){

                                    $id = $row_order['id'];

                                    // $order_id = $row_order['order_id'];
                                    // $invoice_no = $row_order['invoice_no'];
                                    // $order_date = $row_order['order_date'];
                                    $order_details = "Order Id: {$row_order['order_id']}\n
                                    Order Date: {$row_order['order_date']}\n
                                    Invoice No: {$row_order['invoice_no']}
                                    ";

                                    $c_id = $row_order['customer_id'];
                                    $get_customer = "select * from customers where customer_id='$c_id'";
                                    $run_customer = mysqli_query($con,$get_customer);
                                    $row_customer = mysqli_fetch_array($run_customer);
                                    
                                    // $customer_name = $row_customer['customer_name'];
                                    // $customer_email = $row_customer['customer_email'];
                                    // $customer_contact = $row_customer['customer_contact'];
                                    $customer_details="Name: {$row_customer['customer_name']} \n 
                                    Email: {$row_customer['customer_email']} \n 
                                    Phone: {$row_customer['customer_contact']} \n";


                                    $address = "{$row_customer['customer_address']} \n 
                                    {$row_customer['customer_city']} \n 
                                    {$row_customer['customer_state']} \n 
                                    {$row_customer['customer_pin_code']}";
                                    
                                    
                                    $product_id = $row_order['product_id'];
                                    
                                    // $qty = $row_order['qty'];
                                    
                                    // $size = $row_order['size'];
                                    $get_products = "select * from products where product_id='$product_id'";
                                    
                                    $run_products = mysqli_query($con,$get_products);
                                    
                                    $row_products = mysqli_fetch_array($run_products);
                                    
                                    // $product_title = $row_products['product_title'];
                                    $product_details ="
                                        Title: {$row_products['product_title']}\n
                                        Qty: {$row_order['qty']}\n
                                        Size: {$row_order['size']}
                                    ";

                                    $order_amount = $row_order['due_amount'];
                                    
                                    $payment_type = $row_order['payment_type'];

                                    $payment_status = $row_order['payment_status'];
                                    
                                    $order_status_id = $row_order['order_status'];

                                    $get_status = "select * from order_status where id='$order_status_id'";

                                    $run_status = mysqli_query($con,$get_status);
                                    
                                    $row_status = mysqli_fetch_array($run_status);
                                    $order_status = $row_status['name'];
                                    
                                    
                                    
                                    
                                    
                                    $i++;
                            
                            ?>
                            
                            <tr><!-- tr begin -->
                                <td> <?php echo $i; ?> </td>
                                <td> <?php echo $order_details; ?> </td>
                                <td> <?php echo $customer_details; ?></td>
                                <td><?php echo $address;?></td>
                                <td> <?php echo $product_details; ?> </td>
                                
                                <td> <?php echo $order_amount; ?> </td>
                                <td> <?php echo $payment_type; ?> </td>
                                <td> <?php echo $payment_status; ?> </td>
                                <td><?php echo $order_status;?></td>
                                <td> 
                                     
                                     <a href="index.php?manage_order=<?php echo $id; ?>">
                                     
                                        <i class="fa fa-pencil"></i>Manage Order
                                    
                                     </a> 
                                     
                                </td>
                                <td> 
                                     
                                     <a href="index.php?delete_order=<?php echo $id; ?>">
                                     
                                        <i class="fa fa-trash-o"></i> Delete
                                    
                                     </a> 
                                     
                                </td>
                            </tr><!-- tr finish -->
                            
                            <?php } ?>
                            
                        </tbody><!-- tbody finish -->
                        
                    </table><!-- table table-striped table-bordered table-hover finish -->
                </div><!-- table-responsive finish -->
            </div><!-- panel-body finish -->
            
        </div><!-- panel panel-default finish -->
    </div><!-- col-lg-12 finish -->
</div><!-- row 2 finish -->

<?php } ?>