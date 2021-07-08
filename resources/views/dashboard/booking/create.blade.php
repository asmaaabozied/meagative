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
                            <h5 class="breadcrumbs-title mt-0 mb-0">
                                <span>@lang('site.add')  @lang('site.booking')</span>
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

                                                    <form action="{{ route('dashboard.booking.store') }}" method="post"
                                                          enctype="multipart/form-data">

                                                        {{ csrf_field() }}
                                                        {{ method_field('post') }}

                                                        <div class="row">
                                                            <div class="input-field col m6 s12">
                                                                <label>@lang('site.start_at')</label>
                                                                <br>
                                                                <input type="date" name="start_date"
                                                                       class="form-control date"
                                                                       value="{{ old('start_date') }}">
                                                            </div>
                                                            <div class="input-field col m6 s12">
                                                                <label>@lang('site.end_at')</label>
                                                                <br>
                                                                <input type="date" name="end_date"
                                                                       class="form-control date"
                                                                       value="{{ old('end_date') }}">
                                                            </div>


                                                            <div class="input-field col m6 s12">
                                                                <label>@lang('site.male')</label>
                                                                <br>
                                                                <input type="number" name="guests_male"
                                                                       class="form-control"
                                                                       value="{{ old('guests_male') }}">
                                                            </div>

                                                            <div class="input-field col m6 s12">
                                                                <label>@lang('site.female')</label>
                                                                <br>
                                                                <input type="number" name="guests_female"
                                                                       class="form-control"
                                                                       value="{{ old('guests_female') }}">
                                                            </div>


                                                            <div class="input-field col m6 s12">
                                                                <label>@lang('site.customers')</label>
                                                                <br>
                                                                <select name="customer_id" class="form-control select2">
                                                                    <option value="">@lang('site.select')</option>
                                                                    @foreach ( $customers as $key=>$customer)
                                                                        <option
                                                                            value="{{$key }}" {{ old('customer_id') == $key? 'selected' : '' }}>
                                                                            {{$customer }}
                                                                        </option>
                                                                    @endforeach
                                                                </select>
                                                            </div>

                                                            <div class="input-field col m6 s12">
                                                                <label>@lang('site.halls')</label>
                                                                <br>
                                                                <select name="venue_id" class="form-control select2">
                                                                    <option value="">@lang('site.select')</option>
                                                                    @foreach ( $hall as $key=>$type)
                                                                        <option
                                                                            value="{{$key }}" {{ old('venue_type_id') == $key? 'selected' : '' }}>
                                                                            {{$type }}
                                                                        </option>
                                                                    @endforeach
                                                                </select>
                                                            </div>


                                                            <div class="input-field col m6 s12">
                                                                <label>@lang('site.events')</label>
                                                                <br>
                                                                <select name="event_id" class="form-control select2">
                                                                    <option value="">@lang('site.select')</option>
                                                                    @foreach ( $events as $key=>$city)
                                                                        <option
                                                                            value="{{$key }}" {{ old('event_id') == $key? 'selected' : '' }}>
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
                                                                       value="{{ old('code') }}">
                                                            </div>


                                                            <div class="input-field col m6 s12">
                                                                <label>@lang('site.days_count')</label>
                                                                <br>
                                                                <input type="text" name="days_count"
                                                                       class="form-control"
                                                                       value="{{ old('days_count') }}">
                                                            </div>

                                                            <div class="input-field col m6 s12">
                                                                <label>@lang('site.guests_count')</label>
                                                                <br>
                                                                <input type="text" name="guests_count"
                                                                       class="form-control"
                                                                       value="{{ old('guests_count') }}">
                                                            </div>

                                                            <div class="input-field col m6 s12">
                                                                <label>@lang('site.additional_guest_price')</label>
                                                                <br>
                                                                <input type="text" name="additional_guest_price"
                                                                       class="form-control"
                                                                       value="{{ old('additional_guest_price') }}">
                                                            </div>


                                                            <div class="input-field col m6 s12">
                                                                <label>@lang('site.day_price')</label>
                                                                <br>
                                                                <input type="text" name="day_price"
                                                                       class="form-control"
                                                                       value="{{ old('day_price') }}">
                                                            </div>


                                                            <div class="input-field col m6 s12">
                                                                <label>@lang('site.special_prices')</label>
                                                                <br>
                                                                <input type="text" name="special_prices"
                                                                       class="form-control"
                                                                       value="{{ old('special_prices') }}">
                                                            </div>


                                                            <div class="input-field col m6 s12">
                                                                <label>@lang('site.total_days_price')</label>
                                                                <br>
                                                                <input type="text" name="total_days_price"
                                                                       class="form-control"
                                                                       value="{{ old('total_days_price') }}">
                                                            </div>

                                                            <div class="input-field col m6 s12">
                                                                <label>@lang('site.additional_services_price')</label>
                                                                <br>
                                                                <input type="text" name="additional_services_price"
                                                                       class="form-control"
                                                                       value="{{ old('additional_services_price') }}">
                                                            </div>

                                                            <div class="input-field col m6 s12">
                                                                <label>@lang('site.total_price')</label>
                                                                <br>
                                                                <input type="text" name="total_price"
                                                                       class="form-control"
                                                                       value="{{ old('total_price') }}">
                                                            </div>

                                                            <div class="input-field col m6 s12">
                                                                <label>@lang('site.down_payment')</label>
                                                                <br>
                                                                <input type="text" name="down_payment"
                                                                       class="form-control"
                                                                       value="{{ old('down_payment') }}">
                                                            </div>

                                                            <div class="input-field col m6 s12">
                                                                <label>@lang('site.down_payment_price')</label>
                                                                <br>
                                                                <input type="text" name="down_payment_price"
                                                                       class="form-control"
                                                                       value="{{ old('down_payment_price') }}">
                                                            </div>

                                                            <div class="input-field col m6 s12">
                                                                <label>@lang('site.payment_status')</label>
                                                                <br>
                                                                <input type="text" name="payment_status"
                                                                       class="form-control"
                                                                       value="{{ old('payment_status') }}">
                                                            </div>

                                                            <div class="input-field col m6 s12">
                                                                <label>@lang('site.description')</label>
                                                                <br>
                                                                <textarea name="description"
                                                                          class="form-control" id="summary-ckeditor"
                                                                          name="summary-ckeditor">{{ old('description') }}   </textarea>

                                                            </div>


                                                            <br>
                                                            <div class="input-field col m6 s12">
                                                                <button type="button" class="btn btn-warning mr-1"
                                                                        onclick="history.back();">
                                                                    <i class="fa fa-backward"></i> @lang('site.back')
                                                                </button>
                                                                <button type="submit" class="btn btn-primary"><i
                                                                        class="fa fa-plus"></i>
                                                                    @lang('site.add')</button>
                                                            </div>
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


@section('scripts')
    <script src="{{ asset('public/dashboard_files/js/jquery.min.js') }}"></script>

    <script>
        CKEDITOR.replace('summary-ckeditor');
    </script>

    <script>
        CKEDITOR.replace('summary-ckeditor1');
    </script>
@endsection
