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
				<?php $title_view = 'Restaurants'; ?>
				<?php require_once 'inc/top-full.php'; ?>
				<!-- /Top Header Full -->

				<!-- ============== START CONTENT ==============  -->
				<div class="row">
                    <div class="card">
                        <div class="card-header border-bottom-0 p-4">
                            <h2 class="card-title">1 - 30 of 546 </h2>
                            
                        </div>
                    <div class="col-md-12 col-lg-12">
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title"></h3>
                            </div>

                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <div class="input-group-text">
                                                    <i class="fa fa-calendar tx-16 lh-0 op-6"></i>
                                                </div>
                                            </div>
                                            <input class="form-control fc-datepicker" placeholder="MM/DD/YYYY" type="text">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <div class="input-group-text">
                                                    <i class="fa fa-calendar tx-16 lh-0 op-6"></i>
                                                </div>
                                            </div>
                                            <input class="form-control fc-datepicker" placeholder="MM/DD/YYYY" type="text">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                    <a href="add_restaurant.php" style=""><button" class="btn btn-info"><i class="fe fe-download mr-2"></i> Export</button></a>
                                    <a href="add_restaurant.php" style="float: right;"><button" class="btn btn-primary"><i class="fe fe-plus mr-2"></i> Add Restaurant</button></a>
                                    </div>
                                </div>
                                <div class="table-responsive">
                                    <div class="filter-custom">
                                        <div class="row">
                                            <div class="col-lg-6">
                                                <div class="form-group">
                                                    <select class="form-control select2-show-search" data-placeholder="Choose one (with searchbox)">
                                                        <optgroup label="Choose Restaurant">
                                                        <option value="AZ">Filter Restaurant</option>
                                                            <option value="CO">Restaurant 1</option>
                                                            <option value="ID">Restaurant 2</option>
                                                            <option value="MT">Restaurant 3</option>
                                                            <option value="NM">Restaurant 4</option>
                                                            <option value="ND">Restaurant 5</option>
                                                        </optgroup>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <div class="form-group">
                                                    <select class="form-control select2-show-search" data-placeholder="Choose one (with searchbox)">
                                                        <optgroup label="Choose City">
                                                            <option value="AZ">Filter City</option>
                                                            <option value="CO">City 1</option>
                                                            <option value="ID">City 2</option>
                                                            <option value="MT">City 3</option>
                                                            <option value="NM">City 4</option>
                                                            <option value="ND">City 5</option>
                                                        </optgroup>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <table id="example" class="table table-striped table-bordered text-nowrap w-100">
                                        <thead>
                                            <tr>
                                                <th class="wd-15p">ID</th>
                                                <th class="wd-15p">Logo</th>
                                                <th class="wd-15p">Name</th>
                                                <th class="wd-15p">Category</th>
                                                <th class="wd-15p">City</th>
                                                <th class="wd-15p">Total Category</th>
                                                <th class="wd-15p">Comments</th>
                                                <th class="wd-15p">Reviews</th>
                                                <th class="wd-15p">Product</th>
                                                <th class="wd-15p">Orders</th>
                                                <th class="wd-15p">Amount</th>
                                                <th class="wd-15p">Accepted</th>
                                                <th class="wd-15p">Rejected</th>
                                                <th class="wd-15p">Pending</th>
                                                <th class="wd-15p">Active</th>
                                                <th class="wd-10p">Settings</th>
                                                <th class="wd-10p">View</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>1</td>
                                                <td><a href="products.php"><img src="https://sample.foxytech.net/5/85/assets/img/products/3.svg" width="40"> </a></td>
                                                <td><a href="products.php"> Milky Cookies </a></td>
                                                
                                                <td>Sweets</td>
                                                <td>Istanbul</td>
                                                <td>1</td>
                                                <td>4</td>
                                                <td>4.5</td>
                                                <td>6</td>
                                                <td>45</td>
                                                <td>73</td>
                                                <td>1</td>
                                                <td>3</td>
                                                <td>41</td>
                                                <td>
                                                <div class="material-switch pull-left" style="transform: translateX(-13px);">
                                                    <input id="someSwitchOptionSuccess1" name="someSwitchOption001" type="checkbox"/>
                                                    <label for="someSwitchOptionSuccess1" class="label-success"></label>
                                                </div>
                                                </td>
                                                <td><a class="btn btn-sm btn-primary" href="add_restaurant.php"><i class="fa fa-edit"></i> Edit</a>
                                                    <a class="btn btn-sm btn-danger" href="#"><i class="fa fa-trash"></i> Delete</a>
                                                </td>
                                                <td><a class="btn btn-sm btn-secondary" href="#"><i class="fa fa-info-circle"></i> View</a> </td>
                                            </tr>
                                            <tr>
                                                <td>2</td>
                                                <td><a href="products.php"><img src="https://sample.foxytech.net/5/85/assets/img/products/3.svg" width="40"> </a></td>
                                                <td><a href="products.php"> Milky Cookies </a></td>
                                                
                                                <td>Sweets</td>
                                                <td>Istanbul</td>
                                                <td>1</td>
                                                <td>4</td>
                                                <td>4.5</td>
                                                <td>6</td>
                                                <td>45</td>
                                                <td>73</td>
                                                <td>1</td>
                                                <td>3</td>
                                                <td>41</td>
                                                <td>
                                                <div class="material-switch pull-left" style="transform: translateX(-13px);">
                                                    <input id="someSwitchOptionSuccess2" name="someSwitchOption001" type="checkbox"/>
                                                    <label for="someSwitchOptionSuccess2" class="label-success"></label>
                                                </div>
                                                </td>
                                                <td><a class="btn btn-sm btn-primary" href="add_restaurant.php"><i class="fa fa-edit"></i> Edit</a>
                                                    <a class="btn btn-sm btn-danger" href="#"><i class="fa fa-trash"></i> Delete</a>
                                                </td>
                                                <td><a class="btn btn-sm btn-secondary" href="#"><i class="fa fa-info-circle"></i> View</a> </td>
                                            </tr>
                                            <tr>
                                                <td>3</td>
                                                <td><a href="products.php"><img src="https://sample.foxytech.net/5/85/assets/img/products/3.svg" width="40"> </a></td>
                                                <td><a href="products.php"> Milky Cookies </a></td>
                                                
                                                <td>Sweets</td>
                                                <td>Istanbul</td>
                                                <td>1</td>
                                                <td>4</td>
                                                <td>4.5</td>
                                                <td>6</td>
                                                <td>45</td>
                                                <td>73</td>
                                                <td>1</td>
                                                <td>3</td>
                                                <td>41</td>
                                                <td>
                                                <div class="material-switch pull-left" style="transform: translateX(-13px);">
                                                    <input id="someSwitchOptionSuccess3" name="someSwitchOption001" type="checkbox"/>
                                                    <label for="someSwitchOptionSuccess3" class="label-success"></label>
                                                </div>
                                                </td>
                                                <td><a class="btn btn-sm btn-primary" href="add_restaurant.php"><i class="fa fa-edit"></i> Edit</a>
                                                    <a class="btn btn-sm btn-danger" href="#"><i class="fa fa-trash"></i> Delete</a>
                                                </td>
                                                <td><a class="btn btn-sm btn-secondary" href="#"><i class="fa fa-info-circle"></i> View</a> </td>
                                            </tr>
                                            <tr>
                                                <td>4</td>
                                                <td><a href="products.php"><img src="https://sample.foxytech.net/5/85/assets/img/products/3.svg" width="40"> </a></td>
                                                <td><a href="products.php"> Milky Cookies </a></td>
                                                
                                                <td>Sweets</td>
                                                <td>Istanbul</td>
                                                <td>1</td>
                                                <td>4</td>
                                                <td>4.5</td>
                                                <td>6</td>
                                                <td>45</td>
                                                <td>73</td>
                                                <td>1</td>
                                                <td>3</td>
                                                <td>41</td>
                                                <td>
                                                <div class="material-switch pull-left" style="transform: translateX(-13px);">
                                                    <input id="someSwitchOptionSuccess4" name="someSwitchOption001" type="checkbox"/>
                                                    <label for="someSwitchOptionSuccess4" class="label-success"></label>
                                                </div>
                                                </td>
                                                <td><a class="btn btn-sm btn-primary" href="add_restaurant.php"><i class="fa fa-edit"></i> Edit</a>
                                                    <a class="btn btn-sm btn-danger" href="#"><i class="fa fa-trash"></i> Delete</a>
                                                </td>
                                                <td><a class="btn btn-sm btn-secondary" href="#"><i class="fa fa-info-circle"></i> View</a> </td>
                                            </tr>
                                            <tr>
                                                <td>5</td>
                                                <td><a href="products.php"><img src="https://sample.foxytech.net/5/85/assets/img/products/3.svg" width="40"> </a></td>
                                                <td><a href="products.php"> Milky Cookies </a></td>
                                                
                                                <td>Sweets</td>
                                                <td>Istanbul</td>
                                                <td>1</td>
                                                <td>4</td>
                                                <td>4.5</td>
                                                <td>6</td>
                                                <td>45</td>
                                                <td>73</td>
                                                <td>1</td>
                                                <td>3</td>
                                                <td>41</td>
                                                <td>
                                                <div class="material-switch pull-left" style="transform: translateX(-13px);">
                                                    <input id="someSwitchOptionSuccess5" name="someSwitchOption001" type="checkbox"/>
                                                    <label for="someSwitchOptionSuccess5" class="label-success"></label>
                                                </div>
                                                </td>
                                                <td><a class="btn btn-sm btn-primary" href="add_restaurant.php"><i class="fa fa-edit"></i> Edit</a>
                                                    <a class="btn btn-sm btn-danger" href="#"><i class="fa fa-trash"></i> Delete</a>
                                                </td>
                                                <td><a class="btn btn-sm btn-secondary" href="#"><i class="fa fa-info-circle"></i> View</a> </td>
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