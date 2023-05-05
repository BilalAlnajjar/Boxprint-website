@extends('pages.layouts.user')
@section('content')
    <link rel="stylesheet" href="{{asset('css/style.css')}}">

    <style>


        .active {
            color: #351F4F !important;
        }
    </style>


    <section class="mt-4" id="section-categories">
        <div class="container mt-2">
            <ul class="f-men-bootom" id="category" value="">
                <li value><a class="text-muted active" style = "cursor:pointer">الكل </a></li>
                @if($categories->first())
                @foreach($categories as $category)
                <li><a value="{{$category->id}}" class="text-muted" style = "cursor:pointer">{{$category->name}} </a></li>
                @endforeach
                @endif
{{--                <li><a value="2" class="text-muted" style = "cursor:pointer">المطبوعات المكتبية </a></li>--}}
{{--                <li><a value="3" class="text-muted" style = "cursor:pointer">مطبوعات دعائية </a></li>--}}
{{--                <li><a value="4" class="text-muted" style = "cursor:pointer">مطبوعات ترويجية </a></li>--}}
{{--                <li><a value="5" class="text-muted" style = "cursor:pointer">التغليف والملصقات </a></li>--}}
{{--                <li><a value="6" class="text-muted" style = "cursor:pointer">العلب والاكياس </a></li>--}}
{{--                <li><a value="7" class="text-muted" style = "cursor:pointer">اللوحات </a></li>--}}
            </ul>
        </div>
    </section>


    <section class="main-bg">
        <div class="container">


            <div class="row mb-4" id="sort_container">
                <div class="col-md-2">
                    <label for="sort">ترتيب</label>
                    <select class="form-control" name="sort" id="sort">
                        <option value="asc">حسب الأحدث</option>
                        <option value="order_number">حسب الأهمية</option>
                        <option value="price">حسب السعر</option>
                    </select>
                </div>
            </div>
            <div class="row print-box" id="for_search">
                <!--Business Card-->
                @if($products->first())
                @foreach($products as $product)
                <div class="col-md-4 col-6 mb-5 ">


                    <div class="iconbox">

                        <div class="icon-body mb-3">
                            <a href="#"> <img class="img-fluid" src="{{asset('images/'.explode(",",$product->images)[0])}}"
                                              alt="Design Packages"></a>
                        </div>

                        <div class="col-md-12 text-center"><h5>{{$product->name}}</h5></div>
                        <div class="col-md-12 mb-2">
                            <div class="row">

                                <div class="col-md-6 d-none mt-2">
                                    <div class="re-salary">


                                        <div style="direction: ltr;">


                                            <span class="far fa-star"></span>


                                            <span class="far fa-star"></span>


                                            <span class="far fa-star"></span>


                                            <span class="far fa-star"></span>


                                            <span class="far fa-star"></span>


                                        </div>

                                    </div>
                                </div>
                                <div class="col-md-6  d-none mt-2"><strong>{{$product->price}}ر.س</strong></div>
                            </div>

                        </div>


                        <div class="icon-footer btn-foot text-center">
                            <a href="{{route('order_print_page',$product->id)}}"
                               class="btn btn-more m-auto">طباعة</a>
                            <a href="{{route('order_design_page',$product->id)}}"
                               class="btn btn-more m-auto">تصميم</a>
                        </div>
                    </div>
                </div>
                @endforeach
                    @endif
            </div>
        </div>
    </section>

    @if($products->first())

    <script>
        function classify(category_id) {
            console.log('success')
            $.ajax({
                url: "{{route('category.products')}}",
                method: 'post',
                dataType: 'json',
                data: {
                    category_id: category_id,
                },
                success: function (data) {
                    let info = data;
                    $('#for_search').empty();
                    $.each(data, function (k, product) {
                        // let design_url = 'https://revinn.net/design/:id/:slug';
                        // design_url = design_url.replace(':id', product.id);
                        // design_url = design_url.replace(':slug', product.slug);
                        // let print_url = 'https://revinn.net/print/:id/:slug';
                        // print_url = print_url.replace(':id', product.id);
                        // print_url = print_url.replace(':slug', product.slug);
                        let rate = '';
                        // for (var i = 1; i <= 5; i++) {
                        //     if (i <= product.rate) {
                        //         rate = rate + '<span class="fas fa-star text-warning"></span>';
                        //     } else {
                        //         rate = rate + '<span class="far fa-star"></span>';
                        //     }
                        // }
                        console.log(product.images)
                        $('#for_search').append('<div class="col-md-4 col-6 mb-5">' +
                            '<div class="iconbox">' +
                            '   <div class="icon-body mb-3">' +
                            '       <img class="img-fluid" src="images/' + product.images + '" alt="Design Packages">' +
                            '   </div>' +
                            '   <div class="col-md-12"><h5>' + product.name + '</h5></div>' +
                            '   <div class="col-md-12 mb-2"><div class="row"><div class="col-md-6"> ' +
                            '   <strong>' + product.price + 'ر.س</strong></div>' +
                            '   <div class="col-md-6"> <div class="re-salary mt-2">' +
                            '   <div style="direction: ltr;">' + rate + '</div></div></div></div> </div>' +
                            '   <div class="icon-footer btn-foot">' +
                            '       <a href="{{route('order_design_page',$product->id)}}" class="btn btn-more">تصميم</a>' +
                            '       <a href="{{route('order_print_page',$product->id)}}" class="btn btn-more">طباعة</a>' +
                            '   </div>' +
                            '</div>' +
                            '</div>');
                    });
                },
                error: function () {
                    console.log('error')
                }
            });
        }

    </script>
    @endif
@endsection


