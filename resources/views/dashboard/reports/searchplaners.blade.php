@extends('layouts.dashboard.app')

@section('content')

    <div id="main">
        <div class="row">
            <div id="breadcrumbs-wrapper" data-image="{{asset('style/app-assets/images/gallery/breadcrumb-bg.jpg')}}"
                 class="breadcrumbs-bg-image"
                 style="background-image: url(&quot;../../../app-assets/images/gallery/breadcrumb-bg.jpg&quot;);">
                <!-- Search for small screen-->
                <div class="container">
                    <div class="row">
                        <div class="col s12 m6 l6">
                            <h5 class="breadcrumbs-title mt-0 mb-0"><span>@lang('site.show')  @lang('site.planers')</span>
                            </h5>
                        </div>
                        <div class="col s12 m6 l6 right-align-md">
                            <ol class="breadcrumbs mb-0">
                                <li class="breadcrumb-item"><a

                                        href="{{route('dashboard.welcome') }}">@lang('site.dashboard')</a>
                                </li>
                                @if (auth()->user()->hasPermission('read_planers'))
                                    <li class="breadcrumb-item"><a
                                            href="{{ route('dashboard.planers.index') }}"> @lang('site.planers') </a>
                                    </li>
                                @endif
                                <li class="breadcrumb-item active"><a> @lang('site.show') </a>
                                </li>

                            </ol>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col s12">
                <div class="container">
                    <div class="section">
{{--                        <div class="row">--}}
{{--                            <button class="btn-small btn-light-indigo print" type="print"  onclick="window.print()" >--}}
{{--                                    <i class="fa fa-print"> Print</i>--}}
{{--                                </button>--}}
{{--                        </div>--}}
                        <!--tablecontents-->
                        <div class="row">
                            <div class="col s12">
                                <div id="badges" class="card card-tabs">
                                    <div class="card-content">
                                        <div class="card-title">
                                            <div class="row">


                                                @if ($planers->count() > 0)
                                                    <table class="table table-hover" id="table">

                                                        <thead>
                                                        <tr>
                                                            <th>#</th>
                                                            <th>@lang('site.name')</th>
                                                            <th>@lang('site.customers')</th>

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

                                                                <td>{{  $type->address ?? ''}}</td>
                                                                <td>{{$type->email  ?? ''}}</td>
                                                                <td>{{$type->phone  ?? ''}}</td>
                                                                <td>{{ $type->country->name ?? ''}}</td>

                                                                <td>{{ isset($type->created_at) ? $type->created_at->diffForHumans() :''	 }}</td>
                                                                @if( $type->active==0)
                                                                    <td style="margin: 5px;"
                                                                        class="badge bg-red">@lang('site.inactive')</td>
                                                                @elseif( $type->active==1)
                                                                    <td style="margin: 5px;"
                                                                        class="badge bg-green">@lang('site.active')</td>
                                                                @endif


                                                            </tr>

                                                        @endforeach
                                                        </tbody>

                                                    </table><!-- end of table -->
                                                    <br>
                                                    <div >
                                                        <button type="button" class="btn btn-warning mr-1"
                                                                onclick="history.back();">
                                                            <i class="fa fa-backward"></i> @lang('site.back')
                                                        </button>
                                                    </div>

                                                    <br>

                                                @else

                                                    <h2>@lang('site.no_data_found')</h2>

                                                @endif


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

@endsection
@section('scripts')
<script>
$(document).ready(function(){
  $('.print').window.print();

});



</script>


@endsection









