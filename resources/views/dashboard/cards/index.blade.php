@extends('layouts.dashboard.app')

@section('content')

    <div class="content-wrapper">

        <section class="content-header">

            <h1>@lang('site.countries')</h1>

            <ol class="breadcrumb">
                <li><a href="{{ route('dashboard.welcome') }}"><i class="fa fa-dashboard"></i> @lang('site.dashboard')
                    </a></li>
                <li class="active">@lang('site.countries')</li>
            </ol>
        </section>

        <section class="content">

            <div class="box box-primary">

                <div class="box-header with-border">

                    <h3 class="box-title" style="margin-bottom: 15px">@lang('site.countries') </h3>

                    <form action="{{ route('dashboard.countries.index') }}" method="get">

                        <div class="row">


                            <div class="col-md-4">
                                @if (auth()->user()->hasPermission('create_countries'))
                                    <a href="{{ route('dashboard.countries.create') }}" class="btn btn-primary"><i
                                            class="fa fa-plus"></i> @lang('site.add')</a>
                                @else
                                    <a href="#" class="btn btn-primary disabled"><i
                                            class="fa fa-plus"></i> @lang('site.add')</a>
                                @endif
                            </div>

                        </div>
                    </form><!-- end of form -->

                </div><!-- end of box header -->

                <div class="box-body table-responsive no-padding on-overflow-x minHeight">

                    <div class="box-body">
                        {!! $dataTable->table([
                  'class'=>'table table-striped table-hover table-bordered'

                 ], true) !!}
                    </div>


                    {{--                    @if ($countries->count() > 0)--}}
                    {{--                        <table class="table table-hover" id="table">--}}

                    {{--                            <thead>--}}
                    {{--                            <tr>--}}
                    {{--                                <th>#</th>--}}
                    {{--                                <th>@lang('site.name')</th>--}}
                    {{--                                <th>@lang('site.phone')</th>--}}
                    {{--                                <th>@lang('site.code')</th>--}}
                    {{--                                <th>@lang('site.key')</th>--}}
                    {{--                                <th>@lang('site.created_at')</th>--}}
                    {{--                                <th>@lang('site.status')</th>--}}
                    {{--                                --}}{{--                                @if (auth()->user()->hasPermission('update_admins','delete_admins'))--}}

                    {{--                                <th>@lang('site.action')</th>--}}
                    {{--                                --}}{{--                                @endif--}}
                    {{--                            </tr>--}}
                    {{--                            </thead>--}}

                    {{--                            <tbody>--}}
                    {{--                            @foreach ($countries as $index=>$country)--}}
                    {{--                                <tr>--}}
                    {{--                                    <td>{{ $index + 1 }}</td>--}}

                    {{--                                    <td>{{ $lang=='ar'? $country->name_ar :$country->name_en}}</td>--}}
                    {{--                                    <td>{{$country->mobile_ex}}</td>--}}
                    {{--                                    <td>{{ $country->code ?? '' }}</td>--}}
                    {{--                                    <td>{{ $country->call_key  ?? ''}}</td>--}}

                    {{--                                    <td>{{ isset($country->created_at) ? $country->created_at->diffForHumans() :''	 }}</td>--}}
                    {{--                                    @if( $country->active==0)--}}
                    {{--                                        <td style="margin: 5px;" class="badge bg-red">@lang('site.inactive')</td>--}}
                    {{--                                    @elseif( $country->active==1)--}}
                    {{--                                        <td style="margin: 5px;" class="badge bg-green">@lang('site.active')</td>--}}
                    {{--                                    @endif--}}

                    {{--                                    <td>--}}
                    {{--                                        <div class="dropdown">--}}
                    {{--                                            <a class="btn btn-secondary" href="#" role="button" id="dropdownMenuLink4"--}}
                    {{--                                               data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">--}}
                    {{--                                                <i class="fa fa-cog"></i>--}}
                    {{--                                            </a>--}}

                    {{--                                            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">--}}
                    {{--                                                @if (auth()->user()->hasPermission('update_countries'))--}}
                    {{--                                                    <a href="{{ route('dashboard.countries.edit', $country->id) }}"--}}
                    {{--                                                       class="btn btn-info btn-sm"><i--}}
                    {{--                                                            class="fa fa-edit"></i> @lang('site.edit')</a>--}}
                    {{--                                                @else--}}
                    {{--                                                    <a href="#" class="btn btn-info btn-sm disabled"><i--}}
                    {{--                                                            class="fa fa-edit"></i> @lang('site.edit')</a>--}}
                    {{--                                                @endif--}}
                    {{--                                                <br>--}}
                    {{--                                                @if (auth()->user()->hasPermission('update_countries'))--}}
                    {{--                                                    <form--}}
                    {{--                                                        action="{{ route('dashboard.countries.block', $country->id) }}"--}}
                    {{--                                                        method="post" style="display: inline-block">--}}
                    {{--                                                        {{ csrf_field() }}--}}
                    {{--                                                        {{ method_field('POST') }}--}}

                    {{--                                                        @if( $country->active==1)--}}
                    {{--                                                            <button type="submit" class="btn btn-warning update btn-sm">--}}
                    {{--                                                                <i class="fa fa-ban"></i> @lang('site.block')--}}
                    {{--                                                            </button>--}}
                    {{--                                                        @elseif( $country->active==0)--}}
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
                    {{--                                                @if (auth()->user()->hasPermission('delete_countries'))--}}
                    {{--                                                    <form--}}
                    {{--                                                        action="{{ route('dashboard.countries.destroy', $country->id) }}"--}}
                    {{--                                                        method="post" style="display: inline-block">--}}
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

                </div><!-- end of box body -->


            </div><!-- end of box -->

        </section><!-- end of content -->

    </div><!-- end of content wrapper -->


@endsection

@push('scripts')
    <link rel="stylesheet" href="https://cdn.datatables.net/buttons/1.0.3/css/buttons.dataTables.min.css">
    <script src="https://cdn.datatables.net/buttons/1.0.3/js/dataTables.buttons.min.js"></script>
    <script src="/vendor/datatables/buttons.server-side.js"></script>
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
    </script>
    {!! $dataTable->scripts() !!}
@endpush
