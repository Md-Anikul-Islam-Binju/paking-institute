{{--@extends('admin.app')--}}
{{--@section('admin_content')--}}
{{--    <div class="row">--}}
{{--        <div class="col-12">--}}
{{--            <div class="page-title-box">--}}
{{--                <div class="page-title-right">--}}
{{--                    <ol class="breadcrumb m-0">--}}
{{--                        <li class="breadcrumb-item"><a href="javascript: void(0);">Admin Dashboard</a></li>--}}
{{--                        <li class="breadcrumb-item"><a href="javascript: void(0);">Dashboards</a></li>--}}
{{--                        <li class="breadcrumb-item active">Welcome!</li>--}}
{{--                    </ol>--}}
{{--                </div>--}}
{{--                <h4 class="page-title">Welcome!</h4>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </div>--}}

{{--    <div class="row">--}}
{{--        <div class="col-xxl-3 col-sm-6">--}}
{{--            <div class="card widget-flat text-bg-pink">--}}
{{--                <div class="card-body">--}}
{{--                    <div class="float-end">--}}
{{--                        <i class="ri-app-store-line widget-icon"></i>--}}
{{--                    </div>--}}
{{--                    <h6 class="text-uppercase mt-0" title="Customers">Total Expertise</h6>--}}
{{--                    <h2 class="my-2">{{$totalExpertise}}</h2>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--        <div class="col-xxl-3 col-sm-6">--}}
{{--            <div class="card widget-flat text-bg-purple">--}}
{{--                <div class="card-body">--}}
{{--                    <div class="float-end">--}}
{{--                        <i class="ri-profile-line widget-icon"></i>--}}
{{--                    </div>--}}
{{--                    <h6 class="text-uppercase mt-0" title="Customers">Total</h6>--}}
{{--                    <h2 class="my-2">200</h2>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--        <div class="col-xxl-3 col-sm-6">--}}
{{--            <div class="card widget-flat text-bg-info">--}}
{{--                <div class="card-body">--}}
{{--                    <div class="float-end">--}}
{{--                        <i class="ri-route-line widget-icon"></i>--}}
{{--                    </div>--}}
{{--                    <h6 class="text-uppercase mt-0" title="Customers">Total</h6>--}}
{{--                    <h2 class="my-2">300</h2>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--        <div class="col-xxl-3 col-sm-6">--}}
{{--            <div class="card widget-flat text-bg-primary">--}}
{{--                <div class="card-body">--}}
{{--                    <div class="float-end">--}}
{{--                        <i class="ri-file-line widget-icon"></i>--}}
{{--                    </div>--}}
{{--                    <h6 class="text-uppercase mt-0" title="Customers">Total </h6>--}}
{{--                    <h2 class="my-2">400</h2>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </div>--}}
{{--@endsection--}}
@extends('admin.app')

@section('admin_content')


    <div class="row">

        <div class="col-12">

            <div class="page-title-box">

                <div class="page-title-right">

                    <ol class="breadcrumb m-0">

                        <li class="breadcrumb-item">
                            Dashboard
                        </li>

                        <li class="breadcrumb-item active">
                            Welcome
                        </li>

                    </ol>

                </div>


                <h4 class="page-title">
                    Dashboard
                </h4>

            </div>

        </div>

    </div>



    {{-- Welcome Section --}}

    <div class="row">

        <div class="col-12">

            <div class="card overflow-hidden">

                <div class="card-body p-5">


                    <div class="row align-items-center">


                        <div class="col-md-8">


                            <h1 class="fw-bold mb-3 animate__animated animate__fadeInDown">

                                Welcome to Peking Institute Admin Panel 👋

                            </h1>


                            <p class="text-muted fs-5 animate__animated animate__fadeInUp">

                                Manage your website content, settings, pages and
                                all administrative activities from this dashboard.

                            </p>



                            <a href="https://www.pekinginstitute.org/"
                               target="_blank"
                               class="btn btn-primary btn-lg mt-3">

                                <i class="ri-external-link-line"></i>

                                Visit Website

                            </a>


                        </div>



                        <div class="col-md-4 text-center">


                            <div class="welcome-animation">

                                <i class="ri-building-4-line"
                                   style="font-size:120px;color:#3b82f6;">
                                </i>


                            </div>


                        </div>


                    </div>


                </div>


            </div>


        </div>


    </div>





    {{-- Quick Links --}}

    <div class="row mt-3">

        <div class="col-12">
            <h4 class="mb-3">
                Quick Links
            </h4>
        </div>


        @can('setting-list')

            <div class="col-md-3">

                <a href="{{ route('setting.section') }}"
                   class="text-decoration-none">

                    <div class="card widget-flat border-0 shadow-sm">

                        <div class="card-body">

                            <div class="d-flex align-items-center">

                                <div class="avatar-lg rounded-circle bg-primary-subtle d-flex align-items-center justify-content-center">

                                    <i class="ri-settings-3-line text-primary fs-2"></i>

                                </div>


                                <div class="ms-3">

                                    <h5 class="mb-1 text-dark">
                                        General Setting
                                    </h5>

                                    <small class="text-muted">
                                        Manage website information
                                    </small>

                                </div>

                            </div>

                        </div>

                    </div>

                </a>

            </div>

        @endcan





        @can('site-setting-list')

            <div class="col-md-3">

                <a href="{{ route('site.setting.section') }}"
                   class="text-decoration-none">

                    <div class="card widget-flat border-0 shadow-sm">

                        <div class="card-body">

                            <div class="d-flex align-items-center">

                                <div class="avatar-lg rounded-circle bg-success-subtle d-flex align-items-center justify-content-center">

                                    <i class="ri-pages-line text-success fs-2"></i>

                                </div>


                                <div class="ms-3">

                                    <h5 class="mb-1 text-dark">
                                        Site Pages
                                    </h5>

                                    <small class="text-muted">
                                        Manage privacy and policy pages
                                    </small>

                                </div>


                            </div>

                        </div>

                    </div>

                </a>

            </div>

        @endcan





        @can('user-list')

            <div class="col-md-3">

                <a href="{{ url('users') }}"
                   class="text-decoration-none">


                    <div class="card widget-flat border-0 shadow-sm">


                        <div class="card-body">


                            <div class="d-flex align-items-center">


                                <div class="avatar-lg rounded-circle bg-info-subtle d-flex align-items-center justify-content-center">

                                    <i class="ri-user-settings-line text-info fs-2"></i>

                                </div>



                                <div class="ms-3">

                                    <h5 class="mb-1 text-dark">
                                        Users
                                    </h5>

                                    <small class="text-muted">
                                        Manage admin users
                                    </small>

                                </div>


                            </div>


                        </div>


                    </div>


                </a>


            </div>


        @endcan






        @can('role-list')

            <div class="col-md-3">


                <a href="{{ url('roles') }}"
                   class="text-decoration-none">


                    <div class="card widget-flat border-0 shadow-sm">


                        <div class="card-body">


                            <div class="d-flex align-items-center">


                                <div class="avatar-lg rounded-circle bg-warning-subtle d-flex align-items-center justify-content-center">

                                    <i class="ri-shield-user-line text-warning fs-2"></i>

                                </div>



                                <div class="ms-3">

                                    <h5 class="mb-1 text-dark">
                                        Roles
                                    </h5>


                                    <small class="text-muted">
                                        Manage permissions
                                    </small>


                                </div>


                            </div>


                        </div>


                    </div>


                </a>


            </div>


        @endcan


    </div>



@endsection
