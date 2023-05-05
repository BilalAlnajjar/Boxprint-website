<?php require_once 'inc/header.php'; ?>

<!-- PAGE -->
<div class="page">
	<div class="page-main">

		<!-- Sidebar -->
		<?php require_once 'inc/sidebar.php'; ?>
		<!-- /Sidebar -->

		<!-- Top Header Mobile -->
		<?php require_once 'inc/top-mobile.php'; ?>
		<!-- /Top Header Mobile  -->

		<div class="app-content">
			<div class="side-app">
				<!-- Top Header Full -->
				<?php $title_view = 'Add UserController'; ?>
				<?php require_once 'inc/top-full.php'; ?>
				<!-- /Top Header Full -->

				<!-- ============== START CONTENT ==============  -->
				<div class="row">
					<div class="col-md-12">
						<div class="card">

							<div class="card-header">
								<h3 class="card-title">Add User</h3>
							</div>
							<div class="card-body">
                                <div class="form-group">
									<label class="form-label">Full Name</label>
									<input type="text" class="form-control" name="example-text-input" placeholder="Enter Full Name">
								</div>

                                <div class="form-group">
									<label class="form-label">Mobile Number</label>
									<input type="text" class="form-control" name="example-text-input" placeholder="Enter Mobile Number">
								</div>

								<div class="form-group">
									<label class="form-label">Email</label>
									<input type="email" class="form-control" name="example-text-input" placeholder="Enter Email">
								</div>


								<div class="form-group">
									<label class="form-label">Password</label>
									<input type="password" class="form-control" name="example-text-input" placeholder="Enter Password">
								</div>

                                <div class="form-group">
									<label class="form-label">Cinfirm Password</label>
									<input type="password" class="form-control" name="example-text-input" placeholder="Re-type Enter Password">
								</div>

							</div>
						</div>
					</div><!-- COL END -->


					<div class="card-footer">
						<a href="#" class="btn btn-primary mt-1"><i class="fe fe-plus mr-2"></i> Add User</a>
					</div>
				</div><!--ROW END-->
				<!-- ============== END CONTENT ==============  -->



	<!-- Copyright -->
	<?php require_once 'inc/copyright.php'; ?>
	<!-- /Copyright -->
</div>
<!-- Footer -->
<?php require_once 'inc/footer.php'; ?>
<!-- /Footer -->
