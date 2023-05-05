@extends('pages.layouts.dashboard')
@section('content')

    <!-- ============== START CONTENT ==============  -->
    <div class="row">
        <div class="col-md-12">
            <form method="POST" @if ($general) action="{{route('general.update')}}"
                  @endif @if (!$general) action="{{route('general.store')}}" @endif enctype="multipart/form-data">
                @csrf
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">الاعدادات العامة للموقع</h3>
                    </div>
                    <div class="card-body">
                        <div class="form-group">
                            <label class="form-label">اسم الموقع</label>
                            <input type="text" class="form-control" name="name" placeholder="اسم الموقع"
                                   @if($general) value="{{$general->name}}" @endif>
                        </div>

                        <div class="form-group">
                            <label class="form-label">العنوان</label>
                            <input type="text" class="form-control" name="address" placeholder="العنوان"
                                   @if($general) value="{{$general->address}}" @endif>
                        </div>

                        <div class="form-group">
                            <label class="form-label">وصف الموقع</label>
                            <textarea name="description" class="form-control" id="exampleFormControlTextarea1" rows="3"
                                      placeholder="Enter Footer Text ...">  @if($general)
                                    {{$general->description}}
                                @endif</textarea>
                        </div>
                        <div class="form-group">
                            <label class="form-label">وصف الموقع في الفوتر</label>
                            <textarea name="footer_text" class="form-control" id="exampleFormControlTextarea1" rows="3"
                                      placeholder="وصف الموقع في الفوتر">  @if($general)
                                    {{$general->footer_text}}
                                @endif</textarea>
                        </div>

                        <div class="form-group">
                            <label class="form-label">الهاتف</label>
                            <input type="tel" class="form-control" name="phone" placeholder="رقم الهاتف"
                                   @if($general) value="{{$general->phone}}" @endif>
                        </div>

                        <div class="form-group">
                            <label class="form-label">الايميل</label>
                            <input type="email" class="form-control" name="email" placeholder="الايميل"
                                   @if($general) value="{{$general->email}}" @endif>
                        </div>
                        <div class="form-group">
                            <label class="form-label">خط الطول للعنوان</label>
                            <input type="text" class="form-control" name="loc_Lat" placeholder="خط الطول"
                                   @if($general) value="{{$general->loc_Lat}}" @endif>
                        </div>
                        <div class="form-group">
                            <label class="form-label">خط العرض للعنوان</label>
                            <input type="text" class="form-control" name="loc_long" placeholder="خط العرض"
                                   @if($general) value="{{$general->loc_long}}" @endif>
                        </div>

                        {{--                        <div class="form-group">--}}
                        {{--                            <label class="form-label">Delivery Price</label>--}}
                        {{--                            <input type="text" class="form-control" name="delivery_price" placeholder="Price"--}}
                        {{--                                   @if($general) value="{{$general->delivery_price}}" @endif>--}}
                        {{--                        </div>--}}

                        <div class="row">
                            @if($general)
                                <div class="col-lg-6">
                                    <img src="{{asset('images/'.$general->logo_header)}}" alt="">
                                </div>
                                <div class="col-lg-6">
                                    <img src="{{asset('images/'.$general->logo_footer)}}" alt="">
                                </div>
                            @endif
                            <div class="col-lg-6">
                                <div class="card shadow">
                                    <div class="card-header">
                                        <h3 class="mb-0 card-title">تحميل لوقو الموقع </h3>
                                    </div>
                                    <div class="card-body">
                                        <input type="file" name="logo_header" class="dropify" data-height="300"/>
                                    </div>
                                </div>
                            </div>
                                <div class="col-lg-6">
                                <div class="card shadow">
                                    <div class="card-header">
                                        <h3 class="mb-0 card-title">تحميل لوقو الفوتر</h3>
                                    </div>
                                    <div class="card-body">
                                        <input type="file" name="logo_footer" class="dropify" data-height="300"/>
                                    </div>
                                </div>
                                </div>

                                @if($general)
                                    <div class="col-lg-12">
                                        <img src="{{asset('images/'.$general->favicon)}}" alt="">
                                    </div>
                                @endif
                           <!-- COL END -->
                            <div class="col-lg-12">
                                <div class="card shadow">
                                    <div class="card-header">
                                        <h3 class="mb-0 card-title">تحميل ايقونة الموقع</h3>
                                    </div>
                                    <div class="card-body">
                                        <input type="file" name="favicon" class="dropify" data-height="300"/>
                                    </div>
                                </div>
                            </div><!-- COL END -->
                        </div>
                    </div>
                </div>
                <button type="submit" class="btn btn-success mt-1">Save</button>
            </form>
        </div><!-- COL END -->
        <div class="card-footer">

        </div>
    </div><!--ROW END-->
    <!-- ============== END CONTENT ==============  -->

@endsection
