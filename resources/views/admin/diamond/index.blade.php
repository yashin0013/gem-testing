@extends('admin/layout')
@section('page_title','Diamonds List')
@section('diamonds','active')
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
    <h1>Diamonds List</h1>
    <a href="{{ url('admin/diamonds/create') }}" class="btn btn-primary">Add New <i class="fas fa-plus"></i></a>
</div>

<div class="table-responsive mt-3 m-b-40">
    <table class="table table-bordered data-table">
        <thead class="thead-dark">
            <tr>
                <th>#</th>
                <th>Report Number</th>
                <th>Description</th>
                <th>Shape Cut</th>
                <th>Dimension</th>
                <th>Weight</th>
                <th>Clarity Grade</th>
                <th>Color Grade</th>
                <th>Cut Prop</th>
                <th>Finish</th>
                <th>Fluoresc</th>
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
            ajax: "{{ url('admin/diamonds') }}",
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
                    data: 'description',
                    name: 'description'
                },
                {
                    data: 'shape_cut',
                    name: 'shape_cut'
                },
                {
                    data: 'dimension',
                    name: 'dimension'
                },
                {
                    data: 'weight',
                    name: 'weight'
                },
                {
                    data: 'clarity_grade',
                    name: 'clarity_grade'
                },
                {
                    data: 'color_grade',
                    name: 'color_grade'
                },
                {
                    data: 'cut_prop',
                    name: 'cut_prop'
                },
                {
                    data: 'finish',
                    name: 'finish'
                },
                {
                    data: 'fluoresc',
                    name: 'fluoresc'
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