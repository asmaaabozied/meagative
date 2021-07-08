@extends('layouts.dashboard.app')

@section('content')

    <div class="content-wrapper">

        <section class="content-header">

            <h1>@lang('site.events')</h1>

            <ol class="breadcrumb">
                <li><a href="{{ route('dashboard.welcome') }}"><i class="fa fa-dashboard"></i> @lang('site.dashboard')
                    </a>
                </li>
                <li><a href="{{ route('dashboard.events.index') }}"> @lang('site.events')</a></li>
                <li class="active">@lang('site.edit')</li>
            </ol>
        </section>

        <section class="content">

            <div class="box box-primary">

                <div class="box-header">
                    <h3 class="box-title">@lang('site.edit')</h3>
                </div><!-- end of box header -->

                <div class="box-body">

                    @include('partials._errors')

                    <form action="{{ route('dashboard.events.update', $event->id) }}" method="post"
                          enctype="multipart/form-data">

                        {{ csrf_field() }}
                        {{ method_field('put') }}


                        <div class="row">
                            <div class="col-md-6">
                                <label>@lang('site.name_ar')</label>
                                <input type="text" name="name_ar" class="form-control" value="{{ $event->name_ar }}">
                            </div>
                            <div class="col-md-6">
                                <label>@lang('site.name_en')</label>
                                <input type="text" name="name_en" class="form-control" value="{{ $event->name_en }}">
                            </div>

                        </div>


                        <div class="row">
                            <div class="col-md-6">
                                <label>@lang('site.description_ar')</label>
                                <textarea name="description_ar"
                                          class="form-control" id="summary-ckeditor"
                                          name="summary-ckeditor">{{ $event->description_ar }}   </textarea>

                            </div>
                            <div class="col-md-6">
                                <label>@lang('site.description_en')</label>
                                <textarea name="description_en"
                                          class="form-control" id="summary-ckeditor1"
                                          name="summary-ckeditor">{{ $event->description_en }}  </textarea>

                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <label>@lang('site.image')</label>
                                <input type="file" name="image" class="form-control" value="{{ old('image') }}">
                            </div>

                        </div>
                        <br>

                        <div class="form-group">
                            <button type="button" class="btn btn-warning mr-1"
                                    onclick="history.back();">
                                <i class="fa fa-backward"></i> @lang('site.back')
                            </button>
                            <button type="submit" class="btn btn-primary"><i class="fa fa-edit"></i>
                                @lang('site.edit')</button>
                        </div>


                    </form><!-- end of form -->

                </div><!-- end of box body -->

            </div><!-- end of box -->

        </section><!-- end of content -->

    </div><!-- end of content wrapper -->
    <!-- <script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script> -->

@endsection
