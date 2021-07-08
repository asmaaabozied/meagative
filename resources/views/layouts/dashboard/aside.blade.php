<aside class="sidenav-main nav-expanded nav-lock nav-collapsible sidenav-dark sidenav-active-rounded">
    <div class="brand-sidebar">
        <h1 class="logo-wrapper"><a class="brand-logo darken-1" href="{{ route('dashboard.welcome') }}"><img
                    class="hide-on-med-and-down "
                    src="{{asset('style/app-assets/images/logo/materialize-logo.png')}}"
                    alt="materialize logo"/><img
                    class="show-on-medium-and-down hide-on-med-and-up"
                    src="{{asset('style/app-assets/images/logo/materialize-logo-color.png')}}"
                    alt="materialize logo"/><span
                    class="logo-text hide-on-med-and-down">@lang('site.title')</span></a><a class="navbar-toggler"
                                                                                            href="#"><i
                    class="material-icons"></i></a></h1>
    </div>
    <ul class="sidenav sidenav-collapsible leftside-navigation collapsible sidenav-fixed menu-shadow" id="slide-out"
        data-menu="menu-navigation" data-collapsible="accordion">
        {{--                <li class="active bold"><a href="{{ route('dashboard.welcome') }}"><i--}}
        {{--                            class="fa fa-home"></i><span>@lang('site.dashboard')</span></a></li>--}}


        <li class="bold"><a class="waves-effect waves-cyan "
                            href="{{ route('dashboard.welcome') }}"><i
                    class="material-icons">settings_input_svideo</i><span
                    class="menu-title" data-i18n="@lang('site.dashboard')">@lang('site.dashboard')</span></a>
        </li>

        <li class="bold active open"><a class="collapsible-header waves-effect waves-cyan " href="JavaScript:void(0)"
                                        tabindex="0"><i class="material-icons">filter_tilt_shift</i>

                <span class="menu-title" data-i18n="Menu levels"> @lang('site.settings')</span>
{{--                <span class="badge badge pill purple float-right mr-10 count">3</span>--}}
            </a>
            <div class="collapsible-body" style="display: block;">
                <ul class="collapsible collapsible-sub" data-collapsible="accordion">
                    <li class="bold"><a class="collapsible-header waves-effect waves-cyan " href="JavaScript:void(0)">
                            <i class="material-icons">person_outline</i><span class="menu-title"
                                                                              data-i18n="@lang('site.management')">@lang('site.management')</span>
{{--                            <span class="badge badge pill purple float-right mr-10 count">2</span>--}}
                        </a>
                        <div class="collapsible-body">
                            <ul class="collapsible collapsible-sub" data-collapsible="accordion">
                                @if (auth()->user()->hasPermission('read_roles'))
                                    <li><a href="{{ route('dashboard.roles.index') }}"><i class="material-icons">radio_button_unchecked</i><span>@lang('site.roles')</span></a>
                                    </li>
                                @endif
                                @if (auth()->user()->hasPermission('read_users'))
                                    <li><a href="{{ route('dashboard.users.index') }}"><i class="material-icons">radio_button_unchecked</i><span>@lang('site.users')</span></a>
                                    </li>
                                @endif


                            </ul>
                        </div>
                    </li>
                    <li class="bold"><a class="collapsible-header waves-effect waves-cyan " href="JavaScript:void(0)">
                            <i class="material-icons">import_contacts</i><span class="menu-title"
                                                                               data-i18n="@lang('site.geography')">@lang('site.geography')</span>
{{--                            <span class="badge badge pill purple float-right mr-10 count">2</span>--}}
                        </a>
                        <div class="collapsible-body">
                            <ul class="collapsible collapsible-sub" data-collapsible="accordion">
                                @if (auth()->user()->hasPermission('read_countries'))
                                    <li><a href="{{ route('dashboard.countries.index') }}"><i class="material-icons">radio_button_unchecked</i><span>@lang('site.countries')</span></a>
                                    </li>
                                @endif
                                @if (auth()->user()->hasPermission('read_cities'))
                                    <li><a href="{{ route('dashboard.cities.index') }}"><i class="material-icons">radio_button_unchecked</i><span>@lang('site.cities')</span></a>
                                    </li>
                                @endif


                            </ul>
                        </div>
                    </li>


                    @if (auth()->user()->hasPermission('read_settings'))

                        <li class="bold"><a class="waves-effect waves-cyan"
                                            href="{{ route('dashboard.settings.index') }}"><i
                                    class="material-icons"> filter_tilt_shift</i><span class="menu-title"
                                                                                       data-i18n="@lang('site.settings')">@lang('site.settings')</span></a>

                        </li>


                    @endif

                </ul>
            </div>
        </li>


        <li class="bold active open"><a class="collapsible-header waves-effect waves-cyan " href="JavaScript:void(0)"
                                        tabindex="0"><i class="material-icons">lock_open</i>

                <span class="menu-title" data-i18n="Menu levels"> @lang('site.control')</span>
{{--                <span class="badge badge pill purple float-right mr-10 count">3</span>--}}
            </a>
            <div class="collapsible-body" style="display: block;">
                <ul class="collapsible collapsible-sub" data-collapsible="accordion">

                    @if (auth()->user()->hasPermission('read_sliders'))

                        <li class="bold"><a class="waves-effect waves-cyan "
                                            href="{{ route('dashboard.sliders.index') }}"><i
                                    class="material-icons">border_all</i><span
                                    class="menu-title" data-i18n="Basic Tables">@lang('site.sliders')</span></a>
                        </li>
                    @endif

                    @if (auth()->user()->hasPermission('read_pages'))

                        <li class="bold"><a class="waves-effect waves-cyan" href="{{ route('dashboard.pages.index') }}"><i
                                    class="material-icons">border_all</i><span class="menu-title"
                                                                               data-i18n="@lang('site.pages')">@lang('site.pages')</span></a>
                        </li>
                    @endif


                    @if (auth()->user()->hasPermission('read_offers'))

                        <li class="bold"><a class="waves-effect waves-cyan"
                                            href="{{ route('dashboard.offers.index') }}"><i
                                    class="material-icons">image_aspect_ratio</i><span class="menu-title"
                                                                                       data-i18n="@lang('site.offers')">@lang('site.offers')</span></a>
                        </li>
                    @endif


                </ul>
            </div>
        </li>


        @if (auth()->user()->hasPermission('read_customers'))
            <li class="bold"><a class="collapsible-header waves-effect waves-cyan " href="JavaScript:void(0)"
                                tabindex="0"><i class="material-icons">add_to_queue</i><span class="menu-title"
                                                                                             data-i18n="Extra Components">@lang('site.customers')</span>
{{--                    <span class="badge badge pill purple float-right mr-10 count">3</span>--}}

                </a>
                <div class="collapsible-body" style="">
                    <ul class="collapsible collapsible-sub" data-collapsible="accordion">
                        <li><a href="{{ route('dashboard.customers.index') }}"><i class="material-icons">radio_button_unchecked</i><span
                                    data-i18n="@lang('site.customers')">@lang('site.customers')</span></a>
                        </li>
                        <li><a href="{{ route('dashboard.customers_emails.index') }}"><i class="material-icons">radio_button_unchecked</i><span
                                    data-i18n="@lang('site.customers_emails')">@lang('site.customers_emails')</span></a>
                        </li>

                        <li><a href="{{ route('dashboard.customers_banks.index') }}"><i class="material-icons">radio_button_unchecked</i><span
                                    data-i18n="@lang('site.customers_banks')">@lang('site.customers_banks')</span></a>
                        </li>

                    </ul>
                </div>
            </li>
        @endif


        @if (auth()->user()->hasPermission('read_services'))
            <li class="bold"><a class="collapsible-header waves-effect waves-cyan " href="JavaScript:void(0)"
                                tabindex="0"><i class="material-icons">image_aspect_ratio</i><span class="menu-title"
                                                                                                   data-i18n="Extra Components">@lang('site.services')</span>
{{--                    <span class="badge badge pill purple float-right mr-10 count">2</span>--}}
</a>
                <div class="collapsible-body" style="">
                    <ul class="collapsible collapsible-sub" data-collapsible="accordion">
                        <li><a href="{{ route('dashboard.services.index') }}"><i class="material-icons">radio_button_unchecked</i><span
                                    data-i18n="@lang('site.services')">@lang('site.services')</span></a>
                        </li>
                        <li><a href="{{ route('dashboard.services_ratings.index') }}"><i class="material-icons">radio_button_unchecked</i><span
                                    data-i18n="@lang('site.services_ratings')">@lang('site.services_ratings')</span></a>
                        </li>

                        <li><a href="{{ route('dashboard.servicescategories.index') }}"><i class="material-icons">radio_button_unchecked</i><span
                                    data-i18n="@lang('site.categories')">@lang('site.categories')</span></a>
                        </li>


                    </ul>
                </div>
            </li>
        @endif



        @if (auth()->user()->hasPermission('read_planers'))


            <li class="bold"><a class="collapsible-header waves-effect waves-cyan " href="JavaScript:void(0)"
                                tabindex="0"><i class="material-icons">image_aspect_ratio</i><span class="menu-title"
                                                                                                   data-i18n="Extra Components">@lang('site.planers')</span>
{{--                    <span class="badge badge pill purple float-right mr-10 count">2</span>--}}

