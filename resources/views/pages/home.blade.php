@extends('pages.layouts.user')
@section('content')

    <!--StartAbout Us-->
    <link href="{{asset('css/new-style.css')}}" rel="stylesheet">

    <section class="section-home-slide">
        <div class="owl-carousel wow fadeInUp" data-wow-duration="1s" data-wow-delay="0.550s" id="homeSlider">

            @if($sliders)
            @foreach($sliders as $slider)
            <div class="item">

                <div class="container">

                    <div class="row">

                        <div class="col-lg-6 col-md-6">

                            <div class="h-s-thumb">

                                <img src="{{asset('images/'.$slider->image)}}" alt="عروض متجددة!"
                                     class="img-responsive">

                                <span class="offer-slider"></span>

                            </div>

                        </div>

                        <div class="col-lg-6 col-md-6">

                            <div class="h-s-txt">

                                <span>{{$slider->title}}</span>

                                {!! html_entity_decode($slider->description) !!}

                                <p></p>

                                <a href="{{route('store')}}" class="view-btn">اطلب الان</a>

                            </div>

                        </div>

                    </div>

                </div>

            </div>
            @endforeach
                @endif


        </div>

    </section>

    <!--Section-home-slider-->


    <section class="section-feat">

        <div class="container">

            <!--<div class="box-feat wow fadeInUp" data-wow-duration="1s" data-wow-delay="0.550s">

                <div class="sec-feat">

                    <figure><span>A.</span></figure>

                    <div class="sec-title">

                        <h4>Business <br />card</h4>

                        <p>Lorem ipsum dolor sit amet, </p>

                    </div>

                </div>

                <div class="sec-feat">

                    <figure><span>B.</span></figure>

                    <div class="sec-title">

                        <h4>Project  <br />Offer</h4>

                        <p>Lorem ipsum dolor sit amet, </p>

                    </div>

                </div>

                <div class="sec-feat">

                    <figure><span>C.</span></figure>

                    <div class="sec-title">

                        <h4>Project  <br />Offer</h4>

                        <p>Lorem ipsum dolor sit amet, </p>

                    </div>

                </div>

            </div>-->

        </div>

    </section>

    <!--StLatest-feat-->


    <section class="section-about-site">

        <div class="container">
            @if($aboutAs)
            <div class="row">

                <div class="col-lg-6 col-md-6">

                    <div class="img-about wow fadeInUp" id="d_images" data-wow-duration="1s" data-wow-delay="0.550s">

                        <img src="{{asset('images/'.$aboutAs->image_who_are)}}" alt=""
                             class="img-responsive animate__animated animate__fadeInRight" id="img_about"/>
                        <img src="{{asset('images/'.$aboutAs->image_our_vision)}}" alt=""
                             class="img-responsive animate__animated animate__fadeInRight d-none" id="img_vision"/>
                        <img src="{{asset('images/'.$aboutAs->image_our_message)}}" alt=""
                             class="img-responsive animate__animated animate__fadeInRight d-none" id="img_mission"/>

                    </div>

                </div>

                <div class="col-lg-6 col-md-6">

                    <div class="content-about-site wow fadeInUp" data-wow-duration="1s" data-wow-delay="0.550s">

                        <ul class="nav nav-tabs" id="myTab" role="tablist">

                            <li class="nav-item">

                                <a data-sec="img_about" class="nav-link active" id="about-tab" data-toggle="tab"
                                   href="#about"
                                   role="tab" aria-controls="about" aria-selected="true">من نحن</a>

                            </li>

                            <li class="nav-item">

                                <a class="nav-link" data-sec="img_vision" id="vision-tab" data-toggle="tab"
                                   href="#vision" role="tab"
                                   aria-controls="vision" aria-selected="false">رؤيتنا</a>

                            </li>

                            <li class="nav-item">

                                <a class="nav-link" data-sec="img_mission" id="mission-tab" data-toggle="tab"
                                   href="#mission" role="tab"
                                   aria-controls="mission" aria-selected="false"> رسالتنا</a>

                            </li>

                        </ul>

                        <div class="tab-content" id="myTabContent">

                            <div class="tab-pane fade animate__animated animate__fadeInLeft show active" id="about"
                                 role="tabpanel"
                                 aria-labelledby="about-tab">

                                <div class="sec-content text-justify" style="line-height: 1.8;">

                                    <h3>{{$aboutAs->title_who_are}}</h3>

                                    <p>
                                    <div id="close_tags">
                                        <div style="text-align: justify; ">
                                            {!! $aboutAs->description_who_are !!}
                                        </div>
                                    </div>
                                    </p>

