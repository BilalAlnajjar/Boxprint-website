@extends('pages.layouts.dashboard')
@section('content')

    <form @if($about_us) action="{{route('about_us.update',$about_us->id)}}"  @else action="{{route('about_us.store')}}" @endif method="POST" enctype="multipart/form-data">
        @csrf

        @if($about_us)
        <input type="hidden" name="_method" value="PUT">
        @endif
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title font-weight-bold">قسم حولنا</h3>
                    </div>
                    <div class="card-body">
                        <div class="card">
                            <div class="card-header row align-items-center">
                                    <h3 class="card-title col-11 font-weight-bold mr-5">من نحن </h3>
                                    <i class="ion-compose" style="font-size: 24px"></i>
                            </div>
                            <div class="card-body">
                                <div class="form-group">
                                    <label class="form-label">العنوان <small
                                            class="text-danger">(اختياري)</small></label>
                                    <input type="text" class="form-control" name="title_who_are"
                                           placeholder="ادخل عنوان للقسم" @if($about_us) value="{{$about_us->title_who_are}}" @endif />
                                    @error('title_who_are')
                                    <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label class="form-label"> الوصف  <small class="text-danger">(اختياري)</small></label>
                                    <textarea class="content" name="description_who_are">
                                        @if($about_us) {!! $about_us->description_who_are  !!} @endif
                                    </textarea>
                                    @error('description_who_are')
                                    <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>

                                @if($about_us)
                                <div class="col-lg-12 row">
                                    <img class="col-4 mx-auto" src="{{asset(storage_path($about_us->image_who_are))}}" alt="">
                                </div>
                                @endif

                                <div class="col-lg-12">
                                    <div class="card shadow">
                                        <div class="card-header">
                                            <h3 class="mb-0 card-title">تحميل الصورة</h3>
                                        </div>
                                        <div class="card-body">
                                            <input type="file" class="dropify" name="imageAboutUs" data-height="300"/>
                                        </div>
                                    </div>
                                </div><!-- COL END -->
                                @error('imageAboutUs')
                                <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>
                        <div class="card">
                            <div class="card-header row align-content-center">
                                <h3 class="card-title col-11 font-weight-bold mr-5">رؤيتنا</h3>
                                <i class="ion-eye" style="font-size: 24px"></i>
                            </div>
                            <div class="card-body">
                                <div class="form-group">
                                    <label class="form-label">العنوان <small
                                            class="text-danger">(اختياري)</small></label>
                                    <input type="text" class="form-control" name="title_our_vision" @if($about_us) value="{{$about_us->title_our_vision}}" @endif
                                           placeholder="ادخل عنوان للقسم">
                                    @error('title_our_vision')
                                    <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label class="form-label"> الوصف  <small class="text-danger">(اختياري)</small></label>
                                    <textarea class="content2" name="description_our_vision">
                                          @if($about_us) {!! $about_us->description_our_vision !!} @endif
                                    </textarea>
                                    @error('description_our_vision')
                                    <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>

                                @if($about_us)
                                <div class="col-12 row">
                                    <img class="col-4 mx-auto" src="{{asset(storage_path($about_us->image_our_vision))}}" alt="">
                                </div>
                                @endif
                                <div class="col-lg-12">
                                    <div class="card shadow">
                                        <div class="card-header">
                                            <h3 class="mb-0 card-title">تحميل الصورة</h3>
                                        </div>
                                        <div class="card-body">
                                            <input type="file" class="dropify" name="imageOurVision" data-height="300"/>
                                        </div>
                                    </div>
                                </div><!-- COL END -->
                                @error('imageOurVision')
                                <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>
                        <div class="card">
                            <div class="card-header row align-items-center">
                                <h3 class="card-title col-11 font-weight-bold mr-5">رسالتنا</h3>
                                <i class="icon icon-paper-plane" style="font-size: 24px"></i>
                            </div>
                            <div class="card-body">
                                <div class="form-group">
                                    <label class="form-label">العنوان <small
                                            class="text-danger">(اختياري)</small></label>
                                    <input type="text" class="form-control" name="title_our_message"
                                           placeholder="ادخل عنوان للقسم" @if($about_us) value="{{$about_us->title_our_message}}" @endif>
                                    @error('title_our_message')
                                    <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label class="form-label"> الوصف  <small class="text-danger">(اختياري)</small></label>
                                    <textarea class="content3" name="description_our_message" >
                                        @if($about_us) {!! $about_us->description_our_message !!} @endif
                                    </textarea>
                                    @error('description_our_message')
                                    <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>

                                @if($about_us)
                                <div class="col-lg-12 row">
                                    <img class="col-4 mx-auto" src="{{asset(storage_path($about_us->image_our_message))}}" alt="">
                                </div>
                                @endif

                                <div class="col-lg-12">
                                    <div class="card shadow">
                                        <div class="card-header">
                                            <h3 class="mb-0 card-title">تحميل الصورة</h3>
                                        </div>
                                        <div class="card-body">
                                            <input type="file" class="dropify" name="imageOurMessage" data-height="300"/>
                                        </div>
                                    </div>
                                </div><!-- COL END -->
                                @error('imageOurMessage')
                                <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>
                    </div>
                </div>
            </div><!-- COL END -->

            <div class="card-footer">
            </div>
        </div>
        <div class="btn-list text-center">
            <button type="submit" class="btn btn-primary">حفظ</button>
            <a href="#" class="btn btn-danger">الغاء</a>

        </div>
    </form>

@endsection
