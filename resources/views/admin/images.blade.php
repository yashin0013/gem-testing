@extends('admin/layout')
@section('page_title','Upload Multiple Images')
@section('images','active')
@section('container')
<div class='container mb-3'>
    <!-- <h1>Add New Category</h1> -->
</div>
<div class="row">
    <div class="col-lg-8">
        <div class="card">
            <div class="card-body">
                <div class="card-title">
                    <h3 class="text-center title-2">Upload Multiple Images</h3>
                </div>
                <hr>
                <form action="{{route('images.upload')}}" method="post" enctype="multipart/form-data">
                    @csrf
                    @if (count($errors) > 0)
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="images" class="control-label mb-1">Choose Images</label>
                                <input id="images" name="images[]" type="file" accept=".png, .jpg, .jpeg" multiple class="form-control-file">
                            </div>
                            {{-- @error('images.*')
                            <div class="alert alert-danger py-1 px-2 text-danger">{{ $message }}</div>
                            @enderror --}}

                        </div>
                    </div>

                    <div>
                        <button id="payment-button" type="submit" class="btn btn-sm btn-info">
                            <span id="payment-button-amount">Upload Images</span>
                            <span id="payment-button-sending" style="display:none;">Sending…</span>
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection