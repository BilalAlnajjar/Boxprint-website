@extends('pages.layouts.user')
@section('content')

    <link rel="stylesheet" href="{{asset('css/style.css')}}">

    <style>
        .selectgroup-input:checked + .selectgroup-button {
            border-color: rgba(24, 30, 139, 1);
            z-index: 1;
            color: #ffffff;
            background: rgba(24, 30, 139, 1);
        }

        .selectgroup-button {
            display: block;
            border: 1px solid #d8dde4;
            text-align: center;
            padding: 12px 8px;
            position: relative;
            cursor: pointer;
            border-radius: 22px;
            min-width: 150px;
        }

        .selectgroup-input {
            opacity: 0;
            position: absolute;
            z-index: -1;
            top: 0;
            left: 0;
        }
    </style>


    <script src="{{asset("assets/js/jquery-3.4.1.min.js")}}"></script>

    <script>

        $(document).ready(function () {
            !$('.Additions').length ? $(".add-print").prop('disabled', false) : '';
        })

        var total = 0;
        var priceWeight = 0
        var pricePaper = 0
        var priceMeasure = 0
        var priceNumber = 0
        var priceCut = 0
        var priceColor = 0
        var pricePrintFace = 0
        var priceAssemblyType = 0
        var priceOpenNote = 0
        var priceSinuses = 0
        var priceBase = 0
        var priceBox = 0
        var priceTapeColor = 0
        var priceSticker = 0
        var priceStructure = 0
        var priceThermalPackaging = 0
        var priceNumberCreases = 0
        var priceEdgesPrice = 0
        var priceCoverThickness = 0
        var priceInputNumber = 1
        var priceNumberPages = 0
        var priceAPage = 0;

        function following() {
            console.log("bilal")
            $('.ff_fileupload_dropzone_print .ff_fileupload_dropzone').trigger('click');
            $("#file-2").trigger('click');
        }

        function increseFunction() {
            !this.checked;
            const radioButtons = document.querySelectorAll('input[type="radio"]');
            for (const radioButton of radioButtons) {
                if (radioButton.checked) {
                    priceWeight = radioButton.dataset.priceWeight ? parseFloat(radioButton.dataset.priceWeight)  : priceWeight;
                    pricePaper = radioButton.dataset.pricePaper ? parseFloat(radioButton.dataset.pricePaper) : pricePaper;
                    priceMeasure = radioButton.dataset.priceMeasure ? parseFloat(radioButton.dataset.priceMeasure) : priceMeasure;
                    priceNumber = radioButton.dataset.priceNumber ? parseFloat(radioButton.dataset.priceNumber): priceNumber;
                    priceInputNumber = document.getElementById('inputNumber') ? parseFloat(document.getElementById('inputNumber').value) : priceInputNumber;
                    priceNumberPages = document.getElementById('numberPages') ? parseFloat(document.getElementById('numberPages').value) : priceNumberPages;
                    priceAPage = {{$product->number_pages ? $product->number_pages['pagePrice'] ? $product->number_pages['pagePrice'] : 0 : 0}}
                    priceCut = radioButton.dataset.priceCut ? parseFloat(radioButton.dataset.priceCut): priceCut;
                    pricePrintFace = radioButton.dataset.pricePrintFace ? parseFloat(radioButton.dataset.pricePrintFace): pricePrintFace;
                    priceAssemblyType = radioButton.dataset.priceAssemblyType ? parseFloat(radioButton.dataset.priceAssemblyType): priceAssemblyType;
                    priceOpenNote = radioButton.dataset.priceOpenNote ? parseFloat(radioButton.dataset.priceOpenNote): priceOpenNote;
                    priceSinuses = radioButton.dataset.priceSinuses ? parseFloat(radioButton.dataset.priceSinuses) : priceSinuses;
                    priceColor = radioButton.dataset.priceColor ? parseFloat(radioButton.dataset.priceColor) : priceColor;


                    priceBase = radioButton.dataset.priceBase ? parseFloat(radioButton.dataset.priceBase) : priceBase;
                    priceBox = radioButton.dataset.priceBox ? parseFloat(radioButton.dataset.priceBox) : priceBox;
                    priceTapeColor = radioButton.dataset.priceTapeColor ? parseFloat(radioButton.dataset.priceTapeColor) : priceTapeColor;
                    priceSticker = radioButton.dataset.priceSticker ? parseFloat(radioButton.dataset.priceSticker) : priceSticker;
                    priceStructure = radioButton.dataset.priceStructure ? parseFloat(radioButton.dataset.priceStructure) : priceStructure;

                    priceThermalPackaging = radioButton.dataset.priceThermalPackaging ? parseFloat(radioButton.dataset.priceThermalPackaging) : priceThermalPackaging;
                    priceNumberCreases = radioButton.dataset.priceNumberCreases ? parseFloat(radioButton.dataset.priceNumberCreases) : priceNumberCreases;
                    priceEdgesPrice = radioButton.dataset.priceEdges ? parseFloat(radioButton.dataset.priceEdges) : priceEdgesPrice;
                    priceCoverThickness = radioButton.dataset.priceCoverThickness ? parseFloat(radioButton.dataset.priceCoverThickness) : priceCoverThickness;
                    var priceAddaition = (priceWeight + pricePaper + priceMeasure + priceCut + priceColor  + priceAssemblyType + priceOpenNote + priceSinuses +
                        priceThermalPackaging + priceNumberCreases + priceEdgesPrice + priceCoverThickness +
                        + priceBase + priceBox + priceTapeColor+ priceSticker+ priceStructure);

                    if (priceNumber) {
                          total =  priceNumber + (( priceAddaition * priceNumber) + (priceAPage * priceNumberPages) );
                        console.log('bilal')


                    }

                    else{
                        total = priceInputNumber * ((priceAddaition  * {{$product->price}}) + {{$product->price}}) + (priceAPage * priceNumberPages) ;
                    }

                    if(pricePrintFace){
                        total =  (2*pricePrintFace) * total
                    }

                    document.getElementById('total').value = total;

                    console.log(priceAddaition * parseFloat({{$product->price}}))


                    $(".prot-price").text(total)
                    var allChecked = $('input[type="radio"]:checked').length == $('.Additions').length;
                    if (allChecked) {
                        $(".add-print").prop('disabled', false);
                    }
                }
            }
        }

    </script>


    <div class="mt-4" id="header-page">
        <div class="container">
            <h2>طلب طباعة </h2>
            <a href="#">الرئيسية</a> / <a href="#">المنتجات </a> / {{$product->name}}
        </div>
    </div>
    <section class="main-bg business-card">
        <div class="container">
            <div class="row" id="NoSpecSelected">
                <div class="col-lg-4 mb-4">
                    <h3 id="product-title" class="product-name mb-2">{{$product->name}}</h3>
                    <strong><span>{{$product->price_display}}</span><span class="pr"> ريال عماني</span></strong>
                    <p id="other-title" class="footnote"></p>
                </div>
                <div class="col-lg-8 mb-4">
                    <div class="d-none"><span id="reviews_count">0</span> تقييم <span class="rate d-none"
                                                                                      data-toggle="tab"
                                                                                      id="product_rate"
                                                                                      data-target="#reviews"><i
                                class="far d-none fa-star mb-3"></i><i class="far d-none fa-star mb-3"></i><i
                                class="far d-none fa-star mb-3"></i><i class="far d-none fa-star mb-3"></i><i
                                class="far d-none fa-star mb-3"></i></span></div>
                    <p id="other-title" class="expected_value">{{$product->timeDelivery}}</p>
                </div>
                <!--Conditioners-->
                <div class="col-lg-8 col-md-5">
                    <input type="hidden" id="selected_color_price" value="0">
                    <input type="hidden" id="selected_size_price" value="0">
                    <input type="hidden" id="selected_attr_price" value="0">
                    <div class="row d-none responsive-images">
                        <div class="col-md-12 big-img">
                            <img class="img-fluid detailsbigimg expandedImg  animate__animated animate__fadeIn"
                                 src="{{asset('images/'.explode(',',$product->images)[0])}}"></div>
                    </div>
                    <div class="row d-none responsive-images">
                        <div class="owl-product owl-carousel col-md-12 owl-rtl owl-loaded owl-drag"
                             id="product-pic-responsive">
                            <div class="owl-stage-outer">
                                <div class="owl-stage"></div>
                            </div>
                            <div class="owl-nav disabled">
                                <button type="button" role="presentation" class="owl-prev"><span><i
                                            class="fas fa-chevron-left font-16"></i><span></span></span></button>
                                <button type="button" role="presentation" class="owl-next"><span><i
                                            class="fas fa-chevron-right font-16"></i></span></button>
                            </div>
                            <div class="owl-dots disabled"></div>
                        </div>
                    </div>
                    <form method="POST" action="{{route('storePrint',$product->id)}}" id="dataForm"
                          enctype="multipart/form-data" class="row">
                        @csrf
                        <input type="hidden" id="total" name="total" value="" />
                        @if($product->measure && $product->measure['measuringActive'] == "on")
                            <div class="col-lg-6 pb-3 pmbox">
                                <div class="product-in h-100" id="paper-type-prop"><strong><img class="p-1"
                                                                                                src="https://revinn.net/web/img/material.svg">
                                        اختر المقاس</strong>
                                    <div class="selectgroup selectgroup-pills">
                                        @if($product->measure['measuring'])
                                            <div class="selectgroup selectgroup-pills Additions" id="measureBtns">
                                                @foreach($product->measure['measuring'] as $key => $measuring)
                                                    <label class="selectgroup-item">
                                                        <input type="radio" name="measuring[measure]"
                                                               value="{{$measuring}}"
                                                               class="selectgroup-input" onClick="increseFunction()"
                                                               data-price-measure="{{$product->measure['measuringPrice'][$key]}}"
                                                               id="{{$key}}">
                                                        <span class="selectgroup-button"> {{$measuring}}</span>
                                                        <input type="hidden" name="measuring[measuringPrice]"
                                                               value="{{$product->measure['measuringPrice'][$key]}}">
                                                    </label>
                                                @endforeach
                                            </div>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        @endif
                        @if($product->number_pages && $product->number_pages['numberPagesActive'] == "on")
                            <div class="col-lg-6 pb-3 pmbox">
                                <div class="product-in h-100"><strong><img class="p-1"
                                                                           src="https://revinn.net/web/img/quantity.svg">عدد
                                        الصفحات</strong>
                                    <div class="row">
                                        <div class="col-md-12 p-1"><input class="form-control other" value="1" onChange="increseFunction()" type="number" step="1"
                                                                          name="pages[numberPages]"
                                                                          id="numberPages"
                                                                          placeholder="عدد الصفحات"></div>
                                        <input type="hidden" name="pages[pagePrice]" value="{{$product->number_pages['pagePrice']}}">
                                    </div>
                                </div>
                            </div>
                        @endif

                        <div class="col-lg-6 pb-3 pmbox d-none">
                            <div class="product-in h-100" id="additional-fields">
                                <div class="row"></div>
                            </div>
                        </div>
                        <div class="col-lg-6 pb-3 pmbox d-none">
                            <div class="product-in h-100" id="quantity-field"></div>
                        </div>
                        <div class="col-lg-6 pb-3 pmbox d-none">
                            <div class="product-in h-100" id="paper-type-prop"></div>
                        </div>
                        <div class="col-lg-6 pb-3 pmbox d-none">
                            <div class="product-in h-100" id="print-face-prop"></div>
                        </div>
                        <div class="col-lg-6 pb-3 pmbox d-none">
                            <div class="product-in h-100" id="weight-prop"></div>
                        </div>
                        <div class="col-lg-6 pb-3 pmbox d-none">
                            <div class="product-in h-100" id="sections-num-prop"></div>
                        </div>
                        <div class="col-lg-6 pb-3 pmbox d-none">
                            <div class="product-in h-100" id="pages-num-prop"></div>
                        </div>
                        <div class="col-lg-6 pb-3 pmbox d-none">
                            <div class="product-in h-100" id="thermal-packaging-prop"></div>
                        </div>

                        <div class="col-lg-6 pb-3 pmbox d-none">
                            <div class="product-in h-100" id="edges-prop"></div>
                        </div>
                        <div class="col-lg-6 pb-3 pmbox d-none">
                            <div class="product-in  h-100" id="color-prop">
                                <ul class="nav nav-product" id="color"></ul>
                            </div>
                        </div>
                        <div class="col-lg-6 pb-3 pmbox d-none">
                            <div class="product-in h-100" id="prod-attributes"></div>
                        </div>

                        @if($product->numbers && $product->numbers['numberActive'] == "on")
                            <div class="col-lg-6 pb-3 pmbox">
                                <div class="product-in h-100" id="paper-type-prop"><strong><img class="p-1"
                                                                                                src="https://revinn.net/web/img/material.svg">اختر
                                        العدد</strong>
                                    <div class="selectgroup selectgroup-pills">
                                        @if($product->numbers['number'])
                                            <div class="selectgroup selectgroup-pills Additions" id="numberBtns">
                                                @foreach($product->numbers['number'] as $key => $number)
                                                    <label class="selectgroup-item">
                                                        <input type="radio" name="number" value="{{$number}}"
                                                               class="selectgroup-input" onclick="increseFunction()"
                                                               data-price-number="{{$product->numbers['numberPrice'][$key]}}" id="number{{$key}}">
                                                        <span class="selectgroup-button"> {{$number}}</span>
                                                        <input type="hidden" name="number"
                                                               value="{{$number}}">
                                                    </label>
                                                @endforeach
                                            </div>
                                        @endif
                                    </div>
                                </div>
                            </div>

                        @elseif($product->input_number && $product->input_number['inputNumberActive'] == "on")
                            <div class="col-lg-6 pb-3 pmbox">
                                <div class="product-in h-100" id="paper-type-prop"><strong><img class="p-1"
                                                                                                src="https://revinn.net/web/img/material.svg">اختر
                                        العدد /الكمية</strong>
                                    <div class="selectgroup selectgroup-pills">
                                        @if($product->input_number['inputNumberActive'])
                                            <div class="selectgroup selectgroup-pills Additions" id="inputNumberBtns">
                                                <input class="form-control other" id="inputNumber" onchange="increseFunction()" type="number" step="1"  value="1" name="عدد الصفحات20" placeholder="ادخل العدد ">
                                            </div>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        @endif
                        {{--                        @if($product->numbers && $product->numbers['numberActive'] == "on")--}}
                        {{--                            <div class="col-lg-6 pb-3 pmbox">--}}
                        {{--                                <div class="product-in h-100" id="quantities"><strong><img class="p-1"--}}
                        {{--                                                                                           src="https://revinn.net/web/img/quantity.svg">اختر--}}
                        {{--                                        العدد</strong>--}}
                        {{--                                    @foreach($product->numbers['number'] as $key => $number)--}}
                        {{--                                        <button class="btn btn-light mr-1 ml-1 text-muted" data-f-price="0"--}}
                        {{--                                                af-id="0"--}}
                        {{--                                                data-quaid="148" data-price="0" data-papers="500">{{$number}}--}}
                        {{--                                        </button>--}}
                        {{--                                    @endforeach--}}
                        {{--                                </div>--}}
                        {{--                            </div>--}}
                        {{--                        @endif--}}

                        {{--                        @if($product->paper && $product->paper['paperActive'] == "on")--}}
                        {{--                            <div class="col-lg-6 pb-3 pmbox">--}}
                        {{--                                <div class="product-in h-100" id="paper-type-prop"><strong><img class="p-1"--}}
                        {{--                                                                                                src="https://revinn.net/web/img/material.svg">اختر--}}
                        {{--                                        نوع الورق/ المادة</strong>--}}
                        {{--                                    @foreach($product->paper['paper'] as $key => $paper)--}}
                        {{--                                        <button class="btn btn-light mr-1 ml-1 text-muted" af-id=""--}}
                        {{--                                                data-spectype="properties"--}}
                        {{--                                                data-attrid="213" data-price="{{$product->paper['paperPrice'][$key]}}"--}}
                        {{--                                                added-price="0" added-id="213" added-type="3">--}}
                        {{--                                            {{$paper}}--}}
                        {{--                                        </button>--}}
                        {{--                                    @endforeach--}}
                        {{--                                </div>--}}
                        {{--                            </div>--}}
                        {{--                        @endif--}}

                        @if($product->paper && $product->paper['paperActive'] == "on")
                            <div class="col-lg-6 pb-3 pmbox">
                                <div class="product-in h-100" id="paper-type-prop"><strong><img class="p-1"
                                                                                                src="https://revinn.net/web/img/material.svg">اختر
                                        نوع الورق/ المادة</strong>
                                    <div class="selectgroup selectgroup-pills">
                                        @if($product->paper['paper'])
                                            <div class="selectgroup selectgroup-pills Additions" id="paperBtns">
                                                @foreach($product->paper['paper'] as $key => $paper)
                                                    <label class="selectgroup-item">

                                                        <input type="radio" name="papers[paper]" value="{{$paper}}"
                                                               class="selectgroup-input" onClick="increseFunction()"
                                                               data-price-paper="{{$product->paper['paperPrice'][$key]}}"
                                                               id="{{$key}}">
                                                        <span class="selectgroup-button"> {{$paper}}</span>
                                                        <input type="hidden" name="papers[paperPrice]"
                                                               value="{{$product->paper['paperPrice'][$key]}}">
                                                    </label>
                                                @endforeach
                                            </div>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        @endif
                        @if($product->box && $product->box['boxActive'] == "on")
                            <div class="col-lg-6 pb-3 pmbox">
                                <div class="product-in h-100" id="box-type-prop"><strong><img class="p-1"
                                                                                                src="https://revinn.net/web/img/material.svg">
                                        العلبة</strong>
                                    <div class="selectgroup selectgroup-pills">
                                        @if($product->box['box'])
                                            <div class="selectgroup selectgroup-pills Additions" id="boxBtns">
                                                @foreach($product->box['box'] as $key => $box)
                                                    <label class="selectgroup-item">

                                                        <input type="radio" name="box[box]" value="{{$box}}"
                                                               class="selectgroup-input" onClick="increseFunction()"
                                                               data-price-box="{{$product->box['boxPrice'][$key]}}"
                                                               id="{{$key}}">
                                                        <span class="selectgroup-button"> {{$box}}</span>
                                                        <input type="hidden" name="box[boxPrice]"
                                                               value="{{$product->box['boxPrice'][$key]}}">
                                                    </label>
                                                @endforeach
                                            </div>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        @endif
                        @if($product->base && $product->base['baseActive'] == "on")
                            <div class="col-lg-6 pb-3 pmbox">
                                <div class="product-in h-100" id="base-type-prop"><strong><img class="p-1"
                                                                                                src="https://revinn.net/web/img/material.svg">
                                        قاعدة الالمنيوم</strong>
                                    <div class="selectgroup selectgroup-pills">
                                        @if($product->base['base'])
                                            <div class="selectgroup selectgroup-pills Additions" id="baseBtns">
                                                @foreach($product->base['base'] as $key => $base)
                                                    <label class="selectgroup-item">

                                                        <input type="radio" name="base[base]" value="{{$base}}"
                                                               class="selectgroup-input" onClick="increseFunction()"
                                                               data-price-base="{{$product->base['basePrice'][$key]}}"
                                                               id="{{$key}}">
                                                        <span class="selectgroup-button"> {{$base}}</span>
                                                        <input type="hidden" name="base[basePrice]"
                                                               value="{{$product->base['basePrice'][$key]}}">
                                                    </label>
                                                @endforeach
                                            </div>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        @endif
                        @if($product->sticker && $product->sticker['stickerActive'] == "on")
                            <div class="col-lg-6 pb-3 pmbox">
                                <div class="product-in h-100" id="sticker-type-prop"><strong><img class="p-1"
                                                                                                src="https://revinn.net/web/img/material.svg">
                                        شكل الستيكر</strong>
                                    <div class="selectgroup selectgroup-pills">
                                        @if($product->sticker['sticker'])
                                            <div class="selectgroup selectgroup-pills Additions" id="stickerBtns">
                                                @foreach($product->sticker['sticker'] as $key => $sticker)
                                                    <label class="selectgroup-item">

                                                        <input type="radio" name="sticker[sticker]" value="{{$sticker}}"
                                                               class="selectgroup-input" onClick="increseFunction()"
                                                               data-price-sticker="{{$product->sticker['stickerPrice'][$key]}}"
                                                               id="{{$key}}">
                                                        <span class="selectgroup-button"> {{$sticker}}</span>
                                                        <input type="hidden" name="sticker[stickerPrice]"
                                                               value="{{$product->sticker['stickerPrice'][$key]}}">
                                                    </label>
                                                @endforeach
                                            </div>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        @endif
                        @if($product->structure && $product->structure['structureActive'] == "on")
                            <div class="col-lg-6 pb-3 pmbox">
                                <div class="product-in h-100" id="structure-type-prop"><strong><img class="p-1"
                                                                                                src="https://revinn.net/web/img/material.svg">اختر
                                       الهيكل</strong>
                                    <div class="selectgroup selectgroup-pills">
                                        @if($product->structure['structure'])
                                            <div class="selectgroup selectgroup-pills Additions" id="structureBtns">
                                                @foreach($product->structure['structure'] as $key => $structure)
                                                    <label class="selectgroup-item">

                                                        <input type="radio" name="structure[structure]" value="{{$structure}}"
                                                               class="selectgroup-input" onClick="increseFunction()"
                                                               data-price-structure="{{$product->structure['structurePrice'][$key]}}"
                                                               id="{{$key}}">
                                                        <span class="selectgroup-button"> {{$structure}}</span>
                                                        <input type="hidden" name="structure[structurePrice]"
                                                               value="{{$product->structure['structurePrice'][$key]}}">
                                                    </label>
                                                @endforeach
                                            </div>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        @endif
                        @if($product->tape_color && $product->tape_color['tapeColorActive'] == "on")
                            <div class="col-lg-6 pb-3 pmbox">
                                <div class="product-in h-100" id="tape-color-type-prop"><strong><img class="p-1"
                                                                                                src="https://revinn.net/web/img/material.svg">
                                        لون الشريط</strong>
                                    <div class="selectgroup selectgroup-pills">
                                        @if($product->tape_color['tapeColor'])
                                            <div class="selectgroup selectgroup-pills Additions" id="tapeColorBtns">
                                                @foreach($product->tape_color['tapeColor'] as $key => $tapeColor)
                                                    <label class="selectgroup-item">

                                                        <input type="radio" name="tape_color[tapeColor]" value="{{$tapeColor}}"
                                                               class="selectgroup-input" onClick="increseFunction()"
                                                               data-price-tape-color="{{$product->tape_color['tapeColorPrice'][$key]}}"
                                                               id="{{$key}}">
                                                        <span class="selectgroup-button"> {{$tapeColor}}</span>
                                                        <input type="hidden" name="tape_color[tapeColorPrice]"
                                                               value="{{$product->tape_color['tapeColorPrice'][$key]}}">
                                                    </label>
                                                @endforeach
                                            </div>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        @endif




                        @if($product->weights && $product->weights['weightActive'] == "on")
                            <div class="col-lg-6 pb-3 pmbox">
                                <div class="product-in h-100" id="paper-type-prop"><strong><img class="p-1"
                                                                                                src="https://revinn.net/web/img/material.svg">
                                        اختر الوزن</strong>
                                    <div class="selectgroup selectgroup-pills" id="weightBtns">
                                        @if($product->weights['weight'])
                                            <div class="selectgroup selectgroup-pills Additions" id="weightBtns">
                                                @foreach($product->weights['weight'] as $key => $weight)
                                                    <label class="selectgroup-item">
                                                        <input type="radio" name="weights[weight]" value="{{$weight}}"
                                                               class="selectgroup-input" onClick="increseFunction()"
                                                               data-price-weight="{{$product->weights['weightPrice'][$key]}}"
                                                               id="{{$key}}">
                                                        <span class="selectgroup-button"> {{$weight}}</span>
                                                        <input type="hidden" name="weights[weightPrice]"
                                                               value="{{$product->weights['weightPrice'][$key]}}">
                                                    </label>
                                                @endforeach
                                            </div>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        @endif

                        @if($product->cutLabels && $product->cutLabels['cutActive'] == "on")
                            <div class="col-lg-6 pb-3 pmbox">
                                <div class="product-in h-100" id="paper-type-prop"><strong><img class="p-1"
                                                                                                src="https://revinn.net/web/img/material.svg">
                                        اختر نوع القص</strong>
                                    <div class="selectgroup selectgroup-pills" id="weightBtns">
                                        @if($product->cutLabels['cut'])
                                            <div class="selectgroup selectgroup-pills Additions" id="weightBtns">
                                                @foreach($product->cutLabels['cut'] as $key => $cut)
                                                    <label class="selectgroup-item">
                                                        <input type="radio" name="cutLabels[cut]" value="{{$cut}}"
                                                               class="selectgroup-input" onClick="increseFunction()"
                                                               data-price-cut="{{$product->cutLabels['cutPrice'][$key]}}"
                                                               id="{{$key}}">
                                                        <span class="selectgroup-button"> {{$cut}}</span>
                                                        <input type="hidden" name="cutLabels[cutPrice]"
                                                               value="{{$product->cutLabels['cutPrice'][$key]}}">
                                                    </label>
                                                @endforeach
                                            </div>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        @endif

                        @if($product->colors && $product->colors['colorActive'] == "on")
                            <div class="col-lg-6 pb-3 pmbox">
                                <div class="product-in h-100" id="paper-type-prop"><strong><img class="p-1"
                                                                                                src="https://revinn.net/web/img/material.svg">اختر
                                        لون الطباعة</strong>
                                    <div class="selectgroup selectgroup-pills">
                                        @if($product->colors['color'])
                                            <div class="selectgroup selectgroup-pills Additions" id="colorBtns">
                                                @foreach($product->colors['color'] as $key => $color)
                                                    <label class="selectgroup-item">

                                                        <input type="radio" name="colors[color]" value="{{$color}}"
                                                               class="selectgroup-input" onClick="increseFunction()"
                                                               data-price-color="{{$product->colors['colorPrice'][$key]}}"
                                                               id="{{$key}}">
                                                        <span class="selectgroup-button"> {{$color}}</span>
                                                        <input type="hidden" name="colors[colorPrice]"
                                                               value="{{$product->colors['colorPrice'][$key]}}">
                                                    </label>
                                                @endforeach
                                            </div>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        @endif

                        @if($product->print_faces && $product->print_faces['printFaceActive'] == "on")
                            <div class="col-lg-6 pb-3 pmbox">
                                <div class="product-in h-100" id="paper-type-prop"><strong><img class="p-1"
                                                                                                src="https://revinn.net/web/img/material.svg">
                                        اختر أوجه الطباعة</strong>
                                    <div class="selectgroup selectgroup-pills">
                                        @if($product->print_faces['printFace'])
                                            <div class="selectgroup selectgroup-pills Additions" id="printFaceBtns">
                                                @foreach($product->print_faces['printFace'] as $key => $printFace)
                                                    <label class="selectgroup-item">

                                                        <input type="radio" name="print_faces[printFace]"
                                                               value="{{$printFace}}"
                                                               class="selectgroup-input" onClick="increseFunction()"
                                                               data-price-print-face="{{$product->print_faces['printFacePrice'][$key]}}"
                                                               id="{{$key}}">
                                                        <span class="selectgroup-button"> {{$printFace}}</span>
                                                        <input type="hidden" name="print_faces[printFacePrice]"
                                                               value="{{$product->print_faces['printFacePrice'][$key]}}">
                                                    </label>
                                                @endforeach
                                            </div>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        @endif

                        @if($product->assembly_type && $product->assembly_type['assemblyTypeActive'] == "on")
                            <div class="col-lg-6 pb-3 pmbox">
                                <div class="product-in h-100" id="paper-type-prop"><strong><img class="p-1"
                                                                                                src="https://revinn.net/web/img/material.svg">
                                        التجميع</strong>
                                    <div class="selectgroup selectgroup-pills">
                                        @if($product->assembly_type['assemblyType'])
                                            <div class="selectgroup selectgroup-pills Additions" id="assemblyTypeBtns">
                                                @foreach($product->assembly_type['assemblyType'] as $key => $assemblyType)
                                                    <label class="selectgroup-item">

                                                        <input type="radio" name="assembly_type[assemblyType]"
                                                               value="{{$assemblyType}}"
                                                               class="selectgroup-input" onClick="increseFunction()"
                                                               data-price-assembly-type="{{$product->assembly_type['assemblyTypePrice'][$key]}}"
                                                               id="{{$key}}">
                                                        <span class="selectgroup-button"> {{$assemblyType}}</span>
                                                        <input type="hidden" name="assembly_type[assemblyTypePrice]"
                                                               value="{{$product->assembly_type['assemblyTypePrice'][$key]}}">
                                                    </label>
                                                @endforeach
                                            </div>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        @endif

                        @if($product->open_note && $product->open_note['openNoteActive'] == "on")
                            <div class="col-lg-6 pb-3 pmbox">
                                <div class="product-in h-100" id="paper-type-prop"><strong><img class="p-1"
                                                                                                src="https://revinn.net/web/img/material.svg">اختر
                                        طريقة فتح المذكرة</strong>
                                    <div class="selectgroup selectgroup-pills">
                                        @if($product->open_note['openNote'])
                                            <div class="selectgroup selectgroup-pills Additions" id="openNoteBtns">
                                                @foreach($product->open_note['openNote'] as $key => $openNote)
                                                    <label class="selectgroup-item">

                                                        <input type="radio" name="open_note[openNote]"
                                                               value="{{$openNote}}"
                                                               class="selectgroup-input" onClick="increseFunction()"
                                                               data-price-open-note="{{$product->open_note['openNotePrice'][$key]}}"
                                                               id="{{$key}}">
                                                        <span class="selectgroup-button"> {{$openNote}}</span>
                                                        <input type="hidden" name="open_note[openNotePrice]"
                                                               value="{{$product->open_note['openNotePrice'][$key]}}">
                                                    </label>
                                                @endforeach
                                            </div>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        @endif

                        @if($product->sinuses && $product->sinuses['sinusesActive'] == "on")
                            <div class="col-lg-6 pb-3 pmbox">
                                <div class="product-in h-100" id="paper-type-prop"><strong><img class="p-1"
                                                                                                src="https://revinn.net/web/img/material.svg">
                                        حدد الجيب</strong>
                                    <div class="selectgroup selectgroup-pills">
                                        @if($product->sinuses['sinuses'])
                                            <div class="selectgroup selectgroup-pills Additions" id="sinusesBtns">
                                                @foreach($product->sinuses['sinuses'] as $key => $sinuses)
                                                    <label class="selectgroup-item">

                                                        <input type="radio" name="sinuses[sinuses]" value="{{$sinuses}}"
                                                               class="selectgroup-input" onClick="increseFunction()"
                                                               data-price-sinuses="{{$product->sinuses['sinusesPrice'][$key]}}"
                                                               id="{{$key}}">
                                                        <span class="selectgroup-button"> {{$sinuses}}</span>
                                                        <input type="hidden" name="sinuses[sinusesPrice]"
                                                               value="{{$product->sinuses['sinusesPrice'][$key]}}">
                                                    </label>
                                                @endforeach
                                            </div>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        @endif

                        @if($product->thermal_packaging && $product->thermal_packaging['thermalPackagingActive'] == "on")
                            <div class="col-lg-6 pb-3 pmbox">
                                <div class="product-in h-100" id="paper-type-prop"><strong><img class="p-1"
                                                                                                src="https://revinn.net/web/img/material.svg">
                                        اختر نوع التغليف الحراري</strong>
                                    <div class="selectgroup selectgroup-pills">
                                        @if($product->thermal_packaging['thermalPackaging'])
                                            <div class="selectgroup selectgroup-pills Additions"
                                                 id="thermalPackagingBtns">
                                                @foreach($product->thermal_packaging['thermalPackaging'] as $key => $thermalPackaging)
                                                    <label class="selectgroup-item">

                                                        <input type="radio" name="thermal_packaging[thermalPackaging]"
                                                               value="{{$thermalPackaging}}"
                                                               class="selectgroup-input" onClick="increseFunction()"
                                                               data-price-thermal-packaging="{{$product->thermal_packaging['thermalPackagingPrice'][$key]}}"
                                                               id="{{$key}}">
                                                        <span class="selectgroup-button"> {{$thermalPackaging}}</span>
                                                        <input type="hidden"
                                                               name="thermal_packaging[thermalPackagingPrice]"
                                                               value="{{$product->thermal_packaging['thermalPackagingPrice'][$key]}}">
                                                    </label>
                                                @endforeach
                                            </div>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        @endif

                        @if($product->number_creases && $product->number_creases['numberCreasesActive'] == "on")
                            <div class="col-lg-6 pb-3 pmbox">
                                <div class="product-in h-100" id="paper-type-prop"><strong><img class="p-1"
                                                                                                src="https://revinn.net/web/img/material.svg">
                                        اختر عدد الطويات</strong>
                                    <div class="selectgroup selectgroup-pills">
                                        @if($product->number_creases['numberCreases'])
                                            <div class="selectgroup selectgroup-pills Additions" id="numberCreasesBtns">
                                                @foreach($product->number_creases['numberCreases'] as $key => $numberCreases)
                                                    <label class="selectgroup-item">

                                                        <input type="radio" name="number_creases[numberCreases]"
                                                               value="{{$numberCreases}}"
                                                               class="selectgroup-input" onClick="increseFunction()"
                                                               data-price-number-creases="{{$product->number_creases['numberCreasesPrice'][$key]}}"
                                                               id="{{$key}}">
                                                        <span class="selectgroup-button"> {{$numberCreases}}</span>
                                                        <input type="hidden" name="number_creases[numberCreasesPrice]"
                                                               value="{{$product->number_creases['numberCreasesPrice'][$key]}}">
                                                    </label>
                                                @endforeach
                                            </div>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        @endif

                        @if($product->edges && $product->edges['edgesActive'] == "on")
                            <div class="col-lg-6 pb-3 pmbox">
                                <div class="product-in h-100" id="paper-type-prop"><strong><img class="p-1"
                                                                                                src="https://revinn.net/web/img/material.svg">
                                        اختر الحواف</strong>
                                    <div class="selectgroup selectgroup-pills">
                                        @if($product->edges['edges'])
                                            <div class="selectgroup selectgroup-pills Additions" id="edgesBtns">
                                                @foreach($product->edges['edges'] as $key => $edges)
                                                    <label class="selectgroup-item">

                                                        <input type="radio" name="edges[edges]" value="{{$edges}}"
                                                               class="selectgroup-input" onClick="increseFunction()"
                                                               data-price-edges="{{$product->edges['edgesPrice'][$key]}}"
                                                               id="{{$key}}">
                                                        <span class="selectgroup-button"> {{$edges}}</span>
                                                        <input type="hidden" name="edges[edgesPrice]"
                                                               value="{{$product->edges['edgesPrice'][$key]}}">
                                                    </label>
                                                @endforeach
                                            </div>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        @endif


                        @if($product->cover_thickness && $product->cover_thickness['coverThicknessActive'] == "on")
                            <div class="col-lg-6 pb-3 pmbox">
                                <div class="product-in h-100" id="paper-type-prop"><strong><img class="p-1"
                                                                                                src="https://revinn.net/web/img/material.svg">
                                        اختر سماكة غلاف الكتاب</strong>
                                    <div class="selectgroup selectgroup-pills">
                                        @if($product->cover_thickness['coverThickness'])
                                            <div class="selectgroup selectgroup-pills Additions"
                                                 id="coverThicknessBtns">
                                                @foreach($product->cover_thickness['coverThickness'] as $key => $coverThickness)
                                                    <label class="selectgroup-item">

                                                        <input type="radio" name="cover_thickness[coverThickness]"
                                                               value="{{$coverThickness}}"
                                                               class="selectgroup-input" onClick="increseFunction()"
                                                               data-price-cover-thickness="{{$product->cover_thickness['coverThicknessPrice'][$key]}}"
                                                               id="{{$key}}">
                                                        <span class="selectgroup-button"> {{$coverThickness}}</span>
                                                        <input type="hidden" name="cover_thickness[coverThicknessPrice]"
                                                               value="{{$product->cover_thickness['coverThicknessPrice'][$key]}}">
                                                    </label>
                                                @endforeach
                                            </div>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        @endif
                        <div class="col-lg-12">
                            <div class="row" id="NoTypeSelected">
                                <div class="col-lg-6">
                                    <div class="product-in product-height text-center">
                                        <div class="icon-box" data-type="order_design" data-price="5.5">
                                            <img class="img-fluid" src="https://revinn.net/web/img/icon/looking.png"
                                                 alt="إضافة طلب تصميم"> <span class="ml-2" style="cursor:pointer">إضافة طلب تصميم</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-6 ">
                                    <div id="validate-border" class="product-in text-center product-height ">
                                        <div class="icon-box " data-type="upload_design">
                                            <form>
                                                <p for="" class="upload_conditions">

                                                </p>
                                                <label for="" class="upload_conditions">
                                                    <img class="img-fluid"
                                                         src="https://revinn.net/web/img/icon/upload.png"
                                                         alt="رفع التصميم">
                                                    <span class="ml-2" style="cursor:pointer">رفع التصميم</span>
                                                </label>
                                                <div id="completedUpload">

                                                </div>
                                            </form>
                                        </div>
                                        <div id="validate-file"></div>

                                    </div>
                                </div>
                                <div class="col-12 ff_fileupload_dropzone_print">
                                    <input type="file" id="file-2" name="image_design"
                                           multiple class="ff_fileupload_hidden">
                                    <div class="ff_fileupload_wrap">
                                        <div class="ff_fileupload_dropzone_wrap d-none">
                                            <button class="ff_fileupload_dropzone" type="button"
                                                    aria-label="تصفح الملفات للرفع"></button>
                                            <div class="ff_fileupload_dropzone_tools"></div>
                                        </div>
                                        <table class="ff_fileupload_uploads"></table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                    <div id="quantity"></div>
                    <div class="mt-4"></div>
                </div>
                <div class="col-lg-4 col-md-7">
                    <div class="row images">
                        <div class="col-md-12 big-img">
                            <img class="img-fluid detailsbigimg expandedImg  animate__animated animate__fadeIn"
                                 src="{{asset('images/'.explode(',',$product->images)[0])}}"></div>
                    </div>
                    <div class="row images">
                        <div class="owl-product owl-carousel col-md-12 owl-rtl owl-loaded owl-drag" id="product-pic">
                            <div class="owl-stage-outer">
                                <div class="owl-stage"></div>
                            </div>
                            <div class="owl-nav disabled">
                                <button type="button" role="presentation" class="owl-prev"><span><i
                                            class="fas fa-chevron-left font-16"></i><span></span></span></button>
                                <button type="button" role="presentation" class="owl-next"><span><i
                                            class="fas fa-chevron-right font-16"></i></span></button>
                            </div>
                            <div class="owl-dots disabled"></div>
                        </div>
                    </div>
                    <div class="row " id="finish-buttons">
                        <div class="col-md-12 mt-2">
                            <p id="price"><span class="prot-price p-2">{{$product->price}}</span><span
                                    class="pr">ريال عماني</span></p>
                        </div>
                        @auth
                            <div class="col-md-12 mt-2 text-center half-width">
                                <button onclick="document.getElementById('dataForm').submit()"
                                        class="add-print border-0 btn btn-secondary" disabled="">
                                    اضف الى السلة
                                </button>
                            </div>
                            <div class="col-md-12 mt-3 text-center">حدد مواصفات طلبك ليتم تفعيل زر الشراء</div>
                        @endauth
                    </div>
                </div>
            </div>
            {{--            </div>--}}
            <div class="row business-box" id="NoTypeSelected"></div>
            <!-- Modal -->
            <div id="model-show">
                <!-- Modal content-->
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
                                    <div
                                        class="box form-control file-path ff_fileupload_dropzone_design_image validate ">
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
                                    <div
                                        class="box form-control file-path ff_fileupload_dropzone_design_content validate ">
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
                                    <input class="form-control @error('company_name') is-invalid @enderror"
                                           name="company_name" value=""
                                           placeholder="اسم الشركة" type="text">
                                </div>
                                @error('company_name')
                                <span class="invalid-feedback mr-25 mb-2" style="display:block" role="alert">
                                    <strong>{{$message}}</strong>
                            </span>
                                @enderror
                                <div class="form-group col-md-6 required">
                                    <label>تلفون</label>
                                    <input class="form-control  @error('phone') is-invalid @enderror " name="phone"
                                           value=""
                                           placeholder="+966 50 00 000" type="text">
                                </div>
                                @error('phone')
                                <span class="invalid-feedback mr-25 mb-2" style="display:block" role="alert">
                                    <strong>{{$message}}</strong>
                            </span>
                                @enderror
                                <div class="form-group col-md-6 ">
                                    <label class="pt-2" style="width: 75%;">أدخل المقاس بال cm<sup>2</sup></label>
                                    <input class="form-control @error('width') is-invalid @enderror m-1 " name="width"
                                           value="" placeholder="العرض" type="text">
                                    <input class="form-control @error('height') is-invalid @enderror m-1 " name="height"
                                           value="" placeholder="الطول" type="text">

                                </div>

                                @error('width','height')
                                <span class="invalid-feedback mr-25 mb-2" style="display:block" role="alert">
                                    <strong>{{$message}}</strong>
                            </span>
                                @enderror
                                <div class="form-group col-md-6 required">
                                    <label>البريد الإلكتروني</label>
                                    <input class="form-control @error('email') is-invalid @enderror"
                                           placeholder="email.com" name="email"
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
                                    <input class="form-control @error('website') is-invalid @enderror " value=""
                                           style="display:block" name="website" type="text"
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
                                    <textarea class="form-control @error('more_details') is-invalid @enderror "
                                              placeholder="أدخل المزيد من التفاصيل"
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
                                    <div>{{$product->price}}<span>ريال عماني</span></div>
                                </div>
                            </div>
                            <div class="col-md-3 btn-group mx-auto">
                                <button type="submit" class="add-print btn lh-10 border-0 m-2 ">
                                    موافق
                                </button>
                                <a onclick="closeDesign()" class="add-print btn lh-10 border-0 m-2">
                                    إلغاء
                                </a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <!--End Model-->
            <div class="row mt-5">
                <div class="col-lg-9"><h4 id="NoQuantitySelected">عن المنتج</h4></div>
                <div class="col-lg-12"><p class="my-3 product-desc text-dark"> {!! $product->description !!}</p></div>
            </div>
        </div>


        <section id="related">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12"><h4>منتجات أخرى</h4></div>
                </div>
                <div class="row owl-lastest owl-carousel owl-rtl owl-loaded owl-drag" id="suggestions">

                    <div class="owl-stage-outer">
                        <div class="owl-stage"
                             style="width: 1680px; transform: translate3d(0px, 0px, 0px); transition: all 0s ease 0s;">

                            @if($product->category()->first()->similer_products($product->id)->first())
                                @foreach($product->category()->first()->similer_products($product->id) as $similer_product)
                                    <div class="owl-item active" style="width: 270px; margin-left: 10px;">
                                        <div class=" item  mb-4"><a
                                                href="{{route('order_print_page',$similer_product->id)}}">
                                                <div class="related-box p-3"><img class="img-fluid" alt="ختم كريستال"
                                                                                  src="{{asset('images/'.explode(',',$similer_product->images)[0])}}">
                                                </div>
                                            </a></div>
                                        <a href="{{route('order_print_page',$similer_product->id)}}">
                                            <div class=" boxall float-right mb-2 ">{{$similer_product->name}}</div>
                                        </a>
                                        <div class="boxall float-left">
                                            <i class="far fa-star d-none " style="font-size: 12px"></i>
                                            <i class="far fa-star d-none " style="font-size: 12px"></i>
                                            <i class="far fa-star d-none " style="font-size: 12px"></i>
                                            <i class="far fa-star d-none " style="font-size: 12px"></i>
                                            <i class="far fa-star d-none " style="font-size: 12px"></i>
                                            <strong class=" mt-2 "
                                                    style="font-size: 13px">{{$similer_product->price}} ريال
                                                عماني </strong>
                                        </div>
                                    </div>
                                @endforeach
                            @endif
                        </div>
                    </div>
                    <div class="owl-nav disabled">
                        <button type="button" role="presentation" class="owl-prev"><span><i
                                    class="fas fa-chevron-left font-16"></i><span></span></span></button>
                        <button type="button" role="presentation" class="owl-next"><span><i
                                    class="fas fa-chevron-right font-16"></i></span></button>
                    </div>
                    <div class="owl-dots disabled"></div>
                </div>
            </div>
        </section>
        <!--<div class="row vate">
            <p>* يحتوي التغليف</p>
        </div>-->


        <!--  <div class="row">
             <div class="page-title col-12">
                 <§>تفاصيل الطلب</h2>
             </div>
         </div> -->
        <div class="row mt-2">
            <!--   <div class="col-md-9">
                  <div class="order-det">
                      <p>350/300 Coated Matt , Size as per file, Two Sides,<br>
                              2 Sides Matt lamination</p>
                      <div class="order-bold">100 <span>|</span> 50 <span>S.R</span></div>
                  </div>
              </div> -->


            <!--  <div class="col-md-12"><a href="https://revinn.net/pages/help"><i class="fas fa-info-circle"></i> تعليمات</a></div>-->

        </div>
        </div>
    </section>
    <div class="modal fade" id="warning" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
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
                    الرجاء رفع التصميم الخاص بك
                </div>
                <div class="modal-footer">
                    <button class="btn btn-secondary cur-pointer " onClick="console.log('bilal')" data-dismiss="modal">
                        متابعـــة
                    </button>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="noPrpertiesSelected" tabindex="-1" role="dialog"
         aria-labelledby="exampleModalCenterTitle"
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
                    حدد خيارات طلبك
                </div>
                <div class="modal-footer">
                    <button class="btn btn-secondary cur-pointer " data-dismiss="modal">متابعـــة</button>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="noQuantity" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
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
                    الرجاء إدخال كمية الطباعة
                </div>
                <div class="modal-footer">
                    <button class="btn btn-secondary cur-pointer " data-dismiss="modal">متابعـــة</button>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade " style="margin-top: -70px;" id="print_design_condtion" tabindex="-1" role="dialog"
         aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle"><i class="fa fa-exclamation-triangle"></i> تنبيه
                    </h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    عميلنا العزيز

                    <br>

                    جودة الطباعة تعتمد في الأساس على جودة ووضوح الصورة والتصميم فا نرجو منك رفع التصميم بصيغة مفتوحة PDF
                    أو Ai
                    اوصورة عالية الوضوح الامامي والخلفي

                    <br>

                    نحن لانتحمل اي مسؤولية عن ردائة التصميم او قلة دقته اذا لم يكن منجز من قبل فريق عملنا

                    <br>

                    شكرا مع التحية
                    <br>
                    <input type="checkbox" id="checkbox_upload_cond" class="mt-4"> قرأت الشروط السابقة وأوافق على ذلك
                </div>
                <div class="modal-footer">
                    <button class="btn btn-secondary cur-pointer " data-dismiss="modal"
                            onclick="following()"
                            id="upload_image_cond" disabled>متابعـــة
                    </button>
                </div>
            </div>
        </div>
    </div>
    <!--ShoopingList-->
    <!-- <div id="close_side" class="woodmart-close-side"></div>
    <div id="myCartSidepanelCart">
        <div class="side-padd">
            <div class="shopping-head">
                <h5>عربة التسوق</h5>
                <a href="javascript:void(0)" id="closebtn">إغلاق ×</a>
            </div>
            <div class="last-proudct">
                <article class="post mb-3" id="shoppingShort">

                </article>
            </div>
            <div class="shopping-foot">
                <p>المجموع</p>
                <p class="green" id="totalPrice"></p>
            </div>
            <button class="btn btn-login w-100 mb-3" onclick="window.location.href = 'https://revinn.net/cart';">عرض السلة</button>
            <button  class="btn btn-login w-100 " id="footer_close">متابعة التسوق</button>
        </div>
    </div> -->

    <!--JavaScript-->
    <script src="https://revinn.net/web/js/popper.min.js"></script>
    <script src="https://revinn.net/web/js/bootstrap.min.js"></script>
    <script src="https://revinn.net/web/js/owl.carousel.min.js"></script>
    <script src="https://revinn.net/web/js/main.js"></script>
    <script src="https://revinn.net/web/js/wow.js"></script>
    <script src="https://revinn.net/web/js/script.js"></script>

    <script>
        $(document).ready(function () {
            $('#search_word').keypress(function (event) {
                var keycode = (event.keyCode ? event.keyCode : event.which);
                if (keycode == '13') {
                    search();
                }
            });
            $('#search').on('click', function (e) {
                e.preventDefault()
                search();
            });


            function search() {
                word = $('#search_word').val()
                $.ajax({
                    url: "https://revinn.net/search",
                    method: 'GET',
                    dataType: 'json',
                    data: {
                        word: word,
                        _token: "DWdqXme0hKCav9hZC2vrHFEaLjX3AyEtGHSPkBBN",
                    },
                    success: function (data) {
                        if ("print" == 'print-collateral') {
                            $('#banners').empty();
                            $('#sort_container').empty();
                            $('#for_search').empty();
                            if (data.data.length) {
                                $.each(data.data, function (k, product) {
                                    let design_url = 'https://revinn.net/design//:slug?%3Aid=%3Aid';
                                    design_url = design_url.replace(':id', product.id);
                                    design_url = design_url.replace(':slug', product.slug);
                                    let print_url = 'https://revinn.net/print//:slug?%3Aid=%3Aid';
                                    print_url = print_url.replace(':id', product.id);
                                    print_url = print_url.replace(':slug', product.slug);
                                    let rate = '';
                                    for (var i = 1; i <= 5; i++) {
                                        if (i <= product.rate) {
                                            rate = rate + '<span class="fas fa-star text-warning"></span>';
                                        } else {
                                            rate = rate + '<span class="far fa-star"></span>';
                                        }
                                    }
                                    $('#for_search').append('<div class="col-md-4 col-6 mb-5">' +
                                        '<div class="iconbox">' +
                                        '   <div class="icon-body mb-3">' +
                                        '       <img class="img-fluid" src="' + product.icon + '" alt="Design Packages">' +
                                        '   </div>' +
                                        '   <div class="col-md-12"><h5>' + product.name + '</h5></div>' +
                                        '   <div class="col-md-12 mb-2"><div class="row"><div class="col-md-6"> ' +
                                        '   <strong>' + product.final_price + 'ر.س</strong></div>' +
                                        '   <div class="col-md-6"> <div class="re-salary mt-2">' +
                                        '   <div style="direction: ltr;">' + rate + '</div></div></div></div> </div>' +
                                        '   <div class="icon-footer btn-foot">' +
                                        '       <a href="' + design_url + '" class="btn btn-more">تصميم</a>' +
                                        '       <a href="' + print_url + '" class="btn btn-more">طباعة</a>' +
                                        '   </div>' +
                                        '</div>' +
                                        '</div>');
                                })
                            } else {
                                $('#for_search').append('<div class="col-md-12 text-center">' + "لا توجد بيانات حول" + '<strong>  ' + word + '</strong></div>');
                            }
                        } else {
                            window.location.replace("https://revinn.net/products");

                        }
                    },
                    error: function (data) {
                        console.log(data);
                    }
                });
            }
        })

    </script>
    <script>
        new WOW().init();

        $(".ti-plus").click(function () {
            $(this).parent().parent().find(".f-menu").slideToggle();
        });


        $(document).ready(function () {
            $('[data-toggle="tooltip"]').tooltip();
        });

    </script>
    <script src="https://revinn.net/web/js/jquery.ui.widget.js"></script>
    <script src="https://revinn.net/web/js/jquery.fileupload.js"></script>
    <script src="https://revinn.net/web/js/jquery.iframe-transport.js"></script>
    <script src="https://revinn.net/web/js/jquery.fancy-fileupload.js"></script>
    <script src="https://revinn.net/web/js/jquery-fancy-fileupload-ar.js"></script>
    <script src="https://revinn.net/web/js/jquery.validate.min.js" type="text/javascript"></script>
    <script>
        var KTFormControls = function () {
            // Private functions
            var store = function () {
                $("#submitTheForm").validate({
                    // define validation rules
                    rules: {
                        email: {
                            required: true,
                            email: true,
                        }, company_name: {
                            required: true,
                            minlength: 2
                        }, width: {
                            required: true,
                        }, height: {
                            required: true,
                        }, phone: {
                            required: true,
                            minlength: 10,
                            maxlength: 10,
                        }
                    },
                    messages: {
                        email: {
                            email: "الإيميل غير صحيح",
                            required: "الايميل مطلوب",
                        },
                        width: {
                            required: "العرض مطلوب",
                        },
                        height: {
                            required: "الطول مطلوب",
                        },
                        company_name: {
                            minlength: "اسم الشركة يجب أن يحتوي على الأقل من حرفين",
                            required: "اسم الشركة مطلوب",
                        },
                        phone: {
                            maxlength: "رقم الجوال يجب أن يكون من 10 أرقام",
                            minlength: "رقم الجوال يجب أن يكون من 10 أرقام",
                            required: "رقم الجوال مطلوب",
                        },

                    },
                    //display error alert on form submit
                    invalidHandler: function (event, validator) {
                    },

                    submitHandler: function (form) {
                        //form[0].submit(); // submit the form
                        //form.submit();

                    },
                    errorPlacement: function (error, element) {
                        $(element).addClass('is-invalid');
                        error.appendTo(element.parent("div"));
                    },
                    success: function (label, element) {
                        $(element).removeClass('is-invalid');
                    }
                });
            }

            return {
                // images functions
                init: function () {
                    store();
                }
            };
        }();

        jQuery(document).ready(function () {
            //KTFormControls.init();
        });
    </script>
    <script>
        var files_names = {};
        var design_files_names = {
            'design_image': '',
            'design_content': '',
        };
        $(document).on('click', '.ff_fileupload_remove_file', function () {
            console.log(files_names);
            console.log($(this).closest('tr'));
            let id = $(this).closest('tr').attr('id');
            delete files_names[id];
            console.log(files_names, Object.keys(files_names));
            if (Object.keys(files_names).length > 0) {
                $('.add-print').attr('disabled', false);
            } else {
                $('.add-print').attr('disabled', true);
            }
        });
        $(function () {
            var token = "DWdqXme0hKCav9hZC2vrHFEaLjX3AyEtGHSPkBBN";
            $('#file-3').FancyFileUpload({
                params: {
                    action: 'fileuploader',
                    _token: token,
                },
                'accept': ['pdf', 'jpeg', 'jpg', 'png', 'ai', 'psd', 'tiff', 'eps', 'png'],
                maxfilesize: 10000000,
                'fileupload': {},
                'url': "https://revinn.net/upload-file-ajax",
                added: function (e, data) {
                    let inforow = data.ff_info.inforow;
                    if (Object.keys(data.ff_info.errors).length > 0) {
                        if ($('.ff_fileupload_dropzone_design_content').hasClass('border-success')) {
                            $('.ff_fileupload_dropzone_design_content').removeClass('border-success');
                        }
                        $('.ff_fileupload_dropzone_design_content').addClass('border-danger');
                        $('.ff_fileupload_dropzone_design_content .fa-check').remove();
                        $('.ff_fileupload_dropzone_design_content .fa-times').remove();
                        $('.ff_fileupload_dropzone_design_content').append('<i class="fa fa-times text-danger float-left"></i>');
                        $('.content_errors').empty();
                        $.each(data.ff_info.errors, function (k, error) {
                            $('.content_errors').append('<span class"text-danger invalid-feedback d-block">' + error + '</span>');
                        })
                    } else {
                        $(inforow).find('.ff_fileupload_start_upload').trigger('click');
                    }
                },

                continueupload: function (e, data) {

                    var ts = Math.round(new Date().getTime() / 1000);
                    // Alternatively, just call data.abort() or return false here to terminate the upload but leave the UI elements alone.
                    if (token.expires < ts) data.ff_info.RemoveFile();
                    if ($('.ff_fileupload_dropzone_design_content .spinner-border').hasClass('d-none')) {
                        $('.ff_fileupload_dropzone_design_content .spinner-border').removeClass('d-none')
                    }
                },

                // called whenever an upload has successfully completed
                uploadcompleted: function (e, data) {
                    // do something
                    design_files_names['design_content'] = data.result.data.name;
                    $(data.ff_info.inforow).attr('id', data._time);
                    console.log(design_files_names);
                    $('.content_errors').empty();
                    if ($('.ff_fileupload_dropzone_design_content').hasClass('border-danger')) {
                        $('.ff_fileupload_dropzone_design_content').removeClass('border-danger');
                    }
                    $('.ff_fileupload_dropzone_design_content .spinner-border').addClass('d-none');
                    $('.ff_fileupload_dropzone_design_content .fa-times').remove();
                    $('.ff_fileupload_dropzone_design_content .fa-check').remove();
                    $('.ff_fileupload_dropzone_design_content').addClass('border-success')
                    $('.ff_fileupload_dropzone_design_content').append('<i class="fa fa-check text-success float-left"></i>')
                },
            });
            $('#file-2').FancyFileUpload({
                params: {
                    action: 'fileuploader',
                    _token: token,
                },
                'accept': ['pdf', 'jpeg', 'jpg', 'SVG', 'RAW', 'PSD', 'jpeg', 'HEIC', 'ai', 'png'],
                maxfilesize: 10000000,
                'fileupload': {},
                'url': "https://revinn.net/upload-file-ajax",
                added: function (e, data) {
                    let inforow = data.ff_info.inforow;
                    if (Object.keys(data.ff_info.errors).length > 0) {
                        if ($('.ff_fileupload_dropzone_design_content').hasClass('border-success')) {
                            $('.ff_fileupload_dropzone_design_content').removeClass('border-success');
                        }
                        $('.ff_fileupload_dropzone_design_content').addClass('border-danger');
                        $('.ff_fileupload_dropzone_design_content .fa-check').remove();
                        $('.ff_fileupload_dropzone_design_content .fa-times').remove();
                        $('.ff_fileupload_dropzone_design_content').append('<i class="fa fa-times text-danger float-left"></i>');
                        $('.content_errors').empty();
                        $.each(data.ff_info.errors, function (k, error) {
                            $('.content_errors').append('<span class"text-danger invalid-feedback d-block">' + error + '</span>');
                        })
                    } else {
                        $(inforow).find('.ff_fileupload_start_upload').trigger('click');
                    }
                },
                continueupload: function (e, data) {
                    var ts = Math.round(new Date().getTime() / 1000);
                    // Alternatively, just call data.abort() or return false here to terminate the upload but leave the UI elements alone.
                    if (token.expires < ts) data.ff_info.RemoveFile();
                },
                // called whenever an upload has successfully completed
                uploadcompleted: function (e, data) {
                    // do something
                    files_names[data._time] = data.result.data.name;
                    console.log(files_names, Object.keys(files_names));
                    $(data.ff_info.inforow).attr('id', data._time);
                    if (Object.keys(files_names).length > 0) {
                        $('.add-print').attr('disabled', false);
                    } else {
                        $('.add-print').attr('disabled', true);
                    }

                },
                // called whenever an upload has been cancelled
                uploadcancelled: function (e, data) {
                },

            });
            $('#file-1').FancyFileUpload({
                params: {
                    action: 'fileuploader',
                    _token: token,
                },
                'accept': ['jpg', 'jpeg', 'SVG', 'RAW', 'PSD', 'jpeg', 'HEIC', 'ai', 'png'],
                maxfilesize: 10000000,
                'fileupload': {},
                'url': "https://revinn.net/upload-file-ajax",
                added: function (e, data) {
                    let inforow = data.ff_info.inforow;
                    if (Object.keys(data.ff_info.errors).length > 0) {
                        if ($('.ff_fileupload_dropzone_design_image').hasClass('border-success')) {
                            $('.ff_fileupload_dropzone_design_image').removeClass('border-success');
                        }
                        $('.ff_fileupload_dropzone_design_image').addClass('border-danger');
                        $('.ff_fileupload_dropzone_design_image .fa-check').remove();
                        $('.ff_fileupload_dropzone_design_image .fa-times').remove();
                        $('.ff_fileupload_dropzone_design_image').append('<i class="fa fa-times text-danger float-left"></i>');
                        $('.errors').empty();
                        $.each(data.ff_info.errors, function (k, error) {
                            $('.errors').append('<span class"text-danger invalid-feedback d-block">' + error + '</span>');
                        })
                    } else {
                        $(inforow).find('.ff_fileupload_start_upload').trigger('click');
                    }
                },

                continueupload: function (e, data) {

                    var ts = Math.round(new Date().getTime() / 1000);
                    // Alternatively, just call data.abort() or return false here to terminate the upload but leave the UI elements alone.
                    if (token.expires < ts) data.ff_info.RemoveFile();
                    if ($('.ff_fileupload_dropzone_design_image .spinner-border').hasClass('d-none')) {
                        $('.ff_fileupload_dropzone_design_image .spinner-border').removeClass('d-none')
                    }
                },
                // called whenever an upload has successfully completed
                uploadcompleted: function (e, data) {
                    // do something
                    design_files_names['design_image'] = data.result.data.name;
                    $(data.ff_info.inforow).attr('id', data._time);
                    console.log(design_files_names);
                    $('.errors').empty();
                    if ($('.ff_fileupload_dropzone_design_image').hasClass('border-danger')) {
                        $('.ff_fileupload_dropzone_design_image').removeClass('border-danger');
                    }
                    $('.ff_fileupload_dropzone_design_image .spinner-border').addClass('d-none');
                    $('.ff_fileupload_dropzone_design_image .fa-times').remove();
                    $('.ff_fileupload_dropzone_design_image .fa-check').remove();
                    $('.ff_fileupload_dropzone_design_image').addClass('border-success')
                    $('.ff_fileupload_dropzone_design_image').append('<i class="fa fa-check text-success float-left"></i>')
                },
            });
        });
        var attrs_price = {
            0: {
                'price': 0,
                'quantity': 1,
                'total': 0,
                'type': 'unit',
            },
        };
        var order_obj = {};
        var is_there_properties = false;
        $(document).ready(function () {
            $('.ff_fileupload_dropzone_print .ff_fileupload_dropzone_wrap').addClass('d-none');
            $('.ff_fileupload_dropzone_design_image .ff_fileupload_wrap').addClass('d-none');
            $('.ff_fileupload_dropzone_design_content .ff_fileupload_wrap').addClass('d-none');
            if ("") {
                order_obj = "null";
                order_obj = JSON.parse(order_obj.replace(/&quot;/g, '"'));
                console.log(order_obj);
            } else {
                order_obj = {
                    product_id: "43",
                    specifications: {
                        attributes: {},
                        properties: {
                            color: {},
                            size: {},
                            paperType: {},
                            printFace: {},
                            weight: {},
                            thermalPackaging: {},
                            pagesNum: {},
                            sectionsNum: {},
                            edges: {},
                        },
                    },
                    quantity: {
                        quantity_price: 0,
                        quantity_id: 0,
                        papers_quantity: 1,
                        type: 'select',
                    },
                    additionalFields: {
                        dimention1: {
                            data: {},
                            price: 0,
                            id: -1,
                        },
                        dimention2: {
                            data: {},
                            price: 0,
                            id: -1,
                        },
                        dimention3: {
                            data: {},
                            price: 0,
                            id: -1,
                        },
                        other: {
                            data: {},
                            price: 0,
                        },
                    },
                    final_price: 0,
                    type: '',
                };
            }
            $(function () {
                $.ajax({
                    url: "https://revinn.net/product/43",
                    method: 'GET',
                    dataType: 'json',
                    data: {},
                    success: function (data) {
                        let info = data.data;
                        if (data.success) {
                            if (info.product.category) {
                                $('.page-header p').append(info.product.category.name);
                            }
                            //product Details
                            $('.footnote').append(info.product.footnote);
                            $('.expected_value').append(info.product.expected_value)
                            $('.product-name').append(info.product.name);
                            $('.prot-price').append('<span id="main-price" price="' + 0 + '">' + 0 + '</span>');
                            $('.product-desc').append(info.product.description);
                            // $('.big-img').append('<img class="img-fluid detailsbigimg expandedImg  animate__animated animate__fadeIn" src="' + info.images[0].image)+ '" >')
                            if (info.images.length != 1) {
                                $.each(info.images, function (key, content) {
                                    images = '';
                                    images = images + '<div class="item"><div class="mt-3"><img src="images/' + content.image + '"  height="100" width="100%" onclick="myFunction(this);"></div></div>';
                                    $('#product-pic').owlCarousel('add', images).owlCarousel('refresh');
                                    $('#product-pic-responsive').owlCarousel('add', images).owlCarousel('refresh');
                                })
                            }

                            //attributes
                            var quantity = "الكمية المتوفرة";
                            var color_title = "اللون";
                            var size_title = "مقاس";
                            var paper_type_title = "نوع الورق/ المادة";
                            var print_face_title = "أوجه الطباعة";
                            var weight_title = "الوزن";
                            var thermal_packaging_title = "تغليف حراري ";
                            var edges_title = "الحواف";
                            var pages_num_title = " عدد الصفحات";
                            var sections_num_title = " عدد الطويات";
                            var quantity_title = "العدد";
                            //intialize an object for all attributes keys + color + size. this objects will update its values rely on selected attrribute
                            if (info.attribute.length) {
                                if ($('#prod-attributes').parent().hasClass('d-none'))
                                    $('#prod-attributes').parent().removeClass('d-none');
                            }
                            $.each(info.attribute, function (key, content) {
                                let unit = 0;
                                if (content.unit_id) {
                                    //mofified 28-5-2020
                                    if (content.additional_field == null)
                                        unit = 0
                                    else
                                        unit = content.unit_id;
                                }
                                is_there_properties = true;
                                let values = '';
                                str = '<div  class="parent-att"><strong>' + content.name + ':</strong>';
                                //add all attributes to array
                                //price_obj[key] = 0;
                                $.each(content.attributes, function (a, attr) {
                                    let basic = '';
                                    if (attr.basic_attribute) {
                                        basic = 'basic';
                                    }
                                    str = str + '<button class="btn btn-light  ml-1 mr-1 text-muted ' + basic + '" af-id="' + unit + '"  data-price="' + attr.price + '" data-specType="attributes" data-attrId="' + content.id + '" data-valueId="' + attr.id + '">' + attr.name + '</button>';
                                });
                                str = str + '</div>';
                                $('#prod-attributes').append(str);
                            });
                            var quantity_added = false;
                            $.each(info.quantities, function (key, quantity) {
                                if (!quantity_added) {
                                    if ($('#quantities').parent().hasClass('d-none'))
                                        $('#quantities').parent().removeClass('d-none');
                                    $('#quantities').append('<strong><img class="p-1" src="https://revinn.net/web/img/quantity.svg"/>اختر  ' + quantity_title + '</strong>')
                                    quantity_added = true;
                                }
                                $('#quantities').append('<button class="btn btn-light mr-1 ml-1 text-muted" data-f-price="' + quantity.price + '" af-id="0" data-quaId="' + quantity.id + '" data-price="' + quantity.price + '" class="btn-col"   data-papers = "' + quantity.quantity + '" >' + quantity.quantity + '</button>');

                            });
                            $($('#quantities').find('button').first()).trigger("click");
                            var color_added = false;
                            var size_added = false;
                            var paper_type_added = false;
                            var print_face_added = false;
                            var thermal_packaging_added = false;
                            var weight_added = false;
                            var edges_added = false;
                            var sections_num_added = false;
                            var pages_num_added = false;
                            var tow_d_added = false;
                            var dimen = false;
                            var three_d_added = false;
                            var quantity_field = false;
                            var quantity_input = '';
                            $.each(info.properties, function (key, property) {
                                let unit = 0;
                                let basic = '';
                                if (property.basic_attribute) {
                                    basic = 'basic';
                                }
                                if (property.unit_id) {
                                    if (property.additional_field == null || property.additional_field.type == 4)
                                        unit = 0
                                    else
                                        unit = property.unit_id;
                                }
                                if (!property.dimentions) {
                                    property.dimentions = [null, null, null]
                                }
                                is_there_properties = true;
                                if (property.type == 1) {
                                    if (!color_added) {
                                        if ($('#color-prop').parent().hasClass('d-none'))
                                            $('#color-prop').parent().removeClass('d-none');
                                        $('#color-prop > ul').append('<strong>اختر  ' + color_title + '</strong>')
                                        color_added = true;
                                    }
                                    $('#color-prop > ul').append('<button  class="' + basic + '" data-specType="properties" af-id="' + unit + '" data-attrId="' + property.id + '" data-price="' + property.price + '" class="btn-col" added-price = "' + property.price + '"  added-id = "' + property.id + '" added-type = "' + property.type + '" style=" background-color:' + property.color + '" ></button>');
                                } else if (property.type == 2) {
                                    if (!size_added) {
                                        if ($('#size-prop').parent().hasClass('d-none'))
                                            $('#size-prop').parent().removeClass('d-none');
                                        $('#size-prop').append('<strong ><img class="p-1" src="https://revinn.net/web/img/size.svg"/>اختر ' + size_title + '</strong>')
                                        size_added = true;
                                    }
                                    $('#size-prop').append('<button class="btn btn-light mr-1 ml-1 text-muted ' + basic + '" dim1="' + property.dimentions[0] + '" dim2="' + property.dimentions[1] + '" dim3="' + property.dimentions[2] + '" af-id="' + unit + '" data-specType="properties" data-attrId="' + property.id + '" data-price="' + property.price + '" added-price = "' + property.price + '" added-id = "' + property.id + '" added-type = "' + property.type + '">' + property.name + '</button>');
                                } else if (property.type == 3) {
                                    if (!paper_type_added) {
                                        if ($('#paper-type-prop').parent().hasClass('d-none'))
                                            $('#paper-type-prop').parent().removeClass('d-none');
                                        $('#paper-type-prop').append('<strong><img class="p-1" src="https://revinn.net/web/img/material.svg"/>اختر ' + paper_type_title + '</strong>')
                                        paper_type_added = true;
                                    }
                                    $('#paper-type-prop').append('<button class="btn btn-light mr-1 ml-1 text-muted ' + basic + '" af-id="' + unit + '" data-specType="properties" data-attrId="' + property.id + '" data-price="' + property.price + '" added-price = "' + property.price + '" added-id = "' + property.id + '" added-type = "' + property.type + '">' + property.name + '</button>');
                                } else if (property.type == 4) {
                                    if (!print_face_added) {
                                        if ($('#print-face-prop').parent().hasClass('d-none'))
                                            $('#print-face-prop').parent().removeClass('d-none');
                                        $('#print-face-prop').append('<strong><img class="p-1" src="https://revinn.net/web/img/sides.svg"/>اختر ' + print_face_title + '</strong>')
                                        print_face_added = true;
                                    }
                                    $('#print-face-prop').append('<button class="btn btn-light mr-1 ml-1 text-muted' + basic + '" af-id="' + unit + '" data-specType="properties" data-attrId="' + property.id + '" data-price="' + property.price + '" added-price = "' + property.price + '" added-id = "' + property.id + '" added-type = "' + property.type + '">' + property.name + '</button>');
                                } else if (property.type == 5) {
                                    if (!weight_added) {
                                        if ($('#weight-prop').parent().hasClass('d-none'))
                                            $('#weight-prop').parent().removeClass('d-none');
                                        $('#weight-prop').append('<strong><img class="p-1" src="https://revinn.net/web/img/sides.svg"/>اختر ' + weight_title + ':</strong>')
                                        weight_added = true;
                                    }
                                    $('#weight-prop').append('<button class="btn btn-light mr-1 ml-1 text-muted" af-id="' + unit + '" data-specType="properties" data-attrId="' + property.id + '" data-price="' + property.price + '" added-price = "' + property.price + '" added-id = "' + property.id + '" added-type = "' + property.type + '">' + property.name + '</button>');
                                } else if (property.type == 6) {
                                    if (!edges_added) {
                                        if ($('#edges-prop').parent().hasClass('d-none'))
                                            $('#edges-prop').parent().removeClass('d-none');
                                        $('#edges-prop').append('<strong><img class="p-1" src="https://revinn.net/web/img/sides.svg"/>اختر ' + edges_title + '</strong>')
                                        edges_added = true;
                                    }
                                    $('#edges-prop').append('<button class="btn btn-light mr-1 ml-1 text-muted ' + basic + '" af-id="' + unit + '" data-specType="properties" data-attrId="' + property.id + '" data-price="' + property.price + '" added-price = "' + property.price + '" added-id = "' + property.id + '" added-type = "' + property.type + '">' + property.name + '</button>');
                                } else if (property.type == 7) {
                                    if (!thermal_packaging_added) {
                                        if ($('#thermal-packaging-prop').parent().hasClass('d-none'))
                                            $('#thermal-packaging-prop').parent().removeClass('d-none');
                                        $('#thermal-packaging-prop').append('<strong><img class="p-1" src="https://revinn.net/web/img/sides.svg"/>اختر ' + thermal_packaging_title + ':</strong>')
                                        thermal_packaging_added = true;
                                    }
                                    $('#thermal-packaging-prop').append('<button class="btn btn-light mr-1 ml-1 text-muted ' + basic + '" af-id="' + unit + '" data-specType="properties" data-attrId="' + property.id + '" data-price="' + property.price + '" added-price = "' + property.price + '" added-id = "' + property.id + '" added-type = "' + property.type + '">' + property.name + '</button>');
                                } else if (property.type == 8) {
                                    if (!pages_num_added) {
                                        if ($('#pages-num-prop').parent().hasClass('d-none'))
                                            $('#pages-num-prop').parent().removeClass('d-none');
                                        $('#pages-num-prop').append('<strong><img class="p-1" src="https://revinn.net/web/img/sides.svg"/>اختر ' + pages_num_title + ':</strong>')
                                        pages_num_added = true;
                                    }
                                    $('#pages-num-prop').append('<button class="btn btn-light mr-1 ml-1  text-muted ' + basic + '" af-id="' + unit + '" data-specType="properties" data-attrId="' + property.id + '" data-price="' + property.price + '" added-price = "' + property.price + '" added-id = "' + property.id + '" added-type = "' + property.type + '">' + property.name + '</button>');
                                } else if (property.type == 9) {
                                    if (!sections_num_added) {
                                        if ($('#sections-num-prop').parent().hasClass('d-none'))
                                            $('#sections-num-prop').parent().removeClass('d-none');
                                        $('#sections-num-prop').append('<strong><img class="p-1" src="https://revinn.net/web/img/sides.svg"/>اختر ' + sections_num_title + ':</strong>')
                                        sections_num_added = true;
                                    }
                                    $('#sections-num-prop').append('<button class="btn btn-light mr-1 ml-1 text-muted ' + basic + '" af-id="' + unit + '" data-specType="properties" data-attrId="' + property.id + '" data-price="' + property.price + '" added-price = "' + property.price + '" added-id = "' + property.id + '" added-type = "' + property.type + '">' + property.name + '</button>');
                                }
                            });
                            var input = '<div class="row">';
                            var dimentions = '<div class="row">';
                            $.each(info.additional_fields, function (key, field) {
                                attrs_price[field.id] = {'price': 0, 'quantity': 1, 'total': 0, 'type': '',};

                                $.each(field.name, function (key, value) {
                                    min = 1;
                                    max = 'مفتوح';
                                    if (field.maximum_quantity) {
                                        max = field.maximum_quantity;
                                    }
                                    if (field.minimum_quantity) {
                                        min = field.minimum_quantity;
                                    }
                                    if (field.type == 4) {
                                        if (!quantity_field) {
                                            if ($('#quantity-field').parent().hasClass('d-none'))
                                                $('#quantity-field').parent().removeClass('d-none');
                                            $('#quantity-field').append('<strong ><img class="p-1" src="https://revinn.net/web/img/quantity.svg"/>أدخل الكمية:</strong>')
                                            quantity_field = true;
                                        }
                                        quantity_input += '<div class="col-md-12 p-1"><input class="form-control"   data-toggle="tooltip" data-placement="bottom" id="af_quantity" type="number" step="1" min="' + field.minimum_quantity + '"  max="' + field.maximum_quantity + '" value="' + field.minimum_quantity + '" name = "' + value + field.id + '" data-key="' + value + '" data-specType="quantity" data-attrId="' + value + field.id + '" data-price="' + field.price + '" data-id = "' + field.id + '" data-type = "' + field.type + '" placeholder="' + value + '"/></div></div><div class="col-md-12 mt-2">الحد المسموح به للكمية ' + min + ' - ' + max + '</div>';
                                    } else if (field.type == 1) {
                                        if (!dimen) {
                                            if ($('#dimentions-fields').hasClass('d-none'))
                                                $('#dimentions-fields').removeClass('d-none');
                                            if ($('#size-prop').parent().hasClass('d-none'))
                                                $('#size-prop').parent().removeClass('d-none');
                                            dimen = true;
                                        }
                                        dimentions += '<div class="col-md-12 p-1"><input class="form-control dimentions dimention1  d' + (key + 1) + '" data-toggle="tooltip" data-placement="top" type="number" step="0.01" min="' + field.minimum_quantity + '" max="' + field.maximum_quantity + '"  name = "' + value + field.id + '" data-key="' + value + '" data-specType="dimentions" data-attrId="' + key + '" data-price="' + field.price + '"  data-id = "' + field.id + '" data-type = "' + field.type + '" placeholder="' + value + '"/></div>';
                                    } else if (field.type == 2) {
                                        if (!dimen) {
                                            if ($('#dimentions-fields').hasClass('d-none'))
                                                $('#dimentions-fields').removeClass('d-none');
                                            if ($('#size-prop').parent().hasClass('d-none'))
                                                $('#size-prop').parent().removeClass('d-none');
                                            dimen = true;
                                        }
                                        $('#dim-sup').empty();
                                        $('#dim-sup').append(2);
                                        dimentions += '<div class="col-md-6 p-1"><input class="form-control dimentions dimention2 d' + (key + 1) + '" data-toggle="tooltip" data-placement="top" type="number" step="0.01" min="' + field.minimum_quantity + '" max="' + field.maximum_quantity + '"  name = "' + value + field.id + '" data-key="' + value + '" data-specType="dimentions" data-attrId="' + key + '" data-price="' + field.price + '" data-id = "' + field.id + '"  data-type = "' + field.type + '" placeholder="' + value + '"/></div>';
                                    } else if (field.type == 3) {
                                        if (!dimen) {
                                            if ($('#dimentions-fields').hasClass('d-none'))
                                                $('#dimentions-fields').removeClass('d-none');
                                            if ($('#size-prop').parent().hasClass('d-none'))
                                                $('#size-prop').parent().removeClass('d-none');
                                            dimen = true;
                                        }
                                        $('#dim-sup').empty();
                                        $('#dim-sup').append(3);
                                        dimentions += '<div class="col-md-4 p-1"><input class="form-control dimentions dimention3  d' + (key + 1) + '" type="number"  data-toggle="top" data-placement="bottom" step="0.01" min="' + field.minimum_quantity + '" max="' + field.maximum_quantity + '"  name = "' + value + field.id + '" data-key="' + value + '" data-specType="dimentions" data-attrId="' + key + '" data-price="' + field.price + '" data-id = "' + field.id + '"  data-type = "' + field.type + '" placeholder="' + value + '"/></div>';
                                    } else {
                                        if (!tow_d_added) {
                                            if ($('#additional-fields').parent().hasClass('d-none'))
                                                $('#additional-fields').parent().removeClass('d-none');
                                            $('#additional-fields').append('<strong ><img class="p-1" src="https://revinn.net/web/img/quantity.svg"/>' + value + '</strong>')
                                            tow_d_added = true;
                                        }
                                        input += '<div class="col-md-12 p-1"><input class="form-control other" type="number" step="1" min="' + field.minimum_quantity + '" max="' + field.maximum_quantity + '"  name = "' + value + field.id + '" data-key="' + value + '" data-specType="dimentions" data-attrId="' + key + '" data-price="' + field.price + '" data-id = "' + field.id + '"  data-type = "' + field.type + '" placeholder="' + value + '"/></div><div class="col-md-12 mt-2">الحد المسموح به للكمية ' + min + ' - ' + max + '</div>';
                                    }
                                });
                                if (field.type == 4) {
                                    $('#quantities').remove();
                                    order_obj['quantity'] = {
                                        quantity_price: field.price,
                                        quantity_id: 0,
                                        papers_quantity: field.minimum_quantity,
                                        type: 'input',
                                    }
                                    $('#af_quantity').val(field.minimum_quantity);
                                    printPrice(0);

                                }

                            });

                            $('#additional-fields').append(input + '</div>');
                            $('#quantity-field').append(quantity_input + '</div>');
                            $('#dimentions-fields').append(dimentions + '</div>');

                            //initializations
                            /*        $('#color-prop').find('button').first().trigger("click");
                                   $('#size-prop').find('button').first().trigger("click");
                                   $('#paper-type-prop').find('button').first().trigger("click");
                                   $('#print-face-prop').find('button').first().trigger("click");
                                   $('#weight-prop').find('button').first().trigger("click");
                                   $('#edges-prop').find('button').first().trigger("click");
                                   $('#thermal-packaging-prop').find('button').first().trigger("click");
                                   $('#pages-num-prop').find('button').first().trigger("click");
                                   $('#sections-num-prop').find('button').first().trigger("click"); */

                            /* initalize_attributes = $('.parent-att')
                            $.each(initalize_attributes,function(k,attr){
                                $(attr).find('button').first().trigger("click");
                            }); */
                            $('.product-in .basic').trigger("click");

                            $('#additional-fields  .other').val(eval($('#additional-fields  .other').attr('min')));
                            $('#additional-fields  .other').trigger('keyup')
                            $('#quantity-field  #af_quantity').val(eval($('#quantity-field #af_quantity').attr('min')));

                            //suggestions
                            $.each(info.suggestions, function (key, product) {
                                let rate = '';
                                for (i = 1; i <= 6; i++) {
                                    if (i <= product.rate)
                                        rate += '<i class= "fa fa-star d-none" style="font-size: 12px"></i>';
                                    else
                                        rate += '<i class= "far fa-star d-none " style="font-size: 12px"></i>';

                                }
                                $('#suggestions').owlCarousel('add', '<div class=" item  mb-4"><a href="' + window.location.origin + '/print/' + product.id + '/' + product.slug + '" >' +
                                    '<div class="related-box p-3">' +
                                    '<img class="img-fluid" alt="' + product.name + '" src="' + window.location.origin + '/' + product.icon + '"/>' +

                                    '</div>' +
                                    '</a></div>' + '<a href="' + window.location.origin + '/print/' + product.id + '/' + product.slug + '" ><div class=" boxall float-right mb-2 ">' + product.name + '</div></a><div class="boxall float-left"' +
                                    rate + '<strong class=" mt-2 "style="font-size: 13px">' + product.final_price + "ريال" + '</strong></div>').owlCarousel('update');

                            });
                            for (i = 1; i <= 5; i++) {
                                if (i <= info.rate)
                                    $('#product_rate').append('<i class= "fa d-none fa-star mb-3"></i>');
                                else
                                    $('#product_rate').append('<i class= "far d-none fa-star mb-3"></i>');

                            }
                            $('#reviews_count').append(info.rate_count);
                        }
                    },
                    error: function () {
                        console.log('error')
                    }
                });
            });

            if ("") {
                $("#model-show").show("fast");
            }
            $('#enable_color').change(function () {
                $('#favcolorsec').prop("disabled", !this.checked);
            });
            $('#quantity-field').on('keyup', '#af_quantity', function () {
                let val = $(this).val();
                checkRange($(this), val);
                order_obj['quantity']['papers_quantity'] = val;
                order_obj['quantity']['quantity_price'] = $('#af_quantity').attr('data-price');
                order_obj['quantity']['type'] == 'input'
                printPrice(0);
            });
            $('#dimentions-fields').on('keyup', '.dimention1', function () {
                let val = 0;
                if ($(this).val() != '') {
                    val = $(this).val();
                }

                checkRange($(this), val);

                order_obj['additionalFields']['dimention1']['data'][$(this).attr('data-key')] = val;
                order_obj['additionalFields']['dimention1']['id'] = $(this).attr('data-id');
                order_obj['additionalFields']['dimention1']['price'] = $(this).attr('data-price');
                $('#size-prop').children('button').removeClass("bord");
                order_obj.specifications.properties.size = {};
                order_obj['quantity']['type'] = 'input';
                printPrice(0);
            });
            $('#dimentions-fields').on('keyup', '.dimention2', function () {
                let val = 0;
                if ($(this).val() != '') {
                    val = $(this).val();
                }
                checkRange($(this), val);
                order_obj['additionalFields']['dimention2']['data'][$(this).attr('data-key')] = val;
                order_obj['additionalFields']['dimention2']['id'] = $(this).attr('data-id');
                order_obj['additionalFields']['dimention2']['price'] = $(this).attr('data-price');
                $('#size-prop').children('button').removeClass("bord");
                order_obj.specifications.properties.size = {};
                order_obj['quantity']['type'] = 'input';
                printPrice(0);
                console.log(order_obj);
            });
            $('#dimentions-fields').on('keyup', '.dimention3', function () {
                let val = 0;
                if ($(this).val() != '') {
                    val = $(this).val();
                }
                checkRange($(this), val);

                order_obj['additionalFields']['dimention3']['data'][$(this).attr('data-key')] = val;
                order_obj['additionalFields']['dimention3']['id'] = $(this).attr('data-id');
                order_obj['additionalFields']['dimention3']['price'] = $(this).attr('data-price');
                $('#size-prop').children('button').removeClass("bord");
                order_obj.specifications.properties.size = {};
                order_obj['quantity']['type'] = 'input';
                printPrice(0);
                console.log(order_obj);
            });
            $('#additional-fields').on('keyup', '.other', function () {
                let val = 1;
                if ($(this).val() != '') {
                    val = $(this).val();
                }
                checkRange($(this), val);
                order_obj['additionalFields']['other']['data'][$(this).attr('data-key')] = {
                    id: 0,
                    data: '',
                };
                order_obj['additionalFields']['other']['data'][$(this).attr('data-key')]['data'] = val;
                order_obj['additionalFields']['other']['data'][$(this).attr('data-key')]['id'] = $(this).attr('data-id');
                order_obj['additionalFields']['other']['data'][$(this).attr('data-key')]['price'] = $(this).attr('data-price');
                order_obj['quantity']['type'] = 'input'
                printPrice(0);
            });
            /*select the item in Specifications in Business-Card Page*/
            $(".icon-box").on('click', function () {
                _this = $(this);
                if (_this.attr('data-type') == 'order_design') {
                    $("#model-show").show("fast");
                    $('html, body').animate({
                        scrollTop: $("#model-show").offset().top
                    }, 2000);
                    printPrice("100");
                } else {
                    $("#model-show").hide('fast');
                    order_obj.type = 'upload_design';
                    printPrice(0);
                }
            });
        });
        /*--select item from Quantities and Pickup Duration in n Business-Card Page*/
        $("#quantities").on('click', 'button', function () {
            _this = $(this);
            _this.parent().children().removeClass("bord");
            _this.addClass("bord");
            order_obj.quantity.quantity_id = _this.attr('data-quaId');
            order_obj.quantity.quantity_price = _this.attr('data-price');
            order_obj.quantity.papers_quantity = _this.attr('data-papers');
            printPrice(0);
        });

        $("#quantities").on('click', 'button', function () {
            _this = $(this);
            _this.parent().children().removeClass("bord");
            _this.addClass("bord");
            order_obj.quantity.quantity_id = _this.attr('data-quaId');
            order_obj.quantity.quantity_price = _this.attr('data-price');
            order_obj.quantity.papers_quantity = _this.attr('data-papers');
            printPrice(0);
        });
        /*--select img from Payment in print-confirmation Page*/
        $("#prod-attributes").on('click', 'button', function () {
            _this = $(this);
            value_id = _this.attr('data-valueId');
            spec_type = _this.attr('data-specType');
            attr_id = _this.attr('data-attrId');
            _this.parent().children().removeClass('bord');
            _this.addClass("bord");
            order_obj.specifications[spec_type][attr_id] = {};
            order_obj.specifications[spec_type][attr_id][value_id] = {};
            order_obj.specifications[spec_type][attr_id][value_id]['price'] = _this.attr('data-price');
            order_obj.specifications[spec_type][attr_id][value_id]['added_to'] = _this.attr('af-id');
            console.log(order_obj);

            printPrice(0);
        });
        $("#color-prop").on('click', 'button', function () {
            selectAttribute("#color-prop", 'color', $(this));
        });
        $("#size-prop").on('click', 'button', function () {
            let dim1 = $(this).attr('dim1')
            let dim2 = $(this).attr('dim2')
            let dim3 = $(this).attr('dim3')
            if ($('.d1'))
                $('.d1').val(dim1)
            if ($('.d2'))
                $('.d2').val(dim2)
            if ($('.d3'))
                $('.d3').val(dim3)
            let quantity = 1;
            console.log(dim1, dim2, dim3);
            if (eval(dim1)) {
                quantity *= eval(dim1);
                console.log(quantity);
            }
            ;
            if (eval(dim2)) {
                quantity *= eval(dim2);
                console.log(quantity);
            }
            ;
            if (eval(dim3)) {
                quantity *= eval(dim3);
                console.log(dim3 + 'jkhk');
            }
            ;

            if (!quantity) {
                quantity = 1;
            }
            console.log(quantity);
            if ($(this).attr('af-id') != 0) {
                attrs_price[$(this).attr('af-id')].quantity = quantity;
                attrs_price[$(this).attr('af-id')].price = eval($(this).attr('data-price')) / quantity
                attrs_price[$(this).attr('af-id')].type = 'cm';
            } else {
                console.log(eval($(this).attr('data-price')) + 'size');
                attrs_price[$(this).attr('af-id')].price += eval($(this).attr('data-price'))
            }
            selectAttribute("#size-prop", 'size', $(this));

        });
        $("#paper-type-prop").on('click', 'button', function () {
            console.log("bilal")
        });
        $("#print-face-prop").on('click', 'button', function () {
            selectAttribute("#print-face-prop", 'printFace', $(this));
        });
        $("#weight-prop").on('click', 'button', function () {
            selectAttribute("#weight-prop", 'weight', $(this));
        });
        $("#thermal-packaging-prop").on('click', 'button', function () {
            selectAttribute("#thermal-packaging-prop", 'thermalPackaging', $(this));

        });
        $("#edges-prop").on('click', 'button', function () {
            selectAttribute("#edges-prop", 'edges', $(this));

        });
        $("#pages-num-prop").on('click', 'button', function () {
            selectAttribute("#pages-num-prop", 'pagesNum', $(this));

        });
        $("#sections-num-prop").on('click', 'button', function () {
            selectAttribute("#sections-num-prop", 'sectionsNum', $(this));

        });

        function addToCart() {
            var prop = order_obj.specifications.properties;

            // var childrens_length = $('#paper-type-prop').children().length || $('#print-face-prop').children().length
            // || $('#weight-prop').children().length || $('#sections-num-prop').children().length ||
            // $('#pages-num-prop').children().length || $('#thermal-packaging-prop').children().length
            // || $('#edges-prop').children().length || $('#color').children().length || $('#prod-attributes').children().length;


            var is_prop_selected = Object.keys(prop['color']).length || Object.keys(prop['size']).length || Object.keys(prop['thermalPackaging']).length
                || Object.keys(prop['sectionsNum']).length || Object.keys(prop['pagesNum']).length || Object.keys(prop['edges']).length
                || Object.keys(prop['weight']).length || Object.keys(prop['paperType']).length || Object.keys(prop['printFace']).length;
            if (!Object.keys(order_obj.specifications.attributes).length && !is_prop_selected && is_there_properties) {
                $('#noPrpertiesSelected').modal({
                    backdrop: 'static',
                    keyboard: false
                });
            } else if ($('#af_quantity').val() == '' && order_obj.quantity.type == 'input') {
                $('#noQuantity').modal({
                    backdrop: 'static',
                    keyboard: false
                });
            } else {
                $('#requirments').val(JSON.stringify(order_obj));
                $('#files_names').val(JSON.stringify(files_names));
                $('#design_files_names').val(JSON.stringify(design_files_names));
                if (order_obj.type == 'order_design') {
                    if (!this.valid()) {
                        $('html, body').animate({
                            scrollTop: $("#submitTheForm").offset().top
                        }, 3000);
                    } else {
                        $("#submitTheForm").submit();
                    }

                } else {
                    $("#submitTheForm").submit();
                }

            }
        }

        function selectAttribute(dom, name, _this) {
            spec_type = _this.attr('data-specType');
            order_obj.specifications[spec_type][name] = {};
            id = _this.attr('data-attrId');
            _this.parent().children().removeClass("bord");
            _this.addClass("bord");
            order_obj.specifications[spec_type][name][id] = {};
            if (name == 'size') {
                let cms = attrs_price[_this.attr('af-id')]['quantity'];
                if (_this.attr('af-id') == 0) {
                    cms = 1;
                }
                if (!cms) {
                    cms = 1;
                }

                order_obj.specifications[spec_type][name][id]['price'] = _this.attr('data-price') / cms;
            } else {
                order_obj.specifications[spec_type][name][id]['price'] = _this.attr('data-price');
            }
            order_obj.specifications[spec_type][name][id]['added_to'] = _this.attr('af-id');

            printPrice(0);
        }

        function printPrice(designOrNot) {
            let f_price = eval(designOrNot);
            if (order_obj.type == 'order_design') {
                f_price = "100";
            } else {
                f_price = 0;
            }
            let quantity = order_obj.quantity.papers_quantity;
            let quantity_price = order_obj.quantity.quantity_price;
            let attr_price = 0;
            let total_price = 0;
            let page = 1;
            let unit = 1;
            attrs_price[0].quantity = eval(quantity);
            //attributes prices
            $.each(order_obj.specifications.attributes, function (key, value) {
                $.each(value, function (k, v) {
                    attr_price = eval(attr_price) + eval(v);
                })
            });
            attributes_price(order_obj.specifications.properties, order_obj.specifications.attributes, order_obj.additionalFields)
            $.each(attrs_price, function (attrK, attrV) {
                if (attrV.type == 'page')
                    page = attrV.quantity;
                if (attrV.type == 'unit') {
                    attrs_price[attrK]['quantity'] = order_obj.quantity.papers_quantity;
                    attrs_price[attrK]['total'] = order_obj.quantity.papers_quantity * attrs_price[attrK]['price'];
                    unit = order_obj.quantity.papers_quantity;
                }
            });
            $.each(attrs_price, function (attrK, attrV) {
                if (attrV.type == 'cm')
                    total_price += attrV.total * page * unit;
                else if (attrV.type == 'page')
                    total_price += attrV.total * unit;
                else
                    total_price += attrV.total

            });

            //finished append price
            $('.prot-price').empty();
            $('.prot-price').append(Math.ceil((eval(f_price) + eval(total_price) + eval(order_obj.quantity.quantity_price))));


        }


        function attributes_price(properties, attributes, additional_fields) {

            let units_count_price = 0;
            let other_units_count_price = 0;
            let units_count = 1;
            let other_units_count = 0;

            //reset prices to recalculate after adding new price
            $.each(attrs_price, function (attrK, attrV) {
                attrV['price'] = 0;
                attrV['total'] = 0;
            });
            //evelute the prices in order_obj for properties
            $.each(properties, function (key, value) {
                $.each(value, function (k, v) {
                    if (typeof attrs_price[v['added_to']] != 'undefined') {
                        old_price = attrs_price[v['added_to']]['price'];
                        attrs_price[v['added_to']]['price'] = eval(old_price) + eval(v['price']);
                        attrs_price[v['added_to']]['total'] = attrs_price[v['added_to']]['price'] * attrs_price[v['added_to']]['quantity'];
                    }
                });
            });
            //evelute the prices in order_obj for attributes
            $.each(attributes, function (key, value) {
                $.each(value, function (k, v) {
                    old_price = attrs_price[v['added_to']]['price'];
                    attrs_price[v['added_to']]['price'] = eval(old_price) + eval(v['price']);
                    attrs_price[v['added_to']]['total'] = attrs_price[v['added_to']]['price'] * attrs_price[v['added_to']]['quantity'];
                });
            });

            $.each(additional_fields, function (key, value) {
                if (key != 'other' && Object.keys(properties['size']).length == 0) {
                    $.each(value.data, function (k, v) {
                        units_count *= v;
                    });
                    if (attrs_price[value['id']]) {
                        attrs_price[value['id']]['quantity'] = units_count;
                        attrs_price[value['id']]['price'] += eval(value.price);
                        attrs_price[value['id']]['total'] = attrs_price[value['id']]['price'] * units_count;
                        attrs_price[value['id']]['type'] = 'cm';
                    }
                } else {
                    $.each(value.data, function (k, v) {
                        console.log(v.id)
                        if (attrs_price[v.id]) {
                            attrs_price[v.id]['quantity'] = eval(v.data);
                            attrs_price[v.id]['price'] += eval(v.price);
                            attrs_price[v.id]['total'] = attrs_price[v.id]['price'] * eval(v.data);
                            attrs_price[v.id]['type'] = 'page';
                            if (!attrs_price[v.id]['price']) {
                                attrs_price[v.id]['price'] = 1;
                            }
                        }
                    });
                }
            });
            console.log(attrs_price);
        }


        $(".upload_conditions").on('click', function (e) {
            $('#print_design_condtion').modal({
                backdrop: 'static',
                keyboard: false
            });
        });
        $("#checkbox_upload_cond").change(function () {
            if (this.checked) {
                $('#upload_image_cond').prop("disabled", false);
            } else {
                $('#upload_image_cond').prop("disabled", true);
            }
        });

        function myFunction(imgs) {
            var expandImg = document.getElementsByClassName("expandedImg");
            $.each(expandImg, function (k, img) {
                $('.big-img').empty();
                $('.big-img').append('<img class="img-fluid detailsbigimg expandedImg  animate__animated animate__fadeIn animate__delay-1.1s" src="' + imgs.src + '" >');


            });


        }

        function closeDesign() {
            $("#model-show").hide("fast");
            order_obj.type = 'upload_design';
            if (Object.keys(files_names).length == 0)
                $('.add-print').attr('disabled', true);
            printPrice(0);
            $('html, body').animate({
                scrollTop: $("#NoSpecSelected").offset().top
            }, 3000);
        }

        function continueDesign() {
            $('.add-print').attr('disabled', false);
            order_obj.type = 'order_design';
            printPrice("100");
            $('html, body').animate({
                scrollTop: $("#finish-buttons").offset().top
            }, 3000);
        }

        function checkRange(_this, val) {
            max = false;
            max_text = "مفتوح"
            min = 1;
            if (_this.attr('min') != 'null') min = _this.attr('min');
            if (_this.attr('max') != 'null') {
                max = _this.attr('max');
                max_text = _this.attr('max')
            }
            ;

            if (max) {
                if (val < eval(min) || val > eval(max) || !val || val == '') {
                    val = _this.attr('min');
                    _this.addClass('is-invalid');
                    _this.tooltip({
                        title: "الحد المسموح به للكمية " + _this.attr('min') + ' - ' + max_text,
                        trigger: 'manual'
                    });
                    _this.tooltip('show');
                } else {
                    _this.removeClass('is-invalid');
                    _this.tooltip('hide');
                }
            } else {
                if (val < eval(min) || !val || val == '') {
                    val = _this.attr('min');
                    _this.addClass('is-invalid');
                    _this.tooltip({
                        title: "الحد المسموح به للكمية " + _this.attr('min') + ' - ' + max_text,
                        trigger: 'manual'
                    });
                    _this.tooltip('show');
                } else {
                    _this.removeClass('is-invalid');
                    _this.tooltip('hide');
                }
            }
        }

        function valid() {
            var valid = true;
            if ($('#email').val() == '') {
                $('#email').addClass('is-invalid');
                $('#email').parent().children('span').remove();
                $('#email').parent().append('<span class="text-danger"> الايميل مطلوب </span>');
                valid = false;
            } else {
                if ($('#email').hasClass('is-invalid'))
                    $('#email').removeClass('is-invalid');
                $('#email').parent().children('span').remove();
            }
            if ($('#company_name').val() == '') {
                $('#company_name').addClass('is-invalid');
                $('#company_name').parent().children('span').remove();
                $('#company_name').parent().append('<span class="text-danger"> اسم الشركة مطلوب </span>')
                valid = false;
            } else {
                if ($('#company_name').hasClass('is-invalid'))
                    $('#company_name').removeClass('is-invalid');
                $('#company_name').parent().children('span').remove();
            }
            if (!$.isNumeric($('#phone').val()) || $('#phone').val().length != 10) {
                $('#phone').addClass('is-invalid');
                $('#phone').parent().children('span').remove();
                $('#phone').parent().append('<span class="text-danger d-block"> رقم الجوال مطلوب - رقم الجوال يجب أن يكون من 10 أرقام </span>')
                valid = false;
            } else {
                if ($('#phone').hasClass('is-invalid'))
                    $('#phone').removeClass('is-invalid');
                $('#phone').parent().children('span').remove();
            }
            /*if($('#width').val()==''){
                $('#width').addClass('is-invalid');
                $('#width').parent().children('span').remove();
                $('#width').parent().append('<span class="text-danger"> العرض مطلوب </span>')
                valid = false;
            }else{
                if($('#width').hasClass('is-invalid'))
                    $('#width').removeClass('is-invalid');
                $('#width').parent().children('span').remove();
            }
            if($('#height').val()==''){
                $('#height').addClass('is-invalid');
                $('#height').parent().children('span').remove();
                $('#height').parent().append('<span class="text-danger"> الطول مطلوب </span>')
                valid = false;
            }else{
                if($('#height').hasClass('is-invalid'))
                    $('#height').removeClass('is-invalid');
                $('#height').parent().children('span').remove();
            }*/
            return valid;
        }
    </script>

@endsection

