@extends('pages.layouts.dashboard')
@section('content')
    <div class="row">
        <div class="card">
            <div class="card-header border-bottom-0 p-4">
                <h2 class="card-title">1 - 30 of 546 </h2>

            </div>
            <div class="col-md-12 col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">All Offers</h3>
                    </div>
                    <div class="btn-list">
                        <a href="{{route('offer.create')}}">
                            <button class="btn btn-primary"><i class="fe fe-plus mr-2"></i>Add Offer</button>
                        </a>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <div class="filter-custom">
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="form-group">

                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <table id="example" class="table table-striped table-bordered text-nowrap w-100">
                                <thead>
                                <tr>
                                    <th class="wd-15p">ID</th>
                                    <th class="wd-15p">Name Offer</th>
                                    <th class="wd-15p">Description Of Offer</th>
                                    <th class="wd-15p">Category</th>
                                    <th class="wd-10p">Price</th>
                                    <th class="wd-25p">Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($offers as $offer)

                                    <tr>
                                        <td>{{$offer->id}}</td>
                                        <td>{{$offer->name}}</td>
                                        <td>{!!$offer ->description!!}</td>
                                        <td>
                                            @foreach ($offer->categories()->get() as $category)
                                                <span class="badge bg-primary text-white">{{$category->name}}</span>
                                            @endforeach
                                        </td>
                                        <td>£{{number_format($offer->price,2)}}</td>


                                        <td>
                                            <form action="{{route('offer.destroy',$offer->id)}}" method="POST"
                                                  enctype="multipart/form-data">
                                                @csrf
                                                <input type="hidden" name="_method" value="DELETE">
                                                <a class="btn btn-sm btn-primary"
                                                   href="{{route('offer.edit',$offer->id)}}"><i class="fa fa-edit"></i>
                                                    Edit</a>
                                                <button type="submit" class="btn btn-sm btn-danger"><i
                                                            class="fa fa-trash"></i> Delete
                                                </button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach


                                </tbody>
                            </table>
                        </div>
                    </div>
                    <!-- TABLE WRAPPER -->
                </div>
                <!-- SECTION WRAPPER -->
            </div>
        </div>
        <!-- ============== END CONTENT ==============  -->
@endsection
