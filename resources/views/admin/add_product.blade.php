@extends('admin/layout')
@section('page_title','Add New Product')

@section('container')
<div class='container mb-3'>
    <!-- <h1>Add New Category</h1> -->
</div>
<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-body">
                <div class="card-title">
                    <h3 class="text-center title-2">Add New Product</h3>
                </div>
                <hr>
                <form action="{{route('products.manage_products')}}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="name" class="control-label mb-1">Name</label>
                                <input id="name" name="name" type="text" class="form-control" required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <!-- <label for="category" class="control-label mb-1">Category</label> -->
                                <!-- <input id="category" name="category" type="text" class="form-control" required> -->
                                <div class="form-group">
                                    <label for="category">Category</label>
                                    <select class="form-control" id="category" name="category" required>
                                    <option value="ADF">ADF</option>
                                    <option value="ADF+FB">ADF+FB</option>
                                    <option value="Overhead">Overhead</option>
                                    <option value="Network">Network</option>
                                    <option value="Portable">Portable</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <!-- <label for="technology" class="control-label mb-1">Technology</label>
                                <input id="technology" name="technology" type="text" class="form-control" required> -->
                                <div class="form-group">
                                    <label for="technology">Technology</label>
                                    <select class="form-control" id="technology" name="technology" required>
                                    <option value="CIS">CIS</option>
                                    <option value="CCD">CCD</option>
                                    <option value="Camera">Camera</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <!-- <label for="speed" class="control-label mb-1">Speed</label>
                                <input id="speed" name="speed" type="text" class="form-control"> -->
                                <div class="form-group">
                                    <label for="speed">Speed</label>
                                    <select class="form-control" id="speed" name="speed" required>
                                    <option value="20ppm-40ppm">20ppm-40ppm</option>
                                    <option value="40ppm-60ppm">40ppm-60ppm</option>
                                    <option value="60ppm-80ppm">60ppm-80ppm</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <!-- <label for="scanner_type" class="control-label mb-1">Scanner Type</label>
                                <input id="scanner_type" name="scanner_type" type="text" class="form-control"> -->
                                <div class="form-group">
                                    <label for="scanner_type">Scanner Type</label>
                                    <select class="form-control" id="scanner_type" name="scanner_type" required>
                                    <option>none</option>
                                    <option value="ADF">ADF</option>
                                    <option value="ADF+FB">ADF+FB</option>
                                    <option value="FB">FB</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <!-- <label for="paper_size" class="control-label mb-1">Paper Size</label>
                                <input id="paper_size" name="paper_size" type="text" class="form-control"> -->
                                <div class="form-group">
                                    <label for="paper_size">Paper Size</label>
                                    <select class="form-control" id="paper_size" name="paper_size" required>
                                    <option >None</option>
                                    <option value="A4">A4</option>
                                    <option value="A3">A3</option>
                                    <option value="A2">A2</option>
                                    <option value="A1">A1</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <!-- <label for="brand" class="control-label mb-1">Brand</label>
                                <input id="brand" name="brand" type="text" class="form-control" required> -->
                                <div class="form-group">
                                    <label for="brand">Brand</label>
                                    <select class="form-control" id="brand" name="brand" required>
                                    <option value="Avision">Avision</option>
                                    <option value="CZUR">CZUR</option>
                                    <option value="Plustek">Plustek</option>
                                    <option value="Microtek">Microtek</option>
                                    <option value="Fujitsu">Fujitsu</option>
                                    <option value="Kodak">Kodak</option>
                                    <option value="i2S">i2S</option>
                                    <option value="Eloam">Eloam</option>
                                    <option value="Inotec">Inotec</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="img" class="control-label mb-1">Image</label>
                                <input id="img" name="image" type="file" class="form-control-file" required>
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="description" class="control-label mb-1">Description</label>
                        <textarea name="description" class="form-control"></textarea>
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