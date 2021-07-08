@extends('frontend.master')

@section('content')

    <div class="subHeader">
        <div class="container">
            <div class="subHeader__flex">
                <div class="subHeader__content">
                    <h2 class="subHeader__title">@lang('site.points')</h2>
                </div>
            </div>
        </div>
    </div>

    <div class="points">
        <div class="container">
            <form class="points__form">
                <div class="points__formContent">
                    <input type="text" class="points__point" value="0 @lang('site.point')">
                </div>
                <div class="points__formButtons">
                    <input type="submit" class="points__submit points__btnCoupon" value="Transfer to a coupon">
                    <input type="submit" class="points__submit points__btnCoupon" value="Transfer request to funds">
                </div>
            </form>
        </div>
    </div>



@endsection
