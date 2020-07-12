<?php

if (!isset($_SESSION['admin_email'])) {

    echo "<script>window.open('login.php','_self')</script>";
} else {

    if (isset($_GET['type']) && $_GET['type'] != '') {
        $type = get_safe_value($con, $_GET['type']);
        if ($type == 'status') {
            $operation = get_safe_value($con, $_GET['operation']);
            $id = get_safe_value($con, $_GET['id']);
            if ($operation == 'active') {
                $status = '1';
            } else {
                $status = '0';
            }
            $update_status_sql = "update coupon_master set status='$status' where id='$id'";
            mysqli_query($con, $update_status_sql);
        }

        if ($type == 'delete') {
            $id = get_safe_value($con, $_GET['id']);
            $delete_sql = "delete from coupon_master where id='$id'";
            mysqli_query($con, $delete_sql);
        }
    }

    $sql = "select * from coupon_master order by id desc";
    $res = mysqli_query($con, $sql);

?>

    <div class="row">
        <!-- row 1 begin -->
        <div class="col-lg-12">
            <!-- col-lg-12 begin -->
            <ol class="breadcrumb">
                <!-- breadcrumb begin -->
                <li class="active">
                    <!-- active begin -->

                    <i class="fa fa-dashboard"></i> Dashboard / View Coupons

                </li><!-- active finish -->
            </ol><!-- breadcrumb finish -->
            <h4 class="add-coupon"><a href="index.php?manage_coupon_master">Add Coupon</a> </h4>
        </div><!-- col-lg-12 finish -->
    </div><!-- row 1 finish -->

    <div class="row">
        <!-- row 2 begin -->
        <div class="col-lg-12">
            <!-- col-lg-12 begin -->
            <div class="panel panel-default">
                <!-- panel panel-default begin -->
                <div class="panel-heading">
                    <!-- panel-heading begin -->
                    <h3 class="panel-title">
                        <!-- panel-title begin -->

                        <i class="fa fa-tags"></i> View Coupons

                    </h3><!-- panel-title finish -->
                </div><!-- panel-heading finish -->

                <div class="panel-body">
                    <!-- panel-body begin -->
                    <div class="table-responsive">
                        <!-- table-responsive begin -->
                        <table class="table table-striped table-bordered table-hover">
                            <!-- table table-striped table-bordered table-hover begin -->

                            <thead>
                                <!-- thead begin -->
                                <tr>
                                    <!-- tr begin -->
                                    <th> S.No. </th>
                                    <th> ID </th>
                                    <th> Coupon Code </th>
                                    <th> Coupon Value </th>
                                    <th> Coupon Type </th>
                                    <th> Min Value </th>
                                    <th></th>
                                </tr><!-- tr finish -->
                            </thead><!-- thead finish -->

                            <tbody>
                                <!-- tbody begin -->
                                <?php
                                $i = 0;
                                while ($row = mysqli_fetch_assoc($res)) {
                                    $i += 1; ?>

                                    <tr>

                                        <td class="serial"><?php echo $i ?></td>
                                        <td><?php echo $row['id'] ?></td>
                                        <td><?php echo $row['coupon_code'] ?></td>
                                        <td><?php echo $row['coupon_value'] ?></td>
                                        <td><?php echo $row['coupon_type'] ?></td>
                                        <td><?php echo $row['cart_min_value'] ?></td>
                                        <td>

                                            <!-- <a href=index.php?edit_coupon=>
                                
                                    <i class="fa fa-pencil"></i> Edit
                                
                                </a> -->
                                            <?php
                                            if ($row['status'] == 1) {
                                                echo "<span class='badge badge-complete'><a href='index.php?view_coupons&type=status&operation=deactive&id=" . $row['id'] . "'>Active</a></span>&nbsp;";
                                            } else {
                                                echo "<span class='badge badge-pending'><a href='index.php?view_coupons&type=status&operation=active&id=" . $row['id'] . "'>Deactive</a></span>&nbsp;";
                                            }
                                            echo "<span class='badge badge-edit'><a href='index.php?manage_coupon_master&id=" . $row['id'] . "'>Edit</a></span>&nbsp;";

                                            echo "<span class='badge badge-delete'><a href='index.php?view_coupons&type=delete&id=" . $row['id'] . "'>Delete</a></span>";

                                            ?>

                                        </td>
                                    </tr>

                                <?php } ?>

                            </tbody><!-- tbody finish -->

                        </table><!-- table table-striped table-bordered table-hover finish -->
                    </div><!-- table-responsive finish -->
                </div><!-- panel-body finish -->

            </div><!-- panel panel-default finish -->
        </div><!-- col-lg-12 finish -->
    </div><!-- row 2 finish -->

<?php } ?>