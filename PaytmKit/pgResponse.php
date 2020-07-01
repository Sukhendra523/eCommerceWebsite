<?php
header("Pragma: no-cache");
header("Cache-Control: no-cache");
header("Expires: 0");


// following files need to be included
require_once("./lib/config_paytm.php");
require_once("./lib/encdec_paytm.php");
include("../includes/db.php");

$paytmChecksum = "";
$paramList = array();
$isValidChecksum = "FALSE";

$paramList = $_POST;
$paytmChecksum = isset($_POST["CHECKSUMHASH"]) ? $_POST["CHECKSUMHASH"] : ""; //Sent by Paytm pg

//Verify all parameters received from Paytm pg to your application. Like MID received from paytm pg is same as your application�s MID, TXN_AMOUNT and ORDER_ID are same as what was sent by you to Paytm PG for initiating transaction etc.
$isValidChecksum = verifychecksum_e($paramList, PAYTM_MERCHANT_KEY, $paytmChecksum); //will return TRUE or FALSE string.


if($isValidChecksum == "TRUE") {
	echo "<b style='Padding:20%;'>Please Do not refresh the page.....</b>" . "<br/>";
	if ($_POST["STATUS"] == "TXN_SUCCESS") {

		$o_id=$_POST["ORDERID"];
		$p_status="Paid";
		$update_order="update customer_orders set payment_status='$p_status' ,order_staus='2' where order_id='$o_id' ";
		$run_update_order = mysqli_query($con,$update_order);
		echo "<script>window.open('../customer/my_account.php?my_orders','_self')</script>";
		

		//Process your transaction here as success transaction.
		//Verify amount & order id received from Payment gateway with your application's order id and amount.
	}
	else {
		$o_id=$_POST["ORDERID"];
		$p_status=$_POST["STATUS"];
		$update_order="update customer_orders set payment_status='$p_status',order_staus='4' where order_id='$o_id' ";
		$run_update_order = mysqli_query($con,$update_order);
		echo "<script>window.open('../customer/my_account.php?my_orders','_self')</script>";
	}
	
	

}
else {
	echo "<b>Checksum mismatched.</b>";
	//Process transaction as suspicious.
}

?>