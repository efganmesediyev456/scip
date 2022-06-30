@extends('layouts.page')

@section('content')

    <main class="reports inner__page">
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
                    <div class="inner__page__column">
                        <div class="inner__page__title mb-24">   {!!  localized(page_field($page,'title'),decode: true) !!}
                        </div>
                        <div class="mb-24">



                            @foreach($page->posts->where('type',\App\Models\Post::TYPES['reports']) as $post )





                            <div class="order__card"><a href="">
                                    <div class="d-flex">
                                        <div class="left__icon"><i class="icon-pdf"></i></div>
                                        <div class="center__content">
                                            <div class="date">{{ \Carbon\Carbon::parse($post->getField('date')->value)->format('d m, Y  H:i') }}</div>
                                            <div class="text">{{localized($post->getField('title')?->value,decode: true)}}</div>
                                            <div class="size">732 kb</div>
                                        </div>
                                        <div class="right__icon"><i class="icon-file"></i><i class="icon-get-link"></i></div>
                                    </div></a>
                            </div>

                                @endforeach

                        </div><img class="inner__image mb-lg-24" src="{{page_image($page,'image')}}">
                        <div class="inner__page__title mb-lg-16"> {!!  localized(page_field($page,'subtitle'),decode: true) !!}</div>
                        <div class="inner__date mb-lg-16">{{ \Carbon\Carbon::parse(page_field($page,'date'))->format('d m, Y  H:i') }}</div>
                        <div class="inner__text">{!!  localized(page_field($page,'content'),decode: true) !!}</div>
                    </div>
                </div>
            </div>
        </div>
    </main>

@endsection
