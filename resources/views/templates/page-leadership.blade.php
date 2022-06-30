@extends('layouts.page')

@section('content')

<main class="leadership inner__page">
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

            @php($posts = posts(13)->get())



            <div class="inner__column__right">
                <div class="inner__page__column">
                    <div class="inner__page__title mb-24">{{localized($page->name)}}</div>
                    <div class="row mb-24">


                        <div class="col-md-6 mb-xs-24 mb-lg-0">
                            <div class="leadership__card">
                                <div class="card__image"><img src="{{$posts[0]->getField('image')->getFirstMediaUrl('file')}}"></div>
                                <div class="card__body">
                                    <div class="position">{{localized($posts[0]->getField('position')?->value,decode: true)}}</div>
                                    <div class="name">{{localized($posts[0]->getField('name')?->value,decode: true)}}</div>
                                    <div class="description">{{localized($posts[0]->getField('subtitle')?->value,decode: true)}}</div><a class="more" href="{{url('/post/' . localized($posts[0]->slug,app()->getLocale()))}}">Daha ətraflı<i class="icon-long-arrow-right"></i></a>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 ">
                            <div class="leadership__card">
                                <div class="card__image"><img src="{{$posts[1]->getField('image')->getFirstMediaUrl('file')}}"></div>
                                <div class="card__body">
                                    <div class="position">{{localized($posts[1]->getField('position')?->value,decode: true)}}</div>
                                    <div class="name">{{localized($posts[1]->getField('name')?->value,decode: true)}}</div>
                                    <div class="description">{{localized($posts[1]->getField('subtitle')?->value,decode: true)}}</div><a class="more" href="{{url('/post/' . localized($posts[1]->slug,app()->getLocale()))}}">Daha ətraflı<i class="icon-long-arrow-right"></i></a>
                                </div>
                            </div>
                        </div>


                    </div>



                    <div class="leadership__slider owl-carousel owl-theme">



                        @foreach($posts->slice(2,count($posts)) as $post)
                        <div class="leadership__card small">
                            <div class="card__image"><a href = "{{url('/post/' . localized($post->slug,app()->getLocale()))}}"><img src="{{$post->getField('image')->getFirstMediaUrl('file')}}"></a></div>
                            <div class="card__body">
                                <div class="position">{{localized($post->getField('position')?->value,decode: true)}}</div>
                                <div class="name">{{localized($post->getField('subtitle')?->value,decode: true)}}</div>
                            </div>
                        </div>

                            @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>


@endsection
