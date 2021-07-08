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
                                <span>@lang('site.edit')  @lang('site.customers_emails')</span>
                            </h5>
                        </div>
                        <div class="col s12 m6 l6 right-align-md">
                            <ol class="breadcrumbs mb-0">
                                <li class="breadcrumb-item"><a

                                        href="{{route('dashboard.welcome') }}">@lang('site.dashboard')</a>
                                </li>

                                <li class="breadcrumb-item"><a
                                        href="{{ route('dashboard.customers_emails.index') }}"> @lang('site.customers_emails') </a>
                                </li>
                                <li class="breadcrumb-item"><a
                                    > @lang('site.edit') </a>
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


                                                    <form
                                                        action="{{ route('dashboard.customers_emails.update', $customer->id) }}"
                                                        method="post"
                                                        enctype="multipart/form-data">

                                                        {{ csrf_field() }}
                                                        {{ method_field('put') }}

                                                        <div class="form-group">
                                                            <label>@lang('site.email')</label>
                                                            <input type="text" name="email" class="form-control"
                                                                   value="{{$customer->email }}">
                                                        </div>
                                                        <div class="form-group">
                                                            <label>@lang('site.type')</label>
                                                            <input type="text" name="identity_type" class="form-control"
                                                                   value="{{$customer->identity_type }}"
                                                            >
                                                        </div>

                                                        <div class="form-group">
                                                            <label>@lang('site.customers')</label>
                                                            <select name="customer_id" class="form-control select2">

                                                                @foreach ( $customers as $key=>$country)
                                                                    <option
                                                                        value="{{$key }}" {{ $customer->customer_id ? 'selected' : '' }}>
                                                                        {{$country }}
                                                                    </option>
                                                                @endforeach
                                                            </select>
                                                        </div>

                                                        <br>
                                                        <div class="form-group">
                                                            <button type="button" class="btn btn-warning mr-1"
                                                                    onclick="history.back();">
                                                                <i class="fa fa-backward"></i> @lang('site.back')
                                                            </button>
                                                            <button type="submit" class="btn btn-primary"><i
                                                                    class="fa fa-edit"></i>
                                                                @lang('site.edit')</button>
                                                        </div>


                                                    </form><!-- end of form -->


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

{{--            <h1>@lang('site.customers_emails')</h1>--}}

{{--            <ol class="breadcrumb">--}}
{{--                <li><a href="{{ route('dashboard.welcome') }}"><i class="fa fa-dashboard"></i> @lang('site.dashboard')--}}
{{--                    </a>--}}
{{--                </li>--}}
{{--                <li><a href="{{ route('dashboard.customers_emails.index') }}"> @lang('site.customers_emails')</a></li>--}}
{{--                <li class="active">@lang('site.edit')</li>--}}
{{--            </ol>--}}
{{--        </section>--}}

{{--        <section class="content">--}}

{{--            <div class="box box-primary">--}}

{{--                <div class="box-header">--}}
{{--                    <h3 class="box-title">@lang('site.edit')</h3>--}}
{{--                </div><!-- end of box header -->--}}

{{--                <div class="box-body">--}}

{{--                    @include('partials._errors')--}}

{{--                    <form action="{{ route('dashboard.customers_emails.update', $customer->id) }}" method="post"--}}
{{--                          enctype="multipart/form-data">--}}

{{--                        {{ csrf_field() }}--}}
{{--                        {{ method_field('put') }}--}}

{{--                        <div class="form-group">--}}
{{--                            <label>@lang('site.email')</label>--}}
{{--                            <input type="text" name="email" class="form-control" value="{{$customer->email }}">--}}
{{--                        </div>--}}


{{--                        <div class="form-group">--}}
{{--                            <label>@lang('site.customers')</label>--}}
{{--                            <select name="customer_id" class="form-control select2">--}}

{{--                                @foreach ( $customers as $key=>$country)--}}
{{--                                    <option value="{{$key }}" {{ $customer->customer_id ? 'selected' : '' }}>--}}
{{--                                        {{$country }}--}}
{{--                                    </option>--}}
{{--                                @endforeach--}}
{{--                            </select>--}}
{{--                        </div>--}}


{{--                        <div class="form-group">--}}
{{--                            <button type="button" class="btn btn-warning mr-1"--}}
{{--                                    onclick="history.back();">--}}
{{--                                <i class="fa fa-backward"></i> @lang('site.back')--}}
{{--                            </button>--}}
{{--                            <button type="submit" class="btn btn-primary"><i class="fa fa-edit"></i>--}}
{{--                                @lang('site.edit')</button>--}}
{{--                        </div>--}}


{{--                    </form><!-- end of form -->--}}

{{--                </div><!-- end of box body -->--}}

{{--            </div><!-- end of box -->--}}

{{--        </section><!-- end of content -->--}}

{{--    </div><!-- end of content wrapper -->--}}
{{--    <!-- <script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script> -->--}}

{{--@endsection--}}
