@extends('pages.layouts.dashboard')
@section('content')

    <!-- ============== START CONTENT ==============  -->
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <div class="clearfix">

                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-lg-12 text-right">
                            <p class="h3">عرض الرسالة</p>
                            <address>
                                {{$message->name}} : <strong>اسم المرسل</strong><br>
                                <hr>
                                {{$message->email}} : <strong>الايميل</strong><br>
                                <hr>
                                {{$message->phone}} : <strong>رقم الهاتق</strong><br>
                                <hr>
                                2021-01-25 10:30 PM : <strong>تاريخ الارسال</strong><br>
                                <hr>
                                <strong>نص الرسالة</strong>:<br><br>
                                {{$message->text}}
                            </address>
                        </div>


                    </div>
                </div>
                <div class="card-footer text-right">
                    <a type="button" class="btn btn-danger mb-1" href="#" ><i
                            class="si si-printer"></i> Delete
                    </a>
                </div>
            </div>
        </div><!-- COL-END -->
    </div>
    <!-- ROW-1 CLOSED -->
    <!-- ============== END CONTENT ==============  -->
@endsection
