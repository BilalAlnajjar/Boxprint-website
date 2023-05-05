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
                        <h3 class="card-title">الفئات</h3>
                    </div>
                    <div class="btn-list">
                        <a href="{{route('category.create')}}">
                            <button class="btn btn-primary"><i class="fe fe-plus mr-2"></i>انشاء فئة جديدة</button></a>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="example" class="table table-striped table-bordered text-nowrap w-100">
                                <thead>
                                <tr>
                                    <th class="wd-15p">الرقم</th>
                                    <th class="wd-15p">صورة الفئة</th>
                                    <th class="wd-15p">عنوان الفئة</th>
                                    <th class="wd-15p">وصف الفئة</th>
                                    <th class="wd-25p">حالة الفئة</th>
                                    <th class="wd-10p">الاعدادات</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach ($categories as $category)

                                    <tr>
                                        <td>{{$category->id}}</td>
                                        <td><img width="100" src="{{asset('images/'.$category->image)}}"></td>
                                        <td>{{$category->name}}</td>
                                        <td>{!!$category->sub_title!!}</td>
                                        @php
                                            $arr = explode(' ',$category->name)
                                        @endphp
                                        <td>
                                            <form id="update-category"
                                                  action="{{ route('category.update',$category->id) }}" method="POST">
                                                <input type="hidden" name="_method" value="PUT">
                                                @csrf
                                                <div class="material-switch pull-left">
                                                    <input id="{{$category->id}}"
                                                           @if($category->status == 'active') checked
                                                           @endif name="status" type="checkbox" onchange="event.preventDefault();
                                                    this.form.submit();"/>
                                                    <label for="{{$category->id}}" class="label-success"></label>

                                                </div>
                                            </form>
                                        </td>
                                        <td>
                                            <form action="{{route('category.destroy',$category->id)}}" method="POST"
                                                  enctype="multipart/form-data">
                                                @csrf
                                                <input type="hidden" name="_method" value="DELETE">
                                                <a class="btn btn-sm btn-primary"
                                                   href="{{route('category.edit',$category->id)}}"><i
                                                            class="fa fa-edit"></i> Edit</a>
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
        <!-- ============== END CONTENT ==============  -->

        <script>
            $('#someSwitchOptionSuccess1').change(function () {
                $('#status').val($(this).val());
            })
        </script>

@endsection
