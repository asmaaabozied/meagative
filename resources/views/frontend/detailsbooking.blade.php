@extends('frontend.master')

@section('content')
    <div class="subHeader">
        <div class="container">
            <div class="subHeader__flex">
                <div class="subHeader__content">
                    <h2 class="subHeader__title">@lang('site.Booking Details')</h2>
                </div>
            </div>
        </div>
    </div>

    <div class="bookingPage__details">
        <div class="container">
            <ul class="bookingPage__list">
                <li class="bookingPage__ulItem">
                    <div class="bookingPage__flex">
                        <p class="bookingPage__ItemTitle bookingPage__ItemText">@lang('site.code')</p>
                        <p class="bookingPage__ItemNumber bookingPage__ItemText">{{$booking->code ?? ''}}</p>
                    </div>
                </li>
                <li class="bookingPage__ulItem">
                    <div class="bookingPage__flex">
                        <p class="bookingPage__ItemTitle bookingPage__ItemText">@lang('site.venue')</p>
                        <p class="bookingPage__ItemNumber bookingPage__ItemText">{{$booking->venue->name ?? ''}}</p>
                    </div>
                </li>
                <li class="bookingPage__ulItem">
                    <div class="bookingPage__flex">
                        <p class="bookingPage__ItemTitle bookingPage__ItemText">@lang('site.start date')</p>
                        <p class="bookingPage__ItemNumber bookingPage__ItemText">{{$booking->start_date ?? ''}}</p>
                    </div>
                </li>
                <li class="bookingPage__ulItem">
                    <div class="bookingPage__flex">
                        <p class="bookingPage__ItemTitle bookingPage__ItemText">@lang('site.end date')</p>
                        <p class="bookingPage__ItemNumber bookingPage__ItemText">{{$booking->end_date ?? ''}}</p>
                    </div>
                </li>
                <li class="bookingPage__ulItem">
                    <div class="bookingPage__flex">
                        <p class="bookingPage__ItemTitle bookingPage__ItemText">@lang('site.status')</p>
                        <p class="bookingPage__ItemNumber bookingPage__ItemText">@if($booking->status==1) @lang('site.accept') @else @lang('site.waiting for confirmation') @endif</p>
                    </div>
                </li>
                <li class="bookingPage__ulItem">
                    <div class="bookingPage__flex">
                        <p class="bookingPage__ItemTitle bookingPage__ItemText">@lang('site.days_count')</p>
                        <p class="bookingPage__ItemNumber bookingPage__ItemText">{{$booking->days_count ?? ''}}</p>
                    </div>
                </li>
                <li class="bookingPage__ulItem">
                    <div class="bookingPage__flex">
                        <p class="bookingPage__ItemTitle bookingPage__ItemText"> @lang('site.capacity') </p>
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
                        <p class="bookingPage__ItemTitle bookingPage__ItemText">@lang('site.special_prices')</p>
                        <p class="bookingPage__ItemNumber bookingPage__ItemText">{{$booking->special_prices ?? ''	}}</p>
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
                <li class="bookingPage__ulItem">
                    <div class="bookingPage__flex">
                        <p class="bookingPage__ItemTitle bookingPage__ItemText">@lang('site.payment status')</p>
                        <p class="bookingPage__ItemNumber bookingPage__ItemText">{{$booking->payment_status ?? ''}}</p>
                    </div>
                </li>
            </ul>

            <a class="details__payNow site-btn" id="checkout">
                <i class="fas fa-credit-card"></i>
                @lang('site.pay now') Visa/Mastercard
            </a>

            <a  class="details__payNow site-btn" id="checkoutMada">
                <i class="fas fa-credit-card"></i>
                @lang('site.pay now') Mada
            </a>

        </div>




    </div>
    <br>


    <div id="showPayForm">


    </div>


@endsection

@section('scripts')


    <script type="text/javascript">

        function preparePaymentReq(type) {
            Swal.showLoading()
            Swal.fire({
                title: "جاري تجهيز طلبك",
                text: "هل انت متأكد من إتمام هذه العملية ؟",
                icon: "info",
                showCancelButton: true,
                closeOnConfirm: false,
                showLoaderOnConfirm: true,
                preConfirm: () => {
                    return fetch("{{ route('dashboard.payments', [$booking->total_price]) }}"+"?paymentMethodType="+type, {
                        headers: {
                            "Content-Type": "application/json",
                            "Accept": "application/json",
                            "X-Requested-With": "XMLHttpRequest",
                            "X-CSRF-Token": $('meta[name="csrf-token"]').attr('content')
                        },
                    }).then(response => {
                        Swal.showLoading();
                        return response.json()
                        // response.json().then(response => {
                        //     console.log("RES::: "+JSON.stringify(response))
                        //     $('#showPayForm').html(response.content)
                        // })
                    }).catch(error => {
                        console.log("ERR::: " + JSON.stringify(error))
                    });
                },
                allowOutsideClick: () => !Swal.isLoading()
            }).then((result) => {
                if (result.value.status === true) {
                    console.log("RESS:: " + JSON.stringify(result))
                    $('#showPayForm').html(result.value.content)
                }
            });
        }

        $(document).on("click", "#checkout", function () {
            console.log("CHECKOUT CLICKED")
            preparePaymentReq('card')
        })

        $(document).on("click", "#checkoutMada", function () {
            console.log("CHECKOUT CLICKED")
            preparePaymentReq('mada')
        })

    </script>


@endsection
