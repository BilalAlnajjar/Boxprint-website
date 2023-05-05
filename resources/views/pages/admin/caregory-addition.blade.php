@extends('pages.layouts.dashboard')
@section('content')

    <div class="card">
        <form @if(!$addition) action="{{route('addition-category.store')}}"
              @endif @if($addition) action="{{route('addition-category.update',$addition->id)}}" @endif method="Post">
            @if($addition)
                <input type="hidden" name="_method" value="PUT">
            @endif
            <div class="card-header d-flex justify-content-between">
                <h3 class="mb-0 card-title">Category Addition</h3>
                <button type="submit" class="btn btn-info text-white"><i class="fa fa-plus-circle mr-2"></i>Save
                </button>

            </div>

            <div class="card-body">
                @csrf
                <div class="card-body">
                    <div class="form-group">
                        <label class="form-label">Title Category</label>
                        <input type="text" class="form-control" name="name"
                               placeholder="Enter Title Category" @if($addition) value="{{$addition->name}}" @endif>
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

                            <th>Name</th>
                            <th>SETTINGS</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach ($category_additions as $category_addition )
                            <tr>
                                <td>{{$category_addition->id}}</td>
                                <td>{{$category_addition->name}}</td>

                                <td>
                                    <a class="btn btn-sm btn-primary"
                                       href="{{route('addition-category.edit',$category_addition->id)}}"><i
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
                                                  action="{{route('addition-category.destroy',$category_addition->id)}}">
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
