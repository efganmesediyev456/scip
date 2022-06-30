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
                        <div class="inner__page__title mb-lg-24">Tez-tez verilən suallar</div>
                        <div class="custom__accordions">


                            @php($posts = posts(11)->get())





                            @foreach($posts as $key=>$post )

                                <div class="accordion" id="id-{{$key+1}}">
                                    <div class="accordion__header">
                                        <div class="custom__row">
                                            <div class="accordion__title">{{ localized($post->getField('title')?->value,decode: true)}}</div>
                                            <div class="accordion__button"><a href="javascript:void(0)"><i class="icon-plus"></i></a></div>
                                        </div>
                                    </div>
                                    <div class="accdordion__body">
                                        <div class="text">{{ localized($post->getField('content')?->value,decode: true)}}</div>
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
