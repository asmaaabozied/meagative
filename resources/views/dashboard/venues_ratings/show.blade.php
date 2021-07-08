



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
                            <h5 class="breadcrumbs-title mt-0 mb-0"><span>@lang('site.edit')  @lang('site.venues_ratings')</span>
                            </h5>
                        </div>
                        <div class="col s12 m6 l6 right-align-md">
                            <ol class="breadcrumbs mb-0">
                                <li class="breadcrumb-item"><a

                                        href="{{route('dashboard.welcome') }}">@lang('site.dashboard')</a>
                                </li>

                                <li class="breadcrumb-item"><a
                                        href="{{ route('dashboard.venues_ratings.index') }}"> @lang('site.venues_ratings') </a>
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



                                                        <div class="row">
                                                            <div class="col-md-6">

                                                                <label>@lang('site.start_at')</label>
                                                                <input type="text" name="datetime"
                                                                       class="form-control date"
                                                                       value="{{ $type->datetime }}">
                                                            </div>


                                                            <div class="col-md-6">
                                                                <label>@lang('site.number')</label>
                                                                <input type="number" name="rate" class="form-control"
                                                                       value="{{ $type->rate }}">
                                                            </div>
                                                        </div>

                                                        <div class="row">
                                                            <div class="col-md-6">
                                                                <label>@lang('site.customers')</label>
                                                                <select name="customer_id" class="form-control select2">
                                                                    <option value="">@lang('site.select')</option>
                                                                    @foreach ( $customers as $key=>$customer)
                                                                        <option
                                                                            value="{{$key }}" {{ $type->customer_id == $key? 'selected' : '' }}>
                                                                            {{$customer }}
                                                                        </option>
                                                                    @endforeach
                                                                </select>
                                                            </div>

                                                            <div class="col-md-6">
                                                                <label>@lang('site.planers')</label>
                                                                <select name="venue_id" class="form-control select2">
                                                                    <option value="">@lang('site.select')</option>
                                                                    @foreach ( $planners as $key=>$customer)
                                                                        <option
                                                                            value="{{$key }}" {{ $type->venue_id  == $key? 'selected' : '' }}>
                                                                            {{$customer }}
                                                                        </option>
                                                                    @endforeach
                                                                </select>
                                                            </div>


                                                        </div>


                                                        <div class="row">
                                                            <div class="col-md-6">
                                                                <label>@lang('site.description')</label>
                                                                <textarea name="description"
                                                                          class="form-control" id="summary-ckeditor"
                                                                          name="summary-ckeditor">{{ $type->description  }}   </textarea>

                                                            </div>

                                                        </div>

                                                        <br>

                                                        <div class="row">
                                                            <div class="col-md-6">
                                                                <button type="button" class="btn btn-warning mr-1"
                                                                        onclick="history.back();">
                                                                    <i class="fa fa-backward"></i> @lang('site.back')
                                                                </button>

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
        </div>
    </div>


@endsection
@section('scripts')
    <script src="{{ asset('public/dashboard_files/js/jquery.min.js') }}"></script>

    <script>
        CKEDITOR.replace('summary-ckeditor');
    </script>

    <script>
        CKEDITOR.replace('summary-ckeditor1');
    </script>
@endsection

{{--@extends('layouts.dashboard.app')--}}

{{--@section('content')--}}

{{--<div class="content-wrapper">--}}

{{--    <section class="content-header">--}}

{{--        <h1>@lang('site.venues_ratings')</h1>--}}

{{--        <ol class="breadcrumb">--}}
{{--            <li><a href="{{ route('dashboard.welcome') }}"><i class="fa fa-dashboard"></i> @lang('site.dashboard')</a>--}}
{{--            </li>--}}
{{--            <li><a href="{{ route('dashboard.venues_ratings.index') }}"> @lang('site.venues_ratings')</a></li>--}}
{{--            <li class="active">@lang('site.edit')</li>--}}
{{--        </ol>--}}
{{--    </section>--}}

{{--    <section class="content">--}}

{{--        <div class="box box-primary">--}}

{{--            <div class="box-header">--}}
{{--                <h3 class="box-title">@lang('site.edit')</h3>--}}
{{--            </div><!-- end of box header -->--}}

{{--            <div class="box-body">--}}

{{--                @include('partials._errors')--}}

{{--                <form action="{{ route('dashboard.venues_ratings.update', $type->id) }}" method="post"--}}
{{--                    enctype="multipart/form-data">--}}

{{--                    {{ csrf_field() }}--}}
{{--                    {{ method_field('put') }}--}}




{{--                    <div class="row">--}}
{{--                        <div class="col-md-6">--}}

{{--                            <label>@lang('site.start_at')</label>--}}
{{--                            <input type="date" name="datetime" class="form-control date" value="{{ $type->datetime }}">--}}
{{--                        </div>--}}


{{--                        <div class="col-md-6">--}}
{{--                            <label>@lang('site.number')</label>--}}
{{--                            <input type="number" name="rate" class="form-control" value="{{ $type->rate }}">--}}
{{--                        </div>--}}
{{--                    </div>--}}

{{--                    <div class="row">--}}
{{--                        <div class="col-md-6">--}}
{{--                            <label>@lang('site.customers')</label>--}}
{{--                            <select name="customer_id" class="form-control select2">--}}
{{--                                <option value="">@lang('site.select')</option>--}}
{{--                                @foreach ( $customers as $key=>$customer)--}}
{{--                                    <option value="{{$key }}" {{ $type->customer_id == $key? 'selected' : '' }}>--}}
{{--                                        {{$customer }}--}}
{{--                                    </option>--}}
{{--                                @endforeach--}}
{{--                            </select>--}}
{{--                        </div>--}}

