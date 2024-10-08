<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags-->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('page_title')</title>
    <link href="{{asset('assets/img/icon.jpeg')}}" rel="icon">
    <!-- Fontfaces CSS-->
    <link href="{{ asset('admin_asset/css/font-face.css')}}" rel="stylesheet" media="all">
    <link href="{{ asset('admin_asset/vendor/mdi-font/css/material-design-iconic-font.min.css')}}" rel="stylesheet"
        media="all">
    <link href="{{ asset('admin_asset/vendor/perfect-scrollbar/perfect-scrollbar.css')}}" rel="stylesheet" media="all">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta2/css/all.min.css">

    <!-- Bootstrap CSS-->
    <link href="{{ asset('admin_asset/vendor/bootstrap-4.1/bootstrap.min.css')}}" rel="stylesheet" media="all">

    <!-- Main CSS-->
    <link href="{{ asset('admin_asset/css/theme.css')}}" rel="stylesheet" media="all">
    <link href="{{ asset('admin_asset/css/style.css')}}" rel="stylesheet" media="all">
    <link href="https://cdn.datatables.net/1.10.16/css/jquery.dataTables.min.css" rel="stylesheet">
    <link href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap4.min.css" rel="stylesheet">

    <script src="https://code.jquery.com/jquery-3.6.0.js" ></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.js"></script>
    <script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js"></script>

</head>

