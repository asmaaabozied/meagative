

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
                            <h5 class="breadcrumbs-title mt-0 mb-0"><span>@lang('site.edit')  @lang('site.payments')</span>
                            </h5>
                        </div>
                        <div class="col s12 m6 l6 right-align-md">
                            <ol class="breadcrumbs mb-0">
                                <li class="breadcrumb-item"><a

                                        href="{{route('dashboard.welcome') }}">@lang('site.dashboard')</a>
                                </li>

                                <li class="breadcrumb-item"><a
                                        href="{{ route('dashboard.paymentss.index') }}">  @lang('site.payments') </a>
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



                                                        <div class="row">
                                                            <div class="col-md-6">

                                                                <label>@lang('site.type')</label>
                                                                <input type="text" name="payment_type"
                                                                       class="form-control"
                                                                       value="{{ $payment->payment_type }}">
                                                            </div>


                                                            <div class="col-md-6">

                                                                <label>@lang('site.amount')</label>
                                                                <input type="number" name="amount" class="form-control"
                                                                       value="{{ $payment->amount  }}">
                                                            </div>

                                                        </div>


                                                        <div class="row">
                                                            <div class="col-md-6">

                                                                <label>@lang('site.currency')</label>
                                                                <input type="text" name="currency" class="form-control"
                                                                       value="{{ $payment->currency }}">
                                                            </div>


                                                            <div class="col-md-6">

                                                                <label>@lang('site.payment_brand')</label>
                                                                <input type="text" name="payment_brand"
                                                                       class="form-control"
                                                                       value="{{ $payment->payment_brand}}">
                                                            </div>

                                                        </div>

                                                        <div class="row">
                                                            <div class="col-md-6">

                                                                <label>@lang('site.number')</label>
                                                                <input type="text" name="card_number"
                                                                       class="form-control"
                                                                       value="{{ old('card_number') }}">
                                                            </div>


                                                            <div class="col-md-6">

                                                                <label>@lang('site.id')</label>
                                                                <input type="text" name="payment_id"
                                                                       class="form-control"
                                                                       value="{{ $payment->payment_id }}">
                                                            </div>

                                                        </div>

                                                        <div class="row">
                                                            <div class="col-md-6">

                                                                <label>@lang('site.time')</label>
                                                                <input type="date" name="datetime"
                                                                       class="form-control date"
                                                                       value="{{ old('datetime') }}">
                                                            </div>


                                                            <div class="col-md-6">
                                                                <label>@lang('site.customers')</label>
                                                                <select name="customer_id" class="form-control select2">
                                                                    <option value="">@lang('site.select')</option>
                                                                    @foreach ( $customers as $key=>$customer)
                                                                        <option
                                                                            value="{{$key }}" {{  $payment->customer_id  == $key? 'selected' : '' }}>
                                                                            {{$customer }}
                                                                        </option>
                                                                    @endforeach
                                                                </select>
                                                            </div>

                                                        </div>

                                                        <div class="row">


                                                            <div class="col-md-6">
                                                                <label>@lang('site.description')</label>
                                                                <textarea name="notes"
                                                                          class="form-control" id="summary-ckeditor"
                                                                          name="summary-ckeditor"> {{$payment->notes }} </textarea>

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

