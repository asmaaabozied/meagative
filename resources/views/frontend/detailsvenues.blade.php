@extends('frontend.master')

@section('content')

    <div class="subHeader">
        <div class="container">
            <div class="subHeader__flex">
                <div class="subHeader__content">
                    <h2 class="subHeader__title">@lang('site.booking')</h2>
                </div>
            </div>
        </div>
    </div>

    <div class="bookingPage">
        <div class="container">
            <div class="bookingPage__item bookingPage__border">
                <div class="bookingPage__flex">
                    <div class="bookingPage__info">
                        <h3 class="bookingPage__title">{{$booking->venue->name ?? ''}}</h3>
                        <div class="bookingPage__rate">
                            <i class="fas fa-star bookingPage__rateIcon"></i>
                            <span class="bookingPage__rateText"> @if($booking->venue->venueratings){{$booking->venue->venueratings->avg('rate') ?? ''}} @else  '' @endif</span>
                        </div>
                        <p class="bookingPage__para">{{$booking->venue->country->name ?? ''}} - {{$booking->venue->city->name ?? ''}}  -{{$booking->event->name ?? ''}}</p>
                    </div>
                    <div class="bookingPage__info">
                        @if($booking)

                        <img src="{{asset('uploads/'.$booking->venue->image)}}" alt="image" class="bookingPage__imag img-fluid" width="150px" height="100px">
                    @endif
                    </div>
                </div>
            </div>

            <div class="bookingPage__period bookingPage__br">
                <h3 class="bookingPage__mainTitle">@lang('site.booking period')</h3>
                <span class="bookingPage__date"><span class="bookingPage--bold">@lang('site.form')</span>
                <input type="date" class="date" name="start_date" value="{{$booking->start_date ?? ''}}">
                </span>
                <span class="bookingPage__date bookingPage__to"><span class="bookingPage--bold">@lang('site.to')</span>
                 <input type="date" class="date" name="end_date" value="{{$booking->end_date	 ?? ''}}">
                </span>

            </div>




            <form class="bookingPage__form"  action="{{ route('bookings.update', $booking->id) }}" method="post" >
                {{ csrf_field() }}
                {{ method_field('put') }}

                <div class="bookingPage__formContent">
                    <label class="bookingPage__formLabel form__label">@lang('site.events'):</label>
                    <select class="bookingPage__formSelect form__select" name="event_id">
                        <option value="Choose" selected="">@lang('site.select')</option>
                        @foreach ( \App\Models\Event::get()->pluck('name','id') as $key=>$city)
                            <option
                                value="{{$key }}">

                                {{$city }}
                            </option>
                        @endforeach


                    </select>
                </div>

                <div class="bookingPage__formContent">
                    <label class="bookingPage__formLabel form__label">@lang('site.expectednumberorguests'):</label>
                    <div class="bookingPage__formFlex form__flex">
                        <div class="bookingPage__formContent form__basis">
                            <i class="fas fa-male form__icon"></i>
                            <select class="bookingPage__formSelect form__select form__selectIcon" name="guests_male">
                                <option value="Choose" selected="">@lang('site.select')</option>
                                <option value="50">50</option>
                                <option value="100">100</option>
                                <option value="150">150</option>
                                <option value="200">200</option>
                                <option value="250">250</option>
                                <option value="300">300</option>
                                <option value="350">350</option>
                                <option value="300">400</option>
                                <option value="350">450</option>
                                <option value="350">500</option>
                            </select>
                        </div>

                        <div class="bookingPage__formContent form__basis">
                            <i class="fas fa-female form__icon"></i>
                            <select class="bookingPage__formSelect form__select form__selectIcon" name="guests_female">
                                <option value="Choose" selected="">@lang('site.select')</option>
                                <option value="50">50</option>
                                <option value="100">100</option>
                                <option value="150">150</option>
                                <option value="200">200</option>
                                <option value="250">250</option>
                                <option value="300">300</option>
                                <option value="350">350</option>
                                <option value="300">400</option>
                                <option value="350">450</option>
                                <option value="350">500</option>
                            </select>
                        </div>
                    </div>
                    <div class="bookingPage__formContent">
                        <label class="bookingPage__formLabel form__label">additional services:</label>
                    </div>

                    <div class="bookingPage__formContent">
                        <label class="bookingPage__formLabel form__label">@lang('site.description'):</label>
                        <textarea class="bookingPage__formTextarea form__textarea" name="description">{{$booking->description ?? ''}}</textarea>
                    </div>
                </div>

                <button  type="submit" class="site-btn bookingPage__btnEdit text-center" style="float: right">
                    <i class="fa fa-edit"></i>
                    @lang('site.edit')
                </button>
            </form>

            <div class="bookingPage__details">
                <h4 class="form__label bookingPage__detailsLabel">@lang('site.order details'):</h4>
                <ul class="bookingPage__list">
                    <li class="bookingPage__ulItem">
                        <div class="bookingPage__flex">
                            <p class="bookingPage__ItemTitle bookingPage__ItemText">@lang('site.days_count')</p>
                            <p class="bookingPage__ItemNumber bookingPage__ItemText">{{$booking->days_count ?? ''}}</p>
                        </div>
                    </li>
                    <li class="bookingPage__ulItem">
                        <div class="bookingPage__flex">
                            <p class="bookingPage__ItemTitle bookingPage__ItemText">@lang('site.capacity')</p>
                            <p class="bookingPage__ItemNumber bookingPage__ItemText">{{$booking->venue->capacity ?? ''}}</p>
                        </div>
                    </li>
                    <li class="bookingPage__ulItem">
                        <div class="bookingPage__flex">
                            <p class="bookingPage__ItemTitle bookingPage__ItemText">@lang('site.guests_count')</p>
                            <p class="bookingPage__ItemNumber bookingPage__ItemText">{{$booking->guests_count ?? ''	}}</p>
                        </div>
                    </li>
                    <li class="bookingPage__ulItem">
                        <div class="bookingPage__flex">
                            <p class="bookingPage__ItemTitle bookingPage__ItemText">@lang('site.additional_guest_price')</p>
                            <p class="bookingPage__ItemNumber bookingPage__ItemText">{{$booking->additional_guest_price ?? ''	}}</p>
                        </div>
                    </li>
                    <li class="bookingPage__ulItem">
                        <div class="bookingPage__flex">
                            <p class="bookingPage__ItemTitle bookingPage__ItemText">@lang('site.day_price')</p>
                            <p class="bookingPage__ItemNumber bookingPage__ItemText">{{$booking->day_price ?? ''	}}</p>
                        </div>
                    </li>
                    <li class="bookingPage__ulItem">
                        <div class="bookingPage__flex">
                            <p class="bookingPage__ItemTitle bookingPage--bold bookingPage__ItemText">@lang('site.total_days_price')</p>
                            <p class="bookingPage__ItemNumber bookingPage__ItemText">{{$booking->total_days_price ?? ''	}}</p>
                        </div>
                    </li>
                    <li class="bookingPage__ulItem">
                        <div class="bookingPage__flex">
                            <p class="bookingPage__ItemTitle bookingPage__ItemText">@lang('site.additional_services_price')</p>
                            <p class="bookingPage__ItemNumber bookingPage__ItemText">{{$booking->additional_services_price ?? ''	}}</p>
                        </div>
                    </li>
                    <li class="bookingPage__ulItem">
                        <div class="bookingPage__flex">
                            <p class="bookingPage__ItemTitle bookingPage--bold bookingPage__ItemText">@lang('site.total_price')</p>
                            <p class="bookingPage__ItemNumber bookingPage__ItemText">{{$booking->total_price ?? ''	}}</p>
                        </div>
                    </li>
                    <li class="bookingPage__ulItem">
                        <div class="bookingPage__flex">
                            <p class="bookingPage__ItemTitle bookingPage--bold bookingPage__ItemText">@lang('site.down_payment_price')</p>
                            <p class="bookingPage__ItemNumber bookingPage__ItemText">{{$booking->down_payment_price ?? ''	}}</p>
                        </div>
                    </li>
                </ul>
            </div>

            <button class="details__btn site-btn">@lang('site.BookNow')</button>
        </div>
    </div>


    <div class="bookingPage__success overlay text-center">
        <div class="bookingPage-success__container overlay__container">
            <div class="bookingPage-success__bigIcon overlay__bigIcon">
                <i class="fas fa-check-circle"></i>
            </div>
            <h3 class="bookingPage-success__successText overlay__successText">the booking request has been sent successfully</h3>

            <div class="overlay__para">
                the request code is (510050), we will reply to you as soon as possible
            </div>
            <div class="overlay__spinner">
                <i class="fas fa-circle-notch overlay__spinnerIcon"></i>
            </div>
        </div>
    </div>


@endsection
