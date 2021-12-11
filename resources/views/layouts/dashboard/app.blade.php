<!DOCTYPE html>


<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0" name="csrf-token"
          content="{{ csrf_token() }}">

    <title>Kanakku - Bootstrap Admin HTML Template</title>



@if(app()->getLocale()=='ar')

        <link rel="shortcut icon" href="{{asset('frontend/asset_rtl/img/favicon.png')}}">

        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="{{asset('frontend/asset_rtl/css/bootstrap.rtl.min.css')}}">

        <!-- Fontawesome CSS -->
        <link rel="stylesheet" href="{{asset('frontend/asset_rtl/plugins/fontawesome/css/fontawesome.min.css')}}">
        <link rel="stylesheet" href="{{asset('frontend/asset_rtl/plugins/fontawesome/css/all.min.css')}}">

        <!-- Main CSS -->
        <link rel="stylesheet" href="{{asset('frontend/asset_rtl/css/style.css')}}">

    <!--[if lt IE 9]>
        <script src="{{asset('frontend/asset_rtl/js/html5shiv.min.js')}}"></script>
        <script src="{{asset('frontend/asset_rtl/js/respond.min.js')}}"></script>



    <!-- Main CSS -->
        @else

    <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="{{asset('frontend/assets/css/bootstrap.min.css')}}">
        <script src="{{asset('frontend/assets/js/html5shiv.min.js')}}"></script>
        <script src="{{asset('frontend/assets/js/respond.min.js')}}"></script>
        <link rel="stylesheet" href="{{asset('frontend/assets/css/style.css')}}">

        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css"/>
        <link href="https://cdn.datatables.net/1.10.21/css/jquery.dataTables.min.css" rel="stylesheet">
        <link href="https://cdn.datatables.net/1.10.21/css/dataTables.bootstrap4.min.css" rel="stylesheet">
        <!-- Favicon -->
        <link rel="shortcut icon" href="{{asset('frontend/assets/img/favicon.png')}}">
        <link rel="stylesheet" href="{{asset('frontend/assets/plugins/select2/css/select2.min.css')}}">

        <!-- Fontawesome CSS -->
        <link rel="stylesheet" href="{{asset('frontend/assets/plugins/fontawesome/css/fontawesome.min.css')}}">
        <link rel="stylesheet" href="{{asset('frontend/assets/plugins/fontawesome/css/all.min.css')}}">


        @endif

<!--[if lt IE 9]>






    <![endif]-->
</head>
<body>

