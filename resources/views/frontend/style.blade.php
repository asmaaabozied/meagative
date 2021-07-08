@extends('layouts.admin')
@section('content')
    <div class="col-xl-12 col-lg-12 col-sm-12  layout-spacing">
        <div class="widget-content widget-content-area br-6">
            <div class="row">
                <div class="col">
                    <x-show-text title="رقم القضية" :value="$lawyerCase['number']"></x-show-text>
                    <x-show-text :value="$lawyerCase['details']" title="صفه الموكل"></x-show-text>

                    <x-show-text title="نوع القضية" :value="$lawyerCase->type->name ?? ''"></x-show-text>
                    <x-show-text title="الاتعاب" :value="$lawyerCase['price']"></x-show-text>
                    <x-show-text title="اسم العميل" :value="$lawyerCase->client->name ?? ''"></x-show-text>

                    <x-show-text title="حاله الدعوه" :value="$lawyerCase->statuscase->name ?? ''"></x-show-text>

                    <x-show-text title="مدفوعات المصاريف"
                                 :value="$lawyerCase->expensepayment->sum('value') ?? ''"></x-show-text>

                    <x-show-text title="باقي المصاريف"

                                 :value="$lawyerCase->expensess->sum('value') - $lawyerCase->expensepayment->sum('value') ?? '' "></x-show-text>


                    {{--                    <div class="form-group">--}}
                    {{--                        --}}{{--                        <label class="font-weight-bold">الملاحظات</label>--}}
                    {{--                        <x-textarea name="description" :value="$lawyerCase['description']" title="موضوع الدعوه"--}}
                    {{--                                    width="100px">--}}

                    {{--                            <div class="border-width-2px">--}}
                    {{--                                {{$lawyerCase['description']}}--}}
                    {{--                            </div>--}}

                    {{--                        </x-textarea>--}}
                    {{--                    </div>--}}
                </div>
                <div class="col">
                    <x-show-text title="الخصم" :value="$lawyerCase->discount"></x-show-text>
                    <x-show-text title="الكود" :value="$lawyerCase->code"></x-show-text>


                    <x-show-text title="المدفوع" :value="$lawyerCase->payments->sum('value')"></x-show-text>
                    <x-show-text title=الباقي

                                 :value="$lawyerCase['price'] - $lawyerCase->payments->sum('value')"></x-show-text>

                    <x-show-text title="وضع القضيه" :value="$lawyerCase->lawercase->name ?? ''"></x-show-text>


                    <x-show-text title="تاريخ استلام القضيه" :value="$lawyerCase->date1"></x-show-text>

                    <x-show-text title="اجمالي المصاريف"
                                 :value="$lawyerCase->expensess->sum('value') ?? ''"></x-show-text>


                    <x-show-text title="تاريخ رفع الدعوه" :value="$lawyerCase->date2"></x-show-text>


                </div>


            </div>


            <div class="row">
                <div class="col-3">


                    <x-input-text name="number1" value="{{$lawyerCase['number1'] ?? ''}}"
                                  title="رقم القضيه اول درجه"></x-input-text>


                </div>
                <div class="col-3">

                    <x-input-text name="c1" value="{{$lawyerCase['c1'] ?? ''}}" title="الدائره"></x-input-text>

                </div>
                <div class="col-3">

                    <x-input-text name="cc1" value="{{$lawyerCase['cc1'] ?? ''}}" title="صفه الموكل"></x-input-text>

                </div>

                <div class="col-3">

                    <x-input-text name="qcount" value="{{$lawyerCase['qcount'] ?? ''}}"
                                  title="صفه الخصم"></x-input-text>

                </div>

            </div>

            <div class="row">
                <div class="col-3">


                    <x-input-text name="number2" value="{{$lawyerCase['number2'] ?? ''}}"
                                  title="رقم القضية في الاستئناف"></x-input-text>


                </div>
                <div class="col-3">

                    <x-input-text name="c2" value="{{$lawyerCase['c2'] ?? ''}}" title="الدائره"></x-input-text>

                </div>
                <div class="col-3">

                    <x-input-text name="cc2" value="{{$lawyerCase['cc2'] ?? ''}}" title="صفه الموكل"></x-input-text>

                </div>

                <div class="col-3">

                    <x-input-text name="qcount1" value="{{$lawyerCase['qcount1'] ?? ''}}"
                                  title="صفه الخصم"></x-input-text>

                </div>

            </div>


            <div class="row">
                <div class="col-3">


                    <x-input-text name="number3" value="{{$lawyerCase['number3'] ?? ''}}"
                                  title="رقم القضية في التمييز "></x-input-text>


                </div>
                <div class="col-3">

                    <x-input-text name="c3" value="{{$lawyerCase['c3'] ?? ''}}" title="الدائره"></x-input-text>

                </div>
                <div class="col-3">

                    <x-input-text name="cc3" value="{{$lawyerCase['cc3'] ?? ''}}" title="صفه الموكل"></x-input-text>

                </div>

                <div class="col-3">

                    <x-input-text name="qcount2" value="{{$lawyerCase['qcount2'] ?? ''}}"
                                  title="صفه الخصم"></x-input-text>

                </div>

            </div>

            <div class="row">


                <div class="col">

                    <div class="col">


                        <div class="form-group">
                            {{--                        <label class="font-weight-bold">الملاحظات</label>--}}
                            <x-textarea name="notes" :value="$lawyerCase['notes']" title="الملاحظات" width="100px">

                                <div class="border-width-2px">
                                    {{$lawyerCase['notes']}}
                                </div>

                            </x-textarea>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-xl-12 col-lg-12 col-sm-12  layout-spacing">
        <div class="widget-content widget-content-area br-6">

            <h3>اضافه مصروف جديد</h3>

            <form action="{{route('expensecases.store')}}" method="post">
                @csrf
                <x-input-number name="value" value="{{old('value')}}" title="قيمة المبلغ"></x-input-number>
                <x-input-text name="case_id" value="{{$lawyerCase['id']}}" title="القضيه"></x-input-text>

                <x-input-datetime name="date" value="{{old('date')}}" title="الوقت / التاريخ"></x-input-datetime>
                <div class="form-group">
                    <label for="details">التفاصيل: </label>
                    <textarea name="details" id="details" cols="30" rows="10"
                              class="form-control">{{old('details')}}</textarea>
                </div>
                <button type="submit" class="btn btn-outline-primary">حفظ</button>
                <button type="button" class="btn btn-outline-primary"
                        onclick="history.back();">
                    الرجوع
                </button>
            </form>


        </div>
    </div>




    <div class="col-xl-12 col-lg-12 col-sm-12  layout-spacing">
        <div class="widget-content widget-content-area br-6">

            <h3>اضافه مدفوعات المصاريف </h3>

            <form action="{{route('expensepayment.store')}}" method="post">
                @csrf
                <x-input-number name="value" value="{{old('value')}}" title="قيمة المبلغ"></x-input-number>
                <x-input-text name="case_id" value="{{$lawyerCase['id']}}" title="القضيه"></x-input-text>

                <x-input-datetime name="date" value="{{old('date')}}" title="الوقت / التاريخ"></x-input-datetime>
                <div class="form-group">
                    <label for="details">التفاصيل: </label>
                    <textarea name="details" id="details" cols="30" rows="10"
                              class="form-control">{{old('details')}}</textarea>
                </div>
                <button type="submit" class="btn btn-outline-primary">حفظ</button>
                <button type="button" class="btn btn-outline-primary"
                        onclick="history.back();">
                    الرجوع
                </button>
            </form>


        </div>
    </div>


    <div class="col-xl-12 col-lg-12 col-sm-12  layout-spacing">
        <div class="widget-content widget-content-area border-top-tab br-4">
            <ul class="nav nav-tabs mb-3 mt-3" id="borderTop" role="tablist">
                <li class="nav-item">
                    <a class="nav-link active" id="border-top-home-tab" data-toggle="tab" href="#border-top-home"
                       role="tab" aria-controls="border-top-home" aria-selected="true"><i data-feather="home"></i>المدفوعات</a>
                </li>


                <li class="nav-item">
                    <a class="nav-link" id="border-top-home-tabb-exp" data-toggle="tab" href="#border-top-homee-exp"
                       role="tab" aria-controls="border-top-home" aria-selected="true"><i data-feather="home"></i>المصروفات</a>
                </li>


                <li class="nav-item">
                    <a class="nav-link" id="border-top-home-tabb-exp2" data-toggle="tab" href="#border-top-homee-exp2"
                       role="tab" aria-controls="border-top-home" aria-selected="true"><i data-feather="home"></i>مدفوعات
                        المصاريف</a>
                </li>


                <li class="nav-item">
                    <a class="nav-link" id="border-top-profile-tab" data-toggle="tab" href="#border-top-profile"
                       role="tab" aria-controls="border-top-profile" aria-selected="false"><i data-feather="user"></i>المستندات</a>
                </li>
            </ul>
            <div class="tab-content" id="borderTopContent">
                <div class="tab-pane fade active show" id="border-top-home" role="tabpanel"
                     aria-labelledby="border-top-home-tab">
                    @include('cases.partials._payments')
                </div>


                <div class="tab-pane fade show show" id="border-top-homee-exp" role="tabpanel"
                     aria-labelledby="border-top-home-tabb">
                    @include('cases.partials.expense')
                </div>


                <div class="tab-pane fade show show show" id="border-top-homee-exp2" role="tabpanel"
                     aria-labelledby="border-top-home-tabbb">
                    @include('cases.partials.expensepay')
                </div>


                <div class="tab-pane fade" id="border-top-profile" role="tabpanel"
                     aria-labelledby="border-top-profile-tab">
                    @include('cases.partials._docs')
                </div>
            </div>

        </div>
    </div>



    <br>


    <div class="col-xl-12 col-lg-12 col-sm-12  layout-spacing">
        <div class="widget-content widget-content-area border-top-tab br-4">
            <ul class="nav nav-tabs mb-3 mt-3" id="borderBottomTabs" role="tablist">

                @foreach(\App\Model\Typecourt::get()->pluck('name','id') as $key=>$value)
                    <li class="nav-item">
                        <a class="nav-link @if($key === 1) active @endif"
                           data-id="{{$key}}"
                           id="typecourt_{{$key}}"
                           data-toggle="tab"
                           href="#typecourt_tab_{{$key}}"
                           role="tab"
                           aria-controls="typecourt_tab_{{$key}}"
                           aria-selected="true">
                            <i data-feather="typecourt_tab_{{$key}}"></i>{{$value}}
                        </a>
                    </li>
                @endforeach

            </ul>
            <div class="tab-content" id="borderBottomContent">
                @foreach(\App\Model\Typecourt::get()->pluck('name','id') as $key=>$value)
                    <div class="tab-pane fade @if($key === 1) active show @endif" id="typecourt_tab_{{$key}}"
                         role="tabpanel" aria-labelledby="typecourt_{{$key}}">
                        <table id="typecourt_table_{{$key}}" class="table table-hover non-hover" style="width:100%">
                            <thead>
                            <tr>
                                <th>الاسم</th>
                                <th>التاريخ</th>
                                <th>ملاحظات</th>
                                <th>سبب</th>

                            </tr>
                            </thead>
                            <tbody>

                            </tbody>
                        </table>

                    </div>
                @endforeach
            </div>
        </div>


    </div>


@endsection
@push('javascript')


    <script type="text/javascript">
        $(document).ready(function () {

            $("[id^='typecourt_']").click(function () {
                let type_id = this.dataset.id;


                let route_link = "{{route('getSeessiots',['typecourt' => ':id'])}}";
                route_link = route_link.replace(':id', type_id);

                console.log("Table ID: " + '#typecourt_table_' + type_id)
                $('#typecourt_table_' + type_id).dataTable({
                    "ajax": {
                        "url": route_link
                    },
                    "columns": [
                        {"data": "name"},
                        {"data": "created_at"},

                        {"data": "notes"},
                        {"data": "reason"},

                    ]
                })
                // $.ajax({
                //     method:'get',
                //     url: route_link,
                //     success:function(data){
                //         $('#TypeCourtTable').empty();
                //           data.forEach(function(c){
                //               $('#TypeCourtTable').append('<p>'+c.id+'</p>');
                //               $('#TypeCourtTable').append('<p>'+c.name+'</p>');
                //
                //           })
                //
                //
                //     },
                //     error:function(err){
                //         console.log(err);
                //     }
                // })

            });
        });
    </script>
@endpush

