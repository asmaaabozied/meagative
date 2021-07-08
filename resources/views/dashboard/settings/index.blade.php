
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
                            <h5 class="breadcrumbs-title mt-0 mb-0">
                                <span>@lang('site.edit')  @lang('site.settings')</span>
                            </h5>
                        </div>
                        <div class="col s12 m6 l6 right-align-md">
                            <ol class="breadcrumbs mb-0">
                                <li class="breadcrumb-item"><a

                                        href="{{route('dashboard.welcome') }}">@lang('site.dashboard')</a>
                                </li>

                                <li class="breadcrumb-item"><a
                                        href="{{ route('dashboard.settings.index') }}"> @lang('site.settings') </a>
                                </li>
                                <li class="breadcrumb-item active"><a> @lang('site.edit') </a>
                                </li>

                            </ol>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col s12">
                <div class="container">
                    <div class="section">

                        <!--Badge-->
                        <div class="row">
                            <div class="col s12">
                                <div id="badges" class="card card-tabs">
                                    <div class="card-content">
                                        <div class="card-title">
                                            <div class="row">

                                                <div class="colmd-12">

                                                    @include('partials._errors')
                                                    <form action="{{ route('dashboard.settings.updateAll') }}"
                                                          method="post">
                                                        <div class="row">
                                                            @foreach($settings as $key=>$setting)
                                                                {{ csrf_field() }}


                                                                <div class="col-lg-6">

                                                                    <label
                                                                        style="margin: 5px">  {{$setting->name}} </label>
                                                                    <input class="form-control"
                                                                           value="{{$setting->value}}"
                                                                           name="{{$setting->name}}">

                                                                </div>

                                                            @endforeach
                                                        </div>
                                                        <br>
                                                        <div class="form-group col-md-3">
                                                            <button type="submit" class="btn btn-primary text-center"><i
                                                                    class="fa fa-edit"></i> @lang('site.edit')</button>
                                                        </div>
                                                    </form>


                                                    <br>


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
    </div>


@endsection



{{--@extends('layouts.dashboard.app')--}}

{{--@section('content')--}}

{{--    <div class="content-wrapper">--}}

{{--        <section class="content-header">--}}

{{--            <h1>@lang('site.settings')</h1>--}}

{{--            <ol class="breadcrumb">--}}
{{--                <li><a href="{{ route('dashboard.welcome') }}"><i class="fa fa-dashboard"></i> @lang('site.dashboard')--}}
{{--                    </a></li>--}}
{{--                <li class="active">@lang('site.settings')</li>--}}
{{--            </ol>--}}
{{--        </section>--}}

{{--        <section class="content">--}}

{{--            <div class="box box-primary">--}}


{{--                <div class="box-body table-responsive no-padding on-overflow-x minHeight">--}}


{{--                    <div class="box-body">--}}
{{--                        @include('partials._errors')--}}
{{--                        <div class="content">--}}
{{--                            <form action="{{ route('dashboard.settings.updateAll') }}" method="post">--}}
{{--                                <div class="row">--}}
{{--                                @foreach($settings as $key=>$setting)--}}
{{--                                    {{ csrf_field() }}--}}


{{--                                    <div class="col-lg-6">--}}

{{--                                        <label style="margin: 5px">  {{$setting->name}} </label>--}}
{{--                                        <input class="form-control" value="{{$setting->value}}" name="{{$setting->name}}">--}}

{{--                                    </div>--}}

{{--                                @endforeach--}}
{{--                                </div>--}}
{{--                                <br>--}}
{{--                                <div class="form-group col-md-3">--}}
{{--                                    <button type="submit" class="btn btn-primary text-center"><i class="fa fa-edit"></i> @lang('site.edit')</button>--}}
{{--                                </div>--}}
{{--                            </form>--}}


{{--                            <br>--}}





{{--                        </div>--}}


{{--                    </div>--}}


{{--                </div>--}}
{{--            </div>--}}
{{--        </section>--}}
{{--    </div>--}}

{{--@endsection--}}
