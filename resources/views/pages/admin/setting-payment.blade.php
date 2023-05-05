@extends('pages.layouts.dashboard')
@section('content')

    <div class="card">
        <form @if($payament) action="{{route('setting-payament.update')}}"
              @endif @if(!$payament) action="{{route('setting-payament.store')}}" @endif method="POST">
            @csrf
            <div class="card-header d-flex justify-content-between">
                <h3 class="mb-0 card-title">Payament Method</h3>
                <button type="submit" class="btn btn-info text-white"><i class="fa fa-plus-circle mr-2"></i>Save
                </button>
            </div>

            <div class="card-body">
                <div class="row">
                    <div class="card-header d-flex justify-content-between">
                        <h3 class="mb-0 card-title">Paypal</h3>
                    </div>
                    <div class="col-md-12">

                        <div class="form-group">
                            <label class="form-label">Mode</label>
                            <select name="mode" id="mode" class="form-control">
                                <option value="sandbox" @if($payament->mode == 'sandbox') selected @endif>sandbox
                                </option>
                                <option value="live" @if($payament->mode == 'live') selected @endif>live</option>
                            </select>
                        </div>

                        <div class="card-header d-flex justify-content-between">
                            <h3 class="mb-0 card-title">Sandbox</h3>
                        </div>

                        <div class="form-group">
                            <label class="form-label">Paypal Sandbox Client Id</label>
                            <input type="text" class="form-control" name="paypal_sandbox_client_id" placeholder=""
                                   @if($payament) value="{{$payament->paypal_sandbox_client_id}}" @endif>
                        </div>
                        <div class="form-group">
                            <label class="form-label">Paypal Sandbox Secret</label>
                            <input type="text" class="form-control" name="paypal_sandbox_secret" placeholder="Host"
                                   @if($payament) value="{{$payament->paypal_sandbox_secret}} @endif">
                        </div>

                        <div class="card-header d-flex justify-content-between">
                            <h3 class="mb-0 card-title">Live</h3>


                        </div>
                        <div class="form-group">
                            <label class="form-label">Paypal Live Client Id</label>
                            <input type="text" class="form-control" name="paypal_live_client_id" placeholder="port"
                                   @if($payament) value="{{$payament->paypal_live_client_id}}" @endif>
                        </div>

                        <div class="form-group">
                            <label class="form-label">Paypal Live Client Id</label>
                            <input type="text" class="form-control" name="paypal_live_client_id" placeholder="port"
                                   @if($payament) value="{{$payament->paypal_live_client_id}}" @endif>
                        </div>


                    </div>
                    <div class="col-md-6">
                        <div class="card-header d-flex justify-content-between">
                            <h3 class="mb-0 card-title">Scripe</h3>
                        </div>
                        <div class="form-group">
                            <label class="form-label">Stripe Key</label>
                            <input type="text" class="form-control" name="stripe_key" placeholder="stripe key"
                                   @if($payament) value="{{$payament->stripe_key}}" @endif>
                        </div>
                        <div class="form-group">
                            <label class="form-label">Stripe Secrit</label>
                            <input type="text" class="form-control" name="stripe_secrit" placeholder="stripe secrit"
                                   @if($payament) value="{{$payament->stripe_secrit}}" @endif>
                        </div>

                    </div>

                </div>

        </form>

@endsection
