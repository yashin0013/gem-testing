@extends('admin/layout')
@section('page_title','Update Rudraksha')

@section('container')
<div class='container mb-3'>
    <!-- <h1>Add New Category</h1> -->
</div>
<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-body">
                <div class="card-title">
                    <h3 class="text-center title-2">Update Rudraksha Details</h3>
                </div>
                <hr>

                <form action="{{ route('rudraksha.update', $rudraksha->id) }}" method="post" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
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
                                <input type="text" class="form-control" name="report_number" id="report_number" value="{{ $rudraksha->report_number }}">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="name">Name:</label>
                                <input type="text" class="form-control" name="name" id="name" value="{{ $rudraksha->name }}">
                            </div>
                        </div>
                        <div class="col-md-6">
                                <div class="form-group">
                                    <label for="weight">Weight:</label>
                                    <input type="text" class="form-control" name="weight" id="weight" value="{{ $rudraksha->weight }}">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="dimension">Dimension:</label>
                                    <input type="text" class="form-control" name="dimension" id="dimension" value="{{ $rudraksha->dimension }}">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="color">Color:</label>
                                    <input type="text" class="form-control" name="color" id="color" value="{{ $rudraksha->color }}">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="shape">Shape:</label>
                                    <input type="text" class="form-control" name="shape" id="shape" value="{{ $rudraksha->shape }}">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="natural_face">Natural Face:</label>
                                    <input type="text" class="form-control" name="natural_face" id="natural_face" value="{{ $rudraksha->natural_face }}">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="artificial_face">Artificial Face:</label>
                                    <input type="text" class="form-control" name="artificial_face" id="artificial_face" value="{{ $rudraksha->artificial_face }}">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="test">Test:</label>
                                    <input type="text" class="form-control" name="test" id="test" value="{{ $rudraksha->test }}">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="origin">Origin:</label>
                                    <input type="text" class="form-control" name="origin" id="origin" value="{{ $rudraksha->origin }}">
                                </div>
                            </div>

                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="comments">Comments:</label>
                                    <textarea class="form-control" name="comments" id="comments">{{ $rudraksha->comments }}</textarea>
                                </div>
                            </div>

                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="image" class="control-label mb-1">Image</label>
                                <input id="image" name="image" type="file" class="form-control-file">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <img src="{{asset('images/gems/'.$rudraksha->image)}}" alt="">
                            </div>
                        </div>
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
                    <!-- <input type="hidden" name="id" value=""> -->

                </form>

            </div>
        </div>
    </div>
</div>

@endsection