<!DOCTYPE html>
<html class="loading" dir="{{ LaravelLocalization::getCurrentLocaleDirection() }}" lang="{{ app()->getLocale() }}">

{{--<html class="loading" lang="en" data-textdirection="ltr">--}}
<!-- BEGIN: Head-->

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <meta name="description"
          content="Materialize is a Material Design Admin Template,It's modern, responsive and based on Material Design by Google.">
    <meta name="keywords"
          content="materialize, admin template, dashboard template, flat admin template, responsive admin template, eCommerce dashboard, analytic dashboard">
    <meta name="author" content="ThemeSelect">
    <title>@lang('site.title')</title>
    <link rel="apple-touch-icon" href="{{asset('style/app-assets/images/favicon/apple-touch-icon-152x152.png')}}">
    <link rel="shortcut icon" type="image/x-icon" href="{{asset('style/app-assets/images/favicon/favicon-32x32.png')}}">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <!-- BEGIN: VENDOR CSS new-->
{{--    <link rel="stylesheet" href="{{ asset('dashboard_files/css/ionicons.min.css') }}">--}}
    {{--    <link rel="stylesheet" href="{{ asset('dashboard_files/css/select2.min.css') }}">--}}
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.13/css/all.css"
          integrity="sha384-DNOHZ68U8hZfKXOrtjWvjxusGo9WQnrNx2sqG0tfsghAvtVlRW3tvkXWZh58N9jp" crossorigin="anonymous">
    {{--    <script src="{{ asset('dashboard_files/js/select2.min.js') }}"></script>--}}
    {{--    --}}{{--noty--}}
    <link rel="stylesheet" href="{{ asset('dashboard_files/plugins/noty/noty.css') }}">
    <script src="{{ asset('dashboard_files/plugins/noty/noty.min.js') }}"></script>

    {{--morris--}}

    <link rel="stylesheet" type="text/css" href="{{asset('style/app-assets/vendors/vendors.min.css')}}">

    <link rel="stylesheet" type="text/css"
          href="{{asset('style/app-assets/vendors/data-tables/css/jquery.dataTables.min.css')}}">
    <link rel="stylesheet" type="text/css"
          href="{{asset('style/app-assets/vendors/data-tables/extensions/responsive/css/responsive.dataTables.min.css')}}">

    <link rel="stylesheet" type="text/css" href="{{asset('style/app-assets/vendors/data-tables/css/dataTables.checkboxes.css')}}">

    <link rel="stylesheet" type="text/css" href="{{asset('style/app-assets/css/pages/page-users.css')}}">
    <!-- END: Page Level CSS-->
    <!-- BEGIN: Custom CSS-->
    <link rel="stylesheet" type="text/css" href="{{asset('style/app-assets/css/custom/custom.css')}}">


    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
    {{--    <script src="{{ asset('dashboard_files/js/select2.min.js') }}"></script>--}}

    {{--    <script src="{{asset('style/app-assets/data/locales/en.json')}}"></script>--}}

    <link rel="stylesheet" type="text/css" href="{{asset('style/app-assets/vendors/vendors.min.css')}}">

    <script src="https://cdn.datatables.net/1.10.12/js/dataTables.bootstrap.min.js"></script>
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.12/css/dataTables.bootstrap.min.css"/>
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.21/css/jquery.dataTables.min.css">
    <link rel="stylesheet" type="text/css"
          href="https://cdn.datatables.net/v/bs4/jszip-2.5.0/dt-1.10.22/b-1.6.4/b-colvis-1.6.4/b-flash-1.6.4/b-html5-1.6.4/b-print-1.6.4/datatables.min.css"/>

    <!-- END: VENDOR CSS-->
    <script src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>

    @yield('styles')


