@extends('pages.layouts.user')
@section('content')
    <link rel="stylesheet" href="{{asset('css/style.css')}}">

        <!--header-->


        <!--End Header--->

        <div class="mt-4" id="header-page">
            <div class="container">
                <h2>طلب التصميم</h2>
                <a href="{{route('home')}}">الرئيسية</a> / <a href="{{route('store')}}">المنتجات </a> / بروشور
                / طلب التصميم
            </div>
        </div>
        <section class="main-bg ">
            <div class="container">
                <div class="row print-box">
                    <div class="col-12 mb-3">
                        <h2>{{$product->name}} </h2>
                    </div>
                </div><!--row-->
                <form action=" {{route('cart.store')}}" enctype="multipart/form-data" method="post"
                      abineguid="265258F3099F4171878965B9BF29AE61">
                    @csrf
                    <div class="temp-bord p-4">
                        <div class="row">
                            <div class="form-group col-md-6">
                                <label>الشعار/الهوية (إن وجد) - <small>jpg', SVG, RAW, PSD, jpeg,
                                        HEIC,png</small></label>
                                <input type="hidden" name="product_id" value="{{$product->id}}">
                                <input type="hidden" name="design_files_names" id="design_files_names" value="">
                                <div class="box form-control file-path ff_fileupload_dropzone_design_image validate ">
                                    <input type="file" name="image_logo" id="file-1"
                                           onclick="$('.ff_fileupload_dropzone_design_image .ff_fileupload_dropzone').trigger('click')"
                                           class="inputfile inputfile-1 ff_fileupload_hidden">
                                    <div class="ff_fileupload_wrap d-none">
                                        <div class="ff_fileupload_dropzone_wrap">
                                            <button class="ff_fileupload_dropzone" type="button"
                                                    aria-label="تصفح الملفات للرفع"></button>
                                            <div class="ff_fileupload_dropzone_tools"></div>
                                        </div>
                                        <table class="ff_fileupload_uploads"></table>
                                    </div>
                                    <label for="file-1" class="upload-f" width="90%"><i class="fas fa-upload"></i>
                                        <span>تحميل الشعار/الهوية</span></label>
                                    <div class="spinner-border spinner-border-sm text-secondary float-left d-none"
                                         style="font-size: 10px" role="status">
                                        <span class="sr-only">Loading...</span>
                                    </div>
                                </div>
                            </div>
                            <div class="errors  mr-25 mb-2 invalid-color"></div>
                            <div class="form-group col-md-6">
                                <label> محتوى التصميم</label>
                                <div class="box form-control file-path ff_fileupload_dropzone_design_content validate ">
                                    <input type="file" name="image_content" id="file-3"
                                           onclick="$('.ff_fileupload_dropzone_design_content .ff_fileupload_dropzone').trigger('click')"
                                           class="inputfile inputfile-1 ff_fileupload_hidden">
                                    <div class="ff_fileupload_wrap d-none">
                                        <div class="ff_fileupload_dropzone_wrap">
                                            <button class="ff_fileupload_dropzone" type="button"
                                                    aria-label="تصفح الملفات للرفع"></button>
                                            <div class="ff_fileupload_dropzone_tools"></div>
                                        </div>
                                        <table class="ff_fileupload_uploads"></table>
                                    </div>
                                    <label for="file-3" class="upload-f" width="90%"><i class="fas fa-upload"></i>
                                        <span>تحميل محتوى التصميم</span></label>
                                    <div class="spinner-border spinner-border-sm text-secondary float-left d-none"
                                         style="font-size: 10px" role="status">
                                        <span class="sr-only">Loading...</span>
                                    </div>
                                </div>
                            </div>
                            <div class="content_errors  mr-25 mb-2 invalid-color"></div>
                            <div class="form-group col-md-6 required">
                                <label>الإسم</label>
                                <input class="form-control @error('company_name') is-invalid @enderror" name="company_name" value=""
                                       placeholder="اسم الشركة" type="text">
                            </div>
                            @error('company_name')
                            <span class="invalid-feedback mr-25 mb-2" style="display:block" role="alert">
                                    <strong>{{$message}}</strong>
                            </span>
                            @enderror
                            <div class="form-group col-md-6 required">
                                <label>تلفون</label>
                                <input class="form-control  @error('phone') is-invalid @enderror " name="phone" value=""
                                       placeholder="+966 50 00 000" type="text">
                            </div>
                            @error('phone')
                            <span class="invalid-feedback mr-25 mb-2" style="display:block" role="alert">
                                    <strong>{{$message}}</strong>
                            </span>
                            @enderror
                            <div class="form-group col-md-6 ">
                                <label class="pt-2" style="width: 75%;">أدخل المقاس بال cm<sup>2</sup></label>
                                <input class="form-control @error('width') is-invalid @enderror m-1 " name="width" value="" placeholder="العرض" type="text">
                                <input class="form-control @error('height') is-invalid @enderror m-1 " name="height" value="" placeholder="الطول" type="text">

                            </div>

                            @error('width','height')
                            <span class="invalid-feedback mr-25 mb-2" style="display:block" role="alert">
                                    <strong>{{$message}}</strong>
                            </span>
                            @enderror
                            <div class="form-group col-md-6 required">
                                <label>البريد الإلكتروني</label>
                                <input class="form-control @error('email') is-invalid @enderror" placeholder="email.com" name="email"
                                       type="email">
                                <div id="pwm-inline-icon-37270" class="pwm-field-icon"
                                     style="position: absolute !important; width: 18px !important; height: 18px !important; min-height: 0px !important; min-width: 0px !important; z-index: 2147483645 !important; box-shadow: none !important; box-sizing: content-box !important; background: none !important; border: none !important; padding: 0px !important; cursor: pointer !important; outline: none !important; margin-top: 10px; margin-left: -119.037px;">
                                    <svg
                                        style="display: inline-block !important; width: 16px !important; height: 16px !important; fill: rgb(230, 0, 23) !important; margin-top: 0.5px !important; position: absolute !important; top: 0px !important; left: 0px !important;"
                                        viewBox="0 0 40 64">
                                        <g>
                                            <path
                                                d="m20,28.12a33.78,33.78 0 0 1 13.36,2.74a22.18,22.18 0 0 1 0.64,5.32c0,9.43 -5.66,17.81 -14,20.94c-8.34,-3.13 -14,-11.51 -14,-20.94a22.2,22.2 0 0 1 0.64,-5.32a33.78,33.78 0 0 1 13.36,-2.74m0,-28.12c-8.82,0 -14,7.36 -14,16.41l0,5.16c2,-1.2 2,-1.49 5,-2.08l0,-3.08c0,-6.21 2.9,-11.41 8.81,-11.41l0.19,0c6.6,0 9,4.77 9,11.41l0,3.08c3,0.58 3,0.88 5,2.08l0,-5.16c0,-9 -5.18,-16.41 -14,-16.41l0,0zm0,22c-6.39,0 -12.77,0.67 -18.47,4a31.6,31.6 0 0 0 -1.53,9.74c0,13.64 8.52,25 20,28.26c11.48,-3.27 20,-14.63 20,-28.26a31.66,31.66 0 0 0 -1.54,-9.77c-5.69,-3.3 -12.08,-4 -18.47,-4l0,0l0.01,0.03z"></path>
                                            <path
                                                d="m21.23,39.5a2.81,2.81 0 0 0 1.77,-2.59a2.94,2.94 0 0 0 -3,-2.93a3,3 0 0 0 -3,3a2.66,2.66 0 0 0 1.77,2.48l-1.77,4.54l6,0l-1.77,-4.5z"></path>
                                        </g>
                                    </svg>
                                </div>
                            </div>

                            @error('email')
                            <span class="invalid-feedback mr-25 mb-2" style="display:block" role="alert">
                                    <strong>{{$message}}</strong>
                            </span>
                            @enderror

                            <div class="form-group col-md-6">
                                <label>الموقع</label>
                                <input class="form-control @error('website') is-invalid @enderror " value="" style="display:block" name="website" type="text"
                                       placeholder="website.com">
                            </div>

                            @error('website')
                            <span class="invalid-feedback mr-25 mb-2" style="display:block" role="alert">
                                    <strong>{{$message}}</strong>
                            </span>
                            @enderror

                            <div class="form-group col-md-6"></div>

                            <div class="form-group col-md-6">
                                <label>مزيد من التفاصيل</label>
                                <textarea class="form-control @error('more_details') is-invalid @enderror " placeholder="أدخل المزيد من التفاصيل"
                                          style="display:block" rows="5" name="more_details"></textarea>
                            </div>
                            @error('more_details')
                            <span class="invalid-feedback mr-25 mb-2" style="display:block" role="alert">
                                    <strong>{{$message}}</strong>
                            </span>
                            @enderror

                            <div class="form-group col-md-6">
                                <label class="mt-2">حسابات التواصل الإجتماعي (سناب,تويتر,انستجرام ...الخ)</label>
                                <textarea class="form-control  @error('social_media_details') is-invalid @enderror "
                                          placeholder="حسابات التواصل الإجتماعي (سناب,تويتر,انستجرام ...الخ)"
                                          style="display:block" rows="5" name="social_media_details"></textarea>
                            </div>
                            @error('more_details')
                            <span class="invalid-feedback mr-25 mb-2" style="display:block" role="alert">
                                    <strong>{{$message}}</strong>
                            </span>
                            @enderror

                        </div>
                        <div class="col-lg-12 text-center my-3">
                            <div>
                                <img class="img-fluid" style="max-width: 300px;"
                                     src="{{asset('images/'.explode(",",$product->images)[0])}}">
                                <br><br><br>
                                <img id="imagePreview" class="img-fluid" src="">
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="quanty-box qua-main">
                                <div>السعر</div>
                                <div>{{number_format($product->price,3)}}<span>ريال عماني</span></div>
                            </div>
                        </div>
                        <div class="col-12 text-sm-right">
                            <button type="submit" class="btn btn-dark mt-3">إتمام الطلب</button>
                            <a href="{{route('store')}}" class="btn btn-dark mt-3">إلغاء</a>
                        </div>
                    </div>
                </form>
            </div>

        </section>
@endsection
