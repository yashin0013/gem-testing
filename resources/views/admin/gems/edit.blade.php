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
                    <h3 class="text-center title-2">Update Gem Details</h3>
                </div>
                <hr>

                <form action="{{route('gems.update',$gem->id)}}" method="post" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="report_number" class="control-label mb-1">Report Number</label>
                                <input id="report_number" name="report_number" type="text" value="{{ $gem->report_number }}" class="form-control" required>
                            </div>
                            @error('report_number')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="name" class="control-label mb-1">Name</label>
                                <input id="name" name="name" type="text" value="{{ $gem->name }}" class="form-control" required>
                            </div>
                            @error('name')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <input id="id" name="id" type="hidden" value="{{ $gem->id }}" class="form-control">

                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="weight" class="control-label mb-1">Weight</label>
                                <input id="weight" name="weight" type="text" value="{{ $gem->weight }}" class="form-control" required>
                            </div>
                            @error('weight')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="dimension" class="control-label mb-1">Dimension</label>
                                <input id="dimension" name="dimension" type="text" value="{{ $gem->dimension }}" class="form-control" required>
                            </div>
                            @error('dimension')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="color" class="control-label mb-1">Color</label>
                                <input id="color" name="color" type="text" value="{{ $gem->color }}" class="form-control" required>
                            </div>
                            @error('color')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="shape_cut" class="control-label mb-1">Shape Cut</label>
                                <input id="shape_cut" name="shape_cut" type="text" value="{{ $gem->shape_cut }}" class="form-control" required>
                            </div>
                            @error('shape_cut')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="optic_char" class="control-label mb-1">Optic Character</label>
                                <input id="optic_char" name="optic_char" type="text" value="{{ $gem->optic_char }}" class="form-control" required>
                            </div>
                            @error('optic_char')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="refractive_index" class="control-label mb-1">Refractive Index</label>
                                <input id="refractive_index" name="refractive_index" value="{{ $gem->refractive_index }}" type="text" class="form-control" required>
                            </div>
                            @error('refractive_index')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="specific_gravity" class="control-label mb-1">Specific Gravity</label>
                                <input id="specific_gravity" name="specific_gravity" value="{{ $gem->specific_gravity }}" type="text" class="form-control" required>
                            </div>
                            @error('specific_gravity')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="microscope_view" class="control-label mb-1">Microscope View</label>
                                <input id="microscope_view" name="microscope_view" value="{{ $gem->microscope_view }}" type="text" class="form-control" required>
                            </div>
                            @error('microscope_view')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="species" class="control-label mb-1">Species</label>
                                <input id="species" name="species" type="text" value="{{ $gem->species }}" class="form-control" required>
                            </div>
                            @error('species')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="comments" class="control-label mb-1">Comments</label>
                                <textarea name="comments" class="form-control">{{ $gem->comments }}</textarea>
                            </div>
                            @error('comments')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                            </div>

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
                                <img src="{{asset('images/gems/'.$gem->image)}}" alt="">
                            </div>
                        </div>

                    </div>


                    <div>
                        <button id="payment-button" type="submit" class="btn btn-lg btn-info">
                            <span id="payment-button-amount">Submit</span>
                            <span id="payment-button-sending" style="display:none;">Sending…</span>
                        </button>
                        <a class="btn btn-lg btn-danger text-light" href="{{url('admin/gems')}}">
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