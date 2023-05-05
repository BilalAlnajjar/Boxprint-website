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
				<?php $title_view = ''; ?>
				<?php require_once 'inc/top-full.php'; ?>
				<!-- /Top Header Full -->

				<!-- ============== START CONTENT ==============  -->
				<!-- ROW-1 OPEN -->
					<div class="row" style="padding-top: 20px;">
						<div class="col-sm-12 col-md-6 col-lg-3 col-xl-3">
							<div class="card bg-success img-card box-success-shadow x-box-cards">
								<div class="card-body card-taps">
									<a href="page_global.php"></a>
									<div class="d-flex">
										<div class="text-white">
											<h2 class="mb-0 number-font custom-number">Total Restaurant</h2>
										</div>
										<div class="ml-auto custom-icon"> <i class="fe fe-globe text-white fs-30 mr-2 mt-2"></i> </div>
									</div>
								</div>
							</div>
						</div><!-- COL END -->

						<div class="col-sm-12 col-md-6 col-lg-3 col-xl-3">
							<div class="card bg-secondary img-card box-secondary-shadow x-box-cards">
								<div class="card-body card-taps" >
									<a href="page_users.php"></a>
									<div class="d-flex">
										<div class="text-white">
											<h2 class="mb-0 number-font custom-number">Total Profits</h2>
										</div>
										<div class="ml-auto custom-icon"> <i class="fa fa-dollar text-white fs-30 mr-2 mt-2"></i> </div>
									</div>
								</div>
							</div>
						</div><!-- COL END -->

						<div class="col-sm-12 col-md-6 col-lg-3 col-xl-3">
							<div class="card bg-info img-card box-info-shadow x-box-cards">
								<div class="card-body card-taps" >
									<a href="page_hr.php"></a>
									<div class="d-flex">
										<div class="text-white">
											<h2 class="mb-0 number-font custom-number">Total Orders</h2>
										</div>
										<div class="ml-auto custom-icon"> <i class="fa fa-bar-chart text-white fs-30 mr-2 mt-2"></i> </div>
									</div>
								</div>
							</div>
						</div><!-- COL END -->

						<div class="col-sm-12 col-md-6 col-lg-3 col-xl-3">
							<div class="card bg-primary img-card box-primary-shadow x-box-cards">
								<div class="card-body card-taps">
									<a href="page_sales.php"></a>
									<div class="d-flex">
										<div class="text-white">
											<h2 class="mb-0 number-font custom-number">Sales</h2>
										</div>
										<div class="ml-auto custom-icon"> <i class="fe fe-shopping-cart text-white fs-30 mr-2 mt-2"></i> </div>
									</div>
								</div>
							</div>
						</div><!-- COL END -->
					</div>
			<!-- ============== END CONTENT ==============  -->
					<!-- ROW-1 CLOSED -->
				</div>
			<!-- ============== END CONTENT ==============  -->

	

	<!-- Copyright -->
	<?php require_once 'inc/copyright.php'; ?>
	<!-- /Copyright -->
</div>
<!-- Footer -->
<?php require_once 'inc/footer.php'; ?>