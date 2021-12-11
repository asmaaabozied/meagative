<!-- Sidebar -->
<div class="sidebar" id="sidebar">
    <div class="sidebar-inner slimscroll">
        <div id="sidebar-menu" class="sidebar-menu">
            <ul>
                <li class="menu-title"><span>Main</span></li>
                <li class="active">
                    <a href="{{route('dashboard.welcome')}}"><i data-feather="home"></i> <span>@lang('site.dashboard')</span></a>
                </li>
                <li>
                    <a href="{{route('dashboard.roles.index')}}"><i data-feather="package"></i> <span>@lang('site.roles')</span></a>
                </li>
                <li>
                    <a href="{{route('dashboard.users.index')}}"><i data-feather="users"></i> <span>@lang('site.users')</span></a>
                </li>
                <li>
                    <a href="{{route('dashboard.countries.index')}}"><i data-feather="file-text"></i> <span>@lang('site.countries')</span></a>
                </li>
                <li>
                    <a href="{{route('dashboard.cities.index')}}"><i data-feather="clipboard"></i> <span>@lang('site.cities')</span></a>
                </li>
                <li>
                    <a href="{{route('dashboard.jobs.index')}}"><i data-feather="credit-card"></i> <span>@lang('site.jobs')</span></a>
                </li>
 <li>
                    <a href="{{route('dashboard.citizens.index')}}"><i data-feather="pie-chart"></i> <span>@lang('site.citizens')</span></a>
                </li>


                <li>
                    <a href="{{route('dashboard.cards.index')}}"><i data-feather="grid"></i>  <span>@lang('site.cards')</span></a>
                </li>

                <li>
                    <a href="{{route('dashboard.users.edit',auth()->user()->id)}}"><i data-feather="user-plus"></i> <span>@lang('site.Profile')</span></a>
                </li>

                <li>
                    <a href="{{route('dashboard.operations.index')}}"><i data-feather="map-pin"></i> <span>@lang('site.operations')</span></a>
                </li>


                <li>
                    <a href="components.html"><i data-feather="layers"></i> <span>Components</span></a>
                </li>
{{--                <li class="submenu">--}}
{{--                    <a href="#"><i data-feather="box"></i> <span>Elements </span> <span class="menu-arrow"></span></a>--}}
{{--                    <ul>--}}
{{--                        <li><a href="sweetalerts.html">Sweet Alerts</a></li>--}}
{{--                        <li><a href="tooltip.html">Tooltip</a></li>--}}
{{--                        <li><a href="popover.html">Popover</a></li>--}}
{{--                        <li><a href="ribbon.html">Ribbon</a></li>--}}
{{--                        <li><a href="clipboard.html">Clipboard</a></li>--}}
{{--                        <li><a href="drag-drop.html">Drag & Drop</a></li>--}}
{{--                        <li><a href="rangeslider.html">Range Slider</a></li>--}}
{{--                        <li><a href="rating.html">Rating</a></li>--}}
{{--                        <li><a href="toastr.html">Toastr</a></li>--}}
{{--                        <li><a href="text-editor.html">Text Editor</a></li>--}}
{{--                        <li><a href="counter.html">Counter</a></li>--}}
{{--                        <li><a href="scrollbar.html">Scrollbar</a></li>--}}
{{--                        <li><a href="spinner.html">Spinner</a></li>--}}
{{--                        <li><a href="notification.html">Notification</a></li>--}}
{{--                        <li><a href="lightbox.html">Lightbox</a></li>--}}
{{--                        <li><a href="stickynote.html">Sticky Note</a></li>--}}
{{--                        <li><a href="timeline.html">Timeline</a></li>--}}
{{--                        <li><a href="horizontal-timeline.html">Horizontal Timeline</a></li>--}}
{{--                        <li><a href="form-wizard.html">Form Wizard</a></li>--}}
{{--                    </ul>--}}
{{--                </li>--}}
{{--                <li class="submenu">--}}
{{--                    <a href="#"><i data-feather="bar-chart-2"></i> <span> Charts </span> <span class="menu-arrow"></span></a>--}}
{{--                    <ul>--}}
{{--                        <li><a href="chart-apex.html">Apex Charts</a></li>--}}
{{--                        <li><a href="chart-js.html">Chart Js</a></li>--}}
{{--                        <li><a href="chart-morris.html">Morris Charts</a></li>--}}
{{--                        <li><a href="chart-flot.html">Flot Charts</a></li>--}}
{{--                        <li><a href="chart-peity.html">Peity Charts</a></li>--}}
{{--                        <li><a href="chart-c3.html">C3 Charts</a></li>--}}
{{--                    </ul>--}}
{{--                </li>--}}
{{--                <li class="submenu">--}}
{{--                    <a href="#"><i data-feather="award"></i> <span> Icons </span> <span class="menu-arrow"></span></a>--}}
{{--                    <ul>--}}
{{--                        <li><a href="icon-fontawesome.html">Fontawesome Icons</a></li>--}}
{{--                        <li><a href="icon-feather.html">Feather Icons</a></li>--}}
{{--                        <li><a href="icon-ionic.html">Ionic Icons</a></li>--}}
{{--                        <li><a href="icon-material.html">Material Icons</a></li>--}}
{{--                        <li><a href="icon-pe7.html">Pe7 Icons</a></li>--}}
{{--                        <li><a href="icon-simpleline.html">Simpleline Icons</a></li>--}}
{{--                        <li><a href="icon-themify.html">Themify Icons</a></li>--}}
{{--                        <li><a href="icon-weather.html">Weather Icons</a></li>--}}
{{--                        <li><a href="icon-typicon.html">Typicon Icons</a></li>--}}
{{--                        <li><a href="icon-flag.html">Flag Icons</a></li>--}}
{{--                    </ul>--}}
{{--                </li>--}}
{{--                <li class="submenu">--}}
{{--                    <a href="#"><i data-feather="columns"></i> <span> Forms </span> <span class="menu-arrow"></span></a>--}}
{{--                    <ul>--}}
{{--                        <li><a href="form-basic-inputs.html">Basic Inputs </a></li>--}}
{{--                        <li><a href="form-input-groups.html">Input Groups </a></li>--}}
{{--                        <li><a href="form-horizontal.html">Horizontal Form </a></li>--}}
{{--                        <li><a href="form-vertical.html"> Vertical Form </a></li>--}}
{{--                        <li><a href="form-mask.html">Form Mask </a></li>--}}
{{--                        <li><a href="form-validation.html">Form Validation </a></li>--}}
{{--                        <li><a href="form-select2.html">Form Select2 </a></li>--}}
{{--                        <li><a href="form-fileupload.html">File Upload </a></li>--}}
{{--                    </ul>--}}
{{--                </li>--}}
{{--                <li class="submenu">--}}
{{--                    <a href="#"><i data-feather="layout"></i> <span> Tables </span> <span class="menu-arrow"></span></a>--}}
{{--                    <ul>--}}
{{--                        <li><a href="tables-basic.html">Basic Tables </a></li>--}}
{{--                        <li><a href="data-tables.html">Data Table </a></li>--}}
{{--                    </ul>--}}
{{--                </li>--}}
            </ul>
        </div>
    </div>
</div>
<!-- /Sidebar -->
