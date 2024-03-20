@extends('admin/layout')
@section('page_title','Create New Diamond')

@section('container')
<div class='container mb-3'>
    <!-- <h1>Add New Category</h1> -->
</div>
<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-body">
                <div class="card-title">
                    <h3 class="text-center title-2">Create New Diamond</h3>
                </div>
                <hr>
                <form action="{{route('diamonds.store')}}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
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
                                <label for="description">Description:</label>
                                <input type="text" class="form-control" name="description" id="description" value="{{ old('description') }}">
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
                                <label for="dimension">Dimension:</label>
                                <input type="text" class="form-control" name="dimension" id="dimension" value="{{ old('dimension') }}">
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
                                <label for="clarity_grade">Clarity Grade:</label>
                                <input type="text" class="form-control" name="clarity_grade" id="clarity_grade" value="{{ old('clarity_grade') }}">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="color_grade">Color Grade:</label>
                                <input type="text" class="form-control" name="color_grade" id="color_grade" value="{{ old('color_grade') }}">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="cut_prop">Cut Prop:</label>
                                <input type="text" class="form-control" name="cut_prop" id="cut_prop" value="{{ old('cut_prop') }}">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="finish">Finish:</label>
                                <input type="text" class="form-control" name="finish" id="finish" value="{{ old('finish') }}">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="fluoresc">Fluoresc:</label>
                                <input type="text" class="form-control" name="fluoresc" id="fluoresc" value="{{ old('fluoresc') }}">
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="image">Image:</label>
                                <input type="file" class="form-control-file" name="image" id="image" >
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="comments" class="control-label mb-1">Comments</label>
                                <textarea name="comments" class="form-control">{{ old('comments') }}</textarea>
                            </div>
                        </div>
                    </div>
                    <div>
                        <button id="payment-button" type="submit" class="btn btn-lg btn-info btn-block">
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