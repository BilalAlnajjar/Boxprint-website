@extends('pages.layouts.dashboard')
@section('content')
    <form class="w-100" method="POST" action="{{route('slide.store')}}" enctype="multipart/form-data">
        @csrf
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">اضافة شريحة جديدة</h3>
                    </div>
                    <div class="card-body">


                        <div class="form-group">
                            <label class="form-label">عنوان الشريحة <small class="text-danger">(اختياري)</small></label>
                            <input type="text" class="form-control" id="title" name="title"
                                   placeholder="ادخل عنوان الشريحة">
                            @error('title')
                            <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label class="form-label"> وصف الشريحة <small class="text-danger">(اختياري)</small></label>
                            <textarea class="content" name="description">
                            </textarea>
                            @error('description')
                            <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="col-lg-12">
                            <div class="card shadow">
                                <div class="card-header">
                                    <h3 class="mb-0 card-title">صورة الشريحة</h3>
                                </div>
                                <div class="card-body">
                                    <div class="dropify-wrapper" style="height: 312px;">
                                        <div class="dropify-message"><span class="file-icon"></span>
                                            <p>Drag and drop a file here or click</p>
                                            <p class="dropify-error">Ooops, something wrong appended.</p>
                                        </div>
                                        <div class="dropify-loader"></div>
                                        <div class="dropify-errors-container">
                                            <ul></ul>
                                        </div>
                                        <input type="file" class="dropify" data-height="300" name="image" id="image">
                                        <button type="button"
                                                class="dropify-clear">حذف
                                        </button>
                                        <div class="dropify-preview"><span class="dropify-render"></span>
                                            <div class="dropify-infos">
                                                <div class="dropify-infos-inner">
                                                    <p class="dropify-filename"><span
                                                                class="dropify-filename-inner"></span></p>
                                                    <p class="dropify-infos-message">Drag and drop or click to
                                                        replace</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div><!-- COL END -->
            @error('image')
            <p class="text-danger">{{ $message }}</p>
            @enderror
            <div class="card text-center">
                <div class="card-body">
                    <input type="submit" class="btn btn-success mt-2" value="حفظ" id="click">
                    <a href="{{route('slide.index')}}" class="btn btn-danger mt-2">اغلاق</a>
                </div>
            </div>
        </div>

    </form>

    <!-- CONTAINER END -->
@endsection
