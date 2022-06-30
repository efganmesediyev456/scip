@extends('layouts.page')

@section('content')

    <style>
        figure{
            margin: 0;
        }
    </style>
    {{--<main class="main">--}}
        {{--<div class="container">--}}
            {{--<p>Breadcrumb</p>--}}
            {{--<div class="bread__crumbs">--}}
                {{--<ul>--}}
                    {{--{!! breadcrumb_generator($page) !!}--}}
                {{--</ul>--}}
            {{--</div>--}}

            {{--<h1 >{{ mb_ucfirst(mb_strtolower(localized($page->name))) }}</h1>--}}

            {{--<div class="row">--}}
                {{--<div class="col-12">--}}
                    {{--CONTENT FIELD--}}
                {{--</div>--}}
            {{--</div>--}}
        {{--</div>--}}
    {{--</main>--}}


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
                    <div class="inner__page__column">
                        <div class="inner__page__title mb-24">{{ localized($page->name)}}</div>
                        <div class="inner__text mb-24">
                            {!! localized(page_field($page,'content'),decode: true) !!}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection
