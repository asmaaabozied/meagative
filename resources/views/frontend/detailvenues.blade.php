@extends('frontend.master')
@section('style')

    {{--    <link rel="stylesheet" href="http://netdna.bootstrapcdn.com/bootstrap/3.1.1/css/bootstrap.min.css">--}}
    <link rel="stylesheet" href="{{asset('style/starability-all.min.css')}}">
@endsection
@section('content')
    <div id="myModal" class="modal fade" role="dialog">
        <div class="modal-dialog">

            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title"></h4>

                </div>
                <h3 style="text-align: center"> @lang('site.share')</h3>

                <div class="modal-body">

                    <div class="addthis_inline_share_toolbox_kfyp"></div>


                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">@lang('site.close')</button>
                </div>
            </div>

        </div>
    </div>
    <div class="slide">
        <div class="container">
            <div class="slide__icons">

                <a data-toggle="modal" data-target="#myModal"> <i class="fas fa-share-alt slide__share"> </i></a>
                <a href="{{route('favouritevenues',$venue->id)}}">
                    <i class="@if($venue->favourite) fas @else far @endif fa-heart slide__heart "></i>

                </a>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="slide__image">
                        <img src="{{asset('uploads/'. $venue->image)}}" alt="image" class="img-fluid" width="800px"
                             height="200px">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="row">


                        @if($venue->images)
                            @foreach($venue->images as $key=>$image)

                                <div class="col-md-6">
                                    <div class="slide__image slide__smallImage">
                                        <img src="{{asset('uploads/'. $image->encrypt_name)}}" alt="image"
                                             class="img-fluid" width=300px" height="300px">
                                    </div>
                                </div>
                            @endforeach
                        @endif


                    </div>

                </div>
            </div>
        </div>
    </div>
    <div class="details">
        <div class="container">
            <br>
            <div class="details__head">
                <h2 class="details__title">{{$venue->name ?? ''}}</h2>
                <p class="details__para">{{$venue->city->name ?? ''}} - {{$venue->country->name ?? ''}}</p>
                <div class="details__rate">
                    <i class="fas fa-star details__rateIcon"></i>
{{--                    <span class="details__rateText">{{$venue->venueratings->avg('rate') ?? ''}}</span>--}}
                </div>
            </div>

            <div class="details__overview">
                <h3 class="details__mainTitle">overview:</h3>
                <div class="details__describe details__section">
                    <h4 class="details__subTitle">@lang('site.description') </h4>
                    <p class="details__mainPara">{{$venue->description ?? ''}}!</p>
                </div>
                <div class="details__describe details__section">
                    <h4 class="details__subTitle"> @lang('site.address')</h4>
                    <p class="details__mainPara">{{$venue->address ?? ''}}!</p>
                </div>
            </div>

            <div class="details__map">
                <h3 class="details__mainTitle">  @lang('site.location'):</h3>
                google map
            </div>

            <div class="details__information">
                <h3 class="details__mainTitle">@lang('site.detailedinformation'):</h3>
                <h4 class="details__subTitle">#@lang('site.worktimings') :</h4>
                <ul class="details__timeList details__list">
                    <li class="details__item">
                        <i class="fas fa-clock details__timeIcon"></i>
                        @lang('site.start_at')
                        <span class="details__timeClock">{{$venue->time_start ?? ''}}</span>
                    </li>
                    <li class="details__item">
                        <i class="fas fa-clock details__timeIcon"></i>

                        @lang('site.BookingStartTime')
                        <span class="details__timeClock">{{$venue->time_open ?? ''}}</span>
                    </li>
                    <li class="details__item">
                        <i class="fas fa-clock details__timeIcon"></i>

                        @lang('site.BookingEndTime')
                        <span class="details__timeClock">{{$venue->time_close ?? ''}}</span>
                    </li>
                    <li class="details__item">
                        <i class="fas fa-clock details__timeIcon"></i>
                        @lang('site.end_at')
                        <span class="details__timeClock">{{$venue->time_end ?? ''}}</span>
                    </li>
                </ul>

                <div class="details__info2 details__border">
                    <div class="details__flex">
                        <div class="details_group">
                            <h4 class="details__subTitle details__subTitleIcon"># @lang('site.ability of cancel'):</h4>
                            <i class="fas fa-times"></i>
                        </div>
                        <button class="site-btn policy-btn">@lang('site.cancellation policy')</button>
                    </div>
                </div>

                <div class="details__info3 details__border">
                    <div class="details__flex">
                        <div class="details_group">
                            <h4 class="details__subTitle details__subTitleIcon"># @lang('site.parking availability')
                                :</h4>
                            <i class="fas fa-check-circle site--green"></i>
                        </div>
                        <button class="site-btn terms-btn">terms &amp; conditions</button>
                    </div>
                </div>

                <div class="details__info4 details__border">
                    <div class="details_group details_groupWidth">
                        <h4 class="details__subTitle details__subTitleInline"># prices and taxes:</h4>
                    </div>
                    <div class="details_group details_groupWidth">
                        <h4 class="details__subTitle details__subTitleInline"># prices starts:</h4>
                        <span class="details__price">25000 SAR</span>
                    </div>
                    <div class="details_group details_groupWidth">
                        <h4 class="details__subTitle details__subTitleInline"># up to:</h4>
                        <span class="details__price">25000 SAR</span>
                    </div>
                    <div class="details_group details_groupWidth">
                        <h4 class="details__subTitle details__subTitleInline"># down pay:</h4>
                        <span class="details__price">15%</span>
                    </div>
                    <div class="details_group details_groupWidth">
                        <h4 class="details__subTitle details__subTitleInline"># @lang('site.price'):</h4>
                        <span class="details__price">{{$venue->price}}</span>
                    </div>
                    <div class="details_group">
                        <i class="fas fa-exclamation-triangle details__wrongIcon"></i>
                        <span class="details__wrong">
                            @lang('site.pricechange').
                        </span>
                    </div>
                </div>

                <div class="details__info5 details__border">
                    <h4 class="details__subTitle details__subTitleIcon"># Guests capacity:</h4>
                    <ul class="details__timeList details__list">
                        <li class="details__item details__md">
                            <i class="fas fa-male details__minIcon"></i>
                            @lang('site.male'):{{$venue->capacity_male}}
                        </li>
                        <li class="details__item details__md">
                            <i class="fas fa-female details__minIcon"></i>
                            @lang('site.female'):{{$venue->capacity_female	}}
                        </li>
                        <li class="details__item details__md">
                            <i class="fas fa-hamburger details__minIcon"></i>
                            banquet food:
                        </li>
                        <li class="details__item details__md">
                            <i class="fas fa-microphone details__minIcon"></i>
                            theater:
                        </li>
                        <li class="details__item details__md">
                            <i class="fas fa-tv details__minIcon"></i>
                            conference:
                        </li>
                        <li class="details__item details__md">
                            <i class="fas fa-building details__minIcon"></i>
                            floor:
                        </li>
                        <li class="details__item details__md">
                            <i class="fas fa-arrow-up details__minIcon"></i>
                            standing:
                        </li>
                        <li class="details__item">
                            <i class="fas fa-arrow-down details__minIcon"></i>
                            seated: 350
                        </li>
                    </ul>
                </div>
            </div>

            <div class="reviews details__border">
                <div class="reviews__head">
                    <i class="fas fa-star reviews__icon"></i>
                    <span class="reviews__title">( 10 @lang('site.reviews') )</span>
                </div>
                @if($ratigs)
                    <div class="reviews__flex row">

                            @foreach($ratigs as $key=>$value)

                                    <div class="review review__flex col-md-6">
                                        <img src="{{asset('uploads/'.$value->customer->photo_file)}}" alt="Image"
                                             class="review__avatar z-depth-4 circle" width="100px">
                                        <div class="review__texts">
                                            <h4 class="review__name">{{$value->customer->name ?? ''}} </h4>
                                            <p class="review__comment">
                                                {{$value->description ?? ''}}
                                            </p>
                                        </div>
                                    </div>

                            @endforeach
                        </div>


                @endif

                <div class="review__flex">
                    {{--                    <button class="site-btn-alt show__review"  {{ $ratigs->appends(request()} ->query())->links()}></button>--}}
                    <button class="site-btn-alt add__review">@lang('site.add review')</button>
                </div>
                <div class="text-align-center"
                     style="margin-left: 500px">{{ $ratigs->appends(request()->query())->links()}}</div>
            </div>



            <a href="{{route('detailbookvenues',$venue->id)}}" class="details__btn site-btn">Book Now</a>
        </div>
    </div>

    <div class="policy overlay" style="display: none;">
        <div class="policy__container overlay__container">
            <div class="overlay__head">
                <h3 class="policy__title overlay__title">Cancellation Policy</h3>
            </div>
            <p class="policy__text overlay__text">


                {{ \App\Models\Page::where('page_link','privacy-policy')->first()->short_description}}
            </p>
            <button class="policy__submit overlay__close overlay__submit">@lang('site.close')</button>
        </div>
    </div>

    <div class="terms overlay" style="display: none;">
        <div class="terms__container overlay__container">
            <div class="overlay__head">
                <h3 class="terms__title overlay__title">terms &amp; conditions</h3>
            </div>
            <p class="terms__text overlay__text">
                {{ \App\Models\Page::where('page_link','terms-and-conditions')->first()->short_description}}

            </p>
            <button class="terms__submit overlay__close overlay__submit">@lang('site.close')</button>
        </div>
    </div>
    <form id="form" action="{{ route('addreview.store') }}" method="post"
          enctype="multipart/form-data">

        {{ csrf_field() }}
        {{ method_field('post') }}

        <div class="addReview overlay" style="display: none;">
            <div class="terms__container overlay__container">

                <fieldset class="starability-basic">
                    <legend> @lang('site.rating'):</legend>

                    <input type="radio" id="rate5" name="rating" value="1"/>
                    <label for="rate5" title="Amazing">5 stars</label>

                    <input type="radio" id="rate4" name="rating" value="2"/>
                    <label for="rate4" title="Very good">4 stars</label>

                    <input type="radio" id="rate3" name="rating" value="3"/>
                    <label for="rate3" title="Average">3 stars</label>

                    <input type="radio" id="rate2" name="rating" value="4"/>
                    <label for="rate2" title="Not good">2 stars</label>

                    <input type="radio" id="rate1" name="rating" value="5"/>
                    <label for="rate1" title="Terrible">1 star</label>

                </fieldset>


                {{--                <input id="rating-system" type="number" name="rating" class="rating" min="1" max="5" step="1">--}}


                <input typ="hidden" name="venue_id" value="{{$venue->id}}" hidden>

                <label class="addReview__label">review text:</label>
                <textarea name="description" id="addReview__msg" required></textarea>
                <div class="addReview__flex overlay__flex">
                    <input class="terms__submit  overlay__submit" type="submit" value="@lang('site.add review')">
                    <button class="terms__submit overlay__close overlay__submit">@lang('site.close')</button>
                </div>
            </div>
        </div>
    </form>

