<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@lang('site.title')</title>
    <!-- Fontawesome -->
    <link rel="stylesheet" href="{{asset('frontend/vendor/fontawesome/css/all.min.css')}}"/>
    <!-- Bootstrap -->

    <link rel="stylesheet" href="{{asset('frontend/vendor/bootstrap/css/bootstrap.min.css')}}"/>

    <!-- Header -->
    @yield('style')
    <link rel="stylesheet" href="{{asset('frontend/css/layout/header.css')}}"/>

    <link rel="stylesheet" href="{{ asset('dashboard_files/plugins/noty/noty.css') }}">

    <script src="{{ asset('dashboard_files/plugins/noty/noty.min.js') }}"></script>

    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet"/>

    <!-- Footer -->
    <link rel="stylesheet" href="{{asset('frontend/css/layout/footer.css')}}"/>
    <!-- Styles -->
    @if (app()->getLocale() == 'en')

        <link rel="stylesheet" href="{{asset('frontend/css/styles.css')}}"/>

@elseif(app()->getLocale() == 'ar')

    <!-- Styles -->
        <link rel="stylesheet" href="{{asset('frontend/css/rtl.css')}}"/>
@endif

<!-- Favicon -->
    <link rel="icon" type="image/x-icon" href="#">
    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
<!--[if lt IE 9]>
    <script src="{{asset('frontend/vendor/html5shiv/html5shiv.min.js')}}"></script>
    <script src="{{asset('frontend/vendor/respond/respond.min.js')}}"></script>
    <![endif]-->

    <style>
        .select2-container--default .select2-selection--single .select2-selection__arrow {
            height: 26px;
            position: absolute;
            top: 8px;
            right: 8px;
            width: 20px;

        }

        .select2-container--default .select2-selection--single {
            width: 570px;
            background-color: #fff;
            border: 1px solid #aaa;
            border-radius: 4px;
            height: 40px;
            padding: 8px;
        }
    </style>
</head>
<body>

<div class="site">

    <!-- Navbar Start -->
    <nav class="nav">
        <div class="container-fluid">
            <div class="content">
                <a href="index.html" class="logo">
                    <img src="{{asset('frontend/images/logo.png')}}" alt="Mega Vents"/>
                </a>
                <form class="nav__form d-lg-none">
                    <div class="nav__formContent">
                        <input type="text" class="nav__search" placeholder="search..."/>
                        <div class="nav__searchIcon">
                            <i class="fas fa-search"></i>
                        </div>
                    </div>
                </form>
                <div class="nav__settings">
                    <div class="nav__options">
                        {{--                        <div class="nav__option">--}}
                        {{--                            <img class="nav__optionImage" src="{{asset('frontend/images/money-flag.png')}}" alt="icon"/>--}}
                        {{--                            <p class="nav__optionText">Saudi riyal</p>--}}
                        {{--                            <i class="nav__optionDown fas fa-angle-down"></i>--}}
                        {{--                        </div>--}}
                        <div class="nav__option">
                            <img class="nav__optionImage" src="{{asset('frontend/images/arabic-flag.png')}}"
                                 alt="icon"/>

                            <p class="nav__optionText" id="language"></p>

                        </div>
                    </div>
                    <div class="nav__icons">
                        <div class="nav__register">
                            @if(auth()->guard('customer')->user())
                                <img src="{{asset('uploads/'.auth()->guard('customer')->user()->photo_file)}}"
                                     width="50px" class="z-depth-0 circle">
                            @else
                                <i class="fas fa-user"></i>
                            @endif
                        </div>
                        <div class="nav__bars">
                            <i class="fas fa-bars"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </nav>
