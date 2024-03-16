@extends('admin/layout')
@section('page_title','Dashboard')
@section('dashboard_selected','active')

@section('container')

{{-- <div class="row">
</div> --}}
<div class="row m-t-25">
    <div class="col-12 mb-3">
        <h1>Dashboard</h1>
    </div>
    <div class="col-sm-6 col-lg-3">
        <div class="overview-item overview-item--c1 h-100">
            <div class="overview__inner">
                <div class="overview-box clearfix d-flex flex-column">
                    <div class="icon">
                        <i class="fa-regular fa-square"></i>
                    </div>
                    <div class="text">
                        <h2>{{ $gems }}</h2>
                        <span>Gemstone</span>
                    </div>
                </div>

            </div>
        </div>
    </div>
    <div class="col-sm-6 col-lg-3">
        <div class="overview-item overview-item--c2 h-100">
            <div class="overview__inner">
                <div class="overview-box clearfix d-flex flex-column">
                    <div class="icon">
                        <i class="fa-regular fa-gem"></i>
                    </div>
                    <div class="text">
                        <h2>{{ $diamonds }}</h2>
                        <span>Diamonds</span>
                    </div>
                </div>

            </div>
        </div>
    </div>
    <div class="col-sm-6 col-lg-3">
        <div class="overview-item overview-item--c3 h-100">
            <div class="overview__inner">
                <div class="overview-box clearfix d-flex flex-column">
                    <div class="icon">
                        <i class="fa-solid fa-ring"></i>
                    </div>
                    <div class="text">
                        <h2>{{ $jewellery }}</h2>
                        <span>Jwellery</span>
                    </div>
                </div>

            </div>
        </div>
    </div>
    <div class="col-sm-6 col-lg-3">
        <div class="overview-item overview-item--c4 h-100">
            <div class="overview__inner">
                <div class="overview-box clearfix d-flex flex-column">
                    <div class="icon">
                        <i class="fa-solid fa-atom"></i>
                    </div>
                    <div class="text">
                        <h2>{{ $rudraksha }}</h2>
                        <span>Rudraksha</span>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>
@endsection