{{--                        <div class="col-md-6">--}}
{{--                            <label>@lang('site.planers')</label>--}}
{{--                            <select name="venue_id" class="form-control select2">--}}
{{--                                <option value="">@lang('site.select')</option>--}}
{{--                                @foreach ( $planners as $key=>$customer)--}}
{{--                                    <option value="{{$key }}" {{ $type->venue_id  == $key? 'selected' : '' }}>--}}
{{--                                        {{$customer }}--}}
{{--                                    </option>--}}
{{--                                @endforeach--}}
{{--                            </select>--}}
{{--                        </div>--}}


{{--                    </div>--}}


{{--                    <div class="row">--}}
{{--                        <div class="col-md-6">--}}
{{--                            <label>@lang('site.description')</label>--}}
{{--                            <textarea name="description"--}}
{{--                                      class="form-control" id="summary-ckeditor"--}}
{{--                                      name="summary-ckeditor">{{ $type->description  }}   </textarea>--}}

{{--                        </div>--}}

{{--                    </div>--}}

{{--<br>--}}

{{--                    <div class="row">--}}
{{--                        <div class="col-md-6">--}}
{{--                        <button type="button" class="btn btn-warning mr-1"--}}
{{--                                onclick="history.back();">--}}
{{--                            <i class="fa fa-backward"></i> @lang('site.back')--}}
{{--                        </button>--}}
{{--                        <button type="submit" class="btn btn-primary"><i class="fa fa-edit"></i>--}}
{{--                            @lang('site.edit')</button>--}}
{{--                    </div>--}}
{{--                    </div>--}}

{{--                </form><!-- end of form -->--}}

{{--            </div><!-- end of box body -->--}}

{{--        </div><!-- end of box -->--}}

{{--    </section><!-- end of content -->--}}

{{--</div><!-- end of content wrapper -->--}}
{{--<!-- <script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script> -->--}}

{{--@endsection--}}


{{--@extends('layouts.dashboard.app')--}}

{{--@section('content')--}}

{{--<div class="content-wrapper">--}}

{{--    <section class="content-header">--}}

{{--        <h1>@lang('site.venues_ratings')</h1>--}}

{{--        <ol class="breadcrumb">--}}
{{--            <li><a href="{{ route('dashboard.welcome') }}"><i class="fa fa-dashboard"></i> @lang('site.dashboard')</a>--}}
{{--            </li>--}}
{{--            <li><a href="{{ route('dashboard.venues_ratings.index') }}"> @lang('site.venues_ratings')</a></li>--}}
{{--            <li class="active">@lang('site.show')</li>--}}
{{--        </ol>--}}
{{--    </section>--}}

{{--    <section class="content">--}}

{{--        <div class="box box-primary">--}}

{{--            <div class="box-header">--}}
{{--                <h3 class="box-title">@lang('site.show')</h3>--}}
{{--            </div><!-- end of box header -->--}}

{{--            <div class="box-body">--}}





{{--                    <div class="row">--}}
{{--                        <div class="col-md-6">--}}

{{--                            <label>@lang('site.start_at')</label>--}}
{{--                            <input type="date" name="datetime" class="form-control date" value="{{ $type->datetime }}">--}}
{{--                        </div>--}}


{{--                        <div class="col-md-6">--}}
{{--                            <label>@lang('site.number')</label>--}}
{{--                            <input type="number" name="rate" class="form-control" value="{{ $type->rate }}">--}}
{{--                        </div>--}}
{{--                    </div>--}}

{{--                    <div class="row">--}}
{{--                        <div class="col-md-6">--}}
{{--                            <label>@lang('site.customers')</label>--}}
{{--                            <select name="customer_id" class="form-control select2" readonly>--}}
{{--                                <option value="">@lang('site.select')</option>--}}
{{--                                @foreach ( $customers as $key=>$customer)--}}
{{--                                    <option value="{{$key }}" {{ $type->customer_id == $key? 'selected' : '' }}>--}}
{{--                                        {{$customer }}--}}
{{--                                    </option>--}}
{{--                                @endforeach--}}
{{--                            </select>--}}
{{--                        </div>--}}

{{--                        <div class="col-md-6">--}}
{{--                            <label>@lang('site.planers')</label>--}}
{{--                            <select name="venue_id" class="form-control select2" readonly>--}}
{{--                                <option value="">@lang('site.select')</option>--}}
{{--                                @foreach ( $planners as $key=>$customer)--}}
{{--                                    <option value="{{$key }}" {{ $type->venue_id  == $key? 'selected' : '' }}>--}}
{{--                                        {{$customer }}--}}
{{--                                    </option>--}}
{{--                                @endforeach--}}
{{--                            </select>--}}
{{--                        </div>--}}


{{--                    </div>--}}


{{--                    <div class="row">--}}
{{--                        <div class="col-md-6">--}}
{{--                            <label>@lang('site.description')</label>--}}
{{--                            <textarea name="description"--}}
{{--                                      class="form-control" id="summary-ckeditor"--}}
{{--                                      name="summary-ckeditor">{{ $type->description  }}   </textarea>--}}

{{--                        </div>--}}

{{--                    </div>--}}

{{--<br>--}}

{{--                    <div class="row">--}}
{{--                        <div class="col-md-6">--}}
{{--                        <button type="button" class="btn btn-warning mr-1"--}}
{{--                                onclick="history.back();">--}}
{{--                            <i class="fa fa-backward"></i> @lang('site.back')--}}
{{--                        </button>--}}

{{--                    </div>--}}
{{--                    </div>--}}


{{--            </div><!-- end of box body -->--}}

{{--        </div><!-- end of box -->--}}

{{--    </section><!-- end of content -->--}}

{{--</div><!-- end of content wrapper -->--}}
{{--<!-- <script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script> -->--}}

{{--@endsection--}}
