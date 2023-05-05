@extends('pages.layouts.dashboard')
@section('content')
    <div class="side-app">
        <!-- Top Header Full -->
        <!-- PAGE-HEADER -->
        <div class="page-header">
            <div>
                <h1 class="page-title">Dashboard</h1>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Slider</li>
                </ol>
            </div>
            <div class="d-flex  ml-auto header-right-icons header-search-icon">
                <div class="dropdown d-sm-flex">
                    <a href="#" class="nav-link icon" data-toggle="dropdown">
                        <i class="fe fe-search"></i>
                    </a>
                    <div class="dropdown-menu header-search dropdown-menu-left">
                        <div class="input-group w-100 p-2">
                            <input type="text" class="form-control " placeholder="Search....">
                            <div class="input-group-append ">
                                <button type="button" class="btn btn-primary ">
                                    <i class="fa fa-search" aria-hidden="true"></i>
                                </button>
                            </div>
                        </div>
                    </div>
                </div><!-- SEARCH -->
                <div class="dropdown d-md-flex">
                    <a class="nav-link icon full-screen-link nav-link-bg">
                        <i class="fe fe-maximize fullscreen-button"></i>
                    </a>
                </div><!-- FULL-SCREEN -->
                <div class="dropdown d-md-flex notifications">
                    <a class="nav-link icon" data-toggle="dropdown">
                        <i class="fe fe-bell"></i>
                        <span class="nav-unread badge badge-success badge-pill">2</span>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow">
                        <div class="notifications-menu">
                            <a class="dropdown-item d-flex pb-3" href="#">
                                <div class="fs-16 text-success mr-3">
                                    <i class="fa fa-thumbs-o-up"></i>
                                </div>
                                <div class="">
                                    <strong>Someone likes our posts.</strong>
                                </div>
                            </a>
                            <a class="dropdown-item d-flex pb-3" href="#">
                                <div class="fs-16 text-primary mr-3">
                                    <i class="fa fa-commenting-o"></i>
                                </div>
                                <div class="">
                                    <strong>3 New Comments.</strong>
                                </div>
                            </a>
                            <a class="dropdown-item d-flex pb-3" href="#">
                                <div class="fs-16 text-danger mr-3">
                                    <i class="fa fa-cogs"></i>
                                </div>
                                <div class="">
                                    <strong>Server Rebooted</strong>
                                </div>
                            </a>
                        </div>
                        <div class="dropdown-divider"></div>
                        <a href="#" class="dropdown-item text-center">View all Notification</a>
                    </div>
                </div><!-- NOTIFICATIONS -->
                <div class="dropdown d-md-flex message">
                    <a class="nav-link icon text-center" data-toggle="dropdown">
                        <i class="fe fe-mail"></i>
                        <span class="nav-unread badge badge-danger badge-pill">3</span>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow">
                        <div class="message-menu">
                            <a class="dropdown-item d-flex pb-3" href="#">
                                            <span class="avatar avatar-md brround mr-3 align-self-center cover-image"
                                                  data-image-src="assets/images/users/1.jpg"></span>
                                <div>
                                    <strong>Madeleine</strong> Hey! there I' am available....
                                    <div class="small text-muted">
                                        3 hours ago
                                    </div>
                                </div>
                            </a>
                            <a class="dropdown-item d-flex pb-3" href="#">
                                            <span class="avatar avatar-md brround mr-3 align-self-center cover-image"
                                                  data-image-src="assets/images/users/12.jpg"></span>
                                <div>
                                    <strong>Anthony</strong> New product Launching...
                                    <div class="small text-muted">
                                        5 hour ago
                                    </div>
                                </div>
                            </a>
                            <a class="dropdown-item d-flex pb-3" href="#">
                                            <span class="avatar avatar-md brround mr-3 align-self-center cover-image"
                                                  data-image-src="assets/images/users/4.jpg"></span>
                                <div>
                                    <strong>Olivia</strong> New Schedule Realease......
                                    <div class="small text-muted">
                                        45 mintues ago
                                    </div>
                                </div>
                            </a>
                            <a class="dropdown-item d-flex pb-3" href="#">
                                            <span class="avatar avatar-md brround mr-3 align-self-center cover-image"
                                                  data-image-src="assets/images/users/15.jpg"></span>
                                <div>
                                    <strong>Sanderson</strong> New Schedule Realease......
                                    <div class="small text-muted">
                                        2 days ago
                                    </div>
                                </div>
                            </a>
                        </div>
                        <div class="dropdown-divider"></div>
                        <a href="#" class="dropdown-item text-center">See all Messages</a>
                    </div>
                </div><!-- MESSAGE-BOX -->
                <div class="dropdown profile-1">
                    <a href="#" data-toggle="dropdown" class="nav-link pr-2 leading-none d-flex">
                                    <span>
                                        <img src="assets/images/users/10.jpg" alt="profile-user"
                                             class="avatar  profile-user brround cover-image">
                                    </span>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow">
                        <div class="drop-heading">
                            <div class="text-center">
                                <h5 class="text-dark mb-0">Elizabeth Dyer</h5>
                                <small class="text-muted">Administrator</small>
                            </div>
                        </div>
                        <div class="dropdown-divider m-0"></div>
                        <a class="dropdown-item" href="#">
                            <i class="dropdown-icon mdi mdi-account-outline"></i> Profile
                        </a>
                        <a class="dropdown-item" href="#">
                            <i class="dropdown-icon  mdi mdi-settings"></i> Settings
                        </a>
                        <a class="dropdown-item" href="#">
                            <span class="float-right"></span>
                            <i class="dropdown-icon mdi  mdi-message-outline"></i> Inbox
                        </a>
                        <a class="dropdown-item" href="#">
                            <i class="dropdown-icon mdi mdi-comment-check-outline"></i> Message
                        </a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="#">
                            <i class="dropdown-icon mdi mdi-compass-outline"></i> Need help?
                        </a>
                        <a class="dropdown-item" href="login.html">
                            <i class="dropdown-icon mdi  mdi-logout-variant"></i> Sign out
                        </a>
                    </div>
                </div>
                <!-- <div class="dropdown d-md-flex header-settings">
