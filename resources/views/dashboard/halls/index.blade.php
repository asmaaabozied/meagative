@extends('layouts.dashboard.app')

@section('content')

    <div class="content-wrapper">

        <section class="content-header">

            <h1>@lang('site.halls')</h1>

            <ol class="breadcrumb">
                <li><a href="{{ route('dashboard.welcome') }}"><i class="fa fa-dashboard"></i> @lang('site.dashboard')
                    </a></li>
                <li class="active">@lang('site.halls')</li>
            </ol>
        </section>

        <section class="content">

            <div class="box box-primary">

                <div class="box-header with-border">

                    <h3 class="box-title" style="margin-bottom: 15px">@lang('site.halls')
                       </h3>

                    <form action="{{ route('dashboard.halls.index') }}" method="get">

                        <div class="row">


                            <div class="col-md-4">

          @if (auth()->user()->hasPermission('create_halls'))
                                <a href="{{ route('dashboard.halls.create') }}" class="btn btn-primary"><i
                                        class="fa fa-plus"></i> @lang('site.add')</a>
                                 @else
                                    <a href="#" class="btn btn-primary disabled"><i class="fa fa-plus"></i> @lang('site.add')</a>
                                                                @endif
                            </div>

                        </div>
                    </form><!-- end of form -->

                </div><!-- end of box header -->

                <div class="box-body table-responsive no-padding on-overflow-x minHeight">

                    @if ($halls->count() > 0)
                        <table class="table table-hover" id="table">

                            <thead>
                            <tr>
                                <th>#</th>
                                <th>@lang('site.name')</th>
                                <th>@lang('site.price')</th>
                                <th>@lang('site.address')</th>
                                <th>@lang('site.customers')</th>
                                <th>@lang('site.type')</th>
                                <th>@lang('site.capacity')</th>
                                <th>@lang('site.start_at')</th>
                                <th>@lang('site.country')</th>


                                <th>@lang('site.created_at')</th>
                                <th>@lang('site.status')</th>
                                {{--                                @if (auth()->user()->hasPermission('update_admins','delete_admins'))--}}

                                <th>@lang('site.action')</th>
                                {{--                                @endif--}}
                            </tr>
                            </thead>

                            <tbody>
                            @foreach ($halls as $index=>$hall)
                                <tr>
                                    <td>{{ $index + 1 }}</td>
                                    <td>{{ $lang=='ar'? $hall->name_ar :$hall->name_en}}</td>

                                    <td>{{$hall->price}}</td>
                                    <td>{{ $lang=='ar'? Str::limit($hall['address_ar'],20) :Str::limit($hall['address_en'],20)}}</td>
                                    <td>{{ $lang=='ar'? $hall->customer->name :$hall->customer->name}}</td>
                                    <td>{{ $lang=='ar'? $hall->type->name_ar :$hall->type->name_en}}</td>

                                    <td>{{$hall->capacity ?? ''}}</td>
                                    <td>{{ $hall->time_open ?? '' }}</td>

                                    <td>{{ $lang=='ar'? $hall->country->name_ar :$hall->country->name_en}}</td>

                                    <td>{{ isset($hall->created_at) ? $hall->created_at->diffForHumans() :''	 }}</td>
                                    @if( $hall->active==0)
                                        <td style="margin: 5px;" class="badge bg-red">@lang('site.inactive')</td>
                                    @elseif( $hall->active==1)
                                        <td style="margin: 5px;" class="badge bg-green">@lang('site.active')</td>
                                    @endif

                                    <td>
                                        <div class="dropdown">
                                            <a class="btn btn-secondary" href="#" role="button" id="dropdownMenuLink4"
                                               data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                <i class="fa fa-cog"></i>
                                            </a>

                                            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                @if (auth()->user()->hasPermission('update_halls'))
                                                <a href="{{ route('dashboard.halls.edit', $hall->id) }}"
                                                   class="btn btn-info btn-sm"><i
                                                        class="fa fa-edit"></i> @lang('site.edit')</a>
                                                 @else
                                                    <a href="#" class="btn btn-info btn-sm disabled"><i class="fa fa-edit"></i> @lang('site.edit')</a>
                                                                                            @endif
                                                <br>
                    @if (auth()->user()->hasPermission('update_halls'))
                                                <form action="{{ route('dashboard.halls.block', $hall->id) }}"
                                                      method="post" style="display: inline-block">
                                                    {{ csrf_field() }}
                                                    {{ method_field('POST') }}

                                                    @if( $hall->active==1)
                                                        <button type="submit" class="btn btn-warning update btn-sm">
                                                            <i class="fa fa-ban"></i> @lang('site.block')
                                                        </button>
                                                    @elseif( $hall->active==0)
                                                        <button type="submit" class="btn btn-default update btn-sm">
                                                            <i class="fa fa-user"></i> @lang('site.activate')
                                                        </button>
                                                    @endif

                                                </form><!-- end of form -->
                                                 @else
                                                <button class="btn btn-danger btn-sm disabled"><i class="fa fa-trash"></i> @lang('site.block')</button>
                                                                                            @endif
                                                <br>
                              @if (auth()->user()->hasPermission('delete_halls'))
                                                <form action="{{ route('dashboard.halls.destroy', $hall->id) }}"
                                                      method="post" style="display: inline-block">
                                                    {{ csrf_field() }}
                                                    {{ method_field('delete') }}
                                                    <button type="submit" class="btn btn-danger delete btn-sm"><i
                                                            class="fa fa-trash"></i> @lang('site.delete')</button>
                                                </form><!-- end of form -->
                                                 @else
                                                <button class="btn btn-danger btn-sm disabled"><i class="fa fa-trash"></i> @lang('site.delete')</button>
                                                                                            @endif

                                            </div>
                                        </div>

                                    </td>

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