{{--                                    <a href="#" class="btnReadMore">إقرأ المزيد</a>--}}

                                </div>

                            </div>

                            <div class="tab-pane fade animate__animated animate__fadeInLeft" id="vision" role="tabpanel"
                                 aria-labelledby="vision-tab">

                                <div class="sec-content  text-justify" style="line-height: 1.8;">

                                    <h3>{{$aboutAs->title_our_vision}}</h3>
                                    <p>
                                    <div style="text-align: justify; ">{!! $aboutAs->description_our_vision !!}
                                    </div>
                                    </p>

                                </div>

                            </div>

                            <div class="tab-pane fade animate__animated animate__fadeInLeft" id="mission"
                                 role="tabpanel"
                                 aria-labelledby="mission-tab">

                                <div class="sec-content  text-justify" style="line-height: 1.8;">

                                    <h3>{{$aboutAs->title_our_message}}</h3>
                                    <p>
                                    <p class="MsoNormal" align="right" style="text-align: justify;">
                                        {!! $aboutAs->description_our_message !!}
                                    </p>
                                    </p>

                                </div>

                            </div>

                        </div>

                    </div>

                </div>

            </div>
                @endif

        </div>

    </section>

    <!--StLatest-about-site-->


    <section class="section-services">

        <div class="container">

            <div class="sec-head wow fadeInUp" data-wow-duration="1s" data-wow-delay="0.550s">

                <h2>خدماتنا</h2>

                <a href="{{route('store')}}" class="btnReadMore">المزيد</a>

            </div>

            <div class="flex-services wow fadeInUp row" data-wow-duration="1s" data-wow-delay="0.550s">


                <div class="box-service col-6 col-md-3">

                    <img width="20%" height="35%" src="{{asset('images/Asset 4.png')}}"/>

                    <p>التصميم</p>

                    <a href="{{route('store')}}" class="btn-order">المعرض</a>

                </div>


                <div class="box-service col-6 col-md-3">

                    <img width="20%" height="35%" src="{{asset('images/Asset 5.png')}}"/>

                    <p>الطباعة</p>

                    <a href="{{route('store')}}" class="btn-order">المعرض</a>

                </div>


                <div class="box-service col-6 col-md-3">

                    <img width="20%" height="35%" src="{{asset('images/Asset 2.png')}}"/>

                    <p>الهوية البصرية</p>

                    <a href="{{route('store')}}" class="btn-order">المعرض</a>

                </div>


                <div class="box-service col-6 col-md-3">

                    <img width="20%" height="35%" src="{{asset('images/Asset 3.png')}}"/>

                    <p>موشن جرافيك</p>

                    <a href="{{route('store')}}" class="btn-order">المعرض</a>

                </div>



            </div>
        </div>

    </section>

    <!--section-services-->


    <section class="section-latest-projects">

        <div class="container">

            <div class="sec-head wow fadeInUp" data-wow-duration="1s" data-wow-delay="0.550s">

                <h2>أحدث المشاريع</h2>

                <a href="#" class="btnReadMore">المزيد</a>

            </div>

            <div class="owl-carousel wow fadeInUp" data-wow-duration="1s" data-wow-delay="0.550s" id="latest-projects">

                @foreach($projects as $project)
                <div class="item">

                    <div class="projects-item">

                        <a class="proThumb" id="link-projects">

                            <img src="{{asset('images/'.explode(',',$project->images)[0])}}" alt=""
                                 class="img-responsive Thumb-main">

                        </a>

                        <div class="proTxt" onclick="document.getElementById('link-projects').click()">

                            <h5>{{$project->title}}</h5>

                            <a href="{{route('user.project.index')}}" class="btn-see-project">تفاصيل المشروع</a>

                        </div>

                    </div>

                </div>
                @endforeach


            </div>

        </div>

    </section>

    <!--Latest-products-->


{{--    <section class="section-offer">--}}

{{--        <div class="container">--}}


{{--            <div class="box-offer wow fadeInUp text-center" data-wow-duration="1s" data-wow-delay="0.550s">--}}

{{--                <a href="#">--}}

{{--                    <img src="addsBanners/2020/06/03/5ed7a4e0429c0.png"/>--}}

{{--                </a>--}}

{{--            </div>--}}


{{--        </div>--}}

{{--    </section>--}}

    <!--section-offer-->
    @if($sectionOne)
    {!! html_entity_decode($sectionOne->item) !!}
    @endif


    <section class="section-latest-products">

        <div class="container">

            <div class="sec-head wow fadeInUp" data-wow-duration="1s" data-wow-delay="0.550s">

                <h2>أحدث المنتجات </h2>

                <a href="#" class="btnReadMore">المزيد</a>

            </div>

            <div class="owl-carousel wow fadeInUp" data-wow-duration="1s" data-wow-delay="0.550s" id="latest-products">
                @if($products)
