@extends('pages.layouts.dashboard')
@section('content')

    <div class="card">
        <form action="{{route('soical.store')}}" method="Post">
            @csrf
            <div class="card-header d-flex justify-content-between">
                <h3 class="mb-0 card-title">Add Project Soical</h3>
                <button type="submit" class="btn btn-info text-white"><i class="fa fa-plus-circle mr-2"></i>Save
                </button>

            </div>

            <div class="card-body">
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="form-label">Facebook</label>
                            <input type="text" class="form-control" name="facebook" placeholder="Facebook">
                        </div>
                        <div class="form-group">
                            <label class="form-label">Instagram</label>
                            <input type="text" class="form-control" name="instagram" placeholder="Instagram">
                        </div>

                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="form-label">Twitter</label>
                            <input type="text" class="form-control" name="twitter" placeholder="Twitter">
                        </div>
                        <div class="form-group">
                            <label class="form-label">Youtube</label>
                            <input type="text" class="form-control" name="youtube" placeholder="Youtube">
                        </div>

                    </div>

                </div>

        </form>

@endsection
