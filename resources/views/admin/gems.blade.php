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
    <a href="{{ url('admin/gem/create') }}" class="btn btn-primary">Add New Gem</a>
</div>

<div class="table-responsive mt-3 m-b-40">
    <table class="table table-borderless table-data3">
        <thead>
            <tr>
                <th>Id</th>
                <th>Download</th>
                <th>Report Number</th>
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
            @foreach($gems as $list)
            <tr>
                <td>{{$list->id}}</td>
                <td>
                    <a href="{{url('admin/gem/show/'.$list->id)}}" target="_blank" class="btn btn-sm btn-outline-primary mr-1">
                        <i class="fa-solid fa-download"></i>
                </a>
            </td>
                <td>{{$list->report_number}}</td>
                <td>{{$list->weight}}</td>
                <td>{{$list->dimension}}</td>
                <td>{{$list->color}}</td>
                <td>{{$list->shape_cut}}</td>
                <td>{{$list->optic_char}}</td>
                <td>{{$list->refractive_index}}</td>
                <td>{{$list->specific_gravity}}</td>
                <td>{{$list->microscope_view}}</td>
                <td>{{$list->species}}</td>
                <td>{{$list->comments}}</td>
                <td>
                    <img
                        src="{{asset('storage/gems/'.$list->image)}}"
                        class="img-fluid"
                        alt=""
                    />
                </td>
                <td>
                    <div class="d-flex align-items-center justify-content-between" >
                        <a href="{{url('admin/gem/edit/'.$list->id)}}" class="btn btn-sm btn-outline-primary mr-1">
                            <i class="fas fa-edit"></i>
                        </a>
                        <a href="{{url('admin/gem/delete/'.$list->id)}}" class="btn btn-sm btn-outline-danger">
                            <i class="fas fa-trash-alt"></i>
                        </a>
                    </div>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    {{ $gems->links() }}
</div>
@endsection
