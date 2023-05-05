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
				<?php $title_view = 'Add Restaurant'; ?>
				<?php require_once 'inc/top-full.php'; ?>
				<!-- /Top Header Full -->

				<!-- ============== START CONTENT ==============  -->
				<div class="row">
					<div class="col-md-12">
						<div class="card">
							<div class="card-header">
								<h3 class="card-title">Restaurant Information</h3>
							</div>
							<div class="card-body">
								<div class="form-group">
									<label>City</label>
									<select multiple="multiple" class="filter-multi">
										<option value="1">Istanbul</option>
										<option value="2" >Dubi</option>
										<option value="3" >Ankra</option>
										<option value="4">Mersin</option>
										<option value="5">Azmir</option>
									</select>
								</div>
								<div class="form-group">
									<label>Category</label>
									<select multiple="multiple" class="filter-multi">
										<option value="1">Vegetables</option>
										<option value="2" >Fruits</option>
										<option value="3" >Meat and Poultry</option>
										<option value="4">Fish and Seafood</option>
										<option value="5">Dairy Foods</option>
										<option value="6">Vegetables</option>
										<option value="7" >Fruits</option>
										<option value="8" >Meat and Poultry</option>
										<option value="9">Fish and Seafood</option>
										<option value="10">Dairy Foods</option>
									</select>
								</div>
							
								<div class="form-group">
									<label class="form-label">Name Restaurant</label>
									<input type="text" class="form-control" name="example-text-input" placeholder="Provide Restaurant Name">
								</div>

								<div class="form-group">
									<label class="form-label">Restaurant Fees</label>
									<input type="text" class="form-control" name="example-text-input" placeholder="Provide Restaurant Name">
								</div>
							
								<div class="col-lg-12">
									<div class="card shadow">
										<div class="card-header">
											<h3 class="mb-0 card-title">Logo Upload</h3>
										</div>
										<div class="card-body">
											<input type="file" class="dropify" data-height="300" />
										</div>
									</div>
								</div><!-- COL END -->
							</div>
							
						</div>
						<div class="card">
							<div class="card-header">
								<h3 class="card-title">Restaurant Information</h3>
							</div>
							<div class="card-body">
								<div class="form-group">
									<label class="form-label">Email</label>
									<input type="email" class="form-control" name="example-text-input" placeholder="Provide restaurant management email">
								</div>

								<div class="form-group">
									<label class="form-label">Password</label>
									<input type="password" class="form-control" name="example-text-input" placeholder="Provide restaurant management password">
								</div>

								<div class="form-group">
									<label class="form-label">Phone Number</label>
									<input type="text" class="form-control" name="example-text-input" placeholder="Provide your phone number">
								</div>

							</div>
						</div>

						<div class="card">
							<div class="card-header">
								<h3 class="card-title">Payment Information</h3>
							</div>
							

							<div class="card-body">
								<div class="row">
                                    <div class="col-md-2">
                                        <div class="form-group form-elements m-0">
                                            <div class="form-label">Cash On Delivery</div>
                                        </div>
                                    </div>
                                    <div class="col-md-10 x-check-active">
										<div class="material-switch pull-left" style="transform: translateY(16px);">
											<input id="someSwitchOptionSuccess1" name="someSwitchOption001" type="checkbox"/>
											<label for="someSwitchOptionSuccess1" class="label-success"></label>
										</div>
									</div>
                                </div>
							</div>

							<div class="card-body">
								<div class="row">
                                    <div class="col-md-2">
                                        <div class="form-group form-elements m-0">
                                            <div class="form-label">Creadit Card</div>
                                        </div>
                                    </div>
                                    <div class="col-md-10 x-check-active">
										<div class="material-switch pull-left" style="transform: translateY(16px);">
											<input id="someSwitchOptionSuccess2" name="someSwitchOption001" type="checkbox"/>
											<label for="someSwitchOptionSuccess2" class="label-success"></label>
										</div>
									</div>
                                </div>
							</div>

							<div class="card-body">
								<div class="row">
                                    <div class="col-md-2">
                                        <div class="form-group form-elements m-0">
                                            <div class="form-label"> Pay Online</div>
                                        </div>
                                    </div>
                                    <div class="col-md-10 x-check-active">
										<div class="material-switch pull-left" style="transform: translateY(16px);">
											<input id="someSwitchOptionSuccess3" name="someSwitchOption001" type="checkbox"/>
											<label for="someSwitchOptionSuccess3" class="label-success"></label>
										</div>
									</div>
                                </div>
							</div>

							<div class="card-body custom-card">
								<h5>API Data</h5>
							</div>
						</div>
					</div><!-- COL END -->
                    
                
					<div class="card-footer">
						<a href="#" class="btn btn-success mt-1">Add Restaurant</a>
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