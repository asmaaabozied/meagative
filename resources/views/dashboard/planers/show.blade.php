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
                                <span>@lang('site.show')  @lang('site.planers')</span>
                            </h5>
                        </div>
                        <div class="col s12 m6 l6 right-align-md">
                            <ol class="breadcrumbs mb-0">
                                <li class="breadcrumb-item"><a

                                        href="{{route('dashboard.welcome') }}">@lang('site.dashboard')</a>
                                </li>

                                <li class="breadcrumb-item"><a
                                        href="{{ route('dashboard.planers.index') }}"> @lang('site.planers') </a>
                                </li>
                                <li class="breadcrumb-item active"><a> @lang('site.show') </a>
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
                                                        <div class="col-md-6">

                                                            <label>@lang('site.name_ar')</label>
                                                            <input type="text" name="name_ar" class="form-control"
                                                                   value="{{$planer->name_ar }}">
                                                        </div>


                                                        <div class="col-md-6">
                                                            <label>@lang('site.name_en')</label>
                                                            <input type="text" name="name_en" class="form-control"
                                                                   value="{{ $planer->name_en }}">
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-md-6">

                                                            <label>@lang('site.address_ar')</label>
                                                            <input type="text" name="address_ar"
                                                                   class="form-control"
                                                                   value="{{$planer->address_ar }}">
                                                        </div>


                                                        <div class="col-md-6">
                                                            <label>@lang('site.address_en')</label>
                                                            <input type="text" name="address_en"
                                                                   class="form-control"
                                                                   value="{{ $planer->address_en }}">
                                                        </div>

                                                    </div>

                                                    <div class="row">
                                                        <div class="col-md-6">

                                                            <label>@lang('site.email')</label>
                                                            <input type="text" name="email" class="form-control"
                                                                   value="{{ $planer->email }}">
                                                        </div>


                                                        <div class="col-md-6">
                                                            <label>@lang('site.phone')</label>
                                                            <input type="text" name="phone" class="form-control"
                                                                   value="{{ $planer->phone }}">
                                                        </div>

                                                    </div>


                                                    <div class="row">
                                                        <div class="col-md-6">

                                                            <label>@lang('site.latitude')</label>
                                                            <input type="text" name="latitude" class="form-control"
                                                                   value="{{ $planer->latitude }}">
                                                        </div>


                                                        <div class="col-md-6">
                                                            <label>@lang('site.longitude')</label>
                                                            <input type="text" name="longitude" class="form-control"
                                                                   value="{{ $planer->longitude }}">
                                                        </div>

                                                    </div>

                                                    <div class="row">


                                                        <div class="col-md-6">
                                                            <label>@lang('site.countries')</label>
                                                            <select name="country_id" class="form-control select2">
                                                                <option value="">@lang('site.select2')</option>
                                                                @foreach ( $countries as $key=>$country)
                                                                    <option
                                                                        value="{{$key }}" {{ $planer->country_id== $key? 'selected' : '' }}>
                                                                        {{$country }}
                                                                    </option>
                                                                @endforeach
                                                            </select>
                                                        </div>

                                                        <div class="col-md-6">
                                                            <label>@lang('site.cities')</label>
                                                            <select name="city_id" class="form-control select2">
                                                                <option value="">@lang('site.select3')</option>
                                                                @foreach ( $cities as $key=>$city)
                                                                    <option
                                                                        value="{{$key }}" {{ $planer->city_id== $key? 'selected' : '' }}>
                                                                        {{$city }}
                                                                    </option>
                                                                @endforeach
                                                            </select>
                                                        </div>

                                                    </div>


                                                    <div class="row">


                                                        <div class="col-md-6">
                                                            <label>@lang('site.customers')</label>
                                                            <select name="customer_id" class="form-control select2">
                                                                <option value="">@lang('site.select')</option>
                                                                @foreach ( $customers as $key=>$customer)
                                                                    <option
                                                                        value="{{$key }}" {{ $planer->customer_id== $key? 'selected' : '' }}>
                                                                        {{$customer }}
                                                                    </option>
                                                                @endforeach
                                                            </select>
                                                        </div>



                                                    </div>


                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            <label>@lang('site.description_ar')</label>
                                                            <textarea name="description_ar"
                                                                      class="form-control" id="summary-ckeditor"
                                                                      name="summary-ckeditor">{{ $planer->description_ar }}   </textarea>

                                                        </div>
                                                        <div class="col-md-6">
                                                            <label>@lang('site.description_en')</label>
                                                            <textarea name="description_en"
                                                                      class="form-control" id="summary-ckeditor1"
                                                                      name="summary-ckeditor">{{ $planer->description_en }}  </textarea>
                                                        </div>


                                                        <div class="col-md-6">
                                                            <label>@lang('site.image')</label>
<br>
                                                            <a class="mr-2" href="#">
                                                                <img src="{{asset('uploads/'. $planer->image)}}"
                                                                     alt="planers avatar" class="z-depth-4 circle" height="100" width="100">
                                                            </a>

                                                        </div>
                                                    </div>

                                                    </div>

                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <label>@lang('site.images')</label>
                                                        <br>
                                                        @if($planer->images)
                                                            @foreach($planer->images as $key=>$image)


                                                                <a class="mr-2" href="#">
                                                                    <img src="{{asset('uploads/'. $image->encrypt_name)}}"
                                                                         alt="venues avatar" class="z-depth-4 circle"
                                                                         height="100" width="100">
                                                                </a>
                                                            @endforeach
                                                        @endif


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
