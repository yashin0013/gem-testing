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

                    @if(session('validationErrors'))
                <div class="row">
                    <div class="col-md-10 col-md-offset-1">
                      <div class="alert alert-danger alert-dismissible">
                          <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                          <h4><i class="icon fa fa-ban"></i> Error!</h4>
                          @foreach(session('validationErrors') as $error)
                          {{ $error }} <br>
                          @endforeach      
                      </div>
                    </div>
                </div>
                @endif

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="file" class="control-label mb-1">Choose file</label>
                                <input id="file" name="file" type="file" class="form-control-file" required>
                            </div>
                            @error('file')
                            <div class="alert alert-danger py-1 px-2 text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <div>
                        <button id="payment-button" type="submit" class="btn btn-sm btn-info">
                            <span id="payment-button-amount">Upload</span>
                            <span id="payment-button-sending" style="display:none;">Sending…</span>
                        </button>
                        <a href="{{url('assets/sample/sample.csv')}}" class="btn btn-sm btn-success" download>Download Sample CSV File</a>
                    </div>
                    <!-- <input type="hidden" name="id" value=""> -->
                </form>
            </div>
        </div>
    </div>
</div>

@endsection