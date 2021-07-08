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
                                <span>@lang('site.add')  @lang('site.customers_banks')</span>
                            </h5>
                        </div>
                        <div class="col s12 m6 l6 right-align-md">
                            <ol class="breadcrumbs mb-0">
                                <li class="breadcrumb-item"><a

                                        href="{{route('dashboard.welcome') }}">@lang('site.dashboard')</a>
                                </li>

                                <li class="breadcrumb-item"><a
                                        href="{{ route('dashboard.customers_banks.index') }}"> @lang('site.customers_banks') </a>
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


                                                    <form action="{{ route('dashboard.customers_banks.store') }}"
                                                          method="post" enctype="multipart/form-data">

                                                        {{ csrf_field() }}
                                                        {{ method_field('post') }}
                                                        <div class="row">
                                                            <div class="input-field col m6 s12">
                                                                <label>@lang('site.account_name')</label>
                                                                <br>
                                                                <input type="text" name="account_name"
                                                                       class="form-control">
                                                            </div>
                                                            <div class="input-field col m6 s12">
                                                                <label>@lang('site.bank_name')</label>
                                                                <br>
                                                                <input type="text" name="bank_name"
                                                                       class="form-control">
                                                            </div>

                                                            <div class="input-field col m6 s12">
                                                                <label>@lang('site.account_number')</label>
                                                                <br>
                                                                <input type="text" name="account_number"
                                                                       class="form-control">
                                                            </div>


                                                            <div class="input-field col m6 s12">
                                                                <label>@lang('site.iban')</label>
                                                                <br>
                                                                <input type="text" name="iban" class="form-control"
                                                                >
                                                            </div>


                                                            <div class="input-field col m6 s12">
                                                                <label>@lang('site.address')</label>
                                                                <br>
                                                                <input type="text" name="branch_address" class="form-control"
                                                                >
                                                            </div>

                                                            <div class="input-field col m6 s12">
                                                                <label>@lang('site.code')</label>
                                                                <br>
                                                                <input type="text" name="branch_code" class="form-control"
                                                                >
                                                            </div>


                                                            <div class="input-field col m6 s12">
                                                                <label>@lang('site.swift_code')</label>
                                                                <br>
                                                                <input type="text" name="swift_code" class="form-control"
                                                                >
                                                            </div>


                                                            <div class="input-field col m6 s12">
                                                                <label>@lang('site.customers')</label>
                                                                <br>
                                                                <select name="customer_id" class="form-control select2">

                                                                    @foreach ( $customers as $key=>$country)
                                                                        <option value="{{$key }}">
                                                                            {{$country }}
                                                                        </option>
                                                                    @endforeach
                                                                </select>
                                                            </div>

                                                            <div class="input-field col m6 s12">
                                                                <label>@lang('site.cities')</label>
                                                                <br>
                                                                <select name="city_id" class="form-control select2">

                                                                    @foreach ( $cities as $key=>$city)
                                                                        <option value="{{$key }}">
                                                                            {{$city }}
                                                                        </option>
                                                                    @endforeach
                                                                </select>
                                                            </div>

                                                            <div class="input-field col m6 s12">
                                                               <input type="text"  name="id" hidden>
                                                                <br>

                                                            </div>
                                                        </div>

                                                            <div class="input-field col m6 s12">

                                                                <button type="button" class="btn btn-warning mr-1"
                                                                        onclick="history.back();">
                                                                    <i class="fa fa-backward"></i> @lang('site.back')
                                                                </button>
                                                                <button type="submit" class="btn btn-primary"><i
                                                                        class="fa fa-plus"></i>
                                                                    @lang('site.add')</button>
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

