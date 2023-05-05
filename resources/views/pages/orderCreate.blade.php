@extends('pages.layouts.user')
@section('content')




<script>
    b = document.getElementById('body');
    b.style.background = "#4A3274";
</script>

<style>
    .paypal{
        margin-top: 6%;
        margin-bottom:6%;
    }
    .btn-check{
        background: rgba(24,30,139,1) ;
        color: #fff;
    }
    #payment-button:hover{
        color: #fff !important;
    }
</style>

    <div class="card orderCraete paypal container">

        <div class="card-body w-50 m-auto">
            <div class="card-title">
                <h3 class="text-center title-2 m-2">Checkout</h3>
            </div>
            <hr>
            <form action="{{route('user.checkout',$order->id)}}" method="post" novalidate="novalidate">
                @csrf
                <div class="form-group">
                    <label for="cc-payment" class="control-label mb-1">Amount</label>
                    <input id="cc-pament" name="cc-payment" type="text" class="form-control" aria-required="true" aria-invalid="false" value="£{{number_format($order->total,2)}}" disabled>
                </div>

                <div class="form-group has-success">
                    <label for="cc-name" class="control-label mb-1"> Order Name </label>
                    @if($order->products)
                        @foreach($order->products as $product)
                    <input value="{{$product->name}}" id="cc-name" name="cc-name" type="text" class="form-control cc-name valid" data-val="true" data-val-required="Please enter the name on card"
                        autocomplete="cc-name" aria-required="true" aria-invalid="false" aria-describedby="cc-name-error" disabled>
                    <span class="help-block field-validation-valid" data-valmsg-for="cc-name" data-valmsg-replace="true"></span>
                        @endforeach
                    @endif
                </div>
                {{-- @if($order->products()->first())
                <div class="form-group has-success">
                    <label for="cc-name" class="control-label mb-1"> Order Name </label>
                    <input value="{{$order->products()->first()->name}}" id="cc-name" name="cc-name" type="text" class="form-control cc-name valid" data-val="true" data-val-required="Please enter the name on card"
                        autocomplete="cc-name" aria-required="true" aria-invalid="false" aria-describedby="cc-name-error" disabled>
                    <span class="help-block field-validation-valid" data-valmsg-for="cc-name" data-valmsg-replace="true"></span>
                </div>
                @endif --}}
                <div class="form-group">
                    <label for="cc-number" class="control-label mb-1">Number </label>
                    <input id="cc-number" name="cc-number" type="tel" class="form-control cc-number identified visa" value="{{$order->number}}" data-val="true"
                        data-val-required="Please enter the card number" data-val-cc-number="Please enter a valid card number" disabled
                        autocomplete="cc-number">
                    <span class="help-block" data-valmsg-for="cc-number" data-valmsg-replace="true"></span>
                </div>
                <div>
                    <button id="payment-button" type="submit" class="btn btn-lg btn-check btn-block">
                        <i class="fa fa-lock fa-lg"></i>&nbsp;
                        <span id="payment-button-amount">Pya £{{number_format($order->total,2)}}</span>
                        <span id="payment-button-sending" style="display:none;">Sending…</span>
                    </button>
                </div>
            </form>
        </div>
    </div>


@endsection
