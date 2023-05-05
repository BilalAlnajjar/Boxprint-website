@extends('pages.layouts.dashboard')
@section('content')

    <div class="card">
        <form @if($video) action="{{route('video.update')}}" @endif @if(!$video) action="{{route('video.store')}}"
              @endif  method="POST" enctype="multipart/form-data">
            @csrf
            <div class="card-header d-flex justify-content-between">
                <h3 class="mb-0 card-title">Video</h3>
                <button type="submit" class="btn btn-info text-white"><i class="fa fa-plus-circle mr-2"></i>Save
                </button>

            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label class="form-label">Video Link</label>
                            <input type="text" id="link" class="form-control" name="link" placeholder="Video Link"
                                   @if($video) value="{{$video->link}}" @endif>
                            @error('link')
                            <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>

                </div>

                @if($video)

                    <div class="col-lg-6">
                        <img src="{{asset($video->image)}}" alt="">
                    </div>

                @endif

                <div class="col-lg-12">
                    <div class="card shadow">
                        <div class="card-header">
                            <h3 class="mb-0 card-title">Upload Sub Category image</h3>
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
        </form>
    </div>

@endsection
