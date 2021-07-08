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
                                <span>@lang('site.add')  @lang('site.notification')</span>
                            </h5>
                        </div>
                        <div class="col s12 m6 l6 right-align-md">
                            <ol class="breadcrumbs mb-0">
                                <li class="breadcrumb-item"><a

                                        href="{{route('dashboard.welcome') }}">@lang('site.dashboard')</a>
                                </li>

                                <li class="breadcrumb-item"><a
                                        href="{{ route('dashboard.notifications.index') }}"> @lang('site.notification') </a>
                                </li>

                                <li class="breadcrumb-item active"><a> @lang('site.send_notification') </a>
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

                                                    <form class="form-horizontal"
                                                          action="{{ route('dashboard.notifications.store') }}"
                                                          method="POST"
                                                          enctype="multipart/form-data">
                                                        @csrf
                                                        <div class="panel-body">
                                                            <div class="form-group">
                                                                <div class="row">

                                                                    <label class="col-sm-1 control-label"
                                                                           for="name">{{__('site.name')}}
                                                                        ({{__('site.customers')}})</label>
                                                                    <div class="col-sm-9">
                                                                        <select class="form-control selectpicker all-clients"
                                                                                name="user_names[]" multiple
                                                                                data-selected-text-format="count"
                                                                               data-select="false"
                                                                                data-actions-box="true" required id="persons">
{{--                                                                            <option  type="checkbox"  class="select-all-clients" >Select All</option>--}}

                                                                        @foreach($customers as $key=>$user)

                                                                                <option value="{{$key}}">{{$user}}</option>
                                                                            @endforeach
                                                                        </select>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="form-group">
                                                                <div class="row">


                                                                    <label class="col-sm-1 control-label"
                                                                           for="subject">@lang('site.title_ar')</label>

                                                                    <div class="col-sm-4">
                                                                        <input type="text" id="subject" name="title_ar"
                                                                               class="form-control">
                                                                    </div>

                                                                    <label class="col-sm-1 control-label"
                                                                           for="subject">@lang('site.title_en')</label>

                                                                    <div class="col-sm-4">
                                                                        <input type="text" id="subject" name="title_en"
                                                                               class="form-control">
                                                                    </div>


                                                                </div>
                                                            </div>
                                                            <div class="form-group">
                                                                <div class="row">


                                                                    <label class="col-sm-1 control-label"
                                                                           for="subject">@lang('site.description_ar')</label>
                                                                    <div class="col-sm-4">

                                                                                            <textarea
                                                                                                class="textarea form-control"
                                                                                                id="summary-ckeditor"
                                                                                                name="content_ar"
                                                                                                class="form-control"
                                                                                                required></textarea>
                                                                    </div>


                                                                    <label class="col-sm-1 control-label"
                                                                           for="subject">@lang('site.description_en')</label>
                                                                    <div class="col-sm-4">

                                                                                            <textarea
                                                                                                class="textarea form-control"
                                                                                                id="summary-ckeditor1"
                                                                                                name="content_en"
                                                                                                class="form-control"
                                                                                                required></textarea>
                                                                    </div>


                                                                </div>
                                                            </div>
                                                        </div>
                                                        <br>

                                                        <div class="panel-footer text-right">
                                                            <button class="btn btn-purple"
                                                                    type="submit">{{__('site.send')}}</button>
                                                        </div>

                                                    </form>


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
        $(document).ready(function () {
            $('.textarea').summernote({
                // set editor height
                minHeight: 900,             // set minimum height of editor
                // maxHeight: 1000,
            });
            $('.textarea')
        });
        $('.multiple-select-dropdown li').first().on('click', function(){
            alert(5);
            if ($(this).hasClass('selected')) {
                $('.multiple-select-dropdown li').not(this).addClass('selected');
            } else {
                $('.multiple-select-dropdown li').not(this).removeClass('selected');
            }
        })
        // $('#selectAll').click(function() {
        //     $('#persons option').prop('selected', true);
        // });
        //
        // $("select").on("click", function(){
        //     if ($(this).find(":selected").text() == "Select All"){
        //         if ($(this).attr("data-select") == "false")
        //             $(this).attr("data-select", "true").find("option").prop("selected", true);
        //         else
        //             $(this).attr("data-select", "false").find("option").prop("selected", false);
        //     }
        // });


    </script>


@endsection
