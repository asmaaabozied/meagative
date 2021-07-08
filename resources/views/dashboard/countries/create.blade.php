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
                                <span>@lang('site.add')  @lang('site.countries')</span>
                            </h5>
                        </div>
                        <div class="col s12 m6 l6 right-align-md">
                            <ol class="breadcrumbs mb-0">
                                <li class="breadcrumb-item"><a

                                        href="{{route('dashboard.welcome') }}">@lang('site.dashboard')</a>
                                </li>

                                <li class="breadcrumb-item"><a
                                        href="{{ route('dashboard.countries.index') }}"> @lang('site.countries') </a>
                                </li>
                                <li class="breadcrumb-item active"><a> @lang('site.add') </a>
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

                                                    <form action="{{ route('dashboard.countries.store') }}"
                                                          method="post" enctype="multipart/form-data">

                                                        {{ csrf_field() }}
                                                        {{ method_field('post') }}


                                                        <div class="form-group">
                                                            <label>@lang('site.name_ar')</label>
                                                            <input type="text" name="name_ar" class="form-control"
                                                                   value="{{ old('name_ar') }}">
                                                        </div>
                                                        <div class="form-group">
                                                            <label>@lang('site.name_en')</label>
                                                            <input type="text" name="name_en" class="form-control"
                                                                   value="{{ old('name_en') }}">
                                                        </div>

                                                        <div class="form-group">
                                                            <label>@lang('site.code')</label>
                                                            <input type="text" name="code" class="form-control"
                                                                   value="{{ old('code') }}">
                                                        </div>


                                                        <div class="form-group">
                                                            <label>@lang('site.phone')</label>
                                                            <div id="result">
                                                                <input type="text" name="mobile_ex" class="form-control"

                                                                       type="tel" id="phone"
                                                                       value="{{old('phone') }}   "
                                                                >
                                                                <span id="valid-msg" class="hide">✓ Valid</span>
                                                                <span id="error-msg" class="hide"></span>
                                                            </div>
                                                        </div>

                                                        <div class="form-group">
                                                            <label>@lang('site.key')</label>
                                                            <input type="text" name="call_key" class="form-control">
                                                        </div>

                                                        <div class="form-group">
                                                            <label>@lang('site.code')</label>
                                                            <input type="text" name="iso3" class="form-control">
                                                        </div>

                                                        <br>
                                                        <div class="form-group">
                                                            <button type="button" class="btn btn-warning mr-1"
                                                                    onclick="history.back();">
                                                                <i class="fa fa-backward"></i> @lang('site.back')
                                                            </button>
                                                            <button type="submit" class="btn btn-primary"><i
                                                                    class="fa fa-plus"></i>
                                                                @lang('site.add')</button>
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

