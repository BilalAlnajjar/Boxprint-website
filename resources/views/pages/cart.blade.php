@extends('pages.layouts.user')
@section('content')

    <link rel="stylesheet" href="{{asset('css/style.css')}}">



    <div class="mt-4" id="header-page">

        <div class="container">

            <h2>سلة الطلبات</h2>

            <a href="{{route('home')}}">الرئيسية</a> / سلة الطلبات</p>

        </div>

    </div>

    <section class="main-bg">

        <div class="container">

@if($products->first())
            <div class="row print-box">

                <div class="page-title col-12 mb-3 mt-0">

                    <h2>تأكيد الطباعة و التصميم</h2>

                </div>

            </div><!--print-box-->


            <!--Bussniess Card Print Confirmation-->
            @foreach($products as $product)

                @if($product->pivot->type == 'design')
                        <div class="mb-1">
                            <div class="box-cart">
                                <div class="row">
                                    <div class="col-md-3  confi-pic text-left">

                                        <img class="img-fluid" src="{{'images/'.explode(',',$product->images)[0]}}" alt="Bussniess Card Print Confirmation">

                                    </div>
                                    <div class="col-md-6 confi-pic text-left">


                                        <h2> مواصفات التصميم</h2>

                                        <div class="confi-p">



                                            <span>اسم الشركة</span> : <span>{{$product->pivot->company_name}}</span>


                                            <br>



                                            <span>رقم الجوال</span> : <span>{{$product->pivot->phone}}</span>


                                            <br>



                                            <span>ايميل الشركة</span> : <span>{{$product->pivot->phone}}</span>


                                            <br>



                                            <span>موقع الشركة</span> : <span>{{$product->pivot->website}}</span>


                                            <br>



                                            <span>العرض</span> : <span>{{$product->pivot->width}}</span>


                                            <br>



                                            <span>الطول</span> : <span>{{$product->pivot->height}}</span>


                                            <br>





                                            <br>





                                            <br>



                                            <div class="btn-group">


                                            </div>


                                            <br>



                                            <br>



                                            <span>مزيد من التفاصيل</span> : <span>{{$product->pivot->more_details}}</span>


                                            <br>



                                            <span>حسابات التواصل الإجتماعي (سناب,تويتر,انستجرام ...الخ)</span> : <span>{{$product->pivot->social_media_details}}</span>


                                            <br>





                                            <br>


                                        </div>


                                    </div>
                                    <div class="col-md-3 confi-text">

                                        <div class="confi-tit">

                                            <p>العدد</p>

                                            <p class="confi-light">1</p>

                                        </div>

                                        <div>

                                            <p>السعر</p>

                                            <p class="confi-light">{{$product->price}} ريال عماني</p>

                                        </div>

                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-12 edit-other mb-3">

                                    <a onclick="DeleteCartIndex({{$product->id}})"><i class="far fa-times-circle mr-2"></i>حذف الطلب</a>
                                </div>
                            </div>
                        </div>
                    @endif


                    @if($product->pivot->type == "print")
                    <div class="mb-1">
                    <div class="box-cart">
                        <div class="row">
                            <div class="col-md-3  confi-pic text-left">

                                <img class="img-fluid" src="{{asset('images/'.explode(',',$product->images)[0])}}"
                                     alt="Bussniess Card Print Confirmation">

                            </div>
                            <div class="col-md-6 confi-pic text-left">


                                <h2>مواصفات الطباعة</h2>

                                <div class="confi-p">


                                    <span>مقاس</span> : <span>L:{{$product->pivot->height}} W:{{$product->pivot->width}} H:6 cm</span>

                                    <br>


                                    <br>


                                    <br>

                                    <div class="btn-group">

                                        @if($product->type == 'print')
                                            <h3><a class="designpreview"
                                                   href="{{asset($product->pivot->image_content)}}"
                                                   target="_blank">معاينة
                                                    التصميم</a></h3>
                                        @endif


                                    </div>

                                </div>


                            </div>
                            <div class="col-md-3 confi-text">

                                {{--                                <div class="confi-tit">--}}

                                {{--                                    <p>العدد</p>--}}

                                {{--                                    <p class="confi-light">100</p>--}}

                                {{--                                </div>--}}

                                <div>

                                    <p>السعر</p>

                                    <p class="confi-light">{{$product->pivot->price}} ريال عماني </p>

                                </div>

                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12 edit-other mb-3">

                            <a onclick="DeleteCartIndex({{$product->id}})"><i class="far fa-times-circle mr-2"></i>حذف
                                الطلب</a>
                        </div>
                    </div>
                </div>
                    @endif
            @endforeach
                </div>


            {{--            <div id="alert" class="mb-3">--}}
            {{--                <div class="page-title mb-3 mt-0"><h2>الشحن</h2></div>--}}
            {{--            </div>--}}

            {{--            <div class="row quanty-bord p-4 ">--}}

            {{--                <div class="col-md-6 mb-6">--}}

            {{--                    <div class="form-group">--}}

            {{--                        <label>عناوين الشحن</label>--}}

            {{--                        <select class="form-control" id="shipping_id">--}}

            {{--                            <option selected value="">إختر العنوان ...</option>--}}


            {{--                            <option data-country="1" value="297">الجمام - ممت</option>--}}


            {{--                        </select>--}}

            {{--                    </div>--}}

            {{--                </div>--}}


            {{--                <div class="col-md-6 mb-6 mt-4">--}}

            {{--                    <a onclick="add_address()" class="btn btn-dark text-white">إضافة عنوان جديد</a>--}}

            {{--                </div>--}}

            {{--            </div>--}}

            {{--            <div id="model-show">--}}
            {{--                <form class="row  quanty-bord p-4">--}}
            {{--                    <div class="col-sm-6 col-12">--}}

            {{--                        <div class="form-group mb-4">--}}

            {{--                            <label>الإسم</label>--}}

            {{--                            <input id="name" name="name" value="" type="text" class="form-control">--}}

            {{--                            <span id="error_name" class="help-block text-danger"></span>--}}

            {{--                        </div>--}}

            {{--                        <div class="form-group mb-4">--}}

            {{--                            <label>الدولة</label>--}}

            {{--                            <select class="form-control" name="country_id" id="country_id">--}}
            {{--                                <option value="">إختر الدولة</option>--}}
            {{--                                <option value="1">السعودية</option>--}}
            {{--                                <option value="2">الأردن</option>--}}
            {{--                                <option value="3">الامارات</option>--}}
            {{--                                <option value="4">مصر</option>--}}
            {{--                                <option value="5">الكويت</option>--}}
            {{--                            </select>--}}
            {{--                            <span id="error_country" class="help-block  text-danger"></span>--}}

            {{--                        </div>--}}

            {{--                        <div class="form-group mb-4">--}}

            {{--                            <label>الشارع - الحــي - رقم البناية</label>--}}

            {{--                            <input id="full_address" type="text" value="" class="form-control">--}}

            {{--                            <span id="error_full_address" class="help-block text-danger"></span>--}}

            {{--                        </div>--}}

            {{--                    </div>--}}
            {{--                    <div class="col-sm-6 col-12">--}}
            {{--                        <div class="form-group mb-4">--}}

            {{--                            <label>رقم الهاتف</label>--}}

            {{--                            <input id="mobile" value="" type="text" class="form-control">--}}

            {{--                            <span id="error_mobile" class="help-block text-danger"></span>--}}

            {{--                        </div>--}}

            {{--                        <div class="form-group mb-4">--}}

            {{--                            <label>المدينة</label>--}}

            {{--                            <input id="city" type="text" value="" class="form-control">--}}

            {{--                            <span id="error_city" class="help-block  text-danger"></span>--}}

            {{--                        </div>--}}

            {{--                        <div class="form-group mb-4">--}}

            {{--                            <label>الرمز البريدي</label>--}}

            {{--                            <input id="country_code" type="text" value="" class="form-control">--}}

            {{--                            <span id="error_country_code" class="help-block  text-danger"></span>--}}

            {{--                        </div>--}}

            {{--                    </div>--}}
            {{--                    <div class="form-group mb-4">--}}

            {{--                        <label>جعل هذا العنوان افتراضي</label>--}}

            {{--                        <input id="default" class="h-auto" value=""--}}

            {{--                               type="checkbox">--}}

            {{--                        <input id="lat" name="lat" value="" class="controls" type="hidden">--}}

            {{--                        <input id="lng" name="lng" value="" class="controls" type="hidden">--}}

            {{--                    </div>--}}
            {{--                    <p class="map-text">حدد موقعك من الخريطة</p>--}}
            {{--                    <span id="error_lat" class="help-block  text-danger text-center"></span>--}}
            {{--                    <span id="error_lng" class="help-block  text-danger text-center"></span>--}}
            {{--                    <div id="map" style="border:0;height: 400px;width: 100%;"></div>--}}
            {{--                    <div class="col-12">--}}

            {{--                        <a id="add_address" class="btn btn-dark text-white mt-4">حفظ البيانات</a>--}}

            {{--                    </div>--}}
            {{--                </form>--}}
            {{--            </div>--}}
            {{--            <!--Deleviry-->--}}
            {{--            <div class="page-title mb-3 "><h2>طريقة الإستلام</h2></div>--}}
            {{--            <div class="row quanty-bord p-4 mb-3 ">--}}
            {{--                <div class="col-md-6 col-lg-6 mb-6">--}}
            {{--                    <div class="form-group ">--}}
            {{--                        <label>طريقة الإستلام</label>--}}
            {{--                        <select class="form-control" id="shipping_way" name="shipping_way">--}}
            {{--                            <option selected data-locale-price="0" data-global-price="0" value="">إختر الطريقة--}}
            {{--                                المطلوبة--}}
            {{--                            </option>--}}
            {{--                            <option data-locale-price="35" data-global-price="35" value="1">شحن محلي</option>--}}
            {{--                            <option data-locale-price="25" data-global-price="25" value="3">توصيل بمدينة الدمام</option>--}}
            {{--                            <option data-locale-price="200" data-global-price="200" value="5">شحن دولي</option>--}}
            {{--                            <option data-locale-price="0" data-global-price="0" value="6">استلم بنفسي</option>--}}
            {{--                            <!-- <option data-locale-price ="" data-global-price= "" value="1">شحن سمسا  </option>--}}
            {{--              <option data-locale-price ="" data-global-price= "" value="2">شحن DHL </option> -->--}}
            {{--                        </select>--}}

            {{--                    </div>--}}
            {{--                </div>--}}
            {{--                <div class="col-md-6"></div>--}}
            {{--            </div>--}}
            {{--            <div class="row mt-5">--}}
            {{--                <div class="col-md-12">--}}
            {{--                    <div class="order-det">--}}
            {{--                        <h5>نسبة الضريبة</h5>--}}
            {{--                        </span> 15 %</span>--}}
            {{--                    </div>--}}
            {{--                </div>--}}
            {{--            </div>--}}
            {{--            <div class="row mt-4">--}}
            {{--                <div class="col-md-12">--}}
            {{--                    <div class="order-det">--}}
            {{--                        <h5>رسوم الشحن</h5>--}}
            {{--                        <span id="feesPrice" value="0">0  ريال</span>--}}
            {{--                    </div>--}}
            {{--                </div>--}}
            {{--            </div>--}}
            {{--            <div class="row mt-4">--}}
            {{--                <div class="col-md-12">--}}

            {{--                    <div class="order-det">--}}

            {{--                        <h5>إجمالي الطلبية</h5>--}}

            {{--                        <span id="full_price">1265 ريال</span>--}}

            {{--                    </div>--}}

            {{--                </div>--}}
            {{--            </div>--}}

        <form action="{{route('orderStore')}}" method="POST">
            @csrf
                        <div class="row payment-box justify-content-center">


                            <!--01-->

                            <div class="col-md-3">

                                <div class="quanty-bord p-4 text-center">

                                    <img class="img-fluid" style="height: 55px;"
                                         src="https://sa.myfatoorah.com/imgs/payment-methods/vm.png">

                                    <input type="radio" id="paymentMethodId" class="mt-4" name="payment_type" value="stripe">

                                </div>

                            </div>


                            <!--01-->

                            <div class="col-md-3">

                                <div class="quanty-bord p-4 text-center">

                                    <img class="img-fluid" style="height: 55px;"
                                         src="{{asset('images/paypal.png')}}">

                                    <input type="radio" id="paymentMethodId" class="mt-4" name="payment_type" value="paypal">

                                </div>

                            </div>


                            <!--01-->