<!-- BEGIN: Page Level CSS-->
    @if (app()->getLocale() == 'en')
        <link rel="stylesheet" type="text/css"
              href="{{asset('style/app-assets/css/themes/vertical-dark-menu-template/materialize.css')}}">
        <link rel="stylesheet" type="text/css"
              href="{{asset('style/app-assets/css/themes/vertical-dark-menu-template/style.css')}}">
        <link rel="stylesheet" type="text/css" href="{{asset('style/app-assets/css/pages/dashboard.css')}}">
        <!-- END: Page Level CSS-->
        <!-- BEGIN: Custom CSS-->
        <link rel="stylesheet" type="text/css" href="{{asset('style/app-assets/css/custom/custom.css')}}">
        <!-- END: Custom CSS-->
    @else
        <link rel="stylesheet" type="text/css" href="{{asset('style/app-assets/css-rtl/style-rtl.css')}}">
        <!-- BEGIN: Page Level CSS-->
        <link rel="stylesheet" type="text/css"
              href="{{asset('style/app-assets/css-rtl/themes/vertical-dark-menu-template/materialize.css')}}">
        <link rel="stylesheet" type="text/css"
              href="{{asset('style/app-assets/css-rtl/themes/vertical-dark-menu-template/style.css')}}">
        <link rel="stylesheet" type="text/css" href="{{asset('style/app-assets/css-rtl/pages/dashboard.css')}}">
        <!-- END: Page Level CSS-->
        <!-- BEGIN: Custom CSS-->
        <link rel="stylesheet" type="text/css" href="{{asset('style/app-assets/css-rtl/custom/custom.css')}}">
        <!-- END: Custom CSS-->

    @endif

</head>
<!-- END: Head-->

<body
    class="vertical-layout page-header-light vertical-menu-collapsible vertical-dark-menu preload-transitions 2-columns   "
    data-open="click" data-menu="vertical-dark-menu" data-col="2-columns">

