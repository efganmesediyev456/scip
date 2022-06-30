
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
                            <div class="tab" data-toggle="industrial_park" data-order="2">İstiqamətlər</div>
                            <div class="tab" data-toggle="industrial_park" data-order="3">Baş plan</div>
                            <div class="tab" data-toggle="industrial_park" data-order="4">İnfrastruktur</div>
                            <div class="tab" data-toggle="industrial_park" data-order="5">Loqistik imkanlar</div>
                        </div>
                    </div>
                    <div class="inner__page__column">
                        <div class="tab__contents">
                            <div class="tab__content active" data-toggle="industrial_park" data-order="1">


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
                            <div class="tab__content" data-toggle="industrial_park" data-order="2">
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
                            <div class="tab__content" data-toggle="industrial_park" data-order="3">
                                <div class="inner__page__title mb-24">Baş plan</div>


                                @php($rez=$page->posts->where('type',\App\Models\Post::TYPES['plan_image'])->first())






                                <div class="d-flex justify-content-center align-items-center"><img class="w-100" src="{{$rez->getField('image')->getFirstMediaUrl('file')}}" alt=""></div>




                            </div>
                            <div class="tab__content" data-toggle="industrial_park" data-order="4">
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
                            <div class="tab__content" data-toggle="industrial_park" data-order="5">
                                <div class="inner__page__title mb-24">Loqistik imkanlar</div>
                                <div class="row">
                                    @php($infrastructures=$page->posts->where('type',\App\Models\Post::TYPES['logistic']))


                                    @foreach($infrastructures as $key=>$inf)
                                        <div class="col-lg-6 mb-24">
                                            <div class="logistics__card">
                                                <div class="title">{{$inf->getField('size')->value}}</div>
                                                <div class="text">{{localized($inf->getField('content')->value,decode: true)}}</div>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                                <div class="more__button"><span>Daha çox</span><i class="icon-chevron-down"></i></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>

@endsection
