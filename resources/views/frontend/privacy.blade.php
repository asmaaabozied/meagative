@extends('frontend.master')

@section('content')

    <div class="subHeader">
        <div class="container">
            <div class="subHeader__flex">
                <div class="subHeader__content">
                    <h2 class="subHeader__title">@lang('site.Privacy and security settings')</h2>
                </div>
            </div>
        </div>
    </div>

    <div class="privacy">
        <div class="container">

{{--            @include('partials._errors')--}}


            <form
                action="{{ route('privacy.update', auth()->guard('customer')->loginUsingId(1)->id) }}"
                method="post" class="privacy__form"
                enctype="multipart/form-data">

                {{ csrf_field() }}
                {{ method_field('put') }}

                <div class="privacy__formContent">
{{--                    <label class="site--label">@lang('site.Passwords')</label>--}}
                    <input type="password" name="password" class="privacy__input privacy__pass site--input" placeholder="Current Password" required="">

                    <input type="password" name="newpassword" class="privacy__input privacy__newPass site--input" placeholder="new Password" required="">


                    <input type="password" name="con-password" class="privacy__input privacy__conPass site--input" placeholder="confirm password" required="">
                    @if ($errors->any())
                        <ul>{!! implode('', $errors->all('<li style="color:green">:message</li>')) !!}</ul>
                    @endif
                </div>
                <div class="privacy__formContent">
                    <input type="submit"  class="privacy__input privacy__id site--input site-btn site-btnMr" value="@lang('site.Password update')">
                </div>
            </form>
        </div>
    </div>



@endsection
