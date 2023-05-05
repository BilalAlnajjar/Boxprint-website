@extends('pages.layouts.dashboard')
@section('content')
    <!-- ============== START CONTENT ==============  -->
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <form method="POST"  action="{{route('social.update')}}" id="add_to_me">
                    @csrf
                    <div class="card-header">
                        <h3 class="card-title">انشاء وتعديل روابط مواقع التواصل الاجتماعي</h3>
                    </div>
                    @if($socials)
                    @foreach($socials as $social)
                    <div class="card-body">
                        <div class="form-group">
                            <label class="form-label">Link</label>
                            <input type="text" class="form-control" name="links[]" value="{{$social->link}}" placeholder="Enter Link">
                        </div>
                    </div>

                    <div class="card-body">
                        <div class="form-group">
                            <label class="form-label">Icon</label>
                            <input type="text" class="form-control" name="icons[]" value="{{$social->icon}}"
                                   placeholder="Enter icone from : https://fontawesome.com/icons">
                        </div>
                    </div>
                        <input type="hidden" name="ids[]" value="{{$social->id}}">
                    @endforeach
                        @endif
                </form>
                <div class="card-footer text-left">
                    <button type="button" onclick="addCode()" class="btn btn-success mt-1">+</button>
                </div>
            </div>
        </div><!-- COL END -->


        <div class="card-footer">
            <button onclick="clickOnForm()"  class="btn btn-success mt-1">حفظ</button>
        </div>
    </div><!--ROW END-->
    <!-- ============== END CONTENT ==============  -->

    <script>

        function addCode() {
            var clicks = Math.floor((1 + Math.random()) * 0x10000)
                .toString(16)
                .substring(1);
            document.getElementById("add_to_me").innerHTML +=
                '<div id="' + clicks + '">' +
                '<div class="card-body">' +
                '<div class="form-group">' +
                '<label class="form-label">Link</label>' +
                '<input type="text" class="form-control" name="links[]" placeholder="Enter Link">' +
                '</div>' +
                '</div>' +
                '<input type="hidden" name="ids[]">'+
                '<div class="card-body">' +
                '<div class="form-group">' +
                '<label class="form-label">Icon</label>' +
                '<input type="text" class="form-control" name="icons[]" placeholder="Enter icone from : https://fontawesome.com/icons">' +
                '</div>' +
                '</div>' +
                '<button class="btn btn-danger ml-5 mb-4" onClick="removeSocial(this)"><i class="fa fa-trash-o" data-toggle="tooltip" title="" data-original-title="fa fa-trash-o"></i></button>' +
                '</div>' +
                '</div>'

        }

        function removeSocial(tag) {
            console.log(tag)

            tag.parentElement.remove()
        }

        function clickOnForm(){
            document.getElementById('add_to_me').submit()
        }
    </script>

@endsection