<!-- BEGIN: Header-->
<header class="page-topbar" id="header">
    <div class="navbar navbar-fixed">
        <nav class="navbar-main navbar-color nav-collapsible sideNav-lock navbar-light">
            <div class="nav-wrapper">
                <div class="header-search-wrapper hide-on-med-and-down"><i class="material-icons">search</i>
                    <input class="header-search-input z-depth-2" type="text" name="Search"
                           placeholder="Explore Materialize" data-search="template-list">
                    <ul class="search-list collection display-none"></ul>
                </div>
                <ul class="navbar-list right">
                    <li class="dropdown-language"><a class="waves-effect waves-block waves-light translation-button"
                                                     href="#" data-target="translation-dropdown"><span
                                class="flag-icon flag-icon-gb"></span></a></li>
                    <li class="hide-on-med-and-down"><a class="waves-effect waves-block waves-light toggle-fullscreen"
                                                        href="javascript:void(0);"><i class="material-icons">settings_overscan</i></a>
                    </li>
                    <li class="hide-on-large-only search-input-wrapper"><a
                            class="waves-effect waves-block waves-light search-button" href="javascript:void(0);"><i
                                class="material-icons">search</i></a></li>
                    {{--                    <li><a class="waves-effect waves-block waves-light notification-button" href="javascript:void(0);"--}}
                    {{--                           data-target="notifications-dropdown"><i class="material-icons">notifications_none<small--}}
                    {{--                                    class="notification-badge">5</small></i></a></li>--}}
                    <li><a class="waves-effect waves-block waves-light profile-button" href="javascript:void(0);"
                           data-target="profile-dropdown"><span class="avatar-status avatar-online"><img
                                    src="{{asset('uploads/'.auth()->user()->image)}}"><i></i></span></a>
                    </li>

                </ul>
                <!-- translation-button-->
                <ul class="dropdown-content" id="translation-dropdown">
                    @foreach(locales() as $key => $value)
                        <li class="dropdown-item"><a class="grey-text text-darken-1"
                                                     href="{{get_locale_changer_url($key)}}"
                                                     data-language="{{$key}}">{{$value}}</a></li>
                    @endforeach
                </ul>

                <!-- notifications-dropdown-->
                <ul class="dropdown-content" id="notifications-dropdown">
                    <li>
                        <h6>NOTIFICATIONS<span class="new badge">5</span></h6>
                    </li>
                    <li class="divider"></li>
                    <li><a class="black-text" href="#!"><span class="material-icons icon-bg-circle cyan small">add_shopping_cart</span>
                            A new order has been placed!</a>
                        <time class="media-meta grey-text darken-2" datetime="2015-06-12T20:50:48+08:00">2 hours ago
                        </time>
                    </li>
                    <li><a class="black-text" href="#!"><span
                                class="material-icons icon-bg-circle red small">stars</span> Completed the task</a>
                        <time class="media-meta grey-text darken-2" datetime="2015-06-12T20:50:48+08:00">3 days ago
                        </time>
                    </li>
                    <li><a class="black-text" href="#!"><span
                                class="material-icons icon-bg-circle teal small">settings</span> Settings updated</a>
                        <time class="media-meta grey-text darken-2" datetime="2015-06-12T20:50:48+08:00">4 days ago
                        </time>
                    </li>
                    <li><a class="black-text" href="#!"><span class="material-icons icon-bg-circle deep-orange small">today</span>
                            Director meeting started</a>
                        <time class="media-meta grey-text darken-2" datetime="2015-06-12T20:50:48+08:00">6 days ago
                        </time>
                    </li>
                    <li><a class="black-text" href="#!"><span class="material-icons icon-bg-circle amber small">trending_up</span>
                            Generate monthly report</a>
                        <time class="media-meta grey-text darken-2" datetime="2015-06-12T20:50:48+08:00">1 week ago
                        </time>
                    </li>
                </ul>
                <!-- profile-dropdown-->
                <ul class="dropdown-content" id="profile-dropdown">
                    <li><a class="grey-text text-darken-1" href="{{route('dashboard.users.edit', auth()->user()->id)}}"><i
                                class="material-icons">person_outline</i> @lang('site.Profile')
                        </a></li>

                    <li><a class="grey-text text-darken-1" href="{{ route('logout') }}"
                           onclick="event.preventDefault(); document.getElementById('logout-form').submit();"><i
                                class="material-icons">keyboard_tab</i> @lang('site.logout')</a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST"
                              style="display: none;">
                            @csrf
                        </form>

                    </li>

                </ul>
            </div>
            <nav class="display-none search-sm">
                <div class="nav-wrapper">
                    <form id="navbarForm">
                        <div class="input-field search-input-sm">
                            <input class="search-box-sm mb-0" type="search" required="" id="search"
                                   placeholder="@lang('site.title')" data-search="template-list">
                            <label class="label-icon" for="search"><i
                                    class="material-icons search-sm-icon">search</i></label><i
                                class="material-icons search-sm-close">close</i>
                            <ul class="search-list collection search-list-sm display-none"></ul>
                        </div>
                    </form>
                </div>
            </nav>
        </nav>
    </div>
