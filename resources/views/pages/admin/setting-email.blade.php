@extends('pages.layouts.dashboard')
@section('content')

    <div class="card">
        <form @if($email) action="{{route('setting-email.update')}}"
              @endif @if(!$email) action="{{route('setting-email.store')}}" @endif method="POST">
            @csrf
            <div class="card-header d-flex justify-content-between">
                <h3 class="mb-0 card-title">Seting-Email</h3>
                <button type="submit" class="btn btn-info text-white"><i class="fa fa-plus-circle mr-2"></i>Save
                </button>

            </div>

            <div class="card-body">
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label class="form-label">Maitler</label>
                            <input type="text" class="form-control" name="maitler" placeholder="Maitler"
                                   @if($email) value="{{$email->maitler}}" @endif>
                        </div>
                        <div class="form-group">
                            <label class="form-label">Host</label>
                            <input type="text" class="form-control" name="host" placeholder="Host"
                                   @if($email) value="{{$email->host}} @endif">
                        </div>

                        <div class="form-group">
                            <label class="form-label">Port</label>
                            <input type="text" class="form-control" name="port" placeholder="port"
                                   @if($email) value="{{$email->port}}" @endif>
                        </div>

                        <div class="form-group">
                            <label class="form-label">Encryption</label>
                            <select name="encryption" id="encryption" class="form-control">
                                <option value="tls">tls</option>
                                <option value="ssl">ssl</option>
                            </select>
                        </div>

                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="form-label">Username</label>
                            <input type="text" class="form-control" name="username" placeholder="username"
                                   @if($email) value="{{$email->username}}" @endif>
                        </div>
                        <div class="form-group">
                            <label class="form-label">Password</label>
                            <input type="text" class="form-control" name="password" placeholder="password"
                                   @if($email) value="{{$email->password}}" @endif>
                        </div>

                    </div>

                </div>

        </form>

@endsection
