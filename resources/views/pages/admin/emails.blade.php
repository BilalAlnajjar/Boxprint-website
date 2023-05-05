@extends('pages.layouts.dashboard')
@section('content')
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
                        <h3 class="card-title"></h3>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <div class="filter-custom" style="left: 36%;">
                                <div class="row">
                                    <div class="col-lg-6">

                                    </div>
                                </div>
                            </div>
                            <table id="example" class="table table-striped table-bordered text-nowrap w-100">
                                <thead>
                                <tr>
                                    <th class="wd-15p">ID</th>
                                    {{-- <th class="wd-15p">Product Picture</th> --}}
                                    {{-- <th class="wd-15p">Product Info</th> --}}
                                    <th class="wd-15p">Email</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach ($emails as $email)

                                    <tr>
                                        <td>{{$email->id}}</td>
                                        {{-- <td><img src="{{asset($product->image)}}" width="40"></td> --}}
                                        {{-- <td>{{$product->description}}</td> --}}
                                        <td>£{{$email->email}}</td>

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
@endsection
