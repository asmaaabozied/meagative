@extends('layouts.dashboard.app')

@section('styles')
    @include('dashboard.sidemenu.inc.styles')
@endsection
@section('content')
    <div class="content-wrapper">

        <section class="content-header">

            <h1>@lang('site.sidemenu_sections')</h1>


        </section>

        <section class="content">
            <div class="row">

                <!-- THE ACTUAL CONTENT -->
                <div class="col-md-12">
                    <div class="box">
                        <div class="box-header with-border">
                            <h3 class="box-title">Section Manager</h3>
                        </div>

                        <div class="box-body">
                            <div class="col-sm-4">
                                @include('dashboard.sidemenu.side_section_manager.inc.active_items', ['sectionId' => "1_active"])
                                @include('dashboard.sidemenu.side_section_manager.inc.disabled_items', ['sectionId' => "1_inactive"])
                            </div>

                            <div class="col-sm-8">
                                <div class="panel panel-default">

                                    <div class="panel-heading"> Add Section</div>

                                    <div class="panel-body">
                                        {{-- OPEN FORM --}}
                                        @include('partials._errors')

                                        <form action="{{ route('dashboard.sidemenusection.store') }}" method="post" enctype="multipart/form-data">

                                        {{ csrf_field() }}
                                        {{ method_field('post') }}

                                            <div class="form-group">
                                                <label>@lang('site.name_ar')</label>
                                                <input type="text" name="name_ar" class="form-control" value="{{ old('name_ar') }}">
                                            </div>

                                            <div class="form-group">
                                                <label>@lang('site.name_en')</label>
                                                <input type="text" name="name_en" class="form-control" value="{{ old('name_en') }}">
                                            </div>

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
                        </div><!-- /.box-body -->
                    </div><!-- /.box -->
                </div>
            </div>
        </section>

@endsection

@section('scripts')
            @include('dashboard.sidemenu.inc.scripts')
@endsection
