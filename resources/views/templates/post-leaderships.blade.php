@extends('layouts.post')

@section('content')



    <style>
        .inner__page img{
            height: 100%;
            object-fit: cover;
        }
        .thumb__item{
            height: 100%;
        }
    </style>





    <main class="news__single inner__page">
        <div class="container">
            <ul class="breadcrump">
                <li><a href="/">Ana Səhifə</a></li>
                <li><a href="/haqqimizda">Haqqimizda</a></li>
                <li><a href="/rehberlik">Rehberlik</a></li>
                <li><a href="javascript:void(0)">{{ localized($post->getField('name')?->value,decode: true) }}</a></li>
            </ul>
            <div class="row">
                <div class="inner__column__left">
                    <div class="custom__sidebar">
                        <ul>
                            <?php
                            $page=\App\Models\Page::find(47);
                            ?>

                            {!! sidebar_generator($page) !!}


                        </ul>
                    </div>
                </div>
                <div class="inner__column__right">
                    <div class="inner__page__column">
                        <div class="inner__page__title mb-24">{{ localized($post->getField('name')?->value,decode: true) }}</div>
                        <div class="inner__page__title mb-24"><img src = "{{$post->getField('image')?->getFirstMediaUrl('file')}}" alt = ""></div>
                        <div class="inner__text mb-24">

                            {!! localized($post->getField('content')?->value,decode: true) !!}
                        </div>
                        <div class="news__big__slider">
                            <div class="slider__1">
                                <div class="arrows arrow__left"><i class="icon-chevron-left"></i></div>
                                <div class="arrows arrow__right"><i class="icon-chevron-right"></i></div>

                            </div>

                        </div>
                    </div>


                </div>
            </div>
        </div>
    </main>


@endsection



