@extends('layouts.dashboard.app')

@section('content')
    <div class="page-wrapper" style="min-height: 422px;" data-select2-id="16">
        <div class="content container-fluid" data-select2-id="15">

            <!-- Page Header -->
            <div class="page-header">
                <div class="row">
                    <div class="col-sm-12">
                        <h3 class="page-title">@lang('site.citizens')</h3>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a
                                    href="{{route('dashboard.welcome') }}">@lang('site.dashboard')</li>
                            <li class="breadcrumb-item"><a
                                    hhref="{{ route('dashboard.citizens.index') }}"> @lang('site.citizens') </a></li>
                            <li class="breadcrumb-item active"><a> @lang('site.edit') </a></li>
                        </ul>
                    </div>
                </div>
            </div>
            <!-- /Page Header -->

            <div class="row" data-select2-id="14">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">Basic Info</h4>
                            @include('partials._errors')


                                <form
                                    action="{{ route('dashboard.citizens.update', $citizen->id) }}"
                                    method="post"
                                    enctype="multipart/form-data">

                                    {{ csrf_field() }}
                                    {{ method_field('put') }}

                                <div class="row">
                                    <div class="col-md-6">

                                        <div class="form-group">
                                            <label>@lang('site.first_name_ar')</label>
                                            <input type="text" name="first_name_ar" class="form-control"
                                                   value="{{ $citizen->first_name_ar }}">
                                        </div>
                                        <div class="form-group">
                                            <label>@lang('site.second_name_ar')</label>
                                            <input type="text" name="second_name_ar" class="form-control"
                                                   value="{{ $citizen->second_name_ar }}">
                                        </div>

                                        <div class="form-group">
                                            <label>@lang('site.third_name_ar')</label>
                                            <input type="text" name="third_name_ar" class="form-control"
                                                   value="{{ $citizen->third_name_ar }}">
                                        </div>
                                        <div class="form-group">
                                            <label>@lang('site.fourth_name_ar')</label>
                                            <input type="text" name="fourth_name_ar" class="form-control"
                                                   value="{{ $citizen->fourth_name_ar }}">
                                        </div>


                                        <div class="form-group">
                                            <label>@lang('site.gender')</label>
                                            <select name="gender" class="form-control select2"
                                            >
                                                <option value="MALE">MALE</option><option value="FEMALE">FEMALE</option>

                                            </select>
                                        </div>

                                        <div class="form-group">
                                            <label>@lang('site.marital_status')</label>
                                            <select name="marital_status" class="form-control select2"
                                            >
                                                <option value="MARRIED">MARRIED</option>
                                                <option value="SINGLE">SINGLE</option>
                                                <option value="DIVORCED">DIVORCED</option>
                                                <option value="WIDOWED">WIDOWED</option>

                                            </select>
                                        </div>

                                        <div class="form-group">
                                            <label>@lang('site.birth_date')</label>
                                            <div id="result">
                                                <input type="date"   value="{{ $citizen->birth_date }}" name="birth_date" class="form-control date">


                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label>@lang('site.place_of_birth')</label>
                                            <input type="text" name="place_of_birth"
                                                   class="form-control" value="{{ $citizen->place_of_birth }}">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>@lang('site.first_name_en')</label>
                                            <input type="text" name="first_name_en" class="form-control"
                                                   value="{{ $citizen->first_name_en }}">
                                        </div>
                                        <div class="form-group">
                                            <label>@lang('site.second_name_en')</label>
                                            <input type="text" name="second_name_en" class="form-control"
                                                   value="{{ $citizen->second_name_en }}">
                                        </div>

                                        <div class="form-group">
                                            <label>@lang('site.third_name_en')</label>
                                            <input type="text" name="third_name_en" class="form-control"
                                                   value="{{ $citizen->third_name_en }}">
                                        </div>
                                        <div class="form-group">
                                            <label>@lang('site.fourth_name_en')</label>
                                            <input type="text" name="fourth_name_en" class="form-control"
                                                   value="{{ $citizen->fourth_name_en }}">
                                        </div>


                                        <div class="form-group">
                                            <label>@lang('site.mother_name_ar')</label>
                                            <input type="text" name="mother_name_ar" class="form-control" value="{{ $citizen->mother_name_ar }}">
                                        </div>
                                        <div class="form-group">
                                            <label>@lang('site.mother_name_en')</label>
                                            <input type="text" name="mother_name_en" class="form-control"  value="{{ $citizen->mother_name_en }}">
                                        </div>
                                        <div class="form-group">
                                            <label>@lang('site.phone')</label>
                                            <input type="text" name="phone" class="form-control"  value="{{ $citizen->phone }}">
                                        </div>

                                        <div class="form-group">
                                            <label>@lang('site.jobs')</label>
                                            <select name="job_id" class="form-control select2"
                                            >
                                            <!-- <option value="">@lang('site.jobs')</option> -->
                                                @foreach ($jobs as $job)
                                                    <option
                                                        value="{{ $job->id }}" {{ $citizen->job_id == $job->id ? 'selected' : '' }}>
                                                        {{ $job->name_en }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>

                                    </div>
                                </div>

                                    <h4 class="card-title mt-4">@lang('site.image')</h4>

                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">


                                                <label>@lang('site.image')</label>
                                                <input type="file" name="image" class="form-control"
                                                       value="{{ old('image') }}">


                                            </div>


                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">


                                                <label>@lang('site.file')</label>
                                                <input type="file" name="file_name" class="form-control"
                                                       value="{{ old('file_name') }}">


                                            </div>


                                        </div>

                                    </div>

                                    <h4 class="card-title mt-4">@lang('site.gurantors')</h4>
                                    <div class="row">

                                        <div class="col-lg-4">

                                            <label>@lang('site.fullnamefirst')</label>
                                            <input type="text" name="fullname[]" class="form-control"
                                                   value="{{ old('fullname') }}">


                                        </div>


                                        <div class="col-lg-4">
                                            <label>@lang('site.card_number')</label>
                                            <input type="text" name="card_number[]" class="form-control"
                                                   value="{{ old('card_number') }}">

                                        </div>
                                        <div class="col-lg-4">

                                            <label>@lang('site.phone')</label>
                                            <input type="text" name="phone[]" class="form-control"
                                                   value="{{ old('phone') }}">

                                        </div>
                                    </div>
                                    <div class="row">

                                        <div class="col-lg-4">

                                            <label>@lang('site.fullnamesecond')</label>
                                            <input type="text" name="fullname[]" class="form-control"
                                                   value="{{ old('fullname') }}">


                                        </div>


                                        <div class="col-lg-4">
                                            <label>@lang('site.card_number')</label>
                                            <input type="text" name="card_number[]" class="form-control"
                                                   value="{{ old('card_number') }}">

                                        </div>
                                        <div class="col-lg-4">

                                            <label>@lang('site.phone')</label>
                                            <input type="text" name="phone[]" class="form-control"
                                                   value="{{ old('phone') }}">

                                        </div>
                                    </div>


                                    <h4 class="card-title mt-4">@lang('site.addresses')</h4>
                                    <div class="row">

                                        <div class="col-lg-4">

                                            <label>@lang('site.address')</label>
                                            <input type="text" name="address1" class="form-control"
                                                   value="{{ old('address1') }}">


                                        </div>


                                        <div class="col-lg-4">
                                            <label>@lang('site.street')</label>
                                            <input type="text" name="street" class="form-control"
                                                   value="{{ old('street') }}">

                                        </div>
                                        <div class="col-lg-4">

                                            <label>@lang('site.address2')</label>
                                            <input type="text" name="address2" class="form-control"
                                                   value="{{ old('address2') }}">

                                        </div>
                                    </div>
                                    <div class="row">

                                        <div class="col-lg-4">

                                            <label>@lang('site.code')</label>
                                            <input type="text" name="code" class="form-control"
                                                   value="{{ old('code') }}">


                                        </div>


                                        <div class="col-lg-4">
                                            <label>@lang('site.countries')</label>
                                            <select name="country_id" class="form-control select2"
                                            >

                                                @foreach ($countries as $country)
                                                    <option
                                                        value="{{ $country->id }}" {{ old('country_id') == $country->id ? 'selected' : '' }}>
                                                        {{ $country->name }}
                                                    </option>
                                                @endforeach
                                            </select>

                                        </div>
                                        <div class="col-lg-4">
                                            <label>@lang('site.cities')</label>
                                            <select name="city_id" class="form-control select2">



                                                @foreach ($cities as $city)
                                                    <option
                                                        value="{{ $city->id }}" {{ old('city_id') == $city->id ? 'selected' : '' }}>
                                                        {{ $city->name }}
                                                    </option>
                                                @endforeach
                                            </select>

                                        </div>
                                    </div>




                                <div class="text-end mt-4">
                                    <div class="form-group">
                                        <button type="button" class="btn btn-warning mr-1"
                                                onclick="history.back();">
                                            <i class="fa fa-backward"></i> @lang('site.back')
                                        </button>
                                        <button type="submit" class="btn btn-primary"><i
                                                class="fa fa-plus"></i>
                                            @lang('site.edit')</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
