 <?php 

$customer_session = $_SESSION['customer_email'];

$get_customer = "select * from customers where customer_email='$customer_session'";

$run_customer = mysqli_query($con,$get_customer);

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
 
    <div class="account-section" id="myprofile">
        <form action="" method="post" enctype="multipart/form-data">
            <span>Profile informaition</span>
            <?php if ($customer_image) {
                echo "<img src='customer_images/$customer_image' id='user-profile-image'>";
            }else{
                echo "<img src='img/user.svg' id='user-profile-image'>";
            }
             ?>
            
            <label>
                <p>Upload Image</p>
                <input style="display: none;"  onchange="loadFile(event)" id="file" name="c_image" type="file">
            </label>
            <script>
                var loadFile = function(event) {
                    var image = document.getElementById('user-profile-image');
                    image.src = URL.createObjectURL(event.target.files[0]);
                };
            </script>
            <input type="text" name="c_name" value="<?php echo $customer_name; ?>" required="" placeholder="First Name">
            <input type="text" name="c_lname" value="<?php echo $customer_last_name; ?>" required="" placeholder="Last Name">
            <input type="tel" name="c_contact" value="<?php echo $customer_contact; ?>" pattern="[0-9]{10}" required="" placeholder="Phone Number">
            <input type="email" name="c_email" value="<?php echo $customer_email; ?>" required="" placeholder="Email">

            <input type="radio" name="gender" value="male" > Male
            <input type="radio" name="gender" value="female"> Female
            <input type="radio" name="gender" value="other"> Other
            
            <span>Manage Address</span>
            <input type="number" name="c_pin" value="<?php echo $customer_pin; ?>" required="" placeholder="Pin Code">
            <input type="text" name="c_house" value="<?php echo $customer_house; ?>" required="" placeholder="House Number">
            <input type="text" name="c_address" value="<?php echo $customer_address; ?>" required="" placeholder="Street/Locality/Area">
            <input type="text" name="c_city" value="<?php echo $customer_city; ?>" required="" placeholder="City">
            <input type="text" name="c_state" value="<?php echo $customer_state; ?>" required="" placeholder="State">
            <input type="text" name="c_country" value="<?php echo $customer_country; ?>" required="" placeholder="Country">
            
            <input type="radio" name="adrress" value="male" checked="">Home
            <input type="radio" name="adrress" value="female"> Office
            <input type="radio" name="address" value="other"> Other
            <input type="submit" class="update-btn" name="update" value="Update">
        </form>

    </div>

<?php 

if(isset($_POST['update'])){
    
    $update_id = $customer_id;
    
    $c_name = $_POST['c_name'];

    $c_lname = $_POST['c_lname'];
    
    $c_gender = $_POST['gender'];
    
    $c_email = $_POST['c_email'];
    
    $c_contact = $_POST['c_contact'];
    
    $c_house = $_POST['c_house'];
    
    $c_address = $_POST['c_address'];
    
    $c_address_t = $_POST['adrress'];
    
    $c_city = $_POST['c_city'];
    
    $c_pin = $_POST['c_pin'];
    
    $c_state = $_POST['c_state'];
    
    $c_country = $_POST['c_country'];

    $c_image = $_FILES['c_image']['name'];
    
    $c_image_tmp = $_FILES['c_image']['tmp_name'];

    if($c_email!=$customer_email){

        $check_customer = "select * from customers where customer_email='$c_email'";
        $run_check = mysqli_query($con,$check_customer);
        if(mysqli_num_rows($run_check)){
            echo "<script>alert('$c_email this email is alredy used')</script>";
            $c_email=$customer_email;
        }
        else{
            $_SESSION['customer_email']=$c_email;
        }

    }

    if (!$c_image) {
        $c_image=$customer_image;
    }
    else{
        move_uploaded_file ($c_image_tmp,"customer_images/$c_image");
    }

    $update_customer = "update customers set customer_name='$c_name',customer_last_name='$c_lname',customer_gender='$c_gender',customer_email='$c_email',customer_country='$c_country',customer_city='$c_city',customer_pin_code='$c_pin',customer_house_num='$c_house',customer_state='$c_state',customer_contact='$c_contact',customer_address='$c_address',address='$c_address_t',customer_image='$c_image' where customer_id='$update_id' ";

    $run_customer = mysqli_query($con,$update_customer);
        
    if($run_customer){
        echo "<script>alert('Your account has been succesfully updated')</script>";
        echo "<script>window.open('my_account.php?edit_account','_self')</script>";
            
    }

    
}

?>