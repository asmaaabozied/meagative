@extends('layouts.dashboard.app')

@section('content')

    <link rel="stylesheet" href="http://cdn.datatables.net/1.10.18/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"/>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src = "http://cdn.datatables.net/1.10.18/js/jquery.dataTables.min.js"></script>

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
                                <div id="DataTables_Table_0_wrapper" class="dataTables_wrapper dt-bootstrap4 no-footer">
                                    <div class="row">
                                        <div class="col-sm-12 col-md-6">
                                            <div class="dataTables_length" id="DataTables_Table_0_length"><label>Show
                                                    <select name="DataTables_Table_0_length"
                                                            aria-controls="DataTables_Table_0"
                                                            class="custom-select custom-select-sm form-control form-control-sm">
                                                        <option value="10">10</option>
                                                        <option value="25">25</option>
                                                        <option value="50">50</option>
                                                        <option value="100">100</option>
                                                    </select> entries</label></div>
                                        </div>
                                        <div class="col-sm-12 col-md-6"></div>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-12">
                                            <table   class="table table-center table-hover datatable dataTable no-footer"
                                                   id="DataTables_Table_0" role="grid"
                                                   aria-describedby="DataTables_Table_0_info">
                                                <thead class="thead-light">
                                                <tr role="row">
                                                    <th class="sorting_asc" tabindex="0"
                                                        aria-controls="DataTables_Table_0" rowspan="1" colspan="1"
                                                        aria-sort="ascending"
                                                        aria-label="Customer: activate to sort column descending"
                                                        style="width: 194.788px;">name
                                                    </th>
                                                    <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0"
                                                        rowspan="1" colspan="1"
                                                        aria-label="Email: activate to sort column ascending"
                                                        style="width: 245.15px;">Email
                                                    </th>


                                                    <th class="text-right sorting" tabindex="0"
                                                        aria-controls="DataTables_Table_0" rowspan="1" colspan="1"
                                                        aria-label="Actions: activate to sort column ascending"
                                                        style="width: 199.113px;">Actions
                                                    </th>
                                                </tr>
                                                </thead>
                                                <tbody>




                                                </tbody>


                                            </table>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-12 col-md-5">
                                            <div class="dataTables_info" id="DataTables_Table_0_info" role="status"
                                                 aria-live="polite">Showing 1 to 10 of 12 entries
                                            </div>
                                        </div>
                                        <div class="col-sm-12 col-md-7">
                                            <div class="dataTables_paginate paging_simple_numbers"
                                                 id="DataTables_Table_0_paginate">
                                                <ul class="pagination">
                                                    <li class="paginate_button page-item previous disabled"
                                                        id="DataTables_Table_0_previous"><a href="#"
                                                                                            aria-controls="DataTables_Table_0"
                                                                                            data-dt-idx="0" tabindex="0"
                                                                                            class="page-link">Previous</a>
                                                    </li>
                                                    <li class="paginate_button page-item active"><a href="#"
                                                                                                    aria-controls="DataTables_Table_0"
                                                                                                    data-dt-idx="1"
                                                                                                    tabindex="0"
                                                                                                    class="page-link">1</a>
                                                    </li>
                                                    <li class="paginate_button page-item "><a href="#"
                                                                                              aria-controls="DataTables_Table_0"
                                                                                              data-dt-idx="2"
                                                                                              tabindex="0"
                                                                                              class="page-link">2</a>
                                                    </li>
                                                    <li class="paginate_button page-item next"
                                                        id="DataTables_Table_0_next"><a href="#"
                                                                                        aria-controls="DataTables_Table_0"
                                                                                        data-dt-idx="3" tabindex="0"
                                                                                        class="page-link">Next</a></li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>


        </div>
    </div>

