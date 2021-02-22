<?php
require_once __DIR__ . "/../../helper/init.php";
$page_title = "Quick ERP | Add New Supplier";
$sideBarSection = 'supplier';
$sideBarSubSection = 'add';
Util::createCSRFToken();
$errors = "";
$old = "";
if (Session::hasSession('old')) {
    $old = Session::getSession('old');
    Session::unsetSession('old');
}

if (Session::hasSession('errors')) {
    $errors = unserialize(Session::getSession('errors'));
    Session::unsetSession('errors');
}
?>
<!DOCTYPE html>
<html lang="en">

<head>

    <?php require_once __DIR__ . "/../includes/head-section.php"; ?>

</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <?php require_once __DIR__ . "/../includes/sidebar.php"; ?>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Top Navigation Bar -->
                <?php require_once __DIR__ . "/../includes/navbar.php"; ?>
                <!-- End of Top Navigation Bar -->

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <div class="d-sm-flex align-items-center justify-content-between">
                        <h1 class="h3 mb-4 text-gray-800">Add Supplier</h1>
                        <a href="" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm">
                            <i class="fas fa-list-ul fa-sm text-white"></i> Manage Suppliers
                        </a>
                    </div>

                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="card shadow mb-4">
                                    <!-- CARD HEADER-->
                                    <div class="card-header">
                                        <h6 class="m-0 font-weight-bold text-primary">
                                            <i class="fa fa-plus"></i> Add Supplier
                                        </h6>
                                    </div>
                                    <!-- CARD HEADER-->

                                    <!-- CARD BODY-->
                                    <div class="card-body">
                                        <form action="<?= BASEURL; ?>helper/routing.php" method="POST">
                                            <input type="hidden" name="csrf_token" value="<?= Session::getSession('csrf_token'); ?>">
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label>First Name</label>
                                                        <input type="text" name="first_name" class="form-control <?= $errors != '' ? ($errors->has('first_name') ? 'error is-invalid' : '') : ''; ?>" id="first_name" placeholder="Enter First Name" value="<?= $old != '' ? $old['first_name'] : ''; ?>">
                                                        <?php
                                                        if ($errors != "" && $errors->has('first_name')) :
                                                            echo "<span class='error'>{$errors->first('first_name')}</span>";
                                                        endif;
                                                        ?>
                                                    </div>
                                                    <div class="form-group">
                                                        <label>Last Name</label>
                                                        <input type="text" name="last_name" class="form-control <?= $errors != '' ? ($errors->has('last_name') ? 'error is-invalid' : '') : ''; ?>" id="last_name" placeholder="Enter Last Name" value="<?= $old != '' ? $old['last_name'] : ''; ?>">
                                                        <?php
                                                        if ($errors != "" && $errors->has('last_name')) :
                                                            echo "<span class='error'>{$errors->first('last_name')}</span>";
                                                        endif;
                                                        ?>
                                                    </div>
                                                    <div class="form-group">
                                                        <label>GST No.</label>
                                                        <input type="text" name="gst_no" class="form-control <?= $errors != '' ? ($errors->has('gst_no') ? 'error is-invalid' : '') : ''; ?>" id="gst_no" placeholder="Enter GST No." value="<?= $old != '' ? $old['gst_no'] : ''; ?>">
                                                        <?php
                                                        if ($errors != "" && $errors->has('gst_no')) :
                                                            echo "<span class='error'>{$errors->first('gst_no')}</span>";
                                                        endif;
                                                        ?>
                                                    </div>
                                                    <div class="form-group">
                                                        <label>Email Id</label>
                                                        <input type="email" name="email_id" class="form-control <?= $errors != '' ? ($errors->has('email_id') ? 'error is-invalid' : '') : ''; ?>" id="email_id" placeholder="Enter Email ID" value="<?= $old != '' ? $old['email_id'] : ''; ?>">
                                                        <?php
                                                        if ($errors != "" && $errors->has('email_id')) :
                                                            echo "<span class='error'>{$errors->first('email_id')}</span>";
                                                        endif;
                                                        ?>
                                                    </div>
                                                    <div class="form-group">
                                                        <label>Phone No.</label>
                                                        <input type="text" name="phone_no" class="form-control <?= $errors != '' ? ($errors->has('phone_no') ? 'error is-invalid' : '') : ''; ?>" id="phone_no" placeholder="Enter Phone No." value="<?= $old != '' ? $old['phone_no'] : ''; ?>">
                                                        <?php
                                                        if ($errors != "" && $errors->has('phone_no')) :
                                                            echo "<span class='error'>{$errors->first('phone_no')}</span>";
                                                        endif;
                                                        ?>
                                                    </div>
                                                    <div class="form-group">
                                                        <label>Company Name</label>
                                                        <input type="text" name="company_name" class="form-control <?= $errors != '' ? ($errors->has('company_name') ? 'error is-invalid' : '') : ''; ?>" id="company_name" placeholder="Enter Company Name" value="<?= $old != '' ? $old['company_name'] : ''; ?>">
                                                        <?php
                                                        if ($errors != "" && $errors->has('company_name')) :
                                                            echo "<span class='error'>{$errors->first('company_name')}</span>";
                                                        endif;
                                                        ?>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label>Block No</label>
                                                        <input type="text" name="block_no" class="form-control <?= $errors != '' ? ($errors->has('block_no') ? 'error is-invalid' : '') : ''; ?>" id="block_no" placeholder="Enter Block No." value="<?= $old != '' ? $old['block_no'] : ''; ?>">
                                                        <?php
                                                        if ($errors != "" && $errors->has('block_no')) :
                                                            echo "<span class='error'>{$errors->first('block_no')}</span>";
                                                        endif;
                                                        ?>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label>Street</label>
                                                        <input type="text" name="street" class="form-control <?= $errors != '' ? ($errors->has('street') ? 'error is-invalid' : '') : ''; ?>" id="street" placeholder="Enter Street" value="<?= $old != '' ? $old['street'] : ''; ?>">
                                                        <?php
                                                        if ($errors != "" && $errors->has('street')) :
                                                            echo "<span class='error'>{$errors->first('street')}</span>";
                                                        endif;
                                                        ?>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label>Town</label>
                                                        <input type="text" name="town" class="form-control <?= $errors != '' ? ($errors->has('town') ? 'error is-invalid' : '') : ''; ?>" id="town" placeholder="Enter Town" value="<?= $old != '' ? $old['town'] : ''; ?>">
                                                        <?php
                                                        if ($errors != "" && $errors->has('town')) :
                                                            echo "<span class='error'>{$errors->first('town')}</span>";
                                                        endif;
                                                        ?>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label>City</label>
                                                        <input type="text" name="city" class="form-control <?= $errors != '' ? ($errors->has('city') ? 'error is-invalid' : '') : ''; ?>" id="city" placeholder="Enter City" value="<?= $old != '' ? $old['city'] : ''; ?>">
                                                        <?php
                                                        if ($errors != "" && $errors->has('city')) :
                                                            echo "<span class='error'>{$errors->first('city')}</span>";
                                                        endif;
                                                        ?>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label>State</label>
                                                        <input type="text" name="state" class="form-control <?= $errors != '' ? ($errors->has('state') ? 'error is-invalid' : '') : ''; ?>" id="state" placeholder="Enter State" value="<?= $old != '' ? $old['state'] : ''; ?>">
                                                        <?php
                                                        if ($errors != "" && $errors->has('state')) :
                                                            echo "<span class='error'>{$errors->first('state')}</span>";
                                                        endif;
                                                        ?>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label>Pincode</label>
                                                        <input type="number" name="pincode" class="form-control <?= $errors != '' ? ($errors->has('pincode') ? 'error is-invalid' : '') : ''; ?>" id="pincode" placeholder="Enter Pincode" value="<?= $old != '' ? $old['pincode'] : ''; ?>">
                                                        <?php
                                                        if ($errors != "" && $errors->has('pincode')) :
                                                            echo "<span class='error'>{$errors->first('pincode')}</span>";
                                                        endif;
                                                        ?>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label>Country</label>
                                                        <input type="text" name="country" class="form-control <?= $errors != '' ? ($errors->has('country') ? 'error is-invalid' : '') : ''; ?>" id="country" placeholder="Enter Country" value="<?= $old != '' ? $old['country'] : ''; ?>">
                                                        <?php
                                                        if ($errors != "" && $errors->has('country')) :
                                                            echo "<span class='error'>{$errors->first('country')}</span>";
                                                        endif;
                                                        ?>
                                                    </div>
                                                </div>
                                                <div class="col-md-6 d-flex">
                                                    <div class="align-self-end ml-auto">
                                                        <input type="submit" value="Submit" name="add_supplier" class="btn btn-success">
                                                    </div>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                    <!-- END OF CARD BODY-->
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

            <!-- Footer -->
            <?php require_once __DIR__ . "/../includes/footer.php"; ?>
            <!-- End of Footer -->

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <?php require_once __DIR__ . "/../includes/scroll-to-top.php"; ?>
    <?php require_once __DIR__ . "/../includes/core-scripts.php"; ?>

    <?php require_once __DIR__ . "/../includes/page-level/index-scripts.php"; ?>
    <script src="<?= BASEASSETS; ?>js/plugins/jquery-validation/jquery.validate.min.js"></script>
    <script src="<?= BASEASSETS; ?>js/pages/supplier/add-supplier.js"></script>
</body>

</html>