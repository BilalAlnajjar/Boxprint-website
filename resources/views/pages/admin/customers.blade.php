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
                                    <th class="wd-15p">الرقم</th>
                                    {{-- <th class="wd-15p">Product Picture</th> --}}
                                    <th class="wd-15p">اسم المستخدم</th>
                                    {{--                                    <th class="wd-15p">Surename</th>--}}
                                    {{-- <th class="wd-15p">Product Info</th> --}}
                                    {{--                                    <th class="wd-25p">Phone</th>--}}
                                    <th class="wd-25p">الايميل</th>
                                    <th class="wd-25p">نوع المستخدم</th>
                                    {{--                                    <th class="wd-25p">Street</th>--}}
                                    <th class="wd-25p">الدولة</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach ($users as $user)
                                    <tr>
                                        <td>{{$user->id}}</td>
                                        {{-- <td><img src="{{asset($product->image)}}" width="40"></td> --}}
                                        <td>
                                            {{--                                            <a href="{{route('orders.customer',$user->id)}}"> {{$user->name}}</a>--}}
                                            <a href="#"> {{$user->name}}</a>
                                        </td>
                                        {{-- <td>{{$product->description}}</td> --}}
                                        {{--                                        <td>{{$user->surename}}</td>--}}
                                        {{--                                        <td>{{$user->mobile}}</td>--}}
                                        <td>{{$user->email}}</td>
                                        <td>
                                            <form action="{{route('user.change_type',$user->id)}}" method="POST"
                                                  id="formChangeType{{$user->id}}">
                                                @csrf
                                                <select onchange="submitForm({{$user->id}})" name="type"
                                                        class="form-control select2 custom-select"
                                                        data-placeholder="Choose one" tabindex="-1" aria-hidden="true">
                                                    <option @if($user->type == 'user') selected @endif value="user">
                                                        مستخدم
                                                    </option>
                                                    <option @if($user->type == 'admin') selected @endif value="admin">
                                                        مدير
                                                    </option>
                                                </select>
                                            </form>
                                        </td>
                                        {{--                                        <td>{{$user->street}}</td>--}}
                                        <td>{{$user->country}}</td>


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

        <script>
            function submitForm(id) {
                $("#formChangeType"+id).submit();
            }
        </script>
        <!-- ROW-1 CLOSED -->
@endsection
