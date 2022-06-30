@extends('layouts.page')

@section('content')

    <main class="industrial__park inner__page">
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
                        <div class="inner__page__title mb-24">{{localized($page->name)}}</div>


                        @foreach($page->sub_pages as $p)

                        <div class="zone__card"><a href="{{localized($page->slug)}}/{{localized($p->slug)}}">
                                <div class="d-flex">
                                    <div class="left">
                                        <div class="title">{{localized($p->name)}}</div>
                                    </div>
                                    <div class="right"><i class="icon-long-arrow-right"></i></div>
                                </div></a></div>
                       @endforeach

                    </div>
                </div>
            </div>
        </div>
    </main>

@endsection
