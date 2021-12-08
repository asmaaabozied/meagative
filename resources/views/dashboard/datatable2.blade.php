@extends('layouts.dashboard.app')


@section('content')
    <div class="page-wrapper" style="min-height: 422px;">
        <div class="content container-fluid">

            <!-- Page Header -->
            <div class="page-header">
                <div class="row align-items-center">
                    <div class="col">
                        <h3 class="page-title">Customers</h3>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="index.html">Dashboard</a>
                            </li>
                            <li class="breadcrumb-item active">Customers</li>
                        </ul>
                    </div>
                    <div class="col-auto">
                        <a href="add-customer.html" class="btn btn-primary me-1">
                            <i class="fas fa-plus"></i>
                        </a>
                        <a class="btn btn-primary filter-btn" href="javascript:void(0);" id="filter_search">
                            <i class="fas fa-filter"></i>
                        </a>
                    </div>
                </div>
            </div>
            <!-- /Page Header -->

            <!-- Search Filter -->
            <div id="filter_inputs" class="card filter-card">
                <div class="card-body pb-0">
                    <div class="row">
                        <div class="col-sm-6 col-md-3">
                            <div class="form-group">
                                <label>Name</label>
                                <input type="text" class="form-control">
                            </div>
                        </div>
                        <div class="col-sm-6 col-md-3">
                            <div class="form-group">
                                <label>Email</label>
                                <input type="text" class="form-control">
                            </div>
                        </div>
                        <div class="col-sm-6 col-md-3">
                            <div class="form-group">
                                <label>Phone</label>
                                <input type="text" class="form-control">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /Search Filter -->

            <div class="row">
                <div class="col-sm-12">

                    <div class="card card-table">
                        <div class="card-body">
                            <div class="table-responsive">
                                <div id="DataTables_Table_0_wrapper" class="dataTables_wrapper dt-bootstrap4 no-footer"><div class="row"><div class="col-sm-12 col-md-6"><div class="dataTables_length" id="DataTables_Table_0_length"><label>Show <select name="DataTables_Table_0_length" aria-controls="DataTables_Table_0" class="custom-select custom-select-sm form-control form-control-sm"><option value="10">10</option><option value="25">25</option><option value="50">50</option><option value="100">100</option></select> entries</label></div></div><div class="col-sm-12 col-md-6"></div></div><div class="row"><div class="col-sm-12">

                                            {!! $dataTable->table([
                                                         'class'=>'table table-striped table-hover table-bordered'

                                                        ], true) !!}

                                        </div></div><div class="row"><div class="col-sm-12 col-md-5"><div class="dataTables_info" id="DataTables_Table_0_info" role="status" aria-live="polite">Showing 1 to 10 of 12 entries</div></div><div class="col-sm-12 col-md-7"><div class="dataTables_paginate paging_simple_numbers" id="DataTables_Table_0_paginate"><ul class="pagination"><li class="paginate_button page-item previous disabled" id="DataTables_Table_0_previous"><a href="#" aria-controls="DataTables_Table_0" data-dt-idx="0" tabindex="0" class="page-link">Previous</a></li><li class="paginate_button page-item active"><a href="#" aria-controls="DataTables_Table_0" data-dt-idx="1" tabindex="0" class="page-link">1</a></li><li class="paginate_button page-item "><a href="#" aria-controls="DataTables_Table_0" data-dt-idx="2" tabindex="0" class="page-link">2</a></li><li class="paginate_button page-item next" id="DataTables_Table_0_next"><a href="#" aria-controls="DataTables_Table_0" data-dt-idx="3" tabindex="0" class="page-link">Next</a></li></ul></div></div></div></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>



{{--    <div id="main">--}}
{{--        <div class="row">--}}
{{--            <div id="breadcrumbs-wrapper" data-image="{{asset('style/app-assets/images/gallery/breadcrumb-bg.jpg')}}"--}}
{{--                 class="breadcrumbs-bg-image"--}}
{{--                 style="background-image: url(&quot;../../../app-assets/images/gallery/breadcrumb-bg.jpg&quot;);">--}}
{{--                <!-- Search for small screen-->--}}
{{--                <div class="container">--}}
{{--                    <div class="row">--}}
{{--                        <div class="col s12 m6 l6">--}}
{{--                            <h5 class="breadcrumbs-title mt-0 mb-0"><span>{{$title}}</span></h5>--}}
{{--                        </div>--}}
{{--                        <div class="col s12 m6 l6 right-align-md">--}}
{{--                            <ol class="breadcrumbs mb-0">--}}
{{--                                <li class="breadcrumb-item"><a--}}
{{--                                        href="{{route('dashboard.welcome') }}">@lang('site.dashboard')</a>--}}
{{--                                </li>--}}

