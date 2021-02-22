<?php
require_once __DIR__ . "/../../helper/init.php";
$page_title = "Quick ERP | Manage Customers";
$sideBarSection = "customer";
$sideBarSubSection = 'manage';
Util::createCSRFToken();
?>
<!DOCTYPE html>
<html lang="en">

<head>

    <?php require_once __DIR__ . "/../includes/head-section.php"; ?>
    <link rel="stylesheet" href="<?= BASEASSETS; ?>css/plugins/toastr/toastr.min.css">
    <link rel="stylesheet" href="<?= BASEASSETS; ?>vendor/datatables/datatables.min.css">


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

                <!-- Topbar -->
                <?php require_once __DIR__ . "/../includes/navbar.php"; ?>
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <h1 class="h3 mb-4 text-gray-800">Manage Customer</h1>
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Customers</h6>
                        </div>
                        <div class="card-body">
                            <table class="table table-bordered table-responsive overflow-hidden" id="manage-customers-table">
                                <div id="export-buttons"></div>
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>First Name</th>
                                        <th>Last Name</th>
                                        <th>GST No</th>
                                        <th>Phone No</th>
                                        <th>Email ID</th>
                                        <th>Gender</th>
                                        <th>Block</th>
                                        <th>Street</th>
                                        <th>Town</th>
                                        <th>City</th>
                                        <th>State</th>
                                        <th>Pincode</th>
                                        <th>Country</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                            </table>
                        </div>
                    </div>

                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

            <!-- Delete Modal-->
            <div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="deleteModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="deleteModalLabel">Delete Customer</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <form action="<?= BASEURL; ?>helper/routing.php" method="POST">
                            <div class="modal-body">
                                <input type="hidden" name="csrf_token" id="csrf_token" value="<?= Session::getSession('csrf_token'); ?>">
                                <input type="hidden" name="record_id" id="delete_record_id">
                                <p class="text-muted">Are you sure you want to delete this record?</p>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-danger" name="deleteCustomer">Delete Record!</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <!--END OF Delete MODAL-->

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

    <?php require_once __DIR__ . "/../includes/page-level/customers/manage-customers-scripts.php"; ?>

</body>

</html>