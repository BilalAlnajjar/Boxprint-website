@extends('pages.layouts.dashboard')
@section( 'content')
    <form @if($item) action="{{route('element.update',$item->id)}}"
          @endif @if(!$item) action="{{route('element.store')}}" @endif method="POST" enctype="multipart/form-data">
        @csrf
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    {{-- <div class="card-header">
                        <h3 class="card-title"></h3>
                    </div> --}}
                    <div class="card-body">

                        <div class="form-group">
                            <label class="form-label">Elements</label>
                            <textarea class="content" name="item">
                                        @if($item)
                                    {!! $item->item !!}
                                @endif
                                    </textarea>
                            @error('item')
                            <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>


                    </div>
                </div>


                <div class="card-footer">
                    <button type="submit" class="btn btn-success mt-1">SAVE</button>
                </div>
            </div><!--ROW END-->
            <!-- ============== END CONTENT ==============  -->
    </form>
@endsection
