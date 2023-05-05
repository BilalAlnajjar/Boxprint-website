@extends('pages.layouts.dashboard')
@section('content')
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
                        <h3 class="card-title">Data Site</h3>
                    </div>
                    <div class="btn-list">
                        <a href="{{route('general.create')}}">
                            <button
                            class="btn btn-primary"><i class="fe fe-plus mr-2"></i>SAVE Product</button></a>
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

                                        <th class="wd-15p">Name</th>
                                        <th class="wd-15p">Footer</th>
                                        <th class="wd-15p">LOGO</th>
                                        <th class="wd-15p">Fivicon</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @if($web)

                                        <tr>
                                            <td>{{$web->name}}</td>
                                            <td>
                                                {{$web->footer}}
                                            </td>
                                            <td><img width="100" src="{{asset('images/'.$web->logo)}}" alt=""></td>
                                            <td>
                                                <img width="100" src="{{asset('images/'.$web->fivicon)}}" alt="">
                                            </td>
                                        </tr>

                                    @endif

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
