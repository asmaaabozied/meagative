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
                            <h5 class="breadcrumbs-title mt-0 mb-0"><span>@lang('site.add')  @lang('site.roles')</span>
                            </h5>
                        </div>
                        <div class="col s12 m6 l6 right-align-md">
                            <ol class="breadcrumbs mb-0">
                                <li class="breadcrumb-item"><a

                                        href="{{route('dashboard.welcome') }}">@lang('site.dashboard')</a>
                                </li>

                                <li class="breadcrumb-item"><a
                                        href="{{ route('dashboard.roles.index') }}">  @lang('site.roles') </a>
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

                                                    <form action="{{ route('dashboard.roles.store') }}" method="post"
                                                          enctype="multipart/form-data">

                                                        {{ csrf_field() }}
                                                        {{ method_field('post') }}

                                                        <div class="form-group">
                                                            <label>@lang('site.name')</label>
                                                            <input type="text" name="name" class="form-control"
                                                                   value="{{ old('name') }}">
                                                        </div>
                                                        <div class="form-group">
                                                            <label>@lang('site.display_name')</label>
                                                            <input type="text" name="display_name" class="form-control"
                                                                   value="{{ old('display_name') }}">
                                                        </div>
                                                        <div class="form-group">
                                                            <label>@lang('site.description')</label>
                                                            <input type="text" name="description" class="form-control"
                                                                   value="{{ old('description') }}">
                                                        </div>
                                                        <div class="form-group">
                                                            <h3>@lang('site.permissions')</h3>
                                                            <div class="form-group">




                                                                <ul class="nav ">
                                                                    <table class="table table-hover table-bordered">


                                                                        @foreach ($models as $index=>$model)
                                                                            <tr>
                                                                                <td>
                                                                                    <li class="form-group {{ $index == 0 ? 'active' : '' }}">@lang('site.' . $model)</li>
                                                                                </td>
                                                                                <td>

                                                                                    <div
                                                                                        class="form-group {{ $index == 0 ? 'active' : '' }}"
                                                                                        id="{{ $model }}">

                                                                                        @foreach ($maps as $map)
                                                                                            <label>
                                                                                                <input
                                                                                                    type="checkbox"
                                                                                                    name="permissions[]"
                                                                                                    value="{{ $map . '_' . $model }}"> @lang('site.' . $map)
                                                                                                <span></span>
                                                                                            </label>


                                                                                        @endforeach

                                                                                    </div>
                                                                                </td>

                                                                            </tr>
                                                                        @endforeach
                                                                    </table>

                                                                </ul>

                                                                <div class="tab-content">

                                                                    @foreach ($models as $index=>$model)


                                                                    @endforeach

                                                                </div><!-- end of tab content -->

                                                            </div><!-- end of nav tabs -->

                                                        </div>

                                                        <div class="form-group">
                                                            <button type="button" class="btn btn-warning mr-1"
                                                                    onclick="history.back();">
                                                                <i class="fa fa-backward"></i> @lang('site.back')
                                                            </button>
                                                            <button type="submit" class="btn btn-primary"><i
                                                                    class="fa fa-plus"></i> @lang('site.add')
                                                            </button>
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

