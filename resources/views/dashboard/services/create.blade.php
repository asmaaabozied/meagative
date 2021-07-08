




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
                            <h5 class="breadcrumbs-title mt-0 mb-0"><span>@lang('site.add')  @lang('site.services')</span>
                            </h5>
                        </div>
                        <div class="col s12 m6 l6 right-align-md">
                            <ol class="breadcrumbs mb-0">
                                <li class="breadcrumb-item"><a

                                        href="{{route('dashboard.welcome') }}">@lang('site.dashboard')</a>
                                </li>

                                <li class="breadcrumb-item"><a
                                        href="{{ route('dashboard.services.index') }}"> @lang('site.services') </a>
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

                                                    <form action="{{ route('dashboard.services.store') }}" method="post"
                                                          enctype="multipart/form-data">

                                                        {{ csrf_field() }}
                                                        {{ method_field('post') }}

                                                        <div class="row">
                                                            <div class="col-md-6">
                                                                <label>@lang('site.name_ar')</label>
                                                                <input type="text" name="name_ar" class="form-control"
                                                                       value="{{ old('name_ar') }}" id="fn">
                                                            </div>
                                                            <div class="col-md-6">
                                                                <label>@lang('site.name_en')</label>
                                                                <input type="text" name="name_en" class="form-control"
                                                                       value="{{ old('name_en') }}">
                                                            </div>

                                                        </div>

                                                        <div class="row">
                                                            <div class="col-md-6">
                                                                <label>@lang('site.categories')</label>
                                                                <select name="category_id" class="form-control select2">
                                                                    <option value="">@lang('site.select')</option>
                                                                    @foreach ( $cats as $key=>$country)
                                                                        <option
                                                                            value="{{$key }}" {{ old('category_id') == $key? 'selected' : '' }}>
                                                                            {{$country }}
                                                                        </option>
                                                                    @endforeach
                                                                </select>
                                                            </div>

                                                            <div class="col-md-6">
                                                                <label>@lang('site.customers')</label>
                                                                <select name="customer_id" class="form-control select2">
                                                                    <option value="">@lang('site.select')</option>
                                                                    @foreach ( $customers as $key=>$city)
                                                                        <option
                                                                            value="{{$key }}" {{ old('customer_id') == $key? 'selected' : '' }}>
                                                                            {{$city }}
                                                                        </option>
                                                                    @endforeach
                                                                </select>
                                                            </div>
                                                        </div>


                                                        <div class="row">
                                                            <div class="col-md-6">
                                                                <label>@lang('site.price')</label>
                                                                <input type="number" name="price" class="form-control"
                                                                       value="{{ old('price') }}">
                                                            </div>


                                                            <div class="col-md-6">
                                                                <label>@lang('site.image')</label>
                                                                <input type="file" name="image" class="form-control"
                                                                       value="{{ old('image') }}">
                                                            </div>

                                                        </div>
                                                        <div class="row">
                                                            <div class="col-md-6">
                                                                <label>@lang('site.description_ar')</label>
                                                                <textarea name="description_ar"
                                                                          class="form-control" id="summary-ckeditor"
                                                                          name="summary-ckeditor">{{ old('description_ar') }}   </textarea>

                                                            </div>
                                                            <div class="col-md-6">
                                                                <label>@lang('site.description_en')</label>
                                                                <textarea name="description_en"
                                                                          class="form-control" id="summary-ckeditor1"
                                                                          name="summary-ckeditor">{{ old('description_en') }}  </textarea>

                                                            </div>
                                                        </div>

                                                        <div class="row">
                                                            <div class="col-md-6">

                                                                <label>
                                                                    <input
                                                                        type="checkbox"
                                                                        name="views"
                                                                        value="1"> @lang('site.views')
                                                                    <span></span>
                                                                </label>

                                                            </div>
                                                        </div>
                                                        <br>


                                                        <div class="form-group">
                                                            <button type="button" class="btn btn-warning mr-1"
                                                                    onclick="history.back();">
                                                                <i class="fa fa-backward"></i> @lang('site.back')
                                                            </button>
                                                            <button type="submit" class="btn btn-primary"><i
                                                                    class="fa fa-plus"></i>
                                                                @lang('site.add')</button>
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








{{--@extends('layouts.dashboard.app')--}}

{{--@section('content')--}}

{{--    <div class="content-wrapper">--}}

{{--        <section class="content-header">--}}

{{--            <h1>@lang('site.services')</h1>--}}

