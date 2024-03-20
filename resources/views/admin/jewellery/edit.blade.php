@extends('admin/layout')
@section('page_title','Update Diammonds')

@section('container')
<div class='container mb-3'>
    <!-- <h1>Add New Category</h1> -->
</div>
<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-body">
                <div class="card-title">
                    <h3 class="text-center title-2">Update Diamond Details</h3>
                </div>
                <hr>

                <form action="{{ route('jewellery.update', $jewellery->id) }}" method="post" enctype="multipart/form-data">
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
                                <input type="text" class="form-control" name="report_number" id="report_number" value="{{ $jewellery->report_number }}">
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="name">Name:</label>
                                <input type="text" class="form-control" name="name" id="name" value="{{ $jewellery->name }}">
                            </div>
                        </div>

                        <div class="col-md-6">
                                <div class="form-group">
                                    <label for="gross_wt">Gross Weight:</label>
                                    <input type="text" class="form-control" name="gross_wt" id="gross_wt" value="{{ $jewellery->gross_wt }}">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="gold_wt">Gold Weight:</label>
                                    <input type="text" class="form-control" name="gold_wt" id="gold_wt" value="{{ $jewellery->gold_wt }}">
                                </div>
                            </div>


                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="dia_wt">Diamond Weight:</label>
                                    <input type="text" class="form-control" name="dia_wt" id="dia_wt" value="{{ $jewellery->dia_wt }}">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="shape_cut">Shape Cut:</label>
                                    <input type="text" class="form-control" name="shape_cut" id="shape_cut" value="{{ $jewellery->shape_cut }}">
                                </div>
                            </div>


                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="clarity">Clarity:</label>
                                    <input type="text" class="form-control" name="clarity" id="clarity" value="{{ $jewellery->clarity }}">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="color">Color:</label>
                                    <input type="text" class="form-control" name="color" id="color" value="{{ $jewellery->color }}">
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="finish">Finish:</label>
                                    <input type="text" class="form-control" name="finish" id="finish" value="{{ $jewellery->finish }}">
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="description">Description:</label>
                                    <textarea class="form-control" name="description" id="description">{{ $jewellery->description }}</textarea>
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
                                <img src="{{asset('images/gems/'.$jewellery->image)}}" alt="">
                            </div>
                        </div>
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
                    <!-- <input type="hidden" name="id" value=""> -->

                </form>

            </div>
        </div>
    </div>
</div>

@endsection