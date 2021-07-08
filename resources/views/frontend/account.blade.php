@extends('frontend.master')

@section('content')

    <div class="subHeader">
        <div class="container">
            <div class="subHeader__flex">
                <div class="subHeader__content">
                    <h2 class="subHeader__title">My Account</h2>
                </div>
            </div>
        </div>
    </div>


    <div class="account">
        <div class="container">
            <a href="{{route('showprofile')}}" class="account__content text-center">
                <i class="fas fa-user account__icon"></i>
                <h4 class="account__title">Personal data</h4>
            </a>
            <a href="{{route('privacy')}}" class="account__content text-center">
                <i class="fas fa-lock account__icon"></i>
                <h4 class="account__title">@lang('site.Privacy and security settings')</h4>
            </a>
            <a href="notification.html" class="account__content text-center">
                <i class="fas fa-bell account__icon"></i>
                <h4 class="account__title">Account notification</h4>
            </a>
            <a href="settings.html" class="account__content text-center">
                <i class="fas fa-cog account__icon"></i>
                <h4 class="account__title">Preferences and settings</h4>
            </a>
        </div>
    </div>

@endsection
