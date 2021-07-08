



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
                            <h5 class="breadcrumbs-title mt-0 mb-0"><span>@lang('site.edit')  @lang('site.booking')</span>
                            </h5>
                        </div>
                        <div class="col s12 m6 l6 right-align-md">
                            <ol class="breadcrumbs mb-0">
                                <li class="breadcrumb-item"><a

                                        href="{{route('dashboard.welcome') }}">@lang('site.dashboard')</a>
                                </li>

                                <li class="breadcrumb-item"><a
                                        href="{{ route('dashboard.booking.index') }}"> @lang('site.booking') </a>
                                </li>
                                <li class="breadcrumb-item"><a
                                    > @lang('site.edit') </a>
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
                                                    <div class="row">
                                                        <div class="input-field col m6 s12">
                                                            <label>@lang('site.start_at')</label>
                                                            <input type="date" name="start_date"
                                                                   class="form-control date"
                                                                   value="{{$booking->start_date }}">
                                                        </div>
                                                        <div class="input-field col m6 s12">
                                                            <label>@lang('site.end_at')</label>
                                                            <input type="date" name="end_date"
                                                                   class="form-control date"
                                                                   value="{{  $booking->end_date }}">
                                                        </div>


                                                        <div class="input-field col m6 s12">
                                                            <label>@lang('site.male')</label>
                                                            <input type="number" name="guests_male"
                                                                   class="form-control"
                                                                   value="{{ $booking->guests_male }}">
                                                        </div>

                                                        <div class="input-field col m6 s12">
                                                            <label>@lang('site.female')</label>
                                                            <input type="number" name="guests_female"
                                                                   class="form-control"
                                                                   value="{{ $booking->guests_female }}">
                                                        </div>


                                                        <div class="input-field col m6 s12">
                                                            <label>@lang('site.customers')</label>
                                                            <select name="customer_id" class="form-control select2">
                                                                <option value="">@lang('site.select')</option>
                                                                @foreach ( $customers as $key=>$customer)
                                                                    <option
                                                                        value="{{$key }}" {{ $booking->customer_id == $key? 'selected' : '' }}>
                                                                        {{$customer }}
                                                                    </option>
                                                                @endforeach
                                                            </select>
                                                        </div>

                                                        <div class="input-field col m6 s12">
                                                            <label>@lang('site.halls')</label>
                                                            <select name="venue_id" class="form-control select2">
                                                                <option value="">@lang('site.select')</option>
                                                                @foreach ( $hall as $key=>$type)
                                                                    <option
                                                                        value="{{$key }}" {{ $booking->venue_id== $key? 'selected' : '' }}>
                                                                        {{$type }}
                                                                    </option>
                                                                @endforeach
                                                            </select>
                                                        </div>

                                                        <div class="input-field col m6 s12">
                                                            <label>@lang('site.events')</label>
                                                            <select name="event_id" class="form-control select2">
                                                                <option value="">@lang('site.select')</option>
                                                                @foreach ( $events as $key=>$city)
                                                                    <option
                                                                        value="{{$key }}" {{ $booking->event_id == $key? 'selected' : '' }}>
                                                                        {{$city }}
                                                                    </option>
                                                                @endforeach
                                                            </select>
                                                        </div>


                                                        <div class="input-field col m6 s12">
                                                            <label>@lang('site.code')</label>
                                                            <br>
                                                            <input type="text" name="code"
                                                                   class="form-control"
                                                                   value="{{ $booking->code }}">
                                                        </div>


                                                        <div class="input-field col m6 s12">
                                                            <label>@lang('site.days_count')</label>
                                                            <br>
                                                            <input type="text" name="days_count"
                                                                   class="form-control"
                                                                   value="{{ $booking->days_count }}">
                                                        </div>

                                                        <div class="input-field col m6 s12">
                                                            <label>@lang('site.guests_count')</label>
                                                            <br>
                                                            <input type="text" name="guests_count"
                                                                   class="form-control"
                                                                   value="{{ $booking->guests_count }}">
                                                        </div>

                                                        <div class="input-field col m6 s12">
                                                            <label>@lang('site.additional_guest_price')</label>
                                                            <br>
                                                            <input type="text" name="additional_guest_price"
                                                                   class="form-control"
                                                                   value="{{ $booking->additional_guest_price }}">
                                                        </div>


                                                        <div class="input-field col m6 s12">
                                                            <label>@lang('site.day_price')</label>
                                                            <br>
                                                            <input type="text" name="day_price"
                                                                   class="form-control"
                                                                   value="{{ $booking->day_price}}">
                                                        </div>


                                                        <div class="input-field col m6 s12">
                                                            <label>@lang('site.special_prices')</label>
                                                            <br>
                                                            <input type="text" name="special_prices"
                                                                   class="form-control"
                                                                   value="{{ $booking->special_prices }}">
                                                        </div>


                                                        <div class="input-field col m6 s12">
                                                            <label>@lang('site.total_days_price')</label>
                                                            <br>
                                                            <input type="text" name="total_days_price"
                                                                   class="form-control"
                                                                   value="{{ $booking->total_days_price }}">
                                                        </div>

                                                        <div class="input-field col m6 s12">
                                                            <label>@lang('site.additional_services_price')</label>
                                                            <br>
                                                            <input type="text" name="additional_services_price"
                                                                   class="form-control"
                                                                   value="{{ $booking->additional_services_price }}">
                                                        </div>

                                                        <div class="input-field col m6 s12">
                                                            <label>@lang('site.total_price')</label>
                                                            <br>
                                                            <input type="text" name="total_price"
                                                                   class="form-control"
                                                                   value="{{ $booking->total_price }}">
                                                        </div>

                                                        <div class="input-field col m6 s12">
                                                            <label>@lang('site.down_payment')</label>
                                                            <br>
                                                            <input type="text" name="down_payment"
                                                                   class="form-control"
                                                                   value="{{ $booking->down_payment }}">
                                                        </div>

                                                        <div class="input-field col m6 s12">
                                                            <label>@lang('site.down_payment_price')</label>
                                                            <br>
                                                            <input type="text" name="down_payment_price"
                                                                   class="form-control"
                                                                   value="{{ $booking->down_payment_price }}">
                                                        </div>

                                                        <div class="input-field col m6 s12">
                                                            <label>@lang('site.payment_status')</label>
                                                            <br>
                                                            <input type="text" name="payment_status"
                                                                   class="form-control"
                                                                   value="{{ $booking->payment_status }}">
                                                        </div>


                                                        <div class="input-field col m6 s12">
                                                            <label>@lang('site.description')</label>
                                                            <br>
                                                            <textarea name="description"
                                                                      class="form-control" id="summary-ckeditor"
                                                                      name="summary-ckeditor">{{ $booking->description }}   </textarea>

                                                        </div>

                                                    </div>


                                                        <br>
                                                        <div class="row">
                                                            <div class="col-md-6">
                                                                <button type="button" class="btn btn-warning mr-1"
                                                                        onclick="history.back();">
                                                                    <i class="fa fa-backward"></i> @lang('site.back')
                                                                </button>

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
        </div>
    </div>


@endsection

@section('scripts')
    <script src="{{ asset('public/dashboard_files/js/jquery.min.js') }}"></script>

    <script>
        CKEDITOR.replace('summary-ckeditor');
    </script>

    <script>
        CKEDITOR.replace('summary-ckeditor1');
    </script>
@endsection


