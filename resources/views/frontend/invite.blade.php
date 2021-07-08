@extends('frontend.master')

@section('content')


    <div class="subHeader">
        <div class="container">
            <div class="subHeader__flex">
                <div class="subHeader__content">
                    <h2 class="subHeader__title">@lang('site.Invite Friend')</h2>
                </div>
            </div>
        </div>
    </div>


    <div class="invite">
        <div class="container">

            <div class="invite__formContent site--boder">
                <form action="{{ route('invite.send') }}" method="post" class="invite__form">

                    {{ csrf_field() }}
                    {{ method_field('post') }}
                    <input type="text" class="invite__email site--input" placeholder="@lang('site.Enter your Email')"
                           name="email" required>

                    <input type="text" value="https://megavents.com/invitation/44" name="link" hidden>

                    <button type="submit" class="site--input btn btn-danger"
                            value="@lang('site.send invitation')">@lang('site.send invitation')


                </form>
            </div>
            <div class="invite__formContent site--boder">
                <label class="invite__label site--label">@lang('site.The invitation link')</label>

                <input type="submit" class="btn btn-danger site--input" value="@lang('site.copy link')"
                       onclick="copyToClipboard()">
                <input id="myInput" value="https://megavents.com/invitation/44" type="hidden">

            </div>
            <div class="invite__formContent">
                <input type="submit" class="btn btn-danger site--input" value="@lang('site.share')" data-toggle="modal"
                       data-target="#myModal">
            </div>

        </div>
    </div>

    <div id="myModal" class="modal fade" role="dialog">
        <div class="modal-dialog">

            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title"></h4>

                </div>
                <h3 style="text-align: center"> @lang('site.share')</h3>

                <div class="modal-body">
                    <!-- Go to www.addthis.com/dashboard to customize your tools -->
                    <div class="addthis_inline_share_toolbox_kfyp"></div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">@lang('site.close')</button>
                </div>
            </div>

        </div>
    </div>

@endsection
@section('scripts')

    <!-- Go to www.addthis.com/dashboard to customize your tools -->
    <script type="text/javascript" src="//s7.addthis.com/js/300/addthis_widget.js#pubid=ra-604ca9c77f150866"></script>



    <script>


        function copyToClipboard() {
            var copyText = document.getElementById("myInput");
            copyText.type = "text";
            copyText.select();
            document.execCommand("copy");
            copyText.type = "hidden";
        }

        function genericSocialShare(url) {
            window.open(url, 'sharer', 'toolbar=0,status=0,width=648,height=395');
            return true;
        }
    </script>

@endsection
