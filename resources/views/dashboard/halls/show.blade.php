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
                            <h5 class="breadcrumbs-title mt-0 mb-0"><span>@lang('site.edit')  @lang('site.halls')</span>
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
                                                <div class="input-field col m6 s12">
                                                    <label>@lang('site.name_ar')</label>
                                                    <br>
                                                    <input type="text" name="name_ar" class="form-control"
                                                           value="{{ $hall->name_ar }}">
                                                </div>
                                                <div class="input-field col m6 s12">
                                                    <label>@lang('site.name_en')</label>
                                                    <br>
                                                    <input type="text" name="name_en" class="form-control"
                                                           value="{{ $hall->name_en }}">
                                                </div>


                                                <div class="input-field col m6 s12">
                                                    <label>@lang('site.price')</label>
                                                    <br>
                                                    <input type="number" name="price" class="form-control"
                                                           value="{{ $hall->price }}">
                                                </div>

                                                <div class="input-field col m6 s12">
                                                    <label>@lang('site.capacity')</label>
                                                    <br>
                                                    <input type="text" name="capacity" class="form-control"
                                                           value="{{ $hall->capacity }}">
                                                </div>


                                                <div class="input-field col m6 s12">
                                                    <label>@lang('site.female')</label>
                                                    <br>
                                                    <input type="text" name="capacity_female"
                                                           class="form-control"
                                                           value="{{ $hall->capacity_female }}">
                                                </div>

                                                <div class="input-field col m6 s12">
                                                    <label>@lang('site.male')</label>
                                                    <br>
                                                    <input type="text" name="capacity_male"
                                                           class="form-control"
                                                           value="{{ $hall->capacity_male }}">
                                                </div>


                                                <div class="input-field col m6 s12">
                                                    <label>@lang('site.capacity_childrens')</label>
                                                    <br>
                                                    <input type="text" name="capacity_childrens"
                                                           class="form-control"
                                                           value="{{ $hall->capacity_childrens }}">
                                                </div>

                                                <div class="input-field col m6 s12">
                                                    <label>@lang('site.capacity_babies')</label>
                                                    <br>
                                                    <input type="text" name="capacity_babies"
                                                           class="form-control"
                                                           value="{{ $hall->capacity_babies }}">
                                                </div>

                                                <div class="input-field col m6 s12">
                                                    <label>@lang('site.open')</label>
                                                    <br>
                                                    <input type="text" name="time_open" class="form-control"
                                                           value="{{ $hall->time_open }}">
                                                </div>

                                                <div class="input-field col m6 s12">
                                                    <label>@lang('site.start_at')</label>
                                                    <br>
                                                    <div>
                                                        <input type="text" name="time_start"
                                                               class="form-control"
                                                               value="{{ $hall->time_start }}">


                                                    </div>
                                                </div>



                                                <div class="input-field col m6 s12">
                                                    <label>@lang('site.end_at')</label>
                                                    <br>
                                                    <input type="text" name="time_end" class="form-control"
                                                           value="{{ $hall->time_end }}">
                                                </div>

                                                <div class="input-field col m6 s12">
                                                    <label>@lang('site.close')</label>
                                                    <br>
                                                    <div>
                                                        <input type="text" name="time_close"
                                                               class="form-control"
                                                               value="{{ $hall->time_close }}">


                                                    </div>
                                                </div>


                                                <div class="input-field col m6 s12">
                                                    <label>@lang('site.latitude')</label>
                                                    <br>
                                                    <input type="text" name="latitude" class="form-control"
                                                           value="{{ $hall->latitude }}">
                                                </div>

                                                <div class="input-field col m6 s12">
                                                    <label>@lang('site.longitude')</label>
                                                    <br>
                                                    <div>
                                                        <input type="text" name="longitude"
                                                               class="form-control"
                                                               value="{{ $hall->longitude }}">


                                                    </div>
                                                </div>


                                                <div class="input-field col m6 s12">
                                                    <label>@lang('site.countries')</label>
                                                    <br>
                                                    <select name="country_id" class="form-control select2">
                                                        <option value="">@lang('site.select2')</option>
                                                        @foreach ( $countries as $key=>$country)
                                                            <option
                                                                value="{{$key }}" {{  $hall->country_id  ? 'selected' : '' }}>
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
                                                                value="{{$key }}" {{ $hall->city_id ? 'selected' : '' }}>
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
                                                                value="{{$key }}" {{ $hall->customer_id ? 'selected' : '' }}>
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
                                                                value="{{$key }}" {{$hall->venue_type_id? 'selected' : '' }}>
                                                                {{$type }}
                                                            </option>

                                                        @endforeach
                                                    </select>
                                                </div>


                                                {{--                                                            <div class="col-md-6">--}}
                                                {{--                                                                <label>@lang('site.parking')</label>--}}
                                                {{--                                                                <br>--}}
                                                {{--                                                                <input type="checkbox" name="parking" value="1">--}}
                                                {{--                                                            </div>--}}


                                                <div class="input-field col m6 s12">
                                                    <label>@lang('site.address_ar')</label>
                                                    <br>
                                                    <textarea name="address_ar" class="form-control"
                                                    > {{ $hall->address_ar }}</textarea>
                                                </div>
                                                <div class="input-field col m6 s12">
                                                    <label>@lang('site.address_en')</label>
                                                    <br>
                                                    <textarea type="text" name="address_en"
                                                              class="form-control"
                                                    > {{ $hall->address_en }}</textarea>
                                                </div>


                                                <div class="input-field col m6 s12">
                                                    <label>@lang('site.description_ar')</label>
                                                    <br>
                                                    <textarea name="description_ar"
                                                              class="form-control" id="summary-ckeditor"
                                                              name="summary-ckeditor">{{ $hall->description_ar }}   </textarea>

                                                </div>
                                                <div class="input-field col m6 s12">
                                                    <label>@lang('site.description_en')</label>
                                                    <br>
                                                    <textarea name="description_en"
                                                              class="form-control" id="summary-ckeditor1"
                                                              name="summary-ckeditor">{{ $hall->description_en }}  </textarea>

                                                </div>

                                                <div class="input-field col m6 s12">
                                                    <br><br>
                                                    <a class="mr-2" href="#">
                                                        <img src="{{asset('uploads/'. $hall->image)}}"
                                                             alt="users avatar" class="z-depth-4 circle"
                                                             height="100" width="100">
                                                    </a>


                                                    <label>@lang('site.image')</label>
                                                    <br><br>
                                                </div>

                                                <div class="input-field col m6 s12">
                                                    <label>@lang('site.images')</label>
<br><br>
                                                    @if($hall->images)
                                                    @foreach($hall->images as $key=>$image)
                                                        <a class="mr-2" href="#">
                                                            <img src="{{asset('uploads/'. $image->encrypt_name)}}"
                                                                 alt="venues avatar" class="z-depth-4 circle"
                                                                 height="100" width="100">
                                                        </a>
                                                    @endforeach
                                                    @endif
                                                    <br><br>

                                                </div>
                                                <div class="form-group col-sm-3">
                                                    <img src="{{ asset('public/uploads/images') }}"
                                                         style="width: 100px"
                                                         class="img-thumbnail image-preview" alt="">
                                                </div>




                                                <br><br>
                                                <div class="input-field col m6 s12">
                                                    <br>
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
@endsection


