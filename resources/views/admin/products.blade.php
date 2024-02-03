@extends('admin/layout')
@section('page_title','Products List')
@section('products','active')
@section('container')
<style>
    .title-box{
        display: flex;
        justify-content: space-between;
        align-items: center;
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

<div class='title-box mb-3'>
    <h1>Our Products</h1>
    <a href="{{url('admin/products/add')}}" class="btn btn-primary">Add New Product</a>
</div>

<div class="table-responsive mt-3 m-b-40" >
    <table class="table table-borderless table-data3" id="example">
        <thead>
            <tr>
                <th>Id</th>
                <th>Name</th>
                <th>Category</th>
                <th>Brand</th>
                <th>Technology</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
             <?php $i=1 ?>
            @foreach($products as $list)
            <tr>
                <td>{{$i++}}</td>
                <td>{{$list->name}}</td>
                <td>{{$list->category}}</td>
                <td>{{$list->brand}}</td>
                <td>{{$list->technology}}</td>
                <!-- <td><img src="{{asset('storage/products/'.$list->img)}}" class="img-fluid" alt=""></td> -->
                <td>
                    <a href="{{url('admin/products/manage_service/'.$list->id)}}" class="btn btn-outline-primary mr-1"><i class="fas fa-edit"></i></a>
                    <a href="{{url('admin/products/delete/'.$list->id)}}" class="btn btn-outline-danger"><i class="fas fa-trash-alt"></i></a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
<script>
     $(document).ready(function(){
 	   $("#example").dataTable({
 	       order: [[0, 'desc']],
 	   });
	 });
   
   </script>
@endsection