@extends('frontend.master')
@section('content')
    <div class="subHeader">
        <div class="container">
            <div class="subHeader__flex">
                <div class="subHeader__content">
                    <h2 class="subHeader__title">@lang('site.Favorite')</h2>
                </div>
            </div>
        </div>
    </div>

    <div class="results">
        <div class="container">
            <div class="row">
                @foreach($customers->venues as $key=>$venue)
                    <div class="col-lg-6">
                        <a href="#" class="results__card main__card">
                            <img class="results__img main__cardImage" src="{{asset('uploads/'.$venue->image)}}"
                                 alt="image">
                            <div class="results__cardBody main__cardBody">
                                <div class="results__cardFlex main__cardFlex">
                                    <h3 class="results__cardTitle main__cardTitle">{{$venue->name ?? ''}}</h3>
                                    <div class="results__cardRate main__cardRate">
                                        <i class="fas fa-star results__cardIcon main__cardIcon"></i>
                                        <span class="results__cardRateText main__cardRateText">{{$venue->venuesratings->avg('rate')}}</span>
                                    </div>
                                </div>
                                <div class="results__cardFlex main__cardFlex">
                                    <p class="results__cardPara main__cardPara">{{$venue->country->name ?? ''}} @lang('site.price') {{$venue->price ?? ''}} @lang('site.lang')</p>
                                    <p class="results__cardPara main__cardPara">{{$venue->capacity ?? ''}}</p>
                                </div>
                                <div class="results__cardFlex main__cardFlex">
                                    <p class="results__cardPara main__cardPara">{{$venue->type->name ?? ''}}</p>
                                    <p class="results__cardPara main__cardPara">@if($venue->cancellable==0)
                                            Cancellable @else UNCancellable  @endif</p>
                                    <p class="result__cardLink main__cardLink">Check Prices &amp; Availability</p>
                                </div>
                            </div>
                        </a>
                    </div>
                @endforeach

            </div>
            <nav class="navigation-page" aria-label="Page navigation example">
                <ul class="pagination justify-content-center">
                    {{ $customers::paginate(5)->appends(request()->query())->links() }}

                </ul>
            </nav>
        </div>

    </div>

@endsection
