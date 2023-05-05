@extends('pages.layouts.dashboard')
@section('content')

    <div class="card">
        <form @if($work_hour) action="{{route('hour.update')}}" @endif @if(!$work_hour) action="{{route('hour.store')}}"
              @endif method="POST" enctype="multipart/form-data">
            @csrf
            <div class="card-header d-flex justify-content-between">
                <h3 class="mb-0 card-title">Add Work Hours</h3>
                <button type="submit" class="btn btn-info text-white"><i class="fa fa-plus-circle mr-2"></i>Save
                </button>

            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="form-label">From</label>
                            <input type="time" id="from" name="from"
                                   style="width:80%" @if($work_hour) value="{{$work_hour->from}}" @endif>
                            @error('from')
                            <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="form-label">To</label>
                            <input type="time" id="to" name="to"
                                   style="width:80%" @if($work_hour) value="{{$work_hour->to}}" @endif>
                            @error('to')
                            <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>

                </div>
            </div>
        </form>
    </div>

@endsection
