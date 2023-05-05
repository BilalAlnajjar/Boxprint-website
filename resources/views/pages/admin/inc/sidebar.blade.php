<!--APP-SIDEBAR-->
<div class="app-sidebar__overlay" data-toggle="sidebar"></div>
<aside class="app-sidebar">
	<div class="side-header">
		<a class="header-brand1" href="index.php">
			<img src="assets/images/brand/logo.png" class="header-brand-img desktop-logo" alt="logo">
			<img src="assets/images/brand/logo-1.png" class="header-brand-img toggle-logo" alt="logo">
			<img src="assets/images/brand/logo-2.png" class="header-brand-img light-logo" alt="logo">
			<img src="assets/images/brand/logo-3.png" class="header-brand-img light-logo1" alt="logo">
		</a><!-- LOGO -->
		<a aria-label="Hide Sidebar" class="app-sidebar__toggle ml-auto" data-toggle="sidebar" href="#"></a><!-- sidebar-toggle-->
	</div>
	<div class="app-sidebar__user">
		<div class="dropdown user-pro-body text-center">
			<div class="user-pic">
				<img src="https://i.imgur.com/ye6m2k3.jpg" alt="user-img" class="avatar-xl rounded-circle">
			</div>
			<div class="user-info">
				<h6 class=" mb-0 text-dark">Admin</h6>
				<span class="text-muted app-sidebar__user-name text-sm">Company Name</span>
			</div>
		</div>
	</div>
	<div class="sidebar-navs">
		<ul class="nav  nav-pills-circle">
			<li class="nav-item" data-toggle="tooltip" data-placement="top" title="Settings">
				<a class="nav-link text-center m-2" href="generalsettings.php">
					<i class="fe fe-settings"></i>
				</a>
			</li>
			<li class="nav-item" data-toggle="tooltip" data-placement="top" title="Inbox">
				<a class="nav-link text-center m-2" href="inbox.php">
					<i class="fe fe-mail"></i>
				</a>
			</li>
			<li class="nav-item" data-toggle="tooltip" data-placement="top" title="Profile">
				<a class="nav-link text-center m-2" href="profile.php">
					<i class="fe fe-user"></i>
				</a>
			</li>
			<li class="nav-item" data-toggle="tooltip" data-placement="top" title="Logout">
				<a class="nav-link text-center m-2">
					<i class="fe fe-power"></i>
				</a>
			</li>
		</ul>
	</div>
	<ul class="side-menu">
		<li>
			<a class="side-menu__item" href="index.php"><i class="side-menu__icon ti-home"></i><span class="side-menu__label">Home</span></a>
		</li>
		
		<li class="slide">
			<a class="side-menu__item" data-toggle="slide" href="#"><i class="side-menu__icon mdi mdi-cart"></i><span class="side-menu__label">Orders</span><i class="angle fa fa-angle-right"></i></a>
			<ul class="slide-menu">
				<li><a href="orders.php" class="slide-item"> <i class="side-menu__icon fa fa fa-filter"></i>All </a></li>
				<li><a href="pending.php" class="slide-item"> <i class="side-menu__icon fa fa-hourglass"></i>Pending </a></li>
				<li><a href="accepted.php" class="slide-item"> <i class="side-menu__icon fa fa-check"></i>Accepted </a></li>
				<li><a href="rejected.php" class="slide-item"> <i class="side-menu__icon fa fa-remove"></i>Rejected </a></li>
			</ul>
		</li>

		<li class="slide">
			<a class="side-menu__item" data-toggle="slide" href="#"><i class="side-menu__icon fe fe-trending-down"></i><span class="side-menu__label">Offers</span><i class="angle fa fa-angle-right"></i></a>
			<ul class="slide-menu">
				<li><a href="offers.php" class="slide-item"> <i class="side-menu__icon ion-grid"></i>All Offers</a></li>
				<li><a href="add_offer.php" class="slide-item"> <i class="side-menu__icon fe fe-plus"></i>Add Offers</a></li>
			</ul>
		</li>
		<li>
			<a class="side-menu__item" href="clients.php"><i class="side-menu__icon fe fe-users"></i><span class="side-menu__label">Clients</span></a>
		</li>

		<li>
		<a class="side-menu__item" href="products.php"><i class="side-menu__icon fa fa-cutlery"></i><span class="side-menu__label">Product</span></a>
		</li>
		<li class="slide">
			<a class="side-menu__item" data-toggle="slide" href="#"><i class="side-menu__icon mdi mdi-tune"></i><span class="side-menu__label">Control Site</span><i class="angle fa fa-angle-right"></i></a>
			<ul class="slide-menu">
				<li><a href="slider.php" class="slide-item"><i class="side-menu__icon fe fe-align-center"></i>Slider</a></li>
				<li><a href="home-global.php" class="slide-item"><i class="side-menu__icon fa fa-cubes"></i>Steps</a></li>
				<li><a href="edit_content.php" class="slide-item"><i class="side-menu__icon fa fa-fort-awesome"></i>The best</a></li>
				<li><a href="edit_video.php" class="slide-item"><i class="side-menu__icon fa fa-play-circle"></i>video</a></li>
				<li><a href="pages.php" class="slide-item"><i class="side-menu__icon fa fa-home"></i>about</a></li>
			</ul>
		</li>
		<li class="slide">
			<a class="side-menu__item" data-toggle="slide" href="#"><i class="side-menu__icon mdi mdi-tune"></i><span class="side-menu__label">General</span><i class="angle fa fa-angle-right"></i></a>
			<ul class="slide-menu">
				<li><a href="categories.php" class="slide-item"><i class="side-menu__icon fa fa-th-large"></i>Categories</a></li>
				<li><a href="sub_category.php" class="slide-item"><i class="side-menu__icon fa fa-th-large"></i>Sub Category</a></li>
				<li><a href="social-media.php" class="slide-item"> <i class="side-menu__icon fe fe-twitter"></i>Social Media</a></li>
				<li><a href="generalsettings.php" class="slide-item"><i class="side-menu__icon fe fe-align-center"></i>General</a></li>

			</ul>
		</li>
				<li>
			<a class="side-menu__item" href="contact.php"><i class="side-menu__icon side-menu__icon fe fe-mail"></i><span class="side-menu__label">Contact</span></a>
		</li>
		<li>
			<a class="side-menu__item" href="users.php"><i class="side-menu__icon side-menu__icon mdi mdi-account-settings-variant"></i><span class="side-menu__label">User</span></a>
		</li>

	</ul>
</aside>
<!--/APP-SIDEBAR-->