@section('scripts')

    {{-- DATA TABLE --}}
    <script src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.21/js/dataTables.bootstrap4.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.js"></script>

    <script type="text/javascript">
        $(document).ready(function () {
            $('.table').DataTable();
        });
    </script>
    <script type="text/javascript">
        $(function () {

            var table = $('.table').DataTable({
                processing: true,
                serverSide: true,
                ajax: "{{ route('admin-user-datatables') }}",
                columns: [
                    {data: 'DT_RowIndex', name: 'DT_RowIndex'},

                    {data: 'email', name: 'email'},
                    {data: 'username', name: 'username'},
             ,
                    {
                        data: 'action',
                        name: 'action',
                        orderable: true,
                        searchable: true
                    },
                ]
            });

        });
    </script>

    {{-- DATA TABLE --}}

@endsection

{{--    <div class="content-wrapper">--}}

    {{--        <section class="content-header">--}}

    {{--            <h1>@lang('site.users')</h1>--}}

    {{--            <ol class="breadcrumb">--}}
    {{--                <li><a href="{{ route('dashboard.welcome') }}"><i class="fa fa-dashboard"></i> @lang('site.dashboard')--}}
    {{--                    </a></li>--}}
    {{--                <li class="active">@lang('site.users')</li>--}}
    {{--            </ol>--}}
    {{--        </section>--}}

    {{--        <section class="content">--}}

    {{--            <div class="box box-primary">--}}

    {{--                <div class="box-header with-border">--}}

    {{--                    <h3 class="box-title" style="margin-bottom: 15px">@lang('site.users') </h3>--}}

    {{--                    <form action="{{ route('dashboard.users.index') }}" method="get">--}}

    {{--                        <div class="row">--}}


    {{--                            <div class="col-md-4">--}}
    {{--                                @if (auth()->user()->hasPermission('create_users'))--}}
    {{--                                    <a href="{{ route('dashboard.users.create') }}" class="btn btn-primary"><i--}}
    {{--                                            class="fa fa-plus"></i> @lang('site.add')</a>--}}
    {{--                                @else--}}
    {{--                                    <a href="#" class="btn btn-primary disabled"><i--}}
    {{--                                            class="fa fa-plus"></i> @lang('site.add')</a>--}}
    {{--                                @endif--}}
    {{--                            </div>--}}

    {{--                        </div>--}}
    {{--                    </form><!-- end of form -->--}}

    {{--                </div><!-- end of box header -->--}}

    {{--                <div class="box-body table-responsive no-padding on-overflow-x minHeight">--}}
    {{--                    <div class="box-body">--}}
    {{--                        {!! $dataTable->table([--}}
    {{--                  'class'=>'table table-striped table-hover table-bordered'--}}

    {{--                 ], true) !!}--}}
    {{--                    </div>--}}
    {{--                    @if ($users->count() > 0)--}}
    {{--                        <table class="table table-hover" id="table">--}}

    {{--                            <thead>--}}
    {{--                            <tr>--}}
    {{--                                <th>#</th>--}}
    {{--                                <th>@lang('site.name')</th>--}}
    {{--                                <th>@lang('site.phone')</th>--}}
    {{--                                <th>@lang('site.email')</th>--}}
    {{--                                <th>@lang('site.created_at')</th>--}}
    {{--                                <th>@lang('site.status')</th>--}}
    {{--                                --}}{{----}}{{--                                @if (auth()->user()->hasPermission('update_admins','delete_admins'))--}}

    {{--                                <th>@lang('site.action')</th>--}}
    {{--                                --}}{{----}}{{--                                @endif--}}
    {{--                            </tr>--}}
    {{--                            </thead>--}}

    {{--                            <tbody>--}}
    {{--                            @foreach ($users as $index=>$user)--}}
    {{--                                <tr>--}}
    {{--                                    <td>{{ $index + 1 }}</td>--}}
    {{--                                    <td>{{$user->full_name}}</td>--}}
    {{--                                    --}}{{----}}{{--                                    <td>{{ $lang=='ar'? $user->full_name_ar :$user->full_name_en}}</td>--}}
    {{--                                    <td>{{ $user->mobile ?? '' }}</td>--}}
    {{--                                    <td>{{ $user->email  ?? ''}}</td>--}}

    {{--                                    <td>{{ isset($user->created_at) ? $user->created_at->diffForHumans() :''	 }}</td>--}}
    {{--                                    @if( $user->status==0)--}}
    {{--                                        <td style="margin: 5px;" class="badge bg-red">@lang('site.inactive')</td>--}}
    {{--                                    @elseif( $user->status==1)--}}
    {{--                                        <td style="margin: 5px;" class="badge bg-green">@lang('site.active')</td>--}}
    {{--                                    @endif--}}

    {{--                                    <td>--}}
    {{--                                        <div class="dropdown">--}}
    {{--                                            <a class="btn btn-secondary" href="#" role="button" id="dropdownMenuLink4"--}}
    {{--                                               data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">--}}
    {{--                                                <i class="fa fa-cog"></i>--}}
    {{--                                            </a>--}}

    {{--                                            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">--}}
    {{--                                                @if (auth()->user()->hasPermission('update_users'))--}}
    {{--                                                    <a href="{{ route('dashboard.users.edit', $user->id) }}"--}}
    {{--                                                       class="btn btn-info btn-sm"><i--}}
    {{--                                                            class="fa fa-edit"></i> @lang('site.edit')</a>--}}
    {{--                                                @else--}}
    {{--                                                    <a href="#" class="btn btn-info btn-sm disabled"><i--}}
    {{--                                                            class="fa fa-edit"></i> @lang('site.edit')</a>--}}
    {{--                                                @endif--}}
    {{--                                                <br>--}}
    {{--                                                @if (auth()->user()->hasPermission('update_users'))--}}
    {{--                                                    <form action="{{ route('dashboard.users.block', $user->id) }}"--}}
    {{--                                                          method="post" style="display: inline-block">--}}
    {{--                                                        {{ csrf_field() }}--}}
    {{--                                                        {{ method_field('POST') }}--}}

    {{--                                                        @if( $user->status==1)--}}
    {{--                                                            <button type="submit" class="btn btn-warning update btn-sm">--}}
    {{--                                                                <i class="fa fa-ban"></i> @lang('site.block')--}}
    {{--                                                            </button>--}}
    {{--                                                        @elseif( $user->status==0)--}}
    {{--                                                            <button type="submit" class="btn btn-default update btn-sm">--}}
    {{--                                                                <i class="fa fa-user"></i> @lang('site.activate')--}}
    {{--                                                            </button>--}}
    {{--                                                        @endif--}}

    {{--                                                    </form><!-- end of form -->--}}
    {{--                                                @else--}}
    {{--                                                    <button class="btn btn-danger btn-sm disabled"><i--}}
    {{--                                                            class="fa fa-trash"></i> @lang('site.block')</button>--}}
    {{--                                                @endif--}}
    {{--                                                <br>--}}
    {{--                                                @if (auth()->user()->hasPermission('delete_users'))--}}
    {{--                                                    <form action="{{ route('dashboard.users.destroy', $user->id) }}"--}}
    {{--                                                          method="post" style="display: inline-block">--}}
    {{--                                                        {{ csrf_field() }}--}}
    {{--                                                        {{ method_field('delete') }}--}}
    {{--                                                        <button type="submit" class="btn btn-danger delete btn-sm"><i--}}
    {{--                                                                class="fa fa-trash"></i> @lang('site.delete')</button>--}}
    {{--                                                    </form><!-- end of form -->--}}
    {{--                                                @else--}}
    {{--                                                    <button class="btn btn-danger btn-sm disabled"><i--}}
    {{--                                                            class="fa fa-trash"></i> @lang('site.delete')</button>--}}
    {{--                                                @endif--}}

    {{--                                            </div>--}}
    {{--                                        </div>--}}

    {{--                                    </td>--}}


    {{--                                </tr>--}}

    {{--                            @endforeach--}}
    {{--                            </tbody>--}}

    {{--                        </table><!-- end of table -->--}}
    {{--                        <div style="text-align:center;">--}}
    {{--                        </div>--}}

    {{--                    @else--}}

    {{--                        <h2>@lang('site.no_data_found')</h2>--}}

    {{--                    @endif--}}

    {{--                </div><!-- end of box body -->--}}


    {{--            </div><!-- end of box -->--}}

    {{--        </section><!-- end of content -->--}}

    {{--    </div><!-- end of content wrapper -->--}}


@endsection

