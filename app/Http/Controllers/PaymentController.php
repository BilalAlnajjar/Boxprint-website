<?php

namespace App\Http\Controllers;
use App\Models\CartProduct;
use Illuminate\Support\Facades\Auth;
use Stripe\Charge;
use Stripe\Stripe;
use App\Models\Cart;
use App\Models\Offer;
use App\Models\Order;
use App\Models\Product;
use Illuminate\Http\Request;
use App\Models\SubAdditionOffers;
use App\Models\SubAdditionProducts;
use Illuminate\Support\Facades\Session;



class PaymentController extends Controller
{

    public $order;

    public function index($id)
    {
        return view('pages.view-stripe',[
            'web' => [
                'name' => 'صفحة الدفع | Box Print'
            ],
            'order' => Order::findOrFail($id),
        ]);
    }

    public function makePayment(Request $request,$id)
    {
        Stripe::setApiKey(env('STRIPE_SECRET'));


        $this->order = Order::findOrFail($id);

        if(!$this->order){
            return redirect()->route('index')->with('orderMess','You Do not have Order !!' );
         }


        Charge::create([
                "amount" => $this->order->total * 100,
                "currency" => 'usd',
                "source" => $request->stripeToken,
        ]);

        $this->order->update([
            'payment_type' => 'stripe',
        ]);

        $products = Auth::user()->cart()->first()->products;

        foreach ($products as $product){
            $cartProducts = CartProduct::where('product_id','=',$product->id)->where('cart_id','=',$product->pivot->cart_id)->delete();
        }

        $request->session()->put('message','تمت عملية الدفع بنجاح');

        return redirect()->route('home')->with('result','sacssesChechout');


        // return redirect()->route('index')->with('result','sacssesChechout');
    }

}
