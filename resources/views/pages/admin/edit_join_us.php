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
				<?php $title_view = 'Join Us'; ?>
				<?php require_once 'inc/top-full.php'; ?>
				<!-- /Top Header Full -->

				<!-- ============== START CONTENT ==============  -->
				<div class="row">
					<div class="col-md-12">
						<div class="card">
							<div class="card-header">
								<h3 class="card-title">Update Content Join Us</h3>
							</div>
							<div class="card-body">
                                
								<div class="form-group">
									<label class="form-label">Title</label>
									<input type="text" class="form-control" name="example-text-input" placeholder="Enter Title">
                                </div>

                                <div class="form-group">
                                <label class="form-label">Description</label>
								    <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" placeholder="Enter Description Here ..."></textarea>
                                </div>
                                <div class="form-group">
									<label class="form-label">Button Text</label>
									<input type="text" class="form-control" name="example-text-input" placeholder="Enter Button Text">
                                </div>

                                <div class="form-group">
									<label class="form-label">Button Link</label>
									<input type="text" class="form-control" name="example-text-input" placeholder="Enter Button Link">
                                </div>
                                <div class="col-lg-12">
                                    <div class="card shadow">
                                        <div class="card-header">
                                            <h3 class="mb-0 card-title">Upload Image</h3>
                                        </div>
                                        <div class="card-body">
                                            <input type="file" class="dropify" data-height="300" />
                                        </div>
                                    </div>
                                </div><!-- COL END -->
							</div>
						</div>
					</div><!-- COL END -->
                    
                
					<div class="card-footer">
						<a href="#" class="btn btn-success mt-1">Add</a>
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