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
							<div class="col-md-12">
								<div class="card">
									<div class="card-body">
										
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
                                                    <strong>Email</strong>: yourdomain@example.com
                                                </address>
                                            </div>
                                            <div class="col-lg-6">
												<p class="h3">Gallery</p>
												<address>
                                                    <div class="box-imgs">
                                                            <ul id="lightgallery" class="list-unstyled row">
                                                                <li class="col-md-4 border-bottom-0" style="margin-top:3px" data-responsive="assets/images/media/12.jpg" data-src="assets/images/media/12.jpg" data-sub-html="<h4>Gallery Image 12</h4><p> Many desktop publishing packages and web page editors now use Lorem Ipsum</p>">
                                                                    <a href="">
                                                                        <img class="img-responsive mb-0" src="assets/images/media/12.jpg" alt="Thumb-2">
                                                                    </a>
                                                                </li>
                                                                <li class="col-md-4 border-bottom-0" style="margin-top:3px" data-responsive="assets/images/media/12.jpg" data-src="assets/images/media/12.jpg" data-sub-html="<h4>Gallery Image 12</h4><p> Many desktop publishing packages and web page editors now use Lorem Ipsum</p>">
                                                                    <a href="">
                                                                        <img class="img-responsive mb-0" src="assets/images/media/12.jpg" alt="Thumb-2">
                                                                    </a>
                                                                </li>
                                                                <li class="col-md-4 border-bottom-0" style="margin-top:3px" data-responsive="assets/images/media/12.jpg" data-src="assets/images/media/12.jpg" data-sub-html="<h4>Gallery Image 12</h4><p> Many desktop publishing packages and web page editors now use Lorem Ipsum</p>">
                                                                    <a href="">
                                                                        <img class="img-responsive mb-0" src="assets/images/media/12.jpg" alt="Thumb-2">
                                                                    </a>
                                                                </li>
                                                                <li class="col-md-4 border-bottom-0" style="margin-top:3px" data-responsive="assets/images/media/12.jpg" data-src="assets/images/media/12.jpg" data-sub-html="<h4>Gallery Image 12</h4><p> Many desktop publishing packages and web page editors now use Lorem Ipsum</p>">
                                                                    <a href="">
                                                                        <img class="img-responsive mb-0" src="assets/images/media/12.jpg" alt="Thumb-2">
                                                                    </a>
                                                                </li>
                                                                <li class="col-md-4 border-bottom-0" style="margin-top:3px" data-responsive="assets/images/media/12.jpg" data-src="assets/images/media/12.jpg" data-sub-html="<h4>Gallery Image 12</h4><p> Many desktop publishing packages and web page editors now use Lorem Ipsum</p>">
                                                                    <a href="">
                                                                        <img class="img-responsive mb-0" src="assets/images/media/12.jpg" alt="Thumb-2">
                                                                    </a>
                                                                </li>
                                                                <li class="col-md-4 border-bottom-0" style="margin-top:3px" data-responsive="assets/images/media/12.jpg" data-src="assets/images/media/12.jpg" data-sub-html="<h4>Gallery Image 12</h4><p> Many desktop publishing packages and web page editors now use Lorem Ipsum</p>">
                                                                    <a href="">
                                                                        <img class="img-responsive mb-0" src="assets/images/media/12.jpg" alt="Thumb-2">
                                                                    </a>
                                                                </li>
                                                            </ul>
                                                    </div>
                                                </address>
                                            </div>
                                            
										</div>
										<div class="table-responsive push">
											<table class="table table-bordered table-hover mb-0 text-nowrap">
												<tbody><tr class=" ">
													<th>Name Order</th>
													<th class="text-center">Name Restaurant</th>
													<th class="text-right">Photo</th>
													<th class="text-right">Price</th>
												</tr>
												<tr>
													<td class="text-center">Johan Setcs</td>
													<td>
														<div class="text-muted"><div class="text-muted">Sed error laudantium</div></div>
													</td>
													<td class="text-center"><img src="assets/images/media/19.jpg" alt="" height="40"></td>
													<td class="text-center">$20</td>
                                                </tr>
                                                <tr>
													<td class="text-center">Johan Setcs</td>
													<td>
														<div class="text-muted"><div class="text-muted">Sed ut perspiciatis unde </div></div>
													</td>
													<td class="text-center"><img src="assets/images/media/19.jpg" alt="" height="40"></td>
													<td class="text-center">$30</td>
                                                </tr>
                                                <tr>
													<td class="text-center">Johan Setcs</td>
													<td>
														<div class="text-muted"><div class="text-muted">Sed ut </div></div>
													</td>
													<td class="text-center"><img src="assets/images/media/19.jpg" alt="" height="40"></td>
													<td class="text-center">$60</td>
												</tr>
											</tbody></table>
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