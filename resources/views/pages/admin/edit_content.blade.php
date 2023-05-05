@extends('pages.layouts.dashboard')
@section('content')
    <form action="{{route('step.update',$step->id)}}" method="POSt" enctype="multipart/form-data">
        @csrf
        <input type="hidden" name="_method" value="PUT">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Edit</h3>
                    </div>
                    <div class="card-body">
                        <div class="form-group">
                            <label class="form-label">Title Section</label>
                            <input type="text" class="form-control" name="title" placeholder="Enter Title Section"
                                   value="{{$step->title}}">
                        </div>
                        @error('title')
                        <p class="text-danger">{{ $message }}</p>
                        @enderror
                        <div class="form-group">
                            <textarea class="content" name="description">{{$step->description}}</textarea>
                        </div>
                        @error('description')
                        <p class="text-danger">{{ $message }}</p>
                        @enderror

                        <div class="col-md-6">
                            <img src="{{asset('images/'.$step->image)}}">
                        </div>
                        <div class="col-lg-12">
                            <div class="card shadow">
                                <div class="card-header">
                                    <h3 class="mb-0 card-title">Upload Image</h3>
                                </div>
                                <div class="card-body">
                                    <input type="file" class="dropify" name="image" data-height="300"/>
                                </div>
                            </div>
                        </div><!-- COL END -->

                    </div>
                </div>
            </div><!-- COL END -->
            @error('image')
            <p class="text-danger">{{ $message }}</p>
            @enderror

            <div class="card-footer">
            </div>
        </div>
        <div class="btn-list text-center">
            <button type="submit" class="btn btn-primary">Save</button>
            <a href="#" class="btn btn-danger">Cancel</a>

        </div>
    </form>

@endsection