@yield('content')
@include('partials._session')
<!-- Navbar End -->


    <!-- Footer Start -->
    <footer class="footer">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-md-6 col-6">
                    <div class="megavents">
                        <div class="footer__logo">
                            <img src="{{asset('frontend/images/logo.png')}}" alt="Mega Vents')}}"/>
                        </div>
                        <p class="footer__para">Lorem ipsum dolor sit amet consectetur adipisicing elit. unde,
                            doloremque</p>
                        <div class="social_media">
                            <h4 class="footer__socialTitle">Contact us via social media</h4>
                            <div class="footer__social">
                                <a href="#" class="footer__socialSite">
                                    <i class="fab fa-facebook-f"></i>
                                </a>
                                <a href="#" class="footer__socialSite">
                                    <i class="fab fa-twitter"></i>
                                </a>
                                <a href="#" class="footer__socialSite">
                                    <i class="fab fa-instagram"></i>
                                </a>
                                <a href="#" class="footer__socialSite">
                                    <i class="fab fa-linkedin"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-6">
                    <div class="footer__section">
                        <h3 class="footer__title">the society</h3>
                        <ul class="footer__list">
                            <li class="footer__item">
                                <a href="#" class="footer__link">- Diversity and belonging</a>
                            </li>
                            <li class="footer__item">
                                <a href="#" class="footer__link">- Against discrimination</a>
                            </li>
                            <li class="footer__item">
                                <a href="#" class="footer__link">- Accessibility</a>
                            </li>
                            <li class="footer__item">
                                <a href="#" class="footer__link">- Invite friends</a>
                            </li>
                            <li class="footer__item">
                                <a href="#" class="footer__link">- Gift cards</a>
                            </li>
                            <li class="footer__item">
                                <a href="#" class="footer__link">- Contact Us</a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-6">
                    <div class="footer__section">
                        <h3 class="footer__title">Reservations</h3>
                        <ul class="footer__list">
                            <li class="footer__item">
                                <a href="#" class="footer__link">- Events hall reservation</a>
                            </li>
                            <li class="footer__item">
                                <a href="#" class="footer__link">- Book a wedding hall</a>
                            </li>
                            <li class="footer__item">
                                <a href="#" class="footer__link">- Kochat reservation</a>
                            </li>
                            <li class="footer__item">
                                <a href="#" class="footer__link">- Camp reservation</a>
                            </li>
                            <li class="footer__item">
                                <a href="#" class="footer__link">- Service providers</a>
                            </li>
                            <li class="footer__item">
                                <a href="#" class="footer__link">- Party coordinators</a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-6">
                    <div class="footer__section">
                        <h3 class="footer__title">the support</h3>
                        <ul class="footer__list">
                            <li class="footer__item">
                                <a href="#" class="footer__link">- COVID-19 Updates</a>
                            </li>
                            <li class="footer__item">
                                <a href="#" class="footer__link">- Help Center</a>
                            </li>
                            <li class="footer__item">
                                <a href="#" class="footer__link">- Cancellation options</a>
                            </li>
                            <li class="footer__item">
                                <a href="#" class="footer__link">- Neighborhood support</a>
                            </li>
                            <li class="footer__item">
                                <a href="#" class="footer__link">- Trust and safety</a>
                            </li>
                            <li class="footer__item">
                                <a href="#" class="footer__link">- Make a complaint</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>

            <div class="footer__bottom">
                <p class="footer__copyright">  @lang('site.copyright') - <span> <a
                            href="http://dev.wwwnl1-sr9.supercp.com/en"
                            target="_blank">Mega Vents</a></span></p>
            </div>
        </div>
    </footer>
    <!-- Footer End -->
    <!-- search Start -->
@yield('search')
<!-- search End -->
    <!-- Search Start
    <div class="search d-none d-lg-block">
        <form class="search__form">
            <div class="search__content">
                <label for="location">detect location</label>
                <input type="text" id="location" class="form__input" placeholder="Where do you want to go ?"/>
            </div>

            <div class="search__content">
                <label for="starts">Starts from</label>
                <input type="text" id="starts" class="form__input" placeholder="Add a date"/>
            </div>

            <div class="search__content">
                <label for="starts">Ends at</label>
                <input type="text" id="starts" class="form__input" placeholder="Add a date"/>
            </div>

            <div class="search__content">
                <label for="starts">The guests</label>
                <input type="text" id="starts" class="form__input" placeholder="Add guests"/>
            </div>

            <div class="search__content search__icon">
                <i class="fas fa-search"></i>
            </div>
        </form>
        <div class="search__bottom">
            <a href="#" class="search__link">Search for places near you</a>
            <a href="#" class="search__link">View what you recently searched for</a>
        </div>
    </div>
     Search End -->


    <div class="signup" style="display: none;" id="sigups">
        <div class="signup__container">
            <header class="signup__header">
                <h4 class="signup__title">signup</h4>
                <i class="fas fa-times signup__close"></i>
            </header>
            <form action="" class="signup__form">
                <div class="signup__content">
                    <label class="signup__label">@lang('site.country') / Territory</label>

                    <select name="country_id" class="signup__input signup__select js-example-basic-single form-control"
                            id="country_id">

                        @foreach(\App\Models\Country::get()->pluck('name','id') as $key=>$country)
                            <option value="{{$key}} ">{{$country}}</option>

                        @endforeach
                    </select>

                </div>

                <div class="mt-3 input-group input-group-lg">
                    <div class="input-group-prepend">
