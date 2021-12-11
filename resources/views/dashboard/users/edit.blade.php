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


                            <form action="{{ route('dashboard.users.update', $user->id) }}"
                                  method="post"
                                  enctype="multipart/form-data">

                                {{ csrf_field() }}
                                {{ method_field('put') }}
                                <input id="type" hidden type="text" name="type" value="Admin"
                                       required>
                                <div class="row form-group">
                                    <label for="name" class="col-sm-3 col-form-label input-label">@lang('site.image')</label>
                                    <div class="col-sm-9">
                                        <div class="d-flex align-items-center">
                                            <label class="avatar avatar-xxl profile-cover-avatar m-0" for="edit_img">
                                                <img id="avatarImg" class="avatar-img" src="{{asset('uploads/'.$user->image)}}" alt="Profile Image">
                                                <input type="file" id="edit_img">
                                                <span class="avatar-edit">
															<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-edit-2 avatar-uploader-icon shadow-soft"><path d="M17 3a2.828 2.828 0 1 1 4 4L7.5 20.5 2 22l1.5-5.5L17 3z"></path></svg>
														</span>
                                            </label>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">

                                        <div class="form-group">
                                            <label>@lang('site.full_name_ar')</label>
                                            <input type="text" name="full_name_ar" class="form-control"
                                                   value="{{ $user->full_name_ar }}">
                                        </div>
                                        <div class="form-group">
                                            <label>@lang('site.full_name_en')</label>
                                            <input type="text" name="full_name_en" class="form-control"
                                                   value="{{ $user->full_name_en }}">
                                        </div>
                                        <div class="form-group">
                                            <label>@lang('site.phone')</label>
                                            <div id="result">
                                                <input type="text" name="mobile" class="form-control"

                                                       type="tel" id="phone"
                                                       value="{{ $user->mobile }}"
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
                                                   value="{{ $user->user_name }}">
                                        </div>


                                        <div class="form-group">
                                            <label>@lang('site.email')</label>
                                            <input type="email" name="email" class="form-control"
                                                   value="{{ $user->email }}">
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
                                                        value="{{ $role->id }}" {{ $user->hasRole($role->name) ? 'selected' : '' }}>
                                                        {{ $role->name }}</option>
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
