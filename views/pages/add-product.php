<?php
require_once __DIR__ . "/../../helper/init.php";
$page_title = "Quick ERP | Add New Product";
$sideBarSection = 'product';
$sideBarSubSection = 'add';
Util::createCSRFToken();
$errors = "";
$old = "";
if (Session::hasSession('old'))
{
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
						<h1 class="h3 mb-4 text-gray-800">Add Product</h1>
						<a href="" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm">
							<i class="fas fa-list-ul fa-sm text-white"></i> Manage Product
						</a>
					</div>

					<div class="container-fluid">
						<div class="row">
							<div class="col-md-12">
								<div class="card shadow mb-4">
									<!-- CARD HEADER-->
									<div class="card-header">
										<h6 class="m-0 font-weight-bold text-primary">
											<i class="fa fa-plus"></i> Add Product
										</h6>
									</div>
									<!-- CARD HEADER-->

									<!-- CARD BODY-->
									<div class="card-body">
										<form action="<?= BASEURL; ?>helper/routing.php" method="POST" id="add-product">
											<input type="hidden" name="csrf_token" value="<?= Session::getSession('csrf_token'); ?>">
											<div class="row">
												<div class="col-md-6">
													<div class="form-group">
														<label>Product Name</label>
														<input type="text" name="name" id="name" placeholder="Enter Product Name"
                                                        class="form-control <?= $errors != '' ? ($errors->has('name') ? 'error is-invalid' : '') : ''; ?>"   value="<?= $old != '' ? $old['name'] : ''; ?>">
														<?php
														if ($errors != "" && $errors->has('name')) :
															echo "<span class='error'>{$errors->first('name')}</span>";
														endif;
														?>
													</div>
												</div>
												<div class="col-md-6">
													<div class="form-group">
														<label>Product Specification</label>
														<input type="text" name="specification" id="specification" placeholder="Enter Product Specification"
                                                        class="form-control <?= $errors != '' ? ($errors->has('specification') ? 'error is-invalid' : '') : ''; ?>"   value="<?= $old != '' ? $old['specification'] : ''; ?>">
														<?php
														if ($errors != "" && $errors->has('specification')) :
															echo "<span class='error'>{$errors->first('specification')}</span>";
														endif;
														?>
													</div>
												</div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label>HSN Code</label>
                                                        <select name="hsn_code" id="hsn_code" 
                                                        class="form-control <?= $errors != '' ? ($errors->has('hsn_code') ? 'error is-invalid' : '') : ''; ?>">
                                                            <?php 
                                                                $hsn_codes = $di->get('database')->readData('gst', ['id', 'hsn_code'], 'deleted=0');
                                                                foreach($hsn_codes as $row){
                                                                    echo "<option value={$row->hsn_code}>{$row->hsn_code}</option>";
                                                                }
                                                            ?>
                                                        </select>
                                                        <?php
                                                        if ($errors != "" && $errors->has('hsn_code')) :
                                                            echo "<span class='error'>{$errors->first('hsn_code')}</span>";
                                                        endif;
                                                        ?>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label>Suppliers</label>
                                                        <select name="supplier_id[]" id="supplier_id" 
                                                        class="form-control <?= $errors != '' ? ($errors->has('supplier_id') ? 'error is-invalid' : '') : ''; ?>" multiple>
                                                            <?php 
                                                                $suppliers = $di->get('database')->readData('suppliers', ['id', 'first_name', 'last_name'], 'deleted=0');
                                                                foreach($suppliers as $supplier){
                                                                    echo "<option value={$supplier->id}>{$supplier->first_name} {$supplier->last_name}</option>";
                                                                }
                                                            ?>
                                                        </select>
                                                        <?php
                                                        if ($errors != "" && $errors->has('supplier_id')) :
                                                            echo "<span class='error'>{$errors->first('supplier_id')}</span>";
                                                        endif;
                                                        ?>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label>Category</label>
                                                        <select name="category_id" id="category_id" 
                                                        class="form-control <?= $errors != '' ? ($errors->has('category_id') ? 'error is-invalid' : '') : ''; ?>">
                                                            <?php 
                                                                $categories = $di->get('database')->readData('category', ['id', 'name',], 'deleted=0');
                                                                foreach($categories as $category){
                                                                    echo "<option value={$category->id}>{$category->name}</option>";
                                                                }
                                                            ?>
                                                        </select>
                                                        <?php
                                                        if ($errors != "" && $errors->has('category_id')) :
                                                            echo "<span class='error'>{$errors->first('category_id')}</span>";
                                                        endif;
                                                        ?>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
													<div class="form-group">
														<label>Selling Price</label>
														<input type="text" name="selling_rate" id="selling_rate" placeholder="Enter Selling Price"
                                                        class="form-control <?= $errors != '' ? ($errors->has('selling_rate') ? 'error is-invalid' : '') : ''; ?>"   value="<?= $old != '' ? $old['selling_rate'] : ''; ?>">
														<?php
														if ($errors != "" && $errors->has('selling_rate')) :
															echo "<span class='error'>{$errors->first('selling_rate')}</span>";
														endif;
														?>
													</div>
												</div>
                                                <div class="col-md-6">
													<div class="form-group">
														<label>EOQ Level</label>
														<input type="text" name="eoq_level" id="eoq_level" placeholder="Enter EOQ Level"
                                                        class="form-control <?= $errors != '' ? ($errors->has('eoq_level') ? 'error is-invalid' : '') : ''; ?>"   value="<?= $old != '' ? $old['eoq_level'] : ''; ?>">
														<?php
														if ($errors != "" && $errors->has('eoq_level')) :
															echo "<span class='error'>{$errors->first('eoq_level')}</span>";
														endif;
														?>
													</div>
												</div>
                                                <div class="col-md-6">
													<div class="form-group">
														<label>Danger Level</label>
														<input type="text" name="danger_level" id="danger_level" placeholder="Enter Danger Level"
                                                        class="form-control <?= $errors != '' ? ($errors->has('danger_level') ? 'error is-invalid' : '') : ''; ?>"   value="<?= $old != '' ? $old['danger_level'] : ''; ?>">
														<?php
														if ($errors != "" && $errors->has('danger_level')) :
															echo "<span class='error'>{$errors->first('danger_level')}</span>";
														endif;
														?>
													</div>
												</div>
                                            </div>
											<input type="submit" value="Submit" name="add_product" class="btn btn-primary">
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
	<script src="<?= BASEASSETS; ?>js/pages/product/add-product.js"></script>
</body>

</html>