<span id="phone_key" class="input-group-text">
+20
</span>
                    </div>
                    <input type="text" name="mobile" placeholder="Mobile Number"
                           class="signup__input signup__mobile form-control" id="mobile">

                </div>


                <ul id="signup_errors"></ul>

                <p class="signup__msg">We will call or text you to confirm your number. Standard message and data rates
                    apply</p>
                <input type="submit" value="Continue" class="signup__input signup__submit" id="signup">
            </form>
            <div class="signup__or">or</div>
            <div class="signup__auth">
                <button class="signup__buttons signup__buttonsEmail">
                    <img src="{{asset('frontend/images/home/email.png')}}" alt="icon"/>
                    @lang('site.Register by e-mail')
                </button>

                <button class="signup__buttons">
                    <img src="{{asset('frontend/images/home/gmail.png')}}" alt="icon">

                    <a onclick="loginWithProvider('google');"> @lang('site.Register by google account')</a>
                </button>
                <button class="signup__buttons">
                    <img src="{{asset('frontend/images/home/facebook.png')}}" alt="icon">
                    <a onclick="loginWithProvider('facebook');">@lang('site.Register by facebook account')</a>
                </button>

                <button class="signup__buttons">
                    <img src="{{asset('frontend/images/home/apple.png')}}" alt="icon">

                    <a onclick="loginWithProvider('apple');"> @lang('site.Register by apple account')</a>
                </button>
            </div>

            <div id="authMode">
                <a class="btn btn-block" onclick="logOutFirebase();">Logout</a>
            </div>
            <p class="signup__qus">Do you already have an account? <span class="signup__login">login</span></p>
        </div>
    </div>

    <div class="email" style="display: none;">
        <div class="email__container">
            <header class="email__header">
                <h4 class="email__title"> @lang('site.loginoregister')</h4>
                <i class="fas fa-times email__close"></i>
            </header>
            <form class="email__form">
                {{--//action="{{ route('loginemail') }} id="form" method="post"--}}

                {{--                {{ csrf_field() }}--}}
                {{--                {{ method_field('post') }}--}}
                <input type="email" name="email" placeholder="@lang('site.email')" class="email__input email__email"
                       id="email">
                <ul id="email_errors"></ul>
                <p></p>
                @if ($errors->any())
                    <ul>{!! implode('', $errors->all('<li style="color:green">:message</li>')) !!}</ul>
                @endif
                <input type="submit" value="@lang('site.Continue')" class="email__input email__submit" id="formemail">
            </form>

            <div class="email__auth">
                <button class="email__buttons email__buttonsMobile">
                    <img src="{{asset('frontend/images/home/mobile.png')}}" lt="icon">
                    Register by Mobilea
                </button>
                <button class="email__buttons">
                    <img src="{{asset('frontend/images/home/facebook.png')}}" alt="icon">
                    <a onclick="loginWithProvider('facebook');">@lang('site.Register by facebook account')</a>
                </button>
                <button class="email__buttons">
                    <img src="{{asset('frontend/images/home/gmail.png')}}" alt="icon">
                    <a onclick="loginWithProvider('google');"> @lang('site.Register by google account')</a>
                </button>
                <button class="email__buttons">
                    <img src="{{asset('frontend/images/home/apple.png')}}" alt="icon">
                    <a onclick="loginWithProvider('apple');"> @lang('site.Register by apple account')</a>
                </button>
            </div>
            <div id="authMode">
                <a class="btn btn-block" onclick="logOutFirebase();">@lang('site.logout')</a>
            </div>
        </div>
    </div>

    {{--    <div class="content" style="display: none;" >--}}
    {{--        <div class="email__container">--}}
    {{--            <header class="email__header">--}}
    {{--                <h4 class="email__title"> @lang('site.password')</h4>--}}
    {{--                <i class="fas fa-times email__close"></i>--}}
    {{--            </header>--}}
    {{--            <form  class="email__form" >--}}

    {{--                <input type="password" name="password" placeholder="@lang('site.password')" class="email__input " id="passwords"  >--}}

    {{--                <p></p>--}}
    {{--                @if ($errors->any())--}}
    {{--                    <ul>{!! implode('', $errors->all('<li style="color:green">:message</li>')) !!}</ul>--}}
    {{--                @endif--}}
    {{--                <input type="submit" value="@lang('site.Continue')" class="email__input " id="passwordss">--}}
    {{--            </form>--}}

    {{--        </div>--}}
    {{--    </div>--}}

    <div class="mobileRegister" style="display: none;" id="registercustomers">
        <div class="mobileRegister__container">
            <header class="mobileRegister__header">
                <h4 class="mobileRegister__title">@lang('site.customers')</h4>
                <i class="fas fa-times mobileRegister__close"></i>
            </header>
            <p class="mobileRegister__para">
                @lang('site.add')  @lang('site.customers')
            </p>
            <form class="email__form" id="formregister">
                {{--                {{ csrf_field() }}--}}
                {{--                {{ method_field('post') method="post" }}--}}
                {{--                action="{{route('registercustomers')}}"--}}
                <ul id="register_errors"></ul>


                <input type="first_name" value="" name="first_name" placeholder="@lang('site.first_name')"
                       class="email__input " id="first_name"
                       required>
                <br>

                <input type="last_name" value="" name="last_name" placeholder="@lang('site.last_name')"
                       class="email__input " id="last_name"
                       required>
                <br>
                <input type="email" name="email" value="" placeholder="@lang('site.email')" class="email__input "
                       required id="emails">
                <input type="text" name="phone" value="" placeholder="@lang('site.phone')" class="email__input "
                       required id="phone">
                <br> <input type="password" value="" name="password" placeholder="@lang('site.password')"
                            class="email__input " id="passwords"
                            required>
                <br>
                <input type="password" value="" name="password_confirmation"
                       placeholder="@lang('site.password_confirmation')"
                       class="email__input " id="password_confirmation"
                       required>
                <br> <input type="date" name="birth_date" value="" placeholder="@lang('site.date')"
                            class="email__input " id="birth_date"
                            required>
                <br>
                <p></p>
                {{--                @if ($errors->any())--}}
                {{--                    <ul>{!! implode('', $errors->all('<li style="color:green">:message</li>')) !!}</ul>--}}
                {{--                @endif--}}
                <button type="submit" class="email__input email__submit" id="formregisters">
                    @lang('site.add')
                </button>
            </form>
        </div>
    </div>

    <div class="mobileRegister" style="display: none;" id="verifypassemail">
        <div class="mobileRegister__container">
            <header class="mobileRegister__header">
                <h4 class="mobileRegister__title">@lang('site.password')</h4>
                <i class="fas fa-times mobileRegister__close"></i>
            </header>
            <p class="mobileRegister__para">
                @lang('site.enterpassword')
            </p>
            <form class="email__form" id="loginpassword" method="post">
                {{--                {{ csrf_field() }} action="{{route('loginpassword')}}"--}}
                {{--                {{ method_field('post') }}--}}
                {{--                @include('partials._errors')--}}


                <input type="password" name="password" placeholder="@lang('site.password')" class="email__input "
                       required id="password">

                <ul id="errorloginpasswordss"></ul>
                <button type="submit" class="email__input email__submit" id="loginpasswords">
                    @lang('site.Continue')
                </button>
            </form>
        </div>
    </div>


    <div class="mobileRegister" style="display: none;" id="mobileregister">
        <div class="mobileRegister__container">
            <header class="mobileRegister__header">
                <h4 class="mobileRegister__title">@lang('site.verify the mobile number')</h4>
                <i class="fas fa-times mobileRegister__close"></i>
            </header>
            <p class="mobileRegister__para">please enter the 4-digit in the verification text message that was sent to
                1234</p>
            <ul id="verify_errors"></ul>
            <li id="codeerror"></li>
            <form id="verifycode">
                <input type="text" class="mobileRegister__input" placeholder="-" name="code" id="code">
                <input type="text" class="mobileRegister__input" placeholder="-" name="code1" id="code1">
                <input type="text" class="mobileRegister__input" placeholder="-" name="code2" id="code2">
                <input type="text" class="mobileRegister__input" placeholder="-" name="code3" id="code3">

                <button type="submit" class="mt-3 btn form-control btn-primary" id="code4"> Verify</button>
            </form>

            {{--            <p class="mobileRegister__msg">in case the message is not received you can--}}
            {{--                <span>resend the message</span>--}}
            </p>
            <br>
            <div id="authMode">
                {{--                    <button type="submit" class="email__input email__submit" id="verifycodes">--}}
                {{--                        @lang('site.Continue')--}}
                {{--                    </button>--}}
            </div>
        </div>

    </div>
    <!-- start Login End -->


    <div class="mobileRegister" style="display: none;" id="mobileregistersss">
        <div class="mobileRegister__container">
            <header class="mobileRegister__header">
                <h4 class="mobileRegister__title">@lang('site.verify the mobile number')</h4>
                <i class="fas fa-times mobileRegister__close"></i>
            </header>
            <p class="mobileRegister__para">please enter the 4-digit in the verification text message that was sent to
                1234</p>
            <ul id="verify_errorss"></ul>
            {{--            <li id="codeerror"></li>--}}
            <form id="verifycodephone">
                <input type="text" class="mobileRegister__input" placeholder="-" name="code" id="cod">
                <input type="text" class="mobileRegister__input" placeholder="-" name="code1" id="cod1">
                <input type="text" class="mobileRegister__input" placeholder="-" name="code2" id="cod2">
                <input type="text" class="mobileRegister__input" placeholder="-" name="code3" id="cod3">

                <button type="submit" class="mt-3 btn form-control btn-primary" id="cod4"> Verify</button>
            </form>


            <br>
            <div id="authMode">

            </div>
        </div>

    </div>


@yield('login')

<!--  Login End -->
    <!-- start Email Login End -->
@yield('email')
<!-- EndEmail Login End -->
    <!-- start  mobileRegister Login End -->
@yield('mobile')
<!-- mobileRegister Login End -->
    <!-- City Location Start -->
@yield('cityoverlay')
<!-- End City Location Start -->
    <!-- Booking Start -->
@yield('booking')
<!-- End Booking Start -->
    <!-- BookingTime Start -->
@yield('booking-time')

<!-- End BookingTime Start -->
    <!-- Guests Start -->
@yield('guestsoverlay')
<!-- End Guests Start -->
</div>

<!-- Scripts -->
<script src="{{asset('frontend/vendor/jquery/jquery-3.5.1.min.js')}}"></script>
{{--<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.4/jquery.min.js" integrity="sha512-AFwxAkWdvxRd9qhYYp1qbeRZj6/iTNmJ2GFwcxsMOzwwTaRwz2a/2TX225Ebcj3whXte1WGQb38cXE5j7ZQw3g==" crossorigin="anonymous"></script>--}}
{{--<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>--}}
<script src="{{asset('frontend/vendor/bootstrap/js/bootstrap.min.js')}}"></script>
<script src="{{asset('frontend/vendor/mixitup/mixitup.min.js')}}"></script>
<script src="{{asset('frontend/js/mixitup-custom.js')}}"></script>
<script src="{{asset('frontend/js/main.js')}}"></script>
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
<script>

    // In your Javascript (external .js resource or <script> tag)
    $(document).ready(function () {
        $('.js-example-basic-single').select2();
    });
</script>
{{--<script src=//code.jquery.com/jquery-3.3.1.min.js--}}
{{--        integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="--}}
{{--        crossorigin=anonymous>--}}
{{--</script>--}}
<script>
    $(document).ready(function () {

        @if(app()->getLocale()=='ar')
        $('#language').html('<a href="{{ LaravelLocalization::getLocalizedURL('en') }}"> english</a>');
        @elseif(app()->getLocale()=='en')
        $('#language').html('<a href="{{ LaravelLocalization::getLocalizedURL('ar') }}"> العربيه</a>');
        @endif

    });
    jQuery('document').ready(function () {


        $('#country_id').change(function () {

            var country_id = $(this).children("option:selected").val();

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            jQuery.ajax({
                headers: {'X-CSRF-TOKEN': $('meta[name="csrf_token"]').attr('content')},

                url: "{{ route('selectcountry') }}",
                method: 'post',
                data: {
                    _token: '{{ csrf_token() }}',
                    country_id: country_id
                },
                success: function (result) {
                    $('#phone_key').text(result.call_key)

                },
                error: function (result) {
                    // console.log(result.responseJSON);
                    var errors = result.responseJSON;
                    var errorsList = "";
                    $.each(errors, function (_, value) {
                        $.each(value, function (_, fieldErrors) {
                            fieldErrors.forEach(function (error) {
                                errorsList += "<li style='color:red'>" + error + "</li>";
                            })
                        });
                    });


                }
            });


        });
        jQuery('#formemail').click(function (e) {
            e.preventDefault();
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            jQuery.ajax({
                headers: {'X-CSRF-TOKEN': $('meta[name="csrf_token"]').attr('content')},

                url: "{{ route('loginemail') }}",
                method: 'post',
                data: {
                    _token: '{{ csrf_token() }}',
                    email: jQuery('#email').val()
                },
                success: function (result) {
                    console.log(result);
                    if (result.content == 'verify')
                        $('#mobileregister').show(),
                            console.log(result.data),
                            $('#emailss').html.val(result.data)
                    else if (result.content == 'password')
                        $('#verifypassemail').show()
                    else if (result.content == 'register')
                        $('#registercustomers').show()
                    $('#emails').val(result.data)


                },
                error: function (result) {
                    // console.log(result.responseJSON);
                    var errors = result.responseJSON;
                    var errorsList = "";
                    $.each(errors, function (_, value) {
                        $.each(value, function (_, fieldErrors) {
                            fieldErrors.forEach(function (error) {
                                errorsList += "<li style='color:red'>" + error + "</li>";
                            })
                        });
                    });
                    $('#email_errors').html(errorsList);


                }
            });
        });
        jQuery('#loginpasswords').click(function (e) {
            e.preventDefault();
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            jQuery.ajax({
                headers: {'X-CSRF-TOKEN': $('meta[name="csrf_token"]').attr('content')},

                url: "{{ route('loginpassword') }}",
                method: 'post',
                data: {
                    _token: '{{ csrf_token() }}',
                    password: $('#password').val(),
                    mobile: $('#mobile').val(),
                },
                success: function (result) {

                    if (result.content == 'successlogin')

                        $('#verifypassemail').modal('hide')

                },
                error: function (result) {
                    // console.log(result.responseJSON);
                    var errors = result.responseJSON;
                    var errorsList = "";
                    $.each(errors, function (_, value) {
                        $.each(value, function (_, fieldErrors) {
                            fieldErrors.forEach(function (error) {
                                errorsList += "<li style='color:red'>" + error + "</li>";
                            })
                        });
                    });
                    $('#errorloginpasswordss').html(errorsList);


                }
            });
        });


        jQuery('#formregisters').click(function (e) {
            e.preventDefault();
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            jQuery.ajax({
                headers: {'X-CSRF-TOKEN': $('meta[name="csrf_token"]').attr('content')},

                url: "{{ route('registercustomers') }}",
                method: 'post',
                data: {
                    _token: '{{ csrf_token() }}',
                    password_confirmation: jQuery('#password_confirmation').val(),
                    first_name: jQuery('#first_name').val(),
                    last_name: jQuery('#last_name').val(),
                    email: jQuery('#emails').val(),
                    phone: jQuery('#phone').val(),
                    password: jQuery('#passwords').val(),
                    birth_date: jQuery('#birth_date').val(),


                },
                success: function (result) {
                    console.log(result);

                    if (result.content == 'passwordss')
                        $('#registercustomers').hide()

                    $('#verifypassemail').show()


                },
                error: function (result) {
                    // console.log(result.responseJSON);
                    var errors = result.responseJSON;
                    var errorsList = "";
                    $.each(errors, function (_, value) {
                        $.each(value, function (_, fieldErrors) {
                            fieldErrors.forEach(function (error) {
                                errorsList += "<li style='color:red'>" + error + "</li>";
                            })
                        });
                    });
                    $('#register_errors').html(errorsList);


                }
            });
        });


        jQuery('#code4').click(function (e) {
            e.preventDefault();
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            var code = $('#code').val().concat($('#code1').val(), $('#code2').val(), $('#code3').val());
            jQuery.ajax({
                headers: {'X-CSRF-TOKEN': $('meta[name="csrf_token"]').attr('content')},

                url: "{{ route('verifycode') }}",
                method: 'post',
                data: {
                    _token: '{{ csrf_token() }}',

                    email: jQuery('#email').val(),
                    code: code,


                },
                success: function (result) {
                    console.log(result);

                    if (result.content == 'password')
                        $('#verifypassemail').show()
                    else if (result.content == 'register')

                        $('#mobileregister').hide()
                    $('#emails').val(result.data)

                    $('#registercustomers').show()


                },
                error: function (result) {
                    // console.log(result.responseJSON);
                    var errors = result.responseJSON;
                    var errorsList = "";
                    $.each(errors, function (_, value) {
                        $.each(value, function (_, fieldErrors) {
                            fieldErrors.forEach(function (error) {
                                errorsList += "<li style='color:red'>" + error + "</li>";
                            })
                        });
                    });
                    $('#verify_errors').html(errorsList);


                }
            });
        });

        jQuery('#cod4').click(function (e) {
            e.preventDefault();
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            var code = $('#cod').val().concat($('#cod1').val(), $('#cod2').val(), $('#cod3').val());
            jQuery.ajax({
                headers: {'X-CSRF-TOKEN': $('meta[name="csrf_token"]').attr('content')},

                url: "{{ route('verifycodephone') }}",
                method: 'post',
                data: {
                    _token: '{{ csrf_token() }}',

                    phone: jQuery('#mobile').val(),
                    code: code,


                },
                success: function (result) {
                    console.log(result.data);

                    if (result.content == 'register')
                        $('#mobileregistersss').hide()

                    $('#mobile').val(result.data['mobile'])
                    if (result.content['type'] == 'phone')
                        $('#mobile').attr('readonly', true)


                    $('#registercustomers').show()


                },
                error: function (result) {
                    // console.log(result.responseJSON);
                    var errors = result.responseJSON;
                    var errorsList = "";
                    $.each(errors, function (_, value) {
                        $.each(value, function (_, fieldErrors) {
                            fieldErrors.forEach(function (error) {
                                errorsList += "<li style='color:red'>" + error + "</li>";
                            })
                        });
                    });
                    $('#verify_errorss').html(errorsList);


                }
            });
        });


        jQuery('#signup').click(function (e) {
            e.preventDefault();
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            jQuery.ajax({
                headers: {'X-CSRF-TOKEN': $('meta[name="csrf_token"]').attr('content')},

                url: "{{ route('signup') }}",
                method: 'post',
                data: {
                    _token: '{{ csrf_token() }}',
                    country_id: jQuery('#country_id').val(),
                    mobile: jQuery('#mobile').val(),


                },
                success: function (result) {
                    console.log(result);
                    if (result.content == 'password')

                          $('#sigups').hide(),

                            $('#mobileregistersss').hide(),
                            $('#mobileregister').hide(),


                            $('#verifypassemail').show()


                    else if (result.content == 'verify')
                        $('#mobileregister').show(),
                            console.log(result.data),
                            $('#emailss').html.val(result.data['email'])


                    else if (result.content == 'verifycodephone')

                        $('#mobile').val(result.data['mobile'])
                    $('#sigups').hide()

                    $('#mobileregistersss').show()


                },
                error: function (result) {
                    // console.log(result.responseJSON);
                    var errors = result.responseJSON;
                    var errorsList = "";
                    $.each(errors, function (_, value) {
                        $.each(value, function (_, fieldErrors) {
                            fieldErrors.forEach(function (error) {
                                errorsList += "<li style='color:red'>" + error + "</li>";
                            })
                        });
                    });
                    $('#signup_errors').html(errorsList);


                }
            });
        });


    });


</script>
<!-- Insert these scripts at the bottom of the HTML, but before you use any Firebase services -->

<!-- Firebase App (the core Firebase SDK) is always required and must be listed first -->
<script src="https://www.gstatic.com/firebasejs/8.2.5/firebase-app.js"></script>

<!-- If you enabled Analytics in your project, add the Firebase SDK for Analytics -->
<script src="https://www.gstatic.com/firebasejs/8.2.5/firebase-analytics.js"></script>

<!-- Add Firebase products that you want to use -->
<script src="https://www.gstatic.com/firebasejs/8.2.5/firebase-auth.js"></script>
<script src="https://www.gstatic.com/firebasejs/8.2.5/firebase-firestore.js"></script>
{{--<script--}}
{{--    src="https://code.jquery.com/jquery-3.5.1.js"--}}
{{--    integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc="--}}
{{--    crossorigin="anonymous"></script>--}}
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
<script>
    // TODO: Replace the following with your app's Firebase project configuration
    // For Firebase JavaScript SDK v7.20.0 and later, `measurementId` is an optional field
    var firebaseConfig = {
        apiKey: "AIzaSyClIZykHlvJJpGAg9Qlx64KelvOIsC5dxQ",
        authDomain: "marvel-megavents.firebaseapp.com",
        databaseURL: "https://marvel-megavents.firebaseio.com",
        projectId: "marvel-megavents",
        storageBucket: "marvel-megavents.appspot.com",
    };

    // Initialize Firebase
    firebase.initializeApp(firebaseConfig);
</script>

<script>


    jQuery('document').ready(function ($) {
        firebase.auth().onAuthStateChanged(function (user) {
            if (user) {
                // logged in
                $('#guestMode').hide();
                $('#authMode').show();
            } else {
                $('#guestMode').show();
                $('#authMode').hide();
            }
        });

    });

    function logOutFirebase() {
        firebase.auth().signOut().then(() => {
            // Sign-out successful.
            window.location.href = "{{route('dashboard.logouts')}}";
        }).catch((error) => {
            // An error happened.
        });
    }

    function loginWithProvider(providerName) {
        var provider = null;
        if (providerName === 'google') {
            provider = new firebase.auth.GoogleAuthProvider();
            provider.addScope('https://www.googleapis.com/auth/contacts.readonly');
        } else if (providerName === 'facebook') {
            provider = new firebase.auth.FacebookAuthProvider();
        } else if (providerName === 'apple') {
            provider = new firebase.auth.OAuthProvider('apple.com');
            provider.addScope('email');
            provider.addScope('name');
        }

        firebase.auth()
            .signInWithPopup(provider)
            .then((result) => {
                /** @type {firebase.auth.OAuthCredential} */
                var credential = result.credential;

                // This gives you a Google Access Token. You can use it to access the Google API.
                var token = credential.accessToken;
                // The signed-in user info.
                var user = result.user;
                // ...
                console.log("User::: " + JSON.stringify(user, null, true))
                console.log("TOKEN::: " + JSON.stringify(token))
            }).catch((error) => {
            console.log("ERROR::: " + JSON.stringify(error))
            // Handle Errors here.
            var errorCode = error.code;
            var errorMessage = error.message;
            // The email of the user's account used.
            var email = error.email;
            // The firebase.auth.AuthCredential type that was used.
            var credential = error.credential;
            // ...
        });
    }

    function getMySearch() {
        var input, filter, ul, li, a, i, txtValue;
        input = document.getElementById("myInput");
        filter = input.value.toLowerCase();
        ul = document.getElementById("myUL");
        li = ul.getElementsByClassName("city-item");
        for (i = 0; i < li.length; i++) {
            a = li[i].getElementsByTagName("label")[0];
            txtValue = a.textContent || a.innerText;
            if (txtValue.toLowerCase().indexOf(filter) > -1) {
                li[i].style.display = "";
            } else {
                li[i].style.display = "none";
            }
        }
    }

    function getMySearch1() {
        var input, filter, ul, li, a, i, txtValue;
        input = document.getElementById("myInput1");
        filter = input.value.toLowerCase();
        ul = document.getElementById("myUL1");
        li = ul.getElementsByClassName("city-item");
        for (i = 0; i < li.length; i++) {
            a = li[i].getElementsByTagName("label")[0];
            txtValue = a.textContent || a.innerText;
            if (txtValue.toLowerCase().indexOf(filter) > -1) {
                li[i].style.display = "";
            } else {
                li[i].style.display = "none";
            }
        }
    }

    function sendPosition(position) {
        let latitude = position.coords.latitude;
        let longitude = position.coords.longitude;

        $.ajax({
            url: "{{route('sendPosition')}}",
            data: {
                latitude: latitude,
                longitude: longitude
            },
            type: "get",
            success: function (data) {
                let input = document.getElementById("myInput");
                input.val(data.name);
                //city input
                //val(data.name_ar/name_en)
            },
            error: function (error) {
                console.log(error);
            }
        })

    }

    $('.city__locationTitle').click(function () {
        if (navigator.geolocation) {
            navigator.geolocation.getCurrentPosition(sendPosition)
        } else {
            console.log("geolocation doesn't work on this browser")
        }
    });
</script>

@yield('scripts')

@stack('script')
</body>
</html>
