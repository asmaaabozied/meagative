


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
                            <h5 class="breadcrumbs-title mt-0 mb-0"><span>@lang('site.edit')  @lang('site.customers')</span>
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


                                                    <form
                                                        action="{{ route('dashboard.customers.update', $customer->id) }}"
                                                        method="post"
                                                        enctype="multipart/form-data">

                                                        {{ csrf_field() }}
                                                        {{ method_field('put') }}


                                                        <div class="row">

                                                            <div class="col-lg-6">
                                                                <label>@lang('site.first_name')</label>
                                                                <input type="text" name="first_name"
                                                                       class="form-control"
                                                                       value="{{$customer->first_name }}">
                                                            </div>
                                                            <div class="col-lg-6">
                                                                <label>@lang('site.last_name')</label>
                                                                <input type="text" name="last_name" class="form-control"
                                                                       value="{{$customer->last_name }}">
                                                            </div>

                                                        </div>
                                                        <div class="row">

                                                            <div class="col-lg-6">
                                                                <label>@lang('site.user_name')</label>
                                                                <input type="text" name="name" class="form-control"
                                                                       value="{{$customer->name }}">
                                                            </div>
                                                            <div class="form-group">
                                                                <label>@lang('site.email')</label>
                                                                <input type="email" name="email" class="form-control"
                                                                       value="{{$customer->customeremail->first()->email  ?? ''}}">
                                                            </div>

                                                            <div class="col-lg-6">
                                                                <label>@lang('site.company')</label>
                                                                <input type="text" name="company_name"
                                                                       class="form-control"
                                                                       value="{{$customer->company_name }}">
                                                            </div>
                                                        </div>


                                                        <div class="row">

                                                            <div class="col-lg-6">
                                                                <label>@lang('site.phone')</label>
                                                                <div id="result">
                                                                    <input type="text" name="mobile"
                                                                           class="form-control"
                                                                           value="{{$customer->mobile }}"

                                                                           type="tel" id="phone"
                                                                           value="{{old('phone') }}   "
                                                                    >
                                                                    <span id="valid-msg" class="hide">✓ Valid</span>
                                                                    <span id="error-msg" class="hide"></span>
                                                                </div>
                                                            </div>

                                                            <div class="col-lg-6">
                                                                <label>@lang('site.phone2')</label>
                                                                <div id="result">
                                                                    <input type="text" name="emergency_mobile"
                                                                           class="form-control"
                                                                           value="{{$customer->emergency_mobile }}"

                                                                           type="tel" id="phone"
                                                                           value="{{old('phone') }}   "
                                                                    >
                                                                    <span id="valid-msg" class="hide">✓ Valid</span>
                                                                    <span id="error-msg" class="hide"></span>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div class="row">

                                                            <div class="col-lg-6">
                                                                <label>@lang('site.password')</label>
                                                                <input type="password" name="password"
                                                                       class="form-control">
                                                            </div>

                                                            <div class="col-lg-6">
                                                                <label>@lang('site.password_confirmation')</label>
                                                                <input type="password" name="password_confirmation"
                                                                       class="form-control">
                                                            </div>
                                                        </div>

                                                        <div class="row">

                                                            <div class="col-lg-6">
                                                                <label>@lang('site.date')</label>
                                                                <input type="text" name="birth_date"
                                                                       class="form-control date"
                                                                       value="{{$customer->birth_date }}">
                                                            </div>
                                                            <div class="col-lg-6">
                                                                <label>@lang('site.address')</label>
                                                                <input type="text" name="address" class="form-control"
                                                                       value="{{$customer->address }}">
                                                            </div>
                                                        </div>


                                                        <div class="row">

                                                            <div class="col-lg-6">
                                                                <label>@lang('site.countries')</label>
                                                                <select name="country_id" class="form-control select2">

                                                                    @foreach ( $countries as $key=>$country)
                                                                        <option
                                                                            value="{{$key }}" {{ $customer->country_id ? 'selected' : '' }}>
                                                                            {{$country }}
                                                                        </option>
                                                                    @endforeach
                                                                </select>
                                                            </div>

                                                            <div class="col-lg-6">
                                                                <label>@lang('site.cities')</label>
                                                                <select name="city_id" class="form-control select2">

                                                                    @foreach ( $cities as $key=>$city)
                                                                        <option
                                                                            value="{{$key }}" {{ $customer->city_id ? 'selected' : '' }}>
                                                                            {{$city }}
                                                                        </option>
                                                                    @endforeach
                                                                </select>
                                                            </div>
                                                        </div>

                                                        <div class="row">
                                                            <div class="col-lg-6">
                                                                <a class="mr-2" href="#">
                                                                    <img src="{{asset('uploads/'. $customer->photo_file)}}"
                                                                         alt="users avatar" class="z-depth-4 circle" height="100" width="100">
                                                                </a>
                                                            </div>
                                                            <div class="col-lg-6">
                                                                <label>@lang('site.image')</label>
                                                                <input type="file" name="photo_file"
                                                                       class="form-control">
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-lg-6">
                                                                <a class="mr-2" href="#">
                                                                    <img src="{{asset('uploads/'. $customer->personal_file)}}"
                                                                         alt="users avatar" class="z-depth-4 circle" height="100" width="100">
                                                                </a>
                                                            </div>

                                                            <div class="col-lg-6">
                                                            <label>@lang('site.personal_file')</label>
                                                            <input type="file" name="personal_file"
                                                                   class="form-control">
                                                        </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-lg-6">
                                                                <a class="mr-2" href="#">
                                                                    <img src="{{asset('uploads/'. $customer->company_file)}}"
                                                                         alt="users avatar" class="z-depth-4 circle" height="100" width="100">
                                                                </a>
                                                            </div>
                                                            <div class="col-lg-6">

                                                            <label>@lang('site.company_file')</label>
                                                            <input type="file" name="company_file"
                                                                   class="form-control">
                                                        </div>
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


