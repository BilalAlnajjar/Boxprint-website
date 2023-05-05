<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreOrderRequest;
use App\Http\Requests\UpdateOrderRequest;
use App\Models\Order;
use App\Models\OrderProduct;
use App\Models\Product;
use App\Models\User;
use App\Notifications\NewOrder;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index()
    {
        $orders = Order::orderBy('id', 'desc')->get();
        return view('pages.admin.orders', [
            'orders' => $orders,
        ]);
    }


    public function indexPending()
    {
        $orders = Order::where('status', 'pending')->orderBy('id', 'desc')->get();

        return view('pages.admin.orders', [
            'orders' => $orders,
        ]);
    }

    // public function indexProcessing()
    // {
    //     $orders = Order::where('status',"!=",'processing')->get();

    //    return view('admin.orders',[
    //        'orders' => $orders,
    //    ]);
    // }

    public function indexDeclined()
    {
        $orders = Order::where('status', 'declined')->orderBy('id', 'desc')->get();

        return view('pages.admin.orders', [
            'orders' => $orders,
        ]);
    }

    public function indexComplete()
    {
        $orders = Order::where('status', 'completed')->orderBy('id', 'desc')->get();

        return view('pages.admin.orders', [
            'orders' => $orders,
        ]);
    }

    public function indexOrdersUser($id)
    {
        $user = User::findOrFail($id);
        $orders = $user->orders()->get();

        return view('pages.admin.orders', [
            'orders' => $orders,
        ]);
    }

    public function orderPrintPage($id)
    {

        $product = Product::findOrFail($id);
        return view('pages.order_print', [
            'web' => [
                'name' => 'Box Print'
            ],
            'product' => $product
        ]);
    }

    public function orderDesignPage($id)
    {
        $product = Product::findOrFail($id);
        return view('pages.order_design', [
            'web' => [
                'name' => 'Box Print'
            ],
            'product' => $product
        ]);
    }

    public function orderStore(Request $request)
    {
        $user = Auth::user();
        $products = $user->cart()->first()->products;
        $order_number = rand(100, 10000);

        $response = Http::post('https://api.fatora.io/v1/payments/checkout', [
            'api_key' => "E4B73FEE-F492-4607-A38D-852B0EBC91C9",
        ]);

        $response->body([
            "amount" => $request->total,
            "currency" => "OMR",
            "order_id" => $order_number,
            "client" => [
                "name" => $user->name,
                "phone" => $user->phone,
                "email" => $user->email
            ],
            "language" => "ar",
            "success_url" => route("success.checkout"),
            "failure_url" => route("failure.checkout"),
            "fcm_token" => "abdc@123",
            "save_token" => true,
            "note" => "test payment"
        ]);


        $order = Order::create([
            'number' => $order_number,
            'user_id' => Auth::user()->id,
        ]);

        foreach ($products as $product) {
            OrderProduct::create([
                'product_id' => $product->id,
                'order_id' => $order->id,
                'image_logo' => $product->pivot->image_logo,
                'image_content' => $product->pivot->image_content,
                'company_name' => $product->pivot->company_name,
                'width' => $product->pivot->width,
                'height' => $product->pivot->height,
                'phone' => $product->pivot->phone,
                'website' => $product->pivot->website,
                'email' => $product->pivot->email,
                'social_media_details' => $product->pivot->social_media_details,
                'more_details' => $product->pivot->more_details,
                'price' => $product->pivot->price,
                'type' => $product->pivot->type,
                'measuring' => $product->pivot->measuring,
                'papers' => $product->pivot->papers,
                'weights' => $product->pivot->weights,
                'numbers' => $product->pivot->numbers,
                'cutLabels' => $product->pivot->cutLabels,
                'number_pages' => $product->pivot->number_pages,
                'input_number' => $product->pivot->input_number,
                'print_faces' => $product->pivot->print_faces,
                'assembly_type' => $product->pivot->assembly_type,
                'open_note' => $product->pivot->open_note,
                'sinuses' => $product->pivot->sinuses,
                'thermal_packaging' => $product->pivot->thermal_packaging,
                'number_creases' => $product->pivot->number_creases,
                'edges' => $product->pivot->edges,
                'tape_color' => $product->pivot->tape_color,
                'base' => $product->pivot->base,
                'box' => $product->pivot->box,
                'structure' => $product->pivot->structure,
                'sticker' => $product->pivot->sticker,
                'cover_thickness' => $product->pivot->cover_thickness,
            ]);

//            $cartProducts->delete();
        }


        $order->update([
            'total' => $total,
        ]);


        $order->notify(new NewOrder($order));

        $request->session()->put('message', 'تم ارسال طلبك بنجاح وسيتم الرد عليك في اقرب وقت');
        return redirect()->route('home')->with('result', "success");
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
     * @param \App\Http\Requests\StoreOrderRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreOrderRequest $request)
    {
        $request->validated();


    }

    /**
     * Display the specified resource.
     *
     * @param \App\Models\Order $order
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $order = Order::findOrFail($id);
        view('pages.admin.view_order', [
            'order' => $order,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Models\Order $order
     * @return \Illuminate\Http\Response
     */
    public function edit(Order $order)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \App\Http\Requests\UpdateOrderRequest $request
     * @param \App\Models\Order $order
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateOrderRequest $request, Order $order)
    {
        //
    }

    public function statusComplete($id)
    {
        $order = Order::findOrFail($id);

        $order->update([
            'status' => 'completed'
        ]);

        return back();
    }

    public function statusConsle($id)
    {
        $order = Order::findOrFail($id);

        $order->update([
            'status' => 'declined'
        ]);
        return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Models\Order $order
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $order = Order::findOrFail($id);
        $order->delete();

        return back()->with("result", 'success');
    }
}