</a>
                <div class="collapsible-body" style="">
                    <ul class="collapsible collapsible-sub" data-collapsible="accordion">
                        <li><a href="{{ route('dashboard.planers.index') }}"><i class="material-icons">radio_button_unchecked</i><span
                                    data-i18n="@lang('site.planers')">@lang('site.planers')</span></a>
                        </li>
                        <li><a href="{{ route('dashboard.planners_ratings.index') }}"><i class="material-icons">radio_button_unchecked</i><span
                                    data-i18n="@lang('site.planners_ratings')">@lang('site.planners_ratings')</span></a>
                        </li>

                        @if (auth()->user()->hasPermission('read_inquiries'))

                            <li class="bold"><a class="waves-effect waves-cyan "
                                                href="{{ route('dashboard.inquiries.index') }}"
                                                target="_blank"><i class="material-icons">radio_button_unchecked</i><span class="menu-title"
                                                                                                                   data-i18n="@lang('site.inquiries')">@lang('site.inquiries')</span></a>
                            </li>
                        @endif

                    </ul>
                </div>
            </li>
        @endif
        @if (auth()->user()->hasPermission('read_halls'))

        <li class="bold open"><a class="collapsible-header waves-effect waves-cyan " href="JavaScript:void(0)"
                                 tabindex="0"><i class="material-icons">chrome_reader_mode</i><span class="menu-title"
                                                                                                    data-i18n="@lang('site.halls')">@lang('site.halls')</span>
{{--                <span class="badge badge pill purple float-right mr-10 count">11</span>--}}

