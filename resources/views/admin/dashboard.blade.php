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
                        <i class="zmdi zmdi-account-o"></i>
                    </div>
                    <div class="text">
                        <h2>10368</h2>
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
                        <i class="zmdi zmdi-shopping-cart"></i>
                    </div>
                    <div class="text">
                        <h2>388,688</h2>
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
                        <i class="zmdi zmdi-calendar-note"></i>
                    </div>
                    <div class="text">
                        <h2>1,086</h2>
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
                        <i class="zmdi zmdi-money"></i>
                    </div>
                    <div class="text">
                        <h2>$1,060,386</h2>
                        <span>Rudraksha</span>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>
@endsection