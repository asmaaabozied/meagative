@extends('frontend.master')
@section('content')
        <!-- Carousel Start -->
        <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
            <div class="carousel-inner">

                @foreach($sliders as $key=>$slider)

                    <div class="carousel-item @if($loop->first) active @endif">

                        <img src="{{asset('uploads/'.$slider->image)}}" class="d-block w-100" alt="slider" style="max-height: 600px;">
                    </div>
                @endforeach

            </div>
            <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
            </a>
            <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
            </a>

            <div class="slider__content">
                <h1 class="slider__title">Quick access to places near you</h1>
                <a href="#" class="slider__button">Reaching the places near you</a>
            </div>
        </div>
        <!-- Carousel End -->

        <!-- Services Start -->
        <div class="services">
            <div class="container">

                <div class="row">
                    @foreach($services as $service)
                        <div class="col-md-4">
                            <a href="#" class="card">
                                <img src="{{asset('uploads/'.$service->image)}}" class="card-img-top"
                                     alt="card image"/>
                                <div class="card-body">
                                    <h3 class="card-title">{{$service->name}} </h3>
                                    <p class="card-text">{{$service->description}} </p>
                                </div>
                            </a>
                        </div>
                    @endforeach
                </div>

            </div>
        </div>
        <!-- Services End -->

        <!-- Deal Start -->
        <div class="deal">
            <div class="container">
                <div class="row">
                    <div class="col-md-6">
                        <div class="deal__texts">
                            <h2 class="deal__title">Deal of the week</h2>
                            <h2 class="deal__titleAlt">Current offers for galleries</h2>
                            <ul class="deal__list">
                                <li class="deal__item">default text</li>
                                <li class="deal__item">default text</li>
                                <li class="deal__item">default text</li>
                                <li class="deal__item">default text</li>
                                <li class="deal__item">default text</li>
                                <li class="deal__item">default text</li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <img class="deal__image img-fluid" src="{{asset('frontend/images/home/deal-image.png')}}"
                             alt="deal image"/>
                    </div>
                </div>
            </div>
        </div>
        <!-- Deal End -->


@endsection

@section('search')
    <div class="search d-none d-lg-block">
        <form class="search__form">
            <div class="search__content">
                <label for="location">detect location</label>
                <input type="text" id="location" class="form__input" placeholder="Where do you want to go ?">
            </div>

            <div class="search__content">
                <label for="starts">Starts from</label>
                <input type="text" id="starts" class="form__input" placeholder="Add a date">
            </div>

            <div class="search__content">
                <label for="starts">Ends at</label>
                <input type="text" id="starts" class="form__input" placeholder="Add a date">
            </div>

            <div class="search__content">
                <label for="starts">The guests</label>
                <input type="text" id="starts" class="form__input" placeholder="Add guests">
            </div>

            <div class="search__content search__icon">
                <i class="fas fa-search"></i>
            </div>
        </form>
        <div class="search__bottom">
            <a href="#" class="search__link">Search for places near you</a>
            <a href="#" class="search__link">View what you recently searched for</a>
        </div>
    </div>
@endsection
