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
                    <h3 class="text-center title-2">Manage Service</h3>
                </div>
                <hr>
                <form action="{{route('service.manage_service')}}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label for="name" class="control-label mb-1">Name</label>
                        <input id="name" name="name" type="text" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="name" class="control-label mb-1">Color</label>
                        <input id="color" name="color" type="text" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="occ" class="control-label mb-1">Short Description</label>
                        <textarea name="short_desc" class="form-control"></textarea>
                        <!-- <input id="occ" name="occ" type="text" class="form-control" required> -->

                    </div>
                    <!-- <div class="form-group">
                        <label for="msg" class="control-label mb-1">Long Description</label>
                        <textarea name="long_desc" id="msg" class="form-control"></textarea>

                    </div> -->
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="img" class="control-label mb-1">Image 1</label>
                                <input id="img" name="image" type="file" class="form-control-file" required>
                            </div>
                        </div>
                         <div class="col-md-4">
                            <div class="form-group">
                                <label for="img" class="control-label mb-1">Image 2</label>
                                <input id="img" name="image2" type="file" class="form-control-file" required>
                            </div>
                        </div>
                       <!-- <div class="col-md-4">
                            <div class="form-group">
                                <label for="img" class="control-label mb-1">Image 3</label>
                                <input id="img" name="image3" type="file" class="form-control-file" required>
                            </div>
                        </div> -->
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