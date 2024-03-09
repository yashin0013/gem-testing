@extends('admin/layout')
@section('page_title','Rudraksha List')
@section('jewellery','active')
@section('container')

@if(session()->has('message'))
<div class="alert alert-success alert-dismissible fade show" role="alert">
    <strong>Success!</strong> {{ session("message") }}
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
</div>
@endif

<div class="d-flex align-items-center justify-content-between mb-3">
    <h1>Rudraksha's List</h1>
    <a href="{{ url('admin/rudraksha/create') }}" class="btn btn-primary">Add New <i class="fas fa-plus"></i></a>
</div>

<div class="table-responsive mt-3 m-b-40">
    <table class="table table-bordered data-table">
        <thead class="thead-dark">
            <tr>
                <th>#</th>
                <th>Report Number</th>
                <th>Weight</th>
                <th>Dimension</th>
                <th>Color</th>
                <th>Shape</th>
                <th>Natural Face</th>
                <th>Artificial Face</th>
                <th>Test</th>
                <th>Origin</th>
                <th>Comments</th>
                <th>Image</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>

        </tbody>
    </table>

</div>

<script type="text/javascript">
    $(function() {

        var table = $('.data-table').DataTable({
            processing: true,
            serverSide: true,
            ajax: "{{ url('admin/rudraksha') }}",
            columns: [{
                    data: 'DT_RowIndex',
                    name: 'id',
                    orderable: false,
                    searchable: false
                },
                {
                    "data": "report_number",
                    "name": "report_number"
                },
                {
                    "data": "weight",
                    "name": "weight"
                },
                {
                    "data": "dimension",
                    "name": "dimension"
                },
                {
                    "data": "color",
                    "name": "color"
                },
                {
                    "data": "shape",
                    "name": "shape"
                },
                {
                    "data": "natural_face",
                    "name": "natural_face"
                },
                {
                    "data": "artificial_face",
                    "name": "artificial_face"
                },
                {
                    "data": "test",
                    "name": "test"
                },
                {
                    "data": "origin",
                    "name": "origin"
                },
                {
                    "data": "comments",
                    "name": "comments",
                    orderable: false,
                },

                {
                    data: 'image',
                    name: 'image',
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
</script>

@endsection