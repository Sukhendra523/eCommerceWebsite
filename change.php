<?php 

session_start();

$active='Cart';

include("includes/db.php");
include("functions/functions.php");

?>

<?php 

$ip_add = getRealIpUser();

if(isset($_POST['id'])){

    $id = $_POST['id'];
    $qty = $_POST['quantity'];
    $update_qty = "update cart set qty='$qty' where p_id='$id' AND ip_add='$ip_add'";

    $run_qty = mysqli_query($con,$update_qty);

}

?>