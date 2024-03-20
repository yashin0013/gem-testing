@extends('admin/layout')
@section('page_title','Gems List')
@section('gems','active')
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
    <h1>Gems List</h1>
    <a href="{{ url('admin/gems/create') }}" class="btn btn-primary">Add New Gem</a>
</div>

<div class="table-responsive mt-3 m-b-40">
    <table class="table table-bordered data-table">
        <thead class="thead-dark">
            <tr>
                <th>#</th>
                <th>Report Number</th>
                <th>Name</th>
                <th>Weight</th>
                <th>dimension</th>
                <th>color</th>
                <th>shape cut</th>
                <th>optic char</th>
                <th>refractive index</th>
                <th>specific gravity</th>
                <th>microscope view</th>
                <th>species</th>
                <th>comments</th>
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
            ajax: "{{ route('gems.index') }}",
            columns: [{
                    data: 'DT_RowIndex',
                    name: 'id',
                    orderable: false,
                    searchable: false
                },
                {
                    data: 'report_number',
                    name: 'report_number'
                },
                {
                    data: 'name',
                    name: 'name'
                },
                {
                    data: 'weight',
                    name: 'weight'
                },
                {
                    data: 'dimension',
                    name: 'dimension'
                },
                {
                    data: 'color',
                    name: 'color'
                },
                {
                    data: 'shape_cut',
                    name: 'shape_cut'
                },
                {
                    data: 'optic_char',
                    name: 'optic_char'
                },
                {
                    data: 'refractive_index',
                    name: 'refractive_index'
                },
                {
                    data: 'specific_gravity',
                    name: 'specific_gravity'
                },
                {
                    data: 'microscope_view',
                    name: 'microscope_view'
                },
                {
                    data: 'species',
                    name: 'species'
                },
                {
                    data: 'comments',
                    name: 'comments',
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