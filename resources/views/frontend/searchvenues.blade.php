@extends('frontend.master')
@section('content')

    <div class="subHeader">
        <div class="container">
            <div class="subHeader__flex">
                <div class="subHeader__content">
                    <h2 class="subHeader__title">@lang('site.search')</h2>
                    <p class="subHeader__searching">
                        <i class="fas fa-times-circle"></i>
                        {{$venues->first()->name ?? ''}}
                    </p>
                </div>
                <div class="subHeader__content">
                    <i class="fas fa-filter subHeader__icons subHeader__filter"></i>
                    <a href="{{route('events')}}"> <i class="fas fa-search subHeader__icons subHeader__search"></i></a>
                </div>
            </div>
        </div>
    </div>

    <div class="results">
        <div class="container">
            <div class="row">
                @foreach($venues as $venue)
                    <div class="col-lg-6">
                        <a href="#" class="results__card main__card">
                            <img class="results__img main__cardImage" src="{{asset('uploads/'.$venue->image)}}"
                                 alt="image">
                            <div class="results__cardBody main__cardBody">

                                <div class="results__cardFlex main__cardFlex">

                                    <h3 class="results__cardTitle main__cardTitle">

                                        {{$venue->name ?? ''}}

                                    </h3>
                                    <div class="results__cardRate main__cardRate">
                                        <a href="{{ route('venues.show', $venue->id) }}"> <i class="fa fa-eye"></i></a>

                                        <i class="fas fa-star results__cardIcon main__cardIcon"></i>
{{--                                        <span--}}
{{--                                            class="results__cardRateText main__cardRateText">@if($venue->venueratings){{$venue->venuesratings->avg('rate') ?? ''}}@endif</span>--}}
{{--                                    --}}
                                    </div>
                                </div>
                                <div class="results__cardFlex main__cardFlex">
                                    <p class="results__cardPara main__cardPara">{{$venue->country->name ?? ''}} @lang('site.price'){{$venue->price}} @lang('site.lang')</p>
                                    <p class="results__cardPara main__cardPara">{{$venue->capacity ?? ''}}</p>
                                </div>
                                <div class="results__cardFlex main__cardFlex">
                                    <p class="results__cardPara main__cardPara"> @lang('site.capacity'){{$venue->type->name ?? ''}}</p>
                                    <p class="results__cardPara main__cardPara">UnCancellable</p>
                                    <p class="result__cardLink main__cardLink">Check Prices &amp; Availability</p>
                                </div>
                            </div>
                        </a>
                    </div>
                @endforeach

            </div>

            <nav class="navigation-page" aria-label="Page navigation example">
                <ul class="pagination justify-content-center">
                    {{ $venues->appends(request()->query())->links() }}

                </ul>
            </nav>
        </div>
    </div>

    <div class="filter overlay">
        <div class="filter__container overlay__container">
            <div class="overlay__flex overlay__head">
                <h3 class="fitler__title overlay__title">@lang('site.Filter Results')</h3>
                <i class="fas fa-filter"></i>
            </div>
            <form action="{{ route('venues.store') }}" method="post"
                  enctype="multipart/form-data" class="filter__form overlay__form">

                {{ csrf_field() }}
                {{ method_field('post') }}
                {{--            <form class="filter__form overlay__form" action="route('venues')" @method('post')>--}}
                <div class="filter__content overlay__content">
                    <label class="filter__label overlay__mainLabel">@lang('site.typevenues')</label>
                    <select class="filter__select overlay__select" name="venue_type_id">
                        @foreach($types as $key=>$type)
                            <option value="{{$key}}">{{$type}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="filter__content overlay__content overlay__flex">
                    <div class="filter__group overlay__group">
                        <label class="filter__label overlay__mainLabel">@lang('site.price')</label>
                        <input type="number" min="0" max="9999" oninput="validity.valid||(value='1000');" id="min_price"
                               class="price-range-field" name="price1">
                    </div>
                    <div class="filter__group overlay__group">
                        <label class="filter__label overlay__mainLabel">@lang('site.to')</label>
                        <input type="number" min="0" max="10000" oninput="validity.valid||(value='8000');"
                               id="max_price" class="price-range-field" name="price2">
                    </div>
                </div>
                <div class="price-range-block">
                    <div id="slider-range"
                         class="price-filter-range ui-slider ui-corner-all ui-slider-horizontal ui-widget ui-widget-content"
                         name="rangeInput">
                        <div class="ui-slider-range ui-corner-all ui-widget-header"
                             style="left: 0%; width: 100%;"></div>
                        <span tabindex="0" class="ui-slider-handle ui-corner-all ui-state-default"
                              style="left: 0%;"></span><span tabindex="0"
                                                             class="ui-slider-handle ui-corner-all ui-state-default"
                                                             style="left: 100%;"></span></div>
                </div>
                <div class="filter__content overlay__content overlay__flex">
                    <div class="filter__group overlay__group">
                        <label class="filter__label overlay__mainLabel">@lang('site.rating')</label>
                        <select class="filter__select overlay__select" name="rating">
                            <option value="1">1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                            <option value="4">4</option>
                            <option value="5">5</option>
                        </select>
                    </div>
                    <div class="filter__group overlay__group">
                        <label class="filter__label overlay__mainLabel">@lang('site.capacity')</label>
                        <select class="filter__select overlay__select" name="capacity">
                            <option value="50">50</option>
                            <option value="100">100</option>
                            <option value="150">150</option>
                            <option value="200">200</option>
                            <option value="20">250</option>
                        </select>
                    </div>
                </div>
                {{--                <div class="filter__content overlay__content">--}}
                {{--                    <label class="filter__label overlay__mainLabel">Venue Type:</label>--}}
                {{--                    <select class="filter__select overlay__select">--}}
                {{--                        <option value="text">default value 1</option>--}}
                {{--                        <option value="text">default value 2</option>--}}
                {{--                        <option value="text">default value 3</option>--}}
                {{--                        <option value="text">default value 4</option>--}}
                {{--                        <option value="text">default value 5</option>--}}
                {{--                        <option value="text">default value 6</option>--}}
                {{--                        <option value="text">default value 7</option>--}}
                {{--                    </select>--}}
                {{--                </div>--}}
                <div class="overlay__flex">
                    <button type="submit" class="btn btn-primary"><i class="fa fa-plus"></i>
                        @lang('site.Filter')</button>
                    {{--                    <button type="submit" class="filter__submit btn btn-success" >@lang('site.Filter')</button>--}}
                    {{--                    <button class="filter__submit overlay__submit">@lang('site.Cancel')</button>--}}
                    <button type="button" class="btn btn-warning mr-1"
                            onclick="history.back();">
                        <i class="fa fa-backward"></i> @lang('site.Cancel')
                    </button>
                </div>


            </form>
        </div>
    </div>




@endsection
