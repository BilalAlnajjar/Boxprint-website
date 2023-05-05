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
				<?php $title_view = 'Users'; ?>
				<?php require_once 'inc/top-full.php'; ?>
				<!-- /Top Header Full -->

				<!-- ============== START CONTENT ==============  -->
				<div class="row">
                    <div class="card">
                    <div class="btn-list">
                                <a href="add_admin.php"><button" class="btn btn-primary"><i class="fe fe-plus mr-2"></i>Add User</button></a>
                            </div>
                        <div class="card-header border-bottom-0 p-4">
                            
                            <h2 class="card-title">1 - 30 of 546 </h2>
                            <div class="page-options d-flex float-right">
                                
                            </div>
                        </div>
                    <div class="col-md-12 col-lg-12">
                        
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">Personal Users</h3>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table id="example" class="table table-striped table-bordered text-nowrap w-100">
                                        <thead>
                                            <tr>
                                                <th class="wd-15p">ID</th>
                                                <th class="wd-15p">Full Name</th>
                                                <th class="wd-15p">Mobile Number</th>
                                                <th class="wd-15p">Email</th>
                                                <th class="wd-15p">Password</th>
                                                <th class="wd-25p">Role</th>
                                                <th class="wd-25p">Status</th>
                                                <th class="wd-10p">Settings</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>1</td>
                                                <td>Ahmed Yousef</td>
                                                <td>0534 123 1234</td>
                                                <td>info@mail.com</td>
                                                <td>ahmed123</td>
                                                <td>Super Admin</td>
                                                <td>
                                                <div class="material-switch pull-left">
                                                    <input id="someSwitchOptionSuccess1" name="someSwitchOption001" type="checkbox"/>
                                                    <label for="someSwitchOptionSuccess1" class="label-success"></label>
                                                </div>
                                                </td>
                                                <td><a class="btn btn-sm btn-primary" href="add_admin.php"><i class="fa fa-edit"></i> Edit</a>
                                                    <a class="btn btn-sm btn-danger" href="#"><i class="fa fa-trash"></i> Delete</a>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>2</td>
                                                <td>Ahmed Yousef</td>
                                                <td>0534 123 1234</td>
                                                <td>info@mail.com</td>
                                                <td>ahmed123</td>
                                                <td>Admin</td>
                                                <td>
                                                <div class="material-switch pull-left">
                                                    <input id="someSwitchOptionSuccess2" name="someSwitchOption001" type="checkbox"/>
                                                    <label for="someSwitchOptionSuccess2" class="label-success"></label>
                                                </div>
                                                </td>
                                                <td><a class="btn btn-sm btn-primary" href="add_admin.php"><i class="fa fa-edit"></i> Edit</a>
                                                    <a class="btn btn-sm btn-danger" href="#"><i class="fa fa-trash"></i> Delete</a>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>3</td>
                                                <td>Ahmed Yousef</td>
                                                <td>0534 123 1234</td>
                                                <td>info@mail.com</td>
                                                <td>ahmed123</td>
                                                <td>Admin</td>
                                                <td>
                                                <div class="material-switch pull-left">
                                                    <input id="someSwitchOptionSuccess3" name="someSwitchOption001" type="checkbox"/>
                                                    <label for="someSwitchOptionSuccess3" class="label-success"></label>
                                                </div>
                                                </td>
                                                <td><a class="btn btn-sm btn-primary" href="add_admin.php"><i class="fa fa-edit"></i> Edit</a>
                                                    <a class="btn btn-sm btn-danger" href="#"><i class="fa fa-trash"></i> Delete</a>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>4</td>
                                                <td>Ahmed Yousef</td>
                                                <td>0534 123 1234</td>
                                                <td>info@mail.com</td>
                                                <td>ahmed123</td>
                                                <td>Admin</td>
                                                <td>
                                                <div class="material-switch pull-left">
                                                    <input id="someSwitchOptionSuccess4" name="someSwitchOption001" type="checkbox"/>
                                                    <label for="someSwitchOptionSuccess4" class="label-success"></label>
                                                </div>
                                                </td>
                                                <td><a class="btn btn-sm btn-primary" href="add_admin.php"><i class="fa fa-edit"></i> Edit</a>
                                                    <a class="btn btn-sm btn-danger" href="#"><i class="fa fa-trash"></i> Delete</a>
                                                </td>
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
                <!-- ROW-1 CLOSED -->
				<!-- ============== END CONTENT ==============  -->

	

	<!-- Copyright -->
	<?php require_once 'inc/copyright.php'; ?>
	<!-- /Copyright -->
</div>
<!-- Footer -->
<?php require_once 'inc/footer.php'; ?>
<!-- /Footer -->