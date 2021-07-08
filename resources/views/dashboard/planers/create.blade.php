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
                                <span>@lang('site.add')  @lang('site.planers')</span>
                            </h5>
                        </div>
                        <div class="col s12 m6 l6 right-align-md">
                            <ol class="breadcrumbs mb-0">
                                <li class="breadcrumb-item"><a

                                        href="{{route('dashboard.welcome') }}">@lang('site.dashboard')</a>
                                </li>

                                <li class="breadcrumb-item"><a
                                        href="{{ route('dashboard.planers.index') }}">  @lang('site.planers') </a>
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


                                                    <form action="{{ route('dashboard.planers.store') }}" method="post"
                                                          enctype="multipart/form-data">

                                                        {{ csrf_field() }}
                                                        {{ method_field('post') }}


                                                        <div class="row">
                                                            <div class="input-field col m6 s12">

                                                                <label>@lang('site.name_ar')</label>
                                                                <br>
                                                                <input type="text" name="name_ar" class="form-control"
                                                                       value="{{ old('name_ar') }}">
                                                            </div>


                                                            <div class="input-field col m6 s12">
                                                                <label>@lang('site.name_en')</label>
                                                                <br>
                                                                <input type="text" name="name_en" class="form-control"
                                                                       value="{{ old('name_en') }}">
                                                            </div>
                                                            <div class="input-field col m6 s12">

                                                                <label>@lang('site.address_ar')</label>
                                                                <br>
                                                                <input type="text" name="address_ar"
                                                                       class="form-control"
                                                                       value="{{ old('address_ar') }}">
                                                            </div>


                                                            <div class="input-field col m6 s12">
                                                                <label>@lang('site.address_en')</label>
                                                                <br>
                                                                <input type="text" name="address_en"
                                                                       class="form-control"
                                                                       value="{{ old('address_en') }}">
                                                            </div>


                                                            <div class="input-field col m6 s12">

                                                                <label>@lang('site.email')</label>
                                                                <br>
                                                                <input type="text" name="email" class="form-control"
                                                                       value="{{ old('email') }}">
                                                            </div>


                                                            <div class="input-field col m6 s12">
                                                                <label>@lang('site.phone')</label>
                                                                <br>
                                                                <input type="text" name="phone" class="form-control"
                                                                       value="{{ old('phone') }}">
                                                            </div>


                                                            <div class="input-field col m6 s12">
                                                                <label>@lang('site.latitude')</label>
                                                                <br>
                                                                <input type="text" name="latitude" class="form-control"
                                                                       value="{{ old('latitude') }}">
                                                            </div>


                                                            <div class="input-field col m6 s12">
                                                                <label>@lang('site.longitude')</label>
                                                                <br>
                                                                <input type="text" name="longitude" class="form-control"
                                                                       value="{{ old('longitude') }}">
                                                            </div>


                                                            <div class="input-field col m6 s12">
                                                                <label>@lang('site.countries')</label>
                                                                <br>
                                                                <select name="country_id" class="form-control select2">
                                                                    <option value="">@lang('site.select2')</option>
                                                                    @foreach ( $countries as $key=>$country)
                                                                        <option
                                                                            value="{{$key }}" {{ old('country_id') == $key? 'selected' : '' }}>
                                                                            {{$country }}
                                                                        </option>
                                                                    @endforeach
                                                                </select>
                                                            </div>

                                                            <div class="input-field col m6 s12">
                                                                <label>@lang('site.cities')</label>
                                                                <br>
                                                                <select name="city_id" class="form-control select2">
                                                                    <option value="">@lang('site.select3')</option>
                                                                    @foreach ( $cities as $key=>$city)
                                                                        <option
                                                                            value="{{$key }}" {{ old('city_id') == $key? 'selected' : '' }}>
                                                                            {{$city }}
                                                                        </option>
                                                                    @endforeach
                                                                </select>
                                                            </div>
                                                            <div class="input-field col m6 s12">
                                                                <label>@lang('site.image')</label>
                                                                <br>
                                                                <input type="file" name="image" class="form-control">
                                                            </div>

                                                            <div class="input-field col m6 s12">
                                                                <label>@lang('site.images')</label>
                                                                <br>
                                                                <input type="file" name="images[]"
                                                                       class="form-control image" multiple>
                                                            </div>

                                                            <div class="input-field col m6 s12">
                                                                <label>@lang('site.customers')</label>
                                                                <br>
                                                                <select name="customer_id" class="form-control select2">
                                                                    <option value="">@lang('site.select')</option>
                                                                    @foreach ( $customers as $key=>$customer)
                                                                        <option
                                                                            value="{{$key }}" {{ old('country_id') == $key? 'selected' : '' }}>
                                                                            {{$customer }}
                                                                        </option>
                                                                    @endforeach
                                                                </select>
                                                            </div>


                                                            <div class="input-field col m6 s12">
                                                                <label>@lang('site.description_ar')</label>
                                                                <br>
                                                                <textarea name="description_ar"
                                                                          class="form-control" id="summary-ckeditor"
                                                                          name="summary-ckeditor">{{ old('description_ar') }}   </textarea>

                                                            </div>
                                                            <div class="input-field col m6 s12">
                                                                <label>@lang('site.description_en')</label>
                                                                <br>
                                                                <textarea name="description_en"
                                                                          class="form-control" id="summary-ckeditor1"
                                                                          name="summary-ckeditor">{{ old('description_en') }}  </textarea>
                                                            </div>



                                                            <div class="input-field col m6 s12">

                                                                <label>
                                                                    <input
                                                                        type="checkbox"
                                                                        name="views"
                                                                        value="1"> @lang('site.views')
                                                                    <span></span>
                                                                </label>
<br><br>
                                                            </div>



<br><br>
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

