



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
                            <h5 class="breadcrumbs-title mt-0 mb-0"><span>@lang('site.edit')  @lang('site.offers')</span>
                            </h5>
                        </div>
                        <div class="col s12 m6 l6 right-align-md">
                            <ol class="breadcrumbs mb-0">
                                <li class="breadcrumb-item"><a

                                        href="{{route('dashboard.welcome') }}">@lang('site.dashboard')</a>
                                </li>

                                <li class="breadcrumb-item"><a
                                        href="{{ route('dashboard.offers.index') }}"> @lang('site.offers') </a>
                                </li>
                                <li class="breadcrumb-item"><a
                                    > @lang('site.edit') </a>
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


                                                    <form action="{{ route('dashboard.offers.update', $offer->id) }}"
                                                          method="post"
                                                          enctype="multipart/form-data">

                                                        {{ csrf_field() }}
                                                        {{ method_field('put') }}


                                                        <div class="row">

                                                            <div class="col-lg-6">


                                                                <label>@lang('site.start_at')</label>
                                                                <input type="date" name="start_at"
                                                                       class="form-control date"
                                                                       value="{{$offer->start_at}}">


                                                            </div>
                                                            <div class="col-lg-6">
                                                                <label>@lang('site.end_at')</label>
                                                                <input type="date" name="end_at"
                                                                       class="form-control date"
                                                                       value="{{$offer->end_at}}">


                                                            </div>

                                                        </div>

                                                        <div class="row">

                                                            <div class="col-lg-6">

                                                                <label>@lang('site.discount')</label>
                                                                <input type="number" name="discount"
                                                                       class="form-control"
                                                                       value="{{$offer->discount}}">


                                                            </div>
                                                            <div class="col-lg-6">
                                                                <label>@lang('site.halls')</label>
                                                                <select name="venue_id" class="form-control select2">
                                                                    <option value="">@lang('site.select')</option>
                                                                    @foreach ($halls as $key=>$hall)
                                                                        <option
                                                                            value="{{$key}}" {{ $offer->venue_id== $key? 'selected' : '' }}>
                                                                            {{ $hall}}
                                                                        </option>
                                                                    @endforeach
                                                                </select>


                                                            </div>

                                                        </div>

                                                        <br>


                                                        <div class="form-group">
                                                            <button type="button" class="btn btn-warning mr-1"
                                                                    onclick="history.back();">
                                                                <i class="fa fa-backward"></i> @lang('site.back')
                                                            </button>
                                                            <button type="submit" class="btn btn-primary"><i
                                                                    class="fa fa-edit"></i>
                                                                @lang('site.edit')</button>
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

