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
                                <span>@lang('site.edit')  @lang('site.categories')</span>
                            </h5>
                        </div>
                        <div class="col s12 m6 l6 right-align-md">
                            <ol class="breadcrumbs mb-0">
                                <li class="breadcrumb-item"><a

                                        href="{{route('dashboard.welcome') }}">@lang('site.dashboard')</a>
                                </li>

                                <li class="breadcrumb-item"><a
                                        href="{{ route('dashboard.catogeries.index') }}"> @lang('site.categories') </a>
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


                                                    <form
                                                        action="{{ route('dashboard.catogeries.update', $catogery->id) }}"
                                                        method="post"
                                                        enctype="multipart/form-data">

                                                        {{ csrf_field() }}
                                                        {{ method_field('put') }}


                                                        <div class="form-group">

                                                            <label>@lang('site.name_ar')</label>
                                                            <input type="text" name="name_ar" class="form-control"
                                                                   value="{{ $catogery->name_ar }}">
                                                        </div>


                                                        <div class="form-group">
                                                            <label>@lang('site.name_en')</label>
                                                            <input type="text" name="name_en" class="form-control"
                                                                   value="{{  $catogery->name_en }}">
                                                        </div>


                                                        <div class="form-group">
                                                            <label>@lang('site.link')</label>
                                                            <input type="text" name="site_link" class="form-control"
                                                                   value="{{ $catogery->site_link }}">
                                                        </div>

                                                        <div class="form-group">
                                                            <label>@lang('site.app')</label>
                                                            <input type="text" name="app_link" class="form-control"
                                                                   value="{{ $catogery->app_link }}">
                                                        </div>
                                                        <br>
                                                        <div class="form-group">
                                                            <a class="mr-2" href="#">
                                                                <img src="{{asset('uploads/'. $catogery->image)}}"
                                                                     alt="users avatar" class="z-depth-4 circle" height="100" width="100">
                                                            </a>
                                                            <br>
                                                            <label>@lang('site.image')</label>
                                                            <input type="file" name="image" class="form-control"
                                                                   value="{{ old('image') }}">
                                                        </div>

                                                        <br>
                                                        <div class="row">
                                                            <div class="form-group">
                                                                <button type="button" class="btn btn-warning mr-1"
                                                                        onclick="history.back();">
                                                                    <i class="fa fa-backward"></i> @lang('site.back')
                                                                </button>
                                                                <button type="submit" class="btn btn-primary"><i
                                                                        class="fa fa-edit"></i>
                                                                    @lang('site.edit')</button>
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

