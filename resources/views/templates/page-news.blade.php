@extends('layouts.page')

@section('content')

    @php($posts = posts(1)->paginate(6))


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
                    <div class="inner__page__column mb-24">
                        <div class="inner__page__title mb-24">Xəbərlər</div>
                        <div class="row">


                            @foreach($posts as $post)



                                <div class="col-lg-6 mb-24"><a href="{{url($language .'/post/'. localized($post->slug,app()->getLocale()))}}">
                                        <div class="news__card">
                                            <div class="card__image"><img src="{{$post->getField('image_file')?->getFirstMediaUrl('file')}}" alt=""></div>
                                            <div class="card__body">
                                                <div class="date">{{ ucfirst(\Jenssegers\Date\Date::parse($post->getField('date')->value)->format('j F,Y H:i'))  }}</div>
                                                <div class="title">{{localized($post->getField('title')?->value,decode: true)}}</div>
                                                <div class="description">{{localized($post->getField('subtitle')?->value,decode: true)}}</div>
                                            </div>
                                        </div></a>
                                </div>



                            @endforeach









                        </div>
                    </div>


                    {{$posts->links('vendor.pagination.default')}}

                </div>
            </div>
        </div>
    </main>



@endsection





{{--<section class="articles">--}}
    {{--<div class="container">--}}
        {{--<div class="row">--}}
            {{--<div class="col-12 mb-xs-48">--}}
                {{--<h2 class="articles__title">{{localized($page->name)}}</h2>--}}
            {{--</div>--}}
        {{--</div>--}}


        {{--<div class="row gy-xs-28">--}}




        {{--</div>--}}

    {{--</div>--}}
{{--</section>--}}
