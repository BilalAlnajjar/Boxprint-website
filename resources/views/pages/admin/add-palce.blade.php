@extends('pages.layouts.dashboard')
@section('content')

    <div class="card">
        <form @if($placeItem) action="{{route('place.update',$placeItem->id)}}"
              @endif @if(!$placeItem)action="{{route('place.store')}}" @endif method="POST"
              enctype="multipart/form-data">
            @csrf
            @if($placeItem)
                <input type="hidden" name="_method" value="PUT">
            @endif
            <div class="card-header d-flex justify-content-between">
                <h3 class="mb-0 card-title">Delivery</h3>
                <button type="submit" class="btn btn-info text-white"><i class="fa fa-plus-circle mr-2"></i>Save
                </button>

            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="form-label">Street Name</label>
                            <input type="text" id="name" class="form-control" name="name" placeholder="Customer Name"
                                   @if($placeItem) value="{{$placeItem->name}}" @endif>
                            @error('name')
                            <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>

                    {{-- <div class="col-md-6">
                        <div class="form-group">
                            <label class="form-label">Enter latitude</label>
                            <input type="text" id="lat" class="form-control" name="lat" placeholder="latitude" @if($placeItem) value="{{$placeItem->lat}}" @endif>
                            @error('lat')
                            <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>
                    </div> --}}

                    {{-- <div class="col-md-6">
                        <div class="form-group">
                            <label class="form-label">Enter longitude</label>
                            <input type="text" id="lng" class="form-control" name="lng" placeholder="longitude" @if($placeItem) value="{{$placeItem->lng}}" @endif>
                            @error('lng')
                            <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>
                    </div> --}}

                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="form-label">Delivery Price</label>
                            <input type="text" id="name" class="form-control" name="price" placeholder="Delivery Price"
                                   @if($places->first()) value="{{$places->first()->price}}" @endif>
                            @error('price')
                            <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>

                </div>
            </div>
        </form>

        <div class="card-body">
            <div class="row">

                <div class="table-responsive">
                    <table id="example" class="table table-striped table-bordered text-nowrap w-100">
                        <thead>
                        <tr>
                            <th>ID</th>

                            <th>NAME</th>
                            {{-- <th>latitude</th>
                            <th>longitude</th> --}}

                            {{-- <th>Delivery Price</th> --}}
                            <th>SETTINGS</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach ($places as $place)

                            <tr>
                                <td>{{$place->id}}</td>
                                <td>{{$place->name}}</td>
                                {{-- <td>{{$place->lat}}</td>
                                <td>{{$place->lng}}</td> --}}
                                {{-- <td>£{{$place->price}}</td> --}}

                                {{-- <td>
                                    <div class="material-switch pull-left">
                                        <input id="someSwitchOptionSuccess1" name="someSwitchOption001"
                                            type="checkbox" />
                                        <label for="someSwitchOptionSuccess1" class="label-success"></label>
                                    </div>
                                </td> --}}


                                <td>

                                    <a href="{{route('place.edit',$place->id)}}"
                                       class="btn btn-sm btn-success text-white"
                                    ><i class="fa fa-trash"></i>
                                        Edit</a>


                                    <a class="btn btn-sm btn-danger text-white" data-toggle="modal"
                                       data-target="#smallModal"><i class="fa fa-trash"></i>
                                        Delete</a>
                                </td>

                            </tr>
                            <!-- Remove Order MODAL -->
                            <div id="smallModal" class="modal fade">
                                <div class="modal-dialog modal-sm" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h6 class="tx-14 mg-b-0 tx-uppercase tx-inverse tx-bold">Delete Order
                                                !!</h6>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <p>Are You Sure To Delete Order !!</p>
                                        </div><!-- MODAL-BODY -->
                                        <div class="modal-footer">
                                            <form method="POST" action="{{route('place.destroy',$place->id)}}">
                                                @csrf
                                                <input type="hidden" name="_method" value="DELETE">
                                                <button type="submit" class="btn btn-primary">Yes</button>
                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">
                                                    Cancel
                                                </button>
                                            </form>
                                        </div>
                                    </div>
                                </div><!-- MODAL-DIALOG -->
                            </div>
                            <!-- Remove Order MODAL CLOSED -->
                        @endforeach

                        </tbody>
                    </table>
                </div>

            </div>
        </div>
    </div>

    </div>

    </div>
    <!-- CONTAINER END -->
    </div>

@endsection
