
@if ($cities->count() > 0)
    <table class="table table-hover" id="table">

        <thead>
        <tr>
            <th>#</th>
            <th>@lang('site.name')</th>
            <th>@lang('site.code')</th>
            <th>@lang('site.countries')</th>
            <th>@lang('site.created_at')</th>
            <th>@lang('site.status')</th>
            {{--                                @if (auth()->user()->hasPermission('update_admins','delete_admins'))--}}

            <th>@lang('site.action')</th>
            {{--                                @endif--}}
        </tr>
        </thead>

        <tbody>
        @foreach ($cities as $index=>$city)
            <tr>
                <td>{{ $index + 1 }}</td>

                <td>{{ $lang=='ar'? $city->name_ar :$city->name_en}}</td>

                <td>{{ $city->code ?? '' }}</td>

                <td>{{ $lang=='ar'? $city->country->name_ar :$city->country->name_en}}</td>


                <td>{{ isset($city->created_at) ? $city->created_at->diffForHumans() :''	 }}</td>
                @if( $city->active==0)
                    <td style="margin: 5px;" class="badge bg-red">@lang('site.inactive')</td>
                @elseif( $city->active==1)
                    <td style="margin: 5px;" class="badge bg-green">@lang('site.active')</td>
                @endif

                <td>
                    <div class="dropdown">
                        <a class="btn btn-secondary" href="#" role="button" id="dropdownMenuLink4"
                           data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="fa fa-cog"></i>
                        </a>

                        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                            @if (auth()->user()->hasPermission('update_cities'))
                                <a href="{{ route('dashboard.cities.edit', $city->id) }}"
                                   class="btn btn-info btn-sm"><i
                                        class="fa fa-edit"></i> @lang('site.edit')</a>
                            @else
                                <a href="#" class="btn btn-info btn-sm disabled"><i
                                        class="fa fa-edit"></i> @lang('site.edit')</a>
                            @endif
                            <br>
                            @if (auth()->user()->hasPermission('update_cities'))
                                <form action="{{ route('dashboard.cities.block', $city->id) }}"
                                      method="post" style="display: inline-block">
                                    {{ csrf_field() }}
                                    {{ method_field('POST') }}

                                    @if( $city->active==1)
                                        <button type="submit" class="btn btn-warning update btn-sm">
                                            <i class="fa fa-ban"></i> @lang('site.block')
                                        </button>
                                    @elseif( $city->active==0)
                                        <button type="submit" class="btn btn-default update btn-sm">
                                            <i class="fa fa-user"></i> @lang('site.activate')
                                        </button>
                                    @endif

                                </form><!-- end of form -->
                            @else
                                <button class="btn btn-danger btn-sm disabled"><i
                                        class="fa fa-trash"></i> @lang('site.block')</button>
                            @endif
                            <br>
                            @if (auth()->user()->hasPermission('delete_cities'))
                                <form action="{{ route('dashboard.cities.destroy', $city->id) }}"
                                      method="post" style="display: inline-block">
                                    {{ csrf_field() }}
                                    {{ method_field('delete') }}
                                    <button type="submit" class="btn btn-danger delete btn-sm"><i
                                            class="fa fa-trash"></i> @lang('site.delete')</button>
                                </form><!-- end of form -->
                            @else
                                <button class="btn btn-danger btn-sm disabled"><i
                                        class="fa fa-trash"></i> @lang('site.delete')</button>
                            @endif

                        </div>
                    </div>

                </td>


            </tr>

        @endforeach
        </tbody>

    </table><!-- end of table -->
    <div style="text-align:center;">

    </div>

@else

    <h2>@lang('site.no_data_found')</h2>

@endif
