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
                            <h5 class="breadcrumbs-title mt-0 mb-0"><span>@lang('site.show')  @lang('site.services')</span>
                            </h5>
                        </div>
                        <div class="col s12 m6 l6 right-align-md">
                            <ol class="breadcrumbs mb-0">
                                <li class="breadcrumb-item"><a

                                        href="{{route('dashboard.welcome') }}">@lang('site.dashboard')</a>
                                </li>
                                @if (auth()->user()->hasPermission('read_services'))
                                    <li class="breadcrumb-item"><a
                                            href="{{ route('dashboard.services.index') }}"> @lang('site.services') </a>
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


                                                @if ($services->count() > 0)
                                                    <table class="table table-hover" id="table">

                                                        <thead>
                                                        <tr>
                                                            <th>#</th>
                                                            <th>@lang('site.name')</th>
                                                            <th>@lang('site.price')</th>
                                                            <th>@lang('site.customers')</th>
                                                            <th>@lang('site.categories')</th>
                                                            <th>@lang('site.description')</th>
                                                            <th>@lang('site.created_at')</th>
                                                            <th>@lang('site.status')</th>

                                                        </tr>
                                                        </thead>

                                                        <tbody>
                                                        @foreach ($services as $index=>$event)
                                                            <tr>
                                                                <td>{{ $index + 1 }}</td>
                                                                <td>{{  $event->name ?? ''}}</td>
                                                                <td>{{  $event->price ?? ''}}</td>
                                                                <td>{{ $event->customer->name ?? ''}}</td>

                                                                <td>{{ $event->catogery->name ?? ''}}</td>

                                                                <td>{{  Str::limit($event['description_ar'],50) ?? ''}}</td>


                                                                <td>{{ isset($event->created_at) ? $event->created_at->diffForHumans() :''	 }}</td>
                                                                @if( $event->active==0)
                                                                    <td style="margin: 5px;"
                                                                        class="badge bg-red">@lang('site.inactive')</td>
                                                                @elseif( $event->active==1)
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