<body>
    <div class="page-wrapper">
        <!-- HEADER MOBILE-->
        <header class="header-mobile d-block d-lg-none">
            <div class="header-mobile__bar">
                <div class="container-fluid">
                    <div class="header-mobile-inner">
                        <a class="logo" href="index.html">
                            <img src="{{ asset('admin_asset/images/icon/logo.png')}}" alt="CoolAdmin" />
                        </a>
                        <button class="hamburger hamburger--slider" type="button">
                            <span class="hamburger-box">
                                <span class="hamburger-inner"></span>
                            </span>
                        </button>
                    </div>
                </div>
            </div>
            <nav class="navbar-mobile">
                <div class="container-fluid">
                    <ul class="navbar-mobile__list list-unstyled">
                        <!-- <li>
                            <a href="{{url('admin/dashboard')}}">
                                <i class="fas fa-tachometer-alt"></i>Dashboard</a>
                        </li> -->
                        <li>
                            <a href="{{url('admin/contact_msg')}}">
                                <i class="fas fa-list"></i>Contact Masseges</a>
                        </li>

                    </ul>
                </div>
            </nav>
        </header>
        <!-- END HEADER MOBILE-->

        <!-- MENU SIDEBAR-->
        <aside class="menu-sidebar d-none d-lg-block">
            <div class="logo">
                <a href="{{url('admin/contact_msg')}}">
                    <h3> {{Config::get('constants.SITE_NAME')}}</h3>
                    <!-- <img src="{{ asset('admin_asset/images/icon/logo.png')}}" alt="Cool Admin" /> -->
                </a>
            </div>
            <div class="menu-sidebar__content js-scrollbar1">
                <nav class="navbar-sidebar">
                    <ul class="list-unstyled navbar__list">
                        <li class="@yield('dashboard_selected')" >
                            <a href="{{url('admin/dashboard')}}">
                                <i class="fa-solid fa-gauge-simple-high"></i>Dashboard</a>
                        </li>
                        <li class="@yield('contact_msg')">
                            <a href="{{url('admin/contact_msg')}}">
                                <i class="fas fa-list"></i>Contact Masseges</a>
                        </li>
                        <li class="@yield('reports')">
                            <a href="{{url('admin/reports')}}">
                            <i class="fab fa-usps"></i>Image Reports
                        </a>
                        </li>
                        <li class="@yield('gems')">
                            <a href="{{url('admin/gems')}}">
                            <i class="fab fa-usps"></i>Gem Stones</a>
                        </li>
                        <li class="@yield('diamonds')">
                            <a href="{{url('admin/diamonds')}}">
                            <i class="fab fa-usps"></i>Diamonds</a>
                        </li>
                        <li class="@yield('jewellery')">
                            <a href="{{url('admin/jewellery')}}">
                            <i class="fab fa-usps"></i>Jewellery</a>
                        </li>
                        <li class="@yield('rudraksha')">
                            <a href="{{url('admin/rudraksha')}}">
                            <i class="fab fa-usps"></i>Rudraksha</a>
                        </li>
                        <li class="@yield('images')">
                            <a href="{{url('admin/images')}}">
                                <i class="fa-solid fa-image"></i>Bulk Images</a>
                        </li>
                        <li class="has-sub @yield('import')">
                            <a class="js-arrow" href="#">
                                <i class="fa-solid fa-file-import"></i>Bulk Import <i class="fa-solid fa-chevron-right fa-xs"></i></a>
                            <ul class="navbar-mobile-sub__list list-unstyled js-sub-list">
                                <li>
                                    <a href="{{url('admin/import/gems')}}">Gem Stone</a>
                                </li>
                                <li>
                                    <a href="{{url('admin/import/diamonds')}}">Diamond</a>
                                </li>
                                <li>
                                    <a href="{{url('admin/import/jewellery')}}">Jewellery</a>
                                </li>
                                <li>
                                    <a href="{{url('admin/import/rudraksha')}}">Rudraksha</a>
                                </li>
                            </ul>
                        </li>
                        {{-- <li class="@yield('category')">
                            <a href="{{url('admin/category')}}">
                            <i class="fab fa-usps"></i>Category</a>
                        </li> --}}

                    </ul>
                </nav>
            </div>
        </aside>
        <!-- END MENU SIDEBAR-->

        <!-- PAGE CONTAINER-->
        <div class="page-container">
            <!-- HEADER DESKTOP-->
            <header class="header-desktop">
                <div class="section__content section__content--p30">
                    <div class="container-fluid">
                        <div class="header-wrap">
                            <form class="form-header" action="" method="POST">

                            </form>
                            <div class="header-button">

                                <div class="account-wrap">
                                    <div class="account-item clearfix js-item-menu">

                                        <div class="content">
                                            <a class="js-acc-btn" href="#">Admin</a>
                                        </div>
                                        <div class="account-dropdown js-dropdown">

                                            <div class="account-dropdown__body">
                                                <div class="account-dropdown__item">
                                                    <a href="{{url('/')}}" target="_blank">
                                                        Visit Website</a>
                                                </div>
                                            </div>
                                            <div class="account-dropdown__footer">
                                                <a href="{{url('admin/logout')}}">
                                                    <i class="zmdi zmdi-power"></i>Logout</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </header>
            <!-- END HEADER DESKTOP-->

            <!-- MAIN CONTENT-->
            <div class="main-content">
                <div class="section__content ">
                    <div class="container-fluid">
                        @section('container')
                        @show
                    </div>
                </div>
            </div>
        </div>

    </div>
    <!-- Modal -->

    <div class="notify"></div>

    <!-- END PAGE CONTAINER-->
    <!-- <script src="{{asset('admin_asset/vendor/jquery-3.2.1.min.js')}}"></script> -->
    <script src="{{asset('admin_asset/vendor/bootstrap-4.1/popper.min.js')}}"></script>
    <script src="{{asset('admin_asset/vendor/bootstrap-4.1/bootstrap.min.js')}}"></script>
    <script src="{{asset('admin_asset/vendor/slick/slick.min.js')}}"></script>
    <script src="{{asset('admin_asset/vendor/wow/wow.min.js')}}"></script>
    <script src="{{asset('admin_asset/js/main.js')}}"></script>
    <script src="{{asset('admin_asset/js/script.js')}}"></script>

    @if(session()->has('success'))
    <script>
        notify('{{session("success")}}', 'success');
    </script>
    @endif

    @if(session()->has('error'))
    <script>
        notify('{{session("error")}}', 'error');
    </script>
    @endif

</body>

</html>
<!-- end document-->