@endsection



@push('script')


    <!-- Go to www.addthis.com/dashboard to customize your tools -->
    <script type="text/javascript" src="//s7.addthis.com/js/300/addthis_widget.js#pubid=ra-604ca9c77f150866"></script>

    <script>

        function genericSocialShare(url) {
            window.open(url, 'sharer', 'toolbar=0,status=0,width=648,height=395');
            return true;
        }


        // $(document).ready(function () {
        //     $('#rating-system').rating({
        //         language: 'en',
        //
        //         stars: 5,
        //
        //         filledStar: '<i class="glyphicon glyphicon-star"></i>',
        //
        //         emptyStar: '<i class="glyphicon glyphicon-star-empty"></i>',
        //         size: 'md',
        //
        //         containerClass: '',
        //
        //         displayOnly: false,
        //
        //         rtl: false,
        //
        //         size: 'md',
        //
        //         showClear: true,
        //
        //         showCaption: true,
        //
        //         starCaptionClasses: {
        //
        //             0.5: 'label label-danger',
        //
        //             1: 'label label-danger',
        //
        //             1.5: 'label label-warning',
        //
        //             2: 'label label-warning',
        //
        //             2.5: 'label label-info',
        //
        //             3: 'label label-info',
        //
        //             3.5: 'label label-primary',
        //
        //             4: 'label label-primary',
        //
        //             4.5: 'label label-success',
        //
        //             5: 'label label-success'
        //
        //         },
        //
        //         clearButton: '<i class="glyphicon glyphicon-minus-sign"></i>',
        //
        //         clearButtonBaseClass: 'clear-rating',
        //
        //         clearButtonActiveClass: 'clear-rating-active',
        //
        //         clearCaption: 'Not Rated',
        //
        //
        //         arCaptionClass: 'label label-default',
        //
        //         clearValue: 0,
        //
        //         captionElement: null,
        //
        //         clearElement: null,
        //
        //         hoverEnabled: true,
        //
        //         hoverChangeCaption: true,
        //
        //         hoverChangeStars: true,
        //
        //     });
        //     $('#rating-system').rating('create');
        //
        //
        // });


    </script>

@endpush
