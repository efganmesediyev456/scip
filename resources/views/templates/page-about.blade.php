@extends('layouts.page')

@section('content')



    <style>
        figure{
            margin:0;
        }
    </style>


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
                        <div class="inner__page__title mb-24">   {{localized($page->name)}} </div>
                        <div class="inner__text mb-24">
                            {!!  localized(page_field($page,'content'),decode: true) !!}
                        </div>
                        <div class="address__cards">
                            <div class="d-flex"><i class="icon-phone"></i><span><a href="">{{page_field($page,'mobile')}}</a></span></div>
                        </div>
                        <div class="address__cards">
                            <div class="d-flex"><i class="icon-map"></i><span>{{ localized(page_field($page,'address'),decode: true)}}</span></div>
                        </div>
                        <div class="address__cards">
                            <div class="d-flex"><i class="icon-globe"></i><span>{{ localized(page_field($page,'veb'),decode: true)}}</span></div>
                        </div>
                    </div>
                    <div class="share__card mt-24">
                        <div class="d-flex justify-content-between">
                            <div class="text">Göstərilən platformalarda paylaş:</div>
                            <div class="social__icons">
                                <div class="d-flex"><a class="social__icon" href=""><i class="icon-facebook"></i></a><a class="social__icon" href=""><i class="icon-twitter"></i></a><a class="social__icon" href=""><i class="icon-instagram"></i></a><a class="social__icon" href=""><i class="icon-print"></i></a></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>


@endsection
