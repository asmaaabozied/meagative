@extends('layouts.dashboard.app')

@section('content')

    <div class="content-wrapper">

        <section class="content-header">

            <h1>@lang('site.planers')</h1>

            <ol class="breadcrumb">
                <li><a href="{{ route('dashboard.welcome') }}"><i class="fa fa-dashboard"></i> @lang('site.dashboard')
                    </a></li>
                <li class="active">@lang('site.planers')</li>
            </ol>
        </section>

        <section class="content">

            <div class="box box-primary">

                <div class="box-header with-border">

                    <h3 class="box-title" style="margin-bottom: 15px">@lang('site.planers') </h3>

                    <form action="{{ route('dashboard.planers.index') }}" method="get">

                        <div class="row">

                            <div class="col-md-4">
                                @if (auth()->user()->hasPermission('create_planers'))
                                    <a href="{{ route('dashboard.planers.create') }}" class="btn btn-primary"><i
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

                    @if ($planers->count() > 0)
                        <table class="table table-hover" id="table">

                            <thead>
                            <tr>
                                <th>#</th>
                                <th>@lang('site.name')</th>
                                <th>@lang('site.customers')</th>
                                <th>@lang('site.description')</th>
                                <th>@lang('site.address')</th>
                                <th>@lang('site.email')</th>
                                <th>@lang('site.phone')</th>
                                <th>@lang('site.country')</th>
                                <th>@lang('site.created_at')</th>
                                <th>@lang('site.status')</th>

                            </tr>
                            </thead>

                            <tbody>
                            @foreach ($planers as $index=>$type)
                                <tr>
                                    <td>{{ $index + 1 }}</td>

                                    <td>{{ $type->name_ar ?? '' }}</td>
                                    <td>{{  $type->customer->name ?? ''}}</td>
                                    <td>{{  Str::limit($type['description'],20)}}</td>

                                    <td>{{  $type->address ?? ''}}</td>
                                    <td>{{$type->email  ?? ''}}</td>
                                    <td>{{$type->phone  ?? ''}}</td>
                                    <td>{{ $type->country->name ?? ''}}</td>

                                    <td>{{ isset($type->created_at) ? $type->created_at->diffForHumans() :''	 }}</td>
                                    @if( $type->active==0)
                                        <td style="margin: 5px;" class="badge bg-red">@lang('site.inactive')</td>
                                    @elseif( $type->active==1)
                                        <td style="margin: 5px;" class="badge bg-green">@lang('site.active')</td>
                                    @endif




                                </tr>

                            @endforeach
                            </tbody>

                        </table><!-- end of table -->
                        <div style="text-align:center;">

                        </div>

                    @else

                        <h2>@lang('site.no_data_found')</h2>

                    @endif

                </div><!-- end of box body -->


            </div><!-- end of box -->

        </section><!-- end of content -->

    </div><!-- end of content wrapper -->


@endsection
