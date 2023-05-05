@extends('pages.layouts.dashboard')
@section('content')


    <div class="row" style="padding-top: 20px;">
        <div class="col-sm-12 col-md-6 col-lg-3 col-xl-3">
            <div class="card bg-success img-card box-success-shadow x-box-cards">
                <div class="card-body card-taps">
                    <a href="#"></a>
                    <div class="d-flex">
                        <div class="text-white">
                            <h2 class="mb-0 number-font">{{$countOrders}}</h2>
                            <p class="mb-0 number-font custom-number">عدد الطلبات</p>
                            <div class="progress h-2" style="margin-top:20px">
                                <div class="progress-bar w-50" role="progressbar"
                                     style="background-color: #24dcc2"></div>
                            </div>
                        </div>
                        <div class="ml-auto custom-icon"> <i
                                class="fa fa-shopping-bag text-white fs-30 mr-2 mt-2"
                                style="transform: translateY(32px);font-size: 24px !important;"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div><!-- COL END -->

        <div class="col-sm-12 col-md-6 col-lg-3 col-xl-3">
            <div class="card bg-secondary img-card box-secondary-shadow x-box-cards">
                <div class="card-body card-taps">
                    <a href="#"></a>
                    <div class="d-flex">
                        <div class="text-white">
                            <h2 class="mb-0 number-font">{{$countProducts}}</h2>
                            <p class="mb-0 number-font custom-number">عدد الخدمات</p>
                            <div class="progress h-2" style="margin-top:20px">
                                <div class="progress-bar w-50" role="progressbar"
                                     style="background-color: #24dcc2"></div>
                            </div>
                        </div>
                        <div class="ml-auto custom-icon"> <i
                                class="fa fa-paint-brush text-white fs-30 mr-2 mt-2"
                                style="transform: translateY(32px);font-size: 24px !important;"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div><!-- COL END -->

        <div class="col-sm-12 col-md-6 col-lg-3 col-xl-3">
            <div class="card bg-info img-card box-info-shadow x-box-cards">
                <div class="card-body card-taps">
                    <a href="#"></a>
                    <div class="d-flex">
                        <div class="text-white">
                            <h2 class="mb-0 number-font">{{$countUsers}}</h2>
                            <p class="mb-0 number-font custom-number">عدد المستخدمين</p>
                            <div class="progress h-2" style="margin-top:20px">
                                <div class="progress-bar w-50" role="progressbar"
                                     style="background-color: #24dcc2"></div>
                            </div>
                        </div>
                        <div class="ml-auto custom-icon"> <i
                                class="fa fa-user-o text-white fs-30 mr-2 mt-2"
                                style="transform: translateY(32px);font-size: 24px !important;display: block"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div><!-- COL END -->

        <div class="col-sm-12 col-md-6 col-lg-3 col-xl-3">
            <div class="card bg-primary img-card box-primary-shadow x-box-cards">
                <div class="card-body card-taps">
                    <a href="#"></a>
                    <div class="d-flex">
                        <div class="text-white">
                            <h2 class="mb-0 number-font">{{$countProjects}}</h2>
                            <p class="mb-0 number-font custom-number">عدد المشاريع</p>
                            <div class="progress h-2" style="margin-top:20px">
                                <div class="progress-bar w-50" role="progressbar"
                                     style="background-color: #24dcc2"></div>
                            </div>
                        </div>
                        <div class="ml-auto custom-icon"> <i
                                class="fe fe-users text-white fs-30 mr-2 mt-2"
                                style="transform: translateY(32px);font-size: 24px !important;display: block"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div><!-- COL END -->
    </div>

    <!-- ROW-2 OPEN -->
    <div class="row">
        <div class="" style="display: none">
            <div class="card overflow-hidden bg-white work-progress">
                <canvas id="deals" class="chart-dropshadow-success"></canvas>
            </div>
        </div><!-- COL END -->
        <!-- COL END -->
    </div>
    <!-- ROW-2 CLOSED -->

    <!-- ROW-3 CLOSED -->
    <div class="row">
        <div class="col-md-12 col-lg-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">بيانات الطلبات</h3>
                </div>
                <div class="card-body">
                    <div class="row">

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

                                <th class="wd-15p">الرقم</th>
                                <th class="wd-15p">المستخدم</th>
                                <th class="wd-15p">الخدمة المطلوبة</th>

                                <th class="wd-10p">السعر</th>
                                {{-- <th class="wd-10p">At</th> --}}
                                <th class="wd-10p">طريقة الدفع</th>


                                <th class="wd-10p">التاريخ</th>
                                <th class="wd-15p">الحالة</th>
                                <th class="wd-10p">الاجرائات</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach ($orders as $order)
                                <tr>
                                    <td> <a href="{{route('order.show',$order->id)}}">{{$order->number}}</a></td>
                                    <td><a href="{{route('orders.user',$order->user->id)}}">{{$order->user()->first()->name}}</a></td>
                                    <td>

                                        @if($order->products()->get() != [])
                                            @foreach ($order->products()->get() as $product)
                                                <div class="row m-2"
                                                     style="font-weight: bold;">
                                                    <p class="col-6">
                                                        {{$product->name}}
                                                    </p>
                                                    <img width="50" src="{{asset('images/'.explode(',',$product->images)[0])}}">

                                                </div>
                                            @endforeach
                                        @endif
                                    </td>
                                    <td> {{number_format($order->total,2)}} OMR </td>
                                    {{-- <td>{{$order->timeLater}}</td> --}}
                                    <td>{{ucwords($order->payment_type)}}</td>


                                    <td>
                                        @php
                                            $date = DateTime::createFromFormat("Y-m-d H:i:s",$order->created_at)->format('Y-m-d');
                                            $hour = DateTime::createFromFormat("Y-m-d H:i:s",$order->created_at)->format('h:i A')
                                        @endphp
                                        {{$hour}}
                                        <br>
                                        {!!
                                           $date

                                        !!}
                                    </td>
                                    <td class="row border-0 justify-content-center" style="min-width:11rem;">
                                        <div class="col-12">{{ucwords($order->status)}}</div>
                                        <br>
                                        <form class="col-3" id="order-complete"
                                              action="{{ route('order.statuscomplete',$order->id) }}"
                                              method="POST" class="d-none">
                                            @csrf
                                            <button type="submit" class="btn btn-icon  btn-success"><i
                                                    class="side-menu__icon fa fa-check"></i></button>
                                        </form>
                                        <form class="col-3" id="order-consle"
                                              action="{{ route('order.statusconsle',$order->id) }}"
                                              method="POST" class="d-none">
                                            @csrf
                                            <button type="submit" class="btn btn-icon  btn-danger"><i
                                                    class="side-menu__icon fa fa-remove"></i></button>
                                        </form>

                                    </td>
                                    {{-- <form id="order-update" action="{{ route('order.update',$order->id) }}" method="POST">
                                        @csrf
                                            <select class="form-control select2 custom-select" data-placeholder="Choose one" name="status" >
                                                <option label="Choose one">
                                                </option>
                                                <option @if($order->status == "pending") selected @endif value="pending">Pending</option>
                                                <option @if($order->status == "processing") selected @endif  value="processing">Processing </option>
                                                <option @if($order->status == "shipping") selected @endif  value="shipping">Shipping </option>
                                                <option @if($order->status == "completed") selected @endif value="completed">Completed </option>
                                                <option @if($order->status == "declined") selected @endif value="declined">Declined  </option>

                                            </select>

                                    </form> --}}
                                    {{-- @if($order->status != 'completed' && $order->status != 'declined')
                                    <div href="#" class="btn btn-warning btn-sm">{{$order->status}}</div>
                                    @endif
                                    @if($order->status == 'completed')
                                    <div href="#" class="btn btn-success btn-sm">{{$order->status}}</div>
                                    @endif
                                    @if($order->status == 'declined')
                                    <div href="#" class="btn btn-danger btn-sm">{{$order->status}}</div>
                                    @endif --}}
                                    </td>

                                    <td>

                                        <form id="order-delete" action="{{ route('order.delete',$order->id) }}"
                                              method="POST">
                                            @csrf
                                            <button type="submit" class="btn btn-sm btn-danger"><i
                                                    class="fa fa-trash"></i> Delete
                                            </button>
                                        </form>


                                    </td>

                                </tr>
                            @endforeach

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

    </div>
    <!-- CONTAINER CLOSED -->
    </div>

    <!-- SIDE-BAR -->
    <div class="sidebar sidebar-right sidebar-animate">
        <div class="p-4 border-bottom">
            <span class="fs-17">Notifications</span>
            <a href="#" class="sidebar-icon text-right float-right" data-toggle="sidebar-right"
               data-target=".sidebar-right"><i class="fe fe-x"></i></a>
        </div>
        <div class="list d-flex align-items-center border-bottom p-4">
            <div class="">
                <span class="avatar bg-primary brround avatar-md">CH</span>
            </div>
            <div class="wrapper w-100 ml-3">
                <p class="mb-0 d-flex">
                    <b>New Websites is Created</b>
                </p>
                <div class="d-flex justify-content-between align-items-center">
                    <div class="d-flex align-items-center">
                        <i class="mdi mdi-clock text-muted mr-1"></i>
                        <small class="text-muted ml-auto">30 mins ago</small>
                        <p class="mb-0"></p>
                    </div>
                </div>
            </div>
        </div><!-- LIST END -->
        <div class="list d-flex align-items-center border-bottom p-4">
            <div class="">
                <span class="avatar bg-danger brround avatar-md">N</span>
            </div>
            <div class="wrapper w-100 ml-3">
                <p class="mb-0 d-flex">
                    <b>Prepare For the Next Project</b>
                </p>
                <div class="d-flex justify-content-between align-items-center">
                    <div class="d-flex align-items-center">
                        <i class="mdi mdi-clock text-muted mr-1"></i>
                        <small class="text-muted ml-auto">2 hours ago</small>
                        <p class="mb-0"></p>
                    </div>
                </div>
            </div>
        </div><!-- LIST END -->
        <div class="list d-flex align-items-center border-bottom p-4">
            <div class="">
                <span class="avatar bg-info brround avatar-md">S</span>
            </div>
            <div class="wrapper w-100 ml-3">
                <p class="mb-0 d-flex">
                    <b>Decide the live Discussion Time</b>
                </p>
                <div class="d-flex justify-content-between align-items-center">
                    <div class="d-flex align-items-center">
                        <i class="mdi mdi-clock text-muted mr-1"></i>
                        <small class="text-muted ml-auto">3 hours ago</small>
                        <p class="mb-0"></p>
                    </div>
                </div>
            </div>
        </div><!-- LIST END -->
        <div class="list d-flex align-items-center border-bottom p-4">
            <div class="">
                <span class="avatar bg-warning brround avatar-md">K</span>
            </div>
            <div class="wrapper w-100 ml-3">
                <p class="mb-0 d-flex">
                    <b>Team Review meeting</b>
                </p>
                <div class="d-flex justify-content-between align-items-center">
                    <div class="d-flex align-items-center">
                        <i class="mdi mdi-clock text-muted mr-1"></i>
                        <small class="text-muted ml-auto">4 hours ago</small>
                        <p class="mb-0"></p>
                    </div>
                </div>
            </div>
        </div><!-- LIST END -->
        <div class="list d-flex align-items-center border-bottom p-4">
            <div class="">
                <span class="avatar bg-success brround avatar-md">R</span>
            </div>
            <div class="wrapper w-100 ml-3">
                <p class="mb-0 d-flex">
                    <b>Prepare for Presentation</b>
                </p>
                <div class="d-flex justify-content-between align-items-center">
                    <div class="d-flex align-items-center">
                        <i class="mdi mdi-clock text-muted mr-1"></i>
                        <small class="text-muted ml-auto">1 days ago</small>
                        <p class="mb-0"></p>
                    </div>
                </div>
            </div>
        </div><!-- LIST END -->
        <div class="list d-flex align-items-center border-bottom p-4">
            <div class="">
                <span class="avatar bg-pink brround avatar-md">MS</span>
            </div>
            <div class="wrapper w-100 ml-3">
                <p class="mb-0 d-flex">
                    <b>Prepare for Presentation</b>
                </p>
                <div class="d-flex justify-content-between align-items-center">
                    <div class="d-flex align-items-center">
                        <i class="mdi mdi-clock text-muted mr-1"></i>
                        <small class="text-muted ml-auto">1 days ago</small>
                        <p class="mb-0"></p>
                    </div>
                </div>
            </div>
        </div><!-- LIST END -->
        <div class="list d-flex align-items-center border-bottom p-4">
            <div class="">
                <span class="avatar bg-purple brround avatar-md">L</span>
            </div>
            <div class="wrapper w-100 ml-3">
                <p class="mb-0 d-flex">
                    <b>Prepare for Presentation</b>
                </p>
                <div class="d-flex justify-content-between align-items-center">
                    <div class="d-flex align-items-center">
                        <i class="mdi mdi-clock text-muted mr-1"></i>
                        <small class="text-muted ml-auto">1 day ago</small>
                        <p class="mb-0"></p>
                    </div>
                </div>
            </div>
        </div><!-- LIST END -->
        <div class="list d-flex align-items-center border-bottom p-4">
            <div class="">
                <span class="avatar bg-warning brround avatar-md">L</span>
            </div>
            <div class="wrapper w-100 ml-3">
                <p class="mb-0 d-flex">
                    <b>Prepare for Presentation</b>
                </p>
                <div class="d-flex justify-content-between align-items-center">
                    <div class="d-flex align-items-center">
                        <i class="mdi mdi-clock text-muted mr-1"></i>
                        <small class="text-muted ml-auto">1 day ago</small>
                        <p class="mb-0"></p>
                    </div>
                </div>
            </div>
        </div><!-- LIST END -->
        <div class="list d-flex align-items-center p-4">
            <div class="">
                <span class="avatar bg-blue brround avatar-md">U</span>
            </div>
            <div class="wrapper w-100 ml-3">
                <p class="mb-0 d-flex">
                    <b>Prepare for Presentation</b>
                </p>
                <div class="d-flex justify-content-between align-items-center">
                    <div class="d-flex align-items-center">
                        <i class="mdi mdi-clock text-muted mr-1"></i>
                        <small class="text-muted ml-auto">2 days ago</small>
                        <p class="mb-0"></p>
                    </div>
                </div>
            </div>
        </div><!-- LIST END -->
    </div>
    <!-- SIDE-BAR CLOSED -->
@endsection
