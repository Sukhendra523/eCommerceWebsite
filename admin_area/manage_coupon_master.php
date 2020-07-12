<?php

if (!isset($_SESSION['admin_email'])) {

    echo "<script>window.open('login.php','_self')</script>";
} else {

?>

<?php


    $coupon_code = '';
    $coupon_type = '';
    $coupon_value = '';
    $cart_min_value = '';

    $msg = '';
    if (isset($_GET['id']) && $_GET['id'] != '') {
        $image_required = '';
        $id = get_safe_value($con, $_GET['id']);
        $res = mysqli_query($con, "select * from coupon_master where id='$id'");
        $check = mysqli_num_rows($res);
        if ($check > 0) {
            $row = mysqli_fetch_assoc($res);
            $coupon_code = $row['coupon_code'];
            $coupon_type = $row['coupon_type'];
            $coupon_value = $row['coupon_value'];
            $cart_min_value = $row['cart_min_value'];
        } else {
            echo "<script>window.open('index.php?view_coupons','_self')</script>";
            die();
        }
    }

    if (isset($_POST['submit'])) {
        $coupon_code = get_safe_value($con, $_POST['coupon_code']);
        $coupon_type = get_safe_value($con, $_POST['coupon_type']);
        $coupon_value = get_safe_value($con, $_POST['coupon_value']);
        $cart_min_value = get_safe_value($con, $_POST['cart_min_value']);

        $res = mysqli_query($con, "select * from coupon_master where name='$coupon_code'");
        $check = mysqli_num_rows($res);
        if ($check > 0) {
            if (isset($_GET['id']) && $_GET['id'] != '') {
                $getData = mysqli_fetch_assoc($res);
                if ($id == $getData['id']) {
                } else {
                    $msg = "Coupon code already exist";
                }
            } else {
                $msg = "Coupon code already exist";
            }
        }


        if ($msg == '') {
            if (isset($_GET['id']) && $_GET['id'] != '') {
                $update_sql = "update coupon_master set coupon_code='$coupon_code',coupon_value='$coupon_value',coupon_type='$coupon_type',cart_min_value='$cart_min_value' where id='$id'";
                mysqli_query($con, $update_sql);
            } else {
                mysqli_query($con, "insert into coupon_master(coupon_code,coupon_value,coupon_type,cart_min_value,status) values('$coupon_code','$coupon_value','$coupon_type','$cart_min_value',1)");
            }
            echo "<script>window.open('index.php?view_coupons','_self')</script>";
            die();
        }
    }

?>
<?php $coupon_manage = $coupon_code ? "Edit Coupon" : "Add Coupon"; ?>

    <div class="row">
        <!-- row Begin -->

        <div class="col-lg-12">
            <!-- col-lg-12 Begin -->

            <ol class="breadcrumb">
                <!-- breadcrumb Begin -->

                <li class="active">
                    <!-- active Begin -->

                    <i class="fa fa-dashboard"></i> Dashboard / <?php echo $coupon_manage ?>

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

                        <i class="fa fa-money fa-fw"></i> <?php echo $coupon_manage ?>

                    </h3><!-- panel-title Finish -->

                </div> <!-- panel-heading Finish -->

                <div class="panel-body">
                    <!-- panel-body Begin -->

                    <form method="post" class="form-horizontal">
                        <!-- form-horizontal Begin -->

                        <div class="form-group">
                            <!-- form-group Begin -->

                            <label class="col-md-3 control-label"> Coupon Code </label>

                            <div class="col-md-6">
                                <!-- col-md-6 Begin -->

                                <input value="<?php echo $coupon_code ?>" name="coupon_code" type="text" class="form-control" required>

                            </div><!-- col-md-6 Finish -->

                        </div><!-- form-group Finish -->

                        <div class="form-group">
                            <!-- form-group Begin -->

                            <label class="col-md-3 control-label"> Coupon Value </label>

                            <div class="col-md-6">
                                <!-- col-md-6 Begin -->

                                <input value="<?php echo $coupon_value ?>" name="coupon_value" type="text" class="form-control" required>

                            </div><!-- col-md-6 Finish -->

                        </div><!-- form-group Finish -->

                        <div class="form-group">
                            <label for="categories" class=" col-md-3 control-label">Coupon Type</label>
                            <div class="col-md-6">
                                <select class="form-control" name="coupon_type" required>
                                    <option value=''>Select</option>
                                    <?php
                                    if ($coupon_type == 'Percentage') {
                                        echo '<option value="Percentage" selected>Percentage</option>
												<option value="Rupee">Rupee</option>';
                                    } elseif ($coupon_type == 'Rupee') {
                                        echo '<option value="Percentage">Percentage</option>
												<option value="Rupee" selected>Rupee</option>';
                                    } else {
                                        echo '<option value="Percentage">Percentage</option>
												<option value="Rupee">Rupee</option>';
                                    }
                                    ?>
                                </select>
                            </div>

                        </div>

                        <div class="form-group">
                            <!-- form-group Begin -->

                            <label class="col-md-3 control-label"> Cart min value </label>

                            <div class="col-md-6">
                                <!-- col-md-6 Begin -->

                                <input name="cart_min_value" type="number" class="form-control" value="<?php echo $cart_min_value ?>">

                            </div><!-- col-md-6 Finish -->

                        </div><!-- form-group Finish -->



                        <div class="form-group">
                            <!-- form-group Begin -->

                            <label class="col-md-3 control-label"></label>

                            <div class="col-md-6">
                                <!-- col-md-6 Begin -->

                                <input name="submit" value="Update" type="submit" class="btn btn-primary form-control">

                            </div><!-- col-md-6 Finish -->

                        </div><!-- form-group Finish -->
                        <div class="field_error"><?php echo $msg ?></div>

                    </form><!-- form-horizontal Finish -->

                </div><!-- panel-body Finish -->

            </div><!-- canel panel-default Finish -->

        </div><!-- col-lg-12 Finish -->

    </div><!-- row Finish -->

<?php } ?>