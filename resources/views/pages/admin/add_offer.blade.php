@extends('pages.layouts.dashboard')
@section( 'content')
    <form action="{{route('offer.store')}}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Create Offer</h3>
                    </div>
                    <div class="card-body">


                        <div class="form-group">
                            <label>Categories</label>
                            <select multiple="multiple" class="filter-multi" name="categories[]">

                                @foreach ($categories as $category)
                                    <option value="{{$category->id}}">{{$category->name}}</option>
                                @endforeach

                            </select>
                            @error('categories')
                            <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>


                        <div class="form-group">
                            <label>Product</label>
                            <select multiple="multiple" class="filter-multi" name="products[]">

                                @foreach ($products as $product)
                                    <option value="{{$product->id}}">{{$product->name}}</option>
                                @endforeach

                            </select>
                            @error('products')
                            <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label class="form-label">Offer Name/Title</label>
                            <input type="text" class="form-control" name="name" placeholder="Enter Product Name">
                            @error('name')
                            <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label class="form-label">Description</label>
                            <textarea class="content" name="description"></textarea>
                            @error('description')
                            <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label class="form-label">price</label>
                            <input type="text" class="form-control" name="price" placeholder="new price">
                        </div>


                        <div class="col-lg-12">
                            <div class="card shadow">
                                <div class="card-header">
                                    <h3 class="mb-0 card-title">Upload Sub Category image</h3>
                                </div>
                                <div class="card-body">
                                    <input type="file" class="dropify" name="image" id="image" data-max-file-size="1M"/>
                                </div>
                            </div>
                        </div><!-- COL END -->

                        @error('image')
                        <p class="text-danger">{{ $message }}</p>
                        @enderror

                        <div class="form-group">
                            <label>Add Aditions</label>
                            <select multiple="multiple" class="filter-multi" name="additions[]">

                                @foreach ($additions as $addition)
                                    <option value="{{$addition->id}}">{{$addition->name}}</option>
                                @endforeach

                            </select>
                            @error('additions')
                            <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>


                </div>
            </div>


            <div class="card-footer">
                <button type="submit" class="btn btn-success mt-1">SAVE</button>
            </div>
        </div><!--ROW END-->
        <!-- ============== END CONTENT ==============  -->
    </form>
@endsection
