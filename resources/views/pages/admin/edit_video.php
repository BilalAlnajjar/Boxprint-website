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
				<?php $title_view = 'Video'; ?>
				<?php require_once 'inc/top-full.php'; ?>
				<!-- /Top Header Full -->

				<!-- ============== START CONTENT ==============  -->
				<div class="row">
					<div class="col-md-12">
						<div class="card">
							<div class="card-header">
								<h3 class="card-title">Update Content Video</h3>
							</div>
							<div class="card-body">
                                
								<div class="form-group">
									<label class="form-label">Title Section</label>
									<input type="text" class="form-control" name="example-text-input" placeholder="Enter Title Section">
                                </div>

                                <div class="form-group">
                                <label class="form-label">Description Section</label>
								    <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" placeholder="Enter Description Section Here ..."></textarea>
                                </div>
                                <div class="form-group">
									<label class="form-label">Video Link</label>
									<input type="text" class="form-control" name="example-text-input" placeholder="Enter Video Link">
                                </div>
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