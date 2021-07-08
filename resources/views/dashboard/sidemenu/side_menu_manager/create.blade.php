@extends('layouts.dashboard.app')

@section('styles')
    @parent
    @include('dashboard.sidemenu.inc.styles')
    <link rel="stylesheet" href="{{ asset('dashboard_files/plugins/bootstrap-iconpicker/css/bootstrap-iconpicker.css') }}"/>
@endsection

@section('content')
    <div class="content-wrapper">

        <section class="content-header">

            <h1>@lang('site.sidemenu_items')</h1>


        </section>

        <section class="content">
            <div class="row">

                <!-- THE ACTUAL CONTENT -->
                <div class="col-md-12">
                    <div class="box">
                        <div class="box-header with-border">
                            <h3 class="box-title">Menu Manager</h3>
                        </div>

                        <div class="box-body">
                            <div class="col-sm-12">
                                <div class="panel panel-default">

                                    <div class="panel-heading"> Add Menu</div>

                                    <div class="panel-body">
                                        {{-- OPEN FORM --}}
                                        @include('partials._errors')

                                        <form action="{{ route('dashboard.sidemenuitem.store') }}" method="post" enctype="multipart/form-data">

                                        {{ csrf_field() }}
                                        {{ method_field('post') }}

                                            <div class="form-group">
                                                <label>@lang('site.roles')</label>
                                                <select name="roles[]" class="form-control select2" multiple>
                                                <!-- <option value="">@lang('site.all_roles')</option> -->
                                                    @foreach ($roles as $role)
                                                        <option value="{{ $role->id }}" {{ old('role_id') == $role->id ? 'selected' : '' }}>
                                                            {{ $role->name }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                            </div>

                                            <div class="form-group">
                                                <label>@lang('site.sections')</label>
                                                <select name="section_id" class="form-control select2">

                                                    @foreach ( $sections as $key=>$section)
                                                        <option value="{{$key }}"  >
                                                            {{$section }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                            </div>

                                            <div class="form-group">
                                                <label>@lang('site.name_ar')</label>
                                                <input type="text" name="name_ar" class="form-control" value="{{ old('name_ar') }}">
                                            </div>

                                            <div class="form-group">
                                                <label>@lang('site.name_en')</label>
                                                <input type="text" name="name_en" class="form-control" value="{{ old('name_en') }}">
                                            </div>

                                            <div class="form-group">
                                                <label>@lang('site.icon_picker')</label>
                                                <div>
                                                    <button class="btn btn-default " role="iconpicker" data-icon="{{ old('icon') ? old('icon') : '' }}" data-iconset="fontawesome"></button>
                                                    <input
                                                        type="hidden"
                                                        name="icon"
                                                        value="{{ old('icon') ? old('icon') : '' }}"
                                                    >
                                                </div>

                                            </div>

                                            <div class="form-group">
                                                <label>@lang('site.route_path')</label>
                                                <input type="text" name="path" class="form-control" value="{{ old('path') }}">
                                            </div>

                                            <div class="form-group">
                                                <div class="checkbox">
                                                    <label>
                                                        <input type="hidden" name="is_active" value="0">
                                                        <input type="checkbox" value="1"
                                                               name="is_active"
                                                               @if(old('is_active') == 1 )
                                                                checked="checked"
                                                                @endif
                                                        > @lang('site.active')
                                                    </label>
                                                </div>
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

                                                                        <div class="form-group {{ $index == 0 ? 'active' : '' }}"
                                                                             id="{{ $model }}">

                                                                            @foreach ($maps as $map)
                                                                                <label><input type="checkbox" name="permissions[]"
                                                                                              value="{{ $map . '_' . $model }}"> @lang('site.' . $map)
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
                                                <button type="submit" class="btn btn-primary"><i class="fa fa-plus"></i>
                                                    @lang('site.add')</button>
                                            </div>

                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <!-- THE ACTUAL CONTENT -->

                @foreach(\App\Helpers\MenuHelper::allSections() as $section)
                    <div class="col-md-4">
                        <div class="box">
                            <div class="box-header with-border">
                                <h3 class="box-title">{{$section->name}}</h3>
                            </div>

                            <div class="box-body">
                                <div>
                                    @include('dashboard.sidemenu.side_menu_manager.inc.active_items',
                                    ['activeMenus' => \App\Helpers\MenuHelper::menuActiveForSection($section->id),
                                    'sectionId' => $section->id."_active"])
                                    @include('dashboard.sidemenu.side_menu_manager.inc.disabled_items',
                                    ['disabledMenus' => \App\Helpers\MenuHelper::menuDisabledForSection($section->id),
                                    'sectionId' => $section->id."_inactive"])
                                </div>
                            </div>
                        </div><!-- /.box -->
                    </div>
                @endforeach
            </div>
        </section>

@endsection

@section('scripts')
    @parent
            @include('dashboard.sidemenu.inc.scripts')
            <script src="{{ asset('dashboard_files/plugins/bootstrap-iconpicker/js/iconset/iconset-fontawesome-all.js') }}"></script>
            <script src="{{ asset('dashboard_files/plugins/bootstrap-iconpicker/js/bootstrap-iconpicker.js') }}"></script>
            <script>
                jQuery(document).ready(function($) {
                    $('button[role=iconpicker]').on('change', function(e) {
                        $(this).siblings('input[type=hidden]').val(e.icon);
                    });
                });
            </script>
@endsection