{{--            <ol class="breadcrumb">--}}
{{--                <li><a href="{{ route('dashboard.welcome') }}"><i class="fa fa-dashboard"></i> @lang('site.dashboard')--}}
{{--                    </a>--}}
{{--                </li>--}}
{{--                <li><a href="{{ route('dashboard.services.index') }}"> @lang('site.services')</a></li>--}}
{{--                <li class="active">@lang('site.add')</li>--}}
{{--            </ol>--}}
{{--        </section>--}}

{{--        <section class="content">--}}

{{--            <div class="box box-primary">--}}

{{--                <div class="box-header">--}}
{{--                    <h3 class="box-title">@lang('site.add')</h3>--}}
{{--                </div><!-- end of box header -->--}}

{{--                <div class="box-body">--}}

{{--                    @include('partials._errors')--}}

{{--                    <form action="{{ route('dashboard.services.store') }}" method="post" enctype="multipart/form-data">--}}

{{--                        {{ csrf_field() }}--}}
{{--                        {{ method_field('post') }}--}}

{{--                        <div class="row">--}}
{{--                            <div class="col-md-6">--}}
{{--                                <label>@lang('site.name_ar')</label>--}}
{{--                                <input type="text" name="name_ar" class="form-control" value="{{ old('name_ar') }}">--}}
{{--                            </div>--}}
{{--                            <div class="col-md-6">--}}
{{--                                <label>@lang('site.name_en')</label>--}}
{{--                                <input type="text" name="name_en" class="form-control" value="{{ old('name_en') }}">--}}
{{--                            </div>--}}

{{--                        </div>--}}

{{--                        <div class="row">--}}
{{--                            <div class="col-md-6">--}}
{{--                                <label>@lang('site.categories')</label>--}}
{{--                                <select name="category_id" class="form-control select2">--}}
{{--                                    <option value="">@lang('site.select')</option>--}}
{{--                                    @foreach ( $cats as $key=>$country)--}}
{{--                                        <option value="{{$key }}" {{ old('category_id') == $key? 'selected' : '' }}>--}}
{{--                                            {{$country }}--}}
{{--                                        </option>--}}
{{--                                    @endforeach--}}
{{--                                </select>--}}
{{--                            </div>--}}

{{--                            <div class="col-md-6">--}}
{{--                                <label>@lang('site.customers')</label>--}}
{{--                                <select name="customer_id" class="form-control select2">--}}
{{--                                    <option value="">@lang('site.select')</option>--}}
{{--                                    @foreach ( $customers as $key=>$city)--}}
{{--                                        <option value="{{$key }}" {{ old('customer_id') == $key? 'selected' : '' }}>--}}
{{--                                            {{$city }}--}}
{{--                                        </option>--}}
{{--                                    @endforeach--}}
{{--                                </select>--}}
{{--                            </div>--}}
{{--                        </div>--}}


{{--                        <div class="row">--}}
{{--                            <div class="col-md-6">--}}
{{--                                <label>@lang('site.price')</label>--}}
{{--                                <input type="number" name="price" class="form-control" value="{{ old('price') }}">--}}
{{--                            </div>--}}


{{--                            <div class="col-md-6">--}}
{{--                                <label>@lang('site.image')</label>--}}
{{--                                <input type="file" name="image" class="form-control" value="{{ old('image') }}">--}}
{{--                            </div>--}}

{{--                        </div>--}}
{{--                        <div class="row">--}}
{{--                            <div class="col-md-6">--}}
{{--                                <label>@lang('site.description_ar')</label>--}}
{{--                                <textarea name="description_ar"--}}
{{--                                          class="form-control" id="summary-ckeditor"--}}
{{--                                          name="summary-ckeditor">{{ old('description_ar') }}   </textarea>--}}

{{--                            </div>--}}
{{--                            <div class="col-md-6">--}}
{{--                                <label>@lang('site.description_en')</label>--}}
{{--                                <textarea name="description_en"--}}
{{--                                          class="form-control" id="summary-ckeditor1"--}}
{{--                                          name="summary-ckeditor">{{ old('description_en') }}  </textarea>--}}

{{--                            </div>--}}
{{--                        </div>--}}


{{--                        <br>--}}


{{--                        <div class="form-group">--}}
{{--                            <button type="button" class="btn btn-warning mr-1"--}}
{{--                                    onclick="history.back();">--}}
{{--                                <i class="fa fa-backward"></i> @lang('site.back')--}}
{{--                            </button>--}}
{{--                            <button type="submit" class="btn btn-primary"><i class="fa fa-plus"></i>--}}
{{--                                @lang('site.add')</button>--}}
{{--                        </div>--}}

{{--                    </form><!-- end of form -->--}}

{{--                </div><!-- end of box body -->--}}

{{--            </div><!-- end of box -->--}}

{{--        </section><!-- end of content -->--}}

{{--    </div><!-- end of content wrapper -->--}}
{{--@endsection--}}
