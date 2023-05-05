@extends('pages.layouts.dashboard')

@section('content')

    {{-- <style>
        #list-group { list-style-type: none; margin: 0; padding: 0; width: 60%; }
        #list-group li { margin: 0 3px 3px 3px; padding: 0.4em; padding-left: 1.5em; font-size: 1.4em; height: 18px; }
        #list-group li span { position: absolute; margin-left: -1.3em; }
        </style> --}}
    <script>
        $(function () {
            $("#element").sortable();
            $("#element").disableSelection();
        });
    </script>

    <div class="card">
        <form class=" p-4 row" style="min-width: 100px;" method="POST" action="{{route('product_status')}}"
              enctype="multipart/form-data">
            @csrf
            <select class="col-4 form-control select2 custom-select" data-placeholder="Choose one" name="category_id">
                @foreach ($categories as $item)
                    <option @if($category->id == $item->id) selected
                            @endif value="{{$item->id}}">{{$item->name}}</option>
                @endforeach
            </select>

            <button type="submit" class="btn btn-primary ml-3">Products</button>
        </form>
        <ul class="list-group" id="element">
            @if($products->count() != 0)
                @foreach($products as $item)
                    <li id="item_{{$item->id}}" class="list-group-item">
                        <img src="{{asset('storage/'.$item->image)}}" style="width: 20px;height: 20px;border-radius: 100%;">
                        {{$item->name}}
                        {{-- <label class="custom-switch">
                            <input type="checkbox"
                                   value="{{$item->id}}"
                                   {{$item->status == 'Active' ? "checked" : ""}}
                                   class="custom-switch-input active_home">
                            <span class="custom-switch-indicator"></span> <span
                                    class="custom-switch-description" id="msg_{{$item->id}}"></span>
                        </label> --}}
                    </li>
                @endforeach
            @endif
        </ul>
    </div>
    <script type="text/javascript">
        $(document).ready(function () {
            $('#element').sortable({
                axis: 'y',
                update: function (event, ui) {
                    var data = $(this).sortable('serialize');
                    $.ajax({
                        data: data,
                        type: 'GET',
                        url: '{{route('product.sorte')}}',
                        success: function (result) {
                            if (result.success != null) {
                                toastr.success(result.success);
                            } else {
                                toastr.error(result.error);
                            }
                        }
                    });
                }
            });

        });
    </script>

@endsection

