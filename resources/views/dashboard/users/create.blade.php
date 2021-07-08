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
                            <h5 class="breadcrumbs-title mt-0 mb-0"><span>@lang('site.add')  @lang('site.users')</span>
                            </h5>
                        </div>
                        <div class="col s12 m6 l6 right-align-md">
                            <ol class="breadcrumbs mb-0">
                                <li class="breadcrumb-item"><a

                                        href="{{route('dashboard.welcome') }}">@lang('site.dashboard')</a>
                                </li>

                                <li class="breadcrumb-item"><a
                                        href="{{ route('dashboard.users.index') }}"> @lang('site.users') </a>
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

                                                    <form action="{{ route('dashboard.users.store') }}" method="post"
                                                          enctype="multipart/form-data">

                                                        {{ csrf_field() }}
                                                        {{ method_field('post') }}
                                                        <input id="type" hidden type="text" name="type" value="Admin"
                                                               required>


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
                                                            <label>@lang('site.password')</label>
                                                            <input type="password" name="password" class="form-control">
                                                        </div>

                                                        <div class="form-group">
                                                            <label>@lang('site.password_confirmation')</label>
                                                            <input type="password" name="password_confirmation"
                                                                   class="form-control">
                                                        </div>
                                                        <div class="form-group">



                                                                <label>@lang('site.image')</label>
                                                                <input type="file" name="image" class="form-control"
                                                                       value="{{ old('image') }}">


                                                        </div>

                                                        @if (auth()->user()->hasPermission('update_roles'))
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
                                                        @else
                                                        @endif
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
