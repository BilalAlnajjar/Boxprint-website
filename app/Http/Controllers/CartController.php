<?php

namespace App\Http\Controllers;

use App\Http\Requests\DeleteProductFromCartRrquest;
use App\Http\Requests\StoreCartRequest;
use App\Http\Requests\UpdateCartRequest;
use App\Models\Cart;
use App\Models\CartProduct;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Auth::user()->cart()->first()->products;

        return view('pages.cart', [
            'web' => [
                'name' => 'سلة الطلبات | Box Print'
            ],
            'products' => $products,
        ]);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \App\Http\Requests\StoreCartRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreCartRequest $request)
    {
        $request->validated();
        $product = Product::findOrFail($request->product_id);
        $cart = Auth::user()->cart;

        $path_image_logo = $request->file('image_logo')->store('/imagesSite', ['disk' => 'uploads']);
        $path_image_content = $request->file('image_content')->store('/imagesSite', ['disk' => 'uploads']);

        CartProduct::create([
            'product_id' => $product->id,
            'cart_id' => $cart->id,
            'image_logo' => $path_image_logo,
            'image_content' => $path_image_content,
            'company_name' => $request->company_name,
            'width' => $request->width,
            'height' => $request->height,
            'phone' => $request->phone,
            'website' => $request->website,
            'email' => $request->email,
            'social_media_details' => $request->social_media_details,
            'more_details' => $request->more_details,
            'price' => $product->price,
            'type' => 'design',

        ]);

        return redirect()->route('store');

    }

    public function storePrint(Request $request, $product_id)
    {
        $request->validate([
            'image_design' => 'required'
        ]);
        $product = Product::findOrFail($product_id);
        $cart = Auth::user()->cart;



//
//        if ($request->measuring && $request->measuring['measuringPrice']) {
//
//            $price += $request->measuring['measuringPrice'];
//        }
//
//        if ($request->papers && $request->papers['paperPrice']) {
//
//            $price += $request->papers['paperPrice'];
//        }
//
//        if ($request->weights && $request->weights['weightPrice']) {
//
//            $price += $request->weights['weightPrice'];
//        }
//
//        if ($request->cutLabels && $request->cutLabels['cutPrice']) {
//
//            $price += $request->cutLabels['cutPrice'];
//        }
//
//        if ($request->colors && $request->colors['colorPrice']) {
//
//            $price += $request->colors['colorPrice'];
//        }
//
//        if ($request->numberPages && $request->numberPages['numberPagePrice'] && $request->numberPages['numberPages']) {
//
//            $price += $request->numberPages['numberPagePrice'] * $request->numberPages['numberPages'];
//        }
//
//
//        if ($request->printFaces && $request->printFaces['printFacePrice']) {
//
//            $price += $request->printFaces['printFacePrice'];
//        }
//
//        if ($request->assemblyType && $request->assemblyType['assemblyTypePrice']) {
//
//            $price += $request->assemblyType['assemblyTypePrice'];
//        }
//        if ($request->openNote && $request->openNote['openNotePrice']) {
//
//            $price += $request->openNote['openNotePrice'];
//        }
//        if ($request->assemblyType && $request->assemblyType['assemblyTypePrice']) {
//
//            $price += $request->assemblyType['assemblyTypePrice'];
//        }
//        if ($request->assemblyType && $request->assemblyType['assemblyTypePrice']) {
//
//            $price += $request->assemblyType['assemblyTypePrice'];
//        }
//        if ($request->assemblyType && $request->assemblyType['assemblyTypePrice']) {
//
//            $price += $request->assemblyType['assemblyTypePrice'];
//        }
//        if ($request->assemblyType && $request->assemblyType['assemblyTypePrice']) {
//
//            $price += $request->assemblyType['assemblyTypePrice'];
//        }

//        if ($request->inputNumber) {
//
//            $price = $price * $request->inputNumber;
//        }

        $path_image_design = $request->file('image_design')->store('/imagesSite', ['disk' => 'uploads']);

        CartProduct::create([
            'product_id' => $product->id,
            'cart_id' => $cart->id,
            'image_design' => $path_image_design,
            'measuring' => $request->measuring ? implode(",", $request->measuring) : null,
            'papers' => $request->papers ? implode(',', $request->papers) : null,
            'weights' => $request->weights ? implode(',', $request->weights) : null,
            'cutLabels' => $request->cutLabels ? implode(',', $request->cutLabels) : null,
            'colors' => $request->colors ? implode(',', $request->colors) : null,
            'number_pages' => $request->pages ? implode(',', $request->pages) : null,
            'print_faces' => $request->print_faces ? implode(',', $request->print_faces) : null,
            'assembly_type' => $request->assembly_type ? implode(',', $request->assembly_type) : null,
            'open_note' => $request->open_note ? implode(',', $request->open_note) : null,
            'sinuses' => $request->sinuses ? implode(',', $request->sinuses) : null,
            'thermal_packaging' => $request->thermal_packaging ? implode(',', $request->thermal_packaging) : null,
            'number_creases' => $request->number_creases ? implode(',', $request->number_creases) : null,
            'edges' => $request->edges ? implode(',', $request->edges) : null,
            'sticker' => $request->sticker ? implode(',', $request->sticker) : null,
            'structure' => $request->structure ? implode(',', $request->structure) : null,
            'box' => $request->box ? implode(',', $request->box) : null,
            'base' => $request->base ? implode(',', $request->base) : null,
            'tape_color' => $request->tape_color ? implode(',', $request->tape_color) : null,
            'cover_thickness' => $request->cover_thickness ? implode(',', $request->cover_thickness) : null,
            'numbers' => $request->number ? $request->number : null,
            'price' => $request->total,
            'type' => 'print',
        ]);

        return redirect()->route('store');

    }

    /**
     * Display the specified resource.
     *
     * @param \App\Models\Cart $cart
     * @return \Illuminate\Http\Response
     */
    public function show(Cart $cart)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Models\Cart $cart
     * @return \Illuminate\Http\Response
     */
    public function edit(Cart $cart)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \App\Http\Requests\UpdateCartRequest $request
     * @param \App\Models\Cart $cart
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateCartRequest $request, Cart $cart)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Models\Cart $cart
     * @return \Illuminate\Http\Response
     */
    public function destroy(Cart $cart)
    {
        //
    }

    public function cartProductDelete(DeleteProductFromCartRrquest $request)
    {
        $request->validate([
            "product_id" => 'required',
        ]);

        $cart_id = Auth::user()->cart()->first()->id;

        return $cart_product = CartProduct::where("product_id", $request->product_id)->where("cart_id", $cart_id)->delete();


    }
}
