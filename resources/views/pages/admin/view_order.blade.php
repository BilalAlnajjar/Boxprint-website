@extends('pages.layouts.dashboard')
@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <div class="clearfix">
                        <div class="float-left">
                            <h3 class="card-title mb-0">#INV-{{$order->number}}</h3>
                        </div>
                        <div class="float-right">
                            <h3 class="card-title">Date: {{$order->created_at->format('Y-m-d')}}</h3>
                        </div>
                    </div>
                    <hr>
                    <div class="row px-5">
                        <div class="col-lg-3">
                            <p class="h3">تفاصيل العميل</p>
                            <address>
                                <strong>الاسم</strong> : {{$order->user->name}}<br>
                                <hr>
                                <strong>الهاتف</strong> : {{$order->user->phone}}<br>
                                <hr>
                                {{--                                                    <strong>City</strong> : State, City<br>--}}
                                <hr>
                                <strong>الايميل</strong>: {{$order->user->email}}
                                <hr>
                            </address>
                        </div>
                        <div class="col-lg-9 ">
                            <p class="h3 text-right">تفاصيل الطلب:</p>
                            <address class="text-right">
                                <strong class="text-right">الخدمات المطلوبة</strong>
                                @if($order->products()->get() != [])
                                    <div class="row justify-content-end">
                                        @foreach ($order->products()->get() as $product)
                                            <div class="col-6">
                                                <div class="row m-2 justify-content-end"
                                                     style="font-weight: bold;">
                                                    <p class="col-7">
                                                        {{$product->name}}
                                                    </p>
                                                    <img width="50" src="{{asset('images/'.explode(',',$product->images)[0])}}">

                                                </div>
                                                @if($product->pivot->type == 'design')
                                                    <div class="d-flex flex-column text-right">
                                                        <div
                                                            class="mt-2 d-flex justify-content-end align-items-baseline">
                                                            {{$product->pivot->company_name}}
                                                            : <strong>اسم الشركة</strong><br>
                                                        </div>

                                                        <div
                                                            class="mt-2 d-flex justify-content-end align-items-baseline">
                                                            {{$product->pivot->website}}
                                                            : <strong>الموقع الالكتروني</strong><br>
                                                        </div>
                                                        <div
                                                            class="mt-2 d-flex justify-content-end align-items-baseline">
                                                            <a href="{{asset('images/'.$product->pivot->image_logo)}}"><img
                                                                    width="70"
                                                                    src="{{asset('images/'.$product->pivot->image_logo)}}"></a>
                                                            : <strong class="col-3">لوقو الشركة</strong><br>
                                                        </div>
                                                        <div
                                                            class="mt-2 d-flex justify-content-end align-items-baseline">
                                                            <a href="{{asset('images/'.$product->pivot->image_content)}}"><img
                                                                    width="70"
                                                                    src="{{asset('images/'.$product->pivot->image_content)}}"></a>
                                                            : <strong class="col-3">محتوى التصميم </strong><br>
                                                        </div>
                                                    </div>

                                                    @if($product->pivot->width && $product->pivot->height)
                                                        <div
                                                            class="mt-4 d-flex justify-content-end align-items-baseline">
                                                            {{$product->pivot->width}} X {{$product->pivot->height}}
                                                            : <strong class="text-danger">الأطوال </strong><br>
                                                        </div>
                                                    @endif

                                                    @if($product->pivot->measuring && $product->pivot->measuring['measure'])
                                                        <div
                                                            class="mt-4 d-flex justify-content-end align-items-baseline">
                                                            {{$product->pivot->measuring['measure']}}
                                                            : <strong class="text-danger">القياس </strong><br>
                                                        </div>
                                                    @endif

                                                    @if($product->pivot->papers && $product->pivot->papers['paper'])
                                                        <div
                                                            class="mt-4 d-flex justify-content-end align-items-baseline">
                                                            {{$product->pivot->papers['paper']}}
                                                            : <strong class="text-danger">نوع الورق </strong><br>
                                                        </div>
                                                    @endif

                                                    @if($product->pivot->weights && $product->pivot->weights['weight'])
                                                        <div
                                                            class="mt-4 d-flex justify-content-end align-items-baseline">
                                                            {{$product->pivot->weights['weight']}}
                                                            : <strong class="text-danger"> الوزن </strong><br>
                                                        </div>
                                                    @endif

                                                    @if($product->pivot->cutLabels && $product->pivot->cutLabels['cut'])
                                                        <div
                                                            class="mt-4 d-flex justify-content-end align-items-baseline">
                                                            {{$product->pivot->cutLabels['cut']}}
                                                            : <strong class="text-danger"> نوع القص </strong><br>
                                                        </div>
                                                    @endif

                                                    @if($product->pivot->colors && $product->pivot->colors['color'])
                                                        <div
                                                            class="mt-4 d-flex justify-content-end align-items-baseline">
                                                            {{$product->pivot->colors['color']}}
                                                            : <strong class="text-danger"> لون الطباعة </strong><br>
                                                        </div>
                                                    @endif

                                                    @if($product->pivot->number_pages)
                                                        <div
                                                            class="mt-4 d-flex justify-content-end align-items-baseline">
                                                            {{explode(',',$product->pivot->number_pages)[0]}}
                                                            : <strong class="text-danger"> عدد الصفحات </strong><br>
                                                        </div>
                                                        <div
                                                            class="mt-4 d-flex justify-content-end align-items-baseline">
                                                             <strong class="text-warning">{{explode(',',$product->pivot->number_pages)[1] }} OMR</strong>
                                                            : <strong class="text-danger"> سعر الصفحة الواحدة </strong><br>
                                                        </div>
                                                    @endif

                                                    @if($product->pivot->print_faces)
                                                        <div
                                                            class="mt-4 d-flex justify-content-end align-items-baseline">
                                                            {{explode(',',$product->pivot->print_faces)[0]}}
                                                            : <strong class="text-danger"> وجه الطباعة </strong><br>
                                                        </div>
                                                    @endif

                                                    @if($product->pivot->assembly_type)
                                                        <div
                                                            class="mt-4 d-flex justify-content-end align-items-baseline">
                                                            {{explode(',',$product->pivot->assembly_type)[0]}}
                                                            : <strong class="text-danger"> نوع التجميع </strong><br>
                                                        </div>
                                                    @endif

                                                    @if($product->pivot->open_note)
                                                        <div
                                                            class="mt-4 d-flex justify-content-end align-items-baseline">
                                                            {{explode(',',$product->pivot->open_note)[0]}}
                                                            : <strong class="text-danger"> طريقة فتح المذكرة </strong><br>
                                                        </div>
                                                    @endif
                                                    @if($product->pivot->sinuses)
                                                        <div
                                                            class="mt-4 d-flex justify-content-end align-items-baseline">
                                                            {{explode(',',$product->pivot->sinuses)[0]}}
                                                            : <strong class="text-danger"> نوع الجيب </strong><br>
                                                        </div>
                                                    @endif
                                                    @if($product->pivot->thermal_packaging)
                                                        <div
                                                            class="mt-4 d-flex justify-content-end align-items-baseline">
                                                            {{explode(',',$product->pivot->thermal_packaging)[0]}}
                                                            : <strong class="text-danger"> نوع التغليف الحراري </strong><br>
                                                        </div>
                                                    @endif
                                                    @if($product->pivot->number_creases)
                                                        <div
                                                            class="mt-4 d-flex justify-content-end align-items-baseline">
                                                            {{explode(',',$product->pivot->number_creases)[0]}}
                                                            : <strong class="text-danger">عدد الطويات </strong><br>
                                                        </div>
                                                    @endif
                                                    @if($product->pivot->edges)
                                                        <div
                                                            class="mt-4 d-flex justify-content-end align-items-baseline">
                                                            {{explode(',',$product->pivot->edges)[0]}}
                                                            : <strong class="text-danger"> الحواف </strong><br>
                                                        </div>
                                                    @endif
                                                    @if($product->pivot->cover_thickness)
                                                        <div
                                                            class="mt-4 d-flex justify-content-end align-items-baseline">
                                                            {{explode(',',$product->pivot->cover_thickness)[0]}}
                                                            : <strong class="text-danger"> سماكة غلاف الكتاب </strong><br>
                                                        </div>
                                                    @endif
                                                @endif


                                                <div class="mt-4 d-flex justify-content-end align-items-baseline">
                                                    {{$product->pivot->more_details}}
                                                    : <strong class="text-danger"> تفاصيل اخرى </strong><br>
                                                </div>
                                                <div class="mt-4 d-flex justify-content-end align-items-baseline">
                                                    {{$product->pivot->social_media_details}}
                                                    : <strong class="text-danger">روابط مواقع التواصل </strong><br>
                                                </div>
                                            </div>

                                        @endforeach
                                    </div>
                                @endif
                                <hr>
                                <hr>

                                <div class="h6">
                                    OMR ({{$order->total}})
                                    : <strong class="text-danger">سعر الطلب</strong><br>
                                </div>
                                <br>

                            </address>
                        </div>

                    </div>
                </div>
                <div class="card-footer text-right">
                    <button type="button" class="btn btn-info mb-1" onclick="javascript:window.print();"><i
                            class="si si-printer"></i> Print
                    </button>
                </div>
            </div>
        </div><!-- COL-END -->
    </div>
    <!-- ROW-1 CLOSED -->
    <!-- ============== END CONTENT ==============  -->
@endsection