<a href="#" class="nav-link icon " data-toggle="sidebar-right" data-target=".sidebar-right">
    <i class="fe fe-align-right"></i>
</a>
</div> -->
            </div>
        </div>
        <!-- PAGE-HEADER END -->                <!-- /Top Header Full -->

        <!-- ============== START CONTENT ==============  -->
        <!-- ROW-1 OPEN -->
        <div class="row">
            <div class="col-sm-12 col-md-6 col-lg-6 col-xl-3">
                <div class="card-body">
                    <div class="btn-list">
                        <a href="edit_content.php">
                            <button
                            " class="btn btn-primary"><i class="fe fe-plus mr-2"></i>SAVE</button></a>
                    </div>
                </div>
            </div><!-- COL END -->
        </div>

        <div class="row row-cards row-deck">
            <div class="col-md-4">
                <div class="card">
                    <img class="card-img-topbr-tr-0 br-tl-0" src="assets/images/media/19.jpg" alt="Card image cap">
                    <div class="card-header">
                        <h5 class="card-title">steps </h5>
                    </div>
                    <div class="btn-list">
                    </div>
                    <div class="card-body">
                        <a class="btn btn-sm btn-primary" href="edit_content.php"><i class="fa fa-edit"></i> Edit</a>
                        <a class="btn btn-sm btn-danger" href="#"><i class="fa fa-trash"></i> Delete</a>
                        <div class="material-switch pull-right">
                            <input id="someSwitchOptionSuccess" name="someSwitchOption001" type="checkbox"/>
                            <label for="someSwitchOptionSuccess" class="label-success"></label>
                        </div>
                    </div>
                </div>
            </div><!-- COL-END -->
            <div class="col-md-4">
                <div class="card">
                    <img class="card-img-topbr-tr-0 br-tl-0" src="assets/images/media/12.jpg" alt="Card image cap">
                    <div class="card-header">
                        <h5 class="card-title">steps</h5>
                    </div>
                    <div class="card-body">
                        <a class="btn btn-sm btn-primary" href="edit_content.php"><i class="fa fa-edit"></i> Edit</a>
                        <a class="btn btn-sm btn-danger" href="#"><i class="fa fa-trash"></i> Delete</a>
                        <div class="material-switch pull-right">
                            <input id="someSwitchOptionSuccess" name="someSwitchOption001" type="checkbox"/>
                            <label for="someSwitchOptionSuccess" class="label-success"></label>
                        </div>
                    </div>
                </div>
            </div><!-- COL-END -->
            <div class="col-md-4">
                <div class="card ">
                    <img class="card-img-topbr-tr-0 br-tl-0" src="assets/images/media/17.jpg" alt="Card image cap">
                    <div class="card-header">
                        <h5 class="card-title">steps</h5>
                    </div>
                    <div class="card-body">
                        <a class="btn btn-sm btn-primary" href="edit_content.php"><i class="fa fa-edit"></i> Edit</a>
                        <a class="btn btn-sm btn-danger" href="#"><i class="fa fa-trash"></i> Delete</a>
                        <div class="material-switch pull-right">
                            <input id="someSwitchOptionSuccess" name="someSwitchOption001" type="checkbox"/>
                            <label for="someSwitchOptionSuccess" class="label-success"></label>
                        </div>
                    </div>
                </div>
            </div><!-- COL-END -->
        </div>
        <!-- ROW-1 CLOSED -->
        <!-- ============== END CONTENT ==============  -->
@endsection
