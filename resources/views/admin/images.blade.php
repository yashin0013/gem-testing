@extends('admin/layout')
@section('page_title','Upload Multiple Images')
@section('images','active')
@section('container')
<div class='container mb-3'>
    <!-- <h1>Add New Category</h1> -->
</div>
<div class="row">
    <div class="col-lg-8">
        <div class="card">
            <div class="card-body">
                <div class="card-title">
                    <h3 class="text-center title-2">Upload Multiple Images</h3>
                </div>
                <hr>
                <form action="{{route('files.store')}}" method="post" enctype="multipart/form-data">
                    @csrf
                    @if (count($errors) > 0)
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                    @endif

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="images" class="control-label mb-1">Choose Images</label>
                                <input id="images" name="images[]" type="file" accept=".png, .jpg, .jpeg" multiple class="form-control-file">
                            </div>
                            {{-- @error('images.*')
                            <div class="alert alert-danger py-1 px-2 text-danger">{{ $message }}
                        </div>
                        @enderror --}}

                    </div>
            </div>

            <div>
                <button id="payment-button" type="submit" class="btn btn-sm btn-info">
                    <span id="payment-button-amount">Upload Images</span>
                    <span id="payment-button-sending" style="display:none;">Sending…</span>
                </button>
            </div>
            </form>
        </div>
    </div>
</div>
</div>

<div class="container bg-light p-4 rounded">
    <div class="mb-3">
        <h1>Images List</h1>
    </div>
    <div class="table-responsive mt-3 m-b-40">
        <table class="table table-bordered data-table">
            <thead class="thead-dark">
                <tr>
                    <th>#</th>
                    <th>Name</th>
                    <th>Image</th>
                    <th>Copy Image</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
            </tbody>
        </table>
    </div>
</div>

<script type="text/javascript">
    $(function() {

        var table = $('.data-table').DataTable({
            processing: true,
            serverSide: true,
            ajax: "{{ route('files.index') }}",
            columns: [{
                    data: 'DT_RowIndex',
                    name: 'id',
                    orderable: false
                },
                {
                    data: 'image',
                    name: 'image',
                    searchable: true

                },

                {
                    data: 'images',
                    name: 'images',
                    orderable: false,
                    searchable: false
                },
                {
                    data: 'copy',
                    name: 'copy',
                    orderable: false,
                    searchable: false
                },
                {
                    data: 'action',
                    name: 'action',
                    orderable: false,
                    searchable: false
                },
            ]
        });

    });

    function copyText(image) {
        const clipboard = navigator.clipboard;
        // Copy the text to the clipboard
        clipboard.writeText(image)
            .then(() => {
                notify("Text copied to clipboard: " + image, 'success');
            })
            .catch((error) => {
                console.error("Unable to copy text:", error);
            });
    }
</script>

@endsection