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
                            <h5 class="breadcrumbs-title mt-0 mb-0"><span>@lang('site.add')  @lang('site.halls')</span>
                            </h5>
                        </div>
                        <div class="col s12 m6 l6 right-align-md">
                            <ol class="breadcrumbs mb-0">
                                <li class="breadcrumb-item"><a

                                        href="{{route('dashboard.welcome') }}">@lang('site.dashboard')</a>
                                </li>
                                @if (auth()->user()->hasPermission('read_halls'))
                                    <li class="breadcrumb-item"><a
                                            href="{{ route('dashboard.halls.index') }}"> @lang('site.halls') </a>
                                    </li>
                                @endif
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
                                                    <form action="{{ route('dashboard.halls.store') }}" method="post"
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
                                                                <label>@lang('site.price')</label>
                                                                <br>
                                                                <input type="number" name="price" class="form-control"
                                                                       value="{{ old('price') }}">
                                                            </div>

                                                            <div class="input-field col m6 s12">
                                                                <label>@lang('site.capacity')</label>
                                                                <br>
                                                                <input type="text" name="capacity" class="form-control"
                                                                       value="{{ old('capacity') }}">
                                                            </div>


                                                            <div class="input-field col m6 s12">
                                                                <label>@lang('site.female')</label>
                                                                <br>
                                                                <input type="text" name="capacity_female"
                                                                       class="form-control"
                                                                       value="{{ old('capacity_female') }}">
                                                            </div>

                                                            <div class="input-field col m6 s12">
                                                                <label>@lang('site.male')</label>
                                                                <br>
                                                                <input type="text" name="capacity_male"
                                                                       class="form-control"
                                                                       value="{{ old('capacity_male') }}">
                                                            </div>


                                                            <div class="input-field col m6 s12">
                                                                <label>@lang('site.capacity_childrens')</label>
                                                                <br>
                                                                <input type="text" name="capacity_childrens"
                                                                       class="form-control"
                                                                       value="{{ old('capacity_childrens') }}">
                                                            </div>

                                                            <div class="input-field col m6 s12">
                                                                <label>@lang('site.capacity_babies')</label>
                                                                <br>
                                                                <input type="text" name="capacity_babies"
                                                                       class="form-control"
                                                                       value="{{ old('capacity_babies') }}">
                                                            </div>
                                                            <div class="input-field col m6 s12">
                                                                <label>@lang('site.open')</label>
                                                                <br>
                                                                <input type="text" name="time_open" class="form-control"
                                                                       value="{{ old('time_open') }}">
                                                            </div>

                                                            <div class="input-field col m6 s12">
                                                                <label>@lang('site.start_at')</label>
                                                                <br>
                                                                <div>
                                                                    <input type="text" name="time_start"
                                                                           class="form-control">


                                                                </div>
                                                            </div>


                                                            <div class="input-field col m6 s12">
                                                                <label>@lang('site.end_at')</label>
                                                                <br>
                                                                <input type="text" name="time_end" class="form-control"
                                                                       value="{{ old('time_end') }}">
                                                            </div>

                                                            <div class="input-field col m6 s12">
                                                                <label>@lang('site.close')</label>
                                                                <br>
                                                                <div>
                                                                    <input type="text" name="time_close"
                                                                           class="form-control">


                                                                </div>
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
                                                                <div>
                                                                    <input type="text" name="longitude"
                                                                           class="form-control">


                                                                </div>
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
                                                                <label>@lang('site.type')</label>
                                                                <br>
                                                                <select name="venue_type_id"
                                                                        class="form-control select2">
                                                                    <option value="">@lang('site.select')</option>
                                                                    @foreach ( $types as $key=>$type)
                                                                        <option
                                                                            value="{{$key }}" {{ old('venue_type_id') == $key? 'selected' : '' }}>
                                                                            {{$type }}
                                                                        </option>
                                                                    @endforeach
                                                                </select>
                                                            </div>


                                                            <div class="input-field col m6 s12">
                                                                <label>@lang('site.address_ar')</label>
                                                                <br>
                                                                <textarea type="text" name="address_ar"
                                                                          class="form-control"
                                                                > {{ old('address_ar') }}</textarea>
                                                            </div>
                                                            <div class="input-field col m6 s12">
                                                                <label>@lang('site.address_en')</label>
                                                                <br>
                                                                <textarea type="text" name="address_en"
                                                                          class="form-control"
                                                                > {{ old('address_en') }}</textarea>
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
                                                                <label>@lang('site.image')</label>
                                                                <br><br>
                                                                <input type="file" name="image" class="form-control">
                                                            </div>

                                                            <div class="input-field col m6 s12">
                                                                <label>@lang('site.images')</label>
                                                                <br><br>
                                                                <input type="file" name="images[]"
                                                                       class="form-control image" multiple>
                                                            </div>




                                                            <div class="input-field col m6 s12">

                                                                <label>
                                                                    <input
                                                                        type="checkbox"
                                                                        name="views"
                                                                        value="1"> @lang('site.views')
                                                                    <span></span>
                                                                </label>

                                                            </div>


                                                            <div class="input-field col m6 s12">


                                                                <label>
                                                                    <input
                                                                        type="checkbox"
                                                                        name="parking"
                                                                        value="1"> @lang('site.parking')
                                                                    <span></span>
                                                                </label>
                                                            </div>


                                                            <br><br>
                                                            <div class="input-field col m6 s12">
                                                                <br>
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


