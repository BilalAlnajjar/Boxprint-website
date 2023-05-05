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

    <ul class="list-group" id="element">
        @if($categories->count() != 0)
            @foreach($categories as $item)
                <li id="item_{{$item->id}}" class="list-group-item">
                    <img src="{{asset('storage/'.$item->image)}}" style="width: 20px;height: 20px;border-radius: 100%;">
                    {{$item->name}}
                    <label class="custom-switch">
                        <input type="checkbox"
                               value="{{$item->id}}"
                               {{$item->status == 'active' ? "checked" : ""}}
                               class="custom-switch-input active_home">
                        <span class="custom-switch-indicator"></span> <span
                                class="custom-switch-description" id="msg_{{$item->id}}"></span>
                    </label>
                </li>
            @endforeach
        @endif
    </ul>
    <script type="text/javascript">
        $(document).ready(function () {

            $(".active_home").click(function () {
                var v = $(this).val();
                $.ajax({
                    data: {
                        "id": v,
                    },
                    type: 'GET',
                    url: '{{route('category.active_home')}}',
                    success: function (result) {
                        if (result.success != null) {
                            toastr.success(result.success);

                        } else {
                            toastr.error(result.error);

                        }
                    }
                });
            });

            $('#element').sortable({
                axis: 'y',
                update: function (event, ui) {
                    var data = $(this).sortable('serialize');
                    $.ajax({
                        data: data,
                        type: 'GET',
                        url: '{{route('category.sorte')}}',
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

