@extends('admin/layout')
@section('page_title','Create New Rudraksha')

@section('container')
<div class='container mb-3'>
    <!-- <h1>Add New Category</h1> -->
</div>
<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-body">
                <div class="card-title">
                    <h3 class="text-center title-2">Create New Rudraksha</h3>
                </div>
                <hr>

                <div class="container">
                    <form action="{{ route('rudraksha.store') }}" method="POST" enctype="multipart/form-data">
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
                                    <label for="name">Name:</label>
                                    <input type="text" class="form-control" name="name" id="name" value="{{ old('name') }}">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="weight">Weight:</label>
                                    <input type="text" class="form-control" name="weight" id="weight" value="{{ old('weight') }}">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="dimension">Dimension:</label>
                                    <input type="text" class="form-control" name="dimension" id="dimension" value="{{ old('dimension') }}">
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
                                    <label for="shape">Shape:</label>
                                    <input type="text" class="form-control" name="shape" id="shape" value="{{ old('shape') }}">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="natural_face">Natural Face:</label>
                                    <input type="text" class="form-control" name="natural_face" id="natural_face" value="{{ old('natural_face') }}">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="artificial_face">Artificial Face:</label>
                                    <input type="text" class="form-control" name="artificial_face" id="artificial_face" value="{{ old('artificial_face') }}">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="test">Test:</label>
                                    <input type="text" class="form-control" name="test" id="test" value="{{ old('test') }}">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="origin">Origin:</label>
                                    <input type="text" class="form-control" name="origin" id="origin" value="{{ old('origin') }}">
                                </div>
                            </div>



                            <div class="col-md-8">
                                <div class="form-group">
                                    <label for="comments">Comments:</label>
                                    <textarea class="form-control" name="comments" id="comments">{{ old('comments') }}</textarea>
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
                    <a class="btn btn-lg btn-danger text-light" href="{{url('admin/rudraksha')}}">
                        <span>Back</span>
                    </a>
                </div>
                </form>
            </div>
        </div>
    </div>
</div>


@endsection