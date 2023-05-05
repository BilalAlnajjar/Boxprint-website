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
				<?php $title_view = 'View Details'; ?>
				<?php require_once 'inc/top-full.php'; ?>
				<!-- /Top Header Full -->
				<!-- ============== START CONTENT ==============  -->
				<div class="row">
							<div class="col-md-12">
								<div class="card">
									<div class="card-body">
										<div class="clearfix">
											<div class="float-left">
												<h3 class="card-title mb-0">View Details</h3>
											</div>
											<div class="float-right">
												<h3 class="card-title">Date: 12-09-2019</h3>
											</div>
										</div>
										<hr>
										<div class="row">
                                        <div class="col-lg-6">
												<p class="h3">Details Clients</p>
												<address>
                                                    <strong>Name</strong> : Mohamed Samer<br>
                                                    <hr>
                                                    <strong>Phone</strong> : 0084783<br>
                                                    <hr>
                                                    <strong>City</strong> : State, City<br>
                                                    <hr>
                                                    <strong>Email</strong>: yourdomain@example.com<br>
                                                    <hr>
                                                    <strong>Restaurant Address</strong>: Turkey - Istanbul / esenyurt NO:29<br>
                                                </address>
                                            </div>
                                            <div class="col-lg-6">
												<p class="h3">Details :</p>
												<address>
                                                    <strong>Name Store</strong> : Big Mac<br>
                                                    <hr>
                                                    <strong>Nationality</strong> : 1<br>
                                                    <hr>
                                                    <strong>Driving License</strong> : 1<br>
                                                    <hr>
                                                    <strong>Web site</strong>: <a href="#">https://www.google.com/</a><br>
                                                    <hr>
                                                    <strong>Instgram</strong>: <a href="#">https://www.instgram.com/username/ </a><br>
                                                    
                                                </address>
                                            </div>
                                            
										</div>
									</div>
									<div class="card-footer text-right">
										<button type="button" class="btn btn-info mb-1" onclick="javascript:window.print();"><i class="si si-printer"></i> Print</button>
									</div>
								</div>
							</div><!-- COL-END -->
						</div>
						<!-- ROW-1 CLOSED -->
				<!-- ============== END CONTENT ==============  -->

	

	<!-- Copyright -->
	<?php require_once 'inc/copyright.php'; ?>
	<!-- /Copyright -->
</div>
<!-- Footer -->
<?php require_once 'inc/footer.php'; ?>
<!-- /Footer -->