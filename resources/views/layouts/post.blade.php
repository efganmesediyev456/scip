
<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <?php /** @var $post \App\Models\Post */ ?>
    <title>{{ \Illuminate\Support\Str::limit(localized($post->seo->title), 60) }}</title>
    <meta name="description" content="{{ \Illuminate\Support\Str::limit(localized($post->seo->description), 160) }}">
    <meta name="robots" content="index, follow">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta property="og:title" content="{{ \Illuminate\Support\Str::limit(localized($post->seo->title), 60) }}"/>
    <meta property="og:description"
          content="{{ \Illuminate\Support\Str::limit(localized($post->seo->description), 160) }}"/>
    <meta property="og:image"
          content="{{ $post->seo->getFirstMedia('image',['locale' => app()->getLocale()])?->getUrl() }}"/>
    <meta property="og:url" content="{{ request()->fullUrl() }}"/>
    <meta property="og:type" content="article"/>
    <meta property="og:locale" content="{{ app()->getLocale() }}"/>
    <link rel="canonical" href="{{ request()->fullUrl() }}"/>
    @foreach(config('app.locales') as $locale)
        <link rel="alternate" href="{{ url("/$locale/".localized($post->slug, $locale)) }}" hreflang="{{ $locale }}"/>
    @endforeach


    <link href="{{asset('/')}}front/assets/css/main.css" rel="stylesheet">
    <link href="{{asset('front/add.css')}}" rel="stylesheet">
</head>



{{--<nav>--}}
    {{--<div>--}}
        {{--Language: {{ app()->getLocale() }}--}}

        {{--{!! language_picker($post) !!}--}}
    {{--</div>--}}
{{--</nav>--}}



<body>

<ul class="social__list__fixed">
    <li><a href = "">
            <i class="icon-facebook"></i>
        </a></li>
    <li><a href = "">
            <i class="icon-twitter"></i>
        </a></li>
    <li><a href = "">
            <i class="icon-instagram"></i>
        </a></li>
    <li><a href = "">
            <i class="icon-youtube"></i>
        </a></li>
</ul>


