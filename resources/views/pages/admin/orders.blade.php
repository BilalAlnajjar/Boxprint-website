@extends('pages.layouts.dashboard')
@section('content')
    <!-- /Top Header Full -->
    <!-- ============== START CONTENT ==============  -->
    <div class="row">
        <div class="card">
            <div class="card-header border-bottom-0 p-4">
                <h2 class="card-title">1 - 30 of 546 </h2>
                <div class="page-options d-flex float-right">

                </div>
            </div>
            <div class="col-md-12 col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">الطلبات</h3>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-4">

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
            <!-- ============== END CONTENT ==============  -->

@endsection