</a>

            <div class="collapsible-body" style="">
                <ul class="collapsible collapsible-sub" data-collapsible="accordion">
                    @if (auth()->user()->hasPermission('read_typevenues'))
                        <li><a href="{{ route('dashboard.typevenues.index') }}"><i class="material-icons">radio_button_unchecked</i><span
                                    data-i18n="@lang('site.typevenues')">@lang('site.typevenues')</span></a>
                        </li>
                    @endif
                    @if (auth()->user()->hasPermission('read_halls'))

                        <li><a href="{{ route('dashboard.halls.index') }}"><i class="material-icons">radio_button_unchecked</i><span
                                    data-i18n="@lang('site.halls')">@lang('site.halls')</span></a>
                        </li>
                    @endif
                    @if (auth()->user()->hasPermission('read_halls'))
                        <li><a href="{{ route('dashboard.venuesdays.index') }}"><i class="material-icons">radio_button_unchecked</i><span
                                    data-i18n="@lang('site.venuesdays')">@lang('site.venuesdays')</span></a>
                        </li>

                    @endif
                    @if (auth()->user()->hasPermission('read_halls'))
                        <li><a href="{{ route('dashboard.venuesdate.index') }}"><i class="material-icons">radio_button_unchecked</i><span
                                    data-i18n="@lang('site.venuesdate')">@lang('site.venuesdate')</span></a>
                        </li>

                    @endif
                    @if (auth()->user()->hasPermission('read_halls'))
                        <li><a href="{{ route('dashboard.dates_off.index') }}"><i class="material-icons">radio_button_unchecked</i><span
                                    data-i18n="@lang('site.dates_off')">@lang('site.dates_off')</span></a>
                        </li>

                    @endif

                    @if (auth()->user()->hasPermission('read_halls'))

                        <li><a href="{{ route('dashboard.requirements.index') }}"><i class="material-icons">radio_button_unchecked</i><span
                                    data-i18n="@lang('site.requirements')">@lang('site.requirements')</span></a>
                        </li>
                    @endif



                    @if (auth()->user()->hasPermission('read_events'))

                        <li><a href="{{ route('dashboard.events.index') }}"><i class="material-icons">radio_button_unchecked</i><span
                                    data-i18n="@lang('site.events')">@lang('site.events')</span></a>
                        </li>
                    @endif


                    @if (auth()->user()->hasPermission('read_halls'))
                        <li><a href="{{ route('dashboard.foods.index') }}"><i class="material-icons">radio_button_unchecked</i><span
                                    data-i18n="@lang('site.foods')">@lang('site.foods')</span></a>
                        </li>

                    @endif


                    @if (auth()->user()->hasPermission('read_halls'))
                        <li><a href="{{ route('dashboard.venues_includes.index') }}"><i class="material-icons">radio_button_unchecked</i><span
                                    data-i18n="@lang('site.venues_includes')">@lang('site.venues_includes')</span></a>
                        </li>

                    @endif


                    @if (auth()->user()->hasPermission('read_halls'))

                        <li><a href="{{ route('dashboard.venues_decoration.index') }}"><i class="material-icons">radio_button_unchecked</i><span
                                    data-i18n="@lang('site.venues_decoration')">@lang('site.venues_decoration')</span></a>
                        </li>
                    @endif

                    @if (auth()->user()->hasPermission('read_halls'))

                        <li class="bold"><a class="waves-effect waves-cyan "
                                            href="{{ route('dashboard.venues_ratings.index') }}"><i
                                    class="material-icons">radio_button_unchecked</i><span
                                    class="menu-title" data-i18n="Contacts">@lang('site.venues_ratings')</span></a>
                        </li>

                    @endif

                </ul>
            </div>
        </li>
        @endif
        @if (auth()->user()->hasPermission('read_notifications'))
        <li class="bold"><a class="collapsible-header waves-effect waves-cyan " href="JavaScript:void(0)"
                            tabindex="0"><i class="material-icons">content_paste</i><span class="menu-title"
                                                                                          data-i18n="Extra Components">@lang('site.notification')</span>
{{--                <span class="badge badge pill purple float-right mr-10 count">2</span>--}}

            </a>
            <div class="collapsible-body" style="">
                <ul class="collapsible collapsible-sub" data-collapsible="accordion">
                    <li><a href="{{ route('dashboard.notifications.create') }}"><i class="material-icons">radio_button_unchecked</i><span
                                data-i18n="@lang('site.notification')">@lang('site.notification')</span></a>
                    </li>
                    <li><a href="{{ route('dashboard.notifications.index') }}"><i class="material-icons">radio_button_unchecked</i><span
                                data-i18n="@lang('site.notification')"> @lang('site.add1') @lang('site.notification')</span></a>
                    </li>

                </ul>
            </div>
        </li>
        @endif

        @if (auth()->user()->hasPermission('read_categories'))


            <li class="bold"><a class="waves-effect waves-cyan " href="{{ route('dashboard.catogeries.index') }}"><i
                        class="material-icons">today</i><span class="menu-title"
                                                              data-i18n="Calendar">@lang('site.categories')</span></a>
            </li>
        @endif

        @if (auth()->user()->hasPermission('read_booking'))
            <li class="bold"><a class="waves-effect waves-cyan " href="{{ route('dashboard.booking.index') }}"><i
                        class="material-icons">person_outline</i><span
                        class="menu-title" data-i18n="User Profile">@lang('site.booking')</span></a>
            </li>

        @endif





        @if (auth()->user()->hasPermission('read_inquiries'))


            <li class="bold"><a class="waves-effect waves-cyan "
                                href="{{ route('dashboard.contact_us.index') }}"
                                target="_blank"><i class="material-icons">import_contacts</i><span class="menu-title"
                                                                                                   data-i18n=@lang('site.contact')">@lang('site.contact')</span></a>
            </li>
 @endif

            @if (auth()->user()->hasPermission('read_paymentss'))
         <li class="bold"><a
                        class="waves-effect waves-cyan" href="{{ route('dashboard.paymentss.index') }}"><i
                            class="material-icons">invert_colors</i><span class="menu-title"
                                                                          data-i18n="@lang('site.payments')">@lang('site.payments')</span></a>

            </li>

        @endif
        @if (auth()->user()->hasPermission('read_Usersvisitor'))

        <li class="bold"><a class="waves-effect waves-cyan" href="{{ route('dashboard.Usersvisitor.index') }}"><i
                    class="material-icons">face</i><span class="menu-title"
                                                         data-i18n="@lang('site.visitors')">@lang('site.visitors')</span></a>

        </li>
        @endif


        <li class="bold"><a class="collapsible-header waves-effect waves-cyan " href="JavaScript:void(0)"
                            tabindex="0"><i class="material-icons">import_contacts</i><span class="menu-title"
                                                                                            data-i18n="Extra Components">@lang('site.report')</span>
{{--                <span class="badge badge pill purple float-right mr-10 count">4</span>--}}

            </a>
            <div class="collapsible-body" style="">
                <ul class="collapsible collapsible-sub" data-collapsible="accordion">
                    @if (auth()->user()->hasPermission('read_halls'))
                        <li><a href="{{ route('dashboard.reportvenues') }}"><i class="material-icons">radio_button_unchecked</i><span
                                    data-i18n="@lang('site.venues')">@lang('site.venues')</span></a>
                        </li>
                    @endif
                    @if (auth()->user()->hasPermission('create_planers'))
                        <li><a href="{{ route('dashboard.reportplanners') }}"><i
                                    class="material-icons">radio_button_unchecked</i><span
                                    data-i18n="@lang('site.planers')">@lang('site.planers')</span></a>
                        </li>
                    @endif

                    @if (auth()->user()->hasPermission('create_services'))
                        <li><a href="{{ route('dashboard.reportservice') }}"><i
                                    class="material-icons">radio_button_unchecked</i><span
                                    data-i18n="@lang('site.services')">@lang('site.services')</span></a>
                        </li>
                    @endif

                    @if (auth()->user()->hasPermission('create_customers'))
                        <li><a href="{{ route('dashboard.reportcustomers') }}"><i
                                    class="material-icons">radio_button_unchecked</i><span
                                    data-i18n="@lang('site.customers')">@lang('site.customers')</span></a>
                        </li>
                    @endif
                </ul>
            </div>
        </li>


    </ul>

</aside>