<header>
    <div class="header__top">
        <div class="container">
            <div class="row">
                <div class="col-6 align-self-center"><a href="/index.html"><img src="/assets/images/logo.svg" alt=""></a></div>
                <div class="col-6 align-self-center">
                    <ul class="header__list">
                        <li><a class="list__link" href="javascript:void(0)"><span>E-agro</span><i class="icon-angle-right"></i></a></li>
                        <li class="custom__dropdown">


                            @yield('language')



                        </li>
                        <li><a class="list__link" href="javascript:void(0)"><i class="icon-glasses-alt"></i></a></li>
                        <li><a class="list__link" href="javascript:void(0)"><i class="icon-search"></i></a></li>
                        <li><a class="list__link mage__menu__open" href="javascript:void(0)"><i class="icon-bars"></i></a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <div class="header__bottom">
        <div class="container">
            <ul class="header__nav">

                <?php

                $pages=\App\Models\Page::where('page_id',1)->where("shown_in_menu",1)->where("show_in_header",1)->orderBy('order')->get();


                ?>

                @foreach($pages as $p)

                    <li>
                        <a class="nav__link" href="javascript:void(0)"><span>{{localized($p->name)}}</span></a>
                        @if(count($p->sub_pages->where("shown_in_menu",1)->where('show_in_header',1)->sortBy('order')))
                            <div class="custom__dropdown">
                                @foreach($p->sub_pages->where("shown_in_menu",1)->where('show_in_header',1)->sortBy('order') as $sub)


                                    <div class="list"><a class="dropdown__link" href="/{{localized($p->slug).'/'.localized($sub->slug)}}">{{localized($sub->name)}}</a></div>


                                @endforeach
                            </div>
                        @endif
                    </li>

                @endforeach


                {{--<li><a class="nav__link" href="javascript:void(0)"><span>Qanunvericilik</span></a>--}}
                {{--<div class="custom__dropdown">--}}
                {{--<div class="list"><a class="dropdown__link" href="/qanunvericilik/laws.html">Qanunlar</a></div>--}}
                {{--<div class="list"><a class="dropdown__link" href="/qanunvericilik/decrees-orders.html">Fərmanlar və Sərəncamlar</a></div>--}}
                {{--<div class="list"><a class="dropdown__link" href="/qanunvericilik/regulations.html">Əsasnamələr</a></div>--}}
                {{--<div class="list"><a class="dropdown__link" href="/qanunvericilik/decisions.html">Qərarlar</a></div>--}}
                {{--<div class="list"><a class="dropdown__link" href="/qanunvericilik/rules-forms.html">Qaydalar və formalar</a></div>--}}
                {{--</div>--}}
                {{--</li>--}}
                {{--<li><a class="nav__link" href="javascript:void(0)"><span>İqtisadi zonalar</span></a>--}}
                {{--<div class="custom__dropdown">--}}
                {{--<div class="list"><a class="dropdown__link" href="/iqtisadi-zonalar/senaye-parklari/senaye-parklari.html">Sənaye parkları</a></div>--}}
                {{--<div class="list"><a class="dropdown__link" href="/iqtisadi-zonalar/senaye-mehleleri/senaye-mehleleri.html">Sənaye məhəllələri</a></div>--}}
                {{--<div class="list"><a class="dropdown__link" href="/iqtisadi-zonalar/aqro-parklar/aqro-parklar.html">Aqro parklar</a></div>--}}
                {{--</div>--}}
                {{--</li>--}}
                {{--<li><a class="nav__link" href="javascript:void(0)"><span>Üstünlüklər</span></a>--}}
                {{--<div class="custom__dropdown">--}}
                {{--<div class="list"><a class="dropdown__link" href="/ustunlukler/infrastructure.html">İnfrastruktur</a></div>--}}
                {{--<div class="list"><a class="dropdown__link" href="/ustunlukler/tax-customs.html">Vergi və gömrük güzəştləri</a></div>--}}
                {{--<div class="list"><a class="dropdown__link" href="/ustunlukler/logistics.html">Logistik imkanlar</a></div>--}}
                {{--<div class="list"><a class="dropdown__link" href="/ustunlukler/free-trade-opportunities.html">Azad ticarət imkanları</a></div>--}}
                {{--<div class="list"><a class="dropdown__link" href="/ustunlukler/a-window.html">Bir pəncərə</a></div>--}}
                {{--<div class="list"><a class="dropdown__link" href="/ustunlukler/research-development.html">Tədqiqat və inkişaf</a></div>--}}
                {{--</div>--}}
                {{--</li>--}}
                {{--<li><a class="nav__link" href="javascript:void(0)"><span>Müraciətlər</span></a>--}}
                {{--<div class="custom__dropdown">--}}
                {{--<div class="list"><a class="dropdown__link" href="/muracietler/faqs.html">Tez-tez verilən suallar</a></div>--}}
                {{--<div class="list"><a class="dropdown__link" href="/muracietler/admission-schedule.html">Qəbul qrafiki</a></div>--}}
                {{--<div class="list"><a class="dropdown__link" href="/muracietler/contact.html">Əlaqə</a></div>--}}
                {{--<div class="list"><a class="dropdown__link" href="/muracietler/complaints-suggestions-appeals.html">Şikayət, təklif və müraciət</a></div>--}}
                {{--</div>--}}
                {{--</li>--}}
                <li class="right"><a class="nav__link" href="/haqqimizda/forum/rezident-ol"><span>Rezident ol</span><i class="icon-angle-right"></i></a></li>
            </ul>
        </div>
    </div>
</header>
<div class="mage__menu">
    <header>
        <div class="header__top">
            <div class="container">
                <div class="row">
                    <div class="col-6 align-self-center"><a href="/index.html"><img src="{{asset('/')}}assets/images/logo.svg" alt=""></a></div>
                    <div class="col-6 align-self-center">
                        <ul class="header__list">
                            <li><a class="list__link mage__menu__close" href="javascript:void(0)"><i class="icon-close"></i></a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <div class="menu__content">
        <div class="container">
            <div class="custom__row__1">


                <?php

                $pages=\App\Models\Page::where('page_id',1)->where("shown_in_menu",1)->where('show_in_burger',1)->orderBy('order')->get();


                ?>

                @foreach($pages as $p)




                    <div class="col--20">
                        <ul class="menu__list">
                            <li class="list__header"><a class="list__link" href="javascript:void(0)">{{localized($p->name)}}</a></li>


                            @foreach($p->sub_pages->where("shown_in_menu",1)->where('show_in_burger',1)->sortBy('order') as $sub)


                                <li class="list__item"><a class="list__link" href="/{{localized($p->slug).'/'.localized($sub->slug)}}">{{localized($sub->name)}}</a></li>


                            @endforeach



                        </ul>
                    </div>

                @endforeach



            </div>
            <div class="custom__row__2">
                <div class="col--20"><a class="menu__title" href="/ustunlukler/infrastruktur">Üstünlüklər</a></div>
                <div class="col--20"><a class="menu__title" href="">REZİDENTLƏR</a></div>
                <div class="col--20 last"><a class="menu__title" href="">PEŞƏ TƏHSİL MƏRKƏZİ</a></div>
            </div>
        </div>
    </div>
