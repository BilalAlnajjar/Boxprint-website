@extends('pages.layouts.dashboard')
@section('content')
    <div class="card">

        <div class="card-body">
            <form method="POST" action="{{route('order.update',$order->id)}}">
                @csrf
                <div class="d-flex justify-content-between">
                    <h3 class="mb-0 card-title">Edit Order</h3>
                    <button type="submit" class="btn btn-info text-white"><i class="fa fa-plus-circle mr-2"></i>Save
                    </button>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="form-label">Order Number</label>
                            <input type="text" class="form-control" disabled
                                   placeholder="Order Number"
                                   value="@if($order->address){{$order->address()->first()->name}}@endif">
                        </div>
                        @if($order->products()->first())
                            <div class="form-group">
                                <label class="form-label">Product</label>
                                @foreach ($order->products()->get() as $product)

                                @endforeach
                                <input type="text" class="form-control" disabled
                                       placeholder="Product" value="{{$product->name}}">
                            </div>
                        @endif

                        @if($order->offers()->first())
                            <div class="form-group">
                                <label class="form-label">Offer</label>
                                @foreach ($order->offers()->get() as $offer)
                                    <input type="text" class="form-control" disabled
                                           placeholder="Product" value="{{$offer->name}}">
                                @endforeach
                            </div>
                        @endif
                        <div class="form-group">
                            <label class="form-label">Quntaty</label>
                            <input type="text" class="form-control" name="quantity"
                                   placeholder="Quntaty" value="{{$order->quantity}}">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="form-label">Price</label>
                            <input type="text" class="form-control"
                                   placeholder="Amount" disabled value="{{$order->price}}">
                        </div>
                        <div class="form-group">
                            <label class="form-label">Date</label>

                            <input class="form-control fc-datepicker fc-datepicker" placeholder="MM/DD/YYYY"
                                   type="text" disabled value="{{$order->created_at}}">

                        </div>
                        <div class="form-group">
                            <label class="form-label mt-0">Status</label>
                            <select class="form-control select2 custom-select" data-placeholder="Choose one"
                                    name="status">
                                <option label="Choose one">
                                </option>
                                <option @if($order->status == "pending") selected @endif value="pending">Pending
                                </option>
                                <option @if($order->status == "processing") selected @endif  value="processing">
                                    Processing
                                </option>
                                <option @if($order->status == "shipping") selected @endif  value="shipping">Shipping
                                </option>
                                <option @if($order->status == "completed") selected @endif value="completed">Completed
                                </option>
                                <option @if($order->status == "declined") selected @endif value="declined">Declined
                                </option>

                            </select>
                        </div>
                    </div>

                </div>
            </form>
        </div>
    </div>


    </div>

    </div>
    <!-- CONTAINER END -->
    </div>

@endsection
