@extends('layouts.page')






@section('content')

    @php($posts = posts(7)->paginate(6))

    <?php

    $language=app()->getLocale()=='az' ? '' : app()->getLocale();
    ?>

    <main class="information inner__page">
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
                    <div class="inner__page__column mb-32">
                        <div class="inner__page__title mb-24">Elanlar</div>
                        <div class="row">


                            @foreach($posts as $post)
                                <div class="col-lg-6 @if(!$loop->last) mb-24 @endif">
                                    <a href = "{{url($language.'/post/' . localized($post->slug,app()->getLocale()))}}">
                                        <div class="advertisement__card">
                                            <div class="date">{{ ucfirst(\Jenssegers\Date\Date::parse($post->getField('date')->value)->format('j F,Y H:i'))  }}</div>

                                            <div class="text">{{localized($post->getField('title')?->value,decode: true)}}</div>
                                        </div>

                                    </a>

                                </div>





                            @endforeach




                        </div>
                    </div>
                    {{$posts->links('vendor.pagination.default')}}

                </div>
            </div>
        </div>
    </main>


    {{--<main class="information inner__page">--}}
        {{--<div class="container">--}}
            {{--<ul class="breadcrump">--}}
                {{--<li><a href="/index.html">Home</a></li>--}}
                {{--<li><a href="">Media</a></li>--}}
                {{--<li><a href="javascript:void(0)">Xəbərlər</a></li>--}}
            {{--</ul>--}}
            {{--<div class="row">--}}
                {{--<div class="inner__column__left">--}}
                    {{--<div class="custom__sidebar">--}}
                        {{--<ul>--}}
                            {{--<li class="active"><a href="/media/news.html">Xəbərlər</a></li>--}}
                            {{--<li><a href="/media/advertisements.html">Elanlar</a></li>--}}
                            {{--<li><a href="/media/multimedia.html">Multimedia</a></li>--}}
                        {{--</ul>--}}
                    {{--</div>--}}
                {{--</div>--}}
                {{--<div class="inner__column__right">--}}
                    {{--<div class="inner__page__column mb-24">--}}
                        {{--<div class="inner__page__title mb-24">Xəbərlər</div>--}}
                        {{--<div class="row">--}}


                            {{--@foreach($posts as $post)--}}



                                {{--<div class="col-lg-6 mb-24"><a href="{{url('/post/' . localized($post->slug,app()->getLocale()))}}">--}}
                                        {{--<div class="news__card">--}}
                                            {{--<div class="card__image"><img src="{{$post->getField('image_file')?->getFirstMediaUrl('file')}}" alt=""></div>--}}
                                            {{--<div class="card__body">--}}
                                                {{--<div class="date">12 OCT,2020    12:00 {{ \Carbon\Carbon::parse($post->getField('date')->value)->format('d m, Y  H:i') }}</div>--}}
                                                {{--<div class="title">{{localized($post->getField('title')?->value,decode: true)}}</div>--}}
                                                {{--<div class="description">{{localized($post->getField('subtitle')?->value,decode: true)}}</div>--}}
                                            {{--</div>--}}
                                        {{--</div></a>--}}
                                {{--</div>--}}



                            {{--@endforeach--}}








                        {{--</div>--}}
                    {{--</div>--}}


                    {{--{{$posts->links('vendor.pagination.default')}}--}}

                {{--</div>--}}
            {{--</div>--}}
        {{--</div>--}}
    {{--</main>--}}



@endsection






