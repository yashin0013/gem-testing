@extends('admin/layout')
@section('page_title','Import Gems')
@section('import','active')
@section('container')
<div class='container mb-3'>
    <!-- <h1>Add New Category</h1> -->
</div>
<div class="row">
    <div class="col-lg-8">
        <div class="card">
            <div class="card-body">
                <div class="card-title">
                    <h3 class="text-center title-2">Bulk Import</h3>
                </div>
                <hr>
                <form action="{{route('gem.import')}}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="file" class="control-label mb-1">Choose file</label>
                                <input id="file" name="file" type="file" class="form-control-file" required>
                            </div>
                            @error('file')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <div>
                        <button id="payment-button" type="submit" class="btn btn-sm btn-info">
                            <span id="payment-button-amount">Submit</span>
                            <span id="payment-button-sending" style="display:none;">Sending…</span>
                        </button>
                    </div>
                    <!-- <input type="hidden" name="id" value=""> -->
                </form>
            </div>
        </div>
    </div>
</div>

@endsection