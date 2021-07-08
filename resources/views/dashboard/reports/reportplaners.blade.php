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
                            <h5 class="breadcrumbs-title mt-0 mb-0"><span>@lang('site.show')  @lang('site.planers')</span>
                            </h5>
                        </div>
                        <div class="col s12 m6 l6 right-align-md">
                            <ol class="breadcrumbs mb-0">
                                <li class="breadcrumb-item"><a

                                        href="{{route('dashboard.welcome') }}">@lang('site.dashboard')</a>
                                </li>
                                @if (auth()->user()->hasPermission('create_planers'))
                                    <li class="breadcrumb-item"><a
                                            href="{{ route('dashboard.planers.index') }}"> @lang('site.planers') </a>
                                    </li>
                                @endif
                                <li class="breadcrumb-item active"><a> @lang('site.show') </a>
                                </li>

                            </ol>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col s12">
                <div class="container">
                    <div class="section">


                        <div class="users-list-filter">
                            <div class="card-panel">
                                <form action="{{route('dashboard.reports.planners')}}" method="post">
                                    @csrf
                                    <div class="row">
                                        <div class="input-field col m3 s12">
                                            <label for="firstName">@lang('site.start_at') <span
                                                    class="red-text">*</span></label>
                                            <br>
                                            <input type="date" id="firstName" name="date1" class="date" >
                                        </div>
                                        <div class="input-field col m3 s12">
                                            <label for="lastName">@lang('site.end_at')<span
                                                    class="red-text">*</span></label>
                                            <br>
                                            <input type="date" id="lastName" class="date" name="date2" >
                                        </div>

                                        <div class="input-field col m3 s12">
                                            <label for="phone">@lang('site.phone')<span
                                                    class="red-text">*</span></label>
                                            <br>
                                            <input type="text" id="phone"  name="phone" >
                                        </div>

                                        <div class="input-field col m3 s12">
                                            <label for="email">@lang('site.email')<span
                                                    class="red-text">*</span></label>
                                            <br>
                                            <input type="text" id="email"  name="email" >
                                        </div>


                                        <div class="input-field col m3 s12">
                                            <label>@lang('site.countries')</label>
                                            <br>
                                            <select name="country_id" class="form-control select2">
                                                <option value="">@lang('site.select2')</option>
                                                @foreach ($countries as $key=>$role)
                                                    <option
                                                        value="{{$key}}" {{ old('country_id') == $key? 'selected' : '' }}>
                                                        {{ $role}}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>

                                        <div class="input-field col m3 s12">
                                            <label>@lang('site.customers')</label>
                                            <br>
                                            <select name="customer_id" class="form-control select2">
                                                <option value="">@lang('site.select')</option>
                                                @foreach ($customers as $key=>$role)
                                                    <option
                                                        value="{{$key}}" {{ old('customer_id') == $key? 'selected' : '' }}>
                                                        {{ $role}}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>

                                        <div class="input-field col m3 s12">
                                            <label>@lang('site.status')</label>
                                            <br>
                                            <select name="status" class="form-control select2">
                                                <option value="">@lang('site.select')</option>
                                                    <option
                                                        value="1">
                                                      @lang('site.active')
                                                    </option>

                                                <option
                                                    value="0">
                                                    @lang('site.inactive')
                                                </option>

                                            </select>
                                        </div>

                                        <div class="col m3 s12 mb-3">
<br><br>
                                            <button class="waves-effect waves dark btn btn-primary next-step"
                                                    type="submit">
                                                @lang('site.show')
                                                <i class="material-icons right">arrow_forward</i>
                                            </button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>

                        <!--tablecontents-->
                        <div class="row">
                            <div class="col s12">
                                <div id="badges" class="card card-tabs">
                                    <div class="card-content">
                                        <div class="card-title">
                                            <div class="row">
                                                @if ($planers->count() > 0)
                                                    <table class="table table-hover" id="table">
                                                        <thead>
                                                        <tr>
                                                            <th>#</th>
                                                            <th>@lang('site.name')</th>
                                                            <th>@lang('site.customers')</th>
                                                            <th>@lang('site.description')</th>
                                                            <th>@lang('site.address')</th>
                                                            <th>@lang('site.email')</th>
                                                            <th>@lang('site.phone')</th>
                                                            <th>@lang('site.country')</th>
                                                            <th>@lang('site.created_at')</th>
                                                            <th>@lang('site.status')</th>

                                                        </tr>
                                                        </thead>

                                                        <tbody>
                                                        @foreach ($planers as $index=>$type)
                                                            <tr>
                                                                <td>{{ $index + 1 }}</td>

                                                                <td>{{ $type->name_ar ?? '' }}</td>
                                                                <td>{{  $type->customer->name ?? ''}}</td>
                                                                <td>{{  Str::limit($type['description'],20)}}</td>

                                                                <td>{{  $type->address ?? ''}}</td>
                                                                <td>{{$type->email  ?? ''}}</td>
                                                                <td>{{$type->phone  ?? ''}}</td>
                                                                <td>{{ $type->country->name ?? ''}}</td>

                                                                <td>{{ isset($type->created_at) ? $type->created_at->diffForHumans() :''	 }}</td>
                                                                @if( $type->active==0)
                                                                    <td style="margin: 5px;"
                                                                        class="badge bg-red">@lang('site.inactive')</td>
                                                                @elseif( $type->active==1)
                                                                    <td style="margin: 5px;"
                                                                        class="badge bg-green">@lang('site.active')</td>
                                                                @endif


                                                            </tr>

                                                        @endforeach
                                                        </tbody>

                                                    </table><!-- end of table -->
                                                    <div style="text-align:center;">

                                                    </div>

                                                @else

                                                    <h2>@lang('site.no_data_found')</h2>

                                                @endif


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










