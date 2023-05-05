<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreProductRequest;
use App\Http\Requests\UpdateProductRequest;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::get(['id', 'name', 'price', 'category_id', 'images']);
        return view('pages.admin.products', [
            'products' => $products,
        ]);
    }

    public function categoryProducts(Request $request)
    {
        if ($request->category_id) {
            $products = Category::findOrFail($request->category_id)->products;
        } else {
            $products = Product::get();
        }

        return response()->json($products);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::get();
        return view('pages.admin.add_product', [
            'categories' => $categories,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \App\Http\Requests\StoreProductRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreProductRequest $request)
    {
        $validation = $request->validated();
//        dd($request);

        foreach ($request->file('images') as $image) {
            $arr[] = $image->store('/imagesSite', ['disk' => 'uploads']);
        }

        $pathImages = collect($arr)->implode(','); // {0:"a", 1:"b", 2:"c"};

        $arrMeasure = [
            "measuringActive" => $request->measuringActive,
            "measuring" => $request->measuring,
            "measuringPrice" => $request->measuringPrice,
        ];

        $arrPaper = [
            "paperActive" => $request->paperActive,
            "paper" => $request->paper,
            "paperPrice" => $request->paperPrice,
        ];

        $arrWeight = [
            "weightActive" => $request->weightActive,
            "weight" => $request->weights,
            "weightPrice" => $request->weightPrice,
        ];


        $arrNumber = [
            "numberActive" => $request->numberActive,
            "number" => $request->numbers,
            "numberPrice" => $request->numberPrice,
        ];

        $arrCut = [
            "cutActive" => $request->cutActive,
            "cut" => $request->cutLabels,
            "cutPrice" => $request->cutPrice,
        ];

        $arrColor = [
            "colorActive" => $request->colorActive,
            "color" => $request->colors,
            "colorPrice" => $request->colorsPrice,
        ];

        $arrPrintFace = [
            "printFaceActive" => $request->printFaceActive,
            "printFace" => $request->printFace,
            "printFacePrice" => $request->printFacePrice,
        ];

        $arrAssemblyType = [
            "assemblyTypeActive" => $request->assemblyTypeActive,
            "assemblyType" => $request->assemblyType,
            "assemblyTypePrice" => $request->assemblyTypePrice,
        ];

        $arrOpenNote = [
            "openNoteActive" => $request->openNoteActive,
            "openNote" => $request->openNote,
            "openNotePrice" => $request->openNotePrice,
        ];

        $arrSinuses = [
            "sinusesActive" => $request->sinusesActive,
            "sinuses" => $request->sinuses,
            "sinusesPrice" => $request->sinusesPrice,
        ];

        $arrThermalPackaging = [
            "thermalPackagingActive" => $request->thermalPackagingActive,
            "thermalPackaging" => $request->thermal_packaging,
            "thermalPackagingPrice" => $request->thermalPackagingPrice,
        ];

        $arrNumberCreases = [
            "numberCreasesActive" => $request->numberCreasesActive,
            "numberCreases" => $request->numberCreases,
            "numberCreasesPrice" => $request->numberCreasesPrice,
        ];

        $arrEdges = [
            "edgesActive" => $request->edgesActive,
            "edges" => $request->edges,
            "edgesPrice" => $request->edgesPrice,
        ];

        $arrCoverThickness = [
            "coverThicknessActive" => $request->coverThicknessActive,
            "coverThickness" => $request->coverThickness,
            "coverThicknessPrice" => $request->coverThicknessPrice,
        ];
        $arrSticker = [
            "stickerActive" => $request->stickerActive,
            "sticker" => $request->sticker,
            "stickerPrice" => $request->stickerPrice,
        ];
        $arrStructure = [
            "structureActive" => $request->structureActive,
            "structure" => $request->structure,
            "structurePrice" => $request->structurePrice,
        ];
        $arrBox = [
            "boxActive" => $request->boxActive,
            "box" => $request->box,
            "boxPrice" => $request->boxPrice,
        ];
        $arrBase = [
            "baseActive" => $request->baseActive,
            "base" => $request->base,
            "basePrice" => $request->basePrice,
        ];
        $arrTapeColor = [
            "tapeColorActive" => $request->tapeColorActive,
            "tapeColor" => $request->tapeColor,
            "tapeColorPrice" => $request->tapeColorPrice,
        ];

        $arrNumberPages = [
            "numberPagesActive" => $request->numberPagesActive,
            "pagePrice" => $request->pagePrice,
        ];

        $arrInputNumber = [
            "inputNumberActive" => $request->inputNumberActive,
        ];


        $product = Product::create([
            'name' => $request->name,
            'category_id' => $request->category_id,
            'timeDelivery' => $request->timeDelivery,
            'price' => $request->price,
            'price_display' => $request->price_display,
            'description' => $request->description,
            'measure' => $arrMeasure,
            'paper' => $arrPaper,
            'weights' => $arrWeight,
            'numbers' => $arrNumber,
            'cutLabels' => $arrCut,
            'print_faces' => $arrPrintFace,
            'colors' => $arrColor,
            'assembly_type' => $arrAssemblyType,
            'open_note' => $arrOpenNote,
            'sinuses' => $arrSinuses,
            'thermal_packaging' => $arrThermalPackaging,
            'number_creases' => $arrNumberCreases,
            'edges' => $arrEdges,
            'cover_thickness' => $arrCoverThickness,
            'box' => $arrBox,
            'base' => $arrBase,
            'structure' => $arrStructure,
            'sticker' => $arrSticker,
            'tape_color' => $arrTapeColor,
            'number_pages' => $arrNumberPages,
            'input_number' => $arrInputNumber,
            'images' => $pathImages,
        ]);


        $request->session()->put('message', 'تم اضافة الخدمة بنجاح');
        return back()->with('result', "success");
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Models\Product $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Models\Product $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        $categories = Category::get();
        return view('pages.admin.edit_product', [
            'product' => $product,
            'categories' => $categories,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \App\Http\Requests\UpdateProductRequest $request
     * @param \App\Models\Product $product
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateProductRequest $request, Product $product)
    {
        $validation = $request->validated();
        if ($request->file('images')) {

            foreach (explode(',', $product->images) as $image) {
                Storage::disk('uploads')->delete($image);
            }

            foreach ($request->file('images') as $image) {
                $arr[] = $image->store('/imagesSite', ['disk' => 'uploads']);
            }

            $pathImages = collect($arr)->implode(','); // {0:"a", 1:"b", 2:"c"};

            $product->update([
                'images' => $pathImages,
            ]);
        }


        $arrMeasure = [
            "measuringActive" => $request->measuringActive,
            "measuring" => $request->measuring,
            "measuringPrice" => $request->measuringPrice,
        ];

        $arrPaper = [
            "paperActive" => $request->paperActive,
            "paper" => $request->paper,
            "paperPrice" => $request->paperPrice,
        ];

        $arrWeight = [
            "weightActive" => $request->weightActive,
            "weight" => $request->weights,
            "weightPrice" => $request->weightPrice,
        ];


        $arrNumber = [
            "numberActive" => $request->numberActive,
            "number" => $request->numbers,
            "numberPrice" => $request->numberPrice,
        ];

        $arrCut = [
            "cutActive" => $request->cutActive,
            "cut" => $request->cutLabels,
            "cutPrice" => $request->cutPrice,
        ];

        $arrColor = [
            "colorActive" => $request->colorActive,
            "color" => $request->colors,
            "colorPrice" => $request->colorsPrice,
        ];

        $arrPrintFace = [
            "printFaceActive" => $request->printFaceActive,
            "printFace" => $request->printFace,
            "printFacePrice" => $request->printFacePrice,
        ];

        $arrAssemblyType = [
            "assemblyTypeActive" => $request->assemblyTypeActive,
            "assemblyType" => $request->assemblyType,
            "assemblyTypePrice" => $request->assemblyTypePrice,
        ];

        $arrOpenNote = [
            "openNoteActive" => $request->openNoteActive,
            "openNote" => $request->openNote,
            "openNotePrice" => $request->openNotePrice,
        ];

        $arrSinuses = [
            "sinusesActive" => $request->sinusesActive,
            "sinuses" => $request->sinuses,
            "sinusesPrice" => $request->sinusesPrice,
        ];

        $arrThermalPackaging = [
            "thermalPackagingActive" => $request->thermalPackagingActive,
            "thermalPackaging" => $request->thermal_packaging,
            "thermalPackagingPrice" => $request->thermalPackagingPrice,
        ];

        $arrNumberCreases = [
            "numberCreasesActive" => $request->numberCreasesActive,
            "numberCreases" => $request->numberCreases,
            "numberCreasesPrice" => $request->numberCreasesPrice,
        ];

        $arrEdges = [
            "edgesActive" => $request->edgesActive,
            "edges" => $request->edges,
            "edgesPrice" => $request->edgesPrice,
        ];

        $arrCoverThickness = [
            "coverThicknessActive" => $request->coverThicknessActive,
            "coverThickness" => $request->coverThickness,
            "coverThicknessPrice" => $request->coverThicknessPrice,
        ];
        $arrSticker = [
            "stickerActive" => $request->stickerActive,
            "sticker" => $request->sticker,
            "stickerPrice" => $request->stickerPrice,
        ];
        $arrStructure = [
            "structureActive" => $request->structureActive,
            "structure" => $request->structure,
            "structurePrice" => $request->structurePrice,
        ];
        $arrBox = [
            "boxActive" => $request->boxActive,
            "box" => $request->box,
            "boxPrice" => $request->boxPrice,
        ];
        $arrBase = [
            "baseActive" => $request->baseActive,
            "base" => $request->base,
            "basePrice" => $request->basePrice,
        ];
        $arrTapeColor = [
            "tapeColorActive" => $request->tapeColorActive,
            "tapeColor" => $request->tapeColor,
            "tapeColorPrice" => $request->tapeColorPrice,
        ];

        $arrCoverThickness = [
            "coverThicknessActive" => $request->coverThicknessActive,
            "coverThickness" => $request->coverThickness,
            "coverThicknessPrice" => $request->coverThicknessPrice,
        ];

        $arrNumberPages = [
            "numberPagesActive" => $request->numberPagesActive,
            "pagePrice" => $request->pagePrice,
        ];

        $arrInputNumber = [
            "inputNumberActive" => $request->inputNumberActive,
        ];

        $product->update([
            'name' => $request->name,
            'category_id' => $request->category_id,
            'timeDelivery' => $request->timeDelivery,
            'price' => $request->price,
            'price_display' => $request->price_display,
            'description' => $request->description,
            'measure' => $arrMeasure,
            'paper' => $arrPaper,
            'weights' => $arrWeight,
            'numbers' => $arrNumber,
            'cutLabels' => $arrCut,
            'print_faces' => $arrPrintFace,
            'colors' => $arrColor,
            'assembly_type' => $arrAssemblyType,
            'open_note' => $arrOpenNote,
            'sinuses' => $arrSinuses,
            'thermal_packaging' => $arrThermalPackaging,
            'number_creases' => $arrNumberCreases,
            'edges' => $arrEdges,
            'cover_thickness' => $arrCoverThickness,
            'box' => $arrBox,
            'base' => $arrBase,
            'structure' => $arrStructure,
            'sticker' => $arrSticker,
            'tape_color' => $arrTapeColor,
            'number_pages' => $arrNumberPages,
            'input_number' => $arrInputNumber,
        ]);

        $request->session()->put('message', 'تم تعديل الخدمة بنجاح');
        return back()->with('result', "success");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Models\Product $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, Product $product)
    {
        foreach (explode(',', $product->images) as $image) {
            Storage::disk('uploads')->delete($image);
        }

        $product->delete();

        $request->session()->put('message', 'تم حذف الخدمة بنجاح');
        return back()->with('result', "success");
    }
}