</header>
<!-- END: Header-->
<ul class="display-none" id="default-search-main">
    <li class="auto-suggestion-title"><a class="collection-item" href="#">
            <h6 class="search-title">FILES</h6>
        </a></li>
    <li class="auto-suggestion"><a class="collection-item" href="#">
            <div class="display-flex">
                <div class="display-flex align-item-center flex-grow-1">
                    <div class="avatar"><img src="{{asset('style/app-assets/images/icon/pdf-image.png')}}" width="24"
                                             height="30" alt="sample image"></div>
                    <div class="member-info display-flex flex-column"><span
                            class="black-text">Two new item submitted</span><small class="grey-text">Marketing
                            Manager</small></div>
                </div>
                <div class="status"><small class="grey-text">17kb</small></div>
            </div>
        </a></li>
    <li class="auto-suggestion"><a class="collection-item" href="#">
            <div class="display-flex">
                <div class="display-flex align-item-center flex-grow-1">
                    <div class="avatar"><img src="{{asset('style/app-assets/images/icon/doc-image.png')}}" width="24"
                                             height="30" alt="sample image"></div>
                    <div class="member-info display-flex flex-column"><span
                            class="black-text">52 Doc file Generator</span><small class="grey-text">FontEnd
                            Developer</small></div>
                </div>
                <div class="status"><small class="grey-text">550kb</small></div>
            </div>
        </a></li>
    <li class="auto-suggestion"><a class="collection-item" href="#">
            <div class="display-flex">
                <div class="display-flex align-item-center flex-grow-1">
                    <div class="avatar"><img src="{{asset('style/app-assets/images/icon/xls-image.png')}}" width="24"
                                             height="30" alt="sample image"></div>
                    <div class="member-info display-flex flex-column"><span
                            class="black-text">25 Xls File Uploaded</span><small class="grey-text">Digital Marketing
                            Manager</small></div>
                </div>
                <div class="status"><small class="grey-text">20kb</small></div>
            </div>
        </a></li>
    <li class="auto-suggestion"><a class="collection-item" href="#">
            <div class="display-flex">
                <div class="display-flex align-item-center flex-grow-1">
                    <div class="avatar"><img src="{{asset('style/app-assets/images/icon/jpg-image.png')}}" width="24"
                                             height="30" alt="sample image"></div>
                    <div class="member-info display-flex flex-column"><span class="black-text">Anna Strong</span><small
                            class="grey-text">Web Designer</small></div>
                </div>
                <div class="status"><small class="grey-text">37kb</small></div>
            </div>
        </a></li>
    <li class="auto-suggestion-title"><a class="collection-item" href="#">
            <h6 class="search-title">MEMBERS</h6>
        </a></li>
    <li class="auto-suggestion"><a class="collection-item" href="#">
            <div class="display-flex">
                <div class="display-flex align-item-center flex-grow-1">
                    <div class="avatar"><img class="circle"
                                             src="{{asset('style/app-assets/images/avatar/avatar-7.png')}}" width="30"
                                             alt="sample image"></div>
                    <div class="member-info display-flex flex-column"><span class="black-text">John Doe</span><small
                            class="grey-text">UI designer</small></div>
                </div>
            </div>
        </a></li>
    <li class="auto-suggestion"><a class="collection-item" href="#">
            <div class="display-flex">
                <div class="display-flex align-item-center flex-grow-1">
                    <div class="avatar"><img class="circle"
                                             src="{{asset('style/app-assets/images/avatar/avatar-8.png')}}" width="30"
                                             alt="sample image"></div>
                    <div class="member-info display-flex flex-column"><span class="black-text">Michal Clark</span><small
                            class="grey-text">FontEnd Developer</small></div>
                </div>
            </div>
        </a></li>
    <li class="auto-suggestion"><a class="collection-item" href="#">
            <div class="display-flex">
                <div class="display-flex align-item-center flex-grow-1">
                    <div class="avatar"><img class="circle"
                                             src="{{asset('style/app-assets/images/avatar/avatar-10.png')}}" width="30"
                                             alt="sample image"></div>
                    <div class="member-info display-flex flex-column"><span
                            class="black-text">Milena Gibson</span><small class="grey-text">Digital Marketing</small>
                    </div>
                </div>
            </div>
        </a></li>
    <li class="auto-suggestion"><a class="collection-item" href="#">
            <div class="display-flex">
                <div class="display-flex align-item-center flex-grow-1">
                    <div class="avatar"><img class="circle"
                                             src="{{asset('style/app-assets/images/avatar/avatar-12.png')}}" width="30"
                                             alt="sample image"></div>
                    <div class="member-info display-flex flex-column"><span class="black-text">Anna Strong</span><small
                            class="grey-text">Web Designer</small></div>
                </div>
            </div>
        </a></li>
