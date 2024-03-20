@extends('admin/layout')
@section('page_title','Jewellery List')
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
    <h1>Jewellery List</h1>
    <a href="{{ url('admin/jewellery/create') }}" class="btn btn-primary">Add New <i class="fas fa-plus"></i></a>
</div>

<div class="table-responsive mt-3 m-b-40">
    <table class="table table-bordered data-table">
        <thead class="thead-dark">
            <tr>
                <th>#</th>
                <th>Report Number</th>
                <th>Name</th>
                <th>Gross Weight</th>
                <th>Gold Weight</th>
                <th>Diamond Weight</th>
                <th>Shape Cut</th>
                <th>Clarity</th>
                <th>Color</th>
                <th>Finish</th>
                <th>Description</th>
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
            ajax: "{{ url('admin/jewellery') }}",
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
                    data: 'gross_wt',
                    name: 'gross_wt'
                },
                {
                    data: 'gold_wt',
                    name: 'gold_wt'
                },
                {
                    data: 'dia_wt',
                    name: 'dia_wt'
                },
                {
                    data: 'shape_cut',
                    name: 'shape_cut'
                },
                {
                    data: 'clarity',
                    name: 'clarity'
                },
                {
                    data: 'color',
                    name: 'color'
                },
                {
                    data: 'finish',
                    name: 'finish'
                },
                {
                    data: 'description',
                    name: 'Description'
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