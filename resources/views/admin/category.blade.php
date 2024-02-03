@extends('admin/layout')
@section('page_title','Categories List')
@section('category','active')
@section('container')
<style>
    .title {
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

<div class='title'>
    <h1>Our Type</h1>
    <!-- <a href="{{url('admin/category/add')}}" class="btn btn-primary">Add New Category</a> -->
    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
        Add New Type
    </button>
</div>


<div class="table-responsive mt-3 m-b-40">
    <table class="table table-borderless table-data3" id="example">
        <thead>
            <tr>
                <th>Id</th>
                <th>Name</th>
                <th>Type</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <?php $i = 1 ?>
            @foreach($categories as $list)
            <tr>
                <td>{{$i++}}</td>
                <td>{{$list->name}}</td>
                <td>
                    @if($list->category == 1)
                    Category
                    @elseif($list->technology == 1)
                    Technology
                    @elseif($list->speed == 1)
                    Speed
                    @elseif($list->paper_size == 1)
                    Paper Size
                    @elseif($list->brand == 1)
                    Brand
                    @elseif($list->scanner_type == 1)
                    Scanner Type
                    @endif

                </td>
                <td>
                    <!-- <a href="{{url('admin/service/manage_service/'.$list->id)}}" class="btn btn-outline-primary mr-1"><i class="fas fa-edit"></i></a> -->
                    <a href="{{url('category/delete/'.$list->id)}}" class="btn btn-outline-danger"><i class="fas fa-trash-alt"></i></a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>

</div>
<div class="modal fade" id="exampleModal" tabindex="-1" data-backdrop="false" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Add New Category</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form method="post" action="{{route('type.insert')}}">
                @csrf
                <div class="modal-body">
                    <div class="form-group">
                        <label for="name">Name</label>
                        <input type="text" class="form-control" name="name" id="name" placeholder="Enter Name">
                    </div>
                    <div class="form-group">
                                    <label for="category">Type</label>
                                    <select class="form-control" id="type" name="type" required>
                                    <option value="category">Category</option>
                                    <option value="technology">Technology</option>
                                    <option value="speed">Speed</option>
                                    <option value="paper_size">Paper Size</option>
                                    <option value="brand">Brand</option>
                                    <option value="scanner_type">Scanner Type</option>
                                    </select>
                                </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </form>
        </div>
    </div>
</div>
<script>
     $(document).ready(function(){
 	   $("#example").dataTable({
 	       order: [[2, 'asc']],
 	   });
	 });
   
   </script>
@endsection