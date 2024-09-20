@extends('admin/layout')
@section('page_title','Manage Report')

@section('container')
<div class='container mb-3'>
    <!-- <h1>Add New Category</h1> -->
</div>
<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-body">
                <div class="card-title">
                    <h3 class="text-center title-2">Update Report Details</h3>
                </div>
                <hr>

                <form action="{{route('reports.update',$report->id)}}" method="post" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="number" class="control-label mb-1">Report Number</label>
                                <input id="number" name="number" type="text" value="{{ $report->number }}" class="form-control" required>
                            </div>
                            @error('number')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                       
                        <input id="id" name="id" type="hidden" value="{{ $report->id }}" class="form-control">

                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="image" class="control-label mb-1">Image</label>
                                <input id="image" name="image" type="file" class="form-control-file">
                            </div>
                            @error('image')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <img src="{{asset('images/gems/'.$report->image)}}" alt="">
                            </div>
                        </div>

                    </div>


                    <div>
                        <button id="payment-button" type="submit" class="btn btn-lg btn-info">
                            <span id="payment-button-amount">Submit</span>
                            <span id="payment-button-sending" style="display:none;">Sending…</span>
                        </button>
                        <a class="btn btn-lg btn-danger text-light" href="{{url('admin/reports')}}">
                            <span>Back</span>
                        </a>
                    </div>
                    <!-- <input type="hidden" name="id" value=""> -->

                </form>

            </div>
        </div>
    </div>
</div>

@endsection