@extends('pages.layouts.dashboard')
@section('content')

    <div class="card">
        <form @if($addition) action="{{route('addition-subcategory.update',$addition->id)}}"
              @endif action="{{route('addition-subcategory.store')}}" method="Post">
            @if($addition)
                <input type="hidden" name="_method" value="PUT">
            @endif
            <div class="card-header d-flex justify-content-between">
                <h3 class="mb-0 card-title">Add Project Soical</h3>
                <button type="submit" class="btn btn-info text-white"><i class="fa fa-plus-circle mr-2"></i>Save
                </button>

            </div>

            <div class="card-body">
                @csrf
                <div class="form-group">
                    <div class="form-group">
                        <label class="form-label">Title Category</label>
                        <input type="text" class="form-control" name="name"
                               placeholder="Enter Title Category" @if($addition) value="{{$addition->name}}" @endif>
                    </div>
                </div>

                <div class="form-group">
                    <label class="form-label mt-0">Addition Category</label>
                    <select class="form-control select2 custom-select" data-placeholder="Choose one"
                            name="addition_category_id" id="addition_category_id">
                        <option label="Choose one">
                        </option>

                        @if(!$addition)
                            @foreach ($additions_category as $addition_category)
                                <option value="{{$addition_category->id}}">{{$addition_category->name}}</option>
                            @endforeach
                        @endif

                        @if($addition)
                            <option value="{{$addition->category_addition()->first()->id}}"
                                    selected>{{$addition->category_addition()->first()->name}}</option>
                            @foreach ($additions_category as $addition_category)
                                @if($addition->category_addition()->first()->name != $addition_category->name)
                                    <option value="{{$addition_category->id}}">{{$addition_category->name}}</option>
                                @endif
                            @endforeach
                        @endif
                    </select>
                    @error('main_category_id')
                    <p class="text-danger">{{ $message }}</p>
                    @enderror
                </div>

                <div class="form-group">
                    <label class="form-label">price</label>
                    <input type="text" class="form-control" name="price" placeholder="new price"
                           @if($addition) value="{{$addition->price}}" @endif>
                </div>

                <div class="col-4">
                    <label class="form-label">
                        <input type="checkbox" name="count"
                               @if($addition) @if($addition->count == 'on') checked @endif @endif>
                        Add count to this addition
                    </label>
                </div>

        </form>


        <div class="card-body">
            <div class="row">

                <div class="table-responsive">
                    <table id="example" class="table table-striped table-bordered text-nowrap w-100">
                        <thead>
                        <tr>
                            <th>ID</th>

                            <th>Name</th>
                            <th>Category Addition</th>
                            <th>Price</th>
                            <th>SETTINGS</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach ($sub_additions as $sub_addition )
                            <tr>
                                <td>{{$sub_addition->id}}</td>
                                <td>{{$sub_addition->name}}</td>
                                <td>
                                    <span class="badge bg-primary text-white">{{$sub_addition->category_addition()->first()->name}}</span>
                                </td>
                                <td>£{{number_format($sub_addition->price,2)}}</td>

                                <td>
                                    <a class="btn btn-sm btn-primary"
                                       href="{{route('addition-subcategory.edit',$sub_addition->id)}}"><i
                                                class="fa fa-edit"></i> Edit</a>
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
                                            <form method="POST"
                                                  action="{{route('addition-subcategory.destroy',$sub_addition->id)}}">
                                                @csrf
                                                <input type="hidden" name="_method" value="DELETE">
                                                <button type="submit" class="btn btn-primary">Yes</button>
                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">
                                                    Cancel
                                                </button>
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

    </div>
    <!-- CONTAINER END -->
    </div>
    </form>

@endsection
