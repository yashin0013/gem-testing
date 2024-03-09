@extends('admin/layout')
@section('page_title','Contact us Messages')
@section('contact_msg','active')
@section('container')

@if(session()->has('message'))
<div class="alert alert-success alert-dismissible fade show" role="alert">
    <strong>Success!</strong> {{session('message')}}
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
</div>
<!-- <span class="bg-success text-light p-1">{{session('message')}}</span> -->
@endif

<div class='container mb-3'>
    <h1>Contact Masseges</h1>
</div>
<!-- <a href="{{url('admin/color/add_color')}}" class="btn btn-primary">Add Color</a> -->


<div class="table-responsive mt-3 m-b-40">
    <table class="table table-bordered data-table">
        <thead class="thead-dark">
            <tr>
                <th>Id</th>
                <th>Name</th>
                <th>Email</th>
                <th>Mobile</th>
                <th>Subject</th>
                <th>Message</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            
        </tbody>
    </table>
</div>

<script type="text/javascript">
  $(function () {
    
    var table = $('.data-table').DataTable({
        processing: true,
        serverSide: true,
        ajax: "{{ route('contact.index') }}",
        columns: [
            {data: 'id', name: 'id'},
            {data: 'name', name: 'name'},
            {data: 'email', name: 'email'},
            {data: 'phone', name: 'phone'},
            {data: 'subject', name: 'subject'},
            {data: 'message', name: 'message',orderable: false,},
            {data: 'action', name: 'action', orderable: false, searchable: false},
        ]
    });
    
  });
</script>
@endsection