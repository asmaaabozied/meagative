@extends('layouts.dashboard.app')

@section('content')
    <div class="page-wrapper" style="min-height: 422px;" data-select2-id="16">
        <div class="content container-fluid" data-select2-id="15">

            <!-- Page Header -->
            <div class="page-header">
                <div class="row">
                    <div class="col-sm-12">
                        <h3 class="page-title">@lang('site.users')</h3>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a
                                    href="{{route('dashboard.welcome') }}">@lang('site.dashboard')</li>
                            <li class="breadcrumb-item"><a
                                    hhref="{{ route('dashboard.users.index') }}"> @lang('site.users') </a></li>
                            <li class="breadcrumb-item active"><a> @lang('site.add') </a></li>
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

                            <form action="{{ route('dashboard.users.store') }}" method="post"
                                  enctype="multipart/form-data">

                                {{ csrf_field() }}
                                {{ method_field('post') }}
                                <input id="type" hidden type="text" name="type" value="Admin"
                                       required>
                                <div class="row">
                                    <div class="col-md-6">

                                        <div class="form-group">
                                            <label>@lang('site.full_name_ar')</label>
                                            <input type="text" name="full_name_ar" class="form-control"
                                                   value="{{ old('full_name_ar') }}">
                                        </div>
                                        <div class="form-group">
                                            <label>@lang('site.full_name_en')</label>
                                            <input type="text" name="full_name_en" class="form-control"
                                                   value="{{ old('full_name_en') }}">
                                        </div>
                                        <div class="form-group">
                                            <label>@lang('site.phone')</label>
                                            <div id="result">
                                                <input type="text" name="mobile" class="form-control"

                                                       type="tel" id="phone"
                                                       value="{{old('phone') }}   "
                                                >

                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label>@lang('site.password_confirmation')</label>
                                            <input type="password" name="password_confirmation"
                                                   class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>@lang('site.user_name')</label>
                                            <input type="text" name="username" class="form-control"
                                                   value="{{ old('name') }}">
                                        </div>


                                        <div class="form-group">
                                            <label>@lang('site.email')</label>
                                            <input type="email" name="email" class="form-control"
                                                   value="{{ old('email') }}">
                                        </div>


                                        <div class="form-group">
                                            <label>@lang('site.password')</label>
                                            <input type="password" name="password" class="form-control">
                                        </div>



                                    </div>
                                </div>

                                <h4 class="card-title mt-4">@lang('site.image')@lang('site.roles')</h4>

                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">


                                            <label>@lang('site.image')</label>
                                            <input type="file" name="image" class="form-control"
                                                   value="{{ old('image') }}">


                                        </div>
                                        <div class="form-group">
                                            <label>@lang('site.roles')</label>
                                            <select name="roles[]" class="form-control select2"
                                                    multiple>
                                            <!-- <option value="">@lang('site.all_roles')</option> -->
                                                @foreach ($roles as $role)
                                                    <option
                                                        value="{{ $role->id }}" {{ old('role_id') == $role->id ? 'selected' : '' }}>
                                                        {{ $role->name }}
                                                    </option>
                                                @endforeach
                                            </select>
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
                                        @lang('site.add')</button>
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
