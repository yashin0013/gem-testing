@extends('admin/layout')
@section('page_title','Services List')
@section('service_selected','active')
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
    <h1>Our Services</h1>
</div>
<a href="{{url('admin/service/add')}}" class="btn btn-primary">Add New Service</a>

<div class="table-responsive mt-3 m-b-40">
    <table class="table table-borderless table-data3">
        <thead>
            <tr>
                <th>Id</th>
                <th>Name</th>
                <th>Short Description</th>
                <th>Image</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
             <?php $i=1 ?>
            @foreach($services as $list)
            <tr>
                <td>{{$i++}}</td>
                <td>{{$list->name}}</td>
                <td>{{$list->short_desc}}</td>
                <td><img src="{{asset('storage/services/'.$list->img)}}" class="img-fluid" alt=""></td>
                <td>
                    <a href="{{url('admin/service/manage_service/'.$list->id)}}" class="btn btn-outline-primary mr-1"><i class="fas fa-edit"></i></a>
                    <a href="{{url('admin/service/delete/'.$list->id)}}" class="btn btn-outline-danger"><i class="fas fa-trash-alt"></i></a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection