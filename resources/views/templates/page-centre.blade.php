@extends('layouts.page')

@section('content')

    <main class="education__center inner__page">
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
                        <div class="inner__page__title mb-24">{{ localized(page_field($page,'title'),decode: true)}}</div>
                        <div class="inner__date mb-16">{{ \Carbon\Carbon::parse(page_field($page,'date'))->format('d m, Y  H:i') }}</div>
                        <div class="inner__text mb-24">
                            {!! localized(page_field($page,'content'),decode: true) !!}
                        </div>
                        <div class="link__card mb-24">
                            <div class="d-flex">
                                <div class="content">
                                    <div class="text">{{ localized(page_field($page,'link_title'),decode: true)}}</div>
                                    <div class="link"><a href = "{{ page_field($page,'link')}}">{{ page_field($page,'link')}}</a></div>
                                </div>
                                <div class="icon"><i class="icon-get-link"></i></div>
                            </div>
                        </div><img class="inner__image" src="{{page_image($page,'image_title')}}">
                    </div>
                </div>
            </div>
        </div>
    </main>

@endsection
