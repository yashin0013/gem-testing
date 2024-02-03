@extends('admin/layout')
@section('page_title','Bills List')
@section('service_selected','active')
@section('container')
<style>
    .title-box{
        display: flex;
    align-items: center;
    justify-content: space-between;
    }
</style>
@if(session()->has('message'))
<div class="alert alert-success alert-dismissible fade show" role="alert">
    <strong>Success!</strong> {{session('message')}}
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
</div>
<!-- <span class="bg-success text-light p-1">{{session('message')}}</span> -->
@endif

<div class='title-box'>
    <h1>Bills List</h1>
    <a href="{{url('admin/import')}}" class="btn btn-primary">Import Bill</a>
</div>

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
            @foreach($bills as $list)
            <tr>
                <td>{{$i++}}</td>
                <td>{{$list->seller}}</td>
                <td>{{$list->invoice_no}}</td>
                <td></td>
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