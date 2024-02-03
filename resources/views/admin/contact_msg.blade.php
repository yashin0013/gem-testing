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
    <table class="table table-borderless table-data3">
        <thead>
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
             <?php $i=1 ?>
            @foreach($msg as $list)
            <tr>
                <td>{{$i++}}</td>
                <td>{{$list->name}}</td>
                <td>{{$list->email}}</td>
                <td>{{$list->phone}}</td>
                <td>{{$list->subject}}</td>
                <td>{{$list->msg}}</td>
                <td>
                    <!-- <a href="{{url('admin/color/manage_color/'.$list->id)}}" class="btn btn-primary mr-1">Edit</a> -->
                    <a href="{{url('admin/contact/delete/'.$list->id)}}" class="btn btn-danger">Delete</a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection