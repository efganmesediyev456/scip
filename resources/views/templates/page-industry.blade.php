
@extends('layouts.page')

@section('content')

<main class="industrial__park inner__page">
    <div class="container">
        <ul class="breadcrump">
            {!! breadcrumb_generator($page) !!}

        </ul>
        <div class="row">
            <div class="inner__column__left">
                <div class="custom__sidebar">
                    <ul>
                        {!! sidebar_generator($page) !!}
                    </ul>
                </div>
            </div>
            <div class="inner__column__right">
                <div class="inner__tabs mb-xs-16 mb-lg-32">
                    <div class="tabs">
                        <div class="tab active" data-toggle="industrial_park" data-order="1">Haqqında</div>
                        <div class="tab" data-toggle="industrial_park" data-order="2">Prioritetlər</div>
                        <div class="tab" data-toggle="industrial_park" data-order="3">Baş plan</div>
                        <div class="tab" data-toggle="industrial_park" data-order="4">İnfrastruktur</div>
                        <div class="tab" data-toggle="industrial_park" data-order="5">Loqistik imkanlar</div>
                        @if($page->posts->where('type',\App\Models\Post::TYPES['selected_products'] )->count() > 1)
                        <div class="tab" data-toggle="industrial_park" data-order="6">Seçilmiş məhsullar</div>
                        @endif
                        <div class="tab" data-toggle="industrial_park" data-order="7">Rezidentlər</div>
                    </div>
                </div>
                <div class="tab__contents">
                    <div class="tab__content inner__page__column active" data-toggle="industrial_park" data-order="1">


                        @php($industry_about=$page->posts->where('type',\App\Models\Post::TYPES['industry_about'])->first())






                        <div class="inner__page__title mb-24"> {{ localized($industry_about?->getField('title')->value,decode: true)}}  </div>
                        <div class="inner__text mb-24">
                           {!! localized($industry_about?->getField('content')->value,decode: true) !!}
                        </div>
                        <div class="row">
                            <div class="col-lg-4 mb-xs-16 mb-lg-0">
                                <div class="custom__card">
                                    <div class="title">{{localized($industry_about?->getField('investment_volume')->value,decode: true)}}</div>
                                    <div class="text">Investisiya həcmi</div>
                                </div>
                            </div>
                            <div class="col-lg-4 mb-xs-16 mb-lg-0">
                                <div class="custom__card">
                                    <div class="title">{{localized($industry_about?->getField('workplaces')->value,decode: true)}}</div>
                                    <div class="text">İş yerləri</div>
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="custom__card">
                                    <div class="title">{{localized($industry_about?->getField('area')->value,decode: true)}}</div>
                                    <div class="text">Ərazi</div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="tab__content inner__page__column" data-toggle="industrial_park" data-order="2">
                        <div class="inner__page__title mb-24">Prioritet fəaliyyət istiqamətləri</div>
                        <div class="row">
                            @php($priorities=$page->posts->where('type',\App\Models\Post::TYPES['priorities']))

                            @foreach($priorities as $p)
                            <div class="col-lg-6 mb-24">
                                <div class="priority__card">
                                    <div class="title">{{$p->getField('number')->value}}</div>
                                    <div class="text">{{localized($p?->getField('content')->value,decode: true)}}</div>
                                </div>
                            </div>

                                @endforeach

                        </div>
                    </div>
                    <div class="tab__content inner__page__column" data-toggle="industrial_park" data-order="3">
                        @php($plan=$page->posts->where('type',\App\Models\Post::TYPES['plan'])->first())

                        <div class="inner__page__title mb-24">{{localized($plan?->getField('title')->value,decode: true)}}</div>
                        <div>
                            {!! localized($plan?->getField('content')->value,decode: true) !!}
                        </div>
                    </div>
                    <div class="tab__content inner__page__column" data-toggle="industrial_park" data-order="4">
                        <div class="custom__accordions">

                            @php($infrastructures=$page->posts->where('type',\App\Models\Post::TYPES['infrastructure']))


                            @foreach($infrastructures as $key=>$inf)
                            <div class="accordion" id="id-{{$key}}">
                                <div class="accordion__header">
                                    <div class="custom__row">
                                        <div class="accordion__icon">
                                            <div class="d-flex"><i class="{{$inf->getField('icon')->value}}"></i></div>
                                        </div>
                                        <div class="accordion__title">
                                            <div class="title">{{localized($inf->getField('title')->value,decode: true)}}</div>
                                            <div class="sub__title">{{$inf->getField('size')->value}}</div>
                                        </div>
                                        <div class="accordion__button"><a href="javascript:void(0)"><i class="icon-plus"></i></a></div>
                                    </div>
                                </div>
                                <div class="accdordion__body">
                                    <div class="text">{{localized($inf->getField('content')->value,decode: true)}} </div>
                                </div>
                            </div>

                                @endforeach

                        </div>
                    </div>
                    <div class="tab__content inner__page__column" data-toggle="industrial_park" data-order="5">
                        <div class="inner__page__title mb-24">Loqistik imkanlar</div>
                        <div class="row" id="news">
                            @php($infrastructures=$page->posts->where('type',\App\Models\Post::TYPES['logistic'])->take(2))


                            @foreach($infrastructures as $key=>$inf)
                                <div class="col-lg-6 mb-24">
                                    <div class="logistics__card">
                                        <div class="title">{{$inf->getField('size')->value}}</div>
                                        <div class="text">{{localized($inf->getField('content')->value,decode: true)}}</div>
                                    </div>
                                </div>
                            @endforeach


                        </div>
                        <div class="more__button" id="2" page-id="{{$page->id}}"><span>Daha çox</span><i class="icon-chevron-down"></i></div>

                    </div>
                    <div class="tab__content inner__page__column" data-toggle="industrial_park" data-order="6">


                        @php($infrastructures=$page->posts->where('type',\App\Models\Post::TYPES['selected_products']))



                        @if(count($infrastructures)>1)


                        <div class="inner__page__title mb-24">Seçilmiş məhsullar</div>
                        <div class="row">

                            @foreach($infrastructures as $p)
                                <div class="col-lg-6 mb-24">
                                    <div class="priority__card">
                                        <div class="title">{{$p?->getField('title')->value}}</div>
                                        <div class="text">{{localized($p?->getField('content')->value,decode: true)}}</div>
                                    </div>
                                </div>

                            @endforeach

                        </div>

                            @endif


                    </div>
                    <div class="tab__content" data-toggle="industrial_park" data-order="7">
                        <div class="residents__inner active">
                            <div class="inner__page__title mb-16">Rezidentlər</div>
                            <div class="inner__text mb-24">
                                <div>Bir çox investisiya təşviqi agentlikləri, ticarət və sənaye palataları və digər müvafiq institutlar ilə sıx əlaqələr formalaşdırmışdır. Fond 44 ölkənin 140-dan çox bu cür təşkilatı ilə əməkdaşlıq və tərəfdaşlıq üzrə memorandular imzalayıb.</div>
                            </div>
                            <div class="resident__row">

                                @php($residents=$page->posts->where('type',\App\Models\Post::TYPES['rezidents']))



                                @foreach($residents as $key=>$rez)
                                <div class="resident__card">
                                    <div class="card__image"><img src="{{$rez->getField('image')->getFirstMediaUrl('file')}}" alt=""></div>
                                    <div class="card__overlay">
                                        <div class="column">
                                            <div class="title"> {{ localized($rez->getField('title')->value,decode: true)}} </div><a class="link" href="javascript:void(0)" data-toggle="resident_content" data-order="{{$key+1}}"><i class="icon-long-arrow-right"></i></a>
                                        </div>
                                    </div>
                                </div>

                                    @endforeach

                            </div>
                        </div>
                        <div class="resident__contents">
                            @foreach($residents as $key=>$rez)
                            <div class="resident__content" data-toggle="resident_content" data-order="{{$key+1}}">
                                <div class="resident__title mb-xs-16 mt-xs-16 mb-lg-24 mt-lg-0"><i class="icon-long-arrow-left"></i><span> {{ localized($rez->getField('name')->value,decode: true)}}</span></div>
                                <div class="resident__box">
                                    <div class="d-flex">
                                        <div class="box__icon"><img src="{{$rez->getField('image')->getFirstMediaUrl('file')}}" alt=""></div>
                                        <div class="box__content">
                                            <div class="content">
                                                {!! localized($rez->getField('content')->value,decode: true) !!}
                                                 </div>
                                            <div class="contact__row">
                                                <div class="col-lg-4">
                                                    <div class="title">TELEFON:</div>
                                                    <div class="text">{{$rez->getField('mobile')->value}}</div>
                                                </div>
                                                <div class="col-lg-4">
                                                    <div class="title">E-POÇT:</div>
                                                    <div class="text">{{$rez->getField('email')->value}}</div>
                                                </div>
                                                <div class="col-lg-4">
                                                    <div class="title">VEBSAYT:</div>
                                                    <div class="text">{{$rez->getField('veb')->value}}</div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>


@endsection







@push("js")

    <script>
        $(function () {
            $(".more__button").click(function () {
                var _this=this;
                $.ajax({
                    url:"{{url('api/logistics/more')}}",
                    data:{'_token':'{{csrf_token()}}','id':$(_this).attr("id"),"page":$(_this).attr("page-id")},
                    method:'post',
                    success:function (e) {

                        $("#news").append(e.result.view)

                        $(_this).attr("id",parseInt($(_this).attr("id"))+2)



                    }
                })
            })
        })
    </script>

@endpush

