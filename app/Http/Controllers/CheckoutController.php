<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\CartProduct;
use App\Models\User;
use App\Models\Offer;
use App\Models\Order;
use App\Models\Address;
// use PayPalCheckoutSdk\Core\PayPalHttpClient;
use App\Models\Product;
use Illuminate\Http\Request;
use App\Models\SubAdditionOffers;
use App\Models\SubAdditionProducts;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use PayPalCheckoutSdk\Core\PayPalHttpClient;
use PayPalCheckoutSdk\Core\SandboxEnvironment;
use PayPalCheckoutSdk\Core\ProductionEnvironment;
use PayPalCheckoutSdk\Orders\OrdersCreateRequest;
use PayPalCheckoutSdk\Orders\OrdersCaptureRequest;
use Symfony\Component\HttpKernel\Exception\HttpException;

class CheckoutController extends Controller
{

    private $mode;
    private $clientId;
    private $clientSecret;
    private $order;
    private $total;

    public function index($id){
        $order = Order::findOrFail($id);

    return view('pages.orderCreate',[
        'web' => [
            'name' => 'صفحة الدفع | Box Print'
        ],
        'order' => $order,
    ]);
}
    public function createOrder(Request $request,$id)
    {


        $this->order = Order::findOrFail($id);


     if(!$this->order){
        return redirect()->route('home')->with('messageOrder','You dont have no Order !!');
    }




        // Creating an environment

        $client = $this->getClient();
        // create order in the system then


        // Construct a request object and set desired parameters
        // Here, OrdersCreateRequest() creates a POST request to /v2/checkout/orders
        $request = new OrdersCreateRequest();
        $request->prefer('return=representation');  // must I use it
        $request->body = [
            "intent" => "CAPTURE",
            "purchase_units" => [[
                "reference_id" => "20201208",
                "amount" => [
                    "value" => $this->order->total,
                    "currency_code" => "OMR"
                ]
            ]],
            "application_context" => [
                "cancel_url" => URL::route('paypal.cancel'), // i used URL to return all link
                "return_url" => URL::route('paypal.return'),
            ]
        ];

        try {
            // Call API with your client and get a response for your call
            $response = $client->execute($request);

            if ($response->statusCode == 201) {

                session()->put('paypal_order_id',$response->result->id);

                foreach ($response->result->links as $link) {
                    if ($link->rel == 'approve') {

                        return redirect()->away($link->href);
                    }
                }
            }

            // If call returns body in response, you can get the deserialized version from the result attribute of the response
            //print_r($response); // print $response
        } catch (HttpException $ex) {
            echo $ex->statusCode;
            print_r($ex->getMessage());
        }
    }

    public function paypalReturn(Request $request,$id)
    {

        $request->session()->put('message','Payment completed successfully');

        //return array_sum( array($a))

        if(!$this->order){
            return redirect()->route('home')->with('orderMess','ليس لديك طلبات حاليا');
    }

     $this->total = $this->order->total;

        if(empty($request->input('PayerID')) || empty($request->input('token'))){
            die('Payment Filed');
        }

        // Here, OrdersCaptureRequest() creates a POST request to /v2/checkout/orders
        // $response->result->id gives the orderId of the order created above
        $client = $this->getClient();
        $request = new OrdersCaptureRequest(session()->get('paypal_order_id'));
        $request->prefer('return=representation');
        try {
            // Call API with your client and get a response for your call
            $response = $client->execute($request);

            // If call returns body in response, you can get the deserialized version from the result attribute of the response

            session()->forget('paypal_order_id');

            if($response->result->status == 'COMPLETED'){


                $this->order->update([
                    'payment_type' => 'paypal',
                ]);

                $products = Auth::user()->cart()->first()->products;

                foreach ($products as $product){
                    $cartProducts = CartProduct::where('product_id','=',$product->id)->where('cart_id','=',$product->pivot->cart_id)->delete();
                }

                return redirect()->route('home')->with('result','sacssesChechout');
            }
            return redirect()->route('home')->withErrors('ErrorChechout','فشلت عمليةالدفع');

        } catch (HttpException $ex) {
            echo $ex->statusCode;
            print_r($ex->getMessage());
        }
    }

    public function paypalCancel()
    {

        dd(request()->all());
    }

private function getClient(){
        $this->clientId = config('paypal.sandbox_client_id');
        $this->clientSecret = config('paypal.sandbox_secret');
        $environment = new SandboxEnvironment($this->clientId, $this->clientSecret); // if sandbox must change ProductionEnvironment to SandboxEnvironment;
        $client = new PayPalHttpClient($environment);

        return  $client;

}

}
