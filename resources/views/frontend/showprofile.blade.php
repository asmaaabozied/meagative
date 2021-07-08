@extends('frontend.master')

@section('content')

    <div class="subHeader">
        <div class="container">
            <div class="subHeader__flex">
                <div class="subHeader__content">
                    <h2 class="subHeader__title">@lang('site.personal')</h2>
                </div>
            </div>
        </div>
    </div>

    <div class="personal">
        <div class="container">
            <div class="personal__head text-center site--boder">
                <div class="personal__avatar">
                    <img src="{{asset('uploads/'. $customer->photo_file)}}" alt="avatar" class="z-depth-4 circle" height="100" width="100">
                    <div class="personal__overlay">
                        <i class="far fa-image personal__icon"></i>
                        <input type="file" class="personal__file" name="photo_file">
                    </div>
                </div>
                <div class="personal__name">{{$customer->name}}</div>
            </div>

            @include('partials._errors')


            <form
                action="{{ route('updateprofile.update', $customer->id) }}"
                method="post" class="personal__form"
                enctype="multipart/form-data">

                {{ csrf_field() }}
                {{ method_field('put') }}

                <div class="personal__formContent">
                    <label class="site--label">@lang('site.first_name')</label>
                    <input type="text" name="first_name" class="personal__input personal__first site--input" value="{{$customer->first_name}}">
                </div>
                <div class="personal__formContent">
                    <label class="site--label">@lang('site.last_name')</label>
                    <input type="text" name="last_name" class="personal__input personal__last site--input" value="{{$customer->last_name}}">
                </div>
                <div class="personal__formContent">
                    <label class="site--label">@lang('site.email')</label>
                    <input type="email" name="email" class="personal__input personal__email site--input" value="{{$customer->customeremail->first()->email}}">
                </div>
                <div class="personal__formContent">
                    <label class="site--label">@lang('site.date')</label>
                    <input type="date" name="birth_date" class="personal__input personal__date site--input" value="{{$customer->birth_date}}">
                </div>
                <div class="personal__formContent">
                    <label class="site--label">@lang('site.phone')</label>
                    <input type="text" name="mobile" class="personal__input personal__mobile site--input" value="{{$customer->mobile}}">
                </div>
                <div class="personal__formContent">
                    <label>@lang('site.country')</label>
                    <select name="country_id" class="form-control select2">

                        @foreach ( $countries as $key=>$country)
                            <option
                                value="{{$key }}" {{ $customer->country_id ? 'selected' : '' }}>
                                {{$country }}
                            </option>
                        @endforeach
                    </select>
                </div>
                <div class="personal__formContent">
                    <label class="site--label">@lang('site.city')</label>
                    <select name="city_id" class="form-control select2">

                        @foreach ( $cities as $key=>$city)
                            <option
                                value="{{$key }}" {{ $customer->city_id ? 'selected' : '' }}>
                                {{$city }}
                            </option>
                        @endforeach
                    </select>
                </div>
                <div class="personal__formContent">
                    <label class="site--label"> @lang('site.address')</label>
                    <input type="text" name="address" class="personal__input personal__address site--input" value="{{$customer->address}}">
                </div>
                <div class="personal__formContent">
                    <label class="site--label">@lang('site.phone2')</label>
                    <input type="text" name="emergency_mobile" class="personal__input personal__emergency site--input" value="{{$customer->emergency_mobile}}">
                </div>
                <div class="personal__formContent">
                    <label class="site--label">@lang('site.image')</label>
                    <input type="file" name="photo_file" class="personal__input personal__id site--input">
                </div>
                <div class="personal__formContent">
                    <input type="submit"  class="personal__input personal__id site--input site-btn site-btnMr" value="save">
                </div>
            </form>
        </div>
    </div>


@endsection