<!-- Main Wrapper -->
<div class="main-wrapper">

    <!-- Header -->
    <div class="header">

        <!-- Logo -->
        <div class="header-left">
            <a href="index.html" class="logo">
                <img src="{{asset('frontend/assets/img/logo.png')}}" alt="Logo">
            </a>
            <a href="index.html" class="logo logo-small">
                <img src="{{asset('frontend/assets/img/logo-small.png')}}" alt="Logo" width="30" height="30">
            </a>
        </div>
        <!-- /Logo -->

        <!-- Sidebar Toggle -->
        <a href="javascript:void(0);" id="toggle_btn">
            <i class="fas fa-bars"></i>
        </a>
        <!-- /Sidebar Toggle -->

        <!-- Search -->
        <div class="top-nav-search">
            <form>
                <input type="text" class="form-control" placeholder="Search here">
                <button class="btn" type="submit"><i class="fas fa-search"></i></button>
            </form>
        </div>
        <!-- /Search -->

        <!-- Mobile Menu Toggle -->
        <a class="mobile_btn" id="mobile_btn">
            <i class="fas fa-bars"></i>
        </a>
        <!-- /Mobile Menu Toggle -->

        <!-- Header Menu -->
        <ul class="nav nav-tabs user-menu">
            <!-- Flag -->
            <li class="nav-item dropdown has-arrow flag-nav">

                <a class="nav-link dropdown-toggle" data-bs-toggle="dropdown" href="#" role="button">
                    <img src="{{asset('frontend/assets/img/flags/us.png')}}" alt="" height="20"> <span>Language</span>
                </a>
                <div class="dropdown-menu dropdown-menu-right">


                    @foreach(LaravelLocalization::getSupportedLocales() as $localeCode => $properties)

                        <a class="dropdown-item" hreflang="{{ $localeCode }}"
                           href="{{ LaravelLocalization::getLocalizedURL($localeCode, null, [], true) }}">

                            <img src="{{asset('frontend/assets/img/flags/fr.png')}}" alt="" height="16">
                            <span>{{ $properties['native'] }}</span>
                        </a>

                    @endforeach

                </div>
            </li>
            <!-- /Flag -->

            <!-- Notifications -->
            <li class="nav-item dropdown">
                <a href="#" class="dropdown-toggle nav-link" data-bs-toggle="dropdown">
                    <i data-feather="bell"></i> <span class="badge rounded-pill">5</span>
                </a>
                <div class="dropdown-menu notifications">
                    <div class="topnav-dropdown-header">
                        <span class="notification-title">Notifications</span>
                        <a href="javascript:void(0)" class="clear-noti"> Clear All</a>
                    </div>
                    <div class="noti-content">
                        <ul class="notification-list">
                            <li class="notification-message">
                                <a href="activities.html">
                                    <div class="media d-flex">
												<span class="avatar avatar-sm">
													<img class="avatar-img rounded-circle" alt=""
                                                         src="{{asset('frontend/assets/img/profiles/avatar-02.jpg')}}">
												</span>
                                        <div class="media-body">
                                            <p class="noti-details"><span class="noti-title">Brian Johnson</span> paid
                                                the invoice <span class="noti-title">#DF65485</span></p>
                                            <p class="noti-time"><span class="notification-time">4 mins ago</span></p>
                                        </div>
                                    </div>
                                </a>
                            </li>
                            <li class="notification-message">
                                <a href="activities.html">
                                    <div class="media d-flex">
												<span class="avatar avatar-sm">
													<img class="avatar-img rounded-circle" alt=""
                                                         src="{{asset('frontend/assets/img/profiles/avatar-03.jpg')}}">
												</span>
                                        <div class="media-body">
                                            <p class="noti-details"><span class="noti-title">Marie Canales</span> has
                                                accepted your estimate <span class="noti-title">#GTR458789</span></p>
                                            <p class="noti-time"><span class="notification-time">6 mins ago</span></p>
                                        </div>
                                    </div>
                                </a>
                            </li>
                            <li class="notification-message">
                                <a href="activities.html">
                                    <div class="media d-flex">
                                        <div class="avatar avatar-sm">
                                            <span class="avatar-title rounded-circle bg-primary-light"><i
                                                    class="far fa-user"></i></span>
                                        </div>
                                        <div class="media-body">
                                            <p class="noti-details"><span class="noti-title">New user registered</span>
                                            </p>
                                            <p class="noti-time"><span class="notification-time">8 mins ago</span></p>
                                        </div>
                                    </div>
                                </a>
                            </li>
                            <li class="notification-message">
                                <a href="activities.html">
                                    <div class="media d-flex">
												<span class="avatar avatar-sm">
													<img class="avatar-img rounded-circle" alt=""
                                                         src="{{asset('frontend/assets/img/profiles/avatar-04.jpg')}}">
												</span>
                                        <div class="media-body">
                                            <p class="noti-details"><span class="noti-title">Barbara Moore</span>
                                                declined the invoice <span class="noti-title">#RDW026896</span></p>
                                            <p class="noti-time"><span class="notification-time">12 mins ago</span></p>
                                        </div>
                                    </div>
                                </a>
                            </li>
                            <li class="notification-message">
                                <a href="activities.html">
                                    <div class="media d-flex">
                                        <div class="avatar avatar-sm">
                                            <span class="avatar-title rounded-circle bg-info-light"><i
                                                    class="far fa-comment"></i></span>
                                        </div>
                                        <div class="media-body">
                                            <p class="noti-details"><span class="noti-title">You have received a new message</span>
                                            </p>
                                            <p class="noti-time"><span class="notification-time">2 days ago</span></p>
                                        </div>
                                    </div>
                                </a>
                            </li>
                        </ul>
                    </div>
                    <div class="topnav-dropdown-footer">
                        <a href="activities.html">View all Notifications</a>
                    </div>
                </div>
            </li>
            <!-- /Notifications -->

            <!-- User Menu -->
            <li class="nav-item dropdown has-arrow main-drop">
                <a href="#" class="dropdown-toggle nav-link" data-bs-toggle="dropdown">
							<span class="user-img">
								<img src="{{asset('uploads/'.auth()->user()->image)}}" alt="">
								<span class="status online"></span>
							</span>
                    <span>{{auth()->user()->username ?? ''}}</span>
                </a>
                <div class="dropdown-menu">
                    <a class="dropdown-item" href="{{route('dashboard.users.edit',auth()->user()->id)}}"><i
                            data-feather="user" class="me-1"></i> @lang('site.Profile')</a>
                    <a class="dropdown-item" href="{{route('dashboard.logout')}}"><i data-feather="log-out"
                                                                                     class="me-1"></i> @lang('site.logout')
                    </a>
                </div>
            </li>
            <!-- /User Menu -->

        </ul>
        <!-- /Header Menu -->

    </div>
    <!-- /Header -->

    @include('layouts.dashboard.aside')

    @yield('content')


