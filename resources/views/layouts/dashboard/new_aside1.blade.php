
<aside class="main-sidebar">

    <section class="sidebar">

        {{--        <div class="user-panel">--}}
        {{--            <div class="pull-left image">--}}
        {{--                --}}{{--                <img src="{{asset(auth()->user()->getImagePathAttribute()) }}" class="img-circle" alt="User Image">--}}
        {{--            </div>--}}
        {{--            <div class="pull-left info">--}}
        {{--                <p>@lang('site.title')</p>--}}
        {{--                <a href="#"><i class="fa fa-circle text-success"></i> Online</a>--}}
        {{--            </div>--}}
        {{--        </div>--}}


        <ul class="sidebar-menu" data-widget="tree">

            <li><a href="{{ route('dashboard.welcome') }}"><i
                        class="fa fa-home"></i><span>@lang('site.dashboard')</span></a></li>


            @foreach(\App\Helpers\MenuHelper::getSideMenu() as $key => $value)
            <li class="header">{{ $key }}</li>
            @foreach($value as $item)
                <li class="{{(count((array)$item->children))?"treeview":""}} {{ (\Request::is($item->path))?"active":""}}">
                    <a href="{{  url("{$item->path}") }}"><i class="fa {{$item->icon}}"></i><span>{{$item->name}}</span> @if(count((array)$item->children))<i class="fa fa-angle-left pull-right"></i>@endif</a>
                    @if(count((array)$item->children))
                        <ul class="treeview-menu">
                            @foreach($item->children as $child)
                                <li class="{{(count((array)$child->children))?"treeview":""}} {{ (\Request::is($child->path))?"active":""}}">
                                    <a href="{{ url("{$child->path}") }}"><i class="fa {{$child->icon}}"></i><span>{{$child->name}}</span> @if(count((array)$child->children))<i class="fa fa-angle-left pull-right"></i>@endif</a>
                                    @if(count((array)$child->children))
                                        <ul class="treeview-menu">
                                            @foreach($child->children as $subChild)
                                                <li>
                                                    <a href="{{ url("{$subChild->path}") }}"><i class="fa {{$subChild->icon}}"></i><span>{{$subChild->name}}</span></a>
                                                </li>
                                            @endforeach
                                        </ul>
                                    @endif
                                </li>
                            @endforeach
                        </ul>
                    @endif

                </li>
            @endforeach
            @endforeach

        </ul>

    </section>

</aside>