</div>

@yield("content")
@php($posts = posts(12))

<div class="useful__links">
    <div class="card__slider owl-carousel owl-theme">



        @foreach($posts as $post)
            <div class="card">
                <div class="card__title">{{localized($post->getField('title')?->value,decode: true)}}</div><a href="{{$post->getField('link')?->value}}" class="card__link">{{localized($post->getField('name')?->value,decode: true)}}</a>
            </div>
        @endforeach



    </div>
</div>
<footer>
    <div class="footer__top">
        <div class="container">
            <div class="row">
                <div class="left">
                    <div><img class="logo" src="/assets/images/economy.svg" alt=""></div>
                    <div><img class="logo" src="/assets/images/logo-white.svg" alt=""></div>
                </div>
                <div class="right">
                    <div class="row custom__row__1">




                        <?php

                        $pages=\App\Models\Page::where('page_id',1)->where("shown_in_menu",1)->where('show_in_burger',1)->orderBy('order')->get();


                        ?>

                        @foreach($pages as $p)



                            <div class="col-md-20">
                                <ul class="footer__list">
                                    <li class="list__header"><a class="list__link" href="">{{localized($p->name)}}</a></li>


                                    @foreach($p->sub_pages->where("shown_in_menu",1)->where('show_in_burger',1)->sortBy('order') as $sub)



                                        <li class="list__item"><a class="list__link" href="/{{localized($p->slug).'/'.localized($sub->slug)}}">{{localized($sub->name)}}</a></li>


                                    @endforeach



                                </ul>
                            </div>


                        @endforeach










                    </div>
                    <div class="row custom__row__2">
                        <div class="col-md-20"><a class="footer__title" href="">Üstünlüklər</a></div>
                        <div class="col-md-20"><a class="footer__title" href="">REZİDENTLƏR</a></div>
                        <div class="col-md-20 last"><a class="footer__title" href="">PEŞƏ TƏHSİL MƏRKƏZİ</a></div>
                        <div class="col-md-20"><a class="footer__title social__media__title" href="">SOSİAL MEDYA</a>
                            <ul class="social__list">
                                <li><a class="social__link" href="" target="_blank"><i class="icon-facebook"></i></a></li>
                                <li><a class="social__link" href="" target="_blank"><i class="icon-twitter"></i></a></li>
                                <li><a class="social__link" href="" target="_blank"><i class="icon-instagram"></i></a></li>
                                <li><a class="social__link" href="" target="_blank"><i class="icon-youtube"></i></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="footer__bottom">
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <p>Bütün hüquqlar qorunur © 2020</p>
                </div>
                <div class="col-lg-6">
                    <p><a href="https://safaroff.com/az" target="_blank">
                            Safaroff Agency tərəfindən hazırlanıb</a></p>
                    <ul class="social__list">
                        <li><a class="social__link" href="" target="_blank"><i class="icon-facebook"></i></a></li>
                        <li><a class="social__link" href="" target="_blank"><i class="icon-twitter"></i></a></li>
                        <li><a class="social__link" href="" target="_blank"><i class="icon-instagram"></i></a></li>
                        <li><a class="social__link" href="" target="_blank"><i class="icon-youtube"></i></a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</footer>

</body>

{{--<nav>--}}
{{--<div>--}}
{{--Language: {{ app()->getLocale() }}--}}

{{--{!! language_picker($page) !!}--}}
{{--</div>--}}

{{--<br>--}}

{{--<div>--}}
{{--Pages:--}}

{{--<ul>--}}
{{--{!! page_generator(mainPage()) !!}--}}
{{--</ul>--}}
{{--</div>--}}
{{--</nav>--}}






<script defer src="{{asset('/')}}front/assets/js/945.js"></script><script defer src="{{asset('/')}}front/assets/js/main.js"></script>


<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>


@stack("js")

</html>
