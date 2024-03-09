@extends('admin/layout')
@section('page_title','Create New Jewellery')

@section('container')
<div class='container mb-3'>
    <!-- <h1>Add New Category</h1> -->
</div>
<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-body">
                <div class="card-title">
                    <h3 class="text-center title-2">Create New Jewellery</h3>
                </div>
                <hr>

                <div class="container">
                    <form action="{{ route('jewellery.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            @if ($errors->any())
                            <div class="col-md-12">
                                <div class="alert alert-danger">
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            </div>

                            @endif

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="report_number">Report Number:</label>
                                    <input type="text" class="form-control" name="report_number" id="report_number" value="{{ old('report_number') }}">
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="gross_wt">Gross Weight:</label>
                                    <input type="text" class="form-control" name="gross_wt" id="gross_wt" value="{{ old('gross_wt') }}">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="gold_wt">Gold Weight:</label>
                                    <input type="text" class="form-control" name="gold_wt" id="gold_wt" value="{{ old('gold_wt') }}">
                                </div>
                            </div>


                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="dia_wt">Diamond Weight:</label>
                                    <input type="text" class="form-control" name="dia_wt" id="dia_wt" value="{{ old('dia_wt') }}">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="shape_cut">Shape Cut:</label>
                                    <input type="text" class="form-control" name="shape_cut" id="shape_cut" value="{{ old('shape_cut') }}">
                                </div>
                            </div>


                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="clarity">Clarity:</label>
                                    <input type="text" class="form-control" name="clarity" id="clarity" value="{{ old('clarity') }}">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="color">Color:</label>
                                    <input type="text" class="form-control" name="color" id="color" value="{{ old('color') }}">
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="finish">Finish:</label>
                                    <input type="text" class="form-control" name="finish" id="finish" value="{{ old('finish') }}">
                                </div>
                            </div>
                            <div class="col-md-8">
                                <div class="form-group">
                                    <label for="description">Description:</label>
                                    <textarea class="form-control" name="description" id="description">{{ old('description') }}</textarea>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="image">Image:</label>
                                    <input type="file" class="form-control-file" name="image" id="image" value="{{ old('image') }}">
                                </div>
                            </div>


                        </div>
                        <!-- Add more rows with two input fields in each as needed -->
                </div>
                <div>
                    <button id="payment-button" type="submit" class="btn btn-lg btn-info">
                        <span id="payment-button-amount">Submit</span>
                        <span id="payment-button-sending" style="display:none;">Sending…</span>
                    </button>
                    <a class="btn btn-lg btn-danger text-light" href="{{url('admin/jewellery')}}">
                        <span>Back</span>
                    </a>
                </div>
                </form>
            </div>
        </div>
    </div>
</div>


@endsection