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
				<?php $title_view = 'Settings Email'; ?>
				<?php require_once 'inc/top-full.php'; ?>
				<!-- /Top Header Full -->
				<!-- ============== START CONTENT ==============  -->
				<!-- ROW-1 OPEN -->
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header">
                                <h3 class="mb-0 card-title">Default forms with labels</h3>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="form-label">Mail Driver</label>
                                            <input type="text" class="form-control" name="example-text-input" placeholder="">
                                        </div>
                                        <div class="form-group">
                                            <label class="form-label">Mail Username</label>
                                            <input type="text" class="form-control" name="example-text-input" placeholder="">
                                        </div>
                                        <div class="form-group">
                                            <label class="form-label">Mail From Address</label>
                                            <input type="text" class="form-control" name="example-text-input" placeholder="">
                                        </div>
                                        <div class="form-group">
                                            <label class="form-label">Mail Encryption</label>
                                            <input type="text" class="form-control" name="example-text-input" placeholder="">
                                        </div>
                                        
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="form-label">Mail Host</label>
                                            <input type="text" class="form-control" name="example-text-input" placeholder="">
                                        </div>
                                        <div class="form-group">
                                            <label class="form-label">Mail Password</label>
                                            <input type="text" class="form-control" name="example-text-input" placeholder="">
                                        </div>
                                        <div class="form-group">
                                            <label class="form-label">Mail From Name</label>
                                            <input type="text" class="form-control" name="example-text-input" placeholder="">
                                        </div>
                                        <div class="form-group">
                                            <label class="form-label">Mail Port</label>
                                            <input type="text" class="form-control" name="example-text-input" placeholder="">
                                        </div>
                                        
                                        
                                    </div>
                                    
                                        
                                    
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card text-center">
                        <div class="card-body">
                            <input type='button' class="btn btn-success mt-2" value='Save' id='click'>
                        </div>
                    </div>
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