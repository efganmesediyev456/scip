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
                    <div class="inner__page__title mb-lg-24">{{ localized($page->name)}}</div>



                    @foreach($page->posts->where('type',\App\Models\Post::TYPES['lows']) as $post )


                    <div class="order__card"><a href="{{$post->getField('file')?->getFirstMediaUrl('file')}}">
                            <div class="d-flex">
                                <div class="left__icon"><i class="icon-pdf"></i></div>
                                <div class="center__content">
                                    <div class="date">{{ strtoupper(\Carbon\Carbon::parse($post->getField('date')->value)->format('d M Y')) }}</div>
                                    <div class="text">{{localized($post->getField('title')?->value,decode: true)}}</div>

                                    <div class="size">{{$post->getField('file')->getMedia('file')[0]->human_readable_size}}</div>
                                </div>
                                <div class="right__icon"><i class="icon-file"></i><i class="icon-get-link"></i></div>
                            </div></a>
                    </div>
                  @endforeach


                </div>
            </div>
        </div>
    </div>
</main>



@endsection
