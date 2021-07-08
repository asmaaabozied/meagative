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
                            <h5 class="breadcrumbs-title mt-0 mb-0"><span>@lang('site.edit')  @lang('site.users')</span>
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
                                <li class="breadcrumb-item active"><a> @lang('site.edit') </a>
                                </li>

                            </ol>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col s12">
                <div class="container">

                    <div class="card">
                        <div class="card-content">
                            <!-- <div class="card-body"> -->
                            <ul class="tabs mb-2 row">
                                <li class="tab">
                                    <a class="display-flex align-items-center active" id="account-tab" href="#account">
                                        <i class="material-icons mr-1">person_outline</i><span>{{ $user->username }}</span>
                                    </a>
                                </li>

                            </ul>
                            <div class="divider mb-3"></div>
                            @include('partials._errors')

                            <form action="{{ route('dashboard.users.update', $user->id) }}"
                                  method="post"
                                  enctype="multipart/form-data">

                                {{ csrf_field() }}
                                {{ method_field('put') }}
                                <div class="row">
                                    <div class="col s12 active" id="account" style="display: block;">
                                        <!-- users edit media object start -->
                                        <div class="media display-flex align-items-center mb-2">
                                            <a class="mr-2" href="#">
                                                <img src="{{asset('uploads/'.$user->image)}}"
                                                     alt="users avatar" class="z-depth-4 circle" height="100" width="100">
                                            </a>
                                            <div class="media-body">
                                                <h5 class="media-heading mt-0">{{ $user->username }}</h5>
{{--                                                <div class="user-edit-btns display-flex">--}}
{{--                                                    <a href="#" class="btn-small indigo">Change</a>--}}
{{--                                                    <a href="#" class="btn-small btn-light-pink">Reset</a>--}}
{{--                                                </div>--}}
                                            </div>
                                        </div>
                                        <!-- users edit media object ends -->
                                        <!-- users edit account form start -->
                                        <div class="row">
                                            <div class="col s12 m6">
                                                <div class="row">

                                                    <div class="col s12 input-field">
                                                        <input id="username" name="name" type="text" class="validate"
                                                               value="{{ $user->username }}" data-error=".errorTxt1">
                                                        <label for="username"
                                                               class="active">@lang('site.user_name')</label>
                                                        <small class="errorTxt1"></small>
                                                    </div>


                                                    <div class="col s12 input-field">
                                                        <input id="name" name="full_name_ar" type="text"
                                                               class="validate" value="{{ $user->full_name_ar }}"
                                                               data-error=".errorTxt2">
                                                        <label for="name"
                                                               class="active">@lang('site.full_name_ar')</label>
                                                        <small class="errorTxt2"></small>
                                                    </div>
                                                    <div class="col s12 input-field">
                                                        <input id="text" name="full_name_en" type="text"
                                                               class="validate" value="{{ $user->full_name_en }}"
                                                               data-error=".errorTxt3">
                                                        <label for="full_name_en"
                                                               class="active">@lang('site.full_name_en')</label>
                                                        <small class="errorTxt3"></small>
                                                    </div>

                                                    <div class="col s12 input-field">
                                                        <input id="password" name="password" type="password" class="validate"
                                                               value="">
                                                        <label for="email">@lang('site.password')</label>
                                                    </div>

                                                    <div class="form-group">



                                                        <label>@lang('site.image')</label>
                                                        <input type="file" name="image" class="form-control"
                                                               value="{{ old('image') }}">


                                                    </div>

                                                </div>
                                            </div>
                                            <div class="col s12 m6">
                                                <div class="row">
                                                    <div class="col s12 input-field">
                                                        <div class="select-wrapper">

                                                            <ul id="select-options-8d7ba115-cb79-bb8a-c667-40a84498864b"
                                                                class="dropdown-content select-dropdown"
                                                                tabindex="0" style="">

                                                            </ul>
                                                            <svg class="caret" height="24" viewBox="0 0 24 24"
                                                                 width="24" xmlns="http://www.w3.org/2000/svg">
                                                                <path d="M7 10l5 5 5-5z"></path>
                                                                <path d="M0 0h24v24H0z" fill="none">

                                                                </path>
                                                            </svg>
                                                            <select tabindex="-1" name="roles[]"
                                                                    class="form-control select2"
                                                                    multiple>
                                                                @foreach ($roles as $role)
                                                                    <option
                                                                        value="{{ $role->id }}" {{ $user->hasRole($role->name) ? 'selected' : '' }}>
                                                                        {{ $role->name }}</option>
                                                                @endforeach
                                                            </select></div>
                                                        <label>@lang('site.roles')</label>
                                                    </div>

                                                    <div class="col s12 input-field">
                                                        <input id="email" name="email" type="text" class="validate"
                                                               value="{{ $user->email }}">
                                                        <label for="email">@lang('site.email')</label>
                                                    </div>

                                                    <div class="col s12 input-field">
                                                        <input id="mobile" name="mobile" type="text" class="validate"
                                                               value="{{ $user->mobile }}">
                                                        <label for="company">@lang('site.phone')</label>
                                                    </div>



                                                    <div class="col s12 input-field">
                                                        <input id="password" name="password_confirmation" type="password" class="validate"
                                                               value="">
                                                        <label for="email">@lang('site.password_confirmation')</label>
                                                    </div>


                                                    <div class="col s12 display-flex justify-content-end mt-3">
                                                        <button type="submit" class="btn indigo">
                                                            <i class="fa fa-edit"></i>
                                                                @lang('site.edit')
                                                            </button>
                                                            <button type="button" class="btn btn-light" onclick="history.back();">@lang('site.back')</button>
                                                        </div>


                                                </div>
                                                <!-- users edit account form ends -->
                                            </div>
                                        </div>
                                        <!-- </div> -->
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

@endsection
