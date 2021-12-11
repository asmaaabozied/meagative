
@extends('layouts.dashboard.app')

@section('content')
    <div class="page-wrapper" style="min-height: 422px;" data-select2-id="16">
        <div class="content container-fluid" data-select2-id="15">

            <!-- Page Header -->
            <div class="page-header">
                <div class="row">
                    <div class="col-sm-12">
                        <h3 class="page-title">@lang('site.cities')</h3>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a
                                    href="{{route('dashboard.welcome') }}">@lang('site.dashboard')</li>
                            <li class="breadcrumb-item"><a
                                    hhref="{{ route('dashboard.cities.index') }}"> @lang('site.cities') </a></li>
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
                            <h4 class="card-title">@lang('site.cities')</h4>
                            @include('partials._errors')

                            <form action="{{ route('dashboard.cities.update', $city->id) }}"
                                  method="post"
                                  enctype="multipart/form-data">

                                {{ csrf_field() }}
                                {{ method_field('put') }}

                                <div class="row">
                                    <div class="col-md-6">

                                        <div class="form-group">
                                            <label>@lang('site.name_ar')</label>
                                            <input type="text" name="name_ar" class="form-control"
                                                   value="{{$city->name_ar}}">
                                        </div>
                                        <div class="form-group">
                                            <label>@lang('site.name_en')</label>
                                            <input type="text" name="name_en" class="form-control"
                                                   value="{{$city->name_en}}">
                                        </div>


                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>@lang('site.countries')</label>
                                            <select name="country_id" class="form-control select2">
                                                <option value="">@lang('site.select2')</option>
                                                @foreach ($countries as $key=>$role)
                                                    <option
                                                        value="{{$key}}" {{ $city->country_id ? 'selected' : '' }}>
                                                        {{ $role}}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>

                                        <div class="form-group">
                                            <label>@lang('site.code')</label>
                                            <input type="text" name="code" class="form-control" value="{{$city->code}}">
                                        </div>


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