</div>
<!-- /Main Wrapper -->
@if(app()->getLocale()=='ar')

    <!-- jQuery -->
    <script src="{{asset('frontend/asset_rtl/js/jquery-3.6.0.min.js')}}"></script>

    <!-- Bootstrap Core JS -->
    <script src="{{asset('frontend/asset_rtl/js/popper.min.js')}}"></script>
    <script src="{{asset('frontend/asset_rtl/js/bootstrap.min.js')}}"></script>

    <!-- Feather Icon JS -->
    <script src="{{asset('frontend/asset_rtl/js/feather.min.js')}}"></script>

    <!-- Slimscroll JS -->
    <script src="{{asset('frontend/asset_rtl/plugins/slimscroll/jquery.slimscroll.min.js')}}"></script>

    <!-- Chart JS -->
    <script src="{{asset('asset_rtl/plugins/apexchart/apexcharts.min.js')}}"></script>
    <script src="{{asset('asset_rtl/plugins/apexchart/chart-data.js')}}"></script>

    <!-- Custom JS -->
    <script src="{{asset('asset_rtl/js/script.js')}}"></script>

@else
<!-- jQuery -->
<script src="{{asset('frontend/assets/js/jquery-3.6.0.min.js')}}"></script>

<!-- Bootstrap Core JS -->
<script src="{{asset('frontend/assets/js/popper.min.js')}}"></script>
<script src="{{asset('frontend/assets/js/bootstrap.min.js')}}"></script>

<!-- Feather Icon JS -->
<script src="{{asset('frontend/assets/js/feather.min.js')}}"></script>

<!-- Slimscroll JS -->
<script src="{{asset('frontend/assets/plugins/slimscroll/jquery.slimscroll.min.js')}}"></script>

<!-- Chart JS -->
<script src="{{asset('frontend/assets/plugins/apexchart/apexcharts.min.js')}}"></script>
<script src="{{asset('frontend/assets/plugins/apexchart/chart-data.js')}}"></script>

<!-- Custom JS -->
<script src="{{asset('frontend/assets/js/script.js')}}"></script>
<script src="{{asset('frontend/assets/plugins/select2/js/select2.min.js')}}"></script>

@endif

@yield('scripts')
</body>
</html>

