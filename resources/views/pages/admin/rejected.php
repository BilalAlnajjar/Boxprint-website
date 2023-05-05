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
				<?php $title_view = 'All Orders'; ?>
				<?php require_once 'inc/top-full.php'; ?>
				<!-- /Top Header Full -->
				<!-- ============== START CONTENT ==============  -->
				<div class="row">
							<div class="card">
								<div class="card-header border-bottom-0 p-4">
									<h2 class="card-title">1 - 30 of 546 </h2>
									<div class="page-options d-flex float-right">

									</div>
								</div>
							<div class="col-md-12 col-lg-12">
								<div class="card">
									<div class="card-header">
										<h3 class="card-title">All Orders</h3>
									</div>
									<div class="card-body">
										<div class="row">
											<div class="col-md-4">

										</div>
										<div class="table-responsive">
											<div class="filter-custom">
												<div class="row">

													<div class="col-lg-6">
														<div class="form-group">

														</div>
													</div>
													<div class="col-lg-6">
														<div class="form-group">

														</div>
													</div>

												</div>
											</div>
											<table id="example" class="table table-striped table-bordered text-nowrap w-100">
												<thead>
													<tr>

														<th class="wd-15p">ID</th>
														<th class="wd-15p">Name</th>
														<th class="wd-15p">Payment Type</th>
														<th class="wd-15p">Order Type</th>
														<th class="wd-15p">City</th>
														<th class="wd-15p">Phone</th>
														<th class="wd-10p">Price</th>
														<th class="wd-10p">Date</th>
														<th class="wd-25p">Action</th>
														<th class="wd-10p">View Order</th>
													</tr>
												</thead>
												<tbody>
													<tr>
														<td>1</td>

														<td>ahmed </td>
                                                        <td>cash</td>
                                                        <td>delivery</td>
                                                        <td>Istanbul</td>
                                                        <td>0563576</td>
                                                        <td>$20</td>
														<td>2018/03/12</td>
														<td><a class="btn btn-sm btn-primary" href="view_order.blade.php"><i class="fa fa-edit"></i> Edit</a>
															<a class="btn btn-sm btn-danger" href="#"><i class="fa fa-trash"></i> Delete</a>
														</td>
														<td><a class="btn btn-sm btn-secondary" href="view_order.blade.php"><i class="fa fa-info-circle"></i> View</a> </td>
                                                    </tr>
                                                    <tr>
														<td>2</td>

														<td>ahmed</td>
														<td>cash</td>
														<td>delivery</td>
                                                        <td>Istanbul</td>
                                                        <td>0563576</td>
                                                        <td>$20</td>
														<td>2018/03/12</td>
														<td><a class="btn btn-sm btn-primary" href="view_order.blade.php"><i class="fa fa-edit"></i> Edit</a>
															<a class="btn btn-sm btn-danger" href="#"><i class="fa fa-trash"></i> Delete</a>
														</td>
														<td><a class="btn btn-sm btn-secondary" href="view_order.blade.php"><i class="fa fa-info-circle"></i> View</a> </td>
                                                    </tr>
                                                    <tr>
														<td>3</td>

														<td>ahmed</td>
														<td>paypal</td>
														<td>delivery</td>
                                                        <td>Istanbul</td>
                                                        <td>0563576</td>
                                                        <td>$20</td>
														<td>2018/03/12</td>
														<td><a class="btn btn-sm btn-primary" href="view_order.blade.php"><i class="fa fa-edit"></i> Edit</a>
															<a class="btn btn-sm btn-danger" href="#"><i class="fa fa-trash"></i> Delete</a>
														</td>
														<td><a class="btn btn-sm btn-secondary" href="view_order.blade.php"><i class="fa fa-info-circle"></i> View</a> </td>
                                                    </tr>
                                                    <tr>
														<td>4</td>

														<td>ahmed</td>
														<td>paypal</td>
														<td>delivery</td>
                                                        <td>Istanbul</td>
                                                        <td>0563576</td>
                                                        <td>$20</td>
														<td>2018/03/12</td>
														<td><a class="btn btn-sm btn-primary" href="view_order.blade.php"><i class="fa fa-edit"></i> Edit</a>
															<a class="btn btn-sm btn-danger" href="#"><i class="fa fa-trash"></i> Delete</a>
														</td>
														<td><a class="btn btn-sm btn-secondary" href="view_order.blade.php"><i class="fa fa-info-circle"></i> View</a> </td>
                                                    </tr>

												</tbody>
											</table>
										</div>
									</div>
									<!-- TABLE WRAPPER -->
								</div>
								<!-- SECTION WRAPPER -->
							</div>
						</div>
				<!-- ============== END CONTENT ==============  -->



	<!-- Copyright -->
	<?php require_once 'inc/copyright.php'; ?>
	<!-- /Copyright -->
</div>
<!-- Footer -->
<?php require_once 'inc/footer.php'; ?>
<!-- /Footer -->
