<?php 

include("includes/db.php");
include("functions/functions.php");

?> 

				<?php 
                
                if(isset($_POST['submit'])){
                    if ($_POST['payment_method']=='COD') {
                    	$c_ID=$_POST["CUST_ID"];
                        echo "<script>window.open('order.php?c_id=$c_ID','_self')</script>";
					}
					else{

							

						header("Pragma: no-cache");
						header("Cache-Control: no-cache");
						header("Expires: 0");

						// following files need to be included
						require_once("PaytmKit/lib/config_paytm.php");
						require_once("PaytmKit/lib/encdec_paytm.php");

						$checkSum = "";
						$paramList = array();

						$ORDER_ID = $_POST["ORDER_ID"];
						$CUST_ID = $_POST["CUST_ID"];
						$INDUSTRY_TYPE_ID = $_POST["INDUSTRY_TYPE_ID"];
						$CHANNEL_ID = $_POST["CHANNEL_ID"];
						$TXN_AMOUNT = $_POST["TXN_AMOUNT"];

						// Create an array having all required parameters for creating checksum.
						$paramList["MID"] = PAYTM_MERCHANT_MID;
						$paramList["ORDER_ID"] = $ORDER_ID;
						$paramList["CUST_ID"] = $CUST_ID;
						$paramList["INDUSTRY_TYPE_ID"] = $INDUSTRY_TYPE_ID;
						$paramList["CHANNEL_ID"] = $CHANNEL_ID;
						$paramList["TXN_AMOUNT"] = $TXN_AMOUNT;
						$paramList["WEBSITE"] = PAYTM_MERCHANT_WEBSITE;
						 
						
						$paramList["CALLBACK_URL"] = "http://localhost/kubercart/PaytmKit/pgResponse.php";
						/*
						$paramList["MSISDN"] = $MSISDN; //Mobile number of customer
						$paramList["EMAIL"] = $EMAIL; //Email ID of customer
						$paramList["VERIFIED_BY"] = "EMAIL"; //
						$paramList["IS_USER_VERIFIED"] = "YES"; //

						*/

						//Here checksum string will return by getChecksumFromArray() function.
						$checkSum = getChecksumFromArray($paramList,PAYTM_MERCHANT_KEY);


							$ip_add = getRealIpUser();
							$payment_type = $_POST['payment_method'];
							$payment_status = "pending";
							$order_status = 1;
							

							$invoice_no = mt_rand();

							$select_cart = "select * from cart where ip_add='$ip_add'";

							$run_cart = mysqli_query($con,$select_cart);

							while($row_cart = mysqli_fetch_array($run_cart)){

							$pro_id = $row_cart['p_id'];

							$pro_qty = $row_cart['qty'];

							$pro_size = $row_cart['size'];

							$get_products = "select * from products where product_id='$pro_id'";

							$run_products = mysqli_query($con, $get_products);

							$row_products = mysqli_fetch_array($run_products);

							$sub_total = $row_products['product_price'] * $pro_qty;

							$insert_customer_order = "insert into customer_orders (order_id,product_id,
									customer_id,due_amount,invoice_no,qty,size,order_date,payment_type,payment_status,order_status) 
									values ('$ORDER_ID','$pro_id','$CUST_ID',
									'$sub_total','$invoice_no','$pro_qty','$pro_size',NOW(),
									'$payment_type','$payment_status','$order_status')";

							$run_customer_order = mysqli_query($con, $insert_customer_order);
							}

							$delete_cart = "delete from cart where ip_add='$ip_add'";
							        
							$run_delete = mysqli_query($con,$delete_cart);

                    }
                    
                    
                }


                
                ?>
<html>
<head>
<title>KuberCart Check Out</title>
</head>
<body>
	<center><h1>Please do not refresh this page...</h1></center>
		<form method="post" action="<?php echo PAYTM_TXN_URL ?>" name="f1">
		<table border="1">
			<tbody>
			<?php
			foreach($paramList as $name => $value) {
				echo '<input type="hidden" name="' . $name .'" value="' . $value . '">';
			}
			?>
			<input type="hidden" name="CHECKSUMHASH" value="<?php echo $checkSum ?>">
			</tbody>
		</table>
		<script type="text/javascript">
			document.f1.submit();
		</script>
	</form>
</body>
</html>