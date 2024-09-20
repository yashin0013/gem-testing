@extends('admin/layout')
@section('page_title','Manage Service')

@section('container')
<div class='container mb-3'>
    <!-- <h1>Add New Category</h1> -->
</div>
<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-body">
                <div class="card-title">
                    <h3 class="text-center title-2">Add New Report</h3>
                </div>
                <hr>
                <form action="{{route('reports.store')}}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="number" class="control-label mb-1">Report Number</label>
                                <input id="number" name="number" type="text" class="form-control" required>
                            </div>
                            @error('number')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="image" class="control-label mb-1">Image</label>
                                <input id="image" name="image" type="file" class="form-control-file" required>
                            </div>
                            @error('image')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div>
                        <button id="payment-button" type="submit" class="btn btn-lg btn-info">
                            <span id="payment-button-amount">Submit</span>
                            <span id="payment-button-sending" style="display:none;">Sending…</span>
                        </button>
                        <a class="btn btn-lg btn-danger text-light" href="{{route('reports.index')}}">
                        Back
                    </a>
                    </div>
                    <!-- <input type="hidden" name="id" value=""> -->
                </form>
            </div>
        </div>
    </div>
</div>

@endsection