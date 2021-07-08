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
                                <span>@lang('site.add')  @lang('site.customers')</span>
                            </h5>
                        </div>
                        <div class="col s12 m6 l6 right-align-md">
                            <ol class="breadcrumbs mb-0">
                                <li class="breadcrumb-item"><a

                                        href="{{route('dashboard.welcome') }}">@lang('site.dashboard')</a>
                                </li>

                                <li class="breadcrumb-item"><a
                                        href="{{ route('dashboard.customers.index') }}"> @lang('site.customers') </a>
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
                                                    <form action="{{ route('dashboard.customers.store') }}"
                                                          method="post" enctype="multipart/form-data">

                                                        {{ csrf_field() }}
                                                        {{ method_field('post') }}


                                                        <div class="form-group">
                                                            <label>@lang('site.first_name')</label>
                                                            <input type="text" name="first_name" class="form-control"
                                                                   value="{{ old('first_name') }}">
                                                        </div>
                                                        <div class="form-group">
                                                            <label>@lang('site.last_name')</label>
                                                            <input type="text" name="last_name" class="form-control"
                                                                   value="{{ old('last_name') }}">
                                                        </div>

                                                        <div class="form-group">
                                                            <label>@lang('site.user_name')</label>
                                                            <input type="text" name="name" class="form-control"
                                                                   value="{{ old('name') }}">
                                                        </div>
                                                        <div class="form-group">
                                                            <label>@lang('site.email')</label>
                                                            <input type="email" name="email" class="form-control"
                                                                   value="{{ old('email') }}">
                                                        </div>

                                                        <div class="form-group">
                                                            <label>@lang('site.company')</label>
                                                            <input type="text" name="company_name" class="form-control"
                                                                   value="{{ old('company_name') }}">
                                                        </div>

                                                        <div class="form-group">
                                                            <label>@lang('site.phone')</label>
                                                            <div id="result">
                                                                <input type="text" name="mobile" class="form-control"

                                                                       type="tel" id="phone"
                                                                       value="{{old('phone') }}   "
                                                                >
                                                                <span id="valid-msg" class="hide">✓ Valid</span>
                                                                <span id="error-msg" class="hide"></span>
                                                            </div>
                                                        </div>

                                                        <div class="form-group">
                                                            <label>@lang('site.phone2')</label>
                                                            <div id="result">
                                                                <input type="text" name="emergency_mobile"
                                                                       class="form-control"

                                                                       type="tel" id="phone"
                                                                       value="{{old('phone') }}   "
                                                                >
                                                                <span id="valid-msg" class="hide">✓ Valid</span>
                                                                <span id="error-msg" class="hide"></span>
                                                            </div>
                                                        </div>

                                                        <div class="form-group">
                                                            <label>@lang('site.password')</label>
                                                            <input type="password" name="password" class="form-control">
                                                        </div>

                                                        <div class="form-group">
                                                            <label>@lang('site.password_confirmation')</label>
                                                            <input type="password" name="password_confirmation"
                                                                   class="form-control">
                                                        </div>

                                                        <div class="form-group">
                                                            <label>@lang('site.date')</label>
                                                            <input type="date" name="birth_date"
                                                                   class="form-control date">
                                                        </div>
                                                        <div class="form-group">
                                                            <label>@lang('site.address')</label>
                                                            <input type="text" name="address" class="form-control">
                                                        </div>

                                                        <div class="form-group">
                                                            <label>@lang('site.countries')</label>
                                                            <select name="country_id" class="form-control select2">
                                                                <option value="">@lang('site.select2')</option>
                                                                @foreach ( $countries as $key=>$country)
                                                                    <option
                                                                        value="{{$key }}" {{ old('country_id') == $key? 'selected' : '' }}>
                                                                        {{$country }}
                                                                    </option>
                                                                @endforeach
                                                            </select>
                                                        </div>

                                                        <div class="form-group">
                                                            <label>@lang('site.cities')</label>
                                                            <select name="city_id" class="form-control select2">
                                                                <option value="">@lang('site.select3')</option>
                                                                @foreach ( $cities as $key=>$city)
                                                                    <option
                                                                        value="{{$key }}" {{ old('city_id') == $key? 'selected' : '' }}>
                                                                        {{$city }}
                                                                    </option>
                                                                @endforeach
                                                            </select>
                                                        </div>


                                                        <div class="form-group">
                                                            <label>@lang('site.image')</label>
                                                            <input type="file" name="photo_file"
                                                                   class="form-control">
                                                        </div>

                                                        <div class="form-group">
                                                            <label>@lang('site.personal_file')</label>
                                                            <input type="file" name="personal_file"
                                                                   class="form-control">
                                                        </div>

                                                        <div class="form-group">
                                                            <label>@lang('site.company_file')</label>
                                                            <input type="file" name="company_file"
                                                                   class="form-control">
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

