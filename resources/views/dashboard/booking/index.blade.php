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
                            <h5 class="breadcrumbs-title mt-0 mb-0"><span>{{$title}}</span></h5>
                        </div>
                        <div class="col s12 m6 l6 right-align-md">
                            <ol class="breadcrumbs mb-0">
                                <li class="breadcrumb-item"><a
                                        href="{{route('dashboard.welcome') }}">@lang('site.dashboard')</a>
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
                                    <div class="card-content pb-1">
                                        <h4 class="card-title mb-0">{{$title}} ( <span
                                                class="count">{{$count ?? ''}}</span>)
                                            <div class="select-action float-right">
                                                <!-- Dropdown Trigger -->
                                                <a class="dropdown-trigger grey-text" href="#" data-target="dropdown1">
                                                    <i class="material-icons">more_vert</i>
                                                </a>
                                                <ul id="dropdown1" class="dropdown-content" tabindex="0" style="">
                                                    <li tabindex="0"><a href="?status=4">@lang('site.all')</a></li>
                                                    <li tabindex="0"><a href="?status=0">@lang('site.new')</a></li>

                                                    <li tabindex="0"><a href="?status=1">@lang('site.accept')</a></li>
                                                    <li tabindex="0"><a href="?status=2">@lang('site.rejected')</a></li>
                                                </ul>
                                                <!-- Dropdown Structure -->

                                            </div>
                                        </h4>
                                    </div>
                                    <div class="ml-1 mr-1 mb-1">
                                        {!! $dataTable->table([
                                                      'class'=>'table table-striped table-hover table-bordered'

                                                     ], true) !!}
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

@push('scripts')
    <script src="{{asset('style/app-assets/vendors/data-tables/js/jquery.dataTables.min.js')}}"></script>

    <script
        src="{{asset('style/app-assets/vendors/data-tables/extensions/responsive/js/dataTables.responsive.min.js')}}"></script>
    <script src="{{asset('style/app-assets/js/custom/custom-script.js')}}"></script>

    <script src="{{asset('app-assets/vendors/data-tables/js/datatables.checkboxes.min.js')}}"></script>

    <!-- END THEME  JS-->
    <!-- BEGIN PAGE LEVEL JS-->
    <script src="{{asset('style/app-assets/js/scripts/page-users.js')}}'"></script>
    <link rel="stylesheet" href="https://cdn.datatables.net/buttons/1.0.3/css/buttons.dataTables.min.css">
    <script src="https://cdn.datatables.net/buttons/1.0.3/js/dataTables.buttons.min.js"></script>
    <script src="/vendor/datatables/buttons.server-side.js"></script>




    <script>


        var myTable = null;

        function drawTableCallback(e) {
            //delete
            $('.update').click(function (e) {

                var that = $(this)

                e.preventDefault();

                var n = new Noty({
                    text: "@lang('site.confirm_update')",
                    type: "warning",
                    killer: true,
                    buttons: [
                        Noty.button("@lang('site.yes')", 'btn btn-success mr-2', function () {
                            that.closest('form').submit();
                        }),

                        Noty.button("@lang('site.no')", 'btn btn-primary mr-2', function () {
                            n.close();
                        })
                    ]
                });

                n.show();

            });//end of delete

            //delete
            $('.delete').click(function (e) {

                console.log("Tapped Delete button")
                var that = $(this)

                e.preventDefault();

                var n = new Noty({
                    text: "@lang('site.confirm_delete')",
                    type: "error",
                    killer: true,
                    buttons: [
                        Noty.button("@lang('site.yes')", 'btn btn-success mr-2', function () {
                            that.closest('form').submit();
                        }),

                        Noty.button("@lang('site.no')", 'btn btn-primary mr-2', function () {
                            n.close();
                        })
                    ]
                });

                n.show();

            });//end of delete
        }

        $('#example').dataTable({
            "language": {
                "search": "Filter records:"
            }, buttons: [
                'print', 'copy'
            ]
        });
    </script>
    {!! $dataTable->scripts() !!}
@endpush