{{--                            </ol>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--            <div class="col s12">--}}
{{--                <div class="container">--}}

{{--                    <div class="section">--}}

{{--                        <!--Badge-->--}}
{{--                        <div class="row">--}}
{{--                            <div class="col s12">--}}
{{--                                <div id="badges" class="card card-tabs">--}}
{{--                                    <div class="card-content pb-1">--}}
{{--                                        <h4 class="card-title mb-0">{{$title}} ( <span--}}
{{--                                                class="count">{{$count ?? ''}}</span>)--}}
{{--                                            <div class="select-action float-right">--}}
{{--                                                <!-- Dropdown Trigger -->--}}
{{--                                                <a class="dropdown-trigger grey-text" href="#" data-target="dropdown1">--}}
{{--                                                    <i class="material-icons">more_vert</i>--}}
{{--                                                </a>--}}
{{--                                                <ul id="dropdown1" class="dropdown-content" tabindex="0" style="">--}}
{{--                                                    <li tabindex="0"><a href="?status=4">@lang('site.all')</a></li>--}}
{{--                                                    <li tabindex="0"><a href="?status=0">@lang('site.block')</a></li>--}}

{{--                                                    <li tabindex="0"><a href="?status=1">@lang('site.active')</a></li>--}}

{{--                                                </ul>--}}
{{--                                                <!-- Dropdown Structure -->--}}

{{--                                            </div>--}}
{{--                                        </h4>--}}
{{--                                    </div>--}}
{{--                                    <div class="ml-1 mr-1 mb-1">--}}
{{--                                        {!! $dataTable->table([--}}
{{--                                                      'class'=>'table table-striped table-hover table-bordered'--}}

{{--                                                     ], true) !!}--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        </div>--}}


{{--                    </div>--}}


{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </div>--}}



@endsection

@push('scripts')
    <script src="{{asset('style/app-assets/vendors/data-tables/js/jquery.dataTables.min.js')}}"></script>

    <script
        src="{{asset('style/app-assets/vendors/data-tables/extensions/responsive/js/dataTables.responsive.min.js')}}"></script>

    <script src="{{asset('style/app-assets/js/custom/custom-script.js')}}"></script>

    <script src="{{asset('app-assets/vendors/data-tables/js/datatables.checkboxes.min.js')}}"></script>

    <!-- END THEME  JS-->
    <!-- BEGIN PAGE LEVEL JS-->
    <script src="{{asset('style/app-assets/js/scripts/page-users.js')}}'"></script>
    <link rel="stylesheet" href="https://cdn.datatables.net/buttons/1.0.3/css/buttons.dataTables.min.css">
    <script src="https://cdn.datatables.net/buttons/1.0.3/js/dataTables.buttons.min.js"></script>
    <script src="/datatables/buttons.server-side.js"></script>




    <script>


        var myTable = null;

        function drawTableCallback(e) {
            //delete
            $('.update').click(function (e) {

                var that = $(this)

                e.preventDefault();

                var n = new Noty({
                    text: "@lang('site.confirm_update')",
                    type: "warning",
                    killer: true,
                    buttons: [
                        Noty.button("@lang('site.yes')", 'btn btn-success mr-2', function () {
                            that.closest('form').submit();
                        }),

                        Noty.button("@lang('site.no')", 'btn btn-primary mr-2', function () {
                            n.close();
                        })
                    ]
                });

                n.show();

            });//end of delete

            //delete
            $('.delete').click(function (e) {

                console.log("Tapped Delete button")
                var that = $(this)

                e.preventDefault();

                var n = new Noty({
                    text: "@lang('site.confirm_delete')",
                    type: "error",
                    killer: true,
                    buttons: [
                        Noty.button("@lang('site.yes')", 'btn btn-success mr-2', function () {
                            that.closest('form').submit();
                        }),

                        Noty.button("@lang('site.no')", 'btn btn-primary mr-2', function () {
                            n.close();
                        })
                    ]
                });

                n.show();

            });//end of delete
        }

        $('#example').dataTable({
            "language": {
                "search": "Filter records:"
            }, buttons: [
                'print', 'copy'
            ]
        });
    </script>
    {!! $dataTable->scripts() !!}
@endpush


