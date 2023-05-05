@extends('pages.layouts.dashboard')
@section('content')
    <!-- ============== START CONTENT ==============  -->
    <form action="{{route('category.update',$category->id)}}" method="POST" enctype="multipart/form-data">
        @csrf
        <input type="hidden" name="_method" value="PUT">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">تعديل فئة</h3>
                    </div>
                    <div class="card-body">
                        <div class="form-group">
                            <label class="form-label">عنوان الفئة</label>
                            <input type="text" class="form-control" name="name"
                                   value="{{$category->name}}" placeholder="Enter Title Category">
                            @error('name')
                            <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label class="form-label">وصف الفئة</label>
                            <textarea class="content" name="sub_title">{!! $category->sub_title !!}</textarea>
                            @error('sub_title')
                            <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>

                    <div class="text-center">
                        <img src="{{asset('images/'.$category->image)}}" width="180">
                    </div>


                    <!-- COL END -->
                    <div class="col-lg-12">
                        <div class="card shadow">
                            <div class="card-header">
                                <h3 class="mb-0 card-title">اعادة تحميل صورة</h3>
                            </div>
                            <div class="card-body">
                                <input type="file" class="dropify" name="image" id="image" data-max-file-size="1M"/>
                            </div>
                        </div>
                    </div><!-- COL END -->

                    @error('image')
                    <p class="text-danger">{{ $message }}</p>
                    @enderror

                </div>
            </div><!-- COL END -->

            <div class="card-footer">
                <button type="submit" class="btn btn-success mt-1">SAVE</button>
            </div>
        </div>
        <form>
            <!--ROW END-->
            <!-- ============== END CONTENT ==============  -->

@endsection
