


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
                            <h5 class="breadcrumbs-title mt-0 mb-0"><span>@lang('site.add')  @lang('site.planners_ratings')</span>
                            </h5>
                        </div>
                        <div class="col s12 m6 l6 right-align-md">
                            <ol class="breadcrumbs mb-0">
                                <li class="breadcrumb-item"><a

                                        href="{{route('dashboard.welcome') }}">@lang('site.dashboard')</a>
                                </li>

                                <li class="breadcrumb-item"><a
                                        href="{{ route('dashboard.planners_ratings.index') }}">  @lang('site.planners_ratings') </a>
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


                                                    <form action="{{ route('dashboard.planners_ratings.store') }}"
                                                          method="post"
                                                          enctype="multipart/form-data">

                                                        {{ csrf_field() }}
                                                        {{ method_field('post') }}


                                                        <div class="row">
                                                            <div class="col-md-6">

                                                                <label>@lang('site.start_at')</label>
                                                                <input type="date" name="datetime"
                                                                       class="form-control date"
                                                                       value="{{ old('datetime') }}">
                                                            </div>


                                                            <div class="col-md-6">
                                                                <label>@lang('site.number')</label>
                                                                <input type="number" name="rate" class="form-control"
                                                                       value="{{ old('rate') }}">
                                                            </div>
                                                        </div>

                                                        <div class="row">
                                                            <div class="col-md-6">
                                                                <label>@lang('site.customers')</label>
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

                                                            <div class="col-md-6">
                                                                <label>@lang('site.planers')</label>
                                                                <select name="planner_id" class="form-control select2">
                                                                    <option value="">@lang('site.select')</option>
                                                                    @foreach ( $planners as $key=>$customer)
                                                                        <option
                                                                            value="{{$key }}" {{ old('planner_id') == $key? 'selected' : '' }}>
                                                                            {{$customer }}
                                                                        </option>
                                                                    @endforeach
                                                                </select>
                                                            </div>


                                                        </div>


                                                        <div class="row">
                                                            <div class="col-md-6">
                                                                <label>@lang('site.description')</label>
                                                                <textarea name="description"
                                                                          class="form-control" id="summary-ckeditor"
                                                                          name="summary-ckeditor">{{ old('description') }}   </textarea>

                                                            </div>

                                                        </div>
                                                        <br>
                                                        <div class="row">
                                                            <div class="col-md-6">
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
@section('scripts')
    <script src="{{ asset('public/dashboard_files/js/jquery.min.js') }}"></script>

    <script>
        CKEDITOR.replace('summary-ckeditor');
    </script>

    <script>
        CKEDITOR.replace('summary-ckeditor1');
    </script>
@endsection

