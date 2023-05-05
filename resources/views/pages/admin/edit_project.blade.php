@extends('pages.layouts.dashboard')
@section('content')

    <form action="{{route('project.update',$project)}}" method="POST" enctype="multipart/form-data">
        @csrf
        <input type="hidden" name="_method" value="PUT">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">تعديل المشروع</h3>
                    </div>
                    <div class="card-body">
                        <div class="form-group">
                            <label class="form-label">عنوان المشروع</label>
                            <input type="text" class="form-control" name="title" placeholder="ادخل عنوان المشروع" value="{{$project->title}}">
                            @error('title')
                            <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label class="form-label">سعر المشروع <small class="text-danger">(اختياري)</small></label>
                            <input type="text" class="form-control" id="price" name="price" value="{{$project->price}}"
                                   placeholder="ادخل سعر المشروع بالريال العماني">
                            @error('price')
                            <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="form-group row text-center">
                            @foreach(explode(',',$project->images) as $image)
                            <img src="{{asset('images/'.$image)}}" class="image-box col-3" width="60">
                            @endforeach
                        </div>

                        <div class="col-lg-12">
                            <div class="card shadow">
                                <div class="card-header">
                                    <h3 class="mb-0 card-title">تحميل صور المشروع</h3>
                                </div>
                                <div class="card-body">
                                    <input type="file" class="dropify" name="images[]" id="image" data-max-file-size="1M" multiple/>
                                </div>
                            </div>
                        </div><!-- COL END -->
                        @error('image')
                        <p class="text-danger">{{ $message }}</p>
                        @enderror

                    </div>
                </div>
            </div>
        </div>


        <div class="btn-list text-center">
            <button type="submit" class="btn btn-primary">حفظ</button>
            <a href="#" class="btn btn-danger">الغاء</a>
        </div>
        <div class="btn-list text-center">
        </div>

    </form>
    <!--ROW END-->
    <!-- ============== END CONTENT ==============  -->
@endsection
