@extends('pages.layouts.user')
@section('content')
    <link href="{{asset('css/new-style.css')}}" rel="stylesheet">

    <div class="mt-4" id="header-page">
        <div class="container">
            <h2>تواصل معنا</h2>
            <a href="{{route('home')}}">الرئيسية</a> / تواصل معنا
        </div>
    </div>
    <section class="main-bg">
        <iframe

            src="https://maps.google.com/maps?q={{$general_setting_contactUs ? $general_setting_contactUs->loc_Lat  : null }},{{$general_setting_contactUs ? $general_setting_contactUs->loc_long  : null }}&amp;ie=UTF8&amp;t=&amp;z=14&amp;iwloc=B&amp;output=embed"
            width="100%" height="600" frameborder="0" style="border:0" allowfullscreen></iframe>
        <div class="container py-5">
            <div class="row">
                <div class="col-md-4 mb-3">
                    <div class="form-title mb-5">
                        <h2>معلومات الاتصال</h2>
                    </div>
                    <div class="form-group">
                        <i class="fas fa-map-marker-alt"></i>
                        <span>العنوان</span>
                        <div class="m-3">{{$general_setting_contactUs ? $general_setting_contactUs->address : ""}}</div>
                    </div>
                    <div class="form-group">
                        <i class="fas fa-phone"></i>
                        <span>الهاتف</span>
                        <div class="m-3">{{$general_setting_contactUs ? $general_setting_contactUs->phone : ""}}</div>
                    </div>
                    <div class="form-group">
                        <i class="fa fa-envelope"></i>
                        <span>البريد الإلكتروني</span>
                        <div class="m-3">{{$general_setting_contactUs ? $general_setting_contactUs->email : ""}}</div>
                    </div>
                </div>
                <div class="col-md-8 mb-3 ">
                    <div class="form-title mb-5">
                        <h2>تواصل معنا</h2>
                    </div>
                    <form class="form-horizontal" action="{{route('message.store')}}" method="post">
                        @csrf
                        {{--            <input type="hidden" name="_token" value="3efICprZN9FkbUXuLwimOo2pk99Y4WRITjlwcP5Y">--}}
                        <div class="form-group">
                            <input type="text" name="name" class="form-control " placeholder="الإسم">
                        </div>
                        <div class="form-group">
                            <input type="Email" name="email" class="form-control " placeholder="البريد الإلكتروني">
                        </div>
                        <div class="form-group">
                            <input type="text" name="phone" class="form-control " placeholder="رقم الهاتف">
                        </div>
                        <div class="form-group">
              <textarea cols="10" rows="10" name="text" class="form-control  w-100 h-auto"
                        placeholder="رسالة"></textarea>
                        </div>
                        <div class="form-group mt-3 text-center">
                            <button type="submit" class="btn btn-dark">ارسال</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>

@endsection



