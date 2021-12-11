@extends('layouts.dashboard.app')

@section('content')

    <div class="page-wrapper" style="min-height: 422px;" data-select2-id="16">
        <div class="content container-fluid" data-select2-id="15">

            <!-- Page Header -->
            <div class="page-header">
                <div class="row">
                    <div class="col-sm-12">
                        <h3 class="page-title">@lang('site.cards')</h3>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a
                                    href="{{route('dashboard.welcome') }}">@lang('site.dashboard')</li>
                            <li class="breadcrumb-item"><a
                                    hhref="{{ route('dashboard.cards.index') }}"> @lang('site.cards') </a></li>
                            <li class="breadcrumb-item active"><a> @lang('site.edit') </a></li>
                        </ul>
                    </div>
                </div>
            </div>
            <!-- /Page Header -->

            <div class="row" data-select2-id="14">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">@lang('site.cards')</h4>
                            @include('partials._errors')

                            <form
                                action="{{ route('dashboard.cards.update', $card->id) }}"
                                method="post"
                                enctype="multipart/form-data">

                                {{ csrf_field() }}
                                {{ method_field('put') }}


                                <div class="row">
                                    <div class="col-md-6">

                                        <div class="form-group">
                                            <label>@lang('site.card_number')</label>
                                            <input type="text" name="card_number" class="form-control"
                                                   value="{{ $card->card_number}}">
                                        </div>
                                        <div class="form-group">
                                            <label>@lang('site.place_issue')</label>
                                            <input type="text" name="place_issue" class="form-control"
                                                   value="{{ $card->place_issue}}">
                                        </div>
                                        <div class="form-group">
                                            <label>@lang('site.date_of_issue')</label>
                                            <div id="result">
                                                <input type="date" name="date_of_issue" class="form-control date"

                                                       value="{{ $card->date_of_issue}}"
                                                >

                                            </div>
                                        </div>

                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>@lang('site.expiry_date')</label>
                                            <input type="date" name="expiry_date" class="form-control date" value="{{ $card->expiry_date}}">
                                        </div>

                                        <div class="form-group">



                                            <label>@lang('site.citizens')</label>
                                            <select name="citizen_id" class="form-control select2">
                                                <option value="">@lang('site.select')</option>
                                                @foreach ($citizens as $key=>$citizen)
                                                    <option
                                                        value="{{$key}}" {{ $card->citizen_id== $key? 'selected' : '' }}>
                                                        {{ $citizen->first_name_ar}}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>


                                    </div>
                                </div>

                                <div class="text-end mt-4">
                                    <div class="form-group">
                                        <button type="button" class="btn btn-warning mr-1"
                                                onclick="history.back();">
                                            <i class="fa fa-backward"></i> @lang('site.back')
                                        </button>
                                        <button type="submit" class="btn btn-primary"><i
                                                class="fa fa-plus"></i>
                                            @lang('site.edit')</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
