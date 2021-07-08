@extends('frontend.master')

@section('content')

    <div class="subHeader">
        <div class="container">
            <div class="subHeader__flex">
                <div class="subHeader__content">
                    <h2 class="subHeader__title">@lang('site.Message Details')</h2>
                </div>
            </div>
        </div>
    </div>

    <div class="messageDetails">
        <div class="container messageDetails__container">
            <div class="messageDetails__items">
                <div class="messageDetails__item">
{{--                    <h3 class="messages__title">Inquiry about 510050</h3>--}}
                    <div class="messages__flex site--flex">
                        <p class="messages__text"><span class="site--bold">@lang('site.sender'):</span>{{ Auth::guard('customer')->loginUsingId(1)->name}}</p>
{{--                        <p class="messages__text"><span class="site--bold">sent date:</span>22-02-2021 - 17:31:58</p>--}}

                    </div>
                    <br>
                    @foreach($messages as $message)
                    <div class="messageDetails__sender">
                        <p class="messageDetails__sentName">{{$message->customer->name ?? ''}}</p>
                        <p class="messageDetails__sentDate">{{$message->created_at ?? ''}}</p>
                        <p class="messageDetails__text">{{$message->content ?? ''}}</p>

                    </div>
                        <br>
                    @endforeach
                </div>
            </div>
            <form class="messageDetails__form" action="{{route('message.store')}}" method="post">

                    {{ csrf_field() }}
                    {{ method_field('post') }}
                <div class="messageDetails__formContent">
                    <input type="text" class="messageDetails__send" placeholder="enter reply" name="contents">
                    <i  > <button type="submit" class="fas fa-reply messageDetails__sendIcon">  </button> </i>
                </div>
            </form>
        </div>
    </div>
@endsection
