@extends('pages.layouts.dashboard')
@section('content')

    <style>
        .btnActive {
            cursor: pointer;
            height: 30px;
            position: absolute;
            opacity: 0;
            width: 30px;
            z-index: 2;
        }

        .btnActive + span {
            background: #e74c3c;
            border-radius: 50%;
            box-shadow: 0 2px 3px 0 rgba(0, 0, 0, .1);
            display: inline-block;
            height: 30px;
            margin: 4px 0 0;
            position: relative;
            width: 30px;
            transition: all .2s ease;
        }

        .btnActive + span::before, input[type=checkbox] + span::after {
            background: #fff;
            content: '';
            display: block;
            position: absolute;
            width: 4px;
            transition: all .2s ease;
        }

        .btnActive + span::before {
            height: 16px;
            left: 13px;
            top: 7px;
            -webkit-transform: rotate(-45deg);
            transform: rotate(-45deg);
        }

        .btnActive + span::after {
            height: 16px;
            right: 13px;
            top: 7px;
            -webkit-transform: rotate(45deg);
            transform: rotate(45deg);
        }

        .btnActive:checked + span {
            background: #2ecc71;
        }

        .btnActive:checked + span::before {
            height: 9px;
            left: 9px;
            top: 13px;
            -webkit-transform: rotate(-47deg);
            transform: rotate(-47deg);
        }

        .btnActive:checked + span::after {
            height: 15px;
            right: 11px;
            top: 8px;
        }
        .selectgroup-text{
            font-family: 'tajawal'!important;
            direction: ltr;
            -webkit-font-smoothing: antialiased;
            -webkit-tap-highlight-color: transparent;
            -webkit-text-size-adjust: none;
            font-feature-settings: "liga" 0;
            word-wrap: break-word;
            font-weight: 600;
            box-sizing: border-box;
            display: block;
            border: 1px solid #d8dde4;
            text-align: center;
            padding: 0.375rem 1rem;
            position: relative;
            user-select: none;
            font-size: 0.875rem;
            line-height: 1.5rem;
            min-width: 2.375rem;
            border-radius: 5px !important;
            border-color: #5e2dd8;
            z-index: 1;
            color: #5e2dd8;
            background: #f6f4fb;
        }
        .btnDelete{
            cursor: pointer;
        }
    </style>
    <!-- ============== START CONTENT ==============  -->

    <form action="{{route('product.update',$product)}}" method="POST" enctype="multipart/form-data">
        @csrf
        <input type="hidden" name="_method" value="PUT">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">تعديل الخدمة</h3>
                    </div>
                    <div class="card-body">
                        <!-- <div class="form-group">
                                            <label class="form-label">Restaurant</label>
                                            <select class="form-control select2-show-search" data-placeholder="Choose one (with searchbox)">
                                                <optgroup label="Categories">
                                                    <option value="AZ">Restaurant 1</option>
                                                    <option value="CO">Restaurant 2</option>
                                                    <option value="ID">Restaurant 3</option>
                                                    <option value="MT">Restaurant 4</option>
                                                    <option value="NM">Restaurant 5</option>
                                                </optgroup>
                                            </select>
                                        </div> -->

                        <div class="form-group">
                            <label class="form-label">اسم الخدمة</label>
                            <input type="text" class="form-control" name="name" placeholder="Enter Product Name"
                                   value="{{$product->name}}">
                            @error('name')
                            <p class="text-danger">{{ $message }}</p>
                            @enderror

                        </div>

                        <div class="form-group">
                            <div class="row">
                                <div class="form-group col-md-12">
                                    <label class="form-label mt-0">الفئة</label>
                                    <select class="form-control select2 custom-select" data-placeholder="Choose one"
                                            name="category_id" id="category_id">
                                        <option label="Choose one">
                                        </option>

                                        @foreach ($categories as $category)
                                            <option value="{{$category->id}}">{{$category->name}}</option>
                                            @if($product->category()->first()->name == $category->name)
                                                <option value="{{$category->id}}" selected>{{$category->name}}</option>
                                            @endif
                                        @endforeach

                                    </select>
                                    @error('category_id')
                                    <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>

                        </div>

                        <div class="form-group">
                            <label class="form-label">سعر الخدمة</label>
                            <input type="text" class="form-control" name="price" placeholder="Enter Price"
                                   value="{{$product->price}}">
                            @error('price')
                            <p class="text-danger">{{ $message }}</p>
                            @enderror

                        </div>

                        <div class="form-group">
                            <label class="form-label"> السعر المعروض للخدمة</label>
                            <input type="text" class="form-control" name="price_display" placeholder="Enter Price"
                                   value="{{$product->price_display}}">
                            @error('price_display')
                            <p class="text-danger">{{ $message }}</p>
                            @enderror

                        </div>


                        <div class="form-group">
                            <label class="form-label">الوقت المقدر لتجهيز</label>
                            <input type="text" class="form-control" name="timeDelivery" placeholder="Enter Price"
                                   value="{{$product->timeDelivery}}">
                            @error('timeDelivery')
                            <p class="text-danger">{{ $message }}</p>
                            @enderror

                        </div>

                        <div class="form-group">
                            <label class="form-label">وصف الخدمة <small class="text-danger">(اختياري)</small></label>
                            <textarea class="content" name="description">
                                    {{$product->description}}
                                </textarea>
                            @error('description')
                            <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="card-body">
                            <div class="row justify-content-between text-center align-items-center">
                                <p class="cal-11 h5">المقاسات</p>
                                <div class="">
{{--                                    <input type="checkbox" class="btnActive"--}}
{{--                                           name="paperActive" {{$product->paper ? $product->paper['paperActive'] == "on" ? "checked" : "" : ""}}/>--}}
                                    <input type="checkbox" class="btnActive"
{{--                                           {{$product->measur ? $product->measure['measuringActive'] == "on" ? 'checked' : "" :""}}--}}

                                           name="measuringActive" {{$product->measure ? $product->measure['measuringActive'] == "on" ? "checked" : "" : ""}} />
                                    <span></span>
                                </div>
                            </div>

                            <div class="selectgroup selectgroup-pills" id="measuringBtns">

                                @if($product->measure && $product->measure['measuring'])

                                    @foreach($product->measure['measuring'] as $key => $measure)
                                        <label class="selectgroup-item">
                                            <input type="checkbox" name="measuring[]" value="{{$measure}}"
                                                   class="selectgroup-input" checked="">
                                            <div class="selectgroup-text">
                                                <span class="text-warning">( {{$product->measure['measuringPrice'][$key]}} OMR ) </span>  {{$measure}} <i class="fa fa-trash-o ml-3 text-danger btnDelete" onClick="deleteItems(this)" data-toggle="tooltip" title="" ></i>
                                            </div>
                                            {{--                                        <span class="selectgroup-button text-left"></span>--}}
                                            <input type="hidden" name="measuringPrice[]"
                                                   value="{{$product->measure['measuringPrice'][$key]}}">
                                        </label>
                                    @endforeach
                                @endif

                            </div>

                            <div class="row" id="measuringBtns">
                                <div class="form-group col-6">
                                    <label class="form-label">المقاس</label>
                                    <input type="text" class="form-control" id="measuring"
                                           placeholder="ادخل المقاس">
                                    @error('measuring')
                                    <p class="text-danger">{{ $message }}</p>
                                    @enderror

                                </div>
                                <div class="form-group col-5">
                                    <label class="form-label">سعر المقاس</label>
                                    <input type="text" class="form-control" id="measuringPrice"
                                           placeholder="ادخل سعر المقاس">
                                    @error('measuringPrice')
                                    <p class="text-danger">{{ $message }}</p>
                                    @enderror

                                </div>
                                <div class="btn-list d-flex align-items-center">
                                    <button type="button" onClick="addMeasuringBtns()" class="btn btn-primary">اضافة
                                    </button>
                                </div>
                            </div>

                        </div>

                        <div class="card-body">
                            <div class="row justify-content-between text-center align-items-center">
                                <p class="cal-11 h5">نوع الورق/ المادة</p>
                                <div class="">
                                    <input type="checkbox" class="btnActive"
                                           name="paperActive" {{$product->paper ? $product->paper['paperActive'] == "on" ? "checked" : "" : ""}}/>
                                    <span></span>
                                </div>
                            </div>
                            <div class="selectgroup selectgroup-pills" id="paperBtns">
                                @if($product->paper && $product->paper['paper'] )
                                    @foreach($product->paper['paper'] as $key => $paper)
                                        <label class="selectgroup-item">
                                            <input type="checkbox" name="paper[]" value="{{$paper}}"
                                                   class="selectgroup-input" checked="">
                                            <span
                                                class="selectgroup-text"> <span class="text-warning">( {{$product->paper['paperPrice'][$key]}} OMR ) </span> {{$paper}} <i class="fa fa-trash-o ml-3 text-danger btnDelete" onClick="deleteItems(this)" data-toggle="tooltip" title=""></i></span>
                                            <input type="hidden" name="paperPrice[]"
                                                   value="{{$product->paper['paperPrice'][$key]}}">
                                        </label>
                                    @endforeach
                                @endif
                            </div>
                            <div class="row">
                                <div class="form-group col-6">
                                    <label class="form-label">المادة</label>
                                    <input type="text" class="form-control" id="paper"
                                           placeholder="ادخل نوع المادة">
                                    @error('paper')
                                    <p class="text-danger">{{ $message }}</p>
                                    @enderror

                                </div>
                                <div class="form-group col-5">
                                    <label class="form-label">سعر المادة</label>
                                    <input type="text" class="form-control" id="paperPrice"
                                           placeholder="ادخل سعر المادة">
                                    @error('paperPrice')
                                    <p class="text-danger">{{ $message }}</p>
                                    @enderror

                                </div>
                                <div class="btn-list d-flex align-items-center">
                                    <button type="button" onClick="addPaperBtns()" class="btn btn-primary">اضافة
                                    </button>
                                </div>
                            </div>

                        </div>

                        <div class="card-body">
                            <div class="row justify-content-between text-center align-items-center">
                                <p class="cal-11 h5">الأوزان</p>
                                <div class="">
                                    <input type="checkbox" class="btnActive"
                                           name="weightActive" {{$product->weights ? $product->weights['weightActive'] == "on" ? "checked" : "" : ""}}/>
                                    <span></span>
                                </div>
                            </div>
                            <div class="selectgroup selectgroup-pills" id="weightBtns">
                                <div class="selectgroup selectgroup-pills" id="weightBtns">
                                    @if($product->weights && $product->weights['weight'])
                                        @foreach($product->weights['weight'] as $key => $weight)
                                            <label class="selectgroup-item">
                                                <input type="checkbox" name="weights[]" value="{{$weight}}"
                                                       class="selectgroup-input" checked="">
                                                <span class="selectgroup-text"> <span class="text-warning">( {{$product->weights['weightPrice'][$key]}} OMR ) </span> {{$weight}} <i class="fa fa-trash-o ml-3 text-danger btnDelete" onClick="deleteItems(this)" data-toggle="tooltip" title="" ></i></span>
                                                <input type="hidden" name="weightPrice[]"
                                                       value="{{$product->weights['weightPrice'][$key]}}">
                                            </label>
                                        @endforeach
                                    @endif
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-6">
                                    <label class="form-label">الوزن</label>
                                    <input type="text" class="form-control" id="weight"
                                           placeholder="ادخل نوع المادة">
                                    @error('weight')
                                    <p class="text-danger">{{ $message }}</p>
                                    @enderror

                                </div>
                                <div class="form-group col-5">
                                    <label class="form-label">سعر المادة</label>
                                    <input type="text" class="form-control" id="weightPrice"
                                           placeholder="ادخل سعر المادة">
                                    @error('weightPrice')
                                    <p class="text-danger">{{ $message }}</p>
                                    @enderror

                                </div>
                                <div class="btn-list d-flex align-items-center">
                                    <button type="button" onClick="addWeightBtns()" class="btn btn-primary">اضافة
                                    </button>
                                </div>
                            </div>

                        </div>

                        <div class="card-body">
                            <div class="row justify-content-between text-center align-items-center">
                                <p class="cal-11 h5">العدد</p>
                                <div class="">
                                    <input type="checkbox" class="btnActive"
                                           name="numberActive" {{$product->numbers ? $product->numbers['numberActive'] == "on" ? "checked" : "" : ""}}/>
                                    <span></span>
                                </div>
                            </div>
                            <div class="selectgroup selectgroup-pills" id="numberBtns">
                                <div class="selectgroup selectgroup-pills" id="numberBtns">
                                    @if($product->numbers && $product->numbers['number'])
                                        @foreach($product->numbers['number'] as $key => $number)
                                            <label class="selectgroup-item">
                                                <input type="checkbox" name="numbers[]" value="{{$number}}"
                                                       class="selectgroup-input" checked="">
                                                <span class="selectgroup-text"> <span class="text-warning">( {{$product->numbers['numberPrice'][$key]}} OMR ) </span> {{$number}} <i class="fa fa-trash-o ml-3 text-danger btnDelete" onClick="deleteItems(this)" data-toggle="tooltip" title="" ></i></span>
                                                <input type="hidden" name="numberPrice[]"
                                                       value="{{$product->numbers['numberPrice'][$key]}}">
                                            </label>
                                        @endforeach
                                    @endif
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-6">
                                    <label class="form-label">العدد</label>
                                    <input type="text" class="form-control" id="number"
                                           placeholder="ادخل العدد">
                                    @error('weight')
                                    <p class="text-danger">{{ $message }}</p>
                                    @enderror

                                </div>
                                <div class="form-group col-5">
                                    <label class="form-label">سعر العدد</label>
                                    <input type="text" class="form-control" id="numberPrice"
                                           placeholder="ادخل سعر العدد">
                                    @error('weightPrice')
                                    <p class="text-danger">{{ $message }}</p>
                                    @enderror

                                </div>
                                <div class="btn-list d-flex align-items-center">
                                    <button type="button" onClick="addNumberBtns()" class="btn btn-primary">اضافة
                                    </button>
                                </div>
                            </div>

                        </div>

                        <div class="card-body">
                            <div class="row justify-content-between text-center align-items-center">
                                <p class="cal-11 h5">شكل القص</p>
                                <div class="">
                                    <input type="checkbox" class="btnActive"
                                           name="cutActive" {{$product->cutLabels ? $product->cutLabels['cutActive'] == "on" ? "checked" : "" : ""}}/>
                                    <span></span>
                                </div>
                            </div>
                            <div class="selectgroup selectgroup-pills" id="cutBtns">
                                <div class="selectgroup selectgroup-pills" id="cutBtns">
                                    @if($product->cutLabels && $product->cutLabels['cut'])
                                        @foreach($product->cutLabels['cut'] as $key => $cut)
                                            <label class="selectgroup-item">
                                                <input type="checkbox" name="cutLabels[]" value="{{$cut}}"
                                                       class="selectgroup-input" checked="">
                                                <span
                                                    class="selectgroup-text"> <span class="text-warning">( {{$product->cutLabels['cutPrice'][$key]}} OMR ) </span> {{$cut}} <i class="fa fa-trash-o ml-3 text-danger btnDelete" onClick="deleteItems(this)" data-toggle="tooltip" title="" ></i></span>
                                                <input type="hidden" name="cutPrice[]"
                                                       value="{{$product->cutLabels['cutPrice'][$key]}}">
                                            </label>
                                        @endforeach
                                    @endif
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-6">
                                    <label class="form-label">شكل القص</label>
                                    <input type="text" class="form-control" id="cut"
                                           placeholder="ادخل العدد">
                                    @error('weight')
                                    <p class="text-danger">{{ $message }}</p>
                                    @enderror

                                </div>
                                <div class="form-group col-5">
                                    <label class="form-label">السعر </label>
                                    <input type="text" class="form-control" id="cutPrice"
                                           placeholder="ادخل سعر القص">
                                    @error('weightPrice')
                                    <p class="text-danger">{{ $message }}</p>
                                    @enderror

                                </div>
                                <div class="btn-list d-flex align-items-center">
                                    <button type="button" onClick="addCutBtns()" class="btn btn-primary">اضافة
                                    </button>
                                </div>
                            </div>

                        </div>


                        <div class="card-body">
                            <div class="row justify-content-between text-center align-items-center">
                                <p class="cal-11 h5">الالوان</p>
                                <div class="">
                                    <input type="checkbox" class="btnActive"
                                           name="colorActive" {{$product->colors ? $product->colors['colorActive'] == "on" ? "checked" : "" : ""}}/>
                                    <span></span>
                                </div>
                            </div>
                            <div class="selectgroup selectgroup-pills" id="colorBtns">
                                <div class="selectgroup selectgroup-pills" id="colorBtns">
                                    @if($product->colors && $product->colors['color'])
                                        @foreach($product->colors['color'] as $key => $color)
                                            <label class="selectgroup-item">
                                                <input type="checkbox" name="colors[]" value="{{$color}}"
                                                       class="selectgroup-input" checked="">
                                                <span
                                                    class="selectgroup-text"> <span class="text-warning">( {{$product->colors['colorPrice'][$key]}} OMR ) </span> {{$color}} <i class="fa fa-trash-o ml-3 text-danger btnDelete" onClick="deleteItems(this)" data-toggle="tooltip" title=""></i></span>
                                                <input type="hidden" name="colorsPrice[]"
                                                       value="{{$product->colors['colorPrice'][$key]}}">
                                            </label>
                                        @endforeach
                                    @endif
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-6">
                                    <label class="form-label">اللون</label>
                                    <input type="text" class="form-control" id="color"
                                           placeholder="ادخل اللون">
                                    @error('color')
                                    <p class="text-danger">{{ $message }}</p>
                                    @enderror

                                </div>
                                <div class="form-group col-5">
                                    <label class="form-label">السعر </label>
                                    <input type="text" class="form-control" id="colorPrice"
                                           placeholder="ادخل سعر اللون">
                                    @error('colorPrice')
                                    <p class="text-danger">{{ $message }}</p>
                                    @enderror

                                </div>
                                <div class="btn-list d-flex align-items-center">
                                    <button type="button" onClick="addColorBtns()" class="btn btn-primary">اضافة
                                    </button>
                                </div>
                            </div>

                        </div>

                        <div class="card-body">
                            <div class="row justify-content-between text-center align-items-center">
                                <p class="cal-11 h5">اوجه الطباعة</p>
                                <div class="">
                                    <input type="checkbox" class="btnActive" name="printFaceActive" {{$product->print_faces ? $product->print_faces['printFaceActive'] == "on" ? "checked" : "" : ""}}/>
                                    <span></span>
                                </div>
                            </div>
                            <div class="selectgroup selectgroup-pills" id="printFaceBtns">
                                @if($product->print_faces && $product->print_faces['printFace'])
                                    @foreach($product->print_faces['printFace'] as $key => $printFace)
                                        <label class="selectgroup-item">
                                            <input type="checkbox" name="printFace[]" value="{{$printFace}}"
                                                   class="selectgroup-input" checked="">
                                            <span
                                                class="selectgroup-text"> <span class="text-warning">( {{$product->print_faces['printFacePrice'][$key]}} OMR ) </span> {{$printFace}} <i class="fa fa-trash-o ml-3 text-danger btnDelete" onClick="deleteItems(this)" data-toggle="tooltip" title=""></i></span>
                                            <input type="hidden" name="printFacePrice[]"
                                                   value="{{$product->print_faces['printFacePrice'][$key]}}">
                                        </label>
                                    @endforeach
                                @endif
                            </div>
                            <div class="row">
                                <div class="form-group col-6">
                                    <label class="form-label">اوجه الطباعة</label>
                                    <input type="text" class="form-control"  id="printFace"
                                           placeholder="ادخل نوع وجه الطباعة">
                                    @error('printFace')
                                    <p class="text-danger">{{ $message }}</p>
                                    @enderror

                                </div>
                                <div class="form-group col-5">
                                    <label class="form-label">السعر </label>
                                    <input type="text" class="form-control"  id="printFacePrice"
                                           placeholder="ادخل سعر الوجه">
                                    @error('printFacePrice')
                                    <p class="text-danger">{{ $message }}</p>
                                    @enderror

                                </div>
                                <div class="btn-list d-flex align-items-center">
                                    <button type="button" onClick="addPrintFaceBtns()" class="btn btn-primary">اضافة
                                    </button>
                                </div>
                            </div>

                        </div>
                        <div class="card-body">
                            <div class="row justify-content-between text-center align-items-center">
                                <p class="cal-11 h5">تجميع</p>
                                <div class="">
                                    <input type="checkbox" class="btnActive" name="assemblyTypeActive" {{$product->assembly_type ? $product->assembly_type['assemblyTypeActive'] == "on" ? "checked" : "" : ""}} />
                                    <span></span>
                                </div>
                            </div>
                            <div class="selectgroup selectgroup-pills" id="assemblyTypeBtns">
                                @if($product->assembly_type && $product->assembly_type['assemblyType'])
                                    @foreach($product->assembly_type['assemblyType'] as $key => $assemblyType)
                                        <label class="selectgroup-item">
                                            <input type="checkbox" name="assemblyType[]" value="{{$assemblyType}}"
                                                   class="selectgroup-input" checked="">
                                            <span
                                                class="selectgroup-text"> <span class="text-warning">( {{$product->assembly_type['assemblyTypePrice'][$key]}} OMR ) </span> {{$assemblyType}} <i class="fa fa-trash-o ml-3 text-danger btnDelete" onClick="deleteItems(this)" data-toggle="tooltip" title=""></i></span>
                                            <input type="hidden" name="assemblyTypePrice[]"
                                                   value="{{$product->assembly_type['assemblyTypePrice'][$key]}}">
                                        </label>
                                    @endforeach
                                @endif
                            </div>
                            <div class="row">
                                <div class="form-group col-6">
                                    <label class="form-label">نوع التجميع</label>
                                    <input type="text" class="form-control"  id="assemblyType"
                                           placeholder="ادخل نوع التجميع">
                                    @error('assemblyType')
                                    <p class="text-danger">{{ $message }}</p>
                                    @enderror

                                </div>
                                <div class="form-group col-5">
                                    <label class="form-label">السعر </label>
                                    <input type="text" class="form-control"  id="assemblyTypePrice"
                                           placeholder="ادخل نوع التجميع">
                                    @error('assemblyTypePrice')
                                    <p class="text-danger">{{ $message }}</p>
                                    @enderror

                                </div>
                                <div class="btn-list d-flex align-items-center">
                                    <button type="button" onClick="addAssemblyTypeBtns()" class="btn btn-primary">اضافة
                                    </button>
                                </div>
                            </div>

                        </div>
                        <div class="card-body">
                            <div class="row justify-content-between text-center align-items-center">
                                <p class="cal-11 h5">طريقة فتح االمذكرة</p>
                                <div class="">
                                    <input type="checkbox" class="btnActive" name="openNoteActive" {{$product->open_note ? $product->open_note['openNoteActive'] == "on" ? "checked" : "" : ""}}/>
                                    <span></span>
                                </div>
                            </div>
                            <div class="selectgroup selectgroup-pills" id="openNoteBtns">
                                @if($product->open_note && $product->open_note['openNote'])
                                    @foreach($product->open_note['openNote'] as $key => $openNote)
                                        <label class="selectgroup-item">
                                            <input type="checkbox" name="openNote[]" value="{{$openNote}}"
                                                   class="selectgroup-input" checked="">
                                            <span
                                                class="selectgroup-text"> <span class="text-warning">( {{$product->open_note['openNotePrice'][$key]}} OMR ) </span> {{$openNote}} <i class="fa fa-trash-o ml-3 text-danger btnDelete" onClick="deleteItems(this)" data-toggle="tooltip" title=""></i></span>
                                            <input type="hidden" name="openNotePrice[]"
                                                   value="{{$product->open_note['openNotePrice'][$key]}}">
                                        </label>
                                    @endforeach
                                @endif
                            </div>
                            <div class="row">
                                <div class="form-group col-6">
                                    <label class="form-label">طريقة فتح المذكرة</label>
                                    <input type="text" class="form-control"  id="openNote"
                                           placeholder="ادخل طريقة فتح المذكرة">
                                    @error('colors')
                                    <p class="text-danger">{{ $message }}</p>
                                    @enderror

                                </div>
                                <div class="form-group col-5">
                                    <label class="form-label">السعر </label>
                                    <input type="text" class="form-control"  id="openNotePrice"
                                           placeholder="ادخل السعر ">
                                    @error('colorPrice')
                                    <p class="text-danger">{{ $message }}</p>
                                    @enderror

                                </div>
                                <div class="btn-list d-flex align-items-center">
                                    <button type="button" onClick="addOpenNoteBtns()" class="btn btn-primary">اضافة
                                    </button>
                                </div>
                            </div>

                        </div>
                        <div class="card-body">
                            <div class="row justify-content-between text-center align-items-center">
                                <p class="cal-11 h5">الجيب</p>
                                <div class="">
                                    <input type="checkbox" class="btnActive" name="sinusesActive" {{$product->sinuses ? $product->sinuses['sinusesActive'] == "on" ? "checked" : "" : ""}}/>
                                    <span></span>
                                </div>
                            </div>
                            <div class="selectgroup selectgroup-pills" id="sinusesBtns">
                                @if($product->sinuses && $product->sinuses['sinuses'])
                                    @foreach($product->sinuses['sinuses'] as $key => $sinuses)
                                        <label class="selectgroup-item">
                                            <input type="checkbox" name="sinuses[]" value="{{$sinuses}}"
                                                   class="selectgroup-input" checked="">
                                            <span
                                                class="selectgroup-text"> <span class="text-warning">( {{$product->sinuses['sinusesPrice'][$key]}} OMR ) </span> {{$sinuses}} <i class="fa fa-trash-o ml-3 text-danger btnDelete" onClick="deleteItems(this)" data-toggle="tooltip" title=""></i></span>
                                            <input type="hidden" name="sinusesPrice[]"
                                                   value="{{$product->sinuses['sinusesPrice'][$key]}}">
                                        </label>
                                    @endforeach
                                @endif
                            </div>
                            <div class="row">
                                <div class="form-group col-6">
                                    <label class="form-label">نوع الجيب</label>
                                    <input type="text" class="form-control"  id="sinuses"
                                           placeholder="ادخل نوع الجيب">
                                    @error('sinuses')
                                    <p class="text-danger">{{ $message }}</p>
                                    @enderror

                                </div>
                                <div class="form-group col-5">
                                    <label class="form-label">السعر </label>
                                    <input type="text" class="form-control"  id="sinusesPrice"
                                           placeholder="ادخل السعر ">
                                    @error('sinusesPrice')
                                    <p class="text-danger">{{ $message }}</p>
                                    @enderror

                                </div>
                                <div class="btn-list d-flex align-items-center">
                                    <button type="button" onClick="addSinusesBtns()" class="btn btn-primary">اضافة
                                    </button>
                                </div>
                            </div>

                        </div>
                        <div class="card-body">
                            <div class="row justify-content-between text-center align-items-center">
                                <p class="cal-11 h5">التغليف الحراري</p>
                                <div class="">
                                    <input type="checkbox" class="btnActive" name="thermalPackagingActive" {{$product->thermal_packaging ? $product->thermal_packaging['thermalPackagingActive'] == "on" ? "checked" : "" : ""}}/>
                                    <span></span>
                                </div>
                            </div>
                            <div class="selectgroup selectgroup-pills" id="thermalPackagingBtns">
                                @if($product->thermal_packaging && $product->thermal_packaging['thermalPackaging'])
                                    @foreach($product->thermal_packaging['thermalPackaging'] as $key => $thermalPackaging)
                                        <label class="selectgroup-item">
                                            <input type="checkbox" name="thermal_packaging[]" value="{{$thermalPackaging}}"
                                                   class="selectgroup-input" checked="">
                                            <span
                                                class="selectgroup-text"> <span class="text-warning">( {{$product->thermal_packaging['thermalPackagingPrice'][$key]}} OMR ) </span> {{$thermalPackaging}} <i class="fa fa-trash-o ml-3 text-danger btnDelete" onClick="deleteItems(this)" data-toggle="tooltip" title=""></i></span>
                                            <input type="hidden" name="thermalPackagingPrice[]"
                                                   value="{{$product->thermal_packaging['thermalPackagingPrice'][$key]}}">
                                        </label>
                                    @endforeach
                                @endif
                            </div>
                            <div class="row">
                                <div class="form-group col-6">
                                    <label class="form-label">نوع التغليف الحراري</label>
                                    <input type="text" class="form-control"  id="thermal_packaging"
                                           placeholder="ادخل نوع التغليف الحراري">
                                    @error('thermal_packaging')
                                    <p class="text-danger">{{ $message }}</p>
                                    @enderror

                                </div>
                                <div class="form-group col-5">
                                    <label class="form-label">السعر </label>
                                    <input type="text" class="form-control"  id="thermalPackagingPrice"
                                           placeholder="ادخل السعر ">
                                    @error('thermalPackagingPrice')
                                    <p class="text-danger">{{ $message }}</p>
                                    @enderror

                                </div>
                                <div class="btn-list d-flex align-items-center">
                                    <button type="button" onClick="addThermalPackagingBtns()" class="btn btn-primary">اضافة
                                    </button>
                                </div>
                            </div>

                        </div>
                        <div class="card-body">
                            <div class="row justify-content-between text-center align-items-center">
                                <p class="cal-11 h5">عدد الطويات</p>
                                <div class="">
                                    <input type="checkbox" class="btnActive" name="numberCreasesActive" {{$product->number_creases ? $product->number_creases['numberCreasesActive'] == "on" ? "checked" : "" : ""}} />
                                    <span></span>
                                </div>
                            </div>
                            <div class="selectgroup selectgroup-pills" id="numberCreasesBtns">
                                @if($product->number_creases && $product->number_creases['numberCreases'])
                                    @foreach($product->number_creases['numberCreases'] as $key => $numberCreases)
                                        <label class="selectgroup-item">
                                            <input type="checkbox" name="numberCreases[]" value="{{$numberCreases}}"
                                                   class="selectgroup-input" checked="">
                                            <span
                                                class="selectgroup-text"> <span class="text-warning">( {{$product->number_creases['numberCreasesPrice'][$key]}} OMR ) </span> {{$color}} <i class="fa fa-trash-o ml-3 text-danger btnDelete" onClick="deleteItems(this)" data-toggle="tooltip" title=""></i></span>
                                            <input type="hidden" name="numberCreasesPrice[]"
                                                   value="{{$product->number_creases['numberCreasesPrice'][$key]}}">
                                        </label>
                                    @endforeach
                                @endif
                            </div>
                            <div class="row">
                                <div class="form-group col-6">
                                    <label class="form-label">عدد الطويات</label>
                                    <input type="text" class="form-control"  id="numberCreases"
                                           placeholder="ادخل اللون">
                                    @error('numberCreases')
                                    <p class="text-danger">{{ $message }}</p>
                                    @enderror

                                </div>
                                <div class="form-group col-5">
                                    <label class="form-label">السعر </label>
                                    <input type="text" class="form-control"  id="numberCreasesPrice"
                                           placeholder="ادخل السعر ">
                                    @error('numberCreasesPrice')
                                    <p class="text-danger">{{ $message }}</p>
                                    @enderror

                                </div>
                                <div class="btn-list d-flex align-items-center">
                                    <button type="button" onClick="addNumberCreasesBtns()" class="btn btn-primary">اضافة
                                    </button>
                                </div>
                            </div>

                        </div>
                        <div class="card-body">
                            <div class="row justify-content-between text-center align-items-center">
                                <p class="cal-11 h5">الحواف</p>
                                <div class="">
                                    <input type="checkbox" class="btnActive" name="edgesActive" {{$product->edges ? $product->edges['edgesActive'] == "on" ? "checked" : "" : ""}}/>
                                    <span></span>
                                </div>
                            </div>
                            <div class="selectgroup selectgroup-pills" id="edgesBtns">
                                @if($product->edges && $product->edges['edges'])
                                    @foreach($product->edges['edges'] as $key => $edges)
                                        <label class="selectgroup-item">
                                            <input type="checkbox" name="edges[]" value="{{$edges}}"
                                                   class="selectgroup-input" checked="">
                                            <span
                                                class="selectgroup-text"> <span class="text-warning">( {{$product->edges['edgesPrice'][$key]}} OMR ) </span> {{$edges}} <i class="fa fa-trash-o ml-3 text-danger btnDelete" onClick="deleteItems(this)" data-toggle="tooltip" title=""></i></span>
                                            <input type="hidden" name="edgesPrice[]"
                                                   value="{{$product->edges['edgesPrice'][$key]}}">
                                        </label>
                                    @endforeach
                                @endif
                            </div>
                            <div class="row">
                                <div class="form-group col-6">
                                    <label class="form-label">الحواف</label>
                                    <input type="text" class="form-control"  id="edges"
                                           placeholder="ادخل الحواف">
                                    @error('edges')
                                    <p class="text-danger">{{ $message }}</p>
                                    @enderror

                                </div>
                                <div class="form-group col-5">
                                    <label class="form-label">السعر </label>
                                    <input type="text" class="form-control"  id="edgesPrice"
                                           placeholder="ادخل السعر ">
                                    @error('edgesPrice')
                                    <p class="text-danger">{{ $message }}</p>
                                    @enderror

                                </div>
                                <div class="btn-list d-flex align-items-center">
                                    <button type="button" onClick="addEdgesBtns()" class="btn btn-primary">اضافة
                                    </button>
                                </div>
                            </div>

                        </div>

                        <div class="card-body">
                            <div class="row justify-content-between text-center align-items-center">
                                <p class="cal-11 h5">العلبة</p>
                                <div class="">
                                    <input type="checkbox" class="btnActive" name="boxActive" {{$product->box ? $product->box['boxActive'] == "on" ? "checked" : "" : ""}}/>
                                    <span></span>
                                </div>
                            </div>
                            <div class="selectgroup selectgroup-pills" id="boxBtns">
                                @if($product->box && $product->box['box'])
                                    @foreach($product->box['box'] as $key => $box)
                                        <label class="selectgroup-item">
                                            <input type="checkbox" name="box[]" value="{{$box}}"
                                                   class="selectgroup-input" checked="">
                                            <span
                                                class="selectgroup-text"> <span class="text-warning">( {{$product->box['boxPrice'][$key]}} OMR ) </span> {{$box}} <i class="fa fa-trash-o ml-3 text-danger btnDelete" onClick="deleteItems(this)" data-toggle="tooltip" title=""></i></span>
                                            <input type="hidden" name="boxPrice[]"
                                                   value="{{$product->box['boxPrice'][$key]}}">
                                        </label>
                                    @endforeach
                                @endif
                            </div>
                            <div class="row">
                                <div class="form-group col-6">
                                    <label class="form-label">العلبة</label>
                                    <input type="text" class="form-control"  id="box"
                                           placeholder="ادخل العلبة">
                                    @error('box')
                                    <p class="text-danger">{{ $message }}</p>
                                    @enderror

                                </div>
                                <div class="form-group col-5">
                                    <label class="form-label">السعر </label>
                                    <input type="text" class="form-control"  id="boxPrice"
                                           placeholder="ادخل السعر ">
                                    @error('boxPrice')
                                    <p class="text-danger">{{ $message }}</p>
                                    @enderror

                                </div>
                                <div class="btn-list d-flex align-items-center">
                                    <button type="button" onClick="addBoxBtns()" class="btn btn-primary">اضافة
                                    </button>
                                </div>
                            </div>

                        </div>
                        <div class="card-body">
                            <div class="row justify-content-between text-center align-items-center">
                                <p class="cal-11 h5">الهيكل</p>
                                <div class="">
                                    <input type="checkbox" class="btnActive" name="structureActive" {{$product->structure ? $product->structure['structureActive'] == "on" ? "checked" : "" : ""}}/>
                                    <span></span>
                                </div>
                            </div>
                            <div class="selectgroup selectgroup-pills" id="structureBtns">
                                @if($product->structure && $product->structure['structure'])
                                    @foreach($product->structure['structure'] as $key => $structure)
                                        <label class="selectgroup-item">
                                            <input type="checkbox" name="structure[]" value="{{$structure}}"
                                                   class="selectgroup-input" checked="">
                                            <span
                                                class="selectgroup-text"> <span class="text-warning">( {{$product->structure['structurePrice'][$key]}} OMR ) </span> {{$structure}} <i class="fa fa-trash-o ml-3 text-danger btnDelete" onClick="deleteItems(this)" data-toggle="tooltip" title=""></i></span>
                                            <input type="hidden" name="structurePrice[]"
                                                   value="{{$product->structure['structurePrice'][$key]}}">
                                        </label>
                                    @endforeach
                                @endif
                            </div>
                            <div class="row">
                                <div class="form-group col-6">
                                    <label class="form-label">الهيكل</label>
                                    <input type="text" class="form-control"  id="structure"
                                           placeholder="ادخل شكل الهيكل">
                                    @error('structure')
                                    <p class="text-danger">{{ $message }}</p>
                                    @enderror

                                </div>
                                <div class="form-group col-5">
                                    <label class="form-label">السعر </label>
                                    <input type="text" class="form-control"  id="structurePrice"
                                           placeholder="ادخل السعر ">
                                    @error('structurePrice')
                                    <p class="text-danger">{{ $message }}</p>
                                    @enderror

                                </div>
                                <div class="btn-list d-flex align-items-center">
                                    <button type="button" onClick="addStructureBtns()" class="btn btn-primary">اضافة
                                    </button>
                                </div>
                            </div>

                        </div>
                        <div class="card-body">
                            <div class="row justify-content-between text-center align-items-center">
                                <p class="cal-11 h5">قاعدة الالمنيوم</p>
                                <div class="">
                                    <input type="checkbox" class="btnActive" name="baseActive" {{$product->base ? $product->base['baseActive'] == "on" ? "checked" : "" : ""}}/>
                                    <span></span>
                                </div>
                            </div>
                            <div class="selectgroup selectgroup-pills" id="baseBtns">
                                @if($product->base && $product->base['base'])
                                    @foreach($product->base['base'] as $key => $base)
                                        <label class="selectgroup-item">
                                            <input type="checkbox" name="base[]" value="{{$base}}"
                                                   class="selectgroup-input" checked="">
                                            <span
                                                class="selectgroup-text"> <span class="text-warning">( {{$product->base['basePrice'][$key]}} OMR ) </span> {{$base}} <i class="fa fa-trash-o ml-3 text-danger btnDelete" onClick="deleteItems(this)" data-toggle="tooltip" title=""></i></span>
                                            <input type="hidden" name="basePrice[]"
                                                   value="{{$product->base['basePrice'][$key]}}">
                                        </label>
                                    @endforeach
                                @endif
                            </div>
                            <div class="row">
                                <div class="form-group col-6">
                                    <label class="form-label">القاعدة</label>
                                    <input type="text" class="form-control"  id="base"
                                           placeholder="ادخل قاعدة الالمنيوم">
                                    @error('base')
                                    <p class="text-danger">{{ $message }}</p>
                                    @enderror

                                </div>
                                <div class="form-group col-5">
                                    <label class="form-label">السعر </label>
                                    <input type="text" class="form-control"  id="basePrice"
                                           placeholder="ادخل السعر ">
                                    @error('basePrice')
                                    <p class="text-danger">{{ $message }}</p>
                                    @enderror

                                </div>
                                <div class="btn-list d-flex align-items-center">
                                    <button type="button" onClick="addBaseBtns()" class="btn btn-primary">اضافة
                                    </button>
                                </div>
                            </div>

                        </div>
                        <div class="card-body">
                            <div class="row justify-content-between text-center align-items-center">
                                <p class="cal-11 h5">شكل الستيكر</p>
                                <div class="">
                                    <input type="checkbox" class="btnActive" name="stickerActive" {{$product->sticker ? $product->sticker['stickerActive'] == "on" ? "checked" : "" : ""}}/>
                                    <span></span>
                                </div>
                            </div>
                            <div class="selectgroup selectgroup-pills" id="stickerBtns">
                                @if($product->sticker && $product->sticker['sticker'])
                                    @foreach($product->sticker['sticker'] as $key => $sticker)
                                        <label class="selectgroup-item">
                                            <input type="checkbox" name="sticker[]" value="{{$sticker}}"
                                                   class="selectgroup-input" checked="">
                                            <span
                                                class="selectgroup-text"> <span class="text-warning">( {{$product->sticker['stickerPrice'][$key]}} OMR ) </span> {{$sticker}} <i class="fa fa-trash-o ml-3 text-danger btnDelete" onClick="deleteItems(this)" data-toggle="tooltip" title=""></i></span>
                                            <input type="hidden" name="stickerPrice[]"
                                                   value="{{$product->sticker['stickerPrice'][$key]}}">
                                        </label>
                                    @endforeach
                                @endif
                            </div>
                            <div class="row">
                                <div class="form-group col-6">
                                    <label class="form-label">شكل الستيكر</label>
                                    <input type="text" class="form-control"  id="sticker"
                                           placeholder="ادخل شكل الستيكر">
                                    @error('sticker')
                                    <p class="text-danger">{{ $message }}</p>
                                    @enderror

                                </div>
                                <div class="form-group col-5">
                                    <label class="form-label">السعر </label>
                                    <input type="text" class="form-control"  id="stickerPrice"
                                           placeholder="ادخل السعر ">
                                    @error('stickerPrice')
                                    <p class="text-danger">{{ $message }}</p>
                                    @enderror

                                </div>
                                <div class="btn-list d-flex align-items-center">
                                    <button type="button" onClick="addStickerBtns()" class="btn btn-primary">اضافة
                                    </button>
                                </div>
                            </div>

                        </div>
                        <div class="card-body">
                            <div class="row justify-content-between text-center align-items-center">
                                <p class="cal-11 h5">لون الشريط</p>
                                <div class="">
                                    <input type="checkbox" class="btnActive" name="tapeColorActive" {{$product->tape_color ? $product->tape_color['tapeColorActive'] == "on" ? "checked" : "" : ""}}/>
                                    <span></span>
                                </div>
                            </div>
                            <div class="selectgroup selectgroup-pills" id="tapeColorBtns">
                                @if($product->tape_color && $product->tape_color['tapeColor'])
                                    @foreach($product->tape_color['tapeColor'] as $key => $tapeColor)
                                        <label class="selectgroup-item">
                                            <input type="checkbox" name="tapeColor[]" value="{{$tapeColor}}"
                                                   class="selectgroup-input" checked="">
                                            <span
                                                class="selectgroup-text"> <span class="text-warning">( {{$product->tape_color['tapeColorPrice'][$key]}} OMR ) </span> {{$tapeColor}} <i class="fa fa-trash-o ml-3 text-danger btnDelete" onClick="deleteItems(this)" data-toggle="tooltip" title=""></i></span>
                                            <input type="hidden" name="tapeColorPrice[]"
                                                   value="{{$product->tape_color['tapeColorPrice'][$key]}}">
                                        </label>
                                    @endforeach
                                @endif
                            </div>
                            <div class="row">
                                <div class="form-group col-6">
                                    <label class="form-label">لون الشريط</label>
                                    <input type="text" class="form-control"  id="tapeColor"
                                           placeholder="ادخل لون الشريط">
                                    @error('tapeColor')
                                    <p class="text-danger">{{ $message }}</p>
                                    @enderror

                                </div>
                                <div class="form-group col-5">
                                    <label class="form-label">السعر </label>
                                    <input type="text" class="form-control"  id="tapeColorPrice"
                                           placeholder="ادخل السعر ">
                                    @error('tapeColorPrice')
                                    <p class="text-danger">{{ $message }}</p>
                                    @enderror

                                </div>
                                <div class="btn-list d-flex align-items-center">
                                    <button type="button" onClick="addTapeColorBtns()" class="btn btn-primary">اضافة
                                    </button>
                                </div>
                            </div>

                        </div>

                        <div class="card-body">
                            <div class="row justify-content-between text-center align-items-center">
                                <p class="cal-11 h5">سماكة غلاف الكتاب</p>
                                <div class="">
                                    <input type="checkbox" class="btnActive" name="coverThicknessActive" {{$product->cover_thickness ? $product->cover_thickness['coverThicknessActive'] == "on" ? "checked" : "" : ""}}/>
                                    <span></span>
                                </div>
                            </div>
                            <div class="selectgroup selectgroup-pills" id="coverThicknessBtns">
                                @if($product->cover_thickness && $product->cover_thickness['coverThickness'])
                                    @foreach($product->cover_thickness['coverThickness'] as $key => $coverThickness)
                                        <label class="selectgroup-item">
                                            <input type="checkbox" name="coverThickness[]" value="{{$coverThickness}}"
                                                   class="selectgroup-input" checked="">
                                            <span
                                                class="selectgroup-text"> <span class="text-warning">( {{$product->cover_thickness['coverThicknessPrice'][$key]}} OMR ) </span> {{$coverThickness}} <i class="fa fa-trash-o ml-3 text-danger btnDelete" onClick="deleteItems(this)" data-toggle="tooltip" title=""></i></span>
                                            <input type="hidden" name="coverThicknessPrice[]"
                                                   value="{{$product->cover_thickness['coverThicknessPrice'][$key]}}">
                                        </label>
                                    @endforeach
                                @endif
                            </div>
                            <div class="row">
                                <div class="form-group col-6">
                                    <label class="form-label">سماكة غلاف الكتاب</label>
                                    <input type="text" class="form-control"  id="coverThickness"
                                           placeholder="ادخل السماكة">
                                    @error('coverThickness')
                                    <p class="text-danger">{{ $message }}</p>
                                    @enderror

                                </div>
                                <div class="form-group col-5">
                                    <label class="form-label">السعر </label>
                                    <input type="text" class="form-control"  id="coverThicknessPrice"
                                           placeholder="ادخل السعر ">
                                    @error('coverThicknessPrice')
                                    <p class="text-danger">{{ $message }}</p>
                                    @enderror

                                </div>
                                <div class="btn-list d-flex align-items-center">
                                    <button type="button" onClick="addCoverThicknessBtns()" class="btn btn-primary">اضافة
                                    </button>
                                </div>
                            </div>

                        </div>
                        <div class="card-body">
                            <div class="row justify-content-between text-center align-items-center">
                                <p class="cal-11 h5">عدد الصفحات</p>
                                <div class="">
                                    <input type="checkbox" class="btnActive" name="numberPagesActive" {{$product->number_pages ? $product->number_pages['numberPagesActive'] == "on" ? "checked" : "" : ""}}/>
                                    <span></span>
                                </div>
                            </div>
                            <div class="row">

                                <div class="form-group col-12">
                                    <label class="form-label">السعر الصفحة</label>
                                    <input type="text" class="form-control"  id="pagePrice"
                                           placeholder="ادخل سعر الصفحة" name="pagePrice" value="{{$product->number_pages ? $product->number_pages['pagePrice'] : null}}">
                                    @error('pagePrice')
                                    <p class="text-danger">{{ $message }}</p>
                                    @enderror

                                </div>
                            </div>

                        </div>
                        <div class="card-body">
                            <div class="row justify-content-between text-center align-items-center">
                                <p class="cal-11 h5">الكمية</p>
                                <div class="">
                                    <input type="checkbox" class="btnActive" name="inputNumberActive" {{$product->input_number ? $product->input_number['inputNumberActive'] == "on" ? "checked" : "" : ""}}/>
                                    <span></span>
                                </div>
                            </div>
                        </div>


                        <div class="form-group row text-center">
                            @foreach(explode(',',$product->images) as $image)
                                <img src="{{asset('images/'.$image)}}" class="image-box col-3" width="60">
                            @endforeach
                        </div>

                        <div class="col-lg-12">
                            <div class="card shadow">
                                <div class="card-header">
                                    <h3 class="mb-0 card-title">تحميل صورة الخدمة</h3>
                                </div>
                                <div class="card-body">
                                    <input type="file" class="dropify" name="images[]" id="images"
                                           data-max-file-size="1M" multiple/>
                                </div>
                            </div>
                        </div><!-- COL END -->
                        @error('image')
                        <p class="text-danger">{{ $message }}</p>
                        @enderror

                    </div>
                </div>
            </div>
        </div>

        <!-- COL END -->
        {{--
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="mb-0 card-title">add </h3>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <input type="text" class="form-control" name="input" placeholder="Enter the name
        ">
                                </div>
                                <div class="form-group">
                                    <input type="text" class="form-control" name="input" placeholder="Enter the name
        ">
                                </div>
                                <div class="form-group">
                                    <input type="text" class="form-control" name="input" placeholder="Enter the name
        ">
                                </div>
                                <div class="form-group">
                                    <input type="text" class="form-control" name="input" placeholder="Enter the name
        ">
                                </div>
                                <div class="form-group">
                                    <input type="text" class="form-control" name="input" placeholder="Enter the name
        ">
                                </div>

                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <input type="text" class="form-control" name="input" placeholder="Enter the price
        ">
                                </div>
                                <div class="form-group">
                                    <input type="text" class="form-control" name="input" placeholder="Enter the price
        ">
                                </div>
                                <div class="form-group">
                                    <input type="text" class="form-control" name="input" placeholder="Enter the price
        ">
                                </div>
                                <div class="form-group">
                                    <input type="text" class="form-control" name="input" placeholder="Enter the price
        ">
                                </div>
                                <div class="form-group">
                                    <input type="text" class="form-control" name="input" placeholder="Enter the price
        ">
                                </div>

                            </div>

                        </div>

                    </div>

                </div> --}}
        <div class="btn-list text-center">
            <button type="submit" class="btn btn-primary">Save changes</button>
            <a href="{{route('product.index')}}" class="btn btn-danger">Cancel</a>
        </div>
        <div class="btn-list text-center">
        </div>

    </form>
    <!--ROW END-->
    <!-- ============== END CONTENT ==============  -->

    <script>
        function addMeasuringBtns() {
            console.log('name')
            let name = $("#measuring").val()
            let price = $("#measuringPrice").val()

            if (name === "") {

            } else {
                var clicks = Math.floor((1 + Math.random()) * 0x10000)
                    .toString(16)
                    .substring(1);
                document.getElementById("measuringBtns").innerHTML +=
                    '<label class="selectgroup-item d-flex flex-row-reverse" id="' + clicks + '">' +
                    // '<i class="fa fa-trash-o" data-toggle="tooltip" title="" data-original-title="fa fa-trash-o"></i>'+
                    '<input type="checkbox" name="measuring[]" value="' + name + '" class="selectgroup-input" checked="">' +
                    '<span class="selectgroup-text"><span class="text-warning">(' + price + ' OMR ) </span> ' + name + ' <i class="fa fa-trash-o ml-3 text-danger btnDelete" onClick="deleteItems(this)" data-toggle="tooltip" title=""></i> </span>' +
                    '<input type="hidden" name="measuringPrice[]" value="' + price + '">' +
                    '</label>'
            }
        }

        function addPaperBtns() {
            console.log('name')
            let name = $("#paper").val()
            let price = $("#paperPrice").val()

            if (name === "") {

            } else {
                var clicks = Math.floor((1 + Math.random()) * 0x10000)
                    .toString(16)
                    .substring(1);
                document.getElementById("paperBtns").innerHTML +=
                    '<label class="selectgroup-item" id="' + clicks + '">' +
                    '<input type="checkbox" name="paper[]" value="' + name + '" class="selectgroup-input" checked="">' +
                    '<span class="selectgroup-text"><span class="text-warning">(' + price + ' OMR ) </span> ' + name + ' <i class="fa fa-trash-o ml-3 text-danger btnDelete" onClick="deleteItems(this)" data-toggle="tooltip" title="" ></i> </span>' +
                    '<input type="hidden" name="paperPrice[]" value="' + price + '">' +
                    '</label>'
            }
        }

        function addWeightBtns() {
            console.log('name')
            let name = $("#weight").val()
            let price = $("#weightPrice").val()

            if (name === "") {

            } else {
                var clicks = Math.floor((1 + Math.random()) * 0x10000)
                    .toString(16)
                    .substring(1);
                document.getElementById("weightBtns").innerHTML +=
                    '<label class="selectgroup-item" id="' + clicks + '">' +
                    '<input type="checkbox" name="weights[]" value="' + name + '" class="selectgroup-input" checked="">' +
                    '<span class="selectgroup-text"><span class="text-warning">(' + price + ' OMR ) </span> ' + name + ' <i class="fa fa-trash-o ml-3 text-danger btnDelete" onClick="deleteItems(this)" data-toggle="tooltip" title="" ></i>  </span>' +
                    '<input type="hidden" name="weightPrice[]" value="' + price + '">' +
                    '</label>'
            }
        }

        function addNumberBtns() {
            console.log('name')
            let name = $("#number").val()
            let price = $("#numberPrice").val()

            if (name === "") {

            } else {
                var clicks = Math.floor((1 + Math.random()) * 0x10000)
                    .toString(16)
                    .substring(1);
                document.getElementById("numberBtns").innerHTML +=
                    '<label class="selectgroup-item" id="' + clicks + '">' +
                    '<input type="checkbox" name="numbers[]" value="' + name + '" class="selectgroup-input" checked="">' +
                    '<span class="selectgroup-text"><span class="text-warning">(' + price + ' OMR ) </span> ' + name + ' <i class="fa fa-trash-o ml-3 text-danger btnDelete" onClick="deleteItems(this)" data-toggle="tooltip" title="" ></i>  </span>' +
                    '<input type="hidden" name="numberPrice[]" value="' + price + '">' +
                    '</label>'
            }
        }

        function addColorBtns() {
            console.log('name')
            let name = $("#color").val()
            let price = $("#colorPrice").val()

            if (name === "") {

            } else {
                var clicks = Math.floor((1 + Math.random()) * 0x10000)
                    .toString(16)
                    .substring(1);
                document.getElementById("colorBtns").innerHTML +=
                    '<label class="selectgroup-item" id="' + clicks + '">' +
                    '<input type="checkbox" name="colors[]" value="' + name + '" class="selectgroup-input" checked="">' +
                    '<span class="selectgroup-text"><span class="text-warning">(' + price + ' OMR ) </span>  ' + name + ' <i class="fa fa-trash-o ml-3 text-danger btnDelete" onClick="deleteItems(this)" data-toggle="tooltip" title="" ></i> </span>' +
                    '<input type="hidden" name="colorsPrice[]" value="' + price + '">' +
                    '</label>'
            }
        }

        function addCutBtns() {
            console.log('name')
            let name = $("#cut").val()
            let price = $("#cutPrice").val()

            if (name === "") {

            } else {
                var clicks = Math.floor((1 + Math.random()) * 0x10000)
                    .toString(16)
                    .substring(1);
                document.getElementById("cutBtns").innerHTML +=
                    '<label class="selectgroup-item" id="' + clicks + '">' +
                    '<input type="checkbox" name="cutLabels[]" value="' + name + '" class="selectgroup-input" checked="">' +
                    '<span class="selectgroup-text"><span class="text-warning">(' + price + ' OMR ) </span>  ' + name + ' <i class="fa fa-trash-o ml-3 text-danger btnDelete" onClick="deleteItems(this)" data-toggle="tooltip" title="" ></i> </span>' +
                    '<input type="hidden" name="cutPrice[]" value="' + price + '">' +
                    '</label>'
            }
        }

        function addPrintFaceBtns() {
            console.log('name')
            let name = $("#printFace").val()
            let price = $("#printFacePrice").val()

            if (name === "") {

            } else {
                var clicks = Math.floor((1 + Math.random()) * 0x10000)
                    .toString(16)
                    .substring(1);
                document.getElementById("printFaceBtns").innerHTML +=
                    '<label class="selectgroup-item" id="' + clicks + '">' +
                    '<input type="checkbox" name="printFace[]" value="' + name + '" class="selectgroup-input" checked="">' +
                    '<span class="selectgroup-text"><span class="text-warning">(' + price + ' OMR ) </span>  ' + name + ' <i class="fa fa-trash-o ml-3 text-danger btnDelete" onClick="deleteItems(this)" data-toggle="tooltip" title="" ></i> </span>' +
                    '<input type="hidden" name="printFacePrice[]" value="' + price + '">' +
                    '</label>'
            }
        }
        function addAssemblyTypeBtns() {
            console.log('name')
            let name = $("#assemblyType").val()
            let price = $("#assemblyTypePrice").val()

            if (name === "") {

            } else {
                var clicks = Math.floor((1 + Math.random()) * 0x10000)
                    .toString(16)
                    .substring(1);
                document.getElementById("assemblyTypeBtns").innerHTML +=
                    '<label class="selectgroup-item" id="' + clicks + '">' +
                    '<input type="checkbox" name="assemblyType[]" value="' + name + '" class="selectgroup-input" checked="">' +
                    '<span class="selectgroup-text"><span class="text-warning">(' + price + ' OMR ) </span>  ' + name + ' <i class="fa fa-trash-o ml-3 text-danger btnDelete" onClick="deleteItems(this)" data-toggle="tooltip" title="" ></i> </span>' +
                    '<input type="hidden" name="assemblyTypePrice[]" value="' + price + '">' +
                    '</label>'
            }
        }
        function addOpenNoteBtns() {
            console.log('name')
            let name = $("#openNote").val()
            let price = $("#openNotePrice").val()

            if (name === "") {

            } else {
                var clicks = Math.floor((1 + Math.random()) * 0x10000)
                    .toString(16)
                    .substring(1);
                document.getElementById("openNoteBtns").innerHTML +=
                    '<label class="selectgroup-item" id="' + clicks + '">' +
                    '<input type="checkbox" name="openNote[]" value="' + name + '" class="selectgroup-input" checked="">' +
                    '<span class="selectgroup-text"><span class="text-warning">(' + price + ' OMR ) </span>  ' + name + ' <i class="fa fa-trash-o ml-3 text-danger btnDelete" onClick="deleteItems(this)" data-toggle="tooltip" title="" ></i> </span>' +
                    '<input type="hidden" name="openNotePrice[]" value="' + price + '">' +
                    '</label>'
            }
        }
        function addSinusesBtns() {
            console.log('sinuses')
            let name = $("#sinuses").val()
            let price = $("#sinusesPrice").val()

            if (name === "") {

            } else {
                var clicks = Math.floor((1 + Math.random()) * 0x10000)
                    .toString(16)
                    .substring(1);
                document.getElementById("sinusesBtns").innerHTML +=
                    '<label class="selectgroup-item" id="' + clicks + '">' +
                    '<input type="checkbox" name="sinuses[]" value="' + name + '" class="selectgroup-input" checked="">' +
                    '<span class="selectgroup-text"><span class="text-warning">(' + price + ' OMR ) </span>  ' + name + ' <i class="fa fa-trash-o ml-3 text-danger btnDelete" onClick="deleteItems(this)" data-toggle="tooltip" title="" ></i> </span>' +
                    '<input type="hidden" name="sinusesPrice[]" value="' + price + '">' +
                    '</label>'
            }
        }
        function addThermalPackagingBtns() {
            console.log('name')
            let name = $("#thermal_packaging").val()
            let price = $("#thermalPackagingPrice").val()

            if (name === "") {

            } else {
                var clicks = Math.floor((1 + Math.random()) * 0x10000)
                    .toString(16)
                    .substring(1);
                document.getElementById("thermalPackagingBtns").innerHTML +=
                    '<label class="selectgroup-item" id="' + clicks + '">' +
                    '<input type="checkbox" name="thermal_packaging[]" value="' + name + '" class="selectgroup-input" checked="">' +
                    '<span class="selectgroup-text"><span class="text-warning">(' + price + ' OMR ) </span>  ' + name + ' <i class="fa fa-trash-o ml-3 text-danger btnDelete" onClick="deleteItems(this)" data-toggle="tooltip" title="" ></i> </span>' +
                    '<input type="hidden" name="thermalPackagingPrice[]" value="' + price + '">' +
                    '</label>'
            }
        }
        function addNumberCreasesBtns() {
            console.log('name')
            let name = $("#numberCreases").val()
            let price = $("#numberCreasesPrice").val()

            if (name === "") {

            } else {
                var clicks = Math.floor((1 + Math.random()) * 0x10000)
                    .toString(16)
                    .substring(1);
                document.getElementById("numberCreasesBtns").innerHTML +=
                    '<label class="selectgroup-item" id="' + clicks + '">' +
                    '<input type="checkbox" name="numberCreases[]" value="' + name + '" class="selectgroup-input" checked="">' +
                    '<span class="selectgroup-text"><span class="text-warning">(' + price + ' OMR ) </span>  ' + name + ' <i class="fa fa-trash-o ml-3 text-danger btnDelete" onClick="deleteItems(this)" data-toggle="tooltip" title="" ></i> </span>' +
                    '<input type="hidden" name="numberCreasesPrice[]" value="' + price + '">' +
                    '</label>'
            }
        }
        function addEdgesBtns() {
            console.log('name')
            let name = $("#edges").val()
            let price = $("#edgesPrice").val()

            if (name === "") {

            } else {
                var clicks = Math.floor((1 + Math.random()) * 0x10000)
                    .toString(16)
                    .substring(1);
                document.getElementById("edgesBtns").innerHTML +=
                    '<label class="selectgroup-item" id="' + clicks + '">' +
                    '<input type="checkbox" name="edges[]" value="' + name + '" class="selectgroup-input" checked="">' +
                    '<span class="selectgroup-text"><span class="text-warning">(' + price + ' OMR ) </span>  ' + name + ' <i class="fa fa-trash-o ml-3 text-danger btnDelete" onClick="deleteItems(this)" data-toggle="tooltip" title="" ></i> </span>' +
                    '<input type="hidden" name="edgesPrice[]" value="' + price + '">' +
                    '</label>'
            }
        }
        function addTapeColorBtns() {
            let name = $("#tapeColor").val()
            let price = $("#tapeColorPrice").val()

            if (name === "") {

            } else {
                var clicks = Math.floor((1 + Math.random()) * 0x10000)
                    .toString(16)
                    .substring(1);
                document.getElementById("tapeColorBtns").innerHTML +=
                    '<label class="selectgroup-item" id="' + clicks + '">' +
                    '<input type="checkbox" name="tapeColor[]" value="' + name + '" class="selectgroup-input" checked="">' +
                    '<span class="selectgroup-text"><span class="text-warning">(' + price + ' OMR ) </span>  ' + name + ' <i class="fa fa-trash-o ml-3 text-danger btnDelete" onClick="deleteItems(this)" data-toggle="tooltip" title="" ></i> </span>' +
                    '<input type="hidden" name="tapeColorPrice[]" value="' + price + '">' +
                    '</label>'
            }
        }
        function addStickerBtns() {
            let name = $("#sticker").val()
            let price = $("#stickerPrice").val()

            if (name === "") {

            } else {
                var clicks = Math.floor((1 + Math.random()) * 0x10000)
                    .toString(16)
                    .substring(1);
                document.getElementById("stickerBtns").innerHTML +=
                    '<label class="selectgroup-item" id="' + clicks + '">' +
                    '<input type="checkbox" name="sticker[]" value="' + name + '" class="selectgroup-input" checked="">' +
                    '<span class="selectgroup-text"><span class="text-warning">(' + price + ' OMR ) </span>  ' + name + ' <i class="fa fa-trash-o ml-3 text-danger btnDelete" onClick="deleteItems(this)" data-toggle="tooltip" title="" ></i> </span>' +
                    '<input type="hidden" name="stickerPrice[]" value="' + price + '">' +
                    '</label>'
            }
        }

        function addBaseBtns() {
            let name = $("#base").val()
            let price = $("#basePrice").val()

            if (name === "") {

            } else {
                var clicks = Math.floor((1 + Math.random()) * 0x10000)
                    .toString(16)
                    .substring(1);
                document.getElementById("baseBtns").innerHTML +=
                    '<label class="selectgroup-item" id="' + clicks + '">' +
                    '<input type="checkbox" name="base[]" value="' + name + '" class="selectgroup-input" checked="">' +
                    '<span class="selectgroup-text"><span class="text-warning">(' + price + ' OMR ) </span>  ' + name + ' <i class="fa fa-trash-o ml-3 text-danger btnDelete" onClick="deleteItems(this)" data-toggle="tooltip" title="" ></i> </span>' +
                    '<input type="hidden" name="basePrice[]" value="' + price + '">' +
                    '</label>'
            }
        }

        function addStructureBtns() {
            let name = $("#structure").val()
            let price = $("#structurePrice").val()

            if (name === "") {

            } else {
                var clicks = Math.floor((1 + Math.random()) * 0x10000)
                    .toString(16)
                    .substring(1);
                document.getElementById("structureBtns").innerHTML +=
                    '<label class="selectgroup-item" id="' + clicks + '">' +
                    '<input type="checkbox" name="structure[]" value="' + name + '" class="selectgroup-input" checked="">' +
                    '<span class="selectgroup-text"><span class="text-warning">(' + price + ' OMR ) </span>  ' + name + ' <i class="fa fa-trash-o ml-3 text-danger btnDelete" onClick="deleteItems(this)" data-toggle="tooltip" title="" ></i> </span>' +
                    '<input type="hidden" name="structurePrice[]" value="' + price + '">' +
                    '</label>'
            }
        }

        function addBoxBtns() {
            console.log('name')
            let name = $("#box").val()
            let price = $("#boxPrice").val()

            if (name === "") {

            } else {
                var clicks = Math.floor((1 + Math.random()) * 0x10000)
                    .toString(16)
                    .substring(1);
                document.getElementById("boxBtns").innerHTML +=
                    '<label class="selectgroup-item" id="' + clicks + '">' +
                    '<input type="checkbox" name="box[]" value="' + name + '" class="selectgroup-input" checked="">' +
                    '<span class="selectgroup-text"><span class="text-warning">(' + price + ' OMR ) </span>  ' + name + ' <i class="fa fa-trash-o ml-3 text-danger btnDelete" onClick="deleteItems(this)" data-toggle="tooltip" title="" ></i> </span>' +
                    '<input type="hidden" name="boxPrice[]" value="' + price + '">' +
                    '</label>'
            }
        }
        function addCoverThicknessBtns() {
            console.log('name')
            let name = $("#coverThickness").val()
            let price = $("#coverThicknessPrice").val()

            if (name === "") {

            } else {
                var clicks = Math.floor((1 + Math.random()) * 0x10000)
                    .toString(16)
                    .substring(1);
                document.getElementById("coverThicknessBtns").innerHTML +=
                    '<label class="selectgroup-item" id="' + clicks + '">' +
                    '<input type="checkbox" name="coverThickness[]" value="' + name + '" class="selectgroup-input" checked="">' +
                    '<span class="selectgroup-text"><span class="text-warning">(' + price + ' OMR ) </span>  ' + name + ' <i class="fa fa-trash-o ml-3 text-danger btnDelete" onClick="deleteItems(this)" data-toggle="tooltip" title="" ></i> </span>' +
                    '<input type="hidden" name="coverThicknessPrice[]" value="' + price + '">' +
                    '</label>'
            }
        }

        function deleteItems(tag){
            tag.parentElement.parentElement.remove()
        }

    </script>
@endsection