{{--                            <div class="col-md-3">--}}

{{--                                <div class="quanty-bord p-4 text-center">--}}

{{--                                    <img class="img-fluid" style="height: 55px;"--}}
{{--                                         src="https://sa.myfatoorah.com/imgs/payment-methods/ap.png">--}}

{{--                                    <input type="radio" id="paymentMethodId" class="mt-4" name="paymentMethodId" value="11">--}}

{{--                                </div>--}}

{{--                            </div>--}}


{{--                            <!--01-->--}}

{{--                            <div class="col-md-3">--}}

{{--                                <div class="quanty-bord p-4 text-center">--}}

{{--                                    <img class="img-fluid" style="height: 55px;"--}}
{{--                                         src="https://sa.myfatoorah.com/imgs/payment-methods/stc.png">--}}

{{--                                    <input type="radio" id="paymentMethodId" class="mt-4" name="paymentMethodId" value="12">--}}

{{--                                </div>--}}
{{--                            </div>--}}
                        </div>

            {{--                </div>--}}

        </div>

        <div class="row">
            <div class="col-12 text-center">
                <button type="submit" class="btn btn-dark text-white mt-4">إتمام الطلب</button>
            </div>
        </div>
        @endif


        </form>

    </section>

    <div class="modal fade" id="confirmDelete" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
         aria-hidden="true">

        <div class="modal-dialog modal-dialog-centered" role="document">

            <div class="modal-content">

                <div class="modal-header">

                    <h5 class="modal-title" id="exampleModalLongTitle">حذف</h5>

                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">

                        <span aria-hidden="true">&times;</span>

                    </button>

                </div>

                <div class="modal-body">

                    هل أنت متأكد من حذف المنتج من السلة؟؟

                </div>

                <div class="modal-footer">

                    <button class="btn btn-secondary cur-pointer " data-dismiss="modal">إغلاق</button>

                    <a id="delete" class="btn btn-dark-2 text-light">حذف</a>

                    <input type="hidden" id="clicked_item" value="">

                </div>

            </div>

        </div>

    </div>

    <div class="modal fade" id="noAddressSelected" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
         aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">

            <div class="modal-content">

                <div class="modal-header">

                    <h5 class="modal-title" id="exampleModalLongTitle">تنبيه</h5>

                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">

                        <span aria-hidden="true">&times;</span>

                    </button>

                </div>

                <div class="modal-body">

                    الرجاء إختيار العنوان أو إضافة عنوان جديد

                </div>

                <div class="modal-footer">

                    <button class="btn btn-secondary cur-pointer " data-dismiss="modal">متابعـــة</button>

                </div>

            </div>

        </div>
    </div>
    <div class="modal fade" id="noPaymentSelected" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
         aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">

            <div class="modal-content">

                <div class="modal-header">

                    <h5 class="modal-title" id="exampleModalLongTitle">تنبيه</h5>

                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">

                        <span aria-hidden="true">&times;</span>

                    </button>

                </div>

                <div class="modal-body">

                    الرجاء إختيار طريقة الدفع الإلكترونية

                </div>

                <div class="modal-footer">

                    <button class="btn btn-secondary cur-pointer " data-dismiss="modal">متابعـــة</button>

                </div>

            </div>

        </div>
    </div>
    <div class="modal fade" id="noShippingWaySelected" tabindex="-1" role="dialog"
         aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">

            <div class="modal-content">

                <div class="modal-header">

                    <h5 class="modal-title" id="exampleModalLongTitle">تنبيه</h5>

                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">

                        <span aria-hidden="true">&times;</span>

                    </button>

                </div>

                <div class="modal-body">

                    الرجاء إختيار طريقة الإستلام

                </div>

                <div class="modal-footer">

                    <button class="btn btn-secondary cur-pointer " data-dismiss="modal">متابعـــة</button>

                </div>

            </div>

        </div>
    </div>

    <script>
        function DeleteCartIndex(product_id) {

            $('#confirmDelete').modal({

                backdrop: 'static',

                keyboard: false

            })

                .on('click', '#delete', function (e) {

                    console.log(product_id)

                    $.ajax({

                        url: "{{route("cart_product.delete")}}",

                        method: 'post',
                        dataType: 'json',

                        data: {
                            _token: "{{ csrf_token() }}",
                            product_id: product_id,

                        },

                        success: function (e) {

                            // console.log(data)

                            window.location.reload();

                        }

                    });

                });


        }
    </script>

@endsection
