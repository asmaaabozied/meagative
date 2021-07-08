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
                            <h5 class="breadcrumbs-title mt-0 mb-0"><span>@lang('site.add')  @lang('site.events')</span>
                            </h5>
                        </div>
                        <div class="col s12 m6 l6 right-align-md">
                            <ol class="breadcrumbs mb-0">
                                <li class="breadcrumb-item"><a

                                        href="{{route('dashboard.welcome') }}">@lang('site.dashboard')</a>
                                </li>

                                <li class="breadcrumb-item"><a
                                        href="{{ route('dashboard.events.index') }}"> @lang('site.events') </a>
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


                                                    <form action="{{ route('dashboard.events.store') }}" method="post"
                                                          enctype="multipart/form-data">

                                                        {{ csrf_field() }}
                                                        {{ method_field('post') }}
                                                        <div class="row">
                                                            <div class="input-field col m6 s12">
                                                                <label>@lang('site.name_ar')</label>
                                                                <br>
                                                                <input type="text" name="name_ar" class="form-control"
                                                                       value="{{ old('name_ar') }}">
                                                            </div>
                                                            <div class="input-field col m6 s12">
                                                                <label>@lang('site.name_en')</label>
                                                                <br>
                                                                <input type="text" name="name_en" class="form-control"
                                                                       value="{{ old('name_en') }}">
                                                            </div>


                                                            <div class="input-field col m6 s12">
                                                                <label>@lang('site.description_ar')</label>
                                                                <br>
                                                                <textarea name="description_ar"
                                                                          class="form-control" id="summary-ckeditor"
                                                                          name="summary-ckeditor">{{ old('description_ar') }}   </textarea>

                                                            </div>
                                                            <div class="input-field col m6 s12">
                                                                <label>@lang('site.description_en')</label>
                                                                <br>
                                                                <textarea name="description_en"
                                                                          class="form-control" id="summary-ckeditor1"
                                                                          name="summary-ckeditor">{{ old('description_en') }}  </textarea>

                                                            </div>


                                                            <div class="input-field col m6 s12">
                                                                <label>@lang('site.customers')</label>
                                                                <br>
                                                                <select name="customer_id" class="form-control select2">

                                                                    @foreach ( $customers as $key=>$country)
                                                                        <option value="{{$key }}">
                                                                            {{$country }}
                                                                        </option>
                                                                    @endforeach
                                                                </select>
                                                            </div>

                                                            <div class="input-field col m6 s12">
                                                                <label>@lang('site.image')</label>
                                                                <br>
                                                                <br>
                                                                <input type="file" name="image" class="form-control"
                                                                       value="{{ old('image') }}">
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

