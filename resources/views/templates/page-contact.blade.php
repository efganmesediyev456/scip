@extends('layouts.page')

@section('content')

    <main class="contact inner__page">
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
                        <div class="inner__page__title mb-lg-24">Əlaqə</div>
                        <div class="row">
                            <div class="col-lg-6 mb-lg-24">
                                <div class="label__title">ÜNVAN:</div>
                                <div class="label__text">Bakı şəhəri, Səbail ray, Azadlıq prospekti, 00 A</div>
                            </div>
                            <div class="col-lg-6 mb-lg-24">
                                <div class="label__title">TELEFON:</div>
                                <div class="label__text">(+99412) 000 00 00 (+99412) 000 00 00</div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-6 mb-lg-24">
                                <div class="label__title">FAKS:</div>
                                <div class="label__text">(+99412) 000 00 00</div>
                            </div>
                            <div class="col-lg-6 mb-lg-24">
                                <div class="label__title">E_MAIL:</div>
                                <div class="label__text">office@dscip.az</div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-6 mb-lg-24">
                                <div class="label__title">VEB-SAYT:</div>
                                <div class="label__text">http://www.scip.az</div>
                            </div>
                            <div class="col-lg-6 mb-lg-24">
                                <div class="label__title">INDEKS:</div>
                                <div class="label__text">AZ1000</div>
                            </div>
                        </div>
                        <div class="map"><img class="w-100" src="/assets/images/Screen Shot 2020-10-16 at 11.17 1.svg" alt=""></div>
                    </div>
                </div>
            </div>
        </div>
    </main>

@endsection
