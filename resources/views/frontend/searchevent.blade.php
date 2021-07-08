@extends('frontend.master')
@section('content')


    <div class="reservform">
        <div class="container">
            <form class="reservform__form">
                <div class="reservform__content">
                    <input type="text" class="reservform__input reservform__inputSearch"
                           placeholder="Where do you want to book ?">
                    <i class="fas fa-search reservform__icon"></i>
                </div>
                <div class="reservform__flex">
                    <div class="reservform__content reservform__flexContent">
                        <input type="date" class="reservform__input reservform__date" placeholder="Add time">
                    </div>
                    <div class="reservform__content reservform__flexContent">
                        <input type="text" class="reservform__input reservform__guest" placeholder="Add guests">
                        <i class="fas fa-users reservform__icon"></i>
                    </div>
                </div>
                <div class="reservform__flex">
                    <div class="reservform__content">
                        <i class="far fa-check-square reservform__orderIcon"></i>
                        <span class="reservform__orderTitle">Arrange from closest</span>
                    </div>
                    <div class="reservform__content">
                        <a href="#" class="reservform__search">Searches recently</a>
                    </div>
                </div>

                <div class="reservform__flex">
                    <div class="reservform__content reservform__flexContent">
                        <input type="submit" class="reservform__submit reservform__browse" value="Browse places">
                    </div>
                    <div class="reservform__content reservform__flexContent">
                        <input type="submit" class="reservform__submit reservform__search" value="Search">
                    </div>
                </div>
            </form>
            <div class="reservform__result">
                <div class="row">
                    @foreach($events as $event)
                        <div class="col-lg-6">
                            <div class="reservform__card">
                                <div class="reservform__cardImage">
                                    <img src="{{asset('uploads/'.$event->image)}}" alt="image">
                                </div>
                                <div class="reservform__cardBody">
                                    <h3 class="reservform__cardTitle">{{$event->name}}</h3>
                                    <p class="reservform__cardPara">{{$event->description}}</p>
                                </div>
                            </div>
                        </div>

                    @endforeach

                </div>
            </div>

            <nav class="navigation-page" aria-label="Page navigation example">
                <ul class="pagination justify-content-center">
                    {{ $events->appends(request()->query())->links() }}

                </ul>
            </nav>

        </div>
    </div>
@section('login')
    <div class="login" style="display: none;">
        <div class="login__container">
            <header class="login__header">
                <h4 class="login__title">login</h4>
                <i class="fas fa-times login__close"></i>
            </header>
            <form action="" class="login__form">
                <div class="login__content">
                    <label class="login__label">Country / Territory</label>
                    <select name="country" class="login__input login__select">
                        <option value="Saudi Arabia">Saudi Arabia</option>
                        <option value="Kuwait">Kuwait</option>
                        <option value="Amman">Amman</option>
                    </select>
                </div>
                <input type="text" name="mobile" placeholder="Mobile Number" class="login__input login__mobile">
                <p class="signup__msg">We will call or text you to confirm your number. Standard message and data rates
                    apply
                </p>
                <input type="submit" value="Continue" class="login__input login__submit">
            </form>
            <div class="login__or">or</div>
            <div class="login__auth">
                <button class="login__buttons login__buttonsEmail">
                    <img src="{{asset('frontend/images/home/email.png')}}" alt="icon">
                    Register by e-mail
                </button>
                <button class="login__buttons">
                    <img src="{{asset('frontend/images/home/facebook.png')}}" alt="icon">


                    <a onclick="loginWithProvider('facebook');">Register by facebook account</a>
                </button>
                <button class="login__buttons">
                    <img src="{{asset('frontend/images/home/gmail.png')}}" alt="icon">

                    <a onclick="loginWithProvider('google');"> Register by google account</a>
                </button>
                <button class="login__buttons">
                    <img src="{{asset('frontend/images/home/apple.png')}}" alt="icon">


                    <a onclick="loginWithProvider('apple');"> Register by apple account</a>
                </button>
            </div>
            <div id="authMode">
                <a class="btn btn-block" onclick="logOutFirebase();">Logout</a>
            </div>
            <p class="login__qus">Do you already have an account? <span class="login__signup">signup</span></p>
        </div>
    </div>
@endsection


@section('cityoverlay')
    <div class="city overlay" style="display: block;">
        <div class="city__container overlay__container">
            <form class="city__form">
                <div class="city__content overlay__content">
                    <input type="text" class="city__input overlay__input" placeholder="Choose a city" id="myInput"
                           onkeyup="getMySearch()">
                    <i class="fas fa-search city__icon overlay__icon"></i>
                </div>
                <div class="city__location overlay__location">
                    <i class="fas fa-map-marker-alt overlay__locationIcon"></i>
                    <a href="javascript:void(0)" class="city__locationTitle overlay__locationTitle">Browse the closest
                        to you</a>
                </div>
                <div class="city__checkbox overlay__checkbox">
                    <label class="city__label overlay__label">Searches recently</label>
                    <div class="city__checkList overlay__checkList">
                        <div class="city__checkItem overlay__checkItem">
                            <input type="radio" id="item_1" class="city__checkInput overlay__checkInput">
                            <label for="item_1" class="city__checkLabel overlay__checkLabel">Riyadh</label>
                        </div>
                        <div class="city__checkItem overlay__checkItem">
                            <input type="radio" id="item_2" class="city__checkInput overlay__checkInput">
                            <label for="item_2" class="city__checkLabel overlay__checkLabel">Jeddah</label>
                        </div>
                    </div>
                </div>
                <div class="city__checkbox overlay__checkbox">
                    <label class="city__label overlay__label">@lang('site.cities')</label>
                    <div class="city__checkList overlay__checkList" id="myUL">
                        @foreach(\App\Models\City::get()->pluck('name','id') as $key=>$value)

                            <div class="city__checkItem overlay__checkItem city-item">

                                <input type="radio" id="item_3" class="city__checkInput overlay__checkInput">
                                <label for="item_3" class="city__checkLabel overlay__checkLabel">{{$value}}</label>


                            </div>

                        @endforeach
                    </div>
                </div>
                <button class="city__submit overlay__submit">Cancel</button>
            </form>
        </div>
    </div>

