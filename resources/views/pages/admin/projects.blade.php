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
                    <div class="btn-list">
                        <a href="{{route('project.create')}}">
                            <button class="btn btn-primary"><i class="fe fe-plus mr-2"></i>اضافة مشروع جديد</button>
                        </a>
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
                                    <th class="wd-15p">عنوان المشروع</th>
                                    {{-- <th class="wd-15p">Product Info</th> --}}
                                    <th class="wd-15p">سعر المشروع</th>
                                    <th class="wd-25p">صور المشروع</th>
                                    <th class="wd-10p">الاجراءات</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach ($projects as $project)

                                    <tr>
                                        <td>{{$project->id}}</td>
                                        <td>{{$project->title}}</td>
                                        <td>£{{number_format($project->price,2)}}</td>
                                        <td class="d-flex">
                                            @foreach(explode(',',$project->images) as $image)
                                                <img src="{{asset('images/'.$image)}}" width="40">
                                            @endforeach
                                        </td>

                                        <td>
                                            <form action="{{route('project.destroy',$project)}}" method="POST"
                                                  enctype="multipart/form-data">
                                                @csrf
                                                <input type="hidden" name="_method" value="DELETE">
                                                <a class="btn btn-sm btn-primary"
                                                   href="{{route('project.edit',$project)}}"><i
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
@endsection