</ul>
<ul class="display-none" id="page-search-title">
    <li class="auto-suggestion-title"><a class="collection-item" href="#">
            <h6 class="search-title">PAGES</h6>
        </a></li>
</ul>
<ul class="display-none" id="search-not-found">
    <li class="auto-suggestion"><a class="collection-item display-flex align-items-center" href="#"><span
                class="material-icons">error_outline</span><span class="member-info">No results found.</span></a></li>
</ul>


<!-- BEGIN: SideNav-->
@include('layouts.dashboard.aside')
<!-- END: SideNav-->

<!-- BEGIN: Page Main-->
@yield('content')
<!-- END: Page Main-->

@include('partials._session')

<!-- BEGIN: Footer-->

<footer class="page-footer footer footer-static footer-light navbar-border navbar-shadow">
    <div class="footer-copyright">
        <div class="container"><span>&copy; 2020 <a href="http://themeforest.net/user/pixinvent/portfolio?ref=pixinvent"
                                                    target="_blank"></a>  @lang('site.copyrights')</strong></span><span
                class="right hide-on-small-only">Design and Developed by <a
                    href="http://dev.wwwnl1-sr9.supercp.com/en">@lang('site.title')</a></span></div>
    </div>
</footer>

<!-- END: Footer-->
<!-- BEGIN VENDOR JS-->
<script src="{{asset('style/app-assets/js/vendors.min.js')}}"></script>
<!-- BEGIN VENDOR JS-->
<!-- BEGIN PAGE VENDOR JS-->
<script src="{{asset('style/app-assets/vendors/sparkline/jquery.sparkline.min.js')}}"></script>
<script src="{{asset('style/app-assets/vendors/chartjs/chart.min.js')}}"></script>
<!-- END PAGE VENDOR JS-->
<!-- BEGIN THEME  JS-->
{{--<script src="{{asset('app-assets/vendors/data-tables/js/datatables.checkboxes.min.js')}}"></script>--}}

<script src="{{asset('style/app-assets/js/plugins.js')}}"></script>
<script type="text/javascript"
        src="https://cdn.datatables.net/v/bs4/jszip-2.5.0/dt-1.10.22/b-1.6.4/b-colvis-1.6.4/b-flash-1.6.4/b-html5-1.6.4/b-print-1.6.4/datatables.min.js"></script>

<script src="{{asset('style/app-assets/js/search.js')}}"></script>
<script src="{{asset('style/app-assets/js/custom/custom-script.js')}}"></script>
<!-- END THEME  JS-->
<!-- BEGIN PAGE LEVEL JS-->
<script src="{{asset('style/app-assets/js/scripts/dashboard-analytics.js')}}"></script>
<script src="//cdn.ckeditor.com/4.14.0/standard/ckeditor.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.11.2/jquery-ui.min.js"></script>
<script src="{{asset('style/app-assets/js/scripts/page-users.js')}}"></script>

<script>
    Number.prototype.format = function (n) {
        var r = new RegExp('\\d(?=(\\d{3})+' + (n > 0 ? '\\.' : '$') + ')', 'g');
        return this.toFixed(Math.max(0, Math.floor(n))).replace(r, '$&,');
    };

    $('.count').each(function () {
        $(this).prop('counter', 0).animate({
            counter: $(this).text()
        }, {
            duration: 10000,
            easing: 'easeOutExpo',
            step: function (step) {
                $(this).text('' + step.format());
            }
        });
    });




    $('#table').dataTable({
        buttons: [
            'print','excel','csv'
        ],
        dom: 'Bfrtip',

        "language": {
            'search': "@lang('site.search')",


        }
    });

</script>

<!-- END PAGE LEVEL JS-->
@yield('scripts')

@yield('styles')
@stack('scripts')
</body>

</html>