@foreach($products as $product)
                <div class="item">

                    <div class="products-item">

                        <a class="proThumb">

                            <img src="{{asset('images/'.explode(',',$product->images)[0])}}" alt="" class="img-responsive Thumb-main">

                        </a>

                        <ul class="option-product">

                            <li><a href="{{route('order_print_page',$product->id)}}" data-toggle="tooltip"
                                   title="طباعة"><img src="../images/print.svg" class="img-responsive" alt=""></a></li>

                            <li><a href="{{route('order_design_page',$product->id)}}" data-toggle="tooltip"
                                   title="تصميم"><img src="../images/design.svg" class="img-responsive" alt=""></a></li>

                        </ul>

                        <div class="proTxt">

                            <h5>{{$product->name}}</h5>

                            <div class="re-salary mt-2">


                                <div class="mb-2" style="direction: ltr;">


                                    <span class="far d-none fa-star"></span>


                                    <span class="far d-none fa-star"></span>


                                    <span class="far d-none fa-star"></span>


                                    <span class="far d-none fa-star"></span>


                                    <span class="far d-none fa-star"></span>


                                </div>
                                <strong>     {{$product->price}}     ريال عماني  </strong>
                            </div>

                        </div>


                    </div>

                </div>
                @endforeach
                @endif


            </div>

        </div>

    </section>

    <!--Latest-products-->


{{--    <section class="section-latest-botiques" style="direction: ltr;">--}}

{{--        <div class="container">--}}
{{--            <h2>عملائنا </h2>--}}
{{--            <div class="owl-carousel wow fadeInUp" data-wow-duration="1s" data-wow-delay="0.550s" id="client-slider">--}}



{{--                <div class="item">--}}

{{--                    <div class="logo-img">--}}

{{--                        <a href="#"><img src="https://revinn.net/partners/2020/04/06/5e8b2b5924ea0.svg" alt="logo"></a>--}}

{{--                    </div>--}}

{{--                </div>--}}


{{--                <div class="item">--}}

{{--                    <div class="logo-img">--}}

{{--                        <a href="https://al-wisam.com/"><img--}}
{{--                                src="https://revinn.net/partners/2020/04/09/5e8f75845e2df.svg"--}}
{{--                                alt="logo"></a>--}}

{{--                    </div>--}}

{{--                </div>--}}


{{--                <div class="item">--}}

{{--                    <div class="logo-img">--}}

{{--                        <a href="https://www.bdpinternational.com/"><img--}}
{{--                                src="https://revinn.net/partners/2020/04/09/5e8f755137419.svg" alt="logo"></a>--}}

{{--                    </div>--}}

{{--                </div>--}}


{{--                <div class="item">--}}

{{--                    <div class="logo-img">--}}

{{--                        <a href="http://www.anmattwi.com/"><img--}}
{{--                                src="https://revinn.net/partners/2020/04/09/5e8f75352657d.svg"--}}
{{--                                alt="logo"></a>--}}

{{--                    </div>--}}

{{--                </div>--}}


{{--                <div class="item">--}}

{{--                    <div class="logo-img">--}}

{{--                        <a href="https://www.slb.com/"><img--}}
{{--                                src="https://revinn.net/partners/2020/04/09/5e8f756bddffc.svg"--}}
{{--                                alt="logo"></a>--}}

{{--                    </div>--}}

{{--                </div>--}}


{{--                <div class="item">--}}

{{--                    <div class="logo-img">--}}

{{--                        <a href="Tamimi Markets"><img src="https://revinn.net/partners/2021/07/21/60f7e755d04aa.svg"--}}
{{--                                                      alt="logo"></a>--}}

{{--                    </div>--}}

{{--                </div>--}}


{{--                <div class="item">--}}

{{--                    <div class="logo-img">--}}

{{--                        <a href="Ashley"><img src="https://revinn.net/partners/2021/07/21/60f7e81042a14.svg" alt="logo"></a>--}}

{{--                    </div>--}}

{{--                </div>--}}


{{--                <div class="item">--}}

{{--                    <div class="logo-img">--}}

{{--                        <a href="saha"><img src="https://revinn.net/partners/2021/07/21/60f7e8afd5485.svg"--}}
{{--                                            alt="logo"></a>--}}

{{--                    </div>--}}

{{--                </div>--}}


{{--                <div class="item">--}}

{{--                    <div class="logo-img">--}}

{{--                        <a href="Naqel"><img src="https://revinn.net/partners/2021/07/21/60f7e99ceb14d.svg" alt="logo"></a>--}}

{{--                    </div>--}}

{{--                </div>--}}


{{--            </div>--}}

{{--        </div>--}}

{{--    </section>--}}

    <!--section-latest-projects-->

@if($sectionTwo)

    {!! html_entity_decode($sectionTwo->item) !!}
@endif

@endsection
