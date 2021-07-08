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


    <div class="bookingTabs">
        <div class="container">
            <div class="content">
                <ul class="bookingTabs__tabs">
                    <li class="bookingTabs__item">
                        <button type="button" data-filter=".outbound" class="bookingTabs__tab mixitup-control-active active">@lang('site.outbound')</button>
                    </li>
                    <li class="bookingTabs__item">
                        <button type="button" data-filter=".incoming" class="bookingTabs__tab">@lang('site.incoming')</button>
                    </li>
                </ul>
            </div>

            <div class="bookingTabs__container mixits" id="MixItUp061131" style="">
                @foreach($bookingoutbounds as $booking)
                <div class="bookingPage__item bookingPage__br mix outbound" style="">
                    <div class="bookingPage__flex">
                        <div class="bookingPage__info">
                            <div class="bookingPage__flex">
                                <h3 class="bookingPage__title">{{$booking->venue->name}}</h3>
                                <div class="bookingPage__rate">
                                    <i class="fas fa-star bookingPage__rateIcon"></i>
                                    <span class="bookingPage__rateText">{{$booking->venue->venueratings->avg('rate') ?? ''}}</span>
                                </div>
                            </div>
                            <p class="bookingPage__para">@lang('site.code'): {{$booking->code ?? ''}}</p>
                            <p class="bookingPage__para">@lang('site.booking date'): {{$booking->start_date ?? ''}}</p>
                            <p class="bookingPage__para">@lang('site.status'): @if($booking->status==1) @lang('site.accept') @else @lang('site.waiting for confirmation') @endif</p>
                            <p class="bookingPage__para bookingTabs__pyStatus">@lang('site.payment status'): {{$booking->payment_status}}</p>
                            <a href="{{ route('bookings.show', $booking->id) }}" class="bookingTabs__details site-btn">@lang('site.view details')</a>
                        </div>
                        <div class="bookingPage__info">
                            <img src="{{asset('uploads/'.$booking->venue->image)}}" alt="image" class="bookingPage__imag img-fluid" width="200px" height="100px">

                        </div>
                    </div>
                </div>


                @endforeach

                    <div class="bookingPage__item mix incoming" style="display: none;">
                    @foreach($bookingincomings as $booking)
                    <div class="bookingPage__flex">
                        <div class="bookingPage__info">
                            <div class="bookingPage__flex">
                                <h3 class="bookingPage__title">{{$booking->venue->name ?? ''}}</h3>
                                <div class="bookingPage__rate">
                                    <i class="fas fa-star bookingPage__rateIcon"></i>
                                    <span class="bookingPage__rateText"> {{$booking->venue->venueratings->avg('rate') ?? ''}}</span>

                                </div>
                            </div>
                            <p class="bookingPage__para">@lang('site.code'): {{$booking->code ?? ''}} </p>
                            <p class="bookingPage__para"> @lang('site.booking date'): {{$booking->start_date ?? ''}}</p>
                            <p class="bookingPage__para">@lang('site.status'): @if($booking->status==1) @lang('site.accept') @else @lang('site.waiting for confirmation') @endif</p>
                            <p class="bookingPage__para bookingTabs__pyStatus">@lang('site.payment status'): {{$booking->payment_status}}</p>
                            <a href="{{ route('bookings.show', $booking->id) }}" class="bookingTabs__details site-btn">@lang('site.view details')</a>
                        </div>
                        <div class="bookingPage__info">
                            <img src="{{asset('uploads/'.$booking->venue->image)}}" alt="image" class="bookingPage__imag img-fluid" width="200px" height="100px">
                        </div>
                    </div>
                        <br><hr>

                    @endforeach

                   </div>


            </div>
           </div>
        <br>
        <div class="text-align-center"  style="margin-left: 700px">{{ $bookingoutbounds->appends(request()->query())->links()}}</div>

    </div>



   @endsection