@endsection

@section('booking')
    <div class="booking overlay" style="display: none;">
        <div class="booking__container overlay__container">
            <form class="booking__form">
                <div class="booking__content overlay__content">
                    <input type="text" class="booking__input overlay__input" placeholder="Choose types of reservation"
                           id="myInput1" onkeyup="getMySearch1()">
                    <i class="fas fa-search booking__icon overlay__icon"></i>
                </div>


                <div class="booking__checkbox overlay__checkbox">
                    <div class="booking__checkList overlay__checkList" id="myUL1">
                        @foreach(\App\Models\Event::get()->pluck('name','id') as $key=>$value)

                            <div class="booking__checkItem overlay__checkItem city-item">
                                <input type="radio" id="boitem_1" class="booking__checkInput overlay__checkInput">
                                <label for="boitem_1" class="booking__checkLabel overlay__checkLabel">{{$value}}</label>
                            </div>
                        @endforeach
                    </div>
                </div>
                <div class="overlay__flex">
                    <button class="booking__submit booking__back overlay__submit">back</button>
                    <button class="booking__submit overlay__submit overlay__altBtn">Cancel</button>
                </div>
            </form>
        </div>
    </div>

@endsection

@section('booking-time')
    <div class="booking-time overlay" style="display: none;">
        <div class="booking-time__container overlay__container">
            <div class="booking-time__header overlay__header">
                <h3 class="booking-time__title overlay__title">Choose when to book</h3>
            </div>
            <div class="booking-time__calender">
                Calender
            </div>
            <form class="booking-time__form">
                <div class="overlay__flex">
                    <button class="booking-time__submit booking-time__back overlay__submit overlay__altBtn">back
                    </button>
                    <button class="booking-time__submit overlay__submit">Cancel</button>
                    <button class="booking-time__submit booking-time__continue overlay__submit overlay__altBtn">
                        continue
                    </button>
                </div>
            </form>
        </div>
    </div>

@endsection
@section('guestsoverlay')
    <div class="guests overlay" style="display: none;">
        <div class="guests__container overlay__container">
            <div class="guests__header overlay__header">
                <h3 class="guests__title overlay__title">Choose Your Guests / invitees</h3>
            </div>
            <form class="guests__form">
                <div class="guests__content overlay__content">
                    <label class="guests__mainLabel overlay__mainLabel">Adults</label>
                    <div class="guests__flex overlay__flex">
                        <div class="guests__group overlay__group">
                            <input type="checkbox" id="gu_1" class="guests__checkInput overlay__checkInput" checked="">
                            <label for="gu_1" class="guests__checkLabel overlay__checkLabel">minimum 13 years</label>
                        </div>
                        <div class="guests__group overlay__group">
                            <div class="guests__counter overlay__counter">
                                <span class="guests__minus overlay__minus">-</span>
                                <input type="text" class="guests__number overlay__number" value="0">
                                <span class="guests__plus overlay__plus">+</span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="guests__content overlay__content">
                    <label class="guests__mainLabel overlay__mainLabel">Children</label>
                    <div class="guests__flex overlay__flex">
                        <div class="guests__group overlay__group">
                <span>
                  <label class="guests__checkLabel overlay__checkLabel">From Age</label>
                  <input type="text" placeholder="0" class="guests__checkInput overlay__checkInput overlay__altInput">
                </span>
                            <span>
                  <label class="guests__checkLabel overlay__checkLabel">To</label>
                  <input type="text" placeholder="0" class="guests__checkInput overlay__checkInput overlay__altInput">
                </span>
                        </div>
                        <div class="guests__group overlay__group">
                            <div class="guests__counter overlay__counter">
                                <span class="guests__minus overlay__minus">-</span>
                                <input type="text" class="guests__number overlay__number" value="0">
                                <span class="guests__plus overlay__plus">+</span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="guests__content overlay__content">
                    <label class="guests__mainLabel overlay__mainLabel">Babies</label>
                    <div class="guests__flex overlay__flex">
                        <div class="guests__group overlay__group">
                <span>
                  <label class="guests__checkLabel overlay__checkLabel">Less Than Age</label>
                  <input type="text" value="1" placeholder="0"
                         class="guests__checkInput overlay__checkInput overlay__altInput">
                </span>
                        </div>
                        <div class="guests__group overlay__group">
                            <div class="guests__counter overlay__counter">
                                <span class="guests__minus overlay__minus">-</span>
                                <input type="text" class="guests__number overlay__number" value="0">
                                <span class="guests__plus overlay__plus">+</span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="overlay__flex">
                    <button class="guests__submit guests__back overlay__submit overlay__altBtn">back</button>
                    <button class="guests__submit overlay__submit">Cancel</button>
                    <button class="guests__submit guests__continue overlay__submit overlay__altBtn">continue</button>
                </div>
            </form>
        </div>
    </div>

@endsection

@endsection
